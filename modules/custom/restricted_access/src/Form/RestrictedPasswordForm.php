<?php

namespace Drupal\restricted_access\form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Restricted password form to see restricted pages.
 */
class RestrictedPasswordForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'restricted_password_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attributes']['class'][] = 'coh-style-a-restricted-password-form';
    $form['#cache'] = [
      'max-age' => 0,
      'contexts' => ['url.path', 'cookies:accessPageExpiry'],
    ];
    $form['restricted_div'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => ['restricted-wrapper'],
      ],
    ];
    $form['restricted_div']['restricted_password'] = [
      '#type' => 'password',
      '#required' => TRUE,
      '#maxlength' => 16,
      '#attributes' => [
        'placeholder' => $this->t('Enter password'),
      ],
    ];

    $form['restricted_div']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#attributes' => [
        'class' => ['coh-style-a-button-modal-restricted-access'],
      ],
    ];

    $form['restricted_div']['button'] = [
      '#type' => 'link',
      '#title' => $this->t('Cancel'),
      '#url' => Url::fromRoute('<front>'),
      '#attributes' => [
        'class' => ['coh-link', 'coh-style-button-modal-restricted-access-l'],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $password = $form_state->getValue('restricted_password');
    $config = \Drupal::config('restricted_access.url_settings');
    $restricted_access_password = $config->get('restricted_access_password');
    if ($password !== $restricted_access_password) {
      $form_state->setErrorByName('restricted_password', $this->t('Incorrect password.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    global $base_url;
    setcookie("accessPageExpiry", 'granted', time() + 86400, '/');
    $current_path = \Drupal::service('path.current')->getPath();
    $redirectPath = \Drupal::service('path_alias.manager')->getAliasByPath($current_path);
    return new RedirectResponse($base_url . $redirectPath, 303);
  }

}
