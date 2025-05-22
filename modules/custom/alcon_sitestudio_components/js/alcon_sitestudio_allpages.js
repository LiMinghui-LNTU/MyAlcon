// To include javascript to generic fixes please add comment with jira ticket at the begin and the end y 
(function ($) {

  $(document).ready(function () {
     // Tab component auto scroll for active item which is not in viewport
    $(".js-tab-scroll-viewport .coh-accordion-tabs-nav li a").click(function () {
        $(this)[0].scrollIntoView({
           behavior: "smooth", // or "auto" or "instant"
           block: "center", //"end" or "end"
           inline: "center"
         });
       });
  });     
    /* click on cllose button for sticky component */
    $(".coh-style-a-button-close-sticky-text-three-types").click(function () {
        $(this).parent().addClass("close");
      });
/* sticky top component */
var top_header_height = $(".coh-style-a-cpt-header-level-1").height();
$(".sticky-top").css('top',top_header_height);
$(window).scroll(function() {
    var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    var top_of_screen = $(window).scrollTop();
    var top_of_header = $(".coh-style-a-cpt-header-level-1").offset().top;
    var bottom_of_header = $(".coh-style-a-cpt-header-level-1").offset().top + $(".coh-style-a-cpt-header-level-1").outerHeight();
  /* check header menu is visible or not */
    if ((bottom_of_screen > top_of_header) && (top_of_screen < bottom_of_header)){
        $(".sticky-top").css('top',top_header_height);
    } else {
        $(".sticky-top").css('top','0');
    }

    /* sticky-anywhere div is visible or not */
    if($(".coh-style-a-component-sticky-text-three-types").length){
        var top_of_element = $(".sticky-anywhere").offset().top;
        var bottom_of_element = $(".sticky-anywhere").offset().top + $(".sticky-anywhere").outerHeight();
        if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
            $(".sticky-anywhere").css('top','80px');
        } else {
            $(".sticky-anywhere").css('top','0');
        }
    }    
});

      // Tab component auto scroll for active item which is not in viewport
      $(document).ajaxComplete(function(ev) {
        // Slide to viewport.
        $(".js-tab-scroll-viewport .coh-accordion-tabs-nav li a").click(function () {
            $(this)[0].scrollIntoView({
               behavior: "smooth", // or "auto" or "instant"
               block: "center", //"end" or "end"
               inline: "center"
             });
           });
      });
})(jQuery);
