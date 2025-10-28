<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_post_slider_main extends Widget_Base {

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
		return 'posts-slider-main';
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
		return esc_html__( 'Main Slider', 'kristo-extra' );
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
		return [ 'kristo', 'post', 'kristo post', 'widget', 'elementor', 'top', 'carousel', 'slider', 'main' ];
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
            'display_titlebar',
            [
                'label' => esc_html__('Display Section Titlebar', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
			'slider_top_title',
			[
				'label' => __( 'Main Slider Top Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Editors Choice', 'kristo-extra' ),
				'placeholder' => __( 'Type Your title here', 'kristo-extra' ),
				'condition' => [ 'display_titlebar' => 'yes' ],
				'separator' => 'before',
			]
		);


		$this->add_control(
			'slider_top_subtitle',
			[
				'label' => __( 'Main Slider Top Sub Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Text Description', 'kristo-extra' ),
				'placeholder' => __( 'Type Your Sub title here', 'kristo-extra' ),
				'condition' => [ 'display_titlebar' => 'yes' ],
				'separator' => 'before',
			]
		);

		
		$this->add_control(
            'slide_style',
            [
                'label'     =>esc_html__( 'Select Slider Style', 'kristo' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'slide-two-style',
                'options'   => [
								'slide-one-style'    =>esc_html__( 'Style 1', 'kristo' ),
								'slide-two-style'    =>esc_html__( 'Style 2', 'kristo' ),
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
				'default'       => '2',
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
            'display_excerpt',
            [
                'label' => esc_html__('Display Post Excerpt', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

		$this->add_control(
         	'display_author',
         	[
				 'label' => esc_html__('Display Post Meta', 'kristo-extra'),
				 'type' => \Elementor\Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'kristo-extra'),
				 'label_off' => esc_html__('No', 'kristo-extra'),
				 'default' => 'yes',
         	]
     	);

     	$this->add_control(
         	'display_author_info',
         	[
				 'label' => esc_html__('Display Author Info', 'kristo-extra'),
				 'type' => \Elementor\Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'kristo-extra'),
				 'label_off' => esc_html__('No', 'kristo-extra'),
				 'default' => 'yes',
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
		
		$this->add_control(
            'display_date',
            [
                'label' => esc_html__('Display Date', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );
		
		
		$this->add_control(
            'display_read_time',
            [
                'label' => esc_html__('Display Post Read Time', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'no',
            ]
        );

        $this->add_control(
         	'display_comment_counter',
         	[
				 'label' => esc_html__('Display Comment Counter', 'kristo-extra'),
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
		
		// Typography Options
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'sectitle_typography',
              'label' => esc_html__( 'Section Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} #kristo_main_slider .slider-top-heading h2.slider-top-title',
           ]
        );	

        $this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'subtitle_typography',
              'label' => esc_html__( 'Section Sub Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} #kristo_main_slider .slider-top-heading p.slider-top-sub-title',
           ]
        );	

		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'title_typography',
              'label' => esc_html__( 'Post Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} .theme-main-slider-wrapper .blog-slider-inner-content h3.post-title',
           ]
        );		
		
		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'excerpt_typography',
              'label' => esc_html__( 'Post Excerpt Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} .theme-main-slider-wrapper.slide-one-style .blog-slider-inner-content .post-excerpt-box p',
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
                    '{{WRAPPER}} #kristo_main_slider .slider-top-heading h2.slider-top-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} #kristo_main_slider .slider-top-heading h2.slider-top-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} #kristo_main_slider .slider-top-heading p.slider-top-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'section_subtitle_padding',
            [
                'label' => esc_html__( 'Section SubTitle Padding', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #kristo_main_slider .slider-top-heading p.slider-top-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .theme-main-slider-wrapper .blog-slider-inner-content h3.post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .theme-main-slider-wrapper .blog-slider-inner-content h3.post-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'excerpt_margin',
            [
                'label' => esc_html__( 'Excerpt Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-main-slider-wrapper.slide-one-style .blog-slider-inner-content .post-excerpt-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'excerpt_padding',
            [
                'label' => esc_html__( 'Excerpt Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-main-slider-wrapper.slide-one-style .blog-slider-inner-content .post-excerpt-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
		
		$display_titlebar = $settings['display_titlebar'];
		
		$slide_style = $settings['slide_style'];
		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$post_sortby = $settings['post_sorting']; 
		$display_blog_excerpt = $settings['display_excerpt'];
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];
		$display_author_info = $settings['display_author_info'];
		$display_comment_counter = $settings['display_comment_counter'];

		
		$display_read_time = $settings['display_read_time'];

		
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
			$('.theme-main-slider').slick({
				
				infinite: true,
				fade: true,
				dots: false,
				arrows: true,
				autoplay: false,
				speed: 800,
				slidesToShow: 1,
				rtl: rtl_slick(),

				prevArrow: '<div class="slide-arrow-left"><i class="icofont-long-arrow-left"></i></div>',
				nextArrow: '<div class="slide-arrow-right"><i class="icofont-long-arrow-right"></i></div>',
			 });

		});
		
    </script>
	
		
<div id="kristo_main_slider" class="post-main-slider-section theme-main-slider-wrapper wow fadeInUp delay-0-2s <?php echo esc_attr($slide_style);?>">

	<div class="container">
		
		<?php if($display_titlebar =='yes'): ?> 
		<div class="row">
			<div class="col-lg-12">
				<div class="slider-top-heading">
					<h2 class="slider-top-title"><?php echo wp_kses_post( $settings['slider_top_title']  ); ?></h2>
					<p class="slider-top-sub-title"><?php echo wp_kses_post( $settings['slider_top_subtitle']  ); ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="row">
			<div class="col-lg-12">
		
		<?php if ( $query->have_posts() ) : ?>
		
		<div class="theme-main-slider-wrap theme-main-slider">

		 <?php while ($query->have_posts()) : $query->the_post(); ?>

			<div class="main-slide-blog-item main-slider-post-block">
			
        		<div class="blog-post-grid-thumbnail">
        			<a href="<?php the_permalink(); ?>" class="blog-post-grid-thumbnail-wrap">
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					</a>
				</div>
				
				<div class="blog-slider-inner-content">
					
					<?php if($display_blog_cat=='yes'): ?>	
						<div class="slider-category-box">
						<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php'; ?>
						</div>
					<?php endif; ?>	

					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
					</h3>

					
					<?php if($display_blog_excerpt =='yes'): ?> 
					<div class="post-excerpt-box">
						<p><?php echo esc_html( get_the_excerpt() );?></p>
					</div>
					<?php endif; ?>		

					<?php if($display_blog_author =='yes'): ?> 
					<div class="slider-post-meta-items">

						<div class="slider-meta-left">

								<?php if($display_author_info =='yes'): ?> 
								<div class="slider-meta-left-author">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
								</div>
								<?php endif; ?>	
								
								<div class="slider-meta-left-content">

									<?php if($display_author_info =='yes'): ?> 
									<h4 class="post-author-name">
										<?php echo get_the_author_link(); ?>
									</h4>
									<?php endif; ?>	

									<ul class="slider-bottom-meta-list">

										<?php if($display_blog_date=='yes'): ?>

										<li class="slider-meta-date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></li>

										<?php endif; ?>	

										<?php if($display_read_time=='yes'): ?>

										<li class="slider-meta-time"><?php echo kristo_reading_time(); ?></li>

										<?php endif; ?>	

									</ul>
								</div>
								
						</div>


						<?php if($display_comment_counter=='yes'): ?>
						<div class="slider-meta-right">
							<div class="post-comment-box">
								<?php echo get_comments_number(); ?>
							</div>
						</div>
						<?php endif; ?>

					</div>
					<?php endif; ?>		
					
					

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


Plugin::instance()->widgets_manager->register_widget_type( new kristo_post_slider_main() );