<?php
/**
 * @file
 * burr_flipped2.inc
 */


// Plugin definition.
$plugin = array(
  'title' => t('Openplus 25-25-25-25'),
  'icon' => 'openplus-fourth.png',
  'category' => t('Openplus Layouts'),
  'theme' => 'openplus_fourth',
  'css' => 'openplus-fourth.css',
  'admin css' => 'openplus-fourth.admin.css',
  'regions' => array(
    'openplus_fourth_left' => t('Left'),
    'openplus_fourth_left2' => t('Left Middle'),
    'openplus_fourth_right' => t('Right Middle'),
    'openplus_fourth_right2' => t('Right'),
    'openplus_fourth_top' => t('Top'),
    'openplus_fourth_bottom' => t('Bottom'),
  ),
);
