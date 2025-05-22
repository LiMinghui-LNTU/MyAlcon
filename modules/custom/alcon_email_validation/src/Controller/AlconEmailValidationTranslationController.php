<?php

namespace Drupal\alcon_email_validation\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class AlconEmailValidationTranslationController has functions.
 *
 * @package Drupal\alcon_email_validation\Controller
 */
class AlconEmailValidationTranslationController extends ControllerBase {

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Pass in connector config by default to all events.
   *
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   Acquia Connector settings.
   */
  public function __construct(LanguageManagerInterface $language_manager) {
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('language_manager'));
  }

  /**
   * Returns a language operation to translate.
   *
   * @return string[]
   *   return renderable build array.
   */
  public function overview() {
    $build = [
      '#type' => 'container',
      '#attributes' => ['class' => ['alcon-email-validation-translation']],
    ];

    $build['back_link'] = [
      '#type' => 'link',
      '#title' => $this->t('Back to settings'),
      '#url' => Url::fromRoute('alcon_email_validation.admin'),
      '#attributes' => ['class' => ['button']],
    ];

    $languages = $this->languageManager->getLanguages();

    $languages = array_filter($languages, function ($language) {
      return !in_array($language->getId(), ['und', 'zxx']);
    });
    $build['table'] = [
      '#theme' => 'table',
      '#header' => [$this->t('Language'), $this->t('Operations')],
      '#rows' => [],
    ];

    foreach ($languages as $language) {
      $build['table']['#rows'][] = [
        'language' => $language->getName(),
        'operations' => [
          'data' => [
            '#type' => 'operations',
            '#links' => [
              'translate' => [
                'title' => $this->t('Translate'),
                'url' => Url::fromRoute('alcon_email_validation.translate_form', ['langcode' => $language->getId()]),
              ],
            ],
          ],
        ],
      ];
    }

    return $build;
  }

}
