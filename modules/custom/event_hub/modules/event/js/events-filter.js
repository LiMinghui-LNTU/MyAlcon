(function ($, Drupal, once) {

  Drupal.behaviors.initFilterMobile = {
    attach: function (context, settings) {
      $(once('mobile-menu', '.view-header .filter-mobile')).click(function() {
        let $parent = $(this).closest('.view-header');
        if ($parent.hasClass('active')) {
          $parent.removeClass('active');
        }
        else {
          $parent.addClass('active');
        }
      });
    }
  };

} (jQuery, Drupal, once));
