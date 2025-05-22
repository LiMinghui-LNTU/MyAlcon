<?php

namespace Drupal\metatag\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\Markup;
use Drupal\metatag\MetatagGroupPluginManager;
use Drupal\metatag\MetatagTagPluginManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'metatag_views_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "metatag_views_formatter",
 *   module = "metatag",
 *   label = @Translation("Views formatter"),
 *   field_types = {
 *     "metatag"
 *   }
 * )
 */
class MetatagViewsFormatter extends FormatterBase implements ContainerFactoryPluginInterface {

  /**
   * The metatag tag plugin manager service.
   *
   * @var \Drupal\metatag\MetatagTagPluginManager
   */
  protected $metatagTag;

  /**
   * The metatag group plugin manager service.
   *
   * @var \Drupal\metatag\MetatagGroupPluginManager
   */
  protected $metatagGroup;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('plugin.manager.metatag.tag'),
      $container->get('plugin.manager.metatag.group')
    );
  }

  /**
   * Constructs a new MetatagFormatter.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Third party settings.
   * @param \Drupal\metatag\MetatagTagPluginManager $metatagTag
   *   The metatag tag plugin manager service.
   * @param \Drupal\metatag\MetatagGroupPluginManager $metatagGroup
   *   The metatag group plugin manager service.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, MetatagTagPluginManager $metatagTag, MetatagGroupPluginManager $metatagGroup) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
    $this->metatagTag = $metatagTag;
    $this->metatagGroup = $metatagGroup;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    $settings = [];

    // Fall back to field settings by default.
    $settings['field'] = 'title';

    return $settings;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $entity = $items->getEntity();
    $metatags = metatag_generate_entity_all_tags($entity);
    $field = $this->getSetting('field');

    // Retrieve the metatag definitions to determine if tags are multivalued.
    $tagDefinitions = $this->metatagTag->getDefinitions();

    if (empty($tagDefinitions[$field])) {
      // The field does not exist (anymore).
      return [];
    }

    $tagDefinition = $tagDefinitions[$field];

    $isMultiple = !empty($tagDefinition['multiple']);

    if (!$isMultiple) {
      if (!empty($metatags[$field]['#attributes']['content'])) {
        $value = $metatags[$field]['#attributes']['content'];
        return [['#markup' => Markup::create($value)]];
      }
    }
    else {
      // Concatenate all values.
      // @todo make the separator configurable.
      $separator = ', ';
      $currentIndex = 0;
      $finalValue = '';

      while (TRUE) {
        $indexedFieldName = $field . '_' . $currentIndex;

        if (empty($metatags[$indexedFieldName])) {
          // No more values.
          break;
        }

        if (!empty($metatags[$indexedFieldName]['#attributes']['content'])) {
          if (!empty($finalValue)) {
            $finalValue .= $separator;
          }

          $finalValue .= $metatags[$indexedFieldName]['#attributes']['content'];
        }

        $currentIndex++;
      }

      if (!empty($finalValue)) {
        return [['#markup' => Markup::create($finalValue)]];
      }
    }

    // Selected field is not filled, output nothing.
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form = parent::settingsForm($form, $form_state);

    $groups = $this->metatagGroup->getDefinitions();
    foreach ($this->metatagTag->getDefinitions() as $id => $tag) {
      $gid = (string) $groups[$tag['group']]['label'];
      $options[$gid][$tag['id']] = $tag['label'];
    }
    ksort($options);
    foreach ($options as &$optGroup) {
      asort($optGroup);
    }

    $form['field'] = [
      '#type' => 'select',
      '#title' => $this->t('MetaTag field'),
      '#default_value' => $this->getSetting('field'),
      '#options' => $options,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $field = $this->getSetting('field');

    $summary[] = $this->t('Display: @field field', [
      '@field' => $field,
    ]);

    return $summary;
  }

}
