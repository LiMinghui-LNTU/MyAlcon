<?php

namespace Drupal\Tests\tmgmt\FunctionalJavascript;

use Drupal\file\Entity\File;
use Drupal\filter\Entity\FilterFormat;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\Tests\tmgmt\Functional\TmgmtEntityTestTrait;
use Drupal\Tests\tmgmt\Functional\TmgmtTestTrait;
use Drupal\tmgmt\Entity\Job;
use Drupal\tmgmt\Entity\JobItem;
use Drupal\tmgmt\Entity\Translator;

/**
 * Verifies the UI of the review form.
 *
 * @group tmgmt
 */
class TMGMTUiJavascriptTest extends WebDriverTestBase {

  use TmgmtTestTrait;
  use TmgmtEntityTestTrait;

  /**
   * A default translator using the test translator.
   *
   * @var \Drupal\tmgmt\Entity\Translator
   */
  protected $default_translator;

  /**
   * A file entity.
   *
   * @var \Drupal\file\FileInterface
   */
  protected $image;

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = array(
    'tmgmt',
    'tmgmt_test',
    'tmgmt_content',
    'image',
    'node',
    'block',
    'locale',
  );

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  function setUp(): void {
    parent::setUp();

    $this->addLanguage('de');

    $this->default_translator = Translator::load('test_translator');

    $filtered_html_format = FilterFormat::create(array(
      'format' => 'filtered_html',
      'name' => 'Filtered HTML',
    ));
    $filtered_html_format->save();

    $this->drupalCreateContentType(array('type' => 'test_bundle'));

    $this->loginAsAdmin(array(
      'create translation jobs',
      'submit translation jobs',
      'create test_bundle content',
      $filtered_html_format->getPermissionName(),
    ));

    \Drupal::service('file_system')->copy(DRUPAL_ROOT . '/core/misc/druplicon.png', 'public://example.jpg');
    $this->image = File::create(array(
      'uri' => 'public://example.jpg',
    ));
    $this->image->save();
  }

  /**
   * Tests of the job item review process.
   */
  public function testReview() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $job = $this->createJob();
    $job->translator = $this->default_translator->id();
    $job->settings = array();
    $job->save();
    $item = $job->addItem('test_source', 'test', 1);
    // The test expects the item to be active.
    $item->active();

    $data = \Drupal::service('tmgmt.data')->flatten($item->getData());
    $keys = array_keys($data);
    $key = $keys[0];

    $this->drupalGet('admin/tmgmt/items/' . $item->id());

    // Test that source and target languages are displayed.
    $assert_session->pageTextContains($item->getJob()->getSourceLanguage()->getName());
    $assert_session->pageTextContains($item->getJob()->getTargetLanguage()->getName());

    // Testing the title of the preview page.
    $title_element = $page->find('css', 'title');
    $this->assertEquals('Job item ' . $item->label() . ' | Drupal', $title_element->getHtml());

    // Testing the result of the
    // TMGMTTranslatorUIControllerInterface::reviewDataItemElement()
    $assert_session->pageTextContains(t('Testing output of review data item element @key from the testing provider.', array('@key' => $key)));

    // Test the review tool source textarea.
    $this->assertSession()->fieldValueEquals('dummy|deep_nesting[source]', $data[$key]['#text']);

    // Save translation.
    $this->submitForm(['dummy|deep_nesting[translation]' => $data[$key]['#text'] . 'translated'], 'Save');

    // Test review data item.
    $this->drupalGet('admin/tmgmt/items/' . $item->id());
    $page->pressButton('reviewed-dummy|deep_nesting');
    $assert_session->assertWaitOnAjaxRequest();
    $assert_session->responseContains('icons/gray-check.svg" alt="Reviewed"');

    \Drupal::entityTypeManager()->getStorage('tmgmt_job')->resetCache();
    \Drupal::entityTypeManager()->getStorage('tmgmt_job_item')->resetCache();
    /** @var JobItem $item */
    $item = JobItem::load($item->id());
    $this->assertEquals(1, $item->getCountReviewed(), 'Item reviewed correctly.');

