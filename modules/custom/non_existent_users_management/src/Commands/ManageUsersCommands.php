<?php

namespace Drupal\non_existent_users_management\Commands;

use Consolidation\SiteAlias\SiteAliasManagerAwareInterface;
use Consolidation\SiteAlias\SiteAliasManagerAwareTrait;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ModuleInstallerInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\field\Entity\FieldConfig;
use Drupal\file\FileInterface;
use Drupal\file\FileUsage\FileUsageInterface;
use Drush\Commands\DrushCommands;
use Drush\Drush;
use GuzzleHttp\ClientInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class ManageUsersCommands extends DrushCommands implements SiteAliasManagerAwareInterface {
  use StringTranslationTrait;
  use SiteAliasManagerAwareTrait;

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  private $requestStack;

  /**
   * Entity type service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * Logger service.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  private $loggerChannelFactory;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The module installer.
   *
   * @var \Drupal\Core\Extension\ModuleInstallerInterface
   */
  protected $moduleInstaller;

  /**
   * The HTTP client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  private $httpClient;

  /**
   * The language manager service.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The entity field manager.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;

  /**
   * The entity display repository.
   *
   * @var \Drupal\Core\Entity\EntityDisplayRepositoryInterface
   */
  protected $entityDisplayRepository;

  /**
   * The entity bundle info.
   *
   * @var \Drupal\Core\Entity\EntityTypeBundleInfoInterface
   */
  protected $bundleInfo;

  /**
   * The db connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The file service.
   *
   * @var \Drupal\file\FileUsage\FileUsageInterface
   */
  protected $fileUsage;

  /**
   * Config factory.
   *
   * @var Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  const ACSF_USERNAME = 'krishan.c';
  const ACSF_USER_SECRET = '39394a4ff3d2087e1458c3ca5185613aed2fc19a';

  /**
   * Constructs a new UpdateVideosStatsController object.
   *
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   Entity type service.
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $loggerChannelFactory
   *   Logger service.
   * @param \GuzzleHttp\ClientInterface $http_client
   *   The HTTP client.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Extension\ModuleInstallerInterface $module_installer
   *   The module installer.
   * @param \Drupal\Core\Language\LanguageManagerInterface $languageManager
   *   The language manager service.
   * @param \Drupal\Core\Entity\EntityFieldManagerInterface $entity_field_manager
   *   The entity field manager.
   * @param \Drupal\Core\Entity\EntityDisplayRepositoryInterface $entity_display_repository
   *   The entity display repository.
   * @param \Drupal\Core\Entity\EntityTypeBundleInfoInterface $bundleInfo
   *   The budle info service.
   * @param \Drupal\Core\Database\Connection $database
   *   The database service.
   * @param \Drupal\file\FileUsage\FileUsageInterface $fileUsage
   *   The file service.
   * @param Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The Config Factory service.
   */
  public function __construct(RequestStack $request_stack, EntityTypeManagerInterface $entityTypeManager, LoggerChannelFactoryInterface $loggerChannelFactory, ClientInterface $http_client, ModuleHandlerInterface $module_handler, ModuleInstallerInterface $module_installer, LanguageManagerInterface $languageManager, EntityFieldManagerInterface $entity_field_manager, EntityDisplayRepositoryInterface $entity_display_repository, EntityTypeBundleInfoInterface $bundleInfo, Connection $database, FileUsageInterface $fileUsage, ConfigFactoryInterface $config_factory) {
    $this->requestStack = $request_stack;
    $this->entityTypeManager = $entityTypeManager;
    $this->loggerChannelFactory = $loggerChannelFactory;
    $this->httpClient = $http_client;
    $this->moduleHandler = $module_handler;
    $this->moduleInstaller = $module_installer;
    $this->languageManager = $languageManager;
    $this->entityFieldManager = $entity_field_manager;
    $this->entityDisplayRepository = $entity_display_repository;
    $this->bundleInfo = $bundleInfo;
    $this->database = $database;
    $this->fileUsage = $fileUsage;
    $this->configFactory = $config_factory;
  }

  /**
   * Update Node.
   *
   * @command acsfuser:block
   * @aliases acsfuser-block
   * @option ignore-excluding-site-list
   *   ignore checking excluded site list
   *
   * @usage acsfuser:block --ignore-excluding-site-list
   */
  public function updateUser($options = ['ignore-excluding-site-list' => FALSE]) {
    // Check the current environment is exists in all environment list.
    $all_environment = ['dev', 'test', 'val', 'val2', 'prod'];
    $env = getenv('AH_SITE_ENVIRONMENT');
    $env_name = 'prod';
    // Takes the current host.
    $request = $this->requestStack->getCurrentRequest();
    $site_name = $request->getHost();
    foreach ($all_environment as $environment) {
      if (str_contains($env, $environment)) {
        $env_name = $environment;
      }
    }
    // Check exclude list if --ignore-excluding-site-list flag is not set.
    if ($options['ignore-excluding-site-list'] == FALSE) {
      $exclude_sites = $this->getExcludeSitesList($env_name);
      if (!empty($exclude_sites)) {
        if (in_array($site_name, $exclude_sites)) {
          $this->logger()->notice('This site is an excluded site from block users job process.');
          return;
        }
      }
    }
    $blocked_users = $all_active_users = [];
    $users_to_block = $this->getSiteUsersToBlock($env_name);
    foreach ($users_to_block['blocked_users'] as $user_to_block) {
      $blocked_users[] = $user_to_block->get('name')->value;
    }
    $this->logger()->notice(dt("Active users before batch process start on @site_name", ["@site_name" => $site_name]));
    foreach ($users_to_block['active_users'] as $active_user) {
      $all_active_users[] = $active_user->get('name')->value;
      $this->logger()->notice($active_user->get('name')->value);
    }
    // Log the start of the script.
    $this->loggerChannelFactory->get('non_existent_users_management')->info('Start process to block users according ACSF blocked or non-existent users list on @site_name and active users list before start the batch process is<pre><code>' . implode("\n", $all_active_users) . '</code></pre>', ['@site_name' => $site_name]);
    $this->logger()->notice(dt("Process start to block users on @site_name", ["@site_name" => $site_name]));
    // Get users list to block.
    if (empty($users_to_block['blocked_users'])) {
      $this->logger()->notice("0 user processed to block.");
      $blocked_users[] = "0 user processed to block.";
    }
    $operations =
    [
      [__CLASS__ . '::processAcsfUser',
        [
          $users_to_block['blocked_users'],
        ],
      ],
    ];
    $batch_definition = [
      'title' => $this->t('Updating @num users(s)', ['@num' => count($users_to_block['blocked_users'])]),
      'operations' => $operations,
      'finished' => [__CLASS__ . '::processAcsfUserFinished'],
    ];
    $batch = batch_get();
    $run_drush_batch = function_exists('drush_backend_batch_process')
      && empty($batch['running']);

    // Schedule the batch.
    batch_set($batch_definition);

    // Now run the Drush batch, if applicable.
    if ($run_drush_batch) {
      $result = drush_backend_batch_process();
      if (!empty($result['context']['drush_batch_process_finished'])
          || !empty($result['drush_batch_process_finished'])) {
        $batch = &batch_get();
        $batch = NULL;
        unset($batch);
      }
    }
    $this->logger()->notice(dt("Process finished to block users on @site_name", ['@site_name' => $site_name]));
    $this->loggerChannelFactory->get('non_existent_users_management')->info('End process to block users according ACSF blocked or non-existent users list on @site_name and blocked users list after complete the batch process is<pre><code>' . implode("\n", $blocked_users) . '</code></pre>', ['@site_name' => $site_name]);
  }

  /**
   * Batch process callback.
   *
   * @param array $users
   *   Array of user objects.
   * @param object $context
   *   Context for operations.
   */
  public static function processAcsfUser(array $users, &$context) {
    $number = count($users);
    $context = self::initializeSandbox($number, $context);
    $max = self::batchLimit($context);
    // Start where we left off last time.
    $start = $context['sandbox']['progress'];
    for ($i = $start; $i < $max; $i++) {
      // Block website user.
      $users[$i]->block();
      $users[$i]->save();
      // We want to display the counter 1-based, not 0-based.
      $context['message'] = t('User with username --- @username --- have been blocked out of total @total users.',
      [
        '@username' => $users[$i]->get('name')->value,
        '@total' => $number,
      ]);

      // Update our progress!
      $context['sandbox']['progress']++;
    }

    $context = self::contextProgress($context);
  }

  /**
   * Batch Finished callback.
   *
   * @param bool $success
   *   Success of the operation.
   * @param array $results
   *   Array of results for post processing.
   * @param array $operations
   *   Array of operations.
   */
  public static function processAcsfUserFinished($success, array $results, array $operations) {
    if ($success) {
      $messenger->addMessage(t('@count results processed.', ['@count' => count($results)]));
    }
    else {
      $error_operation = reset($operations);
      $messenger->addMessage(
        t('An error occurred while processing @operation with arguments : @args',
          [
            '@operation' => $error_operation[0],
            '@args' => print_r($error_operation[0], TRUE),
          ]
        )
      );
    }
  }

  /**
   * Function to initializa batch sandbox array.
   *
   * @param int $number
   *   Max number.
   * @param object $context
   *   Object of batch context.
   *
   * @return mixed
   *   Return array of mixed values
   */
  private static function initializeSandbox($number, &$context) {
    if (empty($context['sandbox'])) {
      $context['sandbox']['progress'] = 0;
      $context['sandbox']['max'] = $number;
      $context['sandbox']['working_set'] = [];
    }
    return $context;
  }

  /**
   * Function to set batch limit.
   *
   * @param object $context
   *   Object of batch context.
   */
  private static function batchLimit(&$context) {
    // We process the remaining number.
    $batchSize = 50;

    $max = $context['sandbox']['progress'] + $batchSize;
    if ($max > $context['sandbox']['max']) {
      $max = $context['sandbox']['max'];
    }
    return $max;
  }

  /**
   * Function to update progress in batch context.
   *
   * @param object $context
   *   Object of batch context.
   *
   * @return mixed
   *   Return array of mixed values.
   */
  private static function contextProgress(&$context) {
    if ($context['sandbox']['progress'] != $context['sandbox']['max']) {
      $context['finished'] = $context['sandbox']['progress'] / $context['sandbox']['max'];
    }
    return $context;
  }

  /**
   * Fuction to call acsf api.
   *
   * @param int $page_id
   *   Page number for api response.
   * @param string $env_name
   *   Environment name of site.
   *
   * @return array
   *   Return an array of users that are non-active of acsf.
   */
  private function getApiUsers($page_id, $env_name) {
    $url = 'https://www.alconacsf.acsitefactory.com';
    if (!empty($env_name) && $env_name != 'prod') {
      $url = 'https://www.' . $env_name . '-alconacsf.acsitefactory.com';
    }
    try {
      $url = $url . '/api/v1/users?limit=100&order=ASC&page=' . $page_id;
      $response = $this->httpClient->get($url, [
        'auth' => [self::ACSF_USERNAME, self::ACSF_USER_SECRET],
      ]);
      if ($response->getStatusCode() === 200) {
        $data = Json::decode($response->getBody()->getContents());
        return $data;
      }
    }
    catch (RequestException $e) {
      $this->loggerChannelFactory->get('non_existent_users_management')->error($e->getMessage());
    }
  }

  /**
   * Function to stage down site using API.
   *
   * @command acsfsitestage:down
   * @aliases acsfsitestage-down
   *
   * @usage acsfsitestage:down
   */
  public function stageDownApi($env = 'dev', $site_id = "4381") {
    $input = [
      "to_env" => $env,
      "sites" => [
        $site_id,
      ],
    ];
    try {
      $response = $this->httpClient->request('POST',
      'https://www.alconacsf.acsitefactory.com/api/v2/stage', [
        'auth' => ['krishan.c', '39394a4ff3d2087e1458c3ca5185613aed2fc19a'],
        'json' => $input,
      ]);
      if ($response->getStatusCode() === 200) {
        $data = Json::decode($response->getBody()->getContents());
        return $data;
      }
    }
    catch (RequestException $e) {
      $this->loggerChannelFactory->get('non_existent_users_management1')->error($e->getMessage());
    }
  }

  /**
   * Function to take sites backup using API.
   *
   * @command acsfsites:backup
   * @aliases acsfsites-backup
   *
   * @usage acsfsites:backup
   */
  public function siteBackupApi($env_url, $site_id) {
    $url = $env_url . '/api/v1/sites/' . $site_id . '/backup';
    $input = [
      "components" => [
        'database',
        'public files',
        'private files',
        'themes',
      ],
    ];
    try {
      $response = $this->httpClient->request('POST',
      $url, [
        'auth' => ['krishan.c', '39394a4ff3d2087e1458c3ca5185613aed2fc19a'],
        'json' => $input,
      ]);
      if ($response->getStatusCode() === 200) {
        $data = Json::decode($response->getBody()->getContents());
        return $data;
      }
    }
    catch (RequestException $e) {
      $this->loggerChannelFactory->get('non_existent_users_management1')->error($e->getMessage());
    }
  }

  /**
   * Function to check the WIP status.
   *
   * @command acsfsites:wip:status
   * @aliases acsfsites-wip-status
   *
   * @usage acsfsites:wip:status
   */
  public function siteWipStatusApi($env_url, $task_id) {
    $task_id = str_replace(["\r\n", "\n", "\r", "%0D"], '', $task_id);
    $url = $env_url . '/api/v1/wip/task/' . $task_id . '/status';
    $status = 'Waiting';
    while ($status === 'Waiting') {
      try {
        $response = $this->httpClient->request('GET',
        $url, [
          'auth' => ['krishan.c', '39394a4ff3d2087e1458c3ca5185613aed2fc19a'],
        ]);
        if ($response->getStatusCode() === 200) {
          $data = Json::decode($response->getBody()->getContents());
          $status = $data['wip_task']['status_string'];

          if ($status === 'Completed') {
            $this->output()->writeln("Backup completed successfully.");
          }
          elseif ($status === 'Error') {
            $this->output()->writeln("Backup failed.");
            return;
          }
          else {
            $this->output()->writeln("Backup in progress. Retrying...");
            sleep(30);
          }
        }
      }
      catch (RequestException $e) {
        $this->output()->writeln("Error checking task status: " . $e->getMessage());
        return;
      }
    }
  }

  /**
   * Fuction to prepare list of users to block.
   *
   * @param string $env_name
   *   Environment name of site.
   *
   * @return array
   *   Return an array of users that should be block.
   */
  private function getSiteUsersToBlock($env_name) {
    try {
      $storage = $this->entityTypeManager->getStorage('user');
      $query = $storage->getQuery()
        ->condition('status', '1')
        ->accessCheck();
      $uids = $query->execute();
      $active_users = $storage->loadMultiple($uids);
    }
    catch (\Exception $e) {
      $this->output()->writeln($e);
      $this->loggerChannelFactory->get('non_existent_users_management')->error('Error found @e', ['@e' => $e]);
    }
    $data = $this->getApiUsers('1', $env_name);
    if (isset($data['count']) && isset($data['users']) && !empty($data['count'])) {
      $all_acsf_users = $data['users'];
      $iteration = ceil($data['count'] / 100);
      for ($i = 2; $i <= $iteration; $i++) {
        $users_data = $this->getApiUsers($i, $env_name);
        foreach ($users_data['users'] as $user_data) {
          array_push($all_acsf_users, $user_data);
        }
      }
    }
    $users_to_block = [];
    foreach ($active_users as $active_user) {
      $flag1 = $flag2 = FALSE;
      $active_user_username = $active_user->get('name')->value;
      if (strtolower($active_user_username) == 'sfadmin') {
        continue;
      }
      if (!empty($active_user_username)) {
        foreach ($all_acsf_users as $acsf_user) {
          if (strtolower($acsf_user['name']) == strtolower($active_user_username) && $acsf_user['status'] == 'blocked') {
            $users_to_block[] = $active_user;
            $flag1 = TRUE;
          }
          if (strtolower($acsf_user['name']) == strtolower($active_user_username)) {
            $flag2 = TRUE;
          }
        }
        if (!$flag1 && !$flag2) {
          $users_to_block[] = $active_user;
        }
      }
    }
    return ['blocked_users' => $users_to_block, 'active_users' => $active_users];
  }

  /**
   * Get site studio sites list.
   *
   * @command acsfsitestudio:cim
   * @aliases acsfsitestudio-cim
   *
   * @usage acsfsitestudio:cim
   */
  public function cimForSiteStudioSites() {
    if ($this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()->writeln("\n=> Module cohesion_website_settings is enabled for this site.");
      $env_data = $this->getEnvNameSiteNameUrl();
      $exclude_sites = $this->getExcludeSitesList($env_data['env_name']);
      if (!empty($exclude_sites)) {
        if (in_array($env_data['site_name'], $exclude_sites)) {
          $this->logger()->notice('This site is an excluded site from adding roles and config ignore rules process.');
          return;
        }
      }
      if (!$this->moduleHandler->moduleExists('config_perms')) {
        $this->moduleInstaller->install(['config_perms']);
        $this->output()->writeln("\n=> Module config_perms has been enable for this site.");
      }
      if (!$this->moduleHandler->moduleExists('field_permissions')) {
        $this->moduleInstaller->install(['field_permissions']);
        $this->output()
          ->writeln("\n=> Module field_permissions has been enable for this site.");
      }
      $option_drush_command = [
        "--partial", "--source=../config/new_roles_and_permission", "--yes",
      ];
      $process = Drush::drush($this->siteAliasManager()->getSelf(), "cim", $option_drush_command, []);
      try {
        $process->Run();
      }
      catch (\Exception $e) {
        print $e->getMessage();
      }
      if (!empty($process->getOutput()) && $process->isSuccessful()) {
        $this->output()->writeln($process->getOutput());
      }
      if (!empty($process->getErrorOutput()) && !$process->isSuccessful()) {
        $this->output()->writeln($process->getErrorOutput());
      }
      if (empty($process->getOutput()) && $process->isSuccessful()) {
        $this->output()->writeln("\n=> There are no changes to import.");
      }
      Drush::drush($this->siteAliasManager()->getSelf(), "cr")->Run();
    }
  }

  /**
   * Get site studio sites list.
   *
   * @command acsfsystane1mkt:cim
   * @aliases acsfsystane1mkt-cim
   *
   * @usage acsfsystane1mkt:cim
   */
  public function cimForSystane1mktSites() {
    if ($this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()->writeln("\n=> Module cohesion_website_settings is enabled for this site.");
      $env_data = $this->getSystane1mktEnvNameSiteNameUrl();

      $include_sites = $this->getIncludeSitesList($env_data['env_name']);

      if (!empty($include_sites)) {
        if (in_array($env_data['site_name'], $include_sites)) {
          if (!$this->moduleHandler->moduleExists('config_perms')) {
            $this->moduleInstaller->install(['config_perms']);
            $this->output()->writeln("\n=> Module config_perms has been enable for this site.");
          }
          if (!$this->moduleHandler->moduleExists('field_permissions')) {
            $this->moduleInstaller->install(['field_permissions']);
            $this->output()
              ->writeln("\n=> Module field_permissions has been enable for this site.");
          }
          $option_drush_command = [
            "--partial", "--source=../config/systane1mkt_roles_and_permission", "--yes",
          ];
          $process = Drush::drush($this->siteAliasManager()->getSelf(), "cim", $option_drush_command, []);
          try {
            $process->Run();
          }
          catch (\Exception $e) {
            print $e->getMessage();
          }
          if (!empty($process->getOutput()) && $process->isSuccessful()) {
            $this->output()->writeln($process->getOutput());
          }
          if (!empty($process->getErrorOutput()) && !$process->isSuccessful()) {
            $this->output()->writeln($process->getErrorOutput());
          }
          if (empty($process->getOutput()) && $process->isSuccessful()) {
            $this->output()->writeln("\n=> There are no changes to import.");
          }
          Drush::drush($this->siteAliasManager()->getSelf(), "cr")->Run();
        }
        else {
          $this->logger()->notice('This site is not in included site from adding roles and config ignore rules process.');
          return;
        }
      }
    }
  }

  /**
   * Fuction to get exclude sites.
   *
   * @param string $env_name
   *   Environment name of site.
   *
   * @return array
   *   Return an array of exclude site list.
   */
  public function getExcludeSitesList($env_name) {
    $url = 'https://sitestudioreference.alconacsf.acsitefactory.com';
    if (!empty($env_name) && $env_name != 'prod') {
      $url = 'https://sitestudioreference.' . $env_name . '-alconacsf.acsitefactory.com';
    }
    $option_drush_command = [
      "site_studio_roles_permissions.exclude_site_settings", "exclude_site_list",
    ];
    $process = Drush::drush($this->siteAliasManager()->getSelf(), "config:get", $option_drush_command, ['uri' => $url]);
    try {
      $process->Run();
    }
    catch (\Exception $e) {
      print $e->getMessage();
    }
    if (!empty($process->getOutput()) && $process->isSuccessful()) {
      $output = explode(':', $process->getOutput());
      $last_key = count($output) - 1;
      if (trim($output[$last_key]) != "''") {
        $output[$last_key] = trim($output[$last_key]);
        $output[$last_key] = trim($output[$last_key], '"');
        return explode('\r\n', trim($output[$last_key], '"'));
      }
      else {
        $this->output()->writeln("\n=> No site found to exclude from block users job execution.");
      }
    }
    if (empty($process->getOutput()) && !$process->isSuccessful()) {
      $this->output()->writeln("\n=> No site found to exclude from block users job execution.");
    }
    return [];
  }

  /**
   * Fuction to get exclude sites.
   *
   * @param string $env_name
   *   Environment name of site.
   *
   * @return array
   *   Return an array of exclude site list.
   */
  public function getIncludeSitesList($env_name) {
    $url = 'https://systane1mkt.alconacsf.acsitefactory.com';
    if (!empty($env_name) && $env_name != 'prod') {
      $url = 'https://systane1mkt.' . $env_name . '-alconacsf.acsitefactory.com';
    }
    $option_drush_command = [
      "systane1mkt_roles_permissions.include_site_settings", "include_site_list",
    ];
    $process = Drush::drush($this->siteAliasManager()->getSelf(), "config:get", $option_drush_command, ['uri' => $url]);
    try {
      $process->Run();
    }
    catch (\Exception $e) {
      print $e->getMessage();
    }
    if (!empty($process->getOutput()) && $process->isSuccessful()) {
      $output = explode(':', $process->getOutput());
      $last_key = count($output) - 1;
      if (trim($output[$last_key]) != "''") {
        $output[$last_key] = trim($output[$last_key]);
        $output[$last_key] = trim($output[$last_key], '"');
        return explode('\r\n', trim($output[$last_key], '"'));
      }
      else {
        $this->output()->writeln("\n=> No site found to include from block users job execution.");
      }
    }
    if (empty($process->getOutput()) && !$process->isSuccessful()) {
      $this->output()->writeln("\n=> No site found to include from block users job execution.");
    }
    return [];
  }

  /**
   * Update Config.
   *
   * @command acsfmove:hide
   * @aliases acsfmove-hide
   *
   * @usage acsfmove:hide
   */
  public function moveHidden() {
    $form_mode = 'bulk_edit';
    $unwantedFields = [
      'comment', 'content_translation_source', 'content_translation_outdated',
      'revision_default', 'revision_translation_affected',
      'revision_timestamp', 'revision_uid', 'revision_log',
      'vid', 'uuid', 'langcode', 'moderation_state',
    ];

    try {
      // Get all node types.
      $storage = $this->entityTypeManager->getStorage('node_type');
      $node_types = $storage->loadMultiple();
    }
    catch (\Exception $e) {
      $this->output()->writeln("Error Bulk move " . $e);
    }
    foreach ($node_types as $content_type => $info) {
      if ($content_type !== 'webform' && $content_type !== 'location') {
        $this->output()->writeln("\nContent Type => " . $content_type);
        $field_definitions = $this->entityFieldManager->getFieldDefinitions('node', $content_type);
        foreach ($field_definitions as $name => $definition) {
          if (!in_array($name, $unwantedFields) && !str_contains($name, 'field_template_selector')) {
            $this->entityDisplayRepository->getFormDisplay('node', $content_type, $form_mode)
              ->removeComponent($name)
              ->save();
          }
          $this->entityDisplayRepository->getFormDisplay('node', $content_type, $form_mode)
            ->removeComponent('simple_sitemap')
            ->removeComponent('translation')
            ->save();
        }
      }
    }
  }

  /**
   * Configuration Import on scale level.
   *
   * @command site_studio:package_import
   * @aliases sitestudio-pcim
   *
   * @usage site_studio:package_import
   */
  public function cimAtScale($path, $diff = FALSE) {
    if ($this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()
        ->writeln("\n=> Module cohesion_website_settings is enabled for this site.");
      // Identify path folder.
      $source_folder = $path;
      $command_args = ["--path=$path"];
      if ($diff) {
        $command_args[] = "--diff";
      }
      if (empty($path)) {
        $this->output()
          ->writeln("\n=> path is required parameter to import at scale.");
        return $this->logger()
          ->error(dt("Path is empty. Please provide a path of folder to import."));
      }
      if (!is_dir($path)) {
        // Source folder does not exist.
        return $this->logger()
          ->error(dt("Source folder $source_folder does not exist."));
      }

      $process = Drush::drush($this->siteAliasManager()
        ->getSelf(), "sitestudio:package:import", $command_args, []);
      try {
        $process->Run();
      }
      catch (\Exception $e) {
        print $e->getMessage();
      }
      if (!empty($process->getOutput()) && $process->isSuccessful()) {
        $this->output()->writeln($process->getOutput());
      }
      if (!empty($process->getErrorOutput()) && !$process->isSuccessful()) {
        $this->output()->writeln($process->getErrorOutput());
      }
      if (empty($process->getOutput()) && $process->isSuccessful()) {
        $this->output()->writeln("\n=> There are no changes to import.");
      }
      Drush::drush($this->siteAliasManager()->getSelf(), "cr")->Run();
    }
  }

  /**
   * Delete unused entities on a Drupal site.
   *
   * @param string $types
   *   Types of entities to be deleted. Must be a comma-separated string.
   * @param string $idsToKeep
   *   Entity ids needs to bypass. Must be a comma-separated string.
   *
   * @command unused-entity-delete
   * @aliases ued
   * @usage drush unused_entity_delete block_types,media_types,vocabulary,views,fields
   * id1,id2,id3
   */
  public function drushUnusuedEntityDelete(string $types, string $idsToKeep = ''): void {
    $types = explode(',', $types);
    $idsToKeep = explode(',', $idsToKeep);

    foreach ($types as $type) {
      switch ($type) {
        case 'block_types':
          $this->deleteUnusedBlockTypes($idsToKeep);
          break;

        case 'media_types':
          $this->deleteUnusedMediaTypes($idsToKeep);
          break;

        case 'vocabulary':
          $this->deleteUnusedVocabularies($idsToKeep);
          break;

        case 'views':
          $this->deleteUnusedViews($idsToKeep);
          break;

        case 'fields':
          $this->deleteUnusedFields($idsToKeep);
          break;

        case 'node_types':
          $this->deleteUnusedNodeTypes($idsToKeep);
          break;

        case 'field_types':
          $this->deleteUnusedFieldTypes($idsToKeep);
          break;

        case 'media':
          $this->deleteUnusedMediaEntities($idsToKeep);
          break;

        case 'files':
          $this->deleteUnusedFileEntities($idsToKeep);
          break;
      }
    }
  }

  /**
   * Delete unused block types.
   */
  public function deleteUnusedBlockTypes(array $idsToKeep): void {
    $blockTypes = $this->entityTypeManager
      ->getStorage('block_content_type')
      ->loadMultiple();

    foreach ($blockTypes as $blockType) {
      // Check if any blocks of this type exist.
      $blocks = $this->entityTypeManager
        ->getStorage('block_content')
        ->loadByProperties(['type' => $blockType->id()]);
      if (in_array($blockType->id(), $idsToKeep, TRUE)) {
        continue;
      }
      if (empty($blocks)) {
        // If no blocks of this block type exist, delete the block type.
        $this->logger()->warning('Deleting entity of type block_content_type and id ' . $blockType->id());
        $blockType->delete();
      }
    }
  }

  /**
   * Delete unused media types.
   */
  public function deleteUnusedMediaTypes(array $idsToKeep): void {
    $mediaTypes = $this->entityTypeManager
      ->getStorage('media_type')
      ->loadMultiple();

    foreach ($mediaTypes as $mediaType) {
      // Check if any media entities of this type exist.
      $media_entities = $this->entityTypeManager
        ->getStorage('media')
        ->loadByProperties(['bundle' => $mediaType->id()]);
      if (in_array($mediaType->id(), $idsToKeep, TRUE)) {
        continue;
      }
      if (empty($media_entities)) {
        // If no media entities of this media type exists, delete the mediatype.
        $this->logger()
          ->warning('Deleting entity of type media and id ' . $mediaType->id());
        $mediaType->delete();
      }
    }
  }

  /**
   * Delete unused vocabularies.
   */
  public function deleteUnusedVocabularies(array $idsToKeep): void {
    $vocabularies = $this->entityTypeManager
      ->getStorage('taxonomy_vocabulary')
      ->loadMultiple();

    foreach ($vocabularies as $vocabulary) {
      // Check if any taxonomy terms of this vocabulary exist.
      $terms = $this->entityTypeManager
        ->getStorage('taxonomy_term')
        ->loadByProperties(['vid' => $vocabulary->id()]);
      if (in_array($vocabulary->id(), $idsToKeep, TRUE)) {
        continue;
      }
      if (empty($terms)) {
        // If no terms of this vocabulary exist, delete the vocabulary.
        $this->logger()->warning('Deleting entity of type taxonomy_vocabulary and id ' . $vocabulary->id());
        $vocabulary->delete();
      }
    }
  }

  /**
   * Disable unused views.
   */
  public function deleteUnusedViews(array $idsToKeep): void {
    $views = $this->entityTypeManager->getStorage('view')->loadMultiple();

    foreach ($views as $view) {
      $displays = $view->get('display');

      $is_used = FALSE;
      foreach ($displays as $display) {
        // If the view has a 'page' display, then it's considered to be used.
        if ($display['display_plugin'] == 'page') {
          $is_used = TRUE;
          break;
        }
      }
      if (in_array($view->id(), $idsToKeep, TRUE)) {
        continue;
      }
      if (!$is_used) {
        // If the view doesn't have any 'page' displays, then it's considered
        // to be unused and is deleted. Be extremely careful with this, as the
        // view could be used in other ways (e.g. blocks, attachments).
        $this->logger()->warning('Disabling entity of type views and id ' . $view->id());
        // $view->delete();
        $view->setStatus(FALSE);
        $view->save();
      }
    }
  }

  /**
   * Delete unused fields.
   */
  public function deleteUnusedFields(array $idsToKeep): void {
    // Get all entity types.
    $entity_type_ids = $this->entityTypeManager->getDefinitions();
    foreach ($entity_type_ids as $entity_type_id => $entity_type) {
      if ($entity_type->entityClassImplements('\Drupal\Core\Entity\ContentEntityInterface')) {
        // It's content entity, now get bundles.
        $bundles = $this->bundleInfo->getBundleInfo($entity_type_id);
        foreach (array_keys($bundles) as $bundle) {
          $fields = $this->entityFieldManager->getFieldDefinitions($entity_type_id, $bundle);
          foreach ($fields as $field_name => $field_definition) {
            if (!($field_definition instanceof FieldConfig)) {
              // Ignore base fields.
              continue;
            }

            $field_storage_definition = $field_definition->getFieldStorageDefinition();
            // Commenting this due to ACQUIA's recommendation field
            // list is from this condition so lets delete them.
            /*if (!$field_storage_definition->isBaseField()
            && $field_storage_definition instanceof FieldStorageConfig) {
            // Ignore base fields and fields with custom storage.
            continue;
            }*/

            $field_table = $field_storage_definition->getTargetEntityTypeId() . '__' . $field_name;
            $result = $this->database->query("SELECT COUNT(*) FROM {{$field_table}}")->fetchField();
            if (!$result) {
              // The fields have no data. Deleting.
              $this->logger()->warning("Deleting field {$field_name} in bundle {$bundle} of entity type {$entity_type_id}");
              // Load Field instance config and delete.
              if (in_array($field_name, $idsToKeep, TRUE)) {
                continue;
              }
              $field_config = FieldConfig::loadByName($entity_type_id, $bundle, $field_name);
              if ($field_config) {
                $field_config->delete();
                $this->logger()->warning("Deleted field {$field_name}");
              }
              else {
                $this->logger()->warning("Cannot load field configuration for {$field_name}");
              }
            }
          }
        }
      }
    }
  }

  /**
   * DO NOT USE, WITHOUT BUSINESS APPROVAL. Delete unused node types.
   */
  public function deleteUnusedNodeTypes(array $idsToKeep): void {
    $nodeTypes = $this->entityTypeManager
      ->getStorage('node_type')
      ->loadMultiple();

    foreach ($nodeTypes as $nodeType) {
      // Check if any nodes of this type exist.
      $nodes = $this->entityTypeManager
        ->getStorage('node')
        ->loadByProperties(['type' => $nodeType->id()]);
      if (in_array($nodeType->id(), $idsToKeep, TRUE)) {
        continue;
      }
      if (empty($nodes)) {
        // If no nodes of this node type exist, delete the node type.
        $this->logger()->warning("Deleting node/content type id {$nodeType->id()}");
        $nodeType->delete();
      }
    }
  }

  /**
   * Delete unused field types.
   */
  public function deleteUnusedFieldTypes(array $idsToKeep): void {
    $field_storage_configs = $this->entityTypeManager->getStorage('field_storage_config')->loadMultiple();

    foreach ($field_storage_configs as $field_storage_config) {
      $entity_type = $field_storage_config->getTargetEntityTypeId();
      $field_name = $field_storage_config->getName();

      $bundles = $this->bundleInfo->getBundleInfo($entity_type);
      $is_field_in_use = FALSE;

      foreach ($bundles as $bundle) {
        $fields = $this->entityFieldManager->getFieldDefinitions($entity_type, key($bundle));
        if (isset($fields[$field_name])) {
          $map = $this->entityFieldManager->getFieldStorageDefinitions($entity_type)[$field_name]->getSchema();
          $table = $map['columns']['value']['table'];
          $column = $map['columns']['value']['column'];
          $query = "SELECT COUNT(*) AS count FROM {$table} WHERE bundle = :bundle AND {$column} IS NOT NULL";
          $result = $this->database->query($query, ['bundle' => $bundle])->fetch();

          if ($result->count > 0) {
            $is_field_in_use = TRUE;
            break;
          }
        }
      }
      if (in_array($field_name, $idsToKeep, TRUE)) {
        continue;
      }
      if (!$is_field_in_use) {
        $field_storage_config->delete();
        $this->logger()->warning("Deleted unused field storage {$field_name}");
      }
    }
  }

  /**
   * Delete unused media.
   */
  public function deleteUnusedMediaEntities(array $idsToKeep): void {
    $mediaTypes = $this->entityTypeManager
      ->getStorage('media_type')
      ->loadMultiple();

    foreach ($mediaTypes as $mediaType) {
      // Check if any media of this type exist.
      $media_items = $this->entityTypeManager
        ->getStorage('media')
        ->loadByProperties(['bundle' => $mediaType->id()]);
      if (in_array($mediaType->id(), $idsToKeep, TRUE)) {
        continue;
      }
      if (empty($media_items)) {
        // If no media items of this media type exist, delete the media type
        // Also if needed: Delete associated field storage and fields here.
        $mediaType->delete();
        $this->logger()->warning("Deleted unused media type: {$mediaType->id()}");
      }
    }
  }

  /**
   * Get usages of a file entity.
   *
   * @param \Drupal\file\FileInterface $file
   *   The file entity.
   *
   * @return array
   *   An associative array keyed by entity type and IDs with
   *   values being the usage count.
   */
  public function getFileUsages(FileInterface $file): array {
    return $this->fileUsage->listUsage($file);
  }

  /**
   * Delete unused files.
   */
  public function deleteUnusedFileEntities(array $idsToKeep): void {
    $files = $this->entityTypeManager
      ->getStorage('file')
      ->loadMultiple();

    foreach ($files as $file) {
      $usages = $this->getFileUsages($file);
      if (in_array($file->getFilename(), $idsToKeep, TRUE)) {
        continue;
      }
      if (empty($usages)) {
        // If no usages found for this file, delete the file entity.
        $file->delete();
        $this->logger()->warning("Deleted unused file {$file->getFilename()}");
      }
    }
  }

  /**
   * Function to get environment name and site host.
   *
   * @return mixed
   *   Return array of multiple values
   */
  private function getEnvNameSiteNameUrl() {
    // Check the current environment is exists in all environment list.
    $all_environment = ['dev', 'test', 'val', 'val2', 'prod'];
    $env = getenv('AH_SITE_ENVIRONMENT');
    $env_name = 'prod';
    // Takes the current host.
    $request = $this->requestStack->getCurrentRequest();
    $site_name = $request->getHost();
    foreach ($all_environment as $environment) {
      if (str_contains($env, $environment)) {
        $env_name = $environment;
      }
    }
    $url = 'https://sitestudioreference.alconacsf.acsitefactory.com';
    if (!empty($env_name) && $env_name != 'prod') {
      $url = 'https://sitestudioreference.' . $env_name . '-alconacsf.acsitefactory.com';
    }
    return [
      'env_name' => $env_name,
      'site_name' => $site_name,
      'source_url' => $url,
    ];
  }

  /**
   * Function to get environment name and site host.
   *
   * @return mixed
   *   Return array of multiple values
   */
  private function getSystane1mktEnvNameSiteNameUrl() {
    // Check the current environment is exists in all environment list.
    $all_environment = ['dev', 'test', 'val', 'val2', 'prod'];
    $env = getenv('AH_SITE_ENVIRONMENT');
    $env_name = 'prod';
    // Takes the current host.
    $request = $this->requestStack->getCurrentRequest();
    $site_name = $request->getHost();
    foreach ($all_environment as $environment) {
      if (str_contains($env, $environment)) {
        $env_name = $environment;
      }
    }
    $url = 'https://systane1mkt.alconacsf.acsitefactory.com';
    if (!empty($env_name) && $env_name != 'prod') {
      $url = 'https://systane1mkt.' . $env_name . '-alconacsf.acsitefactory.com';
    }
    return [
      'env_name' => $env_name,
      'site_name' => $site_name,
      'source_url' => $url,
    ];
  }

  /**
   * Delete target site roles.
   *
   * @command acsfsiterole:delete
   * @aliases acsfsiterole-delete
   *
   * @usage acsfsiterole:delete
   */
  public function roleDeleteOfSiteStudioSites() {
    if (!$this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()->writeln("\n=> Module cohesion_website_settings is not enable for this site. So skip the execution because this site is not a site studio site");
      return;
    }
    elseif ($this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()->writeln("\n=> Module cohesion_website_settings is enable for this site.");
    }
    $env_data = $this->getEnvNameSiteNameUrl();
    $roles_data = $this->getRolesListToDelete($env_data['source_url']);
    if (empty($roles_data['roles_before_delete'])) {
      $this->logger()->notice(dt("Something wrong to fetch roles from source site @source_url hence stoping this process for this site.", ["@source_url" => $env_data['source_url']]));
      return;
    }
    $site_name = $env_data['site_name'];
    $this->logger()->notice(dt("All roles of site before batch process start to delete roles on @site_name", ["@site_name" => $site_name]));
    foreach ($roles_data['roles_before_delete'] as $role) {
      print $role . PHP_EOL;
    }
    $this->logger()->notice(dt("Process start to delete roles on @site_name", ["@site_name" => $site_name]));
    // Get users list to block.
    if (empty($roles_data['roles_to_delete'])) {
      $this->logger()->notice("No role processed to delete.");
    }
    $operations =
    [
      [__CLASS__ . '::processRoleDelete',
        [
          [
            'roles' => $roles_data['roles_to_delete'],
            'alias_manager' => $this->siteAliasManager()->getSelf(),
            'target_site_roles' => $roles_data['roles_before_delete'],
          ],
        ],
      ],
    ];
    $batch_definition = [
      'title' => $this->t('Deleting @num roles(s)', ['@num' => count($roles_data['roles_to_delete'])]),
      'operations' => $operations,
      'finished' => [__CLASS__ . '::processAcsfUserFinished'],
    ];
    $batch = batch_get();
    $run_drush_batch = function_exists('drush_backend_batch_process')
      && empty($batch['running']);

    // Schedule the batch.
    batch_set($batch_definition);

    // Now run the Drush batch, if applicable.
    if ($run_drush_batch) {
      $result = drush_backend_batch_process();
      if (!empty($result['context']['drush_batch_process_finished'])
          || !empty($result['drush_batch_process_finished'])) {
        $batch = &batch_get();
        $batch = NULL;
        unset($batch);
      }
    }
    $this->logger()->notice(dt("Process finished to delete roles on @site_name", ['@site_name' => $site_name]));
  }

  /**
   * Function to get roles to delete.
   *
   * @param string $source_site_url
   *   Source site url.
   *
   * @return mixed
   *   Return array of roles name.
   */
  private function getRolesListToDelete($source_site_url) {
    $option_drush_command = [
      "--format=json",
    ];
    $source_roles = $this->processDrushCommand("role:list", $option_drush_command, ['uri' => $source_site_url]);
    $target_roles = $this->processDrushCommand("role:list", $option_drush_command, []);

    $source_site_roles = $target_site_roles = $all_target_roles_label = [];
    $removeFields = ['administrator', 'authenticated', 'anonymous'];
    if (!empty($source_roles)) {
      $source_roles = array_diff_key(Json::decode($source_roles), array_flip($removeFields));
      $source_site_roles = array_keys($source_roles);
    }
    if (!empty($target_roles) && !empty($source_site_roles)) {
      $all_target_roles_label = array_column(Json::decode($target_roles), 'label');
      $all_target_roles_label = array_combine(array_keys(Json::decode($target_roles)), $all_target_roles_label);
      $target_roles = array_diff_key(Json::decode($target_roles), array_flip($removeFields));
      $target_site_roles = array_keys($target_roles);
    }
    return [
      'roles_to_delete' => array_values(array_diff($target_site_roles, $source_site_roles)),
      'roles_before_delete' => $all_target_roles_label,
    ];
  }

  /**
   * Function to process drush command.
   *
   * @param string $command
   *   Max number.
   * @param array $option_drush_command
   *   Object of batch context.
   * @param array $arg_drush_command
   *   Object of batch context.
   *
   * @return mixed
   *   Return array of mixed values
   */
  private function processDrushCommand($command, array $option_drush_command, array $arg_drush_command) {
    $process = Drush::drush($this->siteAliasManager()->getSelf(), $command, $option_drush_command, $arg_drush_command);
    try {
      $process->Run();
    }
    catch (\Exception $e) {
      print $e->getMessage();
    }
    if (!empty($process->getOutput()) && $process->isSuccessful()) {
      return $process->getOutput();
    }
    return [];
  }

  /**
   * Batch process callback.
   *
   * @param array $roles
   *   Array of roles name.
   * @param object $context
   *   Context for operations.
   */
  public static function processRoleDelete(array $roles, &$context) {
    $number = count($roles['roles']);
    $context = self::initializeSandbox($number, $context);
    $max = self::batchLimit($context);
    // Start where we left off last time.
    $start = $context['sandbox']['progress'];
    for ($i = $start; $i < $max; $i++) {
      $process = Drush::drush($roles['alias_manager'], 'role:delete', [$roles['roles'][$i]], []);
      try {
        $process->Run();
      }
      catch (\Exception $e) {
        print $e->getMessage();
      }
      $context['message'] = t('Role with name --- @rolename --- have been deleted out of total @total roles.',
      [
        '@rolename' => $roles['target_site_roles'][$roles['roles'][$i]],
        '@total' => $number,
      ]);

      // Update our progress!
      $context['sandbox']['progress']++;
    }

    $context = self::contextProgress($context);
  }

  /**
   * Get all users list of site.
   *
   * @command getallusers:list
   * @aliases getallusers-list
   *
   * @usage getallusers:list
   *
   * @filter-default-field perms
   *
   * @return \Consolidation\OutputFormatters\StructuredData\RowsOfFields
   *   Return output in json format.
   */
  public function getUsersListOfSourceStudioSites() {
    try {
      $storage = $this->entityTypeManager->getStorage('user');
      $query = $storage->getQuery()
        ->condition('status', '1')
        ->accessCheck();
      $uids = $query->execute();
      $active_users = $storage->loadMultiple($uids);
    }
    catch (\Exception $e) {
      $this->output()->writeln($e);
      $this->loggerChannelFactory->get('non_existent_users_management')->error('Error found @e', ['@e' => $e]);
    }
    foreach ($active_users as $source_user) {
      $rows[$source_user->get('name')->value] = [
        'email' => $source_user->get('mail')->value,
        'name' => $source_user->get('name')->value,
        'roles' => $source_user->getRoles(),
      ];
    }
    return $rows;
  }

  /**
   * Get users for role assignation.
   *
   * @return mixed
   *   Return array of users.
   */
  private function getUsersRolesListToAssign($env_name) {
    $source_site_url = 'https://zzzusermanagement.alconacsf.acsitefactory.com';
    if (!empty($env_name) && $env_name != 'prod') {
      $source_site_url = 'https://zzzusermanagement.' . $env_name . '-alconacsf.acsitefactory.com';
    }
    $option_drush_command = [
      "--format=json",
    ];
    $source_all_users = $this->processDrushCommand("getallusers:list", $option_drush_command, ['uri' => $source_site_url]);
    $target_site_users = $this->getAllActiveUsersOfCurrentSite();
    $source_site_users = $target_users_with_roles = [];
    if (!empty($source_all_users)) {
      $source_site_users = Json::decode($source_all_users);
    }
    if ($target_site_users && $source_site_users) {
      foreach ($target_site_users as $target_user) {
        if (!empty($source_site_users) && isset($source_site_users[$target_user->get('name')->value])) {
          $source_user_roles = $source_site_users[$target_user->get('name')->value]['roles'];
          $target_user_roles = $target_user->getRoles();
          sort($source_user_roles);
          sort($target_user_roles);
          if ($source_user_roles != $target_user_roles && !empty($source_user_roles)) {
            $target_users_with_roles[] = [
              'user' => $target_user,
              'roles' => $source_user_roles,
            ];
          }
        }
      }
    }
    return [
      'roles_to_assign' => $target_users_with_roles,
      'roles_before_assign' => $target_site_users,
      'source_site_users' => $source_site_users,
    ];
  }

  /**
   * Assign target site users roles.
   *
   * @command acsfsiterole:assign
   * @aliases acsfsiterole-assign
   *
   * @usage acsfsiterole:assign
   */
  public function roleAssignOfSiteStudioSites() {
    if (!$this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()->writeln("\n=> Module cohesion_website_settings is not enable for this site. So skip the execution because this site is not a site studio site");
      return;
    }
    elseif ($this->moduleHandler->moduleExists('cohesion_website_settings')) {
      $this->output()->writeln("\n=> Module cohesion_website_settings is enable for this site.");
    }
    $env_data = $this->getEnvNameSiteNameUrl();
    $users_data = $this->getUsersRolesListToAssign($env_data['env_name']);
    if (empty($users_data['source_site_users'])) {
      $this->logger()->notice(dt("Something wrong to fetch users list from source site hence skipping role assignation process for this site.",));
      return;
    }
    $site_name = $env_data['site_name'];
    $exclude_sites = $this->getExcludeSitesList($env_data['env_name']);
    if (!empty($exclude_sites)) {
      if (in_array($site_name, $exclude_sites)) {
        $this->logger()->notice('This site is an excluded site from block users job process.');
        return;
      }
    }
    $this->logger()->notice(dt("All users of site having current roles before batch process start to assign new roles on @site_name", ["@site_name" => $site_name]));
    foreach ($users_data['roles_before_assign'] as $targetuser) {
      print $targetuser->get('name')->value . ' ------------ (' . implode(',', $targetuser->getRoles()) . ')' . PHP_EOL;
    }
    $this->logger()->notice(dt("Process start to assign roles on @site_name", ["@site_name" => $site_name]));
    // Get users list to block.
    if (empty($users_data['roles_to_assign'])) {
      $this->logger()->notice("All users on target site have identical roles to source site.");
    }
    $operations =
    [
      [__CLASS__ . '::processRoleAssign',
        [
          $users_data['roles_to_assign'],
        ],
      ],
    ];
    $batch_definition = [
      'title' => $this->t('Assigning @num roles(s)', ['@num' => count($users_data['roles_to_assign'])]),
      'operations' => $operations,
      'finished' => [__CLASS__ . '::processAcsfUserFinished'],
    ];
    $batch = batch_get();
    $run_drush_batch = function_exists('drush_backend_batch_process')
      && empty($batch['running']);

    // Schedule the batch.
    batch_set($batch_definition);

    // Now run the Drush batch, if applicable.
    if ($run_drush_batch) {
      $result = drush_backend_batch_process();
      if (!empty($result['context']['drush_batch_process_finished'])
          || !empty($result['drush_batch_process_finished'])) {
        $batch = &batch_get();
        $batch = NULL;
        unset($batch);
      }
    }
    $this->logger()->notice(dt("Process finished to assign roles on @site_name", ['@site_name' => $site_name]));
  }

  /**
   * Batch process callback.
   *
   * @param array $users
   *   Array of user and source roles.
   * @param object $context
   *   Context for operations.
   */
  public static function processRoleAssign(array $users, &$context) {
    $number = count($users);
    $context = self::initializeSandbox($number, $context);
    $max = self::batchLimit($context);
    // Start where we left off last time.
    $start = $context['sandbox']['progress'];
    for ($i = $start; $i < $max; $i++) {
      $target_roles = $users[$i]['user']->getRoles();
      foreach ($target_roles as $target_role) {
        if ($target_role != 'authenticated') {
          $users[$i]['user']->removeRole($target_role);
        }
      }
      $users[$i]['user']->save();
      foreach ($users[$i]['roles'] as $source_role) {
        if ($source_role != 'authenticated') {
          $users[$i]['user']->addRole($source_role);
        }
      }
      $users[$i]['user']->save();
      $context['message'] = t('@username -------now have (@roles).',
      [
        '@username' => $users[$i]['user']->get('name')->value,
        '@roles' => implode(',', $users[$i]['roles']),
      ]);

      // Update our progress!
      $context['sandbox']['progress']++;
    }

    $context = self::contextProgress($context);
  }

  /**
   * Get all active users of site.
   *
   * @return mixed
   *   Return array of users.
   */
  public function getAllActiveUsersOfCurrentSite() {
    try {
      $storage = $this->entityTypeManager->getStorage('user');
      $query = $storage->getQuery()
        ->condition('status', '1')
        ->accessCheck();
      $uids = $query->execute();
      $active_users = $storage->loadMultiple($uids);
    }
    catch (\Exception $e) {
      $this->output()->writeln($e);
      $this->loggerChannelFactory->get('non_existent_users_management')->error('Error found @e', ['@e' => $e]);
    }
    return $active_users;
  }

  /**
   * Implement seckit on all sites.
   *
   * @command acsfseckit:cim
   * @aliases acsfseckit-cim
   *
   * @usage acsfseckit:cim
   */
  public function cimForSeckitOnSites() {
    if (!$this->moduleHandler->moduleExists('seckit')) {
      $this->moduleInstaller->install(['seckit']);
      $this->output()->writeln("\n=> Module Security Kit has been enable for this site.");
    }
    $option_drush_command = [
      "--partial", "--source=../config/seckit_settings", "--yes",
    ];
    $process = Drush::drush($this->siteAliasManager()->getSelf(), "cim", $option_drush_command, []);
    try {
      $process->Run();
    }
    catch (\Exception $e) {
      print $e->getMessage();
    }
    if (!empty($process->getOutput()) && $process->isSuccessful()) {
      $this->output()->writeln($process->getOutput());
    }
    if (!empty($process->getErrorOutput()) && !$process->isSuccessful()) {
      $this->output()->writeln($process->getErrorOutput());
    }
    if (empty($process->getOutput()) && $process->isSuccessful()) {
      $this->output()->writeln("\n=> There are no changes to import.");
    }
    Drush::drush($this->siteAliasManager()->getSelf(), "cr")->Run();
  }

  /**
   * Fixed users roles issue on affected sites.
   *
   * @command acsfusersrole:fix
   * @aliases acsfusersrole-fix
   *
   * @usage acsfusersrole:fix
   */
  public function fixWebsiteUserRolesIssue() {
    $enabled_languages = $this->languageManager->getNativeLanguages();
    $available_language_codes = [];

    foreach ($enabled_languages as $language) {
      $is_disabled = $language->getThirdPartySetting('disable_language', 'disable', 0);
      if (!$is_disabled) {
        $available_language_codes[] = $language->getId();
      }
    }
    $default_language = $this->languageManager->getDefaultLanguage()->getId();

    if (!empty($available_language_codes)) {
      $storage = $this->entityTypeManager->getStorage('user');
      $query = $storage->getQuery()
        ->condition('status', '1')
        ->accessCheck();
      $uids = $query->execute();
      $active_users = $storage->loadMultiple($uids);

      foreach ($active_users as $active_user) {
        $user_langcode = $active_user->get('langcode')->value;
        $user_preferred_langcode = $active_user->get('preferred_langcode')->value;

        // Check both langcode and preferred_langcode.
        if (!in_array($user_langcode, $available_language_codes) ||
            !in_array($user_preferred_langcode, $available_language_codes)) {
          $before_message = $active_user->get('name')->value . '----langcode before execute process is : ' . $user_langcode . ' and preferred_langcode is : ' . $user_preferred_langcode . ' --- setting to default language : ' . $default_language;
          $this->output()->writeln("\n=>" . $before_message);

          // Update langcode and preferred_langcode for the user entity.
          $active_user->set('langcode', $default_language);
          $active_user->set('preferred_langcode', $default_language);
          $active_user->save();

          // Ensure language change propagates to related tables.
          $this->entityTypeManager->getStorage('user')->resetCache([$active_user->id()]);

          $after_message = $active_user->get('name')->value . '----langcode after execute process is : ' . $active_user->get('langcode')->value . ' and preferred_langcode is : ' . $active_user->get('preferred_langcode')->value . ' --- site default language is : ' . $default_language;
          $this->output()->writeln("\n=>" . $after_message);
        }
      }

      $this->processDrushCommand("acsfsiterole:assign", [], []);
    }
  }

  /**
   * List users with invalid language codes.
   *
   * @command acsfusersrole:list-invalid-langcodes
   * @aliases acsfusersrole-list-invalid-langcodes
   *
   * @usage acsfusersrole:list-invalid-langcodes
   */
  public function listInvalidLangcodes() {
    $enabled_languages = $this->languageManager->getNativeLanguages();
    $available_language_codes = [];

    foreach ($enabled_languages as $language) {
      $is_disabled = $language->getThirdPartySetting('disable_language', 'disable', 0);
      if (!$is_disabled) {
        $available_language_codes[] = $language->getId();
      }
    }

    if (!empty($available_language_codes)) {
      $storage = $this->entityTypeManager->getStorage('user');
      $query = $storage->getQuery()
        ->condition('status', '1')
        ->accessCheck();
      $uids = $query->execute();
      $active_users = $storage->loadMultiple($uids);

      foreach ($active_users as $active_user) {
        $user_langcode = $active_user->get('langcode')->value;
        $user_preferred_langcode = $active_user->get('preferred_langcode')->value;

        // Check both langcode and preferred_langcode.
        if (!in_array($user_langcode, $available_language_codes) ||
            !in_array($user_preferred_langcode, $available_language_codes)) {
          $message = $active_user->get('name')->value . ' ---- langcode: ' . $user_langcode . ' ---- preferred_langcode: ' . $user_preferred_langcode;
          $this->output()->writeln("\n=>" . $message);
        }
      }
    }
  }

  /**
   * NewRelic Role configuration.
   *
   * @command newrelic:roles:ignore
   * @aliases newrelic-roles-ignore
   *
   * @usage newrelic:roles:ignore
   */
  public function newRelicRolesIgnore() {
    try {
      if ($this->moduleHandler->moduleExists('new_relic_rpm')) {
        $roles = $this->entityTypeManager->getStorage('user_role')->loadMultiple();
        $restrcitedRoles = [];
        foreach ($roles as $key => $role) {
          if ($key !== 'anonymous') {
            $restrcitedRoles[$key] = $key;
          }
        }

        $config = $this->configFactory->getEditable('new_relic_rpm.settings');
        $config->set('ignore_roles', $restrcitedRoles);
        $config->save(TRUE);
        $this->logger()->notice("New Relic configuration updated for Roles:" . json_encode($restrcitedRoles));
      }
    }
    catch (\Exception $e) {
      // Log the error.
      $this->logger()->error("Error - updating New Relic configuration: " . $e->getMessage());
    }
  }

}
