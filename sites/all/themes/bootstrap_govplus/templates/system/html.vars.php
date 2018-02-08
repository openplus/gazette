<?php
/**
 * @file
 * html.vars.php
 *
 * @see html.tpl.php
 */
function bootstrap_govplus_preprocess_html(&$variables, $hook) {
  global $theme_key;
  $wxt_active_orig = variable_get('wetkit_wetboew_theme', 'wet-boew');
  $wxt_active = str_replace('-', '_', $wxt_active_orig);
  $wxt_active = str_replace('wet_boew_', '', $wxt_active);
  $variables['classes_array'][] = drupal_html_class($theme_key);
  $variables['classes_array'][] = drupal_html_class($wxt_active_orig);
  $variables['classes_array'][] = $wxt_active.'-theme';
  if ($wxt_active == 'theme_gcweb') {
    $variables['classes_array'][] = 'skin-black sidebar-mini sidebar-collapse';
  }
}
