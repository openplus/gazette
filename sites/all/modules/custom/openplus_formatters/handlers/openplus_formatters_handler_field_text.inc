<?php

/**
 * @file
 * Contains the entity_views_handler_field_text class.
 */

class openplus_formatters_handler_field_text extends entity_views_handler_field_text {

  function option_definition() {
    $options = parent::option_definition();
    $options['css_format'] = array('default' => FALSE, 'bool' => TRUE);

    return $options;
  }

  /**
   * Provide a options form for this handler.
   */
  public function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['css_format'] = array(
      '#type' => 'checkbox',
      '#title' => t('Apply CSS formatting'),
      '#default_value' => $this->options['css_format'],
    );
  }

  /**
   * Render the field.
   *
   * @param $values
   *   The values retrieved from the database.
   */
  public function render($values) {
    if ($this->options['css_format']) {
      module_load_include('inc', 'pathauto', 'pathauto');
      foreach ($values as $key => $value) {
        $value[$key] = 'theme-' . pathauto_cleanstring($value);
      }
    }
    return parent::render($this, $values);
  }

}
