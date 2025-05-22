<?php

namespace Drupal\alcon_gated_content\EventSubscriber;

use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\node\NodeInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event subscriber subscribing to KernelEvents::REQUEST.
 */
class CacheControlSubscriber implements EventSubscriberInterface {

  /**
   * The current route match service.
   *
   * @var \Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $currentRouteMatch;

  /**
   * Constructs a new CacheControlSubscriber.
   *
   * @param \Drupal\Core\Routing\CurrentRouteMatch $currentRouteMatch
   *   The current route match service.
   */
  public function __construct(CurrentRouteMatch $currentRouteMatch) {
    $this->currentRouteMatch = $currentRouteMatch;
  }

  /**
   * New getSubscribedEvents function.
   */
  public static function getSubscribedEvents() {
    // High enough to run before the page is served from cache.
    $events[KernelEvents::RESPONSE][] = ['onResponse', -12];
    return $events;
  }

  /**
   * New onRequest function.
   */
  public function onResponse(ResponseEvent $event) {
    $route_name = $this->currentRouteMatch->getRouteName();
    if ($route_name !== 'entity.node.canonical') {
      return;
    }
    $response = $event->getResponse();
    $node = $this->currentRouteMatch->getParameter('node');
    if ($node instanceof NodeInterface) {
      if ($node->hasField('field_enable_gated_content') && !$node->field_enable_gated_content->isEmpty()) {
        $gatedcontent = $node->field_enable_gated_content->get(0)->get('value')->getValue();
        // Implement logic based on the field value.
        if ($gatedcontent == 1) {
          // Set Cache-Control headers to bypass cache.
          $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
          $response->headers->set('Pragma', 'no-cache');
          $response->headers->set('Expires', '0');
        }
      }
    }

  }

}
