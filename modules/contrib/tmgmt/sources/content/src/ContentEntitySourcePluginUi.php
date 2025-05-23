<?php

namespace Drupal\tmgmt_content;

use Drupal\content_translation\ContentTranslationManager;
use Drupal\Core\Database\Query\Condition;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\tmgmt\JobItemInterface;
use Drupal\tmgmt\SourcePluginUiBase;
use Drupal\tmgmt_content\Plugin\tmgmt\Source\ContentEntitySource;

/**
 * Content entity source plugin UI.
 *
 * Provides getEntity() method to retrieve list of entities of specific type.
 * It also allows to implement alter hook to alter the entity query for a
 * specific type.
 *
 * @ingroup tmgmt_source
 */
class ContentEntitySourcePluginUi extends SourcePluginUiBase {

  /**
   * Entity source list items limit.
   *
   * @var int
   */
  public $pagerLimit = 25;

  /**
   * {@inheritdoc}
   */
  public function overviewSearchFormPart(array $form, FormStateInterface $form_state, $type) {
    $form = parent::overviewSearchFormPart($form, $form_state, $type);

    $entity_type = \Drupal::entityTypeManager()->getDefinition($type);
    $field_definitions = \Drupal::service('entity_field.manager')->getBaseFieldDefinitions($type);

    $label_key = $entity_type->getKey('label');
    if (!empty($label_key)) {
      $label = (string) $field_definitions[$label_key]->getlabel();
      $form['search_wrapper']['search'][$label_key] = array(
        '#type' => 'textfield',
        '#title' => $label,
        '#size' => 25,
        '#default_value' => isset($_GET[$label_key]) ? $_GET[$label_key] : NULL,
      );
    }

    $form['search_wrapper']['search']['langcode'] = array(
      '#type' => 'language_select',
      '#title' => t('Source Language'),
      '#empty_option' => t('- Any -'),
      '#default_value' => isset($_GET['langcode']) ? $_GET['langcode'] : NULL,
    );

    $bundle_key = $entity_type->getKey('bundle');
    $bundle_options = $this->getTranslatableBundles($type);

    if (count($bundle_options) > 1) {
      $form['search_wrapper']['search'][$bundle_key] = array(
        '#type' => 'select',
        '#title' => $entity_type->getBundleLabel(),
        '#options' => $bundle_options,
        '#empty_option' => t('- Any -'),
        '#default_value' => isset($_GET[$bundle_key]) ? $_GET[$bundle_key] : NULL,
      );
    }
    // In case entity translation is not enabled for any of bundles
    // display appropriate message.
    elseif (count($bundle_options) == 0) {
      $this->messenger()->addWarning($this->t('Entity translation is not enabled for any of existing content types. To use this functionality go to Content types administration and enable entity translation for desired content types.'));
      unset($form['search_wrapper']);
      return $form;
    }

    $form['search_wrapper']['search']['target_language'] = array(
      '#type' => 'language_select',
      '#title' => $this->t('Target language'),
      '#empty_option' => $this->t('- Any -'),
      '#default_value' => isset($_GET['target_language']) ? $_GET['target_language'] : NULL,
    );
    $form['search_wrapper']['search']['target_status'] = array(
      '#type' => 'select',
      '#title' => $this->t('Target status'),
      '#options' => array(
        'untranslated_or_outdated' => $this->t('Untranslated or outdated'),
        'untranslated' => $this->t('Untranslated'),
        'outdated' => $this->t('Outdated'),
      ),
      '#default_value' => isset($_GET['target_status']) ? $_GET['target_status'] : NULL,
      '#states' => array(
        'invisible' => array(
          ':input[name="search[target_language]"]' => array('value' => ''),
        ),
      ),
    );

    return $form;
  }

  /**
   * Gets overview form header.
   *
   * @return array
   *   Header array definition as expected by theme_tablesort().
   */
  public function overviewFormHeader($type) {
    $entity_type = \Drupal::entityTypeManager()->getDefinition($type);

    $header = array(
      'title' => array('data' => $this->t('Title (in source language)')),
    );

    // Show the bundle if there is more than one for this entity type.
    if (count($this->getTranslatableBundles($type)) > 1) {
      $header['bundle'] = array('data' => $this->t('@entity_name type', array('@entity_name' => $entity_type->getLabel())));
    }

    $header += $this->getLanguageHeader();

    return $header;
  }

