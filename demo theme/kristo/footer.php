<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kristo
 */

$kristo_logo = kristo_get_option('theme_logo');
$kristo_logo_id = isset($kristo_logo['id']) && !empty($kristo_logo['id']) ? $kristo_logo['id'] : '';
$kristo_logo_url = isset($kristo_logo['url']) ? $kristo_logo['url'] : '';
$kristo_logo_alt = get_post_meta($kristo_logo_id, '_wp_attachment_image_alt', true);

$scroll_top = kristo_get_option('back_top_enable', true);
$footer_copyright_text = kristo_get_option('copyright_text');
$footer_copyright_text_allowed_tags = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
    ),
    'img' => array(
        'alt' => array(),
        'src' => array(),
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);

$footer_top_enable = kristo_get_option('footer_top_enable', true);
$footer_col_one = kristo_get_option('footer_col_one', true);
$footer_col_two = kristo_get_option('footer_col_two', true);
$footer_col_three = kristo_get_option('footer_col_three', true);
$footer_col_four = kristo_get_option('footer_col_four', true);

$footer_description = kristo_get_option('footer_description');
$footer_social = kristo_get_option('footer_social');

$footer_col_two_title = kristo_get_option('footer_col_two_title');
$footer_col_two_menu = kristo_get_option('footer_col_two_menu');

$footer_col_three_title = kristo_get_option('footer_col_three_title');
$footer_col_three_menu = kristo_get_option('footer_col_three_menu');

$footer_col_four_title = kristo_get_option('footer_col_four_title');
$footer_col_four_description = kristo_get_option('footer_col_four_description');
$footer_col_four_phone = kristo_get_option('footer_col_four_phone');
$footer_col_four_phone_link = kristo_get_option('footer_col_four_phone_link');
$footer_col_four_email = kristo_get_option('footer_col_four_email');

$footer_right_menu = kristo_get_option('footer_right_menu', true);
$footer_menu_item_1_name = kristo_get_option('footer_menu_item_1_name');
$footer_menu_item_1_link = kristo_get_option('footer_menu_item_1_link');
$footer_menu_item_2_name = kristo_get_option('footer_menu_item_2_name');
$footer_menu_item_2_link = kristo_get_option('footer_menu_item_2_link');

?>

