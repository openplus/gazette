(function($) {
  $(document).ready(function() {
    $('.clipboardbtn').click(function(e) {
      e.preventDefault();
      $html = $('.view-consultations .view-content').html();
      $('#divtextarea').removeClass('sr-only');
      $('#divtextarea').val($html);
    });
    if ($('body').hasClass('theme-gcweb') && !$('body').hasClass("page-node-edit") && !$('body').hasClass("page-node-add") && !$('body').hasClass("page-admin-structure-skinr") && !$('body').hasClass("page-admin-structure-types-manage")) {
      $('select').selectBoxIt({
        downArrowIcon: "fa fa-angle-down"
      });
    }

    $('.registration-link a, .register-cancel a').addClass('btn btn-primary btn-block');
    // $('.startour').click(function() {
    //
    // });
    $('.equalheight').matchHeight();
    $(document).ajaxSuccess(function() {
      $('.equalheight').matchHeight();
    });
    $('#slidemenu-toggle').click(function(e) {
      e.preventDefault();
      $('.slideoutmenu').toggle("slide", {
        direction: "right"
      }, 500);
    });
    $('#togglemenu').click(function(e) {
      e.preventDefault();
      if ($(window).width() > 767) {
        $('body').toggleClass('sidebar-collapse');
      } else {
        $('body').removeClass('sidebar-collapse');
        $('body').toggleClass('sidebar-open');
      }
    });

    $('li.dropdown a.dropdown-toggle').on("click", function(e) {
      e.preventDefault();
      if ($(this).parent('li.dropdown').hasClass('open')) {

        $(this).parent('li.dropdown').removeClass('open');
      } else {
        $('li.dropdown').removeClass('open');
        $(this).parent('li.dropdown').addClass('open');
      }
    });

    $('.field-name-field-faq-question').click(function(e) {
      e.preventDefault();
      $(this).toggleClass('active');
      $(this).siblings('.field-name-field-faq-answer').slideToggle();
    });

    if ($('body').hasClass('i18n-fr')) {
      $('.comment.lang-en').each(function(e) {
        $(this).addClass('hidden-comment');
        $(this).append('<div class="openclose"><i class="fa fa-angle-up"></i></div>');
        $(this).append('<div class="commentlang">Ce commentaire est actuellement caché, car il nest pas dans votre langue par défaut. Cliquez sur la flèche pour lafficher.</div>');
      });
    }
    if ($('body').hasClass('i18n-en')) {
      $('.comment.lang-fr').each(function(e) {
        $(this).addClass('hidden-comment');
        $(this).append('<div class="openclose"><i class="fa fa-angle-up"></i></div>');
        $(this).append('<div class="commentlang">This comment is currently hidden, as it is not in your default language. Click the arrow to show. </div>');
      });
    }
    $('.openclose').click(function(e) {
      $(this).parent().toggleClass('showcomment');
      if ($(this).parent().hasClass('showcomment')) {
        $(this).html('<i class="fa fa-angle-down"></i>');
        $(this).siblings().slideToggle();
      } else {
        $(this).html('<i class="fa fa-angle-up"></i>');
        $(this).siblings().slideToggle();
      }
    });
  });

  // $(window).load(function() {
  //   $.urlParam = function(name) {
  //     var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  //     if (results == null) {
  //       return null;
  //     } else {
  //       return results[1] || 0;
  //     }
  //   }
  //   $.urlParam('tour');
  //   if ($.urlParam('tour') === 'clicked') {
  //     $('a.joyride-start-link').click();
  //   }
  //
  //   if (localStorage.getItem("watchedtour") !== 'true') {
  //     $('a.joyride-start-link').click();
  //   }
  // });

  // Drupal.behaviors.joyrideManualTrigger = {
  //   attach:function (context, settings) {
  //     $('a.joyride-start-link').live('click', function(event) {
  //       if($('body').hasClass('front') && $('body').hasClass('logged-in')) {
  //         event.preventDefault();
  //         localStorage.setItem('watchedtour', 'true');
  //         var tips_content = Drupal.settings.joyrideContext.tips_content || 'undefined';
  //         if (tips_content == 'undefined') return false;
  //
  //         if($('ol#joyride-tips-content').length > 0) $('ol#joyride-tips-content').remove();
  //
  //         $('body', context).append(tips_content);
  //
  //         $('ol#joyride-tips-content').joyride();
  //
  //         return false;
  //       }
  //     });
  //   }
  // };
  //

})(jQuery);
