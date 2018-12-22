<?php
if ( defined( 'WPB_VC_VERSION' ) ) 
{
  vc_map( array(
     "name" => esc_html__("Linked Title","threed"),
     "base" => "threed_linked_title",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array( 
                /*** TITLE SECTION STARTS **/
             
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Title", "threed"),
                   "param_name" => "threed_linked_title_text",
                   "group" => esc_html__( "Title Options", "threed" ),             
                ),
                array(
                  "type" => "font_container",
                  "param_name" => "threed_linked_title_font_container",
                  "value" => "tag:h6",
                  "settings" => array(
                    "fields" => array(
                      "tag" => "h6", // default value h2                     
                      "font_size",                     
                      "color",
                      "tag_description" => esc_html__( "Select element tag.", "threed"  ),
                      "text_align_description" => esc_html__( "Select text alignment.", "threed"  ),
                      "font_size_description" => esc_html__( "Enter font size.", "threed"  ),                      
                      "color_description" => esc_html__( "Select heading color.", "threed"  ),             
                    ),
                  ),
                  "group" => esc_html__( "Title Options", "threed" ), 
                ),               
                /*** TITLE SECTION ENDS **/     
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("URL to Link", "threed"),
                   "param_name" => "threed_linked_title_url",
                   "group" => esc_html__( "Title Options", "threed" ),             
                ),           
                /*** IMAGE SECTION STARTS **/
                array(
                  "type" => "attach_image",
                  "heading" => esc_html__("Title Icon", "threed"),
                  "param_name" => "threed_linked_title_icon",    
                  "group" => esc_html__( "Title Options", "threed" ),                              
                ),  
                                      
              )
  ) );
}