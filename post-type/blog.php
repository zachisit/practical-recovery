<?php
/**
 * Blog Custom Post Type
 *
 * @package practical-recovery
 */

function pr_blog_posttype() {
    register_post_type( 'prblog',
        [
            'labels' => [
                'name' => __( 'PR Blog' ),
                'singular_name' => __( 'PR Blog' ),
                'add_new' => __( 'Add New PR Blog' ),
                'add_new_item' => __( 'Add New PR Blog' ),
                'edit_item' => __( 'Edit PR Blog' ),
                'new_item' => __( 'Add New PR Blog' ),
                'view_item' => __( 'View PR Blog Article' ),
                'search_items' => __( 'Search PR Blogs' ),
                'not_found' => __( 'No PR Blogs found' ),
                'not_found_in_trash' => __( 'No PR Blogs found in trash' )
            ],
            'public' => true,
            'supports' => [ 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail'],
            'capability_type' => 'post',
            'rewrite' => [ "slug" => "prblog" ],
            'menu_position' => 5,
            'menu_icon' => 'dashicons-archive',
            'media_buttons' => false,
            'show_in_nav_menus' => false,
            'has_archive' => true
        ]
    );
}

add_action( 'init', 'pr_blog_posttype' );

function pr_blog_taxonomies()
{
    register_taxonomy('prblog_cat',
        ['prblog'],
        [
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'label' => 'Blog Topics',
            'rewrite' => true
        ]
    );

}

add_action( 'init', 'pr_blog_taxonomies', 0 );