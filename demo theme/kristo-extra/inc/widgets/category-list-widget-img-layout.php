<?php
if (!defined('ABSPATH')) exit;

add_action('widgets_init', function () {
    register_widget('kristo_category_list_widget_imgg');
});

class kristo_category_list_widget_imgg extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'kristo_category_list_widget_imgg',
            esc_html__('Trending Topics Layout', 'kristo-extra'),
            ['classname' => 'kristo-category-list', 'description' => esc_html__('Displays selected categories with images.', 'kristo-extra')]
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $selected_categories = !empty($instance['kristo_selected_categories']) ? (array)$instance['kristo_selected_categories'] : [];

        if (empty($selected_categories)) {
            echo '<p>' . esc_html__('No categories selected.', 'kristo-extra') . '</p>';
            echo $args['after_widget'];
            return;
        }

        $terms = get_terms([
            'taxonomy'   => 'category',
            'include'    => $selected_categories,
            'hide_empty' => false,
        ]);

        if (empty($terms) || is_wp_error($terms)) {
            echo '<p>' . esc_html__('No categories found.', 'kristo-extra') . '</p>';
            echo $args['after_widget'];
            return;
        }

        // ✅ MARKUP START
        ?>
        <div class="category_image_wrapper">
            <div class="theme_cat_custom_list">
                <div class="theme-custom-category-lists theme_img_cat_Itemlist cat-custom-wrap-slider">
                    <?php foreach ($terms as $term): 
                        $term_link = get_term_link($term);
                        if (is_wp_error($term_link)) continue;

                        $category_featured_thumbnail = get_term_meta($term->term_id, 'kristo', true);
                        $catImg = !empty($category_featured_thumbnail['cat-bg']) ? $category_featured_thumbnail['cat-bg'] : '';
                        $background_style = $catImg ? 'style="background-image:url(' . esc_url($catImg) . ');"' : '';

                        $active_class = '';
                        if ((is_category() && get_queried_object_id() === $term->term_id) ||
                            (is_tax() && get_queried_object()->term_id === $term->term_id)) {
                            $active_class = 'active-cat img_cat_item_list_Single';
                        }
                    ?>
                        <div class="cat-custom-wrap-box">
                            <div class="cat-custom-wrap <?php echo esc_attr($active_class); ?>">
                                <a <?php echo $background_style; ?> href="<?php echo esc_url($term_link); ?>" class="category_image_single"></a>
                                <div class="cat-inner-list cat-list-inner-content">
                                    <a href="<?php echo esc_url($term_link); ?>">
                                        <span class="cat-name-single"><?php echo esc_html($term->name); ?></span>
                                    </a>
                                    <span class="category-number"><?php echo intval($term->count); ?> <?php esc_html_e('Articles', 'kristo-extra'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <script>
            /* ----------------------------------------------------------- */
            /*  Slick
            /* ----------------------------------------------------------- */
            jQuery(document).ready(function ($) {

                function rtl_slick() {
                    if ($('body').hasClass("rtl")) {
                        return true;
                    } else {
                        return false;
                    }
                }

                $('.cat-custom-wrap-slider').slick({

                    infinite: true,
                    fade: false,
                    dots: false,
                    arrows: true,
                    autoplay: false,
                    autoplaySpeed: 3000,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    rtl: rtl_slick(),

                    prevArrow: '<div class="slide-arrow-left"><i class="icofont-long-arrow-left"></i></div>',
                    nextArrow: '<div class="slide-arrow-right"><i class="icofont-long-arrow-right"></i></div>',

                    responsive: [
                        {
                            breakpoint: 1500,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },

                        {
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        },

                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        </script>
        <?php
        // ✅ MARKUP END

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $selected_categories = !empty($instance['kristo_selected_categories']) ? (array)$instance['kristo_selected_categories'] : [];

        $terms = get_terms([
            'taxonomy'   => 'category',
            'hide_empty' => false,
        ]);

        if (empty($terms) || is_wp_error($terms)) {
            echo '<p>' . esc_html__('No categories found.', 'kristo-extra') . '</p>';
            return;
        }
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('kristo_selected_categories')); ?>">
                <?php esc_html_e('Select Categories:', 'kristo-extra'); ?>
            </label>
            <select 
                class="widefat" 
				style="height: 100px;"
                id="<?php echo esc_attr($this->get_field_id('kristo_selected_categories')); ?>" 
                name="<?php echo esc_attr($this->get_field_name('kristo_selected_categories')); ?>[]" 
                multiple
            >
                <?php foreach ($terms as $term): ?>
                    <option value="<?php echo esc_attr($term->term_id); ?>" 
                        <?php selected(in_array($term->term_id, $selected_categories)); ?>>
                        <?php echo esc_html($term->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['kristo_selected_categories'] = !empty($new_instance['kristo_selected_categories'])
            ? array_map('intval', (array)$new_instance['kristo_selected_categories'])
            : [];
        return $instance;
    }
}
