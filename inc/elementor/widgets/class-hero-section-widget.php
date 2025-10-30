<?php
/**
 * Elementor Hero Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Hero_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-hero-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Hero Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-header';
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
		return array( 'hero', 'header', 'banner', 'meridian', 'agrovue' );
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
		// Badge Section
		$this->start_controls_section(
			'badge_section',
			array(
				'label' => esc_html__( 'Badge', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '🌾',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Verification Infrastructure for African Agriculture',
			)
		);

		$this->end_controls_section();

		// Title Section
		$this->start_controls_section(
			'title_section',
			array(
				'label' => esc_html__( 'Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title_line_1',
			array(
				'label'   => esc_html__( 'Title Line 1', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'The Authoritative Truth Layer For ',
			)
		);

		$this->add_control(
			'title_line_2',
			array(
				'label'   => esc_html__( 'Title Line 2', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'African Agriculture',
			)
		);

		$this->end_controls_section();

		// Subtitle Section
		$this->start_controls_section(
			'subtitle_section',
			array(
				'label' => esc_html__( 'Subtitle', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Satellite-powered verification infrastructure that prevents fraud, ensures transparency, and delivers accountability. Designed for African governments and development institutions managing agricultural programs at scale.',
			)
		);

		$this->end_controls_section();

		// Buttons Section
		$this->start_controls_section(
			'buttons_section',
			array(
				'label' => esc_html__( 'Buttons', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'primary_button_text',
			array(
				'label'   => esc_html__( 'Primary Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Schedule Consultation',
			)
		);

		$this->add_control(
			'primary_button_link',
			array(
				'label'   => esc_html__( 'Primary Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#contact-section',
				),
			)
		);

		$this->add_control(
			'secondary_button_text',
			array(
				'label'   => esc_html__( 'Secondary Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'See the Evidence',
			)
		);

		$this->add_control(
			'secondary_button_link',
			array(
				'label'   => esc_html__( 'Secondary Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#verification-crisis',
				),
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
			'background_color',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#0E172A',
				'selectors' => array(
					'{{WRAPPER}} .meridian-hero' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Title Style
		$this->start_controls_section(
			'title_style',
			array(
				'label' => esc_html__( 'Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .hero-title',
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

		// Enqueue the hero section script
		wp_enqueue_script( 'meridian-hero-section' );

		$primary_button_url = ! empty( $settings['primary_button_link']['url'] ) ? $settings['primary_button_link']['url'] : '#';
		$secondary_button_url = ! empty( $settings['secondary_button_link']['url'] ) ? $settings['secondary_button_link']['url'] : '#';
		?>

		<section id="home" class="meridian-hero hero">
			<div class="hero-background">
				<div class="animated-bg"></div>
				<div class="floating-shapes">
					<div class="shape shape-1"></div>
					<div class="shape shape-2"></div>
					<div class="shape shape-3"></div>
					<div class="shape shape-4"></div>
				</div>
			</div>
			<div class="container hero-container">
				<div class="hero-content">
					<div class="hero-badge">
						<span class="badge-icon"><?php echo esc_html( $settings['badge_icon'] ); ?></span>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h1 class="hero-title">
						<span class="word"><?php echo esc_html( $settings['title_line_1'] ); ?></span>
						<span class="word-wrapper"><?php echo esc_html( $settings['title_line_2'] ); ?></span>
					</h1>
					<p class="hero-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p>
					<div class="hero-buttons">
						<a href="<?php echo esc_url( $primary_button_url ); ?>" class="btn-primary btn-large btn-glow">
							<span><?php echo esc_html( $settings['primary_button_text'] ); ?></span>
							<i class="fas fa-arrow-right"></i>
						</a>
						<a href="<?php echo esc_url( $secondary_button_url ); ?>" class="btn-secondary btn-large">
							<span><?php echo esc_html( $settings['secondary_button_text'] ); ?></span>
							<i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</div>
				<div class="hero-visual">
					<div class="satellite-container">
						<div class="satellite">
							<i class="fas fa-satellite"></i>
						</div>
						<div class="orbit"></div>
						<div class="orbit orbit-2"></div>
						<div class="orbit orbit-3"></div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Hero_Section_Widget() );

