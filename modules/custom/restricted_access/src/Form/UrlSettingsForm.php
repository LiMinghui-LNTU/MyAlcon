<?php

namespace Drupal\restricted_access\form;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Url;
use Drupal\path_alias\AliasManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Admin form for url settings.
 */
class UrlSettingsForm extends ConfigFormBase {

  /**
   * Class attribute that holds the Entity Type Manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The alias manager.
   *
   * @var \Drupal\path_alias\AliasManagerInterface
   */
  protected $aliasManager;

  /**
   * Logger Factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'restricted_access_url_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'restricted_access.url_settings',
    ];
  }

  /**
   * Class constructor which initializes Drupal dependency injections.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The Entity Type Manager from Drupal.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   * @param Drupal\path_alias\AliasManagerInterface $alias_manager
   *   The module handler service.
   * @param Drupal\Core\Logger\LoggerChannelFactoryInterface $loggerFactory
   *   The Logger factory service.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager,
    ModuleHandlerInterface $module_handler,
    AliasManagerInterface $alias_manager,
    LoggerChannelFactoryInterface $loggerFactory) {
    // parent::__construct();
    $this->entityTypeManager = $entity_type_manager;
    $this->moduleHandler = $module_handler;
    $this->aliasManager = $alias_manager;
    $this->loggerFactory = $loggerFactory->get('restricted_access');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('module_handler'),
      $container->get('path_alias.manager'),
      $container->get('logger.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('restricted_access.url_settings');

    $form['url_settings'] = [
      '#title' => $this->t("Restricted access need to display in URL's"),
      '#type' => 'textarea',
      '#description' => $this->t('Site urls to display restricted access page, add line by line. Eg: /about'),
      '#default_value' => $config->get('url_settings'),
      '#rows' => 10,
      '#cols' => 60,
      '#resizable' => TRUE,
    ];
    $form['url_settings_hidden'] = [
      '#title' => $this->t('Okta private urls'),
      '#type' => 'hidden',
      '#default_value' => $config->get('url_settings'),
    ];
    $options = [
      'restrictedPopup' => $this->t('Restricted access pop-up (Modal ID: modal-id-restricted-access)'),
      'restrictedPage' => $this->t('Restricted access node/page'),
    ];
    $form['restricted_access_action'] = [
      '#type' => 'radios',
      '#title' => $this->t('Redirect to'),
      '#options' => $options,
      '#default_value' => $config->get('restricted_access_action'),
      '#required' => TRUE,
    ];
    $form['restricted_access_page'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Restricted access node/page'),
      '#description' => $this->t('The page created in content menu. Eg: /restricted-access'),
      '#default_value' => $config->get('restricted_access_page'),
    ];
    $form['restricted_access_password'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Restricted access password'),
      '#maxlength' => 16,
      '#default_value' => $config->get('restricted_access_password'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $existing = $form_state->getValue('url_settings_hidden');
    $new = $form_state->getValue('url_settings');
    $this->noarchiveCompare($existing, $new);

    $this->config('restricted_access.url_settings')
      ->set('url_settings', $form_state->getValue('url_settings'))
      ->set('url_settings_hidden', $form_state->getValue('url_settings_hidden'))
      ->set('restricted_access_page', $form_state->getValue('restricted_access_page'))
      ->set('restricted_access_action', $form_state->getValue('restricted_access_action'))
      ->set('restricted_access_password', $form_state->getValue('restricted_access_password'))
      ->save();
    parent::submitForm($form, $form_state);
  }

  /**
   * Implements noarchiveCompare().
   */
  public function noarchiveCompare($existing, $new) {
    $existing_array = $this->getPrivateUrls($existing);
    $new_array = $this->getPrivateUrls($new);
    $url_added = array_diff($new_array, $existing_array);

    $url_removed = array_diff($existing_array, $new_array);
    if (count($url_added) > 0) {
      foreach ($url_added as $item) {
        $nid = $this->getNodeIdByAlias($item);
        if (is_numeric($nid)) {
          $this->noarchiveAdd($nid);
        }
      }
    }
    if (count($url_removed) > 0) {
      foreach ($url_removed as $item) {
        $nid = $this->getNodeIdByAlias($item);
        if (is_numeric($nid)) {
          $this->noarchiveRemove($nid);
        }
      }
    }
    return FALSE;
  }

  /**
   * Get node id by Alias.
   */
  public function getNodeIdByAlias(string $alias) {
    $data = NULL;
    try {
      $alias = $this->aliasManager->getPathByAlias($alias);
      $params = Url::fromUri("internal:" . $alias)->getRouteParameters();
      $entity_type = key($params);
      $node = $this->entityTypeManager->getStorage($entity_type)->load($params[$entity_type]);
      $data = $node->nid->value;
    }
    catch (\Exception $e) {
      $this->loggerFactory->error($e->getMessage() . "URL alias not exist for $alias.");
    }
    return $data;
  }

