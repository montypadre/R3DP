<?php
add_action( 'vc_before_init', 'threed_vc_instagram' );
function threed_vc_instagram()
{

  vc_map( array(
     "name" => esc_html__("Instagram Section",'threed'),
     "base" => "threed_instagram_section",
     "category" => esc_html__('Threed Elements','threed'),
     "icon" =>  "vc-addon-icon",
     "params" => array(


        array(
            "type" => "dropdown",
            "heading" => esc_html__("Instagram Layout", "empire"),
            "param_name" => "threed_instagram_section_layout",
            'value' => array( "Static" ),
            'std' => 'Static',
            'group' => esc_html__( 'Layout Options', 'threed' ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("No.of Column", "threed"),
            "param_name" => "threed_instgram_col",
            'value' => array( "2","3","4","6" ),
            'std' => '4',
            "dependency" => array('element' => 'threed_instagram_section_layout','value' => 'Static'),
            'group' => esc_html__( 'Layout Options', 'threed' ),
        ),

        array(
              "type" => "textfield",
              "heading" => esc_html__("Item per Slide", "threed"),
              "param_name" => "threed_instagram_item_slide",
              "dependency" => array('element' => 'threed_instagram_section_layout','value' => 'Slider'),
              'group' => esc_html__( 'Layout Options', 'threed' ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Navigation Style", "threed"),
            "param_name" => "threed_instgram_navigation",
            'value' => array( "DOTS", "ARROW" ),
            'std' => 'DOTS',
            "description" => esc_html__("Select Navigation Style", "threed"),
            "dependency" => array('element' => 'threed_instagram_section_layout','value' => 'Slider'),
            'group' => esc_html__( 'Layout Options', 'threed' ),
        ),
        array(
           "type" => "textfield",
           "heading" => esc_html__("Username", "threed"),
           "param_name" => "threed_instagram_username",
           'group' => esc_html__( 'Instgram Options', 'threed' ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Size", "threed"),
            "param_name" => "threed_instagram_image_size",
            'value' => array("Original","Small", "Large" ),
            'std' => 'Original',
            'group' => esc_html__( 'Instgram Options', 'threed' ),
         ),

        array(
           "type" => "textfield",
           "heading" => esc_html__("No.of Posts", "threed"),
           "param_name" => "threed_instagram_post_no",
           'group' => esc_html__( 'Instgram Options', 'threed' ),
        ),

     )
  ) );
}
