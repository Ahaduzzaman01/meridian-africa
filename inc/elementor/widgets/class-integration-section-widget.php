<?php
/**
 * Elementor Integration Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Integration_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-integration-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Integration Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-integration';
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
		return array( 'integration', 'api', 'systems', 'meridian', 'agrovue' );
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
				'label' => esc_html__( 'Section Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-plug',
					'library' => 'fa-solid',
				),
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Government-Ready Integration',
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Seamless Integration with Existing Systems',
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'RESTful API enables integration with government financial, identity, and GIS systems',
			)
		);

		$this->end_controls_section();

		// Integration Cards Section
		$this->start_controls_section(
			'cards_section',
			array(
				'label' => esc_html__( 'Integration Cards', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'card_icon',
			array(
				'label'   => esc_html__( 'Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-plug',
					'library' => 'fa-solid',
				),
			)
		);

		$repeater->add_control(
			'card_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Integration Title',
			)
		);

		$repeater->add_control(
			'card_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 2,
				'default' => 'Integration description',
			)
		);

		$this->add_control(
			'integration_cards',
			array(
				'label'       => esc_html__( 'Integration Cards', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-money-bill-transfer',
							'library' => 'fa-solid',
						),
						'card_title'       => 'IFMIS Integration',
						'card_description' => 'Verify beneficiary before payment disbursement',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-id-card',
							'library' => 'fa-solid',
						),
						'card_title'       => 'National ID Systems',
						'card_description' => 'Cross-check identity, prevent duplicates',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-map-location-dot',
							'library' => 'fa-solid',
						),
						'card_title'       => 'GIS Platforms',
						'card_description' => 'Import/export shapefiles, land registry',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-mobile-screen-button',
							'library' => 'fa-solid',
						),
						'card_title'       => 'SMS Gateways',
						'card_description' => 'Send farmer notifications, alerts',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-seedling',
							'library' => 'fa-solid',
						),
						'card_title'       => 'Extension Services',
						'card_description' => 'Push crop health alerts to field agents',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-chart-line',
							'library' => 'fa-solid',
						),
						'card_title'       => 'M&E Platforms',
						'card_description' => 'DHIS2, ODK, REDCap integration',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-cloud',
							'library' => 'fa-solid',
						),
						'card_title'       => 'Cloud Storage',
						'card_description' => 'AWS, Azure, Google Cloud compatibility',
					),
					array(
						'card_icon'        => array(
							'value'   => 'fas fa-chart-column',
							'library' => 'fa-solid',
						),
						'card_title'       => 'BI Tools',
						'card_description' => 'Power BI, Tableau, Looker dashboards',
					),
				),
				'title_field' => '{{{ card_title }}}',
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
			'section_background',
			array(
				'label'     => esc_html__( 'Background', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .integration-section' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_responsive_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .integration-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Badge Style
		$this->start_controls_section(
			'badge_style',
			array(
				'label' => esc_html__( 'Badge', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'badge_color',
			array(
				'label'     => esc_html__( 'Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .badge-pill' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'badge_background',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .badge-pill' => 'background-color: {{VALUE}}',
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
		?>

		<!-- Integration Section -->
		<section class="integration-section">
			<div class="container">
				<div class="section-header">
					<div class="badge-pill badge-blue">
						<?php Icons_Manager::render_icon( $settings['badge_icon'], array( 'aria-hidden' => 'true' ) ); ?>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2><?php echo esc_html( $settings['heading'] ); ?></h2>
					<p><?php echo esc_html( $settings['description'] ); ?></p>
				</div>

				<div class="integration-grid">
					<?php foreach ( $settings['integration_cards'] as $card ) : ?>
						<div class="integration-card">
							<div class="integration-icon">
								<?php Icons_Manager::render_icon( $card['card_icon'], array( 'aria-hidden' => 'true' ) ); ?>
							</div>
							<h4><?php echo esc_html( $card['card_title'] ); ?></h4>
							<p><?php echo esc_html( $card['card_description'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Integration_Section_Widget() );

