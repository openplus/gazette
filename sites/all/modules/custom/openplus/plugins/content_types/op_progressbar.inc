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
  'title' => t('Openplus progress bar'),
  'description' => t('This pane will render a progress bar on a publication.'),
  'content_types' => array('op_progressbar'),
  'category' => t('Widgets'),
  'required context' => array(
    new ctools_context_required(t('Node'), 'node'),
  ),
  'single' => TRUE,
  'defaults' => array(
  ),
);

/**
 * Output function for the 'toc' content type.
 */
function openplus_op_progressbar_content_type_render($subtype, $conf, $panel_args, $context) {
  $pane = new stdClass();
  $output = '';
  // Node Context to check the settings?
  if (!empty($context[0]) && !empty($context[0]->data)) {
    $node = $context[0]->data;
    // get total # notices
    $total = count(views_get_view_result('notices', 'panel_pane_4', $node->nid));
    // get number completed
    $complete = count(views_get_view_result('notices', 'panel_pane_7', $node->nid));
    // calculate percentage
    if ($total != 0) {
      $percentage = round($complete / $total, 2) * 100;
      $variables = array(
        'percent' => $percentage,
        'message' => '<div class="alert alert-info">' .  t('@complete of @total notices (including parts) have been completed.', array('@complete' => $complete, '@total' => $total)) . '</div>',
      );
      $output .= theme('progress_bar', $variables);
    }
  }

  $pane->content = $output;

  return $pane;
}

/**
 * Returns an edit form for custom type settings.
 */
function openplus_op_progressbar_content_type_edit_form($form, &$form_state) {
  $conf = $form_state['conf'];
  return $form;
}

/**
 * Submit handler
 */
function openplus_op_progressbar_content_type_edit_form_submit($form, &$form_state) {
  // Copy everything from our defaults.
  foreach (array_keys($form_state['plugin']['defaults']) as $key) {
    $form_state['conf'][$key] = $form_state['values'][$key];
  }
}

/**
 * Returns the administrative title for a type.
 */
function openplus_op_progressbar_content_type_admin_title($subtype, $conf, $context) {
  return t('Openplus: progress bar ');
}
