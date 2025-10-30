<?php
/**
 * Elementor Data Governance Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Data_Governance_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-data-governance-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Data Governance Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-lock-user';
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
		return array( 'data', 'governance', 'sovereignty', 'security', 'ownership', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_header_controls();
		$this->register_pillar_ownership_controls();
		$this->register_pillar_sovereignty_controls();
		$this->register_pillar_security_controls();
		$this->register_trust_indicators_controls();
	}

	/**
	 * Register header controls.
	 *
	 * @since 1.0.0
	 */
	private function register_header_controls() {
		// Header Section
		$this->start_controls_section(
			'header_section',
			array(
				'label' => esc_html__( 'Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-check',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'DATA GOVERNANCE',
			)
		);

		$this->add_control(
			'main_title',
			array(
				'label'   => esc_html__( 'Main Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Your Data. Your Control. Your Sovereignty.',
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Complete data ownership with flexible deployment options to meet institutional requirements and data sovereignty needs.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register ownership pillar controls.
	 *
	 * @since 1.0.0
	 */
	private function register_pillar_ownership_controls() {
		$this->start_controls_section(
			'pillar_ownership_section',
			array(
				'label' => esc_html__( 'Pillar 1: Ownership', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'ownership_image',
			array(
				'label'   => esc_html__( 'Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/Data_Ownership.png',
				),
			)
		);

		$this->add_control(
			'ownership_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-building',
			)
		);

		$this->add_control(
			'ownership_label',
			array(
				'label'   => esc_html__( 'Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'OWNERSHIP',
			)
		);

		$this->add_control(
			'ownership_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '100% Government Ownership',
			)
		);

		$this->add_control(
			'ownership_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'Government owns all data—beneficiary lists, GPS coordinates, verification results. Meridian Sentinel is a processor, not an owner. Data never sold, commercialized, or shared with third parties.',
			)
		);

		$this->add_control(
			'ownership_feature_1',
			array(
				'label'   => esc_html__( 'Feature 1', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Complete data ownership',
			)
		);

		$this->add_control(
			'ownership_feature_2',
			array(
				'label'   => esc_html__( 'Feature 2', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'No commercialization',
			)
		);

		$this->add_control(
			'ownership_feature_3',
			array(
				'label'   => esc_html__( 'Feature 3', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Full transparency',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register sovereignty pillar controls.
	 *
	 * @since 1.0.0
	 */
	private function register_pillar_sovereignty_controls() {
		$this->start_controls_section(
			'pillar_sovereignty_section',
			array(
				'label' => esc_html__( 'Pillar 2: Sovereignty', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'sovereignty_image',
			array(
				'label'   => esc_html__( 'Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/development.png',
				),
			)
		);

		$this->add_control(
			'sovereignty_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-server',
			)
		);

		$this->add_control(
			'sovereignty_label',
			array(
				'label'   => esc_html__( 'Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'SOVEREIGNTY',
			)
		);

		$this->add_control(
			'sovereignty_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Deployment Flexibility',
			)
		);

		$this->add_control(
			'sovereignty_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'Standard cloud deployment, Africa-hosted option (AWS Cape Town where data never leaves continent), or complete on-premise deployment in government data center. Choose what fits your requirements.',
			)
		);

		$this->add_control(
			'sovereignty_feature_1',
			array(
				'label'   => esc_html__( 'Feature 1', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Cloud or on-premise',
			)
		);

		$this->add_control(
			'sovereignty_feature_2',
			array(
				'label'   => esc_html__( 'Feature 2', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Africa-hosted options',
			)
		);

		$this->add_control(
			'sovereignty_feature_3',
			array(
				'label'   => esc_html__( 'Feature 3', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data residency control',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register security pillar controls.
	 *
	 * @since 1.0.0
	 */
	private function register_pillar_security_controls() {
		$this->start_controls_section(
			'pillar_security_section',
			array(
				'label' => esc_html__( 'Pillar 3: Security', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'security_image',
			array(
				'label'   => esc_html__( 'Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/Enterprise_Security.png',
				),
			)
		);

		$this->add_control(
			'security_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-lock',
			)
		);

		$this->add_control(
			'security_label',
			array(
				'label'   => esc_html__( 'Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'SECURITY',
			)
		);

		$this->add_control(
			'security_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Enterprise Security',
			)
		);

		$this->add_control(
			'security_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'AES-256 encryption, TLS 1.3, role-based access control, multi-factor authentication, immutable audit logs. Compliant with international data protection standards.',
			)
		);

		$this->add_control(
			'security_feature_1',
			array(
				'label'   => esc_html__( 'Feature 1', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Military-grade encryption',
			)
		);

		$this->add_control(
			'security_feature_2',
			array(
				'label'   => esc_html__( 'Feature 2', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Multi-factor authentication',
			)
		);

		$this->add_control(
			'security_feature_3',
			array(
				'label'   => esc_html__( 'Feature 3', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliance certified',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register trust indicators controls.
	 *
	 * @since 1.0.0
	 */
	private function register_trust_indicators_controls() {
		$this->start_controls_section(
			'trust_indicators_section',
			array(
				'label' => esc_html__( 'Trust Indicators', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Trust Indicator 1
		$this->add_control(
			'trust_1_icon',
			array(
				'label'   => esc_html__( 'Indicator 1 Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-virus',
			)
		);

		$this->add_control(
			'trust_1_label',
			array(
				'label'   => esc_html__( 'Indicator 1 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'GDPR',
			)
		);

		$this->add_control(
			'trust_1_sublabel',
			array(
				'label'   => esc_html__( 'Indicator 1 Sublabel', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliant',
			)
		);

		// Trust Indicator 2
		$this->add_control(
			'trust_2_icon',
			array(
				'label'   => esc_html__( 'Indicator 2 Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-user-shield',
			)
		);

		$this->add_control(
			'trust_2_label',
			array(
				'label'   => esc_html__( 'Indicator 2 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'SOC 2',
			)
		);

		$this->add_control(
			'trust_2_sublabel',
			array(
				'label'   => esc_html__( 'Indicator 2 Sublabel', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Type II',
			)
		);

		// Trust Indicator 3
		$this->add_control(
			'trust_3_icon',
			array(
				'label'   => esc_html__( 'Indicator 3 Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-globe-africa',
			)
		);

		$this->add_control(
			'trust_3_label',
			array(
				'label'   => esc_html__( 'Indicator 3 Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Africa Data',
			)
		);

		$this->add_control(
			'trust_3_sublabel',
			array(
				'label'   => esc_html__( 'Indicator 3 Sublabel', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Residency',
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

		<!-- Data Governance Section -->
		<section class="data-sovereignty-premium">
			<div class="container">
				<div class="sovereignty-header-zone">
					<div class="sovereignty-badge-elite">
						<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2 class="sovereignty-hero-title"><?php echo esc_html( $settings['main_title'] ); ?></h2>
					<p class="sovereignty-hero-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p>
				</div>

				<div class="sovereignty-pillars-grid">
					<!-- Ownership Pillar -->
					<div class="sovereignty-pillar-card pillar-ownership">
						<div class="pillar-glow-effect"></div>
						<div class="pillar-image-container">
							<img src="<?php echo esc_url( $settings['ownership_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['ownership_title'] ); ?>" class="pillar-visual">
							<div class="pillar-overlay-gradient"></div>
						</div>
						<div class="pillar-content-zone">
							<div class="pillar-label-tag">
								<i class="<?php echo esc_attr( $settings['ownership_icon'] ); ?>"></i>
								<span><?php echo esc_html( $settings['ownership_label'] ); ?></span>
							</div>
							<h3 class="pillar-headline"><?php echo esc_html( $settings['ownership_title'] ); ?></h3>
							<div class="pillar-description-box">
								<p><?php echo esc_html( $settings['ownership_description'] ); ?></p>
							</div>
							<div class="pillar-features-list">
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['ownership_feature_1'] ); ?></span>
								</div>
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['ownership_feature_2'] ); ?></span>
								</div>
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['ownership_feature_3'] ); ?></span>
								</div>
							</div>
						</div>
					</div>

					<!-- Sovereignty Pillar -->
					<div class="sovereignty-pillar-card pillar-deployment">
						<div class="pillar-glow-effect"></div>
						<div class="pillar-image-container">
							<img src="<?php echo esc_url( $settings['sovereignty_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['sovereignty_title'] ); ?>" class="pillar-visual">
							<div class="pillar-overlay-gradient"></div>
						</div>
						<div class="pillar-content-zone">
							<div class="pillar-label-tag">
								<i class="<?php echo esc_attr( $settings['sovereignty_icon'] ); ?>"></i>
								<span><?php echo esc_html( $settings['sovereignty_label'] ); ?></span>
							</div>
							<h3 class="pillar-headline"><?php echo esc_html( $settings['sovereignty_title'] ); ?></h3>
							<div class="pillar-description-box">
								<p><?php echo esc_html( $settings['sovereignty_description'] ); ?></p>
							</div>
							<div class="pillar-features-list">
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['sovereignty_feature_1'] ); ?></span>
								</div>
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['sovereignty_feature_2'] ); ?></span>
								</div>
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['sovereignty_feature_3'] ); ?></span>
								</div>
							</div>
						</div>
					</div>

					<!-- Security Pillar -->
					<div class="sovereignty-pillar-card pillar-security">
						<div class="pillar-glow-effect"></div>
						<div class="pillar-image-container">
							<img src="<?php echo esc_url( $settings['security_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['security_title'] ); ?>" class="pillar-visual">
							<div class="pillar-overlay-gradient"></div>
						</div>
						<div class="pillar-content-zone">
							<div class="pillar-label-tag">
								<i class="<?php echo esc_attr( $settings['security_icon'] ); ?>"></i>
								<span><?php echo esc_html( $settings['security_label'] ); ?></span>
							</div>
							<h3 class="pillar-headline"><?php echo esc_html( $settings['security_title'] ); ?></h3>
							<div class="pillar-description-box">
								<p><?php echo esc_html( $settings['security_description'] ); ?></p>
							</div>
							<div class="pillar-features-list">
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['security_feature_1'] ); ?></span>
								</div>
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['security_feature_2'] ); ?></span>
								</div>
								<div class="feature-check-item">
									<i class="fas fa-check-circle"></i>
									<span><?php echo esc_html( $settings['security_feature_3'] ); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Trust Indicators -->
				<div class="sovereignty-trust-bar">
					<div class="trust-indicator-item">
						<div class="trust-icon">
							<i class="<?php echo esc_attr( $settings['trust_1_icon'] ); ?>"></i>
						</div>
						<div class="trust-text">
							<span class="trust-label"><?php echo esc_html( $settings['trust_1_label'] ); ?></span>
							<span class="trust-sublabel"><?php echo esc_html( $settings['trust_1_sublabel'] ); ?></span>
						</div>
					</div>
					<div class="trust-indicator-item">
						<div class="trust-icon">
							<i class="<?php echo esc_attr( $settings['trust_2_icon'] ); ?>"></i>
						</div>
						<div class="trust-text">
							<span class="trust-label"><?php echo esc_html( $settings['trust_2_label'] ); ?></span>
							<span class="trust-sublabel"><?php echo esc_html( $settings['trust_2_sublabel'] ); ?></span>
						</div>
					</div>
					<div class="trust-indicator-item">
						<div class="trust-icon">
							<i class="<?php echo esc_attr( $settings['trust_3_icon'] ); ?>"></i>
						</div>
						<div class="trust-text">
							<span class="trust-label"><?php echo esc_html( $settings['trust_3_label'] ); ?></span>
							<span class="trust-sublabel"><?php echo esc_html( $settings['trust_3_sublabel'] ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Data_Governance_Section_Widget() );

