<?php

declare(strict_types=1);

namespace Drupal\Tests\action\Functional;

use Drupal\system\Entity\Action;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests complex actions configuration.
 *
 * @group action
 * @group legacy
 */
class ConfigurationTest extends BrowserTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  protected static $modules = ['action', 'node', 'views'];


  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Tests configuration of advanced actions through administration interface.
   */
  public function testActionConfiguration(): void {
    // Create a user with permission to view the actions administration pages.
    $user = $this->drupalCreateUser(['administer actions']);
    $this->drupalLogin($user);

    // Make a POST request to admin/config/system/actions.
    $edit = [];
    $edit['action'] = 'action_goto_action';
    $this->drupalGet('admin/config/system/actions');
    $this->submitForm($edit, 'Create');
    $this->assertSession()->statusCodeEquals(200);

    // Make a POST request to the individual action configuration page.
    $edit = [];
    $action_label = $this->randomMachineName();
    $edit['label'] = $action_label;
    $edit['id'] = strtolower($action_label);
    $edit['url'] = 'admin';
    $this->drupalGet('admin/config/system/actions/add/action_goto_action');
    $this->submitForm($edit, 'Save');
    $this->assertSession()->statusCodeEquals(200);

    $action_id = $edit['id'];

    // Make sure that the new complex action was saved properly.
    $this->assertSession()->pageTextContains('The action has been successfully saved.');
    // The action label appears on the configuration page.
    $this->assertSession()->pageTextContains($action_label);

    // Make another POST request to the action edit page.
    $this->clickLink('Configure');

    $edit = [];
    $new_action_label = $this->randomMachineName();
    $edit['label'] = $new_action_label;
    $edit['url'] = 'admin';
    $this->submitForm($edit, 'Save');
    $this->assertSession()->statusCodeEquals(200);

    // Make sure that the action updated properly.
    $this->assertSession()->pageTextContains('The action has been successfully saved.');
    // The old action label does NOT appear on the configuration page.
    $this->assertSession()->pageTextNotContains($action_label);
    // The action label appears on the configuration page after we've updated
    // the complex action.
    $this->assertSession()->pageTextContains($new_action_label);

    // Make sure the URL appears when re-editing the action.
    $this->clickLink('Configure');
    $this->assertSession()->fieldValueEquals('url', 'admin');

    // Make sure that deletions work properly.
    $this->drupalGet('admin/config/system/actions');
    $this->clickLink('Delete');
    $this->assertSession()->statusCodeEquals(200);
    $edit = [];
    $this->submitForm($edit, 'Delete');
    $this->assertSession()->statusCodeEquals(200);

    // Make sure that the action was actually deleted.
    $this->assertSession()->pageTextContains("The action $new_action_label has been deleted.");
    $this->drupalGet('admin/config/system/actions');
    $this->assertSession()->statusCodeEquals(200);
    // The action label does not appear on the overview page.
    $this->assertSession()->pageTextNotContains($new_action_label);

    $action = Action::load($action_id);
    $this->assertNull($action, 'Make sure the action is gone after being deleted.');
  }

  /**
   * Tests the node_assign_owner_action action.
   */
  public function testChangeNodeOwnerAction() {
    // Create page and article content type.
    $this->drupalCreateContentType(['type' => 'page', 'name' => 'Page']);
    $this->drupalCreateContentType(['type' => 'article', 'name' => 'Article']);

    // Create page titles.
    $page_title = $this->randomMachineName();
    $article_title = $this->randomMachineName();
    $anon_article_title = $this->randomMachineName();

    // Create a user with permission to view the actions administration pages.
    $action_admin = $this->drupalCreateUser(['administer actions']);

    // Create two users. One with permission to edit page content type and the
    // other with permission to edit article content type.
    $page_editor = $this->drupalCreateUser([
      'access content overview',
      'create page content',
      'edit any page content',
      'edit own page content',
    ]);

    $article_editor = $this->drupalCreateUser([
      'access content overview',
      'create article content',
      'edit any article content',
      'edit own article content',
    ]);

    // Create test nodes.
    $this->drupalCreateNode([
      'type' => 'page',
      'title' => $page_title,
      'uid' => $page_editor->id(),
    ]);
    $article = $this->drupalCreateNode([
      'type' => 'article',
      'title' => $article_title,
    ]);
    $this->drupalCreateNode([
      'type' => 'article',
      'title' => $anon_article_title,
      'uid' => 0,
    ]);

    // Create two actions. One to assign authorship to the page editor and the
    // other to assign authorship to the article editor.
    $this->drupalLogin($action_admin);

    // Create action to assign ownership to $page_editor.
    $page_action_label = strtolower($this->randomMachineName());
    $edit = [
      'label' => $page_action_label,
      'id' => $page_action_label,
      'owner_uid' => $page_editor->id(),
    ];
    $this->drupalGet('admin/config/system/actions/add/node_assign_owner_action');
    $this->submitForm($edit, 'Save');
    $this->assertSession()
      ->pageTextContains("The action has been successfully saved.");

    $article_action_label = strtolower($this->randomMachineName());
    $edit = [
      'label' => $article_action_label,
      'id' => $article_action_label,
      'owner_uid' => $article_editor->id(),
    ];
    $this->drupalGet('admin/config/system/actions/add/node_assign_owner_action');
    $this->submitForm($edit, 'Save');
    $this->assertSession()
      ->pageTextContains("The action has been successfully saved.");

    // Login as the page editor and confirm the author of page content type
    // can be changed.
    $this->drupalLogin($page_editor);
    $edit = [
      'action' => $page_action_label,
      'node_bulk_form[0]' => TRUE,
    ];
    $this->drupalGet('admin/content', [
      'query' => [
        'title' => $page_title,
      ],
    ]);
    $this->submitForm($edit, 'Apply to selected items');
    $this->assertSession()
      ->pageTextContains("$page_action_label was applied to 1 item.");

    // Confirm that the action fails for article content type due to no access.
    $this->drupalGet('admin/content', [
      'query' => [
        'title' => $article_title,
      ],
    ]);
    $this->submitForm($edit, 'Apply to selected items');
    $this->assertSession()
      ->pageTextContains("No access to execute $page_action_label on the Content " . $article->label());

    // Login as the article editor and confirm the author of article content
    // type can be changed.
    $this->drupalLogin($article_editor);
    $this->drupalGet('admin/content', [
      'query' => [
        'title' => $article_title,
      ],
    ]);
    $edit = [
      'action' => $article_action_label,
      'node_bulk_form[0]' => TRUE,
    ];
    $this->submitForm($edit, 'Apply to selected items');
    $this->assertSession()
      ->pageTextContains("$article_action_label was applied to 1 item.");

    // Confirm the action work for a node with an anonymous author.
    $this->drupalGet('admin/content', [
      'query' => [
        'title' => $anon_article_title,
      ],
    ]);
    $this->submitForm($edit, 'Apply to selected items');
    $this->assertSession()
      ->pageTextContains("$article_action_label was applied to 1 item.");
  }

}
