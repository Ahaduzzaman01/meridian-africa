<?php
/**
 * Elementor Contact Information Cards Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Contact_Info_Cards_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-contact-info-cards';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Contact Information Cards', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-info-box';
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
		return array( 'contact', 'info', 'cards', 'email', 'phone', 'location', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_header_controls();
		$this->register_email_card_controls();
		$this->register_phone_card_controls();
		$this->register_location_card_controls();
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
			'header_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Multiple Ways to Reach Us',
			)
		);

		$this->add_control(
			'header_subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Choose the contact method that works best for you',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register email card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_email_card_controls() {
		$this->start_controls_section(
			'email_card_section',
			array(
				'label' => esc_html__( 'Email Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_email_card',
			array(
				'label'        => esc_html__( 'Show Email Card', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'email_icon',
			array(
				'label'     => esc_html__( 'Icon (Font Awesome class)', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'fas fa-envelope',
				'condition' => array(
					'show_email_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'email_title',
			array(
				'label'     => esc_html__( 'Title', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Email Us',
				'condition' => array(
					'show_email_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'email_description',
			array(
				'label'     => esc_html__( 'Description', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => 'Questions? Want to know how we can help you manage agricultural program at scale? Send us a note, and we\'ll get back to you shortly',
				'rows'      => 3,
				'condition' => array(
					'show_email_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'email_address',
			array(
				'label'     => esc_html__( 'Email Address', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'hello@meridianafrica.io',
				'condition' => array(
					'show_email_card' => 'yes',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register phone card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_phone_card_controls() {
		$this->start_controls_section(
			'phone_card_section',
			array(
				'label' => esc_html__( 'Phone Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_phone_card',
			array(
				'label'        => esc_html__( 'Show Phone Card', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'phone_icon',
			array(
				'label'     => esc_html__( 'Icon (Font Awesome class)', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'fas fa-phone',
				'condition' => array(
					'show_phone_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'phone_title',
			array(
				'label'     => esc_html__( 'Title', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Call Us',
				'condition' => array(
					'show_phone_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'phone_description',
			array(
				'label'     => esc_html__( 'Description', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => 'Speak directly with our team during business hours (Mon-Fri, 9AM-6PM WAT).',
				'rows'      => 3,
				'condition' => array(
					'show_phone_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'phone_number',
			array(
				'label'     => esc_html__( 'Phone Number', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '+447438993162',
				'condition' => array(
					'show_phone_card' => 'yes',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register location card controls.
	 *
	 * @since 1.0.0
	 */
	private function register_location_card_controls() {
		$this->start_controls_section(
			'location_card_section',
			array(
				'label' => esc_html__( 'Location Card', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_location_card',
			array(
				'label'        => esc_html__( 'Show Location Card', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'location_icon',
			array(
				'label'     => esc_html__( 'Icon (Font Awesome class)', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'fas fa-map-marker-alt',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'location_title',
			array(
				'label'     => esc_html__( 'Title', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Visit Us',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'location_description',
			array(
				'label'     => esc_html__( 'Description', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => 'Our offices are located in two strategic locations',
				'rows'      => 2,
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		// UK Office
		$this->add_control(
			'uk_office_heading',
			array(
				'label'     => esc_html__( 'UK Office', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'uk_flag_image',
			array(
				'label'     => esc_html__( 'UK Flag Image', 'meridian-africa' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => MERIDIAN_THEME_URI . '/agrovue-landing-html/image/uk.png',
				),
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'uk_country',
			array(
				'label'     => esc_html__( 'Country Name', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'United Kingdom',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'uk_address',
			array(
				'label'     => esc_html__( 'Address', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '17 Cavendish Street, Sheffield. S37SS',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		// Nigeria Office
		$this->add_control(
			'nigeria_office_heading',
			array(
				'label'     => esc_html__( 'Nigeria Office', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'nigeria_flag_image',
			array(
				'label'     => esc_html__( 'Nigeria Flag Image', 'meridian-africa' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => MERIDIAN_THEME_URI . '/agrovue-landing-html/image/naijriya.png',
				),
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'nigeria_country',
			array(
				'label'     => esc_html__( 'Country Name', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Nigeria',
				'condition' => array(
					'show_location_card' => 'yes',
				),
			)
		);

		$this->add_control(
			'nigeria_address',
			array(
				'label'     => esc_html__( 'Address', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '50 Ebitu Ukiwe Street, Jabi, Abuja',
				'condition' => array(
					'show_location_card' => 'yes',
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

		<!-- Contact Information Cards -->
		<section class="contact-info-section">
			<div class="container">
				<div class="contact-info-header">
					<h2><?php echo esc_html( $settings['header_title'] ); ?></h2>
					<p><?php echo esc_html( $settings['header_subtitle'] ); ?></p>
				</div>
				<div class="contact-info-grid">
					<?php if ( 'yes' === $settings['show_email_card'] ) : ?>
						<!-- Email Card -->
						<div class="contact-info-card card-email">
							<div class="card-icon-wrapper">
								<div class="contact-info-icon">
									<i class="<?php echo esc_attr( $settings['email_icon'] ); ?>"></i>
								</div>
								<div class="icon-bg"></div>
							</div>
							<h3><?php echo esc_html( $settings['email_title'] ); ?></h3>
							<p><?php echo esc_html( $settings['email_description'] ); ?></p>
							<a href="mailto:<?php echo esc_attr( $settings['email_address'] ); ?>" class="contact-link">
								<span><?php echo esc_html( $settings['email_address'] ); ?></span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					<?php endif; ?>

					<?php if ( 'yes' === $settings['show_phone_card'] ) : ?>
						<!-- Phone Card -->
						<div class="contact-info-card card-phone">
							<div class="card-icon-wrapper">
								<div class="contact-info-icon">
									<i class="<?php echo esc_attr( $settings['phone_icon'] ); ?>"></i>
								</div>
								<div class="icon-bg"></div>
							</div>
							<h3><?php echo esc_html( $settings['phone_title'] ); ?></h3>
							<p><?php echo esc_html( $settings['phone_description'] ); ?></p>
							<a href="tel:<?php echo esc_attr( $settings['phone_number'] ); ?>" class="contact-link">
								<span><?php echo esc_html( $settings['phone_number'] ); ?></span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					<?php endif; ?>

					<?php if ( 'yes' === $settings['show_location_card'] ) : ?>
						<!-- Location Card -->
						<div class="contact-info-card card-location">
							<div class="card-icon-wrapper">
								<div class="contact-info-icon">
									<i class="<?php echo esc_attr( $settings['location_icon'] ); ?>"></i>
								</div>
								<div class="icon-bg"></div>
							</div>
							<h3><?php echo esc_html( $settings['location_title'] ); ?></h3>
							<p><?php echo esc_html( $settings['location_description'] ); ?></p>

							<div class="office-locations">
								<!-- UK Office -->
								<div class="office-card">
									<div class="office-flag">
										<img src="<?php echo esc_url( $settings['uk_flag_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['uk_country'] ); ?> Flag" class="flag-img">
									</div>
									<div class="office-details">
										<h4 class="office-country"><?php echo esc_html( $settings['uk_country'] ); ?></h4>
										<p class="office-address">
											<i class="fas fa-location-dot"></i>
											<?php echo esc_html( $settings['uk_address'] ); ?>
										</p>
									</div>
								</div>

								<!-- Nigeria Office -->
								<div class="office-card">
									<div class="office-flag">
										<img src="<?php echo esc_url( $settings['nigeria_flag_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['nigeria_country'] ); ?> Flag" class="flag-img">
									</div>
									<div class="office-details">
										<h4 class="office-country"><?php echo esc_html( $settings['nigeria_country'] ); ?></h4>
										<p class="office-address">
											<i class="fas fa-location-dot"></i>
											<?php echo esc_html( $settings['nigeria_address'] ); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Meridian_Africa_Contact_Info_Cards_Widget() );

