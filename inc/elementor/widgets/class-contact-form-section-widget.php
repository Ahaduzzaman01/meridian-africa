<?php
/**
 * Elementor Contact Form Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Contact_Form_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-contact-form-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Contact Form Section', 'meridian-africa' );
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
		return array( 'contact', 'form', 'consultation', 'schedule', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_header_controls();
		$this->register_form_controls();
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
				'default' => 'Get in Touch',
			)
		);

		$this->add_control(
			'header_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Send Us a Message',
			)
		);

		$this->add_control(
			'header_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'We\'d love to hear from you. Fill out the form below and we\'ll get back to you shortly.',
				'rows'    => 2,
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register form controls.
	 *
	 * @since 1.0.0
	 */
	private function register_form_controls() {
		$this->start_controls_section(
			'form_section',
			array(
				'label' => esc_html__( 'Form Settings', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- Contact Form Section -->
		<section class="contact-form-section">
			<div class="contact-form-bg">
				<div class="form-shape shape-1"></div>
				<div class="form-shape shape-2"></div>
				<div class="form-shape shape-3"></div>
			</div>
			<div class="container">
				<div class="contact-form-wrapper">
					<div class="contact-form-header">
						<div class="form-header-badge">
							<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
							<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
						</div>
						<h2><?php echo esc_html( $settings['header_title'] ); ?></h2>
						<p><?php echo esc_html( $settings['header_subtitle'] ); ?></p>
					</div>

					<form class="contact-form-modern" id="contactForm">
						<div class="form-group-contact">
							<input type="text" id="fullName" name="fullName" class="form-input-contact" placeholder=" " required>
							<label for="fullName" class="form-label-contact">Full Name *</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<input type="text" id="position" name="position" class="form-input-contact" placeholder=" " required>
							<label for="position" class="form-label-contact">Title / Position *</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<input type="email" id="email" name="email" class="form-input-contact" placeholder=" " required>
							<label for="email" class="form-label-contact">Official Email *</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<input type="text" id="organization" name="organization" class="form-input-contact" placeholder="Ministry, World Bank, AfDB, etc." required>
							<label for="organization" class="form-label-contact">Organization *</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<select id="organizationType" name="organizationType" class="form-select-contact" required>
								<option value="">Select type</option>
								<option value="government">Government Ministry</option>
								<option value="development">Development Bank</option>
								<option value="ngo">NGO/Non-Profit</option>
								<option value="private">Private Sector</option>
								<option value="research">Research Institution</option>
								<option value="other">Other</option>
							</select>
							<label for="organizationType" class="form-label-contact select-label">Organization Type *</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<select id="country" name="country" class="form-select-contact" required>
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
							<label for="country" class="form-label-contact select-label">Country *</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<select id="beneficiaries" name="beneficiaries" class="form-select-contact">
								<option value="">Pilot (&lt;5,000)</option>
								<option value="small">Small (5,000 - 25,000)</option>
								<option value="medium">Medium (25,000 - 100,000)</option>
								<option value="large">Large (100,000 - 500,000)</option>
								<option value="xlarge">Very Large (500,000+)</option>
							</select>
							<label for="beneficiaries" class="form-label-contact select-label">Estimated Beneficiaries</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-group-contact">
							<textarea id="context" name="context" class="form-textarea-contact" placeholder=" " rows="5"></textarea>
							<label for="context" class="form-label-contact">Additional Context</label>
							<div class="form-border-contact"></div>
						</div>

						<div class="form-actions-contact">
							<button type="submit" class="btn-submit-contact">
								<i class="<?php echo esc_attr( $settings['submit_button_icon'] ); ?>"></i>
								<span><?php echo esc_html( $settings['submit_button_text'] ); ?></span>
							</button>
						</div>

						<div class="form-message" id="formMessage"></div>
					</form>
				</div>
			</div>
		</section>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Meridian_Africa_Contact_Form_Section_Widget() );

