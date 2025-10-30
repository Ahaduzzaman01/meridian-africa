<?php
/**
 * Elementor Policy Alignment Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Policy_Alignment_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-policy-alignment-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Policy Alignment Section', 'meridian-africa' );
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
		return array( 'policy', 'alignment', 'frameworks', 'development', 'meridian', 'agrovue' );
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
				'default' => 'fas fa-globe-africa',
			)
		);

		$this->add_control(
			'badge_text',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'POLICY ALIGNMENT',
			)
		);

		$this->end_controls_section();

		// Header Section
		$this->start_controls_section(
			'header_section',
			array(
				'label' => esc_html__( 'Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'main_title',
			array(
				'label'   => esc_html__( 'Main Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Aligned with Global Development Frameworks',
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Meridian Sentinel directly supports implementation of major agricultural development frameworks and institutional mandates across Africa.',
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
			'framework_logo',
			array(
				'label'   => esc_html__( 'Framework Logo', 'meridian-africa' ),
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
				'type'    => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Framework description goes here.', 'meridian-africa' ),
			)
		);

		$repeater->add_control(
			'framework_tag',
			array(
				'label'   => esc_html__( 'Framework Tag', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Tag Label', 'meridian-africa' ),
			)
		);

		$repeater->add_control(
			'framework_color_scheme',
			array(
				'label'   => esc_html__( 'Color Scheme', 'meridian-africa' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'framework-purple',
				'options' => array(
					'framework-purple'  => esc_html__( 'Purple', 'meridian-africa' ),
					'framework-teal'    => esc_html__( 'Teal', 'meridian-africa' ),
					'framework-amber'   => esc_html__( 'Amber', 'meridian-africa' ),
					'framework-emerald' => esc_html__( 'Emerald', 'meridian-africa' ),
				),
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
						'framework_title'        => esc_html__( 'African Union Agenda 2063', 'meridian-africa' ),
						'framework_description'  => '<p><strong>Goal 5:</strong> Modern agriculture for increased productivity and food security. <strong>Digital Transformation Strategy (2020–2030):</strong> Agricultural digitization priority. Supports continental agricultural development vision.</p>',
						'framework_tag'          => 'Continental Framework',
						'framework_color_scheme' => 'framework-purple',
					),
					array(
						'framework_title'        => esc_html__( 'CAADP Malabo Declaration', 'meridian-africa' ),
						'framework_description'  => '<p><strong>Commitment 3:</strong> Ending hunger (yield forecasting supports food security). <strong>Commitment 7:</strong> Accountability for actions and results (transparent verification). CAADP M&E Framework alignment.</p>',
						'framework_tag'          => 'Agricultural Policy',
						'framework_color_scheme' => 'framework-teal',
					),
					array(
						'framework_title'        => esc_html__( 'Sustainable Development Goals', 'meridian-africa' ),
						'framework_description'  => '<p><strong>SDG 2.3:</strong> Double smallholder productivity and incomes (verified input programs). <strong>SDG 2.4:</strong> Sustainable food production systems. <strong>SDG 16.5:</strong> Substantially reduce corruption (prevents fraud).</p>',
						'framework_tag'          => 'Global Goals',
						'framework_color_scheme' => 'framework-amber',
					),
					array(
						'framework_title'        => esc_html__( 'World Bank & AFDB Standards', 'meridian-africa' ),
						'framework_description'  => '<p><strong>World Bank ESF:</strong> Environmental and Social Standards M&E component. <strong>Results-Based Financing:</strong> Independent verification of disbursement-linked indicators. <strong>AFDB Agricultural Transformation Strategy.</strong></p>',
						'framework_tag'          => 'Development Finance',
						'framework_color_scheme' => 'framework-emerald',
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
		// Style controls can be added here if needed
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- Policy Alignment Section -->
		<section class="policy-alignment-showcase">
			<div class="container">
				<div class="policy-showcase-header">
					<div class="policy-badge-premium">
						<i class="<?php echo esc_attr( $settings['badge_icon'] ); ?>"></i>
						<span><?php echo esc_html( $settings['badge_text'] ); ?></span>
					</div>
					<h2 class="policy-main-title"><?php echo esc_html( $settings['main_title'] ); ?></h2>
					<p class="policy-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p>
				</div>

				<div class="policy-frameworks-grid">
					<?php foreach ( $settings['framework_items'] as $item ) : ?>
						<div class="policy-framework-item <?php echo esc_attr( $item['framework_color_scheme'] ); ?>">
							<div class="framework-accent-bar"></div>
							<div class="framework-header-section">
								<div class="framework-icon-premium">
									<?php if ( ! empty( $item['framework_logo']['url'] ) ) : ?>
										<img src="<?php echo esc_url( $item['framework_logo']['url'] ); ?>" alt="<?php echo esc_attr( $item['framework_title'] ); ?>" class="framework-logo">
									<?php endif; ?>
								</div>
								<h3 class="framework-title-premium"><?php echo esc_html( $item['framework_title'] ); ?></h3>
							</div>
							<div class="framework-description-box">
								<?php echo wp_kses_post( $item['framework_description'] ); ?>
							</div>
							<div class="framework-footer-tag">
								<span class="tag-label"><?php echo esc_html( $item['framework_tag'] ); ?></span>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Policy_Alignment_Section_Widget() );

