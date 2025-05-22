<?php

declare(strict_types=1);

namespace Drupal\config_revision\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\MapItem;
use Drupal\user\EntityOwnerInterface;

/**
 * The interface for Config revision entity.
 */
interface ConfigRevisionInterface extends ContentEntityInterface, EntityChangedInterface, RevisionLogInterface, EntityOwnerInterface, EntityPublishedInterface {

  /**
   * Gets the config_revision type.
   *
   * @return \Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem
   *   The config_revision type.
   */
  public function getConfigRevisionType();

  /**
   * Returns the config entity map.
   *
   * @return \Drupal\Core\Field\Plugin\Field\FieldType\MapItem
   *   The config entity map.
   */
  public function getConfigMap() : MapItem;

  /**
   * Loads an config_revision by config ID.
   *
   * @param string $config_id
   *   The config ID of the entity to load.
   *
   * @return static|null
   *   The config_revision, or NULL if there is no event with the given ID.
   */
  public static function loadConfigRevisionByConfigId(string $config_id): ?ConfigRevisionInterface;

}
