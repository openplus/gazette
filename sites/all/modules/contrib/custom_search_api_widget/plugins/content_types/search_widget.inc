<?php

/**
 * @file search_widget.inc
 * Content-type plugin to provide a custom search box.
 */

/**
 * $plugin array which will be used by the system that includes this file.
 */

// @TODO make defaults work on new content pane
$plugin = array(
  'single' => TRUE,
  'title' => t('Custom search widget'),
  'description' => t('A widget that provides a custom search widget for panels.'),
  'category' => t('Widgets'),
  'all contexts' => TRUE,
  'defaults' => array(
    'search_box' => array(
      'widget_label' => '',
      'widget_text' => '',
      'widget_prepopulate' => 0,
      'widget_hint' => '',
      'widget_size' => 15,
      'widget_maxlength' => 128,
      'submit_text' => t('Search'),
    ),
    'paths' => array(
      'search_paths' => 'search/node',
    ),
    'fields' => array(),
  ),
);

function custom_search_api_widget_search_widget_content_type_render($subtype, $conf, $panel_args, $context) {
  // Build the content type block.
  $block = new stdClass();
  $block->module  = 'search';
  $block->delta   = 'form';
  $block->title   = '';

  $form_state = array(
    'build_info' => array(
      'args' => array($conf, $panel_args, $context),
    ),
  );

  $block->content = drupal_build_form('custom_search_api_widget_search_form', $form_state);
  
  return $block;
}

/**
 * Form builder; settings for the context.
 */
function custom_search_api_widget_search_widget_content_type_edit_form($form, &$form_state) {
  $conf = $form_state['conf'];

  if (!empty($conf['paths']['search_paths'])) {
    $search_paths = array();
    foreach ($conf['paths']['search_paths'] as $lang=>$path) {
      $search_paths[] = $lang . '|' . $path;
    }
  }

  $form['#tree'] = TRUE;
  if (empty($form_state['num_fields'])) {
    $count = count($conf['fields']);
    if ($count > 2) { 
      $form_state['num_fields'] = $count - 1;

    }
    else {
      $form_state['num_fields'] =  1;
    }
  }

  // Labels & default text.
  $form['search_box'] = array(
    '#type'   => 'fieldset',
    '#title'  => t('Search box'),
    '#collapsible'  => TRUE,
    '#collapsed'    => TRUE,
  );
  $form['search_box']['widget_label'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Search box label'),
    '#default_value'  => $conf['search_box']['widget_label'],
    '#description'    => t('Enter the label text for the search box.'),
  );
  $form['search_box']['widget_text'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Search box default text'),
    '#default_value'  => $conf['search_box']['widget_text'],
    '#description'    => t('This will change the default text inside the search form. Leave blank for no text.'),
  );
  //@TODO clean up options
  $form['search_box']['widget_prepopulate'] = array(
    '#type'           => 'select',
    '#title'          => t('Prepopulate default text from argument'),
    '#options'        => array(0 => t('No')) + range(0,9),
    '#default_value'  => $conf['search_box']['widget_prepopulate'],
    '#description'    => t('Prepopulate the default text from an argument to the panel. Note the argument number matches the arguments in the panel, not the url.'),
  );
  $form['search_box']['widget_hint'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Search box hint text'),
    '#default_value'  => $conf['search_box']['widget_hint'],
    '#description'    => t('Enter the text that will be displayed when hovering the input field (HTML <em>title</em> attritube).'),
  );
  $form['search_box']['widget_size'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Search box size'),
    '#size'           => 3,
    '#default_value'  => $conf['search_box']['widget_size'],
    '#description'    => t('The default value is 15'),
  );
  $form['search_box']['widget_maxlength'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Search box maximum length'),
    '#size'           => 3,
    '#default_value'  => $conf['search_box']['widget_maxlength'],
    '#description'    => t('The default value is 128'),
  );
  $form['search_box']['submit_text'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Submit button text'),
    '#default_value'  => $conf['search_box']['submit_text'],
    '#description'    => t('Enter the text for the submit button. Leave blank to hide it. The default value is "Search".'),
  );

  $form['paths'] = array(
    '#type'         => 'fieldset',
    '#title'        => t('Custom search paths'),
    '#collapsed'    => TRUE,
    '#collapsible'  => TRUE,
  );
  $form['paths']['search_paths'] = array(
    '#type'           => 'textarea',
    '#title'          => t('Paths'),
    '#default_value'  => implode("\n", $search_paths),
    '#rows'           => 3,
    '#description'    => t('If you want to use custom search paths, enter them here in the form <em>language</em>|<em>path</em>, one per line. The [key] token will be replaced by what is entered in the search box. Ie: en|mysearch/[key]. The [current_path] token can be used to use the current URL path of the page being viewed. Substitutions from contexts are allowed.'),
  );

  $form['fields'] = array(
    '#type'   => 'fieldset',
    '#title'  => t('Exposed fields'),
    '#collapsible'  => TRUE,
    '#collapsed'    => ($form_state['rebuild']) ? FALSE : TRUE, 
  );
  // Determine what deltas Facet API Supportsm
  $maps = facetapi_get_delta_map();
  $options = array('none' => t('-- None --'));
  foreach ($maps as $map) {
     list($index, $type, $field_name) = explode(':', $map);
     $options[$field_name] = $field_name;
  }
  
  for ($i = 1; $i <= $form_state['num_fields']; $i++) {
    $form['fields'][$i]['field'] = array(
      '#title' => t('Exposed field(s)'),
      '#description' => t('Select one or more fields to be exposed in the widget.'),
      '#type' => 'select',
      '#options' => $options,
      '#default_value'  => isset($conf['fields'][$i]['field']) ? $conf['fields'][$i]['field'] : NULL,
    );
 
    // @TODO get field label default 
    $form['fields'][$i]['field_label'] = array(
      '#type'           => 'textfield',
      '#title'          => t('Label text'),
      '#default_value'  => !empty($conf['fields'][$i]['field_label']) ? $conf['fields'][$i]['field_label'] : t('Select'),
      '#description'    => t('Enter the label text for the selector.'),
    );
    $form['fields'][$i]['field_any'] = array(
      '#type'           => 'textfield',
      '#title'          => t('-Any-'),
      '#default_value'  => !empty($conf['fields'][$i]['field_any']) ? $conf['fields'][$i]['field_any'] : t('-Any-'),
      '#description'    => t('Enter the text for "any" in the selector.'),
    );
  }
  // Adds "Add another field" button.
  $form['fields']['add_field'] = array(
    '#type' => 'submit',
    '#value' => t('Add another field'),
    '#submit' => array('custom_search_api_widget_add_another'),
  );
  return $form;
}

