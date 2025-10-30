<?php
/**
 * Meridian Africa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Meridian_Africa
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Define theme constants following demo theme pattern
 */
define( 'MERIDIAN_VERSION', _S_VERSION );
define( 'MERIDIAN_THEME_URI', get_template_directory_uri() );
define( 'MERIDIAN_THEME_DIR', get_template_directory() );
define( 'MERIDIAN_ASSETS', MERIDIAN_THEME_URI . '/assets' );
define( 'MERIDIAN_CSS', MERIDIAN_ASSETS . '/css' );
define( 'MERIDIAN_JS', MERIDIAN_ASSETS . '/js' );
define( 'MERIDIAN_IMG', MERIDIAN_ASSETS . '/images' );
define( 'MERIDIAN_INC', MERIDIAN_THEME_DIR . '/inc' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meridian_africa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'meridian-africa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus(
		array(
			'primary'            => esc_html__( 'Primary Menu', 'meridian-africa' ),
			'footer-quick-links' => esc_html__( 'Footer Quick Links', 'meridian-africa' ),
			'footer-legal'       => esc_html__( 'Footer Legal Links', 'meridian-africa' ),
			'footer-bottom'      => esc_html__( 'Footer Bottom Links', 'meridian-africa' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'meridian_africa_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'meridian_africa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meridian_africa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meridian_africa_content_width', 640 );
}
add_action( 'after_setup_theme', 'meridian_africa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meridian_africa_widgets_init() {
	// Main Sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'meridian-africa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'meridian-africa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Footer Widget Area 1 - Logo & Social
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'meridian-africa' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Footer column for logo and social links.', 'meridian-africa' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	// Footer Widget Area 2 - Quick Links
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'meridian-africa' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Footer column for quick links.', 'meridian-africa' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	// Footer Widget Area 3 - Legal Links
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'meridian-africa' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Footer column for legal links.', 'meridian-africa' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	// Footer Widget Area 4 - Contact Info
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'meridian-africa' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Footer column for contact information.', 'meridian-africa' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'meridian_africa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meridian_africa_scripts() {
	// Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// Main theme stylesheet (now includes all agrovue-header styles and Google Fonts import)
	wp_enqueue_style( 'meridian-africa-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'meridian-africa-style', 'rtl', 'replace' );

	// Agrovue Header JavaScript
	wp_enqueue_script( 'agrovue-header', MERIDIAN_JS . '/agrovue-header.js', array( 'jquery' ), MERIDIAN_VERSION, true );

	// Original navigation script
	wp_enqueue_script( 'meridian-africa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meridian_africa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Navigation Walker for Agrovue Header
 */
require get_template_directory() . '/inc/class-nav-walker.php';

/**
 * Elementor Support and Theme Location Integration
 */
require get_template_directory() . '/inc/elementor-support.php';

/**
 * Add Customizer settings for header button
 */
function meridian_africa_header_customizer( $wp_customize ) {
	// Add Header Settings Section
	$wp_customize->add_section( 'meridian_header_settings', array(
		'title'    => __( 'Header Settings', 'meridian-africa' ),
		'priority' => 30,
	) );

	// Header Button Enable/Disable
	$wp_customize->add_setting( 'header_btn_enable', array(
		'default'           => true,
		'sanitize_callback' => 'meridian_africa_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'header_btn_enable', array(
		'label'   => __( 'Enable Header Button', 'meridian-africa' ),
		'section' => 'meridian_header_settings',
		'type'    => 'checkbox',
	) );

	// Header Button Text
	$wp_customize->add_setting( 'header_btn_text', array(
		'default'           => 'Login',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'header_btn_text', array(
		'label'   => __( 'Header Button Text', 'meridian-africa' ),
		'section' => 'meridian_header_settings',
		'type'    => 'text',
	) );

	// Header Button Link
	$wp_customize->add_setting( 'header_btn_link', array(
		'default'           => 'https://agrovue.io/register',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'header_btn_link', array(
		'label'   => __( 'Header Button Link', 'meridian-africa' ),
		'section' => 'meridian_header_settings',
		'type'    => 'url',
	) );
}
add_action( 'customize_register', 'meridian_africa_header_customizer' );

/**
 * Sanitize checkbox for customizer
 */
function meridian_africa_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Add Footer Customizer Settings
 */
function meridian_africa_footer_customizer( $wp_customize ) {
	// Add Footer Settings Section
	$wp_customize->add_section( 'meridian_footer_settings', array(
		'title'    => __( 'Footer Settings', 'meridian-africa' ),
		'priority' => 40,
	) );

	// Footer Logo
	$wp_customize->add_setting( 'footer_logo', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_logo', array(
		'label'     => __( 'Footer Logo', 'meridian-africa' ),
		'section'   => 'meridian_footer_settings',
		'mime_type' => 'image',
	) ) );

	// Footer Tagline
	$wp_customize->add_setting( 'footer_tagline', array(
		'default'           => 'Satellite-powered agricultural intelligence for Africa',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_tagline', array(
		'label'   => __( 'Footer Tagline', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'text',
	) );

	// Social Media Links
	$wp_customize->add_setting( 'footer_twitter', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'footer_twitter', array(
		'label'   => __( 'Twitter URL', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'footer_facebook', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'footer_facebook', array(
		'label'   => __( 'Facebook URL', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'footer_linkedin', array(
		'default'           => 'https://www.linkedin.com/company/meridian-af',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'footer_linkedin', array(
		'label'   => __( 'LinkedIn URL', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'footer_instagram', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'footer_instagram', array(
		'label'   => __( 'Instagram URL', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'url',
	) );

	// Contact Information
	$wp_customize->add_setting( 'footer_email', array(
		'default'           => 'hello@meridianafrica.io',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'footer_email', array(
		'label'   => __( 'Footer Email', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'footer_phone', array(
		'default'           => '+447438993162',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_phone', array(
		'label'   => __( 'Footer Phone', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'footer_address', array(
		'default'           => '17 Cavendish Street, Sheffield. S37SS. United Kingdom',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_address', array(
		'label'   => __( 'Footer Address', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'text',
	) );

	// Section Titles
	$wp_customize->add_setting( 'footer_quicklinks_title', array(
		'default'           => 'Quick Links',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_quicklinks_title', array(
		'label'   => __( 'Quick Links Section Title', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'footer_legal_title', array(
		'default'           => 'Legal',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_legal_title', array(
		'label'   => __( 'Legal Section Title', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'footer_contact_title', array(
		'default'           => 'Get in Touch',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_contact_title', array(
		'label'   => __( 'Contact Section Title', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'text',
	) );

	// Copyright Text
	$wp_customize->add_setting( 'footer_copyright', array(
		'default'           => '&copy; ' . date( 'Y' ) . ' Meridian Africa. All rights reserved.',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'footer_copyright', array(
		'label'   => __( 'Copyright Text', 'meridian-africa' ),
		'section' => 'meridian_footer_settings',
		'type'    => 'textarea',
	) );
}
add_action( 'customize_register', 'meridian_africa_footer_customizer' );
