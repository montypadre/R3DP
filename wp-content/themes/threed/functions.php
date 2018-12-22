<?php

if ( class_exists( 'WooCommerce' ) )
{
    require_once (get_template_directory().'/inc/functions/wc-functions.php');
}
require get_template_directory() . '/inc/plugin-activation/plugin-activation.php';
if ( ! function_exists( 'threed_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function threed_setup() {

	/* LOAD SCRIPTS AND STYLES */
	add_action( 'wp_enqueue_scripts', 'threed_load_scripts_styles' );

	/*** WOOCOMMERCE SUPPORT **/
	add_theme_support( 'woocommerce' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_editor_style('css/threed-editor-style.css');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'gallery','image','video' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'threed_custom_background_args', array('default-color' => 'ffffff','default-image' => '') ) );

	/* Mobile Specific Metas */
	add_action( 'wp_head', 'threed_add_viewport_meta' );


	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption') );
	add_action( 'init', 'threed_register_menus' );
	/****************  REDUX ********************/
	require get_template_directory() . '/admin/admin-init.php';
	/****** ADDING CMB for Custom Metabox ******/
	if ( ! class_exists( 'cmb_Meta_Box' ) )
	{
		require_once (get_template_directory().'/inc/cmb/init.php');
		add_filter('cmb2_meta_box_url','threed_filter_cmb2_url');
	}
	/****** END OF CMB ******/
	if(function_exists( 'add_image_size' ) )
	{
		add_image_size( 'threed_home_page_banner', 1840, 958, true );

		add_image_size( 'threed_custom_title_icon', 33, 40, true );
		add_image_size( 'threed_service_type1_size', 528, 351, true );
		add_image_size( 'threed_service_type2_size', 512, 426, true );
    add_image_size( 'threed_service_type4_size', 400, 300, true );
    add_image_size( 'threed_service_type5_size', 400, 490, true );
		add_image_size( 'threed_main_product_slider_image', 370, 327, true );

		add_image_size( 'threed_blog_list_image', 374, 351, true );
		add_image_size( 'threed_linked_title_icon', 24, 29, true );

		add_image_size( 'threed_team_member_image', 540, 513, true );
		add_image_size( 'threed_single_member_image', 370, 421, true );
		add_image_size( 'threed_single_member_slider', 300, 300, true );

		add_image_size( 'threed_single_post_image', 1184, 500, true );

		add_image_size( 'threed_portfolio_single', 1140, 300,true);
		add_image_size( 'threed_portfolio_others', 180, 174,true);

		add_image_size( 'threed_gallery_1_size', 1170, 594,true);
		add_image_size( 'threed_gallery_2_size', 555, 500,true);
		add_image_size( 'threed_gallery_3_size', 370, 327,true);

		add_image_size( 'threed_gallery_carousel_size', 1170, 594,true);


		add_image_size( 'threed_portfolio_image_size_1', 370, 455,true);
		add_image_size( 'threed_portfolio_image_size_2', 370, 334,true);
		add_image_size( 'threed_portfolio_image_size_3', 370, 576,true);

		add_image_size( 'threed_tabbed_widget_image_size', 116, 80,true);
	}
    if (isset($_GET["activated"]) && $pagenow = "themes.php")
    {
        wp_safe_redirect(admin_url('themes.php?page=threed_options&tab=12'));
    }
}
endif; // threed_setup
add_action( 'after_setup_theme', 'threed_setup' );

function threed_content_width()
{
	$GLOBALS['content_width'] = apply_filters( 'threed_content_width', 1170 );
}
add_action( 'after_setup_theme', 'threed_content_width', 0 );
/**
* Function Name 	: threed_add_viewport_meta
*	Description 	: Adding Viewport Meta to the header
*/
function threed_add_viewport_meta()
{
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />';
  echo '<meta property="og:image" content="http://web2developer.in.md-in-26.webhostbox.net/themes/threed-businessthemes/wp-content/uploads/2016/06/threed_preview.jpg"/>';
}//end of function

function threed_google_fonts()
{
  // Google Font enqueue
  $font_families="Roboto Condensed:400,300,700|Roboto:400,100,300,500,700,900";
  $query_args['family'] = urlencode($font_families);
  $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
  wp_enqueue_style( 'threed-theme-style-fonts',$fonts_url, array(), null );
}
add_action( 'wp_enqueue_scripts', 'threed_google_fonts' );

/**
 * Enqueue scripts and styles.
 */
function threed_load_scripts_styles() {

	// styles enqueue
	wp_enqueue_style( 'threed-style', get_stylesheet_uri() );
	wp_enqueue_style( 'vendor-css', get_template_directory_uri() . '/css/vendor.css', array(), 'v1' );
	wp_enqueue_style( 'threed-main-css', get_template_directory_uri() . '/css/threed-main.css', array(), 'v1' );
	wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/css/owl.carousel.css', array(), 'v1' );
	wp_enqueue_style( 'owl-themes-css', get_template_directory_uri() . '/css/owl.theme.css', array(), 'v1' );

	// javascript enqueue
	wp_enqueue_script( 'threed-vendorscript', get_template_directory_uri() . '/js/vendor/bootstrap.min.js',array('jquery'), 'v1', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.pkgd.min.js', array('jquery'), 'v1', true );
	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), 'v1', true );
	wp_enqueue_script( 'wayPoints-js', get_template_directory_uri() . '/js/vendor/waypoints.min.js', array(), 'v1', true );
  wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/js/jquery.validate.min.js',array('jquery'));
	wp_enqueue_script( 'threed-mainscript', get_template_directory_uri() . '/js/threed-main.js', array('validate-js'), 'v1', true );

	wp_localize_script( 'threed-mainscript', 'sitesettings', array('ajaxurl' => admin_url( 'admin-ajax.php' )));

	if(threed_get_option('site-loader')==1 && threed_get_option('site-loader-type')==1)
	{
		wp_enqueue_style( 'threed-spinner-css', get_template_directory_uri() . '/css/threed-spinner.css', array(), 'v1' );
	}

	// comment form enqueue
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	{
		wp_enqueue_script( 'comment-reply' );
	}
	/****** VISUAL COMPOSER SUPPORTS *******/
	  if ( ! function_exists( 'is_plugin_active' ) )
    {
        require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    }

    if(is_plugin_active('js_composer/js_composer.php'))
    {
        $front_css_file = vc_asset_url( 'css/js_composer.css' );
        if ( vc_settings()->get( 'use_custom' ) == '1' && is_file( $upload_dir['basedir'] . '/' . vc_upload_dir() . '/js_composer_front_custom.css' ) ) {
        $front_css_file = $upload_dir['baseurl'] . '/' . vc_upload_dir() . '/js_composer_front_custom.css';
        }
        wp_enqueue_style( 'js_composer_front', $front_css_file, false, WPB_VC_VERSION, 'all' );
    }
	/****** VISUAL COMPOSER SUPPORTS END *******/
}//end of function

