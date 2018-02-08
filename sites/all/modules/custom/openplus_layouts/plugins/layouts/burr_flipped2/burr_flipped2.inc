<?php
/**
 * @file
 * burr_flipped2.inc
 */


// Plugin definition.
$plugin = array(
  'title' => t('Burr Flipped 2'),
  'icon' => 'burr-flipped2.png',
  'category' => t('Layouts BackEnd'),
  'theme' => 'burr_flipped2',
  'css' => 'burr-flipped2.css',
  'regions' => array(
    'sidebar' => t('Sidebar'),
    'contentmaintop' => t('ContentTop'),
    'contentmainbottom' => t('ContentBottom'),
  ),
);
