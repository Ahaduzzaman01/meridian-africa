<?php
/**
 * Elementor Scroll-Triggered Image Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_Scroll_Triggered_Image_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-scroll-triggered-image-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Scroll-Triggered Image Section', 'meridian-africa' );
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
		return array( 'scroll', 'image', 'triggered', 'sticky', 'meridian', 'agrovue' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_content_controls();
	}

	/**
	 * Register content controls.
	 *
	 * @since 1.0.0
	 */
	private function register_content_controls() {
		// Content Blocks Section
		$this->start_controls_section(
			'content_blocks_section',
			array(
				'label' => esc_html__( 'Content Blocks', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Image', 'meridian-africa' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'image_label',
			array(
				'label'   => esc_html__( 'Image Label', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Real-Time Monitoring',
			)
		);

		$repeater->add_control(
			'badge',
			array(
				'label'   => esc_html__( 'Badge Text', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '01 / MONITORING',
			)
		);

		$repeater->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Real-Time Satellite Monitoring',
			)
		);

		$repeater->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 3,
				'default' => 'Track agricultural activities across vast landscapes with continuous satellite surveillance and automated change detection.',
			)
		);

		// Features Repeater
		$repeater->add_control(
			'features',
			array(
				'label'       => esc_html__( 'Features', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array(
					array(
						'name'    => 'feature_icon',
						'label'   => esc_html__( 'Icon (Font Awesome class)', 'meridian-africa' ),
						'type'    => Controls_Manager::TEXT,
						'default' => 'fas fa-satellite',
					),
					array(
						'name'    => 'feature_title',
						'label'   => esc_html__( 'Feature Title', 'meridian-africa' ),
						'type'    => Controls_Manager::TEXT,
						'default' => 'Multi-Spectral Imaging',
					),
					array(
						'name'    => 'feature_description',
						'label'   => esc_html__( 'Feature Description', 'meridian-africa' ),
						'type'    => Controls_Manager::TEXTAREA,
						'rows'    => 2,
						'default' => 'Capture data across visible and infrared spectrums to assess crop health, soil moisture, and vegetation indices.',
					),
				),
				'title_field' => '{{{ feature_title }}}',
			)
		);

		// Stats Repeater
		$repeater->add_control(
			'stats',
			array(
				'label'       => esc_html__( 'Stats', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array(
					array(
						'name'    => 'stat_number',
						'label'   => esc_html__( 'Stat Number', 'meridian-africa' ),
						'type'    => Controls_Manager::TEXT,
						'default' => '4+',
					),
					array(
						'name'    => 'stat_label',
						'label'   => esc_html__( 'Stat Label', 'meridian-africa' ),
						'type'    => Controls_Manager::TEXT,
						'default' => 'Hectares Monitored',
					),
				),
				'title_field' => '{{{ stat_label }}}',
			)
		);

		$this->add_control(
			'content_blocks',
			array(
				'label'       => esc_html__( 'Content Blocks', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $this->get_default_content_blocks(),
				'title_field' => '{{{ title }}}',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get default content blocks.
	 *
	 * @since 1.0.0
	 * @return array Default content blocks.
	 */
	private function get_default_content_blocks() {
		return array(
			array(
				'image'       => array( 'url' => Utils::get_placeholder_image_src() ),
				'image_label' => 'Real-Time Monitoring',
				'badge'       => '01 / MONITORING',
				'title'       => 'Real-Time Satellite Monitoring',
				'description' => 'Track agricultural activities across vast landscapes with continuous satellite surveillance and automated change detection.',
				'features'    => array(
					array(
						'feature_icon'        => 'fas fa-satellite',
						'feature_title'       => 'Multi-Spectral Imaging',
						'feature_description' => 'Capture data across visible and infrared spectrums to assess crop health, soil moisture, and vegetation indices.',
					),
					array(
						'feature_icon'        => 'fas fa-clock',
						'feature_title'       => 'Continuous Coverage',
						'feature_description' => 'Daily satellite passes ensure you never miss critical changes in your monitored areas.',
					),
					array(
						'feature_icon'        => 'fas fa-bell',
						'feature_title'       => 'Automated Alerts',
						'feature_description' => 'Receive instant notifications when significant changes are detected in your areas of interest.',
					),
				),
				'stats'       => array(
					array(
						'stat_number' => '4+',
						'stat_label'  => 'Hectares Monitored',
					),
					array(
						'stat_number' => '24/7',
						'stat_label'  => 'Continuous Tracking',
					),
					array(
						'stat_number' => '3m',
						'stat_label'  => 'Resolution',
					),
				),
			),
		);
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings       = $this->get_settings_for_display();
		$content_blocks = $settings['content_blocks'];

		if ( empty( $content_blocks ) ) {
			return;
		}

		$this->render_styles();
		?>

		<!-- Scroll-Triggered Image Section -->
		<section class="scroll-image-section">
			<div class="container-fluid">
				<div class="scroll-image-wrapper">
					<!-- Fixed Image Side -->
					<div class="fixed-image-container">
						<div class="image-stack">
							<?php foreach ( $content_blocks as $index => $block ) : ?>
								<div class="scroll-image <?php echo 0 === $index ? 'active' : ''; ?>" data-index="<?php echo esc_attr( $index ); ?>">
									<img src="<?php echo esc_url( $block['image']['url'] ); ?>" alt="<?php echo esc_attr( $block['image_label'] ); ?>">
									<div class="image-overlay">
										<div class="image-label"><?php echo esc_html( $block['image_label'] ); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Scrollable Content Side -->
					<div class="scrollable-content-container">
						<?php foreach ( $content_blocks as $index => $block ) : ?>
							<div class="content-block <?php echo 0 === $index ? 'main-content-block' : ''; ?>" data-image="<?php echo esc_attr( $index ); ?>">
								<div class="content-badge"><?php echo esc_html( $block['badge'] ); ?></div>
								<h2><?php echo esc_html( $block['title'] ); ?></h2>
								<p class="content-lead"><?php echo esc_html( $block['description'] ); ?></p>

								<?php if ( ! empty( $block['features'] ) ) : ?>
									<div class="content-features">
										<?php foreach ( $block['features'] as $feature ) : ?>
											<div class="feature-item">
												<div class="feature-icon">
													<i class="<?php echo esc_attr( $feature['feature_icon'] ); ?>"></i>
												</div>
												<div class="feature-text">
													<h4><?php echo esc_html( $feature['feature_title'] ); ?></h4>
													<p><?php echo esc_html( $feature['feature_description'] ); ?></p>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>

								<?php if ( ! empty( $block['stats'] ) ) : ?>
									<div class="content-stats">
										<?php foreach ( $block['stats'] as $stat ) : ?>
											<div class="stat-item">
												<div class="stat-number"><?php echo esc_html( $stat['stat_number'] ); ?></div>
												<div class="stat-label"><?php echo esc_html( $stat['stat_label'] ); ?></div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<?php
		$this->render_scripts();
	}

	/**
	 * Render inline styles.
	 *
	 * @since 1.0.0
	 */
	private function render_styles() {
		?>
		<style>
		/* Scroll-Triggered Image Section Styles */
		.scroll-image-section {
			position: relative;
			background: linear-gradient(135deg, #0a0f1c 0%, #1a1f2e 50%, #0f1419 100%);
			padding: 0;
			overflow: visible;
		}

		.scroll-image-section::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background:
				radial-gradient(circle at 20% 30%, rgba(46, 143, 51, 0.08) 0%, transparent 50%),
				radial-gradient(circle at 80% 70%, rgba(14, 165, 233, 0.06) 0%, transparent 50%);
			pointer-events: none;
			z-index: 0;
		}

		.container-fluid {
			max-width: 100%;
			margin: 0 auto;
			padding: 0;
		}

		.scroll-image-wrapper {
			position: relative;
			display: flex;
			min-height: 400vh;
			z-index: 1;
		}

		.fixed-image-container {
			position: sticky;
			top: 120px;
			left: 0;
			width: 45%;
			height: calc(100vh - 160px);
			z-index: 10;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 40px 60px;
			margin: 80px 0;
		}

		.fixed-image-container::before {
			content: '';
			position: absolute;
			top: -20px;
			left: 20px;
			right: 20px;
			bottom: -20px;
			border: 2px solid rgba(46, 143, 51, 0.2);
			border-radius: 24px;
			pointer-events: none;
			z-index: -1;
		}

		.fixed-image-container::after {
			content: '';
			position: absolute;
			top: 20px;
			left: -20px;
			right: -20px;
			bottom: 20px;
			background: linear-gradient(135deg, rgba(46, 143, 51, 0.1), rgba(14, 165, 233, 0.05));
			border-radius: 24px;
			pointer-events: none;
			z-index: -2;
			filter: blur(20px);
		}

		.image-stack {
			position: relative;
			width: 100%;
			height: 100%;
			border-radius: 24px;
			overflow: hidden;
			box-shadow:
				0 30px 90px rgba(0, 0, 0, 0.5),
				0 0 0 1px rgba(255, 255, 255, 0.1),
				inset 0 0 0 1px rgba(255, 255, 255, 0.05);
			transform-style: preserve-3d;
			transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.image-stack:hover {
			transform: scale(1.02) translateZ(20px);
		}

		.image-stack::before {
			content: '';
			position: absolute;
			top: -2px;
			left: -2px;
			right: -2px;
			bottom: -2px;
			background: linear-gradient(45deg, #2e8f33, #0ea5e9, #2e8f33, #0ea5e9);
			background-size: 300% 300%;
			border-radius: 24px;
			z-index: -1;
			opacity: 0;
			animation: gradientShift 6s ease infinite;
			transition: opacity 0.4s ease;
		}

		.image-stack:hover::before {
			opacity: 0.6;
		}

		@keyframes gradientShift {
			0%, 100% { background-position: 0% 50%; }
			50% { background-position: 100% 50%; }
		}

		.scroll-image {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			opacity: 0;
			transform: scale(1.1);
			transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
			z-index: 1;
		}

		.scroll-image.active {
			opacity: 1;
			transform: scale(1);
			z-index: 2;
		}

		.scroll-image img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			display: block;
			filter: brightness(0.85) contrast(1.1);
		}

		.image-overlay {
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
			padding: 50px;
			background: linear-gradient(
				to top,
				rgba(10, 15, 28, 0.95) 0%,
				rgba(10, 15, 28, 0.7) 40%,
				rgba(10, 15, 28, 0.3) 70%,
				transparent 100%
			);
			z-index: 3;
			pointer-events: none;
			backdrop-filter: blur(8px);
		}

		.image-label {
			color: white;
			font-size: 28px;
			font-weight: 700;
			letter-spacing: -0.5px;
			text-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
			line-height: 1.2;
			position: relative;
			padding-left: 20px;
		}

		.image-label::before {
			content: '';
			position: absolute;
			left: 3%;
			top: 38%;
			transform: translateY(-50%);
			width: 4px;
			height: 80%;
			background: linear-gradient(to bottom, #2e8f33, #0ea5e9);
			border-radius: 2px;
		}

		.scrollable-content-container {
			position: relative;
			width: 55%;
			background: transparent;
			z-index: 2;
			padding-left: 40px;
		}

		.content-block {
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			padding: 0px 80px 100px 60px;
			opacity: 0.3;
			transform: translateY(30px);
			transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
			position: relative;
			background: transparent;
		}

		.content-block.main-content-block {
			padding: 100px 80px 100px 60px;
		}

		.content-block.active {
			opacity: 1;
			transform: translateY(0);
		}

		.content-badge {
			display: inline-flex;
			align-items: center;
			width: max-content;
			gap: 8px;
			padding: 8px 18px;
			background: linear-gradient(135deg, rgba(46, 143, 51, 0.15), rgba(46, 143, 51, 0.05));
			color: #2e8f33;
			font-size: 11px;
			font-weight: 700;
			letter-spacing: 2px;
			border-radius: 30px;
			margin-bottom: 24px;
			border: 1.5px solid rgba(46, 143, 51, 0.3);
			text-transform: uppercase;
			backdrop-filter: blur(10px);
			box-shadow: 0 4px 15px rgba(46, 143, 51, 0.1);
		}

		.content-badge::before {
			content: '';
			width: 6px;
			height: 6px;
			background: #2e8f33;
			border-radius: 50%;
			box-shadow: 0 0 10px rgba(46, 143, 51, 0.6);
			animation: pulse 2s ease-in-out infinite;
		}

		@keyframes pulse {
			0%, 100% { opacity: 1; transform: scale(1); }
			50% { opacity: 0.6; transform: scale(0.8); }
		}

		.content-block h2 {
			font-size: 52px;
			font-weight: 800;
			color: #ffffff;
			line-height: 1.1;
			margin-bottom: 28px;
			letter-spacing: -1.5px;
			background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-clip: text;
		}

		.content-lead {
			font-size: 20px;
			color: rgba(255, 255, 255, 0.7);
			line-height: 1.7;
			margin-bottom: 50px;
			font-weight: 400;
		}

		.content-features {
			display: flex;
			flex-direction: column;
			gap: 20px;
			margin-bottom: 50px;
		}

		.feature-item {
			display: flex;
			gap: 24px;
			align-items: flex-start;
			padding: 24px;
			background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
			border: 1px solid rgba(255, 255, 255, 0.1);
			border-radius: 16px;
			backdrop-filter: blur(10px);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			position: relative;
			overflow: hidden;
		}

		.feature-item::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 4px;
			height: 100%;
			background: linear-gradient(to bottom, #2e8f33, #0ea5e9);
			transform: scaleY(0);
			transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.feature-item:hover {
			transform: translateX(8px);
			background: linear-gradient(135deg, rgba(46, 143, 51, 0.1), rgba(14, 165, 233, 0.05));
			border-color: rgba(46, 143, 51, 0.3);
			box-shadow: 0 8px 30px rgba(46, 143, 51, 0.15);
		}

		.feature-item:hover::before {
			transform: scaleY(1);
		}

		.feature-item:hover .feature-icon {
			background: linear-gradient(135deg, #2e8f33, #1e6b23);
			color: white;
			transform: scale(1.1) rotate(5deg);
		}

		.feature-icon {
			flex-shrink: 0;
			width: 56px;
			height: 56px;
			background: linear-gradient(135deg, rgba(46, 143, 51, 0.2), rgba(46, 143, 51, 0.1));
			border-radius: 14px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #2e8f33;
			font-size: 24px;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			border: 1px solid rgba(46, 143, 51, 0.2);
		}

		.feature-text h4 {
			font-size: 20px;
			font-weight: 700;
			color: #ffffff;
			margin-bottom: 8px;
			letter-spacing: -0.4px;
		}

		.feature-text p {
			font-size: 16px;
			color: rgba(255, 255, 255, 0.6);
			line-height: 1.6;
			margin: 0;
			font-weight: 400;
		}

		.content-stats {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			gap: 24px;
			padding-top: 50px;
			margin-top: 50px;
			border-top: 1px solid rgba(255, 255, 255, 0.1);
		}

		.stat-item {
			text-align: left;
			padding: 28px;
			background: linear-gradient(135deg, rgba(46, 143, 51, 0.08), rgba(14, 165, 233, 0.04));
			border-radius: 16px;
			border: 1px solid rgba(255, 255, 255, 0.08);
			backdrop-filter: blur(10px);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			position: relative;
			overflow: hidden;
		}

		.stat-item::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 3px;
			background: linear-gradient(90deg, #2e8f33, #0ea5e9);
			transform: scaleX(0);
			transform-origin: left;
			transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.stat-item:hover {
			transform: translateY(-4px);
			background: linear-gradient(135deg, rgba(46, 143, 51, 0.15), rgba(14, 165, 233, 0.08));
			border-color: rgba(46, 143, 51, 0.3);
			box-shadow: 0 12px 40px rgba(46, 143, 51, 0.2);
		}

		.stat-item:hover::before {
			transform: scaleX(1);
		}

		.stat-item:hover .stat-number {
			transform: scale(1.05);
			color: #2e8f33;
		}

		.stat-number {
			font-size: 48px;
			font-weight: 800;
			color: #ffffff;
			line-height: 1;
			margin-bottom: 12px;
			letter-spacing: -1.5px;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			background: linear-gradient(135deg, #ffffff, #2e8f33);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-clip: text;
		}

		.stat-label {
			font-size: 14px;
			font-weight: 500;
			color: rgba(255, 255, 255, 0.6);
			text-transform: uppercase;
			letter-spacing: 1px;
			line-height: 1.4;
		}

		/* Responsive Styles */
		@media (max-width: 1400px) {
			.fixed-image-container {
				width: 48%;
				padding: 30px 40px;
			}

			.scrollable-content-container {
				width: 52%;
				padding-left: 30px;
			}

			.content-block {
				padding: 80px 60px 80px 40px;
			}

			.content-block h2 {
				font-size: 46px;
			}
		}

		@media (max-width: 1200px) {
			.scroll-image-wrapper {
				flex-direction: column;
				min-height: auto;
			}

			.fixed-image-container {
				position: relative;
				top: 0;
				width: 100%;
				height: 600px;
				padding: 40px;
				margin: 0;
			}

			.fixed-image-container::before,
			.fixed-image-container::after {
				display: none;
			}

			.scrollable-content-container {
				width: 100%;
				padding-left: 0;
			}

			.content-block {
				min-height: auto;
				padding: 80px 60px;
			}

			.content-block h2 {
				font-size: 42px;
			}

			.image-label {
				font-size: 24px;
			}

			.image-overlay {
				padding: 40px;
			}

			.content-stats {
				grid-template-columns: repeat(3, 1fr);
			}
		}

		@media (max-width: 768px) {
			.scroll-image-wrapper {
				display: flex;
				flex-direction: column;
				min-height: auto;
				padding: 0;
			}

			.fixed-image-container {
				position: sticky;
				top: 90px;
				width: calc(100% - 32px);
				height: 350px;
				padding: 0;
				margin: 16px 16px 0 16px;
				z-index: 10;
				border-radius: 24px;
				overflow: hidden;
				box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1);
				transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			}

			.fixed-image-container::before {
				content: '';
				position: absolute;
				top: -2px;
				left: -2px;
				right: -2px;
				bottom: -2px;
				background: linear-gradient(135deg, #2e8f33, #0ea5e9, #2e8f33);
				background-size: 200% 200%;
				border-radius: 24px;
				z-index: -1;
				opacity: 0.6;
				animation: borderGlow 3s ease infinite;
			}

			@keyframes borderGlow {
				0%, 100% { background-position: 0% 50%; }
				50% { background-position: 100% 50%; }
			}

			.fixed-image-container::after {
				display: none;
			}

			.image-stack {
				border-radius: 24px;
				height: 100%;
				position: relative;
				overflow: hidden;
			}

			.scrollable-content-container {
				width: 100%;
				padding: 0 16px 24px 16px;
			}

			.content-block {
				min-height: 100vh;
				padding: 50px 20px;
				opacity: 0.35;
				transform: translateY(30px) scale(0.98);
				background: transparent;
				transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
			}

			.content-block.active {
				opacity: 1;
				transform: translateY(0) scale(1);
			}

			.content-badge {
				font-size: 10px;
				padding: 8px 16px;
				margin-bottom: 20px;
			}

			.content-block h2 {
				font-size: 32px;
				margin-bottom: 20px;
			}

			.content-lead {
				font-size: 16px;
				margin-bottom: 30px;
			}

			.feature-item {
				padding: 18px;
				gap: 16px;
			}

			.feature-icon {
				width: 48px;
				height: 48px;
				font-size: 20px;
			}

			.feature-text h4 {
				font-size: 18px;
			}

			.feature-text p {
				font-size: 14px;
			}

			.content-stats {
				grid-template-columns: 1fr;
				gap: 16px;
				padding-top: 30px;
				margin-top: 30px;
			}

			.stat-number {
				font-size: 36px;
			}

			.stat-label {
				font-size: 12px;
			}
		}

		@media (max-width: 480px) {
			.fixed-image-container {
				top: 75px;
				height: 280px;
				width: calc(100% - 24px);
				margin: 12px 12px 0 12px;
				border-radius: 20px;
			}

			.content-block h2 {
				font-size: 26px;
			}

			.content-lead {
				font-size: 15px;
			}
		}
		</style>
		<?php
	}

	/**
	 * Render inline scripts.
	 *
	 * @since 1.0.0
	 */
	private function render_scripts() {
		?>
		<script>
		(function() {
			'use strict';

			function initScrollImageSection() {
				const section = document.querySelector('.scroll-image-section');
				const contentBlocks = document.querySelectorAll('.content-block');
				const scrollImages = document.querySelectorAll('.scroll-image');

				if (!section || contentBlocks.length === 0 || scrollImages.length === 0) {
					return;
				}

				function updateActiveImage() {
					const scrollPosition = window.scrollY;
					const windowHeight = window.innerHeight;
					const sectionTop = section.offsetTop;

					let activeIndex = 0;
					let maxVisibility = 0;

					contentBlocks.forEach((block, index) => {
						const blockTop = block.getBoundingClientRect().top + scrollPosition;
						const blockBottom = blockTop + block.offsetHeight;

						const viewportTop = scrollPosition;
						const viewportBottom = scrollPosition + windowHeight;

						const visibleTop = Math.max(blockTop, viewportTop);
						const visibleBottom = Math.min(blockBottom, viewportBottom);
						const visibleHeight = Math.max(0, visibleBottom - visibleTop);
						const visibility = visibleHeight / windowHeight;

						const blockCenter = blockTop + (block.offsetHeight / 2);
						const viewportCenter = scrollPosition + (windowHeight / 2);
						const distanceFromCenter = Math.abs(blockCenter - viewportCenter);

						if (visibility > 0.3 && distanceFromCenter < windowHeight / 2) {
							if (visibility > maxVisibility) {
								maxVisibility = visibility;
								activeIndex = index;
							}
							block.classList.add('active');
						} else {
							block.classList.remove('active');
						}
					});

					const imageIndex = contentBlocks[activeIndex].getAttribute('data-image');
					scrollImages.forEach(img => {
						if (img.getAttribute('data-index') === imageIndex) {
							img.classList.add('active');
						} else {
							img.classList.remove('active');
						}
					});
				}

				let ticking = false;
				function onScroll() {
					if (!ticking) {
						window.requestAnimationFrame(() => {
							updateActiveImage();
							ticking = false;
						});
						ticking = true;
					}
				}

				window.addEventListener('scroll', onScroll, { passive: true });
				updateActiveImage();

				let resizeTimer;
				window.addEventListener('resize', () => {
					clearTimeout(resizeTimer);
					resizeTimer = setTimeout(updateActiveImage, 100);
				});
			}

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', initScrollImageSection);
			} else {
				initScrollImageSection();
			}
		})();
		</script>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Meridian_Africa_Scroll_Triggered_Image_Section_Widget() );


