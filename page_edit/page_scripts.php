<?php
/**
 * Page Edit Meta Boxes
 * Custom Scripts Meta Box
 */

function add_page_scripts_metaboxes() {
    add_meta_box('page_scripts_meta_values', 'Custom Scripts', 'page_scripts_meta_values', 'page', 'normal', 'default');
}
add_action( 'add_meta_boxes', 'add_page_scripts_metaboxes' );

function page_scripts_meta_values($post) {
    wp_nonce_field( basename( __FILE__ ), 'page_scripts_nonce' ); ?>

    <label for="header_scripts">Header Scripts</label>
    <textarea id="header_scripts" name="header_scripts" class="widefat" rows="8"><?=get_post_meta( $post->ID, 'header_scripts', true ) ?></textarea>

    <label for="body_scripts">Body Scripts</label>
    <textarea id="body_scripts" name="body_scripts" class="widefat" rows="8"><?=get_post_meta( $post->ID, 'body_scripts', true ) ?></textarea>
<?php }

function page_scripts_save($post_id) {
    if ( !isset( $_POST['page_scripts_nonce'] ) || !wp_verify_nonce( $_POST['page_scripts_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    //save it
    if ( isset( $_POST['header_scripts']) || isset($_POST['body_scripts'] ) ) {
        update_post_meta( $post_id, 'header_scripts', $_POST['header_scripts'] );
        update_post_meta( $post_id, 'body_scripts', $_POST['body_scripts'] );
    }
}
add_action( 'save_post', 'page_scripts_save', 10, 2 );