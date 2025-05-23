<?php

/**
 * @file
 * API functions for installing modules and themes.
 */

use Drupal\Component\Utility\Unicode;
use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Database\Database;
use Drupal\Core\Extension\Dependency;
use Drupal\Core\Extension\ExtensionDiscovery;
use Drupal\Core\Installer\InstallerKernel;
use Drupal\Core\Site\SettingsEditor;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Requirement severity -- Informational message only.
 */
const REQUIREMENT_INFO = -1;

/**
 * Requirement severity -- Requirement successfully met.
 */
const REQUIREMENT_OK = 0;

/**
 * Requirement severity -- Warning condition; proceed but flag warning.
 */
const REQUIREMENT_WARNING = 1;

/**
 * Requirement severity -- Error condition; abort installation.
 */
const REQUIREMENT_ERROR = 2;

/**
 * File permission check -- File exists.
 */
const FILE_EXIST = 1;

/**
 * File permission check -- File is readable.
 */
const FILE_READABLE = 2;

/**
 * File permission check -- File is writable.
 */
const FILE_WRITABLE = 4;

/**
 * File permission check -- File is executable.
 */
const FILE_EXECUTABLE = 8;

/**
 * File permission check -- File does not exist.
 */
const FILE_NOT_EXIST = 16;

/**
 * File permission check -- File is not readable.
 */
const FILE_NOT_READABLE = 32;

/**
 * File permission check -- File is not writable.
 */
const FILE_NOT_WRITABLE = 64;

/**
 * File permission check -- File is not executable.
 */
const FILE_NOT_EXECUTABLE = 128;

/**
 * Loads .install files for installed modules to initialize the update system.
 */
function drupal_load_updates() {
  /** @var \Drupal\Core\Extension\ModuleExtensionList $extension_list_module */
  $extension_list_module = \Drupal::service('extension.list.module');
  foreach (\Drupal::service('update.update_hook_registry')->getAllInstalledVersions() as $module => $schema_version) {
    if ($extension_list_module->exists($module) && !$extension_list_module->checkIncompatibility($module)) {
      if ($schema_version > -1) {
        \Drupal::moduleHandler()->loadInclude($module, 'install');
      }
    }
  }
}

/**
 * Loads the installation profile, extracting its defined distribution name.
 *
 * @return string
 *   The distribution name defined in the profile's .info.yml file. Defaults to
 *   "Drupal" if none is explicitly provided by the installation profile.
 *
 * @see install_profile_info()
 */
function drupal_install_profile_distribution_name() {
  // During installation, the profile information is stored in the global
  // installation state (it might not be saved anywhere yet).
  $info = [];
  if (InstallerKernel::installationAttempted()) {
    global $install_state;
    if (isset($install_state['profile_info'])) {
      $info = $install_state['profile_info'];
    }
  }
  // At all other times, we load the profile via standard methods.
  elseif ($profile = \Drupal::installProfile()) {
    $info = \Drupal::service('extension.list.profile')->getExtensionInfo($profile);
  }
  return $info['distribution']['name'] ?? 'Drupal';
}

/**
 * Loads the installation profile, extracting its defined version.
 *
 * @return string
 *   Distribution version defined in the profile's .info.yml file.
 *   Defaults to \Drupal::VERSION if no version is explicitly provided by the
 *   installation profile.
 *
 * @see install_profile_info()
 */
function drupal_install_profile_distribution_version() {
  // During installation, the profile information is stored in the global
  // installation state (it might not be saved anywhere yet).
  if (InstallerKernel::installationAttempted()) {
    global $install_state;
    return $install_state['profile_info']['version'] ?? \Drupal::VERSION;
  }
  // At all other times, we load the profile via standard methods.
  else {
    $profile = \Drupal::installProfile();
    $info = \Drupal::service('extension.list.profile')->getExtensionInfo($profile);
    return $info['version'];
  }
}

/**
 * Detects all supported databases that are compiled into PHP.
 *
 * @return array
 *   An array of database types compiled into PHP.
 *
 * @deprecated in drupal:10.2.0 and is removed from drupal:11.0.0. Use
 *   DatabaseDriverList::getList() instead.
 *
 * @see https://www.drupal.org/node/3258175
 */
function drupal_detect_database_types() {
  @trigger_error('drupal_detect_database_types() is deprecated in drupal:10.2.0 and is removed from drupal:11.0.0. Use DatabaseDriverList::getList() instead. See https://www.drupal.org/node/3258175', E_USER_DEPRECATED);
  $databases = drupal_get_database_types();

  foreach ($databases as $driver => $installer) {
    $databases[$driver] = $installer->name();
  }

  return $databases;
}

