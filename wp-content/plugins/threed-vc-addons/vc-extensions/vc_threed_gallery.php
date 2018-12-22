<?php
if ( defined( 'WPB_VC_VERSION' ) ) 
{
  vc_map( array(
     "name" => esc_html__("Gallery","threed"),
     "base" => "threed_gallery",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array( 
                    
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Section Title", "threed"),
                       "param_name" => "threed_gallery_section_title",                          
                       "description" => esc_html__("Title will be shown in section", "threed"),                                       
                    ),
                    array(
                         "type" => "dropdown",                             
                         "heading" => esc_html__("Gallery Layout", "threed"),
                         "param_name" => "threed_gallery_layout",
                         'value' => array( "Grid", "Masonry","Carousel" ),
                         'std' => 'Grid',
                         "description" => esc_html__("Gallery Layouts", "threed")
                    ),
                    
                    array(
                       "type" => "attach_images",
                       "heading" => esc_html__("Gallery Images", "threed"),
                       "param_name" => "threed_gallery_images",                   
                    ),

                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("No.of Image to Show", "threed"),
                       "param_name" => "threed_gallery_grid_item",                          
                       "description" => esc_html__("This will restrict the no.of image for first load [ any multiplied value of grid column ]", "threed"), 
                       "dependency" => array('element' => 'threed_gallery_layout','value' => 'Grid'),                   
                    ),
                    array(
                         "type" => "dropdown",                             
                         "heading" => esc_html__("Grid Column", "threed"),
                         "param_name" => "threed_gallery_grid_col",
                         'value' => array( "1", "2","3" ),
                         'std' => '3',
                         "description" => esc_html__("Grid Layout Columns", "threed"),
                         "dependency" => array('element' => 'threed_gallery_layout','value' => 'Grid'),
                    ),
                    array(
                         "type" => "dropdown",                             
                         "heading" => esc_html__("On Click Action", "threed"),
                         "param_name" => "threed_gallery_on_click",
                         'value' => array( "None","Open prettyPhoto" ),
                         'std' => 'None',
                         "description" => esc_html__("Grid Layout Columns", "threed"),
                         // "dependency" => array('element' => 'threed_gallery_layout','value' => array('Grid','Carousel')),
                    ),
                    array(
                       "type" => "checkbox",
                       "heading" => esc_html__("Show Load More", "threed"),
                       "param_name" => "threed_gallery_grid_load_more",                          
                       "description" => esc_html__("To load more images from list", "threed"), 
                       "dependency" => array('element' => 'threed_gallery_layout','value' => 'Grid'),                                       
                    ),
                    array(
                         "type" => "textfield",          
                         "heading" => esc_html__("Load More Text", "threed"),
                         "param_name" => "threed_gallery_grid_load_more_text",                                                                      
                         "dependency" => array('element' => 'threed_gallery_grid_load_more','value' => 'true'),  
                    ),                    

                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Gallery Class Name", "threed"),
                       "param_name" => "threed_gallery_class",                   
                    ),              
                    array(
                        "type" => "css_editor",
                        "heading" => esc_html__( "Css", "threed" ),
                        "param_name" => "threed_gallery_style",
                        "group" => esc_html__( "Style Options", "threed" ),
                    ),  
                                      
              )
  ) );
}