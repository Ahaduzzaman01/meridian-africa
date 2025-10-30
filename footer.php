<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meridian_Africa
 */

?>

<?php
/**
 * Footer Template with Elementor Support
 *
 * This footer checks for an Elementor-built footer first.
 * If no Elementor footer is found, it falls back to the theme's default footer template.
 * This allows users to create custom footers using Elementor's Theme Builder.
 */

// Check if Elementor footer exists and render it
if ( ! function_exists( 'meridian_africa_render_elementor_footer' ) || ! meridian_africa_render_elementor_footer() ) {
	// No Elementor footer found, use the default theme footer template
	get_template_part( 'template-parts/footer/agrovue-footer' );
}
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
