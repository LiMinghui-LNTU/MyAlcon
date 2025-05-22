<?php

namespace Drupal\event_hub\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\State\State;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an Event Hub form.
 */
class SettingsForm extends FormBase {

  /**
   * The State store.
   *
   * @var Drupal\Core\State\State
   *   The object State.
   */
  protected $state;

  /**
   * Constructor method.
   *
   * @param Drupal\Core\State\State $state
   *   The object State.
   */
  public function __construct(State $state) {
    $this->state = $state;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('state')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'event_hub_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['display_region'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Display Region'),
      '#description' => $this->t("You can uncheck this setting for local websites because Events for then won't take a global format."),
      '#default_value' => $this->state->get('event_hub.display_region', TRUE),
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->hasValue('display_region')) {
      $display_region = (bool) $form_state->getValue('display_region');
      $this->state->set('event_hub.display_region', $display_region);
    }
    drupal_flush_all_caches();
    $this->messenger()->addStatus($this->t('Settings were saved.'));
  }

}