    // Check if translation has been saved.
    $this->assertSession()->fieldValueEquals('dummy|deep_nesting[translation]', $data[$key]['#text'] . 'translated');

    // Tests for the minimum height of the textareas.
    $rows = $this->xpath('//textarea[@name="dummy|deep_nesting[source]"]');
    $this->assertEquals(3, (string) $rows[0]->getAttribute('rows'));

    $rows2 = $this->xpath('//textarea[@name="dummy|deep_nesting[translation]"]');
    $this->assertEquals(3, (string) $rows2[0]->getAttribute('rows'));

    // Test data item status when content changes.
    $this->submitForm([], 'Save');
    $this->drupalGet('admin/tmgmt/items/' . $item->id());
    $assert_session->responseContains('icons/gray-check.svg" alt="Reviewed"');
    $edit = [
      'dummy|deep_nesting[translation]' => 'New text for job item',
    ];
    $this->submitForm($edit, 'Save');
    $this->drupalGet('admin/tmgmt/items/' . $item->id());
    $assert_session->responseContains('icons/gray-check.svg" alt="Reviewed"');
    $this->assertSession()->fieldValueEquals('dummy|deep_nesting[translation]', 'New text for job item');

    // Test for the dynamical height of the source textarea.
    \Drupal::state()->set('tmgmt.test_source_data', array(
      'dummy' => array(
        'deep_nesting' => array(
          '#text' => str_repeat('Text for job item', 20),
          '#label' => 'Label',
        ),
      ),
    ));
    $item2 = $job->addItem('test_source', 'test', 2);
    $this->drupalGet('admin/tmgmt/items/' . $item2->id());

    $rows3 = $this->xpath('//textarea[@name="dummy|deep_nesting[source]"]');
    $this->assertEquals(4, (string) $rows3[0]->getAttribute('rows'));

    // Test for the maximum height of the source textarea.
    \Drupal::state()->set('tmgmt.test_source_data', array(
      'dummy' => array(
        'deep_nesting' => array(
          '#text' => str_repeat('Text for job item', 100),
          '#label' => 'Label',
        ),
      ),
    ));
    $item3 = $job->addItem('test_source', 'test', 3);
    $this->drupalGet('admin/tmgmt/items/' . $item3->id());

    $rows4 = $this->xpath('//textarea[@name="dummy|deep_nesting[source]"]');
    $this->assertEquals(15, (string) $rows4[0]->getAttribute('rows'));

    // Tests the HTML tags validation.
    \Drupal::state()->set('tmgmt.test_source_data', array(
      'title' => array(
        'deep_nesting' => array(
          '#text' => '<p><em><strong>Source text bold and Italic</strong></em></p>',
          '#label' => 'Title',
        ),
      ),
      'body' => array(
        'deep_nesting' => array(
          '#text' => '<p><em><strong>Source body bold and Italic</strong></em></p>',
          '#label' => 'Body',
        )
      ),
    ));
    $item4 = $job->addItem('test_source', 'test', 4);
    $this->drupalGet('admin/tmgmt/items/' . $item4->id());

    // Drop <strong> tag in translated text.
    $edit = array(
      'title|deep_nesting[translation]' => '<em>Translated italic text missing paragraph</em>',
    );
    $this->submitForm($edit, 'Validate HTML tags');
    $assert_session->responseContains(t('Expected tags @tags not found.', array('@tags' => '<p>,<strong>,</strong>,</p>')));
    $assert_session->responseContains(t('@tag expected 1, found 0.', array('@tag' => '<p>')));
    $assert_session->responseContains(t('@tag expected 1, found 0.', array('@tag' => '<strong>')));
    $assert_session->responseContains(t('@tag expected 1, found 0.', array('@tag' => '</strong>')));
    $assert_session->responseContains(t('@tag expected 1, found 0.', array('@tag' => '</p>')));
    $assert_session->pageTextContains('HTML tag validation failed for 1 field(s).');

