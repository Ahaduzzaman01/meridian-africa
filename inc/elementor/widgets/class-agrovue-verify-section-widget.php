<?php
/**
 * Elementor Agrovue Verify Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Agrovue_Verify_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-agrovue-verify-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Agrovue Verify Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-check-circle';
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
		return array( 'agrovue', 'verify', 'verification', 'fraud', 'integrity', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_header_controls();
		$this->register_card_1_controls();
		$this->register_card_2_controls();
		$this->register_card_3_controls();
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
				'default' => 'fas fa-check-circle',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Ways We Eliminate Fraud at Scale',
			)
		);

		$this->add_control(
			'main_title',
			array(
				'label'   => esc_html__( 'Main Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'Satellite-Powered <span class="word-wrapper">Program Integrity</span>',
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'Achieve 100% Beneficiary Verification and Automated Fraud Intelligence for Global Aid.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register card 1 controls.
	 *
	 * @since 1.0.0
	 */
	private function register_card_1_controls() {
		$this->start_controls_section(
			'card_1_section',
			array(
				'label' => esc_html__( 'Card 1: Universal Program Coverage', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'card_1_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-alt',
			)
		);

		$this->add_control(
			'card_1_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Universal Program Coverage',
			)
		);

		$this->add_control(
			'card_1_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Verify every single beneficiary in your agricultural program using satellite imagery updated every 5 days. Move beyond statistical sampling to 100% verification coverage—ensuring no ghost farmer goes undetected and every legitimate farmer receives their entitled support.',
			)
		);

		$this->add_control(
			'card_1_aos_delay',
			array(
				'label'   => esc_html__( 'AOS Delay (ms)', 'meridian-africa' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 100,
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register card 2 controls.
	 *
	 * @since 1.0.0
	 */
	private function register_card_2_controls() {
		$this->start_controls_section(
			'card_2_section',
			array(
				'label' => esc_html__( 'Card 2: Automated Fraud Intelligence', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'card_2_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-eye',
			)
		);

		$this->add_control(
			'card_2_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Automated Fraud Intelligence',
			)
		);

		$this->add_control(
			'card_2_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Advanced machine learning models analyze field boundaries, vegetation patterns, and crop development to automatically flag ghost farms, area inflation, and misreported crops. Surface high-risk cases for investigation within 48 hours while auto-verifying legitimate beneficiaries—freeing your team to focus on program delivery.',
			)
		);

		$this->add_control(
			'card_2_aos_delay',
			array(
				'label'   => esc_html__( 'AOS Delay (ms)', 'meridian-africa' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 200,
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register card 3 controls.
	 *
	 * @since 1.0.0
	 */
	private function register_card_3_controls() {
		$this->start_controls_section(
			'card_3_section',
			array(
				'label' => esc_html__( 'Card 3: Development-Grade Documentation', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'card_3_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-clipboard-check',
			)
		);

		$this->add_control(
			'card_3_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Development-Grade Documentation',
			)
		);

		$this->add_control(
			'card_3_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Generate comprehensive verification reports meeting World Bank, AfDB, and international donor standards. Every assessment includes satellite imagery evidence, geospatial accuracy metrics, and audit trails—providing the documentation development institutions require for program approval and disbursement.',
			)
		);

		$this->add_control(
			'card_3_aos_delay',
			array(
				'label'   => esc_html__( 'AOS Delay (ms)', 'meridian-africa' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 300,
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

		<!-- Agrovue Verify Section - NEW PREMIUM SECTION -->
		<section class="agrovue-verify-section">
			<div class="verify-bg">
				<div class="verify-gradient-orb orb-1"></div>
				<div class="verify-gradient-orb orb-2"></div>
				<div class="verify-gradient-orb orb-3"></div>
			</div>
			<div class="container">
				<!-- Section Header -->
				<div class="verify-section-header">
					<div class="verify-flagship-badge">
						<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2 class="verify-section-title">
						<span><?php echo wp_kses_post( $settings['main_title'] ); ?></span>
					</h2>
					<p class="verify-section-description">
						<?php echo esc_html( $settings['subtitle'] ); ?>
					</p>
				</div>

				<!-- Feature Cards Grid -->
				<div class="verify-cards-grid">
					<!-- Card 1 -->
					<div class="verify-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $settings['card_1_aos_delay'] ); ?>">
						<div class="verify-card-inner">
							<div class="verify-card-icon">
								<i class="<?php echo esc_attr( $settings['card_1_icon'] ); ?>"></i>
							</div>
							<h3 class="verify-card-title"><?php echo esc_html( $settings['card_1_title'] ); ?></h3>
							<p class="verify-card-description">
								<?php echo esc_html( $settings['card_1_description'] ); ?>
							</p>
						</div>
					</div>

					<!-- Card 2 -->
					<div class="verify-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $settings['card_2_aos_delay'] ); ?>">
						<div class="verify-card-inner">
							<div class="verify-card-icon">
								<i class="<?php echo esc_attr( $settings['card_2_icon'] ); ?>"></i>
							</div>
							<h3 class="verify-card-title"><?php echo esc_html( $settings['card_2_title'] ); ?></h3>
							<p class="verify-card-description">
								<?php echo esc_html( $settings['card_2_description'] ); ?>
							</p>
						</div>
					</div>

					<!-- Card 3 -->
					<div class="verify-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $settings['card_3_aos_delay'] ); ?>">
						<div class="verify-card-inner">
							<div class="verify-card-icon">
								<i class="<?php echo esc_attr( $settings['card_3_icon'] ); ?>"></i>
							</div>
							<h3 class="verify-card-title"><?php echo esc_html( $settings['card_3_title'] ); ?></h3>
							<p class="verify-card-description">
								<?php echo esc_html( $settings['card_3_description'] ); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Agrovue_Verify_Section_Widget() );

