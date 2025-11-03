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

		// CTA Features Section
		$this->start_controls_section(
			'cta_features_section',
			array(
				'label' => esc_html__( 'CTA Features', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_cta_features',
			array(
				'label'        => esc_html__( 'Show CTA Features', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => esc_html__( 'Display feature items below the CTA buttons (e.g., Quick response time, Expert support team)', 'meridian-africa' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_icon',
			array(
				'label'   => esc_html__( 'Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-check-circle',
			)
		);

		$repeater->add_control(
			'feature_text',
			array(
				'label'   => esc_html__( 'Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature item', 'meridian-africa' ),
			)
		);

		$this->add_control(
			'cta_features_list',
			array(
				'label'       => esc_html__( 'Feature Items', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'feature_icon' => 'fas fa-check-circle',
						'feature_text' => esc_html__( 'Quick response time', 'meridian-africa' ),
					),
					array(
						'feature_icon' => 'fas fa-check-circle',
						'feature_text' => esc_html__( 'Expert support team', 'meridian-africa' ),
					),
					array(
						'feature_icon' => 'fas fa-check-circle',
						'feature_text' => esc_html__( '24/7 availability', 'meridian-africa' ),
					),
				),
				'title_field' => '{{{ feature_text }}}',
				'condition'   => array(
					'show_cta_features' => 'yes',
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

		// CTA Features Style
		$this->start_controls_section(
			'cta_features_style',
			array(
				'label'     => esc_html__( 'CTA Features', 'meridian-africa' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'show_cta_features' => 'yes',
				),
			)
		);

		$this->add_control(
			'features_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.9)',
				'selectors' => array(
					'{{WRAPPER}} .cta-feature-item' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'features_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2e8f33',
				'selectors' => array(
					'{{WRAPPER}} .cta-feature-icon' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'features_typography',
				'selector' => '{{WRAPPER}} .cta-feature-item',
			)
		);

		$this->add_responsive_control(
			'features_gap',
			array(
				'label'      => esc_html__( 'Gap Between Items', 'meridian-africa' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'size' => 48,
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .cta-features' => 'gap: {{SIZE}}{{UNIT}}',
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

		$show_primary_button = 'yes' === $settings['show_primary_button'];
		$show_secondary_button = 'yes' === $settings['show_secondary_button'];
		$show_buttons = $show_primary_button || $show_secondary_button;
		$show_cta_features = 'yes' === $settings['show_cta_features'];

		$primary_button_url = ! empty( $settings['primary_button_link']['url'] ) ? $settings['primary_button_link']['url'] : '#';
		$secondary_button_url = ! empty( $settings['secondary_button_link']['url'] ) ? $settings['secondary_button_link']['url'] : '#';
		?>

		<!-- CTA Section -->
		<section class="solutions-cta">
			<div class="cta-background">
				<div class="cta-gradient-overlay"></div>
				<div class="cta-pattern-overlay"></div>
			</div>
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
					<?php if ( $show_cta_features && ! empty( $settings['cta_features_list'] ) ) : ?>
						<div class="cta-features">
							<?php foreach ( $settings['cta_features_list'] as $feature ) : ?>
								<div class="cta-feature-item">
									<div class="cta-feature-icon">
										<i class="<?php echo esc_attr( $feature['feature_icon'] ); ?>"></i>
									</div>
									<span><?php echo esc_html( $feature['feature_text'] ); ?></span>
								</div>
							<?php endforeach; ?>
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

