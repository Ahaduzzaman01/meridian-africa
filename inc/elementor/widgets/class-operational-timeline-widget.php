<?php
/**
 * Elementor Operational Timeline Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Operational_Timeline_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-operational-timeline';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Operational Timeline', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-time-line';
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
		return array( 'timeline', 'operational', 'steps', 'process', 'meridian', 'agrovue' );
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
		// Section Header
		$this->start_controls_section(
			'section_header',
			array(
				'label' => esc_html__( 'Section Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-rocket',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'IMPLEMENTATION',
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Rapid Deployment: Operational in 4 Weeks',
			)
		);

		$this->add_control(
			'section_description',
			array(
				'label'   => esc_html__( 'Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Streamlined implementation process from contract signature to full operational capability. Proven methodology with clear milestones and deliverables.',
			)
		);

		$this->end_controls_section();

		// Timeline Steps
		$this->start_controls_section(
			'timeline_steps',
			array(
				'label' => esc_html__( 'Timeline Steps', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'step_number',
			array(
				'label'   => esc_html__( 'Step Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '01',
			)
		);

		$repeater->add_control(
			'step_icon',
			array(
				'label'   => esc_html__( 'Step Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-upload',
			)
		);

		$repeater->add_control(
			'step_week',
			array(
				'label'   => esc_html__( 'Week Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'WEEK 1',
			)
		);

		$repeater->add_control(
			'step_title',
			array(
				'label'   => esc_html__( 'Step Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Data Upload',
			)
		);

		$repeater->add_control(
			'step_description',
			array(
				'label'   => esc_html__( 'Step Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Beneficiary list with GPS coordinates uploaded and validated. Data quality checks and formatting standardization.',
			)
		);

		$repeater->add_control(
			'reverse_layout',
			array(
				'label'        => esc_html__( 'Reverse Layout', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);

		$this->add_control(
			'steps',
			array(
				'label'       => esc_html__( 'Steps', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'step_number'      => '01',
						'step_icon'        => 'fas fa-upload',
						'step_week'        => 'WEEK 1',
						'step_title'       => 'Data Upload',
						'step_description' => 'Beneficiary list with GPS coordinates uploaded and validated. Data quality checks and formatting standardization.',
						'reverse_layout'   => 'no',
					),
					array(
						'step_number'      => '02',
						'step_icon'        => 'fas fa-satellite',
						'step_week'        => 'WEEK 2',
						'step_title'       => 'Satellite Analysis',
						'step_description' => 'Satellite imagery processing, machine learning classification, boundary detection, and quality assurance.',
						'reverse_layout'   => 'yes',
					),
					array(
						'step_number'      => '03',
						'step_icon'        => 'fas fa-shield-alt',
						'step_week'        => 'WEEK 3',
						'step_title'       => 'Verification Results',
						'step_description' => 'Fraud detection reports generated, dashboard access provided, stakeholder training conducted.',
						'reverse_layout'   => 'no',
					),
					array(
						'step_number'      => '04',
						'step_icon'        => 'fas fa-bell',
						'step_week'        => 'WEEK 4',
						'step_title'       => 'Continuous Monitoring',
						'step_description' => 'Health tracking activated, automated alerts configured, continuous monitoring operational.',
						'reverse_layout'   => 'yes',
					),
				),
				'title_field' => '{{{ step_week }}} - {{{ step_title }}}',
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

		<!-- Operational Timeline Section -->
		<section class="operational-section">
			<div class="container">
				<div class="section-header">
					<div class="badge-pill">
						<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
					<p><?php echo esc_html( $settings['section_description'] ); ?></p>
				</div>

				<div class="operational-timeline">
					<?php foreach ( $settings['steps'] as $step ) : ?>
						<?php $reverse_class = ( 'yes' === $step['reverse_layout'] ) ? ' step-reverse' : ''; ?>
						<div class="operational-step<?php echo esc_attr( $reverse_class ); ?>">
							<div class="step-number-large"><?php echo esc_html( $step['step_number'] ); ?></div>
							<div class="step-content-wrapper">
								<div class="step-icon-box">
									<i class="<?php echo esc_attr( $step['step_icon'] ); ?>"></i>
								</div>
								<div class="step-text">
									<h3>
										<span style="color: #7c3aed; font-size: 0.85em; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
											<?php echo esc_html( $step['step_week'] ); ?>
										</span><br>
										<?php echo esc_html( $step['step_title'] ); ?>
									</h3>
									<p><?php echo esc_html( $step['step_description'] ); ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Operational_Timeline_Widget() );

