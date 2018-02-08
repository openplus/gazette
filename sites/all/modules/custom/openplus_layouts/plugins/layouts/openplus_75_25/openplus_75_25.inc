<?php
/**
 * @file
 * Openplus Layouts
 */


// Plugin definition.
$plugin = array(
  'title' => t('Openplus 75/25'),
  'icon' => 'openplus-75-25.png',
  'category' => t('Openplus Layouts'),
  'theme' => 'openplus_75_25',
  'css' => 'openplus-75-25.css',
  'admin css' => 'openplus-75-25.admin.css',
  'regions' => array(
    'openplus_75_25_left' => t('Left'),
    'openplus_75_25_right' => t('Right'),
    'openplus_75_25_righttop' => t('Right Top'),
    'openplus_75_25_top' => t('Top'),
    'openplus_75_25_bottom' => t('Bottom'),
  ),
);
