<?php
if ( defined( 'WPB_VC_VERSION' ) ) 
{
  vc_map( array(
     "name" => esc_html__("Divider","threed"),
     "base" => "threed_divider",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array( 
                /*** TITLE SECTION STARTS **/
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Divider Height", "threed"),
                   "param_name" => "threed_divider_height",                             
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Divider Class Name", "threed"),
                   "param_name" => "threed_divider_class",                   
                ),               
                array(
                    "type" => "css_editor",
                    "heading" => esc_html__( "Css", "threed" ),
                    "param_name" => "threed_divider_style",
                    "group" => esc_html__( "Style Options", "threed" ),
                ),  
                                      
              )
  ) );
}