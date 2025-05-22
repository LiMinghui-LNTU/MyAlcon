<?php

declare(strict_types=1);

namespace Drupal\config_revision;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access control.
 */
class AccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account): AccessResult {
    if ($operation === 'view') {
      $admin_access = AccessResult::allowedIfHasPermission($account, 'administer config_revision');
      $view_access = AccessResult::allowedIf($entity->isPublished())
        ->andIf(AccessResult::allowedIfHasPermission($account, 'view config_revision'));
      return $admin_access->orIf($view_access);
    }
    if ($operation === 'view all revisions') {
      return AccessResult::allowedIfHasPermission($account, 'administer config_revision');
    }
    elseif ($operation === 'view revision') {
      return AccessResult::allowedIfHasPermission($account, 'administer config_revision');
    }
    elseif ($operation === 'revert') {
      return AccessResult::allowedIfHasPermission($account, 'administer config_revision');
    }
    elseif ($operation === 'delete revision') {
      return AccessResult::allowedIfHasPermission($account, 'administer config_revision');
    }
    else {
      return parent::checkAccess($entity, $operation, $account);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function createAccess($entity_bundle = NULL, ?AccountInterface $account = NULL, array $context = [], $return_as_object = FALSE) {
    $account = $this->prepareUser($account);

    if ($account->hasPermission('view config_revision')) {
      $result = AccessResult::allowed()->cachePerPermissions();
      return $return_as_object ? $result : $result->isAllowed();
    }

    return parent::createAccess($entity_bundle, $account, $context, $return_as_object);
  }

  /**
   * {@inheritdoc}
   */
  public function access(EntityInterface $entity, $operation, ?AccountInterface $account = NULL, $return_as_object = FALSE) {
    $account = $this->prepareUser($account);

    if ($account->hasPermission('view config_revision')) {
      $result = AccessResult::allowed()->cachePerPermissions();
      return $return_as_object ? $result : $result->isAllowed();
    }

    return parent::access($entity, $operation, $account, $return_as_object);
  }

}
