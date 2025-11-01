<?php
/**
 * Elementor Quick Navigation Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Quick_Navigation_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-quick-navigation-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Quick Navigation Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-navigation-menu';
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
		return array( 'navigation', 'quick', 'menu', 'legal', 'meridian' );
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
		// Title Section
		$this->start_controls_section(
			'title_section',
			array(
				'label' => esc_html__( 'Title', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title_icon',
			array(
				'label'   => esc_html__( 'Title Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-list',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Quick Navigation',
			)
		);

		$this->end_controls_section();

		// Navigation Items Section
		$this->start_controls_section(
			'nav_items_section',
			array(
				'label' => esc_html__( 'Navigation Items', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label'   => esc_html__( 'Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-database',
			)
		);

		$repeater->add_control(
			'item_text',
			array(
				'label'   => esc_html__( 'Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Navigation Item',
			)
		);

		$repeater->add_control(
			'item_link',
			array(
				'label'   => esc_html__( 'Link', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '#',
			)
		);

		$this->add_control(
			'nav_items',
			array(
				'label'       => esc_html__( 'Navigation Items', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'item_icon' => 'fas fa-database',
						'item_text' => 'Information We Collect',
						'item_link' => '#information-collection',
					),
					array(
						'item_icon' => 'fas fa-chart-line',
						'item_text' => 'How We Use Data',
						'item_link' => '#data-usage',
					),
					array(
						'item_icon' => 'fas fa-share-alt',
						'item_text' => 'Data Sharing',
						'item_link' => '#data-sharing',
					),
					array(
						'item_icon' => 'fas fa-lock',
						'item_text' => 'Data Security',
						'item_link' => '#data-security',
					),
					array(
						'item_icon' => 'fas fa-user-shield',
						'item_text' => 'Your Rights',
						'item_link' => '#your-rights',
					),
					array(
						'item_icon' => 'fas fa-cookie-bite',
						'item_text' => 'Cookies Policy',
						'item_link' => '#cookies',
					),
				),
				'title_field' => '{{{ item_text }}}',
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
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-section' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_responsive_control(
			'padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'top'    => '40',
					'right'  => '0',
					'bottom' => '40',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .legal-nav-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1a1a1a',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-wrapper h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .legal-nav-wrapper h3',
			)
		);

		$this->end_controls_section();

		// Navigation Items Style
		$this->start_controls_section(
			'nav_items_style',
			array(
				'label' => esc_html__( 'Navigation Items', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'item_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f5f5f5',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-item' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'item_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1a1a1a',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-item' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'item_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1E41AF',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-item i' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'item_hover_bg_color',
			array(
				'label'     => esc_html__( 'Hover Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#e8f5e9',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-item:hover' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'item_hover_border_color',
			array(
				'label'     => esc_html__( 'Hover Border Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1E41AF',
				'selectors' => array(
					'{{WRAPPER}} .legal-nav-item:hover' => 'border-color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_typography',
				'selector' => '{{WRAPPER}} .legal-nav-item',
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

		<section class="legal-nav-section">
			<div class="container">
				<div class="legal-nav-wrapper">
					<h3>
						<i class="<?php echo esc_attr( $settings['title_icon'] ); ?>"></i>
						<?php echo esc_html( $settings['title'] ); ?>
					</h3>
					<div class="legal-nav-grid">
						<?php foreach ( $settings['nav_items'] as $item ) : ?>
							<a href="<?php echo esc_url( $item['item_link'] ); ?>" class="legal-nav-item">
								<i class="<?php echo esc_attr( $item['item_icon'] ); ?>"></i>
								<span><?php echo esc_html( $item['item_text'] ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Quick_Navigation_Section_Widget() );

