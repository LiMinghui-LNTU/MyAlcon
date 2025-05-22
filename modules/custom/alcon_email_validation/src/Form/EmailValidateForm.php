<?php

namespace Drupal\alcon_email_validation\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provide settings for adding API key & Error messages for email validation.
 */
class EmailValidateForm extends ConfigFormBase {

  /**
   * Implements FormBuilder::getFormId.
   */
  public function getFormId() {
    return 'alcon_email_validation_settings';
  }

  /**
   * Implements ConfigFormBase::getEditableConfigNames.
   */
  protected function getEditableConfigNames() {
    return ['alcon_email_validation.settings'];
  }

  /**
   * Safely get a configuration value.
   *
   * @param string $field
   *   The configuration field name.
   *
   * @return string
   *   The configuration value.
   */
  protected function safeGetConfigValue($field) {
    $value = $this->config('alcon_email_validation.settings')->get($field);
    if (is_array($value) && isset($value['default'])) {
      return $value['default'];
    }
    return $value;
  }

  /**
   * Implements FormBuilder::buildForm.
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $form['alcon_email_validation'] = [
      '#type'        => 'fieldset',
      '#title'       => $this->t('Add Email Validation Settings'),
    ];

    $form['alcon_email_validation']['api_key'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('<b>API</b> key'),
      '#description' => $this->t('You can find your API key in the BriteVerify account.'),
      '#required' => TRUE,
      '#default_value' => $this->safeGetConfigValue('api_key'),
    ];

    $form['alcon_email_validation']['error'] = [
      '#type'        => 'fieldset',
      '#title'       => $this->t('Email Validation Error Message Settings'),
    ];
    $form['alcon_email_validation']['error']['error_checkbox'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Generic error message to display'),
      '#default_value' => $this->safeGetConfigValue('error_checkbox'),
    ];

    $translatable_fields = [
      'generic_error' => $this->t('Generic invalid error message to display'),
      'address_invalid_error' => $this->t('Address invalid error message to display'),
      'domain_invalid_error' => $this->t('Domain invalid error message to display'),
      'account_invalid_error' => $this->t('Account invalid error message to display'),
    ];

    foreach ($translatable_fields as $field => $title) {
      $form['alcon_email_validation']['error'][$field] = [
        '#type'        => 'textfield',
        '#title'       => $title,
        '#description' => $this->t('You can specify your own error message to display.'),
        '#default_value' => $this->safeGetConfigValue($field),
      ];
    }

    $form['alcon_email_validation']['error']['generic_error']['#states'] = [
      'visible' => [
        ':input[name="error_checkbox"]' => ['checked' => TRUE],
      ],
    ];

    $invisible_state = [
      'visible' => [
        ':input[name="error_checkbox"]' => ['checked' => FALSE],
      ],
    ];

    $form['alcon_email_validation']['error']['address_invalid_error']['#states'] = $invisible_state;
    $form['alcon_email_validation']['error']['domain_invalid_error']['#states'] = $invisible_state;
    $form['alcon_email_validation']['error']['account_invalid_error']['#states'] = $invisible_state;

    return parent::buildForm($form, $form_state);
  }

  /**
   * Implements FormBuilder::submitForm().
   *
   * Serialize the user's settings and save it to the Drupal's config Table.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory()->getEditable('alcon_email_validation.settings');
    $values = $form_state->getValues();

    $config->set('api_key', $values['api_key'])
      ->set('error_checkbox', $values['error_checkbox']);

    $translatable_fields = [
      'generic_error',
      'address_invalid_error',
      'domain_invalid_error',
      'account_invalid_error',
    ];

    foreach ($translatable_fields as $field) {
      $current_value = $config->get($field);
      if (is_array($current_value)) {
        // Preserve existing translations and update the default value.
        $current_value['default'] = $values[$field];
        $config->set($field, $current_value);
      }
      else {
        // If it's not an array, set it as a new array with default value.
        $config->set($field, ['default' => $values[$field]]);
      }
    }

    $config->save();

    $this->messenger()->addStatus($this->t('Your Settings have been saved.'));
  }

}
