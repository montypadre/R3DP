<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}
add_shortcode( 'threed_services', 'threed_services_function' );
function threed_services_function( $atts ,$content=null) {

  extract( shortcode_atts( array(
      'threed_service_title'=>'',
      'threed_service_title_font_container'=>'',
      'threed_service_title_class'=>'',
      'threed_service_post_order'=>'ASC',
      'threed_service_post_ids'=>'',
      'threed_service_post_no'=>'-1',
      'threed_service_post_title'=>'',
      'threed_service_post_title_fg'=>'#ffffff',
      'threed_service_post_content'=>'',
      'threed_service_post_content_fg'=>'',
      'threed_service_post_content_length'=>'',
      'threed_service_post_layout'=>'Layout 1',
      'threed_service_post_image'=>'',
      'threed_service_post_image_align'=>'',
      'threed_service_post_bg_image'=>'',
      'threed_service_link_text'=>'',
      'threed_service_post_link_bg'=>'',
      'threed_service_post_link_fg'=>'',
      'threed_service_post_link_border'=>'',
      'threed_service_post_link_border_width'=>'0',
      'threed_service_post_link'=>'',
      'threed_service_post_link_url'=>'',

      'threed_service_post_link_hover_effect'=>'',
      'threed_service_post_link_hover_bg'=>'',
      'threed_service_post_link_hover_fg'=>'',
      'threed_service_post_link_hover_border'=>'',
      'threed_service_post_link_border_hover_width'=>'0',
      'threed_service_post_link_hover_animation'=>0,



      'threed_service_style'=>''
  ), $atts,'threed_services' ) );


  $css_class ='';
  if(array_key_exists('threed_service_style', $atts))
  {
     $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_service_style, ' ' ), '', $atts['threed_service_style']);//Design Options settings class need to imlemented as per requirement
  }
  if(!array_key_exists('threed_service_post_layout', $atts))
  {
    $atts['threed_service_post_layout']="Layout 1";
  }
  if(!array_key_exists('threed_service_post_title', $atts))
  {
     $atts['threed_service_post_title']="Yes";
  }
  if(!array_key_exists('threed_service_title_class', $atts))
  {
     $atts['threed_service_title_class']="";
  }
  if(!array_key_exists('threed_service_post_image_align', $atts))
  {
     $atts['threed_service_post_image_align']="left";
  }
  if(!array_key_exists('threed_service_post_image', $atts))
  {
     $atts['threed_service_post_image']=false;
  }

  $output='';
  $style='';
  $service_bg_image='';
  $title_style='text_align:left';
  if(!empty($atts['threed_service_title_font_container']))
  {
      $title_style=$atts['threed_service_title_font_container'];
  }
  $title_font_container_data=threed_extract_font_container($title_style);


  $args['post_type']="service";
  $args['posts_per_page']=1;
  if($threed_service_post_order!="IDS")
  {
    $args['order']=$threed_service_post_order;
  }
  else
  {
    if(!empty($threed_service_post_ids))
    {
      $args['post__in']=explode(",",$threed_service_post_ids);
      $args['posts_per_page']=-1;
    }
  }

  if(!empty($threed_service_post_no))
  {
    $args['posts_per_page']=$threed_service_post_no;
  }

  $service_posts=new WP_Query($args);

  $service_class="service-type-1";
  if($threed_service_post_layout=="Layout 1")
  {
      $service_class="service-type-1";
  }
  else if($threed_service_post_layout=="Layout 2")
  {
      $service_class="service-type-2 clearfix";
  }
  else if($threed_service_post_layout=="Layout 3")
  {
      $service_class="service-type-3 clearfix";
  }
  else if($threed_service_post_layout=="Layout 4")
        {
            $service_class="service-type-4 clearfix";
        }
        else {
          $service_class="service-wrapper-5 clearfix";
        }

  $output.='<div class="'.$css_class.'">';  //wrapper div starts


  if ( $service_posts->have_posts() ) : while ( $service_posts->have_posts() ) : $service_posts->the_post();   //post loop

  $service_metas=get_post_meta(get_the_ID());//metas
  $style='';
  if($atts['threed_service_post_layout']=="Layout 3")
  {
      $service_bg_image=get_post_meta(get_the_ID(),'_threed_service_vc_background_image',true);
      if(!empty($service_bg_image) && $threed_service_post_bg_image==true)
      {
        $style='background:url("'.$service_bg_image.'")';
      }
  }
  $animation_class='';
  if($threed_service_post_link_hover_effect=='Yes')
  {
    switch($threed_service_post_link_hover_animation)
    {
        case 0:$animation_class='effect-1';
               break;

        case 1:$animation_class='effect-2';
               break;

        case 2:$animation_class='effect-3';
               break;

        case 3:$animation_class='effect-4';
               break;
    }

    $style_effect='';
    $style='';
    if(!empty($threed_service_post_link_hover_bg))
    {
      $style_effect.='background-color:'.$threed_service_post_link_hover_bg.' !important;';
    }
    if(!empty($threed_service_post_link_hover_fg))
    {
      $style.='color:'.$threed_service_post_link_hover_fg.' !important;';
    }
    if(!empty($threed_service_post_link_hover_border))
    {

        $style.='border: solid '.$threed_service_post_link_border_hover_width.'px !important;';
        $style.='border-color:'.$threed_service_post_link_hover_border.' !important;';

    }

    $class_name='service-hover-effect-'.rand();
    $css='.'.$class_name.':after {'.$style_effect.'}';
    $css.='.'.$class_name.':hover{'.$style.'}';
    wp_enqueue_style( 'threed-vc-addons-effect',  plugins_url().'/threed-vc-addons/css/threed-vc-addon-effect.css', array() );
    wp_add_inline_style( 'threed-vc-addons-effect', $css );
    $animation_class.=' '.$class_name;
    $style='';
  }
  $output.='<div id="service-'.get_the_ID().'" class="service '.esc_attr($service_class).'" style="'.esc_attr($style).'">'; //main service div starts


  /***** LAYOUT 1 STARTS **/

  if($threed_service_post_layout=="Layout 1")
  {
      /************** POST TITLE SECTION STARTS ******************/
      if($atts['threed_service_post_title']!='No')
      {
          $style='';
          if(!empty($threed_service_post_title_fg))
          {
            $style='color:'.$threed_service_post_title_fg.';';
          }
          $output.='<h4 class="service-post-title" style="'.esc_attr($style).'">'.get_the_title().'</h4>';
      }
      /************** POST TITLE SECTION ENDS ******************/
      /************** VC TITLE SECTION STARTS ******************/
      if(!empty($atts['threed_service_title']))
      {
          $style='';
          if(!empty($title_font_container_data['color']))
          {
            $style='color:#'.substr($title_font_container_data['color'],3).';';
          }
          if(!empty($title_font_container_data['font_size']))
          {
            $style.='font-size:'.$title_font_container_data['font_size'].'px;';
          }
          if(!empty($title_font_container_data['text_align']))
          {
            $style.='text-align:'.$title_font_container_data['text_align'].';';
          }
          $output.='<h2 style="'.esc_attr($style).'" class="'.esc_attr($atts['threed_service_title_class']).'">'.$atts['threed_service_title'].'</h2>';
      }
      /************** VC TITLE SECTION ENDS ******************/
      $word_limit=10;
      if($threed_service_post_content=='Yes')
      {
        $style='';
        if(!empty($threed_service_post_content_fg))
        {
          $style='color:'.$atts['threed_service_post_content_fg'].';';
        }
        $word_limit=$atts['threed_service_post_content_length']!=''?$atts['threed_service_post_content_length']:10;
        $output.='<div class="service-post-content" style="'.esc_attr($style).'">';
          $output.= wpautop(threed_get_the_excerpt($word_limit));
        $output.='</div>';
      }

      /************** POST IMAGE SECTION STARTS ******************/
      if(get_post_meta(get_the_ID(),'_threed_service_vc_image',true))
      {
        $output.='<div class="image-service">';
        if($service_metas['_threed_service_vc_image'][0]=='static-image')
        {

          if(!empty($service_metas['_threed_service_vc_featured_image_id']) && $threed_service_post_image==true)
          {
              $service_image=wp_get_attachment_image( get_post_meta(get_the_ID(),'_threed_service_vc_featured_image_id',true),'threed_service_type1_size');
              $output.=$service_image;
          }
        }
        else
        {
          if(!empty($service_metas['_threed_service_vc_slider']) && $threed_service_post_image==true)
          {
              $slider=get_post_meta(get_the_ID(),'_threed_service_vc_slider',true);
              $output.=do_shortcode($slider);
          }
        }
        $output.='</div>';
      }
      /************** POST IMAGE SECTION ENDS ******************/
      $link_url=get_the_permalink();
      /************** VC LINK SECTION STARTS ******************/
      if(!empty($threed_service_link_text))
      {
          $style='';
          if(!empty($threed_service_post_link_bg))
          {
            $style.='background-color:'.$threed_service_post_link_bg.';';
          }
          if(!empty($threed_service_post_link_fg))
          {
            $style.='color:'.$threed_service_post_link_fg.';';
          }
          if(!empty($threed_service_post_link_border))
          {
              $style.='border-color:'.$threed_service_post_link_border.';';
              $style.='border: solid '.$threed_service_post_link_border_width.'px;';
          }
          if(!empty($threed_service_post_link))
          {
              $link_url=$threed_service_post_link_url;
          }
          $output.='<a href="'.esc_url($link_url).'" class="button-medium '.$animation_class.'" style="'.esc_attr($style).'">'.$threed_service_link_text.'</a>';
      }
      /************** VC LINK SECTION STARTS ******************/
  }
  /***** LAYOUT 1 ENDS **/
  /***** LAYOUT 2 STARTS **/
  if($threed_service_post_layout=="Layout 2")
  {
        /************** POST IMAGE SECTION STARTS ******************/

        $image_align=$atts['threed_service_post_image_align']!=''? 'image-'.strtolower($atts['threed_service_post_image_align']):'image-left';
        if($atts['threed_service_post_image']==true)
        {

            $service_image=wp_get_attachment_image_src( get_post_meta(get_the_ID(),'_threed_service_vc_featured_image_id',true),'threed_service_type2_size');
            $output.='<div class="service-image '.esc_attr($image_align).'" style="background-image:url(\''.esc_url($service_image[0]).'\')">';
            $output.='</div>';
        }
        /************** POST IMAGE SECTION ENDS ******************/
        /************** POST TITLE SECTION STARTS ******************/
        $output.='<div class="service-info">';

          if($threed_service_post_title!='No')
          {
              $style='';
              if(!empty($threed_service_post_title_fg))
              {
                $style='color:'.$threed_service_post_title_fg.';';
              }
              $output.='<h4 class="service-post-title" style="'.esc_attr($style).'">'.get_the_title().'</h4>';
          }
          /************** POST TITLE SECTION ENDS ******************/
          /************** VC TITLE SECTION STARTS ******************/
          if(!empty($threed_service_title))
          {
              $style='';
              if(!empty($title_font_container_data['color']))
              {
                $style='color:#'.substr($title_font_container_data['color'],3).';';
              }
              if(!empty($title_font_container_data['font_size']))
              {
                $style.='font-size:'.$title_font_container_data['font_size'].'px;';
              }
              if(!empty($title_font_container_data['text_align']))
              {
                $style.='text-align:'.$title_font_container_data['text_align'].';';
              }
              $output.='<h2 style="'.esc_attr($style).'" class="'.esc_attr($threed_service_title_class).'">'.$threed_service_title.'</h2>';
          }
          /************** VC TITLE SECTION ENDS ******************/
          $word_limit=10;
          if($threed_service_post_content=='Yes')
          {
            $style='';
            if(!empty($threed_service_post_content_fg))
            {
              $style='color:'.$threed_service_post_content_fg.';';
            }
            $word_limit=$threed_service_post_content_length!=''?$threed_service_post_content_length:10;
            $output.='<div class="service-post-content" style="'.esc_attr($style).'">';
              $output.= wpautop(threed_get_the_excerpt($word_limit));
            $output.='</div>';
          }

          $link_url=get_the_permalink();
          /************** VC LINK SECTION STARTS ******************/
          if(!empty($threed_service_link_text))
          {
            $style='';
            if(!empty($threed_service_post_link_bg))
            {
              $style.='background-color:'.$threed_service_post_link_bg.';';
            }
            if(!empty($threed_service_post_link_fg))
            {
              $style.='color:'.$threed_service_post_link_fg.';';
            }
            if(!empty($threed_service_post_link_border))
            {
                $style.='border: solid '.$threed_service_post_link_border_width.'px; ';
                $style.='border-color:'.$threed_service_post_link_border.';';

            }
            if(!empty($threed_service_post_link))
            {
                $link_url=$threed_service_post_link_url;
            }
            $output.='<a href="'.esc_url($link_url).'" class="button-medium '.$animation_class.'" style="'.esc_attr($style).'">'.$threed_service_link_text.'</a>';
          }
          /************** VC LINK SECTION ENDS ******************/
      $output.='</div>';//service info end
  }
  /***** LAYOUT 2 ENDS **/
   /***** LAYOUT 3 ENDS **/
  if($atts['threed_service_post_layout']=="Layout 3")
  {
       $output.='<div class="service-info">';
        /************** POST TITLE SECTION STARTS ******************/
          if($atts['threed_service_post_title']!='No')
          {
              $style='';
              if(!empty($threed_service_post_title_fg))
              {
                $style='color:'.$atts['threed_service_post_title_fg'].';';
              }
              $output.='<h4 class="service-post-title" style="'.esc_attr($style).'">'.get_the_title().'</h4>';
          }
          /************** POST TITLE SECTION ENDS ******************/
          /************** VC TITLE SECTION STARTS ******************/
          if(!empty($atts['threed_service_title']))
          {
              $style='';
              if(!empty($title_font_container_data['color']))
              {
                $style='color:#'.substr($title_font_container_data['color'],3).';';
              }
              if(!empty($title_font_container_data['font_size']))
              {
                $style.='font-size:'.$title_font_container_data['font_size'].'px;';
              }
              if(!empty($title_font_container_data['text_align']))
              {
                $style.='text-align:'.$title_font_container_data['text_align'].';';
              }
              $output.='<h2 style="'.esc_attr($style).'" class="'.esc_attr($atts['threed_service_title_class']).'">'.$atts['threed_service_title'].'</h2>';
          }
          /************** VC TITLE SECTION ENDS ******************/
          $word_limit=10;
          if($atts['threed_service_post_content']=='Yes')
          {
            $style='';
            if(!empty($atts['threed_service_post_content_fg']))
            {
              $style='color:'.$atts['threed_service_post_content_fg'].';';
            }
            $word_limit=$threed_service_post_content_length!=''?$threed_service_post_content_length:10;
            $output.='<div class="service-post-content" style="'.esc_attr($style).'">';
              $output.= wpautop(threed_get_the_excerpt($word_limit));
            $output.='</div>';
          }

          /************** POST IMAGE SECTION STARTS ******************/

          $image_align=$threed_service_post_image_align!=''?'image-right':'image-left';
          if($atts['threed_service_post_image']==true)
          {
              $output.='<div class="service-image '.esc_attr($image_align).'">';
              $service_image=wp_get_attachment_image_src( get_post_meta(get_the_ID(),'_threed_service_vc_featured_image_id',true),'threed_service_type2_size');
              $output.='<img src="'.esc_url($service_image[0]).'" alt="service-image-'.get_the_ID().'">';
              $output.='</div>';
          }
          /************** POST IMAGE SECTION ENDS ******************/

          $link_url=get_the_permalink();
         /************** VC LINK SECTION STARTS ******************/
          if(!empty($threed_service_link_text))
          {
              $style='';
              if(!empty($threed_service_post_link_bg))
              {
                $style.='background-color:'.$threed_service_post_link_bg.';';
              }
              if(!empty($threed_service_post_link_fg))
              {
                $style.='color:'.$threed_service_post_link_fg.';';
              }
              if(!empty($threed_service_post_link_border))
              {
                  $style.='border-color:'.$threed_service_post_link_border.' !important;';
                  $style.='border: solid '.$threed_service_post_link_border_width.'px;';
              }
              if(!empty($threed_service_post_link))
              {
                  $link_url=$threed_service_post_link_url;
              }
              $output.='<a href="'.esc_url($link_url).'" class="button-medium '.$animation_class.'" style="'.esc_attr($style).'">'.$threed_service_link_text.'</a>';
          }
          /************** VC LINK SECTION ENDS ******************/
       $output.='</div>';//service info end
  }

  if($atts['threed_service_post_layout']=="Layout 4")
  {
      $image_align=$atts['threed_service_post_image_align']!=''? 'image-'.strtolower($atts['threed_service_post_image_align']).'-align':'image-left-align';
      $output.='<div class="service service-type-4 '.$image_align.' clearfix">';
        if(!empty($service_metas['_threed_service_vc_featured_image_id']) && $threed_service_post_image==true)
        {
            $service_image=wp_get_attachment_image_src( get_post_meta(get_the_ID(),'_threed_service_vc_featured_image_id',true),'threed_service_type4_size');
            $output.='<div class="image-holder">';
               $output.='<img src="'.esc_url($service_image[0]).'" alt="service-image-'.get_the_ID().'">';
            $output.='</div>';
        }
        $output.='<div class="service-info goforit">';

          if($threed_service_post_title!='No')
          {
              $style='';
              if(!empty($threed_service_post_title_fg))
              {
                $style='color:'.$threed_service_post_title_fg.';';
              }
              $output.='<h4 class="service-post-title" style="'.esc_attr($style).'">'.get_the_title().'</h4>';
          }
          if(!empty($threed_service_title))
          {
              $style='';
              if(!empty($title_font_container_data['color']))
              {
                $style='color:#'.substr($title_font_container_data['color'],3).';';
              }
              if(!empty($title_font_container_data['font_size']))
              {
                $style.='font-size:'.$title_font_container_data['font_size'].'px;';
              }
              if(!empty($title_font_container_data['text_align']))
              {
                $style.='text-align:'.$title_font_container_data['text_align'].';';
              }
              $output.='<h2 style="'.esc_attr($style).'" class="'.esc_attr($threed_service_title_class).'">'.$threed_service_title.'</h2>';
          }
          $word_limit=10;
          if($threed_service_post_content=='Yes')
          {
            $style='';
            if(!empty($threed_service_post_content_fg))
            {
              $style='color:'.$threed_service_post_content_fg.';';
            }
            $word_limit=$threed_service_post_content_length!=''?$threed_service_post_content_length:10;
            $output.='<div class="service-post-content">';
              $output.='<p style="'.esc_attr($style).'">';
                $output.=threed_get_the_excerpt($word_limit);
              $output.='</p>';
            $output.='</div>';
          }
         $link_url=get_the_permalink();
          /************** VC LINK SECTION STARTS ******************/

          /************** VC LINK SECTION STARTS ******************/
          if(!empty($threed_service_link_text))
          {
              $style='';
              if(!empty($threed_service_post_link_bg))
              {
                $style.='background-color:'.$threed_service_post_link_bg.';';
              }
              if(!empty($threed_service_post_link_fg))
              {
                $style.='color:'.$threed_service_post_link_fg.';';
              }
              if(!empty($threed_service_post_link_border))
              {

                  $style.='border: solid '.$threed_service_post_link_border_width.'px;';
                  $style.='border-color:'.$threed_service_post_link_border.' !important;';
              }
              if(!empty($threed_service_post_link))
              {
                  $link_url=$threed_service_post_link_url;
              }
              $output.='<div class="link-wrapper">';
                $output.='<a href="'.esc_url($link_url).'" class="button-medium '.$animation_class.'" style="'.esc_attr($style).'">'.$threed_service_link_text.'</a>';
              $output.='</div>';
          }
      /************** VC LINK SECTION STARTS ******************/
        $output.='</div>';
      $output.='</div>';

  }
  if($atts['threed_service_post_layout']=="Layout 5")
  {
      $image_align=$atts['threed_service_post_image_align']!=''? 'image-'.strtolower($atts['threed_service_post_image_align']).'-align':'image-left-align';
      $output.='<div class="service service-type-5 '.$image_align.' clearfix">';
        $output.='<div class="container">';
        if(!empty($service_metas['_threed_service_vc_featured_image_id']) && $threed_service_post_image==true)
        {
            $service_image=wp_get_attachment_image_src( get_post_meta(get_the_ID(),'_threed_service_vc_featured_image_id',true),'threed_service_type5_size');
            $output.='<div class="image-holder">';
               $output.='<img src="'.esc_url($service_image[0]).'" alt="service-image-'.get_the_ID().'">';
            $output.='</div>';
        }
        $output.='<div class="service-info goforit">';

          if($threed_service_post_title!='No')
          {
              $style='';
              if(!empty($threed_service_post_title_fg))
              {
                $style='color:'.$threed_service_post_title_fg.';';
              }
              $output.='<h4 class="service-post-title" style="'.esc_attr($style).'">'.get_the_title().'</h4>';
          }
          if(!empty($threed_service_title))
          {
              $style='';
              if(!empty($title_font_container_data['color']))
              {
                $style='color:#'.substr($title_font_container_data['color'],3).';';
              }
              if(!empty($title_font_container_data['font_size']))
              {
                $style.='font-size:'.$title_font_container_data['font_size'].'px;';
              }
              if(!empty($title_font_container_data['text_align']))
              {
                $style.='text-align:'.$title_font_container_data['text_align'].';';
              }
              $output.='<h2 style="'.esc_attr($style).'" class="'.esc_attr($threed_service_title_class).'">'.$threed_service_title.'</h2>';
          }
          $word_limit=10;
          if($threed_service_post_content=='Yes')
          {
            $style='';
            if(!empty($threed_service_post_content_fg))
            {
              $style='color:'.$threed_service_post_content_fg.';';
            }
            $word_limit=$threed_service_post_content_length!=''?$threed_service_post_content_length:10;
            $output.='<div class="service-post-content">';
              $output.='<p style="'.esc_attr($style).'">';
                $output.=threed_get_the_excerpt($word_limit);
              $output.='</p>';
            $output.='</div>';
          }
         $link_url=get_the_permalink();
          /************** VC LINK SECTION STARTS ******************/

          /************** VC LINK SECTION STARTS ******************/
            if(!empty($threed_service_link_text))
            {
                $style='';
                if(!empty($threed_service_post_link_bg))
                {
                  $style.='background-color:'.$threed_service_post_link_bg.';';
                }
                if(!empty($threed_service_post_link_fg))
                {
                  $style.='color:'.$threed_service_post_link_fg.';';
                }
                if(!empty($threed_service_post_link_border))
                {
                    $style.='border-color:'.$threed_service_post_link_border.' !important;';
                    $style.='border: solid '.$threed_service_post_link_border_width.'px;';
                }
                if(!empty($threed_service_post_link))
                {
                    $link_url=$threed_service_post_link_url;
                }
                $output.='<a href="'.esc_url($link_url).'" class="button-medium '.$animation_class.'" style="'.esc_attr($style).'">'.$threed_service_link_text.'</a>';
            }
            /************** VC LINK SECTION STARTS ******************/
        $output.='</div>';
        $output.='</div>';
      $output.='</div>';

  }



  $output.='</div>'; //main service div ends

  endwhile; endif;
  wp_reset_postdata();
  wp_reset_query();
  $output.='</div>'; //wrapper div ends

  return $output;
}
