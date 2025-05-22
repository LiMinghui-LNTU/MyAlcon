<?php

declare(strict_types=1);

namespace Drupal\config_revision;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\RevisionHtmlRouteProvider;
use Symfony\Component\Routing\Route;

/**
 * Revision route provider.
 */
class RevisionRouteProvider extends RevisionHtmlRouteProvider {

  /**
   * {@inheritdoc}
   */
  protected function getVersionHistoryRoute(EntityTypeInterface $entity_type): ?Route {
    $route = parent::getVersionHistoryRoute($entity_type);
    $route->setRequirement('_permission', 'administer config_revision');
    $route->setOption('_admin_route', 'TRUE');
    return $route;
  }

  /**
   * {@inheritdoc}
   */
  protected function getRevisionViewRoute(EntityTypeInterface $entity_type): ?Route {
    $route = parent::getRevisionViewRoute($entity_type);
    $route->setOption('_admin_route', 'TRUE');
    return $route;
  }

  /**
   * {@inheritdoc}
   */
  protected function getRevisionRevertRoute(EntityTypeInterface $entity_type): ?Route {
    $route = parent::getRevisionRevertRoute($entity_type);
    $route->setOption('_admin_route', 'TRUE');
    return $route;
  }

}
