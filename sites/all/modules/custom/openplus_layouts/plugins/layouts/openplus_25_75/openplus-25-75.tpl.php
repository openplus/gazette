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
<div class="panel-display openplus_25_75 clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <section class="openplus-25-75">
  	<div class="row">
      <?php if ($content['openplus_25_75_top']): ?>
    		<div class="col-md-12 top">
    			<?php print $content['openplus_25_75_top']; ?>
    		</div>
      <?php endif; ?>
  	</div>
  	<div class="row">
      <?php if ($content['openplus_25_75_left']): ?>
	  	<div class="col-md-3 left">
	    	<?php print $content['openplus_25_75_left']; ?>
		  </div>
      <?php endif; ?>
      <?php if ($content['openplus_25_75_left']): ?>
        <div class="col-md-9 right">
        <?php else: ?>
        <div class="col-md-12 right">
      <?php endif; ?>
        <?php print $content['openplus_25_75_right']; ?>
      </div>
	  </div>
	<div class="row">
    <?php if ($content['openplus_25_75_bottom']): ?>
  		<div class="col-md-12 bottom">
  			<?php print $content['openplus_25_75_bottom']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  </section>
</div>
