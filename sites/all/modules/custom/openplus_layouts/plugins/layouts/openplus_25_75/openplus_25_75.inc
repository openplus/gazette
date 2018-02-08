<?php
/**
 * @file
 * Openplus Layouts
 */


// Plugin definition.
$plugin = array(
  'title' => t('Openplus 25/75'),
  'icon' => 'openplus-25-75.png',
  'category' => t('Openplus Layouts'),
  'theme' => 'openplus_25_75',
  'css' => 'openplus-25-75.css',
  'admin css' => 'openplus-25-75.admin.css',
  'regions' => array(
    'openplus_25_75_left' => t('Left'),
    'openplus_25_75_right' => t('Right'),
    'openplus_25_75_top' => t('Top'),
    'openplus_25_75_bottom' => t('Bottom'),
  ),
);
