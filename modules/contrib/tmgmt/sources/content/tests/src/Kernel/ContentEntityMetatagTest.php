<?php

namespace Drupal\Tests\tmgmt_content\Kernel;

use Drupal\entity_test\Entity\EntityTestMul;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;

/**
 * Content entity Source unit tests.
 *
 * @group tmgmt
 */
class ContentEntityMetatagTest extends ContentEntityTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['token', 'metatag', 'metatag_favicons'];

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    $field_storage = FieldStorageConfig::create(array(
      'field_name' => 'field_meta_tags',
      'entity_type' => $this->entityTypeId,
      'type' => 'metatag',
      'cardinality' => 1,
      'translatable' => TRUE,
    ));
    $field_storage->save();
    FieldConfig::create(array(
      'entity_type' => $this->entityTypeId,
      'field_storage' => $field_storage,
      'bundle' => $this->entityTypeId,
      'label' => 'Meta tags',
    ))->save();

    $this->installConfig(['metatag']);
  }

  /**
   * Tests the metatag integration.
   */
  public function testMetatagsField() {
    // Create an english test entity.
    $values = [
      'langcode' => 'en',
      'user_id' => 1,
      'name' => 'Test entity',
      'field_meta_tags' => [
        'value' => [
          'description' => 'The description',
          'robots' => 'noindex,nofollow',
          'referrer' => 'origin',
          'title' => 'The title',
          'mask_icon' => [
            'href' => 'https://example.org/mask.svg',
            'color' => '',
          ]
        ],
      ],
    ];
    $entity_test = EntityTestMul::create($values);
    $entity_test->save();

    $job = tmgmt_job_create('en', 'de');
    $job->translator = 'test_translator';
    $job->save();
    $job_item = tmgmt_job_item_create('content', $this->entityTypeId, $entity_test->id(), array('tjid' => $job->id()));
    $job_item->save();

    $source_plugin = $this->container->get('plugin.manager.tmgmt.source')->createInstance('content');
    $data = $source_plugin->getData($job_item);

    // Test the expected structure of the metatags field.
    $this->assertArrayNotHasKey('metatag', $data);
    $expected_field_data = [
      'basic' => [
        '#label' => 'Basic tags',
        'description' => [
          '#translate' => TRUE,
          '#text' => 'The description',
          '#label' => 'Description',
        ],
        'title' => [
          '#translate' => TRUE,
          '#text' => 'The title',
          '#label' => 'Page title',
        ],
      ],
      'advanced' => [
        '#label' => 'Advanced',
        'robots' => [
          '#translate' => FALSE,
          '#text' => 'noindex,nofollow',
          '#label' => 'Robots',
        ],
        'referrer' => [
          '#translate' => FALSE,
          '#text' => 'origin',
          '#label' => 'Referrer policy',
        ],
      ],
      'favicons' => [
        '#label' => 'Favicons & touch icons',
        'mask_icon' => [
          '#translate' => FALSE,
          '#text' => [
            'href' => 'https://example.org/mask.svg',
            'color' => '',
          ],
          '#label' => 'Mask icon (SVG)',
        ],
      ],
      '#label' => 'Meta tags',
    ];
    $this->assertEquals($expected_field_data, $data['field_meta_tags']);

    // Now request a translation and save it back.
    $job->requestTranslation();
    $items = $job->getItems();
    $item = reset($items);
    $item->acceptTranslation();
    $data = $item->getData();

    // Check that the translations were saved correctly.
    $entity_test = EntityTestMul::load($entity_test->id());
    $translation = $entity_test->getTranslation('de');
    $this->assertEquals($translation->name->value, $data['name'][0]['value']['#translation']['#text']);

    if (function_exists('metatag_data_decode')) {
      $translated_meta_tags = metatag_data_decode($translation->get('field_meta_tags')->value);
    }
    else {
      $translated_meta_tags = unserialize($translation->get('field_meta_tags')->value);
    }
    $expected_meta_tags = [
      'description' => 'de(de-ch): The description',
      'mask_icon' => [
        'href' => 'https://example.org/mask.svg',
        'color' => '',
      ],
      'referrer' => 'origin',
      'robots' => 'noindex,nofollow',
      'title' => 'de(de-ch): The title',
    ];
    $this->assertSame($expected_meta_tags, $translated_meta_tags);

    // Test an entity without metatag data.
    // Create an english test entity.
    $values = [
      'langcode' => 'en',
      'user_id' => 1,
      'name' => 'Test entity empty',
    ];
    $entity_test2 = EntityTestMul::create($values);
    $entity_test2->save();

    $job = tmgmt_job_create('en', 'de');
    $job->translator = 'test_translator';
    $job->save();
    $job_item = tmgmt_job_item_create('content', $this->entityTypeId, $entity_test2->id(), array('tjid' => $job->id()));
    $job_item->save();

    $this->assertEquals([], $job_item->getData(['field_meta_tags']));
  }

}