/**
 * Returns all supported database driver installer objects.
 *
 * @return \Drupal\Core\Database\Install\Tasks[]
 *   An array of available database driver installer objects.
 *
 * @deprecated in drupal:10.2.0 and is removed from drupal:11.0.0. Use
 *   DatabaseDriverList::getList() instead.
 *
 * @see https://www.drupal.org/node/3258175
 */
function drupal_get_database_types() {
  @trigger_error('drupal_get_database_types() is deprecated in drupal:10.2.0 and is removed from drupal:11.0.0. Use DatabaseDriverList::getList() instead. See https://www.drupal.org/node/3258175', E_USER_DEPRECATED);
  $databases = [];
  $drivers = [];

  // The internal database driver name is any valid PHP identifier.
  $mask = ExtensionDiscovery::PHP_FUNCTION_PATTERN;

  // Find drivers in the Drupal\Driver namespace.
  // @todo remove discovering in the Drupal\Driver namespace in D10.
  /** @var \Drupal\Core\File\FileSystemInterface $file_system */
  $file_system = \Drupal::service('file_system');
  $files = [];
  if (is_dir(DRUPAL_ROOT . '/drivers/lib/Drupal/Driver/Database')) {
    $files = $file_system->scanDirectory(DRUPAL_ROOT . '/drivers/lib/Drupal/Driver/Database/', $mask, ['recurse' => FALSE]);
  }
  foreach ($files as $file) {
    if (file_exists($file->uri . '/Install/Tasks.php')) {
      // The namespace doesn't need to be added here, because
      // db_installer_object() will find it.
      $drivers[$file->filename] = NULL;
    }
  }

  // Find drivers in Drupal module namespaces.
  /** @var \Composer\Autoload\ClassLoader $class_loader */
  $class_loader = \Drupal::service('class_loader');
  // We cannot use the file cache because it does not always exist.
  $extension_discovery = new ExtensionDiscovery(DRUPAL_ROOT, FALSE, []);
  $modules = $extension_discovery->scan('module');
  foreach ($modules as $module) {
    $module_driver_path = DRUPAL_ROOT . '/' . $module->getPath() . '/src/Driver/Database';
    if (is_dir($module_driver_path)) {
      $driver_files = $file_system->scanDirectory($module_driver_path, $mask, ['recurse' => FALSE]);
      foreach ($driver_files as $driver_file) {
        $tasks_file = $module_driver_path . '/' . $driver_file->filename . '/Install/Tasks.php';
        if (file_exists($tasks_file)) {
          $namespace = 'Drupal\\' . $module->getName() . '\\Driver\\Database\\' . $driver_file->filename;

          // Add the driver with its own classes' namespace.
          $drivers[$driver_file->filename] = $namespace;

          // The directory needs to be added to the autoloader, because this is
          // early in the installation process: the module hasn't been enabled
          // yet and the database connection info array (including its 'autoload'
          // key) hasn't been created yet.
          $class_loader->addPsr4($namespace . '\\', $module->getPath() . '/src/Driver/Database/' . $driver_file->filename);
        }
      }
    }
  }

  foreach ($drivers as $driver => $namespace) {
    $installer_class = $namespace . "\\Install\\Tasks";
    $installer = new $installer_class();
    if ($installer->installable()) {
      $databases[$driver] = $installer;
    }
  }

  // Usability: unconditionally put the MySQL driver on top.
  if (isset($databases['mysql'])) {
    $mysql_database = $databases['mysql'];
    unset($databases['mysql']);
    $databases = ['mysql' => $mysql_database] + $databases;
  }

  return $databases;
}

/**
 * Replaces values in settings.php with values in the submitted array.
 *
 * This function replaces values in place if possible, even for
 * multidimensional arrays. This way the old settings do not linger,
 * overridden and also the doxygen on a value remains where it should be.
 *
 * @param $settings
 *   An array of settings that need to be updated. Multidimensional arrays
 *   are dumped up to a stdClass object. The object can have value, required
 *   and comment properties.
 *   @code
 *   $settings['settings']['config_sync_directory'] = (object) [
 *     'value' => 'config_hash/sync',
 *     'required' => TRUE,
 *   ];
 *   @endcode
 *   gets dumped as:
 *   @code
 *   $settings['config_sync_directory'] = 'config_hash/sync'
 *   @endcode
 *
 * @deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use
 *   SettingsEditor::rewrite() instead. Note $settings_file argument becomes
 *   required and the first argument of the method.
 *
 * @see https://www.drupal.org/node/3244583
 * @see \Drupal\Core\Site\SettingsEditor::rewrite()
 */
function drupal_rewrite_settings($settings = [], $settings_file = NULL) {
  @trigger_error(__FUNCTION__ . '() is deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use SettingsEditor::rewrite() instead. The order of the arguments has also changed: $settings_file is now required and is the first argument of the method. See https://www.drupal.org/node/3244583', E_USER_DEPRECATED);
  SettingsEditor::rewrite(
    $settings_file ?? \Drupal::getContainer()->getParameter('site.path') . '/settings.php',
    $settings
  );
}

