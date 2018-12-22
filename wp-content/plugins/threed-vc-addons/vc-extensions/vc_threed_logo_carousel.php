<?php

if ( defined( 'WPB_VC_VERSION' ) ) 
{

vc_map( array(
   "name" =>esc_html__("Upload Logo Images","threed"),
   "base" => "logo_carousel",
   "category" => esc_html__("Threed Elements","threed"),
   "icon" =>  "vc-addon-icon",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" =>esc_html__("Upload logos", "threed"),
         "param_name" => "logo_images",
         "description" => esc_html__("Upload your client logos", "threed")
      ),
       array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" =>esc_html__("Add Links", "threed"),
         "param_name" => "logo_links",
         "description" => esc_html__("Enter links for each slide (Note: divide links with linebreaks (Enter)).", "threed")
      )
        
                
   )
) );

}