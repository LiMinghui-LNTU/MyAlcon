<?php

declare(strict_types=1);

namespace Drupal\Tests\config_revision\Kernel;

use Drupal\config_revision\Entity\ConfigRevision;
use Drupal\KernelTests\Core\Entity\EntityKernelTestBase;

/**
 * Tests the config_revision entity.
 *
 * @group config_revision
 */
class ConfigRevisionEntityTest extends EntityKernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'config_revision',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installConfig('config_revision');
    $this->installEntitySchema('config_revision');
    $config = $this->config('config_revision.settings');
    $config->set('enabled_entity_types', [
      'entity_form_display',
      'entity_view_display',
    ]);
    $config->save();

    $config_revision_type_storage = $this->entityTypeManager->getStorage('config_revision_type');
    $entity_form_display_config_revision_type = $config_revision_type_storage->create([
      'id' => 'entity_form_display',
      'label' => 'Entity form display',
      'description' => '',
    ]);
    $entity_form_display_config_revision_type->save();
    $entity_view_display_config_revision_type = $config_revision_type_storage->create([
      'id' => 'entity_view_display',
      'label' => 'Entity view display',
      'description' => '',
    ]);
    $entity_view_display_config_revision_type->save();
  }

  /**
   * Tests the config revision entity.
   */
  public function testConfigRevisionEntity() {
    $entity_type = $bundle = 'entity_test';
    // Save a config entity.
    /** @var \Drupal\Core\Entity\Display\EntityFormDisplayInterface $entity_form_display */
    $entity_form_display = \Drupal::service('entity_display.repository')
      ->getFormDisplay($entity_type, $bundle);
    $entity_form_display->save();
    $entity_form_display_id = $entity_form_display->id();
    $entity_form_display_revision = ConfigRevision::loadConfigRevisionByConfigId($entity_form_display_id);
    $this->assertNotNull($entity_form_display_revision);
    $this->assertEquals($entity_form_display_revision->config->id, $entity_form_display_id, 'Form mode revision has same config ID as form mode config ID.');
    $this->assertSame($entity_form_display_revision->getConfigMap()->toArray(), $entity_form_display->toArray(), 'Form mode revision has same config values as form mode config entity.');

    // Save another config entity.
    /** @var \Drupal\Core\Entity\Display\EntityViewDisplayInterface $entity_view_display */
    $entity_view_display = \Drupal::service('entity_display.repository')
      ->getViewDisplay($entity_type, $bundle);
    $entity_view_display->save();
    $entity_view_display_id = $entity_view_display->id();
    $entity_view_display_revision = ConfigRevision::loadConfigRevisionByConfigId($entity_view_display_id);
    $this->assertNotNull($entity_view_display_revision);
    $this->assertEquals($entity_view_display_revision->config->id, $entity_view_display_id, 'Form mode revision has same config ID as form mode config ID.');
    $this->assertSame($entity_view_display_revision->getConfigMap()->toArray(), $entity_view_display->toArray(), 'View mode revision has same config values as view mode config entity.');

    // Save a form mode revision.
    $entity_form_display->setStatus(FALSE)
      ->save();
    $entity_form_display_revision_2 = ConfigRevision::loadConfigRevisionByConfigId($entity_form_display_id);
    $this->assertSame($entity_form_display_revision_2->getConfigMap()->toArray(), $entity_form_display->toArray(), 'Form mode revision has same config values as form mode config entity.');
    $this->assertEquals($entity_form_display_revision_2->id(), $entity_form_display_revision->id(), 'Both form mode revisions have same ID.');
    $this->assertEquals($entity_form_display_revision_2->label(), $entity_form_display_revision->label(), 'Both form mode revisions have same name.');
    $this->assertNotEquals($entity_form_display_revision_2->getRevisionId(), '$entity_form_display_revision->getRevisionId(), Both form mode revisions have different revision ID');
    $this->assertNotSame($entity_form_display_revision_2->getConfigMap()->toArray(), $entity_form_display_revision->getConfigMap()->toArray(), 'Both form mode revisions are not the same.');

    // Save a view mode revision.
    $entity_view_display->setStatus(FALSE)
      ->save();
    $entity_view_display_revision_2 = ConfigRevision::loadConfigRevisionByConfigId($entity_view_display_id);
    $this->assertSame($entity_view_display_revision_2->getConfigMap()->toArray(), $entity_view_display->toArray(), 'View mode revision has same config values as view mode config entity.');
    $this->assertEquals($entity_view_display_revision_2->id(), $entity_view_display_revision->id(), 'Both view mode revisions have same ID.');
    $this->assertEquals($entity_view_display_revision_2->label(), $entity_view_display_revision->label(), 'Both view mode revisions have same name.');
    $this->assertNotEquals($entity_view_display_revision_2->getRevisionId(), $entity_view_display_revision->getRevisionId(), 'Both view mode revisions have different revision ID');
    $this->assertNotSame($entity_view_display_revision_2->getConfigMap()->toArray(), $entity_view_display_revision->getConfigMap()->toArray(), 'Both view mode revisions are not the same.');

    // Test delete.
    $entity_form_display->delete();
    $entity_form_display_revision = ConfigRevision::loadConfigRevisionByConfigId($entity_form_display_id);
    $this->assertNull($entity_form_display_revision);
    $entity_view_display->delete();
    $entity_view_display_revision = ConfigRevision::loadConfigRevisionByConfigId($entity_view_display_id);
    $this->assertNull($entity_view_display_revision);
  }

}