<!-- footer area start -->
<footer class="theme-footer-wrapper theme_footer_Widegts hav-footer-topp">

    <?php if ($footer_top_enable == true): ?>
        <div class="footer-top">
            <div class="container">
                <div class="row custom-gutter">

                    <?php if ($footer_col_one == true): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_one_Widget">
                            <div id="block-9" class="footer-widget widget widget_block widget_media_image">
                                <figure class="wp-block-image size-full footer-logo">
                                    <?php
                                    if (has_custom_logo() || !empty($kristo_logo_url)) {
                                        if (isset($kristo_logo['url']) && !empty($kristo_logo_url)) {
                                    ?>
                                            <a href="<?php echo esc_url(site_url('/')) ?>" class="logo">
                                                <img class="img-fluid" src="<?php echo esc_url($kristo_logo_url); ?>" alt="<?php echo esc_attr($kristo_logo_alt) ?>">
                                            </a>
                                    <?php
                                        } else {
                                            the_custom_logo();
                                        }
                                    } else {
                                        printf('<h1 class="text-logo"><a href="%1$s">%2$s</a></h1>', esc_url(site_url('/')), esc_html(get_bloginfo('name')));
                                    }
                                    ?>
                                </figure>
                            </div>
                            <div id="block-10" class="footer-widget widget widget_block widget_text">
                                <p class="footer-overview-text"><?php echo $footer_description; ?></p>
                            </div>
                            <div id="block-11" class="footer-widget widget widget_block">
                                <div class="footer-social">

                                    <?php if (!empty($footer_social)): ?>
                                        <?php foreach ($footer_social as $social) { ?>
                                            <a href="<?php echo $social['social_account_link']['url']; ?>"><i class="<?php echo $social['social_account_icon']; ?>"></i></a>
                                        <?php } ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($footer_col_two == true): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_two_Widget">
                            <div id="nav_menu-1" class="footer-widget widget widget_nav_menu">
                                <h4 class="widget-title"><?php echo $footer_col_two_title; ?></h4>
                                <div class="menu-footer-nav-one-container">
                                    <ul id="menu-footer-nav-one" class="menu">
                                        <?php if (!empty($footer_col_two_menu)): ?>
                                            <?php foreach ($footer_col_two_menu as $menu) { ?>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $menu['column_two_menu_link']['url']; ?>"><?php echo $menu['column_two_menu_name']; ?></a></li>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($footer_col_three == true): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_three_Widget">
                            <div id="nav_menu-2" class="footer-widget widget widget_nav_menu">
                                <h4 class="widget-title"><?php echo $footer_col_three_title; ?></h4>
                                <div class="menu-footer-nav-one-container">
                                    <ul id="menu-footer-nav-one-1" class="menu">
                                        <?php if (!empty($footer_col_three_menu)): ?>
                                            <?php foreach ($footer_col_three_menu as $menu) { ?>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $menu['column_three_menu_link']['url']; ?>"><?php echo $menu['column_three_menu_name']; ?></a></li>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($footer_col_four == true): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_four_Widget">
                            <div id="block-12" class="footer-widget widget widget_block">
                                <h3><?php echo $footer_col_four_title; ?></h3>
                            </div>
                            <?php if (is_active_sidebar('footer-widget-4')): ?>
                                <?php dynamic_sidebar('footer-widget-4'); ?>
                            <?php endif; ?>
                            <div id="block-14" class="footer-widget widget widget_block">
                                <div class="is-layout-flex wp-container-3 wp-block-columns">
                                    <div class="is-layout-flow wp-block-column">
                                        <div>
                                            <a class="footer-tel" href="tel:<?php echo $footer_col_four_phone_link; ?>"><?php echo $footer_col_four_phone; ?></a>
                                        </div>
                                    </div>
                                    <div class="is-layout-flow wp-block-column">
                                        <div>
                                            <a class="footer-email-box" href="mailto:<?php echo $footer_col_four_email; ?>"><?php echo $footer_col_four_email; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="<?php if ($footer_right_menu == true) {
                                echo "col-lg-6 text-left";
                            } else {
                                echo "col-lg-12 col-md-12 text-center";
                            } ?>">
                    <p class="copyright-text">
                        <?php if (!empty($footer_copyright_text)) {
                            echo wp_kses($footer_copyright_text, $footer_copyright_text_allowed_tags);
                        } else {
                            /* translators: %d: Current year */
                            printf(
                                esc_html__('Copyright © %d Kristo. All rights reserved', 'kristo'),
                                date('Y')
                            );
                        } ?>
                    </p>

                </div>

                <?php if ($footer_right_menu == true): ?>
                    <div class="col-lg-6 text-right">
                        <ul id="menu-footer-nav" class="footer-nav">
                            <?php if (is_array($footer_menu_item_1_link) && isset($footer_menu_item_1_link['url'])): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($footer_menu_item_1_link['url']); ?>"><?php echo esc_html($footer_menu_item_1_name); ?></a></li>
                            <?php endif; ?>
                            <?php if (is_array($footer_menu_item_2_link) && isset($footer_menu_item_2_link['url'])): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($footer_menu_item_2_link['url']); ?>"><?php echo esc_html($footer_menu_item_2_name); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

</footer>
<!-- footer area end -->


<?php if ($scroll_top == true): ?>
    <div class="backto">
        <a href="#" class="icofont-long-arrow-up" aria-hidden="true"></a>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>

<?php
$dark_mode_default = kristo_get_option('dark_mode_default');
if ($dark_mode_default == true): ?>

    <script>
        jQuery('body').addClass('likhun-dark');
    </script>

<?php endif; ?>

</body>

</html>