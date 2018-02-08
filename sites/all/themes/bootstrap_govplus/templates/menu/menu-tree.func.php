<?php
/**
 * @file
 * menu-tree.func.php
 */

/**
 * Overrides theme_menu_tree().
 */
 // WxT Settings.


 global $theme_key;
 global $language;
 $wxt_active_orig = variable_get('wetkit_wetboew_theme', 'wet-boew');
 $wxt_active = str_replace('-', '_', $wxt_active_orig);
 $wxt_active = str_replace('wet_boew_', '', $wxt_active);


if ($wxt_active == 'theme_gcweb') {
  function bootstrap_govplus_menu_tree__menu_block__main_menu(&$variables) {
    return '<ul class="sidebar-menu" role="menubar">' . $variables['tree'] . '</ul>';
  }
}

if ($wxt_active == 'gcweb') {
  function bootstrap_govplus_menu_tree__menu_block__main_menu(&$variables) {
    return '<ul class="inline-menu menu" role="menubar">' . $variables['tree'] . '</ul>';
  }
}
