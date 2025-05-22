/**
 * @file
 * Custom JavaScript functionality.
 */
 (function($, Drupal) {
    Drupal.behaviors.Articleadmin = {
      attach: function (context, settings) {
      // hide/show of category fields based on article type field
      $(window).on('load', function () {
        $('.form-item-field-category label').addClass('js-form-required form-required');
        $('.form-item-field-article-category-professio label').addClass('js-form-required form-required');
        var type = $('#edit-field-article-type').val();
        if(type == 'professional'){
          $('#edit-field-category-wrapper').hide();
          $('#edit-field-tag-wrapper').hide();
          $('#edit-field-article-category-professio-wrapper').show();
          $('#edit-field-tag-professional-wrapper').show();
        }
        else if (type == 'news') {
          $('#edit-field-category-wrapper').hide();
          $('#edit-field-tag-wrapper').hide();
          $('#edit-field-article-category-professio-wrapper').hide();
          $('#edit-field-tag-professional-wrapper').hide();
        }
        else {
          $('#edit-field-category-wrapper').show();
          $('#edit-field-tag-wrapper').show();
          $('#edit-field-article-category-professio-wrapper').hide();
          $('#edit-field-tag-professional-wrapper').hide();
          $('#edit-field-category').prop('required',true);
        }    
      });
      $('#edit-field-article-type').on('change', function() {
        if(this.value == 'professional') {
          $('#edit-field-category-wrapper').hide();
          $('#edit-field-tag-wrapper').hide();
          $('#edit-field-article-category-professio-wrapper').show();
          $('#edit-field-tag-professional-wrapper').show();
        }
        else if (this.value == 'news') {
          $('#edit-field-category-wrapper').hide();
          $('#edit-field-tag-wrapper').hide();
          $('#edit-field-article-category-professio-wrapper').hide();
          $('#edit-field-tag-professional-wrapper').hide();
        }
        else {
          $('#edit-field-category-wrapper').show();
          $('#edit-field-tag-wrapper').show();
          $('#edit-field-article-category-professio-wrapper').hide();
          $('#edit-field-tag-professional-wrapper').hide();
          $('#edit-field-category').prop('required',true);
        }
      });      
      }
    };
  }(jQuery, Drupal));
  