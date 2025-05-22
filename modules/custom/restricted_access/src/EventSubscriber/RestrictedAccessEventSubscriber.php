<?php

namespace Drupal\restricted_access\EventSubscriber;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Path\CurrentPathStack;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\path_alias\AliasManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event subscriber subscribing to KernelEvents::REQUEST.
 */
class RestrictedAccessEventSubscriber implements EventSubscriberInterface {

  /**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $currentRouteMatch;

  /**
   * The current path.
   *
   * @var \Drupal\Core\Path\CurrentPathStack
   */
  protected $currentPath;

  /**
   * The alias manager.
   *
   * @var \Drupal\path_alias\AliasManagerInterface
   */
  protected $aliasManager;

  /**
   * Constructs a new UnauthorizedEventSubscriber object.
   */
  public function __construct(
    ConfigFactory $configFactory,
    CurrentRouteMatch $currentRouteMatch,
    CurrentPathStack $current_path,
    AliasManagerInterface $alias_manager) {
    $this->configFactory = $configFactory;
    $this->currentRouteMatch = $currentRouteMatch;
    $this->currentPath = $current_path;
    $this->aliasManager = $alias_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('current_route_match'),
      $container->get('path.current'),
      $container->get('path_alias.manager'),
    );
  }

  /**
   * Implements checkRestrictedPages().
   */
  public function checkRestrictedPages(ResponseEvent $event) {
    global $base_url;

    $config = $this->configFactory->get('restricted_access.url_settings');
    $restricted_access_page = $config->get('restricted_access_page');
    $restrictedAction = $config->get('restricted_access_action');
    $restricted_access_password = $config->get('restricted_access_password');

    $current_path = $this->currentPath->getPath();
    $redirectPath = $this->aliasManager->getAliasByPath($current_path);
    $display_path = $this->getRestrictedAccessUrls();
    if (empty($restricted_access_password)) {
      if (in_array($redirectPath, $display_path)) {
        setcookie("uncache_restricted_access", $redirectPath, time() + 3600, $redirectPath);
        $_COOKIE["uncache_restricted_access"] = $redirectPath;
        $responseCache = $event->getResponse();
        $responseCache->headers->set('Cache-Control', 'max-age=0, public, s-maxage=0');
      }
    }
    if ($restrictedAction === 'restrictedPopup') {
      if (in_array($redirectPath, $display_path)) {
        \Drupal::logger('restricted_access')->debug('Setting uncacheable headers for @path', ['@path' => $redirectPath]);
        $responseCache = $event->getResponse();
        $responseCache->setMaxAge(0);
        $responseCache->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0, public, s-maxage=0');
        $responseCache->headers->set('Pragma', 'no-cache');
        $responseCache->headers->set('Expires', '0');
        $responseCache->headers->set('Vary', 'Cookie');
        $responseCache->headers->set('X-Drupal-Cache', 'MISS');
      }
    }

    if ($restrictedAction == 'restrictedPage') {
      $accessPageExpiry = 0;
      if (isset($_COOKIE['accessPageExpiry'])) {
        $accessPageExpiry = 1;
      }
      if ($accessPageExpiry == 0) {
        if (in_array($redirectPath, $display_path)) {
          setcookie("redirectAccessPath", $redirectPath, time() + 3600, '/');
          $_COOKIE["redirectAccessPath"] = $redirectPath;
          $redirect_page_path = '/';
          if (!empty($restricted_access_page)) {
            $redirect_page_path = $restricted_access_page;
          }
          $response = new RedirectResponse($base_url . $redirect_page_path, 302);
          $response->setMaxAge(0);
          $response->send();
          return;
        }
      }
      else {
        if (isset($_COOKIE['redirectAccessPath'])) {
          setcookie("redirectAccessPath", "", time() - 3600 * 24, '/');
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      KernelEvents::RESPONSE => [
        ['checkRestrictedPages', -11],
      ],
    ];
  }

  /**
   * Implements getRestrictedAccessUrls().
   */
  public function getRestrictedAccessUrls() {
    // Getting restricted access url path from admin config section.
    $config = $this->configFactory->get('restricted_access.url_settings');
    $restricted_access_urls = $config->get('url_settings');
    $restricted_access_urls_arr = [];
    if (!empty($restricted_access_urls)) {
      $textAr = explode("\n", $restricted_access_urls);
      $node_arr = array_filter($textAr, 'trim');
      foreach ($node_arr as $item) {
        $restricted_access_urls_arr[] = trim($item);
      }
    }
    return $restricted_access_urls_arr;
  }

}
