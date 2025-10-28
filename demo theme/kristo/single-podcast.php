<?php
    /**
     * The template for displaying all single podcasts
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-podcast
     *
     * @package kristo
     */

    get_header();

    $blog_single_cat     = kristo_get_option('blog_single_cat');
    $blog_single_taglist = kristo_get_option('blog_tags');

    $podcast_single_meta = get_post_meta(get_the_ID(), 'kristo_podcast_single_meta', true);

    // Get Details Title
    if (array_key_exists('podcast-audio', $podcast_single_meta)) {
        $podcast_audio = $podcast_single_meta['podcast-audio'];
    } else {
        $podcast_audio = 'No file uploaded!';
    }

?>

<style>
	.podcast-single .img-fluid {
		width: 100%;
	}

	.wave-audio-wrapper {
		display: flex;
		align-items: center;
		gap: 16px;
		position: absolute;
		width: 100%;
		bottom: 0px;
		border-radius: 34px;
		border-bottom-left-radius: 34px;
		border-bottom-right-radius: 34px;
		background-color: rgba(0, 0, 0, 0.2);
	}

	.play-pause-buttons svg {
		position: relative;
		top: 3px;
	}

	#waveform {
		width: 100%;
		cursor: pointer;
	}

	.podcast-single .post-featured-image {
		position: relative;
	}

	.podcast-single .slider-post-meta-items.tab-small-col-meta.blog-details-meta-wrap {
		margin-bottom: 30px;
	}

	.podcast-single .theme-blog-details .post-featured-image img {
		max-height: 600px;
		object-fit: cover;
	}

	.podcast-single-content img {
		border-radius: 34px;
	}
</style>


<div id="main-content" class="bloglayout__One main-container blog-single post-layout-style2 single-one-bwrap podcast-single"  role="main">
	<div class="container">
		<div class="row single-blog-content">
			<div class="col-md-12">
				<?php while (have_posts()): the_post(); ?>
					<article id="post-<?php the_ID(); ?>"<?php post_class(["post-content", "post-single"]); ?>>
						<div class="blog_layout_one_Top">
							<div class="post-header-style1">
								<header class="entry-header clearfix single-blog-header">

								<?php if ($blog_single_cat == true): ?>
								<div class="slider-category-box tab-cat-box">
									<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php'; ?>
								</div>
								<?php endif; ?>

						<h1 class="post-title single_blog_inner__Title">
							<?php the_title(); ?>
						</h1>
						<div class="theme-blog-details">
							<?php if (has_post_thumbnail() && ! post_password_required()): ?>
							<div class="post-featured-image">
								<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
								<div class="wave-audio-wrapper">
									<div class="play-pause-buttons">
										<!-- Play Btn -->
										<div id="playButton" style="cursor:pointer;">
											<svg xmlns="http://www.w3.org/2000/svg" width="55" height="54" viewBox="0 0 55 54" fill="none">
												<g id="Group 499">
												<ellipse cx="27.0271" cy="27" rx="27.0271" ry="27" fill="#ffffff" fill-opacity="0.5"/>
												<path id="Polygon 1" d="M35 25.2679C36.3333 26.0377 36.3333 27.9623 35 28.7321L24.5 34.7942C23.1667 35.564 21.5 34.6018 21.5 33.0622L21.5 20.9378C21.5 19.3982 23.1667 18.436 24.5 19.2058L35 25.2679Z" fill="#ffffff"/>
												</g>
											</svg>
										</div>
										<!-- Pause Btn -->
										<div id="pauseButton" style="cursor:pointer; display:none;">
											<svg xmlns="http://www.w3.org/2000/svg" width="55" height="54" viewBox="0 0 55 54" fill="none">
												<g id="Group 496">
												<ellipse cx="27.0271" cy="27" rx="27.0271" ry="27" fill="#ffffff" fill-opacity="0.5"/>
												<g id="vuesax/bulk/pause">
												<g id="vuesax/bulk/pause_2">
												<g id="pause">
												<path id="Vector" d="M25.7883 33.5175V20.4825C25.7883 19.245 25.2653 18.75 23.944 18.75H20.6131C19.2918 18.75 18.7688 19.245 18.7688 20.4825V33.5175C18.7688 34.755 19.2918 35.25 20.6131 35.25H23.944C25.2653 35.25 25.7883 34.755 25.7883 33.5175Z" fill="#ffffff"/>
												<path id="Vector_2" opacity="0.4" d="M35.2853 33.5175V20.4825C35.2853 19.245 34.7623 18.75 33.441 18.75H30.1102C28.798 18.75 28.2658 19.245 28.2658 20.4825V33.5175C28.2658 34.755 28.7888 35.25 30.1102 35.25H33.441C34.7623 35.25 35.2853 34.755 35.2853 33.5175Z" fill="#ffffff"/>
												</g>
												</g>
												</g>
												</g>
											</svg>
										</div>
									</div>
									<div id="waveform"></div>
								</div>
							</div>
							<?php endif; ?>

							<div class="post-body clearfix single-blog-header single-blog-inner blog-single-block blog-details-content podcast-single-content">
								<!-- Article content -->
								<div class="entry-content clearfix">

									<?php
										if (is_search()) {
											the_excerpt();
										} else {
											the_content();
											kristo_link_pages();
										}
									?>

								<?php if (has_tag() && $blog_single_taglist == true): ?>
								<div class="post-footer clearfix theme-tag-list-wrapp">
									<?php kristo_single_post_tags(); ?>
								</div>

								<?php endif; ?>

								</div>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<script type="module">
  import WaveSurfer from 'https://cdn.jsdelivr.net/npm/wavesurfer.js@7/dist/wavesurfer.esm.js';

  const playButton = document.getElementById('playButton');
  const pauseButton = document.getElementById('pauseButton');
  const wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: '#FCE7F0',
    progressColor: '#ff3385',
	// barWidth: 3,
	responsive: true,
	hideScrollbar: true,
	barRadius: 3,
	height: '60',
    url: '<?php echo $podcast_audio['url']; ?>',
  })

  // Toggle visibility function
  function updateButtons() {
    if (wavesurfer.isPlaying()) {
      playButton.style.display = 'none';
      pauseButton.style.display = 'block';
    } else {
      playButton.style.display = 'block';
      pauseButton.style.display = 'none';
    }
  }

  // Events
  playButton.addEventListener('click', () => {
    wavesurfer.play();
    updateButtons();
  });

  pauseButton.addEventListener('click', () => {
    wavesurfer.pause();
    updateButtons();
  });

  // Also listen to wavesurfer events (important when audio finishes)
  wavesurfer.on('finish', () => {
    updateButtons(); // show play again when finished
  });

</script>

<?php get_footer(); ?>