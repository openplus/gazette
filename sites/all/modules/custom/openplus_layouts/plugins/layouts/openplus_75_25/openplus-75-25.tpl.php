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

<div class="panel-display openplus_75_25 clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <section class="openplus-75-25">
    <div class="row">
      <?php if ($content['openplus_75_25_top']): ?>
  	<div class="col-md-12 top">
          <?php print $content['openplus_75_25_top']; ?>
  	</div>
      <?php endif; ?>
    </div>
    <div class="row">
      <?php if ($content['openplus_75_25_right'] || $content['openplus_75_25_righttop']): ?>
        <div class="col-md-9 left">
      <?php else: ?>
        <div class="col-md-12 left">
      <?php endif; ?>
      <div class="inner">
        <?php print $content['openplus_75_25_left']; ?>
      </div>
      </div>
      <?php if ($content['openplus_75_25_right'] || $content['openplus_75_25_righttop']): ?>
        <div class="col-md-3 right">
          <div class="inner">
            <div class="righttop">
              <?php print $content['openplus_75_25_righttop']; ?>
            </div>
            <div class="rightbottom">
              <?php print $content['openplus_75_25_right']; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <div class="row">
      <?php if ($content['openplus_75_25_bottom']): ?>
        <div class="col-md-12 bottom">
          <div class="inner">
  	  <?php print $content['openplus_75_25_bottom']; ?>
    </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
</div>