    // Change the order of HTML tags.
    $edit = array(
      'title|deep_nesting[translation]' => '<p><strong><em>Translated text Italic and bold</em></strong></p>',
    );
    $this->submitForm($edit, 'Validate HTML tags');
    $assert_session->pageTextContains('Order of the HTML tags are incorrect.');
    $assert_session->pageTextContains('HTML tag validation failed for 1 field(s).');

    // Add multiple tags incorrectly.
    $edit = array(
      'title|deep_nesting[translation]' => '<p><p><p><p><strong><em><em>Translated text Italic and bold, many tags</em></strong></strong></strong></p>',
    );
    $this->submitForm($edit, 'Validate HTML tags');
    $assert_session->responseContains(t('@tag expected 1, found 4.', array('@tag' => '<p>')));
    $assert_session->responseContains(t('@tag expected 1, found 2.', array('@tag' => '<em>')));
    $assert_session->responseContains(t('@tag expected 1, found 3.', array('@tag' => '</strong>')));
    $assert_session->pageTextContains('HTML tag validation failed for 1 field(s).');

    // Check validation errors for two fields.
    $edit = array(
      'title|deep_nesting[translation]' => '<p><p><p><p><strong><em><em>Translated text Italic and bold, many tags</em></strong></strong></strong></p>',
      'body|deep_nesting[translation]' => '<p>Source body bold and Italic</strong></em></p>',
    );
    $this->submitForm($edit, 'Validate HTML tags');
    $assert_session->pageTextContains('HTML tag validation failed for 2 field(s).');

    // Tests that there is always a title.
    $text = '<p><em><strong>Source text bold and Italic</strong></em></p>';
    \Drupal::state()->set('tmgmt.test_source_data', [
      'title' => [
        [
          'value' => [
            '#text' => $text,
            '#label' => 'Title',
            '#translate' => TRUE,
            '#format' => 'filtered_html',
          ],
        ],
      ],
      'body' => [
        'deep_nesting' => [
          '#text' => $text,
          '#label' => 'Body',
          '#translate' => TRUE,
          '#format' => 'filtered_html',
        ],
      ],
    ]);
    $item5 = $job->addItem('test_source', 'test', 4);

    $this->drupalGet($item5->toUrl());
    $this->submitForm([], 'Validate');
    $assert_session->pageTextContains('The field is empty.');

    // Test review just one data item.
    $this->drupalGet('admin/tmgmt/items/' . $item5->id());
    $page->fillField('title|0|value[translation][value]', $text . 'translated');
    $page->fillField('body|deep_nesting[translation][value]', $text . 'no save');
    $page->pressButton('reviewed-title|0|value');
    $assert_session->assertWaitOnAjaxRequest();

    // Check if translation has been saved.
    $this->drupalGet('admin/tmgmt/items/' . $item5->id());
    $this->assertSession()->fieldValueEquals('title|0|value[translation][value]', $text . 'translated');
    $this->assertSession()->fieldValueNotEquals('body|deep_nesting[translation][value]', $text . 'no save');

    // Test if the multibyte character length is 15 characters.
    $mb_text = '文字長が15文字のMBテキスト';

    // Tests field is less than max_length.
    \Drupal::state()->set('tmgmt.test_source_data', [
      'title' => [
        [
          'value' => [
            '#text' => $text,
            '#label' => 'Title',
            '#translate' => TRUE,
            '#max_length' => 10,
          ],
        ],
      ],
      'body' => [
        'deep_nesting' => [
          '#text' => $text,
          '#label' => 'Body',
          '#translate' => TRUE,
          '#max_length' => 20,
        ],
      ],
      // There are 15 multibyte characters so no error occurs in this field.
      'field1' => [
        [
          'value' => [
            '#text' => $mb_text,
            '#label' => 'Field1',
            '#translate' => TRUE,
            '#max_length' => 15,
          ],
        ],
      ],
      // An error will occur in this field because you have entered
      // 15 characters of text into a field with a character limit of 10.
      // However, if it had miscalculated the multibyte characters,
      // the error will display the wrong number of characters.
      'field2' => [
        [
          'value' => [
            '#text' => $mb_text,
            '#label' => 'Field2',
            '#translate' => TRUE,
            '#max_length' => 10,
          ],
        ],
      ],
    ]);
    $item5 = $job->addItem('test_source', 'test', 4);

