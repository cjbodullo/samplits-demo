<?php
/*
Plugin Name: Kidsa Core
Plugin URI: https://themeforest.net/user/gramentheme/portfolio
Description: Plugin to contain short codes and custom post types of the Kidsa theme.
Author: Gramentheme
Developer: Abdullah Al Mukit
Email: mukitbd71@gmail.com
Author URI: https://gramentheme.com/
Version: 2.1.0
Text Domain: kidsa-core
*/


/**
 * If this file is called directly, abort.
 * @package kidsa
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Plugin directory path
 * @package kidsa
 * @since 1.0.0
 */
define( 'KIDSA_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'KIDSA_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'KIDSA_CORE_SELF_PATH', 'kidsa-core/kidsa-core.php' );
define( 'KIDSA_CORE_VERSION', '2.1.0' );
define( 'KIDSA_CORE_INC', KIDSA_CORE_ROOT_PATH .'/inc');
define( 'KIDSA_CORE_LIB', KIDSA_CORE_ROOT_PATH .'/lib');
define( 'KIDSA_CORE_ELEMENTOR', KIDSA_CORE_ROOT_PATH .'/elementor');
define( 'KIDSA_CORE_DEMO_IMPORT', KIDSA_CORE_ROOT_PATH .'/demo-import');
define( 'KIDSA_CORE_ADMIN', KIDSA_CORE_ROOT_PATH .'/admin');
define( 'KIDSA_CORE_ADMIN_ASSETS', KIDSA_CORE_ROOT_URL .'admin/assets');
define( 'KIDSA_CORE_WP_WIDGETS', KIDSA_CORE_ROOT_PATH .'/wp-widgets');
define( 'KIDSA_CORE_ASSETS', KIDSA_CORE_ROOT_URL .'assets/');
define( 'KIDSA_CORE_CSS', KIDSA_CORE_ASSETS .'css');
define( 'KIDSA_CORE_JS', KIDSA_CORE_ASSETS .'js');
define( 'KIDSA_CORE_IMG', KIDSA_CORE_ASSETS .'img');


/**
 * Load additional helpers functions
 * @package kidsa
 * @since 1.0.0
 */
if (!function_exists('kidsa_core')){
	require_once KIDSA_CORE_INC .'/theme-core-helper-functions.php';
	if (!function_exists('kidsa_core')){
		function kidsa_core(){
			return class_exists('Kidsa_Core_Helper_Functions') ? new Kidsa_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


/**
 * Load Codestar Framework Functions
 * @package kidsa
 * @since 1.0.0
 */
if ( !kidsa_core()->is_kidsa_active()) {
	if ( file_exists( KIDSA_CORE_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once KIDSA_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}



/**
 * Core Plugin Init
 * @package kidsa
 * @since 1.0.0
 */
if ( file_exists( KIDSA_CORE_ROOT_PATH . '/inc/theme-core-init.php' ) ) {
	require_once KIDSA_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}