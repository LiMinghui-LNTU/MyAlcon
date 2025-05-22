<?php

namespace Drupal\salesforce_integration\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure salesforce API settings.
 */
class MarketingcloudApiSettingsForm extends ConfigFormBase {

  const FORM_ID = 'marketingcloud_integration';

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
      'salesforce_integration.marketingcloud_integration.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('salesforce_integration.marketingcloud_integration.settings');

    $form['auth_api_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Authorization / Token Generation Base URL'),
      '#default_value' => $config->get('auth_api_url', ''),
      '#required' => TRUE,
    ];
    $form['events_api_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Events API URL'),
      '#default_value' => $config->get('events_api_url', ''),
      '#required' => TRUE,
    ];
    $form['account_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Account Id'),
      '#default_value' => $config->get('account_id', ''),
      '#description' => $this->t('Account Id'),
      '#required' => TRUE,
    ];
    $form['client_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client ID'),
      '#default_value' => $config->get('client_id', ''),
      '#required' => TRUE,
    ];
    $form['client_secret'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client Secret'),
      '#default_value' => $config->get('client_secret', ''),
      '#required' => TRUE,
    ];
    $form['event_def_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Event Definition Key'),
      '#default_value' => $config->get('event_def_key', ''),
      '#required' => TRUE,
    ];
    $form['error_page_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Error Page URL'),
      '#default_value' => $config->get('error_page_url', ''),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->config('salesforce_integration.marketingcloud_integration.settings')
      // Set the submitted configuration setting.
      ->set('auth_api_url', $form_state->getValue('auth_api_url'))
      ->set('events_api_url', $form_state->getValue('events_api_url'))
      ->set('account_id', $form_state->getValue('account_id'))
      ->set('client_id', $form_state->getValue('client_id'))
      ->set('client_secret', $form_state->getValue('client_secret'))
      ->set('event_def_key', $form_state->getValue('event_def_key'))
      ->set('error_page_url', $form_state->getValue('error_page_url'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
