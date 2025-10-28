<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kristo
 */

get_header();

?>


	<?php 

	//Single Blog Template
	
	$kristo_singleb_global = kristo_get_option( 'kristo_single_blog_layout' ); //for globally	

	
	if( is_single() && !empty( $kristo_singleb_global  ) ) {
	 
		get_template_part( 'template-parts/single/'.$kristo_singleb_global.'' ); 
	
	} else {
		
		get_template_part( 'template-parts/single/single-one' );  
	}
		
	?>


<?php get_footer(); ?>
