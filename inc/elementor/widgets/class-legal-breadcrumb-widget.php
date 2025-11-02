<?php
/**
 * Elementor Legal Breadcrumb Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Legal_Breadcrumb_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-legal-breadcrumb';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Legal Breadcrumb', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-navigation-horizontal';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'meridian-africa' );
	}

	/**
	 * Get widget keywords.
	 *
	 * @since 1.0.0
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'breadcrumb', 'navigation', 'legal', 'path', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_content_controls();
		$this->register_style_controls();
	}

	/**
	 * Register content controls.
	 *
	 * @since 1.0.0
	 */
	private function register_content_controls() {
		// Home Link Section
		$this->start_controls_section(
			'home_link_section',
			array(
				'label' => esc_html__( 'Home Link', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'home_text',
			array(
				'label'   => esc_html__( 'Home Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Home',
			)
		);

		$this->add_control(
			'home_url',
			array(
				'label'   => esc_html__( 'Home URL', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => home_url( '/' ),
				),
			)
		);

		$this->add_control(
			'show_home_icon',
			array(
				'label'        => esc_html__( 'Show Home Icon', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		// Middle Link Section
		$this->start_controls_section(
			'middle_link_section',
			array(
				'label' => esc_html__( 'Middle Link', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'middle_text',
			array(
				'label'   => esc_html__( 'Middle Link Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Legal',
			)
		);

		$this->add_control(
			'middle_url',
			array(
				'label'   => esc_html__( 'Middle Link URL', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
				),
			)
		);

		$this->end_controls_section();

		// Current Page Section
		$this->start_controls_section(
			'current_page_section',
			array(
				'label' => esc_html__( 'Current Page', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'current_page_text',
			array(
				'label'   => esc_html__( 'Current Page Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Privacy Policy',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register style controls.
	 *
	 * @since 1.0.0
	 */
	private function register_style_controls() {
		// Background Style
		$this->start_controls_section(
			'background_style',
			array(
				'label' => esc_html__( 'Background', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'background_color',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1E41AF',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-section' => 'background: linear-gradient(135deg, {{VALUE}} 0%, {{VALUE}} 100%)',
				),
			)
		);

		$this->add_responsive_control(
			'padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'top'    => '20',
					'right'  => '0',
					'bottom' => '20',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .breadcrumb-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Text Style
		$this->start_controls_section(
			'text_style',
			array(
				'label' => esc_html__( 'Text', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'link_color',
			array(
				'label'     => esc_html__( 'Link Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.9)',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-link' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'link_hover_color',
			array(
				'label'     => esc_html__( 'Link Hover Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-link:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'current_color',
			array(
				'label'     => esc_html__( 'Current Page Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-current' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'separator_color',
			array(
				'label'     => esc_html__( 'Separator Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.6)',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-separator' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'selector' => '{{WRAPPER}} .breadcrumb',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$home_url   = ! empty( $settings['home_url']['url'] ) ? $settings['home_url']['url'] : home_url( '/' );
		$middle_url = ! empty( $settings['middle_url']['url'] ) ? $settings['middle_url']['url'] : '#';
		?>

		<section class="breadcrumb-section">
			<div class="container">
				<div class="breadcrumb">
					<a href="<?php echo esc_url( $home_url ); ?>" class="breadcrumb-link">
						<?php if ( 'yes' === $settings['show_home_icon'] ) : ?>
							<i class="fas fa-home"></i>
						<?php endif; ?>
						<span><?php echo esc_html( $settings['home_text'] ); ?></span>
					</a>
					<span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
					<a href="<?php echo esc_url( $middle_url ); ?>" class="breadcrumb-link"><?php echo esc_html( $settings['middle_text'] ); ?></a>
					<span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
					<span class="breadcrumb-current"><?php echo esc_html( $settings['current_page_text'] ); ?></span>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Legal_Breadcrumb_Widget() );