/**
 * Helper for drupal_rewrite_settings().
 *
 * Checks whether this token represents a scalar or NULL.
 *
 * @param int $type
 *   The token type.
 * @param string $value
 *   The value of the token.
 *
 * @return bool
 *   TRUE if this token represents a scalar or NULL.
 *
 * @deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use
 *   SettingsEditor::rewrite() instead. As internal API,
 *   _drupal_rewrite_settings_is_simple() may also be removed in a minor
 *   release.
 *
 * @see https://www.drupal.org/node/3244583
 * @see token_name()
 */
function _drupal_rewrite_settings_is_simple($type, $value) {
  @trigger_error(__FUNCTION__ . '() is deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use SettingsEditor::rewrite() instead. As internal API, ' . __FUNCTION__ . '() may also be removed in a minor release. See https://www.drupal.org/node/3244583', E_USER_DEPRECATED);
  $is_integer = $type == T_LNUMBER;
  $is_float = $type == T_DNUMBER;
  $is_string = $type == T_CONSTANT_ENCAPSED_STRING;
  $is_boolean_or_null = $type == T_STRING && in_array(strtoupper($value), ['TRUE', 'FALSE', 'NULL']);
  return $is_integer || $is_float || $is_string || $is_boolean_or_null;
}

/**
 * Helper for drupal_rewrite_settings().
 *
 * Checks whether this token represents a valid array index: a number or a
 * string.
 *
 * @param int $type
 *   The token type.
 *
 * @return bool
 *   TRUE if this token represents a number or a string.
 *
 * @deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use
 *   SettingsEditor::rewrite() instead. As internal API,
 *   _drupal_rewrite_settings_is_array_index() may also be removed in a minor
 *   release.
 *
 * @see https://www.drupal.org/node/3244583
 * @see token_name()
 */
function _drupal_rewrite_settings_is_array_index($type) {
  @trigger_error(__FUNCTION__ . '() is deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use SettingsEditor::rewrite() instead. As internal API, ' . __FUNCTION__ . '() may also be removed in a minor release. See https://www.drupal.org/node/3244583', E_USER_DEPRECATED);
  $is_integer = $type == T_LNUMBER;
  $is_float = $type == T_DNUMBER;
  $is_string = $type == T_CONSTANT_ENCAPSED_STRING;
  return $is_integer || $is_float || $is_string;
}

/**
 * Helper for drupal_rewrite_settings().
 *
 * Makes the new settings global.
 *
 * @param array|null $ref
 *   A reference to a nested index in $GLOBALS.
 * @param array|object $variable
 *   The nested value of the setting being copied.
 *
 * @deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use
 *   SettingsEditor::rewrite() instead. As internal API,
 *   _drupal_rewrite_settings_global() may also be removed in a minor
 *   release.
 *
 * @see https://www.drupal.org/node/3244583
 */
function _drupal_rewrite_settings_global(&$ref, $variable) {
  @trigger_error(__FUNCTION__ . '() is deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use SettingsEditor::rewrite() instead. As internal API, ' . __FUNCTION__ . '() may also be removed in a minor release. See https://www.drupal.org/node/3244583', E_USER_DEPRECATED);
  if (is_object($variable)) {
    $ref = $variable->value;
  }
  else {
    foreach ($variable as $k => $v) {
      _drupal_rewrite_settings_global($ref[$k], $v);
    }
  }
}

/**
 * Helper for drupal_rewrite_settings().
 *
 * Dump the relevant value properties.
 *
 * @param array|object $variable
 *   The container for variable values.
 * @param string $variable_name
 *   Name of variable.
 *
 * @return string
 *   A string containing valid PHP code of the variable suitable for placing
 *   into settings.php.
 *
 * @deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use
 *   SettingsEditor::rewrite() instead. As internal API,
 *   _drupal_rewrite_settings_dump() may also be removed in a minor
 *   release.
 *
 * @see https://www.drupal.org/node/3244583
 */
function _drupal_rewrite_settings_dump($variable, $variable_name) {
  @trigger_error(__FUNCTION__ . '() is deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use SettingsEditor::rewrite() instead. As internal API, ' . __FUNCTION__ . '() may also be removed in a minor release. See https://www.drupal.org/node/3244583', E_USER_DEPRECATED);
  $return = '';
  if (is_object($variable)) {
    if (!empty($variable->required)) {
      $return .= _drupal_rewrite_settings_dump_one($variable, "$variable_name = ", "\n");
    }
  }
  else {
    foreach ($variable as $k => $v) {
      $return .= _drupal_rewrite_settings_dump($v, $variable_name . "['" . $k . "']");
    }
  }
  return $return;
}