    $this->drupalGet($item5->toUrl());
    $this->submitForm([
      'title|0|value[translation]' => $text,
      'body|deep_nesting[translation]' => $text,
      'field1|0|value[translation]' => $mb_text,
      'field2|0|value[translation]' => $mb_text,
    ], 'Save');
    $assert_session->pageTextContains(t('The field has @size characters while the limit is @limit.', [
      '@size' => mb_strlen($text),
      '@limit' => 10,
    ]));
    $assert_session->pageTextContains(t('The field has @size characters while the limit is @limit.', [
      '@size' => mb_strlen($text),
      '@limit' => 20,
    ]));

    // Check that there are no errors due to incorrect calculation of the number of multibyte characters.
    $assert_session->pageTextNotContains(t('The field has @size characters while the limit is @limit.', [
      '@size' => strlen($mb_text),
      '@limit' => 15,
    ]));

    // $mb_text is a multibyte string of 15 characters.
    // Verify that the program is counting the characters correctly.
    $assert_session->pageTextContains(t('The field has @size characters while the limit is @limit.', [
      '@size' => mb_strlen($mb_text),
      '@limit' => 10,
    ]));

    // Test if the validation is properly done.
    $page->pressButton('reviewed-body|deep_nesting');
    $this->assertSession()->pageTextContainsOnce((string) t('The field has @size characters while the limit is @limit.', [
      '@size' => mb_strlen($text),
      '@limit' => '10',
    ]));

    // Test for the text with format set.
    \Drupal::state()->set('tmgmt.test_source_data', array(
      'dummy' => array(
        'deep_nesting' => array(
          '#text' => 'Text for job item',
          '#label' => 'Label',
          '#format' => 'filtered_html',
        ),
      ),
    ));
    $item5 = $job->addItem('test_source', 'test', 5);
    $item5->active();

    $this->drupalGet('admin/tmgmt/jobs/' . $job->id());
    $assert_session->pageTextContains('The translation of test_source:test:1 to German is finished and can now be reviewed.');
    $this->clickLink('reviewed');
    $assert_session->pageTextContains('Needs review');
    $title_element = $page->find('css', 'title');
    $this->assertEquals('Job item ' . $item->label() . ' | Drupal', $title_element->getHtml());

    $this->drupalGet($job->toUrl());
    $edit = array(
      'target_language' => 'de',
      'settings[action]' => 'submit',
    );
    $this->submitForm($edit, 'Submit to provider');

    $this->drupalGet('admin/tmgmt/items/' . $item5->id());
    $xpath = $this->xpath('//*[@id="edit-dummydeep-nesting-translation-format-guidelines"]/div//h4');
    $this->assertEquals('Filtered HTML', $xpath[0]->getHtml());
    $rows5 = $this->xpath('//textarea[@name="dummy|deep_nesting[source][value]"]');
    $this->assertEquals(3, (string) $rows5[0]->getAttribute('rows'));

    $this->submitForm([], 'Save');
    $assert_session->pageTextNotContains('has been saved successfully.');
    $this->drupalGet('admin/tmgmt/items/' . $item5->id());
    $assert_session->pageTextContains('In progress');
    $edit = array(
      'dummy|deep_nesting[translation][value]' => 'Translated text for job item',
    );
    $this->submitForm($edit, 'Save');
    $assert_session->pageTextContains('The translation for ' . trim($item5->label()) . ' has been saved successfully.');
    $this->drupalGet('admin/tmgmt/items/' . $item5->id());
    $assert_session->pageTextContains('Translated text for job item');
    $this->submitForm($edit, 'Save as completed');
    $this->assertEquals('Translated text for job item', \Drupal::state()->get('tmgmt_test_saved_translation_' . $item5->getItemType() . '_' . $item5->getItemId())['dummy']['deep_nesting']['#translation']['#text']);

