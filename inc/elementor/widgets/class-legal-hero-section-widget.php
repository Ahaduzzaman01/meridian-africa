<?php
/**
 * Elementor Legal Hero Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Legal_Hero_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-legal-hero-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Legal Hero Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-header';
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
		return array( 'hero', 'legal', 'header', 'banner', 'meridian' );
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
		// Badge Section
		$this->start_controls_section(
			'badge_section',
			array(
				'label' => esc_html__( 'Badge', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-alt',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Privacy Policy',
			)
		);

		$this->end_controls_section();

		// Title Section
		$this->start_controls_section(
			'title_section',
			array(
				'label' => esc_html__( 'Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Your Privacy Matters to Us',
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'We\'re committed to protecting your data and ensuring transparency in how we collect, use, and safeguard your information',
			)
		);

		$this->end_controls_section();

		// Meta Information Section
		$this->start_controls_section(
			'meta_section',
			array(
				'label' => esc_html__( 'Meta Information', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_meta',
			array(
				'label'        => esc_html__( 'Show Meta Information', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'last_updated_icon',
			array(
				'label'     => esc_html__( 'Last Updated Icon', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'fas fa-calendar-alt',
				'condition' => array(
					'show_meta' => 'yes',
				),
			)
		);

		$this->add_control(
			'last_updated_text',
			array(
				'label'     => esc_html__( 'Last Updated Text', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Last Updated: October 19, 2025',
				'condition' => array(
					'show_meta' => 'yes',
				),
			)
		);

		$this->add_control(
			'effective_date_icon',
			array(
				'label'     => esc_html__( 'Effective Date Icon', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'fas fa-clock',
				'condition' => array(
					'show_meta' => 'yes',
				),
			)
		);

		$this->add_control(
			'effective_date_text',
			array(
				'label'     => esc_html__( 'Effective Date Text', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Effective Date: October 1, 2025',
				'condition' => array(
					'show_meta' => 'yes',
				),
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
					'{{WRAPPER}} .legal-hero' => 'background: linear-gradient(135deg, {{VALUE}} 0%, {{VALUE}} 100%)',
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
					'top'    => '100',
					'right'  => '0',
					'bottom' => '80',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .legal-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Badge Style
		$this->start_controls_section(
			'badge_style',
			array(
				'label' => esc_html__( 'Badge', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'badge_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.9)',
				'selectors' => array(
					'{{WRAPPER}} .legal-badge' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'badge_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1E41AF',
				'selectors' => array(
					'{{WRAPPER}} .legal-badge' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Title Style
		$this->start_controls_section(
			'title_style',
			array(
				'label' => esc_html__( 'Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .legal-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .legal-title',
			)
		);

		$this->add_control(
			'subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .legal-subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .legal-subtitle',
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
		?>

		<section class="legal-hero">
			<div class="legal-hero-bg">
				<div class="legal-shape shape-1"></div>
				<div class="legal-shape shape-2"></div>
				<div class="legal-shape shape-3"></div>
			</div>
			<div class="container">
				<div class="legal-hero-content">
					<div class="legal-badge">
						<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h1 class="legal-title"><?php echo esc_html( $settings['title'] ); ?></h1>
					<p class="legal-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p>
					<?php if ( 'yes' === $settings['show_meta'] ) : ?>
						<div class="legal-meta">
							<span class="security-badge-item">
								<i class="<?php echo esc_attr( $settings['last_updated_icon'] ); ?>"></i>
								<?php echo esc_html( $settings['last_updated_text'] ); ?>
							</span>
							<span class="security-badge-item">
								<i class="<?php echo esc_attr( $settings['effective_date_icon'] ); ?>"></i>
								<?php echo esc_html( $settings['effective_date_text'] ); ?>
							</span>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Legal_Hero_Section_Widget() );

