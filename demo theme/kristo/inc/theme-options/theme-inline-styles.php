<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('kristo_theme_inline_style')):
    function kristo_theme_inline_style()
	{
        wp_enqueue_style('kristo-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');

        $theme_main_color = kristo_get_option('theme_main_color');
        $theme_secondary_color = kristo_get_option('theme_secondary_color');

        $custom_css = '';

        if (!empty($theme_main_color)) {

            $custom_css .= ' .header-signup-btn a, .custom-subscribe-form-wrapper input[type="submit"], a.custom-author-btn, .footer-submit, .backto, .search-popup .search-form .submit-btn, .main-container .theme-pagination-style ul.page-numbers li span.current, .blog-post-comment .comment-respond .comment-form .btn-comments, .custom-themee-contactt .fsubmitt, a.slicknav_btn, .slicknav_nav li:hover, .comments-list .comment-reply-link:hover, .woocommerce ul.products li.product .add_to_cart_button, .woocommerce-page ul.products li.product .add_to_cart_button { background: ' . esc_attr($theme_main_color) . '!important;}';

            $custom_css .= '.blog-sidebar .widget_block.widget_search .wp-block-search__button { background: ' . esc_attr($theme_main_color) . '!important;}';

            $custom_css .= ' .slide-arrow-left.slick-arrow:hover, .slide-arrow-right.slick-arrow:hover, .news_tab_Block .nav-tabs .nav-link.active, .blog-sidebar .widget_search form button, .blog-sidebar .widget ul li::before, .main-container .theme-pagination-style ul.page-numbers li a.page-numbers:hover, .woocommerce span.onsale, .woocommerce a.button, .woocommerce button.button.alt, .woocommerce #respond input#submit {background-color: ' . esc_attr($theme_main_color) . ' !important;}';

            $custom_css .= 'ul.footer-nav li a:hover, .htop_social a:hover, .footer-social a:hover, a.search-box-btn:hover, .blog-sidebar .widget ul li a:hover, .main-container .theme-pagination-style ul.page-numbers li i, .blog-details-content ul li::marker, .theme_blog_nav_Title a:hover, a.search-box-btn:hover i, #cancel-comment-reply-link, h1.text-logo a, .footer-top ul li a:hover, .main-content-inner.category-layout-two .blog-post-tab-wrap.post-block-item .grid-content-bottom h3.post-title a:hover, .bottom-loop-right .elementor-widget-wp-widget-tag_cloud .tagcloud a:hover, .woocommerce p.stars a, .woocommerce p.stars a, p.logged-in-as a {color: ' . esc_attr($theme_main_color) . '!important;}';

            $custom_css .= '.slide-arrow-left.slick-arrow:hover, .slide-arrow-right.slick-arrow:hover, .main-container .theme-pagination-style ul.page-numbers li span.current, .main-container .theme-pagination-style ul.page-numbers li a.page-numbers:hover, .wp-block-search .wp-block-search__button {border-color: ' . esc_attr($theme_main_color) . '!important;}';

            $custom_css .= '.wp-block-search .wp-block-search__button {border-color: ' . esc_attr($theme_main_color) . '!important;}';

        }

        if (!empty($theme_secondary_color)) {

            $custom_css .= '.header-signup-btn a:hover, .custom-subscribe-form-wrapper input[type="submit"]:hover, a.custom-author-btn:hover, .footer-submit:hover, .backto:hover, .search-popup .search-form .submit-btn:hover, .blog-post-comment .comment-respond .comment-form .btn-comments:hover, .custom-themee-contactt .fsubmitt:hover { background: ' . esc_attr($theme_secondary_color) . '!important;}';

            $custom_css .= '.widget_block.widget_search .wp-block-search__button:hover, .blog-sidebar .widget_search form button:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button.alt:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #respond input#submit:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {background-color: ' . esc_attr($theme_secondary_color) . '!important;}';

            $custom_css .= '.nav-menu-wrapper .mainmenu ul li a:hover, .nav-menu-wrapper .mainmenu li ul.sub-menu li a:hover {color: ' . esc_attr($theme_secondary_color) . '!important;}';

            $custom_css .= '.wp-block-search .wp-block-search__button:hover, .widget_block.widget_search .wp-block-search__button:hover {border-color: ' . esc_attr($theme_secondary_color) . '!important;}';

        }

        // Get Category Color for List Widget

        $categories_widget_color = get_terms('category');

        if ($categories_widget_color) {
            foreach ($categories_widget_color as $tag) {
                $tag_link = get_category_link($tag->term_id);
                $title_bg_Color = get_term_meta($tag->term_id, 'kristo', true);
                $catColor = !empty($title_bg_Color['cat-color']) ? $title_bg_Color['cat-color'] : '#0073FF';
                $custom_css .= '
						.cat-item-' . $tag->term_id . ' span.post_count {background-color : ' . $catColor . ' !important;}
					';
            }
        }

        wp_add_inline_style('kristo-custom-style', $custom_css);
    }
    add_action('wp_enqueue_scripts', 'kristo_theme_inline_style');

endif;
