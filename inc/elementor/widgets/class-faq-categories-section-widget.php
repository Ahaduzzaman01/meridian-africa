<?php
/**
 * Elementor FAQ Categories Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_FAQ_Categories_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-faq-categories-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'FAQ Categories Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
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
		return array( 'faq', 'accordion', 'questions', 'answers', 'meridian', 'categories' );
	}

	/**
	 * Get script dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array( 'meridian-faq-script' );
	}

	/**
	 * Get style dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		return array( 'meridian-faq-styles' );
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
		// FAQ Categories Section
		$this->start_controls_section(
			'faq_categories_section',
			array(
				'label' => esc_html__( 'FAQ Categories', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater_categories = new Repeater();

		$repeater_categories->add_control(
			'category_icon',
			array(
				'label'   => esc_html__( 'Category Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-circle-question',
			)
		);

		$repeater_categories->add_control(
			'category_title',
			array(
				'label'   => esc_html__( 'Category Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'GENERAL & OVERVIEW',
			)
		);

		// FAQ Items Repeater
		$repeater_categories->add_control(
			'faq_items',
			array(
				'label'       => esc_html__( 'FAQ Items', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $this->get_faq_item_fields(),
				'default'     => array(
					array(
						'question' => esc_html__( 'What is Meridian Sentinel?', 'meridian-africa' ),
						'answer'   => esc_html__( 'Meridian Sentinel is a satellite-based verification infrastructure...', 'meridian-africa' ),
					),
				),
				'title_field' => '{{{ question }}}',
			)
		);

		$this->add_control(
			'faq_categories',
			array(
				'label'       => esc_html__( 'Categories', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater_categories->get_controls(),
				'default'     => array(
					array(
						'category_icon'  => 'fas fa-circle-question',
						'category_title' => 'GENERAL & OVERVIEW',
					),
				),
				'title_field' => '{{{ category_title }}}',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get FAQ item fields for nested repeater.
	 *
	 * @since 1.0.0
	 * @return array FAQ item fields.
	 */
	private function get_faq_item_fields() {
		$fields = array();

		$fields[] = array(
			'name'    => 'question',
			'label'   => esc_html__( 'Question', 'meridian-africa' ),
			'type'    => Controls_Manager::TEXT,
			'default' => esc_html__( 'Your question here?', 'meridian-africa' ),
		);

		$fields[] = array(
			'name'    => 'answer',
			'label'   => esc_html__( 'Answer', 'meridian-africa' ),
			'type'    => Controls_Manager::WYSIWYG,
			'default' => esc_html__( 'Your answer here...', 'meridian-africa' ),
		);

		return $fields;
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
				'label' => esc_html__( 'Section Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'section_background',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-section' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .faq-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Category Header Style
		$this->start_controls_section(
			'category_header_style',
			array(
				'label' => esc_html__( 'Category Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'category_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .category-header h2' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'category_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .category-header i' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

		// FAQ Item Style
		$this->start_controls_section(
			'faq_item_style',
			array(
				'label' => esc_html__( 'FAQ Items', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'question_color',
			array(
				'label'     => esc_html__( 'Question Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-question h3' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'answer_color',
			array(
				'label'     => esc_html__( 'Answer Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-answer p' => 'color: {{VALUE}};',
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

		<!-- FAQ Categories Section -->
		<section class="faq-section">
			<div class="container">
				<?php if ( ! empty( $settings['faq_categories'] ) ) : ?>
					<?php foreach ( $settings['faq_categories'] as $category_index => $category ) : ?>
						<!-- FAQ Category -->
						<div class="faq-category">
							<div class="category-header">
								<i class="<?php echo esc_attr( $category['category_icon'] ); ?>"></i>
								<h2><?php echo esc_html( $category['category_title'] ); ?></h2>
							</div>
							<div class="faq-grid">
								<?php if ( ! empty( $category['faq_items'] ) ) : ?>
									<?php foreach ( $category['faq_items'] as $item_index => $item ) : ?>
										<div class="faq-item">
											<div class="faq-question">
												<h3><?php echo esc_html( $item['question'] ); ?></h3>
												<i class="fas fa-chevron-down"></i>
											</div>
											<div class="faq-answer">
												<?php echo wp_kses_post( $item['answer'] ); ?>
											</div>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</section>

		<?php
	}

	/**
	 * Render widget output in the editor.
	 *
	 * @since 1.0.0
	 */
	protected function content_template() {
		?>
		<#
		if ( settings.faq_categories.length ) {
			#>
			<section class="faq-section">
				<div class="container">
					<#
					_.each( settings.faq_categories, function( category, categoryIndex ) {
						#>
						<div class="faq-category">
							<div class="category-header">
								<i class="{{ category.category_icon }}"></i>
								<h2>{{{ category.category_title }}}</h2>
							</div>
							<div class="faq-grid">
								<#
								if ( category.faq_items && category.faq_items.length ) {
									_.each( category.faq_items, function( item, itemIndex ) {
										#>
										<div class="faq-item">
											<div class="faq-question">
												<h3>{{{ item.question }}}</h3>
												<i class="fas fa-chevron-down"></i>
											</div>
											<div class="faq-answer">
												{{{ item.answer }}}
											</div>
										</div>
										<#
									});
								}
								#>
							</div>
						</div>
						<#
					});
					#>
				</div>
			</section>
			<#
		}
		#>
		<?php
	}
}

// Register widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_FAQ_Categories_Section_Widget() );

