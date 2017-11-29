<?php
/**
 * Output all Testimonials
 */
function pr_all_testimonials() {
    $args = [
        'post_type' => 'testimonials',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ];

    $query = new WP_Query( $args );

    $string = populate_template_file('/shortcode/testimonials_output_all',
        [
            'posts' => $query->posts,
        ]
    );

    return $string;
}

add_shortcode( 'all_testimonials', 'pr_all_testimonials' );