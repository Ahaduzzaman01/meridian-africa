<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_post_block_thumbnail_box extends Widget_Base {

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
		return 'post-block-thumbnail-box';
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
		return esc_html__( 'Post Thumbnail Box', 'kristo-extra' );
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
		return 'eicon-image'; 
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
		return [ 'kristo', 'thumbnail', 'box', 'widget', 'author list', 'auth', 'elementor' ];
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
		$this->layout_options();
		$this->post_query_options();	
		$this->meta_options();	
		$this->design_options();
	}

	/**
    * Layout Options
    */
    private function layout_options() {
	
		$this->start_controls_section(
            'layout_option',
            [
                'label' => __( 'Layout Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_responsive_control(
			'thumbnail_box_img_height',
			[
				'label' =>esc_html__( 'Set Post Image Height', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 200,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 200,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 200,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 200,
				],
				
				'selectors' => [
					'{{WRAPPER}} .post-thumbnail-box .author-list-thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		
		$this->add_responsive_control(
			'img_radius',
			[
				'label' =>esc_html__( 'Image Border Radius', 'liberk-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],

				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'desktop_default' => [
					'size' => 24,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 24,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 24,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 24,
				],
				
				'selectors' => [
					'{{WRAPPER}} .post-thumbnail-box .author-list-thumb img' => 'border-radius: {{SIZE}}{{UNIT}};',
				],

				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
	
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
				'default'       => '8',
				'separator' => 'before',
			]
        );
		
		// Post Offset
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

		// Post ID
		$this->add_control(
            'post_ids',
            [
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label'       => __( 'Show specific posts by ID', 'kristo-extra' ),
                'placeholder' => __( 'ex.: 256, 54, 78', 'kristo-extra' ),
                'description'   => __( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar', 'kristo-extra' ),
                'default'     => '',
				'label_block' => true,
                'separator'     => 'before',
            ]
        );
		
		$this->end_controls_section();
	
	}	
	
	/**
    * Meta Options
    */
    private function meta_options() {
	
		$this->start_controls_section(
            'meta_option',
            [
                'label' => __( 'Meta Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'display_title',
            [
                'label' => esc_html__('Display Post Title', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'no',
            ]
        );

		$this->end_controls_section();
	
	}	
	
	/**
    * Design Options
    */
    private function design_options() {
	
		$this->start_controls_section(
            'design_option',
            [
                'label' => __( 'Typography Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'title_typography',
              'label' => esc_html__( 'Post Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} .post-thumbnail-box .author-list-content h4 a',
           ]
        );

		$this->end_controls_section();


		// Margin and Padding
		$this->start_controls_section(
            'margin_and_padding_options',
            [
                'label' => __( 'Margin and Padding Options', 'kristo-extra' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'post_title_margin',
            [
                'label' => esc_html__( 'Post Title Margin', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-thumbnail-box .author-list-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'post_title_padding',
            [
                'label' => esc_html__( 'Post Title Padding', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-thumbnail-box .author-list-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );
		
		$this->end_controls_section();
	
	}		

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		$string_ID = $settings['post_ids'];
        $post_ID = ( ! empty( $string_ID ) ) ? array_map( 'intval', explode( ',', $string_ID ) ) : '';

		$display_title = $settings['display_title'];
		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$post_sortby = $settings['post_sorting'];

		$args = [
            'post_type' => 'post',
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
        $query = new \WP_Query( $args );

	?>
	
<div id="kristo_author_box" class="theme-author-list-wrapper custom-author-list-section post-thumbnail-box">	
	<div class="container">
		<div class="row">

			<?php if ( $query->have_posts() ) : ?>
				<?php while ($query->have_posts()) : $query->the_post(); ?>
				<div class="col-lg-3">
					<div class="custom-author-list-inner">

						<div class="author-list-thumb">
						    <a href="<?php the_permalink(); ?>">
							    <img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
						</div>

						<?php if($display_title =='yes'): ?>
						<div class="author-list-content">
							<h4>
								<a href="<?php the_permalink(); ?>" class="single-author-name">
									<?php echo esc_html( get_the_title() ); ?>
								</a>
							</h4>
						</div>
						<?php endif; ?>

					</div>	
				</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>
	</div>
</div>


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


Plugin::instance()->widgets_manager->register_widget_type( new kristo_post_block_thumbnail_box() );