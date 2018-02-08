<?php

/**
 * Returns HTML for the deactivation widget.
 *
 * @param $variables
 *   An associative array containing the keys 'text', 'path', and 'options'. See
 *   the l() function for information about these variables.
 *
 * @see l()
 * @see theme_facetapi_link_active()
 *
 * @ingroup themable
 */
function bootstrap_govplus_facetapi_deactivate_widget($variables) {
  // return '(-)';
  return '<span class="facetapi-deactivate-widget">X</span>';
}

/**
 * Returns HTML for the inactive facet item's count.
 *
 * @param $variables
 *   An associative array containing:
 *   - count: The item's facet count.
 *
 * @ingroup themeable
 */
function bootstrap_govplus_facetapi_count($variables) {
  // return '' . (int) $variables['count'] . '';
  return '<span class="facetapi-facet-count">' . (int) $variables['count'] . '</span>';
}

/**
 * Returns HTML for an active facet item.
 *
 * @param array $variables
 *   An associative array containing the keys 'text', 'path', and 'options'. See
 *   the l() function for information about these variables.
 *
 * @see l()
 *
 * @ingroup themeable
 */
function bootstrap_govplus_facetapi_link_active($variables) {
  // Sanitizes the link text if necessary.
  $sanitize = empty($variables['options']['html']);
  $link_text = ($sanitize) ? check_plain($variables['text']) : $variables['text'];

  // Changes the event date filter for today + 30 days to Next 30 days.
  $start = format_date(time(), 'custom', 'Y-m-d');
  $end = format_date(strtotime("+30 days"), 'custom', 'Y-m-d');
  if ($link_text == 'Event Date » Start date: ' . $start . ' 00:00 – ' . $end . ' 00:00') {
    $link_text = t('Next 30 days');
  }

  // Theme function variables for accessible markup.
  // @see http://drupal.org/node/1316580
  $accessible_vars = array(
    'text' => $variables['text'],
    'active' => TRUE,
  );

  // Builds link, passes through t() which gives us the ability to change the
  // position of the widget on a per-language basis.
  $replacements = array(
    '!facetapi_deactivate_widget' => theme('facetapi_deactivate_widget', $variables),
    '!facetapi_accessible_markup' => theme('facetapi_accessible_markup', $accessible_vars),
  );
  $variables['text'] = t('!facetapi_accessible_markup', $replacements) . $link_text;
  $variables['options']['html'] = TRUE;

  // determine the missing query option from the current url
  $query = drupal_get_query_parameters();
  $query = isset($variables['options']['query']['f']) ? array_diff($query['f'], $variables['options']['query']['f']) : $query['f'];

  // add a class for theming to content type facets
  list($type, $value) = explode(':', end($query));
  if ($type == 'type') {
    $variables['options']['attributes']['class'][] = str_replace('_', '-', $value);
  }

  return theme('link', $variables);
}

/**
 * Returns HTML for an inactive facet item.
 *
 * Parameters
 * $variables: An associative array containing the keys 'text', 'path', 'options', and 'count'.
 * See the l() and theme_facetapi_count() functions for information about these variables.
 * Returns HTML for an inactive facet item.
 *
 * @see l()
 *
 */
function bootstrap_govplus_facetapi_link_inactive($variables) {
  // Builds accessible markup.
  // @see http://drupal.org/node/1316580
  $accessible_vars = array(
    'text' => $variables['text'],
    'active' => FALSE,
  );
  $accessible_markup = theme('facetapi_accessible_markup', $accessible_vars);

  // Sanitizes the link text if necessary.
  $sanitize = empty($variables['options']['html']);
  $variables['text'] = ($sanitize) ? check_plain($variables['text']) : $variables['text'];

  // Adds count to link if one was passed.
  if (isset($variables['count'])) {
    $variables['text'] .= ' ' . theme('facetapi_count', $variables);
  }

  // Resets link text, sets to options to HTML since we already sanitized the
  // link text and are providing additional markup for accessibility.
  $variables['text'] .= $accessible_markup;
  $variables['options']['html'] = TRUE;

  // add a class for theming to content type facets
  list($type, $value) = explode(':', end($variables['options']['query']['f']));
  if ($type == 'type') {
    $variables['options']['attributes']['class'][] = 'type-'.$value;
  }

  return theme_link($variables);
}
