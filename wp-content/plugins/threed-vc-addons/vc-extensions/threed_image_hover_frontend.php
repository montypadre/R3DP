<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}

add_shortcode( 'threed_image_hover', 'threed_image_hover_function' );
function threed_image_hover_function( $atts ,$content=null) {

   extract( shortcode_atts( array(
      'threed_image_hover_section_title'=>'',
      'threed_image_hover_images'=>'',
      'threed_image_hover_effects'=>'Effect 1',
      'threed_image_hover_title'=>'',
      'threed_image_hover_title_color'=>'#000000',
      'threed_image_hover_title_bgcolor'=>"#ffffff",
      'threed_service_title_class'=>'',
      'threed_image_hover_subtitle'=>'',
      'threed_image_hover_subtitle_color'=>'#000000',
      'threed_service_subtitle_class'=>'',
      'threed_image_hover_fb'=>'',
      'threed_image_hover_twitter'=>'',
      'threed_image_hover_gplus'=>'',
      'threed_image_hover_style'=>'',

 ), $atts,'threed_image_hover' ) );

  $effect_class='effect-';
  $content_class='';
  $title_bgcolor='transparent';
  if(!empty($threed_image_hover_style))
  {
     $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_image_hover_style, ' ' ), '', $atts['threed_image_hover_style']);//Design Options settings class need to imlemented as per requirement
  }
  wp_enqueue_style( 'threed-image-hover', plugins_url().'/threed-vc-addons/css/threed-vc-image-hover.css', array(), 'v1' );

  switch($threed_image_hover_effects)
  {
      case 'Effect 1':
                      $effect_class.='lily';
                      break;
      case 'Effect 2':
                      $effect_class.='sadie';
                      break;
      case 'Effect 3':
                      $effect_class.='honey';
                      break;
      case 'Effect 4':
                      $effect_class.='layla';
                      break;
      case 'Effect 5':
                      $effect_class.='zoe';
                      $title_bgcolor=$threed_image_hover_title_bgcolor;
                      $content_class='description';
                      break;
      case 'Effect 6':
                      $effect_class.='oscar';
                      break;
      case 'Effect 7':
                      $effect_class.='marley';
                      break;
      case 'Effect 8':
                      $effect_class.='ruby';
                      break;
      case 'Effect 9':
                      $effect_class.='romeo';
                      break;
      case 'Effect 10':
                      $effect_class.='sarah';
                      break;

  }

  $output='';

  $output.='<div class="content">';
    if(!empty($threed_image_hover_section_title) && $threed_image_hover_section_title!=='')
    {
      $output.='<h2>'.$threed_image_hover_section_title.'</h2>';
    }
    $threed_image_hover_images_arr=explode(',',$threed_image_hover_images);

      $output.='<div class="grid">';
      if(!empty($threed_image_hover_images))
      {
        foreach($threed_image_hover_images_arr as $hover_image_id)
        {
            $hover_image=wp_get_attachment_image_src( $hover_image_id,'full');
            $url = $hover_image['0'];
            $output.='<figure class="'.esc_attr($effect_class).'">';
              $output.='<img src="'.esc_url($url).'" alt="img-'.esc_attr($hover_image_id).'"/>';
              $output.='<figcaption style="background-color:'.$title_bgcolor.'">';

              if($threed_image_hover_effects=='Effect 1')
              {
                $output.='<div>';
              }
                if(!empty($threed_image_hover_title) && $threed_image_hover_title!='')
                {
                  $output.='<h2 style="color:'.$threed_image_hover_title_color.'">'.rawurldecode( base64_decode( strip_tags($threed_image_hover_title))).'</h2>';
                }
                if($threed_image_hover_effects=='Effect 5')
                {
                  $output.='<p class="icon-links">';
                  if($threed_image_hover_fb!='')
                  {
                    $output.='<a href="'.esc_url($threed_image_hover_fb).'"><i class="fa fa-facebook"></i></a>';
                  }
                  if($threed_image_hover_twitter!='')
                  {
                    $output.='<a href="'.esc_url($threed_image_hover_twitter).'"><i class="fa fa-twitter"></i></a>';
                  }
                  if($threed_image_hover_gplus!='')
                  {
                    $output.='<a href="'.esc_url($threed_image_hover_gplus).'"><i class="fa fa-google-plus"></i></span></a>';
                  }
                  $output.='</p>';
                }
                if(!empty($threed_image_hover_subtitle) && $threed_image_hover_subtitle!='')
                {
                  $output.='<p class="'.$content_class.'"" style="color:'.$threed_image_hover_subtitle_color.'">'.$threed_image_hover_subtitle.'</p>';
                }
              if($threed_image_hover_effects=='Effect 1')
              {
                $output.='</div>';
              }
              $output.='</figcaption>';
            $output.='</figure>';
        }
      }
      $output.='</div>';
  $output.='</div>';

  return $output;
}
?>
