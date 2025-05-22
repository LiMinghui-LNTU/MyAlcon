<?php

declare(strict_types=1);

namespace Drupal\config_revision\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the config revision type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "config_revision_type",
 *   label = @Translation("Config Revision Type"),
 *   handlers = {
 *     "access" = "\Drupal\Core\Entity\EntityAccessControlHandler",
 *     "form" = {
 *       "default" = "\Drupal\Core\Entity\BundleEntityFormBase",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer config_revision type",
 *   config_prefix = "type",
 *   bundle_of = "config_revision",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *   }
 * )
 */
class ConfigRevisionType extends ConfigEntityBundleBase implements ConfigRevisionTypeInterface {

  /**
   * The machine name.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name.
   *
   * @var string
   */
  protected $label;

  /**
   * The description.
   *
   * @var string
   */
  protected $description;

  /**
   * {@inheritdoc}
   */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function setDescription($description): ConfigRevisionTypeInterface {
    $this->description = $description;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    parent::calculateDependencies();
    $this->addDependency('module', $this->entityTypeManager()
      ->getDefinition($this->id())
      ->getProvider());
    return $this;
  }

}
