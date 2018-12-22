jQuery(document).ready(function ($){


        if(jQuery('input[name="_threed_page_hide_sidebar"]').is(':checked'))
        {
             $('#_threed_page_sidebar_position').prop('disabled', 'disabled');
        }

        jQuery('input[name="_threed_page_hide_sidebar"]').on('click', function()
        {

          if(jQuery('input[name="_threed_page_hide_sidebar"]').is(':checked'))
          {
              $('#_threed_page_sidebar_position').prop('disabled', 'disabled');
          }
          else
          {
            $('#_threed_page_sidebar_position').removeAttr('disabled');
          }
        });
        if(jQuery('input[name="_threed_page_transparent_menu"]').is(':checked'))
        {
            jQuery('.transparent-header-option').show();
        }
        else
        {
            jQuery('.transparent-header-option').hide();
        }

        jQuery('input[name="_threed_page_transparent_menu"]').on('click', function()
        {
              if(jQuery('input[name="_threed_page_transparent_menu"]').is(':checked'))
              {
                  jQuery('.transparent-header-option').show();
              }
              else
              {
                  jQuery('.transparent-header-option').hide();
              }
        });


          if(jQuery('#_threed_service_layout1').is(":checked"))
          {

              jQuery(".cmb2-id--threed-main-product-cat").show();
              jQuery(".cmb2-id--threed-woo-product-cat").hide();
          }
          else
          {
              if(jQuery('#_threed_service_layout2').is(":checked"))
              {
                  jQuery(".cmb2-id--threed-main-product-cat").hide();
                  jQuery(".cmb2-id--threed-woo-product-cat").show();
              }else{
                  jQuery(".cmb2-id--threed-main-product-cat").hide();
                  jQuery(".cmb2-id--threed-woo-product-cat").hide();
              }
          }

          jQuery('input[name="_threed_service_layout"]').on('change', function()
          {
                if(jQuery(this).val()=='layout-1')
                {

                  jQuery(".cmb2-id--threed-main-product-cat").show();
                  jQuery(".cmb2-id--threed-woo-product-cat").hide();
                }
                else
                {
                    if(jQuery(this).val()=='layout-2')
                    {
                        jQuery(".cmb2-id--threed-main-product-cat").hide();
                        jQuery(".cmb2-id--threed-woo-product-cat").show();
                    }else{
                        jQuery(".cmb2-id--threed-main-product-cat").hide();
                        jQuery(".cmb2-id--threed-woo-product-cat").hide();
                    }
                }
          });

          jQuery('#_threed_page_footer_type').on('change', function()
          {
              if(jQuery(this).val()==0 || jQuery(this).val()==1 || jQuery(this).val()==2)
              {
                  jQuery('.footer-bg-settings').show();
              }
              else
              {
                  jQuery('.footer-bg-settings').hide();
              }
          });

          if(jQuery('#_threed_page_footer_type :selected').text()=='No Footer')
          {
              jQuery('.footer-bg-settings').hide();
          }
          else
          {
              jQuery('.footer-bg-settings').show();
          }

          /***** FOR VC ELEMENTS **/
          if(jQuery('#_threed_service_vc_image1').is(":checked")){

              jQuery(".cmb2-id--threed-service-vc-featured-image").show();
              jQuery(".cmb2-id--threed-service-vc-slider").hide();
          }
          else
          {
              jQuery(".cmb2-id--threed-service-vc-featured-image").hide();
              jQuery(".cmb2-id--threed-service-vc-slider").show();
          }
          jQuery('input[name="_threed_service_vc_image"]').on('change', function()
          {

              if(jQuery(this).val()=='slider')
              {

                jQuery(".cmb2-id--threed-service-vc-featured-image").hide();
                jQuery(".cmb2-id--threed-service-vc-slider").show();
              }
              else
              {
                jQuery(".cmb2-id--threed-service-vc-featured-image").show();
                jQuery(".cmb2-id--threed-service-vc-slider").hide();
              }
          });
      //End layout cmb2

        /**** SERVICE FORM SECTION ***/
        if(jQuery("#_threed_form_type2").is(":checked")==true)
        {
          jQuery(".cmb2-id--threed-cf7-shortcode").show();
        }
        else
        {
          jQuery(".cmb2-id--threed-cf7-shortcode").hide();
        }
        jQuery("#_threed_form_type2").on('click',function()
        {
            if(jQuery("#_threed_form_type2").is(":checked")==true)
            {
               jQuery(".cmb2-id--threed-cf7-shortcode").show();
            }

        });
        jQuery("#_threed_form_type1").on('click',function()
        {
           jQuery(".cmb2-id--threed-cf7-shortcode").hide();
        });

        //start service Icon
        if(jQuery('#_threed_service_icon_type :selected').text()=='Uploaded Image')
        {
            jQuery(".service_font_icon").hide();
            jQuery(".service_upload_image").show();
        }
        else
        {

            jQuery(".service_font_icon").show();
            jQuery(".service_upload_image").hide();
        }

        var $ptemplate_select = jQuery('select#page_template');
        var matabox_val=$ptemplate_select.val();

        switch (matabox_val ) {
                  case 'page_templates/page-main-product-download-file.php':
                       jQuery('#_threed_page_download_files_metabox').css('display','block');
                       break;

                  default:
                      jQuery('#_threed_page_download_files_metabox').css('display','none');
                      break;

        }
        $ptemplate_select.live('change',function(){
          var this_value = jQuery(this).val();
              switch ( this_value ) {
                  case 'page_templates/page-main-product-download-file.php':
                       jQuery('#_threed_page_download_files_metabox').css('display','block');
                       break;

                  default:
                      jQuery('#_threed_page_download_files_metabox').css('display','none');
                      break;

              }
          });


          jQuery('#_threed_service_icon_type').on('change', function()
          {

            if(jQuery('#_threed_service_icon_type :selected').text()=='Uploaded Image')
            {
              jQuery(".service_upload_image").show();
              jQuery(".service_font_icon").hide();

            }
            else{
               jQuery(".service_font_icon").show();
               jQuery(".service_upload_image").hide();
            }
          });

          jQuery(document).ready(function ($)
          {

              displayMetaboxes();
              // Show/hide metaboxes on change event
              jQuery("input[name='post_format']").change(function() {
                 displayMetaboxes();

              });
              jQuery('.col-4-shop,#opt-grid-number_3').on('click',function(){

                jQuery('#opt-shop-layout_3').closest('label').removeClass('redux-image-select-selected');
                jQuery('#opt-shop-layout_2').closest('label').removeClass('redux-image-select-selected');
                jQuery('#opt-shop-layout_1').attr('checked','checked').closest('label').addClass('redux-image-select-selected');

              });
              jQuery('#opt-shop-layout_3, #opt-shop-layout_2').on('click',function(){

                jQuery('#opt-grid-number_3').closest('label').removeClass('redux-image-select-selected');
                if(!jQuery('#opt-grid-number_2').attr('checked'))
                {
                  jQuery('#opt-grid-number_1').attr('checked','checked').closest('label').addClass('redux-image-select-selected');
                }
              });

          });

          function displayMetaboxes()
          {

                var selectedElt = jQuery("input[name='post_format']:checked").attr("id");
                switch(selectedElt)
                {

                  case 'post-format-gallery':
                              jQuery('#threed_video_post_format_metabox').css('display','none');
                              jQuery('#threed_gallery_post_format_metabox').css('display','block');
                              break;


                  case 'post-format-video':

                              jQuery('#threed_video_post_format_metabox').css('display','block');
                              jQuery('#threed_gallery_post_format_metabox').css('display','none');
                              break;

                  case 'post-format-0':
                  default :

                            jQuery('#threed_gallery_post_format_metabox').css('display','none');
                            jQuery('#threed_video_post_format_metabox').css('display','none');
                              break;
                }
          }
  //end service Icon
});
