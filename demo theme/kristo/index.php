<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kristo
 */

$blog_title = kristo_get_option('blog_title', true);
$blog_breadcrumb = kristo_get_option('blog_breadcrumb_enable', true);
$blog_style = kristo_get_option( 'kristo_blog_col_layout' );

get_header();

?>

    <!-- Blog Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<?php if($blog_breadcrumb == true) :?>
					<div class="breadcrumb-nav-top blog-breadcrumb-bg">
						<ul>
							<li class="breadcrumb-home-menu"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'kristo'); ?></a></li>
							<li class="breadcrumb-item-menu"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Blog', 'kristo'); ?></a></li>
						</ul>
					</div>
					<?php endif; ?>

					<?php if($blog_title == true) :?>
					<h1 class="theme-breacrumb-title">
						<?php echo $blog_title; ?>
					</h1>
					<?php endif; ?>
				</div>
            </div>
        </div>
    </div>
    <!-- Blog Breadcrumb End -->
	
	<section id="main-content" class="blog main-container blog-spacing" role="main">
		<div class="container">

			<div class="row <?php if( kristo_blog_col() === 'left-sidebar' ) { echo "blogg-left-col"; } else { echo "no-left-col"; } ?>">

				<div class="<?php kristo_blog_layout_columns(); ?>">

					<div class="category-layout-two main-blog-layout blog-new-layout theme-layout-mainn">

					<?php if (have_posts()): ?>

						<?php 
				
							$kristo_blog_global = kristo_get_option( 'kristo_blog_layout' ); //for global	  
							
							if( class_exists( 'CSF' ) && !empty( $kristo_blog_global ) ) {
								
								get_template_part( 'template-parts/blog-templates/'.$kristo_blog_global.'' );
								
							} else {
								
								get_template_part( 'template-parts/blog-templates/blog-one' ); 
							}
						?>
						
						<div class="theme-pagination-style">
							<?php
								the_posts_pagination(array(
								'next_text' => '<i class="icofont-long-arrow-right"></i>',
								'prev_text' => '<i class="icofont-long-arrow-left"></i>',
								'screen_reader_text' => ' ',
								'type'               => 'list'
							));
							?>
						</div>
						
						<?php else: ?>
							<?php get_template_part('template-parts/content', 'none'); ?>
						<?php endif; ?>
						
					</div>
				</div>

				<?php
					if( $blog_style == 'right-sidebar' || $blog_style == 'left-sidebar' ){
						get_sidebar();
					}
				?>

			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>
