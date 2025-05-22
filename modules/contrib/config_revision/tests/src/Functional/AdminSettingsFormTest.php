<?php

declare(strict_types=1);

namespace Drupal\Tests\config_revision\Functional;

use Drupal\Tests\BrowserTestBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests admin settings form.
 *
 * @group config_revision
 */
class AdminSettingsFormTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'config_revision',
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
  }

  /**
   * Test that admin user can update the admin settings via admin settings page.
   */
  public function testAdminSettingsForm() {
    $assert_session = $this->assertSession();
    $this->drupalLogin($this->adminUser);
    $this->drupalGet('/admin/config/development/config-revision');
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $edit = [
      'enabled_entity_types[action]' => TRUE,
      'enabled_entity_types[entity_form_display]' => TRUE,
      'enabled_entity_types[entity_view_display]' => TRUE,
    ];
    $this->submitForm($edit, 'Save configuration');
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $config_revision_types = \Drupal::entityTypeManager()->getStorage('config_revision_type')->loadMultiple();
    $this->assertCount(3, $config_revision_types);
    $this->assertSame(['action', 'entity_form_display', 'entity_view_display'], array_keys($config_revision_types));
    $edit = [
      'enabled_entity_types[action]' => TRUE,
      'enabled_entity_types[entity_form_display]' => FALSE,
      'enabled_entity_types[entity_view_display]' => FALSE,
      'enabled_entity_types[date_format]' => TRUE,
      'enabled_entity_types[user_role]' => TRUE,
    ];
    $this->submitForm($edit, 'Save configuration');
    $assert_session->statusCodeEquals(Response::HTTP_OK);
    $config_revision_types = \Drupal::entityTypeManager()->getStorage('config_revision_type')->loadMultiple();
    $this->assertCount(3, $config_revision_types);
    $this->assertSame(['action', 'date_format', 'user_role'], array_keys($config_revision_types));
  }

  /**
   * Test that non-admin user can't access the admin settings page.
   */
  public function testAdminSettingsFormForbiddenAccess() {
    $assert_session = $this->assertSession();
    $this->drupalLogin($this->anotherUser);
    $this->drupalGet('/admin/config/development/config-revision');
    $assert_session->statusCodeEquals(Response::HTTP_FORBIDDEN);
  }

}
