<?php

namespace Drupal\acsf;

use Drupal\acsf\Event\AcsfEvent;

/**
 * AcsfSite.
 */
class AcsfSite {

  /**
   * Instantiated (singleton) class.
   *
   * @var \Drupal\acsf\AcsfSite
   */
  protected static $cache;

  /**
   * ACSF variable storage.
   *
   * @var \Drupal\acsf\AcsfVariableStorage
   */
  protected $variableStorage;

  /**
   * The site information held by this instance.
   *
   * @var array
   */
  protected $info = [];

  /**
   * Factory: loads the current site.
   *
   * @param \Drupal\acsf\AcsfVariableStorage $variableStorage
   *
   * This method will load from static cache if available.
   */
  public static function load($variableStorage = NULL) {
    if (!empty(self::$cache)) {
      return self::$cache;
    }
    self::$cache = new static(NULL, $variableStorage);
    return self::$cache;
  }

  /**
   * Constructor.
   *
   * @param int $site_id
   *   The site id from the Site Factory (Optional).
   * @param \Drupal\acsf\AcsfVariableStorage $variableStorage
   *
   * @throws AcsfSiteMissingIdentifierException
   */
  public function __construct($site_id = NULL, $variableStorage = NULL) {

    // @todo properly inject this?
    if($variableStorage === NULL) {
      $this->variableStorage = \Drupal::service('acsf.variable_storage');
    } else {
      $this->variableStorage = $variableStorage;
    }

    if (empty($site_id) && !empty($GLOBALS['gardens_site_settings']['conf']['acsf_site_id'])) {
      // If we do not have the site id, we can retrieve it from the sites.json.
      $site_id = $GLOBALS['gardens_site_settings']['conf']['acsf_site_id'];
    }

    // If we are on Acquia hosting, ensure that we are connected to a Factory.
    if (function_exists('is_acquia_host') && is_acquia_host() && empty($site_id)) {
      throw new AcsfSiteMissingIdentifierException('Cannot instantiate AcsfSite without a site id from the Site Factory. Ensure that it is passed to the constructor or set in sites.json.');
    }

    // Init with the stored values.
    $this->initStoredSiteInfo();

    // Merge in any global values from the sites.json.
    if (!empty($GLOBALS['gardens_site_settings']['conf'])) {
      $this->mergeSiteInfo($GLOBALS['gardens_site_settings']['conf']);
    }

    // Some of the data is redundant.
    unset($this->gardens_site_id);
    unset($this->gardens_db_name);
    unset($this->acsf_site_id);
    unset($this->acsf_db_name);

    $this->site_id = $site_id;
  }

  /**
   * Class overloading __set().
   *
   * @param string $key
   *   The key of the internal storage to look up.
   * @param mixed $value
   *   The value to store internally.
   */
  public function __set($key, $value) {
    $this->info[$key] = $value;
  }

  /**
   * Class overloading __get().
   *
   * @param string $key
   *   The key of the internal storage to look up.
   *
   * @return mixed
   *   The value of the key.
   */
  public function __get($key) {
    if (isset($this->info[$key])) {
      return $this->info[$key];
    }
  }

  /**
   * Class overloading __isset().
   *
   * @param string $key
   *   The key of the internal storage to look up.
   *
   * @return bool
   *   TRUE if there is a value is set for the key.
   */
  public function __isset($key) {
    return isset($this->info[$key]);
  }

  /**
   * Class overloading __unset().
   *
   * @param string $key
   *   The key of the internal storage to unset.
   */
  public function __unset($key) {
    if (isset($this->info[$key])) {
      unset($this->info[$key]);
    }
  }

