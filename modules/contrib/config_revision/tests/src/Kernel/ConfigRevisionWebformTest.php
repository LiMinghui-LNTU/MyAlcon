<?php

declare(strict_types=1);

namespace Drupal\Tests\config_revision\Kernel;

use Drupal\config_revision\Entity\ConfigRevision;
use Drupal\KernelTests\Core\Entity\EntityKernelTestBase;
use Drupal\webform\Entity\Webform;

/**
 * Tests the webform config_revision.
 *
 * @group config_revision
 */
class ConfigRevisionWebformTest extends EntityKernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'config_revision',
    'webform',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installSchema('webform', ['webform']);
    $this->installSchema('user', ['users_data']);
    $this->installConfig(['webform', 'config_revision']);
    $this->installEntitySchema('webform_submission');
    $this->installEntitySchema('config_revision');
    $config = $this->config('config_revision.settings');
    $config->set('enabled_entity_types', ['webform']);
    $config->save();

    $config_revision_type_storage = $this->entityTypeManager->getStorage('config_revision_type');
    $webform_config_revision_type = $config_revision_type_storage->create([
      'id' => 'webform',
      'label' => 'Webform',
      'description' => '',
    ]);
    $webform_config_revision_type->save();
  }

  /**
   * Tests the config revision for webform.
   */
  public function testConfigRevisionWebform() {
    // Create webform.
    /** @var \Drupal\webform\WebformInterface $webform */
    $webform = Webform::create(['id' => 'webform_test']);
    $webform->setStatus(TRUE);
    $webform->save();
    $webform_revision = ConfigRevision::loadConfigRevisionByConfigId('webform_test');
    $this->assertNotNull($webform_revision);
    $this->assertEquals($webform_revision->config->id, 'webform_test', 'Webform revision has same config ID as webform.');
    $this->assertSame($webform_revision->getConfigMap()->toArray(), $webform->toArray(), 'Webform revision has same config values as webform.');

    // Save a webform revision.
    $elements = [
      'root' => [
        '#type' => 'textfield',
        '#title' => 'root',
      ],
      'container' => [
        '#type' => 'container',
        '#title' => 'container',
        'child' => [
          '#type' => 'textfield',
          '#title' => 'child',
          '#default_value' => '{default value}',
        ],
      ],
    ];
    $webform->setElements($elements);
    $webform->save();
    $webform_revision_2 = ConfigRevision::loadConfigRevisionByConfigId('webform_test');
    $this->assertSame($webform_revision_2->getConfigMap()->toArray(), $webform->toArray(), 'Webform revision has same config values as webform config entity.');
    $this->assertEquals($webform_revision_2->id(), $webform_revision->id(), 'Both webform revisions have same ID.');
    $this->assertEquals($webform_revision_2->label(), $webform_revision->label(), 'Both webform revisions have same name.');
    $this->assertNotEquals($webform_revision_2->getRevisionId(), '$webform_revision->getRevisionId(), Both webform revisions have different revision ID');
    $this->assertNotSame($webform_revision_2->getConfigMap()->toArray(), $webform_revision->getConfigMap()->toArray(), 'Both webform revisions are not the same.');

    // Test delete.
    $webform->delete();
    $webform_revision = ConfigRevision::loadConfigRevisionByConfigId('webform_test');
    $this->assertNull($webform_revision);
  }

}
