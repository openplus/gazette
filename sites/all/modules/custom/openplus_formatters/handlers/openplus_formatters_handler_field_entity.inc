<?php

/**
 * @file
 * Contains the openplus_formatters_handler_field_entity class.
 */

/**
 * Field handler to provide simple renderer
 *
 * Overrides the default Views handler to
 *
 * @ingroup views_field_handlers
 */
class openplus_formatters_handler_field_entity extends entity_views_handler_field_entity {

  function option_definition() {
    $options = parent::option_definition();

    return $options;
  }

  /**
   * Provide a options form for this handler.
   */
  public function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['display']['#options'] = array_merge($form['display']['#options'], array('css' => 'Output in CSS format'));
  }

  /**
   * Render the field.
   *
   * @param $values
   *   The values retrieved from the database.
   */
  public function render($values) {
    $value = $this->get_value($values);
    $display = $this->options['display'];
    if ($display == 'css') {
      if (!empty($value)) {
        $term = taxonomy_term_load($value);
        module_load_include('inc', 'pathauto', 'pathauto');
        return 'theme-' . pathauto_cleanstring($term->name_field['en'][0]['value']);
      }
    }
    return EntityFieldHandlerHelper::render($this, $values);
  }
}
