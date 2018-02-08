<?php
/**
 * @file
 * Template for Openplus Layouts
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display openplus_50_50 clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <section class="openplus-50-50">
  	<div class="row">
      <?php if ($content['openplus_50_50_top']): ?>
  		<div class="col-md-12 top">
  			<?php print $content['openplus_50_50_top']; ?>
  		</div>
      <?php endif; ?>
  	</div>
  	<div class="row">
	  	<div class="col-md-6 left">
	    	<?php print $content['openplus_50_50_left']; ?>
		</div>
		<div class="col-md-6 right">
	    	<?php print $content['openplus_50_50_right']; ?>
		</div>
	</div>
	<div class="row">
    <?php if ($content['openplus_50_50_bottom']): ?>
  		<div class="col-md-12 bottom">
  			<?php print $content['openplus_50_50_bottom']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  </section>
</div><!-- /.openplus_home -->
