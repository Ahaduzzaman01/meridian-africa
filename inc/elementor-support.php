<?php
/**
 * Elementor Support and Theme Location Integration
 *
 * This file adds Elementor compatibility to the theme, allowing users to create
 * custom headers and footers using Elementor's Theme Builder without requiring
 * any additional plugins or frameworks.
 *
 * @package Meridian_Africa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add Elementor theme support
 */
function meridian_africa_add_elementor_support() {
	// Add theme support for Elementor
	add_theme_support( 'elementor' );
}
add_action( 'after_setup_theme', 'meridian_africa_add_elementor_support' );

/**
 * Register Elementor theme locations
 * This allows Elementor Pro's Theme Builder to work with our theme
 */
function meridian_africa_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'meridian_africa_register_elementor_locations' );

/**
 * Check if Elementor is active
 *
 * @return bool
 */
function meridian_africa_is_elementor_active() {
	return did_action( 'elementor/loaded' );
}

/**
 * Check if a custom Elementor footer is set
 *
 * @return bool
 */
function meridian_africa_has_elementor_footer() {
	if ( ! meridian_africa_is_elementor_active() ) {
		return false;
	}

	// Check if Elementor Pro is active and has a footer location
	if ( function_exists( 'elementor_theme_do_location' ) ) {
		return elementor_theme_do_location( 'footer' );
	}

	return false;
}

/**
 * Check if a custom Elementor header is set
 *
 * @return bool
 */
function meridian_africa_has_elementor_header() {
	if ( ! meridian_africa_is_elementor_active() ) {
		return false;
	}

	// Check if Elementor Pro is active and has a header location
	if ( function_exists( 'elementor_theme_do_location' ) ) {
		return elementor_theme_do_location( 'header' );
	}

	return false;
}

/**
 * Render Elementor footer
 * This function attempts to render an Elementor footer template
 *
 * @return bool True if Elementor footer was rendered, false otherwise
 */
function meridian_africa_render_elementor_footer() {
	if ( ! meridian_africa_is_elementor_active() ) {
		return false;
	}

	// Try to render Elementor footer location
	if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) {
		return true;
	}

	return false;
}

/**
 * Render Elementor header
 * This function attempts to render an Elementor header template
 *
 * @return bool True if Elementor header was rendered, false otherwise
 */
function meridian_africa_render_elementor_header() {
	if ( ! meridian_africa_is_elementor_active() ) {
		return false;
	}

	// Try to render Elementor header location
	if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) {
		return true;
	}

	return false;
}

/**
 * Add Elementor support for custom widgets
 * This allows theme-specific Elementor widgets to be registered
 */
function meridian_africa_register_elementor_widgets() {
	// Only proceed if Elementor is active
	if ( ! meridian_africa_is_elementor_active() ) {
		return;
	}

	// Register custom widget categories if needed
	add_action( 'elementor/elements/categories_registered', 'meridian_africa_add_elementor_widget_categories' );
}
add_action( 'init', 'meridian_africa_register_elementor_widgets' );

/**
 * Add custom Elementor widget categories
 *
 * @param object $elements_manager Elementor elements manager.
 */
function meridian_africa_add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'meridian-africa',
		array(
			'title' => esc_html__( 'Meridian Africa', 'meridian-africa' ),
			'icon'  => 'fa fa-plug',
		)
	);
}

/**
 * Enqueue Elementor-specific styles
 */
function meridian_africa_elementor_styles() {
	if ( ! meridian_africa_is_elementor_active() ) {
		return;
	}

	// Add any Elementor-specific styles here if needed
	// This ensures compatibility between theme styles and Elementor
}
add_action( 'wp_enqueue_scripts', 'meridian_africa_elementor_styles', 20 );

/**
 * Add Elementor compatibility for theme features
 */
function meridian_africa_elementor_compatibility() {
	if ( ! meridian_africa_is_elementor_active() ) {
		return;
	}

	// Ensure Elementor respects theme's container width
	update_option( 'elementor_container_width', '1200' );

	// Disable Elementor's Font Awesome loading to prevent conflicts
	update_option( 'elementor_load_fa4_shim', 'no' );

	// Set default color scheme to match theme
	// This can be customized based on your theme's color palette
}
add_action( 'after_switch_theme', 'meridian_africa_elementor_compatibility' );

