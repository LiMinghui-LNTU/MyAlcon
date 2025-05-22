<?php

namespace Drupal\trailing_slash\Routing;

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
   * {@inheritdoc}
   *
   * @var \Drupal\language\HttpKernel\PathProcessorLanguage
   */
  private $pathProcessorLanguage;

  /**
   * TrailingSlashUrlGenerator constructor.
   *
   * @param \Drupal\Core\Routing\RouteProviderInterface $provider
   *   Param desc.
   * @param \Drupal\Core\PathProcessor\OutboundPathProcessorInterface $path_processor
   *   Param desc.
   * @param \Drupal\Core\RouteProcessor\OutboundRouteProcessorInterface $route_processor
   *   Param desc.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   Param desc.
   * @param array $filter_protocols
   *   Param desc.
   * @param \Drupal\language\HttpKernel\PathProcessorLanguage $path_processor_language
   *   Param desc.
   */
  public function __construct(
    RouteProviderInterface $provider,
    OutboundPathProcessorInterface $path_processor,
    OutboundRouteProcessorInterface $route_processor,
    RequestStack $request_stack,
    array $filter_protocols = ['http', 'https'],
    PathProcessorLanguage $path_processor_language = NULL
  ) {
    parent::__construct($provider, $path_processor, $route_processor, $request_stack, $filter_protocols);
    $this->pathProcessorLanguage = $path_processor_language;
  }

  /**
   * {@inheritdoc}
   */
  public function generateFromRoute($name, $parameters = [], $options = [], $collect_bubbleable_metadata = FALSE) {
    $url = parent::generateFromRoute($name, $parameters, $options, $collect_bubbleable_metadata);

    if (
            \Drupal::languageManager()->isMultilingual()
        &&  $name === '<front>'
        &&  $this->getLanguagePrefix($name, $options)
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
   * {@inheritdoc}
   *
   * @param string $route_name
   *   Route name.
   * @param array $options
   *   Options description.
   *
   * @return string
   *   Return Value.
   */
  private function getLanguagePrefix($route_name, $options) {
    $language_options = $options;
    $this->pathProcessorLanguage->processOutbound($route_name, $language_options, $this->requestStack->getCurrentRequest());
    return !empty($language_options['prefix'])
      ? $language_options['prefix']
      : '';
  }

  /**
   * {@inheritdoc}
   *
   * @param string $url
   *   Url description.
   *
   * @return string
   *   Return Value.
   */
  private function fixFrontMultilingualUrl($url) {
    TrailingSlashHelper::add($url);
    return $url;
  }

}
