<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register Podcast Custom Post Type
 */
function kristo_register_podcast_items()
{
    $labels = [
        'name'          => __('Podcast', 'kristo'),
        'singular_name' => __('Podcast Item', 'kristo'),
        'add_new'       => __('Add New Item', 'kristo'),
        'add_new_item'  => __('Add New Item', 'kristo'),
        'edit_item'     => __('Edit Item', 'kristo'),
        'new_item'      => __('New Item', 'kristo'),
        'view_item'     => __('View Item', 'kristo'),
        'all_items'     => __('All Items', 'kristo'),
        'not_found'     => __('Sorry, no podcast items found.', 'kristo'),
    ];

    $args = [
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-microphone',
        'public'              => true,
        'publicly_queryable'  => true,
        'hierarchical'        => true,
        'exclude_from_search' => true,
        'has_archive'         => true,
        'show_ui'             => true,
        'can_export'          => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 58,
        'capability_type'     => 'post',
        'rewrite'             => ['slug' => 'podcast-item'],
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'taxonomies'          => ['category', 'post_tag'],
    ];

    register_post_type('podcast', $args);
}
add_action('init', 'kristo_register_podcast_items');