/**
 * Remove Elementor's Font Awesome from being loaded
 *
 * @param string $tag    The link tag for the enqueued style.
 * @param string $handle The style's registered handle.
 * @return string Modified or original tag.
 */
function meridian_africa_remove_elementor_fontawesome( $tag, $handle ) {
	// Remove Elementor's Font Awesome if it's being loaded
	if ( strpos( $handle, 'elementor-icons-fa' ) !== false ) {
		return '';
	}
	return $tag;
}
add_filter( 'style_loader_tag', 'meridian_africa_remove_elementor_fontawesome', 10, 2 );

/**
 * Disable Elementor Font Awesome enqueue
 * Force Elementor to use theme's Font Awesome
 *
 * @since 1.0.0
 */
function meridian_africa_elementor_disable_fa() {
	// Remove Elementor's Font Awesome
	wp_dequeue_style( 'elementor-icons-fa-solid' );
	wp_dequeue_style( 'elementor-icons-fa-regular' );
	wp_dequeue_style( 'elementor-icons-fa-brands' );
	wp_deregister_style( 'elementor-icons-fa-solid' );
	wp_deregister_style( 'elementor-icons-fa-regular' );
	wp_deregister_style( 'elementor-icons-fa-brands' );
}
add_action( 'elementor/frontend/after_register_styles', 'meridian_africa_elementor_disable_fa', 20 );
add_action( 'elementor/editor/after_register_styles', 'meridian_africa_elementor_disable_fa', 20 );

/**
 * Disable Elementor's Font Awesome 4 compatibility
 * This ensures Font Awesome 6 icons work properly
 *
 * @since 1.0.0
 * @return string
 */
function meridian_africa_disable_fa4_compatibility() {
	return 'no';
}
add_filter( 'elementor/frontend/print_google_fonts', '__return_true' );

/**
 * Ensure Font Awesome is available in Elementor editor
 *
 * @since 1.0.0
 */
function meridian_africa_elementor_editor_enqueue() {
	wp_enqueue_style(
		'font-awesome-editor',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);
}
add_action( 'elementor/editor/before_enqueue_scripts', 'meridian_africa_elementor_editor_enqueue' );

/**
 * Ensure Font Awesome is available on frontend for Elementor widgets
 *
 * @since 1.0.0
 */
function meridian_africa_elementor_frontend_enqueue() {
	if ( ! wp_style_is( 'font-awesome', 'enqueued' ) ) {
		wp_enqueue_style(
			'font-awesome',
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
			array(),
			'6.4.0'
		);
	}
}
add_action( 'elementor/frontend/before_enqueue_scripts', 'meridian_africa_elementor_frontend_enqueue' );

/**
 * Filter to add body classes when Elementor templates are active
 *
 * @param array $classes Body classes.
 * @return array Modified body classes.
 */
function meridian_africa_elementor_body_classes( $classes ) {
	if ( meridian_africa_is_elementor_active() ) {
		if ( function_exists( 'elementor_theme_do_location' ) ) {
			// Check if custom header is set
			if ( elementor_location_exits( 'header', true ) ) {
				$classes[] = 'elementor-header-active';
			}
			
			// Check if custom footer is set
			if ( elementor_location_exits( 'footer', true ) ) {
				$classes[] = 'elementor-footer-active';
			}
		}
	}
	
	return $classes;
}
add_filter( 'body_class', 'meridian_africa_elementor_body_classes' );

/**
 * Check if Elementor location exists
 *
 * @param string $location Location name (header, footer, etc.).
 * @param bool   $check_match Whether to check if location matches.
 * @return bool
 */
function elementor_location_exits( $location, $check_match = false ) {
	if ( ! function_exists( 'elementor_theme_do_location' ) ) {
		return false;
	}

	if ( $check_match ) {
		// Check if location has a template assigned
		$conditions_manager = \ElementorPro\Modules\ThemeBuilder\Module::instance()->get_conditions_manager();
		$location_docs = $conditions_manager->get_documents_for_location( $location );

		return ! empty( $location_docs );
	}

	return true;
}

