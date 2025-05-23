<?php

namespace Drupal\Tests\tmgmt_content\Functional;

use Drupal\field\Entity\FieldConfig;
use Drupal\node\Entity\Node;
use Drupal\Tests\field\Traits\EntityReferenceFieldCreationTrait;
use Drupal\Tests\tmgmt\Functional\TmgmtEntityTestTrait;
use Drupal\Tests\tmgmt\Functional\TMGMTTestBase;
use Drupal\tmgmt_composite_test\Entity\EntityTestComposite;
use Drupal\workflows\Entity\Workflow;

/**
 * Tests content entity source integration with content moderation.
 *
 * @group tmgmt
 */
class ContentEntitySourceContentModerationTest extends TMGMTTestBase {

  use TmgmtEntityTestTrait;
  use EntityReferenceFieldCreationTrait;

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'tmgmt_content',
    'content_moderation',
    'field',
    'tmgmt_composite_test',
  ];

  /**
   * The workflow entity.
   *
   * @var \Drupal\workflows\WorkflowInterface
   */
  protected $workflow;

  /**
   * {@inheritdoc}
   */
  function setUp(): void {
    parent::setUp();

    $this->addLanguage('de');
    $this->addLanguage('es');
    $this->addLanguage('fr');
    $this->addLanguage('it');

    $this->createNodeType('page', 'Page', TRUE);
    $this->createNodeType('article', 'Article', TRUE);
    $this->createEditorialWorkflow('article');

    $this->loginAsAdmin([
      'create translation jobs',
      'submit translation jobs',
      'accept translation jobs',
      'administer blocks',
      'administer content translation',
    ]);
  }

  /**
   * Tests content moderation translations with untranslatable composites.
   */
  public function testModerationWithUntranslatableCompositeEntityReference() {
    $this->createNodeType('composite', 'composite', TRUE, FALSE);
    $this->createEditorialWorkflow('composite');

    // Enable entity translations for entity_test_composite.
    \Drupal::service('content_translation.manager')->setEnabled('entity_test_composite', 'entity_test_composite', TRUE);

    // Create the reference field to the composite entity test.
    $this->createEntityReferenceField('node', 'composite', 'entity_test_composite', 'entity_test_composite', 'entity_test_composite');
    FieldConfig::loadByName('node', 'composite', 'entity_test_composite')->setTranslatable(FALSE)->save();
    /** @var \Drupal\Core\Entity\Display\EntityFormDisplayInterface $fd */
    \Drupal::service('entity_display.repository')
      ->getFormDisplay('node', 'composite')
      ->setComponent('entity_test_composite', ['type' => 'entity_reference_autocomplete'])
      ->save();

    // Create the composite entity test.
    $composite = EntityTestComposite::create([
      'name' => 'composite name',
    ]);
    $composite->save();

    // Allow auto-accept.
    $this->default_translator->setAutoAccept(TRUE)->save();

    $user = $this->loginAsTranslator([
      'administer tmgmt',
      'translate any entity',
      'create content translations',
      'access content',
      'view own unpublished content',
      'edit own composite content',
      'access content overview',
      'view all revisions',
      'view latest version',
      'view test entity',
      'use ' . $this->workflow->id() . ' transition create_new_draft',
      'use ' . $this->workflow->id() . ' transition publish',
    ]);

    // Create a node with a reference to the composite entity test.
    $node = $this->createNode([
      'title' => 'node title',
      'type' => 'composite',
      'entity_test_composite' => $composite,
      'moderation_state' => 'published',
      'uid' => $user->id(),
    ]);

    // Create a draft.
    $this->drupalGet($node->toUrl('edit-form'));
    $edit = [
      'title[0][value]' => 'node title (draft)',
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, 'Save');

    // Create a translation in German.
    $this->drupalGet('/node/' . $node->id() . '/translations');
    $this->submitForm(['languages[de]' => TRUE], 'Request translation');
    $this->assertSession()->pageTextContainsOnce('One job needs to be checked out.');
    $this->submitForm(['target_language' => 'de'], 'Submit to provider');
    $this->assertSession()->pageTextContains('Test translation created.');
    $this->assertSession()->pageTextContains('This translation cannot be accepted as there is a pending revision in the default translation. You must publish node title (draft) first before saving this translation.');
    // Assert the translation can not be accepted if there is a composite entity
    // reference field.
    $this->clickLink('Review');
    $url = $this->getUrl();
    $this->submitForm([], 'Validate');
    $this->assertSession()->pageTextContainsOnce('Validation completed successfully.');
    $this->submitForm([], 'Save as completed');
    $this->assertSession()->pageTextContains('This translation cannot be accepted as there is a pending revision in the default translation. You must publish node title (draft) first before saving this translation.');
    // Publish the source draft first and accept the translation.
    $this->clickLink('node title (draft)');
    $this->submitForm(['new_state' => 'published'], 'Apply');
    $this->assertSession()->pageTextContainsOnce('The moderation state has been updated.');
    $this->drupalGet($url);
    $this->assertTrue($this->assertSession()->optionExists('edit-moderation-state-new-state', 'published')->isSelected());
    $this->submitForm([], 'Save as completed');
    $this->assertSession()->pageTextContains('The translation for node title (draft) has been accepted as de(de-ch): node title (draft).');
    $this->drupalGet($node->toUrl('edit-form')->toString());
    $this->assertSession()->fieldValueEquals('entity_test_composite[0][target_id]', 'composite name (' . $composite->id() . ')');
    $composite = EntityTestComposite::load($composite->id());
    $this->assertEquals('de(de-ch): composite name', $composite->getTranslation('de')->getName());

    $referenced_values = [
      'langcode' => 'en',
      'name' => 'Referenced entity',
    ];
    $referenced_entity = EntityTestComposite::create($referenced_values);
    $referenced_entity->save();

    // Create a main entity.
    $node = Node::create([
      'type' => 'composite',
      'title' => 'Example',
      'entity_test_composite' => $referenced_entity,
    ]);
    $node->save();

    $job = tmgmt_job_create('en', 'es');
    $job->translator = 'test_translator';
    $job->save();
    $job_item = tmgmt_job_item_create('content', 'node', $node->id(), ['tjid' => $job->id()]);
    $job_item->save();
    // Now request a translation.
    $job->requestTranslation();
    $job->acceptTranslation();
    $items = $job->getItems();
    $item = reset($items);
    $item->isAccepted();
    $node = Node::load($node->id());
    $this->assertTrue($node->hasTranslation('es'));

    $job = tmgmt_job_create('en', 'de');
    $job->acceptTranslation();
    $job->translator = 'test_translator';
    $job->save();
    $job_item = tmgmt_job_item_create('content', 'node', $node->id(), ['tjid' => $job->id()]);
    $job_item->save();
    // Now request a translation.
    $job->requestTranslation();
    $job->acceptTranslation();
    $items = $job->getItems();
    $item = reset($items);
    $item->isAccepted();
    $node = Node::load($node->id());
    $this->assertTrue($node->hasTranslation('de'));
  }

  /**
   * Test the content moderation workflow with translatable nodes.
   */
  function testModeratedContentTranslations() {
    $this->loginAsTranslator([
      'administer tmgmt',
      'translate any entity',
      'create content translations',
      'access content',
      'view own unpublished content',
      'edit own article content',
      'access content overview',
      'view all revisions',
      'view latest version',
      'use ' . $this->workflow->id() . ' transition create_new_draft',
      'use ' . $this->workflow->id() . ' transition publish',
    ]);

    // Create a node in English.
    $title = 'Moderated node';
    $node = $this->createNode([
      'title' => $title,
      'type' => 'article',
      'langcode' => 'en',
      'moderation_state' => 'published',
      'uid' => $this->translator_user->id(),
    ]);

    // Create a draft of the published node.
    $this->drupalGet($node->toUrl('edit-form'));
    $draft_title = '[Draft] ' . $title;
    $edit = [
      'title[0][value]' => $draft_title,
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, 'Save');

    // Go to content overview and translate a draft.
    $this->drupalGet('admin/tmgmt/sources');
    $this->assertSession()->linkExists($draft_title);
    $edit = [
      'items[' . $node->id() . ']' => $node->id(),
    ];
    $this->submitForm($edit, 'Request translation');
    $this->assertSession()->pageTextContains('One job needs to be checked out.');
    $this->assertSession()->pageTextContains($draft_title . ' (English to ?, Unprocessed)');
    $edit = [
      'target_language' => 'de',
    ];
    $this->submitForm($edit, 'Submit to provider');
    $this->assertSession()->pageTextContains(t('The translation of @title to German is finished and can now be reviewed.', ['@title' => $draft_title]));

    // Assert a draft label on the jobs overview page.
    $this->drupalGet('admin/tmgmt/jobs');
    $this->assertSession()->pageTextContains($draft_title);
    $this->clickLink('Manage');
    $this->assertSession()->pageTextContains($draft_title . ' (English to German, Active)');
    $this->clickLink('Review');
    $this->assertSession()->pageTextContains('Job item ' . $draft_title);

    // Assert there is no content moderation form element.
    $this->assertSession()->fieldNotExists('moderation_state|0|value[source]');
    // Assert custom content moderation form element.
    $this->assertSession()->pageTextContains('Current source state');
    $this->assertSession()->pageTextContains('Draft');
    $this->assertTrue($this->assertSession()->optionExists('edit-moderation-state-new-state', 'draft')->isSelected());
    // Change the moderation state of the translation to published.
    $translation_title = 'de(de-ch): [Published] ' . $title;
    $edit = [
      'title|0|value[translation]' => $translation_title,
      'moderation_state[new_state]' => 'published',
    ];
    $this->submitForm($edit, 'Save');
    $this->assertSession()->pageTextContains(t('The translation for @title has been saved successfully.', ['@title' => $draft_title]));
    $this->clickLink('Review');
    // The published state is preselected now.
    $this->assertTrue($this->assertSession()->optionExists('edit-moderation-state-new-state', 'published')->isSelected());
    $review_url = $this->getUrl();
    // Assert the preview mode.
    $this->clickLink('Preview');
    $this->assertSession()->pageTextContains(t('Preview of @title for German', ['@title' => $draft_title]));
    $this->assertSession()->pageTextContains($translation_title);
    // Save the translation as completed and assert the published translation.
    $this->drupalGet($review_url);
    $this->submitForm([], 'Save as completed');
    $this->assertSession()->pageTextContains('Validation completed successfully.');
    $this->assertSession()->pageTextContains(t('The translation for @title has been accepted as @translation_title.', ['@title' => $draft_title, '@translation_title' => $translation_title]));
    $this->clickLink($translation_title);
    $this->assertSession()->addressEquals('de/node/' . $node->id());
    $this->assertSession()->pageTextContains($translation_title);
    $this->clickLink('Revisions');
    $this->assertSession()->pageTextContains("Created by translation job $draft_title.");

    // There is one translation revision.
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'de', 1);

    // Assert the source entity has not changed.
    $this->drupalGet('node/' . $node->id());
    $this->assertSession()->pageTextContains($title);
    $this->drupalGet('node/' . $node->id() . '/latest');
    $this->assertSession()->pageTextContains($draft_title);

    // Translate the node to Spanish and save it as a draft.
    $this->drupalGet('admin/tmgmt/sources');
    $edit = [
      'target_language' => 'es',
      'items[' . $node->id() . ']' => $node->id(),
    ];
    $this->submitForm($edit, 'Request translation');
    $this->submitForm([], 'Submit to provider');
    $this->assertSession()->pageTextContains(t('The translation of @title to Spanish is finished and can now be reviewed.', ['@title' => $draft_title]));
    $this->clickLink('reviewed');
    // Spanish translation is saved as a draft.
    $this->submitForm([], 'Save as completed');
    $this->assertSession()->pageTextContains(t('The translation for @title has been accepted.', ['@title' => $draft_title]));
    $this->drupalGet('es/node/' . $node->id());
    // The spanish translation is not published. English content is displayed.
    $this->assertSession()->pageTextContains($title);
    $this->assertSession()->pageTextNotContains('es: ' . $title);
    $this->clickLink('Latest version');
    $this->assertSession()->pageTextContains('es: ' . $draft_title);

    // There is one more revision in German created when Spanish translation was
    // saved.
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'de', 2);
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'es', 1);

    // Create a new revision in the source language.
    $this->drupalGet($node->toUrl('edit-form'));
    $second_draft_title = "$draft_title (2)";
    $edit = [
      'title[0][value]' => $second_draft_title,
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, 'Save (this translation)');

    // The update to the source language creates a new German revision.
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'de', 3);

    // Create a draft revision in italian using core translation.
    $this->drupalGet('it/node/' . $node->id() . '/translations/add/en/it');
    $edit = [
      'title[0][value]' => "it: $second_draft_title",
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, 'Save (this translation)');
    // New German revision has been created when Italian translation was added.
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'de', 4);

    // Assert the source overview behavior.
    $this->drupalGet('admin/tmgmt/sources');
    $this->assertCount(1, $this->xpath('//tbody/tr'));
    // English is original language and it is linked.
    $this->assertTextByXpath('//tbody/tr[1]/td[4]/@class', 'langstatus-en');
    $this->assertTextByXpath('//tbody/tr[1]/td[4]/a/img/@title', 'Original language');
    // There is no french translation.
    $this->assertTextByXpath('//tbody/tr[1]/td[5]/@class', 'langstatus-fr');
    $this->assertTextByXpath('//tbody/tr[1]/td[5]/img/@title', 'Not translated');
    // There is a german translation (published).
    $this->assertTextByXpath('//tbody/tr[1]/td[6]/@class', 'langstatus-de');
    $this->assertTextByXpath('//tbody/tr[1]/td[6]/a/img/@title', 'Translation up to date');
    // There is an italian translation (saved as a draft).
    $this->assertTextByXpath('//tbody/tr[1]/td[7]/@class', 'langstatus-it');
    $this->assertTextByXpath('//tbody/tr[1]/td[7]/a/img/@title', 'Translation up to date');
    // There is a spanish translation (saved as a draft).
    $this->assertTextByXpath('//tbody/tr[1]/td[8]/@class', 'langstatus-es');
    $this->assertTextByXpath('//tbody/tr[1]/td[8]/a/img/@title', 'Translation up to date');

    // Assert the content overview filters.
    $this->drupalGet('admin/tmgmt/sources/content/node');
    $edit = [
      'search[target_language]' => 'de',
      'search[target_status]' => 'untranslated',
    ];
    $this->submitForm($edit, 'Search');
    // The german translation was published.
    $this->assertSession()->pageTextContains('No source items matching given criteria have been found.');
    $this->assertSession()->linkNotExists($second_draft_title);
    // The italian translation was saved as a draft.
    $edit = [
      'search[target_language]' => 'it',
      'search[target_status]' => 'untranslated',
    ];
    $this->submitForm($edit, 'Search');
    $this->assertSession()->pageTextContains('No source items matching given criteria have been found.');
    $this->assertSession()->linkNotExists($second_draft_title);
    // The french translation does not exist.
    $edit = [
      'search[target_language]' => 'fr',
      'search[target_status]' => 'untranslated',
    ];
    $this->submitForm($edit, 'Search');
    $this->assertSession()->linkExists($second_draft_title);

    // Translate a new revision to German.
    $this->drupalGet('admin/tmgmt/sources');
    $edit = [
      'target_language' => 'de',
      'items[' . $node->id() . ']' => $node->id(),
    ];
    $this->submitForm($edit, 'Request translation');
    $this->submitForm([], 'Submit to provider');
    $this->assertSession()->pageTextContains(t('The translation of @title to German is finished and can now be reviewed.', ['@title' => $second_draft_title]));
    $this->clickLink('reviewed');
    $this->assertTrue($this->assertSession()->optionExists('edit-moderation-state-new-state', 'draft')->isSelected());
    $this->submitForm([], 'Save as completed');

    // Submitting another German translation creates a new revision.
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'de', 5);

    // German language still shows the latest published translation.
    $this->drupalGet('de/node/' . $node->id());
    $this->assertSession()->pageTextContains($translation_title);
    $this->drupalGet('de/node/' . $node->id() . '/latest');
    $this->assertSession()->pageTextContains('de(de-ch): [Draft] Moderated node (2)');
    $this->clickLink('Revisions');
    $this->assertSession()->pageTextContains('Created by translation job [Draft] Moderated node (2).');
    $this->assertSession()->pageTextContains('Created by translation job [Draft] Moderated node.');
    // Italian translation was not published yet.
    $this->drupalGet('it/node/' . $node->id());
    $this->assertSession()->pageTextNotContains('it: ' . $second_draft_title);
    $this->clickLink('Latest version');
    $this->assertSession()->pageTextContains('it: ' . $second_draft_title);
    // Spanish translation was not published either.
    $this->drupalGet('es/node/' . $node->id());
    $this->assertSession()->pageTextNotContains('es: ' . $draft_title);
    $this->clickLink('Latest version');
    $this->assertSession()->pageTextContains('es: ' . $draft_title);

    // Create a published node.
    $title = 'Published article';
    $node = $this->createNode([
      'title' => $title,
      'type' => 'article',
      'langcode' => 'en',
      'moderation_state' => 'published',
      'uid' => $this->translator_user->id(),
    ]);
    // Create a draft.
    $this->drupalGet($node->toUrl('edit-form'));
    $draft_title = 'Draft article';
    $edit = [
      'title[0][value]' => $draft_title,
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, 'Save');
    // Publish a translation in German.
    $this->drupalGet('de/node/' . $node->id() . '/translations/add/en/de');
    $edit = [
      'title[0][value]' => "de: $draft_title",
      'moderation_state[0][state]' => 'published',
    ];
    $this->submitForm($edit, 'Save (this translation)');

    // Provide another translation in German using TMGMT.
    $this->drupalGet('admin/tmgmt/sources');
    $edit = [
      'items[' . $node->id() . ']' => $node->id(),
      'target_language' => 'de',
    ];
    $this->submitForm($edit, 'Request translation');
    $this->submitForm([], 'Submit to provider');
    $this->assertSession()->pageTextContains("The translation of $draft_title to German is finished and can now be reviewed.");
    $this->clickLink('reviewed');
    $this->assertTrue($this->assertSession()->optionExists('edit-moderation-state-new-state', 'draft')->isSelected());
    $edit = [
      'moderation_state[new_state]' => 'published',
    ];
    $this->submitForm($edit, 'Save as completed');
    $this->assertSession()->pageTextContains("The translation for $draft_title has been accepted as de(de-ch): $draft_title.");

    // Update the default moderation state.
    \Drupal::configFactory()->getEditable('tmgmt_content.settings')->set('default_moderation_states', [$this->workflow->id() => 'published'])->save();

    // Provide translation in Spanish as well.
    $this->drupalGet('admin/tmgmt/sources');
    $edit = [
      'items[' . $node->id() . ']' => $node->id(),
      'target_language' => 'es',
    ];
    $this->submitForm($edit, 'Request translation');
    $this->submitForm([], 'Submit to provider');
    $this->assertSession()->pageTextContains("The translation of $draft_title to Spanish is finished and can now be reviewed.");
    $this->clickLink('reviewed');
    // Assert that the default moderation state is being set.
    $this->assertTrue($this->assertSession()->optionExists('edit-moderation-state-new-state', 'published')->isSelected());
    $this->submitForm([], 'Save as completed');
    $this->assertSession()->pageTextContains("The translation for $draft_title has been accepted as es: $draft_title.");

    // The latest revision contains all the translations.
    $node = Node::load($node->id());
    $this->assertEquals(['en', 'de', 'es'], array_keys($node->getTranslationLanguages()));

    // Create a node in German language.
    $node = $this->createNode([
      'title' => 'Moderated node (de)',
      'type' => 'article',
      'langcode' => 'de',
      'moderation_state' => 'published',
      'uid' => $this->translator_user->id(),
    ]);
    // Create a draft of the published node.
    $this->drupalGet($node->toUrl('edit-form'));
    $edit = [
      'title[0][value]' => 'Draft node (de)',
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, 'Save');
    // Go to the overview and and assert there is a draft in german language.
    $this->drupalGet('admin/tmgmt/sources');
    $this->assertSession()->pageTextContains('Draft node (de)');
    $this->assertSession()->pageTextNotContains('Moderated node (de)');
  }

  /**
   * Asserts number of revisions for the given node ID and language code.
   */
  protected function assertNodeTranslationsRevisionsCount($id, $langcode, $expected) {
    $translation_revisions_count = \Drupal::entityQuery('node')
      ->accessCheck(FALSE)
      ->condition('nid', $id)
      ->condition('langcode', $langcode)
      ->allRevisions()
      ->count()
      ->execute();
    $this->assertEquals($expected, $translation_revisions_count);
  }

  /**
   * Test the non-moderated workflow with translatable nodes.
   */
  function testNonModeratedContentTranslations() {
    $this->loginAsTranslator([
      'translate any entity',
      'create content translations',
      'administer nodes',
      'bypass node access',
    ]);

    // Create an unpublished node in English.
    $title = 'Non-moderated node';
    $node = $this->createNode([
      'title' => $title,
      'type' => 'page',
      'langcode' => 'en',
      'status' => FALSE,
      'uid' => $this->translator_user->id(),
    ]);

    // Go to content overview and translate the unpublished node.
    $this->drupalGet('admin/tmgmt/sources');
    $this->assertSession()->linkExists($title);
    $edit = [
      'items[' . $node->id() . ']' => $node->id(),
    ];
    $this->submitForm($edit, 'Request translation');
    $this->assertSession()->pageTextContains('One job needs to be checked out.');
    $this->assertSession()->pageTextContains($title . ' (English to ?, Unprocessed)');
    $edit = [
      'target_language' => 'de',
    ];
    $this->submitForm($edit, 'Submit to provider');
    $this->assertSession()->pageTextContains(t('The translation of @title to German is finished and can now be reviewed.', ['@title' => $title]));

    // Assert a draft label on the jobs overview page.
    $this->clickLink('reviewed');
    $this->assertSession()->pageTextContains('Job item ' . $title);
    // No moderation form element is displayed for non-moderated entities.
    $this->assertSession()->pageTextNotContains('Current source state');
    $this->assertSession()->pageTextContains('Translation publish status');
    // The source node is not published so translation inherits the state.
    $this->assertSession()->checkboxNotChecked('edit-status-published');
    // Publish the translation.
    $translation_title = 'de(de-ch): [Published] ' . $title;
    $edit = [
      'title|0|value[translation]' => $translation_title,
      'status[published]' => TRUE,
    ];
    $this->submitForm($edit, 'Save');
    $this->assertSession()->pageTextContains(t('The translation for @title has been saved successfully.', ['@title' => $title]));
    $this->clickLink('Review');
    // The published field is preselected now.
    $this->assertSession()->checkboxChecked('edit-status-published');
    // Save the translation as completed and assert the published translation.
    $this->submitForm([], 'Save as completed');
    $this->assertSession()->pageTextContains('Validation completed successfully.');
    $this->assertSession()->pageTextContains(t('The translation for @title has been accepted as @translation_title.', ['@title' => $title, '@translation_title' => $translation_title]));
    $this->clickLink($translation_title);
    $this->assertSession()->addressEquals('de/node/' . $node->id());
    $this->assertSession()->pageTextContains($translation_title);
    $this->clickLink('Revisions');
    $this->assertSession()->pageTextContains("Created by translation job $title.");

    // There is one translation revision.
    $this->assertNodeTranslationsRevisionsCount($node->id(), 'de', 1);

    // Create an unpublished Spanish translation.
    $this->drupalGet('admin/tmgmt/sources');
    $edit = [
      'target_language' => 'es',
      'items[' . $node->id() . ']' => $node->id(),
    ];
    $this->submitForm($edit, 'Request translation');
    $this->submitForm([], 'Submit to provider');
    $this->assertSession()->pageTextContains(t('The translation of @title to Spanish is finished and can now be reviewed.', ['@title' => $title]));
    $this->clickLink('reviewed');
    $this->submitForm([], 'Save as completed');
    // Spanish translation is unpublished.
    $this->assertSession()->pageTextContains(t('The translation for @title has been accepted as es: @title', ['@title' => $title]));
    $this->drupalLogout();

    // The spanish translation is not published.
    $this->drupalGet('es/node/' . $node->id());
    $this->assertSession()->statusCodeEquals(403);
    // The source is still unpublished.
    $this->drupalGet('node/' . $node->id());
    $this->assertSession()->statusCodeEquals(403);
    // The german translation is published.
    $this->drupalGet('de/node/' . $node->id());
    $this->assertSession()->statusCodeEquals(200);
  }

  /**
   * Creates a workflow entity.
   *
   * @param string $bundle
   *   The node bundle.
   */
  protected function createEditorialWorkflow($bundle) {
    if (!isset($this->workflow)) {
      $this->workflow = Workflow::create([
        'type' => 'content_moderation',
        'id' => $this->randomMachineName(),
        'label' => 'Editorial',
        'type_settings' => [
          'states' => [
            'archived' => [
              'label' => 'Archived',
              'weight' => 5,
              'published' => FALSE,
              'default_revision' => TRUE,
            ],
            'draft' => [
              'label' => 'Draft',
              'published' => FALSE,
              'default_revision' => FALSE,
              'weight' => -5,
            ],
            'published' => [
              'label' => 'Published',
              'published' => TRUE,
              'default_revision' => TRUE,
              'weight' => 0,
            ],
          ],
          'transitions' => [
            'archive' => [
              'label' => 'Archive',
              'from' => ['published'],
              'to' => 'archived',
              'weight' => 2,
            ],
            'archived_draft' => [
              'label' => 'Restore to Draft',
              'from' => ['archived'],
              'to' => 'draft',
              'weight' => 3,
            ],
            'archived_published' => [
              'label' => 'Restore',
              'from' => ['archived'],
              'to' => 'published',
              'weight' => 4,
            ],
            'create_new_draft' => [
              'label' => 'Create New Draft',
              'to' => 'draft',
              'weight' => 0,
              'from' => [
                'draft',
                'published',
              ],
            ],
            'publish' => [
              'label' => 'Publish',
              'to' => 'published',
              'weight' => 1,
              'from' => [
                'draft',
                'published',
              ],
            ],
          ],
        ],
      ]);
    }

    $this->workflow->getTypePlugin()->addEntityTypeAndBundle('node', $bundle);
    $this->workflow->save();
  }

}
