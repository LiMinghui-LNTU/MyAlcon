<?php

namespace Drupal\trailing_slash\Helper\Url;

/**
 * Class Trailing Slash Helper.
 *
 * @package Drupal\trailing_slash\Helper\Url
 */
class TrailingSlashHelper {

  /**
   * Add a slash at the end if you do not have one.
   *
   * @param string $path
   *   Path Param.
   */
  public static function add(&$path) {
    $path = preg_replace('/((?:^|\\/)[^\\/\\.]+?)$/isD', '$1/', $path);
  }

}