  /**
   * Refreshes the site information from the Site Factory.
   *
   * @param array $data
   *   (Optional) Data that should be sent to the factory.
   *
   * @return bool
   *   Returns TRUE if the data fetch was successful.
   */
  public function refresh(array $data = []) {
    if (function_exists('is_acquia_host') && !is_acquia_host()) {
      return FALSE;
    }

    try {
      $site_id = !empty($this->site_id) ? $this->site_id : $GLOBALS['gardens_site_settings']['conf']['acsf_site_id'];
      $arguments = [
        'site_id' => $site_id,
        'site_data' => $data,
      ];
      $message = new AcsfMessageRest('GET', 'site-api/v1/sync/' . $site_id, $arguments);
      $message->send();
      $site_info = $message->getResponseBody();
    }
    catch (AcsfMessageFailedResponseException $e) {
      // No need to fail, we can retry the site info call.
    }

    if (empty($site_info)) {
      \Drupal::logger('acsf_site')->critical('Could not retrieve site information after installation.');
      return FALSE;
    }
    else {
      // Allow other modules to consume the data.
      $context = $site_info;
      $event = AcsfEvent::create('acsf_site_data_receive', $context);
      $event->run();

      $this->saveSiteInfo($site_info['sf_site']);
      return TRUE;
    }
  }

  /**
   * Removes all local information and refreshes data from the Factory.
   *
   * This is a destructive API function, so use sparingly - only if you can
   * guarantee that there is no loss of required data. Since others may be using
   * this as a storage engine, there could be additional local information saved
   * that you are unaware of.
   */
  public function clean() {
    $this->info = [];
    return $this->refresh();
  }

  /**
   * Saves the internal state of this site.
   */
  public function save() {
    $context = $this->info;
    $event = AcsfEvent::create('acsf_site_data_save', $context);
    $event->run();
    $this->info = $event->context;

    $this->variableStorage->set('acsf_site_info', $this->info, 'site_info');
  }

  /**
   * Initializes the internal state of this site.
   */
  private function initStoredSiteInfo() {
    $this->info = [];

    $site_info = $this->variableStorage->getGroup('site_info');
    foreach ($site_info as $key => $value) {
      if (!is_array($value)) {
        $this->mergeSiteInfo([$key => $value]);
      }
      else {
        $this->mergeSiteInfo($value);
      }
    }
  }

  /**
   * Gets the SAML keys used by Site Factory SSO.
   */
  public function initSamlKeyProperties() {
    $sitegroup = $_ENV['AH_SITE_GROUP'];
    $env = $_ENV['AH_SITE_ENVIRONMENT'];
    $creds_path = "/mnt/files/$sitegroup.$env/nobackup/sf_shared_creds.ini";
    $credentials = file_get_contents($creds_path);
    $parsed_ini = parse_ini_string($credentials, TRUE);

    $this->info['saml_keys'] = [];

    if (isset($parsed_ini['saml']['tangle_key'])) {
      $this->info['saml_keys']['sp_private_key'] = $parsed_ini['saml']['tangle_key'];
    }
    else {
      $this->info['saml_keys']['sp_private_key'] = '';
    }
    if (isset($parsed_ini['saml']['tangle_cert'])) {
      $this->info['saml_keys']['sp_x509_certificate'] = $parsed_ini['saml']['tangle_cert'];
    }
    else {
      $this->info['saml_keys']['sp_x509_certificate'] = '';
    }
    if (isset($parsed_ini['saml']['factory_cert'])) {
      $this->info['saml_keys']['idp_x509_certificate'] = $parsed_ini['saml']['factory_cert'];
    }
    else {
      $this->info['saml_keys']['idp_x509_certificate'] = '';
    }
  }

  /**
   * Merges new site information into the internal state.
   *
   * @param array $site_info
   *   The information to merge.
   */
  public function mergeSiteInfo(array $site_info) {
    if (!empty($site_info)) {
      foreach ($site_info as $key => $value) {
        $this->info[$key] = $value;
      }
    }
  }

  /**
   * Saves new site information.
   *
   * @param array $site_info
   *   The information to merge.
   */
  public function saveSiteInfo(array $site_info) {
    $this->mergeSiteInfo($site_info);
    $this->last_sf_refresh = time();
    $this->save();
  }

}
