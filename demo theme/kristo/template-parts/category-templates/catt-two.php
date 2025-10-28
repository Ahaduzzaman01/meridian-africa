<div class="main-content-inner category-layout-two">
 
	 <div class="row">
	 	
	<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="col-lg-6">

		<div class="blog-post-tab-wrap post-block-item post-block-item-one">
			
			<?php if(has_post_thumbnail()): ?>
			<div class="news-post-grid-thumbnail">
				<a href="<?php the_permalink(); ?>" class="news-post-grid-thumbnail-wrap">
					<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
				</a>
			</div>
			<?php endif; ?>
			
			<div class="news-post-grid-content grid-content-bottom">
			
				<div class="slider-category-box tab-cat-box">
				<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php'; ?>
				</div>	

				<h3 class="post-title">
					<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
				</h3>
				
				
				<div class="slider-post-meta-items tab-large-col-meta">
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

								<li class="slider-meta-time"><?php echo kristo_reading_time(); ?></li>

							</ul>
						</div>
					</div>
				
					
				</div>
			</div>

		</div>


	</div>


	<?php endwhile; ?>

</div>

</div>