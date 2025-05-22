<?php

namespace Drupal\trailing_slash\Routing;

use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\PathProcessor\OutboundPathProcessorInterface;
use Drupal\Core\RouteProcessor\OutboundRouteProcessorInterface;
use Drupal\Core\Routing\RouteProviderInterface;
use Drupal\Core\Routing\UrlGenerator;
use Drupal\language\HttpKernel\PathProcessorLanguage;
use Drupal\trailing_slash\Helper\Url\TrailingSlashHelper;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Generates URLs from route names and parameters.
 *
 * We extend the Urls generation service to add trailing slash
 * to the Urls that correspond to <front> in multilanguage
 * that by default is removed after the processOutbound.
 */
class TrailingSlashUrlGenerator extends UrlGenerator {

  /**
   * Processes the inbound path using path alias lookups.
   *
   * @var \Drupal\language\HttpKernel\PathProcessorLanguage
   */
  private $pathProcessorLanguage;

  /**
   * Common interface for the language manager service.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  private $languageManager;

  /**
   * Constructs a TrailingSlashUrlGenerator object.
   */
  public function __construct(
    RouteProviderInterface $provider,
    OutboundPathProcessorInterface $path_processor,
    OutboundRouteProcessorInterface $route_processor,
    RequestStack $request_stack,
    array $filter_protocols = ['http', 'https'],
    PathProcessorLanguage $path_processor_language = NULL,
    LanguageManagerInterface $language_manager = NULL
  ) {
    parent::__construct($provider, $path_processor, $route_processor, $request_stack, $filter_protocols);
    $this->pathProcessorLanguage = $path_processor_language;
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function generateFromRoute($name, $parameters = [], $options = [], $collect_bubbleable_metadata = FALSE) {
    $url = parent::generateFromRoute($name, $parameters, $options, $collect_bubbleable_metadata);

    if ($this->languageManager->isMultilingual()
      && $name === '<front>'
      && $this->getLanguagePrefix($name, $options)
    ) {
      if ($collect_bubbleable_metadata) {
        $url->setGeneratedUrl($this->fixFrontMultilingualUrl($url->getGeneratedUrl()));
      }
      else {
        $url = $this->fixFrontMultilingualUrl($url);
      }
    }
    return $url;
  }

  /**
   * Helper to get language prefix.
   */
  private function getLanguagePrefix($route_name, $options) {
    $language_options = $options;
    $this->pathProcessorLanguage->processOutbound($route_name, $language_options, $this->requestStack->getCurrentRequest());
    return !empty($language_options['prefix'])
      ? $language_options['prefix']
      : '';
  }

  /**
   * Helper to fix the front URL.
   */
  private function fixFrontMultilingualUrl($url) {
    TrailingSlashHelper::add($url);
    return $url;
  }

}
