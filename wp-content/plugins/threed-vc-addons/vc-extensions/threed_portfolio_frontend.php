<?php
if ( !defined( 'WPB_VC_VERSION' ) ) 
{
    return;
}

add_shortcode( 'threed_portfolio', 'threed_portfolio_function' );
function threed_portfolio_function( $atts ,$content=null) {

   extract( shortcode_atts( array(
      'threed_portfolio_section_title'=>'',
      'threed_portfolio_layout'=>'Grid',
      'threed_portfolio_grid_item'=>'4',
      'threed_portfolio_grid_col'=>'3',
      'threed_portfolio_grid_load_more'=>'',
      'threed_portfolio_grid_load_more_text'=>'Load More',         
      'threed_portfolio_class'=>'',   
      'threed_portfolio_post_order'=>'ASC', 
      'threed_portfolio_post_ids'=>'',
      'threed_portfolio_post_no'=>'-1',
      'threed_portfolio_post_title'=>'Yes',
      'threed_portfolio_post_content'=>'No',
      'threed_portfolio_post_content_length'=>'20',      

      'threed_portfolio_style'=>'',           
      
 ), $atts,'threed_portfolio' ) );
 

  //print_r($atts);

  $css_class ='';
  $grid_col=0;
  $grid_item=0;
  $grid_col_class='';
  $grid_list_class='';
  $threed_gallery_images_arr=array();
  $js_dependency_array=array();  
  if(!empty($threed_portfolio_style) && $threed_portfolio_style!='')
  {     
     $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_portfolio_style, ' ' ), '', $atts['threed_portfolio_style']);//Design Options settings class need to imlemented as per requirement  
  }
  if(!empty($threed_portfolio_class))
  {
      $css_class.=' '.$threed_portfolio_class;
  } 
  wp_enqueue_script( 'imagesloaded-js', plugins_url() . '/threed-vc-addons/js/imagesloaded.pkgd.min.js', array(), 'v1' );

  if($threed_portfolio_layout=="Carousel")
  {
    if (!wp_style_is( 'owl-css', 'enqueued' ))
    {      
        wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/css/owl.carousel.css', array(), 'v1' );       
    }
    if (!wp_style_is( 'owl-css', 'enqueued' ))
    {
        wp_enqueue_style( 'owl-themes-css', get_template_directory_uri() . '/css/owl.theme.css', array(), 'v1' );
    }
    if (!wp_script_is( 'owl-js', 'enqueued' ))
    {      
        wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), 'v1', true );
    }    
  }   
  wp_enqueue_script( 'threed-vc-portfolio',  plugins_url(). '/threed-vc-addons/js/threed-vc-portfolio.js', array(), '','1.6.2',true );


  $args['post_type']="portfolio";
  if($threed_portfolio_post_order!="IDS")
  {
    $args['order']=$threed_portfolio_post_order;
    $args['posts_per_page']=-1;
    if(!empty($threed_portfolio_post_no) && $threed_portfolio_post_no!='')
    {
      $args['posts_per_page']=$threed_portfolio_post_no;
    }
  }
  
  if($threed_portfolio_layout=="Grid")
  {
      $args['posts_per_page']=$threed_portfolio_grid_item;
  }
  //grid
  $word_limit=0;
  if($threed_portfolio_post_content_length!='')
  {
     $word_limit=$threed_portfolio_post_content_length;
  }
  
  $portfolio_posts=new WP_Query($args); 

  $output='';
  /********* START OF GRID *******/
  if($threed_portfolio_layout=="Grid")
  {
      $output.='<div class="portfolio-wrapper">';       
      if($threed_portfolio_section_title!='')
      {
        $output.='<h4>'.$threed_portfolio_section_title.'</h4>';
      }
      $grid_list_class='col-'.$threed_portfolio_grid_col;
      $output.='<ul class="portfolio-box-wrapper '.esc_attr($grid_list_class).'">';

      
      $image_size='threed_gallery_'.$threed_portfolio_grid_col.'_size';
      if ( $portfolio_posts->have_posts() ) : while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();   //post loop
        $grid_col++;
        if($threed_portfolio_grid_col>1)
        {  
          if($grid_col==1)
          {
            $grid_col_class="grid-col-first";
          }
          if($grid_col==$threed_portfolio_grid_col)
          {
              $grid_col_class='grid-col-last';
              $grid_col=0;
          }   
        }         
        $output.='<li class="portfolio-list '.esc_attr($grid_col_class).'">';
          $output.='<div class="portfolio-grid-wrapper">';
              if(has_post_thumbnail())
              {
                  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $image_size );
                  $url = $thumb['0'];   
                  $output.='<a href="'.get_the_permalink().'">';
                    $output.='<img src="'.esc_url($url).'" alt="post-image-'.get_the_ID().'" data="'.$image_size.'">';                  
                  $output.='</a>';
              }
              if($threed_portfolio_post_title=='Yes' || $threed_portfolio_post_content=='Yes')
              {
                $output.='<a href="'.get_the_permalink().'">';
                $output.='<div class="portfolio-info">';
                  $output.='<div class="portfolio-info-inner">';
                    if($threed_portfolio_post_title=='Yes')
                    {                      
                        $output.='<h3 class="portfolio-title">'.get_the_title().'</h3>';                     
                    }
                    if($threed_portfolio_post_content=='Yes')
                    {
                      $output.= wpautop(threed_get_the_excerpt($word_limit));
                    }
                  $output.='</div>';  
                $output.='</div>';
                $output.='</a>';
              }
          $output.='</div>';
        $output.='</li>';

      endwhile; endif;
      wp_reset_postdata();  
      wp_reset_query();
      $output.='</ul>';

      $output.='<div class="center-content">';
          $output.='<div class="loadmore_wrapper-v2 clearfix">';
            if($threed_portfolio_grid_load_more!='')
            {
              if($threed_portfolio_post_no>$threed_portfolio_grid_item)
              {
                $output.='<div class="image_spinner_wrapper">';
                    $output.='<div class="spinner">';
                        $output.='<div class="rect1"></div>';
                        $output.='<div class="rect2"></div>';
                        $output.='<div class="rect3"></div>';
                        $output.='<div class="rect4"></div>';
                        $output.='<div class="rect5"></div>';
                    $output.='</div>';            
                $output.='</div>';
                
                wp_localize_script( 'threed-vc-portfolio', 'threedvcsettings', array('ajaxurl' => admin_url( 'admin-ajax.php' ),'post_order'=>$threed_portfolio_post_order,'show_title'=>$threed_portfolio_post_title,'show_content'=>$threed_portfolio_post_content,'portfolio_grid_col'=>$threed_portfolio_grid_col,'word_limit'=>$word_limit)); 
                $output.='<div class="loadmore-wrapper">';
                     $output.='<a class="load_more_portfolio_image" data-total="'.esc_attr($threed_portfolio_post_no).'" data-item="'.esc_attr($threed_portfolio_grid_item).'" data-offset="'.esc_attr($threed_portfolio_grid_item).'"  href="javascript:void(0);">'.$threed_portfolio_grid_load_more_text.'</a>';
                $output.='</div>';
              }
            }
          $output.='</div>';
        $output.='</div>';  
      $output.='</div>';     
  }
  /********* END OF GRID *******/
  if($threed_portfolio_layout=="Masonry")
  {
      
      $output.='<div class="gallery-wrapper masonary-gallery">';
      if($threed_portfolio_section_title!='')
      {
        $output.='<h4>'.$threed_portfolio_section_title.'</h4>';
      }
       $output.='<div class="masonary-grid-portfolio">';       
         
             if ( $portfolio_posts->have_posts() ) : while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();   //post loop
                 
                $image_size=get_post_meta(get_the_ID(),'_threed_portfolio_vc_masonry_image_size',true); 
                if($image_size=='')
                {
                  $image_size='threed_portfolio_image_size_1';
                }
                $output.='<div class="gallery-masonary-list">'; //repeat
                  $output.='<div class="single-gallery-list-inner">';
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $image_size );              
                    $url = $thumb['0']; 
                    $output.='<a href="'.get_the_permalink().'">';                   
                      $output.='<img src="'.esc_url($url).'" alt="Threed Gallery Image" data="'.$image_size.'" id="gallery-image-'.get_the_ID().'" >';
                    $output.='</a>'; 
                    if($threed_portfolio_post_title=='Yes' || $threed_portfolio_post_content=='Yes')
                    {
                      $output.='<a href="'.get_the_permalink().'">';
                      $output.='<div class="portfolio-info">';
                        $output.='<div class="portfolio-info-inner">';
                          if($threed_portfolio_post_title=='Yes')
                          {                      
                              $output.='<h3 class="portfolio-title">'.get_the_title().'</h3>';                     
                          }
                          if($threed_portfolio_post_content=='Yes')
                          {
                            $output.= wpautop(threed_get_the_excerpt($word_limit));
                          }
                        $output.='</div>';  
                      $output.='</div>';
                      $output.='</a>';
                    }
                  $output.='</div>';
                  
                $output.='</div>'; 

              endwhile;endif;  
              wp_reset_postdata();  
              wp_reset_query();
      
        $output.='</div>'; 
      $output.='</div>';


  }

  if($threed_portfolio_layout=="Carousel")
  {   
     
    $output.='<div class="portfolio-wrapper single-gallery">';
    if($threed_portfolio_section_title!='')
    {
      $output.='<h4>'.$threed_portfolio_section_title.'</h4>';
    }  

      $output.='<div class="single-portfolio-list">';
      if ( $portfolio_posts->have_posts() ) : while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();   //post loop

          $output.='<a href="'.get_the_permalink().'">';          
            $output.='<div class="single-gallery-list-inner">';            
              $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'threed_gallery_carousel_size' );              
              $url = $thumb['0'];        
              $output.='<img src="'.esc_url($url).'" alt="Threed Gallery Image" id="gallery-image-'.get_the_ID().'">';
              if($threed_portfolio_post_title=='Yes' || $threed_portfolio_post_content=='Yes')
              {
                $output.='<a href="'.get_the_permalink().'">';
                $output.='<div class="portfolio-info">';
                  $output.='<div class="portfolio-info-inner">';
                    if($threed_portfolio_post_title=='Yes')
                    {                      
                        $output.='<h3 class="portfolio-title">'.get_the_title().'</h3>';                     
                    }
                    if($threed_portfolio_post_content=='Yes')
                    {
                      $output.= wpautop(threed_get_the_excerpt($word_limit));
                    }
                  $output.='</div>';  
                $output.='</div>';
                $output.='</a>';
              }
            $output.='</div>'; 

          $output.='</a>';          
      endwhile; endif;
      wp_reset_postdata();  
      wp_reset_query();
      $output.='</div>';     
   
    $output.='</div>';
    

  }

  return $output;
}
?>
