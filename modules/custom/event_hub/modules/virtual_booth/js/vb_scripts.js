(function ($, Drupal) {
  'use strict';

  /**
   * Add functionality for custom prev/next slider arrows.
   */
  Drupal.behaviors.initSliderCustomArrows = {
    attach: function (context, settings) {
      if ($('.coh-style-a-virtualbooth-slider-section').length) {
        $('.coh-style-a-virtualbooth-slider-section').each(function() {
          let $container = $('.coh-style-a-virtualbooth-slider-section');

          $container.find('.vb-custom-arrow-left').click(function() {
            $container.find('.slick-prev').click();
          });
          $container.find('.vb-custom-arrow-right').click(function() {
            $container.find('.slick-next').click();
          });
        });
      }
    }
  };

  /**
   * Prevent playing video after slide change.
   */
  Drupal.behaviors.stopVideoOnSlideChange = {
    attach: function (context, settings) {
      setTimeout(function() {
        let $slider = $('.coh-style-a-virtualbooth-slider-section .slick-slider');
        if ($slider.length) {
          if ($slider.hasClass('slick-initialized')) {
            $slider.on('beforeChange', function (event, slick, direction) {
              reloadIframe();
            });
            $slider.on('afterChange', function (event, slick, direction) {
              reloadIframe();
            });
          }
        }
      }, 1000);
    }
  };

  /**
   * Switch video player source by click on video list item.
   */
  Drupal.behaviors.switchVideoOnVideoList = {
    attach: function (context, settings) {
      if ($('.coh-style-a-virtualbooth-videos').length) {
        $('.coh-style-a-virtualbooth-videos').each(function() {
          let $container = $(this);
          let $video_iframe = $container.find('.video-container iframe');
          let $fallback_img = $container.find('.textimage-container .fallback-image-container');
          let $video_item = $container.find('.videos-list .video-item');
          let $video_item_first = $video_item.first();

          if ($video_item_first.hasClass('document')) {
            let video_url = $(this).find('.document-link-container a').attr('href');
            $video_iframe.attr('src', video_url);
          }

          $video_item.click(function() {
            if ($(this).hasClass('document')) {
              // Prevent playing video when switch to Document.
              reloadIframe();
              // For output PDF in the iframe.
              // let video_url = $(this).find('.document-link-container a').attr('href');
              // $video_iframe.attr('src', video_url);
              if ($fallback_img.find('.open-icon').length) {
                let document_url = $(this).find('.document-link-container a').attr('href');
                $fallback_img.find('.open-icon a').attr('href', document_url);
              }
              else {
                let document_link = $(this).find('.document-link-container').html();
                $fallback_img.prepend(document_link);
              }
              if ($(this).find('.document-fallback-image img').length) {
                let fallback_img_url = $(this).find('.document-fallback-image img').attr('src');
                let fallback_img_alt = $(this).find('.document-fallback-image img').attr('alt');
                $fallback_img.find('img').attr('src', fallback_img_url);
                $fallback_img.addClass('document');
                if (fallback_img_alt.length) {
                  $fallback_img.find('img').attr('alt', fallback_img_alt);
                }
              }
            }
            else {
              let video_url = $(this).data('ustudio-url');
              $video_iframe.attr('src', video_url);
              $fallback_img.removeClass('document');
            }
          });
          $video_item.find('.play-link').click(function(e) {
            e.preventDefault();
          });
          $video_item.find('.open-link').click(function(e) {
            e.preventDefault();
          });

          // For output PDF in the iframe.
          // $fallback_img.find('.open-icon').click(function() {
          //   $(this).closest('.fallback-image-container.document').removeClass('document');
          // });
        });
      }
    }
  };

  /**
   * VB slider cards activation functionality for mobile devices.
   */
  Drupal.behaviors.componentsMobileActivation = {
    attach: function (context, settings) {
      // Welcome Card for VB
      const component_classes = [
        '.coh-style-a-virtualbooth-welcome',
        '.coh-style-a-virtualbooth-videos',
        '.coh-style-a-virtualbooth-panelists',
      ];
      component_classes.forEach(component_class => {
        if ($(component_class).length) {
          $(component_class + ' .card-button').click(function(e) {
            if ($(window).width() <= 768) {
              let $container = $(this).closest(component_class);
              if (!$container.hasClass('mobile-active')) {
                e.preventDefault();
                $container.addClass('mobile-active');
                if (component_class == '.coh-style-a-virtualbooth-panelists') {
                  let label_active = $(this).data('text');
                  if (label_active !== "") {
                    $(this).text(label_active);
                  }
                }
              }
            }
          });
        }
      });
    }
  };

  /**
   * Change Panelist's button label depending on activation.
   */
  Drupal.behaviors.panelistMobileActivation = {
    attach: function (context, settings) {
      if ($('.coh-style-a-virtualbooth-panelists').length) {
        $('.coh-style-a-virtualbooth-panelists').each(function() {
          let $container = $(this);
          let $button = $container.find('.card-button');
          let label_unactive = $button.data('mobile-unactive-text');
          let label_active = $button.data('text');

          $(window).on('load resize orientationchange', function() {
            if ($(window).width() > 768) {
              $container.removeClass('mobile-active');
              if (label_active !== "") {
                $button.text(label_active);
              }
            }
            else {
              if (!$container.hasClass('mobile-active')) {
                if (label_unactive !== "") {
                  $button.text(label_unactive);
                }
              }
            }
          });
        });
      }
    }
  };

  /**
   * Adjust max height of scrollable areas in Virtual Booth page's slides.
   */
  Drupal.behaviors.setSliderScrollableContainersHeight = {
    attach: function (context, settings) {
      setTimeout(function() {
        let $slider = $('.coh-style-a-virtualbooth-slider-section .slick-slider');

        if ($slider.length) {
          if ($slider.hasClass('slick-initialized')) {
            setScrollableHeight();

            $slider.on('beforeChange', function (event, slick, direction) {
              setScrollableHeight();
            });
            $slider.on('afterChange', function (event, slick, direction) {
              setScrollableHeight();
            });

            $(window).on('load resize orientationchange', function() {
              if ($(window).width() > 768) {
                setScrollableHeight();
              }
              else {
                resetScrollableHeight();
              }
            });
          }
        }
      }, 1000);
    }
  };

  function reloadIframe () {
    const iframe_class = '.slick-current .content-iframe-ustudio';
    if ($(iframe_class).length) {
      $(iframe_class).each(function() {
        let video_url = $(this)[0].src;
        $(this).attr('src', video_url);
      });
    }
  }

  function setScrollableHeight() {
    if ($(window).width() > 768) {
      let $slider = $('.coh-style-a-virtualbooth-slider-section .slick-current');
      let $videos_container = $slider.find('.coh-style-a-virtualbooth-videos');
      let $panelist_container = $slider.find('.coh-style-a-virtualbooth-panelists');

      $videos_container.each(function() {
        let $scrollable_element = $(this).find('.videos-list');
        let $sibling = $(this).find('.textimage-container');

        let parent_height = $scrollable_element.parent().height();
        let sibling_height = $sibling.height();
        let scr_margin_top = parseInt($scrollable_element.css('margin-top'));
        let scr_margin_bottom = parseInt($scrollable_element.css('margin-bottom'));
        let scrollable_height = parent_height - sibling_height - scr_margin_top - scr_margin_bottom;
        $scrollable_element.css('max-height', scrollable_height + 'px');
      });
      $panelist_container.each(function() {
        let $scrollable_element_one = $panelist_container.find('.main-col .card-content');
        let $sibling = $scrollable_element_one.parent().find('.card-image.coh-style-a-card-image-for-desktop');

        let parent_height = $scrollable_element_one.parent().height();
        let sibling_height = $sibling.height();
        let scrollable_height = parent_height - sibling_height;
        $scrollable_element_one.css('max-height', scrollable_height + 'px');

        let $scrollable_element_two = $panelist_container.find('.panelists-col');
        let parent_two_height = $scrollable_element_two.parent().height();
        $scrollable_element_two.css('max-height', parent_two_height + 'px');
      });
    }
  }

  function resetScrollableHeight() {
    let $slider = $('.coh-style-a-virtualbooth-slider-section .slick-current');
    let $videos_container = $slider.find('.coh-style-a-virtualbooth-videos');
    let $panelist_container = $slider.find('.coh-style-a-virtualbooth-panelists');

    $videos_container.each(function() {
      $(this).find('.videos-list').css('max-height', '');
    });
    $panelist_container.each(function() {
      $panelist_container.find('.main-col .card-content').css('max-height', '');
      $panelist_container.find('.panelists-col').css('max-height', '');
    });
  }

} (jQuery, Drupal));
