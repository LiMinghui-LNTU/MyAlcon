<?php

namespace Drupal\views_extras\Plugin\views\area;

use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\area\AreaPluginBase;
use Drupal\views\Plugin\views\style\DefaultSummary;

/**
 * Views area handler to display some configurable result summary.
 *
 * @ingroup views_area_handlers
 *
 * @ViewsArea("extra_result")
 */
class ExtraResult extends AreaPluginBase {

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['content'] = [
      'default' => $this->t('Displaying @start - @end of @total'),
    ];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $item_list = [
      '#theme' => 'item_list',
      '#items' => [
        '@start -- the initial record number in the set',
        '@end -- the last record number in the set',
        '@total -- the total records in the set',
        '@label -- the human-readable name of the view',
        '@per_page -- the number of items per page',
        '@current_page -- the current page number',
        '@current_record_count -- the current page record count',
        '@page_count -- the total page count',
        '@more -- @total - @current_record_count',
      ],
    ];
    $list = \Drupal::service('renderer')->render($item_list);
    $form['content'] = [
      '#title' => $this->t('Display'),
      '#type' => 'textarea',
      '#rows' => 3,
      '#default_value' => $this->options['content'],
      '#description' => $this->t('You may use HTML code in this field. The following tokens are supported:') . $list,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    if (strpos($this->options['content'], '@total') || strpos($this->options['content'], '@more')) {
      $this->view->get_total_rows = TRUE;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function render($empty = FALSE) {
    // Must have options and does not work on summaries.
    if (!isset($this->options['content']) || $this->view->style_plugin instanceof DefaultSummary) {
      return [];
    }
    $output = '';
    $format = $this->options['content'];
    // Calculate the page totals.
    $current_page = (int) $this->view->getCurrentPage() + 1;
    $per_page = (int) $this->view->getItemsPerPage();
    // @todo Maybe use a possible is views empty functionality.
    // Not every view has total_rows set, use view->result instead.
    $total = $this->view->total_rows ?? count($this->view->result);
    $label = Html::escape($this->view->storage->label());
    if ($per_page === 0) {
      $page_count = 1;
      $start = 1;
      $end = $total;
    }
    else {
      $page_count = (int) ceil($total / $per_page);
      $total_count = $current_page * $per_page;
      if ($total_count > $total) {
        $total_count = $total;
      }
      $start = ($current_page - 1) * $per_page + 1;
      $end = $total_count;
    }
    $current_record_count = ($end - $start) + 1;
    // Get the search information.
    $replacements = [];
    $replacements['@start'] = $start;
    $replacements['@end'] = $end;
    $replacements['@total'] = $total;
    $replacements['@label'] = $label;
    $replacements['@per_page'] = $per_page;
    $replacements['@current_page'] = $current_page;
    $replacements['@current_record_count'] = $current_record_count;
    $replacements['@page_count'] = $page_count;
    $replacements['@more'] = $total - $current_record_count;
    // Send the output.
    if (!empty($total)) {
      $format_list = explode(PHP_EOL, $format);
      foreach ($format_list as $value) {
        if (strpos($value, '@more')) {
          // Condition to hide more count when its 0.
          if ($replacements['@more'] > 0) {
            $output .= Xss::filterAdmin(str_replace(array_keys($replacements), array_values($replacements), $value));
          }
        }
        else {
          $output .= Xss::filterAdmin(str_replace(array_keys($replacements), array_values($replacements), $value));
        }
      }
    }
    // Return as render array.
    return [
      '#markup' => $output,
    ];
  }

}
