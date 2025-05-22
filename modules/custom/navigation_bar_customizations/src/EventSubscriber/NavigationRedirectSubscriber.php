<?php

namespace Drupal\navigation_bar_customizations\EventSubscriber;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Redirects admin users to a custom domain for flush operations.
 */
class NavigationRedirectSubscriber implements EventSubscriberInterface {

  /**
   * The current user service.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Constructs the event subscriber.
   *
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user service.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   */
  public function __construct(AccountInterface $current_user, ModuleHandlerInterface $module_handler) {
    $this->currentUser = $current_user;
    $this->moduleHandler = $module_handler;
  }

  /**
   * Responds to kernel request events.
   *
   * @param \Symfony\Component\HttpKernel\Event\RequestEvent $event
   *   The request event.
   */
  public function onKernelRequest(RequestEvent $event) {
    $request = $event->getRequest();
    $current_path = $request->getPathInfo();

    $flush_paths = [
      '/admin/flush',
      '/admin/flush/cssjs',
      '/admin/flush/plugin',
      '/admin/flush/rendercache',
      '/admin/flush/menu',
      '/admin/flush/static-caches',
      '/admin/flush/twig',
      '/admin/flush/views',
      '/admin/flush/theme_rebuild',
    ];

    if (in_array($current_path, $flush_paths) && $this->currentUser->hasPermission('administer site configuration')) {
      $host = $request->getSchemeAndHttpHost();
      $custom_domain = $this->getCustomDomain($host);

      // If no custom domain is found, do NOT redirect.
      if (!$custom_domain) {
        return;
      }
      $redirect_path = '/saml/login';
      // Create JavaScript popup message.
      $popup_script = '<script>
        document.addEventListener("DOMContentLoaded", function() {
          let modal = document.createElement("div");
          modal.style.position = "fixed";
          modal.style.top = "50%";
          modal.style.left = "50%";
          modal.style.transform = "translate(-50%, -50%)";
          modal.style.background = "#fff";
          modal.style.padding = "20px";
          modal.style.borderRadius = "8px";
          modal.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
          modal.style.zIndex = "10000";
          modal.innerHTML = "<p><strong>Cache can be flushed only with live domains to avoid navigation issues.</strong></p>";

          document.body.appendChild(modal);

          setTimeout(function() {
            modal.remove();
            window.location.href = "' . $custom_domain . $redirect_path . '";
          }, 2000);
        });
      </script>';

      $response = new Response($popup_script);
      $event->setResponse($response);
    }
  }

  /**
   * Gets the custom domain from the module config file.
   *
   * @param string $key
   *   The key for the domain mapping (e.g., 'admin', 'editor', 'default').
   *
   * @return string|null
   *   The custom domain URL if available, otherwise NULL.
   */
  private function getCustomDomain($key = 'default') {
    $module_path = $this->moduleHandler->getModule('navigation_bar_customizations')->getPath();
    $file_path = $module_path . '/custom_domain_mapping.json';

    if (file_exists($file_path)) {
      $json_data = file_get_contents($file_path);
      $domain_mapping = json_decode($json_data, TRUE);

      return $domain_mapping[$key] ?? NULL;
    }

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      KernelEvents::REQUEST => ['onKernelRequest', 10],
    ];
  }

}
