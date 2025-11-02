<?php
/**
 * Elementor Modern Contact Form Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Modern_Contact_Form_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-modern-contact-form-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Modern Contact Form Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-form-horizontal';
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
		return array( 'contact', 'form', 'modern', 'footer', 'consultation', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_content_controls();
		$this->register_contact_info_controls();
	}

	/**
	 * Register content controls.
	 *
	 * @since 1.0.0
	 */
	private function register_content_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-paper-plane',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'GET IN TOUCH',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Partner with Meridian Africa',
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Schedule a consultation to discuss how satellite verification infrastructure can transform your agricultural programs, prevent fraud, and maximize impacts.',
				'rows'    => 3,
			)
		);

		$this->add_control(
			'submit_button_icon',
			array(
				'label'   => esc_html__( 'Submit Button Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-calendar-check',
			)
		);

		$this->add_control(
			'submit_button_text',
			array(
				'label'   => esc_html__( 'Submit Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Schedule Consultation',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register contact info controls.
	 *
	 * @since 1.0.0
	 */
	private function register_contact_info_controls() {
		$this->start_controls_section(
			'contact_info_section',
			array(
				'label' => esc_html__( 'Contact Information', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'email',
			array(
				'label'   => esc_html__( 'Email Address', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'sales@meridianafrica.io',
			)
		);

		$this->add_control(
			'phone',
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

		<!-- Modern Contact Form Section -->
		<section id="contact-section" class="footer-contact-section">
			<div class="footer-contact-bg">
				<div class="contact-gradient-orb orb-1"></div>
				<div class="contact-gradient-orb orb-2"></div>
				<div class="contact-gradient-orb orb-3"></div>
			</div>
			<div class="container">
				<div class="footer-contact-wrapper">
					<div class="footer-contact-content">
						<div class="contact-badge-modern">
							<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
							<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
						</div>
						<h2 class="footer-contact-title"><?php echo esc_html( $settings['title'] ); ?></h2>
						<p class="footer-contact-description"><?php echo esc_html( $settings['description'] ); ?></p>
						<div class="contact-info-quick">
							<div class="quick-info-item">
								<i class="fas fa-envelope"></i>
								<span><?php echo esc_html( $settings['email'] ); ?></span>
							</div>
							<div class="quick-info-item">
								<i class="fas fa-phone"></i>
								<span><?php echo esc_html( $settings['phone'] ); ?></span>
							</div>
						</div>
					</div>
					<div class="footer-contact-form-container">
						<form class="footer-contact-form" id="footerContactForm">
							<div class="form-group-modern">
								<input type="text" id="footerName" name="fullName" class="form-input-modern" placeholder=" " required>
								<label for="footerName" class="form-label-modern">Full Name *</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<input type="text" id="footerPosition" name="position" class="form-input-modern" placeholder=" " required>
								<label for="footerPosition" class="form-label-modern">Title / Position *</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<input type="email" id="footerEmail" name="email" class="form-input-modern" placeholder=" " required>
								<label for="footerEmail" class="form-label-modern">Official Email *</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<input type="text" id="footerOrganization" name="organization" class="form-input-modern" placeholder="Ministry, World Bank, AfDB, etc." required>
								<label for="footerOrganization" class="form-label-modern">Organization *</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<select id="footerOrgType" name="organizationType" class="form-select-modern" required>
									<option value="">Select type</option>
									<option value="government">Government Ministry</option>
									<option value="development">Development Bank</option>
									<option value="ngo">NGO/Non-Profit</option>
									<option value="private">Private Sector</option>
									<option value="research">Research Institution</option>
									<option value="other">Other</option>
								</select>
								<label for="footerOrgType" class="form-label-modern select-label-modern">Organization Type *</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<select id="footerCountry" name="country" class="form-select-modern" required>
									<option value="">Select country</option>
									<option value="nigeria">Nigeria</option>
									<option value="kenya">Kenya</option>
									<option value="ghana">Ghana</option>
									<option value="ethiopia">Ethiopia</option>
									<option value="south-africa">South Africa</option>
									<option value="tanzania">Tanzania</option>
									<option value="uganda">Uganda</option>
									<option value="rwanda">Rwanda</option>
									<option value="senegal">Senegal</option>
									<option value="other">Other</option>
								</select>
								<label for="footerCountry" class="form-label-modern select-label-modern">Country *</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<select id="footerBeneficiaries" name="beneficiaries" class="form-select-modern">
									<option value="">Pilot (&lt;5,000)</option>
									<option value="small">Small (5,000 - 25,000)</option>
									<option value="medium">Medium (25,000 - 100,000)</option>
									<option value="large">Large (100,000 - 500,000)</option>
									<option value="xlarge">Very Large (500,000+)</option>
								</select>
								<label for="footerBeneficiaries" class="form-label-modern select-label-modern">Estimated Beneficiaries</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-group-modern">
								<textarea id="footerContext" name="context" class="form-textarea-modern" placeholder=" " rows="5"></textarea>
								<label for="footerContext" class="form-label-modern">Additional Context</label>
								<div class="form-input-border"></div>
							</div>

							<div class="form-actions-modern">
								<button type="submit" class="btn-submit-modern">
									<i class="<?php echo esc_attr( $settings['submit_button_icon'] ); ?>"></i>
									<span><?php echo esc_html( $settings['submit_button_text'] ); ?></span>
								</button>
							</div>
							<div class="form-message-modern" id="footerFormMessage"></div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Meridian_Africa_Modern_Contact_Form_Section_Widget() );