/**
 * Helper for drupal_rewrite_settings().
 *
 * Dump the value of a value property and adds the comment if it exists.
 *
 * @param object $variable
 *   A stdClass object with at least a value property.
 * @param string $prefix
 *   A string to prepend to the variable's value.
 * @param string $suffix
 *   A string to append to the variable's value.
 *
 * @return string
 *   A string containing valid PHP code of the variable suitable for placing
 *   into settings.php.
 *
 * @deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use
 *   SettingsEditor::rewrite() instead. As internal API,
 *   _drupal_rewrite_settings_dump_one() may also be removed in a minor
 *   release.
 *
 * @see https://www.drupal.org/node/3244583
 */
function _drupal_rewrite_settings_dump_one(\stdClass $variable, $prefix = '', $suffix = '') {
  @trigger_error(__FUNCTION__ . '() is deprecated in drupal:10.1.0 and is removed from drupal:11.0.0. Use SettingsEditor::rewrite() instead. As internal API, ' . __FUNCTION__ . '() may also be removed in a minor release. See https://www.drupal.org/node/3244583', E_USER_DEPRECATED);
  $return = $prefix . var_export($variable->value, TRUE) . ';';
  if (!empty($variable->comment)) {
    $return .= ' // ' . $variable->comment;
  }
  $return .= $suffix;
  return $return;
}

/**
 * Verifies that all dependencies are met for a given installation profile.
 *
 * @param $install_state
 *   An array of information about the current installation state.
 *
 * @return array
 *   The list of modules to install.
 *
 * @todo https://www.drupal.org/i/3005959 Rework this method as it is not only
 *   about profiles.
 */
function drupal_verify_profile($install_state) {
  if ($profile === FALSE) {
    return [];
  }
  $info = $install_state['profile_info'];

  // Get the list of available modules for the selected installation profile.
  $listing = new ExtensionDiscovery(\Drupal::root());
  $present_modules = [];
  foreach ($listing->scan('module') as $present_module) {
    $present_modules[] = $present_module->getName();
  }

  // Get the list of available profiles, which may be used as base profiles or
  // ancestors of the selected installation profile.
  foreach ($listing->scan('profile') as $present_profile) {
    $present_modules[] = $present_profile->getName();
  }

  // Verify that all of the profile's required modules are present.
  $missing_modules = array_diff($info['install'], $present_modules);

  $requirements = [];

  if ($missing_modules) {
    $build = [
      '#theme' => 'item_list',
      '#context' => ['list_style' => 'comma-list'],
    ];

    foreach ($missing_modules as $module) {
      $build['#items'][] = ['#markup' => '<span class="admin-missing">' . Unicode::ucfirst($module) . '</span>'];
    }

    $modules_list = \Drupal::service('renderer')->renderInIsolation($build);
    $requirements['required_modules'] = [
      'title' => t('Required modules'),
      'value' => t('Required modules not found.'),
      'severity' => REQUIREMENT_ERROR,
      'description' => t('The following modules are required but were not found. Move them into the appropriate modules subdirectory, such as <em>/modules</em>. Missing modules: @modules', ['@modules' => $modules_list]),
    ];
  }
  return $requirements;
}

/**
 * Installs the system module.
 *
 * Separated from the installation of other modules so core system
 * functions can be made available while other modules are installed.
 *
 * @param array $install_state
 *   An array of information about the current installation state. This is used
 *   to set the default language.
 */
