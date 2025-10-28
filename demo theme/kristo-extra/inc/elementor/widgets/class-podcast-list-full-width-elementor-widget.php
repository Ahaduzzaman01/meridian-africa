<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class podcast_list_full_width extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'podcast-list-full-width';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Podcast List Full Width', 'kristo-extra' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-headphones'; 
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'kristo_widgets' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'kristo', 'post', 'kristo post', 'widget', 'elementor', 'podcast', 'list', 'full width' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	
	protected function register_controls() {
		$this->post_query_options();
	}
	
	/**
    * Post Query Options
    */
    private function post_query_options() {
		$this->start_controls_section(
            'post_query_option',
            [
                'label' => __( 'Post Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		// Post Sort
        $this->add_control(
            'post_sorting',
            [
                'type'    => \Elementor\Controls_Manager::SELECT2,
                'label' => esc_html__('Post Sorting', 'kristo-extra'),
                'default' => 'date',
                'options' => [
					'date' => esc_html__('Recent Post', 'kristo-extra'),
                    'rand' => esc_html__('Random Post', 'kristo-extra'),
					'title'         => __( 'Title Sorting Post', 'kristo-extra' ),
                    'modified' => esc_html__('Last Modified Post', 'kristo-extra'),
                    'comment_count' => esc_html__('Most Commented Post', 'kristo-extra'),
                ],
            ]
        );		
		
		// Post Order
        $this->add_control(
            'post_ordering',
            [
                'type'    => \Elementor\Controls_Manager::SELECT2,
                'label' => esc_html__('Post Ordering', 'kristo-extra'),
                'default' => 'DESC',
                'options' => [
					'DESC' => esc_html__('Desecending', 'kristo-extra'),
                    'ASC' => esc_html__('Ascending', 'kristo-extra'),
                ],
				'separator' => 'before',
            ]
        );
		
		// Post Categories
		$this->add_control(
            'post_categories',
            [
                'type'      => \Elementor\Controls_Manager::SELECT2,
				'label' =>esc_html__('Select Categories', 'kristo-extra'),
                'options'   => $this->posts_cat_list(),
                'label_block' => true,
                'multiple'  => true,
				'separator' => 'before',
            ]
        );
	
		// Post Items
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'kristo-extra' ),
				'type'          => \Elementor\Controls_Manager::NUMBER,
				'default'       => '2',
				'separator' => 'before',
			]
        );
		
		$this->add_control(
            'enable_offset_post',
            [
               'label' => esc_html__('Enable Skip Post', 'kristo-extra'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'kristo-extra'),
               'label_off' => esc_html__('No', 'kristo-extra'),
               'default' => 'no',
               'separator' => 'before',
            ]
        );
      
        $this->add_control(
			'post_offset_count',
			  [
			   'label'         => esc_html__( 'Skip Post Count', 'kristo-extra' ),
			   'type'          => \Elementor\Controls_Manager::NUMBER,
			   'default'       => '1',
			   'condition' => [ 'enable_offset_post' => 'yes' ],
			   'separator' => 'before',
			  ]
        );

		$this->add_control(
            'post_ids',
            [
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label'       => __( 'Show specific podcasts by ID', 'kristo-extra' ),
                'placeholder' => __( 'ex.: 256, 54, 78', 'kristo-extra' ),
                'description'   => __( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar', 'kristo-extra' ),
                'default'     => '',
                'separator'     => 'before',
				'label_block' => true,
				'separator' => 'before',
            ]
        );
		$this->end_controls_section();
	}
		
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		$string_ID = $settings['post_ids'];
        $post_ID = ( ! empty( $string_ID ) ) ? array_map( 'intval', explode( ',', $string_ID ) ) : '';

		$args = [
            'post_type' => 'podcast',
            'post_status' => 'publish',
			'order' => $settings['post_ordering'],
			'posts_per_page' => $settings['post_number'],
			'ignore_sticky_posts' => 1,
        ];
		
		// Category
        if ( ! empty( $settings['post_categories'] ) ) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }
		
		// Post Sorting
        if ( ! empty( $settings['post_sorting'] ) ) {
            $args['orderby'] = $settings['post_sorting'];
        }	
		
		// Post Offset		
		if($settings['enable_offset_post'] == 'yes') {
			$args['offset'] = $settings['post_offset_count'];
		}

		// Specific Posts by ID's
        if ( ! empty( $settings['post_ids'] ) ) {
            $args['post__in'] = $post_ID;
        }

		// Query
        $query = new \WP_Query( $args ); ?>
		
		<?php if ( $query->have_posts() ) : ?>
			<?php while ($query->have_posts()) : $query->the_post(); 

			$podcast_single_meta = get_post_meta(get_the_ID(), 'kristo_podcast_single_meta', true);

			// Get audio
			$podcast_audio = isset($podcast_single_meta['podcast-audio']) ? $podcast_single_meta['podcast-audio'] : null;
			$audio_url = $podcast_audio && isset($podcast_audio['url']) ? $podcast_audio['url'] : '';

			$unique_id = get_the_ID();
			
			?>

			<style>
				.podcast-list-full-width .tab-small-post-list {
					display: flex;
					align-items: center;
					gap: 18px;
				}

				.post-list-block-wrapper.post-list-block-wrapper-loadmore.podcast-list-full-width .tab-small-thumbnail-wrap {
					margin-left: 00px;
				}

				.podcast-list-full-width .tab-small-thumbnail-wrap {
					max-width: 100%;
				}

				.podcast-list-full-width .tab-small-thumbnail-wrap img {
					width: 145px !important;
					height: 145px !important;
					object-fit: cover;
					border-radius: 50%;
				}

				.podcast-list-full-width .slider-category-box.tab-cat-box,
				.podcast-list-full-width h3.post-title {
					margin-bottom: 20px !important;
				}

				.podcast-list-full-width h3.post-title {
					font-size: 34px !important;
					font-weight: 700;
				}

				.tab-bottom-grid-style.post-list-block-wrapper.podcast-list-full-width .tab-small-thumbnail-wrap {
					width: auto;
				}

				.podcast-list-full-width .tab-post-grid-content-small {
					width: 100%;
				}

				.podcast-list-full-width .tab-small-thumbnail-wrap {
					flex-basis: 170px !important;
				}

				.podcast-list-full-width .slider-category-box a {
					margin-bottom: 0px;
				}

				/* RESPONSIVE */
				@media (max-width: 991px) {
					.tab-bottom-grid-style.post-list-block-wrapper.post-list-block-wrapper-loadmore.podcast-list-full-width .tab-small-thumbnail-wrap a img {
						height: 145px !important;
					}

					.tab-small-post-list.postlist-loadmore-item.podcast-list-full-width {
						flex-direction: column !important;
					}
				}

				@media (max-width: 600px) {
					.podcast-list-full-width .tab-small-post-list.postlist-loadmore-item {
						flex-direction: column !important;
					}

					.post-list-block-wrapper.post-list-block-wrapper-loadmore.podcast-list-full-width .tab-small-thumbnail-wrap {
						margin-right: 0px;
					}

					.podcast-list-full-width .tab-small-thumbnail-wrap img {
						width: 100% !important;
						border-radius: 24px;
					}

					.tab-bottom-grid-style.post-list-block-wrapper.post-list-block-wrapper-loadmore.podcast-list-full-width .tab-small-thumbnail-wrap a img {
						height: 250px !important;
					}

					.podcast-list-full-width .tab-small-thumbnail-wrap {
						flex-basis: 100% !important;
					}

					.tab-bottom-grid-style.post-list-block-wrapper.podcast-list-full-width .tab-small-thumbnail-wrap {
						width: 100%;
					}

					.podcast-list-full-width .tab-small-post-list {
						gap: 20px;
					}

					.podcast-list-full-width .slider-category-box.tab-cat-box {
						margin-bottom: 15px !important;
					}

					.podcast-list-full-width h3.post-title {
						margin-bottom: 25px !important;
					}

					.podcast-list-full-width .tab-small-post-list.postlist-loadmore-item .tab-post-grid-content-small {
						margin-bottom: 0px;
					}
				}

				@media (max-width: 575px) {
					.podcast-list-full-width h3.post-title {
						font-size: 28px !important;
					}

					.podcast-list-full-width .slider-category-box a {
						margin-right: 0px;
						margin-bottom: 0px;
					}

					.podcast-list-full-width .slider-category-box.tab-cat-box {
						display: flex;
						gap: 10px;
					}
				}

				@media (max-width: 480px) {
					.podcast-list-full-width .tab-small-thumbnail-wrap {
						margin-bottom: 0px;
					}
				}

				@media (max-width: 400px) {
					.podcast-list-full-width h3.post-title {
						font-size: 24px !important;
					}

					.podcast-list-full-width h3.post-title {
						margin-bottom: 16px !important;
					}
				}
			</style>

				<div id="post_block_list_loadmore" class="tab-small-list-item tab-bottom-grid-style post-list-block-wrapper post-list-block-wrapper-loadmore podcast-list-full-width wow fadeInUp delay-0-2s">
					<div class="tab-small-post-list postlist-loadmore-item">
						<div class="tab-small-thumbnail-wrap">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
						</div>
						<div class="tab-post-grid-content-small">

							<div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
								<div class="slider-category-box tab-cat-box">
									<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php'; ?>
								</div>
								<div class="podcast-share-icon" style="cursor: pointer;" onclick="copyToClipboard('<?php echo esc_js(get_permalink()); ?>')" title="Share Podcast">
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
										<rect width="32" height="32" rx="16" fill="#E3E3E3"/>
										<path opacity="0.4" d="M22.9667 16.6084C22.6583 16.6084 22.4 16.3751 22.3667 16.0667C22.1667 14.2334 21.1833 12.5834 19.6667 11.5334C19.3917 11.3417 19.325 10.9667 19.5167 10.6917C19.7083 10.4167 20.0833 10.3501 20.3583 10.5417C22.1667 11.8001 23.3333 13.7667 23.575 15.9417C23.6083 16.2751 23.3667 16.5751 23.0333 16.6084C23.0083 16.6084 22.9917 16.6084 22.9667 16.6084Z" fill="#292D32"/>
										<path opacity="0.4" d="M9.11665 16.6499C9.09999 16.6499 9.07499 16.6499 9.05832 16.6499C8.72499 16.6166 8.48332 16.3166 8.51665 15.9833C8.74165 13.8083 9.89165 11.8416 11.6833 10.5749C11.95 10.3833 12.3333 10.4499 12.525 10.7166C12.7167 10.9916 12.65 11.3666 12.3833 11.5583C10.8833 12.6249 9.90832 14.2749 9.72499 16.0999C9.69165 16.4166 9.42499 16.6499 9.11665 16.6499Z" fill="#292D32"/>
										<path opacity="0.4" d="M19.325 23.5834C18.3 24.0751 17.2 24.3251 16.05 24.3251C14.85 24.3251 13.7083 24.0584 12.6417 23.5168C12.3417 23.3751 12.225 23.0084 12.375 22.7084C12.5167 22.4084 12.8833 22.2918 13.1833 22.4334C13.7083 22.7001 14.2667 22.8834 14.8333 22.9918C15.6 23.1418 16.3833 23.1501 17.15 23.0168C17.7167 22.9168 18.275 22.7418 18.7917 22.4918C19.1 22.3501 19.4667 22.4668 19.6 22.7751C19.75 23.0751 19.6333 23.4418 19.325 23.5834Z" fill="#292D32"/>
										<path d="M16.0417 7.67505C14.75 7.67505 13.6917 8.72505 13.6917 10.025C13.6917 11.325 14.7417 12.375 16.0417 12.375C17.3417 12.375 18.3917 11.325 18.3917 10.025C18.3917 8.72505 17.3417 7.67505 16.0417 7.67505Z" fill="#292D32"/>
										<path d="M10.2083 17.5583C8.91667 17.5583 7.85834 18.6084 7.85834 19.9084C7.85834 21.2084 8.90834 22.2584 10.2083 22.2584C11.5083 22.2584 12.5583 21.2084 12.5583 19.9084C12.5583 18.6084 11.5 17.5583 10.2083 17.5583Z" fill="#292D32"/>
										<path d="M21.7917 17.5583C20.5 17.5583 19.4417 18.6084 19.4417 19.9084C19.4417 21.2084 20.4917 22.2584 21.7917 22.2584C23.0917 22.2584 24.1417 21.2084 24.1417 19.9084C24.1417 18.6084 23.0917 17.5583 21.7917 17.5583Z" fill="#292D32"/>
									</svg>
								</div>
							</div>

							<h3 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
							</h3>

							<div class="wave-audio-wrapper" style="display: flex; align-items: center; gap: 5px;">
								<div class="play-pause-buttons">
									<!-- Play Btn -->
									<div class="playButton-<?php echo $unique_id; ?>" style="cursor:pointer;">
										<svg xmlns="http://www.w3.org/2000/svg" width="55" height="54" viewBox="0 0 55 54" fill="none">
											<g id="Group 499">
											<ellipse cx="27.0271" cy="27" rx="27.0271" ry="27" fill="#FF184E" fill-opacity="0.1"/>
											<path id="Polygon 1" d="M35 25.2679C36.3333 26.0377 36.3333 27.9623 35 28.7321L24.5 34.7942C23.1667 35.564 21.5 34.6018 21.5 33.0622L21.5 20.9378C21.5 19.3982 23.1667 18.436 24.5 19.2058L35 25.2679Z" fill="#FF184E"/>
											</g>
										</svg>
									</div>
									<!-- Pause Btn -->
									<div class="pauseButton-<?php echo $unique_id; ?>" style="cursor:pointer; display:none;">
										<svg xmlns="http://www.w3.org/2000/svg" width="55" height="54" viewBox="0 0 55 54" fill="none">
											<g id="Group 496">
											<ellipse cx="27.0271" cy="27" rx="27.0271" ry="27" fill="#FF184E" fill-opacity="0.1"/>
											<g id="vuesax/bulk/pause">
											<g id="vuesax/bulk/pause_2">
											<g id="pause">
											<path id="Vector" d="M25.7883 33.5175V20.4825C25.7883 19.245 25.2653 18.75 23.944 18.75H20.6131C19.2918 18.75 18.7688 19.245 18.7688 20.4825V33.5175C18.7688 34.755 19.2918 35.25 20.6131 35.25H23.944C25.2653 35.25 25.7883 34.755 25.7883 33.5175Z" fill="#FF184E"/>
											<path id="Vector_2" opacity="0.4" d="M35.2853 33.5175V20.4825C35.2853 19.245 34.7623 18.75 33.441 18.75H30.1102C28.798 18.75 28.2658 19.245 28.2658 20.4825V33.5175C28.2658 34.755 28.7888 35.25 30.1102 35.25H33.441C34.7623 35.25 35.2853 34.755 35.2853 33.5175Z" fill="#FF184E"/>
											</g>
											</g>
											</g>
											</g>
										</svg>
									</div>
								</div>
								<div id="waveform-<?php echo $unique_id; ?>" style="width: 100%;"></div>
							</div>
						</div>
					</div>

					<!-- Script -->
					<script type="module">
						import WaveSurfer from 'https://cdn.jsdelivr.net/npm/wavesurfer.js@7/dist/wavesurfer.esm.js';

						const playButton<?php echo $unique_id; ?> = document.querySelector('.playButton-<?php echo $unique_id; ?>');
            			const pauseButton<?php echo $unique_id; ?> = document.querySelector('.pauseButton-<?php echo $unique_id; ?>');

						const wavesurfer<?php echo $unique_id; ?> = WaveSurfer.create({
							container: '#waveform-<?php echo $unique_id; ?>',
							waveColor: '#FFE8EE',
							progressColor: '#FF184E',
							// barWidth: 3,
							responsive: true,
							hideScrollbar: true,
							barRadius: 3,
							height: '60',
							url: '<?php echo esc_url($audio_url); ?>',
						})

						// Toggle visibility function
						function updateButtons<?php echo $unique_id; ?>() {
							if (wavesurfer<?php echo $unique_id; ?>.isPlaying()) {
								playButton<?php echo $unique_id; ?>.style.display = 'none';
								pauseButton<?php echo $unique_id; ?>.style.display = 'block';
							} else {
								playButton<?php echo $unique_id; ?>.style.display = 'block';
								pauseButton<?php echo $unique_id; ?>.style.display = 'none';
							}
						}

						playButton<?php echo $unique_id; ?>.addEventListener('click', () => {
							wavesurfer<?php echo $unique_id; ?>.play();
							updateButtons<?php echo $unique_id; ?>();
						});

						pauseButton<?php echo $unique_id; ?>.addEventListener('click', () => {
							wavesurfer<?php echo $unique_id; ?>.pause();
							updateButtons<?php echo $unique_id; ?>();
						});

						wavesurfer<?php echo $unique_id; ?>.on('finish', () => {
							updateButtons<?php echo $unique_id; ?>();
						});

					</script>

					<!-- Copy Post Icon -->
					<script>
						// Function to copy the URL to clipboard
						function copyToClipboard(url) {
							var tempInput = document.createElement('input');
							tempInput.value = url;
							document.body.appendChild(tempInput);
							tempInput.select();
							document.execCommand('copy');
							document.body.removeChild(tempInput);
							alert('URL copied to clipboard!');
						}
					</script>

				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		
	<?php 
}
		
   	public function posts_cat_list() {
		
		$terms = get_terms( array(
			'taxonomy'    => 'category',
			'hide_empty'  => true
		) );

		$cat_list = [];
		foreach($terms as $post) {
		$cat_list[$post->slug]  = [$post->name];
		}
		return $cat_list;
	  
	}		
	
}


Plugin::instance()->widgets_manager->register_widget_type( new podcast_list_full_width() );