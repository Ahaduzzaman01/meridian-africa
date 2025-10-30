<?php
/**
 * Elementor Solutions Hero Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Solutions_Hero_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-solutions-hero-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Solutions Hero Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
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
		return array( 'solutions', 'hero', 'banner', 'header', 'meridian' );
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
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Satellite Infrastructure for African Agriculture',
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
				'default' => 'Solutions for Every Stakeholder',
			)
		);

		$this->end_controls_section();

		// Subtitle Section
		$this->start_controls_section(
			'subtitle_section',
			array(
				'label' => esc_html__( 'Subtitle', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Meridian Africa provides Meridian Sentinel satellite-based verification infrastructure that transforms agricultural program delivery across Africa. From government subsidy verification to development bank monitoring, we deliver automatic, affordable transparency, achieving 100% beneficiary coverage and a 80% cost reduction with a 48-hour verification turnaround.',
			)
		);

		$this->end_controls_section();

		// Statistics Section
		$this->start_controls_section(
			'stats_section',
			array(
				'label' => esc_html__( 'Statistics', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Stat 1
		$this->add_control(
			'stat_1_number',
			array(
				'label'   => esc_html__( 'Stat 1 Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '80%',
			)
		);

		$this->add_control(
			'stat_1_label',
			array(
				'label'   => esc_html__( 'Stat 1 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Cost Reduction vs. Manual',
			)
		);

		// Stat 2
		$this->add_control(
			'stat_2_number',
			array(
				'label'   => esc_html__( 'Stat 2 Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '100%',
			)
		);

		$this->add_control(
			'stat_2_label',
			array(
				'label'   => esc_html__( 'Stat 2 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Beneficiary Coverage',
			)
		);

		// Stat 3
		$this->add_control(
			'stat_3_number',
			array(
				'label'   => esc_html__( 'Stat 3 Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '48hrs',
			)
		);

		$this->add_control(
			'stat_3_label',
			array(
				'label'   => esc_html__( 'Stat 3 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Verification Turnaround',
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
					'{{WRAPPER}} .solutions-hero' => 'background: linear-gradient(135deg, {{VALUE}} 0%, {{VALUE}} 100%)',
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
					'top'    => '120',
					'right'  => '0',
					'bottom' => '120',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .solutions-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .solutions-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .solutions-title',
			)
		);

		$this->end_controls_section();

		// Subtitle Style
		$this->start_controls_section(
			'subtitle_style',
			array(
				'label' => esc_html__( 'Subtitle', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.95)',
				'selectors' => array(
					'{{WRAPPER}} .solutions-subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .solutions-subtitle',
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

		<section class="solutions-hero">
			<div class="solutions-hero-bg">
				<div class="solutions-shape shape-1"></div>
				<div class="solutions-shape shape-2"></div>
				<div class="solutions-shape shape-3"></div>
				<div class="solutions-shape shape-4"></div>
				<div class="solutions-shape shape-5"></div>
			</div>
			<div class="container">
				<div class="solutions-hero-content">
					<div class="solutions-hero-badge">
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h1 class="solutions-title">
						<?php echo esc_html( $settings['title'] ); ?>
					</h1>
					<p class="solutions-subtitle">
						<?php echo esc_html( $settings['subtitle'] ); ?>
					</p>
					<div class="solutions-stats">
						<div class="stat-item">
							<div class="stat-number-wrapper"><?php echo esc_html( $settings['stat_1_number'] ); ?></div>
							<div class="stat-label"><?php echo esc_html( $settings['stat_1_label'] ); ?></div>
						</div>
						<div class="stat-item">
							<div class="stat-number-wrapper"><?php echo esc_html( $settings['stat_2_number'] ); ?></div>
							<div class="stat-label"><?php echo esc_html( $settings['stat_2_label'] ); ?></div>
						</div>
						<div class="stat-item">
							<div class="stat-number-wrapper"><?php echo esc_html( $settings['stat_3_number'] ); ?></div>
							<div class="stat-label"><?php echo esc_html( $settings['stat_3_label'] ); ?></div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Solutions_Hero_Section_Widget() );

