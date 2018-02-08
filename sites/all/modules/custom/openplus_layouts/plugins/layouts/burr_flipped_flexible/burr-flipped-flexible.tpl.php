<?php
/**
 * @file
 * Template for WetKit Burr Flipped Flexible.
 *
 * This layout is Burr Flipped with additional optional regions
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display burr-flipped-flexible clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="burr-flipped-flexible-container burr-flipped-flexible-content-container clearfix">
    <div class="burr-flipped-flexible-content burr-flipped-flexible-content-region panel-panel">
      <div class="burr-flipped-flexible-content-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['contentmain']; ?>
      </div>
      <?php if ($content['content_optional_1']): ?>
      <div class="burr-flipped-flexible-content-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['content_optional_1']; ?>
      </div>
      <?php endif; ?>

      <?php if ($content['content_optional_2']): ?>
      <div class="burr-flipped-flexible-content-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['content_optional_2']; ?>
      </div>
      <?php endif; ?>

      <?php if ($content['content_optional_3']): ?>
      <div class="burr-flipped-flexible-content-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['content_optional_3']; ?>
      </div>
      <?php endif; ?>

      <?php if ($content['content_optional_4']): ?>
      <div class="burr-flipped-flexible-content-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['content_optional_4']; ?>
      </div>
      <?php endif; ?>
    </div>

    <div class="burr-flipped-flexible-sidebar burr-flipped-flexible-content-region panel-panel">
      <div class="burr-flipped-flexible-sidebar-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['sidebar']; ?>
      </div>

      <?php if ($content['sidebar_optional_1']): ?>
      <div class="burr-flipped-flexible-sidebar-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['sidebar_optional_1']; ?>
      </div>
      <?php endif; ?>

      <?php if ($content['sidebar_optional_2']): ?>
      <div class="burr-flipped-flexible-sidebar-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['sidebar_optional_2']; ?>
      </div>
      <?php endif; ?>

      <?php if ($content['sidebar_optional_3']): ?>
      <div class="burr-flipped-flexible-sidebar-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['sidebar_optional_3']; ?>
      </div>
      <?php endif; ?>

      <?php if ($content['sidebar_optional_4']): ?>
      <div class="burr-flipped-flexible-sidebar-inner burr-flipped-flexible-content-region-inner panel-panel-inner">
        <?php print $content['sidebar_optional_4']; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>

</div><!-- /.burr-flipped-flexible -->
