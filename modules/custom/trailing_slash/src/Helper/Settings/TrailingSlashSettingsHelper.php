<?php

namespace Drupal\trailing_slash\Helper\Settings;

use Drupal\Core\Entity\ContentEntityType;

/**
 * Class Trailing Slash Settings Helper.
 *
 * @package Drupal\trailing_slash\Helper\Settings
 */
class TrailingSlashSettingsHelper {

  /**
   * {@inheritdoc}
   *
   * @return bool
   *   Return bool.
   */
  public static function isEnabled(): bool {
    static $enabled;
    if (!isset($is_enabled)) {
      $config = \Drupal::config('trailing_slash.settings');
      $enabled = $config->get('enabled');
    }
    return $enabled;
  }

  /**
   * {@inheritdoc}
   *
   * @return array
   *   Return array.
   */
  public static function getActiveBundles(): array {
    static $bundles;
    if (!isset($bundles)) {
      $bundles = [];
      $config = \Drupal::config('trailing_slash.settings');
      $enabled_entity_types = unserialize($config->get('enabled_entity_types'), ['allowed_classes' => FALSE]);
      foreach ($enabled_entity_types as $entity_type_key => $entity_type) {
        $enabled_bundles = array_filter($entity_type);
        if (!empty($enabled_bundles)) {
          $bundles[$entity_type_key] = $enabled_bundles;
        }
      }
    }
    return $bundles;
  }

  /**
   * {@inheritdoc}
   *
   * @return array
   *   Return array.
   */
  public static function getActivePaths() {
    static $active_paths;
    if (!isset($active_paths)) {
      $config = \Drupal::config('trailing_slash.settings');
      $paths = $config->get('paths');
      $active_paths = explode("\n", str_replace("\r\n", "\n", $paths));
    }
    return $active_paths;
  }

  /**
   * {@inheritdoc}
   *
   * @return \Drupal\Core\Entity\ContentEntityTypeInterface[]
   *   Return.
   */
  public static function getContentEntityTypes(): array {
    static $content_entity_type;
    if (!isset($content_entity_type)) {
      $entities = \Drupal::entityTypeManager()->getDefinitions();
      $content_entity_type = [];
      foreach ($entities as $entity_type_id => $entity_type) {
        if ($entity_type instanceof ContentEntityType) {
          $content_entity_type[$entity_type_id] = $entity_type;
        }
      }
    }
    return $content_entity_type;
  }

}
