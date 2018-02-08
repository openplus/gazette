<?php
/**
 * @file
 * Plugin to handle the 'querypath_scrape' content type which allows the
 * pane to be filled with content from an external data source using QueryPath.
 */

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'title' => t('Openplus workflow chart'),
  'description' => t('This pane will render a chart.'),
  'content_types' => array('op_wfchart'),
  'category' => t('Widgets'),
  'all contexts' => TRUE,
  'defaults' => array(
    'num_weeks' => 3,
    'uid' => NULL,
  ),
);

/**
 * Output function for the 'toc' content type.
 */
function openplus_op_wfchart_content_type_render($subtype, $conf, $panel_args, $context) {
  $pane = new stdClass();
  $chart = array(
    '#type' => 'chart',
    '#chart_type' => 'column',
  );

  $series = workflow_get_workflow_state_names();

  if (!empty($conf['uid'])) {
    if (is_numeric($conf['uid'])) {
      $account = user_load($conf['uid']);
    }
    else {
      module_load_include('inc', 'ctools', 'includes/context');
      $uid =  ctools_context_keyword_substitute($conf['uid'], '' , $context);
      $account = user_load($uid);
    }
    $ranges = openplus_build_ranges($conf['num_weeks']);

    foreach ($series as $sid => $name) {
      $data = array();
      $labels = array();
      foreach ($ranges as $key => $range) {
        $labels[] = format_date($range['end'], 'short');
        $data[] = openplus_workflow_history($sid, $account->uid, $range['start'], $range['end']);
      }
      $chart[$sid] = array(
        '#type' => 'chart_data',
        '#title' => t($name),
        '#data' => $data,
      );
    }
    $chart['xaxis'] = array(
      '#type' => 'chart_xaxis',
      '#title' => t('Week ending'),
      '#labels' => $labels,
    );
  }
  $pane->content = drupal_render($chart);

  return $pane;
}

/**
 * Returns an edit form for custom type settings.
 */
function openplus_op_wfchart_content_type_edit_form($form, &$form_state) {
  $conf = $form_state['conf'];

  $form['uid'] = array(
    '#type' => 'textfield',
    '#title' => 'User ID',
    '#description' => 'UID of user, tokens accepted',
    '#default_value' => $conf['uid'],
  );

  $form['num_weeks'] = array(
    '#type' => 'select',
    '#title' => t('Number of weeks to display'),
    '#options' => drupal_map_assoc(array(1,2,3,4,5,6)),
    '#default_value' => $conf['num_weeks'],
    '#required' => TRUE,
  );

  return $form;
}

/**
 * Submit handler
 */
function openplus_op_wfchart_content_type_edit_form_submit($form, &$form_state) {
  // Copy everything from our defaults.
  foreach (array_keys($form_state['plugin']['defaults']) as $key) {
    $form_state['conf'][$key] = $form_state['values'][$key];
  }
}

/**
 * Returns the administrative title for a type.
 */
function openplus_op_wfchart_content_type_admin_title($subtype, $conf, $context) {
  return t('Openplus: workflow chart');
}
