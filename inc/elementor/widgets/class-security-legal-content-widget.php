<?php
/**
 * Elementor Security Legal Content Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Security_Legal_Content_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-security-legal-content';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Security Legal Content Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-lock';
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
		return array( 'security', 'legal', 'content', 'protection', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_sidebar_controls();
		$this->register_introduction_controls();
		$this->register_infrastructure_controls();
		$this->register_data_protection_controls();
		$this->register_access_control_controls();
		$this->register_monitoring_controls();
		$this->register_incident_response_controls();
		$this->register_certifications_controls();
		$this->register_vulnerability_controls();
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

		// Sidebar Navigation Links
		$this->add_control(
			'sidebar_links_heading',
			array(
				'label'     => esc_html__( 'Navigation Links', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		// Privacy Policy Link
		$this->add_control(
			'sidebar_privacy_label',
			array(
				'label'   => esc_html__( 'Privacy Policy Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Privacy Policy',
			)
		);

		$this->add_control(
			'sidebar_privacy_link',
			array(
				'label'   => esc_html__( 'Privacy Policy Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
				),
			)
		);

		// Terms of Service Link
		$this->add_control(
			'sidebar_terms_label',
			array(
				'label'   => esc_html__( 'Terms of Service Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Terms of Service',
			)
		);

		$this->add_control(
			'sidebar_terms_link',
			array(
				'label'   => esc_html__( 'Terms of Service Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
				),
			)
		);

		// Security Link
		$this->add_control(
			'sidebar_security_label',
			array(
				'label'   => esc_html__( 'Security Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Security',
			)
		);

		$this->add_control(
			'sidebar_security_link',
			array(
				'label'   => esc_html__( 'Security Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
				),
			)
		);

		// Compliance Link
		$this->add_control(
			'sidebar_compliance_label',
			array(
				'label'   => esc_html__( 'Compliance Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Compliance',
			)
		);

		$this->add_control(
			'sidebar_compliance_link',
			array(
				'label'   => esc_html__( 'Compliance Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
				),
			)
		);

		// Active Link Selection
		$this->add_control(
			'sidebar_active_link',
			array(
				'label'   => esc_html__( 'Active Link', 'meridian-africa' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'security',
				'options' => array(
					'privacy'    => esc_html__( 'Privacy Policy', 'meridian-africa' ),
					'terms'      => esc_html__( 'Terms of Service', 'meridian-africa' ),
					'security'   => esc_html__( 'Security', 'meridian-africa' ),
					'compliance' => esc_html__( 'Compliance', 'meridian-africa' ),
				),
			)
		);

		// CTA Section
		$this->add_control(
			'sidebar_cta_heading',
			array(
				'label'     => esc_html__( 'Call to Action', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'sidebar_cta_icon',
			array(
				'label'   => esc_html__( 'CTA Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-bug',
			)
		);

		$this->add_control(
			'sidebar_cta_title',
			array(
				'label'   => esc_html__( 'CTA Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Report Security Issue',
			)
		);

		$this->add_control(
			'sidebar_cta_text',
			array(
				'label'   => esc_html__( 'CTA Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Found a vulnerability?',
			)
		);

		$this->add_control(
			'sidebar_cta_button_text',
			array(
				'label'   => esc_html__( 'CTA Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Report Now',
			)
		);

		$this->add_control(
			'sidebar_cta_button_link',
			array(
				'label'   => esc_html__( 'CTA Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => 'mailto:hello@meridianafrica.io',
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
				'default' => 'Our Security Commitment',
			)
		);

		$this->add_control(
			'intro_content',
			array(
				'label'   => esc_html__( 'Content', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'At Meridian Africa, security is not an afterthought—it\'s built into every layer of our platform. We understand that farmers and agricultural organizations trust us with sensitive data, and we take that responsibility seriously.',
			)
		);

		$this->add_control(
			'intro_highlight_text',
			array(
				'label'   => esc_html__( 'Highlight Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => '<strong>Our Promise:</strong> We employ enterprise-grade security measures to protect your agricultural data, ensuring confidentiality, integrity, and availability at all times.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Infrastructure Controls
	 */
	private function register_infrastructure_controls() {
		$this->start_controls_section(
			'infrastructure_section',
			array(
				'label' => esc_html__( 'Infrastructure Security', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'infrastructure_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Infrastructure Security',
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
				'label' => esc_html__( 'Data Protection', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'data_protection_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data Protection',
			)
		);

		$this->add_control(
			'encryption_subtitle',
			array(
				'label'   => esc_html__( 'Encryption Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Encryption',
			)
		);

		$this->add_control(
			'encryption_intro',
			array(
				'label'   => esc_html__( 'Encryption Introduction', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'We use industry-standard encryption to protect your data:',
			)
		);

		$this->add_control(
			'privacy_subtitle',
			array(
				'label'   => esc_html__( 'Data Privacy Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data Privacy',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Access Control Controls
	 */
	private function register_access_control_controls() {
		$this->start_controls_section(
			'access_control_section',
			array(
				'label' => esc_html__( 'Access Control', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'access_control_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Access Control & Authentication',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Monitoring Controls
	 */
	private function register_monitoring_controls() {
		$this->start_controls_section(
			'monitoring_section',
			array(
				'label' => esc_html__( 'Monitoring', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'monitoring_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Security Monitoring & Threat Detection',
			)
		);

		$this->add_control(
			'monitoring_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'We employ 24/7 security monitoring to detect and respond to threats:',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Incident Response Controls
	 */
	private function register_incident_response_controls() {
		$this->start_controls_section(
			'incident_response_section',
			array(
				'label' => esc_html__( 'Incident Response', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'incident_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Incident Response',
			)
		);

		$this->add_control(
			'incident_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'We have a comprehensive incident response plan to handle security events:',
			)
		);

		$this->add_control(
			'breach_notification',
			array(
				'label'   => esc_html__( 'Breach Notification Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'In the unlikely event of a data breach, we will notify affected users within 72 hours as required by applicable regulations.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Certifications Controls
	 */
	private function register_certifications_controls() {
		$this->start_controls_section(
			'certifications_section',
			array(
				'label' => esc_html__( 'Certifications', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'certifications_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Security Certifications & Compliance',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Vulnerability Controls
	 */
	private function register_vulnerability_controls() {
		$this->start_controls_section(
			'vulnerability_section',
			array(
				'label' => esc_html__( 'Vulnerability Disclosure', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'vulnerability_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Responsible Vulnerability Disclosure',
			)
		);

		$this->add_control(
			'vulnerability_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'We welcome security researchers to help us maintain the security of our platform. If you discover a security vulnerability, please:',
			)
		);

		$this->add_control(
			'vulnerability_email',
			array(
				'label'   => esc_html__( 'Security Email', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'compliance@merdianafrica.io',
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
				'default' => 'Security Contact',
			)
		);

		$this->add_control(
			'contact_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'For security-related inquiries or to report a vulnerability:',
			)
		);

		$this->add_control(
			'contact_email',
			array(
				'label'   => esc_html__( 'Email Address', 'meridian-africa' ),
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

		<!-- Legal Content Section -->
		<section class="legal-content-section">
			<div class="container">
				<div class="legal-content-wrapper">
					<!-- Sidebar -->
					<aside class="legal-sidebar">
						<div class="sidebar-sticky">
							<h4><?php echo esc_html( $settings['sidebar_title'] ); ?></h4>
							<nav class="sidebar-nav">
								<?php
								// Privacy Policy Link
								$privacy_url = ! empty( $settings['sidebar_privacy_link']['url'] ) ? $settings['sidebar_privacy_link']['url'] : '#';
								$privacy_target = ! empty( $settings['sidebar_privacy_link']['is_external'] ) ? ' target="_blank"' : '';
								$privacy_nofollow = ! empty( $settings['sidebar_privacy_link']['nofollow'] ) ? ' rel="nofollow"' : '';
								$privacy_active = ( $settings['sidebar_active_link'] === 'privacy' ) ? ' active' : '';
								?>
								<a href="<?php echo esc_url( $privacy_url ); ?>"<?php echo $privacy_target . $privacy_nofollow; ?> class="sidebar-link<?php echo $privacy_active; ?>">
									<i class="fas fa-shield-alt"></i>
									<?php echo esc_html( $settings['sidebar_privacy_label'] ); ?>
								</a>
								<?php
								// Terms of Service Link
								$terms_url = ! empty( $settings['sidebar_terms_link']['url'] ) ? $settings['sidebar_terms_link']['url'] : '#';
								$terms_target = ! empty( $settings['sidebar_terms_link']['is_external'] ) ? ' target="_blank"' : '';
								$terms_nofollow = ! empty( $settings['sidebar_terms_link']['nofollow'] ) ? ' rel="nofollow"' : '';
								$terms_active = ( $settings['sidebar_active_link'] === 'terms' ) ? ' active' : '';
								?>
								<a href="<?php echo esc_url( $terms_url ); ?>"<?php echo $terms_target . $terms_nofollow; ?> class="sidebar-link<?php echo $terms_active; ?>">
									<i class="fas fa-file-contract"></i>
									<?php echo esc_html( $settings['sidebar_terms_label'] ); ?>
								</a>
								<?php
								// Security Link
								$security_url = ! empty( $settings['sidebar_security_link']['url'] ) ? $settings['sidebar_security_link']['url'] : '#';
								$security_target = ! empty( $settings['sidebar_security_link']['is_external'] ) ? ' target="_blank"' : '';
								$security_nofollow = ! empty( $settings['sidebar_security_link']['nofollow'] ) ? ' rel="nofollow"' : '';
								$security_active = ( $settings['sidebar_active_link'] === 'security' ) ? ' active' : '';
								?>
								<a href="<?php echo esc_url( $security_url ); ?>"<?php echo $security_target . $security_nofollow; ?> class="sidebar-link<?php echo $security_active; ?>">
									<i class="fas fa-lock"></i>
									<?php echo esc_html( $settings['sidebar_security_label'] ); ?>
								</a>
								<?php
								// Compliance Link
								$compliance_url = ! empty( $settings['sidebar_compliance_link']['url'] ) ? $settings['sidebar_compliance_link']['url'] : '#';
								$compliance_target = ! empty( $settings['sidebar_compliance_link']['is_external'] ) ? ' target="_blank"' : '';
								$compliance_nofollow = ! empty( $settings['sidebar_compliance_link']['nofollow'] ) ? ' rel="nofollow"' : '';
								$compliance_active = ( $settings['sidebar_active_link'] === 'compliance' ) ? ' active' : '';
								?>
								<a href="<?php echo esc_url( $compliance_url ); ?>"<?php echo $compliance_target . $compliance_nofollow; ?> class="sidebar-link<?php echo $compliance_active; ?>">
									<i class="fas fa-check-circle"></i>
									<?php echo esc_html( $settings['sidebar_compliance_label'] ); ?>
								</a>
							</nav>

							<div class="sidebar-cta">
								<i class="<?php echo esc_attr( $settings['sidebar_cta_icon'] ); ?>"></i>
								<h5><?php echo esc_html( $settings['sidebar_cta_title'] ); ?></h5>
								<p><?php echo esc_html( $settings['sidebar_cta_text'] ); ?></p>
								<?php
								$cta_link = $settings['sidebar_cta_button_link']['url'];
								$cta_target = $settings['sidebar_cta_button_link']['is_external'] ? ' target="_blank"' : '';
								$cta_nofollow = $settings['sidebar_cta_button_link']['nofollow'] ? ' rel="nofollow"' : '';
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

						<!-- Infrastructure Security -->
						<div id="infrastructure" class="legal-section">

							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-server"></i>
								</div>
								<h2><?php echo esc_html( $settings['infrastructure_title'] ); ?></h2>
							</div>

							<div class="security-features-grid">
								<div class="security-feature-card">
									<div class="feature-icon">
										<i class="fas fa-lock"></i>
									</div>
									<h4> Data Security</h4>
									<div class="feature-details">
										<p><strong>Encryption:</strong> AES-256 at rest, TLS 1.3 in transit</p>
										<p><strong>Access Control:</strong> Role-based (RBAC), multi-factor authentication</p>
										<p><strong>Audit Logs:</strong> Immutable record of all actions</p>
										<p><strong>Backup:</strong> Daily snapshots, 30-day retention, multi-region</p>
									</div>
								</div>

								<div class="security-feature-card">
									<div class="feature-icon">
										<i class="fas fa-globe"></i>
									</div>
									<h4>Data Sovereignty</h4>
									<div class="feature-details">
										<p><strong>Standard:</strong> Google Earth Engine (US-based compute)</p>
										<p><strong>Premium:</strong> AWS Cape Town (Africa-hosted option)</p>
										<p><strong>On-Premise:</strong> Government data center deployment available</p>
										<p><strong>Ownership:</strong> All data belongs to government, never commercialized</p>
									</div>
								</div>

								<div class="security-feature-card">
									<div class="feature-icon">
										<i class="fas fa-clipboard-check"></i>
									</div>
									<h4>Compliance</h4>
									<div class="feature-details">
										<p><strong>GDPR / Data Protection Act:</strong> Privacy by design</p>
										<p><strong>ISO 27001:</strong> Information security (certification in progress)</p>
										<p><strong>Government Financial Regulations:</strong> Audit trail compliant</p>
										<p><strong>Procurement:</strong> World Bank, AfDB, bilateral agency standards</p>
									</div>
								</div>

								<div class="security-feature-card">
									<div class="feature-icon">
										<i class="fas fa-search"></i>
									</div>
									<h4> Transparency</h4>
									<div class="feature-details">
										<p><strong>Methodology:</strong> Open documentation, peer-reviewed approaches</p>
										<p><strong>Algorithms:</strong> Explainable ML, confidence scoring</p>
										<p><strong>Validation:</strong> Ground truth collection, accuracy reporting</p>
										<p><strong>Auditable:</strong> Independent verification of results possible</p>
									</div>
								</div>
							</div>
						</div>

						<!-- Data Protection -->
						<div id="data-protection" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-database"></i>
								</div>
								<h2><?php echo esc_html( $settings['data_protection_title'] ); ?></h2>
							</div>

							<h3><i class="fas fa-key"></i> <?php echo esc_html( $settings['encryption_subtitle'] ); ?></h3>
							<p><?php echo esc_html( $settings['encryption_intro'] ); ?></p>
							
							<div class="encryption-details">
								<div class="encryption-item">
									<div class="encryption-icon">
										<i class="fas fa-exchange-alt"></i>
									</div>
									<div class="encryption-content">
										<h4>Data in Transit</h4>
										<p>All data transmitted between your device and our servers is encrypted using TLS 1.3 with 256-bit encryption</p>
									</div>
								</div>

								<div class="encryption-item">
									<div class="encryption-icon">
										<i class="fas fa-hdd"></i>
									</div>
									<div class="encryption-content">
										<h4>Data at Rest</h4>
										<p>All stored data is encrypted using AES-256 encryption, including databases, file storage, and backups</p>
									</div>
								</div>

								<div class="encryption-item">
									<div class="encryption-icon">
										<i class="fas fa-satellite"></i>
									</div>
									<div class="encryption-content">
										<h4>Satellite Data</h4>
										<p>Agricultural and satellite imagery data is encrypted and stored in secure, isolated environments</p>
									</div>
								</div>
							</div>

							<h3><i class="fas fa-user-secret"></i> <?php echo esc_html( $settings['privacy_subtitle'] ); ?></h3>
							<div class="privacy-measures">
								<ul class="legal-list">
									<li><i class="fas fa-check"></i> Data minimization - we only collect what's necessary</li>
									<li><i class="fas fa-check"></i> Purpose limitation - data used only for stated purposes</li>
									<li><i class="fas fa-check"></i> Data segregation - customer data isolated by tenant</li>
									<li><i class="fas fa-check"></i> Anonymization for analytics and research</li>
								</ul>
							</div>
						</div>

						<!-- Access Control -->
						<div id="access-control" class="legal-section">

							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-user-lock"></i>
								</div>
								<h2><?php echo esc_html( $settings['access_control_title'] ); ?></h2>
							</div>
							
							<div class="access-control-grid">
								<div class="access-item">
									<i class="fas fa-fingerprint"></i>
									<h4>Multi-Factor Authentication</h4>
									<p>Optional MFA for enhanced account security using authenticator apps or SMS</p>
								</div>

								<div class="access-item">
									<i class="fas fa-users-cog"></i>
									<h4>Role-Based Access</h4>
									<p>Granular permissions based on user roles and responsibilities</p>
								</div>

								<div class="access-item">
									<i class="fas fa-history"></i>
									<h4>Session Management</h4>
									<p>Automatic session timeout and secure session handling</p>
								</div>

								<div class="access-item">
									<i class="fas fa-clipboard-list"></i>
									<h4>Audit Logging</h4>
									<p>Comprehensive logging of all access and data modifications</p>
								</div>
							</div>

							<div class="best-practices-box">
								<h4><i class="fas fa-lightbulb"></i> Security Best Practices for Users</h4>
								<ul class="legal-list">
									<li><i class="fas fa-check"></i> Use strong, unique passwords</li>
									<li><i class="fas fa-check"></i> Enable multi-factor authentication</li>
									<li><i class="fas fa-check"></i> Regularly review account activity</li>
									<li><i class="fas fa-check"></i> Don't share login credentials</li>
									<li><i class="fas fa-check"></i> Log out from shared devices</li>
								</ul>
							</div>
						</div>

						<!-- Monitoring -->
						<div id="monitoring" class="legal-section">

							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-eye"></i>
								</div>
								<h2><?php echo esc_html( $settings['monitoring_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['monitoring_intro'] ); ?></p>

							<div class="monitoring-features">
								<!-- <div class="monitoring-card">
									<i class="fas fa-radar"></i>
									<h4>Real-Time Monitoring</h4>
									<p>Continuous monitoring of system activity, network traffic, and user behavior</p>
								</div> -->

								<div class="monitoring-card">
									<i class="fas fa-robot"></i>
									<h4>AI-Powered Detection</h4>
									<p>Machine learning algorithms to identify anomalies and potential threats</p>
								</div>

								<div class="monitoring-card">
									<i class="fas fa-bell"></i>
									<h4>Automated Alerts</h4>
									<p>Instant notifications for suspicious activities or security events</p>
								</div>

								<div class="monitoring-card">
									<i class="fas fa-chart-line"></i>
									<h4>Security Analytics</h4>
									<p>Advanced analytics to identify patterns and prevent future threats</p>
								</div>
							</div>
						</div>

						<!-- Incident Response -->
						<div id="incident-response" class="legal-section">

							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-exclamation-triangle"></i>
								</div>
								<h2><?php echo esc_html( $settings['incident_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['incident_intro'] ); ?></p>

							<div class="incident-timeline">
								<div class="timeline-item">
									<div class="timeline-number">1</div>
									<div class="timeline-content">
										<h4>Detection</h4>
										<p>Automated systems and security team identify potential incidents</p>
									</div>
								</div>

								<div class="timeline-item">
									<div class="timeline-number">2</div>
									<div class="timeline-content">
										<h4>Assessment</h4>
										<p>Rapid evaluation of severity and potential impact</p>
									</div>
								</div>

								<div class="timeline-item">
									<div class="timeline-number">3</div>
									<div class="timeline-content">
										<h4>Containment</h4>
										<p>Immediate action to prevent spread and limit damage</p>
									</div>
								</div>

								<div class="timeline-item">
									<div class="timeline-number">4</div>
									<div class="timeline-content">
										<h4>Resolution</h4>
										<p>Eliminate threat and restore normal operations</p>
									</div>
								</div>

								<div class="timeline-item">
									<div class="timeline-number">5</div>
									<div class="timeline-content">
										<h4>Communication</h4>
										<p>Notify affected users and stakeholders as required</p>
									</div>
								</div>

								<div class="timeline-item">
									<div class="timeline-number">6</div>
									<div class="timeline-content">
										<h4>Post-Incident Review</h4>
										<p>Analyze incident and improve security measures</p>
									</div>
								</div>
							</div>

							<div class="alert-box">
								<i class="fas fa-info-circle"></i>
								<?php echo esc_html( $settings['breach_notification'] ); ?>
							</div>
						</div>

						<!-- Certifications -->
						<div id="certifications" class="legal-section">

							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-certificate"></i>
								</div>
								<h2><?php echo esc_html( $settings['certifications_title'] ); ?></h2>
							</div>

							<div class="certifications-grid">

								<div class="cert-card">
									<div class="cert-icon">
										<i class="fas fa-shield-alt"></i>
									</div>
									<h4>SOC 2 Type II</h4>
									<p>Security, availability, and confidentiality controls</p>
								</div>

								<div class="cert-card">
									<div class="cert-icon">
										<i class="fas fa-globe"></i>
									</div>
									<h4>GDPR Compliant</h4>
									<p>European data protection regulation compliance</p>
								</div>

								<div class="cert-card">
									<div class="cert-icon">
										<i class="fas fa-lock"></i>
									</div>
									<h4>PCI DSS</h4>
									<p>Payment card industry data security standards</p>
								</div>
							</div>
						</div>

						<!-- Vulnerability Disclosure -->
						<div class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-bug"></i>
								</div>
								<h2><?php echo esc_html( $settings['vulnerability_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['vulnerability_intro'] ); ?></p>

							<div class="disclosure-steps">
								<div class="disclosure-step">
									<i class="fas fa-envelope"></i>
									<p>Email details to <a href="mailto:<?php echo esc_attr( $settings['vulnerability_email'] ); ?>"><?php echo esc_html( $settings['vulnerability_email'] ); ?></a></p>
								</div>
								<div class="disclosure-step">
									<i class="fas fa-user-secret"></i>
									<p>Do not publicly disclose the vulnerability</p>
								</div>
								<div class="disclosure-step">
									<i class="fas fa-clock"></i>
									<p>Allow us reasonable time to address the issue</p>
								</div>
							</div>

							<div class="reward-box">
								<i class="fas fa-trophy"></i>
								<h4>Bug Bounty Program</h4>
								<p>We offer rewards for valid security vulnerabilities. Contact us for program details.</p>
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
									<strong>Security Team:</strong>
									<a href="mailto:<?php echo esc_attr( $settings['contact_email'] ); ?>"><?php echo esc_html( $settings['contact_email'] ); ?></a>
								</div>
								<div class="contact-method">
									<i class="fas fa-phone"></i>
									<strong>Emergency Hotline:</strong>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Security_Legal_Content_Widget() );