function drupal_install_system($install_state) {
  // Remove the service provider of the early installer.
  unset($GLOBALS['conf']['container_service_providers']['InstallerServiceProvider']);
  // Add the normal installer service provider.
  $GLOBALS['conf']['container_service_providers']['InstallerServiceProvider'] = 'Drupal\Core\Installer\NormalInstallerServiceProvider';

  // Get the existing request.
  $request = \Drupal::request();
  // Reboot into a full production environment to continue the installation.
  /** @var \Drupal\Core\Installer\InstallerKernel $kernel */
  $kernel = \Drupal::service('kernel');
  $kernel->shutdown();
  // Have installer rebuild from the disk, rather then building from scratch.
  $kernel->rebuildContainer();
  // Reboot the kernel with new container.
  $kernel->boot();
  $kernel->preHandle($request);
  // Ensure our request includes the session if appropriate.
  if (PHP_SAPI !== 'cli') {
    $request->setSession($kernel->getContainer()->get('session'));
  }

  // Before having installed the system module and being able to do a module
  // rebuild, prime the \Drupal\Core\Extension\ModuleExtensionList static cache
  // with the module's location.
  // @todo Try to install system as any other module, see
  //   https://www.drupal.org/node/2719315.
  \Drupal::service('extension.list.module')->setPathname('system', 'core/modules/system/system.info.yml');

  // Install base system configuration.
  \Drupal::service('config.installer')->installDefaultConfig('core', 'core');

  // Store the installation profile in configuration to populate the
  // 'install_profile' container parameter.
  $config = \Drupal::configFactory()->getEditable('core.extension');
  if ($install_state['parameters']['profile'] === FALSE) {
    $config->clear('profile');
  }
  else {
    $config->set('profile', $install_state['parameters']['profile']);
  }
  $config->save();

  $connection = Database::getConnection();
  $provider = $connection->getProvider();
  // When the database driver is provided by a module, then install that module.
  // This module must be installed before any other module, as it must be able
  // to override any call to hook_schema() or any "backend_overridable" service.
  // In edge cases, a driver module may extend from another driver module (for
  // instance, a module to provide backward compatibility with a database
  // version no longer supported by core). In order for the extended classes to
  // be autoloadable, the extending module should list the extended module in
  // its dependencies, and here the dependencies will be installed as well.
  if ($provider !== 'core') {
    $autoload = $connection->getConnectionOptions()['autoload'] ?? '';
    if (str_contains($autoload, 'src/Driver/Database/')) {
      $kernel->getContainer()->get('module_installer')->install([$provider], TRUE);
    }
  }

  // Install System module.
  $kernel->getContainer()->get('module_installer')->install(['system'], FALSE);

  // Ensure default language is saved.
  if (isset($install_state['parameters']['langcode'])) {
    \Drupal::configFactory()->getEditable('system.site')
      ->set('langcode', (string) $install_state['parameters']['langcode'])
      ->set('default_langcode', (string) $install_state['parameters']['langcode'])
      ->save(TRUE);
  }
}

/**
 * Verifies the state of the specified file.
 *
 * @param $file
 *   The file to check for.
 * @param $mask
 *   An optional bitmask created from various FILE_* constants.
 * @param $type
 *   The type of file. Can be file (default), dir, or link.
 * @param bool $auto_fix
 *   (optional) Determines whether to attempt fixing the permissions according
 *   to the provided $mask. Defaults to TRUE.
 *
 * @return bool
 *   TRUE on success or FALSE on failure. A message is set for the latter.
 */
function drupal_verify_install_file($file, $mask = NULL, $type = 'file', $auto_fix = TRUE) {
  $return = TRUE;
  // Check for files that shouldn't be there.
  if (isset($mask) && ($mask & FILE_NOT_EXIST) && file_exists($file)) {
    return FALSE;
  }
  // Verify that the file is the type of file it is supposed to be.
  if (isset($type) && file_exists($file)) {
    $check = 'is_' . $type;
    if (!function_exists($check) || !$check($file)) {
      $return = FALSE;
    }
  }

  // Verify file permissions.
  if (isset($mask)) {
    $masks = [FILE_EXIST, FILE_READABLE, FILE_WRITABLE, FILE_EXECUTABLE, FILE_NOT_READABLE, FILE_NOT_WRITABLE, FILE_NOT_EXECUTABLE];
    foreach ($masks as $current_mask) {
      if ($mask & $current_mask) {
        switch ($current_mask) {
          case FILE_EXIST:
            if (!file_exists($file)) {
              if ($type == 'dir' && $auto_fix) {
                drupal_install_mkdir($file, $mask);
              }
              if (!file_exists($file)) {
                $return = FALSE;
              }
            }
            break;

          case FILE_READABLE:
            if (!is_readable($file)) {
              $return = FALSE;
            }
            break;

          case FILE_WRITABLE:
            if (!is_writable($file)) {
              $return = FALSE;
            }
            break;

          case FILE_EXECUTABLE:
            if (!is_executable($file)) {
              $return = FALSE;
            }
            break;

          case FILE_NOT_READABLE:
            if (is_readable($file)) {
              $return = FALSE;
            }
            break;

          case FILE_NOT_WRITABLE:
            if (is_writable($file)) {
              $return = FALSE;
            }
            break;

          case FILE_NOT_EXECUTABLE:
            if (is_executable($file)) {
              $return = FALSE;
            }
            break;
        }
      }
    }
  }
  if (!$return && $auto_fix) {
    return drupal_install_fix_file($file, $mask);
  }
  return $return;
}

/**
 * Creates a directory with the specified permissions.
 *
 * @param $file
 *   The name of the directory to create;
 * @param $mask
 *   The permissions of the directory to create.
 * @param $message
 *   (optional) Whether to output messages. Defaults to TRUE.
 *
 * @return bool
 *   TRUE/FALSE whether or not the directory was successfully created.
 */
