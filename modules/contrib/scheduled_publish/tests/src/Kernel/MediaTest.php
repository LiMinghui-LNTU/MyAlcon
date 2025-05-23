<?php

namespace Drupal\Tests\scheduled_publish\Kernel;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\media\Entity\Media;
use Drupal\scheduled_publish\Service\ScheduledPublishCron;
use Drupal\Tests\media\Kernel\MediaKernelTestBase;
use Drupal\workflows\Entity\Workflow;

/**
 * Test scheduled publishing of media.
 *
 * @package Drupal\Tests\scheduled_publish\Kernel
 * @group scheduled_publish
 */
class MediaTest extends MediaKernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'media',
    'file',
    'image',
    'taxonomy',
    'scheduled_publish',
    'content_moderation',
    'workflows',
    'datetime',
    'media_test_source',
  ];

  /**
   * The scheduled update service.
   *
   * @var \Drupal\scheduled_publish\Service\ScheduledPublishCron
   * */
  private ScheduledPublishCron $scheduledUpdateService;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->setInstallProfile('standard');
    $this->installConfig([
      'field',
      'system',
      'content_moderation',
      'scheduled_publish',
    ]);

    $this->installEntitySchema('media');
    $this->installEntitySchema('file');
    $this->installEntitySchema('user');
    $this->installEntitySchema('content_moderation_state');
    $this->installConfig('content_moderation');

    $this->scheduledUpdateService = \Drupal::service('scheduled_publish.update');
    $this->createScheduledPublishField();
  }

  /**
   * Creates a page media type to test with, ensuring that it's moderated.
   */
  protected function createScheduledPublishField(): void {
    $field_storage = FieldStorageConfig::create([
      'field_name' => 'field_scheduled_publish',
      'type' => 'scheduled_publish',
      'entity_type' => 'media',
    ]);

    $field_storage->save();

    FieldConfig::create([
      'entity_type' => 'media',
      'field_name' => 'field_scheduled_publish',
      'bundle' => $this->testMediaType->id(),
      'label' => 'Test field',
    ])->save();

    $workflow = Workflow::load('editorial');
    /** @var \Drupal\content_moderation\Plugin\WorkflowType\ContentModerationInterface $contentModeration */
    $contentModeration = $workflow->getTypePlugin();
    $contentModeration->addEntityTypeAndBundle('media', $this->testMediaType->id());
    $workflow->save();
  }

  /**
   * Test moderation state updates.
   */
  public function testUpdateModerationState(): void {

    $entity = Media::create([
      'bundle' => $this->testMediaType->id(),
      'title' => 'A',
      'field_media_test' => 'something',
    ]);

    $entity->moderation_state->value = 'draft';
    $entity->set('field_scheduled_publish', [
      'moderation_state' => 'published',
      'value' => '2007-12-24T18:21Z',
    ]);
    $entity->save();

    $id = $entity->id();

    self::assertTrue((bool) $id);

    $this->scheduledUpdateService->doUpdate();

    $loadedMedia = Media::load($id);

    self::assertEquals('published', $loadedMedia->moderation_state->value);
  }

  /**
   * Test future moderation state updates.
   */
  public function testUpdateModerationStateFuture(): void {

    $entity = Media::create([
      'bundle' => $this->testMediaType->id(),
      'title' => 'A',
      'field_media_test' => 'something',
    ]);

    $entity->moderation_state->value = 'draft';
    $entity->set('field_scheduled_publish', [
      'moderation_state' => 'published',
      'value' => '2100-12-24T18:21Z',
    ]);
    $entity->save();

    $id = $entity->id();

    self::assertTrue((bool) $id);

    $this->scheduledUpdateService->doUpdate();

    $loadedMedia = Media::load($id);

    self::assertEquals('draft', $loadedMedia->moderation_state->value);
  }

  /**
   * Test moderation state archive.
   */
  public function testUpdateModerationStateFutureWithMorePagesAndArchivedContent(): void {

    $entity = Media::create([
      'bundle' => $this->testMediaType->id(),
      'name' => 'A',
      'field_media_test' => 'something',
    ]);

    $entity->moderation_state->value = 'draft';
    $entity->set('field_scheduled_publish', [
      'moderation_state' => 'published',
      'value' => '2000-12-24T18:21Z',
    ]);
    $entity->save();

    $entity->moderation_state->value = 'published';
    $entity->set('field_scheduled_publish', [
      'moderation_state' => 'archived',
      'value' => '2000-12-24T18:21Z',
    ]);
    $entity->save();

    $this->scheduledUpdateService->doUpdate();

    $loadedEntity = Media::load($entity->id());

    self::assertEquals('archived', $loadedEntity->moderation_state->value);
  }

}
