<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_post_top_stories_carousel extends Widget_Base {

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
		return 'posts-top-stories';
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
		return esc_html__( 'Top Stories Carousel', 'kristo-extra' );
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
		return 'eicon-posts-carousel'; 
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
		return [ 'kristo', 'post', 'kristo post', 'widget', 'elementor', 'top', 'stories', 'story', 'carousel' ];
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
		
		$this->add_control(
			'stories_top_title',
			[
				'label' => __( 'Section Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Top Stories', 'kristo-extra' ),
				'placeholder' => __( 'Type Your title here', 'kristo-extra' ),
			]
		);


		$this->add_control(
			'stories_top_subtitle',
			[
				'label' => __( 'Section Sub Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Text Description', 'kristo-extra' ),
				'placeholder' => __( 'Type Your Sub title here', 'kristo-extra' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'top_carosuel_post_img_width',
			[
				'label' =>esc_html__( 'Set Post Image Width', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 140,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 140,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 100,
					'unit' => '%',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 140,
				],
				
				'selectors' => [
				
					'{{WRAPPER}} #posts_top_stories .theme-top-stories-wrap-inner .grid-thumbnail-stories-wrap' => 'min-width: {{SIZE}}{{UNIT}};',
				],

				'separator' => 'before',
			]
		);


		$this->add_responsive_control(
			'top_carosuel_post_img_height',
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
					'size' => 140,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 140,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 140,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 140,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme-top-stories-wrapper .grid-thumbnail-stories-wrap a img' => 'height: {{SIZE}}{{UNIT}};',
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
						'max' => 100,
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
					'{{WRAPPER}} #posts_top_stories .theme-top-stories-wrap-inner .grid-thumbnail-stories-wrap a img' => 'border-radius: {{SIZE}}{{UNIT}};',
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
				'separator' => 'before',
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
                'label'       => __( 'Show specific posts by ID', 'liberk-extra' ),
                'placeholder' => __( 'ex.: 256, 54, 78', 'liberk-extra' ),
                'description'   => __( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar', 'liberk-extra' ),
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
            'display_cat',
            [
                'label' => esc_html__('Display Category Name', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
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
              'name' => 'stories_title_typography',
              'label' => esc_html__( 'Section Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} .theme-top-stories-wrapper .top-stories-title h2',
           ]
        );	

        $this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'stories_subtitle_typography',
              'label' => esc_html__( 'Section SubTitle Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} .theme-top-stories-wrapper .top-stories-title p',
           ]
        );	

		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'st_blogtitle_typography',
              'label' => esc_html__( 'Post Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} .theme-top-stories-wrapper .stories-post-inner-content h3.post-title',
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
            'section_title_margin',
            [
                'label' => esc_html__( 'Section Title Margin', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #posts_top_stories.theme-top-stories-wrapper .top-stories-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_title_padding',
            [
                'label' => esc_html__( 'Section Title Padding', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #posts_top_stories.theme-top-stories-wrapper .top-stories-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

		$this->add_responsive_control(
            'section_subtitle_margin',
            [
                'label' => esc_html__( 'Section SubTitle Margin', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #posts_top_stories.theme-top-stories-wrapper .top-stories-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_subtitle_padding',
            [
                'label' => esc_html__( 'Section SubTitle Padding', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #posts_top_stories.theme-top-stories-wrapper .top-stories-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'post_title_margin',
            [
                'label' => esc_html__( 'Post Title Margin', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #posts_top_stories.theme-top-stories-wrapper .stories-post-inner-content h3.post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} #posts_top_stories.theme-top-stories-wrapper .stories-post-inner-content h3.post-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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

		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$post_sortby = $settings['post_sorting'];
		
		$display_blog_cat = $settings['display_cat'];

		
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
        $query = new \WP_Query( $args ); ?>
		
		
	<script type="text/javascript">
	
		jQuery(document).ready(function ($) {
			
			function rtl_slick(){
				if ($('body').hasClass("rtl")) {
				   return true;
				} else {
				   return false;
			}}
			
			/* Main Slider */
			$('.top-stories-slider').slick({
				infinite: true,
				fade: false,
				dots: false,
				arrows: true,
				autoplay: false,
				autoplaySpeed: 3000,
				slidesToShow: 3,
				slidesToScroll: 3,
				rtl: rtl_slick(),

				prevArrow: '<div class="slide-arrow-left"><i class="icofont-long-arrow-left"></i></div>',
				nextArrow: '<div class="slide-arrow-right"><i class="icofont-long-arrow-right"></i></div>',
				
				responsive: [
					{
					  breakpoint: 1500,
					  settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					  }
					},
					{
					  breakpoint: 1199,
					  settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					  }
					},
					{
					  breakpoint: 768,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					},
					{
					  breakpoint: 480,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					}
				]
			});

		});
    </script> 
	
		
<div id="posts_top_stories" class="post-grid-wrapper-section theme-top-stories-wrapper posts_top_stories wow fadeInUp delay-0-4s">

	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<div class="top-stories-title">
					<h2><?php echo wp_kses_post( $settings['stories_top_title']  ); ?></h2>
					<p><?php echo wp_kses_post( $settings['stories_top_subtitle']  ); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
		
		<?php if ( $query->have_posts() ) : ?>
		
		<div class="theme-top-stories-wrap top-stories-slider">

			<?php while ($query->have_posts()) : $query->the_post(); ?>

				<div class="theme-top-stories-wrap-inner wow fadeInUp delay-0-2s">

					<div class="top-stories-wrap-inner-content">

					<div class="grid-thumbnail-stories-wrap">
						<a href="<?php the_permalink(); ?>" class="post-grid-thumbnail-stories">
							<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
					</div>
						
					<div class="stories-post-inner-content">

						<?php if($display_blog_cat=='yes'): ?>	
							<div class="slider-category-box cat-box-stories">
							<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php'; ?>
							</div>
						<?php endif; ?>	

						<h3 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
						</h3>


					</div>

				</div>
							
				</div>


			<?php endwhile; ?>
		
		</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php endif; ?>
		
			</div>

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


Plugin::instance()->widgets_manager->register_widget_type( new kristo_post_top_stories_carousel() );