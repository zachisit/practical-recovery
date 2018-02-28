<?php
/**
 * Blog Category List
 *
 * used on blog sidebar, for sidebar menu
 *
 * @package practical-recovery
 */

function pr_output_blog_categories() {
    $terms = get_terms( 'prblog_cat' );

    $string = populate_template_file('/shortcode/blog_category_listing',
        [
            'terms' => $terms
        ]
    );

    return $string;
}

add_shortcode( 'show_blog_categories', 'pr_output_blog_categories' );