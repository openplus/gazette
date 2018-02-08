<?php
/**
 * @file
 * burr_flipped_flexible.inc
 */


// Plugin definition.
$plugin = array(
  'title' => t('Burr Flipped Flexible'),
  'icon' => 'burr-flipped-flexible.png',
  'category' => t('Layouts BackEnd'),
  'theme' => 'burr_flipped_flexible',
  'css' => 'burr-flipped-flexible.css',
  'regions' => array(
    'sidebar' => t('Sidebar'),
    'sidebar_optional_1' => t('Optional sidebar region 1'),
    'sidebar_optional_2' => t('Optional sidebar region 2'),
    'sidebar_optional_3' => t('Optional sidebar region 3'),
    'sidebar_optional_4' => t('Optional sidebar region 4'),
    'contentmain' => t('Main content'),
    'content_optional_1' => t('Optional Content region 1'),
    'content_optional_2' => t('Optional content region 2'),
    'content_optional_3' => t('Optional content region 3'),
    'content_optional_4' => t('Optional content region 4'),
  ),
);
