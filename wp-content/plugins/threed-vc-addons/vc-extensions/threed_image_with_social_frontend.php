<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}

add_shortcode( 'threed_image_with_social', 'threed_image_with_social_function' );
function threed_image_with_social_function( $atts ,$content=null) {

   extract( shortcode_atts( array(

      'threed_image_with_social_image'=>'',
      'threed_image_with_social_img_align'=>'',
      'threed_image_with_social_name'=>'',
      'threed_image_with_social_desg'=>'',
      'threed_image_with_social_phone'=>'',
      'threed_image_with_social_email'=>'',
      'threed_image_with_social_fb'=>'',
      'threed_image_with_social_twitter'=>'',
      'threed_image_with_social_behance'=>'',
      'threed_image_with_social_vimeo'=>''


 ), $atts,'threed_image_with_social' ) );
  $background_style='';
  if(!empty($threed_image_with_social_image))
  {
    $image_src = wp_get_attachment_image_src($threed_image_with_social_image,'full');
    $background_style='background:url(\''.esc_url($image_src[0]).'\');background-repeat:no-repeat;';
  }
  $image_align_class="";
  if(!empty($threed_image_with_social_img_align) && $threed_image_with_social_img_align!='')
  {
      if($threed_image_with_social_img_align!='Right')
      {
        $image_align_class="image-left";
      }
  }
  $output='<div class="admin-contact '.esc_attr($image_align_class).'" style="'.esc_attr($background_style).'">';

  if(!empty($threed_image_with_social_name) || !empty($threed_image_with_social_desg))
  {
      $output.='<div class="admin-title">';
        if(!empty($threed_image_with_social_name))
        {
          $output.='<h3>'.$threed_image_with_social_name.'</h3>';
        }
        if(!empty($threed_image_with_social_desg))
        {
          $output.='<h4>'.$threed_image_with_social_desg.'</h4>';
        }
      $output.='</div>';
  }
  if(!empty($threed_image_with_social_phone) || !empty($threed_image_with_social_email))
  {
    $output.='<div class="admin-body">';
      if(!empty($threed_image_with_social_phone))
      {
        $output.=wpautop('Phone:'.$threed_image_with_social_phone);
      }
      if(!empty($threed_image_with_social_email))
      {
        $output.=wpautop('Email:'.$threed_image_with_social_email);
      }
    $output.='</div>';
  }

  if(!empty($threed_image_with_social_fb) || !empty($threed_image_with_social_twitter) || !empty($threed_image_with_social_behance) || !empty($threed_image_with_social_vimeo))
  {
    $output.='<div class="admin-social">';
    if(!empty($threed_image_with_social_fb))
    {
      $output.='<a href="'.esc_url($threed_image_with_social_fb).'"><i class="fa fa-facebook"></i></a>';
    }
    if(!empty($threed_image_with_social_twitter))
    {
      $output.='<a href="'.esc_url($threed_image_with_social_twitter).'"><i class="fa fa-twitter"></i></a>';
    }
    if(!empty($threed_image_with_social_behance))
    {
      $output.='<a href="'.esc_url($threed_image_with_social_behance).'"><i class="fa fa-behance"></i></a>';
    }
    if(!empty($threed_image_with_social_vimeo))
    {
      $output.='<a href="'.esc_url($threed_image_with_social_vimeo).'"><i class="fa fa-vimeo"></i></a>';
    }
    $output.='</div>';
  }
   $output.='</div>';
  return $output;
}
