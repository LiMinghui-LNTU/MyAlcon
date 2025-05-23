<?php

/**
 * @file
 * Provides PHPUnit tests for Acsf Site.
 */

use Drupal\acsf\AcsfSite;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/AcsfVariableStorageMock.php';

/**
 * AcsfSiteTest.
 */
class AcsfSiteTest extends TestCase {

  /**
   * The site ID issued by the factory.
   *
   * Note this value is stored inside $info in AcsfSite, which defines __get().
   * So we cannot rename it.
   *
   * @var int
   */
  // phpcs:disable
  public $site_id = 12_345_678;
  // phpcs:enable

  /**
   * Setup.
   */
  public function setUp(): void {
    parent::setUp();
    // Simulate the sites.json configuration.
    $GLOBALS['gardens_site_settings']['conf']['acsf_site_id'] = $this->site_id;
  }

  /**
   * Provides test data.
   */
  public function getTestData() {
    $data = [
      'true' => TRUE,
      'false' => FALSE,
      'string' => 'unit_test_string_value',
      'int' => random_int(0, 64),
      'float' => random_int(0, mt_getrandmax()) / mt_getrandmax(),
      'array' => ['foo', 'bar', 'baz', 'qux'],
    ];

    $data['object'] = (object) $data;

    return $data;
  }

  /**
   * Tests that we can use the factory method to get a cached site.
   * @runInSeparateProcess
   * @preserveGlobalState disabled
   */
  public function testFactoryLoadCache() {
    $site = AcsfSite::load(new AcsfVariableStorageMock());
    $this->assertInstanceOf(\Drupal\acsf\AcsfSite::class, $site);

    $cache = AcsfSite::load(new AcsfVariableStorageMock());
    $this->assertSame($site, $cache);
    $this->assertEquals($site->site_id, $cache->site_id);
  }

  /**
   * Tests the __get() method.
   *
   * Test the public interface by using the __set() directly and then checking
   * if the value is set for the class property.
   */
  public function testAcsfSiteGet() {
    $site = new AcsfSite($this->site_id, new AcsfVariableStorageMock());

    $data = $this->getTestData();

    foreach ($data as $type => $value) {
      $site->__set($type, $value);
      $this->assertSame($site->$type, $value);
    }
  }

  /**
   * Tests the __set() method.
   *
   * Test the public interface by setting a class property, then checking if
   * the value is available using the __get() method.
   */
  public function testAcsfSiteSet() {
    $site = new AcsfSite($this->site_id, new AcsfVariableStorageMock());

    $data = $this->getTestData();

    foreach ($data as $type => $value) {
      $site->$type = $value;
      $this->assertSame($site->__get($type), $value);
    }
  }

  /**
   * Tests the __unset() method.
   *
   * Test the public interface by first setting a class property, and assuring
   * that it is available using the __get() method. Then uset that same class
   * property and assure that it is NOT available using the __get() method.
   */
  public function testAcsfSiteUnset() {
    $site = new AcsfSite($this->site_id, new AcsfVariableStorageMock());

    $data = $this->getTestData();

    foreach ($data as $type => $value) {
      $site->$type = $value;
      $this->assertSame($site->__get($type), $value);
      unset($site->$type);
      $get_value = $site->__get($type);
      $this->assertNull($get_value);
    }
  }

  /**
   * Tests the __isset() method.
   *
   * Test the public interface by first setting a value using the __set()
   * method and assuring that it is available in the __get() method. Then test
   * that the class property is set using isset().
   */
  public function testAcsfSiteIsset() {
    $site = new AcsfSite($this->site_id, new AcsfVariableStorageMock());

    $data = $this->getTestData();

    foreach ($data as $type => $value) {
      $site->__set($type, $value);
      $this->assertSame($site->__get($type), $value);
      $this->assertTrue(isset($site->$type));
    }
  }

  /**
   * Tests the save() method.
   */
  public function testSavedData() {
    $string = 'test value';
    $variableStorageMock = new AcsfVariableStorageMock();
    $site = new AcsfSite($this->site_id, $variableStorageMock);
    $site->custom = $string;
    $site->save();
    unset($site);

    $clone = new AcsfSite($this->site_id, $variableStorageMock);
    $this->assertEquals($clone->custom, $string);
  }
}
