<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kidsa
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package kidsa
 * @since 1.0.0
 */

define('KIDSA_THEME_ROOT', get_template_directory());
define('KIDSA_THEME_ROOT_URL', get_template_directory_uri());
define('KIDSA_INC', KIDSA_THEME_ROOT . '/inc');
define('KIDSA_THEME_SETTINGS', KIDSA_INC . '/theme-settings');
define('KIDSA_THEME_SETTINGS_IMAGES', KIDSA_THEME_ROOT_URL . '/inc/theme-settings/images');
define('KIDSA_TGMA', KIDSA_INC . '/plugins/tgma');
define('KIDSA_DYNAMIC_STYLESHEETS', KIDSA_INC . '/theme-stylesheets');
define('KIDSA_CSS', KIDSA_THEME_ROOT_URL . '/assets/css');
define('KIDSA_JS', KIDSA_THEME_ROOT_URL . '/assets/js');
define('KIDSA_ASSETS', KIDSA_THEME_ROOT_URL . '/assets');
define('KIDSA_DEV', true);


/**
 * Theme Initial File
 * @package kidsa
 * @since 1.0.0
 */
if (file_exists(KIDSA_INC . '/theme-init.php')) {
    require_once KIDSA_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package kidsa
 * @since 1.0.0
 */
if (file_exists(KIDSA_INC . '/theme-cs-function.php')) {
    require_once KIDSA_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package kidsa
 * @since 1.0.0
 */
if (file_exists(KIDSA_INC . '/theme-helper-functions.php')) {

    require_once KIDSA_INC . '/theme-helper-functions.php';
    if (!function_exists('kidsa')) {
        function kidsa()
        {
            return class_exists('Kidsa_Helper_Functions') ? new Kidsa_Helper_Functions() : false;
        }
    }
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
    function kidsa_theme_fallback_menu()
    {
        get_template_part('template-parts/default', 'menu');
    }
}

// theme-color

if (file_exists(KIDSA_INC . '/theme-color.php')) {
    require_once KIDSA_INC . '/theme-color.php';
}


// custom-header

function kidsa_custom_header_setup() {
    add_theme_support( 'custom-header', array(
        'default-image'      => get_template_directory_uri() . '/inc/theme-settings/images/header/00.png',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
        'default-text-color' => '000000',  // Default header text color
        'wp-head-callback'   => 'kidsa_header_style',  // Custom callback function for header styles
    ) );
}

// custom-background

function kidsa_custom_background_setup() {
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
}
add_action( 'after_setup_theme', 'kidsa_custom_background_setup' );


// woocode

if (class_exists('WooCommerce')) {
    include_once KIDSA_INC . '/woo.php';
}

// mega menu

$mega_menu_file = get_template_directory() . '/mega-menu.php';

if (file_exists($mega_menu_file)) {
    require_once $mega_menu_file;
}
