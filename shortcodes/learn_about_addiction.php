<?php
/**
 * Learn About Addiction
 * shows Posts for 'Learn About Addiction' page
 */
function pr_output_learn_about_addiction() {
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'category_slug' => [
            'addiction',
            'treatment'
        ]
    ];

    $query = new WP_Query( $args );

    $string = populate_template_file('/shortcode/learn_about_addiction',
        [
            'posts' => $query->posts,
        ]
    );

    return $string;
}

add_shortcode( 'show_learn_about_addiction_posts', 'pr_output_learn_about_addiction' );