<?php
/**
 * Elementor Team Hero Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Team_Hero_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-team-hero-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Team Hero Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
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
		return array( 'team', 'hero', 'founder', 'meridian', 'header' );
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
		// Title Section
		$this->start_controls_section(
			'title_section',
			array(
				'label' => esc_html__( 'Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'hero_title',
			array(
				'label'   => esc_html__( 'Hero Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Meet the Team Behind <span class="hero-highlight">Meridian Sentinel</span>',
				'description' => esc_html__( 'Use <span class="hero-highlight">text</span> to highlight specific words', 'meridian-africa' ),
			)
		);

		$this->add_control(
			'hero_subtitle',
			array(
				'label'   => esc_html__( 'Hero Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'Transforming African agriculture through innovation, transparency, and technology',
			)
		);

		$this->end_controls_section();

		// Scroll Indicator Section
		$this->start_controls_section(
			'scroll_section',
			array(
				'label' => esc_html__( 'Scroll Indicator', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_scroll_indicator',
			array(
				'label'        => esc_html__( 'Show Scroll Indicator', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
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
				'selectors' => array(
					'{{WRAPPER}} .founder-hero-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .founder-hero-title',
			)
		);

		$this->add_control(
			'highlight_color',
			array(
				'label'     => esc_html__( 'Highlight Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .hero-highlight' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Subtitle Style
		$this->start_controls_section(
			'subtitle_style',
			array(
				'label' => esc_html__( 'Subtitle', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .founder-hero-subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .founder-hero-subtitle',
			)
		);

		$this->end_controls_section();

		// Background Style
		$this->start_controls_section(
			'background_style',
			array(
				'label' => esc_html__( 'Background', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'min_height',
			array(
				'label'      => esc_html__( 'Minimum Height', 'meridian-africa' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'vh', 'px' ),
				'range'      => array(
					'vh' => array(
						'min' => 30,
						'max' => 100,
					),
					'px' => array(
						'min' => 300,
						'max' => 1000,
					),
				),
				'default'    => array(
					'unit' => 'vh',
					'size' => 60,
				),
				'selectors'  => array(
					'{{WRAPPER}} .founder-hero' => 'min-height: {{SIZE}}{{UNIT}}',
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

		// Enqueue the founders CSS
		wp_enqueue_style( 'meridian-founders' );
		
		// Enqueue AOS library for animations
		wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
		wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );
		
		// Initialize AOS
		wp_add_inline_script( 'aos-js', 'AOS.init();' );
		?>

		<!-- Hero Section -->
		<section class="founder-hero">
			<div class="founder-hero-bg">
				<div class="hero-pattern"></div>
				<div class="hero-gradient"></div>
			</div>
			<div class="container">
				<div class="founder-hero-content" data-aos="fade-up">
					<h1 class="founder-hero-title"><?php echo wp_kses_post( $settings['hero_title'] ); ?></h1>
					<p class="founder-hero-subtitle"><?php echo esc_html( $settings['hero_subtitle'] ); ?></p>
				</div>
			</div>
			<?php if ( 'yes' === $settings['show_scroll_indicator'] ) : ?>
			<div class="scroll-indicator">
				<div class="scroll-arrow"></div>
			</div>
			<?php endif; ?>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Team_Hero_Section_Widget() );

