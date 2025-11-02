<?php
/**
 * Elementor Breadcrumb Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Breadcrumb_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-breadcrumb-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Breadcrumb Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-navigation-horizontal';
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
		return array( 'breadcrumb', 'navigation', 'path', 'meridian' );
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
		// Home Link Section
		$this->start_controls_section(
			'home_link_section',
			array(
				'label' => esc_html__( 'Home Link', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'home_text',
			array(
				'label'   => esc_html__( 'Home Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Home',
			)
		);

		$this->add_control(
			'home_url',
			array(
				'label'   => esc_html__( 'Home URL', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => home_url( '/' ),
				),
			)
		);

		$this->add_control(
			'show_home_icon',
			array(
				'label'        => esc_html__( 'Show Home Icon', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'meridian-africa' ),
				'label_off'    => esc_html__( 'No', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		// Intermediate Pages Section
		$this->start_controls_section(
			'intermediate_pages_section',
			array(
				'label' => esc_html__( 'Intermediate Pages', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'page_text',
			array(
				'label'       => esc_html__( 'Page Text', 'meridian-africa' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Page', 'meridian-africa' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'page_url',
			array(
				'label'       => esc_html__( 'Page URL', 'meridian-africa' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'meridian-africa' ),
				'default'     => array(
					'url' => '#',
				),
			)
		);

		$this->add_control(
			'intermediate_pages',
			array(
				'label'       => esc_html__( 'Add Pages', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(),
				'title_field' => '{{{ page_text }}}',
			)
		);

		$this->end_controls_section();

		// Current Page Section
		$this->start_controls_section(
			'current_page_section',
			array(
				'label' => esc_html__( 'Current Page', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'current_page_text',
			array(
				'label'   => esc_html__( 'Current Page Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Solutions',
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
				'default'   => '#1E41AF',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-section' => 'background: linear-gradient(135deg, {{VALUE}} 0%, {{VALUE}} 100%)',
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
					'top'    => '20',
					'right'  => '0',
					'bottom' => '20',
					'left'   => '0',
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .breadcrumb-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Text Style
		$this->start_controls_section(
			'text_style',
			array(
				'label' => esc_html__( 'Text', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'link_color',
			array(
				'label'     => esc_html__( 'Link Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.9)',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-link' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'link_hover_color',
			array(
				'label'     => esc_html__( 'Link Hover Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-link:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'current_color',
			array(
				'label'     => esc_html__( 'Current Page Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-current' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'separator_color',
			array(
				'label'     => esc_html__( 'Separator Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.6)',
				'selectors' => array(
					'{{WRAPPER}} .breadcrumb-separator' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'selector' => '{{WRAPPER}} .breadcrumb',
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

		$home_url = ! empty( $settings['home_url']['url'] ) ? $settings['home_url']['url'] : home_url( '/' );
		?>

		<section class="breadcrumb-section">
			<div class="container">
				<div class="breadcrumb">
					<!-- Home Link -->
					<a href="<?php echo esc_url( $home_url ); ?>" class="breadcrumb-link">
						<?php if ( 'yes' === $settings['show_home_icon'] ) : ?>
							<i class="fas fa-home"></i>
						<?php endif; ?>
						<span><?php echo esc_html( $settings['home_text'] ); ?></span>
					</a>

					<?php
					// Display intermediate pages
					if ( ! empty( $settings['intermediate_pages'] ) ) :
						foreach ( $settings['intermediate_pages'] as $page ) :
							$page_url = ! empty( $page['page_url']['url'] ) ? $page['page_url']['url'] : '#';
							?>
							<span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
							<a href="<?php echo esc_url( $page_url ); ?>" class="breadcrumb-link">
								<span><?php echo esc_html( $page['page_text'] ); ?></span>
							</a>
							<?php
						endforeach;
					endif;
					?>

					<!-- Current Page -->
					<span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
					<span class="breadcrumb-current"><?php echo esc_html( $settings['current_page_text'] ); ?></span>
				</div>
			</div>
		</section>

		<?php
	}
}

// Register the widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Breadcrumb_Section_Widget() );

