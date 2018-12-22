<?php
/*
* Plugin Name: Threed Widgets
* Plugin URI: http://www.0efforthemes.com
* Description: Threed Theme specific Widgets.
* Version: 0.1
* Author: 0effortthemes
* Author URI: http://www.0efforthemes.com
* Text Domain: threed

*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Service Post Type
require_once( dirname(__FILE__) . '/widgets/threed-recent-popular-post.php');
require_once( dirname(__FILE__) . '/widgets/threed-archive-post.php');
