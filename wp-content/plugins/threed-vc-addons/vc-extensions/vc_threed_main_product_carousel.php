<?php
if ( defined( 'WPB_VC_VERSION' ) )
{
  vc_map( array(
     "name" => esc_html__("Main Product Carousel","threed"),
     "base" => "threed_main_product_carousel",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array(
                         array(
                           "type" => "textfield",
                           "heading" => esc_html__("Section Class", "threed"),
                           "param_name" => "threed_main_product_section_class",
                           "group" => esc_html__( "Slide Options", "threed" ),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Item per Slide", "threed"),
                            "param_name" => "threed_main_product_item_slide",
                            "group" => esc_html__( "Slide Options", "threed" ),
                        ),
                        array(
                            "type" => "dropdown",
                            "heading" => esc_html__("Post Navigation", "threed"),
                            "param_name" => "threed_main_product_navigation",
                            "value" => array( "DOTS", "ARROW" ),
                            "description" => esc_html__("Select Navigation Style", "threed"),
                            "group" => esc_html__( "Slide Options", "threed" ),
                        ),

                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "heading" => esc_html__("Post Order", "threed"),
                            "param_name" => "threed_main_product_post_order",
                             "value" => array( "ASC", "DESC","IDS" ),
                            'std' => '',
                            "description" => esc_html__("Select Post Order to show", "threed"),
                            "group" => esc_html__( "Post Options", "threed" ),
                        ),
                        array(
                           "type" => "textfield",
                           "heading" => esc_html__("Post Ids", "threed"),
                           "param_name" => "threed_main_product_post_ids",
                           'group' => esc_html__( 'Post Options', 'threed' ),
                           "description" => esc_html__("Write Post IDS seprated by comma(,) ", "threed"),
                           "dependency" => array('element' => 'threed_main_product_post_order','value' => 'IDS'),
                        ),
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("No.of Posts", "threed"),
                            "param_name" => "threed_main_product_post_no",
                            "group" => esc_html__( "Post Options", "threed" ),
                            "dependency" => array('element' => 'threed_main_product_post_order','value' => array('ASC','DESC')),
                        ),
                        array(
                           "type" => "checkbox",
                           "heading" => esc_html__("Show Title", "threed"),
                           "param_name" => "threed_main_product_post_title",
                           "description" => esc_html__("Show Main Product Title", "threed"),
                           "group" => esc_html__( "Post Options", "threed" ),
                        ),
                        array(
                           "type" => "checkbox",
                           "heading" => esc_html__("Show Content", "threed"),
                           "param_name" => "threed_main_product_post_content",
                           "description" => esc_html__("Show Main Product Content", "threed"),
                           "group" => esc_html__( "Post Options", "threed" ),
                        ),
                        array(
                           "type" => "textfield",
                           "heading" => esc_html__("Content Length", "threed"),
                           "param_name" => "threed_main_product_post_content_length",
                           "group" => esc_html__( "Post Options", "threed" ),
                           "dependency" => array('element' => 'threed_main_product_post_content','value' => 'true'),
                        ),
                        array(
                           "type" => "checkbox",
                           "heading" => esc_html__("Show Ask a Quote", "threed"),
                           "param_name" => "threed_main_product_post_button",
                           "description" => esc_html__("Show Ask a Quote Button", "threed"),
                           "group" => esc_html__( "Post Options", "threed" ),
                        ),

                        array(
                            "type" => "css_editor",
                            "heading" => esc_html__( "Css", "threed" ),
                            "param_name" => "threed_main_product_style",
                            "group" => esc_html__( "Style Options", "threed" ),
                        ),
              )
  ) );
}
