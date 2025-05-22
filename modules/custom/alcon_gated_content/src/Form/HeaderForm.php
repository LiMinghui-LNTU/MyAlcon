<?php

namespace Drupal\alcon_gated_content\Form;

use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provide settings page for adding Geo redirect JS before the end of body tag.
 */
class HeaderForm extends ConfigFormBase {
  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The entity repository.
   *
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  /**
   * Constructs all services.
   *
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Entity\EntityRepositoryInterface $entity_repository
   *   The entity repository.
   */
  public function __construct(LanguageManagerInterface $language_manager, EntityTypeManagerInterface $entity_type_manager, EntityRepositoryInterface $entity_repository) {
    $this->languageManager = $language_manager;
    $this->entityTypeManager = $entity_type_manager;
    $this->entityRepository = $entity_repository;
  }

  /**
   * Implements FormBuilder::getFormId.
   */
  public function getFormId() {
    return 'gated_content_details';
  }

  /**
   * Implements ConfigFormBase::getEditableConfigNames.
   */
  protected function getEditableConfigNames() {
    return ['alcon_gated_content.details.settings'];
  }

  /**
   * Implements FormBuilder::buildForm.
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $header_section = $this->config('alcon_gated_content.details.settings')->get();

    $term_data = [];
    $lang_code = $this->languageManager->getCurrentLanguage()->getId();
    $vocabulary_name = 'gated_content_country';
    $query = $this->entityTypeManager->getStorage('taxonomy_term')->getQuery();
    $query->accessCheck(TRUE);
    $query->condition('vid', $vocabulary_name);
    $query->sort('weight');
    $tids = $query->execute();
    $terms = $this->entityTypeManager->getStorage('taxonomy_term')->loadMultiple($tids);
    foreach ($terms as $term) {
      $taxonomy_term_trans = $this->entityRepository->getTranslationFromContext($term, $lang_code);
      $term_data[$term->id()] = $taxonomy_term_trans->getName();
    }
    $form['advanced'] = [
      '#type' => 'horizontal_tabs',
      '#title' => $this
        ->t('Settings'),
    ];
    $form['base'] = [
      '#type' => 'details',
      '#title' => $this
        ->t('Settings'),
      '#group' => 'advanced',
    ];
    $form['base']['gated_content_details'] = [
      '#type'        => 'fieldset',
      '#title'       => $this->t('Gated Content Settings'),
    ];

    $form['base']['gated_content_details']['details'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Duration (Cookie Expire Time)'),
      '#default_value' => $header_section['details'] ?? 180,
      '#description'   => $this->t('<p>You can add Cookie Expire time here. This value is in Days. Cookie Expire time(Duration) will be current date + Cookie Expire time(Days).</p>'),
      '#attributes' => [
        ' type' => 'number',
      ],
    ];
    $form['base']['gated_content_details']['country'] = [
      '#type' => 'select',
      '#title' => $this->t('Country'),
      '#default_value' => $header_section['country'] ?? '',
      '#options' => $term_data,
      '#description' => $this->t('<p>Country selector driven by the “Gated Content Country” taxonomy vocabulary. This selected country will be used as default value for Gated content form(Country)</p>'),
    ];
    $form['base']['gated_content_details']['cookie_expire_date'] = [
      '#type' => 'date',
      '#title' => $this->t('Cookie Expire Date'),
      '#default_value' => $header_section['cookie_expire_date'] ?? '',
      '#description' => $this->t('<p>This field is to use delete cookies from user system. Once You will set expiration date, all created(past) cookies before expiration date will be deleted from user system.</p><p><b>Warning: Please select past date only, otherwise after submit gated content form will not disappear for user.</b></p>'),
    ];
    $form['base']['gated_content_help']['help'] = [
      '#type'          => 'item',
      '#title'         => $this->t('Help:'),
      '#description'   => $this->t('Gated content requires a user to complete a form to gaining access to that section of content within a website.</p><p>If you want to enable gated content for specific page, on page edit you will get option to enable gated content with select option for gated form and SFCD Campaign Id. <p>If you want to add new Country, SFDC Campaign ID or Specialty, please go to in Structure->Taxonomy-> Specific Vocabulary and add new item.</p>'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * Implements validation for date field.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    $selected_date = $form_state->getValue('cookie_expire_date');
    $current_date = date('Y-m-d');
    if ($selected_date >= $current_date) {
      $form_state->setErrorByName('cookie_expire_date', $this->t('Please select a past date.'));
    }
  }

  /**
   * Implements FormBuilder::submitForm().
   *
   * Serialize the user's settings and save it to the Drupal's config Table.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->configFactory()
      ->getEditable('alcon_gated_content.details.settings')
      ->set('details', $values['details'])
      ->set('country', $values['country'])
      ->set('cookie_expire_date', $values['cookie_expire_date'])
      ->save();

    $this->messenger()->addStatus($this->t('Your Settings have been saved.'));
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('language_manager'),
      $container->get('entity_type.manager'),
      $container->get('entity.repository')
    );
  }

}