/*****************  WIDGET AREA DEFINATIONS STARTS************************/
require_once get_template_directory() . '/inc/widgets/register-widget-areas.php';
/*****************  WIDGET AREA DEFINATIONS ENDS************************/
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/extras.php';
require_once get_template_directory() . '/inc/customizer.php';

/****************** THREED METABOX AREA STARTS *********************/
require_once get_template_directory() . '/inc/metabox/metabox-init.php';
/****************** THREED METABOX AREA ENDS *********************/




/**
* Function Name : threed_get_option
* Description : Getting the redux options with the specific option name as parmater.
**/
if (!function_exists('threed_get_option'))
{
	function threed_get_option($option_name, $default_value = '', $used_for_object = '')
	{
	   global $threed_theme_options, $shortname;
	   if (class_exists('ReduxFramework'))
	   {
	       if (gettype($option_name) == 'string')
	       {
	         $option_value = isset( $threed_theme_options[$option_name] )? $threed_theme_options[$option_name] : false;
	       }elseif (is_array($option_name) && count($option_name) > 0)
	       {
	           $option_value = $threed_theme_options;
	           foreach ($option_name as $i => $val)
	           {
	               if (is_array($option_value) && count($option_value) > 0){
	                    $option_value = isset( $option_value[$val] )? $option_value[$val] : false;
	               }
	           }
	       }
	   } else {
	       $option_value = get_option($option_name);
	   }
	   if (!$option_value && '' != $default_value)
	       $option_value = $default_value;
	   return $option_value;
	}//end of function
}

/**
 *  Function Name   : threed_get_favicon
 *  Description     : Setting the favicon
 */
function threed_get_favicon()
{
		if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() )
        {
	        $favicon=threed_get_option(array('opt-favicon-image','url'));
	        if($favicon=='')
	        {
	        	$favicon=get_template_directory_uri().'/images/favicon.png';
	        }
	        printf('<link rel="shortcut icon" href="%1$s" type="image/png" sizes="16x16">',esc_url($favicon));
		}
		else
		{
			if(function_exists('wp_site_icon'))
			{
				wp_site_icon();
			}
		}
}//end of function

/**
*   Function Name   : threed_hook_internal_css
*   Description     : Will add internal CSS added through Redux at the header section on Load
*/
add_action('wp_head','threed_hook_internal_css');
function threed_hook_internal_css()
{
    $internal_css = threed_get_option('opt-ace-editor-css');
    if ( false === $internal_css || '' == $internal_css )
    {
        return;
    }
    printf(' <style type="text/css" id="threed-internal-css"> %1$s  </style> ',$internal_css);
} //end of function

/**
*   Function Name   : threed_integrate_head_scripts
*   Description     : Will add internal JS added through Redux at the header section on Load
*/
function threed_integrate_head_scripts()
{
    $integrate_script = threed_get_option('opt-ace-editor-js');
    if ( false === $integrate_script || '' == $integrate_script )
    {
         return;
    }
    printf(' <script> %1$s  </script> ',$integrate_script);
} //end of function
add_action('wp_head','threed_integrate_head_scripts');
/**
 *  Function Name   : threed_get_the_excerpt
 *  Description     : Geting the excerpt data with length specified as parameter
 */
function threed_get_excerpt($word_limit='') {

    $excerpt = get_the_excerpt();

    $words = explode(' ', $excerpt, ($word_limit + 1));

        if(count($words) > $word_limit && !empty($word_limit))
        {
          array_pop($words);
          return implode(' ', $words).'...';
        } else {
          //otherwise
          return implode(' ', $words);
        }

} //end of function

/**
 *  Function Name   : threed_get_the_excerpt
 *  Description     : Geting the excerpt data with length specified as parameter
 */
function threed_get_the_excerpt($word_limit='') {

    $excerpt = get_the_excerpt();

    $words = explode(' ', $excerpt, ($word_limit + 1));

        if(count($words) > $word_limit && !empty($word_limit))
        {
          array_pop($words);

          return implode(' ', $words);
        } else {
          //otherwise
          return implode(' ', $words);
        }

} //end of function
/**
 *  Function Name   : threed_word_limit
 *  Description     : Geting the data with length specified as parameter
 */
function threed_word_limit($content,$word_limit) {

    $words = explode(' ', $content, ($word_limit + 1));

        if(count($words) > $word_limit)
        {
          array_pop($words);

          return implode(' ', $words)."...";
        } else {
          //otherwise
          return implode(' ', $words);
        }

} //end of function

function threed_register_menus()
{
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'threed' ),
		'footer' => esc_html__( 'Footer Menu', 'threed' ),
	) );
}


//**SOUVIK CODE**//
 function threed_admin_script()
 {
    wp_enqueue_script('threed-admin-js', get_stylesheet_directory_uri().'/js/threed-admin.js', array('jquery'), '1.6.2',true);
 }

 add_action('admin_enqueue_scripts', 'threed_admin_script');


 /****/
 function threed_banner_content()
 {
 	$output='';

 	if ( (is_front_page() && is_home()) || is_front_page() )
	{

		if(threed_get_option('home-page-banner')==1)
		{
			$home_page_banner_image=threed_get_option('home-page-static-banner');
			if(!empty($home_page_banner_image['url']))
			{
				$banner_bg = wp_get_attachment_image_url( $home_page_banner_image['id'], 'threed_home_page_banner' );
			 	$output.='<div class="banner_area">';
			    	$output.='<img src="'.esc_url($banner_bg).'" class="img-responsive" alt="banner">';
			    $output.='</div>';
			}
		}
		else
		{
			$slider=threed_get_option('opt-header-slider-shortcode');
		    if(!empty($slider))
		    {
				$output.=do_shortcode($slider);
			}
		}
	}
	return $output;
 }


