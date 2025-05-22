<?php

namespace Drupal\lightning_scheduler;

use Drupal\Component\Datetime\Time as BaseTime;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Decorates the time service to facilitate testing.
 */
class Time extends BaseTime {

  /**
   * The key value store to use.
   *
   * @var \Drupal\Core\KeyValueStore\KeyValueStoreInterface
   */
  protected $keyValueStore;

  /**
   * Time constructor.
   *
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   * @param \Drupal\Core\KeyValueStore\KeyValueFactoryInterface $key_value_factory
   *   The key value store to use.
   */
  public function __construct(RequestStack $request_stack, KeyValueFactoryInterface $key_value_factory) {
    parent::__construct($request_stack);
    $this->keyValueStore = $key_value_factory->get('state');
  }

  /**
   * {@inheritdoc}
   */
  public function getRequestTime() {
    return $this->get('lightning_scheduler.request_time', parent::getRequestTime());
  }

  /**
   * Retrieves a single value from the key-value store.
   *
   * @param string $key
   *   The key of the value to retrieve.
   * @param mixed $default
   *   The default value to return if the key does not exist.
   *
   * @return mixed
   *   The stored value, or the default if not set.
   */
  public function get($key, $default = NULL) {
    $values = $this->getMultiple([$key]);
    return isset($values[$key]) ? $values[$key] : $default;
  }

  /**
   * Retrieves multiple values from the key-value store.
   *
   * @param array $keys
   *   An array of keys to retrieve.
   *
   * @return array
   *   An associative array of key-value pairs.
   */
  public function getMultiple(array $keys) {
    $values = [];
    $loaded_values = $this->keyValueStore->getMultiple($keys);

    foreach ($keys as $key) {
      if (isset($loaded_values[$key]) || array_key_exists($key, $loaded_values)) {
        $values[$key] = $loaded_values[$key];
      }
    }

    return $values;
  }
}