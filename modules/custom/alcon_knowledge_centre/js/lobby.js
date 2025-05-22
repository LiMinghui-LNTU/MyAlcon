/**
 * @file
 * Custom JavaScript functionality.
 */
 (function($, Drupal) {
  Drupal.behaviors.lobbyArticle = {
    attach: function (context, drupalSettings) {
      // Scroll to Top functionality.
      $('#scroll-top').on('click', function(){
        $("html, body").animate({ scrollTop: 0 }, "slow");
      });
    }
  };
}(jQuery, Drupal));