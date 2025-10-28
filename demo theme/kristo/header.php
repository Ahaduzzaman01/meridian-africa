<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kristo
 */
 
$kristo_preloader = kristo_get_option('preloader_enable', false);
 
 
?>
<!DOCTYPE html>
  <html <?php language_attributes(); ?>> 
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php wp_head(); ?>
    </head>
	
	
    <body <?php body_class(); ?> >
		
		<?php wp_body_open(); ?>

		<!-- Theme Preloader -->
		<?php if($kristo_preloader == true) :?>
		<div id="preloader">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
		<?php endif; ?>


		<div class="body-inner-content">
      
		<?php
		
		// Select Header Style
		
		$kristo_nav_global = kristo_get_option( 'nav_menu' ); // Global

		get_template_part( 'template-parts/headers/'.$kristo_nav_global.'' ); 
	
		?>
		