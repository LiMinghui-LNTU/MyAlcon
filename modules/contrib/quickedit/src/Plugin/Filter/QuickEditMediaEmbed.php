<?php

namespace Drupal\quickedit\Plugin\Filter;

use Drupal\media\Plugin\Filter\MediaEmbed;
use Drupal\media\MediaInterface;

/**
 * Provides a filter to embed media items in quick edit using a custom tag.
 *
 * @Filter(
 *   id = "media_embed",
 *   title = @Translation("Embed media"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * )
 */
class QuickEditMediaEmbed extends MediaEmbed {

  /**
   * Builds the render array for the given media entity in the given langcode.
   *
   * @param \Drupal\media\MediaInterface $media
   *   A media entity to render.
   * @param string $view_mode
   *   The view mode to render it in.
   * @param string $langcode
   *   Language code in which the media entity should be rendered.
   *
   * @return array
   *   A render array.
   */
  protected function renderMedia(MediaInterface $media, $view_mode, $langcode) {
    $build = parent::renderMedia($media, $view_mode, $langcode);
    // To provide entity id for quickedit on external entities building.
    $build['#attached']['library'][] = 'core/jquery';
    $build['#attributes']['data-quickedit-entity-id'] = 'media/' . $media->id();
    return $build;
  }

}