  /**
   * Builds a table row for overview form.
   *
   * @param array ContentEntityInterface $entity
   *   Data needed to build the list row.
   * @param array $bundles
   *   The array of bundles.
   *
   * @return array
   */
  public function overviewRow(ContentEntityInterface $entity, array $bundles) {
    $entity_label = $entity->label();

    $storage = \Drupal::entityTypeManager()->getStorage($entity->getEntityTypeId());
    $use_latest_revisions = $entity->getEntityType()->isRevisionable() && ContentTranslationManager::isPendingRevisionSupportEnabled($entity->getEntityTypeId(), $entity->bundle());

    // Get the default revision.
    $default_revision = $use_latest_revisions ? $storage->load($entity->id()) : $entity;

    // Get existing translations and current job items for the entity
    // to determine translation statuses
    $translations = $entity->getTranslationLanguages();
    $source_lang = $entity->language()->getId();
    $current_job_items = tmgmt_job_item_load_latest('content', $entity->getEntityTypeId(), $entity->id(), $source_lang);

    $row = array(
      'id' => $entity->id(),
    );

    if (count($bundles) > 1) {
      $row['bundle'] = isset($bundles[$entity->bundle()]) ? $bundles[$entity->bundle()] : t('Unknown');
    }

    // Load entity translation specific data.
    $manager = \Drupal::service('content_translation.manager');
    foreach (\Drupal::languageManager()->getLanguages() as $langcode => $language) {
      // @see Drupal\content_translation\Controller\ContentTranslationController::overview()
      // If the entity type is revisionable, we may have pending revisions
      // with translations not available yet in the default revision. Thus we
      // need to load the latest translation-affecting revision for each
      // language to be sure we are listing all available translations.
      if ($use_latest_revisions) {
        $entity = $default_revision;
        $latest_revision_id = $storage->getLatestTranslationAffectedRevisionId($entity->id(), $langcode);
        if ($latest_revision_id) {
          /** @var \Drupal\Core\Entity\ContentEntityInterface $latest_revision */
          $latest_revision = $storage->loadRevision($latest_revision_id);
          // Make sure we do not list removed translations, i.e. translations
          // that have been part of a default revision but no longer are.
          if (!$latest_revision->wasDefaultRevision() || $default_revision->hasTranslation($langcode)) {
            $entity = $latest_revision;
            // Update the label if we are dealing with the source language.
            if ($langcode === $source_lang) {
              $entity_label = $entity->label();
            }
          }
        }
        $translations = $entity->getTranslationLanguages();
      }

      $translation_status = 'current';

      if ($langcode == $source_lang) {
        $translation_status = 'original';
      }
      elseif (!isset($translations[$langcode])) {
        $translation_status = 'missing';
      }
      elseif ($translation = $entity->getTranslation($langcode)) {
        $metadata = $manager->getTranslationMetadata($translation);
        if ($metadata->isOutdated()) {
          $translation_status = 'outofdate';
        }
      }

      $build = $this->buildTranslationStatus($translation_status, isset($current_job_items[$langcode]) ? $current_job_items[$langcode] : NULL);

      if ($translation_status != 'missing' && $entity->hasLinkTemplate('canonical')) {
        $build['source'] = [
          '#type' => 'link',
          '#url' => $entity->toUrl('canonical', ['language' => $language]),
          '#title' => $build['source'],
          ];
      }

      $row['langcode-' . $langcode] = [
        'data' => \Drupal::service('renderer')->render($build),
        'class' => array('langstatus-' . $langcode),
      ];
    }

    $label = $entity_label ?: $this->t('@type: @id', [
      '@type' => $entity->getEntityTypeId(),
      '@id' => $entity->id(),
    ]);
    $row['title'] = $entity->hasLinkTemplate('canonical') ? $entity->toLink($label, 'canonical')->toString() : ($entity_label ?: $entity->id());
    return $row;
  }

