<?php

namespace Drupal\Tests\tmgmt_file\Functional;

use Drupal\Component\Utility\Html;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Tests\tmgmt\Functional\TMGMTTestBase;
use Drupal\tmgmt\Entity\Job;
use Drupal\tmgmt\Entity\Translator;
use Drupal\tmgmt\JobInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * Tests for the file translator.
 *
 * @group tmgmt
 */
class FileTranslatorTest extends TMGMTTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = array('tmgmt_file', 'tmgmt');

  /**
   * {@inheritdoc}
   */
  function setUp(): void {
    parent::setUp();
    $this->loginAsAdmin();
    $this->addLanguage('de');
  }

  /**
   * Test the content processing for XLIFF export and import.
   */
  public function testXLIFFTextProcessing() {
    $translator = $this->createTranslator([
      'plugin' => 'file',
      'settings' => [
        'export_format' => 'xlf',
        'xliff_processing' => TRUE,
        'format_configuration' => [
          'target' => '',
        ],
      ],
    ]);

    // Get the source text.
    $source_text = trim(file_get_contents(\Drupal::service('extension.list.module')->getPath('tmgmt') . '/tests/testing_html/sample.html'));

    // Create the reader instance, it will be used through the tests.
    $reader = new \XMLReader();
    $xliff_elements = array('bpt', 'ept', 'ph', 'x', '#text', '#cdata-section', 'content');

    // ==== First test the whole cycle ==== //
    $job = $this->createJob();
    $job->translator = $translator->id();
    $job->addItem('test_html_source', 'test', '1');

    // Simulate an existing public://tmmgt_file directory that is not writable.
    mkdir('public://tmgmt_file', 0555);

    // Requesting translation will mask the html.
    $job->requestTranslation();
    $content = $this->getTransUnitsContent($job);
    // Test that the exported trans unit contains only xliff elements.
    $reader->XML('<content>' . $content[0]['source'] . '</content>');
    while ($reader->read()) {
      if (!in_array($reader->name, $xliff_elements)) {
        $this->fail(t('The source contains unexpected element %element', array('%element' => $reader->name)));
      }
    }
    $reader->XML('<content>' . $content[0]['target'] . '</content>');
    while ($reader->read()) {
      if (!in_array($reader->name, $xliff_elements)) {
        $this->fail(t('The target contains unexpected element %element', array('%element' => $reader->name)));
      }
    }

    // Import the file, make sure all the html has been revealed and no xliff
    // elements are present in the job translation.
    $messages = $job->getMessages();
    $message = reset($messages);
    $translated_file = 'public://tmgmt_file/translated.xlf';
    $this->createTranslationFile($message->variables->{'@link'}, 'one paragraph', 'one translated paragraph', $translated_file);
    $this->drupalGet($job->toUrl());
    $edit = array(
      'files[file]' => $translated_file,
    );
    $this->submitForm($edit, 'Import');
    // Reset caches and reload job.
    \Drupal::entityTypeManager()->getStorage('tmgmt_job')->resetCache();
    \Drupal::entityTypeManager()->getStorage('tmgmt_job_item')->resetCache();
    $job = Job::load($job->id());

    // Do the comparison of the translation text and the source. It must be the
    // same as there was no change done to the translation.
    $item_data = $job->getData(array(1, 'dummy', 'deep_nesting'));
    $this->assertEquals(str_replace('one paragraph', 'one translated paragraph', $source_text), trim($item_data[1]['#translation']['#text']));
    $job_items = $job->getItems();
    $job_item = array_shift($job_items);
    // Job item must be in review.
    $this->assertTrue($job_item->isNeedsReview());

    $this->assertIntegrityCheck($job, FALSE);

    // ==== Test integrity check ==== //
    $job = $this->createJob();
    $job->translator = $translator->id();
    $job->addItem('test_html_source', 'test', '1');
    $job->requestTranslation();

    $messages = $job->getMessages();
    $message = reset($messages);
    // Get the xml content and remove the element representing <br />. This will
    // result in different element counts in the source and target and should
    // trigger an error and not import the translation.
    $translated_file = 'public://tmgmt_file/translated.xlf';
    $this->createTranslationFile($message->variables->{'@link'}, '<x id="tjiid2-4" ctype="lb"/>', '', $translated_file);
    $this->drupalGet($job->toUrl());
    $edit = array(
      'files[file]' => $translated_file,
    );
    $this->submitForm($edit, 'Import');
    \Drupal::entityTypeManager()->getStorage('tmgmt_job')->resetCache();
    \Drupal::entityTypeManager()->getStorage('tmgmt_job_item')->resetCache();
    $job = Job::load($job->id());

    $this->assertIntegrityCheck($job);

    // Set the XLIFF processing to FALSE and test it results in the source
    // text not being XLIFF processed.
    $translator->setSetting('xliff_processing', FALSE);
    $translator->save();
    $job = $this->createJob();
    $job->translator = $translator->id();
    $job->addItem('test_html_source', 'test', '1');
    $job->requestTranslation();
    $targets = $this->getTransUnitsContent($job);
    $this->assertEquals($source_text, trim(html_entity_decode($targets['0']['source'])));
  }

  /**
   * Test the CDATA option for XLIFF export and import.
   */
  function testXLIFFCDATA() {
    $translator = $this->createTranslator([
      'plugin' => 'file',
      'settings' => [
        'export_format' => 'xlf',
        'xliff_cdata' => TRUE,
      ]
    ]);

    // Get the source text.
    $source_text = trim(file_get_contents(\Drupal::service('extension.list.module')->getPath('tmgmt') . '/tests/testing_html/sample.html'));

    // Create a new job.
    $job = $this->createJob();
    $job->translator = $translator->id();
    $job->addItem('test_html_source', 'test', '1');
    $job->requestTranslation();
    $messages = $job->getMessages();
    $message = reset($messages);

    // Get XLIFF content.
    $variables = $message->variables;
    $download_url = $variables->{'@link'};
    $this->assertFalse((bool) strpos('< a', $download_url));
    $xliff = file_get_contents($download_url);

    $dom = new \DOMDocument();
    $dom->loadXML($xliff);
    $this->assertTrue($dom->schemaValidate(\Drupal::service('extension.list.module')->getPath('tmgmt_file') . '/xliff-core-1.2-strict.xsd'));

    // "Translate" items.
    $xml = simplexml_import_dom($dom);
    $translated_text = array();
    foreach ($xml->file->body->children() as $group) {
      foreach ($group->children() as $transunit) {
        if ($transunit->getName() == 'trans-unit') {
          // The target should be empty.
          $this->assertEquals('', $transunit->target);

          // Update translations using CDATA.
          $node = dom_import_simplexml($transunit->target);
          $owner = $node->ownerDocument;
          $node->appendChild($owner->createCDATASection($xml->file['target-language'] . '_' . (string) $transunit->source));

          // Store the text to allow assertions later on.
          $translated_text[(string) $group['id']][(string) $transunit['id']] = (string) $transunit->target;
        }
      }
    }

    $translated_file = 'public://tmgmt_file/translated file.xlf';
    $xml->asXML($translated_file);

    // Import the file and check translation for the "dummy" item.
    $this->drupalGet($job->toUrl());
    $edit = array(
      'files[file]' => $translated_file,
    );
    $this->submitForm($edit, 'Import');

    // Reset caches and reload job.
    \Drupal::entityTypeManager()->getStorage('tmgmt_job')->resetCache();
    \Drupal::entityTypeManager()->getStorage('tmgmt_job_item')->resetCache();
    $job = Job::load($job->id());

    $item_data = $job->getData(array(1, 'dummy', 'deep_nesting'));
    $this->assertEquals(str_replace($source_text, $xml->file['target-language'] . '_' . $source_text, $source_text), trim($item_data[1]['#translation']['#text']));
  }

  /**
   * Gets trans-unit content from the XLIFF file that has been exported for the
   * given job as last.
   */
  protected function getTransUnitsContent(JobInterface $job) {
    $messages = $job->getMessages();
    $message = reset($messages);
    $download_url = $message->variables->{'@link'};
    $this->assertFalse((bool) strpos('< a', $download_url));
    $xml_string = file_get_contents($download_url);
    $xml = simplexml_load_string($xml_string);

    // Register the xliff namespace, required for xpath.
    $xml->registerXPathNamespace('xliff', 'urn:oasis:names:tc:xliff:document:1.2');

    $reader = new \XMLReader();
    $data = array();
    $i = 0;
    foreach ($xml->xpath('//xliff:trans-unit') as $unit) {
      $reader->XML($unit->source->asXML());
      $reader->read();
      $data[$i]['source'] = $reader->readInnerXML();
      $reader->XML($unit->target->asXML());
      $reader->read();
      $data[$i]['target'] = $reader->readInnerXML();
      $i++;
    }

    return $data;
  }

  /**
   * Tests export and import for the HTML format.
   */
  function testHTML() {
    $translator = Translator::load('file');
    $translator
      ->setSetting('export_format', 'html')
      ->save();


    $job = $this->createJob();
    $job->translator = $translator->id();
    $job->addItem('test_source', 'test', '1');
    $job->addItem('test_source', 'test', '2');

    $job->requestTranslation();
    $messages = $job->getMessages();
    $message = reset($messages);

    $download_url = $message->variables->{'@link'};
    $this->assertFalse((bool) strpos('< a', $download_url));
    // "Translate" items.
    $xml = simplexml_load_file($download_url);
    $translated_text = array();
    foreach ($xml->body->children() as $group) {
      for ($i = 0; $i < $group->count(); $i++) {
        // This does not actually override the whole object, just the content.
        $group->div[$i] = (string) $xml->head->meta[3]['content'] . '_' . (string) $group->div[$i];
        // Store the text to allow assertions later on.
        $translated_text[(string) $group['id']][(string) $group->div[$i]['id']] = (string) $group->div[$i];
      }
    }

    $translated_file = 'public://tmgmt_file/translated.html';
    $xml->asXML($translated_file);
    $this->importFile($translated_file, $translated_text, $job);
  }

  /**
   * Tests import and export for the XLIFF format.
   */
  function testXLIFF() {
    $translator = Translator::load('file');
    $translator
      ->setSetting('export_format', 'xlf')
      ->setSetting('format_configuration', ['target' => 'source'])
      ->save();

    // Set multiple data items for the source.
    \Drupal::state()->set('tmgmt.test_source_data', array(
      'dummy' => array(
        'deep_nesting' => array(
          '#text' => file_get_contents(\Drupal::service('extension.list.module')->getPath('tmgmt') . '/tests/testing_html/sample.html') . ' @id.',
          '#label' => 'Label of deep nested item @id',
        ),
        '#label' => 'Dummy item',
      ),
      'another_item' => array(
        '#text' => 'Text of another item @id.',
        '#label' => 'Label of another item @id.',
        '#max_length' => '100',
      ),
    ));

    $job = $this->createJob();
    $job->translator = $translator->id();
    $first_item = $job->addItem('test_source', 'test', '1');
    // Keep the first item data for later use.
    $first_item_data = \Drupal::service('tmgmt.data')->flatten($first_item->getData());
    $job->addItem('test_source', 'test', '2');

    $job->requestTranslation();
    $messages = $job->getMessages();
    $message = reset($messages);

    $variables = $message->variables;
    $download_url = $variables->{'@link'};
    $this->assertFalse((bool) strpos('< a', $download_url));
    $xliff = file_get_contents($download_url);
    $dom = new \DOMDocument();
    $dom->loadXML($xliff);
    $this->assertTrue($dom->schemaValidate(\Drupal::service('extension.list.module')->getPath('tmgmt_file') . '/xliff-core-1.2-strict.xsd'));

    // Build a list of expected note labels.
    $expected_notes = [
      '1][dummy][deep_nesting' => 'Dummy item > Label of deep nested item @id',
      '1][another_item' => 'Label of another item @id.',
      '2][dummy][deep_nesting' => 'Dummy item > Label of deep nested item @id',
      '2][another_item' => 'Label of another item @id.',
    ];

    // "Translate" items.
    $xml = simplexml_import_dom($dom);
    $translated_text = array();
    foreach ($xml->file->body->children() as $group) {
      foreach ($group->children() as $transunit) {
        if ($transunit->getName() == 'trans-unit') {
          // The target should contain the source data.
          $this->assertEquals($transunit->source, $transunit->target);
          // Assert that notes contain parent and non-parent labels.
          $this->assertEquals($expected_notes[(string) $transunit['id']], (string) $transunit->note);
          $transunit->target = $xml->file['target-language'] . '_' . (string) $transunit->source;
          // Store the text to allow assertions later on.
          $translated_text[(string) $group['id']][(string) $transunit['id']] = (string) $transunit->target;
          // Check that the character limit is in the target.
          $attributes = $transunit->attributes();
          if ($transunit->attributes()['id'] == '1][another_item') {
            $this->assertEquals('100', $attributes['maxwidth']);
            $this->assertEquals('char', $attributes['size-unit']);
          }
          if ($transunit->attributes()['id'] == '1][dummy][deep_nesting') {
            $this->assertFalse(isset($attributes['maxwidth']));
            $this->assertFalse(isset($attributes['size-unit']));
          }
        }
      }
    }

    // Change the job id to a non-existing one and try to import it.
    $wrong_xml = clone $xml;
    $wrong_xml->file->header->{'phase-group'}->phase['job-id'] = 500;
    $wrong_file = 'public://tmgmt_file/wrong_file.xlf';
    $wrong_xml->asXML($wrong_file);
    $this->drupalGet($job->toUrl());
    $edit = array(
      'files[file]' => $wrong_file,
    );
    $this->submitForm($edit, 'Import');
    $this->assertSession()->pageTextContains('Failed to validate file, import aborted.');

    // Change the job id to a wrong one and try to import it.
    $wrong_xml = clone $xml;
    $second_job = $this->createJob();
    $second_job->translator = $translator->id();
    // We need to add the elements count value into settings, otherwise the
    // validation will fail on integrity check.
    $xliff_validation = array(
      1 => 0,
      2 => 0,
    );
    $second_job->settings->xliff_validation = $xliff_validation;
    $second_job->save();
    $wrong_xml->file->header->{'phase-group'}->phase['job-id'] = $second_job->id();
    $wrong_file = 'public://tmgmt_file/wrong_file.xlf';
    $wrong_xml->asXML($wrong_file);
    $this->drupalGet($job->toUrl());
    $edit = array(
      'files[file]' => $wrong_file,
    );
    $this->submitForm($edit, 'Import');
    $this->assertSession()->responseContains(t('The imported file job id @file_id does not match the job id @job_id.', array(
      '@file_id' => $second_job->id(),
      '@job_id' => $job->id(),
    )));


    $translated_file = 'public://tmgmt_file/translated file.xlf';
    $xml->asXML($translated_file);

    // Import the file and accept translation for the "dummy" item.
    $this->drupalGet($job->toUrl());
    $edit = array(
        'files[file]' => $translated_file,
      );
    $this->submitForm($edit, 'Import');
    $this->assertSession()->pageTextContains(t('The translation of @job_item to German is finished and can now be reviewed.', ['@job_item' => $first_item->label()]));

    $this->clickLink('Review');
    $this->getSession()->getPage()->pressButton('reviewed-dummy|deep_nesting');

    // Update the translation for "another" item and import.
    $xml->file->body->group[0]->{'trans-unit'}[1]->target = $xml->file->body->group[0]->{'trans-unit'}[1]->target . ' updated';
    $xml->asXML($translated_file);
    $this->drupalGet($job->toUrl());
    $edit = array(
        'files[file]' => $translated_file,
      );
    $this->submitForm($edit, 'Import');

    // At this point we must have the "dummy" item accepted and intact. The
    // "another" item must have updated translation.
    $this->assertSession()->pageTextContains('Review');
    $this->drupalGet($first_item->toUrl());
    $this->assertSession()->fieldValueEquals('dummy|deep_nesting[translation]', 'de_' . $first_item_data['dummy][deep_nesting']['#text']);
    $this->assertSession()->fieldValueEquals('another_item[translation]', 'de_' . $first_item_data['another_item']['#text'] . ' updated');

    // Now finish the import/save as completed process doing another extra
    // import. The extra import will test that a duplicate import of the same
    // file does not break the process.
    $this->importFile($translated_file, $translated_text, $job);

    $this->assertSession()->pageTextNotContains('Import translated file');

    // Create a job, assign to the file translator and delete before attaching
    // a file.
    $other_job = $this->createJob();
    $other_job->translator = $translator->id();
    $other_job->save();
    $other_job->delete();
    // Make sure the file of the other job still exists.
    $response = \Drupal::httpClient()->get($download_url);
    $this->assertEquals(200, $response->getStatusCode());

    // Delete the job and then make sure that the file has been deleted.
    $job->delete();
    try {
      $response = \Drupal::httpClient()->get($download_url);
      $this->fail('Expected exception not thrown.');
    }
    catch (RequestException $e) {
      $this->assertEquals(404, $e->getResponse()->getStatusCode());
    }
  }


  /**
   * Tests storing files in the private file system.
   */
  function testPrivate() {
    // Create a translator using the private file system.
    // @todo: Test the configuration UI.
    $translator = $this->createTranslator([
      'plugin' => 'file',
      'settings' => [
        'export_format' => 'xlf',
        'xliff_processing' => TRUE,
        'scheme' => 'private',
      ]
    ]);

    $job = $this->createJob();
    $job->translator = $translator->id();
    $job->addItem('test_source', 'test', '1');
    $job->addItem('test_source', 'test', '2');

    $job->requestTranslation();
    $messages = $job->getMessages();
    $message = reset($messages);

    $this->drupalGet('admin/tmgmt/jobs');
    $this->clickLink('Manage');

    // Assert that the label field is only shown once in page.
    $this->assertCount(1, $this->xpath('//div[@id="tmgmt-ui-label"]'));

    $download_url = $message->variables->{'@link'};
    $this->assertFalse((bool) strpos('< a', $download_url));
    $this->drupalGet($download_url);
    // Verify that the URL is served using the private file system and the
    // access checks work.
    $this->assertNotEmpty(preg_match('|system/files|', $download_url));
    $this->assertSession()->statusCodeEquals(200);

    $this->drupalLogout();
    // Verify that access is now protected.
    $this->drupalGet($download_url);
    $this->assertSession()->statusCodeEquals(403);
  }

  protected function importFile($translated_file, $translated_text, JobInterface $job) {
    // To test the upload form functionality, navigate to the edit form.
    $this->drupalGet($job->toUrl());
    $edit = array(
      'files[file]' => $translated_file,
    );
    $this->submitForm($edit, 'Import');

    // Make sure the translations have been imported correctly.
    $this->assertSession()->responseNotContains('title="In progress"');
    // @todo: Enable this assertion once new releases for views and entity
    // module are out.
    //$this->assertSession()->pageTextContains('Needs review');

    // Review both items.
    list($item1, $item2) = array_values($job->getItems());
    $this->drupalGet($item1->toUrl());
    foreach ($translated_text[1] as $key => $value) {
      $this->assertSession()->responseContains(Html::escape($value));
    }
    foreach ($translated_text[2] as $key => $value) {
      $this->assertSession()->responseNotContains(Html::escape($value));
    }
    $this->submitForm([], 'Save as completed');
    // Review both items.
    $this->drupalGet($item2->toUrl());
    foreach ($translated_text[1] as $key => $value) {
      $this->assertSession()->responseNotContains(Html::escape($value));
    }
    foreach ($translated_text[2] as $key => $value) {
      $this->assertSession()->responseContains(Html::escape($value));
    }
    $this->submitForm([], 'Save as completed');
    // @todo: Enable this assertion once new releases for views and entity
    // module are out.
    //$this->assertSession()->pageTextContains('Accepted');
    $this->assertSession()->pageTextContains('Finished');
    $this->assertSession()->responseNotContains('title="Needs review"');
  }

  /**
   * Creates a translated XLIFF file based on the replacement definition.
   *
   * @param string $source_file
   *   Source file name.
   * @param $search
   *   String to search in the source.
   * @param $replace
   *   String to replace it with in the target.
   * @param $translated_file
   *   Name of the file to write.
   */
  protected function createTranslationFile($source_file, $search, $replace, $translated_file) {
    $xml_string = file_get_contents($source_file);
    preg_match('/<source xml:lang="en">(.+)<\/source>/s', $xml_string, $matches);
    $target = str_replace($search, $replace, $matches[1]);
    if ($replace) {
      $this->assertTrue(strpos($target, $replace) !== FALSE, 'String replaced in translation');
    }
    $translated_xml_string = str_replace('<target xml:lang="de"/>', '<target xml:lang="de">' . $target . '</target>', $xml_string);
    file_put_contents($translated_file, $translated_xml_string);
  }

  /**
   * Asserts import integrity for a job.
   *
   * @param \Drupal\tmgmt\JobInterface $job
   *   The job to check.
   * @param bool $expected
   *   (optional) If an integrity failed message is expected or not, defaults
   *   to FALSE.
   */
  protected function assertIntegrityCheck(JobInterface $job, $expected = TRUE) {
    $integrity_check_failed = FALSE;
    /** @var \Drupal\tmgmt\MessageInterface $message */
    foreach ($job->getMessages() as $message) {
      if ($message->getMessage() == new TranslatableMarkup('Failed to validate semantic integrity of %key element. Please check also the HTML code of the element in the review process.', array('%key' => 'dummy][deep_nesting'))) {
        $integrity_check_failed = TRUE;
        break;
      }
    }
    // Check if the message was found or not, based on the expected argument.
    if ($expected) {
      $this->assertTrue($integrity_check_failed, 'The validation of semantic integrity must fail.');
    }
    else {
      $this->assertFalse($integrity_check_failed, 'The validation of semantic integrity must not fail.');
    }
  }

}
