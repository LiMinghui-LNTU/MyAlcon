<?php

declare(strict_types=1);

namespace Drupal\config_revision;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * The List builder.
 */
class ListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader(): array {
    $header = [];
    $header['entity'] = $this->t('Label');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity): array {
    /** @var \Drupal\dcs_event\Entity\EventInterface $entity */
    $row = [];

    $row['entity'] = $entity->toLink();

    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function getDefaultOperations(EntityInterface $entity) {
    $operations = parent::getDefaultOperations($entity);
    unset($operations['edit']);
    $operations['revisions'] = [
      'title' => $this->t('Revisions'),
      'url' => $entity->toUrl('version-history'),
    ];
    return $operations;
  }

}
