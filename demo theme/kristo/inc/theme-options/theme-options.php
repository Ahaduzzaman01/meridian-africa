<?php
/*
 * Theme Options
 * @package Kristo
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'kristo';

    //
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Kristo Options', 'kristo'),
        'menu_slug' => 'kristo-theme-option',
        'menu_type' => 'menu',
        'enqueue_webfont' => true,
        'show_footer' => false,
        'framework_title' => esc_html__('Kristo Theme Options', 'kristo'),
    ));

    //
    // Create a section
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'kristo'),
        'icon' => 'fa fa-wrench',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Site Logo', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'theme_logo',
                'title' => esc_html__('Main Logo', 'kristo'),
                'type' => 'media',
                'library' => 'image',
                'desc' => esc_html__('Upload Your Static Logo Image on Header Static', 'kristo'),
            ),

            array(
                'id' => 'logo_width',
                'type' => 'slider',
                'title' => esc_html__('Set Logo Width', 'kristo'),
                'min' => 0,
                'max' => 300,
                'step' => 1,
                'unit' => 'px',
                'default' => 159,
                'desc' => esc_html__('Set Logo Width in px. Default Width 159px.', 'kristo'),
                'output' => '.logo.theme-logo img',
                'output_mode' => 'width',
            ),

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Preloader', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'preloader_enable',
                'title' => esc_html__('Enable Preloader', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Preloader', 'kristo'),
                'default' => true,
            ),

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dark Mode', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'dark_mode_default',
                'title' => esc_html__('Set Dark Mode as Default', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Show or Hide Dark Mode Switch', 'kristo'),
                'default' => false,
            ),

            array(
                'id' => 'dark_mode_enable',
                'title' => esc_html__('Show Dark Mode', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Show or Hide Dark Mode Switch', 'kristo'),
                'default' => true,
                'dependency' => array('dark_mode_default', '==', 'false'),
            ),

            array(
                'id' => 'theme_dark_logo',
                'title' => esc_html__('Dark Mode Logo', 'kristo'),
                'type' => 'media',
                'library' => 'image',
                'desc' => esc_html__('Upload Your Dark Mode Logo', 'kristo'),
                'dependency' => array('dark_mode_enable', '==', 'true'),
            ),

            array(
                'id' => 'dark_logo_width',
                'type' => 'slider',
                'title' => esc_html__('Set Dark Mode Logo Width', 'kristo'),
                'min' => 0,
                'max' => 300,
                'step' => 1,
                'unit' => 'px',
                'default' => 142,
                'desc' => esc_html__('Set Logo Width in px. Default Width 142px.', 'kristo'),
                'output' => '.dark-mode-logo img',
                'output_mode' => 'width',
                'dependency' => array('dark_mode_enable', '==', 'true'),
            ),

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Scroll Top Button', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable scroll button', 'kristo'),
                'default' => true,
            ),

        ),
    ));

    /*-------------------------------------------------------
     ** Entire Site Header  Options
    --------------------------------------------------------*/

    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header', 'kristo'),
        'id' => 'header_options',
        'icon' => 'fa fa-header',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Header Layout', 'kristo') . '</h3>',
            ),
            //
            // nav select
            array(
                'id' => 'nav_menu',
                'type' => 'image_select',
                'title' => esc_html__('Select Header Navigation Style', 'kristo'),
                'options' => array(
                    'nav-style-one' => KRISTO_IMG . '/admin/header-style/style1.png',
                    'nav-style-two' => KRISTO_IMG . '/admin/header-style/style2.png',
                ),

                'default' => 'nav-style-one',
            ),

            array(
                'id' => 'theme_header_sticky',
                'title' => esc_html__('Sticky Header', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable Sticky Header For Header Style 1', 'kristo'),
                'default' => true,
            ),

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Search Bar & Header Button', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'search_bar_enable',
                'title' => esc_html__('Search Bar Display In Header', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Search Bar', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'header_btn_enable',
                'title' => esc_html__('Show Header Button', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Header Button', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'header_text_btn',
                'type' => 'text',
                'title' => esc_html__('Header Button Text', 'kristo'),
                'default' => esc_html__('Sign Up', 'kristo'),
                'desc' => esc_html__('Type Header Button text', 'kristo'),
                'dependency' => array('header_btn_enable', '==', 'true'),
            ),

            array(
                'id' => 'header_btn_link',
                'type' => 'text',
                'title' => esc_html__('Header Button Link', 'kristo'),
                'default' => esc_html__('#', 'kristo'),
                'desc' => esc_html__('Type Header Button Link', 'kristo'),
                'dependency' => array('header_btn_enable', '==', 'true'),
            ),

            array(
                'id' => 'header_social_enable',
                'title' => esc_html__('Social Menus', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Do You want to Show Header Social Icons. Social option only for Header Style 2', 'kristo'),
                'default' => false,
                'dependency' => array('nav_menu', '==', 'nav-style-two'),
            ),

            array(
                'id' => 'social-icon',
                'type' => 'repeater',
                'title' => esc_html__('Set Menu', 'kristo'),
                'dependency' => array('header_social_enable', '==', 'true'),
                'fields' => array(
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Pick Up Your Social Icon', 'kristo'),
                    ),
                    array(
                        'id' => 'link',
                        'type' => 'text',
                        'title' => esc_html__('Inter Social Url', 'kristo'),
                    ),

                ),
            ),

        ),
    ));

    /*-------------------------------------
     ** Typography Options
    -------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Typography', 'kristo'),
        'id' => 'typography_options',
        'icon' => 'fa fa-font',
        'fields' => array(

            // Heading H1
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading H1', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'heading_h1',
                'type' => 'typography',
                'output' => 'h1',
                'default' => array(
                    'color' => '#000000',
                    'font-family' => 'Manrope',
                    'font-weight' => '700',
                    'font-size' => false,
                    'line-height' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ),
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                ),
            ),

            // Heading H2
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading H2', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'heading_h2',
                'type' => 'typography',
                'output' => 'h2',
                'default' => array(
                    'color' => '#000000',
                    'font-family' => 'Manrope',
                    'font-weight' => '700',
                    'font-size' => false,
                    'line-height' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ),
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                ),
            ),

            // Heading H3
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading H3', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'heading_h3',
                'type' => 'typography',
                'output' => 'h3',
                'default' => array(
                    'color' => '#000000',
                    'font-family' => 'Manrope',
                    'font-weight' => '700',
                    'font-size' => false,
                    'line-height' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ),
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                ),
            ),

            // Heading H4
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading H4', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'heading_h4',
                'type' => 'typography',
                'output' => 'h4',
                'default' => array(
                    'color' => '#000000',
                    'font-family' => 'Manrope',
                    'font-weight' => '700',
                    'font-size' => false,
                    'line-height' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ),
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                ),
            ),

            // Heading H5
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading H5', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'heading_h5',
                'type' => 'typography',
                'output' => 'h5',
                'default' => array(
                    'color' => '#000000',
                    'font-family' => 'Manrope',
                    'font-weight' => '700',
                    'font-size' => false,
                    'line-height' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ),
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                ),
            ),

// Heading H6
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading H6', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'heading_h6',
                'type' => 'typography',
                'output' => 'h6',
                'default' => array(
                    'color' => '#000000',
                    'font-family' => 'Manrope',
                    'font-weight' => '700',
                    'font-size' => false,
                    'line-height' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ),
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                ),
            ),

        ),
    ));

    /*-------------------------------------------------------
     ** Color Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Color', 'kristo'),
        'icon' => 'fa fa-wrench',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Color Options', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'theme_main_color',
                'type' => 'color',
                'title' => esc_html__('Theme Primary Color', 'kristo'),
                'default' => '#FF184E',
            ),

            array(
                'id' => 'theme_secondary_color',
                'type' => 'color',
                'title' => esc_html__('Theme Secondary Color', 'kristo'),
                'default' => '#2660FF',
            ),

            array(
                'id' => 'theme_preloader_bg',
                'type' => 'color',
                'title' => esc_html__('Set Preloader Background Color', 'kristo'),
                'default' => '#2660FF',
                'output' => '#preloader',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'theme_body_bg',
                'type' => 'color',
                'title' => esc_html__('Body Background Color', 'kristo'),
                'default' => '#ffffff',
                'output' => 'body',
                'output_mode' => 'background-color',
            ),

        ),
    ));

    /*-------------------------------------------------------
     ** Pages and Template
    --------------------------------------------------------*/

    // blog optoins
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Blog', 'kristo'),
        'id' => 'blog_page',
        'icon' => 'fa fa-bookmark',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Blog Options', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'blog_breadcrumb_enable',
                'title' => esc_html__('Breadcrumb', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable Breadcrumb', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'blog_title',
                'type' => 'text',
                'title' => esc_html__('Blog Page Title', 'kristo'),
                'default' => esc_html__('Blog Page', 'kristo'),
                'desc' => esc_html__('Type Blog Page Title', 'kristo'),
            ),

            array(
                'id' => 'kristo_blog_col_layout',
                'type' => 'image_select',
                'title' => esc_html__('Sidebar Style', 'kristo'),
                'options' => array(

                    'right-sidebar' => KRISTO_IMG . '/admin/page/right-sidebar.png',
                    'left-sidebar' => KRISTO_IMG . '/admin/page/left-sidebar.png',
                    'no-sidebar' => KRISTO_IMG . '/admin/page/no-sidebar.png',
                ),

                'default' => 'no-sidebar',
            ),

            array(
                'id' => 'kristo_blog_layout',
                'type' => 'image_select',
                'title' => esc_html__('Blog Layout', 'kristo'),
                'options' => array(
                    'blog-one' => KRISTO_IMG . '/admin/page/blog-list-layout.png',
                    'blog-two' => KRISTO_IMG . '/admin/page/blog-grid-layout.png',
                ),
                'default' => 'blog-one',
            ),

            array(
                'id' => 'blog-post-col-style',
                'type' => 'image_select',
                'title' => 'Set Column',
                'options' => array(
                    'col-lg-6' => KRISTO_IMG . '/admin/page/2-col.png',
                    'col-lg-4' => KRISTO_IMG . '/admin/page/3-col.png',
                    'col-lg-3' => KRISTO_IMG . '/admin/page/4-col.png',
                ),
                'dependency' => array('kristo_blog_layout', '==', 'blog-two'),
                'default' => 'col-lg-4',
            ),

            array(
                'id' => 'page-spacing-blog',
                'type' => 'spacing',
                'title' => esc_html__('Blog Page Spacing', 'kristo'),
                'output' => '.main-container.blog-spacing',
                'output_mode' => 'padding', // or margin, relative
                'default' => array(
                    'top' => '80',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ),
            ),

        ),
    ));

    // blog single optoins
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Blog Details', 'kristo'),
        'id' => 'single_page',
        'icon' => 'fa fa-pencil-square-o',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Blog Details Options', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'kristo_single_blog_layout',
                'type' => 'image_select',
                'title' => esc_html__('Select Single Blog Style', 'kristo'),
                'options' => array(
                    'single-one' => KRISTO_IMG . '/admin/page/right-sidebar.png',
                    'single-two' => KRISTO_IMG . '/admin/page/no-sidebar.png',
                ),
                'default' => 'single-one',
            ),

            array(
                'id' => 'page-spacing-single',
                'type' => 'spacing',
                'title' => esc_html__('Single Blog Spacing', 'kristo'),
                'output' => '.single-one-bwrap',
                'output_mode' => 'padding', // or margin, relative
                'default' => array(
                    'top' => '40',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ),
            ),

            array(
                'id' => 'blog_prev_title',
                'type' => 'text',
                'title' => esc_html__('Previous Post Text', 'kristo'),
                'default' => esc_html__('Previous Post', 'kristo'),
                'desc' => esc_html__('Type Previous Post Link Title', 'kristo'),
            ),

            array(
                'id' => 'blog_next_title',
                'type' => 'text',
                'title' => esc_html__('Next Post Text', 'kristo'),
                'default' => esc_html__('Next Post', 'kristo'),
                'desc' => esc_html__('Type Next Post Link Title', 'kristo'),
            ),

            array(
                'id' => 'blog_single_cat',
                'title' => esc_html__('Show Catgeory', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Show Category Name', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'blog_single_meta_box',
                'title' => esc_html__('Show Post Author', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Show Post Meta Infos', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'blog_tags',
                'title' => esc_html__('Show Tags', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Show Post Tags', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'blog_single_author',
                'title' => esc_html__('Show Author Box', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Single Post Author', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'blog_nav',
                'title' => esc_html__('Show Posts Navigation', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Post Navigation', 'kristo'),
                'default' => true,
            ),

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Related Posts Options', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'blog_related',
                'title' => esc_html__('Show Related Posts', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Related Posts', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'blog_related_author',
                'title' => esc_html__('Show Related Posts Author', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Related Posts Author', 'kristo'),
                'default' => true,
                'dependency' => array('blog_related', '==', 'true'),
            ),

            array(
                'id' => 'blog_related_date',
                'title' => esc_html__('Show Related Posts Date', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Related Posts Date', 'kristo'),
                'default' => true,
                'dependency' => array('blog_related', '==', 'true'),
            ),

            array(
                'id' => 'blog_related_category',
                'title' => esc_html__('Show Related Posts Category', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Related Posts Category', 'kristo'),
                'default' => true,
                'dependency' => array('blog_related', '==', 'true'),
            ),

        ),
    ));

    // category
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Category', 'kristo'),
        'id' => 'cat_page',
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Category Options', 'kristo') . '</h3>',
            ),
            array(
                'id' => 'kristo_cat_layout',
                'type' => 'image_select',
                'title' => esc_html__('Select Category Layout', 'kristo'),
                'options' => array(
                    'catt-one' => KRISTO_IMG . '/admin/page/style1.png',
                    'catt-two' => KRISTO_IMG . '/admin/page/style2.png',
                ),
                'default' => 'catt-one',
            ),

            array(
                'id' => 'page-spacing-category',
                'type' => 'spacing',
                'title' => esc_html__('Category Page Spacing', 'kristo'),
                'output' => '.main-container.cat-page-spacing',
                'output_mode' => 'padding', // or margin, relative
                'default' => array(
                    'top' => '80',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ),
            ),

        ),
    ));

    /*-------------------------------------------------------
     ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'kristo'),
        'id' => 'footer_top',
        'icon' => 'fa fa-copyright',
        'fields' => array(

            //Footer Top
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'footer_top_enable',
                'title' => esc_html__('Enable Footer Top', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Footer Top Area', 'kristo'),
                'default' => true,
            ),

            //Footer Column One
            array(
                'id' => 'footer_col_one',
                'title' => esc_html__('Enable Column 1', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Footer Column 1', 'kristo'),
                'default' => true,
                'dependency' => array('footer_top_enable', '==', 'true'),
            ),

            array(
                'id' => 'footer_description',
                'type' => 'textarea',
                'title' => esc_html__('Footer Description', 'kristo'),
                'default' => esc_html__('The stars will never align, and the traffic lights of life will never all be green at the same time.The stars will never align, and the traffic lights of life will never ends.', 'kristo'),
                'desc' => esc_html__('Type your footer description here', 'kristo'),
                'dependency' => array('footer_col_one', '==', 'true'),
            ),

            array(
                'id' => 'footer_social',
                'type' => 'repeater',
                'title' => esc_html__('Set Social Accounts', 'kristo'),
                'dependency' => array('footer_col_one', '==', 'true'),
                'fields' => array(

                    array(
                        'id' => 'social_account_icon',
                        'type' => 'icon',
                        'title' => 'Select Account',
                    ),

                    array(
                        'id' => 'social_account_link',
                        'type' => 'link',
                        'title' => esc_html__('Account Link', 'kristo'),
                        'default' => esc_html__('youraccount.com/username', 'kristo'),
                    ),

                ),
            ),

            //Footer Column Two
            array(
                'id' => 'footer_col_two',
                'title' => esc_html__('Enable Column 2', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Footer Column 2', 'kristo'),
                'default' => true,
                'dependency' => array('footer_top_enable', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_two_title',
                'type' => 'text',
                'title' => esc_html__('Set Column 2 Title', 'kristo'),
                'default' => esc_html__('Resources', 'kristo'),
                'dependency' => array('footer_col_two', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_two_menu',
                'type' => 'repeater',
                'title' => esc_html__('Set Column 2 Menu', 'kristo'),
                'dependency' => array('footer_col_two', '==', 'true'),
                'fields' => array(

                    array(
                        'id' => 'column_two_menu_name',
                        'type' => 'text',
                        'title' => esc_html__('Menu Item Name', 'kristo'),
                        'default' => esc_html__('Whats New', 'kristo'),
                    ),

                    array(
                        'id' => 'column_two_menu_link',
                        'type' => 'link',
                        'title' => esc_html__('Menu Item Link', 'kristo'),
                        'default' => esc_html__('youraccount.com/menu-slug', 'kristo'),
                    ),

                ),
            ),

            //Footer Column Three
            array(
                'id' => 'footer_col_three',
                'title' => esc_html__('Enable Column 3', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Footer Column 3', 'kristo'),
                'default' => true,
                'dependency' => array('footer_top_enable', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_three_title',
                'type' => 'text',
                'title' => esc_html__('Set Column 3 Title', 'kristo'),
                'default' => esc_html__('Top Categories', 'kristo'),
                'dependency' => array('footer_col_three', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_three_menu',
                'type' => 'repeater',
                'title' => esc_html__('Set Column 3 Menu', 'kristo'),
                'dependency' => array('footer_col_three', '==', 'true'),
                'fields' => array(

                    array(
                        'id' => 'column_three_menu_name',
                        'type' => 'text',
                        'title' => esc_html__('Menu Item Name', 'kristo'),
                        'default' => esc_html__('Business', 'kristo'),
                    ),

                    array(
                        'id' => 'column_three_menu_link',
                        'type' => 'link',
                        'title' => esc_html__('Menu Item Link', 'kristo'),
                        'default' => esc_html__('youraccount.com/menu-slug', 'kristo'),
                    ),

                ),
            ),

            //Footer Column Four
            array(
                'id' => 'footer_col_four',
                'title' => esc_html__('Enable Column 4', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('Enable or Disable Footer Column 4', 'kristo'),
                'default' => true,
                'dependency' => array('footer_top_enable', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_four_title',
                'type' => 'text',
                'title' => esc_html__('Set Column 4 Title', 'kristo'),
                'default' => esc_html__('Subscribe Now!', 'kristo'),
                'dependency' => array('footer_col_four', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_four_phone',
                'type' => 'text',
                'title' => esc_html__('Set Column 4 Phone', 'kristo'),
                'default' => esc_html__('203-907-6401', 'kristo'),
                'dependency' => array('footer_col_four', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_four_phone_link',
                'type' => 'text',
                'title' => esc_html__('Set Column 4 Phone Link', 'kristo'),
                'default' => esc_html__('2039076401', 'kristo'),
                'dependency' => array('footer_col_four', '==', 'true'),
            ),

            array(
                'id' => 'footer_col_four_email',
                'type' => 'text',
                'title' => esc_html__('Set Column 4 Email', 'kristo'),
                'default' => esc_html__('info@kristo.com', 'kristo'),
                'dependency' => array('footer_col_four', '==', 'true'),
            ),

            //Footer Bottom
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Bottom', 'kristo') . '</h3>',
            ),

            array(
                'id' => 'footer_right_menu',
                'title' => esc_html__('Footer Right Menu', 'kristo'),
                'type' => 'switcher',
                'desc' => esc_html__('You can set Yes or No to show Footer menu', 'kristo'),
                'default' => true,
            ),

            array(
                'id' => 'footer_menu_item_1_name',
                'type' => 'text',
                'title' => esc_html__('Menu Item 1 Name', 'kristo'),
                'default' => esc_html__('Privacy Policy', 'kristo'),
                'dependency' => array('footer_right_menu', '==', 'true'),
            ),

            array(
                'id' => 'footer_menu_item_1_link',
                'type' => 'link',
                'title' => esc_html__('Menu Item 1 Link', 'kristo'),
                'default' => esc_html__('yoursite.com/menu-slug', 'kristo'),
                'dependency' => array('footer_right_menu', '==', 'true'),
            ),

            array(
                'id' => 'footer_menu_item_2_name',
                'type' => 'text',
                'title' => esc_html__('Menu Item 2 Name', 'kristo'),
                'default' => esc_html__('Terms and Conditions', 'kristo'),
                'dependency' => array('footer_right_menu', '==', 'true'),
            ),

            array(
                'id' => 'footer_menu_item_2_link',
                'type' => 'link',
                'title' => esc_html__('Menu Item 2 Link', 'kristo'),
                'default' => esc_html__('yoursite.com/menu-slug', 'kristo'),
                'dependency' => array('footer_right_menu', '==', 'true'),
            ),

            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'kristo'),
                'type' => 'textarea',
                'default' => sprintf(
                    esc_html__('Copyright © Kristo %d. All rights reserved', 'kristo'),
                    date('Y')
                ),
                'desc' => esc_html__('Footer Copyright Text', 'kristo'),
            ),

        ),
    ));

    // Backup section
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Backup', 'kristo'),
        'id' => 'backup_options',
        'icon' => 'fa fa-window-restore',
        'fields' => array(
            array(
                'type' => 'backup',
            ),
        ),
    ));

}
