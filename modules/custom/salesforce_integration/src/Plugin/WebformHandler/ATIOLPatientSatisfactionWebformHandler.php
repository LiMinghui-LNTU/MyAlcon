<?php

namespace Drupal\salesforce_integration\Plugin\WebformHandler;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\webform\Plugin\WebformHandler\RemotePostWebformHandler;
use Drupal\webform\WebformSubmissionInterface;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Form submission handler for Web-to-Case integration.
 *
 * @WebformHandler(
 *   id = "atiol_patient_satisfaction_progr",
 *   label = @Translation("Web-to-Case ATIOL Patient Satisfaction Program Request Form Handler"),
 *   category = @Translation("Custom"),
 *   description = @Translation("Handles submissions for the ATIOL Patient Satisfaction Program Request Form."),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 *   submission = \Drupal\webform\Plugin\WebformHandlerInterface::SUBMISSION_OPTIONAL,
 * )
 */
class ATIOLPatientSatisfactionWebformHandler extends RemotePostWebformHandler {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    // Your configuration form elements if needed.
    $webform = $this->getWebform();
    // Submission data.
    $form['submission_data'] = [
      '#type' => 'details',
      '#title' => $this->t('Submission data'),
    ];

    $form['submission_data']['excluded_data'] = [
      '#type' => 'webform_excluded_columns',
      '#title' => $this->t('Posted data'),
      '#title_display' => 'invisible',
      '#webform_id' => $webform->id(),
      '#required' => TRUE,
      '#default_value' => $this->configuration['excluded_data'],
    ];

    return $this->setSettingsParents($form);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission) {
    parent::validateForm($form, $form_state, $webform_submission);

    if (count($form_state->getErrors()) > 0) {
      return;
    }

    $client = new Client();
    $apiSettings = $this->getApiSettings();
    $webform = $this->getWebform();
    $webform_id = $webform->id();

    // Get submission and elements data.
    $data = $webform_submission->toArray(TRUE);
    $parsed_values = [];

    // Process web_to_case_secret_key.
    foreach ($apiSettings['web_to_case_secret_key'] as $composite_key => $value) {
      if (strpos($composite_key, $webform_id . '_') === 0) {
        $parsed_values[substr($composite_key, strlen($webform_id) + 1)] = $value;
      }
    }
    $data['data'] = array_merge($data['data'], $parsed_values);

    // Submit data to Web-to-Case endpoint.
    try {
      $request_options = [
        'headers' => [
          'Content-Type' => 'application/x-www-form-urlencoded',
          'encoding' => 'UTF-8',
        ],
        'form_params' => $data['data'],
        'debug' => FALSE,
        'timeout' => 600,
      ];
      $res = $client->request('POST', $data['data']['salesforce_url'], $request_options);
      $statusCode = $res->getStatusCode();
      if ($statusCode == 200) {
        // Construct the redirect URL.
        $redirect_url = Url::fromUri($data['data']['retURL'])->toString();

        // Create a RedirectResponse object.
        $response = new RedirectResponse($redirect_url);

        // Return the response to perform the redirection.
        $response->send();
        exit;
      }
      else {
        $form_state->setError($form, 'An error occurred while processing the form.');
        $form_state->setRebuild(TRUE);
      }

    }
    catch (\Exception $e) {
      // Handle exceptions, e.g., log the error.
      $form_state->setError($form, 'An error occurred while processing the form.');
    }
  }

  /**
   * Get API settings from configuration.
   *
   * @return array
   *   An array containing API settings.
   */
  private function getApiSettings() {
    $config = \Drupal::config('salesforce_integration.webtocase_integration.settings');
    return [
      'web_to_case_secret_key' => $config->get('web_to_case_secret_key'),
    ];
  }

}
