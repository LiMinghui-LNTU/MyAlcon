<?php

namespace Drupal\alcon_geo_redirect\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provide settings page for adding Geo redirect JS before the end of body tag.
 */
class HeaderForm extends ConfigFormBase {

  /**
   * Implements FormBuilder::getFormId.
   */
  public function getFormId() {
    return 'geo_redirect_script_settings';
  }

  /**
   * Implements ConfigFormBase::getEditableConfigNames.
   */
  protected function getEditableConfigNames() {
    return ['alcon_geo_redirect.script.settings'];
  }

  /**
   * Implements FormBuilder::buildForm.
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $header_section = $this->config('alcon_geo_redirect.script.settings')->get();

    $form['geo_redirect_script'] = [
      '#type'        => 'fieldset',
      '#title'       => $this->t('Add Geo Redirect Script'),
      '#description' => $this->t('Added Geo Redirect script in this section would be added on every page.'),
    ];

    $form['geo_redirect_script']['scripts_checkbox'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable'),
      '#default_value' => $header_section['scripts_checkbox'] ?? '',
    ];

    $form['geo_redirect_script']['scripts'] = [
      '#type'          => 'textarea',
      '#title'         => $this->t('Geo Redirect Script'),
      '#default_value' => $header_section['scripts'] ?? '',
      '#description'   => $this->t('<p>You can add Geo Redirect Script here.</p>'),
      '#rows'          => 10,
      '#states' => [
        'visible' => [
          ':input[name="scripts_checkbox"]' => [
            'checked' => TRUE,
          ],
        ],
      ],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * Implements FormBuilder::submitForm().
   *
   * Serialize the user's settings and save it to the Drupal's config Table.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->configFactory()
      ->getEditable('alcon_geo_redirect.script.settings')
      ->set('scripts_checkbox', $values['scripts_checkbox'])
      ->set('scripts', $values['scripts'])
      ->save();

    $this->messenger()->addStatus($this->t('Your Settings have been saved.'));
  }

}
