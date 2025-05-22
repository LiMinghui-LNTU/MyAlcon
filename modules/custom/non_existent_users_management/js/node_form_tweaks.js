/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.customScheduler = {
    attach: function (context) {
      // Prepend the div below form tabs.
      if ($('.node-form .layout-form').find('.form-scheduler-warning').length == 1) {
        $('.node-form .layout-form').parent().prepend($('.form-scheduler-warning'));
      }
      
      // Show the Field warning on click of "Schedule a status change".
      $('.field--name-moderation-state transitionset').children('a').not('.scheduled-transition a').on('click', function(e){
        $('.field--name-moderation-state .scheduler-field-warning').show();
      });

      // Show/Hide the Field warning on 2nd time click events.
      $(document).on('click',document, function(e){
        if ($('div.scheduled-transition').length) {
          $('.field--name-moderation-state .scheduler-field-warning').show();
        }
        else {
          $('.field--name-moderation-state .scheduler-field-warning').hide();
        }
      });

      // Show the Field warning by default if existing transition exists.
      if ($('div.scheduled-transition').length) {
        $('.field--name-moderation-state .scheduler-field-warning').show();
      }
      // Hide field warning on "Remove".
      $('.scheduled-transition a').on('click',function(e){
        $('.field--name-moderation-state .scheduler-field-warning').hide();
      });
      // Hide field warning on "Cancel".
      $(document).on("click",".scheduled-transition span a", function(){
        if($('transitionset').children().length < 3) {
          $('.field--name-moderation-state .scheduler-field-warning').hide();
        }
      });
      // Show warning message in pagebuilder.
      if (drupalSettings.non_existent_users_management.scheduler_warning) {
        var message = drupalSettings.non_existent_users_management.scheduler_warning.message;
        $(document).ajaxComplete(function (e) {
          if ($("body").hasClass('ssa-page-builder-enabled')) {
            if ($('body').find('.form-scheduler-warning').length == 0) {
              $("body .dialog-off-canvas-main-canvas").prepend('<div class="form-scheduler-warning">' + message + '</div>');
            }
          }
        });
      }
    }
  }

})(jQuery, Drupal, drupalSettings);