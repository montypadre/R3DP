<?php
if ( defined( 'WPB_VC_VERSION' ) )
{
  vc_map( array(
     "name" => esc_html__("Image Hover","threed"),
     "base" => "threed_image_hover",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array(

                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Section Title", "threed"),
                       "param_name" => "threed_image_hover_section_title",
                       "description" => esc_html__("Title will be shown in section", "threed"),
                    ),

                    array(
                       "type" => "attach_images",
                       "heading" => esc_html__("Gallery Images", "threed"),
                       "param_name" => "threed_image_hover_images",
                    ),
                    array(
                       "type" => "dropdown",
                       "holder" => "div",
                       "class" => "",
                       "heading" => esc_html__("Hover Effect", "threed"),
                       "param_name" => "threed_image_hover_effects",
                       'value' => array( "Effect 1", "Effect 2", "Effect 3", "Effect 4", "Effect 5", "Effect 6", "Effect 7", "Effect 8", "Effect 9","Effect 10"),
                       'std' => 'Effect 1',
                       "description" => esc_html__("hover effects", "threed")
                    ),
                    /*** TITLE SECTION STARTS **/
                    array(
                       "type" => "textarea_raw_html",
                       "heading" => esc_html__("Title", "threed"),
                       'holder' => 'div',
                       "description" => esc_html__("html tags allowed", "threed"),
                       "param_name" => "threed_image_hover_title",
                       'value' => base64_encode( 'Title <span> Here</span' ),
                       "group" => esc_html__( "Title Options", "threed" ),
                    ),
                    array(
                       "type" => "colorpicker",
                       "heading" => esc_html__("Title Color", "threed"),
                       "param_name" => "threed_image_hover_title_color",
                       "group" => esc_html__( "Title Options", "threed" ),
                    ),
                    array(
                       "type" => "colorpicker",
                       "heading" => esc_html__("Title Background Color", "threed"),
                       "param_name" => "threed_image_hover_title_bgcolor",
                       "group" => esc_html__( "Title Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 5')),
                    ),
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Title Class", "threed"),
                       "param_name" => "threed_image_hover_title_class",
                       "group" => esc_html__( "Title Options", "threed" ),
                    ),
                    /*** TITLE SECTION ENDS */

                    /*** SUBTITLE SECTION STARTS **/
                    array(
                       "type" => "textarea",
                       "heading" => esc_html__("Subtitle", "threed"),
                       "description" => esc_html__("html tags allowed", "threed"),
                       "param_name" => "threed_image_hover_subtitle",
                       "group" => esc_html__( "Subtitle Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 1','Effect 2','Effect 4','Effect 5','Effect 6','Effect 7','Effect 8','Effect 9','Effect 10')),
                    ),
                    array(
                       "type" => "colorpicker",
                       "heading" => esc_html__("Subtitle Color", "threed"),
                       "param_name" => "threed_image_hover_subtitle_color",
                       "group" => esc_html__( "Subtitle Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 1','Effect 2','Effect 4','Effect 5','Effect 6','Effect 7','Effect 8','Effect 9','Effect 10')),
                    ),
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Subtitle Class", "threed"),
                       "param_name" => "threed_image_hover_subtitle_class",
                       "group" => esc_html__( "Subtitle Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 1','Effect 2','Effect 4','Effect 5','Effect 6','Effect 7','Effect 8','Effect 9','Effect 10')),
                    ),

                    /*** SUBTITLE SECTION ENDS */

                    /***** SOCIAL OPRIONS **/
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Facebook", "threed"),
                       "param_name" => "threed_image_hover_fb",
                       "group" => esc_html__( "Social Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 5')),
                    ),
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Twitter", "threed"),
                       "param_name" => "threed_image_hover_twitter",
                       "group" => esc_html__( "Social Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 5')),
                    ),
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Google Plus", "threed"),
                       "param_name" => "threed_image_hover_gplus",
                       "group" => esc_html__( "Social Options", "threed" ),
                       "dependency" => array('element' => 'threed_image_hover_effects','value' => array('Effect 5')),
                    ),
                    /***** SOCIAL OPRIONS ENDS**/

                    array(
                        "type" => "css_editor",
                        "heading" => esc_html__( "Css", "threed" ),
                        "param_name" => "threed_image_hover_style",
                        "group" => esc_html__( "Style Options", "threed" ),
                    ),

              )
  ) );
}
