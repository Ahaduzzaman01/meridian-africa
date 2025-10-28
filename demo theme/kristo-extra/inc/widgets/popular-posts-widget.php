<?php
/**
 * @package kristo
 */
if ( ! class_exists( 'Theme_Popular_Posts' ) ) {

    class Theme_Popular_Posts extends WP_Widget {

        function __construct() {
            parent::__construct(
                'theme_popular_posts',
                esc_html__( 'Theme Popular Posts', 'kristo' ),
                [
                    'description' => esc_html__( 'Display popular posts', 'kristo' ),
                    'customize_selective_refresh' => true,
                ]
            );
        }

        public function widget( $args, $instance ) {
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            // Settings
            $title            = $instance['title'] ?? esc_html__( 'Popular Posts','kristo' );
            $title            = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $show_item        = ! empty( $instance['show_item'] ) ? absint( $instance['show_item'] ) : 3;

            // Query posts
            $posts = new WP_Query([
                'post_type'           => 'post',
                'ignore_sticky_posts' => 1,
                'posts_per_page'      => $show_item,
            ]);

            echo $args['before_widget'];

            if ( $title ) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }

            ob_start(); ?>

            <style>
                .popular-post-blog-item {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                    background-color: #ffffff;
                    margin-bottom: 20px;
                    border-radius: 20px;
                    padding: 10px 10px 10px 20px;
                }

                .popular-post-blog-item:last-child {
                    margin-bottom: 0;
                }

                .popular-post-thumb img{
                    width: 100px;
                    min-width: 100px;
                    max-width: 100px;
                    height: 100px;
                    object-fit: cover;
                    border-radius: 50%;
                }

                .popular-posts-widget__content h3 {
                    font-size: 18px !important;
                    font-weight: 700 !important;
                    line-height: 24px;
                    margin-bottom: 0;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                }

                .popular-posts-widget__content h3 a {
                    color: #000000;
                }

                .popular-posts-widget__content h3 a:hover {
                    color: #2660FF;
                }

                .popular-posts-widget .author-thumbnail img {
                    width: 30px;
                    height: 30px;
                    border-radius: 50%;
                }

                .author-name {
                    font-size: 14px;
                    font-weight: 500;
                    margin-bottom: 0;
                    line-height: 1;
                    text-transform: capitalize;
                }

                .author-name a {
                    color: #000000;
                }

                .post-date,
                .post-read-time {
                    color: #797979;
                    font-size: 12px;
                    font-weight: 500;
                    line-height: 1;
                }

                /* RESPONSIVE */
                @media (max-width: 991px) {
                    .popular-post-blog-item {
                        justify-content: space-between;
                    }
                }

                @media (max-width: 400px) {
                    .popular-post-blog-item {
                        gap: 10px;
                        margin-bottom: 10px;
                    }

                    .popular-post-thumb img {
                        width: 60px;
                        min-width: 60px;
                        max-width: 60px;
                        height: 60px;
                    }
                }
            </style>

            <div class="popular-posts-widget">
                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                    <div class="popular-post-blog-item">
                        <div class="popular-posts-widget__content">
                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo esc_html(get_the_title()); ?>
                                </a>
                            </h3>
                        </div>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="popular-post-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>
            </div>

            <?php
            echo ob_get_clean();
            echo $args['after_widget'];
            wp_reset_postdata();
        }

        public function update( $new_instance, $old_instance ) {
            return [
                'title'             => sanitize_text_field( $new_instance['title'] ?? '' ),
                'show_item'         => absint( $new_instance['show_item'] ?? 3 ),
            ];
        }

        public function form( $instance ) {
            $title            = esc_attr( $instance['title'] ?? '' );
            $show_item        = absint( $instance['show_item'] ?? 3 );
            ?>

            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'kristo' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'show_item' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'kristo' ); ?></label>
                <input class="tiny-text" id="<?php echo $this->get_field_id( 'show_item' ); ?>" name="<?php echo $this->get_field_name( 'show_item' ); ?>" type="number" step="1" min="1" value="<?php echo $show_item; ?>" />
            </p>

            <?php
        }
    }
}

// Register widget
add_action( 'widgets_init', function() {
    register_widget( 'Theme_Popular_Posts' );
});
