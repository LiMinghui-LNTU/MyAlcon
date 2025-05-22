<?php

namespace Drupal\alcon_email_validation\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class AlconEmailValidationTranslationForm has functions.
 *
 * @package Drupal\alcon_email_validation\Controller
 */
class AlconEmailValidationTranslationForm extends FormBase {

  /**
   * Config factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Pass in connector config by default to all events.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   Acquia Connector settings.
   * @param array $language_manager
   *   Language Manager.
   */
  public function __construct(ConfigFactoryInterface $config_factory, LanguageManagerInterface $language_manager) {
    $this->configFactory = $config_factory;
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('language_manager')
    );
  }

  /**
   * Getter method for Form ID.
   *
   * The form ID is used in implementations of hook_form_alter() to allow other
   * modules to alter the render array built by this form controller. It must be
   * unique site wide. It normally starts with the providing module's name.
   *
   * @return string
   *   The unique ID of the form defined by this class.
   */
  public function getFormId() {
    return 'alcon_email_validation_translation_form';
  }

  /**
   * Build the patient support form.
   *
   * A build form method constructs an array that defines how markup and
   * other form elements are included in an HTML form.
   *
   * @param array $form
   *   Default form array structure.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object containing current form state.
   * @param array $langcode
   *   Language code.
   *
   * @return array
   *   The render array defining the elements of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state, $langcode = NULL) {
    $config = $this->configFactory->getEditable('alcon_email_validation.settings');

    $form['langcode'] = [
      '#type' => 'value',
      '#value' => $langcode,
    ];

    $form['alcon_email_validation'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Translate Email Validation Settings'),
    ];

    $form['alcon_email_validation']['error'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Email Validation Error Message Settings'),
    ];

    $translatable_fields = [
      'generic_error' => $this->t('Generic invalid error message to display'),
      'address_invalid_error' => $this->t('Address invalid error message to display'),
      'domain_invalid_error' => $this->t('Domain invalid error message to display'),
      'account_invalid_error' => $this->t('Account invalid error message to display'),
    ];

    foreach ($translatable_fields as $field => $title) {
      $value = $config->get($field);
      $default_value = is_array($value) ? ($value[$langcode] ?? $value['default']) : $value;

      $form['alcon_email_validation']['error'][$field] = [
        '#type' => 'textfield',
        '#title' => $title,
        '#default_value' => $default_value,
      ];
    }

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save translations'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * Implements a form submit handler.
   *
   * The submitForm method is the default method called for any submit elements.
   *
   * @param array $form
   *   The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object describing the current state of the form.
   *
   * @throws \Exception
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $langcode = $form_state->getValue('langcode');
    $config = $this->configFactory->getEditable('alcon_email_validation.settings');

    $translatable_fields = [
      'generic_error',
      'address_invalid_error',
      'domain_invalid_error',
      'account_invalid_error',
    ];

    foreach ($translatable_fields as $field) {
      $value = $form_state->getValue($field);
      $current_value = $config->get($field);
      if (is_array($current_value)) {
        $current_value[$langcode] = $value;
      }
      else {
        $current_value = [
          'default' => $current_value,
          $langcode => $value,
        ];
      }
      $config->set($field, $current_value);
    }

    $config->save();

    $this->messenger()->addStatus($this->t('The translations have been saved.'));
  }

}