function threed_main_product_category()
{
	$args = array( 'taxonomy' => 'main_product_category' );
	$terms = get_terms('main_product_category', $args);
	$cat_arr=array();
	if (count($terms) > 0)
	{
		foreach ($terms as $term)
		{
			$cat_arr[$term->term_id]= $term->name;
		}
	}
	return $cat_arr;
}//end of function
function threed_main_product_ids()
{
	$args = array( 'posts_per_page' => -1,'post_type' => 'main-product',);
	$terms = get_posts( $args );
	$cat_arr=array();
	if (count($terms) > 0)
	{
		foreach ($terms as $term)
		{
			$cat_arr[$term->ID]= $term->post_title;
		}
                wp_reset_postdata();
	}
	return $cat_arr;
}//end of function

function threed_other_service_ids()
{
    if(is_admin())
    {
        if(isset($_GET['post']))
        {
          $service_id=get_post_type($_GET['post']);
          if('service' == $service_id )
          {

                  $args = array( 'posts_per_page' => -1,'post_type' => 'service','post__not_in'=>array($_GET['post']));
                  $terms = get_posts( $args );
                  $cat_arr=array();
                  if (count($terms) > 0)
                  {
                          foreach ($terms as $term)
                          {
                                  $cat_arr[$term->ID]= $term->post_title;
                          }
                          wp_reset_postdata();
                  }
                  return $cat_arr;
          }
        }//end of if
    }
}//end of function


function threed_SocialIcon($echo=true)
{
		$social_one ='';
		$social_two ='';
		$social_three ='';
		$social_four ='';
		$social_five ='';
		$social_six ='';
		$social_one_icon='';
		$social_two_icon='';
		$social_three_icon='';
		$social_four_icon='';
		$social_four_link='';
		$social_five_icon =	'';
		$social_five_link =	'';
		$social_six_icon =	'';
		$social_six_url =	'';

		$class='';
		if(threed_get_option('social-media-one-checkbox')==1)
		{
        	$social_one_icon = (( $social_one = threed_get_option('social-one-icon') ) && '' != $social_one ) ? $social_one : false;
			$social_one_url = (( $social_one_link = threed_get_option('social-one-url') ) && '' != $social_one_link ) ? $social_one_link : false;
		}
		if(threed_get_option('social-media-two-checkbox')==1)
		{
        	$social_two_icon = (( $social_two = threed_get_option('social-two-icon') ) && '' != $social_two ) ? $social_two : false;
			$social_two_url = (( $social_two_link = threed_get_option('social-two-url') ) && '' != $social_two_link ) ? $social_two_link : false;
		}
		if(threed_get_option('social-media-three-checkbox')==1)
		{
        	$social_three_icon = (( $social_three = threed_get_option('social-three-icon') ) && '' != $social_three ) ? $social_three : false;
			$social_three_url = (( $social_three_link = threed_get_option('social-three-url') ) && '' != $social_three_link ) ? $social_three_link : false;
		}
		if(threed_get_option('social-media-four-checkbox')==1)
		{
        	$social_four_icon = (( $social_four = threed_get_option('social-four-icon') ) && '' != $social_four ) ? $social_four : false;
			$social_four_url = (( $social_four_link = threed_get_option('social-four-url') ) && '' != $social_four_link ) ? $social_four_link : false;
		}
		if(threed_get_option('social-media-five-checkbox')==1)
		{
        	$social_five_icon = (( $social_five = threed_get_option('social-five-icon') ) && '' != $social_five ) ? $social_five : false;
			$social_five_url = (( $social_five_link = threed_get_option('social-five-url') ) && '' != $social_five_link ) ? $social_five_link : false;
		}
		if(threed_get_option('social-media-six-checkbox')==1)
		{
        	$social_six_icon = (( $social_six = threed_get_option('social-six-icon') ) && '' != $social_six ) ? $social_six : false;
			$social_six_url = (( $social_six_link = threed_get_option('social-six-url') ) && '' != $social_six_link ) ? $social_six_link : false;
		}

		$allowed_tags_before_after=array('ul' => array('class'=>array(),'id'=>array()),'i'=>array('class'=>array()),'li' => array('class'=>array()),'a'=>array('class'=>array(),'id'=>array(),'href'=>array(),'title'=>array(),'target'=>array()),'strong'=>array());

		$str='<ul class="social-area clearfix">';
		if($social_one_icon)
		{
			$class=substr($social_one_icon,3);
			$str.='<li><a class="'.$class.'" target="_blank" href="'.esc_url($social_one_url).'"><i class="fa '.esc_attr($social_one_icon).'"></i></a></li>';
		}
		if($social_two_icon)
		{
			$class=substr($social_two_icon,3);
			$str.='<li><a class="'.$class.'" target="_blank" href="'.esc_url($social_two_url).'"><i class="fa '.esc_attr($social_two_icon).'"></i></a></li>';
		}
		if($social_three_icon)
		{
			$class=substr($social_three_icon,3);
			$str.='<li><a class="'.$class.'" target="_blank" href="'.esc_url($social_three_url).'"><i class="fa '.esc_attr($social_three_icon).'"></i></a></li>';
		}
		if($social_four_icon)
		{
			$class=substr($social_four_icon,3);
			$str.='<li><a class="'.$class.'" target="_blank" href="'.esc_url($social_four_url).'"><i class="fa '.esc_attr($social_four_icon).'"></i></a></li>';
		}

		if($social_five_icon)
		{
			$class=substr($social_five_icon,3);
			$str.='<li><a class="'.$class.'" target="_blank" href="'.esc_url($social_five_url).'"><i class="fa '.esc_attr($social_five_icon).'"></i></a></li>';
		}
		if($social_six_icon)
		{
			$class=substr($social_six_icon,3);
			$str.='<li><a class="'.$class.'" target="_blank" href="'.esc_url($social_six_url).'"><i class="fa '.esc_attr($social_six_icon).'"></i></a></li>';
		}
		$str.='</ul>';
		if($echo==true)
		{
			echo wp_kses(sprintf(__('%s','threed'), $str),$allowed_tags_before_after);
		}
		else
		{
			return $str;
		}

}//end of function

