<?php

namespace Drupal\alcon_sitestudio_components\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration Form.
 */
class AlconSitestudioComponentsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'admin_config_alcon_sitestudio_components_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'alcon_sitestudio_components.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('alcon_sitestudio_components.settings');

    $form['alcon_sitestudio_components_help'] = [
      '#type'         => 'details',
      '#title'        => $this->t('Alcon Site Studio Description'),
      '#description'  => $this->t('This module is used to manage JavaScript and CSS 
                                  modification that cannot be controlled directly 
                                  by Site Studio or within a Component. 
                                  All component related javascript should be associated 
                                  to this module and the component activated in the 
                                  “Site Studio Component” section below.'),
      '#weight'       => 10,
      '#open'         => TRUE,
    ];

    $form['alcon_sitestudio_components_generic'] = [
      '#type'         => 'details',
      '#title'        => $this->t('Site Studio generic issues'),
      '#description'  => $this->t('This block is use to inject the JavaSscript\CSS 
                                  associated to the "alcon_sitestudio_allpages" 
                                  library on all published nodes.<br />
                                  This code was initially developed to support
                                  Jira Ticket DMB-4450'),
      '#weight'       => 10,
      '#open'         => TRUE,
    ];

    $form['alcon_sitestudio_components_generic']['enable_allpages'] = [
      '#type'         => 'checkbox',
      '#title'        => $this->t('All pages library block'),
      '#default_value' => $config->get('enable_allpages'),
      '#description'  => $this->t('This block is use to inject the code associate to library "alcon_sitestudio_allpages" 
      that includes two files one javascript: alcon_sitestudio_allpages.js and other css: alcon_sitestudio_allpages.css'),
    ];

    $form['alcon_sitestudio_components_libraries'] = [
      '#type'         => 'details',
      '#title'        => $this->t('Site Studio Components'),
      '#description'  => $this->t('The following components contain Javascript 
                                  and in order of them to function correctly the 
                                  checkbox must be checked.'),
      '#weight'       => 10,
      '#open'         => TRUE,
    ];

    $form['alcon_sitestudio_components_libraries']['enable_iframe'] = [
      '#type'         => 'checkbox',
      '#title'        => $this->t('Iframe library block'),
      '#default_value' => $config->get('enable_iframe'),
      '#description'  => $this->t('This block is use to inject the code associate to library "alcon_sitestudio_iframe" 
      that include one javascript file: alcon_sitestudio_iframe.js'),
    ];

    $form['alcon_sitestudio_components_libraries']['enable_timeline'] = [
      '#type'         => 'checkbox',
      '#title'        => $this->t('Timeline library block'),
      '#default_value' => $config->get('enable_timeline'),
      '#description'  => $this->t('This block is use to inject the code associate to library "alcon_sitestudio_timeline" 
      that include one javascript, css and slick slider external'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('alcon_sitestudio_components.settings')
      ->set('enable_allpages', $form_state->getValue('enable_allpages'))
      ->set('enable_iframe', $form_state->getValue('enable_iframe'))
      ->set('enable_timeline', $form_state->getValue('enable_timeline'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
