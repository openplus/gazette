/**
 * Implementation of hook_elements.
 *
 * Much of the colorpicker code was adapted from the Colorpicker module.
 * That module has no stable release yet nor any D6 branch.
 */
/*
 *  Bind the colorpicker event to the form element
 */
(function ($) {
  Drupal.behaviors.field_example_colorpicker = {
    attach: function(context) {
      /**
       * Check if a particular version of jQuery is greater than the current.
       */
      var isCompatible = function(version) {
        var cur = $.fn.jquery.split('.');
        var ver = version.split('.'); 
        return isNewerThan(cur[0], ver[0]) && isNewerThan(cur[1], ver[1]);
      }
      /**
       * Ensure int and compare a to b.
       */
      var isNewerThan = function(a,b) {
        return parseInt(a) >= parseInt(b);
      }
      /**
       * Focus event function.
       */
      var focus = function(event) {
        var edit_field = this;
        var picker = $(this).closest('div').parent().find(".calendar-colorpicker");

        // Hide all color pickers except this one.
        $(".calendar-colorpicker").hide();
        $(picker).show();
        $.farbtastic(picker, function(color) {
          edit_field.value = color;
        }).setColor(edit_field.value);
      }
      // .live was deprecated in favor of .on in 1.7.x, and removed in 1.9.x. 
      if (isCompatible('1.7.x')) {
        $(".edit-calendar-colorpicker").on("focus", focus);
      }
      else {
        $(".edit-calendar-colorpicker").live("focus", focus);
      }
    }
  }
})(jQuery);

