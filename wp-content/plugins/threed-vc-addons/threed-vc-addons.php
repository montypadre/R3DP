<?php
/*
Plugin Name: Threed VC Addon
Plugin URI: http://0effotstheme.com
Author: 0effort Theme
Author URI: http://0effotstheme.com
Version: 1.0.0
Description: Includes theme VC element.
Text Domain: threed
*/
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_enqueue_scripts', 'threed_vc_addons_script' );
function threed_vc_addons_script()
{
	wp_enqueue_style( 'threed-vc-addons',  plugins_url().'/threed-vc-addons/css/threed-vc-addon.css', array() );
}
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_extensions_functions.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_custom_title.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_custom_title_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_services.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_service_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_logo_carousel.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_logo_carousel_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_main_product_carousel.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_main_product_carousel_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_linked_title.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_linked_title_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_team.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_team_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_image_with_social.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_image_with_social_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_divider.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_divider_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_gallery.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_gallery_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_portfolio.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_portfolio_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_image_hover.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_image_hover_frontend.php');

require_once( plugin_dir_path( __FILE__) . 'vc-extensions/vc_threed_instagram.php');
require_once( plugin_dir_path( __FILE__) . 'vc-extensions/threed_instagram_frontend.php');
