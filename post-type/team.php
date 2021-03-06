<?php
/**
 * Team Member Custom Post Type
 */
function pr_team_member_posttype() {
    register_post_type( 'team_member',
        [
            'labels' => [
                'name' => __( 'Team Members' ),
                'singular_name' => __( 'Team Member' ),
                'add_new' => __( 'Add New Member' ),
                'add_new_item' => __( 'Add New Team Member' ),
                'edit_item' => __( 'Edit Team Member' ),
                'new_item' => __( 'Add New Team Member' ),
                'view_item' => __( 'View Team Members' ),
                'search_items' => __( 'Search Team Members' ),
                'not_found' => __( 'No Team Members found' ),
                'not_found_in_trash' => __( 'No Team Members found in trash' )
            ],
            'public' => true,
            'supports' => [ 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail'],
            'capability_type' => 'post',
            'rewrite' => [ "slug" => "team_member" ],
            'menu_position' => 5,
            'register_meta_box_cb' => 'add_team_member_metaboxes',
            'menu_icon' => 'dashicons-archive',
            'media_buttons' => false,
            'show_in_nav_menus' => false,
        ]
    );
}

add_action( 'init', 'pr_team_member_posttype' );

//create and show metaboxes
function add_team_member_metaboxes() {
    add_meta_box('pr_team_member_meta_values', 'Team Member Specifics', 'pr_team_member_meta_values', 'team_member', 'normal', 'default');
}

//show meta data to edit
function pr_team_member_meta_values() {
    global $post;

    //noncename needed to verify where the data originated
    wp_nonce_field( plugin_basename(__FILE__), 'team_member_noncename' );

    //pass in the meta box template
    //populate into template
    $string = populate_template_file( '/metabox/team_metabox',
        get_post_meta ($post->ID)
    );

    echo $string;
}

//save meta data
function pr_team_member_save_meta($post_id, $post) {

    //verify this came from the our screen and with proper authorization
    if ( !wp_verify_nonce( $_POST['team_member_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    //is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    //save data
    $team_block_meta['_team_member_job_title'] = $_POST['_team_member_job_title'];
    $team_block_meta['_team_member_tagline'] = $_POST['_team_member_tagline'];
    $team_block_meta['_team_member_contact_number'] = $_POST['_team_member_contact_number'];
    $team_block_meta['_team_member_email'] = $_POST['_team_member_email'];
    $team_block_meta['_team_member_website_team_member_social_facebook'] = $_POST['_team_member_website_team_member_social_facebook'];
    $team_block_meta['_team_member_social_facebook'] = $_POST['_team_member_social_facebook'];
    $team_block_meta['_team_member_social_twitter'] = $_POST['_team_member_social_twitter'];
    $team_block_meta['_team_member_social_google_plus'] = $_POST['_team_member_social_google_plus'];
    $team_block_meta['_team_member_social_linkedin'] = $_POST['_team_member_social_linkedin'];
    $team_block_meta['_team_member_social_youtube'] = $_POST['_team_member_social_youtube'];

    //add values of $testimonial_block_meta as custom fields
    foreach ($team_block_meta as $key => $value) {
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key);
    }
}

add_action('save_post', 'pr_team_member_save_meta', 1, 2);

//set up new column to show custom meta theme_color
function pr_team_member_column($column) {
    $column['team_member_job_title'] = 'Title';
    $column['team_member_contact_number'] = 'Contact';
    $column['team_member_email'] = 'Email';

    return $column;
}

add_filter('manage_team_member_posts_columns', 'pr_team_member_column');

//show custom column data
function pr_show_team_member_column($name) {
    global $post;
    switch ($name) {
        case 'team_member_job_title':
            $team_member_job_title = get_post_meta($post->ID, '_team_member_job_title', true);
            echo $team_member_job_title;
            break;
        case 'team_member_contact_number':
            $team_member_contact_number = get_post_meta($post->ID, '_team_member_contact_number', true);
            echo $team_member_contact_number;
            break;
        case 'team_member_email':
            $team_member_email = get_post_meta($post->ID, '_team_member_email', true);
            echo $team_member_email;
            break;
    }
}

add_action('manage_team_member_posts_custom_column',  'pr_show_team_member_column');

//create taxonomy for team
function pr_team_taxonomies()
{
    register_taxonomy('team_cat',
        ['team_member'],
        [
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'label' => 'Team Member Categories',
            'rewrite' => true
        ]
    );
}

add_action( 'init', 'pr_team_taxonomies', 0 );