  /**
   * {@inheritdoc}
   */
  public function overviewForm(array $form, FormStateInterface $form_state, $type) {
    $form = parent::overviewForm($form, $form_state, $type);

    // Build a list of allowed search conditions and get their values from the request.
    $entity_type = \Drupal::entityTypeManager()->getDefinition($type);
    $whitelist = array('langcode', 'target_language', 'target_status');
    if ($entity_type->hasKey('bundle')) {
      $whitelist[] = $entity_type->getKey('bundle');
    }
    if ($entity_type->hasKey('label')) {
      $whitelist[] = $entity_type->getKey('label');
    }
    $search_property_params = array_filter(\Drupal::request()->query->all());
    $search_property_params = array_intersect_key($search_property_params, array_flip($whitelist));
    $bundles = $this->getTranslatableBundles($type);

    foreach (static::getTranslatableEntities($type, $search_property_params, TRUE) as $entity) {
      // This occurs on user entity type.
      if ($entity->id()) {
        $form['items']['#options'][$entity->id()] = $this->overviewRow($entity, $bundles);
      }
    }

    $form['pager'] = array('#type' => 'pager');

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function overviewFormValidate(array $form, FormStateInterface $form_state, $type) {
    $target_language = $form_state->getValue(array('search', 'target_language'));
    if (!empty($target_language) && $form_state->getValue(array('search', 'langcode')) == $target_language) {
      $form_state->setErrorByName('search[target_language]', $this->t('The source and target languages must not be the same.'));
    }
  }

  /**
   * Adds selected sources to continuous jobs.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state array.
   * @param string $item_type
   *   Entity type.
   */
  public function overviewSubmitToContinuousJobs(FormStateInterface $form_state, $item_type) {
    if ($form_state->getValue('add_all_to_continuous_jobs')) {
      // Build a list of allowed search conditions and get their values from the request.
      $entity_type = \Drupal::entityTypeManager()->getDefinition($item_type);
      $whitelist = array('langcode', 'target_language', 'target_status');
      $whitelist[] = $entity_type->getKey('bundle');
      $whitelist[] = $entity_type->getKey('label');
      $search_property_params = array_filter(\Drupal::request()->query->all());
      $search_property_params = array_intersect_key($search_property_params, array_flip($whitelist));
      $operations = array(
        array(
          array(ContentEntitySourcePluginUi::class, 'createContinuousJobItemsBatch'),
          array($item_type, $search_property_params),
        ),
      );
      $batch = array(
        'title' => t('Creating continuous job items'),
        'operations' => $operations,
        'finished' => 'tmgmt_content_create_continuous_job_items_batch_finished',
      );
      batch_set($batch);
    }
    else {
      $entities = ContentEntitySource::loadMultiple($item_type, array_filter($form_state->getValue('items')));
      $job_items = 0;
      // Loop through entities and add them to continuous jobs.
      foreach ($entities as $entity) {
        $job_items += tmgmt_content_create_continuous_job_items($entity);
      }

      if ($job_items !== 0) {
        \Drupal::messenger()->addStatus(\Drupal::translation()->formatPlural($job_items, '1 continuous job item has been created.', '@count continuous job items have been created.'));
      }
      else {
        \Drupal::messenger()->addWarning(t('None of the selected sources can be added to continuous jobs.'));
      }
    }
  }

  /**
   * A function to get entity translatable bundles.
   *
   * Note that for comment entity type it will return the same as for node as
   * comment bundles have no use (i.e. in queries).
   *
   * @param string $entity_type
   *   Drupal entity type.
   *
   * @return array
   *   Array of key => values, where key is type and value its label.
   */
  function getTranslatableBundles($entity_type) {

    // If given entity type does not have entity translations enabled, no reason
    // to continue.
    $enabled_types = \Drupal::service('plugin.manager.tmgmt.source')->createInstance('content')->getItemTypes();
    if (!isset($enabled_types[$entity_type])) {
      return array();
    }

    $translatable_bundle_types = array();
    $content_translation_manager = \Drupal::service('content_translation.manager');
    foreach (\Drupal::service('entity_type.bundle.info')->getBundleInfo($entity_type) as $bundle_type => $bundle_definition) {
      if ($content_translation_manager->isEnabled($entity_type, $bundle_type)) {
        $translatable_bundle_types[$bundle_type] = $bundle_definition['label'];
      }
    }
    return $translatable_bundle_types;
  }

  /**
   * Gets translatable entities of a given type.
   *
   * Additionally you can specify entity property conditions, pager and limit.
   *
   * @param string $entity_type_id
   *   Drupal entity type.
   * @param array $property_conditions
   *   Entity properties. There is no value processing so caller must make sure
   *   the provided entity property exists for given entity type and its value
   *   is processed.
   * @param bool $pager
   *   Flag to determine if pager will be used.
   * @param int $offset
   *   Query range offset.
   * @param int $limit
   *   Query range limit.
   *
   * @return array ContentEntityInterface[]
   *   Array of translatable entities.
   */
  public static function getTranslatableEntities($entity_type_id, $property_conditions = array(), $pager = FALSE, $offset = 0, $limit = 0) {
    $query = static::buildTranslatableEntitiesQuery($entity_type_id, $property_conditions);

    if ($query) {
      if ($pager) {
        $query = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit(\Drupal::config('tmgmt.settings')->get('source_list_limit'));
      }
      elseif ($limit) {
        $query->range($offset, $limit);
      }
      else {
        $query->range(0, \Drupal::config('tmgmt.settings')->get('source_list_limit'));
      }

      $result = $query->execute();
      $entity_ids = $result->fetchCol();
      $entities = array();

      if (!empty($entity_ids)) {
        $entities = \Drupal::entityTypeManager()->getStorage($entity_type_id)->loadMultiple($entity_ids);
      }
      return $entities;
    }
    return array();
  }

  /**
   * Returns the query for translatable entities of a given type.
   *
   * Additionally you can specify entity property conditions.
   *
   * @param string $entity_type_id
   *   Drupal entity type.
   * @param array $property_conditions
   *   Entity properties. There is no value processing so caller must make sure
   *   the provided entity property exists for given entity type and its value
   *   is processed.
   *
   * @return \Drupal\Core\Entity\Query\QueryInterface|NULL
   *   The query for translatable entities or NULL if the query can not be
   *   built for this entity type.
   */
  public static function buildTranslatableEntitiesQuery($entity_type_id, $property_conditions = array()) {

    // If given entity type does not have entity translations enabled, no reason
    // to continue.
    $enabled_types = \Drupal::service('plugin.manager.tmgmt.source')->createInstance('content')->getItemTypes();
    if (!isset($enabled_types[$entity_type_id])) {
      return NULL;
    }

    $langcodes = array_keys(\Drupal::languageManager()->getLanguages());
    $languages = array_combine($langcodes, $langcodes);

    $entity_type = \Drupal::entityTypeManager()->getDefinition($entity_type_id);
    $label_key = $entity_type->getKey('label');

    $id_key = $entity_type->getKey('id');
    $query = \Drupal::database()->select($entity_type->getBaseTable(), 'e');
    $query->addTag('tmgmt_entity_get_translatable_entities');
    $query->addField('e', $id_key);
    $query->distinct();

    $langcode_table_alias = 'e';
    // @todo: Discuss if search should work on latest, default or all revisions.
    //   See https://www.drupal.org/project/tmgmt/issues/2984554.
    $data_table = $entity_type->isRevisionable() ? $entity_type->getRevisionDataTable() : $entity_type->getDataTable();
    if ($data_table) {
      $langcode_table_alias = $query->innerJoin($data_table, 'data_table', '%alias.' . $id_key . ' = e.' . $id_key . ' AND %alias.default_langcode = 1');
    }

    $property_conditions += array('langcode' => $langcodes);

    // Searching for sources with missing translation.
    if (!empty($property_conditions['target_status']) && !empty($property_conditions['target_language']) && in_array($property_conditions['target_language'], $languages)) {

      $translation_table_alias = \Drupal::database()->escapeTable('translation_' . $property_conditions['target_language']);
      $query->leftJoin($data_table, $translation_table_alias, "%alias.$id_key= e.$id_key AND %alias.langcode = :language",
        array(':language' => $property_conditions['target_language']));

      // Exclude entities with having source language same as the target language
      // we search for.
      $query->condition($langcode_table_alias . '.langcode', $property_conditions['target_language'], '<>');

      if ($property_conditions['target_status'] == 'untranslated_or_outdated') {
        $or = \Drupal::database()->condition('OR');
        $or->isNull("$translation_table_alias.langcode");
        $or->condition("$translation_table_alias.content_translation_outdated", 1);
        $query->condition($or);
      }
      elseif ($property_conditions['target_status'] == 'outdated') {
        $query->condition("$translation_table_alias.content_translation_outdated", 1);
      }
      elseif ($property_conditions['target_status'] == 'untranslated') {
        $query->isNull("$translation_table_alias.langcode");
      }
    }

    // Remove the condition so we do not try to add it again below.
    unset($property_conditions['target_language']);
    unset($property_conditions['target_status']);

    // Searching for the source label.
    if (!empty($label_key) && isset($property_conditions[$label_key])) {
      $search_token = trim($property_conditions[$label_key]);

      if ($search_token !== '') {
        $query->condition('data_table.' . $label_key, '%' . \Drupal::database()->escapeLike($search_token) . '%', 'LIKE');
      }

      unset($property_conditions[$label_key]);
    }

    if ($bundle_key = $entity_type->getKey('bundle')) {
      $bundles = array();
      $content_translation_manager = \Drupal::service('content_translation.manager');
      foreach (array_keys(\Drupal::service('entity_type.bundle.info')->getBundleInfo($entity_type_id)) as $bundle) {
        if ($content_translation_manager->isEnabled($entity_type_id, $bundle)) {
          $bundles[] = $bundle;
        }
      }
      if (!$bundles) {
        return NULL;
      }

      // If we have type property add condition.
      if (isset($property_conditions[$bundle_key])) {
        $query->condition('e.' . $bundle_key, $property_conditions[$bundle_key]);
        // Remove the condition so we do not try to add it again below.
        unset($property_conditions[$bundle_key]);
      }
      // If not, query db only for translatable node types.
      else {
        $query->condition('e.' . $bundle_key, $bundles, 'IN');
      }
    }

    // Add remaining query conditions which are expected to be handled in a
    // generic way.
    foreach ($property_conditions as $property_name => $property_value) {
      $alias = $property_name == 'langcode' ? $langcode_table_alias : 'e';
      $query->condition($alias . '.' . $property_name, (array) $property_value, 'IN');
    }
    $query->orderBy($entity_type->getKey('id'), 'DESC');

    return $query;
  }

  /**
   * Creates continuous job items for entity.
   *
   * Batch callback function.
   */
  public static function createContinuousJobItemsBatch($item_type, array $search_property_params, &$context) {
    if (empty($context['sandbox'])) {
      $context['sandbox']['offset'] = 0;
      $context['results']['job_items'] = 0;
      $context['sandbox']['progress'] = 0;
      $query = static::buildTranslatableEntitiesQuery($item_type, $search_property_params);
      $context['sandbox']['max'] = $query->countQuery()->execute()->fetchField();
    }
    $limit = \Drupal::config('tmgmt.settings')->get('source_list_limit');
    $entities = static::getTranslatableEntities($item_type, $search_property_params, FALSE, $context['sandbox']['offset'], $limit);
    $context['sandbox']['offset'] += $limit;

    // Loop through entities and add them to continuous jobs.
    foreach ($entities as $entity) {
      $context['results']['job_items'] += tmgmt_content_create_continuous_job_items($entity);
      $context['sandbox']['progress']++;
    }

    $context['message'] = t('Processed @number sources out of @max', array('@number' => $context['sandbox']['progress'], '@max' => $context['sandbox']['max']));
    if ($context['sandbox']['progress'] != $context['sandbox']['max']) {
      $context['finished'] = $context['sandbox']['progress'] / $context['sandbox']['max'];
    }
    elseif (count($entities) < $limit) {
      $context['finished'] = 1;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function reviewForm(array $form, FormStateInterface $form_state, JobItemInterface $item) {
    $form = parent::reviewForm($form, $form_state, $item);

    // Only proceed to display the content moderation form if the job item is
    // either active or reviewable.
    if (!$item->isNeedsReview() && !$item->isActive()) {
      return $form;
    }

    /** @var \Drupal\Core\Entity\ContentEntityInterface $entity */
    $entity = ContentEntitySource::load($item->getItemType(), $item->getItemId());

    if (!$form_state->isRebuilding() && $entity) {
      // In case the original entity is moderated, allow users to update the
      // content moderation state of the translation.
      if (ContentEntitySource::isModeratedEntity($entity)) {
        $form['moderation_state'] = $this->buildContentModerationElement($item, $entity);
      }
      // For non-moderated publishable entities, build a publish state form.
      elseif ($entity instanceof EntityPublishedInterface) {
        $form['status'] = $this->buildPublishStateElement($item, $entity);
      }
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function reviewFormSubmit(array $form, FormStateInterface $form_state, JobItemInterface $item) {
    // At this point, we don't need to check whether an entity is moderated or
    // publishable. Instead, we look for a specific key that may be set.
    if ($form_state->hasValue(['moderation_state', 'new_state'])) {
      // We are using a special #moderation_state key to carry the information
      // about the new moderation state value.
      // See \Drupal\tmgmt_content\Plugin\tmgmt\Source\ContentEntitySource::doSaveTranslations()
      $moderation_state = (array) $form_state->getValue(['moderation_state', 'new_state']);
      $item->updateData(['#moderation_state'], $moderation_state, TRUE);
    }
    elseif ($form_state->hasValue(['status', 'published'])) {
      $published = (array) (bool) $form_state->getValue(['status', 'published']);
      $item->updateData(['#published'], $published, TRUE);
    }

    parent::reviewFormSubmit($form, $form_state, $item);
  }

  /**
   * Build a publish state element.
   *
   * @param \Drupal\tmgmt\JobItemInterface $item
   *   The job item.
   * @param \Drupal\Core\Entity\EntityPublishedInterface $entity
   *   The source publishable entity.
   *
   * @return array
   *   A publish state form element.
   */
  protected function buildPublishStateElement(JobItemInterface $item, EntityPublishedInterface $entity) {
    $element = [
      '#type' => 'fieldset',
      '#title' => $this->t('Translation publish status'),
      '#tree' => TRUE,
    ];
    $published = $item->getData(['#published'], 0);
    $default_value = isset($published[0]) ? $published[0] : $entity->isPublished();

    $published_title = $this->t('Published');
    $published_field = $entity->getEntityType()->getKey('published');
    if ($entity instanceof FieldableEntityInterface && $entity->hasField($published_field)) {
      $published_field_definition = $entity->get($published_field)->getFieldDefinition();
      $published_title = $published_field_definition->getConfig($entity->bundle())->getLabel();
      if (!$published_field_definition->isTranslatable()) {
        $published_title = $this->t('@published_title (all languages)', [
          '@published_title' => $published_title,
        ]);
      }
    }

    $element['published'] = [
      '#type' => 'checkbox',
      '#default_value' => $default_value,
      '#title' => $published_title,
    ];

    return $element;
  }

  /**
   * Build a content moderation elemenet for the translation.
   *
   * @param \Drupal\tmgmt\JobItemInterface $item
   *   The job item.
   * @param \Drupal\Core\Entity\ContentEntityInterface $entity
   *   The source moderated entity.
   *
   * @return array
   *   A content moderation form element.
   */
  protected function buildContentModerationElement(JobItemInterface $item, ContentEntityInterface $entity) {
    $element = [];

    /** @var \Drupal\content_moderation\ModerationInformationInterface $moderation_info */
    $moderation_info = \Drupal::service('content_moderation.moderation_information');
    $workflow = $moderation_info->getWorkflowForEntity($entity);
    $moderation_validator = \Drupal::service('content_moderation.state_transition_validation');

    // Extract the current moderation state stored within the special key.
    $moderation_state = $item->getData(['#moderation_state'], 0);
    $current_state = isset($moderation_state[0]) ? $moderation_state[0] : $entity->get('moderation_state')->value;
    $default = $workflow->getTypePlugin()->getState($current_state);

    // Get a list of valid transitions.
    /** @var \Drupal\workflows\Transition[] $transitions */
    $transitions = $moderation_validator->getValidTransitions($entity, \Drupal::currentUser());

    $transition_labels = [];
    $default_value = NULL;
    foreach ($transitions as $transition) {
      $transition_to_state = $transition->to();
      $transition_labels[$transition_to_state->id()] = $transition_to_state->label();
      if ($default->id() === $transition_to_state->id()) {
        $default_value = $default->id();
      }
    }
    // Get the state of the new config, if not set fallback to the current one.
    if ($default_moderation_state = \Drupal::config('tmgmt_content.settings')->get('default_moderation_states.' . $workflow->id())) {
      $default_value = $default_moderation_state;
    }

    // See \Drupal\content_moderation\Plugin\Field\FieldWidget\ModerationStateWidget::formElement()
    $element += [
      '#type' => 'container',
      '#tree' => TRUE,
      'current' => [
        '#type' => 'item',
        '#title' => $this->t('Current source state'),
        '#markup' => $default->label(),
        '#wrapper_attributes' => [
          'class' => ['container-inline'],
        ],
      ],
      'new_state' => [
        '#type' => 'select',
        '#title' => $this->t('Translation state'),
        '#options' => $transition_labels,
        '#default_value' => $default_value,
        '#access' => !empty($transition_labels),
        '#wrapper_attributes' => [
          'class' => ['container-inline'],
        ],
      ],
    ];

    $element['#theme'] = ['entity_moderation_form'];
    $element['#attached']['library'][] = 'content_moderation/content_moderation';

    return $element;
  }

}
