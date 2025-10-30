<?php
/**
 * Elementor Verification Crisis Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Verification_Crisis_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-verification-crisis';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Verification Crisis Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-alert';
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
		return array( 'verification', 'crisis', 'fraud', 'statistics', 'meridian', 'agrovue' );
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
				'default' => 'THE VERIFICATION CRISIS',
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Multi Billion Dollar Fraud Crisis in African Agricultural Subsidies',
			)
		);

		$this->add_control(
			'section_description',
			array(
				'label'   => esc_html__( 'Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'African governments invest Billions of dollars annually in agricultural subsidies. Yet the absence of cost-effective verification infrastructure enables systematic fraud that undermines program effectiveness, erodes public trust, and prevents millions of legitimate farmers from receiving support.',
			)
		);

		$this->end_controls_section();

		// Crisis Cards Section
		$this->start_controls_section(
			'cards_section',
			array(
				'label' => esc_html__( 'Crisis Cards', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Card 1
		$this->add_control(
			'card_1_heading',
			array(
				'label'     => esc_html__( 'Card 1', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'card_1_number',
			array(
				'label'   => esc_html__( 'Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '$50-100',
			)
		);

		$this->add_control(
			'card_1_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Cost Per Farm (Manual Verification)',
			)
		);

		$this->add_control(
			'card_1_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Traditional field verification is financially prohibitive at scale, forcing governments to verify only 5-10% of beneficiaries through sampling. This leaves 90-95% of program participants unverified, creating massive opportunities for fraud.',
			)
		);

		// Card 2
		$this->add_control(
			'card_2_heading',
			array(
				'label'     => esc_html__( 'Card 2', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'card_2_number',
			array(
				'label'   => esc_html__( 'Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '20-30%',
			)
		);

		$this->add_control(
			'card_2_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Standard Fraud Rate',
			)
		);

		$this->add_control(
			'card_2_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Ghost farmers, inflated farm size claims, duplicate registrations, and input diversion cost African governments Fraud Crisis annually. Ghana\'s documented $200M loss (2019-2021) led to program suspension and ministerial resignations.',
			)
		);

		// Card 3
		$this->add_control(
			'card_3_heading',
			array(
				'label'     => esc_html__( 'Card 3', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'card_3_number',
			array(
				'label'   => esc_html__( 'Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '4-12 weeks',
			)
		);

		$this->add_control(
			'card_3_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Verification Delay',
			)
		);

		$this->add_control(
			'card_3_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'By the time manual verification results arrive, the agricultural season has often passed, preventing corrective action. Field enumerator corruption further compromises data integrity through collusion with beneficiaries.',
			)
		);

		// Card 4
		$this->add_control(
			'card_4_heading',
			array(
				'label'     => esc_html__( 'Card 4', 'meridian-africa' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'card_4_number',
			array(
				'label'   => esc_html__( 'Number', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '1-5%',
			)
		);

		$this->add_control(
			'card_4_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Traditional M&E Sample Coverage',
			)
		);

		$this->add_control(
			'card_4_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Baseline surveys, midline assessments, and endline evaluations provide valuable insights but cost 10-15% of program budgets while covering only 1-5% of beneficiaries. Self-reported data has 30-40% over-reporting rates.',
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

		$this->add_responsive_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .verification-crisis' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		<!-- Verification Crisis Section -->
		<section id="verification-crisis" class="verification-crisis">
			<div class="container">
				<div class="crisis-header">
					<div class="crisis-badge">
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
					<p><?php echo esc_html( $settings['section_description'] ); ?></p>
				</div>

				<div class="crisis-grid">
					<div class="crisis-card crisis-card-1">
						<div class="crisis-number"><?php echo esc_html( $settings['card_1_number'] ); ?></div>
						<h3><?php echo esc_html( $settings['card_1_title'] ); ?></h3>
						<p><?php echo esc_html( $settings['card_1_description'] ); ?></p>
					</div>

					<div class="crisis-card crisis-card-2">
						<div class="crisis-number"><?php echo esc_html( $settings['card_2_number'] ); ?></div>
						<h3><?php echo esc_html( $settings['card_2_title'] ); ?></h3>
						<p><?php echo esc_html( $settings['card_2_description'] ); ?></p>
					</div>

					<div class="crisis-card crisis-card-3">
						<div class="crisis-number"><?php echo esc_html( $settings['card_3_number'] ); ?></div>
						<h3><?php echo esc_html( $settings['card_3_title'] ); ?></h3>
						<p><?php echo esc_html( $settings['card_3_description'] ); ?></p>
					</div>

					<div class="crisis-card crisis-card-4">
						<div class="crisis-number"><?php echo esc_html( $settings['card_4_number'] ); ?></div>
						<h3><?php echo esc_html( $settings['card_4_title'] ); ?></h3>
						<p><?php echo esc_html( $settings['card_4_description'] ); ?></p>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Verification_Crisis_Widget() );

