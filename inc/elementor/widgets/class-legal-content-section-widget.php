<?php
/**
 * Elementor Legal Content Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Legal_Content_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-legal-content-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Legal Content Section', 'meridian-africa' );
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
		return array( 'legal', 'content', 'privacy', 'terms', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_sidebar_controls();
		$this->register_introduction_controls();
		$this->register_information_collection_controls();
		$this->register_data_usage_controls();
		$this->register_data_sharing_controls();
		$this->register_data_security_controls();
		$this->register_privacy_rights_controls();
		$this->register_cookies_controls();
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
				'default' => 'Introduction',
			)
		);

		$this->add_control(
			'intro_content',
			array(
				'label'   => esc_html__( 'Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => 'Welcome to Meridian Sentinel. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our satellite-powered agricultural intelligence platform. We are committed to protecting the privacy of farmers, agricultural organizations, and all stakeholders in the agricultural ecosystem.',
			)
		);

		$this->add_control(
			'intro_highlight_text',
			array(
				'label'   => esc_html__( 'Highlight Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<strong>Our Commitment:</strong> As a platform serving farmers and agricultural communities, we understand the sensitivity of agricultural data and are dedicated to maintaining the highest standards of data protection.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Information Collection Controls
	 */
	private function register_information_collection_controls() {
		$this->start_controls_section(
			'information_collection_section',
			array(
				'label' => esc_html__( 'Information We Collect', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'info_collection_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Information We Collect',
			)
		);

		$this->add_control(
			'personal_info_content',
			array(
				'label'   => esc_html__( 'Personal Information Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<h3><i class="fas fa-user"></i> Personal Information</h3><p>We collect information that you provide directly to us, including:</p><ul class="legal-list"><li><i class="fas fa-check"></i> Name, email address, and contact information</li><li><i class="fas fa-check"></i> Farm location and size details</li><li><i class="fas fa-check"></i> Crop types and agricultural practices</li><li><i class="fas fa-check"></i> Payment and billing information</li><li><i class="fas fa-check"></i> Communication preferences</li></ul>',
			)
		);

		$this->add_control(
			'agricultural_data_content',
			array(
				'label'   => esc_html__( 'Agricultural Data Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<h3><i class="fas fa-satellite"></i> Agricultural Data</h3><p>Through our satellite-powered platform, we collect:</p><ul class="legal-list"><li><i class="fas fa-check"></i> Field boundaries and geographic coordinates</li><li><i class="fas fa-check"></i> Crop health indices and vegetation data</li><li><i class="fas fa-check"></i> Soil moisture and weather patterns</li><li><i class="fas fa-check"></i> Yield estimates and harvest predictions</li><li><i class="fas fa-check"></i> Historical farming activity data</li></ul>',
			)
		);

		$this->add_control(
			'technical_info_content',
			array(
				'label'   => esc_html__( 'Technical Information Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<h3><i class="fas fa-mobile-alt"></i> Technical Information</h3><ul class="legal-list"><li><i class="fas fa-check"></i> Device information and IP addresses</li><li><i class="fas fa-check"></i> Browser type and operating system</li><li><i class="fas fa-check"></i> Usage patterns and feature interactions</li><li><i class="fas fa-check"></i> Log files and analytics data</li></ul>',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Data Usage Controls
	 */
	private function register_data_usage_controls() {
		$this->start_controls_section(
			'data_usage_section',
			array(
				'label' => esc_html__( 'How We Use Your Data', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'data_usage_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'How We Use Your Data',
			)
		);

		$this->add_control(
			'data_usage_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We use the collected information for the following purposes:',
			)
		);

		$this->add_control(
			'data_usage_content',
			array(
				'label'   => esc_html__( 'Usage Cards Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div class="usage-grid"><div class="usage-card"><i class="fas fa-leaf"></i><h4>Service Delivery</h4><p>Provide satellite-powered insights, crop monitoring, and agricultural intelligence</p></div><div class="usage-card"><i class="fas fa-chart-bar"></i><h4>Analytics & Improvement</h4><p>Analyze usage patterns to enhance our platform and develop new features</p></div><div class="usage-card"><i class="fas fa-bell"></i><h4>Communications</h4><p>Send alerts, updates, and important agricultural advisories</p></div></div>',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Data Sharing Controls
	 */
	private function register_data_sharing_controls() {
		$this->start_controls_section(
			'data_sharing_section',
			array(
				'label' => esc_html__( 'Data Sharing', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'data_sharing_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data Sharing and Disclosure',
			)
		);

		$this->add_control(
			'data_sharing_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We may share your information in the following circumstances:',
			)
		);

		$this->add_control(
			'data_sharing_content',
			array(
				'label'   => esc_html__( 'Sharing Items Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div class="sharing-item"><h4><i class="fas fa-handshake"></i> With Your Consent</h4><p>We share data with third parties when you explicitly authorize us to do so, such as sharing farm data with cooperatives or financial institutions for loan applications.</p></div><div class="sharing-item"><h4><i class="fas fa-cogs"></i> Service Providers</h4><p>We work with trusted service providers who assist in platform operations, including cloud hosting, payment processing, and satellite data providers. These partners are bound by strict confidentiality agreements.</p></div><div class="sharing-item"><h4><i class="fas fa-gavel"></i> Legal Requirements</h4><p>We may disclose information when required by law, court order, or government regulation, or to protect our rights and safety.</p></div>',
			)
		);

		$this->add_control(
			'data_sharing_alert',
			array(
				'label'   => esc_html__( 'Alert Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We will never sell your personal or agricultural data to third parties for marketing purposes.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Data Security Controls
	 */
	private function register_data_security_controls() {
		$this->start_controls_section(
			'data_security_section',
			array(
				'label' => esc_html__( 'Data Security', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'data_security_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data Security',
			)
		);

		$this->add_control(
			'data_security_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We implement industry-leading security measures to protect your data:',
			)
		);

		$this->add_control(
			'data_security_content',
			array(
				'label'   => esc_html__( 'Security Features Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div class="security-features"><div class="security-feature"><i class="fas fa-key"></i><h4>Encryption</h4><p>End-to-end encryption for data in transit and at rest</p></div><div class="security-feature"><i class="fas fa-server"></i><h4>Secure Infrastructure</h4><p>Enterprise-grade cloud hosting with regular security audits</p></div><div class="security-feature"><i class="fas fa-user-lock"></i><h4>Access Controls</h4><p>Role-based permissions and multi-factor authentication</p></div><div class="security-feature"><i class="fas fa-sync"></i><h4>Regular Backups</h4><p>Automated backups to prevent data loss</p></div></div>',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register Privacy Rights Controls
	 */
	private function register_privacy_rights_controls() {
		$this->start_controls_section(
			'privacy_rights_section',
			array(
				'label' => esc_html__( 'Your Privacy Rights', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'privacy_rights_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Your Privacy Rights',
			)
		);

		$this->add_control(
			'privacy_rights_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'You have the following rights regarding your personal data:',
			)
		);

		$this->add_control(
			'privacy_rights_content',
			array(
				'label'   => esc_html__( 'Rights List Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div class="rights-list"><div class="right-item"><div class="right-icon"><i class="fas fa-eye"></i></div><div class="right-content"><h4>Right to Access</h4><p>Request a copy of all personal data we hold about you</p></div></div><div class="right-item"><div class="right-icon"><i class="fas fa-edit"></i></div><div class="right-content"><h4>Right to Rectification</h4><p>Correct any inaccurate or incomplete information</p></div></div><div class="right-item"><div class="right-icon"><i class="fas fa-trash-alt"></i></div><div class="right-content"><h4>Right to Erasure</h4><p>Request deletion of your personal data under certain conditions</p></div></div><div class="right-item"><div class="right-icon"><i class="fas fa-download"></i></div><div class="right-content"><h4>Data Portability</h4><p>Receive your data in a structured, machine-readable format</p></div></div><div class="right-item"><div class="right-icon"><i class="fas fa-ban"></i></div><div class="right-content"><h4>Right to Object</h4><p>Object to processing of your data for specific purposes</p></div></div></div>',
			)
		);

		$this->add_control(
			'privacy_rights_cta_title',
			array(
				'label'   => esc_html__( 'CTA Box Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Exercise Your Rights',
			)
		);

		$this->add_control(
			'privacy_rights_cta_text',
			array(
				'label'   => esc_html__( 'CTA Box Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'To exercise any of these rights, please contact us at compliance@merdianafrica.io',
			)
		);

		$this->add_control(
			'privacy_rights_cta_email',
			array(
				'label'   => esc_html__( 'Contact Email', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'hello@meridianafrica.io',
			)
		);

		$this->add_control(
			'privacy_rights_cta_button_text',
			array(
				'label'   => esc_html__( 'CTA Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Contact Privacy Team',
			)
		);

		$this->add_control(
			'privacy_rights_cta_button_link',
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
	 * Register Cookies Controls
	 */
	private function register_cookies_controls() {
		$this->start_controls_section(
			'cookies_section',
			array(
				'label' => esc_html__( 'Cookies', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'cookies_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Cookies and Tracking Technologies',
			)
		);

		$this->add_control(
			'cookies_intro',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We use cookies and similar technologies to enhance your experience:',
			)
		);

		$this->add_control(
			'cookies_content',
			array(
				'label'   => esc_html__( 'Cookie Types Content', 'meridian-africa' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div class="cookie-types"><div class="cookie-type"><h4><i class="fas fa-cog"></i> Essential Cookies</h4><p>Required for basic platform functionality and security</p></div><div class="cookie-type"><h4><i class="fas fa-chart-pie"></i> Analytics Cookies</h4><p>Help us understand how users interact with our platform</p></div><div class="cookie-type"><h4><i class="fas fa-sliders-h"></i> Preference Cookies</h4><p>Remember your settings and personalization choices</p></div></div>',
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
				'default' => 'If you have questions about this Privacy Policy, please contact us:',
			)
		);

		$this->add_control(
			'contact_email',
			array(
				'label'   => esc_html__( 'Email Address', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'compliance@meridianafrica.io',
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
								<a href="privacy.html" class="sidebar-link active">
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
							<?php echo wp_kses_post( $settings['intro_content'] ); ?>
							<div class="highlight-box">
								<i class="fas fa-seedling"></i>
								<p><?php echo wp_kses_post( $settings['intro_highlight_text'] ); ?></p>
							</div>
						</div>

						<!-- Information Collection -->
						<div id="information-collection" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-database"></i>
								</div>
								<h2><?php echo esc_html( $settings['info_collection_title'] ); ?></h2>
							</div>

							<?php echo wp_kses_post( $settings['personal_info_content'] ); ?>
							<?php echo wp_kses_post( $settings['agricultural_data_content'] ); ?>
							<?php echo wp_kses_post( $settings['technical_info_content'] ); ?>
						</div>

						<!-- Data Usage -->
						<div id="data-usage" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-chart-line"></i>
								</div>
								<h2><?php echo esc_html( $settings['data_usage_title'] ); ?></h2>
							</div>
							<p><?php echo esc_html( $settings['data_usage_intro'] ); ?></p>

							<?php echo wp_kses_post( $settings['data_usage_content'] ); ?>
						</div>

						<!-- Data Sharing -->
						<div id="data-sharing" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-share-alt"></i>
								</div>
								<h2><?php echo esc_html( $settings['data_sharing_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['data_sharing_intro'] ); ?></p>

							<?php echo wp_kses_post( $settings['data_sharing_content'] ); ?>

							<div class="alert-box">
								<i class="fas fa-exclamation-triangle"></i>
								<strong>Important:</strong> <?php echo esc_html( $settings['data_sharing_alert'] ); ?>
							</div>
						</div>

						<!-- Data Security -->
						<div id="data-security" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-lock"></i>
								</div>
								<h2><?php echo esc_html( $settings['data_security_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['data_security_intro'] ); ?></p>

							<?php echo wp_kses_post( $settings['data_security_content'] ); ?>
						</div>

						<!-- Your Rights -->
						<div id="your-rights" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-user-shield"></i>
								</div>
								<h2><?php echo esc_html( $settings['privacy_rights_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['privacy_rights_intro'] ); ?></p>

							<?php echo wp_kses_post( $settings['privacy_rights_content'] ); ?>

							<div class="cta-box">
								<h4><?php echo esc_html( $settings['privacy_rights_cta_title'] ); ?></h4>
								<p><?php echo wp_kses_post( $settings['privacy_rights_cta_text'] ); ?> <a href="mailto:<?php echo esc_attr( $settings['privacy_rights_cta_email'] ); ?>"><?php echo esc_html( $settings['privacy_rights_cta_email'] ); ?></a></p>
								<?php
								$rights_cta_link = $settings['privacy_rights_cta_button_link']['url'];
								$rights_cta_target = $settings['privacy_rights_cta_button_link']['is_external'] ? ' target="_blank"' : '';
								$rights_cta_nofollow = $settings['privacy_rights_cta_button_link']['nofollow'] ? ' rel="nofollow"' : '';
								?>
								<a href="<?php echo esc_url( $rights_cta_link ); ?>"<?php echo $rights_cta_target . $rights_cta_nofollow; ?> class="btn-primary"><?php echo esc_html( $settings['privacy_rights_cta_button_text'] ); ?></a>
							</div>
						</div>

						<!-- Cookies -->
						<div id="cookies" class="legal-section">
							<div class="protection-wrapper">
								<div class="section-icon">
									<i class="fas fa-cookie-bite"></i>
								</div>
								<h2><?php echo esc_html( $settings['cookies_title'] ); ?></h2>
							</div>

							<p><?php echo esc_html( $settings['cookies_intro'] ); ?></p>

							<?php echo wp_kses_post( $settings['cookies_content'] ); ?>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Legal_Content_Section_Widget() );

