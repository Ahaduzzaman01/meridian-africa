<?php
if (!defined('ABSPATH')) exit;

add_action('widgets_init', function () {
    register_widget("Kristo_Tag_List_Widget");
});

class Kristo_Tag_List_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kristo_tag_list_widget',
            esc_html__('Kristo Tag List', 'kristo-extra'),
            ['classname' => 'kristo-tag-list', 'description' => esc_html__('Displays selected tags', 'kristo-extra')]
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Always use post_tag
        $taxonomy = 'post_tag';
        $selected_tags = $instance['kristo_selected_tags'] ?? [];
        $title = !empty($instance['tag_title']) ? $instance['tag_title'] : '';
        $show_count = !empty($instance['show_post_count']); // checkbox boolean

        // Query only selected tags
        $terms = [];
        if (!empty($selected_tags)) {
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'include'  => $selected_tags,
                'hide_empty' => false,
            ]);
        }

        ob_start(); ?>

        <style>
            .tags-wrapper {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }
            .kristo-tags-widget h5 {
                margin-bottom: 0;
                font-size: 24px;
                font-weight: 600;
            }
            .kristo-tags-widget__title-wrapper {
                margin-bottom: 20px;
            }
            .kristo-tags-widget .tag-item {
                display: flex;
                align-items: center;
                margin: 0;
                padding: 10px 18px;
                background-color: #EEEEEE;
                border-radius: 50px;
                transition: all 0.2s ease;
                text-decoration: none;
                color: #000;
            }
            .kristo-tags-widget .tag-item span {
                font-size: 18px;
                font-weight: 500;
                margin: 0;
                line-height: 1;
            }
            .kristo-tags-widget .tag-item:hover {
                background-color: #2660FF;
                color: #fff;
            }
            .kristo-tags-widget .tag-count {
                font-size: 12px;
                opacity: 0.7;
                margin-top: 3px;
            }
            body.likhun-dark .kristo-tags-widget .tag-item {
                background: #111;
                color: #fff;
            }
            body.likhun-dark .kristo-tags-widget .tag-item:hover {
                background: #2660FF;
                color: #fff;
            }

            /* RESPONSIVE */
            @media (max-width: 400px) {
                .kristo-tags-widget .tag-item {
                    padding: 8px 12px;
                }

                .kristo-tags-widget .tag-item span {
                    font-size: 16px;
                }
            }
        </style>

        <div class="kristo-tags-widget">
            <?php if (!empty($title)) : ?>
                <div class="kristo-tags-widget__title-wrapper d-flex align-items-center">
                    <h5><?php echo esc_html($title); ?></h5>
                </div>
            <?php endif; ?>

            <?php if (!empty($terms)) : ?>
                <div class="tags-wrapper">
                    <?php foreach ($terms as $term) :
                        $term_link = get_term_link($term);
                        if (is_wp_error($term_link)) continue; ?>
                        
                        <a href="<?php echo esc_url($term_link); ?>" class="tag-item">
                            <span class="tag-name"><?php echo esc_html($term->name); ?></span>
                            <?php if ($show_count): ?>
                                <span class="tag-count"><?php echo '(' . esc_html($term->count) . ')'; ?></span>
                            <?php endif; ?>
                        </a>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php
        echo ob_get_clean();
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $taxonomy = 'post_tag';
        $selected_tags = $instance['kristo_selected_tags'] ?? [];
        $title = esc_attr($instance['tag_title'] ?? '');
        $show_count = !empty($instance['show_post_count']); // checkbox boolean
        ?>

        <p>
            <label>Title:</label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id('tag_title'); ?>"
                   name="<?php echo $this->get_field_name('tag_title'); ?>"
                   type="text"
                   value="<?php echo $title; ?>" />
        </p>

        <p>
            <label>Select Tags:</label>
            <select multiple class="widefat" style="height: 150px;"
                    id="<?php echo $this->get_field_id('kristo_selected_tags'); ?>"
                    name="<?php echo $this->get_field_name('kristo_selected_tags'); ?>[]">
                <?php
                $terms = get_terms($taxonomy, ['hide_empty' => false]);
                foreach ($terms as $term) {
                    printf(
                        '<option value="%s" %s>%s</option>',
                        $term->term_id,
                        in_array($term->term_id, (array)$selected_tags) ? 'selected' : '',
                        esc_html($term->name)
                    );
                }
                ?>
            </select>
        </p>

        <!-- ✅ New checkbox option -->
        <p>
            <input class="checkbox" type="checkbox"
                   id="<?php echo $this->get_field_id('show_post_count'); ?>"
                   name="<?php echo $this->get_field_name('show_post_count'); ?>"
                   <?php checked($show_count); ?> />
            <label for="<?php echo $this->get_field_id('show_post_count'); ?>">Show post counter besides each tag</label>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return [
            'tag_title'           => sanitize_text_field($new_instance['tag_title']),
            'kristo_selected_tags' => $new_instance['kristo_selected_tags'] ?? [],
            'show_post_count'     => !empty($new_instance['show_post_count']) ? 1 : 0,
        ];
    }
}
