<?php
/**
 * Elementor Institutional Breadcrumb & Hero Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Institutional_Breadcrumb_Hero_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-institutional-breadcrumb-hero';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Institutional Breadcrumb & Hero', 'meridian-africa' );
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
		return array( 'breadcrumb', 'hero', 'institutional', 'navigation', 'meridian' );
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
		// Breadcrumb Section
		$this->start_controls_section(
			'breadcrumb_section',
			array(
				'label' => esc_html__( 'Breadcrumb', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_breadcrumb',
			array(
				'label'        => esc_html__( 'Show Breadcrumb', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'breadcrumb_home_text',
			array(
				'label'     => esc_html__( 'Home Text', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Home',
				'condition' => array(
					'show_breadcrumb' => 'yes',
				),
			)
		);

		$this->add_control(
			'breadcrumb_home_url',
			array(
				'label'       => esc_html__( 'Home URL', 'meridian-africa' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'meridian-africa' ),
				'default'     => array(
					'url' => home_url( '/' ),
				),
				'condition'   => array(
					'show_breadcrumb' => 'yes',
				),
			)
		);

		$this->add_control(
			'breadcrumb_current_text',
			array(
				'label'     => esc_html__( 'Current Page Text', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Institutional Integration',
				'condition' => array(
					'show_breadcrumb' => 'yes',
				),
			)
		);

		$this->add_control(
			'show_home_icon',
			array(
				'label'        => esc_html__( 'Show Home Icon', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'show_breadcrumb' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		// Hero Content Section
		$this->start_controls_section(
			'hero_content_section',
			array(
				'label' => esc_html__( 'Hero Content', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'hero_title',
			array(
				'label'   => esc_html__( 'Hero Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Institutional Integration',
			)
		);

		$this->add_control(
			'hero_description',
			array(
				'label'   => esc_html__( 'Hero Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Meridian Africa aligns with global and regional development frameworks to ensure our solutions meet international standards and support sustainable agricultural transformation across Africa.',
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
		// Breadcrumb Style
		$this->start_controls_section(
			'breadcrumb_style',
			array(
				'label'     => esc_html__( 'Breadcrumb Style', 'meridian-africa' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'show_breadcrumb' => 'yes',
				),
			)
		);

		$this->add_control(
			'breadcrumb_bg_color',
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
			'breadcrumb_padding',
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

		$this->add_control(
			'breadcrumb_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.9)',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-link' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->add_control(
			'breadcrumb_current_color',
			array(
				'label'     => esc_html__( 'Current Page Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-current' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Hero Background Style
		$this->start_controls_section(
			'hero_background_style',
			array(
				'label' => esc_html__( 'Hero Background', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'hero_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1E41AF',
				'selectors' => array(
					'{{WRAPPER}} .institutional-breadcrumb-hero' => 'background: linear-gradient(135deg, {{VALUE}} 0%, {{VALUE}} 100%)',
				),
			)
		);

		$this->add_responsive_control(
			'hero_padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'top'    => '100',
					'right'  => '0',
					'bottom' => '80',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .institutional-breadcrumb-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Hero Title Style
		$this->start_controls_section(
			'hero_title_style',
			array(
				'label' => esc_html__( 'Hero Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'hero_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'hero_title_typography',
				'selector' => '{{WRAPPER}} .hero-title',
			)
		);

		$this->end_controls_section();

		// Hero Description Style
		$this->start_controls_section(
			'hero_description_style',
			array(
				'label' => esc_html__( 'Hero Description', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'hero_description_color',
			array(
				'label'     => esc_html__( 'Description Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.95)',
				'selectors' => array(
					'{{WRAPPER}} .hero-description' => 'opacity: 1; color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'hero_description_typography',
				'selector' => '{{WRAPPER}} .hero-description',
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
		$home_url = ! empty( $settings['breadcrumb_home_url']['url'] ) ? $settings['breadcrumb_home_url']['url'] : home_url( '/' );
		?>

		<?php if ( 'yes' === $settings['show_breadcrumb'] ) : ?>
		<!-- Breadcrumb Navigation -->
		<nav class="breadcrumb-section">
			<div class="container">
				<a href="<?php echo esc_url( $home_url ); ?>" class="breadcrumb-link">
					<?php if ( 'yes' === $settings['show_home_icon'] ) : ?>
						<i class="fas fa-home"></i>
					<?php endif; ?>
					<?php echo esc_html( $settings['breadcrumb_home_text'] ); ?>
				</a>
				<span class="breadcrumb-separator">
					<i class="fas fa-chevron-right"></i>
				</span>
				<span class="breadcrumb-current"><?php echo esc_html( $settings['breadcrumb_current_text'] ); ?></span>
			</div>
		</nav>
		<?php endif; ?>

		<!-- Breadcrumb & Hero Section -->
		<section class="institutional-breadcrumb-hero">
			<div class="hero-background">
				<div class="hero-shape shape-1"></div>
				<div class="hero-shape shape-2"></div>
				<div class="hero-shape shape-3"></div>
			</div>
			<div class="container">
				<div class="hero-content">
					<h1 class="hero-title"><?php echo esc_html( $settings['hero_title'] ); ?></h1>
					<p class="hero-description"><?php echo esc_html( $settings['hero_description'] ); ?></p>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Institutional_Breadcrumb_Hero_Widget() );

