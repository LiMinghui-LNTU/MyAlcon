<?php

declare(strict_types=1);

namespace Drupal\Tests\config_revision\Functional;

use Drupal\config_revision\Entity\ConfigRevision;
use Drupal\config_revision\Entity\ConfigRevisionType;
use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests config revision entity workflow.
 *
 * @group config_revision
 * @group legacy
 */
class ConfigRevisionWebformTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'config_revision',
    'webform',
    'block',
  ];

  /**
   * The admin user.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $adminUser;

  /**
   * The another user.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $anotherUser;

  /**
   * Permissions to grant admin user.
   *
   * @var array
   */
  protected $permissions = [
    'administer config_revision',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Sets the test up.
   */
  protected function setUp(): void {
    parent::setUp();
    $this->adminUser = $this->drupalCreateUser($this->permissions);
    $this->anotherUser = $this->drupalCreateUser();
    // Enable webform revision.
    $config = $this->config('config_revision.settings');
    $config->set('enabled_entity_types', ['webform']);
    $config->save();
    $webform_config_revision_type = ConfigRevisionType::create([
      'id' => 'webform',
      'label' => 'Webform',
      'description' => '',
    ]);
    $webform_config_revision_type->save();
  }

  /**
   * Tests the config revision for webform.
   */
  public function testConfigRevisionWebform() {

    $this->expectDeprecation('The core/jquery.once asset library is deprecated in Drupal 9.3.0 and will be removed in Drupal 10.0.0. Use the core/once library instead. See https://www.drupal.org/node/3158256');
    $this->expectDeprecation('drupal_get_path() is deprecated in drupal:9.3.0 and is removed from drupal:10.0.0. Use \Drupal\Core\Extension\ExtensionPathResolver::getPath() instead. See https://www.drupal.org/node/2940438');
    $this->expectDeprecation('drupal_get_filename() is deprecated in drupal:9.3.0 and is removed from drupal:10.0.0. Use \Drupal\Core\Extension\ExtensionPathResolver::getPathname() instead. See https://www.drupal.org/node/2940438');

    $this->drupalLogin($this->adminUser);
    $this->drupalPlaceBlock('page_title_block');
    $this->drupalPlaceBlock('local_actions_block');
    $this->drupalPlaceBlock('local_tasks_block');
    $assert_session = $this->assertSession();
    // Create a webform.
    $webform_storage = \Drupal::entityTypeManager()->getStorage('webform');
    $elements = [
      'root' => [
        '#type' => 'textfield',
        '#title' => 'root',
      ],
      'container' => [
        '#type' => 'container',
        '#title' => 'container',
        'child' => [
          '#type' => 'textfield',
          '#title' => 'child',
          '#default_value' => '{default value}',
        ],
      ],
    ];
    /** @var \Drupal\webform\WebformInterface $webform */
    $webform = $webform_storage->create([
      'id' => 'webform_test',
      'title' => 'Webform Test',
      'description' => 'Test webform',
      'category' => 'Test',
    ]);
    $webform->setElements($elements);
    $webform->setStatus(TRUE);
    $webform->save();
    $webform = $webform_storage->loadUnchanged('webform_test');

    // Verify the webform is created properly.
    $this->drupalGet($webform->toUrl());
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->fieldExists('root');
    $assert_session->fieldExists('child');

    // Verify the webform revision has been saved properly.
    $webform_revision = ConfigRevision::loadConfigRevisionByConfigId('webform_test');
    $this->assertNotNull($webform_revision);

    // Verify the webform revision exist on listing page.
    $this->drupalGet('/admin/content/config-revision');
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->linkByHrefExists($webform_revision->toUrl()->toString());

    // Verify the webform revision can be viewed.
    $this->drupalGet($webform_revision->toUrl());
    $assert_session->statusCodeEquals(Response::HTTP_OK);

    // Verify the webform edit page is accessible.
    $this->drupalGet($webform_revision->toUrl('edit-form'));
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->fieldExists('revision_log[0][value]');

    // Verify the webform delete page is accessible.
    $this->drupalGet($webform_revision->toUrl('delete-form'));
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->pageTextContainsOnce('This action cannot be undone.');

    // Save a new webform revision.
    $webform->deleteElement('container');
    $webform->save();

    // Verify the webform is updated properly.
    $this->drupalGet($webform->toUrl());
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->fieldExists('root');
    $assert_session->fieldNotExists('child');

    // Verify the webform revision history page is showing all the revisions.
    $this->drupalGet($webform_revision->toUrl('version-history'));
    $this->assertSession()->elementsCount('css', 'table tbody tr', 2);
    // Current revision text is found on the latest revision row.
    $this->assertSession()->elementTextContains('css', 'table tbody tr:nth-child(1)', 'Current revision');

    $date = \Drupal::service('date.formatter')->format($webform_revision->getRevisionCreationTime());

    // Verify the webform revision revert page is showing the diff table.
    $this->drupalGet(Url::fromRoute('entity.config_revision.revision_revert_form', [
      'config_revision' => $webform_revision->id(),
      'config_revision_revision' => $webform_revision->getRevisionId(),
    ]));
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->responseContains(t('Are you sure you want to revert to the revision from %revision-date?', [
      '%revision-date' => $date,
    ]));
    $assert_session->elementExists('css', 'table.diff');

    // Revert back to the first revision.
    $this->submitForm([], 'Revert');
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->responseContains(t('@type %title has been reverted to the revision from %revision-date.', [
      '@type' => 'Webform',
      '%title' => $webform_revision->label(),
      '%revision-date' => $date,
    ]));
    $this->assertSession()->elementsCount('css', 'table tbody tr', 3);
    // Current revision text is found on the latest revision row.
    $this->assertSession()->elementTextContains('css', 'table tbody tr:nth-child(1)', 'Current revision');

    // Verify the webform is updated properly.
    $this->drupalGet($webform->toUrl());
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->fieldExists('root');
    $assert_session->fieldExists('child');
    $webform = $webform_storage->loadUnchanged('webform_test');
    // Check elements decoded and flattened.
    $flattened_elements = [
      'root' => [
        '#type' => 'textfield',
        '#title' => 'root',
      ],
      'container' => [
        '#type' => 'container',
        '#title' => 'container',
      ],
      'child' => [
        '#type' => 'textfield',
        '#title' => 'child',
        '#default_value' => '{default value}',
      ],
    ];
    $this->assertEquals($webform->getElementsDecodedAndFlattened(), $flattened_elements);

    // Delete the first revision.
    $this->drupalGet(Url::fromRoute('entity.config_revision.revision_delete_form', [
      'config_revision' => $webform_revision->id(),
      'config_revision_revision' => $webform_revision->getRevisionId(),
    ]));
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->responseContains(t('Are you sure you want to delete the revision from %revision-date?', [
      '%revision-date' => $date,
    ]));
    $this->submitForm([], 'Delete');
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $assert_session->responseContains(t('Revision from %revision-date of @type %title has been deleted.', [
      '@type' => 'Webform',
      '%title' => $webform_revision->label(),
      '%revision-date' => $date,
    ]));
    $this->assertSession()->elementsCount('css', 'table tbody tr', 2);
    // Current revision text is found on the latest revision row.
    $this->assertSession()->elementTextContains('css', 'table tbody tr:nth-child(1)', 'Current revision');
  }

}