function drupal_install_mkdir($file, $mask, $message = TRUE) {
  $mod = 0;
  $masks = [FILE_READABLE, FILE_WRITABLE, FILE_EXECUTABLE, FILE_NOT_READABLE, FILE_NOT_WRITABLE, FILE_NOT_EXECUTABLE];
  foreach ($masks as $m) {
    if ($mask & $m) {
      switch ($m) {
        case FILE_READABLE:
          $mod |= 0444;
          break;

        case FILE_WRITABLE:
          $mod |= 0222;
          break;

        case FILE_EXECUTABLE:
          $mod |= 0111;
          break;
      }
    }
  }

  if (@\Drupal::service('file_system')->mkdir($file, $mod)) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}

/**
 * Attempts to fix file permissions.
 *
 * The general approach here is that, because we do not know the security
 * setup of the webserver, we apply our permission changes to all three
 * digits of the file permission (i.e. user, group and all).
 *
 * To ensure that the values behave as expected (and numbers don't carry
 * from one digit to the next) we do the calculation on the octal value
 * using bitwise operations. This lets us remove, for example, 0222 from
 * 0700 and get the correct value of 0500.
 *
 * @param $file
 *   The name of the file with permissions to fix.
 * @param $mask
 *   The desired permissions for the file.
 * @param $message
 *   (optional) Whether to output messages. Defaults to TRUE.
 *
 * @return bool
 *   TRUE/FALSE whether or not we were able to fix the file's permissions.
 */
function drupal_install_fix_file($file, $mask, $message = TRUE) {
  // If $file does not exist, fileperms() issues a PHP warning.
  if (!file_exists($file)) {
    return FALSE;
  }

  $mod = fileperms($file) & 0777;
  $masks = [FILE_READABLE, FILE_WRITABLE, FILE_EXECUTABLE, FILE_NOT_READABLE, FILE_NOT_WRITABLE, FILE_NOT_EXECUTABLE];

  // FILE_READABLE, FILE_WRITABLE, and FILE_EXECUTABLE permission strings
  // can theoretically be 0400, 0200, and 0100 respectively, but to be safe
  // we set all three access types in case the administrator intends to
  // change the owner of settings.php after installation.
  foreach ($masks as $m) {
    if ($mask & $m) {
      switch ($m) {
        case FILE_READABLE:
          if (!is_readable($file)) {
            $mod |= 0444;
          }
          break;

        case FILE_WRITABLE:
          if (!is_writable($file)) {
            $mod |= 0222;
          }
          break;

        case FILE_EXECUTABLE:
          if (!is_executable($file)) {
            $mod |= 0111;
          }
          break;

        case FILE_NOT_READABLE:
          if (is_readable($file)) {
            $mod &= ~0444;
          }
          break;

        case FILE_NOT_WRITABLE:
          if (is_writable($file)) {
            $mod &= ~0222;
          }
          break;

        case FILE_NOT_EXECUTABLE:
          if (is_executable($file)) {
            $mod &= ~0111;
          }
          break;
      }
    }
  }

  // chmod() will work if the web server is running as owner of the file.
  if (@chmod($file, $mod)) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}

/**
 * Sends the user to a different installer page.
 *
 * This issues an on-site HTTP redirect. Messages (and errors) are erased.
 *
 * @param $path
 *   An installer path.
 */
function install_goto($path) {
  global $base_url;
  $headers = [
    // Not a permanent redirect.
    'Cache-Control' => 'no-cache',
  ];
  $response = new RedirectResponse($base_url . '/' . $path, 302, $headers);
  $response->send();
}

/**
 * Returns the URL of the current script, with modified query parameters.
 *
 * This function can be called by low-level scripts (such as install.php and
 * update.php) and returns the URL of the current script. Existing query
 * parameters are preserved by default, but new ones can optionally be merged
 * in.
 *
 * This function is used when the script must maintain certain query parameters
 * over multiple page requests in order to work correctly. In such cases (for
 * example, update.php, which requires the 'continue=1' parameter to remain in
 * the URL throughout the update process if there are any requirement warnings
 * that need to be bypassed), using this function to generate the URL for links
 * to the next steps of the script ensures that the links will work correctly.
 *
 * @param $query
 *   (optional) An array of query parameters to merge in to the existing ones.
 *
 * @return string
 *   The URL of the current script, with query parameters modified by the
 *   passed-in $query. The URL is not sanitized, so it still needs to be run
 *   through \Drupal\Component\Utility\UrlHelper::filterBadProtocol() if it will be
 *   used as an HTML attribute value.
 *
 * @see drupal_requirements_url()
 * @see Drupal\Component\Utility\UrlHelper::filterBadProtocol()
 */
function drupal_current_script_url($query = []) {
  $uri = $_SERVER['SCRIPT_NAME'];
  $query = array_merge(UrlHelper::filterQueryParameters(\Drupal::request()->query->all()), $query);
  if (!empty($query)) {
    $uri .= '?' . UrlHelper::buildQuery($query);
  }
  return $uri;
}

