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

<div class="panel-display openplus_third clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <section class="openplus-third">
  	<div class="row">
      <?php if ($content['openplus_third_top']): ?>
  		<div class="col-md-12 top">
  			<?php print $content['openplus_third_top']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  	<div class="row">
      <?php if ($content['openplus_third_left']): ?>
	  	<div class="col-md-4 left">
	    	<?php print $content['openplus_third_left']; ?>
		  </div>
    <?php endif; ?>
      <?php if ($content['openplus_third_middle']): ?>
      <div class="col-md-4 middle">
        <?php print $content['openplus_third_middle']; ?>
      </div>
    <?php endif; ?>
      <?php if ($content['openplus_third_right']): ?>
		<div class="col-md-4 right">
	    	<?php print $content['openplus_third_right']; ?>
		</div>
  <?php endif; ?>
	</div>
	<div class="row">
    <?php if ($content['openplus_third_bottom']): ?>
  		<div class="col-md-12 bottom">
  			<?php print $content['openplus_third_bottom']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  </section>
</div><!-- /.openplus_home -->
