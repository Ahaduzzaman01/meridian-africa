<?php
/**
 * Elementor Founder CTA Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Founder_CTA_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-founder-cta-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Founder CTA Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
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
		return array( 'cta', 'call to action', 'founder', 'team', 'button', 'meridian', 'agrovue' );
	}

	/**
	 * Get style dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		return array( 'meridian-founders', 'aos-css' );
	}

	/**
	 * Get script dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array( 'aos-js', 'meridian-founders-js' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_content_controls();
	}

	/**
	 * Register content controls.
	 *
	 * @since 1.0.0
	 */
	private function register_content_controls() {
		// Content Section
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'cta_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Join Us in Transforming African Agriculture',
			)
		);

		$this->add_control(
			'cta_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'Be part of the revolution bringing transparency, efficiency, and trust to agricultural programs across Africa.',
			)
		);

		$this->end_controls_section();

		// Primary Button Section
		$this->start_controls_section(
			'primary_button_section',
			array(
				'label' => esc_html__( 'Primary Button', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'primary_button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Get in Touch',
			)
		);

		$this->add_control(
			'primary_button_link',
			array(
				'label'   => esc_html__( 'Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => 'contact.html',
				),
			)
		);

		$this->add_control(
			'primary_button_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-arrow-right',
			)
		);

		$this->end_controls_section();

		// Secondary Button Section
		$this->start_controls_section(
			'secondary_button_section',
			array(
				'label' => esc_html__( 'Secondary Button', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'secondary_button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Explore Solutions',
			)
		);

		$this->add_control(
			'secondary_button_link',
			array(
				'label'   => esc_html__( 'Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => 'solutions.html',
				),
			)
		);

		$this->add_control(
			'secondary_button_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-external-link-alt',
			)
		);

		$this->end_controls_section();

		// Animation Section
		$this->start_controls_section(
			'animation_section',
			array(
				'label' => esc_html__( 'Animation', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'enable_aos',
			array(
				'label'        => esc_html__( 'Enable AOS Animation', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'aos_animation',
			array(
				'label'     => esc_html__( 'AOS Animation Type', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'zoom-in',
				'condition' => array(
					'enable_aos' => 'yes',
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
		
		// Enqueue founders JS
		wp_enqueue_script( 'meridian-founders-js' );
		
		// Initialize AOS
		wp_add_inline_script( 'aos-js', 'AOS.init();' );

		$primary_button_url = ! empty( $settings['primary_button_link']['url'] ) ? $settings['primary_button_link']['url'] : '#';
		$secondary_button_url = ! empty( $settings['secondary_button_link']['url'] ) ? $settings['secondary_button_link']['url'] : '#';
		
		$aos_attr = '';
		if ( 'yes' === $settings['enable_aos'] ) {
			$aos_attr = ' data-aos="' . esc_attr( $settings['aos_animation'] ) . '"';
		}
		?>

		<!-- CTA Section -->
		<section class="founder-cta">
			<div class="container">
				<div class="cta-content"<?php echo $aos_attr; ?>>
					<h2 class="cta-title"><?php echo esc_html( $settings['cta_title'] ); ?></h2>
					<p class="cta-description">
						<?php echo esc_html( $settings['cta_description'] ); ?>
					</p>
					<div class="cta-buttons">
						<a href="<?php echo esc_url( $primary_button_url ); ?>" class="btn-primary btn-large">
							<span><?php echo esc_html( $settings['primary_button_text'] ); ?></span>
							<i class="<?php echo esc_attr( $settings['primary_button_icon'] ); ?>"></i>
						</a>
						<a href="<?php echo esc_url( $secondary_button_url ); ?>" class="btn-secondary btn-large">
							<span><?php echo esc_html( $settings['secondary_button_text'] ); ?></span>
							<i class="<?php echo esc_attr( $settings['secondary_button_icon'] ); ?>"></i>
						</a>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Founder_CTA_Section_Widget() );

