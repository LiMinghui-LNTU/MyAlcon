<?php

namespace Drupal\alcon_gated_content\Controller;

use Drupal\alcon_gated_content\GuzzleService;
use Drupal\Component\Datetime\TimeInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\path_alias\AliasManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Controller class to manage the Tealium event triggering.
 */
class TealiumController extends ControllerBase {

  /**
   * The alias manager.
   *
   * @var \Drupal\path_alias\AliasManagerInterface
   */
  protected $aliasManager;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Request Stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Drupal\Core\Logger\LoggerChannelFactoryInterface definition.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * GuzzleService injected service.
   *
   * @var \Drupal\alcon_gated_content\GuzzleService
   */
  protected $guzzleService;

  /**
   * The datetime.time service.
   *
   * @var \Drupal\Component\Datetime\TimeInterface
   */
  protected $timeService;

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * {@inheritdoc}
   */
  public function __construct(
    AliasManagerInterface $aliasManager,
    EntityTypeManagerInterface $entity_type_manager,
    RequestStack $requestStack,
    LoggerChannelFactoryInterface $logger_factory,
    GuzzleService $guzzleService,
    TimeInterface $time_service,
    DateFormatterInterface $date_formatter) {
    $this->aliasManager = $aliasManager;
    $this->entityTypeManager = $entity_type_manager;
    $this->requestStack = $requestStack;
    $this->loggerFactory = $logger_factory->get('alcon_gated_content_revisit');
    $this->guzzleService = $guzzleService;
    $this->timeService = $time_service;
    $this->dateFormatter = $date_formatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('path_alias.manager'),
      $container->get('entity_type.manager'),
      $container->get('request_stack'),
      $container->get('logger.factory'),
      $container->get('alcon_gated_content.guzzle_service'),
      $container->get('datetime.time'),
      $container->get('date.formatter'),
    );
  }

  /**
   * Function to send tealium after revisit.
   */
  public function sendTealiumEvent(Request $request) {
    $tealium_status = 'not_sent';
    $json_string = $request->getContent();
    $data = Json::decode($json_string);
    $current_url = $data['current_url'];
    $current_alias = $data['current_alias'];

    $path = $this->aliasManager->getPathByAlias($current_alias);
    if (preg_match('/node\/(\d+)/', $path, $matches)) {
      $node = $this->entityTypeManager->getStorage('node')->load($matches[1]);
    }

    if (isset($node->field_enable_gated_content)) {
      if ($node->get('field_gated_content_form')->target_id == !NULL) {
        $gated_content_form_term = $node->get('field_gated_content_form')->target_id;
        $gated_content_form_term_id = $this->entityTypeManager->getStorage('taxonomy_term')->load($gated_content_form_term);
        $cookie_prefix = $gated_content_form_term_id->get('field_cookie_prefix')->value;
        $gated_content_form_name = $gated_content_form_term_id->getName();

        if (NULL != $this->requestStack->getCurrentRequest()->cookies->get($cookie_prefix . '_gated_content')) {
          // Check whether form submitted just before.
          $form_submitted_before = FALSE;
          if (NULL != $this->requestStack->getCurrentRequest()->cookies->get($cookie_prefix . 'gated_form_submit')) {
            if ($this->requestStack->getCurrentRequest()->cookies->get($cookie_prefix . 'gated_form_submit') != '') {
              $form_submitted_before = TRUE;
            }
          }

          // Sending data to tealium.
          if ($form_submitted_before == FALSE) {
            $sfdc_campaign = '';
            $sfdc_campaign_id = '';
            if ($node->get('field_sfcd_campaign_id')->target_id == !NULL) {
              $node_id = $node->get('field_sfcd_campaign_id')->target_id;
              $campaign_term_id = $this->entityTypeManager->getStorage('taxonomy_term')->load($node_id);
              if (!empty($campaign_term_id)) {
                $sfdc_campaign = $campaign_term_id->getName();
                $sfdc_campaign_id = $campaign_term_id->get('field_sfdc_campaign_id')->value;
              }
            }

            $tealiumVisitorId = '';
            if (NULL != $this->requestStack->getCurrentRequest()->cookies->get('utag_main')) {
              if ($this->requestStack->getCurrentRequest()->cookies->get('utag_main') != '') {
                $utagMain = $this->requestStack->getCurrentRequest()->cookies->get('utag_main');
                $utagMainArray = explode(":", $utagMain);
                $v_id = explode("$", $utagMainArray[1]);
                $tealiumVisitorId = $v_id[0];
              }
            }

            $current_time = $this->timeService->getCurrentTime('d');
            $create_date = $this->dateFormatter->format($current_time, 'custom', 'd/m/Y H:i:s');
            $cookie_value = $this->requestStack->getCurrentRequest()->cookies->get($cookie_prefix . '_gated_content');
            $cookie_value_unserialized = unserialize($cookie_value, ['allowed_classes' => FALSE]);
            $customer_email = $cookie_value_unserialized['email'];
            $cookie_value_unserialized['create_date'] = $create_date;
            $cookie_id = serialize($cookie_value_unserialized);

            $baseurl = 'https://collect.tealiumiq.com/event';
            $headers = [
              'Content-Type' => 'application/json',
            ];
            $tealium_data = [
              "tealium_account" => "alcon",
              "tealium_profile" => "main",
              "tealium_datasource" => "2e7o4d",
              "tealium_event" => "gated_content_user_signup",
              "tealium_visitor_id" => $tealiumVisitorId,
              "customer_email" => $customer_email ?: '',
              "source_url" => $current_url ?: '',
              "gated_content_form" => $gated_content_form_name ?: '',
              "salesforce_campaign" => $sfdc_campaign ?: '',
              "salesforce_campign_id" => $sfdc_campaign_id ?: '',
              "created_date" => date('Y-m-d H:i:s'),
              "gated_content_cookie_id" => $cookie_id ?: '',
            ];

            $this->loggerFactory->notice('<pre><code>' . print_r($tealium_data, TRUE) . '</code></pre>');
            $this->guzzleService->post($baseurl, $headers, $tealium_data);
            $tealium_status = 'sent';
          }
          else {
            // Unset the form submit cookie.
            setcookie('gated_form_submit', "", time() - 3600);
          }

        }
      }
    }
    $response = new JsonResponse();
    $data = [
      'current_url' => $current_url,
      'tealium_status' => $tealium_status,
    ];
    $response->setData($data);
    return $response;

  }

}
