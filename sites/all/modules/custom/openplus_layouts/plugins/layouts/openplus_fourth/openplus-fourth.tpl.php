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

<div class="panel-display openplus_fourth clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <section class="openplus-fourth">
  	<div class="row">
      <?php if ($content['openplus_fourth_top']): ?>
  		<div class="col-md-12 top">
  			<?php print $content['openplus_fourth_top']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  	<div class="row">
      <?php if ($content['openplus_fourth_left']): ?>
	  	<div class="col-sm-6 col-md-3 left">
	    	<?php print $content['openplus_fourth_left']; ?>
		  </div>
    <?php endif; ?>
      <?php if ($content['openplus_fourth_left2']): ?>
      <div class="col-sm-6 col-md-3 middle">
        <?php print $content['openplus_fourth_left2']; ?>
      </div>
    <?php endif; ?>
      <?php if ($content['openplus_fourth_right']): ?>
  		<div class="col-sm-6 col-md-3 right">
  	    	<?php print $content['openplus_fourth_right']; ?>
  		</div>
    <?php endif; ?>
      <?php if ($content['openplus_fourth_right2']): ?>
      <div class="col-sm-6 col-md-3 right">
          <?php print $content['openplus_fourth_right2']; ?>
      </div>
    <?php endif; ?>
	  </div>
	<div class="row">
    <?php if ($content['openplus_fourth_bottom']): ?>
  		<div class="col-md-12 bottom">
  			<?php print $content['openplus_fourth_bottom']; ?>
  		</div>
    <?php endif; ?>
  	</div>
  </section>
</div><!-- /.openplus_home -->