add_action( 'wp_head', 'threed_social_styles' );
function threed_social_styles()
{
	$social_styles='';

	$social_one ='';
	$social_two ='';
	$social_three ='';
	$social_four ='';
	$social_five ='';
	$social_six ='';
	$social_one_icon ='';
	$social_two_icon='';
	$social_three_icon='';
	$social_four_icon='';
	$social_five_icon='';
	$social_six_icon='';

	if(threed_get_option('social-media-one-checkbox')==1)
	{
        $social_one_icon = (( $social_one = threed_get_option('social-one-icon') ) && '' != $social_one ) ? $social_one : false;
        $social_one_bgcolor=threed_get_option('social-one-bgcolor');
		if($social_one_icon && $social_one_bgcolor!='')
		{
			$social_styles.=' .social-area i.'.$social_one_icon.'{ background-color:'.$social_one_bgcolor.' !important;color:'.$social_one_bgcolor.' !important;}';
		}
	}
	if(threed_get_option('social-media-two-checkbox')==1)
	{
    	$social_two_icon = (( $social_two = threed_get_option('social-two-icon') ) && '' != $social_two ) ? $social_two : false;
    	$social_two_bgcolor=threed_get_option('social-two-bgcolor');
		if($social_two_icon && $social_two_bgcolor!='')
		{
			$social_styles.=' .social-area i.'.$social_two_icon.'{ background-color:'.$social_two_bgcolor.' !important;color:'.$social_two_bgcolor.' !important;}';
		}
	}
	if(threed_get_option('social-media-three-checkbox')==1)
	{
    	$social_three_icon = (( $social_three = threed_get_option('social-three-icon') ) && '' != $social_three ) ? $social_three : false;
		$social_three_bgcolor=threed_get_option('social-threed-bgcolor');
		if($social_three_icon)
		{
			$social_styles.=' .social-area i.'.$social_three_icon.'{ background-color:'.$social_three_bgcolor.' !important;color:'.$social_three_bgcolor.' !important;}';
		}
	}
	if(threed_get_option('social-media-four-checkbox')==1)
	{
    	$social_four_icon = (( $social_four = threed_get_option('social-four-icon') ) && '' != $social_four ) ? $social_four : false;
		$social_four_bgcolor=threed_get_option('social-four-bgcolor');
		if($social_four_icon)
		{
			$social_styles.=' .social-area i.'.$social_four_icon.'{ background-color:'.$social_four_bgcolor.' !important;color:'.$social_four_bgcolor.' !important;}';
		}
	}
	if(threed_get_option('social-media-five-checkbox')==1)
	{
    	$social_five_icon = (( $social_five = threed_get_option('social-five-icon') ) && '' != $social_five ) ? $social_five : false;
		$social_five_bgcolor=threed_get_option('social-five-bgcolor');
		if($social_five_icon)
		{
			$social_styles.=' .social-area i.'.$social_five_icon.'{ background-color:'.$social_five_bgcolor.' !important;color:'.$social_five_bgcolor.' !important;}';
		}
	}
	if(threed_get_option('social-media-six-checkbox')==1)
	{
    	$social_six_icon = (( $social_six = threed_get_option('social-six-icon') ) && '' != $social_six ) ? $social_six : false;
		$social_six_bgcolor=threed_get_option('social-six-bgcolor');
		if($social_six_icon)
		{
			$social_styles.=' .social-area i.'.$social_six_icon.'{ background-color:'.$social_six_bgcolor.' !important;color:'.$social_six_bgcolor.' !important;}';
		}
	}

	if(!empty($social_styles) && $social_styles!='')
	{
		printf(' <style type="text/css" id="threed-social-styles"> %1$s  </style> ',$social_styles);
	}
}//end of function

/*****  CMB2 URL For WINDOWS **/
function threed_filter_cmb2_url()
{
	return get_template_directory_uri()."/inc/cmb/";
}//end of function

/**
 *  Function Name   : threed_footer_image_change
 *  Description     : Setting Footer Image
 */
if ( ! function_exists( 'threed_footer_image_change' ) )
{
    add_action( 'wp_head', 'threed_footer_image_change' );
    function threed_footer_image_change()
    {
    	$footer_bg_css='';
    	if(threed_get_option('footer-bg-img','url'))
	    {
	        $footer_bg_image=threed_get_option('footer-bg-img');
	        if(!empty($footer_bg_image['url']))
	        {
	        	$footer_bg = wp_get_attachment_image_url( $footer_bg_image['id'], 'threed_footer_bg_image' );
	        	$footer_bg_css.='.footer-area{ background-image:url("'.esc_url($footer_bg).'") !important;}';
	        	printf(' <style type="text/css" id="threed-footer-bg-css"> %1$s  </style> ',$footer_bg_css);
	        }
	    }
   	}
}//end of if

function threed_sidebar_settings($post_type)
{
	if(empty($post_type))
	{
		return;
	}
	$var_name="opt-".$post_type."-layout";
	return threed_get_option($var_name);
}//end of function

function threed_get_all_menus()
{
	$menus=get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	$menus_arr=array();
	if(count($menus)>0)
	{
		$menus_arr['threed-nomenu']= 'Select Menu ';
		foreach ($menus as $menu)
		{
			$menus_arr[$menu->slug]= $menu->name;
		}
	}
	return $menus_arr;
}
function threed_comment_counter($id){
    global $wpdb;
    $query = "SELECT * FROM $wpdb->comments WHERE `comment_approved` = 1 AND `comment_parent` = $id ";
    $parents = $wpdb->query($query);
    return $parents;
}


