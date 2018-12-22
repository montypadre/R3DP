<?php
if(!defined( 'WPB_VC_VERSION' ) )
{
    return;
}
add_shortcode( 'logo_carousel', 'threed_logo_carousel_functions' );
function threed_logo_carousel_functions( $atts)
{
   extract( shortcode_atts(array(
      'logo_images' => '',
      'logo_links'=>''
   ), $atts ));
   $logo_images_array=explode(",",$logo_images);
   $logo_links_array=explode("<br />",$logo_links);

  $output='';
  $output.='<ul class="company-logos">';
  foreach($logo_images_array as $key => $logo_id)
  {
      $image = wp_get_attachment_image($logo_id,'full');
      if(! isset($logo_links_array[$key]))
      {
        $output.='<li>'.$image.'</li>';
      }
      else
      {
        $output.='<li><a href="'.esc_url($logo_links_array[$key]).'">'.$image.'</a></li>';
      }
  }
  $output.= '</ul>';
  return $output;

}

