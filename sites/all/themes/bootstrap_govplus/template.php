<?php
/**
 * @file
 * template.php
 */
include_once 'includes/bootstrap_govplus.theme.facetapi.inc';

function bootstrap_govplus_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
  $lang = $comment->language;
  if ($GLOBALS['language']->language != $lang) {
    $vars['classes_array'] = array_merge($vars['classes_array'], array("lang-" . $lang, "collapsed"));
  }
}
 function bootstrap_govplus_preprocess_search_block_form(&$vars, $hook) {
   $vars['form']['search_block_form']['#attributes']['class'][] = 'your-class';
  //  $vars['form']['search_block_form']['#attributes'] = array('class' => array('search1','search2'));
 }

 function bootstrap_govplus_preprocess_pcp_template(&$variables) {
   if (isset($variables['nextfield_name'])) {
     // Generate URL to edit next field for core user profile.
     if ($variables['entity_type'] == 'user') {
       $input_name = 'edit-' . str_replace('_', '-', $variables['nextfield_name']);
       $user_edit_path = 'user/' . $variables['uid'] . '/edit';
       $variables['next_path'] = url($user_edit_path, array('absolute' => TRUE, 'fragment' => $input_name, 'query' => array('destination' => 'user')));
     }

     // Generate URL to edit next field for profile2 profile.
     elseif ($variables['entity_type'] == 'profile2') {
       $bundle = $variables['bundle'];
       $input_name = 'edit-profile-' . str_replace('_', '-', $bundle) . '-' . str_replace('_', '-', $variables['nextfield_name']);

       // Determine correct 'edit path' for profile2 profile type.
       $old_profile_edit_path = 'profile-' . $bundle . '/' . $variables['uid'] . '/edit';
       $new_profile_edit_path = 'user/' . $variables['uid'] . '/edit/' . $bundle;
       $profile_edit_path = drupal_valid_path($old_profile_edit_path) ? $old_profile_edit_path : $new_profile_edit_path;

       $variables['next_path'] = url($profile_edit_path, array('absolute' => TRUE, 'fragment' => $input_name));
     }
   }
 }


 ?>
