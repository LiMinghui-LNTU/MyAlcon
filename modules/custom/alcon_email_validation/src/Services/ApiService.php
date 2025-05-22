<?php

namespace Drupal\alcon_email_validation\Services;

use Drupal\Core\Config\ConfigFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Custom HTTP Client Class.
 *
 * Changing the properties of the HTTP Client, like base_uri, can be done
 * by using the ClientFactory class and creating our own HTTP Client.
 */
class ApiService {

  /**
   * Config factory service for getting data from configs.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  private ConfigFactory $config;

  /**
   * Constructor responsible for returning a valid token.
   *
   * @param \Drupal\Core\Config\ConfigFactory $config
   *   Config factory variable.
   *
   * @return void
   */
  public function __construct(ConfigFactory $config) {
    $this->config = $config;
  }

  /**
   * Return a configured Client object.
   */
  public function get() {
    // Basic Auth Authentication.
    $config = [
      'base_uri' => 'https://api.everest.validity.com',
    ];
    $client = new Client($config);
    return $client;
  }

  /**
   * Send a request to the specified URL.
   *
   * @param string $email
   *   The HTTP method (GET or POST).
   */
  public function sendRequest($email) {
    $client = $this->get();
    $email_field_config = $this->config->getEditable('alcon_email_validation.settings');
    $api_key = $email_field_config->get('api_key');
    $url = '/api/2.0/validation/address/' . $email;
    $options = [
      'headers' => [
        'X-API-KEY' => $api_key,
      ],
    ];
    try {
      $response = $client->request('GET', $url, $options);
      // Handle the response as needed (e.g., extract data, process it).
      return $response;
    }
    catch (RequestException $e) {
      // Handle exceptions (e.g., connection errors, timeouts).
      // Log or display an error messages.
    }
  }

}
