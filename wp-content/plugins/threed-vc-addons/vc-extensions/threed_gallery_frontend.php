<?php
if ( !defined( 'WPB_VC_VERSION' ) ) 
{
    return;
}

add_shortcode( 'threed_gallery', 'threed_gallery_function' );
function threed_gallery_function( $atts ,$content=null) {

   extract( shortcode_atts( array(
      'threed_gallery_section_title'=>'',
      'threed_gallery_layout'=>'Grid',
      'threed_gallery_grid_item'=>'4',
      'threed_gallery_grid_col'=>'3',
      'threed_gallery_grid_load_more'=>'',
      'threed_gallery_grid_load_more_text'=>'Load More',
      'threed_gallery_on_click'=>'None',      
      'threed_gallery_images'=>'',   
      'threed_gallery_class'=>'', 
      'threed_gallery_style'=>'',           
      
 ), $atts,'threed_gallery' ) );
 

  $css_class ='';
  $grid_col=0;
  $grid_item=0;
  $grid_col_class='';
  $grid_list_class='';
  $threed_gallery_images_arr=array();
  $js_dependency_array=array();  
  if(!empty($hreed_gallery_style))
  {     
     $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_gallery_style, ' ' ), '', $atts['threed_gallery_style']);//Design Options settings class need to imlemented as per requirement  
  }
  if(!empty($threed_gallery_class))
  {
      $css_class.=' '.$threed_gallery_class;
  } 
  wp_enqueue_script( 'imagesloaded-js', plugins_url() . '/threed-vc-addons/js/imagesloaded.pkgd.min.js', array(), 'v1' );

  if($threed_gallery_layout=="Carousel")
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
  
  if($threed_gallery_on_click=='Open prettyPhoto')
  {
    wp_enqueue_script( 'prettyphoto' );
    wp_enqueue_style( 'prettyphoto' );
    $js_dependency_array[]='prettyphoto';
  }  
  
  wp_enqueue_script( 'threed-vc-gallery',  plugins_url(). '/threed-vc-addons/js/threed-vc-gallery.js', array(), '','1.6.2',true );

  $output='';
  /********* START OF GRID *******/
  if($threed_gallery_layout=="Grid")
  {

      $output.='<div class="gallery-wrapper">';
       
        if($threed_gallery_section_title!='')
        {
          $output.='<h4>'.$threed_gallery_section_title.'</h4>';
        }
        if(!empty($threed_gallery_images))
        { 
          $threed_gallery_images_arr=explode(',',$threed_gallery_images);       
          $grid_list_class='col-'.$threed_gallery_grid_col;
          $output.='<ul class="gallery-box-wrapper row '.esc_attr($grid_list_class).'">';
          
          foreach($threed_gallery_images_arr as $gallery_image_id)
          {     
            $grid_col++;
            $grid_item++;
            $grid_col_class='';
            if($threed_gallery_grid_col>1)
            {  
              if($grid_col==1)
              {
                $grid_col_class="grid-col-first";
              }
              if($grid_col==$threed_gallery_grid_col)
              {
                  $grid_col_class='grid-col-last';
                  $grid_col=0;
              }   
            }    
            $image_size='threed_gallery_'.$threed_gallery_grid_col.'_size';
            $output.='<li class="gallery-list '.esc_attr($grid_col_class).'">';
              $output.='<div class="gallery-list-inner">';
                if($threed_gallery_on_click=='Open prettyPhoto')
                {               
                  $gallery_full_image=wp_get_attachment_image_src($gallery_image_id,'threed_gallery_1_size');
                  $output.='<a href="'.esc_url($gallery_full_image[0]).'" class="prettyphoto" rel="gridprettyPhoto[rel-'.get_the_ID().']">';
                }
                $gallery_image=wp_get_attachment_image_src( $gallery_image_id,$image_size);  
                $url = $gallery_image['0'];        
                $output.='<img src="'.esc_url($url).'" alt="Threed Gallery Image" id="gallery-image-'.$gallery_image_id.'" data="'.$image_size.'">';
                $output.='<div class="overlay-grid">';
                  $output.='<div class="expand" >';
                    $output.='<i class="fa fa-plus">';
                    $output.='</i>';
                  $output.='</div>';
                $output.='</div>';
                if($threed_gallery_on_click=='Open prettyPhoto')
                {
                  $output.='</a>';  
                }
                
              $output.='</div>';  
            $output.='</li>';
            if($grid_item==$threed_gallery_grid_item)                
            {
                break;
            }
          }
          $output.='</ul>';
        } 
        $output.='<div class="center-content">';
          $output.='<div class="loadmore_wrapper-v2 clearfix">';
            if($threed_gallery_grid_load_more!='')
            {
              if(count($threed_gallery_images_arr)>$threed_gallery_grid_item)
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
                
                wp_localize_script( 'threed-vc-gallery', 'threedvcsettings', array('ajaxurl' => admin_url( 'admin-ajax.php' ),'image_ids'=> $threed_gallery_images,'threed_gallery_grid_col'=> $threed_gallery_grid_col,'threed_gallery_on_click'=>$threed_gallery_on_click,'page_id'=>get_the_ID())); 
                $output.='<div class="loadmore-wrapper">';
                     $output.='<a class="load_more_gallery_image" data-total="'.esc_attr(count($threed_gallery_images_arr)).'" data-item="'.esc_attr($threed_gallery_grid_item).'" data-offset="'.esc_attr($grid_item).'" href="javascript:void(0);">'.$threed_gallery_grid_load_more_text.'</a>';
                $output.='</div>';
              }
            }
          $output.='</div>';
        $output.='</div>';  
      $output.='</div>';
  }
  /********* END OF GRID *******/
  if($threed_gallery_layout=="Masonry")
  {
      $output.='<div class="gallery-wrapper masonary-gallery">';
        if($threed_gallery_section_title!='')
        {
          $output.='<h4>'.$threed_gallery_section_title.'</h4>';
        }
       $output.='<div class="masonary-grid">';
        if(!empty($threed_gallery_images))
        { 
            $threed_gallery_images_arr=explode(',',$threed_gallery_images); 
              foreach($threed_gallery_images_arr as $gallery_image_id)
              { 
                 
                $output.='<div class="gallery-masonary-list">'; //repeat
                  $output.='<div class="single-gallery-list-inner">';
                    $gallery_image=wp_get_attachment_image_src( $gallery_image_id,'full');  
                    $url = $gallery_image['0'];
                     if($threed_gallery_on_click=='Open prettyPhoto')
                    {   
                      $gallery_full_image=wp_get_attachment_image_src($gallery_image_id,'full');
                      $output.='<a href="'.esc_url($gallery_full_image[0]).'" class="prettyphoto" rel="gridprettyPhoto[rel-'.get_the_ID().']">';
                    }        
                      $output.='<img src="'.esc_url($url).'" alt="Threed Gallery Image" id="gallery-image-'.$gallery_image_id.'" >';
                      $output.='<div class="masonary-overlay">';
                        $output.='<div class="expand" >';
                          $output.='<i class="fa fa-plus">';
                          $output.='</i>';
                        $output.='</div>';
                      $output.='</div>';  
                    if($threed_gallery_on_click=='Open prettyPhoto')
                    {
                      $output.='</a>';  
                    } 
                  $output.='</div>';
                $output.='</div>'; 

                
              }
        }
        $output.='</div>'; 
      $output.='</div>'; 
  }

  if($threed_gallery_layout=="Carousel")
  {   
     
    $output.='<div class="gallery-wrapper single-gallery">';
    if($threed_gallery_section_title!='')
    {
      $output.='<h4>'.$threed_gallery_section_title.'</h4>';
    }
    if(!empty($threed_gallery_images))
    { 
      $threed_gallery_images_arr=explode(',',$threed_gallery_images); 
      $output.='<div class="single-gallery-list">';
      foreach($threed_gallery_images_arr as $gallery_image_id)
      {        
          if($threed_gallery_on_click=='Open prettyPhoto')
          {   
            $gallery_full_image=wp_get_attachment_image_src($gallery_image_id,'threed_gallery_1_size');
            $output.='<a href="'.esc_url($gallery_full_image[0]).'" class="prettyphoto" rel="gridprettyPhoto[rel-'.$gallery_image_id.']">';
          }
          $output.='<div class="single-gallery-list-inner">';            
            $gallery_image=wp_get_attachment_image_src( $gallery_image_id,'threed_gallery_carousel_size');  
            $url = $gallery_image['0'];        
            $output.='<img src="'.esc_url($url).'" alt="Threed Gallery Image" id="gallery-image-'.$gallery_image_id.'">';
            $output.='<div class="slider-overlay">';
              $output.='<div class="expand">';
                $output.='<i class="fa fa-plus">';
                $output.='</i>';
              $output.='</div>';
            $output.='</div>'; 
          $output.='</div>';  
          if($threed_gallery_on_click=='Open prettyPhoto')
          {
            $output.='</a>';  
          }      
      } 
      $output.='</div>';   
    }  
   
    $output.='</div>';

  }

  return $output;
}
?>
