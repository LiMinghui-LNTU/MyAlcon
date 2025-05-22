<?php

declare(strict_types=1);

namespace Drupal\config_revision\Entity;

use Drupal\Core\Entity\EditorialContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\Core\Field\Plugin\Field\FieldType\MapItem;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines a Config revision entity.
 *
 * @ContentEntityType(
 *   id = "config_revision",
 *   label = @Translation("Config revision"),
 *   label_singular = @Translation("Config revision"),
 *   label_plural = @Translation("Config revision"),
 *   label_count = @PluralTranslation(
 *     singular = "@count config revision",
 *     plural = "@count config revisions"
 *   ),
 *   label_collection = @Translation("Config Revisions"),
 *   bundle_entity_type = "config_revision_type",
 *   base_table = "config_revision",
 *   revision_table = "config_revision_revision",
 *   translatable = FALSE,
 *   entity_keys = {
 *     "id" = "id",
 *     "revision" = "revision_id",
 *     "uuid" = "uuid",
 *     "bundle" = "type",
 *     "label" = "name",
 *     "published" = "status",
 *     "owner" = "user_id"
 *   },
 *   revision_metadata_keys = {
 *     "revision_user" = "revision_user",
 *     "revision_created" = "revision_created",
 *     "revision_log_message" = "revision_log"
 *   },
 *   admin_permission = "administer config_revision",
 *   handlers = {
 *     "form" = {
 *       "edit" = "\Drupal\config_revision\Form\EntityForm",
 *       "default" = "\Drupal\config_revision\Form\EntityForm",
 *       "delete" = "\Drupal\Core\Entity\ContentEntityDeleteForm",
 *       "revision-revert" = "\Drupal\config_revision\Form\RevisionRevertForm",
 *       "revision-delete" = "\Drupal\Core\Entity\Form\RevisionDeleteForm",
 *     },
 *     "storage" = "\Drupal\config_revision\Storage",
 *     "access" = "\Drupal\config_revision\AccessControlHandler",
 *     "route_provider" = {
 *       "html" = "\Drupal\config_revision\RouteProvider",
 *       "revision" = "\Drupal\config_revision\RevisionRouteProvider",
 *     },
 *     "list_builder" = "\Drupal\config_revision\ListBuilder",
 *     "view_builder" = "\Drupal\Core\Entity\EntityViewBuilder",
 *     "views_data" = "\Drupal\config_revision\ViewsData",
 *   },
 *   links = {
 *     "collection" = "/admin/content/config-revision",
 *     "canonical" = "/config-revision/{config_revision}",
 *     "add-form" = "/config-revision/add",
 *     "edit-form" = "/config-revision/{config_revision}/edit",
 *     "delete-form" = "/config-revision/{config_revision}/delete",
 *     "version-history" = "/config-revision/{config_revision}/revisions",
 *     "revision" = "/config-revision/{config_revision}/revisions/{config_revision_revision}/view",
 *     "revision-revert-form" = "/config-revision/{config_revision}/revisions/{config_revision_revision}/revert",
 *     "revision-delete-form" = "/config-revision/{config_revision}/revisions/{config_revision_revision}/delete",
 *   },
 *   field_ui_base_route="entity.config_revision.collection"
 * )
 */
class ConfigRevision extends EditorialContentEntityBase implements ConfigRevisionInterface {

  use EntityOwnerTrait;
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {
    $fields = parent::baseFieldDefinitions($entity_type);
    $fields += static::ownerBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Config Name'))
      ->setDescription(new TranslatableMarkup('Name of the config entity.'))
      ->setRequired(TRUE)
      ->setRevisionable(TRUE)
      ->setSetting('max_length', 255);

    $fields['config'] = BaseFieldDefinition::create('map')
      ->setLabel(new TranslatableMarkup('The raw config entity data.'))
      ->setRequired(TRUE)
      ->setRevisionable(TRUE);

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(new TranslatableMarkup('Changed'))
      ->setDescription(new TranslatableMarkup('The time that the config was last updated.'));

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public static function loadConfigRevisionByConfigId(string $config_id) : ?ConfigRevisionInterface {
    /** @var \Drupal\config_revision\Entity\ConfigRevisionInterface[] $config_revisions */
    $configRevisionStorage = \Drupal::entityTypeManager()->getStorage('config_revision');
    $config_revisions = $configRevisionStorage->loadByProperties(['name' => $config_id]);
    return ($config_revisions) ? reset($config_revisions) : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfigMap(): MapItem {
    $config_map = $this->get('config')->first();
    assert($config_map instanceof MapItem);
    return $config_map;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfigRevisionType(): EntityReferenceItem {
    $type = $this->get('type')->first();
    assert($type instanceof EntityReferenceItem);
    return $type;
  }

}
