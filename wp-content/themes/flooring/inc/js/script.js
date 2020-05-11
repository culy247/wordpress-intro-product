jQuery(document).ready(function ($) {
  "use strict";
var $input_gallery_items, $thumbs_wrap;
  var $upload_button = jQuery('.wd-gallery-upload');



  var flooring_font_family = "";
  var flooring_font_weight = "";
  var flooring_font_subsets = "";


  $("#tabs-2 select.font_familly").on('change',function () {
    flooring_font_family = $(this).find(":selected").val();

    $("#wd-google-fonts-css").attr("href", "http://fonts.googleapis.com/css?family=" + flooring_font_family + ":" + flooring_font_weight + "&subset=" + flooring_font_subsets);
    $(this).closest("tbody").find("p").css("font-family", flooring_font_family);
    $(this).closest("tbody").find("h2").css("font-family", flooring_font_family);
    $(this).closest("tbody").find("ul li").css("font-family", flooring_font_family);
  });

  $("#tabs-2 select.font_weight").on('change',function () {
    flooring_font_family = $(this).find(":selected").val();

    $(this).closest("tbody").find("p").css("font-weight", flooring_font_family);
    $(this).closest("tbody").find("h2").css("font-weight", flooring_font_family);
    $(this).closest("tbody").find("ul li").css("font-weight", flooring_font_family);
  });


  $("#tabs-2 select.text_transform").on('change',function () {
    flooring_font_family = $(this).find(":selected").val();

    $(this).closest("tbody").find("p").css("text-transform", flooring_font_family);
    $(this).closest("tbody").find("h2").css("text-transform", flooring_font_family);
    $(this).closest("tbody").find("ul li").css("text-transform", flooring_font_family);
  });

  $("#tabs-2 select.text_size").on('change',function () {
    flooring_font_family = $(this).find(":selected").val();
    $(this).closest("tbody").find("p").css("font-size", flooring_font_family + 'px');
    $(this).closest("tbody").find("h2").css("font-size", flooring_font_family + 'px');
    $(this).closest("tbody").find("ul li").css("font-size", flooring_font_family + 'px');
  });

  $("#tabs-2 select.font_subsets").on('change',function () {
    flooring_font_family = $(this).find(":selected").val();
    $("#wd-google-fonts-css").attr("href", "http://fonts.googleapis.com/css?family=" + flooring_font_family + ":" + flooring_font_weight + "&subset=" + flooring_font_subsets);
  });


  $('#flooring_show_adress_bar').on('change', function () {
    console.log($(this).attr("checked"));
    if ($(this).attr("checked")) {
      $('.address_bar_item').removeClass('hidden_item');
    } else {
      $('.address_bar_item').addClass('hidden_item');
    }
  });

  $('.wd-color-picker').colorpicker(
      {format: 'rgba'}
  );

  //---------------logo script-----------
  jQuery('#flooring_upload_btn').on('click',function () {
    wp.media.editor.send.attachment = function (props, attachment) {
      jQuery('#flooring_logo_path').val(attachment.url);
    }
    wp.media.editor.open(this);

    return false;
  });

  //---------------footer bg script-----------
  jQuery('#flooring_upload_bg_btn').on('click',function () {
    wp.media.editor.send.attachment = function (props, attachment) {
      jQuery('#flooring_footer_bg_path').val(attachment.url);
    }
    wp.media.editor.open(this);

    return false;
  });

  //------single background post script-----
  jQuery('#flooring_upload_single_post').on('click',function () {
    wp.media.editor.send.attachment = function (props, attachment) {
      jQuery('#flooring_bg_single_post_path').val(attachment.url);
    }
    wp.media.editor.open(this);
    return false;
  });
  //------tile background for pages-----
  jQuery('#flooring_upload_title_page_bg').on('click',function () {
    wp.media.editor.send.attachment = function (props, attachment) {
      jQuery('#flooring_bg_single_page').val(attachment.url);
    }
    wp.media.editor.open(this);
    return false;
  });

  //-------------------------------------
  if (wp.media !== undefined) {
    wp.media.customlibEditGallery = {

      frame: function () {

        if (this._frame)
          return this._frame;

        var selection = this.select();

        this._frame = wp.media({
          id: 'flooring_portfolio-image-gallery',
          frame: 'post',
          state: 'gallery-edit',
          title: wp.media.view.l10n.editGalleryTitle,
          editing: true,
          multiple: true,
          selection: selection
        });

        this._frame.on('update', function () {

          var controller = wp.media.customlibEditGallery._frame.states.get('gallery-edit');
          var library = controller.get('library');
          // Need to get all the attachment ids for gallery
          var ids = library.pluck('id');

          $input_gallery_items.val(ids);

          jQuery.ajax({
            type: "post",
            url: ajaxurl,
            data: "action=flooring_gallery_upload_get_images&ids=" + ids,
            success: function (data) {

              $thumbs_wrap.empty().html(data);

            }
          });

        });

        return this._frame;
      },

      init: function () {

        $upload_button.on('click',function (event) {

          $thumbs_wrap = $(this).next();
          $input_gallery_items = $thumbs_wrap.next();

          event.preventDefault();
          wp.media.customlibEditGallery.frame().open();

        });
      },

      // Gets initial gallery-edit images. Function modified from wp.media.gallery.edit
      // in wp-includes/js/media-editor.js.source.html
      select: function () {

        var shortcode = wp.shortcode.next('gallery', '[gallery ids="' + $input_gallery_items.val() + '"]'), defaultPostId = wp.media.gallery.defaults.id, attachments, selection;

        // Bail if we didn't match the shortcode or all of the content.
        if (!shortcode)
          return;

        // Ignore the rest of the match object.
        shortcode = shortcode.shortcode;

        if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId))
          shortcode.set('id', defaultPostId);

        attachments = wp.media.gallery.attachments(shortcode);
        selection = new wp.media.model.Selection(attachments.models, {
          props: attachments.props.toJSON(),
          multiple: true
        });

        selection.gallery = attachments.gallery;

        // Fetch the query's attachments, and then break ties from the
        // query to allow for sorting.
        selection.more().done(function () {
          // Break ties with the query.
          selection.props.set({
            query: false
          });
          selection.unmirror();
          selection.props.unset('orderby');
        });

        return selection;

      },
    };
  }


  if (wp.media !== undefined) {
    $(wp.media.customlibEditGallery.init);
  }


  /*--------------------------------------*/
  var curent_sreen = '';

  function flooring_add_ckeckbox_class() {
    curent_sreen = $("input:radio[name='flooring_start_screan']:checked").val();
    $("input[name='flooring_start_screan']").parent().removeClass('selected');

    $("input[value='" + curent_sreen + "'][name='flooring_start_screan']").parent().addClass('selected');
  }


  $("#tabs").tabs(); //initialize tabs
  $(function () {
    $("#tabs").tabs({
      activate: function (event, ui) {
        var scrollTop = $(window).scrollTop(); // save current scroll position
        window.location.hash = ui.newPanel.attr('id'); // add hash to url
        $(window).scrollTop(scrollTop); // keep scroll at current position
      }
    });
  });
  // reload the form when the checkbox is changed
  flooring_add_ckeckbox_class();
  $('.flooring_start_screan').on('click',function (e) {
    if (curent_sreen != $(this).val()) {
      flooring_add_ckeckbox_class();
      $(this).closest('form').submit();
    }
  });

  if (typeof wp.media !== 'undefined') {

    var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;

    $('.uploader .button').on('click',function (e) {
      var send_attachment_bkp = wp.media.editor.send.attachment;
      var button = $(this);
      var id = button.attr('id').replace('_button', '');
      _custom_media = true;
      wp.media.editor.send.attachment = function (props, attachment) {
        if (_custom_media) {
          $("#" + id).val(attachment.url);
        } else {
          return _orig_send_attachment.apply(this, [props, attachment]);
        }
        ;
      };

      wp.media.editor.open(button);
      return false;
    });

    $('.add_media').on('click', function () {
      _custom_media = false;
    });

  }

  $('.logo_position').on('change', 'input[name=flooring_logo_position]:radio', function (e) {
    var input_value = $(this).attr('id');
    $('.logo_position label').removeClass("label_selected");
    $("." + input_value).addClass("label_selected");
  });
  $('.import-demo-screenshot').on('change', 'input[name=flooring_footer_columns]:radio', function (e) {
    var input_value = $(this).attr('id');
    $('.flooring_footer_columns label').removeClass("label_selected");
    $("." + input_value).addClass("label_selected");
  });

  $('.import-demo-screenshot').on('change', 'input[name=demo_screenshot]:radio', function (e) {
    var input_value = $(this).attr('id');
    $('.import-demo-screenshot label').removeClass("label_selected");
    $("." + input_value).addClass("label_selected");
  });
//---------page setting-----------
  $(function () {
    $('#flooring_page_title_area_style').on('change',function () {
      var selected = $(this).find(':selected').text();
      //alert(selected);
      if (selected == 'Standard Style') {
        $(".flooring_show_hide.float_left").hide();
      } else {
        $(".flooring_show_hide.float_left").show();
      }
      //$('#' + selected).show();
    }).change()
  });



});
