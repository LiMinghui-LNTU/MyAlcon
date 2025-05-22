<?php

namespace Drupal\salesforce_integration\Plugin\WebformHandler;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformHandler\RemotePostWebformHandler;
use Drupal\webform\WebformSubmissionInterface;
use GuzzleHttp\Client;

/**
 * Form submission handler.
 *
 * @WebformHandler(
 *   id = "salesforce_webform_handler",
 *   label = @Translation("Salesforce Integration Webform Handler"),
 *   category = @Translation("Custom"),
 *   description = @Translation("Salesforce Integration Webform Handler"),
 *   cardinality = Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 *   submission = \Drupal\webform\Plugin\WebformHandlerInterface::SUBMISSION_OPTIONAL,
 * )
 */
class SalesforceWebformHandler extends RemotePostWebformHandler {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {

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
    $apiSettings = $this->getApiSettings();
    $client = new Client();
    $hasError = 0;
    $error = '';
    $form_state->clearErrors();
    try {
      $value = '';
      if ($form_state->hasValue('email')) {
        $value = $form_state->getValue('email');
      }
      if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)) {
        $form_state->setErrorByName('messages--error', $this->t('Invalid Email: @value. Please enter a valid email address.', ['@value' => $value]));
      }

      $tokenRes = $client->request(
        'POST',
        $apiSettings['auth_api_url'] . '/v2/token',
        [
          'form_params' =>
            [
              'grant_type' => 'client_credentials',
              'client_id' => $apiSettings['client_id'],
              'client_secret' => $apiSettings['client_secret'],
            ],
        ]
      );

      if ($tokenRes->getStatusCode() == 200) {
        $token = json_decode($tokenRes->getBody()->getContents());
        $accessToken = $token->access_token;

        try {
          // Get submission and elements data.
          $data = $webform_submission->toArray(TRUE);
          $element_data = $data['data'];
          // Excluded selected submission data.
          $selData = array_diff_key($element_data, $this->configuration['excluded_data']);
          // Filter/prepare form values for submission to Force.
          $data = $this->prepareFields($selData, $apiSettings['event_def_key']);

          $res = $client->request(
            'POST',
            $apiSettings['events_api_url'] . '/interaction/v1/events',
            [
              'headers' =>
                [
                  'Authorization' => 'Bearer ' . trim($accessToken),
                  'Content-Type'  => 'application/json',
                ],
              'body' => json_encode($data),
              'debug' => FALSE,
              'timeout' => 600,
            ]
          );

          $event = json_decode($res->getBody()->getContents());
          \Drupal::logger('salesforce_api')->info("SUCCESS! Submitted Data to API: " . json_encode($data) . " Event Id Generated: " . $event->eventInstanceId);
        }
        catch (\Exception $e) {
          $hasError = 1;
          $error = $e->getMessage();
          // drupal_set_message($e->getMessage(), 'error');
          // $form_state->setRebuild();
        }
      }
    }
    catch (\Exception $e) {
      $hasError = 1;
      $error = $e->getMessage();
      // drupal_set_message($e->getMessage(), 'error');
      // $form_state->setRebuild();
    }
    if ($hasError) {
      \Drupal::logger('salesforce_api')->info("ERROR!!! Data to API: " . json_encode($data) . " has errored, details - " . $error);
      // header('Location: ' . $apiSettings['error_page_url']);
      // exit;.
      /* for surgical_lead_generation' error will show in same page */
      $webform = $this->getWebform();
      $webform_id = $webform->id();
      // $form_state->clearErrors();
      if ($webform_id == 'lead_gen_sx_modal') {
        $form_state->setError($form, "Error in Lead generation");
        $form_state->setRebuild(TRUE);
      }
      else {
        header('Location: ' . $apiSettings['error_page_url']);
        exit;
      }
    }
  }

  /**
   * Get API Settings.
   */
  private function getApiSettings() {
    $config = \Drupal::config('salesforce_integration.salesforce_integration_settings');
    return [
      'client_id' => $config->get('client_id'),
      'client_secret' => $config->get('client_secret'),
      'account_id' => $config->get('account_id'),
      'auth_api_url' => $config->get('auth_api_url'),
      'events_api_url' => $config->get('events_api_url'),
      'event_def_key' => $config->get('event_def_key'),
      'error_page_url' => $config->get('error_page_url'),
    ];
  }

  /**
   * Prepare the data that needs to be sent to salesforce.
   */
  private function prepareFields($formContent, $eventDefKey) {
    $consent_fields = [
      'tcagree',
      'consentcomm',
      'expresslyconsen',
    ];
    foreach ($consent_fields as $consent_field) {
      // Set boolean FALSE for unchecked consent fields.
      if (isset($formContent[$consent_field]) && $formContent[$consent_field] === 0) {
        $formContent[$consent_field] = 'FALSE';
      }
    }
    $data = [
      'Data' => $formContent,
      'ContactKey' => $formContent['email'],
      'EventDefinitionKey' => $eventDefKey,
    ];
    return $data;
  }

}