  /**
   * Decode the different versions of encoded values supported by Metatag.
   *
   * Metatag v1 stored data in serialized arrays. Metatag v2 stores data in
   * JSON-encoded strings.
   *
   * @param string $string
   *   The string to decode.
   *
   * @return array
   *   A Metatag values array.
   */
  public function metatagDataDecode($string): array {
    $data = [];
    // Serialized arrays from Metatag v1.
    if (substr($string, 0, 2) === 'a:') {
      $data = @unserialize($string, ['allowed_classes' => FALSE]);
    }
    // Encoded JSON from Metatag v2.
    elseif (substr($string, 0, 2) === '{"') {
      $data = Json::decode($string);
    }
    if (!is_array($data)) {
      $data = [];
    }
    return $data;
  }

  /**
   * Encode the data for storing in a Metatag field.
   *
   * By abstracting to this function each version of Metatag can use the method
   * that is appropriate for it.
   *
   * @param array $data
   *   A Metatag values array.
   *
   * @return string
   *   The meta tag data encoded as a JSON string.
   */
  public function metatagDataEncode(array $data = []): string {
    return Json::encode($data);
  }

  /**
   * Implements getPrivateUrls().
   */
  public function getPrivateUrls($url) {
    // Getting private path from admin config section.
    $private_urls = $url;
    $private_urls_arr = [];
    if (!empty($private_urls)) {
      $textAr = explode("\n", $private_urls);
      $node_arr = array_filter($textAr, 'trim');
      $unique = array_unique($node_arr);
      foreach ($unique as $item) {
        $private_urls_arr[] = trim($item);
      }
    }
    return $private_urls_arr;
  }

  /**
   * Implements noarchiveAdd().
   */
  public function noarchiveAdd($nid) {
    $node = $this->entityTypeManager->getStorage('node')->load($nid);
    $type = $node->getType();
    $field_metatag_content_type = "";
    switch ($type) {
      case "blog_article":
      case "product_page":
        $field_metatag_content_type = "field_meta";
        break;

      case "event":
        $field_metatag_content_type = "field_event_meta_tags";
        break;

      case "virtualbooth":
        $field_metatag_content_type = "field_vb_meta_tags";
        break;

      case "symposium":
        $field_metatag_content_type = "field_symposium_meta_tags";
        break;

      default:
        $field_metatag_content_type = "field_meta_tags";
    }

    $metatagModuleEnabled = $this->moduleHandler->moduleExists('metatag');
    if ($metatagModuleEnabled) {
      $verify = $node->hasField($field_metatag_content_type);
      $val = $node->$field_metatag_content_type->value;
      if ($verify != '' && !is_null($val)) {
        $meta_tag = $this->metatagDataDecode($node->$field_metatag_content_type->value);
        if (array_key_exists('robots', $meta_tag)) {
          $metaTagsArray = explode(', ', $meta_tag['robots']);
          if (!in_array("noarchive", $metaTagsArray)) {
            $meta_tag['robots'] .= ", noarchive";
            $serialize_meta = $this->metatagDataEncode($meta_tag);
            $node->$field_metatag_content_type->value = $serialize_meta;
            $node->save();
          }
        }
        else {
          $meta_tag['robots'] = "noarchive";
          $serialize_meta = $this->metatagDataEncode($meta_tag);
          $node->$field_metatag_content_type->value = $serialize_meta;
          $node->save();
        }
      }
      else {
        $meta_tag['robots'] = "noarchive";
        $serialize_meta = $this->metatagDataEncode($meta_tag);
        $node->$field_metatag_content_type->value = $serialize_meta;
        $node->save();
      }
    }
  }

  /**
   * Implements noarchiveRemove().
   */
  public function noarchiveRemove($nid) {
    $node = $this->entityTypeManager->getStorage('node')->load($nid);
    $type = $node->getType();
    $metatagModuleEnabled = $this->moduleHandler->moduleExists('metatag');
    $field_metatag_content_type = "";
    switch ($type) {
      case "blog_article":
      case "product_page":
        $field_metatag_content_type = "field_meta";
        break;

      case "event":
        $field_metatag_content_type = "field_event_meta_tags";
        break;

      case "virtualbooth":
        $field_metatag_content_type = "field_vb_meta_tags";
        break;

      case "symposium":
        $field_metatag_content_type = "field_symposium_meta_tags";
        break;

      default:
        $field_metatag_content_type = "field_meta_tags";
    }
    if ($metatagModuleEnabled) {
      $verify = $node->hasField($field_metatag_content_type);
      if ($verify == '1' && $node->$field_metatag_content_type->value != NULL) {
        $meta_tags = $this->metatagDataDecode($node->$field_metatag_content_type->value);
        if (array_key_exists('robots', $meta_tags)) {
          $metaTagsArray = explode(', ', $meta_tags['robots']);
          $updatedMetaTags = '';
          $sizeof = 0;
          if (in_array("noarchive", $metaTagsArray)) {
            $hasNoArchive = array_search("noarchive", $metaTagsArray);
            unset($metaTagsArray[$hasNoArchive]);
            $sizeof = count($metaTagsArray);
            $updatedMetaTags = implode(', ', $metaTagsArray);
            if ($sizeof > 0) {
              $meta_tags['robots'] = $updatedMetaTags;
            }
            else {
              unset($meta_tags['robots']);
            }
            $serialize_meta = $this->metatagDataEncode($meta_tags);
            $node->$field_metatag_content_type->value = $serialize_meta;
            $node->save();
          }
        }
      }
    }
  }

}
