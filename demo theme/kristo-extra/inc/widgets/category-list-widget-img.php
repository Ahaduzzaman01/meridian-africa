<?php
if (!defined('ABSPATH')) exit;

add_action('widgets_init', function () {
    register_widget("Kristo_Category_List_Widget");
});

class Kristo_Category_List_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kristo_category_list_widget',
            esc_html__('Trending Topics Sidebar', 'kristo-extra'),
            ['classname' => 'kristo-category-list', 'description' => esc_html__('Trending Topics Sidebar', 'kristo-extra')]
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Collect settings
        $taxonomy   = $instance['kristo_taxonomy_itemm'] ?? 'category';
        $mode       = $instance['kristo_select_cat_item'] ?? '';
        $selected   = $instance['kristo_selected_categories'] ?? [];
        $title = !empty($instance['tt_title']) ? $instance['tt_title'] : '';

        // Query terms
        $query_args = ['hide_empty' => 0];
        if (!empty($selected) && $mode !== '') {
            $query_args[$mode] = $selected;
        }
        $terms = get_terms($taxonomy, $query_args);

        // Start markup buffer
        ob_start(); ?>

		<style>
            .trending-topics-widget h5 {
                margin-bottom: 0px;
                font-size: 24px;
                font-weight: 600;
                word-wrap: break-word;
            }

            .trending-topics-widget__title-wrapper {
                margin-bottom: 20px;
            }

            .trending-topics-widget a.category_image_single {
                margin-right: 0 !important;
                min-width: auto;
                width: 110px;
                margin-right: 11px;
                height: 95px;
            }

            .trending-topics-widget .cat-custom-wrap {
                justify-content: space-between;
                gap: 5px;
            }

            body.likhun-dark .trending-topics-widget .cat-custom-wrap {
                background: #000;
            }

            body.likhun-dark .trending-topics-widget .cat-custom-wrap:hover {
                background: #222;
            }

            body.likhun-dark .trending-topics-widget h5 {
                color: #ffffff;
            }

            /* RESPONSIVE */
            @media (min-width: 992px) and (max-width: 1199px) {
                .trending-topics-widget .cat-custom-wrap {
                    gap: 12px;
                    flex-direction: column-reverse;
                    align-items: flex-start;
                }

                .trending-topics-widget a.category_image_single {
                    width: 100%;
                }
            }

            @media (min-width: 575px) and (max-width: 991px) {
                .trending-topics-widget a.category_image_single {
                    width: 160px;
                }
            }

            @media (max-width: 400px) {
                .trending-topics-widget .cat-custom-wrap {
                    gap: 12px;
                    flex-direction: column-reverse;
                    align-items: flex-start;
                }

                .trending-topics-widget a.category_image_single {
                    width: 100%;
                }
            }

		</style>

        <div class="trending-topics-widget">

            <?php if ( ! empty( $title ) ) : ?>
                <div class="trending-topics-widget__title-wrapper d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                        <path d="M21.6413 12.9532H17.9075V4.25325C17.9075 2.22325 16.8079 1.81242 15.4667 3.33492L14.5 4.4345L6.3196 13.7387C5.19585 15.0074 5.6671 16.0466 7.35876 16.0466H11.0925V24.7466C11.0925 26.7766 12.1921 27.1874 13.5333 25.6649L14.5 24.5653L22.6804 15.2612C23.8042 13.9924 23.3329 12.9532 21.6413 12.9532Z" fill="#2660FF"/>
                    </svg>
                    <h5><?php echo esc_html($title); ?></h5>
                </div>
            <?php endif; ?>
			<?php if (!empty($terms)) : ?>
				<?php foreach ($terms as $idx => $term) :
					$term_link  = get_term_link($term);
					if (is_wp_error($term_link)) continue;

					// Active class check
					$active_class = '';
					if ((is_category() && get_queried_object_id() == $term->term_id) ||
						(is_tax() && get_queried_object_id() == $term->term_id)) {
						$active_class = 'active-cat img_cat_item_list_Single';
					}

					// Category image (from term meta)
					$meta       = get_term_meta($term->term_id, 'kristo', true);
					$catImg     = $meta['cat-bg'] ?? '';
					$catbg_color     = $meta['catbg-color'] ?? '';
					$cat_color     = $meta['cat-color'] ?? '';
					?>

					<div class="cat-custom-wrap">
                        <div style="display: flex; justify-content: flex-start; align-items: center; gap: 12px;">
                            <div style="display: flex; justify-content: center; align-items: center; width: 34px; height: 34px; border-radius: 50%; background-color: <?php echo $catbg_color; ?>; color: <?php echo $cat_color; ?>; font-size: 17px; font-weight: 500;">
                                <?php echo $idx+1; ?>
                            </div>
                            <div class="cat-inner-list cat-list-inner-content">
                                <a href="<?php echo esc_url($term_link); ?>">
                                    <span class="cat-name-single"><?php echo esc_html($term->name); ?></span>
                                </a>
                                <span class="category-number"><?php echo esc_html($term->count); ?> Articles</span>
                            </div>
                        </div>
						<a href="<?php echo esc_url($term_link); ?>"
							class="category_image_single <?php echo esc_attr($active_class); ?>"
							style="background-image:url('<?php echo esc_url($catImg); ?>');">
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
        </div>

        <?php
        echo ob_get_clean();
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $taxonomy       = $instance['kristo_taxonomy_itemm'] ?? 'category';
        $selected_cats  = $instance['kristo_selected_categories'] ?? [];
        $mode           = $instance['kristo_select_cat_item'] ?? '';
        $title            = esc_attr( $instance['tt_title'] ?? '' );
        ?>

        <p>
            <label>Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'tt_title' ); ?>" name="<?php echo $this->get_field_name( 'tt_title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('kristo_taxonomy_itemm'); ?>">Select Taxonomy:</label>
            <select class="widefat"
                    id="<?php echo $this->get_field_id('kristo_taxonomy_itemm'); ?>"
                    name="<?php echo $this->get_field_name('kristo_taxonomy_itemm'); ?>">
                <?php
                $taxonomies = get_taxonomies(['public' => true], 'names');
                $taxonomies[] = 'category';
                foreach ($taxonomies as $tax) {
                    printf('<option value="%s" %s>%s</option>', esc_attr($tax), selected($taxonomy, $tax, false), esc_html($tax));
                }
                ?>
            </select>
        </p>

        <p>
            <label>Filter Mode:</label>
            <select class="widefat"
                    id="<?php echo $this->get_field_id('kristo_select_cat_item'); ?>"
                    name="<?php echo $this->get_field_name('kristo_select_cat_item'); ?>">
                <option value="" <?php selected($mode, ''); ?>>Show All</option>
                <option value="include" <?php selected($mode, 'include'); ?>>Include Only</option>
                <option value="exclude" <?php selected($mode, 'exclude'); ?>>Exclude</option>
            </select>
        </p>

        <p>
            <label>Select Categories:</label>
            <select multiple class="widefat" style="height: 150px;"
                    id="<?php echo $this->get_field_id('kristo_selected_categories'); ?>"
                    name="<?php echo $this->get_field_name('kristo_selected_categories'); ?>[]">
                <?php
                $terms = get_terms($taxonomy, ['hide_empty' => 0]);
                foreach ($terms as $term) {
                    printf('<option value="%s" %s>%s</option>',
                        $term->term_id,
                        in_array($term->term_id, (array)$selected_cats) ? 'selected' : '',
                        esc_html($term->name)
                    );
                }
                ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return [
            'tt_title'                   => sanitize_text_field($new_instance['tt_title']),
            'kristo_taxonomy_itemm'     => sanitize_text_field($new_instance['kristo_taxonomy_itemm']),
            'kristo_selected_categories'=> $new_instance['kristo_selected_categories'] ?? [],
            'kristo_select_cat_item'    => sanitize_text_field($new_instance['kristo_select_cat_item'])
        ];
    }
}
