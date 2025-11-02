<?php
/**
 * Elementor System Architecture Solution Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_System_Architecture_Solution_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-system-architecture-solution';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'System Architecture Solution Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-layout-settings';
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
		return array( 'solution', 'architecture', 'system', 'meridian', 'sentinel', 'verification' );
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
		// Left Section Content
		$this->start_controls_section(
			'left_section_content',
			array(
				'label' => esc_html__( 'Left Section Content', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-microchip',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'THE SOLUTION',
			)
		);

		$this->add_control(
			'main_title',
			array(
				'label'   => esc_html__( 'Main Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'The Meridian Sentinel Solution',
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => 'Satellite-powered verification infrastructure built on proven enterprise platforms. Designed specifically for African agricultural systems and institutional requirements, delivering 100% beneficiary coverage at Up to 80% lower cost than manual methods.',
			)
		);

		$this->end_controls_section();

		// Stats Section
		$this->start_controls_section(
			'stats_section',
			array(
				'label' => esc_html__( 'Statistics', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'stat_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-satellite-dish',
			)
		);

		$repeater->add_control(
			'stat_value',
			array(
				'label'   => esc_html__( 'Value', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '10m',
			)
		);

		$repeater->add_control(
			'stat_label',
			array(
				'label'   => esc_html__( 'Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Resolution Imagery',
			)
		);

		$this->add_control(
			'stats',
			array(
				'label'       => esc_html__( 'Statistics List', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $this->get_default_stats(),
				'title_field' => '{{{ stat_label }}}',
			)
		);

		$this->end_controls_section();

		// Architecture Cards Section
		$this->start_controls_section(
			'architecture_cards_section',
			array(
				'label' => esc_html__( 'Architecture Cards', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$cards_repeater = new Repeater();

		$cards_repeater->add_control(
			'card_type',
			array(
				'label'   => esc_html__( 'Card Type', 'meridian-africa' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'verified-card'    => esc_html__( 'Verified (Purple)', 'meridian-africa' ),
					'scalable-card'    => esc_html__( 'Scalable (Blue)', 'meridian-africa' ),
					'continuous-card'  => esc_html__( 'Continuous (Green)', 'meridian-africa' ),
					'transparent-card' => esc_html__( 'Transparent (Orange)', 'meridian-africa' ),
				),
				'default' => 'verified-card',
			)
		);

		$cards_repeater->add_control(
			'card_icon',
			array(
				'label'   => esc_html__( 'Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-shield-alt',
			)
		);

		$cards_repeater->add_control(
			'card_badge',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'VERIFIED',
			)
		);

		$cards_repeater->add_control(
			'card_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Independent',
			)
		);

		$cards_repeater->add_control(
			'card_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Objective satellite data eliminates enumerator corruption and collusion. Tamper-proof verification results that governments can defend.',
			)
		);

		$this->add_control(
			'architecture_cards',
			array(
				'label'       => esc_html__( 'Architecture Cards', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $cards_repeater->get_controls(),
				'default'     => $this->get_default_cards(),
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
		// Background Style
		$this->start_controls_section(
			'background_style',
			array(
				'label' => esc_html__( 'Background', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'section_background',
			array(
				'label'     => esc_html__( 'Section Background', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .meridian-solution' => 'background: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get default statistics.
	 *
	 * @since 1.0.0
	 * @return array Default statistics.
	 */
	private function get_default_stats() {
		return array(
			array(
				'stat_icon'  => 'fas fa-satellite-dish',
				'stat_value' => '10m',
				'stat_label' => 'Resolution Imagery',
			),
			array(
				'stat_icon'  => 'fas fa-clock',
				'stat_value' => '5 Days',
				'stat_label' => 'Revisit Frequency',
			),
			array(
				'stat_icon'  => 'fas fa-chart-line',
				'stat_value' => '80%',
				'stat_label' => 'Cost Reduction',
			),
		);
	}

	/**
	 * Get default architecture cards.
	 *
	 * @since 1.0.0
	 * @return array Default architecture cards.
	 */
	private function get_default_cards() {
		return array(
			array(
				'card_type'        => 'verified-card',
				'card_icon'        => 'fas fa-shield-alt',
				'card_badge'       => 'VERIFIED',
				'card_title'       => 'Independent',
				'card_description' => 'Objective satellite data eliminates enumerator corruption and collusion. Tamper-proof verification results that governments can defend.',
			),
			array(
				'card_type'        => 'scalable-card',
				'card_icon'        => 'fas fa-expand',
				'card_badge'       => 'SCALABLE',
				'card_title'       => '100% Coverage',
				'card_description' => 'Verify every single beneficiary at a fraction of manual cost. Process 100,000+ farms in under 24 hours with consistent methodology.',
			),
			array(
				'card_type'        => 'continuous-card',
				'card_icon'        => 'fas fa-sync',
				'card_badge'       => 'CONTINUOUS',
				'card_title'       => 'Real-Time',
				'card_description' => 'Monitor crop health every 5 days throughout the growing season. Receive automated alerts for drought stress, pest outbreaks, and crop failure.',
			),
			array(
				'card_type'        => 'transparent-card',
				'card_icon'        => 'fas fa-file-alt',
				'card_badge'       => 'TRANSPARENT',
				'card_title'       => 'Auditable',
				'card_description' => 'Complete methodology documentation. Ground truth validation. Results that satisfy parliamentary oversight and donor due diligence.',
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

		// Enqueue the system architecture solution section assets
		wp_enqueue_style( 'meridian-system-architecture-solution' );
		?>

		<section id="meridian-solution" class="meridian-solution">
			<div class="container">
				<div class="solution-wrapper">
					<div class="solution-left">
						<div class="solution-badge">
							<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
							<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
						</div>
						<h2 class="solution-main-title"><?php echo esc_html( $settings['main_title'] ); ?></h2>
						<p class="solution-description">
							<?php echo esc_html( $settings['description'] ); ?>
						</p>

						<?php if ( ! empty( $settings['stats'] ) ) : ?>
							<div class="solution-stats">
								<?php foreach ( $settings['stats'] as $stat ) : ?>
									<div class="solution-stat-item">
										<div class="stat-icon">
											<i class="<?php echo esc_attr( $stat['stat_icon'] ); ?>"></i>
										</div>
										<div class="stat-content">
											<div class="stat-value-sentinel"><?php echo esc_html( $stat['stat_value'] ); ?></div>
											<div class="stat-label-sentinel"><?php echo esc_html( $stat['stat_label'] ); ?></div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="solution-right">
						<div class="system-architecture">
							<?php if ( ! empty( $settings['architecture_cards'] ) ) : ?>
								<?php foreach ( $settings['architecture_cards'] as $card ) : ?>
									<div class="architecture-card <?php echo esc_attr( $card['card_type'] ); ?>">
										<div class="card-icon-wrapper">
											<div class="card-icon">
												<i class="<?php echo esc_attr( $card['card_icon'] ); ?>"></i>
											</div>
										</div>
										<div class="card-content">
											<div class="card-badge"><?php echo esc_html( $card['card_badge'] ); ?></div>
											<h3 class="card-title"><?php echo esc_html( $card['card_title'] ); ?></h3>
											<p class="card-description">
												<?php echo esc_html( $card['card_description'] ); ?>
											</p>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_System_Architecture_Solution_Widget() );


