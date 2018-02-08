<?php
/**
 * @file
 * Template for Openplus Layouts
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>
<div class="panel-display openplus_66_33 clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <section class="openplus-66-33">
  	<div class="row">
      <?php if ($content['openplus_66_33_top']): ?>
    		<div class="col-md-12 top">
    			<?php print $content['openplus_66_33_top']; ?>
    		</div>
      <?php endif; ?>
  	</div>
  	<div class="row">
      <?php if ($content['openplus_66_33_right']): ?>
        <div class="col-md-8 left">
        <?php else: ?>
        <div class="col-md-12 left">
      <?php endif; ?>
        <?php print $content['openplus_66_33_left']; ?>
        <?php print $content['openplus_66_33_leftbottom']; ?>
      </div>
      <?php if ($content['openplus_66_33_right']): ?>
        <div class="col-md-4 right">
          <?php print $content['openplus_66_33_right']; ?>
        </div>
      <?php endif; ?>
	  </div>
	<div class="row">
    <?php if ($content['openplus_66_33_bottom']): ?>
  		<div class="col-md-12 bottom">
  			<?php print $content['openplus_66_33_bottom']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  </section>
</div>
