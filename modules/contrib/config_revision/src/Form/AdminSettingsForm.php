<?php

declare(strict_types=1);

namespace Drupal\config_revision\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\TypedConfigManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Construct the admin settings form.
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new admin settings.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Config\TypedConfigManagerInterface $typed_config_manager
   *   The config manager.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    EntityTypeManagerInterface $entity_type_manager,
    TypedConfigManagerInterface $typed_config_manager,
  ) {
    parent::__construct($config_factory, $typed_config_manager);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): AdminSettingsForm {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager'),
      $container->get('config.typed')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['config_revision.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'config_revision_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('config_revision.settings');

    $definitions = array_filter($this->entityTypeManager->getDefinitions(), function (EntityTypeInterface $definition) {
      return $definition->entityClassImplements(ConfigEntityInterface::class);
    });

    $entity_types = array_map(function (EntityTypeInterface $definition) {
      return $definition->getLabel();
    }, $definitions);

    // Sort the entity types by label, then add the simple config to the top.
    uasort($entity_types, 'strnatcasecmp');

    $default_entity_types = $config->get('enabled_entity_types') ?? [];

    $form['enabled_entity_types'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Select revisionable config entities'),
      '#options' => $entity_types,
      '#default_value' => $default_entity_types,
      '#size' => 6,
    ];

    return parent::buildForm($form, $form_state);

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $config = $this->config('config_revision.settings');
    $old_enabled_entity_types = $config->get('enabled_entity_types');
    $new_enabled_entity_types = array_filter($form_state->getValue('enabled_entity_types'));
    sort($new_enabled_entity_types);
    $config->set('enabled_entity_types', $new_enabled_entity_types);
    $config->save();
    $this->createConfigRevisionType($old_enabled_entity_types, $new_enabled_entity_types);
    parent::submitForm($form, $form_state);
  }

  /**
   * Create or remove config revision type.
   *
   * @param array $old_enabled_entity_types
   *   The old enabled entity types.
   * @param array $new_enabled_entity_types
   *   The new enabled entity types.
   */
  protected function createConfigRevisionType(array $old_enabled_entity_types, array $new_enabled_entity_types): void {
    $config_revision_type_storage = $this->entityTypeManager->getStorage('config_revision_type');
    // Delete the config revision type which are not selected anymore.
    foreach (array_diff($old_enabled_entity_types, $new_enabled_entity_types) as $disabled_entity_type) {
      $config_revision_type = $config_revision_type_storage->load($disabled_entity_type);
      $config_revision_type->delete();
    }
    // Create the config revision type which are newly selected.
    foreach (array_diff($new_enabled_entity_types, $old_enabled_entity_types) as $enabled_entity_type) {
      $config_revision_type = $config_revision_type_storage->create([
        'id' => $enabled_entity_type,
        'label' => $this->entityTypeManager->getDefinition($enabled_entity_type)->getLabel(),
        'description' => '',
      ]);
      $config_revision_type->save();
    }
  }

}
