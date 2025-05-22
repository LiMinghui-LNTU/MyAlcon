<?php

namespace Drupal\alcon_sitestudio_components\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a 'Sitestudio Timeline library' Block.
 *
 * @Block(
 *   id = "alcon_sitestudio_timeline_block",
 *   admin_label = @Translation("Library requiere by timeline component"),
 *   category = @Translation("Alcon sitestudio components"),
 * )
 */
class AlconSitestudioTimelineBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Request stack.
   *
   * @var Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Config factory.
   *
   * @var Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory, RequestStack $request_stack) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->requestStack = $request_stack;
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory'),
      $container->get('request_stack')
    );

  }

  /**
   * {@inheritdoc}
   */

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->configFactory->get('alcon_sitestudio_components.settings');
    $enable_timeline = $config->get('enable_timeline');
    return [
      '#theme' => 'block_alconsitestudio_timeline',
      '#enable_timeline' => $enable_timeline,
    ];
  }

}
