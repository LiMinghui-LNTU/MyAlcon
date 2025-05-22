<?php

namespace Drupal\salesforce_integration\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Salesforce API settings.
 */
class WebToCaseSettingsForm extends ConfigFormBase {

  const FORM_ID = 'webtocase_integration';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return self::FORM_ID;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'webtocase_integration.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('webtocase_integration.settings');

    $form['web_to_case_secret_key'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Web to Case Secret Keys'),
      '#default_value' => json_encode($config->get('web_to_case_secret_key', [])),
      '#description' => $this->t('Enter key-value pairs in JSON format. Example: {"key1": "value1", "key2": "value2"}'),
      '#required' => FALSE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

    // Handle the web_to_case_secret_key field.
    $web_to_case_secret_key_json = $form_state->getValue('web_to_case_secret_key');
    json_decode($web_to_case_secret_key_json, TRUE);

    if (json_last_error() !== JSON_ERROR_NONE) {
      $form_state->setErrorByName('web_to_case_secret_key', $this->t('Invalid JSON format for Web to Case Secret Keys.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $config = $this->config('webtocase_integration.settings');
    // Handle the web_to_case_secret_key field.
    $web_to_case_secret_key_json = $form_state->getValue('web_to_case_secret_key');
    $web_to_case_secret_key = json_decode($web_to_case_secret_key_json, TRUE);
    $config->set('web_to_case_secret_key', $web_to_case_secret_key);
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
