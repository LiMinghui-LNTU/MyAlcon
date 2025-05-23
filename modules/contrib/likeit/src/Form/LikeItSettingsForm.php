<?php

namespace Drupal\likeit\Form;

use Drupal\Component\Utility\Crypt;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\ContentEntityTypeInterface;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Likeit module settings form.
 */
class LikeItSettingsForm extends ConfigFormBase {

  /**
   * The bundle info service.
   *
   * @var \Drupal\Core\Entity\EntityTypeBundleInfoInterface
   */
  protected $bundleInfoService;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'likeit.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'likeit_settings_form';
  }

  /**
   * Constructs a LikeItSettings object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Entity\EntityTypeBundleInfoInterface $bundle_info_service
   *   The bundle info service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(ConfigFactoryInterface $config_factory,
                              EntityTypeBundleInfoInterface $bundle_info_service,
                              EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($config_factory);
    $this->bundleInfoService = $bundle_info_service;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.bundle.info'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('likeit.settings');
    $form['target_entities'] = [
      '#type' => 'select',
      '#title' => $this->t('Target entities'),
      '#required' => TRUE,
      '#description' => $this->t('Select the entity content to allow users like it.'),
      '#default_value' => $config->get('target_entities'),
      '#options' => $this->getTargetEntities(),
      '#multiple' => TRUE,
      '#size' => 15,
    ];

    $form['widget_type'] = [
      '#type' => 'select',
      '#title' => $this->t('Widget type'),
      '#required' => TRUE,
      '#description' => $this->t('<b>Default</b> is with "Like/Unlike" text and count, <b>Widget 2</b> is with ♥ and count.'),
      '#default_value' => $config->get('widget_type'),
      '#options' => [
        'likeit' => $this->t('Default'),
        'likeit_widget_2' => $this->t('Widget 2')
      ],
    ];

    $form['after_owner_deletion'] = [
      '#type' => 'select',
      '#title' => $this->t('Set Likeit to'),
      '#required' => TRUE,
      '#description' => $this->t('Select action after Likeit content owner account deletion.'),
      '#default_value' => $config->get('after_owner_deletion'),
      '#options' => [
        'delete' => $this->t('Delete Likeit content.'),
        'set_to_anonymous' => $this->t('Set owner to Anonymous user'),
      ],
    ];

    // Check the token to set parameters for settings form.
    if ($this->isTokenSeedSet()) {
      $markup = $this->t('The token seed is set. But you can generate new one if you want.');
      $required = FALSE;
    }
    else {
      $markup = '';
      $required = TRUE;
    }

    $form['token_seed_generate'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Generate new token seed.'),
      '#description' => $this->t('This token seed is needed to prevent CSRF attacks.'),
      '#prefix' => '<strong>' . $markup . '</strong>',
      '#required' => $required,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $config = $this->config('likeit.settings');

    $config
      ->set('target_entities', $form_state->getValue('target_entities'))
      ->set('after_owner_deletion', $form_state->getValue('after_owner_deletion'))
      ->set('widget_type', $form_state->getValue('widget_type'))
      ->save();

    if ($form_state->getValue('token_seed_generate')) {
      $config
        ->set('token_seed', Crypt::randomBytesBase64())
        ->save();
    }
  }

  /**
   * Return list of entity type and bundles options.
   *
   * @return array
   *   Options list.
   */
  public function getTargetEntities() {
    $entities = [];
    $entity_type_definitions = $this->entityTypeManager->getDefinitions();
    foreach ($entity_type_definitions as $definition) {
      if ($definition instanceof ContentEntityTypeInterface
        // Only entity types with field ui are needed.
        && $definition->get('field_ui_base_route')) {
        $entities[] = $definition->id();
      }
    }

    $options = [];

    foreach ($entities as $type) {
      $options[$type] = [];
      $bundles = $this->bundleInfoService->getBundleInfo($type);
      if (!empty($bundles)) {
        $op = [];
        foreach ($bundles as $key => $bundle) {
          $op[$type . ':' . $key] = $bundle['label'] ?? '';
        }

        $options[$type] = $op;
      }

    }
    return $options;
  }

  /**
   * Checks the token seed.
   *
   * @return bool
   *   TRUE if the token seed exists and FALSE otherwise.
   */
  public function isTokenSeedSet() {
    return (bool) $this->config('likeit.settings')->get('token_seed');
  }

}
