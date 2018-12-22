<?php
if ( defined( 'WPB_VC_VERSION' ) )
{
  vc_map( array(
     "name" => esc_html__("Services Elements","threed"),
     "base" => "threed_services",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array(
                /*** TITLE SECTION STARTS **/
                array(
                   "type" => "textarea",
                   "heading" => esc_html__("Title", "threed"),
                   "param_name" => "threed_service_title",
                   "group" => esc_html__( "Title Options", "threed" ),
                ),
                array(
                  "type" => "font_container",
                  "param_name" => "threed_service_title_font_container",
                  "settings" => array(
                    "fields" => array(
                      "font_size",
                      "color",
                      "text_align",
                      "tag_description" => esc_html__( "Select element tag.", "threed"  ),
                      "text_align_description" => esc_html__( "Select text alignment.", "threed"  ),
                      "font_size_description" => esc_html__( "Enter font size.", "threed"  ),
                      "color_description" => esc_html__( "Select heading color.", "threed"  ),
                    ),
                  ),
                  "group" => esc_html__( "Title Options", "threed" ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Title Class", "threed"),
                   "param_name" => "threed_service_title_class",
                   "group" => esc_html__( "Title Options", "threed" ),

                ),
                /*** TITLE SECTION ENDS */

                /***** POST OPTION STARTED  */
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Post Order", "threed"),
                   "param_name" => "threed_service_post_order",
                   "value" => array( "ASC", "DESC","IDS" ),
                   "description" => esc_html__("Select Post order to show", "threed"),
                   "group" => esc_html__( "Post Options", "threed" ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Post Ids", "threed"),
                   "param_name" => "threed_service_post_ids",
                   'group' => esc_html__( 'Post Options', 'threed' ),
                   "description" => esc_html__("Write Post IDS seprated by comma(,) ", "threed"),
                   "dependency" => array('element' => 'threed_service_post_order','value' => 'IDS'),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("No.of Posts", "threed"),
                   "param_name" => "threed_service_post_no",
                   'group' => esc_html__( 'Post Options', 'threed' ),
                ),
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Show Post Title", "threed"),
                   "param_name" => "threed_service_post_title",
                   "value" => array( "Yes", "No" ),
                   "group" => esc_html__( "Post Options", "threed" ),
                ),
                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Post Title Color", "threed"),
                   "param_name" => "threed_service_post_title_fg",
                   "dependency" => array('element' => 'threed_service_post_title','value' => 'Yes'),
                   "group" => esc_html__( 'Post Options', 'threed' ),
                ),
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Show Post Content", "threed"),
                   "param_name" => "threed_service_post_content",
                   "value" => array( "No", "Yes" ),
                   "group" => esc_html__( "Post Options", "threed" ),
                ),
                 array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Post Content Color", "threed"),
                   "param_name" => "threed_service_post_content_fg",
                   "dependency" => array('element' => 'threed_service_post_content','value' => 'Yes'),
                   "group" => esc_html__( 'Post Options', 'threed' ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Content Length", "threed"),
                   "param_name" => "threed_service_post_content_length",
                   "group" => esc_html__( "Post Options", "threed" ),
                   "dependency" => array('element' => 'threed_service_post_content','value' => 'Yes'),
                ),
                /***** POST OPTION ENDS **/


                /***** LAYOUT OPTION STARTS **/
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Post Layout", "threed"),
                   "param_name" => "threed_service_post_layout",
                   "value" => array( "Layout 1", "Layout 2","Layout 3","Layout 4" ,"Layout 5"),
                   "description" => esc_html__("Select Post layout", "threed"),
                   "group" => esc_html__( "Layout Options", "threed" ),
                ),
                array(
                   "type" => "checkbox",
                   "heading" => esc_html__("Show Image / Slider ( Layout 1 only )", "threed"),
                   "param_name" => "threed_service_post_image",
                   "description" => esc_html__("Show Image uploaded for VC in Service Posts", "threed"),
                   "group" => esc_html__( "Layout Options", "threed" ),
                   "dependency" => array('element' => 'threed_service_post_layout','value' => array('Layout 1','Layout 2','Layout 4','Layout 5')),
                ),
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Image Alignment", "threed"),
                   "param_name" => "threed_service_post_image_align",
                   "value" => array( "Left", "Right" ),
                   "group" => esc_html__( "Layout Options", "threed" ),
                   "dependency" => array('element' => 'threed_service_post_layout','value' => array('Layout 2')),
                ),
                array(
                   "type" => "checkbox",
                   "heading" => esc_html__("Show Background Image", "threed"),
                   "param_name" => "threed_service_post_bg_image",
                   "description" => esc_html__("Show Background Image", "threed"),
                   "group" => esc_html__( "Layout Options", "threed" ),
                   "dependency" => array('element' => 'threed_service_post_layout','value' => 'Layout 3'),
                ),

                /***** LAYOUT OPTION ENDS **/

                /***** LINK OPTION STARTED  */

                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Post Link Text", "threed"),
                   "param_name" => "threed_service_link_text",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "description" => esc_html__("If blank will not show the link", "threed"),
                ),
                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Link Background Color", "threed"),
                   "param_name" => "threed_service_post_link_bg",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                ),
                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Link Text Color", "threed"),
                   "param_name" => "threed_service_post_link_fg",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                ),
                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Link Border Color", "threed"),
                   "param_name" => "threed_service_post_link_border",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                ),
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Border Width", "threed"),
                   "param_name" => "threed_service_post_link_border_width",
                   "value" => array( "0", "1","2","3","4","5" ),
                   "std"=>"0",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                ),

                array(
                     "type" => "checkbox",
                     "heading" => esc_html__("Link Hover Effect", "threed"),
                     "param_name" => "threed_service_post_link_hover_effect",
                     "value" => array( esc_html__( 'Yes', 'threed' ) => 'Yes'),
                     'group' => esc_html__( 'Link Options', 'threed' ),
                ),

                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Hover Background Color", "threed"),
                   "param_name" => "threed_service_post_link_hover_bg",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "dependency" => array('element' => 'threed_service_post_link_hover_effect','value' => 'Yes'),
                ),
                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Hover Text Color", "threed"),
                   "param_name" => "threed_service_post_link_hover_fg",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "dependency" => array('element' => 'threed_service_post_link_hover_effect','value' => 'Yes'),
                ),
                array(
                   "type" => "colorpicker",
                   "heading" => esc_html__("Hover Border Color ", "threed"),
                   "param_name" => "threed_service_post_link_hover_border",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "dependency" => array('element' => 'threed_service_post_link_hover_effect','value' => 'Yes'),
                ),
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Hover Border Width", "threed"),
                   "param_name" => "threed_service_post_link_border_hover_width",
                   "value" => array( "0", "1","2","3","4","5" ),
                   "std"=>"0",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "dependency" => array('element' => 'threed_service_post_link_hover_effect','value' => 'Yes'),
                ),

                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Hover Animation", "threed"),
                   "param_name" => "threed_service_post_link_hover_animation",
                   "value" => array( "Effect 1"=>0, "Effect 2"=>1,"Effect 3"=>2,"Effect 4"=>3),
                   "std"=>0,
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "dependency" => array('element' => 'threed_service_post_link_hover_effect','value' => 'Yes'),
                ),


                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Post Link", "threed"),
                   "param_name" => "threed_service_post_link",
                   "value" => array( "Post Link", "External Link" ),
                   "group" => esc_html__( "Link Options", "threed" ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Post Link URL", "threed"),
                   "param_name" => "threed_service_post_link_url",
                   'group' => esc_html__( 'Link Options', 'threed' ),
                   "description" => esc_html__("If blank will not show the link text", "threed"),
                   "dependency" => array('element' => 'threed_service_post_link','value' => 'External Link'),
                ),




                /***** LINK OPTION ENDS **/

                array(
                    "type" => "css_editor",
                    "heading" => esc_html__( "Css", "threed" ),
                    "param_name" => "threed_service_style",
                    "group" => esc_html__( "Style Options", "threed" ),
                ),
              )
  ) );
}
