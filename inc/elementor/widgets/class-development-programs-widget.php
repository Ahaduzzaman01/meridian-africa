<?php
/**
 * Elementor Development Programs Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Development_Programs_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-development-programs';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Development Programs', 'meridian-africa' );
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
		return array( 'development', 'programs', 'market', 'opportunity', 'meridian', 'agrovue' );
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
		// Section Header
		$this->start_controls_section(
			'section_header',
			array(
				'label' => esc_html__( 'Section Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'MARKET OPPORTUNITY',
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Where Verification is Needed',
			)
		);

		$this->add_control(
			'section_description',
			array(
				'label'   => esc_html__( 'Section Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Major ongoing African agricultural development programs where independent verification infrastructure would prevent fraud and ensure transparency. These represent the target market for satellite-powered monitoring and evaluation.',
				'rows'    => 3,
			)
		);

		$this->end_controls_section();

		// Program Cards
		$this->start_controls_section(
			'program_cards_section',
			array(
				'label' => esc_html__( 'Program Cards', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'flag_svg',
			array(
				'label'       => esc_html__( 'Country Flag SVG', 'meridian-africa' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="flag-icon"><path fill="#141414" d="M32 5H4c-.205 0-.407.015-.604.045l-.004 1.955h29.216l-.004-1.955C32.407 5.015 32.205 5 32 5z"/><path fill="#141414" d="M32 27H4c-.205 0-.407-.015-.604-.045l-.004 1.955h29.216l-.004-1.955c-.197.03-.399.045-.604.045z"/><path fill="#009E49" d="M4 9h28v6H4z"/><path fill="#EF2B2D" d="M4 21h28v6H4z"/><path fill="#FFF" d="M4 15h28v6H4z"/></svg>',
				'description' => esc_html__( 'Paste the complete SVG code for the country flag', 'meridian-africa' ),
			)
		);

		$repeater->add_control(
			'program_title',
			array(
				'label'   => esc_html__( 'Program Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Tanzania ARIGP',
			)
		);

		$repeater->add_control(
			'program_donor',
			array(
				'label'   => esc_html__( 'Donor Info', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'WORLD BANK | $250M | TANZANIA',
			)
		);

		$repeater->add_control(
			'program_description',
			array(
				'label'   => esc_html__( 'Program Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'National Agricultural and Rural Inclusive Growth Project targeting 500,000 smallholder farmers with productivity enhancement and market access initiatives.',
				'rows'    => 3,
			)
		);

		$repeater->add_control(
			'verification_gap',
			array(
				'label'   => esc_html__( 'Verification Gap', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => '500k farmers require independent M&E at scale. Satellite solution would enable 100% coverage, real-time adoption tracking, and yield impact measurement.',
				'rows'    => 3,
			)
		);

		$this->add_control(
			'program_items',
			array(
				'label'       => esc_html__( 'Program Items', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $this->get_default_programs(),
				'title_field' => '{{{ program_title }}}',
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
				'default'   => '#1e293b',
				'selectors' => array(
					'{{WRAPPER}} .development-programs' => 'background-color: {{VALUE}}',
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

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .section-header h2',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Sanitize SVG output.
	 *
	 * @since 1.0.0
	 * @param string $svg SVG code to sanitize.
	 * @return string Sanitized SVG code.
	 */
	private function sanitize_svg( $svg ) {
		// Define allowed SVG tags and attributes
		$allowed_tags = array(
			'svg'    => array(
				'xmlns'       => true,
				'viewbox'     => true,
				'width'       => true,
				'height'      => true,
				'class'       => true,
				'fill'        => true,
				'stroke'      => true,
				'stroke-width' => true,
			),
			'path'   => array(
				'd'            => true,
				'fill'         => true,
				'stroke'       => true,
				'stroke-width' => true,
				'stroke-linecap' => true,
				'stroke-linejoin' => true,
			),
			'circle' => array(
				'cx'           => true,
				'cy'           => true,
				'r'            => true,
				'fill'         => true,
				'stroke'       => true,
				'stroke-width' => true,
			),
			'rect'   => array(
				'x'            => true,
				'y'            => true,
				'width'        => true,
				'height'       => true,
				'fill'         => true,
				'stroke'       => true,
				'stroke-width' => true,
				'rx'           => true,
				'ry'           => true,
			),
			'g'      => array(
				'fill'         => true,
				'stroke'       => true,
				'stroke-width' => true,
				'transform'    => true,
			),
			'polygon' => array(
				'points'       => true,
				'fill'         => true,
				'stroke'       => true,
				'stroke-width' => true,
			),
			'polyline' => array(
				'points'       => true,
				'fill'         => true,
				'stroke'       => true,
				'stroke-width' => true,
			),
			'line'   => array(
				'x1'           => true,
				'y1'           => true,
				'x2'           => true,
				'y2'           => true,
				'stroke'       => true,
				'stroke-width' => true,
			),
		);

		return wp_kses( $svg, $allowed_tags );
	}

	/**
	 * Get default programs data.
	 *
	 * @since 1.0.0
	 * @return array Default programs.
	 */
	private function get_default_programs() {
		return array(
			array(
				'flag_svg'             => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="flag-icon"><path fill="#141414" d="M32 5H4c-.205 0-.407.015-.604.045l-.004 1.955h29.216l-.004-1.955C32.407 5.015 32.205 5 32 5z"/><path fill="#141414" d="M32 27H4c-.205 0-.407-.015-.604-.045l-.004 1.955h29.216l-.004-1.955c-.197.03-.399.045-.604.045z"/><path fill="#009E49" d="M4 9h28v6H4z"/><path fill="#EF2B2D" d="M4 21h28v6H4z"/><path fill="#FFF" d="M4 15h28v6H4z"/></svg>',
				'program_title'        => 'Tanzania ARIGP',
				'program_donor'        => 'WORLD BANK | $250M | TANZANIA',
				'program_description'  => 'National Agricultural and Rural Inclusive Growth Project targeting 500,000 smallholder farmers with productivity enhancement and market access initiatives.',
				'verification_gap'     => '500k farmers require independent M&E at scale. Satellite solution would enable 100% coverage, real-time adoption tracking, and yield impact measurement.',
			),
			array(
				'flag_svg'             => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="flag-icon"><path fill="#008753" d="M4 5h9v26H4z"/><path fill="#FFF" d="M13 5h10v26H13z"/><path fill="#008753" d="M23 5h9v26h-9z"/></svg>',
				'program_title'        => 'Nigeria APPEALS',
				'program_donor'        => 'AFDB | $500M | NIGERIA',
				'program_description'  => 'Agricultural Productivity Enhancement Project across 8 states focused on rice, cassava, and horticulture value chains covering 100,000 farmers.',
				'verification_gap'     => 'State-level verification challenge. Satellite would provide crop-specific monitoring and compliance tracking with extension recommendations.',
			),
			array(
				'flag_svg'             => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="flag-icon"><path fill="#078930" d="M4 5h28c2.209 0 4 1.791 4 4v4H0V9c0-2.209 1.791-4 4-4z"/><path fill="#FCDD09" d="M0 13h36v10H0z"/><path fill="#DA121A" d="M0 23h36v4c0 2.209-1.791 4-4 4H4c-2.209 0-4-1.791-4-4v-4z"/><circle fill="#0F47AF" cx="18" cy="18" r="6"/><path fill="#FCDD09" d="M18 14l1.176 3.618h3.804l-3.078 2.236 1.176 3.618L18 21.236l-3.078 2.236 1.176-3.618-3.078-2.236h3.804z"/></svg>',
				'program_title'        => 'Ethiopia AGP',
				'program_donor'        => 'WORLD BANK | $300M | ETHIOPIA',
				'program_description'  => 'Agricultural Growth Program II targeting 2 million farmers with focus on wheat, teff, maize, and pulses. Requires comprehensive impact evaluation.',
				'verification_gap'     => 'Traditional survey M&E prohibitively expensive at 2M scale. Satellite would replace costly surveys with continuous monitoring.',
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

		<section id="development-programs" class="development-programs">
			<div class="development-programs-background"></div>
			<div class="container">
				<div class="section-header">
					<div class="badge-pill"><?php echo esc_html( $settings['badge_text'] ); ?></div>
					<h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
					<p><?php echo esc_html( $settings['section_description'] ); ?></p>
				</div>
				<div class="programs-grid">
					<?php foreach ( $settings['program_items'] as $item ) : ?>
						<div class="program-card">
							<div class="program-header">
								<div class="country-flag">
									<?php echo $this->sanitize_svg( $item['flag_svg'] ); ?>
								</div>
								<h3><?php echo esc_html( $item['program_title'] ); ?></h3>
							</div>
							<div class="program-meta">
								<span class="program-donor"><?php echo esc_html( $item['program_donor'] ); ?></span>
							</div>
							<p class="program-description"><?php echo esc_html( $item['program_description'] ); ?></p>
							<div class="sentinel-opportunity">
								<strong>VERIFICATION GAP:</strong> <?php echo esc_html( $item['verification_gap'] ); ?>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Development_Programs_Widget() );

