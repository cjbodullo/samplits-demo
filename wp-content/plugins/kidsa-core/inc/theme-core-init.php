<?php
/**
 * Theme Core Init
 * @package kidsa
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Kidsa_Core_Init')) {

	class Kidsa_Core_Init
	{
	   /**
        * $instance
        * @since 1.0.0
        */
		protected static $instance;

		public function __construct()
		{
			//Load plugin assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
			//Load plugin admin assets
			add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
			//load plugin text domain
			add_action('init', array($this, 'load_textdomain'));
			//add custom icon to codester framework
			add_filter('csf_field_icon_add_icons', array($this, 'csf_custom_icon'));
			//load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
		}

	   /**
        * getInstance()
        * @since 1.0.0
        */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 */
		public function load_textdomain()
		{
			load_plugin_textdomain('kidsa-core', false, KIDSA_CORE_ROOT_PATH . '/languages');
		}

		/**
		 * Load plugin dependency files()
		 * @since 1.0.0
		 */
		public function load_plugin_dependency_files()
		{
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => KIDSA_CORE_LIB . '/codestar-framework'
				),
				array(
					'file-name' => 'theme-menu-page',
					'folder-name' => KIDSA_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-custom-post-type',
					'folder-name' => KIDSA_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-post-column-customize',
					'folder-name' => KIDSA_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-kidsa-core-excerpt',
					'folder-name' => KIDSA_CORE_INC
				),
				array(
					'file-name' => 'csf-taxonomy',
					'folder-name' => KIDSA_CORE_INC
				),
				array(
					'file-name' => 'theme-core-shortcodes',
					'folder-name' => KIDSA_CORE_INC
				),
				array(
					'file-name' => 'elementor-widget-init',
					'folder-name' => KIDSA_CORE_ELEMENTOR
				),
                array(
                    'file-name' => 'theme-social-share-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-me-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-us-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-search-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-tags-menu',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-recent-post-widget',
					'folder-name' => KIDSA_CORE_WP_WIDGETS
				),
				array(
					'file-name' => 'theme-recent-post-title-widget',
					'folder-name' => KIDSA_CORE_WP_WIDGETS
				),
				array(
					'file-name' => 'theme-contact-info-widget',
					'folder-name' => KIDSA_CORE_WP_WIDGETS
				),
                array(
                    'file-name' => 'theme-service-category-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-request-form-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-category-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-discover-company-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-file-download-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-author-widget',
                    'folder-name' => KIDSA_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-demo-data-import',
					'folder-name' => KIDSA_CORE_DEMO_IMPORT
				),
			);

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'theme-elementor-icon-manager',
                    'folder-name' => KIDSA_CORE_INC
                );
            }
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as $file) {
					if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function plugin_assets()
		{
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

		/**
		 * Load plugin css files()
		 * @since 1.0.0
		 */
		public function load_plugin_css_files()
		{
			$plugin_version = KIDSA_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'fontawesome',
					'src' => KIDSA_CORE_CSS . '/all.min.css',
					'deps' => array(),
					'ver' => '6.0',
					'media' => 'all'
				),
				array(
					'handle' => 'magnific-popup',
					'src' => KIDSA_CORE_CSS . '/magnific-popup.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
                array(
                    'handle' => 'animate',
                    'src' => KIDSA_CORE_CSS . '/animate.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
                array(
                    'handle' => 'meanmenu',
                    'src' => KIDSA_CORE_CSS . '/meanmenu.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
                    'handle' => 'nice-select',
                    'src' => KIDSA_CORE_CSS . '/nice-select.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
                    'handle' => 'swiper',
                    'src' => KIDSA_CORE_CSS . '/swiper-bundle.min.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
                    'handle' => 'bootstrap',
                    'src' => KIDSA_CORE_CSS . '/bootstrap.min.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
					'handle' => 'kidsa-core-theme-style',
					'src' => KIDSA_CORE_CSS . '/theme-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);
			$all_css_files = apply_filters('kidsa_core_css', $all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin js
		 * @since 1.0.0
		 */
		public function load_plugin_js_files()
		{
			// all js files   

			wp_enqueue_script( 'bootstrap-js', KIDSA_CORE_JS . '/bootstrap.bundle.min.js', array('jquery'), '1.5.9', true );
            wp_enqueue_script( 'counterup', KIDSA_CORE_JS . '/jquery.counterup.min.js', array('jquery'), '1.5.9', true );
            wp_enqueue_script( 'magnific-popup', KIDSA_CORE_JS . '/jquery.magnific-popup.min.js', array('jquery'), '1.6.2', true );
            wp_enqueue_script( 'meanmenu', KIDSA_CORE_JS . '/jquery.meanmenu.min.js', array('jquery'), '1.1.3', true );
            wp_enqueue_script( 'nice-select', KIDSA_CORE_JS . '/jquery.nice-select.min.js', array('jquery'), '1.1.3', true );
            wp_enqueue_script( 'waypoints', KIDSA_CORE_JS . '/jquery.waypoints.js', array('jquery'), '1.0.2', true );
            wp_enqueue_script( 'swiper-bundle', KIDSA_CORE_JS . '/swiper-bundle.min.js', array('jquery'), '1.0.2', true );
            wp_enqueue_script( 'viewport', KIDSA_CORE_JS . '/viewport.jquery.js', array('jquery'), '1.0.2', true );
            wp_enqueue_script( 'wow', KIDSA_CORE_JS . '/wow.min.js', array('jquery'), '1.0.2', true );
			
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function admin_assets()
		{
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * Load plugin admin css files()
		 * @since 1.0.0
		 */
		public function load_admin_css_files()
		{
			$plugin_version = KIDSA_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'kidsa-core-admin-style',
					'src' => KIDSA_CORE_ADMIN_ASSETS . '/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'icomoon',
					'src' => KIDSA_CORE_CSS . '/icomoon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
			);

			$all_css_files = apply_filters('kidsa_admin_css', $all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin admin js
		 * @since 1.0.0
		 */
		public function load_admin_js_files()
		{
			wp_enqueue_script( 'exgrid-core-widget', KIDSA_CORE_ADMIN_ASSETS . '/js/widget.js', array('jquery'), '1.0.2', true );
		}

		/**
		 * Add Custom Icon To Codester Framework
		 * @since 1.0.0
		 */
		public function csf_custom_icon($icons)
		{
			//adding new icon
			$icons[]  = array(
				'title' => esc_html__('Icomoon Icon', 'kidsa-core'),
				'icons' => array(
					"icon-icon-1",
					"icon-icon-2",
					"icon-icon-3",
					"icon-icon-4",
					"icon-icon-5",
					"icon-icon-7",
					"icon-icon-8",
					"icon-icon-9",
					"icon-icon-10",
					"icon-icon-11",
					"icon-icon-12",
					"icon-icon-13",
					"icon-icon-14",
					"icon-icon-15",
					"icon-icon-16",
					"icon-icon-17",
					"icon-icon-18",
					"icon-icon-19",
					"icon-icon-20",
					"icon-icon-21",
					"icon-icon-22",
					"icon-icon-23",
					"icon-icon-24"
				)
			);

			$icons = array_reverse($icons);

			return $icons;
		}
	} //end class
	if (class_exists('Kidsa_Core_Init')) {
		Kidsa_Core_Init::getInstance();
	}
}
