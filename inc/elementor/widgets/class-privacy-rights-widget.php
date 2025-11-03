<?php
/**
 * Privacy Rights Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Privacy Rights Widget Class
 *
 * @since 1.0.0
 */
class Privacy_Rights_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'privacy-rights';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Privacy Rights', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-lock-user';
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
		return array( 'privacy', 'rights', 'legal', 'gdpr', 'meridian' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_content_controls();
		$this->register_cta_controls();
	}

	/**
	 * Register Content Controls
	 */
	private function register_content_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'section_title',
			array(
				'label'   => esc_html__( 'Section Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Your Privacy Rights',
			)
		);

		$this->add_control(
			'section_icon',
			array(
				'label'   => esc_html__( 'Section Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-user-shield',
					'library' => 'fa-solid',
				),
			)
		);

		$this->add_control(
			'intro_text',
			array(
				'label'   => esc_html__( 'Introduction Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'You have the following rights regarding your personal data:',
			)
		);

		// Rights Repeater
		$repeater = new Repeater();

		$repeater->add_control(
			'right_icon',
			array(
				'label'   => esc_html__( 'Icon', 'meridian-africa' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-eye',
					'library' => 'fa-solid',
				),
			)
		);

		$repeater->add_control(
			'right_title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Right to Access',
			)
		);

		$repeater->add_control(
			'right_description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Request a copy of all personal data we hold about you',
				'rows'    => 3,
			)
		);

		$this->add_control(
			'rights_list',
			array(
				'label'       => esc_html__( 'Privacy Rights', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'right_icon'        => array(
							'value'   => 'fas fa-eye',
							'library' => 'fa-solid',
						),
						'right_title'       => 'Right to Access',
						'right_description' => 'Request a copy of all personal data we hold about you',
					),
					array(
						'right_icon'        => array(
							'value'   => 'fas fa-edit',
							'library' => 'fa-solid',
						),
						'right_title'       => 'Right to Rectification',
						'right_description' => 'Correct any inaccurate or incomplete information',
					),
					array(
						'right_icon'        => array(
							'value'   => 'fas fa-trash-alt',
							'library' => 'fa-solid',
						),
						'right_title'       => 'Right to Erasure',
						'right_description' => 'Request deletion of your personal data under certain conditions',
					),
					array(
						'right_icon'        => array(
							'value'   => 'fas fa-download',
							'library' => 'fa-solid',
						),
						'right_title'       => 'Data Portability',
						'right_description' => 'Receive your data in a structured, machine-readable format',
					),
					array(
						'right_icon'        => array(
							'value'   => 'fas fa-ban',
							'library' => 'fa-solid',
						),
						'right_title'       => 'Right to Object',
						'right_description' => 'Object to processing of your data for specific purposes',
					),
				),
				'title_field' => '{{{ right_title }}}',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register CTA Controls
	 */
	private function register_cta_controls() {
		$this->start_controls_section(
			'cta_section',
			array(
				'label' => esc_html__( 'Call to Action', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'cta_title',
			array(
				'label'   => esc_html__( 'CTA Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Exercise Your Rights',
			)
		);

		$this->add_control(
			'cta_text',
			array(
				'label'   => esc_html__( 'CTA Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'To exercise any of these rights, please contact us at',
				'rows'    => 2,
			)
		);

		$this->add_control(
			'cta_email',
			array(
				'label'   => esc_html__( 'Contact Email', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'compliance@meridianafrica.io',
			)
		);

		$this->add_control(
			'cta_button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Contact Privacy Team',
			)
		);

		$this->add_control(
			'cta_button_link',
			array(
				'label'   => esc_html__( 'Button Link', 'meridian-africa' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => 'contact.html',
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

		<div id="your-rights" class="legal-section">
			<div class="protection-wrapper">
				<div class="section-icon">
					<?php Icons_Manager::render_icon( $settings['section_icon'], array( 'aria-hidden' => 'true' ) ); ?>
				</div>
				<h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
			</div>
			
			<p><?php echo esc_html( $settings['intro_text'] ); ?></p>
			
			<div class="rights-list">
				<?php foreach ( $settings['rights_list'] as $item ) : ?>
					<div class="right-item">
						<div class="right-icon">
							<?php Icons_Manager::render_icon( $item['right_icon'], array( 'aria-hidden' => 'true' ) ); ?>
						</div>
						<div class="right-content">
							<h4><?php echo esc_html( $item['right_title'] ); ?></h4>
							<p><?php echo esc_html( $item['right_description'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="cta-box">
				<h4><?php echo esc_html( $settings['cta_title'] ); ?></h4>
				<p>
					<?php echo esc_html( $settings['cta_text'] ); ?> 
					<a href="mailto:<?php echo esc_attr( $settings['cta_email'] ); ?>">
						<?php echo esc_html( $settings['cta_email'] ); ?>
					</a>
				</p>
				<?php
				$cta_link     = $settings['cta_button_link']['url'];
				$cta_target   = $settings['cta_button_link']['is_external'] ? ' target="_blank"' : '';
				$cta_nofollow = $settings['cta_button_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
				<a href="<?php echo esc_url( $cta_link ); ?>"<?php echo $cta_target . $cta_nofollow; ?> class="btn-primary">
					<?php echo esc_html( $settings['cta_button_text'] ); ?>
				</a>
			</div>
		</div>

		<?php
	}
}

