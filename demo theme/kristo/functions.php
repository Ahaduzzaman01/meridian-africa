<?php
/**
 * Kristo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kristo
 */


/**
 * define theme info
 * @since 1.0.0
 * */
 
 if (is_child_theme()){
	$theme = wp_get_theme();
	$parent_theme = $theme->Template;
	$theme_info = wp_get_theme($parent_theme);
}else{
	$theme_info = wp_get_theme();
}

define('KRISTO_DEV_MODE',true);
$kristo_version = KRISTO_DEV_MODE ? time() : $theme_info->get('Version');
define('KRISTO_NAME',$theme_info->get('Name'));
define('KRISTO_VERSION',$kristo_version);
define('KRISTO_AUTHOR',$theme_info->get('Author'));
define('KRISTO_AUTHOR_URI',$theme_info->get('AuthorURI'));


/**
 * Define Const for theme Dir
 * @since 1.0.0
 * */

define('KRISTO_THEME_URI', get_template_directory_uri());
define('KRISTO_IMG', KRISTO_THEME_URI . '/assets/images');
define('KRISTO_CSS', KRISTO_THEME_URI . '/assets/css');
define('KRISTO_JS', KRISTO_THEME_URI . '/assets/js');
define('KRISTO_THEME_DIR', get_template_directory());
define('KRISTO_IMG_DIR', KRISTO_THEME_DIR . '/assets/images');
define('KRISTO_CSS_DIR', KRISTO_THEME_DIR . '/assets/css');
define('KRISTO_JS_DIR', KRISTO_THEME_DIR . '/assets/js');
define('KRISTO_INC', KRISTO_THEME_DIR . '/inc');
define('KRISTO_THEME_OPTIONS',KRISTO_INC .'/theme-options');
define('KRISTO_THEME_OPTIONS_IMG',KRISTO_THEME_OPTIONS .'/img');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
*/
	 
function kristo_setup(){
	
	// make the theme available for translation
	load_theme_textdomain( 'kristo', get_template_directory() . '/languages' );
	
	// add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');
	
	// add editor style theme support
	function kristo_theme_add_editor_styles() {
		add_editor_style( 'custom-style.css' );
	}
	add_action( 'admin_init', 'kristo_theme_add_editor_styles' );

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

	// register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'kristo'),
        ]
    );

	// add support for woocommerce
    // add_theme_support('woocommerce');
	
	
	// HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
	
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 300,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	
	/*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
		
}

add_action('after_setup_theme', 'kristo_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
 
function kristo_widget_init() {
	

        register_sidebar( array (
			'name' => esc_html__('Blog widget area', 'kristo'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Blog Sidebar Widget.', 'kristo'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			
		) );		

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Newsletter Form', 'kristo' ),
			'id'            => 'footer-widget-4',
			'description'   => esc_html__( 'Add Footer widgets here.', 'kristo' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );		
					
}

add_action('widgets_init', 'kristo_widget_init');


/**
 * Enqueue scripts and styles.
 */