    // Test if the icons are displayed.
    $assert_session->responseContains('views-field-progress">Accepted');
    $assert_session->responseContains('icons/ready.svg"');
    $assert_session->responseContains('title="Needs review"');
    $this->loginAsAdmin();

    // Create two translators.
    $translator1 = $this->createTranslator();
    $translator2 = $this->createTranslator();
    $this->drupalGet('admin/tmgmt/jobs');

    // Assert that translators are in dropdown list.
    $this->assertSession()->optionExists('edit-translator', $translator1->id());
    $this->assertSession()->optionExists('edit-translator', $translator2->id());

    // Assign each job to a translator.
    $job1 = $this->createJob();
    $this->drupalGet('admin/tmgmt/jobs');
    $label = trim($this->xpath('//table/tbody/tr/td[2]')[0]->getHtml());

    $job2 = $this->createJob();
    $this->drupalGet('admin/tmgmt/jobs');
    $this->assertNotEmpty($label, trim($this->xpath('//table/tbody/tr/td[2]')[0]->getHtml()));
    $job1->set('translator', $translator1->id())->save();
    $job2->set('translator', $translator2->id())->save();

    // Test that progress bar is being displayed.
    $assert_session->responseContains('class="tmgmt-progress tmgmt-progress-pending" style="width: 50%"');

    // Filter jobs by translator and assert values.
    $this->drupalGet('admin/tmgmt/jobs', array('query' => array('translator' => $translator1->id())));
    $label = trim($this->xpath('//table/tbody/tr/td[5]')[0]->getHtml());
    $this->assertEquals($translator1->label(), $label, 'Found provider label in table');
    $this->assertNotEquals($translator2->label(), $label,"Providers filtered in table");
    $this->drupalGet('admin/tmgmt/jobs', array('query' => array('translator' => $translator2->id())));
    $label = trim($this->xpath('//table/tbody/tr/td[5]')[0]->getHtml());
    $this->assertEquals($translator2->label(), $label, 'Found provider label in table');
    $this->assertNotEquals($translator1->label(), $label,"Providers filtered in table");

    $edit = array(
      'dummy|deep_nesting[translation]' => '',
    );
    $this->drupalGet('admin/tmgmt/items/' . $item->id());
    $this->submitForm($edit, 'Validate');
    $assert_session->pageTextContains('The field is empty.');

    $this->submitForm([], 'Save');
    $assert_session->pageTextNotContains('The field is empty.');

    $this->drupalGet('admin/tmgmt/items/' . $item->id());
    $this->submitForm([], 'Save as completed');
    $assert_session->pageTextContains('The field is empty.');

    // Test validation message for 'Validate' button.
    $this->drupalGet('admin/tmgmt/items/' . $item->id());
    $translation_field = $this->randomMachineName();
    $edit = array(
      'dummy|deep_nesting[translation]' => $translation_field,
    );
    $this->submitForm($edit, 'Validate');
    $assert_session->pageTextContains('Validation completed successfully.');

    // Test validation message for 'Validate HTML tags' button.
    $this->submitForm($edit, 'Validate HTML tags');
    $assert_session->pageTextContains('Validation completed successfully.');

    // Test that normal job item are shown in job items overview.
    $this->drupalGet('admin/tmgmt/job_items', array('query' => array('state' => 'All')));
    $assert_session->pageTextNotContains($job1->label());

    // Test that the legend is being displayed.
    $assert_session->responseContains('class="tmgmt-color-legend clearfix"');

