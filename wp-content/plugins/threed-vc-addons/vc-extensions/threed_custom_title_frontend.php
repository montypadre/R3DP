<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}

add_shortcode( 'threed_custom_title', 'threed_custom_title_function' );
function threed_custom_title_function( $atts ,$content=null) {

   extract( shortcode_atts( array(
      'threed_custom_section_class'=>'',
      'threed_custom_title_text'=>'',
      'threed_custom_title_font_container'=>'',
      'threed_custom_title_class'=>'',
      'threed_custom_subtitle'=>'',
      'threed_custom_subtitle_font_container'=>'',
      'threed_custom_subtitle_class'=>'',
      'threed_custom_content'=>'',
      'threed_custom_content_class'=>'',
      'threed_custom_content_limit'=>'20',
      'threed_custom_title_icon'=>'',
      'threed_custom_title_icon_align'=>'',
      'threed_custom_title_style'=>''
 ), $atts,'threed_custom_title' ) );


  $title_style='tag:h2|text_align:left';
  $subtitle_style='tag:h3|text_align:left';
  if(!empty($atts['threed_custom_title_font_container']))
  {
      $title_style=$atts['threed_custom_title_font_container'];
  }
  if(!empty($atts['threed_custom_subtitle_font_container']))
  {
      $subtitle_style=$atts['threed_custom_subtitle_font_container'];
  }
  $title_font_container_data=threed_extract_font_container($title_style);
  $subtitle_font_container_data=threed_extract_font_container($subtitle_style);

  $style='';
  $class='';
  $icon_align_class='';
  $word_limit=20;
  $css_class ='';
  if(array_key_exists('threed_custom_title_style', $atts))
  {
     $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_custom_title_style, ' ' ), '', $atts['threed_custom_title_style']);//Design Options settings class need to imlemented as per requirement
  }


  if($threed_custom_title_icon_align=="Left")
  {
      $icon_align_class='icon-left';
  }
  if($threed_custom_title_icon_align=="Right")
  {
      $icon_align_class='icon-right';
  }

  $output='';
  $output.='<div class="section-heading '.esc_attr($css_class).' '.esc_attr($icon_align_class).' '.esc_attr($threed_custom_section_class).'">';


      $output.='<div class="title_content">'; //title content start
        if(!empty($threed_custom_title_icon))
        {
           $icon=wp_get_attachment_image( $atts['threed_custom_title_icon'], 'threed_custom_title_icon' );
           $output.='<div class="title_icon">';
               $output.=$icon;
           $output.='</div>';
        }
        if(!empty($threed_custom_title_text))
        {
          $style='';
          $class='';
          if(!empty($title_font_container_data['color']))
          {
            $style='color:#'.substr($title_font_container_data['color'],3).';';
          }
          if(!empty($title_font_container_data['font_size']))
          {
            $style.='font-size:'.$title_font_container_data['font_size'].'px;';
          }
          if(!empty($threed_custom_title_class))
          {
            $class='class="'.$atts['threed_custom_title_class'].'"';
          }

          $output.='<'.$title_font_container_data['tag'].' class="threed-heading" style="'.$style.'" '.$class.'>'.$threed_custom_title_text.'</'.$title_font_container_data['tag'].'>';
        }
        if(!empty($atts['threed_custom_subtitle']))
        {
          $style='';
          $class='';
          if(!empty($subtitle_font_container_data['color']))
          {
            $style='color:#'.substr($subtitle_font_container_data['color'],3).';';
          }
          if(!empty($subtitle_font_container_data['font_size']))
          {
            $style.='font-size:'.$subtitle_font_container_data['font_size'].'px;';
          }
          if(!empty($threed_custom_subtitle_class))
          {
            $class='class="'.$threed_custom_subtitle_class.'"';
          }
          $output.='<'.$subtitle_font_container_data['tag'].'  class="threed-subheading" style="'.$style.'" '.$class.'>'.$threed_custom_subtitle.'</'.$subtitle_font_container_data['tag'].'>';
        }
        $output.='</div>'; //title content ends

        if(!empty($threed_custom_content))
        {
          if(!empty($threed_custom_content_limit) && $threed_custom_content_limit!='')
          {
              $word_limit=$threed_custom_content_limit;
          }
          if(!empty($threed_custom_content_class))
          {
            $class='class="'.$threed_custom_content_class.'"';
          }
          $output.='<div '.$class.' class="threed-content">' ;
            $output.=wpautop(threed_word_limit(strip_tags($threed_custom_content),$word_limit));
          $output.='</div>';
        }
  $output.='</div>'; //section heading end
 return $output;
}
