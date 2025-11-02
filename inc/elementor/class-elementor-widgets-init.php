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
				'frameworks-marquee',
				'verification-crisis',
				'why-now',
				'platform-section',
				'operational-timeline',
				'policy-alignment-section',
				'development-programs',
				'data-governance-section',
				'industries-section',
				'subsidy-verification-section',
				'stakeholder-solutions-section',
				'comparison-table-section',
				'cta-section',
				'tech-specs-section',
				'integration-section',
				'contact-hero-section',
				'contact-info-cards',
				'contact-form-section',
				'modern-contact-form-section',
				'legal-breadcrumb',
				'legal-hero-section',
				'compliance-hero-section',
				'quick-navigation-section',
				'agrovue-verify-section',
				'scroll-triggered-image-section',
				'system-architecture-solution',
				'legal-content-section',
				'terms-content-section',
				'security-legal-content',
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

			// Enqueue frameworks marquee styles
			wp_enqueue_style(
				'meridian-frameworks-marquee',
				MERIDIAN_CSS . '/frameworks-marquee.css',
			array(),
			MERIDIAN_VERSION
		);

		// Enqueue verification crisis section styles
		wp_enqueue_style(
			'meridian-verification-crisis',
			MERIDIAN_CSS . '/verification-crisis.css',
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

		// Enqueue platform section styles
		wp_enqueue_style(
			'meridian-platform-section',
			MERIDIAN_CSS . '/platform-section.css',
			array(),
			MERIDIAN_VERSION
		);

		// Enqueue operational timeline styles
		wp_enqueue_style(
			'meridian-operational-timeline',
			MERIDIAN_CSS . '/operational-timeline.css',
			array(),
			MERIDIAN_VERSION
		);

		// Enqueue policy alignment section styles
		wp_enqueue_style(
			'meridian-policy-alignment-section',
			MERIDIAN_CSS . '/policy-alignment-section.css',
			array(),
			MERIDIAN_VERSION
		);

		// Enqueue development programs styles
		wp_enqueue_style(
			'meridian-development-programs',
			MERIDIAN_CSS . '/development-programs.css',
			array(),
			MERIDIAN_VERSION
		);

		// Enqueue data governance section styles
		wp_enqueue_style(
			'meridian-data-governance-section',
			MERIDIAN_CSS . '/data-governance-section.css',
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

			// Enqueue CTA section styles
			wp_enqueue_style(
				'meridian-cta-section',
				MERIDIAN_CSS . '/cta-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue institutional breadcrumb hero section styles
			wp_enqueue_style(
				'meridian-institutional-breadcrumb-hero',
				MERIDIAN_CSS . '/institutional-breadcrumb-hero.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue tech specs section styles
			wp_enqueue_style(
				'meridian-tech-specs-section',
				MERIDIAN_CSS . '/tech-specs-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue integration section styles
			wp_enqueue_style(
				'meridian-integration-section',
				MERIDIAN_CSS . '/integration-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue contact breadcrumb styles
			wp_enqueue_style(
				'meridian-contact-breadcrumb',
				MERIDIAN_CSS . '/contact-breadcrumb.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue contact hero section styles
			wp_enqueue_style(
				'meridian-contact-hero-section',
				MERIDIAN_CSS . '/contact-hero-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue contact info cards styles
			wp_enqueue_style(
				'meridian-contact-info-cards',
				MERIDIAN_CSS . '/contact-info-cards.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue contact form section styles
			wp_enqueue_style(
				'meridian-contact-form-section',
				MERIDIAN_CSS . '/contact-form-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue modern contact form section styles
			wp_enqueue_style(
				'meridian-modern-contact-form-section',
				MERIDIAN_CSS . '/modern-contact-form-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue agrovue verify section styles
			wp_enqueue_style(
				'meridian-agrovue-verify-section',
				MERIDIAN_CSS . '/agrovue-verify-section.css',
				array(),
				MERIDIAN_VERSION
			);

			// Enqueue system architecture solution section styles
			wp_enqueue_style(
				'meridian-system-architecture-solution',
				MERIDIAN_CSS . '/system-architecture-solution.css',
			// Enqueue legal content section styles (legal.css from original HTML)
			wp_enqueue_style(
				'meridian-legal-content-section',
				get_template_directory_uri() . '/agrovue-landing-html/css/legal.css',
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

			// Register platform section script
			wp_register_script(
				'meridian-platform-section',
				MERIDIAN_JS . '/platform-section.js',
				array( 'jquery' ),
				MERIDIAN_VERSION,
				true
			);

			// Enqueue contact form section script
			wp_enqueue_script(
				'meridian-contact-form-section',
				MERIDIAN_JS . '/contact-form-section.js',
				array( 'jquery' ),
				MERIDIAN_VERSION,
				true
			);

			// Enqueue modern contact form section script
			wp_enqueue_script(
				'meridian-modern-contact-form-section',
				MERIDIAN_JS . '/modern-contact-form-section.js',
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

