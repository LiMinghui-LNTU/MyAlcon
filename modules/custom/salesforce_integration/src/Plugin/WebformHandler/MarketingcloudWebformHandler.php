<?php

namespace Drupal\salesforce_integration\Plugin\WebformHandler;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\webform\Plugin\WebformHandler\RemotePostWebformHandler;
use Drupal\webform\WebformSubmissionInterface;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Form submission handler for Marketing cloud integration.
 *
 * @WebformHandler(
 *   id = "marketingcloud_webform_handler",
 *   label = @Translation("Marketing cloud Integration Webform Handler"),
 *   category = @Translation("Custom"),
 *   description = @Translation("Handles submissions for Marketing cloud integration"),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 *   submission = \Drupal\webform\Plugin\WebformHandlerInterface::SUBMISSION_OPTIONAL,
 * )
 */
class MarketingcloudWebformHandler extends RemotePostWebformHandler {

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
      $tokenRes = $client->request(
        'POST',
        $apiSettings['auth_api_url'] . '/v2/token',
        [
          'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => $apiSettings['client_id'],
            'client_secret' => $apiSettings['client_secret'],
            'account_id' => $apiSettings['account_id'],
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
          // Exclude selected submission data.
          $selData = array_diff_key($element_data, $this->configuration['excluded_data']);
          // Filter/prepare form values for submission to Force.
          $data = $this->prepareFields($selData, $apiSettings['event_def_key']);

          // Send request to the API.
          $res = $client->request(
            'POST',
            $apiSettings['events_api_url'] . '/interaction/v1/events',
            [
              'headers' => [
                'Authorization' => 'Bearer ' . trim($accessToken),
                'Content-Type' => 'application/json',
              ],
              'body' => json_encode($data),
              'debug' => FALSE,
              'timeout' => 600,
            ]
          );

          $statusCode = $res->getStatusCode();
          if ($statusCode == 200 || $statusCode == 201) {
            $event = json_decode($res->getBody()->getContents());
            \Drupal::logger('marketingcloud_api')->info("SUCCESS! Submitted Data to API: " . print_r($data, TRUE) . " Event Id Generated: " . $event->eventInstanceId);
            // Extract retURL and construct the redirect URL.
            $redirect_url = Url::fromUri($data['Data']['retURL'])->toString();
            \Drupal::logger('marketingcloud_api')->info("Redirecting to: " . $redirect_url);

            // Create a RedirectResponse object.
            $response = new RedirectResponse($redirect_url);

            // Return the response to perform the redirection.
            $response->send();
            exit;
          }
          else {
            \Drupal::logger('marketingcloud_api')->error("API returned status code: " . $statusCode);
            header('Location: ' . $apiSettings['error_page_url']);
            exit;
          }
        }
        catch (\Exception $e) {
          $hasError = 1;
          $error = $e->getMessage();
        }
      }
    }
    catch (\Exception $e) {
      $hasError = 1;
      $error = $e->getMessage();
    }

    if ($hasError) {
      \Drupal::logger('marketingcloud_api')->info("ERROR!!! Data to API: " . print_r($data, TRUE) . " has errored, details - " . $error);
      $webform = $this->getWebform();
      $webform_id = $webform->id();
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
    $config = \Drupal::config('salesforce_integration.marketingcloud_integration.settings');
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
   * Prepare the data that needs to be sent to Salesforce.
   */
  private function prepareFields($formContent, $eventDefKey) {
    $consent_fields = [
      'tcagree',
      'consentcomm',
      'expresslyconsen',
      'agree',
    ];
    foreach ($consent_fields as $consent_field) {
      // Set boolean FALSE for unchecked consent fields.
      if (isset($formContent[$consent_field]) && $formContent[$consent_field] === 0) {
        $formContent[$consent_field] = 'FALSE';
      }
    }

    if (isset($formContent['EventDefinitionKey']) && $formContent['EventDefinitionKey'] != '') {
      $eventDefKey = $formContent['EventDefinitionKey'];
    }
    $data = [
      'Data' => $formContent,
      'ContactKey' => $formContent['Email'],
      'EventDefinitionKey' => $eventDefKey,
    ];
    return $data;
  }

}
