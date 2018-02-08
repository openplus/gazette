<?php
/**
 * @file
 * Openplus Layouts
 */


// Plugin definition.
$plugin = array(
  'title' => t('Openplus 50-50'),
  'icon' => 'openplus-50-50.png',
  'category' => t('Openplus Layouts'),
  'theme' => 'openplus_50_50',
  'css' => 'openplus-50-50.css',
  'admin css' => 'openplus-50-50.admin.css',
  'regions' => array(
    'openplus_50_50_left' => t('Left'),
    'openplus_50_50_right' => t('Right'),
    'openplus_50_50_top' => t('Top'),
    'openplus_50_50_bottom' => t('Bottom'),
  ),
);
