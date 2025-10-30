<?php
/**
 * Elementor Transform Subsidy Programs Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Subsidy_Verification_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-subsidy-verification-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Transform Subsidy Programs Section', 'meridian-africa' );
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
		return array( 'subsidy', 'verification', 'government', 'programs', 'meridian' );
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
		// Icon Section
		$this->start_controls_section(
			'icon_section',
			array(
				'label' => esc_html__( 'Icon', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-landmark',
					'library' => 'fa-solid',
				),
			)
		);

		$this->end_controls_section();

		// Badge Section
		$this->start_controls_section(
			'badge_section',
			array(
				'label' => esc_html__( 'Badge', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'PRIMARY FOCUS: GOVERNMENT AGRICULTURAL PROGRAMS',
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
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Transform Subsidy Programs with Satellite Verification',
			)
		);

		$this->end_controls_section();

		// Intro Section
		$this->start_controls_section(
			'intro_section',
			array(
				'label' => esc_html__( 'Introduction', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'intro_text',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'African governments invest Billions of dollars annually in agricultural subsidies, yet lose 20-30% to fraud. Meridian Sentinel enables you to verify 100% of beneficiaries cheaper than manual verification—ensuring every dollar reaches legitimate farmers.',
			)
		);

		$this->end_controls_section();

		// Features Section
		$this->start_controls_section(
			'features_section',
			array(
				'label' => esc_html__( 'Features', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_title',
			array(
				'label'   => esc_html__( 'Feature Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Feature Title',
			)
		);

		$repeater->add_control(
			'feature_description',
			array(
				'label'   => esc_html__( 'Feature Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Feature description text',
			)
		);

		$this->add_control(
			'features_list',
			array(
				'label'       => esc_html__( 'Features List', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'feature_title'       => 'Eliminate Ghost Farmers:',
						'feature_description' => 'Automatically detect zero-vegetation fields claiming to be active farms',
					),
					array(
						'feature_title'       => 'Prevent Area Inflation:',
						'feature_description' => 'Verify actual farm sizes against declared areas with High-accuracy Validated models',
					),
					array(
						'feature_title'       => 'Stop Crop Misreporting:',
						'feature_description' => 'Identify crop types to prevent subsidy fraud (e.g., declaring rice, growing maize)',
					),
					array(
						'feature_title'       => 'Real-Time Monitoring:',
						'feature_description' => 'Track crop performance throughout the season for early intervention',
					),
					array(
						'feature_title'       => 'Data-Driven Policy:',
						'feature_description' => 'Access continent-wide yield maps, crop distribution, and performance analytics',
					),
					array(
						'feature_title'       => 'Rapid Deployment:',
						'feature_description' => '24-48 hour verification vs. 4-8 weeks manual process',
					),
				),
				'title_field' => '{{{ feature_title }}}',
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
		// Section Style
		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Section', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'section_background_color',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#0E172A',
				'selectors' => array(
					'{{WRAPPER}} .subsidy-verification-section' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'top'    => '100',
					'right'  => '0',
					'bottom' => '100',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .subsidy-verification-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label'     => esc_html__( 'Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .subsidy-verification-content h2' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .subsidy-verification-content h2',
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

		<section class="subsidy-verification-section">
			<div class="container">
				<div class="subsidy-verification-wrapper">
					<div class="subsidy-verification-content">
						<?php if ( ! empty( $settings['icon']['value'] ) ) : ?>
							<div class="subsidy-icon">
								<?php Icons_Manager::render_icon( $settings['icon'], array( 'aria-hidden' => 'true' ) ); ?>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $settings['badge_text'] ) ) : ?>
							<div class="subsidy-badge">
								<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $settings['title'] ) ) : ?>
							<h2><?php echo esc_html( $settings['title'] ); ?></h2>
						<?php endif; ?>

						<?php if ( ! empty( $settings['intro_text'] ) ) : ?>
							<p class="subsidy-intro"><?php echo esc_html( $settings['intro_text'] ); ?></p>
						<?php endif; ?>

						<?php if ( ! empty( $settings['features_list'] ) ) : ?>
							<ul class="subsidy-features-list">
								<?php foreach ( $settings['features_list'] as $feature ) : ?>
									<li>
										<i class="fas fa-check"></i>
										<span>
											<strong><?php echo esc_html( $feature['feature_title'] ); ?></strong>
											<?php echo esc_html( $feature['feature_description'] ); ?>
										</span>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Meridian_Africa_Subsidy_Verification_Section_Widget() );

