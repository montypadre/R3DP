<?php
if ( defined( 'WPB_VC_VERSION' ) ) 
{
  vc_map( array(
     "name" => esc_html__("Image with Social","threed"),
     "base" => "threed_image_with_social",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array( 
                /*** TITLE SECTION STARTS **/
                array(
                   "type" => "attach_images",
                   "holder" => "div",
                   "class" => "",
                   "heading" =>esc_html__("Upload Image", "threed"),
                   "param_name" => "threed_image_with_social_image",
                   "description" => esc_html__("Upload image", "threed")
                ),
                array(
                   "type" => "dropdown",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Image Alignment", "threed"),
                   "param_name" => "threed_image_with_social_img_align",
                   'value' => array( "Right", "Left" ),
                   'std' => '',
                   "description" => esc_html__("Show Slider icons", "threed")
                ),   
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Name", "threed"),
                   "param_name" => "threed_image_with_social_name",                             
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Designation", "threed"),
                   "param_name" => "threed_image_with_social_desg",                             
                ),

                 array(
                   "type" => "textfield",
                   "heading" => esc_html__("Phone", "threed"),
                   "param_name" => "threed_image_with_social_phone",                             
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Email", "threed"),
                   "param_name" => "threed_image_with_social_email",                             
                ),
                /***** SOCIAL OPRIONS **/
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Facebook", "threed"),
                   "param_name" => "threed_image_with_social_fb",     
                   "group" => esc_html__( "Social Options", "threed" ),                         
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Twitter", "threed"),
                   "param_name" => "threed_image_with_social_twitter",
                   "group" => esc_html__( "Social Options", "threed" ),                              
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Behance", "threed"),
                   "param_name" => "threed_image_with_social_behance",  
                   "group" => esc_html__( "Social Options", "threed" ),                            
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Vimeo", "threed"),
                   "param_name" => "threed_image_with_social_vimeo",  
                   "group" => esc_html__( "Social Options", "threed" ),                            
                ),
                
                                      
              )
  ) );
}