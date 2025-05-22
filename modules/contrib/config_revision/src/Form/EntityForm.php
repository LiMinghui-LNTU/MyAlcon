<?php

declare(strict_types=1);

namespace Drupal\config_revision\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Entity form class.
 */
class EntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state): int {
    $entity = $this->entity;
    $inserted = $entity->isNew();
    $status = parent::save($form, $form_state);
    $logContext = ['%title' => $entity->label()];
    $tArgs = ['%title' => $entity->toLink()->toString()];

    if ($inserted) {
      $this->logger('config_revision')->notice('Added %title.', $logContext);
      $this->messenger()->addStatus($this->t('%title has been created.', $tArgs));
      return $status;
    }
    $this->logger('config_revision')->notice('Updated %title.', $logContext);
    $this->messenger()->addStatus($this->t('%title has been updated.', $tArgs));
    return $status;
  }

}