if ( ! function_exists( 'threed_custom_comments_template' ) ) :
function threed_custom_comments_template($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	$comment_class="comment-no-child";
	if(threed_comment_counter(get_comment_ID()) != NULL)
	{
		$comment_class ="comment-has-child";
	}

?>
	<li <?php comment_class($comment_class); ?> id="post-comment-<?php comment_ID() ?>" >
        <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix posted-comments level-1">
                <div class="user-img-holder">
                    <?php echo get_avatar( $comment, $size='60' ); ?>
                </div>
                <div class="comment-details">
                    <div class="clearfix">
                        <h4><?php echo get_comment_author(); ?></h4>
                       <div class="comment-content clearfix">
                       <div class="like-container">
                        <?php

                       		$like_class="threed-like-comments";
                       		$comment_like='';
                       		$comment_user_lists=get_comment_meta($comment->comment_ID, "threed_comment_like",true);
                       		$user_ID = get_current_user_id();
                       		if(!empty($comment_user_lists))
						    {
								$comment_like=count($comment_user_lists);
							}
                       		if(is_user_logged_in ())
                       		{
								 $like_class="threed-like-comments";

								if(!empty($comment_user_lists))
							    {
							    	if(in_array($user_ID,$comment_user_lists))
							    	{
							    		$like_class.=" liked";
							    	}
							    }
							}
						?>

                       	<i class="fa fa-heart <?php echo esc_attr($like_class); ?>" data-src="<?php echo esc_attr($comment->comment_ID); ?>"></i>
                       	<span class="comment_like_count">
                       		<?php printf(__('%s','threed'),$comment_like); ?>
                       	</span>
                        <?php
								$et_comment_reply_link = get_comment_reply_link( array_merge( $args, array('reply_text' => '<i class="fa fa-reply"></i>'.esc_attr__('Reply','threed'),'depth' => $depth, 'max_depth' => $args['max_depth'])) );
								if($et_comment_reply_link )
								{
						?>
						</div>
								<div class="reply-container"><?php printf(__('%s','threed'),$et_comment_reply_link);?></div>
								<div class="edit-container">
                        <?php
                        		}
                        	    edit_comment_link( esc_html__( 'Edit', 'threed' ), ' ' );
                        ?>
                </div>
                        </div>
                    </div>
                    <h6><?php
						/* Sequence: 1: date, 2: time */
						printf( __( '%1$s', 'threed' ), get_comment_date() );
					?>
                    </h6>
                    <?php if ($comment->comment_approved == '0') : ?>
                            <em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.','threed') ?></em>
                            <br />
					<?php endif; ?>
                    <?php
                            $allowed_comment_tags=array('cite' => array(),'b' => array(),'s' => array(),'strike' => array(),'strong'=>array(),'blockquote' => array('cite'=>array()),'q' => array('cite'=>array()),'code' => array(),'a'=>array('href'=>array(),'title'=>array()),'acronym'=>array('title'=>array()));
                            echo wp_kses(get_comment_text(),$allowed_comment_tags);

                    ?>
            </div>
        </div>

<?php

}//end of function
endif;
/**
 * 	Function Name 	: threed_replace_reply_link_class
 *	Description 	: Adding a class to Comment Reply Link
 */
add_filter('comment_reply_link', 'threed_replace_reply_link_class');
function threed_replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link red-btn comment-btn", $class);
    return $class;
}//end of function

/**
 * 	Function Name 	: threed_edit_comment_link
 *	Description 	: Adding a class to  Edit Comment Link
 */
function threed_edit_comment_link( $output )
{
  $myclass = 'red-btn';
  return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $myclass, $output, 1 );
}//end of function
add_filter( 'edit_comment_link', 'threed_edit_comment_link' );
function threed_single_post_meta()
{
	$allowed_tags_before_after=array('i'=>array('class'=>array(),'data-src'=>array()));
	$like_class="threed-not-logged";
	$user_ID = get_current_user_id();
    $user_lists= get_post_meta(get_the_ID(), "threed_post_like",true);
    $total_like='';
    if(!empty($user_lists))
    {
		$total_like=count($user_lists);
	}
	$single_post_meta='';
  $notlog = 'data-toggle="tooltip" data-placement="left" title="'.esc_html__('Please Logged In to Like','threed').'"';
	if(get_comments_number()>0)
	{
		$single_post_meta.='<div class="comment-number"><i class="fa fa-comments"></i>'.get_comments_number( 0, 1, '%' ).'</div>';
	}
	if(is_user_logged_in ())
	{
		$like_class="threed-like-post";
    $notlog = '';
		if(!empty($user_lists))
	    {
	    	if(in_array($user_ID,$user_lists))
	    	{
	    		$flag=1;
	    		$like_class.=" liked";
	    	}
	    }

	}
	$single_post_meta.='<div class="comment-like"><i class="fa fa-heart '.esc_attr($like_class).'" data-src="'.esc_attr(get_the_ID()).'" '. $notlog .'></i><span class="like_count">'.$total_like.'</span></div>';
	return $single_post_meta;
}

/**
 *  Function Name   : postLike
 *  Description     : Single Post Like Function
 */
add_action('wp_ajax_nopriv_postLike', 'threed_postLike' ); //witout logged in
add_action("wp_ajax_postLike","threed_postLike");           //logged in
function threed_postLike()
{
    $flag=0;
    $user_likes=array();
    $result=array();
    $post_id=$_POST["post_id"];
    $user_ID = get_current_user_id();
    $user_lists= get_post_meta($post_id, "threed_post_like",true);

    if(!empty($user_lists))
    {
    	if(in_array($user_ID,$user_lists))
    	{
    		$flag=1;
    		$key = array_search($user_ID, $user_lists);
    		unset($user_lists[$key]);
    		update_post_meta($post_id, "threed_post_like", $user_lists);
    	}
    }
    else
    {
    	$user_lists= array();
    }
    if($flag==0)
    {
    	   array_push($user_lists,$user_ID);
    	   update_post_meta($post_id, "threed_post_like", $user_lists);
    }
    $result['flag']=$flag;
    $result['total']=count($user_lists);

    echo json_encode($result);
    die();
}//end of function

/**
 *  Function Name   : commentLike
 *  Description     : Single Post Like Function
 */
add_action('wp_ajax_nopriv_commentLike', 'threed_commentLike' ); //witout logged in
add_action("wp_ajax_commentLike","threed_commentLike");           //logged in
function threed_commentLike()
{

    $flag=0;
    $user_likes=array();
    $result=array();
    $comment_id=$_POST["comment_id"];
    $user_ID = get_current_user_id();
    $user_lists= get_comment_meta($comment_id, "threed_comment_like",true);

    if(!empty($user_lists))
    {
    	if(in_array($user_ID,$user_lists))
    	{
    		$flag=1;
    		$key = array_search($user_ID, $user_lists);
    		unset($user_lists[$key]);
    		update_comment_meta($comment_id, "threed_comment_like", $user_lists);
    	}
    }
    else
    {
    	$user_lists= array();
    }
    if($flag==0)
    {
    	   array_push($user_lists,$user_ID);
    	   update_comment_meta($comment_id, "threed_comment_like", $user_lists);
    }
   $result['flag']=$flag;
   $result['total']=count($user_lists);

    echo json_encode($result);
    die();
}//end of function

