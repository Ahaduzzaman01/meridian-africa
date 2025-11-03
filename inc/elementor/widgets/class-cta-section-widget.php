<?php
/**
 * Elementor CTA Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_CTA_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-cta-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CTA Section', 'meridian-africa' );
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
		return array( 'cta', 'call to action', 'button', 'meridian', 'agrovue' );
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
		// Heading Section
		$this->start_controls_section(
			'heading_section',
			array(
				'label' => esc_html__( 'Heading', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Ready to Transform Your Agricultural Programs?',
			)
		);

		$this->end_controls_section();

		// Description Section
		$this->start_controls_section(
			'description_section',
			array(
				'label' => esc_html__( 'Description', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'Join governments, development banks, and organizations across Africa using Meridian Sentinel to prevent fraud, improve targeting, and increase transparency in agricultural programs.',
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
			'show_primary_button',
			array(
				'label'        => esc_html__( 'Show Primary Button', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'primary_button_text',
			array(
				'label'     => esc_html__( 'Button Text', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Request Demo',
				'condition' => array(
					'show_primary_button' => 'yes',
				),
			)
		);

		$this->add_control(
			'primary_button_link',
			array(
				'label'     => esc_html__( 'Button Link', 'meridian-africa' ),
				'type'      => Controls_Manager::URL,
				'default'   => array(
					'url' => 'contact.html',
				),
				'condition' => array(
					'show_primary_button' => 'yes',
				),
			)
		);

		$this->add_control(
			'primary_button_icon',
			array(
				'label'     => esc_html__( 'Show Icon', 'meridian-africa' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array(
					'show_primary_button' => 'yes',
				),
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
			'show_secondary_button',
			array(
				'label'        => esc_html__( 'Show Secondary Button', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'secondary_button_text',
			array(
				'label'     => esc_html__( 'Button Text', 'meridian-africa' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Contact Sales',
				'condition' => array(
					'show_secondary_button' => 'yes',
				),
			)
		);

		$this->add_control(
			'secondary_button_link',
			array(
				'label'     => esc_html__( 'Button Link', 'meridian-africa' ),
				'type'      => Controls_Manager::URL,
				'default'   => array(
					'url' => 'contact.html',
				),
				'condition' => array(
					'show_secondary_button' => 'yes',
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
				'default'   => '#0e172a',
				'selectors' => array(
					'{{WRAPPER}} .solutions-cta' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Heading Style
		$this->start_controls_section(
			'heading_style',
			array(
				'label' => esc_html__( 'Heading', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_color',
			array(
				'label'     => esc_html__( 'Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .cta-content h2' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_typography',
				'selector' => '{{WRAPPER}} .cta-content h2',
			)
		);

		$this->end_controls_section();

		// Description Style
		$this->start_controls_section(
			'description_style',
			array(
				'label' => esc_html__( 'Description', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .cta-content p' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .cta-content p',
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

		$show_primary_button = 'yes' === $settings['show_primary_button'];
		$show_secondary_button = 'yes' === $settings['show_secondary_button'];
		$show_buttons = $show_primary_button || $show_secondary_button;

		$primary_button_url = ! empty( $settings['primary_button_link']['url'] ) ? $settings['primary_button_link']['url'] : '#';
		$secondary_button_url = ! empty( $settings['secondary_button_link']['url'] ) ? $settings['secondary_button_link']['url'] : '#';
		?>

		<!-- CTA Section -->
		<section class="solutions-cta">
			<div class="container">
				<div class="cta-content">
					<h2><?php echo esc_html( $settings['heading'] ); ?></h2>
					<p><?php echo esc_html( $settings['description'] ); ?></p>
					<?php if ( $show_buttons ) : ?>
						<div class="cta-buttons">
							<?php if ( $show_primary_button ) : ?>
								<a href="<?php echo esc_url( $primary_button_url ); ?>" class="cta-btn cta-btn-primary">
									<span><?php echo esc_html( $settings['primary_button_text'] ); ?></span>
									<?php if ( 'yes' === $settings['primary_button_icon'] ) : ?>
										<i class="fas fa-arrow-right"></i>
									<?php endif; ?>
								</a>
							<?php endif; ?>
							<?php if ( $show_secondary_button ) : ?>
								<a href="<?php echo esc_url( $secondary_button_url ); ?>" class="cta-btn cta-btn-secondary">
									<span><?php echo esc_html( $settings['secondary_button_text'] ); ?></span>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_CTA_Section_Widget() );