    // Test that progress bar is being displayed.
    $assert_session->responseContains('class="tmgmt-progress tmgmt-progress-reviewed" style="width: 100%"');
  }

  /**
   * Test the Revisions of a job item.
   *
   * @todo Will be extended with the diff support.
   * @todo There will be another test that checks for changes and merges with diffs.
   */
  function testItemRevision() {
    $this->loginAsAdmin();

    // Create a translator.
    $translator = $this->createTranslator();
    // Create a job and attach to the translator.
    $job = $this->createJob();
    $job->translator = $translator;
    $job->settings = array();
    $job->save();
    $job->setState(Job::STATE_ACTIVE);
    // Add item to the job.
    $item = $job->addItem('test_source', 'test', 1);
    $this->drupalGet('admin/tmgmt/jobs/');
    $this->clickLink('Manage');
    $this->clickLink('View');
    $edit = [
      'dummy|deep_nesting[translation]' => 'any_value',
    ];
    $this->submitForm($edit, 'Save');
    $this->clickLink('Review');
    $edit = [
      'dummy|deep_nesting[translation]' => 'any_different_value',
    ];
    $this->submitForm($edit, 'Save');
    $this->clickLink('Review');
    $page = $this->getSession()->getPage();
    $page->pressButton('revert-dummy|deep_nesting');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $this->assertSession()->pageTextContains('Translation for dummy reverted to the latest version.');
    $this->assertSession()->fieldValueEquals('dummy|deep_nesting[translation]', 'any_value');
  }

  /**
   * Javascript test for the checkout form.
   */
  function testCheckoutForm() {
    // Test for job checkout form, if the target language is supported,
    // the test translator should say it is supported.
    $job = tmgmt_job_create('en', 'de', 0);
    $job->save();
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/tmgmt/jobs/' . $job->id());

    $page->selectFieldOption('Target language', 'de');
    $this->assertEquals('Test provider', $assert_session->optionExists('translator', 'test_translator')->getText());
  }

  /**
   * Tests update the source and show the diff of the source.
   */
  public function testSourceUpdate() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    // Create the original data items.
    $job = $this->createJob('en', 'de');
    $job->translator = $this->default_translator;
    $job->save();
    \Drupal::state()->set('tmgmt.test_source_data', [
      'title' => [
        '#label' => 'Example text 1',
        'deep_nesting' => [
          '#text' => 'Text for job item with type test and id 1.',
          '#label' => 'Example text 1',
          '#translate' => TRUE,
        ],
      ],
      'sayonara_text' => [
        '#label' => 'Example text 2',
        'deep_nesting' => [
          '#text' => 'This text will end badly.',
          '#label' => 'Example text 2',
          '#translate' => TRUE,
        ],
      ],
    ]);
    $job->addItem('test_source', 'test', '1');
    $job->save();

    $this->drupalGet($job->toUrl());
    $edit = array(
      'target_language' => 'de',
      'settings[action]' => 'submit',
    );
    $this->submitForm($edit, 'Submit to provider');

    $job->requestTranslation();

    // Modify the source.
    \Drupal::state()->set('tmgmt.test_source_data', array(
      'title' => array(
        '#label' => 'Example text modified',
        'deep_nesting' => array(
          '#text' => 'This source has been changed.',
          '#label' => 'Example text modified',
          '#translate' => TRUE,
        ),
      ),
    ));

    // Show a message informing of the conflicts in the sources.
    $this->drupalGet('admin/tmgmt/items/1');
    $assert_session->pageTextContains('The source has changed.');
    $assert_session->pageTextContains('This data item has been removed from the source.');

    // Show changes as diff.
    $page->pressButton('diff-button-title|deep_nesting');
    $assert_session->assertWaitOnAjaxRequest();
    $assert_session->pageTextNotContains('The source has changed.');
    $assert_session->pageTextContains('Text for job item with type test and id 1.');
    $assert_session->pageTextContains('This source has been changed.');
    $assert_session->pageTextContains('This data item has been removed from the source.');

    // Resolve the first data item.
    $page->pressButton('resolve-diff-title|deep_nesting');
    $assert_session->assertWaitOnAjaxRequest();
    $assert_session->pageTextContains('The conflict in the data item source "Example text modified" has been resolved.');
    $assert_session->pageTextNotContains('The source has changed.');
    $xpath = $this->xpath('//*[@name="title|deep_nesting[source]"]')[0];
    $this->assertEquals('This source has been changed.', $xpath->getHtml());

    // Check the other data item was not modified.
    $assert_session->pageTextContains('This data item has been removed from the source.');
    $assert_session->pageTextContains('This text will end badly.');
  }

}
