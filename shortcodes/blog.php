<?php
/**
 * Blog Page
 * shows Posts for blog output
 */
function pr_output_blog() {
    $args = [
        'post_type' => 'prblog',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ];

    $query = new WP_Query( $args );

    $string = populate_template_file('/shortcode/blog',
        [
            'posts' => $query->posts,
        ]
    );

    return $string;
}

add_shortcode( 'show_blog_posts', 'pr_output_blog' );