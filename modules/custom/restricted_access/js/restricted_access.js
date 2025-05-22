(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.restrictedBehavior = {
    attach: function (context) {

      /* -------------- Get Cookie value --------------*/
      Drupal.getCookie = function(name) {
        function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
        var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
        return match ? match[1] : null;
      }

      var settingsurl = drupalSettings.restricted_access.restricted_access_js;
      var restrictedAction = settingsurl.restrictedAction;
      if (restrictedAction == 'restrictedPage') {
        var baseUrls = settingsurl.baseUrls;
        $('#restricted_btn').click(function() {
          var date = new Date();
          date.setTime(date.getTime()+(24*60*60*1000));
          var expires = "; expires="+date.toGMTString();
          document.cookie = "accessPageExpiry="+expires+"; path=/";

          var redirectAccessPath = "redirectAccessPath";
          var redirectLocation = Drupal.getCookie(redirectAccessPath);
          if(redirectLocation == null) {
            redirectLocation = '/';
          }
          window.location.href = baseUrls + decodeURIComponent(redirectLocation);
        });
      }
      else if (restrictedAction == 'restrictedPopup') {
        var display = settingsurl.display;
        var accessPageExpiry = 'accessPageExpiry';
        accessPageExpiry = Drupal.getCookie(accessPageExpiry);
        if ((display == 'yes') && (accessPageExpiry == null || accessPageExpiry == 'granted')) {
          $("#openPopup").trigger("click");
          $(".hide-body-content-load").css('z-index', 990);
          var tealiumid = document.getElementById("__tealiumGDPRecModal");
          if(tealiumid != null) {
            tealiumid.removeAttribute("aria-hidden");
            tealiumid.removeAttribute("inert");
          }
        }
        jQuery("body").on("keydown", function(e){
          if (e.which === 27){
            if(display == 'yes') {
              document.getElementById("modal-id-restricted-access").removeAttribute("hidden");
              return false;
            }
          }
        });

        jQuery(document).ready(function() {
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
      }
    }
  };
})(jQuery, Drupal, drupalSettings);