function kristo_scripts() {
	
	// Theme CSS 
	
	wp_enqueue_style( 'themefont-awesome', KRISTO_CSS . '/font-awesome.css');
	wp_enqueue_style( 'icon-font',  KRISTO_CSS . '/icon-font.css' );
	wp_enqueue_style( 'remix-font',  KRISTO_CSS . '/remixicon.css' );
	wp_enqueue_style( 'animate',  KRISTO_CSS . '/animate.min.css' );
	wp_enqueue_style( 'magnific-popup',  KRISTO_CSS . '/magnific-popup.css' );
	wp_enqueue_style( 'owl-carousel',  KRISTO_CSS . '/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme',  KRISTO_CSS . '/owl.theme.min.css' );
	wp_enqueue_style( 'slick',  KRISTO_CSS . '/slick.css' );
	wp_enqueue_style( 'slicknav',  KRISTO_CSS . '/slicknav.css' );
	wp_enqueue_style( 'theme-fonts', KRISTO_CSS . '/theme-fonts.css', array(), '1.0', 'all');
	wp_enqueue_style( 'kristo-dark-mode',  KRISTO_CSS . '/dark-mode.css' );

	if (is_rtl()) {
		wp_enqueue_style( 'bootstrap', KRISTO_CSS . '/bootstrap.min.css', array(), '4.0', 'all');
		wp_enqueue_style( 'kristo-main',  KRISTO_CSS . '/main.css' );
		wp_enqueue_style( 'kristo-responsive',  KRISTO_CSS . '/responsive.css' );
		wp_enqueue_style( 'kristo-rtl',  KRISTO_CSS . '/rtl.css' );
		
	} else {
		wp_enqueue_style( 'bootstrap', KRISTO_CSS . '/bootstrap.min.css', array(), '4.0', 'all');
		wp_enqueue_style( 'kristo-main',  KRISTO_CSS . '/main.css' );
		wp_enqueue_style( 'kristo-responsive',  KRISTO_CSS . '/responsive.css' );
	}

	wp_enqueue_style( 'kristo-style', get_stylesheet_uri() );
	
	// Theme JS
	
	wp_enqueue_script( 'imagesloaded',  KRISTO_JS . '/imagesloaded.pkgd.min.js', array( 'jquery' ),  '5.0', true );
	wp_enqueue_script( 'bootstrap',  KRISTO_JS . '/bootstrap.min.js', array( 'jquery' ),  '4.0', true );
	wp_enqueue_script( 'popper',  KRISTO_JS . '/popper.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-magnific-popup',  KRISTO_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-appear',  KRISTO_JS . '/jquery.appear.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'owl-carousel',  KRISTO_JS . '/owl.carousel.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'slick', KRISTO_JS . '/slick.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-slicknav', KRISTO_JS . '/jquery.slicknav.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'wow-js', KRISTO_JS . '/wow.min.js', array( 'jquery' ), '1.0', true );
	
	// Custom JS Scripts
	
	wp_enqueue_script( 'kristo-scripts',  KRISTO_JS . '/scripts.js', array( 'jquery' ),  '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

}

add_action( 'wp_enqueue_scripts', 'kristo_scripts' );


/*
* Include codester helper functions
* @since 1.0.0
*/

if ( file_exists( KRISTO_INC.'/cs-framework-functions.php' ) ) {
	require_once  KRISTO_INC.'/cs-framework-functions.php';
}

/**
 * Theme option panel & Metaboxes.
*/
 if ( file_exists( KRISTO_THEME_OPTIONS.'/theme-options.php' ) ) {
	require_once  KRISTO_THEME_OPTIONS.'/theme-options.php';
}

if ( file_exists( KRISTO_THEME_OPTIONS.'/theme-metabox.php' ) ) {
	require_once  KRISTO_THEME_OPTIONS.'/theme-metabox.php';
}

if ( file_exists( KRISTO_THEME_OPTIONS.'/theme-inline-styles.php' ) ) {
	require_once  KRISTO_THEME_OPTIONS.'/theme-inline-styles.php';
}


/**
 * Required plugin installer 
*/
require get_template_directory() . '/inc/required-plugins.php';


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Custom template tags & functions for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
*/
function kristo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kristo_content_width', 640 );
}

add_action( 'after_setup_theme', 'kristo_content_width', 0 );

/**
 * Nav menu fallback function
*/

function kristo_fallback_menu() {
	get_template_part( 'template-parts/default', 'menu' );
}

function kristo_enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'kristo_enable_svg_upload', 10, 1 );

/**
 * Post Views Count function
*/

function kristo_get_views_count($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function kristo_set_views_count($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


//Get layout shop page.
if ( ! function_exists( 'kristo_blog_col' ) ) :
	function kristo_blog_col() {
		// Get layout.
		
		$page_layout = kristo_get_option( 'kristo_blog_col_layout' );
		
		return $page_layout;
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'kristo_blog_layout_columns' ) ) :
	function kristo_blog_layout_columns() {

		$blog_layout_width = array();

		// Check if layout is one column.
		if ( 'right-sidebar' === kristo_blog_col() && is_active_sidebar( 'sidebar-1' ) ) {
			$blog_layout_width[] = 'col-lg-8 col-sm-12';
		}elseif ('left-sidebar' === kristo_blog_col() && is_active_sidebar( 'sidebar-1' ) ) {
			$blog_layout_width[] = 'col-lg-8 col-sm-12 blog-custom-left-sidebar';
		} else {
			$blog_layout_width[] = 'col-lg-12 col-md-12 col-sm-12';
		}

		// return the $classes array
    	echo implode( ' ', $blog_layout_width );
	}
endif;





