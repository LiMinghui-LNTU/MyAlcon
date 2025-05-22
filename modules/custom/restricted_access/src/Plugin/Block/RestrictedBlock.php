<?php

namespace Drupal\restricted_access\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Restricted Block' with a password field.
 *
 * @Block(
 *   id = "restricted_password_block",
 *   admin_label = @Translation("Restricted Block"),
 *   category = @Translation("Restricted password block")
 * )
 */
class RestrictedBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('restricted_access.url_settings');
    $restricted_access_page = $config->get('restricted_access_page');
    $restrictedAction = $config->get('restricted_access_action');
    $restricted_access_password = $config->get('restricted_access_password');

    $current_path = \Drupal::service('path.current')->getPath();
    $redirectPath = \Drupal::service('path_alias.manager')->getAliasByPath($current_path);
    $display_path = $this->getRestrictedAccessUrls();
    if ($restrictedAction == 'restrictedPopup') {
      if ((!isset($_COOKIE['accessPageExpiry']) || $_COOKIE['accessPageExpiry'] !== 'granted') && !empty($restricted_access_password)) {
        if (in_array($redirectPath, $display_path)) {
          $build = \Drupal::formBuilder()->getForm('Drupal\restricted_access\Form\RestrictedPasswordForm');
          $build['#cache'] = [
            'max-age' => 0,
            'contexts' => ['url.path', 'cookies:accessPageExpiry'],
          ];
          return $build;
        }
      }
    }
    return [];
  }

  /**
   * Implements getRestrictedAccessUrls().
   */
  public function getRestrictedAccessUrls() {
    // Getting restricted access url path from admin config section.
    $config = \Drupal::config('restricted_access.url_settings');
    $restricted_access_urls = $config->get('url_settings');
    $restricted_access_urls_arr = [];
    if (!empty($restricted_access_urls)) {
      $textAr = explode("\n", $restricted_access_urls);
      $node_arr = array_filter($textAr, 'trim');
      foreach ($node_arr as $item) {
        $restricted_access_urls_arr[] = trim($item);
      }
    }
    return $restricted_access_urls_arr;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge(): int {
    return 0;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts(): array {
    return [
      'url.path',
      'cookies:accessPageExpiry',
    ];
  }

}
