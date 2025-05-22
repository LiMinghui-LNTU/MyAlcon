<?php

namespace Drupal\trailing_slash\Helper\Url;

/**
 * Class TrailingSlashHelper. Provides base class to alter the path.
 *
 * @package Drupal\trailing_slash\Helper\Url
 */
class TrailingSlashHelper {

  /**
   * Add a slash at the end if you do not have one.
   *
   * @param string $path
   *   The path to validate.
   */
  public static function add(&$path) {
    $path = preg_replace('/((?:^|\\/)[^\\/\\.]+?)$/isD', '$1/', $path);
  }

}
