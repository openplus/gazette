<?php
/**
 * @file
 * page.vars.php
 */

/**
 * Implements hook_preprocess_page().
 *
 * @see page.tpl.php
 */
function bootstrap_govplus_preprocess_page(&$variables) {

  // Internationalization Settings.

  global $language;
  $is_multilingual = 0;
  if (module_exists('i18n_menu') && drupal_multilingual()) {
    $is_multilingual = 1;
  }

  // WxT Settings.
  $theme_prefix = 'wb';
  $theme_menu_prefix = 'wet-fullhd';
  $wxt_active = variable_get('wetkit_wetboew_theme', 'wet-boew');
  $library_path = libraries_get_path($wxt_active, TRUE);
  $wxt_active = str_replace('-', '_', $wxt_active);
  $wxt_active = str_replace('wet_boew_', '', $wxt_active);

  // Extra variables to pass to templates.
  $variables['library_path'] = $library_path;
  $variables['language'] = $language->language;
  $variables['language_prefix'] = $language->prefix;
  $variables['language_prefix_alt'] = ($language->prefix == 'en') ? 'fr' : 'fra';



  // Custom Search Box.
  if (module_exists('custom_search')) {

    if ($wxt_active == 'theme_gcweb') {
    // Custom Search.
    $variables['custom_search'] = drupal_get_form('custom_search_blocks_form_1');
    $variables['custom_search']['#id'] = 'search-form';
    $variables['custom_search']['custom_search_blocks_form_1']['#id'] = $theme_prefix . '-srch-q';
    $variables['custom_search']['actions']['submit']['#id'] = 'wb-srch-sub';
    $variables['custom_search']['actions']['submit']['#attributes']['data-icon'] = 'search';
    $variables['custom_search']['actions']['submit']['#attributes']['value'] = t('search');
    $variables['custom_search']['actions']['submit']['#attributes']['hidden'] = t('hidden');
    $variables['custom_search']['#attributes']['class'][] = 'sidebar-form';
    $variables['custom_search']['#attributes']['role'] = 'search';
    $variables['custom_search']['actions']['#theme_wrappers'] = NULL;




    // Visibility settings.
    $pages = drupal_strtolower(theme_get_setting('wetkit_search_box'));
    // Convert the Drupal path to lowercase.
    $path = drupal_strtolower(drupal_get_path_alias($_GET['q']));
    // Compare the lowercase internal and lowercase path alias (if any).
    $page_match = drupal_match_path($path, $pages);
    if ($path != $_GET['q']) {
      $page_match = $page_match || drupal_match_path($_GET['q'], $pages);
    }
    // When $visibility has a value of 0 (VISIBILITY_NOTLISTED),
    // the block is displayed on all pages except those listed in $pages.
    // When set to 1 (VISIBILITY_LISTED), it is displayed only on those
    // pages listed in $pages.
    $visibility = 0;
    $page_match = !(0 xor $page_match);
    if ($page_match) {
      $variables['search_box'] = render($variables['custom_search']);
      $variables['search_box'] = str_replace('type="text"', 'type="search"', $variables['search_box']);
    }
    else {
      $variables['search_box'] = '';
    }
  }
  if ($wxt_active == 'gcweb') {
  // Custom Search.
  $variables['custom_search'] = drupal_get_form('custom_search_blocks_form_1');
  $variables['custom_search']['#id'] = 'search-form';
  $variables['custom_search']['custom_search_blocks_form_1']['#id'] = $theme_prefix . '-srch-q';
  $variables['custom_search']['actions']['submit']['#id'] = 'wb-srch-sub';
  $variables['custom_search']['actions']['submit']['#attributes']['data-icon'] = 'search';
  $variables['custom_search']['actions']['submit']['#attributes']['value'] = t('search');
  $variables['custom_search']['#attributes']['class'][] = 'search-form form-inline';
  $variables['custom_search']['#attributes']['role'] = 'search';
  $variables['custom_search']['actions']['#theme_wrappers'] = NULL;




  // Visibility settings.
  $pages = drupal_strtolower(theme_get_setting('wetkit_search_box'));
  // Convert the Drupal path to lowercase.
  $path = drupal_strtolower(drupal_get_path_alias($_GET['q']));
  // Compare the lowercase internal and lowercase path alias (if any).
  $page_match = drupal_match_path($path, $pages);
  if ($path != $_GET['q']) {
    $page_match = $page_match || drupal_match_path($_GET['q'], $pages);
  }
  // When $visibility has a value of 0 (VISIBILITY_NOTLISTED),
  // the block is displayed on all pages except those listed in $pages.
  // When set to 1 (VISIBILITY_LISTED), it is displayed only on those
  // pages listed in $pages.
  $visibility = 0;
  $page_match = !(0 xor $page_match);
  if ($page_match) {
    $variables['search_box'] = render($variables['custom_search']);
    $variables['search_box'] = str_replace('type="text"', 'type="search"', $variables['search_box']);
  }
  else {
    $variables['search_box'] = '';
  }
}
}


  // Visibility settings.
  $pages = drupal_strtolower(theme_get_setting('wetkit_search_box'));
  // Convert the Drupal path to lowercase.
  $path = drupal_strtolower(drupal_get_path_alias($_GET['q']));
  // Compare the lowercase internal and lowercase path alias (if any).
  $page_match = drupal_match_path($path, $pages);
  if ($path != $_GET['q']) {
    $page_match = $page_match || drupal_match_path($_GET['q'], $pages);
  }
  // When $visibility has a value of 0 (VISIBILITY_NOTLISTED),
  // the block is displayed on all pages except those listed in $pages.
  // When set to 1 (VISIBILITY_LISTED), it is displayed only on those
  // pages listed in $pages.

}
