<?php

namespace Drupal\trailing_slash\PathProcessor;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\PathProcessor\OutboundPathProcessorInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Routing\AdminContext;
use Drupal\Core\Url;
use Drupal\trailing_slash\Helper\Settings\TrailingSlashSettingsHelper;
use Drupal\trailing_slash\Helper\Url\TrailingSlashHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Trailing Slash Outbound Path Processor.
 *
 * @package Drupal\trailing_slash\PathProcessor
 */
class TrailingSlashOutboundPathProcessor implements OutboundPathProcessorInterface {

  /**
   * Var to collect which paths I'm checking to.
   *
   * Prevent maximum function nesting level.
   *
   * @var array
   */
  private $checkingPaths = [];

  /**
   * Var to collect which paths I checked before and.
   *
   * Prevent maximum function nesting level.
   *
   * @var array
   */
  private $checkedPaths = [];

  /**
   * {@inheritdoc}
   *
   * @var \Drupal\Core\Routing\AdminContext
   */
  protected $adminContext;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * TrailingSlashOutboundPathProcessor constructor.
   *
   * @param \Drupal\Core\Routing\AdminContext $admin_context
   *   Admin Context description.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity Type Manager Interface.
   */
  public function __construct(
    AdminContext $admin_context,
    EntityTypeManagerInterface $entity_type_manager
  ) {
    $this->adminContext = $admin_context;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function processOutbound($path, &$options = [], Request $request = NULL, BubbleableMetadata $bubbleable_metadata = NULL) {
    if ($this->isPathWithTrailingSlash($path, $options, $request, $bubbleable_metadata)) {
      TrailingSlashHelper::add($path);
    }
    return $path;
  }

  /**
   * Is Path With Trailing Slash.
   *
   * @param string $path
   *   Path description.
   * @param array $options
   *   Option Description.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   Http foundatin request.
   * @param \Drupal\Core\Render\BubbleableMetadata $bubbleable_metadata
   *   Bubbleable Meta data.
   *
   * @return bool
   *   Return boolean.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function isPathWithTrailingSlash($path, array &$options = [], Request $request = NULL, BubbleableMetadata $bubbleable_metadata = NULL) {
    $is_path_with_trailing_slash = FALSE;
    if (!in_array($path, $this->checkingPaths, TRUE)) {
      $this->checkingPaths[] = $path;
      if (
        TrailingSlashSettingsHelper::isEnabled()
        && $path !== '<front>'
        && !empty($path)
        && !$this->isAdminPath($path, $options)
        &&
        (
          $this->isPathInListWithTrailingSlash($path)
          || $this->isBundlePathWithTrailingSlash($path)
        )
      ) {
        $is_path_with_trailing_slash = TRUE;
      }
      $this->checkedPaths[$path] = $is_path_with_trailing_slash;
    }
    if (array_key_exists($path, $this->checkedPaths)) {
      return $this->checkedPaths[$path];
    }
    return FALSE;
  }

  /**
   * Is Admin Path.
   *
   * @param string $path
   *   Path description.
   * @param array $options
   *   Option Description.
   *
   * @return bool
   *   Return boolean.
   */
  public function isAdminPath($path, $options): bool {
    if (strpos($path, '/admin') === 0 || strpos($path, '/devel') === 0) {
      return TRUE;
    }
    if (!empty($options['route'])) {
      return $this->adminContext->isAdminRoute($options['route']);
    }
    return FALSE;
  }

  /**
   * Is Path In List With Trailing Slash.
   *
   * @param string $path
   *   Path description.
   *
   * @return bool
   *   Return boolean.
   */
  public function isPathInListWithTrailingSlash($path): bool {
    $paths = TrailingSlashSettingsHelper::getActivePaths();
    return in_array($path, $paths);
  }

  /**
   * Is bundle path with Trailing Slash.
   *
   * @param string $path
   *   Path description.
   *
   * @return bool
   *   Return boolean.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function isBundlePathWithTrailingSlash($path) {
    $active_bundles = TrailingSlashSettingsHelper::getActiveBundles();
    if (!empty($active_bundles)) {
      $url = Url::fromUri('internal:' . $path);
      try {
        if ($url->isRouted() && $params = $url->getRouteParameters()) {
          $entity_type = key($params);
          if (array_key_exists($entity_type, $active_bundles)) {
            $entity = $this->entityTypeManager->getStorage($entity_type)->load($params[$entity_type]);
            $bundle = $entity->bundle();
            if (isset($active_bundles[$entity_type][$bundle])) {
              return TRUE;
            }
          }
        }
      }
      catch (Exception $e) {
      }
    }
    return FALSE;
  }

}
