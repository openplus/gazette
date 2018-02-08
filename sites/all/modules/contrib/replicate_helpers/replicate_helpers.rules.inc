<?php

/**
 * @file
 * Replicate Internal Rules Actions
 */

/**
 * Implements hook_rules_action_info().
 */
function replicate_helpers_rules_action_info() {
  $actions = array(
    'replicate_helpers_action' => array(
      'label' => t('Replicate an Entity to be saved as a new one'),
      'group' => t('Replicate helpers'),
      'parameter' => array(
        'entity' => array(
          'type' => 'entity',
          'label' => t('Entity to replicate'),
          'wrapped' => TRUE,
        ),
      ),
      'provides' => array(
        'entity_replicated' => array(
          // Assertions only work if we declare an entity type here.
          'type' => 'entity',
          'label' => t('Replicated Entity'),
          'description' => t('This entity has all the fields from the original entity but no ID. It will get a new ID when saved.')
        ),
      ),
    ),
  );
  return $actions;
}

/**
 * Action callback.
 */
function replicate_helpers_action(EntityMetadataWrapper $entity_wrapper) {
  $entity_type = $entity_wrapper->type();
  $entity = $entity_wrapper->value();
  $entity_replicated = replicate_clone_entity($entity_type, $entity);
  $entity_replicated_wrapper = entity_metadata_wrapper($entity_type, $entity_replicated);
  return array('entity_replicated' => $entity_replicated_wrapper);
}

/**
 * Metadata assertion callback.
 */
function replicate_helpers_action_assertions(RulesPlugin $element) {
  $result_key = 'entity_replicated:var';
  $settings = $element->settings;
  if (isset($settings['entity:select']) && isset($settings[$result_key])) {
    $selector = $settings['entity:select'];
    /** @var EntityMetadataWrapper $wrapper */
    $wrapper = $element->applyDataSelector($selector);
    if (!$wrapper) {
      return array();
    }
    $type = $wrapper->type();
    // If we have a variable, we can further infer the bundle.
    // Unfortunately @see \RulesPlugin::applyDataSelector is not able to do this
    // as the used EntityStructureWrapper has no bundle information.
    $parts = explode(':', str_replace('-', '_', $selector), 2);
    if ((count($parts) == 1) && ($vars = $element->availableVariables()) && isset($vars[$parts[0]]['bundle'])) {
      $bundle = $vars[$parts[0]]['bundle'];
    }

    $result_variable_info = array(
      'type' => $type,
    );
    if (isset($bundle)) {
      $result_variable_info['bundle'] = $bundle;
    }
    $result_variable_name = $settings[$result_key];
    return array($result_variable_name => $result_variable_info);
  }
}
