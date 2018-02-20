<?php
/**
 * Blog Category List
 *
 * used on blog sidebar, for sidebar menu
 *
 * @package practical-recovery
 */

function pr_output_blog_categories() {
//    $args = [
//        'post_type' => 'prblog',
//        'post_status' => 'publish',
//        'posts_per_page' => -1,
//        'orderby' => 'title',
//        'order' => 'ASC',
//        'category_slug' => [
//            'addiction',
//            'treatment'
//        ]
//    ];
//
//    $query = new WP_Query( $args );

    $terms = get_terms( 'prblog_cat' );

    $string = populate_template_file('/shortcode/blog_category_listing',
        [
            'terms' => $terms
        ]
    );

    return $string;
}

add_shortcode( 'show_blog_categories', 'pr_output_blog_categories' );