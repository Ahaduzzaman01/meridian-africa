<?php
/**
 * The template for displaying catgeory pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kristo
 */

get_header();
	
?>

	<!-- Category Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<div class="breadcrumb-nav-top">
						<ul>
							<li class="breadcrumb-home-menu"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'kristo'); ?></a></li>
							<li class="breadcrumb-item-menu"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Category', 'kristo'); ?></a></li>
							<li class="breadcrumb-key-menu"><a href="#"><?php single_cat_title(); ?></a></li>
						</ul>
					</div>
					<h1 class="theme-breacrumb-title">
						<?php echo esc_html__('Category','kristo').' :'; ?>  <?php single_cat_title(); ?>
					</h1>
				 </div>
            </div>
        </div>
    </div>
    <!-- Category Breadcrumb End -->

	<section id="main-content" class="blog main-container cat-page-spacing" role="main">
		<div class="container">
			<div class="row">
				<div class="<?php if(is_active_sidebar('sidebar-1')) { echo "col-lg-8"; } else { echo "col-lg-12";}?> col-md-12">
				
					<?php if (have_posts() ): ?>
					
					<?php 
				
						$kristo_cat_global = kristo_get_option( 'kristo_cat_layout' ); //for global	  
						 
						get_template_part( 'template-parts/category-templates/'.$kristo_cat_global.'' ); 
						

					?>
		
					<div class="theme-pagination-style">
						<?php
							the_posts_pagination(array(
							'next_text' => '<i class="icofont-long-arrow-right"></i>',
							'prev_text' => '<i class="icofont-long-arrow-left"></i>',
							'screen_reader_text' => ' ',
							'type'                => 'list'
						));
						?>
					</div>
					
					<?php else: ?>
						<?php get_template_part('template-parts/content', 'none'); ?>
					<?php endif; ?>
					
				</div>
				
				<?php get_sidebar(); ?>
				
			</div>
		</div>
	</section>

<?php get_footer(); ?>
