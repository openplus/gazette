<?php
/**
 * @file
 * burr_flipped2.inc
 */


// Plugin definition.
$plugin = array(
  'title' => t('Openplus 33-33-33'),
  'icon' => 'openplus-third.png',
  'category' => t('Openplus Layouts'),
  'theme' => 'openplus_third',
  'css' => 'openplus-third.css',
  'admin css' => 'openplus-third.admin.css',
  'regions' => array(
    'openplus_third_left' => t('Left'),
    'openplus_third_middle' => t('Middle'),
    'openplus_third_right' => t('Right'),
    'openplus_third_top' => t('Top'),
    'openplus_third_bottom' => t('Bottom'),
  ),
);
