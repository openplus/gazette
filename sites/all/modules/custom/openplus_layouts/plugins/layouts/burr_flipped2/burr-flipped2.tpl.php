<?php
/**
 * @file
 * Template for WetKit Burr Flipped 2.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>
<div class="panel-display burr-flipped2 clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="burr-flipped2-container burr-flipped2-content-container container clearfix">
    <div class="burr-flipped2-content burr-flipped2-content-region panel-panel">
      <div class="burr-flipped2-content-inner burr-flipped2-content-region-inner panel-panel-inner">
        <?php print $content['contentmaintop']; ?>
      </div>
      <div class="burr-flipped2-content-inner burr-flipped2-content-region-inner panel-panel-inner">
        <?php print $content['contentmainbottom']; ?>
      </div>
    </div>
    <div class="burr-flipped2-sidebar burr-flipped2-content-region panel-panel">
      <div class="burr-flipped2-sidebar-inner burr-flipped2-content-region-inner panel-panel-inner">
        <?php print $content['sidebar']; ?>
      </div>
    </div>
  </div>

</div><!-- /.burr-flipped2 -->
