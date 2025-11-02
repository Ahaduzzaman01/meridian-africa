<?php
/**
 * Elementor Terms Content Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Terms_Content_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-terms-content-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Terms Content Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-document-file';
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
		return array( 'terms', 'service', 'legal', 'conditions', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_sidebar_controls();
		$this->register_introduction_controls();
		$this->register_acceptance_controls();
		$this->register_services_controls();
		$this->register_user_obligations_controls();
		$this->register_payment_controls();
		$this->register_intellectual_property_controls();
		$this->register_warranties_controls();
		$this->register_liability_controls();
		$this->register_termination_controls();
		$this->register_changes_controls();
		$this->register_governing_law_controls();
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
				'default' => 'Have Questions?',
			)
		);

		$this->add_control(
			'sidebar_cta_text',
			array(
				'label'   => esc_html__( 'CTA Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Our team is here to help',
			)
		);

		$this->add_control(
			'sidebar_cta_button_text',
			array(
				'label'   => esc_html__( 'CTA Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Contact Us',
			)
		);

		$this->add_control(
			'sidebar_cta_button_link',
			array(
				'label'   => esc_html__( 'CTA Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
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
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Introduction',
			)
		);

		$this->add_control(
			'intro_content',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Welcome to Meridian Africa These Terms of Service ("Terms") govern your access to and use of Meridian Sentinel\'s satellite-powered agricultural intelligence platform, including our website, mobile applications, and related services (collectively, the "Services").',
			)
		);

		$this->add_control(
			'intro_highlight',
			array(
				'label'   => esc_html__( 'Highlight Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'By accessing or using our Services, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use our Services.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Acceptance Controls
	 */
	private function register_acceptance_controls() {
		$this->start_controls_section(
			'acceptance_section',
			array(
				'label' => esc_html__( 'Acceptance of Terms', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'acceptance_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Acceptance of Terms',
			)
		);

		$this->add_control(
			'acceptance_content',
			array(
				'label'   => esc_html__( 'Content', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'By creating an account, accessing, or using Meridian Sentinel\'s Services, you acknowledge that you have read, understood, and agree to be bound by these Terms and our Privacy Policy.',
			)
		);

		$this->add_control(
			'eligibility_requirements',
			array(
				'label'   => esc_html__( 'Eligibility Requirements', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<ul class="legal-list"><li><i class="fas fa-check"></i> You must be at least 18 years old to use our Services</li><li><i class="fas fa-check"></i> You must have the legal capacity to enter into binding contracts</li><li><i class="fas fa-check"></i> You must provide accurate and complete registration information</li><li><i class="fas fa-check"></i> You must not be prohibited from using our Services under applicable laws</li></ul>',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Services Controls
	 */
	private function register_services_controls() {
		$this->start_controls_section(
			'services_section',
			array(
				'label' => esc_html__( 'Our Services', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'services_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Our Services',
			)
		);

		$this->add_control(
			'services_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Meridian Africa provides satellite-powered agricultural intelligence services designed to help farmers, governments, NGOs, banks, and cooperatives make data-driven decisions.',
			)
		);

		$this->add_control(
			'services_alert',
			array(
				'label'   => esc_html__( 'Alert Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'We strive to provide uninterrupted service but cannot guarantee 100% uptime. Satellite data may be subject to weather conditions and technical limitations.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register User Obligations Controls
	 */
	private function register_user_obligations_controls() {
		$this->start_controls_section(
			'user_obligations_section',
			array(
				'label' => esc_html__( 'User Obligations', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'user_obligations_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'User Obligations and Responsibilities',
			)
		);

		$this->add_control(
			'acceptable_use_intro',
			array(
				'label'   => esc_html__( 'Acceptable Use Intro', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'You agree to use our Services only for lawful purposes and in accordance with these Terms. You must not:',
			)
		);

		$this->add_control(
			'prohibited_activities',
			array(
				'label'   => esc_html__( 'Prohibited Activities', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<ul class="legal-list prohibited-list"><li><i class="fas fa-times"></i> Violate any applicable laws or regulations</li><li><i class="fas fa-times"></i> Infringe on intellectual property rights</li><li><i class="fas fa-times"></i> Transmit malicious code or viruses</li><li><i class="fas fa-times"></i> Attempt to gain unauthorized access to our systems</li><li><i class="fas fa-times"></i> Use the Services for fraudulent purposes</li><li><i class="fas fa-times"></i> Interfere with other users\' access to the Services</li><li><i class="fas fa-times"></i> Scrape or harvest data without permission</li></ul>',
			)
		);

		$this->add_control(
			'account_security_text',
			array(
				'label'   => esc_html__( 'Account Security Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'You are responsible for maintaining the confidentiality of your account credentials and for all activities under your account.',
			)
		);

		$this->add_control(
			'security_notice',
			array(
				'label'   => esc_html__( 'Security Notice', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'You must immediately notify us of any unauthorized use of your account or any other security breach.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Payment Controls
	 */
	private function register_payment_controls() {
		$this->start_controls_section(
			'payment_section',
			array(
				'label' => esc_html__( 'Payment Terms', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'payment_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Payment Terms',
			)
		);

		$this->add_control(
			'payment_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Meridian Africa offers various subscription plans tailored to different user needs. By subscribing, you agree to pay all applicable fees.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Intellectual Property Controls
	 */
	private function register_intellectual_property_controls() {
		$this->start_controls_section(
			'ip_section',
			array(
				'label' => esc_html__( 'Intellectual Property', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'ip_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Intellectual Property Rights',
			)
		);

		$this->add_control(
			'ip_rights_text',
			array(
				'label'   => esc_html__( 'Our Rights Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'All content, features, and functionality of the Services, including but not limited to text, graphics, logos, software, and satellite data analysis algorithms, are owned by Meridian Africa and protected by international copyright, trademark, and other intellectual property laws.',
			)
		);

		$this->add_control(
			'user_data_text',
			array(
				'label'   => esc_html__( 'User Data Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'You retain all rights to the agricultural data you input into our platform. By using our Services, you grant Meridian Africa a limited license to process and analyze your data to provide the Services.',
			)
		);

		$this->add_control(
			'data_ownership_text',
			array(
				'label'   => esc_html__( 'Data Ownership Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Your farm data belongs to you. We use it only to provide services and improve our platform. We never sell your data to third parties.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Warranties Controls
	 */
	private function register_warranties_controls() {
		$this->start_controls_section(
			'warranties_section',
			array(
				'label' => esc_html__( 'Warranties & Disclaimers', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'warranties_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Warranties and Disclaimers',
			)
		);

		$this->add_control(
			'service_disclaimer',
			array(
				'label'   => esc_html__( 'Service Disclaimer', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'The Services are provided "AS IS" and "AS AVAILABLE" without warranties of any kind. While we strive for accuracy, satellite data and agricultural predictions are subject to various factors beyond our control.',
			)
		);

		$this->add_control(
			'agricultural_decisions_text',
			array(
				'label'   => esc_html__( 'Agricultural Decisions Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Meridian Africa s provides intelligence and insights, but you are solely responsible for your agricultural decisions. We recommend consulting with agricultural experts for critical decisions.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Liability Controls
	 */
	private function register_liability_controls() {
		$this->start_controls_section(
			'liability_section',
			array(
				'label' => esc_html__( 'Limitation of Liability', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'liability_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Limitation of Liability',
			)
		);

		$this->add_control(
			'liability_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'To the maximum extent permitted by law, Meridian Sentinel shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to:',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Termination Controls
	 */
	private function register_termination_controls() {
		$this->start_controls_section(
			'termination_section',
			array(
				'label' => esc_html__( 'Termination', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'termination_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Termination',
			)
		);

		$this->add_control(
			'termination_by_user',
			array(
				'label'   => esc_html__( 'Termination by User', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'You may terminate your account at any time by contacting our support team or through your account settings. Upon termination, you will lose access to the Services.',
			)
		);

		$this->add_control(
			'termination_by_company',
			array(
				'label'   => esc_html__( 'Termination by Company', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'We reserve the right to suspend or terminate your access to the Services if you violate these Terms or engage in fraudulent or harmful activities.',
			)
		);

		$this->add_control(
			'termination_effects',
			array(
				'label'   => esc_html__( 'Effect of Termination', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'Upon termination, your right to use the Services will immediately cease. You may request a copy of your data within 30 days of termination.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Changes Controls
	 */
	private function register_changes_controls() {
		$this->start_controls_section(
			'changes_section',
			array(
				'label' => esc_html__( 'Changes to Terms', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'changes_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Changes to Terms',
			)
		);

		$this->add_control(
			'changes_text',
			array(
				'label'   => esc_html__( 'Changes Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'We may update these Terms from time to time. We will notify you of any material changes by email or through the Services. Your continued use of the Services after such changes constitutes acceptance of the updated Terms.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Governing Law Controls
	 */
	private function register_governing_law_controls() {
		$this->start_controls_section(
			'governing_law_section',
			array(
				'label' => esc_html__( 'Governing Law', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'governing_law_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Governing Law and Dispute Resolution',
			)
		);

		$this->add_control(
			'governing_law_text',
			array(
				'label'   => esc_html__( 'Governing Law Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'These Terms shall be governed by and construed in accordance with the laws of Nigeria. Any disputes arising from these Terms or the Services shall be resolved through arbitration in Lagos, Nigeria.',
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
				'default' => 'Contact Us',
			)
		);

		$this->add_control(
			'contact_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'If you have questions about these Terms of Service, please contact us:',
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

		$this->add_control(
			'contact_address',
			array(
				'label'   => esc_html__( 'Address', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => '17 Cavendish Street, Sheffield. S37SS. United Kingdom',
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
								<a href="privacy.html" class="sidebar-link">
									<i class="fas fa-shield-alt"></i>
									Privacy Policy
								</a>
								<a href="terms.html" class="sidebar-link active">
									<i class="fas fa-file-contract"></i>
									Terms of Service
								</a>
								<a href="security.html" class="sidebar-link">
									<i class="fas fa-lock"></i>
									Security
								</a>
								<a href="compliance.html" class="sidebar-link">
									<i class="fas fa-check-circle"></i>
									Compliance
								</a>
							</nav>

							<div class="sidebar-cta">
								<i class="fas fa-question-circle"></i>
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
								<p><strong>Agreement:</strong> <?php echo esc_html( $settings['intro_highlight'] ); ?></p>
							</div>
						</div>

						<!-- Acceptance -->
						<div id="acceptance" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-handshake"></i>
								</div>
								<h2><?php echo esc_html( $settings['acceptance_title'] ); ?></h2>
							</div>
							<p><?php echo esc_html( $settings['acceptance_content'] ); ?></p>

							<div class="terms-requirements">
								<h4><i class="fas fa-user-check"></i> Eligibility Requirements</h4>
								<?php echo wp_kses_post( $settings['eligibility_requirements'] ); ?>
							</div>
						</div>

						<!-- Services -->
						<div id="services" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-satellite"></i>
								</div>
								<h2><?php echo esc_html( $settings['services_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['services_intro'] ); ?></p>

							<div class="services-grid">
								<!-- <div class="service-item">
									<i class="fas fa-leaf"></i>
									<h4>Crop Monitoring</h4>
									<p>Real-time field health monitoring and vegetation analysis</p>
								</div> -->
								<div class="service-item">
									<i class="fas fa-chart-line"></i>
									<h4>Yield Prediction</h4>
									<p>AI-powered yield forecasting and optimization</p>
								</div>
								<div class="service-item">
									<i class="fas fa-cloud-sun"></i>
									<h4>Weather Intelligence</h4>
									<p>Weather-based advisory and risk alerts</p>
								</div>
								<div class="service-item">
									<i class="fas fa-shield-alt"></i>
									<h4>Compliance Verification</h4>
									<p>Subsidy verification and fraud detection</p>
								</div>
							</div>

							<div class="alert-box">
								<i class="fas fa-info-circle"></i>
								<strong>Service Availability:</strong> <?php echo esc_html( $settings['services_alert'] ); ?>
							</div>
						</div>

						<!-- User Obligations -->
						<div id="user-obligations" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-user-check"></i>
								</div>
								<h2><?php echo esc_html( $settings['user_obligations_title'] ); ?></h2>
							</div>

							<h3><i class="fas fa-check-circle"></i> Acceptable Use</h3>
							<p><?php echo esc_html( $settings['acceptable_use_intro'] ); ?></p>
							<?php echo wp_kses_post( $settings['prohibited_activities'] ); ?>

							<h3><i class="fas fa-key"></i> Account Security</h3>
							<p><?php echo esc_html( $settings['account_security_text'] ); ?></p>
							<div class="responsibility-box">
								<i class="fas fa-exclamation-triangle"></i>
								<p><?php echo esc_html( $settings['security_notice'] ); ?></p>
							</div>
						</div>

						<!-- Payment Terms -->
						<div id="payment" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-credit-card"></i>
								</div>
								<h2><?php echo esc_html( $settings['payment_title'] ); ?></h2>
							</div>

							<h3><i class="fas fa-dollar-sign"></i> Subscription Plans</h3>
							<p><?php echo esc_html( $settings['payment_intro'] ); ?></p>

							<div class="payment-details">
								<div class="payment-item">
									<h4><i class="fas fa-calendar-alt"></i> Billing Cycle</h4>
									<p>Subscriptions are billed on a monthly or annual basis, depending on your selected plan. Payments are due at the beginning of each billing cycle.</p>
								</div>
								<div class="payment-item">
									<h4><i class="fas fa-sync-alt"></i> Auto-Renewal</h4>
									<p>Subscriptions automatically renew unless cancelled before the renewal date. You can cancel anytime from your account settings.</p>
								</div>
								<div class="payment-item">
									<h4><i class="fas fa-undo"></i> Refund Policy</h4>
									<p>We offer a 14-day money-back guarantee for new subscribers. Refunds are processed within 7-10 business days.</p>
								</div>
								<div class="payment-item">
									<h4><i class="fas fa-edit"></i> Price Changes</h4>
									<p>We reserve the right to modify pricing with 30 days' advance notice. Existing subscribers maintain their current rate until renewal.</p>
								</div>
							</div>
						</div>

						<!-- Intellectual Property -->
						<div id="intellectual-property" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-copyright"></i>
								</div>
								<h2><?php echo esc_html( $settings['ip_title'] ); ?></h2>
							</div>

							<h3><i class="fas fa-trademark"></i> Meridia Africa Rights</h3>
							<p><?php echo esc_html( $settings['ip_rights_text'] ); ?></p>

							<h3><i class="fas fa-database"></i> Your Data</h3>
							<p><?php echo esc_html( $settings['user_data_text'] ); ?></p>

							<div class="ip-box">
								<i class="fas fa-shield-alt"></i>
								<h4>Data Ownership</h4>
								<p><?php echo esc_html( $settings['data_ownership_text'] ); ?></p>
							</div>
						</div>

						<!-- Warranties and Disclaimers -->
						<div class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-exclamation-triangle"></i>
								</div>
								<h2>Warranties and Disclaimers</h2>
							</div>

							<div class="disclaimer-box">
								<h4><i class="fas fa-info-circle"></i> Service Disclaimer</h4>
								<p><?php echo esc_html( $settings['service_disclaimer'] ); ?></p>
							</div>

							<div class="warning-box">
								<i class="fas fa-seedling"></i>
								<h4>Agricultural Decisions</h4>
								<p><?php echo esc_html( $settings['agricultural_decisions_text'] ); ?></p>
							</div>
						</div>

						<!-- Limitation of Liability -->
						<div class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-balance-scale"></i>
								</div>
								<h2>Limitation of Liability</h2>
							</div>
							<p><?php echo esc_html( $settings['liability_intro'] ); ?></p>
							<ul class="legal-list">
								<li><i class="fas fa-check"></i> Loss of profits or revenue</li>
								<li><i class="fas fa-check"></i> Loss of data or crop yields</li>
								<li><i class="fas fa-check"></i> Business interruption</li>
								<li><i class="fas fa-check"></i> Loss of goodwill</li>
							</ul>
						</div>

						<!-- Termination -->
						<div id="termination" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-times-circle"></i>
								</div>
								<h2>Termination</h2>
							</div>

							<h3><i class="fas fa-user-times"></i> Termination by You</h3>
							<p><?php echo esc_html( $settings['termination_by_user'] ); ?></p>

							<h3><i class="fas fa-ban"></i> Termination by Meridian Sentinel</h3>
							<p><?php echo esc_html( $settings['termination_by_company'] ); ?></p>

							<div class="termination-effects">
								<h4><i class="fas fa-info-circle"></i> Effect of Termination</h4>
								<p><?php echo esc_html( $settings['termination_effects'] ); ?></p>
							</div>
						</div>

						<!-- Changes to Terms -->
						<div class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-sync-alt"></i>
								</div>
								<h2>Changes to Terms</h2>
							</div>
							<p><?php echo esc_html( $settings['changes_text'] ); ?></p>
						</div>

						<!-- Governing Law -->
						<div class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-gavel"></i>
								</div>
								<h2>Governing Law and Dispute Resolution</h2>
							</div>
							<p><?php echo esc_html( $settings['governing_law_text'] ); ?></p>
						</div>

						<!-- Contact -->
						<div class="legal-section contact-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-envelope"></i>
								</div>
								<h2>Contact Us</h2>
							</div>
							<p><?php echo esc_html( $settings['contact_intro'] ); ?></p>

							<div class="contact-methods">
								<div class="contact-method">
									<i class="fas fa-envelope"></i>
									<strong>Email:</strong>
									<a href="mailto:<?php echo esc_attr( $settings['contact_email'] ); ?>"><?php echo esc_html( $settings['contact_email'] ); ?></a>
								</div>
								<div class="contact-method">
									<i class="fas fa-phone"></i>
									<strong>Phone:</strong>
									<span><?php echo esc_html( $settings['contact_phone'] ); ?></span>
								</div>
								<div class="contact-method">
									<i class="fas fa-map-marker-alt"></i>
									<strong>Address:</strong>
									<span><?php echo esc_html( $settings['contact_address'] ); ?></span>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Terms_Content_Section_Widget() );


