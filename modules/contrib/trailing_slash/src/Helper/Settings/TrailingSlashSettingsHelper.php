<?php

namespace Drupal\trailing_slash\Helper\Settings;

use Drupal\Core\Entity\ContentEntityType;

/**
 * Class TrailingSlashSettingsHelper. Provides base class to get configs.
 *
 * @package Drupal\trailing_slash\Helper\Settings
 */
class TrailingSlashSettingsHelper {

  /**
   * Helper to check if configs are enabled.
   *
   * @return bool
   *   The config state.
   */
  public static function isEnabled(): bool {
    static $enabled;
    if (!isset($enabled)) {
      $config = \Drupal::config('trailing_slash.settings');
      $enabled = $config->get('enabled');
    }
    return $enabled;
  }

  /**
   * Helper to get active bundles.
   *
   * @return array
   *   An array of bundles.
   */
  public static function getActiveBundles(): array {
    static $bundles;
    if (!isset($bundles)) {
      $bundles = [];
      $config = \Drupal::config('trailing_slash.settings');
      $enabled_entity_types = unserialize($config->get('enabled_entity_types'));
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
   * Helper to get active paths.
   *
   * @return array
   *   An array of URLs.
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
   * Helper to get content entity types.
   *
   * @return \Drupal\Core\Entity\ContentEntityTypeInterface[]
   *   An array of content entity types.
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
