<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class podcast_grid extends Widget_Base {

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
		return 'podcast-grid';
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
		return esc_html__( 'Podcast Grid', 'kristo-extra' );
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
		return [ 'kristo', 'post', 'kristo post', 'widget', 'elementor', 'podcast', 'grid' ];
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
				.podcast-grid .tab-small-post-list {
					display: block;
				}

				.post-list-block-wrapper.post-list-block-wrapper-loadmore.podcast-grid .tab-small-thumbnail-wrap {
					margin-left: 00px;
				}

				.podcast-grid .tab-small-thumbnail-wrap {
					max-width: 100%;
					margin-bottom: 15px;
				}

				.podcast-grid .tab-small-thumbnail-wrap img {
					min-height: 166px !important;
				}

				/* RESPONSIVE */
				@media (max-width: 767px) {
					.podcast-grid .tab-small-thumbnail-wrap img {
						min-height: auto !important;
					}

					.tab-bottom-grid-style.post-list-block-wrapper.post-list-block-wrapper-loadmore.podcast-grid .tab-small-thumbnail-wrap a img {
						height: 300px;
					}

					.podcast-grid .tab-small-post-list.postlist-loadmore-item .tab-post-grid-content-small {
						margin-bottom: 17px;
					}
				}
			</style>

				<div id="post_block_list_loadmore" class="tab-small-list-item tab-bottom-grid-style post-list-block-wrapper post-list-block-wrapper-loadmore podcast-grid wow fadeInUp delay-0-2s">
					<div class="tab-small-post-list postlist-loadmore-item">
						<div class="tab-small-thumbnail-wrap">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
						</div>
						<div class="tab-post-grid-content-small">
							<h3 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
							</h3>
						</div>

						<div class="wave-audio-wrapper" style="display: flex; align-items: center; gap: 5px;">
							<div class="play-pause-buttons">
								<!-- Play Btn -->
								<div class="playButton-<?php echo $unique_id; ?>" style="cursor:pointer;">
									<svg xmlns="http://www.w3.org/2000/svg" width="55" height="54" viewBox="0 0 55 54" fill="none">
										<g id="Group 499">
										<ellipse cx="27.0271" cy="27" rx="27.0271" ry="27" fill="#9D9D9D" fill-opacity="0.1"/>
										<path id="Polygon 1" d="M35 25.2679C36.3333 26.0377 36.3333 27.9623 35 28.7321L24.5 34.7942C23.1667 35.564 21.5 34.6018 21.5 33.0622L21.5 20.9378C21.5 19.3982 23.1667 18.436 24.5 19.2058L35 25.2679Z" fill="#9D9D9D"/>
										</g>
									</svg>
								</div>
								<!-- Pause Btn -->
								<div class="pauseButton-<?php echo $unique_id; ?>" style="cursor:pointer; display:none;">
									<svg xmlns="http://www.w3.org/2000/svg" width="55" height="54" viewBox="0 0 55 54" fill="none">
										<g id="Group 496">
										<ellipse cx="27.0271" cy="27" rx="27.0271" ry="27" fill="#9D9D9D" fill-opacity="0.1"/>
										<g id="vuesax/bulk/pause">
										<g id="vuesax/bulk/pause_2">
										<g id="pause">
										<path id="Vector" d="M25.7883 33.5175V20.4825C25.7883 19.245 25.2653 18.75 23.944 18.75H20.6131C19.2918 18.75 18.7688 19.245 18.7688 20.4825V33.5175C18.7688 34.755 19.2918 35.25 20.6131 35.25H23.944C25.2653 35.25 25.7883 34.755 25.7883 33.5175Z" fill="#9D9D9D"/>
										<path id="Vector_2" opacity="0.4" d="M35.2853 33.5175V20.4825C35.2853 19.245 34.7623 18.75 33.441 18.75H30.1102C28.798 18.75 28.2658 19.245 28.2658 20.4825V33.5175C28.2658 34.755 28.7888 35.25 30.1102 35.25H33.441C34.7623 35.25 35.2853 34.755 35.2853 33.5175Z" fill="#9D9D9D"/>
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

					<!-- Script -->
					<script type="module">
						import WaveSurfer from 'https://cdn.jsdelivr.net/npm/wavesurfer.js@7/dist/wavesurfer.esm.js';

						const playButton<?php echo $unique_id; ?> = document.querySelector('.playButton-<?php echo $unique_id; ?>');
            			const pauseButton<?php echo $unique_id; ?> = document.querySelector('.pauseButton-<?php echo $unique_id; ?>');

						const wavesurfer<?php echo $unique_id; ?> = WaveSurfer.create({
							container: '#waveform-<?php echo $unique_id; ?>',
							waveColor: '#D2D2D2',
							progressColor: '#7D7D7D',
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


Plugin::instance()->widgets_manager->register_widget_type( new podcast_grid() );