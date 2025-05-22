/**
 * @file
 * Custom JavaScript functionality.
 */
(function($, Drupal) {
  Drupal.behaviors.Article = {
    attach: function (context, settings) {

      // print functionality.
      $('.print-page').on('click', function(){
        window.print();
      });

      // Count in BEF list.
      var linum = $(".bef-exposed-form ul li").length;
      if (linum > 6) {
        $(".bef-exposed-form ul").addClass('better-exposed-filter-large');
      }

      // Count in Cat list.
      var catlinum = $(".coh-style-a-article-lobby-tab ul.kc-cat-items li").length;
      if (catlinum > 6) {
        $(".coh-style-a-article-lobby-tab ul.kc-cat-items").addClass('better-exposed-filter-large');
      }

      // Trigger click event as per Category item.
      $(".coh-style-a-article-lobby-tab ul.kc-cat-items li a").click(function() {
        var index = $(this).parent().index();

        // Add active/selected class.
        $(".coh-style-a-article-lobby-tab ul.kc-cat-items li a").removeClass("selected");
        $(".coh-style-a-article-lobby-tab ul.kc-cat-items li").removeAttr("id");
        $(this).addClass("selected");
        $(this).parent().attr('id', "selecteditem");

        // Get the text of selected li.
        var menuText = $(this).text();

        // Check for First LI element.
        if (index == 0) {
          $('#views-exposed-form-article-lobby-article-lobby .bef-links ul > li:first a').trigger('click');
          $('#views-exposed-form-article-lobby-professional-article-lobby .bef-links ul > li:first a').trigger('click');
        }
        else {
          // Trigger click event as per selected menu item.
          $("#views-exposed-form-article-lobby-article-lobby ul li a").each(function(){
            var exposedMenuText = $(this).text();
            if (exposedMenuText === menuText) {
              $(this).trigger("click");
            }
          });
          // Professional Trigger click event as per selected menu item.
          $("#views-exposed-form-article-lobby-professional-article-lobby ul li a").each(function(){
            var exposedMenuText = $(this).text();
            if (exposedMenuText === menuText) {
              $(this).trigger("click");
            }
          });
        }
      });

      // Only scroll if item on the tab menu kc-cat-items is clicked

      let scrollTab = false;
      let catItems = document.querySelectorAll(".kc-cat-items li");
      catItems.forEach(function(catItem) {
        catItem.addEventListener("click", function() {
          scrollTab = true;
        });
      });


      // Ajax complete functionality.
      $(document).ajaxComplete(function(ev) {
        // Slide to viewport.
        
        if (scrollTab) {
          const clicking_item = document.getElementById('selecteditem');
          if (clicking_item) {
            clicking_item.scrollIntoView({behavior: "smooth", block: "nearest", inline: "nearest"});
          }
        }
        scrollTab = false;


        // Count in BEF list.
        var linum = $(".bef-exposed-form ul li").length;
        if (linum > 6) {
          $(".bef-exposed-form ul").addClass('better-exposed-filter-large');
        }

        // Count in Cat list.
        var catlinum = $(".coh-style-a-article-lobby-tab ul.kc-cat-items li").length;
        if (catlinum > 6) {
          $(".coh-style-a-article-lobby-tab ul.kc-cat-items").addClass('better-exposed-filter-large');
        }
      });
    }
  };
}(jQuery, Drupal));
