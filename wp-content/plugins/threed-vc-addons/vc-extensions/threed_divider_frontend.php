<?php
if ( !defined( 'WPB_VC_VERSION' ) ) 
{
    return;
}

add_shortcode( 'threed_divider', 'threed_divider_function' );
function threed_divider_function( $atts ,$content=null) {

   extract( shortcode_atts( array(
     
      'threed_divider_height'=>'',
      'threed_divider_class'=>'',    
      'threed_divider_style'=>'',           
      
 ), $atts,'threed_divider' ) );

  $css_class ='';

  if($threed_divider_style)
  {     
     $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_divider_style, ' ' ), '', $atts['threed_divider_style']);//Design Options settings class need to imlemented as per requirement  
  }
   if(!empty($threed_divider_class))
  {
      $css_class.=' '.$threed_divider_class;
  }
  $style='';
  if(!empty($threed_divider_height))
  {
    $style.='style=height:'.$threed_divider_height.';';
  }
  $output='';  
  $output.='<div class="or-spacer '.esc_attr($css_class).'">';
    $output.='<div class="mask" '.esc_attr($style).'></div>';
  $output.='</div>';
 return $output;
}
