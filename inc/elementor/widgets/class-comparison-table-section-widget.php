<?php
/**
 * Elementor Comparison Table Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Comparison_Table_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-comparison-table-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Comparison Table Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-table';
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
		return array( 'comparison', 'table', 'traditional', 'meridian', 'sentinel', 'verification' );
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
		// Header Section
		$this->start_controls_section(
			'header_section',
			array(
				'label' => esc_html__( 'Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'The Meridian Sentinel Advantage',
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Traditional Verification vs. Satellite Intelligence',
			)
		);

		$this->end_controls_section();

		// Table Header Section
		$this->start_controls_section(
			'table_header_section',
			array(
				'label' => esc_html__( 'Table Headers', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'metric_header',
			array(
				'label'   => esc_html__( 'Metric Header', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Metric',
			)
		);

		$this->add_control(
			'traditional_header',
			array(
				'label'   => esc_html__( 'Traditional Header', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Traditional Manual',
			)
		);

		$this->add_control(
			'meridian_header',
			array(
				'label'   => esc_html__( 'Meridian Header', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Meridian Sentinel',
			)
		);

		$this->end_controls_section();

		// Comparison Rows Section
		$this->start_controls_section(
			'comparison_rows_section',
			array(
				'label' => esc_html__( 'Comparison Rows', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'metric_label',
			array(
				'label'   => esc_html__( 'Metric Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Coverage',
			)
		);

		$repeater->add_control(
			'traditional_value',
			array(
				'label'   => esc_html__( 'Traditional Value', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '5-10%',
			)
		);

		$repeater->add_control(
			'meridian_value',
			array(
				'label'   => esc_html__( 'Meridian Value', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '100%',
			)
		);

		$repeater->add_control(
			'meridian_highlight',
			array(
				'label'        => esc_html__( 'Highlight Meridian Value', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$repeater->add_control(
			'use_icon',
			array(
				'label'        => esc_html__( 'Use Icon', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);

		$repeater->add_control(
			'traditional_icon',
			array(
				'label'     => esc_html__( 'Traditional Icon', 'meridian-africa' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-times',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'use_icon' => 'yes',
				),
			)
		);

		$repeater->add_control(
			'meridian_icon',
			array(
				'label'     => esc_html__( 'Meridian Icon', 'meridian-africa' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-check',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'use_icon' => 'yes',
				),
			)
		);

		$this->add_control(
			'comparison_rows',
			array(
				'label'       => esc_html__( 'Comparison Rows', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'metric_label'      => 'Coverage',
						'traditional_value' => '5-10%',
						'meridian_value'    => '100%',
						'meridian_highlight' => 'yes',
						'use_icon'          => 'no',
					),
					array(
						'metric_label'      => 'Verification Time',
						'traditional_value' => '4-8 weeks',
						'meridian_value'    => '24-48 hours',
						'meridian_highlight' => 'yes',
						'use_icon'          => 'no',
					),
					array(
						'metric_label'      => 'Accuracy',
						'traditional_value' => 'Variable (human error)',
						'meridian_value'    => '80% (validated)',
						'meridian_highlight' => 'yes',
						'use_icon'          => 'no',
					),
					array(
						'metric_label'      => 'Scalability',
						'traditional_value' => 'Limited by staff',
						'meridian_value'    => 'Unlimited',
						'meridian_highlight' => 'yes',
						'use_icon'          => 'no',
					),
					array(
						'metric_label'      => 'Fraud Detection',
						'traditional_value' => 'Reactive, random sampling',
						'meridian_value'    => 'Proactive, comprehensive',
						'meridian_highlight' => 'yes',
						'use_icon'          => 'no',
					),
					array(
						'metric_label'      => 'Real-Time Data',
						'traditional_value' => 'No',
						'meridian_value'    => 'Yes',
						'meridian_highlight' => 'no',
						'use_icon'          => 'yes',
						'traditional_icon'  => array(
							'value'   => 'fas fa-times',
							'library' => 'fa-solid',
						),
						'meridian_icon'     => array(
							'value'   => 'fas fa-check',
							'library' => 'fa-solid',
						),
					),
					array(
						'metric_label'      => 'Corruption Risk',
						'traditional_value' => 'High (bribes possible)',
						'meridian_value'    => 'None (algorithmic)',
						'meridian_highlight' => 'yes',
						'use_icon'          => 'no',
					),
				),
				'title_field' => '{{{ metric_label }}}',
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
		// Style controls can be added here if needed
		$this->start_controls_section(
			'style_section',
			array(
				'label' => esc_html__( 'Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Section Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .comparison-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get script dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array();
	}

	/**
	 * Get style dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		return array( 'meridian-comparison-table-section', 'font-awesome' );
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Enqueue the comparison table section styles and Font Awesome
		wp_enqueue_style( 'meridian-comparison-table-section' );
		wp_enqueue_style( 'font-awesome' );
		?>

		<!-- Comparison Table Section -->
		<section class="comparison-section">
			<div class="container">
				<div class="comparison-header">
					<div class="comparison-badge"><?php echo esc_html( $settings['badge_text'] ); ?></div>
					<h2><?php echo esc_html( $settings['heading'] ); ?></h2>
				</div>

				<div class="comparison-table">
					<div class="comparison-table-header">
						<div class="header-cell metric-header"><?php echo esc_html( $settings['metric_header'] ); ?></div>
						<div class="header-cell traditional-header"><?php echo esc_html( $settings['traditional_header'] ); ?></div>
						<div class="header-cell meridian-header"><?php echo esc_html( $settings['meridian_header'] ); ?></div>
					</div>

					<?php if ( ! empty( $settings['comparison_rows'] ) ) : ?>
						<?php foreach ( $settings['comparison_rows'] as $row ) : ?>
							<div class="comparison-row">
								<div class="metric-cell">
									<span class="metric-label"><?php echo esc_html( $row['metric_label'] ); ?></span>
								</div>
								<div class="traditional-cell">
									<?php if ( 'yes' === $row['use_icon'] && ! empty( $row['traditional_icon']['value'] ) ) : ?>
										<span class="value no-icon">
											<?php Icons_Manager::render_icon( $row['traditional_icon'], array( 'aria-hidden' => 'true' ) ); ?>
											<?php echo esc_html( $row['traditional_value'] ); ?>
										</span>
									<?php else : ?>
										<span class="value"><?php echo esc_html( $row['traditional_value'] ); ?></span>
									<?php endif; ?>
								</div>
								<div class="meridian-cell">
									<?php if ( 'yes' === $row['use_icon'] && ! empty( $row['meridian_icon']['value'] ) ) : ?>
										<span class="value yes-icon">
											<?php Icons_Manager::render_icon( $row['meridian_icon'], array( 'aria-hidden' => 'true' ) ); ?>
											<?php echo esc_html( $row['meridian_value'] ); ?>
										</span>
									<?php else : ?>
										<span class="value <?php echo 'yes' === $row['meridian_highlight'] ? 'highlight' : ''; ?>">
											<?php echo esc_html( $row['meridian_value'] ); ?>
										</span>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Comparison_Table_Section_Widget() );

