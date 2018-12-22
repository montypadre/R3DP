<?php
/*
* Plugin Name: Threed Custom Post Types
* Plugin URI: http://www.0efforthemes.com
* Description: Threed Theme specific Custom Post Types.
* Version: 0.1
* Author: 0effortthemes
* Author URI: http://www.0efforthemes.com
* Text Domain: threed
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Service Post Type
require_once( dirname(__FILE__) . '/cpts/threed-service-cpt.php');
// Team Member Post Type
require_once( dirname(__FILE__) . '/cpts/threed-team-member-cpt.php');
// Main Product Post Type
require_once( dirname(__FILE__) . '/cpts/threed-main-product-cpt.php');
// Portfolio Post Type
require_once( dirname(__FILE__) . '/cpts/threed-portfolio-cpt.php');
