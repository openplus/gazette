<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

?>
<?php if(!empty($fields['comment']->content)): ?>
  <i class="fa fa-comments bg-yellow"></i>
<?php else: ?>
  <i class="fa fa-user bg-aqua"></i>
<?php endif; ?>
<div class="timeline-item">
  <span class="time"><i class="fa fa-clock-o"></i> <?php print $fields['timestamp']->content; ?></span>
  <h3 class="timeline-header"><?php print $fields['title_field']->content; ?> </h3>
  <div class="timeline-body">
    <?php if(!empty($fields['comment']->content)): ?>
      <?php print $fields['comment']->content; ?>
    <?php else: ?>
      <?php print t('Revision state moved to')  . ' ' . $fields['field_publishing_state']->content; ?>
    <?php endif; ?>
    <p></p>
    <p>
      <?php print $fields['edit_node']->content . ' - ' . $fields['replicate_ui_link']->content;?>
    </p>
  </div>
</div>
