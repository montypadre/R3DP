<?php
if ( defined( 'WPB_VC_VERSION' ) ) 
{
  vc_map( array(
     "name" => esc_html__("Portfolio","threed"),
     "base" => "threed_portfolio",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array( 
                    
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Portfolio Section Title", "threed"),
                       "param_name" => "threed_portfolio_section_title",                          
                       "description" => esc_html__("Title will be shown in section", "threed"),                                       
                    ),
                    array(
                         "type" => "dropdown",                             
                         "heading" => esc_html__("Portfolio Layout", "threed"),
                         "param_name" => "threed_portfolio_layout",
                         'value' => array( "Grid", "Masonry","Carousel" ),
                         'std' => 'Grid',
                         "description" => esc_html__("Portfolio Layouts", "threed")
                    ),               
                    

                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("No.of Posts in First Load", "threed"),
                       "param_name" => "threed_portfolio_grid_item",                          
                       "description" => esc_html__("This will restrict the no.of image for first load [ any multiplied value of grid column ]", "threed"), 
                       "dependency" => array('element' => 'threed_portfolio_layout','value' => 'Grid'),                   
                    ),
                    array(
                         "type" => "dropdown",                             
                         "heading" => esc_html__("Grid Column", "threed"),
                         "param_name" => "threed_portfolio_grid_col",
                         'value' => array( "1", "2","3" ),
                         'std' => '3',
                         "description" => esc_html__("Grid Layout Columns", "threed"),
                         "dependency" => array('element' => 'threed_portfolio_layout','value' => 'Grid'),
                    ),

                    array(
                       "type" => "checkbox",
                       "heading" => esc_html__("Show Load More", "threed"),
                       "param_name" => "threed_portfolio_grid_load_more",                          
                       "description" => esc_html__("To load more images from list", "threed"), 
                       "dependency" => array('element' => 'threed_portfolio_layout','value' => 'Grid'),                                       
                    ),
                    array(
                         "type" => "textfield",          
                         "heading" => esc_html__("Load More Text", "threed"),
                         "param_name" => "threed_portfolio_grid_load_more_text",                                                                      
                         "dependency" => array('element' => 'threed_portfolio_grid_load_more','value' => 'true'),  
                    ),                  

                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Portfolio Class Name", "threed"),
                       "param_name" => "threed_portfolio_class",                   
                    ), 

                    /***** POST OPTION STARTED  */
                    array(
                       "type" => "dropdown",          
                       "heading" => esc_html__("Post Order", "threed"),
                       "param_name" => "threed_portfolio_post_order",
                       "value" => array( "ASC", "DESC" ),                   
                       "description" => esc_html__("Select Post order to show", "threed"),
                       "group" => esc_html__( "Post Options", "threed" ),   
                    ),                    
                    array(
                       "type" => "textfield",
                       "heading" => esc_html__("Total No.of Posts", "threed"),
                       "param_name" => "threed_portfolio_post_no",   
                       'group' => esc_html__( 'Post Options', 'threed' ),
                       "dependency" => array('element' => 'threed_portfolio_post_order','value' => array('ASC','DESC')),         
                    
                    ),
                    
                    array(
                       "type" => "dropdown",          
                       "heading" => esc_html__("Show Post Title", "threed"),
                       "param_name" => "threed_portfolio_post_title",
                       "value" => array( "Yes", "No" ),                                    
                       "group" => esc_html__( "Post Options", "threed" ),                   
                    ),                    
                    array(
                       "type" => "dropdown",          
                       "heading" => esc_html__("Show Post Content", "threed"),
                       "param_name" => "threed_portfolio_post_content",
                       "value" => array( "No", "Yes" ),                                    
                       "group" => esc_html__( "Post Options", "threed" ),                   
                    ),                    
                    array(
                       "type" => "textfield",          
                       "heading" => esc_html__("Content Length", "threed"),
                       "param_name" => "threed_portfolio_post_content_length",                                             
                       "group" => esc_html__( "Post Options", "threed" ), 
                       "dependency" => array('element' => 'threed_portfolio_post_content','value' => 'Yes'),  
                    ),  
                /***** POST OPTION ENDS **/


                    array(
                        "type" => "css_editor",
                        "heading" => esc_html__( "Css", "threed" ),
                        "param_name" => "threed_portfolio_style",
                        "group" => esc_html__( "Style Options", "threed" ),
                    ),  
                                      
              )
  ) );
}