<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}
add_shortcode( 'threed_main_product_carousel', 'threed_main_product_carousel_function' );
function threed_main_product_carousel_function( $atts ,$content=null) {

  extract( shortcode_atts( array(
      'threed_main_product_section_class'=>'',
      'threed_main_product_item_slide'=>'',
      'threed_main_product_navigation'=>'ARROW',
      'threed_main_product_post_order'=>'ASC',
      'threed_main_product_post_no'=>'6',
      'threed_main_product_post_ids'=>'',
      'threed_main_product_post_title'=>'',
      'threed_main_product_post_content'=>'',
      'threed_main_product_post_content_length'=>'',
      'threed_main_product_post_button'=>'',
      'threed_main_product_style'=>'',
  ), $atts,'threed_main_product_carousel' ) );

  $css_class ='';
  if(array_key_exists('threed_main_product_style', $atts))
  {
      $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $threed_main_product_style, ' ' ), '', $atts['threed_main_product_style']);//Design Options settings class need to imlemented as per requirement
  }
  if(!array_key_exists('threed_main_product_post_title', $atts))
  {
     $atts['threed_main_product_post_title']=false;
  }
  if(!array_key_exists('threed_main_product_post_content', $atts))
  {
     $atts['threed_main_product_post_content']=false;
  }
  if(!array_key_exists('threed_main_product_post_button', $atts))
  {
     $atts['threed_main_product_post_button']=false;
  }
  if(!array_key_exists('threed_main_product_section_class', $atts))
  {
      $atts['threed_main_product_section_class']='';
  }
  if(!array_key_exists('threed_main_product_post_content_length', $atts))
  {
      $atts['threed_main_product_post_content_length']=0;
  }


  $item_no=2;
  if(!empty($atts['threed_main_product_item_slide']))
  {
    $item_no=$atts['threed_main_product_item_slide'];
  }
  $nav_style="dots";
  if(!empty($atts['threed_main_product_navigation']) && $atts['threed_main_product_navigation']=="ARROW")
  {
    $nav_style="arrow";
  }
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
  wp_enqueue_script( 'threed-owl-main-product-script',  plugins_url(). '/threed-vc-addons/js/owl-main-product-script.js', array( 'jquery' ), '','1.6.2',true );
  wp_localize_script( 'threed-owl-main-product-script', ' threedsettings', array('main_product_owl_item'=>$item_no,'main_product_navigation'=>$nav_style ) );


  $output='';

  $args['post_type']="main-product";
  $args['order']="ASC";
  if(!empty($threed_main_product_post_order))
  {
    if($threed_main_product_post_order=="IDS")
    {
        if(!empty($threed_main_product_post_ids))
        {
           $args['post__in']=explode(",",$threed_main_product_post_ids);
           $args['posts_per_page']=-1;
           unset($args['order']);
        }
    }
    else
    {
        $args['order']=$threed_main_product_post_order;
        $args['posts_per_page']=$threed_main_product_post_no;
    }

  }

  $word_limit=10;
  $main_product_posts=new WP_Query($args);
  $output.='<section class="product-area row '.esc_attr($css_class).' '.esc_attr($atts['threed_main_product_section_class']).'">';  //main wrapper div starts

      $output.='<div class="main_product_owl">'; // owl carousel div starts

      if ( $main_product_posts->have_posts() ) : while ( $main_product_posts->have_posts() ) : $main_product_posts->the_post();   //post loop

          $output.='<div class="item">';
            $output.='<div class="product-item">';
              if(has_post_thumbnail())
              {
                  $thumb = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'threed_main_product_slider_image' );
                  $output.='<div class="product-img-area">';
                    $output.=$thumb;
                  $output.='</div>';
              }
              $output.='<div class="item-content">';

                if($atts['threed_main_product_post_title']==true)
                {
                  $output.='<h2>'.get_the_title().'</h2>';
                }
                if($atts['threed_main_product_post_content']==true)
                {
                  $word_limit=$atts['threed_main_product_post_content_length']!=''?$atts['threed_main_product_post_content_length']:10;
                  $output.= wpautop(threed_get_the_excerpt($word_limit));;
                }
                if($atts['threed_main_product_post_button']==true)
                {
                  $output.='<a href="'.get_the_permalink().'" class="button-product">'.esc_html__('ask a quote','threed').'</a>';
                }
              $output.='</div>';
            $output.='</div>';
          $output.='</div>';

      endwhile; endif;
      wp_reset_postdata();
      wp_reset_query();

      $output.='</div>'; // owl carousel div ends
  $output.='</section>';

  return $output;
}
