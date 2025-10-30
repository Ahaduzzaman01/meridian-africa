<?php
/**
 * Agrovue Header Template
 *
 * This template displays the Agrovue-style header with logo, navigation menu, and mobile menu
 *
 * @package Meridian_Africa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Get header logo settings
$header_logo = get_theme_mod( 'header_logo' );
$header_logo_url = '';
$header_logo_alt = '';

if ( $header_logo ) {
    $header_logo_url = wp_get_attachment_image_url( $header_logo, 'full' );
    $header_logo_alt = get_post_meta( $header_logo, '_wp_attachment_image_alt', true );
} else {
    // Fallback to WordPress custom logo if header logo is not set
    $meridian_logo = get_theme_mod( 'custom_logo' );
    if ( $meridian_logo ) {
        $header_logo_url = wp_get_attachment_image_url( $meridian_logo, 'full' );
        $header_logo_alt = get_post_meta( $meridian_logo, '_wp_attachment_image_alt', true );
    }
}

// Get header title settings
$header_title_enable = get_theme_mod( 'header_title_enable', true );
$header_title_text = get_theme_mod( 'header_title_text', '' );

// Use custom title text if set, otherwise use site name
$header_title = ! empty( $header_title_text ) ? $header_title_text : get_bloginfo( 'name' );

// Header button settings
$header_btn_enable = get_theme_mod( 'header_btn_enable', true );
$header_btn_text = get_theme_mod( 'header_btn_text', 'Login' );
$header_btn_link = get_theme_mod( 'header_btn_link', 'https://agrovue.io/register' );

?>

<!-- Navigation Header -->
<header class="navbar agrovue-navbar">
    <div class="container">
        <div class="navbar-content">
            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="logo">
                    <?php if ( $header_logo_url ) : ?>
                        <img src="<?php echo esc_url( $header_logo_url ); ?>" alt="<?php echo esc_attr( $header_logo_alt ); ?>" class="logo-image">
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Meridian_Sentinel_Favicon.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-image">
                    <?php endif; ?>
                    <?php if ( $header_title_enable ) : ?>
                        <span><?php echo esc_html( $header_title ); ?></span>
                    <?php endif; ?>
                </div>
            </a>

            <nav class="nav-menu">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'nav-menu-list',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Meridian_Africa_Nav_Walker(),
                        )
                    );
                } else {
                    // Fallback menu if no menu is set
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link"><?php esc_html_e( 'Home', 'meridian-africa' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/#platform' ) ); ?>" class="nav-link"><?php esc_html_e( 'Capabilities', 'meridian-africa' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/solutions' ) ); ?>" class="nav-link"><?php esc_html_e( 'Solutions', 'meridian-africa' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/institutional-alignment' ) ); ?>" class="nav-link"><?php esc_html_e( 'Institutional Integration', 'meridian-africa' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="nav-link"><?php esc_html_e( 'Contact', 'meridian-africa' ); ?></a>
                    <?php
                }
                ?>
                
                <?php if ( $header_btn_enable ) : ?>
                <div class="mobile-nav-buttons">
                    <a href="<?php echo esc_url( $header_btn_link ); ?>" class="btn-primary" target="_blank"><?php echo esc_html( $header_btn_text ); ?></a>
                </div>
                <?php endif; ?>
            </nav>

            <?php if ( $header_btn_enable ) : ?>
            <div class="nav-buttons">
                <a href="<?php echo esc_url( $header_btn_link ); ?>" class="btn-primary" target="_blank"><?php echo esc_html( $header_btn_text ); ?></a>
            </div>
            <?php endif; ?>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>

