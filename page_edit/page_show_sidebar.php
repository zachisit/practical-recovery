<?php
/**
 * Page Edit Meta Boxes
 * Show or Hide Sidebar Meta Box
 */

function add_page_show_sidebar_metaboxes() {
    add_meta_box('page_show_sidebar_meta_values', 'Page Sidebar', 'page_show_sidebar_meta_values', 'page', 'side', 'default');
}
add_action( 'add_meta_boxes', 'add_page_show_sidebar_metaboxes' );

function page_show_sidebar_meta_values($post) {
    wp_nonce_field( basename( __FILE__ ), 'page_show_sidebar_nonce' );

    //pass in the meta box template
    //populate into template
    $string = populate_template_file( '/metabox/page_show_sidebar_metabox',
        get_post_meta ($post->ID)
    );

    echo $string;
}

function page_show_sidebar_save($post) {
    //verify this came from the our screen and with proper authorization
    if ( !wp_verify_nonce( $_POST['page_show_sidebar_nonce'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    //is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    $page_show_sidebar_meta['_show_sidebar'] = $_POST['_show_sidebar'];

    //add values of $testimonial_block_meta as custom fields
    foreach ($page_show_sidebar_meta as $key => $value) {
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
add_action( 'save_post', 'page_show_sidebar_save', 1, 2 );