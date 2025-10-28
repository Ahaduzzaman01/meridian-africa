<?php
/*
Plugin Name: Kristo Extra
Plugin URI: https://promising-themes.com/kristo-extra
Description: This is a helper plugin for Kristo Theme.
Author: Promising-Themes
Author URI: https://themeforest.net/user/promising-themes
Version: 2.7
*/

/**  Related Theme Type */
global $related_theme_type;
$related_theme_type = array('Kristo','Kristo Child');
//define current theme name
$current_theme = !empty( wp_get_theme() ) ? wp_get_theme()->get('Name') : '';
define('CURRENT_THEME_NAME',$current_theme);


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('KRISTO_EXTRA_SELF_PATH','kristo-extra/kristo-extra.php');
define('KRISTO_EXTRA_ROOT_PATH',plugin_dir_path(__FILE__));
define('KRISTO_EXTRA_ROOT_URL',plugin_dir_url(__FILE__));
define('KRISTO_EXTRA_LIB',KRISTO_EXTRA_ROOT_PATH.'/lib');
define('KRISTO_EXTRA_INC',KRISTO_EXTRA_ROOT_PATH .'/inc');
define('KRISTO_EXTRA_ADMIN',KRISTO_EXTRA_INC .'/admin');
define('KRISTO_EXTRA_ADMIN_ASSETS',KRISTO_EXTRA_ROOT_URL .'inc/admin/assets');
define('KRISTO_EXTRA_CSS',KRISTO_EXTRA_ROOT_URL .'assets/css');
define('KRISTO_EXTRA_JS',KRISTO_EXTRA_ROOT_URL .'assets/js');
define('KRISTO_EXTRA_ELEMENTOR',KRISTO_EXTRA_INC .'/elementor');
define('KRISTO_EXTRA_SHORTCODES',KRISTO_EXTRA_INC .'/shortcodes');
define('KRISTO_EXTRA_WIDGETS',KRISTO_EXTRA_INC .'/widgets');

/** Plugin version **/
define('KRISTO_CORE_VERSION','1.0.0');

//initial file
include_once ABSPATH .'wp-admin/includes/plugin.php';

if ( is_plugin_active(KRISTO_EXTRA_SELF_PATH) ) {

	if ( !in_array(CURRENT_THEME_NAME,$GLOBALS['related_theme_type']) && file_exists(KRISTO_EXTRA_INC .'/cs-framework-functions.php') ) {
		require_once KRISTO_EXTRA_INC .'/cs-framework-functions.php';
	}

	//plugin core file include
	
	if ( file_exists(KRISTO_EXTRA_INC .'/class-kristo-extra-init.php') ) {
		require_once KRISTO_EXTRA_INC .'/class-kristo-extra-init.php';
	}
	
	//Demo data import 
	if ( file_exists(KRISTO_EXTRA_INC .'/demo-import.php') ) {
		require_once KRISTO_EXTRA_INC .'/demo-import.php';
	}

	// Load Podcast Custom Post Type
    if ( file_exists( KRISTO_EXTRA_INC . '/podcast-cpt.php' ) ) {
        require_once KRISTO_EXTRA_INC . '/podcast-cpt.php';
    }
	
}

