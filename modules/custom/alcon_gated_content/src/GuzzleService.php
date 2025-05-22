<?php

namespace Drupal\alcon_gated_content;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use GuzzleHttp\Client;

/**
 * Class GuzzleService for guzzle API and responses.
 */
class GuzzleService {

  /**
   * Logger Factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * GuzzleService constructor.
   */
  public function __construct(LoggerChannelFactoryInterface $loggerFactory) {
    $this->loggerFactory = $loggerFactory->get('alcon_gated_content_log');
  }

  /**
   * Calls Guzzle POST API.
   *
   * @return array
   *   The renderable array for the response.
   */
  public function post($baseurl, array $headers = NULL, $body_params = NULL) {
    $error['error'] = $body_params;
    $this->loggerFactory->notice('<pre><code>' . print_r($error, TRUE) . '</code></pre>');
    try {
      $client = new Client();
      $response = $client->request('POST', $baseurl, [
        'headers' => $headers,
        'json' => $body_params,
      ]);
      if ($response->getStatusCode() == 200) {
        $error['error'] = $response->getStatusCode();
        $error['timestamp'] = $response->getBody();
        $this->loggerFactory->notice('<pre><code>' . print_r($error, TRUE) . '</code></pre>');
        return json_decode($response->getBody());
      }
      else {
        return FALSE;
      }
    }
    catch (\Throwable $e) {
      $error['error'] = $e->getMessage();
      $error['timestamp'] = date('Y-m-d H:i:s');
      $this->loggerFactory->notice('<pre><code>' . print_r($error, TRUE) . '</code></pre>');
      return FALSE;
    }
  }

}
