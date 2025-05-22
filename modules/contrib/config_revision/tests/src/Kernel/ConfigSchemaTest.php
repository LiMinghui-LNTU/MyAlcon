<?php

declare(strict_types=1);

namespace Drupal\Tests\config_revision\Kernel;

use Drupal\config_revision\Entity\ConfigRevisionType;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Tests\SchemaCheckTestTrait;
use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the config_revision config schema.
 *
 * @group config_revision
 */
class ConfigSchemaTest extends KernelTestBase {

  use SchemaCheckTestTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'config_revision',
    'system',
    'user',
  ];

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The typed config manager.
   *
   * @var \Drupal\Core\Config\TypedConfigManagerInterface
   */
  protected $typedConfig;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installEntitySchema('user');
    $this->installEntitySchema('config_revision');
    $this->entityTypeManager = $this->container->get('entity_type.manager');
    $this->typedConfig = $this->container->get('config.typed');
  }

  /**
   * Tests the config schema.
   */
  public function testConfigSchema() {
    $definitions = array_filter($this->entityTypeManager->getDefinitions(), function (EntityTypeInterface $definition) {
      return $definition->entityClassImplements(ConfigEntityInterface::class);
    });
    $config = $this->config('config_revision.settings');
    $this->assertNotNull($definitions);
    $config->set('enabled_entity_types', array_keys($definitions));
    $this->assertConfigSchema($this->typedConfig, $config->getName(), $config->get());
  }

  /**
   * Tests the config_revision type schema.
   */
  public function testConfigRevisionTypeSchema() {
    $definitions = array_filter($this->entityTypeManager->getDefinitions(), function (EntityTypeInterface $definition) {
      return $definition->entityClassImplements(ConfigEntityInterface::class);
    });
    $this->assertNotNull($definitions);
    foreach ($definitions as $entity_type => $definition) {
      $config_revision_type = ConfigRevisionType::create([
        'id' => $entity_type,
        'label' => $definition->getLabel(),
        'description' => '',
      ]);
      $config_revision_type->save();
      $config = $this->config("config_revision.type.$entity_type");
      $this->assertConfigSchema($this->typedConfig, $config->getName(), $config->get());
    }
  }

}
