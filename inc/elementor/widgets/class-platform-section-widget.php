<?php
/**
 * Elementor Platform Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Platform_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-platform-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Platform Section', 'meridian-africa' );
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
		return array( 'platform', 'capabilities', 'verification', 'sentinel', 'meridian', 'agrovue' );
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
		// Section Header
		$this->start_controls_section(
			'section_header',
			array(
				'label' => esc_html__( 'Section Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'VERIFICATION CAPABILITIES',
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'The Sentinel Six : End-to-End Agricultural Verification',
			)
		);

		$this->add_control(
			'section_description',
			array(
				'label'   => esc_html__( 'Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'End-to-end verification capabilities built on satellite remote sensing with scientifically validated methodology. Designed specifically for African agricultural systems and institutional requirements.',
			)
		);

		$this->end_controls_section();

		// Capabilities
		$this->start_controls_section(
			'capabilities_section',
			array(
				'label' => esc_html__( 'Capabilities', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'capability_number',
			array(
				'label'   => esc_html__( 'Capability Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'CAPABILITY 01',
			)
		);

		$repeater->add_control(
			'capability_icon',
			array(
				'label'   => esc_html__( 'Icon SVG Path', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z',
			)
		);

		$repeater->add_control(
			'capability_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Farm Boundary Detection',
			)
		);

		$repeater->add_control(
			'capability_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Confirms farm existence, validates declared sizes against satellite measurements, detects ghost farmers, and flags discrepancies for field investigation.',
			)
		);

		$repeater->add_control(
			'background_image',
			array(
				'label'   => esc_html__( 'Background Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => '',
				),
			)
		);

		$repeater->add_control(
			'tech_detail_1_label',
			array(
				'label'   => esc_html__( 'Tech Detail 1 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Accuracy:',
			)
		);

		$repeater->add_control(
			'tech_detail_1_value',
			array(
				'label'   => esc_html__( 'Tech Detail 1 Value', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'High precision',
			)
		);

		$repeater->add_control(
			'tech_detail_2_label',
			array(
				'label'   => esc_html__( 'Tech Detail 2 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Method:',
			)
		);

		$repeater->add_control(
			'tech_detail_2_value',
			array(
				'label'   => esc_html__( 'Tech Detail 2 Value', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Boundary detection',
			)
		);

		$repeater->add_control(
			'enable_shimmer',
			array(
				'label'        => esc_html__( 'Enable Shimmer Effect', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$repeater->add_control(
			'modal_capability_id',
			array(
				'label'   => esc_html__( 'Modal Capability ID', 'meridian-africa' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 10,
			)
		);

		// Modal Content Section
		$repeater->add_control(
			'modal_content_heading',
			array(
				'label'     => esc_html__( 'Modal Content', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'modal_title',
			array(
				'label'   => esc_html__( 'Modal Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Field Boundary Detection',
			)
		);

		$repeater->add_control(
			'modal_subtitle',
			array(
				'label'   => esc_html__( 'Modal Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Precision mapping for agricultural intelligence',
			)
		);

		$repeater->add_control(
			'modal_header_image',
			array(
				'label'   => esc_html__( 'Modal Header Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => '',
				),
			)
		);

		$repeater->add_control(
			'modal_section1_title',
			array(
				'label'   => esc_html__( 'Modal Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Advanced Satellite Technology',
			)
		);

		$repeater->add_control(
			'modal_section1_description',
			array(
				'label'   => esc_html__( 'Modal Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Our platform utilizes cutting-edge satellite imagery and AI-powered algorithms to automatically detect and map field boundaries with exceptional accuracy.',
			)
		);

		$this->add_control(
			'capabilities',
			array(
				'label'       => esc_html__( 'Capabilities List', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $this->get_default_capabilities(),
				'title_field' => '{{{ capability_title }}}',
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
			'section_background',
			array(
				'label'     => esc_html__( 'Section Background', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .platform' => 'background: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get default capabilities.
	 *
	 * @since 1.0.0
	 * @return array Default capabilities.
	 */
	private function get_default_capabilities() {
		return array(
			array(
				'capability_number'           => 'CAPABILITY 01',
				'capability_icon'             => 'M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z',
				'capability_title'            => 'Farm Boundary Detection',
				'capability_description'      => 'Confirms farm existence, validates declared sizes against satellite measurements, detects ghost farmers, and flags discrepancies for field investigation. Processes large-scale programs efficiently.',
				'tech_detail_1_label'         => 'Accuracy:',
				'tech_detail_1_value'         => 'High precision',
				'tech_detail_2_label'         => 'Method:',
				'tech_detail_2_value'         => 'Boundary detection',
				'enable_shimmer'              => 'yes',
				'modal_capability_id'         => 1,
				'modal_title'                 => 'Field Boundary Detection',
				'modal_subtitle'              => 'Precision mapping for agricultural intelligence',
				'modal_section1_title'        => 'Advanced Satellite Technology',
				'modal_section1_description'  => 'Our platform utilizes cutting-edge satellite imagery and AI-powered algorithms to automatically detect and map field boundaries with exceptional accuracy. This technology enables precise farm area measurement, eliminates manual surveying costs, and provides reliable data for subsidy verification and agricultural program management across diverse landscapes.',
			),
			array(
				'capability_number'           => 'CAPABILITY 02',
				'capability_icon'             => 'M12 3V6M12 18V21M4.22 4.22L6.34 6.34M17.66 17.66L19.78 19.78M1 12H4M20 12H23M4.22 19.78L6.34 17.66M17.66 6.34L19.78 4.22',
				'capability_title'            => 'Crop Type Classification',
				'capability_description'      => 'Identifies crop types across African agricultural systems including maize, cassava, sorghum, rice, millet, yams, and groundnuts. Detects intercropping patterns common in smallholder systems.',
				'tech_detail_1_label'         => 'Method:',
				'tech_detail_1_value'         => 'Machine learning',
				'tech_detail_2_label'         => 'Validation:',
				'tech_detail_2_value'         => 'Ground truth',
				'enable_shimmer'              => 'yes',
				'modal_capability_id'         => 2,
				'modal_title'                 => 'Crop Type Classification',
				'modal_subtitle'              => 'AI-powered crop identification at scale',
				'modal_section1_title'        => 'Machine Learning Excellence',
				'modal_section1_description'  => 'Leverage advanced machine learning models trained on African agricultural systems to accurately identify crop types including maize, cassava, sorghum, rice, millet, yams, and groundnuts. Our system detects intercropping patterns common in smallholder farming, providing unprecedented visibility into agricultural diversity. Every classification is validated against extensive ground truth data collected across multiple growing seasons and agro-ecological zones.',
			),
			array(
				'capability_number'           => 'CAPABILITY 03',
				'capability_icon'             => 'M22 12H18L15 21L9 3L6 12H2',
				'capability_title'            => 'Crop Health Monitoring',
				'capability_description'      => 'Tracks vegetation indices throughout the growing season. Provides early warning for drought stress, pest outbreaks, and crop failure. Enables targeted extension services.',
				'tech_detail_1_label'         => 'Updates:',
				'tech_detail_1_value'         => 'Every 5 days',
				'tech_detail_2_label'         => 'Alerts:',
				'tech_detail_2_value'         => 'Real-time detection',
				'enable_shimmer'              => 'yes',
				'modal_capability_id'         => 3,
				'modal_title'                 => 'Crop Health Monitoring',
				'modal_subtitle'              => 'Real-time vegetation health tracking',
				'modal_section1_title'        => 'Continuous Monitoring',
				'modal_section1_description'  => 'Track vegetation indices throughout the growing season with updates every 5 days. Our system provides early warning for drought stress, pest outbreaks, and crop failure, enabling targeted extension services and timely interventions that protect farmer livelihoods and program investments. Transform satellite data into actionable insights for agricultural extension officers, program managers, and policymakers.',
			),
			array(
				'capability_number'           => 'CAPABILITY 04',
				'capability_icon'             => 'M18 20V10M12 20V4M6 20V14',
				'capability_title'            => 'Yield Prediction',
				'capability_description'      => 'Predicts farm-level and aggregated yields pre-harvest. Informs food security planning, import strategies, and price stabilization policies based on satellite-derived indicators.',
				'tech_detail_1_label'         => 'Timing:',
				'tech_detail_1_value'         => 'Pre-harvest',
				'tech_detail_2_label'         => 'Method:',
				'tech_detail_2_value'         => 'Predictive modeling',
				'enable_shimmer'              => '',
				'modal_capability_id'         => 4,
				'modal_title'                 => 'Yield Prediction',
				'modal_subtitle'              => 'Pre-harvest yield forecasting for planning',
				'modal_section1_title'        => 'Predictive Analytics',
				'modal_section1_description'  => 'Predict farm-level and aggregated yields pre-harvest using satellite-derived indicators and advanced modeling techniques. Our predictions inform food security planning, import strategies, and price stabilization policies, helping governments and institutions make data-driven decisions. Early yield predictions enable proactive risk management and resource allocation.',
			),
			array(
				'capability_number'           => 'CAPABILITY 05',
				'capability_icon'             => 'M8 2V5M16 2V5M3.5 9.09H20.5M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z',
				'capability_title'            => 'Planting/Harvest Dates',
				'capability_description'      => 'Automatically detects planting and harvest dates through vegetation pattern analysis. Verifies compliance with program timing requirements and tracks phenological shifts.',
				'tech_detail_1_label'         => 'Method:',
				'tech_detail_1_value'         => 'Pattern analysis',
				'tech_detail_2_label'         => 'Application:',
				'tech_detail_2_value'         => 'Compliance',
				'enable_shimmer'              => '',
				'modal_capability_id'         => 5,
				'modal_title'                 => 'Planting/Harvest Dates',
				'modal_subtitle'              => 'Automated phenological tracking',
				'modal_section1_title'        => 'Pattern Analysis',
				'modal_section1_description'  => 'Automatically detect planting and harvest dates through vegetation pattern analysis. Our system verifies compliance with program timing requirements, tracks phenological shifts due to climate change, and provides insights into farmer behavior and agricultural practices. Ensure program participants meet timing requirements without costly field visits.',
			),
			array(
				'capability_number'           => 'CAPABILITY 06',
				'capability_icon'             => 'M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z',
				'capability_title'            => 'Rangeland Management',
				'capability_description'      => 'Estimates forage biomass, calculates grazing capacity, classifies drought severity, and maps water point availability. Critical for pastoral early warning systems.',
				'tech_detail_1_label'         => 'Coverage:',
				'tech_detail_1_value'         => 'Regional scale',
				'tech_detail_2_label'         => 'Use:',
				'tech_detail_2_value'         => 'Early warning',
				'enable_shimmer'              => '',
				'modal_capability_id'         => 6,
				'modal_title'                 => 'Rangeland Management',
				'modal_subtitle'              => 'Pastoral early warning and resource monitoring',
				'modal_section1_title'        => 'Comprehensive Monitoring',
				'modal_section1_description'  => 'Estimate forage biomass, calculate grazing capacity, classify drought severity, and map water point availability across vast rangeland areas. Our system provides critical information for pastoral communities, enabling informed decisions about livestock movement and resource management. Support pastoral communities with timely information on rangeland conditions and forage availability.',
			),
		);
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Enqueue the platform section assets
		wp_enqueue_style( 'meridian-platform-section' );
		wp_enqueue_script( 'meridian-platform-section' );
		?>

		<section id="platform" class="platform">
			<div class="platform-background-shapes">
				<div class="shape shape-1"></div>
				<div class="shape shape-2"></div>
				<div class="shape shape-3"></div>
			</div>
			<div class="container">
				<div class="section-header" data-aos="fade-up">
					<div class="badge-pill">
						<span class="badge-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
						<?php echo esc_html( $settings['badge_text'] ); ?>
					</div>
					<h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
					<p><?php echo esc_html( $settings['section_description'] ); ?></p>
				</div>
				<div class="platform-grid">
					<?php
					if ( ! empty( $settings['capabilities'] ) ) {
						$delay = 100;
						foreach ( $settings['capabilities'] as $index => $capability ) {
							$capability_id = ! empty( $capability['modal_capability_id'] ) ? $capability['modal_capability_id'] : ( $index + 1 );
							$bg_image_url  = ! empty( $capability['background_image']['url'] ) ? $capability['background_image']['url'] : '';
							?>
							<div class="platform-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>" data-capability="<?php echo esc_attr( $capability_id ); ?>">
								<?php if ( 'yes' === $capability['enable_shimmer'] ) : ?>
									<div class="card-shimmer"></div>
								<?php endif; ?>
								<div class="card-corner-accent"></div>
								<?php if ( $bg_image_url ) : ?>
									<div class="card-background-image" style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>');"></div>
								<?php endif; ?>
								<div class="card-content-verification">
									<div class="capability-header">
										<div class="capability-number"><?php echo esc_html( $capability['capability_number'] ); ?></div>
										<div class="capability-icon">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="<?php echo esc_attr( $capability['capability_icon'] ); ?>" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</div>
									</div>
									<h3><?php echo esc_html( $capability['capability_title'] ); ?></h3>
									<p><?php echo esc_html( $capability['capability_description'] ); ?></p>
									<div class="platform-technical">
										<?php if ( ! empty( $capability['tech_detail_1_label'] ) && ! empty( $capability['tech_detail_1_value'] ) ) : ?>
											<div class="tech-detail">
												<span class="tech-label"><?php echo esc_html( $capability['tech_detail_1_label'] ); ?></span>
												<span class="tech-value"><?php echo esc_html( $capability['tech_detail_1_value'] ); ?></span>
											</div>
										<?php endif; ?>
										<?php if ( ! empty( $capability['tech_detail_2_label'] ) && ! empty( $capability['tech_detail_2_value'] ) ) : ?>
											<div class="tech-detail">
												<span class="tech-label"><?php echo esc_html( $capability['tech_detail_2_label'] ); ?></span>
												<span class="tech-value"><?php echo esc_html( $capability['tech_detail_2_value'] ); ?></span>
											</div>
										<?php endif; ?>
									</div>
									<button class="learn-more-btn" onclick="openPlatformModal(<?php echo esc_attr( $capability_id ); ?>)">
										Learn More
										<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</button>
								</div>
							</div>
							<?php
							$delay += 100;
						}
					}
					?>
				</div>
			</div>
		</section>

		<!-- Platform Modal -->
		<div id="platformModal" class="platform-modal">
			<div class="platform-modal-overlay" onclick="closePlatformModal()"></div>
			<div class="platform-modal-content">
				<button class="platform-modal-close" onclick="closePlatformModal()">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				<div class="platform-modal-header">
					<div class="modal-header-image" id="modalHeaderImage"></div>
					<div class="modal-header-overlay">
						<h2 id="modalTitle"></h2>
						<p id="modalSubtitle"></p>
					</div>
				</div>
				<div class="platform-modal-body">
					<div class="modal-section">
						<h3 id="modalSectionTitle1"></h3>
						<p id="modalDescription1"></p>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			// Pass modal data from PHP to JavaScript
			window.platformModalDataFromElementor = window.platformModalDataFromElementor || {};
			<?php
			if ( ! empty( $settings['capabilities'] ) ) {
				foreach ( $settings['capabilities'] as $index => $capability ) {
					$capability_id = ! empty( $capability['modal_capability_id'] ) ? $capability['modal_capability_id'] : ( $index + 1 );

					// Prepare modal data
					$modal_data = array(
						'title'                => ! empty( $capability['modal_title'] ) ? $capability['modal_title'] : $capability['capability_title'],
						'subtitle'             => ! empty( $capability['modal_subtitle'] ) ? $capability['modal_subtitle'] : '',
						'headerImage'          => ! empty( $capability['modal_header_image']['url'] ) ? $capability['modal_header_image']['url'] : '',
						'section1Title'        => ! empty( $capability['modal_section1_title'] ) ? $capability['modal_section1_title'] : '',
						'section1Description'  => ! empty( $capability['modal_section1_description'] ) ? $capability['modal_section1_description'] : '',
					);
					?>
					window.platformModalDataFromElementor[<?php echo esc_js( $capability_id ); ?>] = <?php echo wp_json_encode( $modal_data ); ?>;
					<?php
				}
			}
			?>
		</script>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Platform_Section_Widget() );

