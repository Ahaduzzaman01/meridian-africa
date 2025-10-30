<?php
/**
 * Elementor Widgets Initialization
 * 
 * Registers and initializes all custom Elementor widgets for Meridian Africa theme.
 * Based on the demo theme structure but without Codestar Framework dependency.
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Meridian_Africa_Elementor_Widget_Init' ) ) {

	class Meridian_Africa_Elementor_Widget_Init {
		/**
		 * Instance
		 *
		 * @since 1.0.0
		 * @var Meridian_Africa_Elementor_Widget_Init
		 */
		private static $instance;

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// Register widget categories
			add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categories' ) );
			
			// Register widgets
			add_action( 'elementor/widgets/widgets_registered', array( $this, 'widget_registered' ) );
			
			// Enqueue editor assets
			add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'load_editor_assets' ) );
			
			// Enqueue frontend assets
			add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'load_frontend_styles' ) );
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'load_frontend_scripts' ) );
		}

		/**
		 * Get Instance
		 *
		 * @since 1.0.0
		 * @return Meridian_Africa_Elementor_Widget_Init
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Register Widget Categories
		 *
		 * @since 1.0.0
		 * @param object $elements_manager Elementor elements manager.
		 */
		public function widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'meridian-africa',
				array(
					'title' => esc_html__( 'Meridian Africa', 'meridian-africa' ),
					'icon'  => 'fa fa-satellite',
				)
			);
		}

		/**
		 * Register Widgets
		 *
		 * @since 1.0.0
		 */
		public function widget_registered() {
			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}

			// List of widgets to register
			$elementor_widgets = array(
				'hero-section',
				'breadcrumb-section',
				'solutions-hero-section',
				'subsidy-verification-section',
				'stakeholder-solutions-section',
				'comparison-table-section',
			);

			// Allow filtering of widgets
			$elementor_widgets = apply_filters( 'meridian_africa_elementor_widgets', $elementor_widgets );

			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				foreach ( $elementor_widgets as $widget ) {
					$widget_file = MERIDIAN_INC . '/elementor/widgets/class-' . $widget . '-widget.php';
					
					if ( file_exists( $widget_file ) && is_readable( $widget_file ) ) {
						require_once $widget_file;
					}
				}
			}
		}

		/**
		 * Load Editor Assets
		 *
		 * @since 1.0.0
		 */
		public function load_editor_assets() {
			// Enqueue Font Awesome for editor
			wp_enqueue_style(
				'font-awesome',
				'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
				array(),
				'6.4.0'
			);
		}

		/**
		 * Load Frontend Styles
		 *
		 * @since 1.0.0
		 */
		public function load_frontend_styles() {
			// Font Awesome is already enqueued in functions.php

			// Enqueue hero section styles
			wp_enqueue_style(
				'meridian-hero-section',
				MERIDIAN_CSS . '/hero-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue breadcrumb section styles
			wp_enqueue_style(
				'meridian-breadcrumb-section',
				MERIDIAN_CSS . '/breadcrumb-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue solutions hero section styles
			wp_enqueue_style(
				'meridian-solutions-hero-section',
				MERIDIAN_CSS . '/solutions-hero-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue subsidy verification section styles
			wp_enqueue_style(
				'meridian-subsidy-verification-section',
				MERIDIAN_CSS . '/subsidy-verification-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue stakeholder solutions section styles
			wp_enqueue_style(
				'meridian-stakeholder-solutions-section',
				MERIDIAN_CSS . '/stakeholder-solutions-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue comparison table section styles
			wp_enqueue_style(
				'meridian-comparison-table-section',
				MERIDIAN_CSS . '/comparison-table-section.css',
				array(),
				MERIDIAN_VERSION
			);
		}

		/**
		 * Load Frontend Scripts
		 *
		 * @since 1.0.0
		 */
		public function load_frontend_scripts() {
			// Register hero section script
			wp_register_script(
				'meridian-hero-section',
				MERIDIAN_JS . '/hero-section.js',
				array( 'jquery' ),
				MERIDIAN_VERSION,
				true
			);
		}
	}

	// Initialize the class
	if ( class_exists( 'Meridian_Africa_Elementor_Widget_Init' ) ) {
		Meridian_Africa_Elementor_Widget_Init::get_instance();
	}
}

