<?php
/**
 * Testimonials Custom Post Type
 */
function pr_testimonials_posttype() {
    register_post_type( 'testimonials',
        [
            'labels' => [
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' ),
                'add_new' => __( 'Add New Testimonial' ),
                'add_new_item' => __( 'Add New Testimonial' ),
                'edit_item' => __( 'Edit Testimonial' ),
                'new_item' => __( 'Add New Testimonial' ),
                'view_item' => __( 'View Testimonials' ),
                'search_items' => __( 'Search Testimonials' ),
                'not_found' => __( 'No Testimonials found' ),
                'not_found_in_trash' => __( 'No Testimonials found in trash' )
            ],
            'public' => true,
            'supports' => [ 'title', 'editor', 'revisions', 'page-attributes'],
            'capability_type' => 'post',
            'rewrite' => [ "slug" => "testimonials" ],
            'menu_position' => 5,
            'register_meta_box_cb' => 'add_testimonials_metaboxes',
            'menu_icon' => 'dashicons-archive',
            'media_buttons' => false,
            'show_in_nav_menus' => false,
        ]
    );
}

add_action( 'init', 'pr_testimonials_posttype' );

//create and show metaboxes
function add_testimonials_metaboxes() {
    add_meta_box('pr_testimonials_meta_values', 'Testimonial Specifics', 'pr_testimonials_meta_values', 'testimonials', 'normal', 'default');
}

//show meta data to edit
function pr_testimonials_meta_values() {
    global $post;

    //noncename needed to verify where the data originated
    wp_nonce_field( plugin_basename(__FILE__), 'testimonial_noncename' );

    //pass in the meta box template
    //populate into template
    $string = populate_template_file( '/metabox/testimonial_metabox',
        get_post_meta ($post->ID)
    );

    echo $string;
}

//save meta data
function pr_testimonial_save_meta($post_id, $post) {

    //verify this came from the our screen and with proper authorization
    if ( !wp_verify_nonce( $_POST['testimonial_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    //is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    //save data
    $testimonial_block_meta['_testimonial_person_tagline'] = $_POST['_testimonial_person_tagline'];

    //add values of $testimonial_block_meta as custom fields
    foreach ($testimonial_block_meta as $key => $value) {
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

add_action('save_post', 'pr_testimonial_save_meta', 1, 2);

//set up new column to show custom meta theme_color
function pr_testimonials_column($column) {
    $column['testimonial_person_tagline'] = 'Person Tagline';

    return $column;
}

add_filter('manage_testimonials_posts_columns', 'pr_testimonials_column');

//show custom column data
function pr_show_testimonials_column($name) {
    global $post;
    switch ($name) {
        case 'testimonial_person_tagline':
            $testimonial_person_tagline = get_post_meta($post->ID, '_testimonial_person_tagline', true);
            echo $testimonial_person_tagline;
    }
}

add_action('manage_testimonials_posts_custom_column',  'pr_show_testimonials_column');