function threed_get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;

    $id = get_the_ID();

    if ( false === $zero ) $zero = esc_html__( 'No Comments','threed' );
    if ( false === $one ) $one = esc_html__( '1 Comment' ,'threed');
    if ( false === $more ) $more = esc_html__( '% Comments','threed' );
    if ( false === $none )
	{
		if(!comments_open())
        {
			$css_class='comment-off ';
		}
		$none = esc_html__( ' Comments Off ','threed' );
	}

    $number = get_comments_number( $id );

    $str = '';

    if ( 0 == $number && !comments_open() && !pings_open() )
    {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }

    if ( post_password_required() ) {
        $str = esc_html__('Enter your password to view comments.','threed');
        return $str;
    }

    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else
    { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }

    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );

    $str .= apply_filters( 'comments_popup_link_attributes', '' );

    $str .= ' title="' . esc_attr( sprintf( esc_html__('Comment on %s','threed'), $title ) ) . '">';
    $str .= threed_get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';

    return $str;
}//end of function
/**
* 	Function Name 	: threed_get_comments_number_str
*	Description 	: Will show the number of comment for the respective post
*/
function threed_get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' )
{
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );

    $number = get_comments_number();

    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? esc_html__('% Comments','threed') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? esc_html__('No Comments','threed') : $zero;
    else // must be one
        $output = ( false === $one ) ? esc_html__('1 Comment','threed') : $one;

    return apply_filters('comments_number', $output, $number);
}//end of function


/*************************************************************/
/*----------FOR ASK QUOTE AJAX FORM SUMBIT-------------------*/
/*************************************************************/
add_action('wp_ajax_askQuote', 'threed_ask_quote'); // Call when user logged in
add_action('wp_ajax_nopriv_askQuote', 'threed_ask_quote'); // Call when user

function threed_ask_quote(){

  $post=get_post($_POST['post_id']);

  if(isset($_POST['to_email'])){
    $to_email = $_POST['to_email'];
  }

                        if(isset($_POST['to_email'])){
                            $send_to = $_POST['to_email'];
                        }

                        $subject = "Asking Quotation For:".$post->post_title;

                        $threed_mail_thumb_id = get_post_thumbnail_id($post->ID);
                        $threed_mail_thumb_url = wp_get_attachment_image_src($threed_mail_thumb_id,'thumbnail');
                        $threed_main_product_content= $post->post_content;
                        $threed_mail_content= wp_trim_words($threed_main_product_content , 40, '...' );

                        $message='';
                                $message.='<div class="mail-sendTo-wrapper">
                                        <div class="product-details">
                                          <div class="product-image">
                                            <a href="'.get_the_permalink($post->ID).'">
                                                <img src="'.$threed_mail_thumb_url[0].'">
                                            </a>
                                          </div>
                                          <div class="product-description">
                                          <a href="'.get_the_permalink($post->ID).'">
                                            <h6>'.$post->post_title.'</h6>
                                           </a>
                                            <p>'.$threed_mail_content.'</p>
                                          </div>
                                        </div>
                                        <div class="customer-details">
                                          <ul>';
                                if(isset($_POST['message_name'])){
                                    $message.= '<li><b>Name: </b> <span>'.$_POST['message_name'].'</span> </li>';
                                }
                                if(isset($_POST['message_email'])){
                                    $message.= '<li><b>email: </b> <span>'.$_POST['message_email'].'</span> </li>';
                                }
                                if(isset($_POST['message_phno'])){
                                    $message.= '<li><b>phone Number: </b> <span>'.$_POST['message_phno'].'</span> </li>';
                                }
                                if(isset($_POST['message_company'])){
                                    $message.= '<li><b>Company name: </b> <span>'.$_POST['message_company'].'</span> </li>';
                                }
                                if(isset($_POST['message_text'])){
                                    $message.= '<li><b>Message: </b> <span>'.$_POST['message_text'].'</span> </li>';
                                }
                                $message.='</ul>
                                        </div>
                                    </div>';

                        $headers="";
			if(isset($_POST['message_email'])){
			$headers = "From: " . $_POST['message_email'] . "\r\n";
			$headers .= "Reply-To: ". $_POST['message_email'] . "\r\n";
                        }
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



            $response = "";
            if(isset($_POST['to_email']) && isset($_POST['submitted']))
                {
                  if (wp_mail( $send_to, $subject, $message, $headers ) ) {
                      $response='success';
                } else {
                    $response='error';
                }
            }
      	    $responses=array("result"=>$response);
            $x=  json_encode($responses);
            echo  $x;


 die();

}
function threed_menu_class()
{
	$menu_transparent_class=get_post_meta(get_the_ID(),'_threed_page_transparent_menu',true)==''?'header-v2':'';
	$menu_sticky_class=get_post_meta(get_the_ID(),'_threed_page_sticky_menu',true)==''?'':'sticky-menu';

	return $menu_transparent_class.' '.$menu_sticky_class;
}
function threed_SearchFilter($query)
{
    if ($query->is_search)
    {
        $query->set('post_type', 'post');
    }

    return $query;
}
add_filter('pre_get_posts','threed_SearchFilter');

if ( ! function_exists( 'threed_404_page_banner_css' ) )
{

	    add_action( 'wp_head', 'threed_404_page_banner_css' );
	    function threed_404_page_banner_css()
	    {
	    	if(is_404())
	    	{
		    	$banner_css='';
		    	$banner_404=threed_get_option('banner-404-image');
		    	if($banner_404['url']!='')
		    	{
					$banner_css.='.error404 .site-content{ background-image: url("'.esc_url($banner_404['url']).'") !important; width:100%; background-size:cover !important;background-repeat:no-repeat;background-position:center  !important; height:100vh; }';
			    }
			    else
				{
					$banner_css.='.error404 .site-content{ background-image:none;background-color:#f3f3f3;padding:60px;}';
				}

				printf(' <style type="text/css" id="page-banner-css"> %1$s  </style> ',$banner_css);
			}
	   	}
}

function threed_SocialMeta()
{
	$str='';
	$flag=0;
	if(threed_get_option('threed-share-checkbox'))
	{
		if(threed_get_option('twitter-share'))
		{
			$str.='<a href="javascript:void(0);" class="twitter-sharer" onClick="threedShare(\'twitter\')"><i class="fa fa-twitter"></i></a>';
			$flag=1;
		}
		if(threed_get_option('fb-share'))
		{
			$str.='<a href="javascript:void(0);" class="facebook-sharer" onClick="threedShare(\'fb\')"><i class="fa fa-facebook"></i></a>';
			$flag=1;
		}
		if(threed_get_option('pinterest-share'))
		{
			$str.='<a href="javascript:void(0);" class="pinterest-sharer" onClick="threedShare(\'pinterest\')"><i class="fa fa-pinterest"></i></a>';
			$flag=1;
		}
		if(threed_get_option('gp-share'))
		{
			$str.='<a href="javascript:void(0);" class="google-sharer" onClick="threedShare(\'gp\')"><i class="fa fa-google-plus"></i></a>';
			$flag=1;
		}
		if(threed_get_option('linkedin-share'))
		{
	    	$str.='<a href="javascript:void(0);" class="linkedin-sharer" onClick="threedShare(\'linkedin\')"><i class="fa fa-linkedin"></i></a>';
	    	$flag=1;
	    }
	    if($flag==1)
	    {
	    	return $str;
	    }
	}
}//end of function

