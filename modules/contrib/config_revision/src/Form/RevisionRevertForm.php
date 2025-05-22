<?php

declare(strict_types=1);

namespace Drupal\config_revision\Form;

use Drupal\Component\Diff\Diff;
use Drupal\config_revision\Entity\ConfigRevisionTypeInterface;
use Drupal\Core\Diff\DiffFormatter;
use Drupal\Core\Entity\Form\RevisionRevertForm as CoreRevisionRevertForm;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Revision revert form class.
 *
 * @property \Drupal\config_revision\Entity\ConfigRevisionInterface revision
 */
class RevisionRevertForm extends CoreRevisionRevertForm {

  /**
   * The diff formatter.
   *
   * @var \Drupal\Core\Diff\DiffFormatter
   */
  protected $diffFormatter;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->setDiffFormatter($container->get('diff.formatter'));
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $current = $this->entityTypeManager
      ->getStorage($this->revision->getEntityTypeId())
      ->load($this->revision->id());
    $from = explode("\n", Yaml::dump($current->getConfigMap()->toArray()));
    $to = explode("\n", Yaml::dump($this->revision->getConfigMap()->toArray()));
    $diff = new Diff($from, $to);
    $this->diffFormatter->show_header = FALSE;
    // Add the CSS for the inline diff.
    $form['#attached']['library'][] = 'system/diff';

    $form['diff'] = [
      '#type' => 'table',
      '#attributes' => [
        'class' => ['diff'],
      ],
      '#header' => [
        ['data' => $this->t('From'), 'colspan' => '2'],
        ['data' => $this->t('To'), 'colspan' => '2'],
      ],
      '#rows' => $this->diffFormatter->format($diff),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   *
   * @see \Drupal\Core\Config\Entity\ConfigEntityStorage::doSave
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config_revision_type = $this->revision->getConfigRevisionType()->entity;
    assert($config_revision_type instanceof ConfigRevisionTypeInterface);
    /** @var \Drupal\Core\Config\Entity\ConfigEntityTypeInterface $definition */
    $definition = $this->entityTypeManager
      ->getDefinition($config_revision_type->id());
    $prefix = $definition->getConfigPrefix() . '.';
    $id = $this->revision->label();
    $config_name = $prefix . $id;
    $config = $this->configFactory()->getEditable($config_name);
    $config->setData($this->revision->getConfigMap()->toArray());
    $config->save(TRUE);
    $this->entityTypeManager
      ->getStorage($config_revision_type->id())
      ->resetCache([$id]);
    parent::submitForm($form, $form_state);
  }

  /**
   * Sets the diff formatter for this form.
   *
   * @param \Drupal\Core\Diff\DiffFormatter $diff_formatter
   *   The diff formatter.
   *
   * @return $this
   */
  protected function setDiffFormatter(DiffFormatter $diff_formatter) {
    $this->diffFormatter = $diff_formatter;
    return $this;
  }

}
