<?php

/**
 * Elementor Widget
 * @package Kristo
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly.

class kristo_post_tab extends Widget_Base
{

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
    public function get_name()
    {
        return 'posts-tab';
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
    public function get_title()
    {
        return esc_html__('Kristo Posts Tab', 'kristo-extra');
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
    public function get_icon()
    {
        return 'eicon-post-navigation';
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
    public function get_categories()
    {
        return ['kristo_widgets'];
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
    public function get_keywords()
    {
        return ['kristo', 'post', 'kristo post', 'kristo widget', 'elementor'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function register_controls()
    {
        $this->tab_options();
        $this->post_query_options();
        $this->meta_options();
        $this->design_options();
    }

    /**
     * Tab Item and Layout Options
     */
    private function tab_options()
    {

        $this->start_controls_section(
            'tab_option',
            [
                'label' => __('Tab Item and Layout', 'kristo-extra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tabsec_top_title',
            [
                'label' => __('Section Title', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Latest Articles', 'kristo-extra'),
                'placeholder' => __('Discover articles in all topics', 'kristo-extra'),
            ]
        );

        $this->add_control(
            'tabsec_top_subtitle',
            [
                'label' => __('Section Sub Title', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Text Description', 'kristo-extra'),
                'placeholder' => __('Type Your Sub title here', 'kristo-extra'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_grid_img_height',
            [
                'label' => esc_html__('Set Large Post Image height', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 290,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 290,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 290,
                    'unit' => 'px',
                ],

                'default' => [
                    'unit' => 'px',
                    'size' => 290,
                ],

                'selectors' => [
                    '{{WRAPPER}} .theme_post_Tab__content .blog-post-tab-wrap.post-block-item .news-post-grid-thumbnail a img' => 'height: {{SIZE}}{{UNIT}}!important;',
                ],

                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'large_post_img_radius',
            [
                'label' => esc_html__('Large Post Image Border Radius', 'liberk-extra'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],

                'desktop_default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],

                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],

                'selectors' => [
                    '{{WRAPPER}} .theme_post_Tab__content .blog-post-tab-wrap.post-block-item .news-post-grid-thumbnail a img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_small_posts_img_height',
            [
                'label' => esc_html__('Set Small Posts Image height', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 155,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 155,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 155,
                    'unit' => 'px',
                ],

                'default' => [
                    'unit' => 'px',
                    'size' => 155,
                ],

                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-thumbnail-wrap a img' => 'height: {{SIZE}}{{UNIT}}!important;',
                ],

                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_small_posts_img_width',
            [
                'label' => esc_html__('Set Small Posts Image Width', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 234,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 234,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 234,
                    'unit' => 'px',
                ],

                'default' => [
                    'unit' => 'px',
                    'size' => 234,
                ],

                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-thumbnail-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
                ],

                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'small_posts_img_radius',
            [
                'label' => esc_html__('Small Posts Image Border Radius', 'liberk-extra'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],

                'desktop_default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],

                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],

                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-thumbnail-wrap a img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

                'separator' => 'before',
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => esc_html__('Tab Items', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'default' => [
                    [
                        'tab_title' => esc_html__('Add Tab Item Menu', 'kristo-extra'),
                    ],
                ],

                'fields' => [

                    ['name' => 'post_categories',
                        'label' => esc_html__('Select Categories', 'kristo-extra'),
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'options' => $this->posts_cat_list(),
                        'label_block' => true,
                        'multiple' => true,
                        'placeholder' => __('All Categories', 'kristo-extra'),
                    ],

                    ['name' => 'tab_menu_name',
                        'label' => esc_html__('Tab Menu Name', 'kristo-extra'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Add Tab Menu',
                    ],

                    [
                        'name' => 'enable_offset_post',
                        'label' => esc_html__('Enable Skip Post', 'kristo-extra'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'kristo-extra'),
                        'label_off' => esc_html__('No', 'kristo-extra'),
                        'default' => 'no',
                    ],

                    [
                        'name' => 'post_offset_count',
                        'label' => esc_html__('Skip Post Count', 'kristo-extra'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'default' => '1',
                        'condition' => ['enable_offset_post' => 'yes'],
                    ],

                ],

                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Post Query Options
     */
    private function post_query_options()
    {

        $this->start_controls_section(
            'post_query_option',
            [
                'label' => __('Post Options', 'kristo-extra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Post Items
        $this->add_control(
            'post_number',
            [
                'label' => esc_html__('Number Of Posts', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '1',
            ]
        );

        // Post Sort
        $this->add_control(
            'post_sorting',
            [
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label' => esc_html__('Post Sorting', 'kristo-extra'),
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Recent Post', 'kristo-extra'),
                    'rand' => esc_html__('Random Post', 'kristo-extra'),
                    'title' => __('Title Sorting Post', 'kristo-extra'),
                    'modified' => esc_html__('Last Modified Post', 'kristo-extra'),
                    'comment_count' => esc_html__('Most Commented Post', 'kristo-extra'),
                ],
                'separator' => 'before',
            ]
        );

        // Post Order
        $this->add_control(
            'post_ordering',
            [
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label' => esc_html__('Post Ordering', 'kristo-extra'),
                'default' => 'DESC',
                'options' => [
                    'DESC' => esc_html__('Desecending', 'kristo-extra'),
                    'ASC' => esc_html__('Ascending', 'kristo-extra'),
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Meta Options
     */
    private function meta_options()
    {
        $this->start_controls_section(
            'meta_option',
            [
                'label' => __('Meta Options', 'kristo-extra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'display_cat',
            [
                'label' => esc_html__('Display Category Name', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_excerpt_large',
            [
                'label' => esc_html__('Display Large Post Excerpt', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_excerpt',
            [
                'label' => esc_html__('Display Small Posts Excerpt', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_author_info',
            [
                'label' => esc_html__('Display Author Info', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_date',
            [
                'label' => esc_html__('Display Date', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_read_time',
            [
                'label' => esc_html__('Display Post Read Time', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'kristo-extra'),
                'label_off' => esc_html__('No', 'kristo-extra'),
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Design Options
     */
    private function design_options()
    {
        $this->start_controls_section(
            'design_option',
            [
                'label' => __('Typography Options', 'kristo-extra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sectitle_typography',
                'label' => esc_html__('Section Title Typography', 'kristo-extra'),
                'selector' => '{{WRAPPER}} #kristo_posts_tab .tab-section-title h2',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => esc_html__('Section SubTitle Typography', 'kristo-extra'),
                'selector' => '{{WRAPPER}} #kristo_posts_tab .tab-section-title p',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabbedbig_title_typography',
                'label' => __('Large Post Title Typography', 'kristo-extra'),
                'selector' => '{{WRAPPER}} #kristo_posts_tab .blog-post-tab-wrap.post-block-item .grid-content-bottom h3.post-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabbebiggp_content_typography',
                'label' => __('Large Post Excerpt Typography', 'kristo-extra'),
                'selector' => '{{WRAPPER}} #kristo_posts_tab .blog-post-tab-wrap.post-block-item .grid-content-bottom .post-excerpt-box p',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabbedsmall_title_typography',
                'label' => __('Small Post Title Typography', 'kristo-extra'),
                'selector' => '{{WRAPPER}} #kristo_posts_tab .tab-small-post-list .tab-post-grid-content-small h3.post-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabbedsmallp_content_typography',
                'label' => __('Small Post Excerpt Typography', 'kristo-extra'),
                'selector' => '{{WRAPPER}} #kristo_posts_tab .tab-small-post-list .tab-post-grid-content-small .post-excerpt-box p',
            ]
        );

        $this->end_controls_section();

        // Margin and Padding
        $this->start_controls_section(
            'margin_and_padding_options',
            [
                'label' => __('Margin and Padding Options', 'kristo-extra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_title_margin',
            [
                'label' => esc_html__('Section Title Margin', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_title_padding',
            [
                'label' => esc_html__('Section Title Padding', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_subtitle_margin',
            [
                'label' => esc_html__('Section SubTitle Margin', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-section-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_subtitle_padding',
            [
                'label' => esc_html__('Section SubTitle Padding', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'large_post_title_margin',
            [
                'label' => esc_html__('Large Post Title Margin', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .blog-post-tab-wrap.post-block-item .grid-content-bottom h3.post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'large_post_title_padding',
            [
                'label' => esc_html__('Large Post Title Padding', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .blog-post-tab-wrap.post-block-item .grid-content-bottom h3.post-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'large_excerpt_margin',
            [
                'label' => esc_html__('Large Post Excerpt Margin', 'restlycore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .blog-post-tab-wrap.post-block-item .grid-content-bottom .post-excerpt-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'large_excerpt_padding',
            [
                'label' => esc_html__('Large Post Excerpt Padding', 'restlycore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .blog-post-tab-wrap.post-block-item .grid-content-bottom .post-excerpt-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'small_post_title_margin',
            [
                'label' => esc_html__('Small Posts Title Margin', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-post-list .tab-post-grid-content-small h3.post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'small_post_title_padding',
            [
                'label' => esc_html__('Small Posts Title Padding', 'kristo-extra'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-post-list .tab-post-grid-content-small h3.post-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'small_excerpt_margin',
            [
                'label' => esc_html__('Small Posts Excerpt Margin', 'restlycore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-post-list .tab-post-grid-content-small .post-excerpt-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'small_excerpt_padding',
            [
                'label' => esc_html__('Small Posts Excerpt Padding', 'restlycore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #kristo_posts_tab .tab-small-post-list .tab-post-grid-content-small .post-excerpt-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $post_number = $settings['post_number'];
        $post_order = $settings['post_ordering'];
        $post_sortby = $settings['post_sorting'];

        $display_blog_excerpt = $settings['display_excerpt'];

        $display_blog_excerpt_lg = $settings['display_excerpt_large'];

        $display_blog_cat = $settings['display_cat'];

        $display_blog_date = $settings['display_date'];

        $display_read_time = $settings['display_read_time'];

        $tabs = $settings['tabs'];
        $post_count = count($tabs);
        $display_author_info = $settings['display_author_info'];

        ?>

	    <div id="kristo_posts_tab" class="theme-post-tab-wrapper blog-tab-wrapper">
            <div class="post-tab-block-element news_tab_Block">
				<div class="tab-section-title">
					<h2><?php echo wp_kses_post($settings['tabsec_top_title']); ?></h2>
					<p><?php echo wp_kses_post($settings['tabsec_top_subtitle']); ?></p>
				</div>
				<ul class="nav nav-tabs" role="tablist">
					<?php
						foreach ($tabs as $tab_Menu_key => $value) {
							if ($tab_Menu_key == 0) {
								echo '<li class="nav-item"><a class="nav-link active" href="#' . $this->get_id() . $value['_id'] . '" data-toggle="tab"><span class="tab_menu_Item">' . $value['tab_menu_name'] . '</span></a></li>';
							} else {
								echo '<li class="nav-item"><a class="nav-link" href="#' . $this->get_id() . $value['_id'] . '" data-toggle="tab"><span class="tab_menu_Item">' . $value['tab_menu_name'] . '</span></a></li>';
							}
						}
					?>
				</ul>
                <div class="theme_post_Tab__content theme_post_Tabone__content tab-content">
                    <?php
        				foreach ($tabs as $tab_Content_key => $value) {

						if ($tab_Content_key == 0) {
							echo '<div role="tabpanel" class="tab-pane fade active show" id="' . $this->get_id() . $value['_id'] . '">';
						} else {
							echo '<div role="tabpanel" class="tab-pane fade" id="' . $this->get_id() . $value['_id'] . '">';
						}

						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $post_number,
							'order' => $post_order,
							'orderby' => $post_sortby,
							'ignore_sticky_posts' => 1,
						);

						// Category

						if (!empty($value['post_categories'])) {
							$args['category_name'] = implode(',', $value['post_categories']);
						}

						// Post Offset

						if ($value['enable_offset_post'] == 'yes') {
							$args['offset'] = $value['post_offset_count'];
						}

						$Tabquery = new \WP_Query($args);
            		?>

                    <?php if ($Tabquery->have_posts()): ?>
                        <div class="theme_post_Tab__block block-tab-item">
                            <div class="row">
								<?php while ($Tabquery->have_posts()): $Tabquery->the_post();?>
	                                <?php if ($Tabquery->current_post == 0): ?>

									<div class="col-lg-6 col-sm-12">
										<div class="blog-post-tab-wrap post-block-item wow fadeInUp delay-0-4s">
											<div class="news-post-grid-thumbnail">
												<a href="<?php the_permalink();?>" class="news-post-grid-thumbnail-wrap">
													<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute();?>">
												</a>
											</div>
											<div class="news-post-grid-content grid-content-bottom">
												<?php if ($display_blog_cat == 'yes'): ?>
													<div class="slider-category-box tab-cat-box">
														<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php';?>
													</div>
												<?php endif;?>

												<h3 class="post-title">
													<a href="<?php the_permalink();?>"><?php echo esc_html(get_the_title()); ?></a>
												</h3>

												<?php if ($display_blog_excerpt_lg == 'yes'): ?>
												<div class="post-excerpt-box">
													<p><?php echo esc_html(get_the_excerpt()); ?></p>
												</div>
												<?php endif;?>

												<div class="slider-post-meta-items tab-large-col-meta">
													<div class="slider-meta-left">
														<?php if ($display_author_info == 'yes'): ?>
														<div class="slider-meta-left-author">
															<?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
														</div>
														<?php endif;?>
														<div class="slider-meta-left-content">

															<?php if ($display_author_info == 'yes'): ?>
															<h4 class="post-author-name">
																<?php echo get_the_author_link(); ?>
															</h4>
															<?php endif;?>

															<ul class="slider-bottom-meta-list">

																<?php if ($display_blog_date == 'yes'): ?>

																<li class="slider-meta-date"><?php echo esc_html(get_the_date('F j, Y')); ?></li>

																<?php endif;?>

																<?php if ($display_read_time == 'yes'): ?>

																<li class="slider-meta-time"><?php echo kristo_reading_time(); ?></li>

																<?php endif;?>

															</ul>
														</div>
													</div>
													<div class="slider-meta-right">
														<div class="post-comment-box">
															<?php echo get_comments_number(); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

                                	<?php else: ?>

									<?php if ($Tabquery->current_post == 1): ?>

									<div class="col-lg-6 col-sm-12">
									<?php endif;?>
										<div class="tab-small-list-item tab-bottom-grid-style wow fadeInUp delay-0-6s">
											<div class="tab-small-post-list">
												<div class="tab-small-thumbnail-wrap">
													<a href="<?php the_permalink();?>">
														<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute();?>">
													</a>
												</div>
												<div class="tab-post-grid-content-small">

													<?php if ($display_blog_cat == 'yes'): ?>
													<div class="slider-category-box tab-small-cat-box">
													<?php require KRISTO_THEME_DIR . '/template-parts/cat-alt-template.php';?>
													</div>
													<?php endif;?>

													<h3 class="post-title">
														<a href="<?php the_permalink();?>"><?php echo esc_html(get_the_title()); ?></a>
													</h3>

													<?php if ($display_blog_excerpt == 'yes'): ?>
													<div class="post-excerpt-box">
														<p><?php echo esc_html(get_the_excerpt()); ?></p>
													</div>
													<?php endif;?>

													<div class="slider-post-meta-items tab-small-col-meta">
														<div class="slider-meta-left">
															<?php if ($display_author_info == 'yes'): ?>
															<div class="slider-meta-left-author">
																<?php echo get_avatar(get_the_author_meta('ID'), 31); ?>
															</div>
															<?php endif;?>

															<div class="slider-meta-left-content">

																<?php if ($display_author_info == 'yes'): ?>
																<h4 class="post-author-name">
																	<?php echo get_the_author_link(); ?>
																</h4>
																<?php endif;?>

																<ul class="slider-bottom-meta-list">

																	<?php if ($display_blog_date == 'yes'): ?>

																	<li class="slider-meta-date"><?php echo esc_html(get_the_date('F j, Y')); ?></li>

																	<?php endif;?>

																	<?php if ($display_read_time == 'yes'): ?>

																	<li class="slider-meta-time"><?php echo kristo_reading_time(); ?></li>

																	<?php endif;?>

																</ul>
															</div>
														</div>
														<div class="slider-meta-right">
															<div class="post-fav-box">
																3k
															</div>
															<div class="post-comment-box">
																<?php echo get_comments_number(); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php if (($Tabquery->current_post + 1) == ($Tabquery->post_count)) {?>
									</div>

								<?php 
								
									}
									endif;
									endwhile;
								
								?>

                            </div>
                        </div>
                        <?php wp_reset_postdata();?>
                    <?php endif;?>
                </div>
                    <?php } ?>
            </div>
        </div>
	<?php }

    public function posts_cat_list()
    {
        $terms = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));
        $cat_list = [];
        foreach ($terms as $post) {
            $cat_list[$post->slug] = [$post->name];
        }
        return $cat_list;
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new kristo_post_tab());