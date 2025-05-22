<?php

declare(strict_types=1);

namespace Drupal\config_revision;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\config_revision\Entity\ConfigRevision;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Entity hooks for config revision module.
 */
class EntityHooks implements ContainerInjectionInterface {
  use StringTranslationTrait;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * The time service.
   *
   * @var \Drupal\Component\Datetime\TimeInterface
   */
  protected $dateTime;

  /**
   * Constructs a new ConfigRevisionEntityHooks object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user.
   * @param \Drupal\Component\Datetime\TimeInterface $time
   *   The time service.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, AccountProxyInterface $current_user, TimeInterface $time) {
    $this->entityTypeManager = $entity_type_manager;
    $this->currentUser = $current_user;
    $this->dateTime = $time;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('current_user'),
      $container->get('datetime.time')
    );
  }

  /**
   * Implements hook_entity_postsave().
   *
   * @see config_revision_entity_insert()
   * @see config_revision_entity_update()
   */
  public function entityPostSave(EntityInterface $entity): void {
    $config_revision_type_storage = $this->entityTypeManager->getStorage('config_revision_type');
    if (!$config_revision_type_storage->load($entity->getEntityTypeId())) {
      return;
    }

    if (!$existing_revision = ConfigRevision::loadConfigRevisionByConfigId($entity->id())) {
      $config_revision = $this->entityTypeManager
        ->getStorage('config_revision')
        ->create([
          'name' => $entity->id(),
          'type' => $entity->getEntityTypeId(),
          'user_id' => $this->currentUser->id(),
        ]);
    }
    else {
      $config_revision = clone $existing_revision;
    }
    $config_revision->config = $entity->toArray();
    $label = $entity->label() ?? 'N/A';
    $config_revision->setRevisionUserId($this->currentUser->id())
      ->setRevisionCreationTime($this->dateTime->getCurrentTime())
      ->setRevisionLogMessage($this->t('A new revision is saved for %label', ['%label' => $label]))
      ->setNewRevision();
    $config_revision->save();
  }

  /**
   * Implements hook_entity_postdelete().
   *
   * @see config_revision_entity_delete()
   */
  public function entityPostDelete(EntityInterface $entity): void {
    $config_revision_type_storage = $this->entityTypeManager->getStorage('config_revision_type');
    if (!$config_revision_type_storage->load($entity->getEntityTypeId())) {
      return;
    }

    if (!$config_revision = ConfigRevision::loadConfigRevisionByConfigId($entity->id())) {
      return;
    }
    $config_revision->delete();
  }

}