/**
 *  Function Name   : threed_list_pings
 *  Description     :
 */
if ( ! function_exists( 'threed_list_pings' ) )
{
    function threed_list_pings($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php
    }
}

/****** Called from header.php to set the Menu Navigation ****/
function threed_menu_navigation()
{
	if(is_home())
	{
		wp_nav_menu(
		array(
			'container' => 'ul',
			'menu_id'=> 'main-menu' ,
			'menu_class' => 'nav navbar-nav',
      'theme_location'=>'primary'
			)
		);
	}
	else
	{
		$page_menu_name=get_post_meta(get_the_ID(),'_threed_page_main-menu',true)==''?'threed-nomenu':get_post_meta(get_the_ID(),'_threed_page_main-menu',true);
		$page_show_menu=get_post_meta(get_the_ID(),'_threed_page_show_menu',true);
		if($page_show_menu==0 || empty($page_show_menu))
		{
	 		if($page_menu_name==='threed-nomenu')
	 		{

	 			wp_nav_menu(
	     		array(
	     			'container' => 'ul',
	     			'menu_id'=> 'main-menu' ,
	     			'menu_class' => 'nav navbar-nav',
            'theme_location'=>'primary'
	     			)
	     		);
	 		}
	 		else
	 		{

				wp_nav_menu(array('container' => false,'menu_id'=> 'main-menu' ,'menu_class' => 'nav navbar-nav','menu'=>$page_menu_name));
			}
		}
	}
}

if ( ! function_exists( 'threed_site_loader_bg_css' ) )
{
    add_action( 'wp_head', 'threed_site_loader_bg_css' );
    function threed_site_loader_bg_css()
    {
    	$loader_bg_css='';
    	$bg_color='';
    	if(threed_get_option('site-loader')==1)
  		{
  			$bg_color=threed_get_option('site-loader-bgcolor');
  			$loader_bg_css.='.loader-backdrop { background:'.$bg_color.' !important; }';
  		}
  		if($loader_bg_css!='')
  		{
  			printf(' <style type="text/css" id="page-banner-css"> %1$s  </style> ',$loader_bg_css);
  		}
   	}
}
if ( ! function_exists( 'threed_site_loader' ) )
{
    function threed_site_loader()
    {
    	$site_loader='';
    	$loader_container_html='';
    	$loader_html='';
    	$custom_loader_css='';
  		if(threed_get_option('site-loader-type')==1)
  		{
  			$site_loader=threed_get_option('site-loader-css');
  			switch($site_loader)
  			{
  				default :
  				case 1:
  						$loader_html='<div class="sk-rotating-plane"></div>';
  						break;
  				case 2:
  						$loader_html='<div class="sk-three-bounce">';
  					    	$loader_html.='<div class="sk-child sk-bounce1"></div>';
  					        $loader_html.='<div class="sk-child sk-bounce2"></div>';
  					        $loader_html.='<div class="sk-child sk-bounce3"></div>';
  					    $loader_html.='</div>';
  						break;

  				case 3:
  						$loader_html='<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';
  						break;

  				case 4:
  						$loader_html='<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';
  						break;

  				case 5:
  						$loader_html='<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';
  						break;

  				case 6:
  						$loader_html='<div class="sk-cube-grid">';
  							$loader_html.='<div class="sk-cube sk-cube1"></div>';
  							$loader_html.='<div class="sk-cube sk-cube2"></div>';
  							$loader_html.='<div class="sk-cube sk-cube3"></div>';
  							$loader_html.='<div class="sk-cube sk-cube4"></div>';
  							$loader_html.='<div class="sk-cube sk-cube5"></div>';
  							$loader_html.='<div class="sk-cube sk-cube6"></div>';
  							$loader_html.='<div class="sk-cube sk-cube7"></div>';
  							$loader_html.='<div class="sk-cube sk-cube8"></div>';
  							$loader_html.='<div class="sk-cube sk-cube9"></div>';
  						$loader_html.='</div>';
  						break;
  				case 7:
  						$loader_html='<div class="sk-folding-cube">';
  	        				$loader_html.='<div class="sk-cube1 sk-cube"></div>';
  	        				$loader_html.='<div class="sk-cube2 sk-cube"></div>';
  	        				$loader_html.='<div class="sk-cube4 sk-cube"></div>';
  	        				$loader_html.='<div class="sk-cube3 sk-cube"></div>';
        					$loader_html.='</div>';
  						break;
  				case 8:
  						$loader_html='<div class="sk-spinner sk-spinner-pulse"></div>';
  						break;
  			}
  		}
  		if(threed_get_option('site-loader-type')==2)
  		{
  			$loader_image=threed_get_option('site-loader-image');
  			$loader_image_url=$loader_image['url'];
  			$loader_html='<img src="'.$loader_image_url.'" alt="loader_image" />';
  		}
  		if(threed_get_option('site-loader-type')==3)
  		{
  			$custom_loader_css = threed_get_option('site-loader-custom-css');
  		    if ( false !== $custom_loader_css || '' !== $custom_loader_css )
  		    {
  		        printf(' <style type="text/css" id="threed-custom-loader-css"> %1$s  </style> ',$custom_loader_css);
  		    }

  		    $loader_html=threed_get_option('site-loader-custom-html');
  		}
  		$loader_container_html.='<div class="loader-wrapper">';
  			$loader_container_html.='<div class="loader-backdrop"></div>';
  			$loader_container_html.='<div class="loader-image">';
  				$loader_container_html.=$loader_html;
  			$loader_container_html.='</div>';
  		$loader_container_html.='</div>';

  		return $loader_container_html;
  }

}
function threed_pagination()
{
				global $wp_query;
				$pagination_class="";
				if(get_query_var('paged') == $wp_query->max_num_pages)
				{
					$pagination_class="last-page";
				}
?>
			<div class="pagination-block clearfix <?php echo esc_attr($pagination_class); ?>">
             <?php

                global $wp_query;
                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                   'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                   'format' => '?paged=%#%',
                   'type'=>'list',
                   'current' => max( 1, get_query_var('paged') ),
                   'total' => $wp_query->max_num_pages,
                   'prev_text'    => esc_html__('Previous','threed'),
                   'next_text'    => esc_html__('Next','threed'),
                ));
             ?>
      </div>
