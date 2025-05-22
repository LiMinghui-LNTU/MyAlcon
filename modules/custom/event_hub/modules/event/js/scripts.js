(function ($, Drupal) {
  'use strict';

  /**
   * Initialize slider for the Featured events component on Events Homepage.
   */
  Drupal.behaviors.initFeaturedEventsSlider = {
    attach: function (context, settings) {
      var $slider_wrapper = $('.coh-style-a-featured-events-slider');
      $slider_wrapper.find('.list').slick({
        dots: true,
        infinite: true,
        adaptiveHeight: true,
        appendArrows: $slider_wrapper.find('.controls'),
        appendDots: $slider_wrapper.find('.controls'),
        responsive: [
          {
            breakpoint: 767,
            settings: {
              arrows: false,
            },
          }
        ],
      });
    }
  };

  /**
   * Initialize slider for the Upcoming events component on Events Homepage.
   */
  Drupal.behaviors.initUpcomingEventsSlider = {
    attach: function (context, settings) {
      var $slider_wrapper = $('.coh-style-a-upcoming-events-view-hp, .coh-style-a-upcoming-events-view-filters');
      var $slider = $slider_wrapper.find('.list');

      $(window).on('load resize orientationchange', function() {
        if ($(window).width() > 768) {
          if ($slider.hasClass('slick-initialized')) {
            $slider.slick('unslick');
          }
        }
        else {
          if (!$slider.hasClass('slick-initialized')) {
            $slider.slick({
              dots: true,
              arrows: false,
              infinite: true,
              adaptiveHeight: true,
              appendDots: $slider_wrapper.find('.controls')
            });
          }
        }
      });
    }
  };

} (jQuery, Drupal));
