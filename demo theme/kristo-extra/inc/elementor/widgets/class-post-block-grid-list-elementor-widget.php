<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_post_block_grid_list extends Widget_Base {

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
		return 'post-block-grid-list';
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
		return esc_html__( 'Grid Posts', 'kristo-extra' );
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
		return 'eicon-gallery-grid'; 
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
		return [ 'kristo', 'post', 'kristo post', 'widget', 'elementor', 'top', 'grid', 'list', 'gaming' ];
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
			'grid_post_section_title',
			[
				'label' => __( 'Section Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Top Stories', 'kristo-extra' ),
				'placeholder' => __( 'Type Your title here', 'kristo-extra' ),
				'condition' => [ 'display_titlebar' => 'yes' ],
				'separator' => 'before',
			]
		);


		$this->add_control(
			'grid_post_section_subtitle',
			[
				'label' => __( 'Section Sub Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Text Description', 'kristo-extra' ),
				'placeholder' => __( 'Type Your Sub title here', 'kristo-extra' ),
				'separator' => 'before',
				'condition' => [ 'display_titlebar' => 'yes' ],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'grid_post_img_width',
			[
				'label' =>esc_html__( 'Set Image Width', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 165,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 165,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 165,
					'unit' => 'px',
				],
				
				'default'  => [
					'size' => 165,
					'unit' => 'px',
				],
				
				'selectors' => [
				
					'{{WRAPPER}} #post_block_grid_list .theme-top-stories-wrap-inner .grid-thumbnail-stories-wrap' => 'min-width: {{SIZE}}{{UNIT}};',
				],

				'separator' => 'before',
			]
		);


		$this->add_responsive_control(
			'grid_post_img_height',
			[
				'label' =>esc_html__( 'Set Image Height', 'kristo-extra' ),
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
					'{{WRAPPER}} #post_block_grid_list .theme-top-stories-wrap-inner .grid-thumbnail-stories-wrap a img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		
		$this->add_responsive_control(
			'grid_post_img_radius',
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
					'{{WRAPPER}} #post_block_grid_list .theme-top-stories-wrap-inner .grid-thumbnail-stories-wrap a img' => 'border-radius: {{SIZE}}{{UNIT}};',
				],

				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'tab_option',
            [
                'label' => __( 'Content Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'grid_post_tabs',
			[
				'label' => esc_html__('Content Items', 'kristo-extra'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => esc_html__('Add Tab Content Menu', 'kristo-extra'),
					],
				],
				
				'fields' => [

					[
						'name' => 'item_title',
						'label' => esc_html__( 'Title', 'kristo-extra' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'rows' => 3,
						'default' => esc_html__( 'Default title', 'kristo-extra' ),
						'placeholder' => esc_html__( 'Type your title here', 'kristo-extra' ),
					],
					[
						'name' => 'item_description',
						'label' => esc_html__( 'Description', 'kristo-extra' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'rows' => 5,
						'default' => esc_html__( 'Default Description', 'kristo-extra' ),
						'placeholder' => esc_html__( 'Type your short description/text here', 'kristo-extra' ),
						'separator' => 'before',
					],

					[
						'name' => 'item_thumbnail',
						'label' => esc_html__( 'Choose Image', 'kristo-extra' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'separator' => 'before',
					],

					[
						'name' => 'item_link',
						'label' => esc_html__( 'Link', 'kristo-extra' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'kristo-extra' ),
						'options' => [ 'url', 'is_external', 'nofollow' ],
						'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
							'custom_attributes' => '',
						],
						'label_block' => true,
						'separator' => 'before',
					]
				  
				],
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
              'selector' => '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .top-stories-title h2',
           ]
        );	

        $this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'stories_subtitle_typography',
              'label' => esc_html__( 'Section SubTitle Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .top-stories-title p',
           ]
        );	

		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'st_blogtitle_typography',
              'label' => esc_html__( 'Title Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .stories-post-inner-content h3.post-title',
           ]
        );	

		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'st_blogdesc_typography',
              'label' => esc_html__( 'Description Typography', 'kristo-extra' ),
              'selector' => '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .stories-post-inner-content span',
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
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .top-stories-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .top-stories-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .top-stories-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .top-stories-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .stories-post-inner-content h3.post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Title Padding', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .stories-post-inner-content h3.post-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

		$this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Description Margin', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .stories-post-inner-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => esc_html__( 'Description Padding', 'kristo-extra' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #post_block_grid_list.theme-top-stories-wrapper .stories-post-inner-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
				'separator' => 'before',
            ]
        );
		

		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		$settings = $this->get_settings_for_display();

		$display_titlebar = $settings['display_titlebar'];
		$grid_post_section_title = $settings['grid_post_section_title'];
		$grid_post_section_subtitle = $settings['grid_post_section_subtitle'];

		$grid_post_tabs = $settings['grid_post_tabs'];
		
	?> 
	
		
	<div id="post_block_grid_list" class="post-grid-wrapper-section theme-top-stories-wrapper ">
		<div class="container">

			<?php if($display_titlebar =='yes'): ?> 
			<div class="row">
				<div class="col-lg-12">
					<div class="top-stories-title">
						<h2><?php echo wp_kses_post( $grid_post_section_title ); ?></h2>
						<p><?php echo wp_kses_post( $grid_post_section_subtitle ); ?></p>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="row">

				<?php foreach( $grid_post_tabs as $grid_post_tab ){ ?>
				<div class="col-lg-4">
					<div class="theme-top-stories-wrap top-stories-slider">
						<div class="theme-top-stories-wrap-inner">
							<div class="top-stories-wrap-inner-content">
								<div class="grid-thumbnail-stories-wrap">
									<a href="<?= $grid_post_tab['item_link']['url']; ?>" class="post-grid-thumbnail-stories">
										<img src="<?= $grid_post_tab['item_thumbnail']['url']; ?>" alt="<?= $grid_post_tab['item_title']; ?>">
									</a>
								</div>
								<div class="stories-post-inner-content">
									<h3 class="post-title">
										<a href="<?= $grid_post_tab['item_link']['url']; ?>"><?= $grid_post_tab['item_title']; ?></a>
									</h3>
									<span class="category-number"><?= $grid_post_tab['item_description']; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</div>


	
	<?php 
}		
	
}


Plugin::instance()->widgets_manager->register_widget_type( new kristo_post_block_grid_list() );