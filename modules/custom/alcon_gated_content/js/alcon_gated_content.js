(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.gatedBehavior = {
    attach: function (context) {
      $(".hide-body-content-load").css('z-index', 990);
      var tealiumid = document.getElementById("__tealiumGDPRecModal");
      if(tealiumid != null) {
        tealiumid.removeAttribute("aria-hidden");
        tealiumid.removeAttribute("inert");
      }
      
      jQuery("body").on("keydown", function(e){
        if (e.which === 27){
          if(display == 'yes') {
            document.getElementById("model-id-gated-content-form-standard").removeAttribute("hidden");
            return false;
          }
        }
      });

      jQuery(document).ready(function() {
        $("#openPopup").trigger("click");
        jQuery('.coh-container #tiid').click(function() {
          var date = new Date();
          date.setTime(date.getTime()+(24*60*60*1000));
          var expires = "; expires="+date.toGMTString();
          document.cookie = "accessPageExpiry="+expires+"; path=/";
          jQuery(".hide-body-content-load").hide();
          jQuery("#openPopup").hide();
          location.reload();
        });
        jQuery(".hide-body-content-load").hide();
        jQuery("#openPopup").hide();
      });

      function triggerTealium() {
        var tealiumurl =  window.location.toString();
        var current_alias = window.location.pathname;
        $.ajax({
          url: Drupal.url('sendtealium'),
          type: "POST",
          data: JSON.stringify({'current_url': tealiumurl, 'current_alias': current_alias}),
          dataType: "json",
          success: function(response) {
            console.log(response);
          }
        });
      };

      const navigationEntry = window.performance.getEntriesByType('navigation')[0];
      const navigationType = navigationEntry.type;
      jQuery(document).ready(function() {
        const navigationEntry = window.performance.getEntriesByType('navigation')[0];
        const navigationType = navigationEntry.type;
        if (navigationType != 'reload' && navigationType != 'back_forward') {
          triggerTealium();
        }
      });

    }
  };
})(jQuery, Drupal, drupalSettings);