<?php

}

/**
* 	Function Name 	: threed_remove_author_title
*	  Description 	  : Remove 'Author: ' from get_the_archive_title() in author pages.
*/

function remove_author_title($title)
{
  if ( is_author() )
  {
    $title = get_the_author();
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'remove_author_title');

/**
 *  Function Name   : threed_footer_image_change
 *  Description     : Setting Footer Image
 */

    add_action( 'wp_head', 'threed_footer_image_change' );
    function threed_footer_image_change()
    {

      $footer_bg_css='';
      $footer_bg_image=get_post_meta(get_the_ID(),'_threed_page_footer_widget_bg_image_id',true);

      if(!empty($footer_bg_image))
      {
        $footer_bg = wp_get_attachment_image_url( $footer_bg_image, 'full' );
        $footer_bg_css.='.footer-area{ background-image:url("'.esc_url($footer_bg).'")}';
      }
      else
      {
        $footer_bg_color=get_post_meta(get_the_ID(),'_threed_page_footer_bg_color',true);
        if($footer_bg_color!='')
        {
          $footer_bg_css.='.footer-area{ background-color:'.$footer_bg_color.';}';
        }
        else
        {
            $footer_bg_image=threed_get_option('footer-bg-img');
            if(!empty($footer_bg_image['url']))
            {
              $footer_bg = wp_get_attachment_image_url( $footer_bg_image['id'], 'threed_footer_bg_image' );
              $footer_bg_css.='.footer-area{ background-image:url("'.esc_url($footer_bg).'")}';
            }
        }

    }
    if(!empty($footer_bg_css))
    {
      printf(' <style type="text/css" id="threed-footer-bg-css"> %1$s  </style> ',$footer_bg_css);
    }
  }

/**
 *  Function Name   : threed_bottom_footer_color
 *  Description     : Setting Footer Color
 */

  add_action( 'wp_head', 'threed_bottom_footer_color' );
  function threed_bottom_footer_color()
  {
    $bottom_footer_bg_css='';
    $footer_bg_color=get_post_meta(get_the_ID(),'_threed_page_footer_bot_bg_color',true);

    if($footer_bg_color!='')
    {
      $bottom_footer_bg_css.='.footer-bot{ background-color:'.$footer_bg_color.';}';
    }
    if(!empty($bottom_footer_bg_css))
    {
      printf(' <style type="text/css" id="threed-footer-bottom-css"> %1$s  </style> ',$bottom_footer_bg_css);
    }
  }//end of function

add_action( 'wp_head', 'threed_header_styles');
function threed_header_styles()
{
    $header_bg_css='';
    $header_transparent=get_post_meta(get_the_ID(),'_threed_page_transparent_menu',true);
    $header_bg_color=get_post_meta(get_the_ID(),'_threed_page_header_bg_color',true);
    $header_font_color=get_post_meta(get_the_ID(),'_threed_page_header_font_color',true);

    $submenu_hover_bg_color=get_post_meta(get_the_ID(),'_threed_page_sub_menu_hover_color',true);
    $submenu_font_color=get_post_meta(get_the_ID(),'_threed_page_sub_menu_font_color',true);


    $color_codes=explode(',',str_replace(')','',str_replace('rgba(','',$header_bg_color)));
    if(count($color_codes)>1)
    {
      array_pop($color_codes);
      $sticky_color='rgb('.implode(',',$color_codes).')';
    }
    else
    {
      $sticky_color=$color_codes[0];
    }


    if($header_transparent && $header_bg_color!='')
    {
      $header_bg_css.='.header_area .top_header, .menu_area .sub-menu  { background:none; background-color:'.esc_attr($header_bg_color).' !important; }';
      $header_bg_css.='.header_area .top_header .menu_area .sub-menu  li:hover{ background:none; background-color:'.esc_attr($sticky_color).' !important;} ';

      $header_bg_css.='.menu_area .navbar-nav li > a, .threed-menu-wrap-area .demo-submenu li a{ color:'.$header_font_color.' !important;}';
      $header_bg_css.='.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after{background-color:'.$header_font_color.' }';
      $header_bg_css.='.menu_area .navbar-nav > li:not(.menu-cart) > a:before, .menu_area .navbar-nav > li:not(.menu-cart) > a:after{ background:none; background-color:'.esc_attr($header_font_color).' !important; }';
      $header_bg_css.='.menu_area .navbar-nav li .mobile-dropdown ,.header_area .top_header.sticky-menu-add .menu_area .navbar-nav li .mobile-dropdown { color:'.$header_font_color.' !important; }';

      $header_bg_css.='.header_area .navbar-wrapper, .header_area .navbar-wrapper.open-nav, .header_area .top_header.sticky-menu-add ,.header_area .top_header.sticky-menu-add .menu_area .sub-menu { background:none; background-color:'.$sticky_color.' !important; }';
      $header_bg_css.='.header_area .top_header.sticky-menu-add .menu_area .sub-menu li:hover { background:none; background-color:'.$submenu_hover_bg_color.' !important; }';
      $header_bg_css.='.header_area .top_header.sticky-menu-add .menu_area .sub-menu li:hover > a { color:'.$submenu_font_color.' !important; }';
      $header_bg_css.='.header_area .top_header.sticky-menu-add .menu_area .sub-menu li:hover .mobile-dropdown { color:'.$submenu_font_color.' !important; }';

    }
    printf(' <style type="text/css" id="threed-header-style-css"> %1$s </style> ',$header_bg_css);
} //end of function
/***** FOR DEMO PURPOSES ****/
$home_url=get_home_url();
if($home_url=="http://web2developer.in.md-in-26.webhostbox.net/themes/threed-businessthemes/" || $home_url=="http://localhost/threed-businessthemes" )
{
     require_once (get_template_directory().'/inc/functions/threed-demos.php');
}
/****** DEMO SETTINGS ENDS ****/
