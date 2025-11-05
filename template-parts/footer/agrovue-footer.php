<?php
/**
 * Agrovue Footer Template
 *
 * This template displays the Agrovue-style footer with dynamic content support
 * while preserving the exact design from agrovue-landing-html
 *
 * @package Meridian_Africa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Get footer customizer settings
$footer_logo = get_theme_mod( 'footer_logo' );
$footer_logo_url = '';
$footer_logo_alt = '';

if ( $footer_logo ) {
	$footer_logo_url = wp_get_attachment_image_url( $footer_logo, 'full' );
	$footer_logo_alt = get_post_meta( $footer_logo, '_wp_attachment_image_alt', true );
} else {
	// Fallback to custom logo
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$footer_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
		$footer_logo_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
	}
}

// Footer text and social links
$footer_tagline = get_theme_mod( 'footer_tagline', 'Satellite-powered agricultural intelligence for Africa' );
$footer_twitter = get_theme_mod( 'footer_twitter', '#' );
$footer_facebook = get_theme_mod( 'footer_facebook', '#' );
$footer_linkedin = get_theme_mod( 'footer_linkedin', 'https://www.linkedin.com/company/meridian-af' );
$footer_instagram = get_theme_mod( 'footer_instagram', '#' );

// Contact information
$footer_email = get_theme_mod( 'footer_email', 'hello@meridianafrica.io' );
$footer_phone = get_theme_mod( 'footer_phone', '+447438993162' );
$footer_address = get_theme_mod( 'footer_address', '17 Cavendish Street, Sheffield. S37SS. United Kingdom' );
$footer_address_2 = get_theme_mod( 'footer_address_2', '' );

// Copyright text
$footer_copyright = get_theme_mod( 'footer_copyright', '&copy; ' . date( 'Y' ) . ' Meridian Africa. All rights reserved.' );
?>

<footer class="footer">
	<div class="container">
		<div class="footer-content">
			<!-- Footer Section 1: Logo and Social Links -->
			<div class="footer-section">
				<div class="footer-logo">
					<?php if ( $footer_logo_url ) : ?>
						<img src="<?php echo esc_url( $footer_logo_url ); ?>" 
							 alt="<?php echo esc_attr( $footer_logo_alt ? $footer_logo_alt : get_bloginfo( 'name' ) . ' Logo' ); ?>" 
							 class="footer-logo-image">
					<?php endif; ?>
					<span><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
				</div>
				<p><?php echo esc_html( $footer_tagline ); ?></p>
				<div class="social-links">
					<?php if ( $footer_twitter ) : ?>
						<a href="<?php echo esc_url( $footer_twitter ); ?>" class="social-link" title="Twitter" target="_blank">
							<i class="fab fa-twitter"></i>
						</a>
					<?php endif; ?>
					
					<?php if ( $footer_facebook ) : ?>
						<a href="<?php echo esc_url( $footer_facebook ); ?>" class="social-link" title="Facebook" target="_blank">
							<i class="fab fa-facebook"></i>
						</a>
					<?php endif; ?>
					
					<?php if ( $footer_linkedin ) : ?>
						<a href="<?php echo esc_url( $footer_linkedin ); ?>" class="social-link" title="LinkedIn" target="_blank">
							<i class="fab fa-linkedin"></i>
						</a>
					<?php endif; ?>
					
					<?php if ( $footer_instagram ) : ?>
						<a href="<?php echo esc_url( $footer_instagram ); ?>" class="social-link" title="Instagram" target="_blank">
							<i class="fab fa-instagram"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>

			<!-- Footer Section 2: Quick Links -->
			<div class="footer-section">
				<h4><?php echo esc_html( get_theme_mod( 'footer_quicklinks_title', 'Quick Links' ) ); ?></h4>
				<?php
				// Check if there's a footer menu assigned
				if ( has_nav_menu( 'footer-quick-links' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer-quick-links',
							'menu_class'     => '',
							'container'      => 'ul',
							'depth'          => 1,
						)
					);
				} else {
					// Fallback menu
					?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/solutions' ) ); ?>">Solutions</a></li>
						<li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>">FAQ</a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
						<li><a href="<?php echo esc_url( home_url( '/team' ) ); ?>">Team</a></li>
					</ul>
					<?php
				}
				?>
			</div>

			<!-- Footer Section 3: Legal Links -->
			<div class="footer-section">
				<h4><?php echo esc_html( get_theme_mod( 'footer_legal_title', 'Legal' ) ); ?></h4>
				<?php
				// Check if there's a legal menu assigned
				if ( has_nav_menu( 'footer-legal' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer-legal',
							'menu_class'     => '',
							'container'      => 'ul',
							'depth'          => 1,
						)
					);
				} else {
					// Fallback menu
					?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy Policy</a></li>
						<li><a href="<?php echo esc_url( home_url( '/terms' ) ); ?>">Terms of Service</a></li>
						<li><a href="<?php echo esc_url( home_url( '/security' ) ); ?>">Security</a></li>
						<li><a href="<?php echo esc_url( home_url( '/compliance' ) ); ?>">Compliance</a></li>
					</ul>
					<?php
				}
				?>
			</div>

			<!-- Footer Section 4: Contact Information -->
			<div class="footer-section">
				<h4><?php echo esc_html( get_theme_mod( 'footer_contact_title', 'Get in Touch' ) ); ?></h4>
				<?php if ( $footer_email ) : ?>
					<p>
						<i class="fas fa-envelope"></i> 
						<?php echo esc_html( $footer_email ); ?>
					</p>
				<?php endif; ?>
				
				<?php if ( $footer_phone ) : ?>
					<p>
						<i class="fas fa-phone"></i>
						<?php echo esc_html( $footer_phone ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $footer_address ) : ?>
					<p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $footer_address ); ?></p>
			<?php endif; ?>

			<?php if ( $footer_address_2 ) : ?>
				<p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $footer_address_2 ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer-divider"></div>

		<div class="footer-bottom">
			<p><?php echo wp_kses_post( $footer_copyright ); ?></p>
			<div class="footer-links">
				<?php
				// Check if there's a footer bottom menu assigned
				if ( has_nav_menu( 'footer-bottom' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer-bottom',
							'menu_class'     => '',
							'container'      => false,
							'depth'          => 1,
							'items_wrap'     => '%3$s',
						)
					);
				} else {
					// Fallback links
					?>
					<a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy</a>
					<a href="<?php echo esc_url( home_url( '/terms' ) ); ?>">Terms</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</footer>

