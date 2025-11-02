<?php
/**
 * Elementor Compliance Content Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Compliance_Content_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-compliance-content-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Compliance Content Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-text-area';
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
		return array( 'compliance', 'legal', 'content', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_sidebar_controls();
		$this->register_introduction_controls();
		$this->register_data_protection_controls();
		$this->register_agricultural_controls();
		$this->register_financial_controls();
		$this->register_team_controls();
		$this->register_contact_controls();
	}

	/**
	 * Register Sidebar Controls
	 */
	private function register_sidebar_controls() {
		$this->start_controls_section(
			'sidebar_section',
			array(
				'label' => esc_html__( 'Sidebar', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'sidebar_title',
			array(
				'label'   => esc_html__( 'Sidebar Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Legal Documents',
			)
		);

		$this->add_control(
			'sidebar_cta_title',
			array(
				'label'   => esc_html__( 'CTA Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliance Reports',
			)
		);

		$this->add_control(
			'sidebar_cta_text',
			array(
				'label'   => esc_html__( 'CTA Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Download our latest reports',
			)
		);

		$this->add_control(
			'sidebar_cta_button_text',
			array(
				'label'   => esc_html__( 'CTA Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Request Access',
			)
		);

		$this->add_control(
			'sidebar_cta_button_link',
			array(
				'label'   => esc_html__( 'CTA Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => 'contact.html',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Introduction Controls
	 */
	private function register_introduction_controls() {
		$this->start_controls_section(
			'introduction_section',
			array(
				'label' => esc_html__( 'Introduction', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'intro_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Our Compliance Commitment',
			)
		);

		$this->add_control(
			'intro_content',
			array(
				'label'   => esc_html__( 'Content', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Meridian Africa is committed to maintaining the highest standards of regulatory compliance across all jurisdictions where we operate. We understand that farmers, governments, and financial institutions require assurance that our platform meets all applicable legal and regulatory requirements.',
			)
		);

		$this->add_control(
			'intro_highlight_text',
			array(
				'label'   => esc_html__( 'Highlight Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => '<strong>Global Standards:</strong> We adhere to international best practices and local regulations to ensure our agricultural intelligence platform serves stakeholders worldwide with confidence.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Data Protection Controls
	 */
	private function register_data_protection_controls() {
		$this->start_controls_section(
			'data_protection_section',
			array(
				'label' => esc_html__( 'Data Protection Compliance', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'data_protection_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data Protection Compliance',
			)
		);

		// GDPR Card
		$this->add_control(
			'gdpr_heading',
			array(
				'label'     => esc_html__( 'GDPR (EU)', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'gdpr_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'GDPR (EU)',
			)
		);

		$this->add_control(
			'gdpr_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'General Data Protection Regulation',
			)
		);

		$this->add_control(
			'gdpr_items',
			array(
				'label'   => esc_html__( 'Compliance Items', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => "Data subject rights implementation\nPrivacy by design and default\nData processing agreements\nBreach notification procedures\nData Protection Officer appointed",
			)
		);

		$this->add_control(
			'gdpr_badge',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Fully Compliant',
			)
		);

		// NDPR Card
		$this->add_control(
			'ndpr_heading',
			array(
				'label'     => esc_html__( 'NDPR (Nigeria)', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'ndpr_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'NDPR (Nigeria)',
			)
		);

		$this->add_control(
			'ndpr_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Nigeria Data Protection Regulation',
			)
		);

		$this->add_control(
			'ndpr_items',
			array(
				'label'   => esc_html__( 'Compliance Items', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => "Registered with NITDA\nLocal data protection officer\nConsent management framework\nData localization compliance\nAnnual compliance audits",
			)
		);

		$this->add_control(
			'ndpr_badge',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Fully Compliant',
			)
		);

		// CCPA Card
		$this->add_control(
			'ccpa_heading',
			array(
				'label'     => esc_html__( 'CCPA (California)', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'ccpa_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'CCPA (California)',
			)
		);

		$this->add_control(
			'ccpa_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'California Consumer Privacy Act',
			)
		);

		$this->add_control(
			'ccpa_items',
			array(
				'label'   => esc_html__( 'Compliance Items', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => "Consumer rights portal\nDo Not Sell opt-out\nPrivacy notice requirements\nData deletion procedures\nThird-party disclosure tracking",
			)
		);

		$this->add_control(
			'ccpa_badge',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Fully Compliant',
			)
		);

		// POPIA Card
		$this->add_control(
			'popia_heading',
			array(
				'label'     => esc_html__( 'POPIA (South Africa)', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'popia_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'POPIA (South Africa)',
			)
		);

		$this->add_control(
			'popia_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Protection of Personal Information Act',
			)
		);

		$this->add_control(
			'popia_items',
			array(
				'label'   => esc_html__( 'Compliance Items', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => "Information officer designated\nProcessing conditions met\nCross-border transfer safeguards\nSecurity measures implemented\nComplaint handling procedures",
			)
		);

		$this->add_control(
			'popia_badge',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Fully Compliant',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Agricultural Controls
	 */
	private function register_agricultural_controls() {
		$this->start_controls_section(
			'agricultural_section',
			array(
				'label' => esc_html__( 'Agricultural Compliance', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'agricultural_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Agricultural Sector Compliance',
			)
		);

		$this->add_control(
			'agricultural_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'As a platform serving the agricultural sector, we comply with specific agricultural regulations and standards:',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Financial Controls
	 */
	private function register_financial_controls() {
		$this->start_controls_section(
			'financial_section',
			array(
				'label' => esc_html__( 'Financial Compliance', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'financial_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Financial Services Compliance',
			)
		);

		$this->add_control(
			'financial_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'For our banking and financial institution partners, we maintain compliance with:',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Team Controls
	 */
	private function register_team_controls() {
		$this->start_controls_section(
			'team_section',
			array(
				'label' => esc_html__( 'Compliance Team', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'team_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliance Team',
			)
		);

		$this->add_control(
			'team_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Our dedicated compliance team ensures ongoing adherence to all applicable regulations:',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Contact Controls
	 */
	private function register_contact_controls() {
		$this->start_controls_section(
			'contact_section',
			array(
				'label' => esc_html__( 'Contact Information', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'contact_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliance Inquiries',
			)
		);

		$this->add_control(
			'contact_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'For compliance-related questions or to request compliance documentation:',
			)
		);

		$this->add_control(
			'contact_email',
			array(
				'label'   => esc_html__( 'Compliance Email', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'compliance@merdianafrica.io',
			)
		);

		$this->add_control(
			'contact_dpo_email',
			array(
				'label'   => esc_html__( 'DPO Email', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'compliance@merdianafrica.io',
			)
		);

		$this->add_control(
			'contact_phone',
			array(
				'label'   => esc_html__( 'Phone Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '+447438993162',
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

		<!-- Compliance Content Section -->
		<section class="legal-content-section">
			<div class="container">
				<div class="legal-content-wrapper">
					<!-- Sidebar -->
					<aside class="legal-sidebar">
						<div class="sidebar-sticky">
							<h4><?php echo esc_html( $settings['sidebar_title'] ); ?></h4>
							<nav class="sidebar-nav">
								<a href="privacy.html" class="sidebar-link">
									<i class="fas fa-shield-alt"></i>
									Privacy Policy
								</a>
								<a href="terms.html" class="sidebar-link">
									<i class="fas fa-file-contract"></i>
									Terms of Service
								</a>
								<a href="security.html" class="sidebar-link">
									<i class="fas fa-lock"></i>
									Security
								</a>
								<a href="compliance.html" class="sidebar-link active">
									<i class="fas fa-check-circle"></i>
									Compliance
								</a>
							</nav>

							<div class="sidebar-cta">
								<i class="fas fa-file-download"></i>
								<h5><?php echo esc_html( $settings['sidebar_cta_title'] ); ?></h5>
								<p><?php echo esc_html( $settings['sidebar_cta_text'] ); ?></p>
								<?php
								$cta_link = ! empty( $settings['sidebar_cta_button_link']['url'] ) ? $settings['sidebar_cta_button_link']['url'] : 'contact.html';
								$cta_target = ! empty( $settings['sidebar_cta_button_link']['is_external'] ) ? ' target="_blank"' : '';
								$cta_nofollow = ! empty( $settings['sidebar_cta_button_link']['nofollow'] ) ? ' rel="nofollow"' : '';
								?>
								<a href="<?php echo esc_url( $cta_link ); ?>"<?php echo $cta_target . $cta_nofollow; ?> class="btn-primary btn-small"><?php echo esc_html( $settings['sidebar_cta_button_text'] ); ?></a>
							</div>
						</div>
					</aside>

					<!-- Main Content -->
					<main class="legal-main-content">
						<!-- Introduction -->
						<div class="legal-section intro-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-info-circle"></i>
								</div>
								<h2><?php echo esc_html( $settings['intro_title'] ); ?></h2>
							</div>
							<p><?php echo esc_html( $settings['intro_content'] ); ?></p>
							<div class="highlight-box">
								<i class="fas fa-seedling"></i>
								<p><?php echo wp_kses_post( $settings['intro_highlight_text'] ); ?></p>
							</div>
						</div>

						<!-- Data Protection -->
						<div id="data-protection" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-shield-alt"></i>
								</div>
								<h2><?php echo esc_html( $settings['data_protection_title'] ); ?></h2>
							</div>

							<div class="compliance-cards">
								<div class="compliance-card">
									<div class="compliance-icon">
										<i class="fas fa-flag"></i>
									</div>
									<h4><?php echo esc_html( $settings['gdpr_title'] ); ?></h4>
									<p><strong><?php echo esc_html( $settings['gdpr_subtitle'] ); ?></strong></p>
									<ul class="compliance-list">
										<?php
										$gdpr_items = explode( "\n", $settings['gdpr_items'] );
										foreach ( $gdpr_items as $item ) {
											if ( ! empty( trim( $item ) ) ) {
												echo '<li><i class="fas fa-check"></i> ' . esc_html( trim( $item ) ) . '</li>';
											}
										}
										?>
									</ul>
									<span class="compliance-badge"><?php echo esc_html( $settings['gdpr_badge'] ); ?></span>
								</div>

								<div class="compliance-card">
									<div class="compliance-icon">
										<i class="fas fa-globe-africa"></i>
									</div>
									<h4><?php echo esc_html( $settings['ndpr_title'] ); ?></h4>
									<p><strong><?php echo esc_html( $settings['ndpr_subtitle'] ); ?></strong></p>
									<ul class="compliance-list">
										<?php
										$ndpr_items = explode( "\n", $settings['ndpr_items'] );
										foreach ( $ndpr_items as $item ) {
											if ( ! empty( trim( $item ) ) ) {
												echo '<li><i class="fas fa-check"></i> ' . esc_html( trim( $item ) ) . '</li>';
											}
										}
										?>
									</ul>
									<span class="compliance-badge"><?php echo esc_html( $settings['ndpr_badge'] ); ?></span>
								</div>

								<div class="compliance-card">
									<div class="compliance-icon">
										<i class="fas fa-flag-usa"></i>
									</div>
									<h4><?php echo esc_html( $settings['ccpa_title'] ); ?></h4>
									<p><strong><?php echo esc_html( $settings['ccpa_subtitle'] ); ?></strong></p>
									<ul class="compliance-list">
										<?php
										$ccpa_items = explode( "\n", $settings['ccpa_items'] );
										foreach ( $ccpa_items as $item ) {
											if ( ! empty( trim( $item ) ) ) {
												echo '<li><i class="fas fa-check"></i> ' . esc_html( trim( $item ) ) . '</li>';
											}
										}
										?>
									</ul>
									<span class="compliance-badge"><?php echo esc_html( $settings['ccpa_badge'] ); ?></span>
								</div>

								<div class="compliance-card">
									<div class="compliance-icon">
										<i class="fas fa-globe"></i>
									</div>
									<h4><?php echo esc_html( $settings['popia_title'] ); ?></h4>
									<p><strong><?php echo esc_html( $settings['popia_subtitle'] ); ?></strong></p>
									<ul class="compliance-list">
										<?php
										$popia_items = explode( "\n", $settings['popia_items'] );
										foreach ( $popia_items as $item ) {
											if ( ! empty( trim( $item ) ) ) {
												echo '<li><i class="fas fa-check"></i> ' . esc_html( trim( $item ) ) . '</li>';
											}
										}
										?>
									</ul>
									<span class="compliance-badge"><?php echo esc_html( $settings['popia_badge'] ); ?></span>
								</div>
							</div>
						</div>

						<!-- Industry Standards -->
					   

						<!-- Agricultural Regulations -->
						<div id="agricultural-regulations" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-tractor"></i>
								</div>
								<h2><?php echo esc_html( $settings['agricultural_title'] ); ?></h2>
							</div>
							<p><?php echo esc_html( $settings['agricultural_intro'] ); ?></p>
							
							<div class="agri-compliance">
								<div class="agri-item">
									<h4><i class="fas fa-satellite"></i> Satellite Data Regulations</h4>
									<p>Compliance with international satellite data usage and distribution regulations</p>
									<ul class="legal-list">
										<li><i class="fas fa-check"></i> Copernicus Data Policy compliance</li>
										<li><i class="fas fa-check"></i> NASA Earth Data licensing</li>
										<li><i class="fas fa-check"></i> ESA data access agreements</li>
										<li><i class="fas fa-check"></i> Commercial satellite data licenses</li>
									</ul>
								</div>

								<div class="agri-item">
									<h4><i class="fas fa-leaf"></i> Agricultural Data Standards</h4>
									<p>Adherence to agricultural data collection and reporting standards</p>
									<ul class="legal-list">
										<li><i class="fas fa-check"></i> FAO agricultural statistics standards</li>
										<li><i class="fas fa-check"></i> GEOGLAM crop monitoring protocols</li>
										<li><i class="fas fa-check"></i> National agricultural census compliance</li>
										<li><i class="fas fa-check"></i> Crop classification standards</li>
									</ul>
								</div>

								<div class="agri-item">
									<h4><i class="fas fa-seedling"></i> Subsidy Verification</h4>
									<p>Compliance with government subsidy and support program requirements</p>
									<ul class="legal-list">
										<li><i class="fas fa-check"></i> Government verification protocols</li>
										<li><i class="fas fa-check"></i> Audit trail requirements</li>
										<li><i class="fas fa-check"></i> Anti-fraud measures</li>
										<li><i class="fas fa-check"></i> Reporting standards</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Financial Compliance -->
						<div id="financial-compliance" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-university"></i>
								</div>
								<h2><?php echo esc_html( $settings['financial_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['financial_intro'] ); ?></p>

							<div class="financial-compliance-grid">
								<div class="fin-compliance-card">
									<i class="fas fa-user-shield"></i>
									<h4>KYC/AML Compliance</h4>
									<p>Know Your Customer and Anti-Money Laundering procedures for financial services</p>
								</div>

								<div class="fin-compliance-card">
									<i class="fas fa-balance-scale"></i>
									<h4>Basel III Standards</h4>
									<p>Risk assessment frameworks for agricultural lending</p>
								</div>

								<div class="fin-compliance-card">
									<i class="fas fa-file-invoice-dollar"></i>
									<h4>Financial Reporting</h4>
									<p>Transparent financial reporting and audit compliance</p>
								</div>

								<div class="fin-compliance-card">
									<i class="fas fa-handshake"></i>
									<h4>Third-Party Risk</h4>
									<p>Vendor risk management for financial institutions</p>
								</div>
							</div>
						</div>



						<!-- Compliance Team -->
						<div class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-users"></i>
								</div>
								<h2><?php echo esc_html( $settings['team_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['team_intro'] ); ?></p>

							<div class="team-structure">
								<div class="team-role">
									<i class="fas fa-user-tie"></i>
									<h4>Chief Compliance Officer</h4>
									<p>Oversees all compliance initiatives and regulatory relationships</p>
								</div>

								<div class="team-role">
									<i class="fas fa-user-shield"></i>
									<h4>Data Protection Officer</h4>
									<p>Manages GDPR and data privacy compliance</p>
								</div>

								<div class="team-role">
									<i class="fas fa-user-lock"></i>
									<h4>Information Security Officer</h4>
									<p>Maintains security certifications and standards</p>
								</div>

								<div class="team-role">
									<i class="fas fa-user-check"></i>
									<h4>Compliance Analysts</h4>
									<p>Monitor regulatory changes and ensure ongoing compliance</p>
								</div>
							</div>
						</div>

						<!-- Contact -->
						<div class="legal-section contact-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-envelope"></i>
								</div>
								<h2><?php echo esc_html( $settings['contact_title'] ); ?></h2>
							</div>
							<p><?php echo esc_html( $settings['contact_intro'] ); ?></p>

							<div class="contact-methods">
								<div class="contact-method">
									<i class="fas fa-envelope"></i>
									<strong>Compliance Team:</strong>
									<a href="mailto:<?php echo esc_attr( $settings['contact_email'] ); ?>"><?php echo esc_html( $settings['contact_email'] ); ?></a>
								</div>
								<div class="contact-method">
									<i class="fas fa-user-shield"></i>
									<strong>Data Protection Officer:</strong>
									<a href="mailto:<?php echo esc_attr( $settings['contact_dpo_email'] ); ?>"><?php echo esc_html( $settings['contact_dpo_email'] ); ?></a>
								</div>
								<div class="contact-method">
									<i class="fas fa-phone"></i>
									<strong>Phone:</strong>
									<span><?php echo esc_html( $settings['contact_phone'] ); ?></span>
								</div>
							</div>
						</div>
					</main>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Compliance_Content_Section_Widget() );


