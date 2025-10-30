<?php
/**
 * Elementor Industries We Serve Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Industries_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-industries-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Industries We Serve Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
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
		return array( 'industries', 'serve', 'agriculture', 'insurance', 'compliance', 'policy', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_header_controls();
		$this->register_policy_card_controls();
		$this->register_agriculture_card_controls();
		$this->register_insurance_card_controls();
		$this->register_compliance_card_controls();
	}

	/**
	 * Register header controls.
	 *
	 * @since 1.0.0
	 */
	private function register_header_controls() {
		$this->start_controls_section(
			'header_section',
			array(
				'label' => esc_html__( 'Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'section_label',
			array(
				'label'   => esc_html__( 'Section Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Daily Satellite Data Analytics',
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Industries We Serve',
			)
		);

		$this->add_control(
			'section_description',
			array(
				'label'   => esc_html__( 'Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We help a wide range of industries and businesses drive innovation, sustainability and efficiency.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Policy & Compliance card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_policy_card_controls() {
		$this->start_controls_section(
			'policy_card_section',
			array(
				'label' => esc_html__( 'Policy & Compliance Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'policy_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-landmark',
			)
		);

		$this->add_control(
			'policy_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Policy Compliance & Verification',
			)
		);

		$this->add_control(
			'policy_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '(CAP, LPIS, IACS)',
			)
		);

		$this->add_control(
			'policy_brief',
			array(
				'label'   => esc_html__( 'Brief Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Support evidence-based policy implementation through continuous CAP compliance monitoring.',
			)
		);

		$this->add_control(
			'policy_list_items',
			array(
				'label'   => esc_html__( 'List Items (one per line)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => "Crop-type mapping for compliance checks\nAutomated parcel verification and control\nYield analysis for policy performance monitoring\nDetection of land-use change and eligibility verification",
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Agriculture card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_agriculture_card_controls() {
		$this->start_controls_section(
			'agriculture_card_section',
			array(
				'label' => esc_html__( 'Agriculture Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'agriculture_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-seedling',
			)
		);

		$this->add_control(
			'agriculture_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Agriculture',
			)
		);

		$this->add_control(
			'agriculture_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$this->add_control(
			'agriculture_brief',
			array(
				'label'   => esc_html__( 'Brief Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Meridian Sentinel helps agricultural players increase efficiency, reduce costs, and make data-driven decisions.',
			)
		);

		$this->add_control(
			'agriculture_list_items',
			array(
				'label'   => esc_html__( 'List Items (one per line)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => "Precision field mapping and management zones\nCrop identification and seasonal monitoring\nPrecision spraying and planting\nFarm digitalization and advisory tools\nYield forecasting and performance benchmarking",
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Insurance card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_insurance_card_controls() {
		$this->start_controls_section(
			'insurance_card_section',
			array(
				'label' => esc_html__( 'Insurance Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'insurance_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-alt',
			)
		);

		$this->add_control(
			'insurance_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Insurance',
			)
		);

		$this->add_control(
			'insurance_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$this->add_control(
			'insurance_brief',
			array(
				'label'   => esc_html__( 'Brief Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Meridian Sentinel delivers high-resolution, satellite-based intelligence to reduce costs, delays, and uncertainty.',
			)
		);

		$this->add_control(
			'insurance_list_items',
			array(
				'label'   => esc_html__( 'List Items (one per line)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => "Automated parcel identification during claims\nCrop-type and yield verification for policy validation\nDamage detection after extreme weather events\nPortfolio risk monitoring across regions",
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Compliance card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_compliance_card_controls() {
		$this->start_controls_section(
			'compliance_card_section',
			array(
				'label' => esc_html__( 'Compliance Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'compliance_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-globe-africa',
			)
		);

		$this->add_control(
			'compliance_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliance',
			)
		);

		$this->add_control(
			'compliance_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '(Global Monitoring & Verification)',
			)
		);

		$this->add_control(
			'compliance_brief',
			array(
				'label'   => esc_html__( 'Brief Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Ensure transparency and traceability with AI-powered global monitoring and field-level verification at scale.',
			)
		);

		$this->add_control(
			'compliance_list_items',
			array(
				'label'   => esc_html__( 'List Items (one per line)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => "Land-use change and deforestation monitoring\nVerification of crop origin and sourcing compliance\nTraceability and reporting for sustainability standards\nContinuous monitoring of regenerative practices\nShip and vessel activity detection",
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
		<section id="industries" class="industries-compact">
			<div class="industries-bg-pattern"></div>

			<div class="container">
				<div class="industries-header-compact">
					<span class="industries-label"><?php echo esc_html( $settings['section_label'] ); ?></span>
					<h2 class="industries-main-title"><?php echo esc_html( $settings['section_title'] ); ?></h2>
					<p class="industries-description"><?php echo esc_html( $settings['section_description'] ); ?></p>
				</div>

				<div class="industries-cards-wrapper">
					<!-- Policy & Compliance Card -->
					<div class="industry-compact-card" data-aos="fade-up" data-aos-delay="100">
						<div class="card-top-border border-purple"></div>
						<div class="industry-card-header">
							<div class="industry-icon icon-purple">
								<i class="<?php echo esc_attr( $settings['policy_icon'] ); ?>"></i>
							</div>
							<div class="industry-title-group">
								<h3><?php echo esc_html( $settings['policy_title'] ); ?></h3>
								<?php if ( ! empty( $settings['policy_subtitle'] ) ) : ?>
									<span class="industry-subtitle"><?php echo esc_html( $settings['policy_subtitle'] ); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<p class="industry-brief"><?php echo esc_html( $settings['policy_brief'] ); ?></p>
						<ul class="industry-list">
							<?php
							$policy_items = explode( "\n", $settings['policy_list_items'] );
							foreach ( $policy_items as $item ) {
								$item = trim( $item );
								if ( ! empty( $item ) ) {
									echo '<li><i class="fas fa-check"></i> ' . esc_html( $item ) . '</li>';
								}
							}
							?>
						</ul>
					</div>

					<!-- Agriculture Card -->
					<div class="industry-compact-card" data-aos="fade-up" data-aos-delay="200">
						<div class="card-top-border border-green"></div>
						<div class="industry-card-header">
							<div class="industry-icon icon-green">
								<i class="<?php echo esc_attr( $settings['agriculture_icon'] ); ?>"></i>
							</div>
							<div class="industry-title-group">
								<h3><?php echo esc_html( $settings['agriculture_title'] ); ?></h3>
								<?php if ( ! empty( $settings['agriculture_subtitle'] ) ) : ?>
									<span class="industry-subtitle"><?php echo esc_html( $settings['agriculture_subtitle'] ); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<p class="industry-brief"><?php echo esc_html( $settings['agriculture_brief'] ); ?></p>
						<ul class="industry-list">
							<?php
							$agriculture_items = explode( "\n", $settings['agriculture_list_items'] );
							foreach ( $agriculture_items as $item ) {
								$item = trim( $item );
								if ( ! empty( $item ) ) {
									echo '<li><i class="fas fa-check"></i> ' . esc_html( $item ) . '</li>';
								}
							}
							?>
						</ul>
					</div>

				<!-- Insurance Card -->
				<div class="industry-compact-card" data-aos="fade-up" data-aos-delay="300">
					<div class="card-top-border border-red"></div>
					<div class="industry-card-header">
						<div class="industry-icon icon-red">
							<i class="<?php echo esc_attr( $settings['insurance_icon'] ); ?>"></i>
						</div>
						<div class="industry-title-group">
							<h3><?php echo esc_html( $settings['insurance_title'] ); ?></h3>
							<?php if ( ! empty( $settings['insurance_subtitle'] ) ) : ?>
								<span class="industry-subtitle"><?php echo esc_html( $settings['insurance_subtitle'] ); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<p class="industry-brief"><?php echo esc_html( $settings['insurance_brief'] ); ?></p>
					<ul class="industry-list">
						<?php
						$insurance_items = explode( "\n", $settings['insurance_list_items'] );
						foreach ( $insurance_items as $item ) {
							$item = trim( $item );
							if ( ! empty( $item ) ) {
								echo '<li><i class="fas fa-check"></i> ' . esc_html( $item ) . '</li>';
							}
						}
						?>
					</ul>
				</div>

				<!-- Compliance Card -->
				<div class="industry-compact-card" data-aos="fade-up" data-aos-delay="400">
					<div class="card-top-border border-amber"></div>
					<div class="industry-card-header">
						<div class="industry-icon icon-amber">
							<i class="<?php echo esc_attr( $settings['compliance_icon'] ); ?>"></i>
						</div>
						<div class="industry-title-group">
							<h3><?php echo esc_html( $settings['compliance_title'] ); ?></h3>
							<?php if ( ! empty( $settings['compliance_subtitle'] ) ) : ?>
								<span class="industry-subtitle"><?php echo esc_html( $settings['compliance_subtitle'] ); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<p class="industry-brief"><?php echo esc_html( $settings['compliance_brief'] ); ?></p>
					<ul class="industry-list">
						<?php
						$compliance_items = explode( "\n", $settings['compliance_list_items'] );
						foreach ( $compliance_items as $item ) {
							$item = trim( $item );
							if ( ! empty( $item ) ) {
								echo '<li><i class="fas fa-check"></i> ' . esc_html( $item ) . '</li>';
							}
						}
						?>
					</ul>
				</div>
			</div>

		</div>
	</section>
	<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Industries_Section_Widget() );