/**
 * Returns a URL for proceeding to the next page after a requirements problem.
 *
 * This function can be called by low-level scripts (such as install.php and
 * update.php) and returns a URL that can be used to attempt to proceed to the
 * next step of the script.
 *
 * @param $severity
 *   The severity of the requirements problem, as returned by
 *   drupal_requirements_severity().
 *
 * @return string
 *   A URL for attempting to proceed to the next step of the script. The URL is
 *   not sanitized, so it still needs to be run through
 *   \Drupal\Component\Utility\UrlHelper::filterBadProtocol() if it will be used
 *   as an HTML attribute value.
 *
 * @see drupal_current_script_url()
 * @see \Drupal\Component\Utility\UrlHelper::filterBadProtocol()
 */
function drupal_requirements_url($severity) {
  $query = [];
  // If there are no errors, only warnings, append 'continue=1' to the URL so
  // the user can bypass this screen on the next page load.
  if ($severity == REQUIREMENT_WARNING) {
    $query['continue'] = 1;
  }
  return drupal_current_script_url($query);
}

/**
 * Checks an installation profile's requirements.
 *
 * @param string $profile
 *   Name of installation profile to check.
 *
 * @return array
 *   Array of the installation profile's requirements.
 */
function drupal_check_profile($profile) {
  $info = install_profile_info($profile);
  // Collect requirement testing results.
  $requirements = [];
  // Performs an ExtensionDiscovery scan as the system module is unavailable and
  // we don't yet know where all the modules are located.
  // @todo Remove as part of https://www.drupal.org/node/2186491
  $drupal_root = \Drupal::root();
  $module_list = (new ExtensionDiscovery($drupal_root))->scan('module');

  foreach ($info['install'] as $module) {
    // If the module is in the module list we know it exists and we can continue
    // including and registering it.
    // @see \Drupal\Core\Extension\ExtensionDiscovery::scanDirectory()
    if (isset($module_list[$module])) {
      $function = $module . '_requirements';
      $module_path = $module_list[$module]->getPath();
      $install_file = "$drupal_root/$module_path/$module.install";

      if (is_file($install_file)) {
        require_once $install_file;
      }

      \Drupal::service('class_loader')->addPsr4('Drupal\\' . $module . '\\', \Drupal::root() . "/$module_path/src");

      if (function_exists($function)) {
        $requirements = array_merge($requirements, $function('install'));
      }
    }
  }

  // Add the profile requirements.
  $function = $profile . '_requirements';
  if (function_exists($function)) {
    $requirements = array_merge($requirements, $function('install'));
  }

  return $requirements;
}

/**
 * Extracts the highest severity from the requirements array.
 *
 * @param $requirements
 *   An array of requirements, in the same format as is returned by
 *   hook_requirements().
 *
 * @return int
 *   The highest severity in the array.
 */
function drupal_requirements_severity(&$requirements) {
  $severity = REQUIREMENT_OK;
  foreach ($requirements as $requirement) {
    if (isset($requirement['severity'])) {
      $severity = max($severity, $requirement['severity']);
    }
  }
  return $severity;
}

/**
 * Checks a module's requirements.
 *
 * @param $module
 *   Machine name of module to check.
 *
 * @return bool
 *   TRUE or FALSE, depending on whether the requirements are met.
 */
function drupal_check_module($module) {
  /** @var \Drupal\Core\Extension\ModuleExtensionList $module_list */
  $module_list = \Drupal::service('extension.list.module');
  $file = DRUPAL_ROOT . '/' . $module_list->getPath($module) . "/$module.install";
  if (is_file($file)) {
    require_once $file;
  }
  // Check requirements
  $requirements = \Drupal::moduleHandler()->invoke($module, 'requirements', ['install']);
  if (is_array($requirements) && drupal_requirements_severity($requirements) == REQUIREMENT_ERROR) {
    // Print any error messages
    foreach ($requirements as $requirement) {
      if (isset($requirement['severity']) && $requirement['severity'] == REQUIREMENT_ERROR) {
        $message = $requirement['description'];
        if (isset($requirement['value']) && $requirement['value']) {
          $message = t('@requirements_message (Currently using @item version @version)', ['@requirements_message' => $requirement['description'], '@item' => $requirement['title'], '@version' => $requirement['value']]);
        }
        \Drupal::messenger()->addError($message);
      }
    }
    return FALSE;
  }
  return TRUE;
}

