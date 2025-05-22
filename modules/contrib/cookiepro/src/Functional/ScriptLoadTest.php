<?php

namespace Drupal\Tests\cookiepro\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Test to check the configured script is loaded.
 *
 * @group cookiepro
 */
class ScriptLoadTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['cookiepro'];

  /**
  * Default theme.
  *
  * @var mixed
  */
  protected $defaultTheme = 'stable9';

  /**
   * A user with permission to administer site configuration.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * Set a dummy bit of js to load as the banner.
   *
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $config = $this->config('cookiepro.header.settings');
    $config->set(
      'scripts', '<script type="text/javascript">testFunction();</script>'
    )->save();
  }

  /**
   * Tests that the configured script has been added to the page.
   */
  public function testScriptLoadedByDefault() {
    // The cookiepro_page_attachments hook only gets run after a cache clear,
    // not sure why this is.
    drupal_flush_all_caches();
    $this->drupalGet(Url::fromRoute('<front>'));
    $this->assertSession()->statusCodeEquals(200);

    $this->assertStringContainsString(
      'testFunction',
      $this->getSession()->getPage()->getOuterHtml()
    );
  }

  /**
   * Tests that the configured script has been added to the page.
   */
  public function testScriptNotLoadedOnAdminPages() {
    $this->user = $this->drupalCreateUser(['access administration pages', 'cookiepro_settings']);
    $this->drupalLogin($this->user);

    // The cookiepro_page_attachments hook only gets run after a cache clear,
    // not sure why this is.
    drupal_flush_all_caches();
    $this->drupalGet(Url::fromRoute('system.admin'));
    $this->assertSession()->statusCodeEquals(200);

    $this->assertStringNotContainsString(
      'testFunction',
      $this->getSession()->getPage()->getOuterHtml()
    );
  }

}
