<?php
if ( defined( 'WPB_VC_VERSION' ) )
{
  vc_map( array(
     "name" => esc_html__("Team Section",'threed'),
     "base" => "threed_team_section",
     "category" => esc_html__('Threed Elements','threed'),
     "icon" =>  "vc-addon-icon",
     "params" => array(
                          array(
                             "type" => "dropdown",
                             "holder" => "div",
                             "class" => "",
                             "heading" => esc_html__("Team Layout", "threed"),
                             "param_name" => "threed_team_layout",
                             'value' => array( "Simple", "Slider" ),
                             'std' => '',
                             "description" => esc_html__("Show Slider icons", "threed")
                          ),
                          array(
                                "type" => "textfield",
                                "heading" => esc_html__("Item per Slide", "threed"),
                                "param_name" => "threed_team_item_slide",
                                "dependency" => array('element' => 'threed_team_layout','value' => 'Slider'),
                          ),
                          array(
                            "type" => "dropdown",
                            "heading" => esc_html__("Navigation Style", "threed"),
                            "param_name" => "threed_team_navigation",
                            'value' => array( "DOTS", "ARROW" ),
                            'std' => '',
                            "description" => esc_html__("Select Navigation Style", "threed"),
                            "dependency" => array('element' => 'threed_team_layout','value' => 'Slider'),
                          ),
                          array(
                                "type" => "dropdown",
                                "heading" => esc_html__("Item per Column", "threed"),
                                "param_name" => "threed_team_item_col",
                                'value' => array( "1", "2","3","4" ),
                                'std' => '4',
                                "dependency" => array('element' => 'threed_team_layout','value' => 'Simple'),
                          ),
                          array(
                             "type" => "checkbox",
                             "heading" => esc_html__("Show Member Image", "threed"),
                             "param_name" => "threed_team_post_image",
                             "description" => esc_html__("Show member image", "threed"),
                             "value" => array( esc_html__( 'Yes', 'threed' ) => 'Yes'),
                             'std'=>'Yes'

                            ),

                          array(
                             "type" => "checkbox",
                             "heading" => esc_html__("Show Member Name", "threed"),
                             "param_name" => "threed_team_post_title",
                             "description" => esc_html__("Show Name of Member", "threed"),
                             "value" => array( esc_html__( 'Yes', 'threed' ) => 'Yes'),
                             "std"=>"Yes"
                          ),

                          array(
                             "type" => "checkbox",
                             "heading" => esc_html__("Show Member Designation", "threed"),
                             "param_name" => "threed_team_post_designation",
                             "description" => esc_html__("Show designation of the Member", "threed"),
                             "value" => array( esc_html__( 'Yes', 'threed' ) => 'Yes'),
                             "std"=>"Yes"
                          ),

                          array(
                             "type" => "checkbox",
                             "heading" => esc_html__("Link to Details", "threed"),
                             "param_name" => "threed_team_post_details",
                             "description" => esc_html__("Link to details page", "threed"),
                             "value" => array( esc_html__( 'Yes', 'threed' ) => 'Yes'),
                             "std"=>"Yes"
                          ),
                          array(
                           "type" => "textfield",
                           "heading" => esc_html__("Link Text", "threed"),
                           "param_name" => "threed_team_post_link_text",
                           "description" => esc_html__( "Text tolink option ( Default : View More )", "threed" ),
                           "dependency" => array('element' => 'threed_team_post_details','value' => 'Yes'),
                         ),

                          array(
                             "type" => "dropdown",
                             "heading" => esc_html__("Post Order", "threed"),
                             "param_name" => "threed_team_post_order",
                             "value" => array( "ASC", "DESC","IDS" ),
                             "description" => esc_html__("Select Post order to show", "threed"),
                             'group' => esc_html__( 'Post Options', 'threed' ),
                          ),
                          array(
                             "type" => "textfield",
                             "heading" => esc_html__("Post Ids", "threed"),
                             "param_name" => "threed_team_post_ids",
                             'group' => esc_html__( 'Post Options', 'threed' ),
                             "description" => esc_html__("Write Post IDS seprated by comma(,) ", "threed"),
                             "dependency" => array('element' => 'threed_team_post_order','value' => 'IDS'),
                          ),
                          array(
                             "type" => "textfield",
                             "heading" => esc_html__("No.of Posts", "threed"),
                             "param_name" => "threed_team_post_no",
                             'group' => esc_html__( 'Post Options', 'threed' ),
                             "dependency" => array('element' => 'threed_team_post_order','value' => array('ASC','DESC')),
                          ),

                      )
                )
        );
}
