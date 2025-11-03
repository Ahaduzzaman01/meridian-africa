<?php
/**
 * Elementor Founder Profile Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Founder_Profile_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-founder-profile-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Founder Profile Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
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
		return array( 'founder', 'profile', 'team', 'bio', 'meridian', 'about' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_image_controls();
		$this->register_content_controls();
		$this->register_bio_controls();
		$this->register_social_controls();
		$this->register_style_controls();
	}

	/**
	 * Register image controls.
	 *
	 * @since 1.0.0
	 */
	private function register_image_controls() {
		$this->start_controls_section(
			'image_section',
			array(
				'label' => esc_html__( 'Profile Image', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'founder_image',
			array(
				'label'   => esc_html__( 'Choose Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'show_decorations',
			array(
				'label'        => esc_html__( 'Show Decorative Circles', 'meridian-africa' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'meridian-africa' ),
				'label_off'    => esc_html__( 'Hide', 'meridian-africa' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register content controls.
	 *
	 * @since 1.0.0
	 */
	private function register_content_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Profile Information', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'founder_name',
			array(
				'label'   => esc_html__( 'Name', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Thompson Ikechukwu',
			)
		);

		$this->add_control(
			'founder_title',
			array(
				'label'   => esc_html__( 'Title/Position', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Founder & CEO',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register bio controls.
	 *
	 * @since 1.0.0
	 */
	private function register_bio_controls() {
		$this->start_controls_section(
			'bio_section',
			array(
				'label' => esc_html__( 'Biography', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'bio_intro',
			array(
				'label'   => esc_html__( 'Introduction Paragraph', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => 'Thompson is a Nigerian-born data architect and AI specialist who\'s tackling one of Africa\'s biggest challenges: agricultural fraud. After earning his Master\'s in Data Science and AI with Distinction from the University of Suffolk, Thompson founded Meridian Africa to use satellite technology and machine learning to bring radical transparency and verify agricultural programs at scale across Africa—at 80% lower cost than traditional methods.',
			)
		);

		$this->add_control(
			'bio_additional',
			array(
				'label'   => esc_html__( 'Additional Paragraph', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Today, he\'s scaling this solution across the continent, proving that transparency, technology, and social impact can go hand in hand.',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Register social controls.
	 *
	 * @since 1.0.0
	 */
	private function register_social_controls() {
		$this->start_controls_section(
			'social_section',
			array(
				'label' => esc_html__( 'Social Links', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'linkedin_url',
			array(
				'label'       => esc_html__( 'LinkedIn URL', 'meridian-africa' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'https://www.linkedin.com/in/username/',
				'default'     => array(
					'url'         => 'https://www.linkedin.com/in/thompson-ikechukwu/',
					'is_external' => true,
					'nofollow'    => false,
				),
			)
		);

		$this->add_control(
			'twitter_url',
			array(
				'label'       => esc_html__( 'Twitter URL', 'meridian-africa' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'https://twitter.com/username',
				'default'     => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => false,
				),
			)
		);

		$this->add_control(
			'email',
			array(
				'label'       => esc_html__( 'Email Address', 'meridian-africa' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 'email@example.com',
				'default'     => '',
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
		// Name Style
		$this->start_controls_section(
			'name_style',
			array(
				'label' => esc_html__( 'Name', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'name_color',
			array(
				'label'     => esc_html__( 'Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .founder-name' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .founder-name',
			)
		);

		$this->end_controls_section();

		// Title Style
		$this->start_controls_section(
			'title_style',
			array(
				'label' => esc_html__( 'Title/Position', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .founder-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .founder-title',
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

		// Enqueue the founders CSS
		wp_enqueue_style( 'meridian-founders' );
		
		// Enqueue AOS library for animations
		wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
		wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );
		
		// Enqueue founders JS
		wp_enqueue_script( 'meridian-founders-js' );
		
		// Initialize AOS
		wp_add_inline_script( 'aos-js', 'AOS.init();' );
		?>

		<!-- Founder Profile Section -->
		<section class="founder-profile">
			<div class="container">
				<div class="profile-grid">
					<!-- Image Column -->
					<div class="profile-image-wrapper" data-aos="fade-right" data-aos-duration="1000">
						<?php if ( 'yes' === $settings['show_decorations'] ) : ?>
						<div class="image-decoration">
							<div class="decoration-circle circle-1"></div>
							<div class="decoration-circle circle-2"></div>
							<div class="decoration-circle circle-3"></div>
						</div>
						<?php endif; ?>
						<div class="profile-image-container">
							<img src="<?php echo esc_url( $settings['founder_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['founder_name'] ); ?> - <?php echo esc_attr( $settings['founder_title'] ); ?>" class="founder-image">
						</div>
					</div>

					<!-- Content Column -->
					<div class="profile-content" data-aos="fade-left" data-aos-duration="1000">
						<div class="content-header">
							<h2 class="founder-name"><?php echo esc_html( $settings['founder_name'] ); ?></h2>
							<p class="founder-title"><?php echo esc_html( $settings['founder_title'] ); ?></p>
							<div class="social-links">
								<?php if ( ! empty( $settings['linkedin_url']['url'] ) ) : ?>
								<a href="<?php echo esc_url( $settings['linkedin_url']['url'] ); ?>" target="_blank" class="social-link" title="LinkedIn">
									<i class="fab fa-linkedin-in"></i>
								</a>
								<?php endif; ?>
								<?php if ( ! empty( $settings['twitter_url']['url'] ) ) : ?>
								<a href="<?php echo esc_url( $settings['twitter_url']['url'] ); ?>" target="_blank" class="social-link" title="Twitter">
									<i class="fab fa-twitter"></i>
								</a>
								<?php endif; ?>
								<?php if ( ! empty( $settings['email'] ) ) : ?>
								<a href="mailto:<?php echo esc_attr( $settings['email'] ); ?>" class="social-link" title="Email">
									<i class="fas fa-envelope"></i>
								</a>
								<?php endif; ?>
							</div>
						</div>

						<div class="bio-content">
							<?php if ( ! empty( $settings['bio_intro'] ) ) : ?>
							<div class="bio-intro">
								<p class="bio-text">
									<?php echo esc_html( $settings['bio_intro'] ); ?>
								</p>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $settings['bio_additional'] ) ) : ?>
							<p class="bio-text">
								<?php echo esc_html( $settings['bio_additional'] ); ?>
							</p>
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
Plugin::instance()->widgets_manager->register( new Meridian_Africa_Founder_Profile_Section_Widget() );

