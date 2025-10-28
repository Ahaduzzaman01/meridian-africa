<?php 

$blog_single_cat = kristo_get_option('blog_single_cat');
$blog_single_author= kristo_get_option('blog_single_author', false);
$blog_single_navigation = kristo_get_option('blog_nav');
$blog_single_related = kristo_get_option('blog_related', false);
$blog_single_taglist = kristo_get_option('blog_tags');
$blog_single_meta_box= kristo_get_option('blog_single_meta_box');

?>


<div id="main-content" class="bloglayout__One main-container blog-single post-layout-style2 single-one-bwrap single-two-post-style"  role="main">
	<div class="container">
		<div class="row single-blog-content">

		<div class="col-lg-12 col-md-12">

		<?php while (have_posts()):
		the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(["post-content", "post-single"]); ?>>

				<div class="blog_layout_one_Top">
					<div class="post-header-style1">
						<header class="entry-header clearfix single-blog-header">
						
						<?php if($blog_single_cat == true) :?>
						<div class="slider-category-box tab-cat-box">
							<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php'; ?>
						</div>
						<?php endif; ?>	
						
						<h1 class="post-title single_blog_inner__Title">
						<?php the_title(); ?>
						</h1>

						<?php if($blog_single_meta_box == true) :?>
						<div class="slider-post-meta-items tab-small-col-meta blog-details-meta-wrap">
							<div class="slider-meta-left">

								<div class="slider-meta-left-author">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
								</div>
								
								<div class="slider-meta-left-content">

									<h4 class="post-author-name">
										<?php echo get_the_author_link(); ?>
									</h4>

									<ul class="slider-bottom-meta-list">
										<li class="slider-meta-date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></li>
									</ul>
								</div>
							</div>
							
						</div>
						<?php endif; ?>

						</header>
					</div>  

				</div>
							
				<div class="theme-blog-details">
				
				<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
				<div class="post-featured-image">
				<?php if(get_post_format()=='video'): ?>
					<?php get_template_part( 'template-parts/single/post', 'video' ); ?>  
					<?php else: ?>
					<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
					<?php endif; ?>
				</div>
				<?php endif; ?>
				
				<div class="post-body clearfix single-blog-header single-blog-inner blog-single-block blog-details-content">
					<!-- Article content -->
					<div class="entry-content clearfix">
						
						<?php
						if ( is_search() ) {
							the_excerpt();
						} else {
							the_content();
							kristo_link_pages();
						}
						?>
						
					<?php if(has_tag() && $blog_single_taglist == true ) : ?>
					<div class="post-footer clearfix theme-tag-list-wrapp">
						<?php kristo_single_post_tags(); ?>
					</div>
					 
					<?php endif; ?>	

					</div>
				</div>
				
				</div>
							
			</article>
					   
				<?php if($blog_single_author == true) :?>
					<?php kristo_theme_author_box(); ?>
				<?php endif; ?>
			   
				<?php if($blog_single_navigation == true) :?>
					<?php kristo_theme_post_navigation(); ?>
				<?php endif; ?>

				<?php comments_template(); ?>
				<?php endwhile; ?>
			</div>
					

		</div>
		
		<?php if($blog_single_related == true) :?>
		<div class="theme_related_posts_Wrapper">
			
			<div class="row">
				<div class="col-md-12">
					<?php get_template_part('template-parts/single/related', 'posts'); ?>
				</div>
			</div>
			
		</div>
		<?php endif; ?>
	</div> 
	
</div>