<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class kristo_author_list extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'author-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Author List', 'kristo-extra' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o'; 
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'kristo_widgets' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'kristo', 'author', 'list', 'widget', 'author list', 'auth', 'elementor' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	
	protected function register_controls() {
		$this->meta_options();	
	}
	
	/**
    * Meta Options
    */
    private function meta_options() {

		$this->start_controls_section(
            'layout_option',
            [
                'label' => __( 'Layout Option', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_responsive_control(
			'author_box_radius',
			[
				'label' =>esc_html__( 'Author Box Border Radius', 'liberk-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'desktop_default' => [
					'size' => 25,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 25,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 25,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 25,
				],
				
				'selectors' => [
					'{{WRAPPER}} #kristo_author_box .custom-author-list-inner' => 'border-radius: {{SIZE}}{{UNIT}};',
				],

				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	
	
		$this->start_controls_section(
            'meta_option',
            [
                'label' => __( 'Meta Options', 'kristo-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'display_avatar',
            [
                'label' => esc_html__('Display Avatar', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

		$this->add_control(
         	'display_name',
         	[
				 'label' => esc_html__('Display Author Name', 'kristo-extra'),
				 'type' => \Elementor\Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'kristo-extra'),
				 'label_off' => esc_html__('No', 'kristo-extra'),
				 'default' => 'yes',
         	]
     	);

     	$this->add_control(
         	'display_post_counter',
         	[
				 'label' => esc_html__('Display Post Counter', 'kristo-extra'),
				 'type' => \Elementor\Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'kristo-extra'),
				 'label_off' => esc_html__('No', 'kristo-extra'),
				 'default' => 'yes',
         	]
     	);
	
		$this->end_controls_section();
	
	}	

	protected function render() {
		
		
		$settings = $this->get_settings_for_display();

		$display_avatar = $settings['display_avatar'];
		$display_name = $settings['display_name'];
		$display_post_counter = $settings['display_post_counter'];

	?>
	
	

<div id="kristo_author_box" class="theme-author-list-wrapper custom-author-list-section">	
	
	<div class="container">
		<div class="row">
	
		<?php

		$blogusers = get_users();

		global $post;
		$author_id = $post->post_author;


		// Array of WP_User objects.
		foreach ( $blogusers as $user ) { ?>
		
		<div class="col-lg-3 wow fadeInUp delay-0-4s">
			<div class="custom-author-list-inner">

				<?php if($display_avatar =='yes'): ?>
				<div class="author-list-thumb">
				<?php echo get_avatar( $user->user_email , 155 ); ?>
				</div>
				<?php endif; ?>

				<div class="author-list-content">

					<?php if($display_name =='yes'): ?>
					<h4><a href="<?php $membre_url = get_author_posts_url($user->ID); echo $membre_url; ?>" class="single-author-name">
					<?php echo '<span>' . esc_html( $user->display_name ) . '</span>';?>
					</a></h4>
					<?php endif; ?>

					<?php if($display_post_counter =='yes'): ?>
					<div class="authors-post-number">
					<?php echo count_user_posts( $user->ID ); ?> Posts
					</div>
					<?php endif; ?>
				</div>
			</div>	
		</div>

		<?php } ?>

		</div>
	</div>
</div>


	<?php 
}
		
   
   	public function posts_cat_list() {
		
		$terms = get_terms( array(
			'taxonomy'    => 'category',
			'hide_empty'  => true
		) );

		$cat_list = [];
		foreach($terms as $post) {
		$cat_list[$post->slug]  = [$post->name];
		}
		return $cat_list;
	  
	}		
	
}


Plugin::instance()->widgets_manager->register_widget_type( new kristo_author_list() );