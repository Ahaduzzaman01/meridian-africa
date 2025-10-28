<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_title extends Widget_Base {

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
		return 'kristo-title';
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
		return esc_html__( 'Kristo Title', 'kristo-extra' );
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
		return 'eicon-heading'; 
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
		return [ 'kristo', 'title', 'kristo title', 'kristo widget', 'heading', 'kristo heading' ];
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
		$this->title_options();
	}

    /**
    * Title Options
    */
    private function title_options() {
	
		$this->start_controls_section(
            'title_option',
            [
                'label' => __( 'Title Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'kristo_title',
			[
				'label' => esc_html__( 'Title', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Hello World!', 'kristo-extra' ),
				'placeholder' => esc_html__( 'Type your title here', 'kristo-extra' ),
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
               'name' => 'kristo_title_typography',
               'label' => esc_html__( 'Typography', 'kristo-extra' ),
               'selector' => '{{WRAPPER}} .kristo-title.tab-section-title h2',
			   'separator' => 'before',
            ]
         );	
         
        $this->add_control('kristo_title_color', [
            'label' => esc_html__('Title Color', 'kristo-extra'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .kristo-title.tab-section-title h2" => "color: {{VALUE}}"
			],
			'separator' => 'before',
        ]);

        $this->add_control('kristo_title_bg_color', [
            'label' => esc_html__('Title Background Color', 'kristo-extra'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .kristo-title.tab-section-title h2" => "background-color: {{VALUE}}"
			],
			'separator' => 'before',
        ]);
		
		$this->end_controls_section();
	
	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		$kristo_title = $settings['kristo_title'];

	?>

	<div class="kristo-title tab-section-title">
        <h2><?= $kristo_title; ?></h2>
    </div>

	<?php 
    }
	
}


Plugin::instance()->widgets_manager->register_widget_type( new kristo_title() );