<?php
/**
 * Output Team Member
 * based on taxonomy piped in
 *
 * @package practical-recovery
 */

function pr_team_members_by_tax($atts) {
    //TODO:default to all if no cat piped in
    extract(shortcode_atts(
        [
            'category' => $category
        ], $atts
    ));


    $args = [
        'post_type' => 'team_member',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'team_cat',
                'field' => 'slug',
                'terms' => $category
            ],
        ]
    ];

    $query = new WP_Query( $args );

    $string = populate_template_file('/shortcode/team_members',
        [
            'posts' => $query->posts,
        ]
    );

    return $string;
}

add_shortcode( 'team_members', 'pr_team_members_by_tax' );