<?php

/**
 * Elementor Addons Init
 * @package kidsa
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly
}

if ( ! class_exists( 'Kidsa_Elementor_Widget_Init' ) ) {

	class Kidsa_Elementor_Widget_Init {
	   /**
		* $instance
		* @since 1.0.0
		*/
		private static $instance;

	   /**
		* construct()
		* @since 1.0.0
		*/
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array( $this, '_widget_categories' ) );
			//elementor widget registered
			add_action( 'elementor/widgets/widgets_registered', array( $this, '_widget_registered' ) );
			// elementor editor css
			add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'load_assets_for_elementor' ) );

			// for icomoon icon
			add_action( 'init', [ $this, 'i18n' ] );
			// for icomoon icon
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		public function i18n() {
			load_plugin_textdomain( 'kidsa-core' );
		}

		/**
	     * getInstance()
	     * @since 1.0.0
	     */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 */
		public function _widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'kidsa_widgets',
				[
					'title' => esc_html__( 'Kidsa Widgets', 'kidsa-core' ),
					'icon'  => 'fas fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 */
		public function _widget_registered() {
			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}
			$elementor_widgets = array(
				'buttons',
				'call-us',
				'project-post',
				'heading-with-button',
				'team-post',
				'testimonials',
				'blog-post',
				'form-images',
				'brands',
				'theme-icon-box',
				'contact-form',
				'pricing',
				'service-post',
				'theme-image-box',
				'faq-with-image',
				'contact-info',
				'banner-slider',
				'shape-animation',
				'text-slide',
				'video-section',
				'team-members',
				'project-slider',
			);

			$elementor_widgets = apply_filters( 'kidsa_elementor_widget', $elementor_widgets );
			ksort( $elementor_widgets );
			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				foreach ( $elementor_widgets as $widget ) {
					if ( file_exists( KIDSA_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php' ) ) {
						require_once KIDSA_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php';
					}
				}
			}
		}	

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		*/
		public function load_assets_for_elementor() {
			wp_enqueue_style( 'kidsa-core-elementor-style', KIDSA_CORE_ADMIN_ASSETS . '/css/elementor-editor.css' );
		}

		/**
		 * load custom icons for elementor
		 * @since 1.0.0
		*/

		public function init() {
			add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		}

		public function init_widgets() {
			require_once plugin_dir_path( __FILE__ ) . '../customicon/icon.php';
		}
	}

	if ( class_exists( 'Kidsa_Elementor_Widget_Init' ) ) {
		Kidsa_Elementor_Widget_Init::getInstance();
	}
}//end if
