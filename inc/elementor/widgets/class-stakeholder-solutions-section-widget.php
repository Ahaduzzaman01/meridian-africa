<?php
/**
 * Elementor Stakeholder Solutions Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Stakeholder_Solutions_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-stakeholder-solutions-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Stakeholder Solutions Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
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
		return array( 'stakeholder', 'solutions', 'cards', 'grid', 'meridian' );
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
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Additional Solutions',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Tailored for Every Agricultural Stakeholder',
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Beyond government programs, Meridian Sentinel provides specialized solutions for the entire agriculture ecosystem.',
			)
		);

		$this->end_controls_section();

		// Cards Section
		$this->start_controls_section(
			'cards_section',
			array(
				'label' => esc_html__( 'Stakeholder Cards', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'card_image',
			array(
				'label'   => esc_html__( 'Card Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'card_icon',
			array(
				'label'   => esc_html__( 'Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-landmark',
					'library' => 'fa-solid',
				),
			)
		);

		$repeater->add_control(
			'card_tag',
			array(
				'label'   => esc_html__( 'Tag', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'DEVELOPMENT ORGANIZATIONS & NGOS',
			)
		);

		$repeater->add_control(
			'card_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Maximize Program Impact with Transparent Monitoring',
			)
		);

		$repeater->add_control(
			'card_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Ensure donor funds reach intended beneficiaries, track program implementation in real-time, and demonstrate measurable impact with objective satellite-based evidence.',
			)
		);

		$repeater->add_control(
			'card_features',
			array(
				'label'       => esc_html__( 'Features (one per line)', 'meridian-africa' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => "Verify beneficiary eligibility without costly field visits\nMonitor subsidy program project outcomes\nQuantitative impact relief with real-time crop damage assessment\nGenerate impact reports with satellite/weather satellite evidence\nScale monitoring to 100x more farms/hectares for same budget",
				'description' => esc_html__( 'Enter each feature on a new line', 'meridian-africa' ),
			)
		);

		$this->add_control(
			'cards',
			array(
				'label'       => esc_html__( 'Cards', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $this->get_default_cards(),
				'title_field' => '{{{ card_tag }}}',
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
				'default'   => '#0a0f1e',
				'selectors' => array(
					'{{WRAPPER}} .stakeholder-solutions-section' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get default cards data.
	 *
	 * @since 1.0.0
	 * @return array Default cards.
	 */
	private function get_default_cards() {
		return array(
			array(
				'card_tag'         => 'DEVELOPMENT ORGANIZATIONS & NGOS',
				'card_title'       => 'Maximize Program Impact with Transparent Monitoring',
				'card_description' => 'Ensure donor funds reach intended beneficiaries, track program implementation in real-time, and demonstrate measurable impact with objective satellite-based evidence.',
				'card_features'    => "Verify beneficiary eligibility without costly field visits\nMonitor subsidy program project outcomes\nQuantitative impact relief with real-time crop damage assessment\nGenerate impact reports with satellite/weather satellite evidence\nScale monitoring to 100x more farms/hectares for same budget",
				'card_image'       => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/DEVELOPMENT_ORGANIZATIONS___NGOS.jpg',
				),
				'card_icon'        => array(
					'value'   => 'fas fa-landmark',
					'library' => 'fa-solid',
				),
			),
			array(
				'card_tag'         => 'FINANCIAL INSTITUTIONS & BANKS',
				'card_title'       => 'De-Risk Agricultural Lending with Satellite Intelligence',
				'card_description' => 'Make informed credit decisions using satellite-based risk assessment. Monitor borrower farm performance throughout the loan cycle and enable data-driven interventions at scale.',
				'card_features'    => "Verify farmer claims (land ownership, farm size, crop type) before credit award\nMonitor crop health and predict yields for early default warnings\nEnable index insurance with automated satellite-based payouts\nReduce loan processing time from weeks to 48 hours\nCut verification costs by 80%, making smallholder lending profitable",
				'card_image'       => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/bank.jpg',
				),
				'card_icon'        => array(
					'value'   => 'fas fa-university',
					'library' => 'fa-solid',
				),
			),
			array(
				'card_tag'         => 'AGRICULTURAL COOPERATIVES & AGGREGATORS',
				'card_title'       => 'Manage Member Farms with Data-Driven Insights',
				'card_description' => 'Track individual member performance, optimize collective operations, and provide members with satellite-derived crop performance data.',
				'card_features'    => "Monitor all member farms simultaneously (no instead visits required)\nIdentify underperforming farms for targeted extension support\nAggregate production forecasts for better buyer negotiations\nDetect crop stress early for intervention recommendations\nGenerate proof of production for contract farming compliance",
				'card_image'       => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/AGRICULTURAL_COOPERATIVES___AGGREGATORS.png',
				),
				'card_icon'        => array(
					'value'   => 'fas fa-users',
					'library' => 'fa-solid',
				),
			),
			array(
				'card_tag'         => 'SUPPLY CHAIN & AGRIBUSINESSES',
				'card_title'       => 'Ensure Supply Chain Transparency & Traceability',
				'card_description' => 'Verify supplier claims, monitor contract farming compliance, and meet sustainability requirements with satellite-verified field-level data.',
				'card_features'    => "Verify farmer operations are production capacity\nMonitor contract farmer compliance (crop type, timing, practices)\nDemonstrate for sustainability (EUDR compliance)\nForecast supply volumes for logistics planning\nGenerate traceability reports for buyers (quality)",
				'card_image'       => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/supplychain.png',
				),
				'card_icon'        => array(
					'value'   => 'fas fa-truck',
					'library' => 'fa-solid',
				),
			),
			array(
				'card_tag'         => 'INSURANCE COMPANIES',
				'card_title'       => 'Enable Scalable Crop Insurance with Satellite Verification',
				'card_description' => 'Reduce field verification costs by 80%, enable index insurance at scale, and process claims in 24-48 hours vs weeks of field investigations.',
				'card_features'    => "Automate verification (drought, flood, crop failure) using satellite data\nProcess claims in 5-48 hours vs weeks of field investigations\nDetect fraudulent claims (e.g., claiming damage on non-existent fields)\nEnable parametric insurance with objective satellite triggers\nDrastically reduce verification cost",
				'card_image'       => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/insurance_2.png',
				),
				'card_icon'        => array(
					'value'   => 'fas fa-shield-halved',
					'library' => 'fa-solid',
				),
			),
			array(
				'card_tag'         => 'RESEARCH INSTITUTIONS & UNIVERSITIES',
				'card_title'       => 'Accelerate Agricultural Research with Continental-Scale Data',
				'card_description' => 'Access the largest dataset of smallholder farm performance across Africa for climate research, breeding, and policy research.',
				'card_features'    => "Access continental database (millions of farms)\nMulti-year crop performance time series\nClimate-crop interaction data (drought, heat, flood)\nAPI access for model training and validation\nCo-publication opportunities with Meridian Sentinel team",
				'card_image'       => array(
					'url' => get_template_directory_uri() . '/agrovue-landing-html/image/Ag-research.jpg',
				),
				'card_icon'        => array(
					'value'   => 'fas fa-flask',
					'library' => 'fa-solid',
				),
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

		<section class="stakeholder-solutions-section">
			<div class="container">
				<div class="stakeholder-header">
					<div class="stakeholder-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></div>
					<h2><?php echo esc_html( $settings['title'] ); ?></h2>
					<p><?php echo esc_html( $settings['description'] ); ?></p>
				</div>

				<div class="stakeholder-grid">
					<?php foreach ( $settings['cards'] as $card ) : ?>
						<div class="stakeholder-card">
							<div class="card-image-container">
								<?php if ( ! empty( $card['card_image']['url'] ) ) : ?>
									<img src="<?php echo esc_url( $card['card_image']['url'] ); ?>" alt="<?php echo esc_attr( $card['card_tag'] ); ?>" class="card-image">
								<?php endif; ?>
								<div class="card-icon-badge">
									<?php \Elementor\Icons_Manager::render_icon( $card['card_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</div>
							</div>
							<div class="card-content">
								<div class="card-tag"><?php echo esc_html( $card['card_tag'] ); ?></div>
								<h3><?php echo esc_html( $card['card_title'] ); ?></h3>
								<p><?php echo esc_html( $card['card_description'] ); ?></p>

								<?php
								$features = explode( "\n", $card['card_features'] );
								if ( ! empty( $features ) ) :
									?>
									<ul class="card-features-list">
										<?php foreach ( $features as $feature ) : ?>
											<?php if ( ! empty( trim( $feature ) ) ) : ?>
												<li><i class="fas fa-check"></i> <?php echo esc_html( trim( $feature ) ); ?></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Meridian_Africa_Stakeholder_Solutions_Section_Widget() );

