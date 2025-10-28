<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$dark_mode_default = kristo_get_option( 'dark_mode_default' );

$kristo_logo = kristo_get_option( 'theme_logo' );
$kristo_logo_id = isset($kristo_logo['id']) && !empty($kristo_logo['id']) ? $kristo_logo['id'] : '';
$kristo_logo_url = isset( $kristo_logo[ 'url' ] ) ? $kristo_logo[ 'url' ] : '';
$kristo_logo_alt = get_post_meta($kristo_logo_id,'_wp_attachment_image_alt',true);

$kristo_dark_logo = kristo_get_option( 'theme_dark_logo' );
$kristo_logo_dark_id = isset($kristo_dark_logo['id']) && !empty($kristo_dark_logo['id']) ? $kristo_dark_logo['id'] : '';
$kristo_logo_dark_url = isset( $kristo_dark_logo[ 'url' ] ) ? $kristo_dark_logo[ 'url' ] : '';
$kristo_logo_dark_alt = get_post_meta($kristo_logo_dark_id,'_wp_attachment_image_alt',true);


$kristo_header_search = kristo_get_option('search_bar_enable', true);
$kristo_dark_mode_switcher = kristo_get_option('dark_mode_enable', true);

$header_btn_enable = kristo_get_option('header_btn_enable', false);
$header_text_btn = kristo_get_option('header_text_btn');
$header_btn_link = kristo_get_option('header_btn_link');

$kristo_header_social = kristo_get_option('header_social_enable');
$kristo_social_icon = kristo_get_option( 'social-icon' );

$theme_header_sticky = kristo_get_option('theme_header_sticky', true);


?>

<header id="theme-header-one" class="theme_header__main header-style-one <?php if( $theme_header_sticky == true ) { echo "stick-top"; } else { echo "stick-disable"; } ?>">
	
	<div class="theme-header-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-2 col-md-12">
				
					<div class="logo theme-logo">
						<?php  
						if ( has_custom_logo() || !empty( $kristo_logo_url ) ) {
							if( isset( $kristo_logo['url'] ) && !empty( $kristo_logo_url ) ) { 
								?>
									<a href="<?php echo esc_url( site_url('/')) ?>" class="logo">
										<img class="img-fluid" src="<?php echo esc_url( $kristo_logo_url ); ?>" alt="<?php echo esc_attr( $kristo_logo_alt  ) ?>">
									</a>
								<?php 
							} else {
								the_custom_logo();
							}

						} else {
							printf('<h1 class="text-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
						}
						?>
					</div>

					<?php if($kristo_dark_mode_switcher == true) :?>
							
						<div class="logo dark-mode-logo">
							<?php  
								if (!empty( $kristo_logo_dark_url ) ) {
									if( isset( $kristo_dark_logo['url'] ) && !empty( $kristo_logo_dark_url ) ) { 
										?>
										<a href="<?php echo esc_url( site_url('/')) ?>" class="logo">
											<img class="img-fluid" src="<?php echo esc_url( $kristo_logo_dark_url ); ?>" alt="<?php echo esc_attr( $kristo_logo_dark_alt  ) ?>">
										</a>
										<?php 
									} else {
											the_custom_logo();
									}

								} else {
									printf('<h1 class="text-logo theme-logo-text text-dark-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
								}
							?>
						</div>
									
					<?php endif; ?>

				</div>
				
				<div class="<?php if($header_btn_enable == false ) { echo "col-lg-9"; } else { echo "col-lg-7"; } ?> col-md-12 nav-design-one">
					<div class="nav-menu-wrapper">
						<div class="container nav-wrapper-one">
							<div class="kristo-responsive-menu"></div>
							<div class="mainmenu">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'container' => 'nav',
										'container_class' => 'nav-main-wrap',
										'menu_class' => 'theme-main-menu',
										'menu_id'        => 'primary-menu',
									) );


								?>

							</div>
						</div>
					</div>	
				</div>
				
				<div class="<?php if($header_btn_enable == false ) { echo "col-lg-1"; } else { echo "col-lg-3"; } ?>">
					<div class="header-right-content text-right">
					

						<?php if($kristo_header_search == true) :?>
						<div class="header-search-box header-search-two">
							<a href="#" class="search-box-btn"><i class="icofont-search-1"></i></a>
						</div>
						<?php endif; ?>

						<?php if($dark_mode_default == false) :?>
							<?php if($kristo_dark_mode_switcher == true) :?>
							<div class="mode-switcher">
								<i class="ifont mode-icon-change"></i>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						 
						<?php if($header_btn_enable == true) :?>
						
						<div class="header-signup-btn">
							<a href="<?php echo esc_url($header_btn_link); ?>" target="_blank"><?php echo esc_html($header_text_btn); ?></a>
						</div>
						
						<?php endif; ?>

					</div>
				</div>

			</div>
		</div>
	</div>
</header>

<div class="body-overlay" id="body-overlay"></div>

<!-- search popup area start -->
<div class="search-popup" id="search-popup">
	<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="form-group">
			<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search.....','kristo'); ?>" required />
		</div>
			<button type="submit" id="searchsubmit" class="search-button submit-btn"><i class="icofont-search-1"></i></button>
	</form>							
</div>
<!-- search Popup end-->