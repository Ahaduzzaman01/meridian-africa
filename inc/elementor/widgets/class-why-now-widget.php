<?php
/**
 * Elementor Why Satellite Verification Now Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Why_Now_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-why-now';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Why Satellite Verification Now', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-time-line';
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
		return array( 'why', 'now', 'timing', 'satellite', 'verification', 'meridian', 'agrovue' );
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
		// Header Section
		$this->start_controls_section(
			'header_section',
			array(
				'label' => esc_html__( 'Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'MARKET TIMING',
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Why Satellite Verification Now?',
			)
		);

		$this->add_control(
			'section_description',
			array(
				'label'   => esc_html__( 'Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'The convergence of technology maturation, policy momentum, donor requirements, and political pressure creates an unprecedented opportunity for transformation.',
			)
		);

		$this->end_controls_section();

		// Card 1 - Technology Maturation
		$this->start_controls_section(
			'card_1_section',
			array(
				'label' => esc_html__( 'Card 1 - Technology Maturation', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'card_1_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-satellite',
			)
		);

		$this->add_control(
			'card_1_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Technology Maturation',
			)
		);

		$this->add_control(
			'card_1_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'Sentinel-2 satellites provide free 10-meter resolution imagery every 5 days globally. Cloud-based processing platforms democratize planetary-scale analysis. Machine learning achieves operational accuracy thresholds for deployment.',
			)
		);

		$this->add_control(
			'card_1_status',
			array(
				'label'   => esc_html__( 'Status Badge', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Ready for Production',
			)
		);

		$this->end_controls_section();

		// Card 2 - Policy Momentum
		$this->start_controls_section(
			'card_2_section',
			array(
				'label' => esc_html__( 'Card 2 - Policy Momentum', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'card_2_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-landmark',
			)
		);

		$this->add_control(
			'card_2_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Policy Momentum',
			)
		);

		$this->add_control(
			'card_2_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'AU Digital Transformation Strategy (2020-2030) prioritizes agricultural digitization. CAADP Malabo Declaration mandates transparency and accountability. National digital agriculture strategies require technology adoption.',
			)
		);

		$this->add_control(
			'card_2_status',
			array(
				'label'   => esc_html__( 'Status Badge', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Continental Alignment',
			)
		);

		$this->end_controls_section();

		// Card 3 - Donor Requirements
		$this->start_controls_section(
			'card_3_section',
			array(
				'label' => esc_html__( 'Card 3 - Donor Requirements', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'card_3_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-alt',
			)
		);

		$this->add_control(
			'card_3_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Donor Requirements',
			)
		);

		$this->add_control(
			'card_3_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'World Bank increasingly requires satellite-based M&E for agricultural projects. AfDB digital agriculture strategies mandate technology integration. Bilateral agencies prioritize results-based financing with verification.',
			)
		);

		$this->add_control(
			'card_3_status',
			array(
				'label'   => esc_html__( 'Status Badge', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Institutional Mandate',
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
		// Section Style
		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Section', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .why-now' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
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

		<!-- Why Satellite Verification Now Section -->
		<section id="why-now" class="why-now">
			<div class="container">
				<div class="why-now-header">
					<div class="why-now-badge">
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
					<p><?php echo esc_html( $settings['section_description'] ); ?></p>
				</div>
				<div class="why-now-grid">
					<div class="why-now-card">
						<div class="why-now-icon">
							<i class="<?php echo esc_attr( $settings['card_1_icon'] ); ?>"></i>
						</div>
						<h3><?php echo esc_html( $settings['card_1_title'] ); ?></h3>
						<p class="why-now-description">
							<?php echo esc_html( $settings['card_1_description'] ); ?>
						</p>
						<div class="why-now-status">
							<span class="status-badge"><?php echo esc_html( $settings['card_1_status'] ); ?></span>
						</div>
					</div>

					<div class="why-now-card">
						<div class="why-now-icon">
							<i class="<?php echo esc_attr( $settings['card_2_icon'] ); ?>"></i>
						</div>
						<h3><?php echo esc_html( $settings['card_2_title'] ); ?></h3>
						<p class="why-now-description">
							<?php echo esc_html( $settings['card_2_description'] ); ?>
						</p>
						<div class="why-now-status">
							<span class="status-badge"><?php echo esc_html( $settings['card_2_status'] ); ?></span>
						</div>
					</div>

					<div class="why-now-card">
						<div class="why-now-icon">
							<i class="<?php echo esc_attr( $settings['card_3_icon'] ); ?>"></i>
						</div>
						<h3><?php echo esc_html( $settings['card_3_title'] ); ?></h3>
						<p class="why-now-description">
							<?php echo esc_html( $settings['card_3_description'] ); ?>
						</p>
						<div class="why-now-status">
							<span class="status-badge"><?php echo esc_html( $settings['card_3_status'] ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Why_Now_Widget() );

