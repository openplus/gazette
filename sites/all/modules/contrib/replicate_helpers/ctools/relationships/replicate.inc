<?php

/**
 * @file
 * Plugin to provide a relationship handler powered by rules.
 */

/**
 * Plugin info.
 */
$plugin = array(
  'title' => t('Replicate entity'),
  'description' => t('Replicates an entity to save as a copy.'),
  'get child' => 'replicate_helpers_replicate_get_child',
  'get children' => 'replicate_helpers_replicate_get_children',
  'context' => 'replicate_helpers_replicate_context',
);

function replicate_helpers_replicate_get_child($plugin, $parent, $child) {
  $plugins = replicate_helpers_replicate_get_children($plugin, $parent);
  return $plugins[$parent . ':' . $child];
}

function replicate_helpers_replicate_get_children($parent_plugin, $parent_name) {
  $cid = $parent_plugin['name'] . ':' . $parent_name;
  $cache = &drupal_static(__FUNCTION__);
  if (!empty($cache[$cid])) {
    return $cache[$cid];
  }

  $entities = entity_get_info();
  $plugins = array();
  foreach ($entities as $entity_type => $entity_info) {
    $entity_label = $entity_info['label'];
    $args = array('@entity' => $entity_label);

    $child_plugin = $parent_plugin;
    $child_plugin['title'] = t('Replicates @entity', $args);
    $child_plugin['keyword'] = $entity_type;
    $child_plugin['context name'] = $entity_type;
    $child_plugin['name'] = $parent_name . ':' . $entity_type;
    $child_plugin['description'] = t('Replicates a @entity to save as a copy.', $args);
    $child_plugin['from entity'] = $entity_type;
    $child_plugin['to entity'] = $entity_type;
    $child_plugin['required context'] = new ctools_context_required($entity_label, $entity_type);

    $child_plugin_id = $parent_name . ':' . $entity_type;
    $plugins[$child_plugin_id] = $child_plugin;
  }

  $cache[$cid] = $plugins;
  return $plugins;
}

/**
 * Return a new context based on an existing context.
 */
function replicate_helpers_replicate_context($context, $conf) {
  // Prepare stuff and parse plugin name.
  $plugin_name = $conf['name'];
  list($_, $entity_type) = explode(':', $plugin_name, 2);
  $entity = $context->data;

  if ($entity) {
    // This is the line that this whole plugin wraps.
    $result = replicate_clone_entity($entity_type, $entity);
  }
  else {
    $result = NULL;
  }

  // Prepare result.
  if ($result) {
    $result_context = ctools_context_create($entity_type, $result);
  }
  else {
    $result_context = ctools_context_create_empty($entity_type);
  }
  return $result_context;
}
