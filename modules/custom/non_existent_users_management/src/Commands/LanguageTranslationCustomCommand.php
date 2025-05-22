<?php

namespace Drupal\non_existent_users_management\Commands;

use Consolidation\SiteAlias\SiteAliasManagerAwareInterface;
use Consolidation\SiteAlias\SiteAliasManagerAwareTrait;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Field\Entity\BaseFieldOverride;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\field\Entity\FieldConfig;
use Drupal\language\Entity\ContentLanguageSettings;
use Drupal\user\Entity\Role;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class LanguageTranslationCustomCommand extends DrushCommands implements SiteAliasManagerAwareInterface {
  use StringTranslationTrait;
  use SiteAliasManagerAwareTrait;

  /**
   * Entity type service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * Entity field manager.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;

  /**
   * Config factory.
   *
   * @var Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs a new SiteStudioCustomCommands object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   Entity type service.
   * @param \Drupal\Core\Entity\EntityFieldManagerInterface $entityFieldManager
   *   Entity type service.
   * @param \Drupal\cohesion\ConfigFactoryInterface $config_factory
   *   The config factory service.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager, EntityFieldManagerInterface $entityFieldManager, ConfigFactoryInterface $config_factory) {
    $this->entityTypeManager = $entityTypeManager;
    $this->entityFieldManager = $entityFieldManager;
    $this->configFactory = $config_factory;
  }

  /**
   * Update Content language translation for different Entity Type.
   *
   * @command content-language-setup entity-type
   * @aliases cls entity-type
   *
   * @usage content-language-setup entity-type
   */
  public function contentLanguageSetup(string $entity_type) {
    // Get items to disbale translation for them.
    $restricted_items = $this->restrictedFields();

    // Get list of common fields for which no action will perform.
    $non_action_fields = $this->listNonActionFields();

    // Check if an empty parameter pass within command.
    if ($entity_type) {
      // Translation for Node Entity Type.
      if ($entity_type == 'node_type') {
        $storages = $this->entityTypeManager->getStorage($entity_type)->loadMultiple();
        if ($storages) {
          $this->logger()->notice("Translation started for Entity Type: $entity_type");
          foreach ($storages as $entity => $storage) {
            $this->logger()->warning("Translation started for Content Type: $entity");
            $node_entity_fields = $this->entityFieldManager->getFieldDefinitions('node', $entity);
            foreach ($node_entity_fields as $field => $node_entity_field) {
              // Check the field and will not do any action.
              if (!in_array($field, $non_action_fields)) {
                // Push layout canvas field in restrcited array.
                if ($node_entity_field instanceof FieldConfig) {
                  if (strtolower($node_entity_field->get('label')) == "layout canvas") {
                    array_push($restricted_items, $field);
                  }
                }

                $fieldConfig = $this->checkFieldConfiguration($node_entity_field, 'node', $entity, $field);
                if ($fieldConfig) {
                  // Set Translation for field on behalf of condition.
                  if (in_array($field, $restricted_items)) {
                    $fieldConfig->setTranslatable(FALSE);
                    $translation = 'FALSE';
                    if ($field == 'title' || $field == 'metatag' || $field == 'path' || $field == 'status') {
                      $fieldConfig->setTranslatable(TRUE);
                      $translation = 'TRUE';
                    }
                  }
                  else {
                    $fieldConfig->setTranslatable(TRUE);
                    $translation = 'TRUE';
                  }
                  // Save configuration.
                  $fieldConfig->save();

                  // Logger message.
                  if ($translation == 'TRUE') {
                    $this->logger()->success("Translation Enabled for field: $field");
                  }
                  else {
                    $this->logger()->success("Translation Diabled for field: $field");
                  }
                }
              }
            }

            // Create translation configuration.
            $translationConfiguration = $this->entityTranslationConfigurationSave('node', $entity);

            // Save Translation configuration for Node Type.
            if ($translationConfiguration) {
              $this->saveConfigurationForEntity('node', $entity);
              $this->logger()->notice("Translation successfull for Content type: $entity");
            }
            else {
              $this->logger()->error("Translation not complete for Content Type: $entity");
            }
          }

          $this->logger()->notice("Successfully Translated Entity Type: $entity_type");
        }
      }
      // Translation for Component Content Entity Type.
      elseif ($entity_type == 'component_content') {
        $component_content_entity_type_fields = $this->entityFieldManager->getFieldDefinitions('component_content', $entity_type);
        $this->logger()->notice("Translattion started for Entity Type: $entity_type");
        foreach ($component_content_entity_type_fields as $field => $component_content_entity_type_field) {
          // Check the field and will not do any action.
          if (!in_array($field, $non_action_fields)) {
            // Add Layout canvas in restricted list.
            array_push($restricted_items, "layout_canvas");

            $fieldConfig = $this->checkFieldConfiguration($component_content_entity_type_field, 'component_content', $entity_type, $field);
            if ($fieldConfig) {
              // Set Translation for field on behalf of condition.
              if (in_array($field, $restricted_items)) {
                $fieldConfig->setTranslatable(FALSE);
                $translation = 'FALSE';
                if ($field == 'title') {
                  $fieldConfig->setTranslatable(TRUE);
                  $translation = 'TRUE';
                }
              }
              else {
                $fieldConfig->setTranslatable(TRUE);
                $translation = 'TRUE';
              }
              // Save configuration.
              $fieldConfig->save();

              // Logger message.
              if ($translation == 'TRUE') {
                $this->logger()->success("Translation Enabled for field: $field");
              }
              else {
                $this->logger()->success("Translation Diabled for field: $field");
              }
            }
          }
        }

        // Create translation configuration.
        $translationConfiguration = $this->entityTranslationConfigurationSave('component_content', $entity_type);

        // Save Translation configuration for Node Type.
        if ($translationConfiguration) {
          $this->saveConfigurationForEntity('component_content', $entity_type);
          $this->logger()->notice("Translation successfull for Entity type: $entity_type");
        }
        else {
          $this->logger()->error("Translation not complete for Entity Type: $entity_type");
        }
      }
      // Translation for Custom Menu Content Entity Type.
      elseif ($entity_type == 'menu_link_content') {
        $menu_link_content_fields = $this->entityFieldManager->getFieldDefinitions('menu_link_content', $entity_type);
        $this->logger()->notice("Translattion started for Entity Type: $entity_type");
        foreach ($menu_link_content_fields as $field => $menu_link_content_field) {
          // Check the field and will not do any action.
          if (!in_array($field, $non_action_fields)) {
            $fieldConfig = $this->checkFieldConfiguration($menu_link_content_field, 'menu_link_content', $entity_type, $field);
            if ($fieldConfig) {
              // Set Translation for field on behalf of condition.
              if (in_array($field, $restricted_items)) {
                $fieldConfig->setTranslatable(FALSE);
                $translation = 'FALSE';
                if ($field == 'title') {
                  $fieldConfig->setTranslatable(TRUE);
                  $translation = 'TRUE';
                }
              }
              else {
                $fieldConfig->setTranslatable(TRUE);
                $translation = 'TRUE';
              }
              // Save configuration.
              $fieldConfig->save();

              // Logger message.
              if ($translation == 'TRUE') {
                $this->logger()->success("Translation Enabled for field: $field");
              }
              else {
                $this->logger()->success("Translation Diabled for field: $field");
              }
            }
          }
        }

        // Create translation configuration.
        $translationConfiguration = $this->entityTranslationConfigurationSave('menu_link_content', $entity_type);

        // Save Translation configuration for Node Type.
        if ($translationConfiguration) {
          $this->saveConfigurationForEntity('menu_link_content', $entity_type);
          $this->logger()->notice("Translation successfull for Entity type: $entity_type");
        }
        else {
          $this->logger()->error("Translation not complete for Entity Type: $entity_type");
        }
      }
      // Translation for Cohesion Lsyout Canvas Entity type.
      elseif ($entity_type == 'cohesion_layout') {
        $cohesion_layout_fields = $this->entityFieldManager->getFieldDefinitions('cohesion_layout', $entity_type);

        $this->logger()->notice("Translattion started for Entity Type: $entity_type");
        foreach ($cohesion_layout_fields as $field => $cohesion_layout_field) {
          // Check the field and not any action performed.
          if (!in_array($field, $non_action_fields)) {
            $fieldConfig = $this->checkFieldConfiguration($cohesion_layout_field, 'cohesion_layout', $entity_type, $field);
            if ($fieldConfig) {
              // Set Translation for field on behalf of condition.
              if (in_array($field, $restricted_items)) {
                $fieldConfig->setTranslatable(FALSE);
                $translation = 'FALSE';
                if ($field == 'scheduled_transition_date' || $field == 'scheduled_transition_state') {
                  $fieldConfig->setTranslatable(TRUE);
                  $translation = 'TRUE';
                }
              }
              else {
                $fieldConfig->setTranslatable(TRUE);
                $translation = 'TRUE';
              }
              // Save configuration.
              $fieldConfig->save();

              // Logger message.
              if ($translation == 'TRUE') {
                $this->logger()->success("Translation Enabled for field: $field");
              }
              else {
                $this->logger()->success("Translation Diabled for field: $field");
              }
            }
          }
        }

        // Create translation configuration.
        $translationConfiguration = $this->entityTranslationConfigurationSave('cohesion_layout', $entity_type);

        // Save Translation configuration for Node Type.
        if ($translationConfiguration) {
          $this->saveConfigurationForEntity('cohesion_layout', $entity_type);
          $this->logger()->notice("Translation successfull for Entity type: $entity_type");
        }
        else {
          $this->logger()->error("Translation not complete for Entity Type: $entity_type");
        }
      }
      // Translation for Customu Menu Content Entity Type.
      elseif ($entity_type == 'taxonomy_vocabulary') {
        $taxonomies = $this->entityTypeManager->getStorage($entity_type)->loadMultiple();
        $this->logger()->notice("Translattion started for Entity Type: $entity_type");
        foreach ($taxonomies as $entity => $taxonomy) {
          $this->logger()->warning("Translation started for Taxonomy Vocabulary: $entity");
          $taxonomy_fields = $this->entityFieldManager->getFieldDefinitions('taxonomy_term', $entity);
          foreach ($taxonomy_fields as $field => $taxonomy_field) {
            // Check the field and not any action performed.
            if (!in_array($field, $non_action_fields)) {
              $fieldConfig = $this->checkFieldConfiguration($taxonomy_field, 'taxonomy_term', $entity, $field);
              if ($fieldConfig) {
                // Set Translation for field on behalf of condition.
                if (in_array($field, $restricted_items)) {
                  $fieldConfig->setTranslatable(FALSE);
                  $translation = 'FALSE';
                  if ($field == 'metatag') {
                    $fieldConfig->setTranslatable(TRUE);
                    $translation = 'TRUE';
                  }
                }
                else {
                  $fieldConfig->setTranslatable(TRUE);
                  $translation = 'TRUE';
                }
                // Save configuration.
                $fieldConfig->save();

                // Logger message.
                if ($translation == 'TRUE') {
                  $this->logger()->success("Translation Enabled for field: $field");
                }
                else {
                  $this->logger()->success("Translation Diabled for field: $field");
                }
              }
            }
          }

          // Create translation configuration.
          $translationConfiguration = $this->entityTranslationConfigurationSave('taxonomy_term', $entity);

          // Save Translation configuration for Node Type.
          if ($translationConfiguration) {
            $this->saveConfigurationForEntity('taxonomy_term', $entity);
            $this->logger()->warning("Translation successfull for Taxonomy Vocabulary: $entity");
          }
          else {
            $this->logger()->error("Translation not complete for Taxonomy Vocabulary: $entity");
          }
        }
        $this->logger()->notice("Successfully Translated Entity Type: $entity_type");
      }
    }
  }

  /**
   * Update Content language translation for different content types.
   *
   * @command content-language-setup-contenttype entity-type
   * @aliases cls entity-type
   *
   * @usage content-language-setup-contenttype entity-type
   */
  public function contentLanguageSetupContenttype(string $entity_type) {
    // Get items to disbale translation for them.
    $restricted_items = $this->restrictedFields();

    // Get list of common fields for which no action will perform.
    $non_action_fields = $this->listNonActionFields();

    // Check if an empty parameter pass within command.
    if ($entity_type) {
      // Translation for Node Entity Type.
      if ($entity_type == 'node_type') {
        $storages = $this->entityTypeManager->getStorage($entity_type)->loadMultiple();
        if ($storages) {
          $this->logger()->notice("Translation started for Entity Type: $entity_type");
          foreach ($storages as $entity => $storage) {
            $this->logger()->warning("Translation started for Content Type: $entity");
            $node_entity_fields = $this->entityFieldManager->getFieldDefinitions('node', $entity);
            foreach ($node_entity_fields as $field => $node_entity_field) {
              if (!in_array($field, $non_action_fields)) {
                $fieldConfig = $this->checkFieldConfiguration($node_entity_field, 'node', $entity, $field);
                if ($fieldConfig) {
                  // Set Translation for field on behalf of condition.
                  if ($field == 'status') {
                    $fieldConfig->setTranslatable(TRUE);
                    $translation = 'TRUE';
                  }
                  // Save configuration.
                  $fieldConfig->save();

                  // Logger message.
                  if ($translation == 'TRUE') {
                    $this->logger()->success("Translation Enabled for field: $field");
                  }
                  else {
                    $this->logger()->success("Translation Diabled for field: $field");
                  }
                }
              }
            }
            // Create translation configuration.
            $translationConfiguration = $this->entityTranslationConfigurationSave('node', $entity);

            // Save Translation configuration for Node Type.
            if ($translationConfiguration) {
              $this->saveConfigurationForEntity('node', $entity);
              $this->logger()->notice("Translation successfull for Content type: $entity");
            }
            else {
              $this->logger()->error("Translation not complete for Content Type: $entity");
            }
          }

          $this->logger()->notice("Successfully Translated Entity Type: $entity_type");
        }
      }

    }
  }

  /**
   * List of common fields for which no action should be perform.
   */
  public function listNonActionFields() {
    $field_list = [
      // Node entity type fields.
      "nid",
      "uuid",
      "vid",
      "langcode",
      "type",
      "revision_timestamp",
      "revision_uid",
      "revision_log",
      "moderation_state",
      // Conponent content Entity Type fields.
      "id",
      "component",
      "default_langcode",
      "revision_translation_affected",
      "content_translation_source",
      "content_translation_outdated",
      // Custom Menu Link fields.
      "revision_id",
      "bundle",
      "revision_created",
      "revision_user",
      "revision_log_message",
      "enabled",
      "menu_name",
      "link",
      "external",
      "rediscover",
      "weight",
      "expanded",
      "parent",
      "revision_default",
      "content_translation_uid",
      "content_translation_status",
      "content_translation_created",
      // Layout Canvas.
      "revision",
      "parent_id",
      "parent_type",
      "parent_field_name",
      "last_entity_update",
      "content_translation_changed",
      // Taxonomy Term.
      "tid",
      "weight",
      "parent",
    ];

    return $field_list;
  }

  /**
   * List of core base items which should non-translatable.
   */
  public function restrictedFields() {
    $restricted_items = [
      "path",
      "changed",
      "created",
      "menu_link",
      "metatag",
      "promote",
      "scheduled_transition_date",
      "scheduled_transition_state",
      "status",
      "sticky",
      "tealiumiq",
      "title",
      "uid",
      "field_site_studio_layout_canvas",
      "field_layout_canvas",
      "field_layout_canvas_event_page",
      "field_layout_canvas_product_page",
      "field_layout_canvas_symposium",
      "field_layout_canvas_virtualbooth",
      "field_layout_canvas_ref_page",
      "field_blog_layout",
      "field_product_layout",
      "field_basic_page_layout",
    ];

    return $restricted_items;
  }

  /**
   * Check for Translation creation and create translation for entity types.
   */
  public function entityTranslationConfigurationSave($entity_type_id, $entity) {
    $config = ContentLanguageSettings::loadByEntityTypeBundle($entity_type_id, $entity);
    $config->setDefaultLangcode('site_default');
    $config->setLanguageAlterable(TRUE);
    $config->save();

    return $config;
  }

  /**
   * Save Entity Type configuration.
   */
  public function saveConfigurationForEntity($entity_type_id, $entity) {
    $config = $this->configFactory->getEditable('language.content_settings.' . $entity_type_id . '.' . $entity);
    // Save Translation configuration for Node Type.
    $config->set('third_party_settings.content_translation.enabled', TRUE);
    $config->set('third_party_settings.content_translation.bundle_settings.untranslatable_fields_hide', '1');
    $config->save(TRUE);
  }

  /**
   * Function to get field configuration for each Entity types.
   */
  public function checkFieldConfiguration($field_configuration, $entity_type, $bundle, $field) {
    $fieldConfig = [];
    if (!empty($field_configuration)) {
      if ($field_configuration instanceof BaseFieldDefinition) {
        $fieldDefination = $this->entityFieldManager->getBaseFieldDefinitions($entity_type, $bundle);
        $fieldConfig = $fieldDefination[$field]->getConfig($bundle);
      }
      elseif ($field_configuration instanceof FieldConfig) {
        $fieldConfig = FieldConfig::loadByName($entity_type, $bundle, $field);
      }
      elseif ($field_configuration instanceof BaseFieldOverride) {
        $fieldConfig = BaseFieldOverride::loadByName($entity_type, $bundle, $field);
      }
    }

    return $fieldConfig;
  }

  /**
   * Updated Field Schema permission.
   *
   * @command scema-field-permission
   * @aliases sfp
   *
   * @usage sfp
   */
  public function schemaFieldPermission() {
    if ($field_schema = $this->configFactory->getEditable('field.storage.node.field_schema')) {
      $field_schema->set('third_party_settings.field_permissions.permission_type', 'custom');
      $field_schema->save(TRUE);
      $permission = $field_schema->get('third_party_settings.field_permissions.permission_type');
      $this->logger()->notice("Schema field permission changed to: $permission");

      // Update permissions for existing Site builder/ Content editor roles.
      $user_roles = [
        'site_builder' => [
          'create field_schema',
          'edit field_schema',
          'edit own field_schema',
          'view field_schema',
          'view own field_schema',
        ],
        'seo_administrator' => [
          'create field_schema',
          'edit field_schema',
          'edit own field_schema',
          'view field_schema',
          'view own field_schema',
        ],
        'content_editor' => [
          'create field_schema',
          'edit read-only field_schema',
        ],
      ];
      foreach ($user_roles as $user_role_name => $permissions_array) {
        if ($user_role = Role::load($user_role_name)) {
          foreach ($permissions_array as $permission) {
            if (!$user_role->hasPermission($permission)) {
              $user_role->grantPermission($permission);
            }
          }
          $user_role->save();
          $this->logger()->notice("Permission updated for role: $user_role_name");
        }
      }
      drupal_flush_all_caches();
    }
  }

}
