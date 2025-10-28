<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_heading_layout extends Widget_Base {

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
		return 'kristo-heading-layout';
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
		return esc_html__( 'Kristo Heading Layout', 'kristo-extra' );
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
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Listen To Podcast Live', 'kristo-extra' ),
				'placeholder' => esc_html__( 'Type your title here', 'kristo-extra' ),
			]
		);

        $this->add_control(
			'kristo_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'kristo-extra' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click and enjoy music or podcast', 'kristo-extra' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'kristo-extra' ),
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
	
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$kristo_title = $settings['kristo_title'];
		$kristo_subtitle = $settings['kristo_subtitle'];
	?>

	<style>
		.kristo-heading-layout {
			margin-bottom: 30px !important;
		}

		.kristo-heading-layout h2 {
			font-size: 36px !important;
			font-weight: 700;
			margin-bottom: 2px !important;
		}
		.kristo-heading-layout p {
			color: #A3A3A3 !important;
			font-size: 16px !important;
			font-weight: 500;
		}

		@media (max-width: 460px) {
			.kristo-heading-layout h2 {
				font-size: 24px !important;
			}
		}
	</style>

	<div class="kristo-heading-layout">
        <h2><?php echo $kristo_title; ?></h2>
		<p><?php echo $kristo_subtitle; ?></p>
    </div>

	<?php 
    }
	
}


Plugin::instance()->widgets_manager->register_widget_type( new kristo_heading_layout() );