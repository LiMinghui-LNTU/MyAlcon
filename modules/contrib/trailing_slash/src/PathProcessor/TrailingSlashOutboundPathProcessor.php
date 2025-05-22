<?php

namespace Drupal\trailing_slash\PathProcessor;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\PathProcessor\OutboundPathProcessorInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Routing\AdminContext;
use Drupal\Core\Url;
use Drupal\trailing_slash\Helper\Settings\TrailingSlashSettingsHelper;
use Drupal\trailing_slash\Helper\Url\TrailingSlashHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TrailingSlashOutboundPathProcessor. Provides base class to check paths.
 *
 * @package Drupal\trailing_slash\PathProcessor
 */
class TrailingSlashOutboundPathProcessor implements OutboundPathProcessorInterface {

  /**
   * The collection of checking paths.
   *
   * @var array
   */
  private $checkingPaths = [];

  /**
   * The collection of checked paths.
   *
   * @var array
   */
  private $checkedPaths = [];

  /**
   * Returns the router.admin_context service.
   *
   * @var \Drupal\Core\Routing\AdminContext
   */
  protected $adminContext;

  /**
   * Returns the entity_type.manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Returns the path.matcher service.
   *
   * @var \Drupal\Core\Path\PathMatcherInterface
   */
  protected $pathMatcher;

  /**
   * Constructs a TrailingSlashOutboundPathProcessor object.
   *
   * @param \Drupal\Core\Routing\AdminContext $admin_context
   *   Provides a helper class to determine whether the route is an admin one.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Provides an interface for entity type managers.
   * @param \Drupal\Core\Path\PathMatcherInterface $path_matcher
   *   Provides an interface for URL path matchers.
   */
  public function __construct(AdminContext $admin_context, EntityTypeManagerInterface $entity_type_manager, PathMatcherInterface $path_matcher) {
    $this->adminContext = $admin_context;
    $this->entityTypeManager = $entity_type_manager;
    $this->pathMatcher = $path_matcher;
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
   * Helper to check path.
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
   * Helper to check admin path.
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
   * Helper to check path in list.
   */
  public function isPathInListWithTrailingSlash($path): bool {
    $paths = TrailingSlashSettingsHelper::getActivePaths();

    foreach ($paths as $url) {
      if ($this->pathMatcher->matchPath($path, $url)) {
        return TRUE;
      }
    }

    return FALSE;
  }

  /**
   * Helper to check bundle path.
   */
  public function isBundlePathWithTrailingSlash($path) {
    $active_bundles = TrailingSlashSettingsHelper::getActiveBundles();
    if (!empty($active_bundles)) {
      $url = Url::fromUri('internal:' . $path);

      try {
        if ($url->isRouted() && $params = $url->getRouteParameters()) {
          $entity_types = array_keys($params);

          foreach ($entity_types as $entity_type) {
            if (array_key_exists($entity_type, $active_bundles) &&
              $entity = $this->entityTypeManager->getStorage($entity_type)->load($params[$entity_type])
            ) {
              if (isset($active_bundles[$entity_type][$entity->bundle()])) {
                return TRUE;
              }
            }
          }
        }
      }
      catch (\Exception $e) {
      }
    }

    return FALSE;
  }

}