function custom_search_api_widget_add_another($form, &$form_state) {
  $form_state['num_fields']++;
  // Setting $form_state['rebuild'] = TRUE causes the form to be rebuilt again.
  $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for search form.
 */
function custom_search_api_widget_search_widget_content_type_edit_form_validate($form, &$form_state) {
  $item = 1;
  $deletion = FALSE;
  foreach ($form_state['values']['fields'] as $key=>$field) {
    if (isset($field['field']) && $field['field'] == 'none') {
    // need to handle a deletion
      unset($form_state['values']['fields'][$key]);
      $deletion = TRUE;
    }
    else {
      // move remaining items up in the index
      if ($deletion) {
        $form_state['values']['fields'][$item] = $form_state['values']['fields'][$key]; 
        unset($form_state['values']['fields'][$key]);
      } 
      $item++;
    }
  }
}

/**
 * Submit handler for search form.
 */
function custom_search_api_widget_search_widget_content_type_edit_form_submit($form, &$form_state) {
  unset($form_state['values']['fields']['add_field']);
  // Copy everything from our defaults.
  foreach (array_keys($form_state['values']) as $key) {
    $form_state['conf'][$key] = $form_state['values'][$key];
  }

  if (!empty($form_state['conf']['paths']['search_paths'])) {
    $lines = explode("\n", $form_state['conf']['paths']['search_paths']);
    $paths = array();
    foreach ($lines as $line) {
      list($lang, $path) = explode('|', $line);
      $paths[$lang] = $path;
    }
    $form_state['conf']['paths']['search_paths'] = $paths;
  }

}

/**
 * Returns the administrative title for a type.
 */
function custom_search_api_widget_search_widget_content_type_admin_title($subtype, $conf, $context) {
  return t('Custom search form');
}