/**
 * Retrieves information about an installation profile from its .info.yml file.
 *
 * The information stored in a profile .info.yml file is similar to that stored
 * in a normal Drupal module .info.yml file. For example:
 * - name: The real name of the installation profile for display purposes.
 * - description: A brief description of the profile.
 * - dependencies: An array of short names of other modules that this install
 *   profile requires.
 * - install: An array of shortname of other modules to install that are not
 *   required by this install profile.
 *
 * Additional, less commonly-used information that can appear in a
 * profile.info.yml file but not in a normal Drupal module .info.yml file
 * includes:
 *
 * - distribution: Existence of this key denotes that the installation profile
 *   is intended to be the only eligible choice in a distribution and will be
 *   auto-selected during installation, whereas the installation profile
 *   selection screen will be skipped. If more than one distribution profile is
 *   found then the first one discovered will be selected.
 *   The following subproperties may be set:
 *   - name: The name of the distribution that is being installed, to be shown
 *     throughout the installation process. If omitted,
 *     drupal_install_profile_distribution_name() defaults to 'Drupal'.
 *   - install: Optional parameters to override the installer:
 *     - theme: The machine name of a theme to use in the installer instead of
 *       Drupal's default installer theme.
 *     - finish_url: A destination to visit after the installation of the
 *       distribution is finished
 *   - base profile: The shortname of the base installation profile. Existence of
 *     this key denotes that the installation profile depends on a parent
 *     installation profile.
 *
 * Note that this function does an expensive file system scan to get info file
 * information for dependencies. If you only need information from the info
 * file itself, use
 * \Drupal::service('extension.list.profile')->getExtensionInfo().
 *
 * Example of .info.yml file:
 * @code
 *    name: Minimal
 *    description: Start fresh, with only a few modules enabled.
 *    install:
 *      - block
 *      - dblog
 * @endcode
 *
 * @param $profile
 *   Name of profile.
 * @param $langcode
 *   Language code (if any).
 *
 * @return array
 *   The info array.
 */
function install_profile_info($profile, $langcode = 'en') {
  static $cache = [];

  if (!isset($cache[$profile][$langcode])) {
    // Set defaults for module info.
    $info = \Drupal::service('extension.list.profile')->getExtensionInfo($profile);

    $dependency_name_function = function ($dependency) {
      return Dependency::createFromString($dependency)->getName();
    };
    // Convert dependencies in [project:module] format.
    $info['dependencies'] = array_map($dependency_name_function, $info['dependencies']);

    // Convert install key in [project:module] format.
    $info['install'] = array_map($dependency_name_function, $info['install']);

    // Get a list of core's required modules.
    $required = [];
    $listing = new ExtensionDiscovery(\Drupal::root());
    $files = $listing->scan('module');
    foreach ($files as $name => $file) {
      $parsed = $parser->parse($file->getPathname());
      if (!empty($parsed) && !empty($parsed['required']) && $parsed['required']) {
        $required[] = $name;
      }
    }

    $locale = !empty($langcode) && $langcode != 'en' ? ['locale'] : [];

    // Merge dependencies, required modules and locale into install list and
    // remove any duplicates.
    $info['install'] = array_unique(array_merge($info['install'], $required, $info['dependencies'], $locale));

    // If the profile has a config/sync directory use that to install drupal.
    $profile_path = \Drupal::service('extension.list.profile')->getPath($profile);
    if (is_dir($profile_path . '/config/sync')) {
      $info['config_install_path'] = $profile_path . '/config/sync';
    }
    $cache[$profile][$langcode] = $info;
  }
  return $cache[$profile][$langcode];
}

/**
 * Returns a database installer object.
 *
 * Before calling this function it is important the database installer object
 * is autoloadable. Database drivers provided by contributed modules are added
 * to the autoloader in drupal_get_database_types() and Settings::initialize().
 *
 * @param $driver
 *   The name of the driver.
 * @param string $namespace
 *   (optional) The database driver namespace.
 *
 * @return \Drupal\Core\Database\Install\Tasks
 *   A class defining the requirements and tasks for installing the database.
 *
 * @deprecated in drupal:10.0.0 and is removed from drupal:11.0.0. There is no
 *   replacement.
 *
 * @see https://www.drupal.org/node/3256641
 * @see drupal_get_database_types()
 * @see \Drupal\Core\Site\Settings::initialize()
 */
function db_installer_object($driver, $namespace = NULL) {
  @trigger_error('db_installer_object() is deprecated in drupal:10.0.0 and is removed from drupal:11.0.0. There is no replacement. See https://www.drupal.org/node/3256641', E_USER_DEPRECATED);

  // We cannot use Database::getConnection->getDriverClass() here, because
  // the connection object is not yet functional.
  if ($namespace) {
    $task_class = $namespace . "\\Install\\Tasks";
    return new $task_class();
  }
  // Old Drupal 8 style contrib namespace.
  $task_class = "Drupal\\Driver\\Database\\{$driver}\\Install\\Tasks";
  if (class_exists($task_class)) {
    return new $task_class();
  }
  else {
    // Core provided driver.
    $task_class = "Drupal\\Core\\Database\\Driver\\{$driver}\\Install\\Tasks";
    return new $task_class();
  }
}
