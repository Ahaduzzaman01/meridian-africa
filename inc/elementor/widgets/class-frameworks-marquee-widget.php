<?php
/**
 * Elementor Frameworks Marquee Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Frameworks_Marquee_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-frameworks-marquee';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Frameworks Marquee', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-push';
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
		return array( 'frameworks', 'marquee', 'carousel', 'slider', 'meridian', 'agrovue', 'development' );
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
		// Badge Section
		$this->start_controls_section(
			'badge_section',
			array(
				'label' => esc_html__( 'Badge', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'badge_icon',
			array(
				'label'   => esc_html__( 'Badge Icon Class', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-globe',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'ALIGNED WITH GLOBAL DEVELOPMENT FRAMEWORKS',
			)
		);

		$this->end_controls_section();

		// Framework Items Section
		$this->start_controls_section(
			'frameworks_section',
			array(
				'label' => esc_html__( 'Framework Items', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'framework_image',
			array(
				'label'   => esc_html__( 'Framework Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'framework_title',
			array(
				'label'   => esc_html__( 'Framework Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Framework Title', 'meridian-africa' ),
			)
		);

		$repeater->add_control(
			'framework_description',
			array(
				'label'   => esc_html__( 'Framework Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Framework Description', 'meridian-africa' ),
			)
		);

		$this->add_control(
			'framework_items',
			array(
				'label'       => esc_html__( 'Framework Items', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'framework_title'       => esc_html__( 'AU Agenda 2063', 'meridian-africa' ),
						'framework_description' => esc_html__( 'African Union Development', 'meridian-africa' ),
					),
					array(
						'framework_title'       => esc_html__( 'CAADP Malabo', 'meridian-africa' ),
						'framework_description' => esc_html__( 'Agriculture Development', 'meridian-africa' ),
					),
					array(
						'framework_title'       => esc_html__( 'SDG 2', 'meridian-africa' ),
						'framework_description' => esc_html__( 'Zero Hunger Goal', 'meridian-africa' ),
					),
					array(
						'framework_title'       => esc_html__( 'World Bank ESF', 'meridian-africa' ),
						'framework_description' => esc_html__( 'Environmental & Social', 'meridian-africa' ),
					),
					array(
						'framework_title'       => esc_html__( 'ISO 27001 Ready', 'meridian-africa' ),
						'framework_description' => esc_html__( 'Information Security', 'meridian-africa' ),
					),
				),
				'title_field' => '{{{ framework_title }}}',
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
		// Badge Style
		$this->start_controls_section(
			'badge_style',
			array(
				'label' => esc_html__( 'Badge Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'badge_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .marquee-badge i' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'badge_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .marquee-badge span' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Framework Card Style
		$this->start_controls_section(
			'card_style',
			array(
				'label' => esc_html__( 'Framework Card Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'card_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .framework-info h4' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'card_description_color',
			array(
				'label'     => esc_html__( 'Description Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .framework-info p' => 'color: {{VALUE}}',
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

		<section class="frameworks-marquee">
			<div class="container">
				<div class="marquee-header">
					<div class="marquee-badge">
						<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
				</div>
			</div>
			<div class="marquee-wrapper">
				<div class="marquee-track">
					<?php
					// Render framework items
					if ( ! empty( $settings['framework_items'] ) ) {
						foreach ( $settings['framework_items'] as $item ) {
							$image_url = ! empty( $item['framework_image']['url'] ) ? $item['framework_image']['url'] : \Elementor\Utils::get_placeholder_image_src();
							?>
							<div class="marquee-item">
								<div class="framework-card">
									<div class="framework-icon">
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $item['framework_title'] ); ?>">
									</div>
									<div class="framework-info">
										<h4><?php echo esc_html( $item['framework_title'] ); ?></h4>
										<p><?php echo esc_html( $item['framework_description'] ); ?></p>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
					
					<!-- Duplicate for seamless loop -->
					<?php
					// Render framework items again for seamless loop
					if ( ! empty( $settings['framework_items'] ) ) {
						foreach ( $settings['framework_items'] as $item ) {
							$image_url = ! empty( $item['framework_image']['url'] ) ? $item['framework_image']['url'] : \Elementor\Utils::get_placeholder_image_src();
							?>
							<div class="marquee-item">
								<div class="framework-card">
									<div class="framework-icon">
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $item['framework_title'] ); ?>">
									</div>
									<div class="framework-info">
										<h4><?php echo esc_html( $item['framework_title'] ); ?></h4>
										<p><?php echo esc_html( $item['framework_description'] ); ?></p>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Frameworks_Marquee_Widget() );

