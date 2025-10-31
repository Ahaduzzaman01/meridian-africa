<?php
/**
 * Elementor Technical Specifications Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Tech_Specs_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-tech-specs-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Technical Specifications Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-settings';
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
		return array( 'technical', 'specifications', 'tech', 'specs', 'infrastructure', 'meridian' );
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
				'default' => 'TECHNICAL INFRASTRUCTURE',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Institutional-Grade Architecture',
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Built on proven enterprise infrastructure with government-ready security and compliance. Transparent, auditable approach using publicly available satellite data and cloud computing platforms.',
				'rows'    => 3,
			)
		);

		$this->end_controls_section();

		// Specification Cards Section
		$this->start_controls_section(
			'specs_section',
			array(
				'label' => esc_html__( 'Specification Cards', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'spec_icon',
			array(
				'label'   => esc_html__( 'Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-satellite-dish',
					'library' => 'fa-solid',
				),
			)
		);

		$repeater->add_control(
			'spec_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Specification Title',
			)
		);

		$repeater->add_control(
			'spec_content',
			array(
				'label'   => esc_html__( 'Content', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Specification content goes here.',
				'rows'    => 3,
			)
		);

		$this->add_control(
			'specs',
			array(
				'label'       => esc_html__( 'Specifications', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $this->get_default_specs(),
				'title_field' => '{{{ spec_title }}}',
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
		// Header Style
		$this->start_controls_section(
			'header_style_section',
			array(
				'label' => esc_html__( 'Header Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'badge_bg_color',
			array(
				'label'     => esc_html__( 'Badge Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tech-specs .badge-pill' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'badge_text_color',
			array(
				'label'     => esc_html__( 'Badge Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tech-specs .badge-pill' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tech-specs .section-header h2' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Description Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tech-specs .section-header p' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

		// Card Style
		$this->start_controls_section(
			'card_style_section',
			array(
				'label' => esc_html__( 'Card Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'card_bg_color',
			array(
				'label'     => esc_html__( 'Card Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tech-spec-card' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'card_border_color',
			array(
				'label'     => esc_html__( 'Card Border Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tech-spec-card' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get default specifications.
	 *
	 * @since 1.0.0
	 * @return array Default specifications.
	 */
	private function get_default_specs() {
		return array(
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-satellite-dish',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Data Sources',
				'spec_content' => 'Sentinel-2 (10m resolution, 5-day revisit), Landsat (30m, 16-day), MODIS (250m, daily) for meteorological data. Comprehensive monitoring.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-cloud-arrow-up',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Processing Platform',
				'spec_content' => 'Cloud-based planetary-scale computing infrastructure. Proven scalability to millions of farms. Automated processing pipelines.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-brain',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Machine Learning',
				'spec_content' => 'Ensemble methods combining multiple algorithms. Trained on African agricultural systems. Continuous improvement with validation data.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-file-export',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Output Formats',
				'spec_content' => 'Excel reports, PDF summaries, PowerPoint presentations, geospatial files (GeoJSON, Shapefile, KML), RESTful API access.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-shield-halved',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Data Security',
				'spec_content' => 'AES-256 encryption at rest, TLS 1.3 in transit. Role-based access control. Multi-factor authentication. Immutable audit logs. Daily backups.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-server',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Data Sovereignty',
				'spec_content' => 'Standard cloud deployment. Africa-hosted option (AWS Cape Town), or on-premise government data center deployment. Full data ownership in all cases.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-code-branch',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Integration',
				'spec_content' => 'RESTful API with OAuth 2.0. Webhook notifications. Compatible with IFMIS, National ID systems, GIS platforms. Technical documentation provided.',
			),
			array(
				'spec_icon'    => array(
					'value'   => 'fas fa-clock-rotate-left',
					'library' => 'fa-solid',
				),
				'spec_title'   => 'Update Frequency',
				'spec_content' => 'Crop health: Every 5 days. Verification: On-demand or scheduled. Alerts: Real-time. Reports: Daily, weekly, monthly, or custom intervals.',
			),
		);
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<section id="tech" class="tech-specs">
			<div class="container">
				<div class="section-header">
					<div class="badge-pill"><?php echo esc_html( $settings['badge_text'] ); ?></div>
					<h2><?php echo esc_html( $settings['title'] ); ?></h2>
					<p><?php echo esc_html( $settings['description'] ); ?></p>
				</div>
				<div class="tech-specs-grid">
					<?php foreach ( $settings['specs'] as $spec ) : ?>
						<div class="tech-spec-card">
							<div class="tech-icon-wrapper">
								<div class="tech-icon">
									<?php Icons_Manager::render_icon( $spec['spec_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</div>
							</div>
							<h3><?php echo esc_html( $spec['spec_title'] ); ?></h3>
							<div class="spec-content">
								<p><?php echo esc_html( $spec['spec_content'] ); ?></p>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Tech_Specs_Section_Widget() );

