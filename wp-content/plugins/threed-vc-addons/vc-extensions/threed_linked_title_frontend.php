<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}

add_shortcode( 'threed_linked_title', 'threed_linked_title_function' );
function threed_linked_title_function( $atts ,$content=null) {

   extract( shortcode_atts( array(

      'threed_linked_title_text'=>'',
      'threed_linked_title_font_container'=>'',
      'threed_linked_title_url'=>'',
      'threed_linked_title_icon'=>'',

 ), $atts,'threed_linked_title' ) );


  $title_style='tag:h6';
  if(array_key_exists('threed_linked_title_font_container', $atts))
  {
      $title_style=$atts['threed_linked_title_font_container'];

  }
  $title_font_container_data=threed_extract_font_container($title_style);
  $output='';
  $output.='<div class="print-world-info-wrapper">';
  $url="#";
    if(array_key_exists('threed_linked_title_url', $atts))
    {
        $url=$atts['threed_linked_title_url'];
    }
      $output.='<a class="print-world-info clearfix" href="'.esc_url($url).'">'; //title content start
        if(!empty($atts['threed_linked_title_icon']))
        {
           $icon=wp_get_attachment_image( $atts['threed_linked_title_icon'], 'threed_linked_title_icon' );
           $output.=' <div class="print-world-info-icon">';
               $output.=$icon;
           $output.='</div>';
        }
        if(!empty($atts['threed_linked_title_text']))
        {
          $style='';
          $output.='<div class="print-world-info-title">';

            if(!empty($title_font_container_data['color']))
            {
              $style='color:#'.substr($title_font_container_data['color'],3).';';
            }
            if(!empty($title_font_container_data['font_size']))
            {
              $style.='font-size:'.$title_font_container_data['font_size'].'px;';
            }


            $output.='<'.$title_font_container_data['tag'].' style="'.esc_attr($style).'">'.$atts['threed_linked_title_text'].'</'.$title_font_container_data['tag'].'>';

          $output.='</div>';
        }
      $output.='</a>';

  $output.='</div>'; //wrapper end
 return $output;
}
