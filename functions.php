<?php
/**
 * practical-recovery functions and definitions
 *
 * @package practical-recovery
 */

require_once "shortcodes/sitemap.php";
require_once "shortcodes/team_member_list.php";
require_once "shortcodes/blog.php";
require_once "shortcodes/learn_about_addiction.php";
require_once "shortcodes/blog_category_list.php";
require_once "post-type/testimonials.php";
require_once "post-type/team.php";
require_once "post-type/blog.php";
require_once "page_edit/page_scripts.php";
require_once "page_edit/page_show_sidebar.php";

/**
 * Widgetize Theme
 */
function theme_widgets_init()
{
    register_sidebar( [
        'name' => 'Internal Sidebar',
        'id'   => 'internal-sidebar',
        'description'   => 'Widgetized sidebar for all internal pages.',
        'before_widget' => '<div class="widgetblock">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ] );

    register_sidebar( [
        'name' => 'Facebook Reviews',
        'id'   => 'facebook-reviews',
        'description'   => 'Specifically for Facebook Reviews',
        'before_widget' => '<div class="widgetblock">',
        'after_widget'  => '</div>',
    ] );
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Declare Theme Menus
 */
register_nav_menus( [
    'header_menu' => 'Header Main Navigation Menu',
    'footer_menu_one' => 'Footer Main Navigation Menu - One',
    'footer_menu_two' => 'Footer Main Navigation Menu - Two',
    'footer_menu_three' => 'Footer Main Navigation Menu - Three',
] );

/**
 * Theme CSS and JS Scripts
 */
function theme_scripts()
{
    //normalize
    wp_enqueue_script('jquery');

    //css
    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), time() );
    wp_enqueue_style( 'google_font_kreon', 'https://fonts.googleapis.com/css?family=Kreon:300,400,700');
    wp_enqueue_style( 'slick_carousel_css', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
    wp_enqueue_style( 'slick_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css' );

    //js
    wp_enqueue_script( 'preload_directory', get_template_directory_uri() . '/js/preload_directory.js',  time() );
    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/966d4a5f64.js', time() );
    wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/mobile_menu.js', time(), true );
    wp_enqueue_script( 'videoWrapper', get_template_directory_uri() . '/js/videoWrapper.js',  time() );
    wp_enqueue_script( 'smooth_scroll', get_template_directory_uri() . '/js/smooth_scroll.js',  time() );
    wp_enqueue_script( 'pdf_css_icon_add', get_template_directory_uri() . '/js/pdf_css_icon_add.js', time() );
    wp_enqueue_script( 'slick_carousel_js', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', [], time(), true );
    wp_enqueue_script( 'slick_carousel_declaractions_js', get_template_directory_uri() . '/js/slick_slider_homepage.js', [], time() );
    wp_enqueue_script( 'homepage_fb_reviews', get_template_directory_uri() . '/js/home_facebook_reviews_view_more.js', [], time() );

    //localized
    wp_localize_script('preload_directory', 'ajax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('preload_directory')
    ]);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Remove auto-linking of upload image in Media Library
 */
function theme_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'theme_imagelink_setup', 10);

/**
 * Login Screen CSS
 */
function theme_login_script()
{
    wp_enqueue_style( 'login_custom_style', get_stylesheet_directory_uri(). '/login_view.css', ['login'] );
}
add_action( 'login_enqueue_scripts', 'theme_login_script', 1 );

/**
 * Admin CSS and JS
 */
function theme_admin_script()
{
    //css
    wp_enqueue_style( 'theme_admin_css', get_template_directory_uri() . '/admin.css' );

    //scss
    wp_enqueue_style( get_template_directory_uri() . 'admin.scss' );
}
add_action( 'admin_enqueue_scripts', 'theme_admin_script');

/**
 * Featured images in Page Edit
 */
add_theme_support( 'post-thumbnails' );

/**
 * Template Engine
 * Takes a template file and populates it into a string that is returned
 * @param $templateFile
 * @param array $args
 * @return string
 */
function populate_template_file($templateFile, $args = [])
{
    ob_start(); //start output buffer

    $templateDirectory = dirname(__FILE__) . '/templates';
    $templateFile = $templateFile . '.template.php';
    //Confirm that template file exists
    if(file_exists($templateDirectory . '/' . $templateFile)){
        extract($args); //populate args into variables
        include $templateDirectory . '/' . $templateFile; //Include template file, make sure you are passing the required variables.
    }

    return ob_get_clean();
}

/**
 * Load Thickbox
 */
function loadThickBox() {
    add_thickbox();
}
add_action('wp_head', 'loadThickBox');

/**
 * Preloading Directory of Files
 * preload entire dir
 * @return: json encoded string
 */
function pr_theme_preload_dir() {
    header( 'Content-type: application/json' );

    $filenameArray = [];
    $templatePath = get_template_directory_uri();

    $handle = opendir(dirname(realpath(__FILE__)). '/images/preload/');

    while($file = readdir($handle)){
        if($file !== '.' && $file !== '..'){
            array_push($filenameArray, "$templatePath/images/preload/$file");
        }
    }

    echo json_encode($filenameArray);

    wp_die();//need to do at end of ajax calls to stop
}

add_action('wp_ajax_preload_images_directory', 'pr_theme_preload_dir');
add_action('wp_ajax_nopriv_preload_images_directory', 'pr_theme_preload_dir');

/**
 * Convert Normal YouTube link into embed code
 * Turns - https://www.youtube.com/watch?v=Aq-d4CET3rY
 * into - Aq-d4CET3rY
 * @param $youtube_url
 * @return mixed
 */
function youtube_url_to_embed($youtube_url) {
    $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
    $replace = "youtube.com/embed/$1";
    $embed_url = preg_replace($search,$replace,$youtube_url);
    return $embed_url;
}

/**
 * Get Featured Image
 *
 * Return a featured image of any Post with size passed in
 *
 * @param $id
 * @param $size - defaults to 'small' if none passed in
 * @return string
 */
function getFeaturedImage($id, $size) {
    $size = ($size) ? $size : 'small';

    $tub = get_the_post_thumbnail($id, $size);

    if (empty($tub)) {
        return "<img src='"
            . get_template_directory_uri()
            . "/images/preload/featured_image_placeholder.png' alt='Placeholder image' />";
    } else {
        return $tub;
    }
}

/**
 * Return Page Featured Image Banner
 *
 * Return a featured image as a page banner,
 * or a placeholder banner
 *
 * @return string
 */
function getPageFeaturedImageBanner() {
    $tub = get_the_post_thumbnail(null, 'full');

    if (empty($tub)) {
        return "<img src='"
            . get_template_directory_uri()
            . "/images/preload/page_banner_placeholder.png' alt='"
            . get_the_title()
            . "' />";
    } else {
        return $tub;
    }
}

/**
 * Page Banner Image
 *
 * pipes in the featured image from Page
 * pipes in headline title of Page
 * select if you want it as a parallax or non-parallax section
 * @param int $parallax set to default false
 */
function pageBannerImage($parallax = 0) {
    switch ($parallax):
        case 0://if no, show regular style
            include_once 'templates/pageBannerImageRegular.php';
            break;
        case 1://if yes, show as parallax effect
            include_once 'templates/pageBannerImageParallax.php';
            break;
        endswitch;
}

/**
 * Plugins Required For Theme
 *
 * some plugins help the theme run as expected
 * if a required plugin is missing, alert admin user
 */
function checkPluginsRequired() {
    $plugin_messages = [];

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    //get theme information
    $this_theme = wp_get_theme();
    $this_theme_name = $this_theme->get('Name');
    $this_theme_version = $this_theme->get('Version');

    //WP-SCSS Plugin
    if(!is_plugin_active( 'WP-SCSS-master/wp-scss.php' ))	{
        $plugin_messages[] = 'The '.$this_theme_name.' v.'.$this_theme_version.' theme requires you to install the WP-SCSS plugin - <a href="https://wordpress.org/plugins/wp-scss/" title="Download the required plugin here" target="_blank">download it from here</a> or activate if currently installed.';
    }

    if(count($plugin_messages) > 0)	{
        echo '<div id="message" class="error">';

        foreach($plugin_messages as $message) {
            echo '<p><strong>'.$message.'</strong></p>';
        }

        echo '</div>';
    }
}

/**
 * Return Page content per ID passed in
 * @param $page
 * @return mixed
 */
function get_page_content($page) {
    $page_id = $page;
    $page_data = get_page( $page_id );
    $content = apply_filters('the_content', $page_data->post_content);

    return $content;
}

/**
 * Get Latest Post
 *
 * pipe in category_slug and how many posts
 * to return basic wp_query
 *
 * @param $category_slug
 * @param $return_number
 * @param bool $title
 * @param bool $excerpt
 * @param bool $readmore
 * @param bool $date
 */
function get_latest_post($category_slug, $return_number, $title = false, $excerpt = false, $readmore = false, $date = false) {
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $return_number,
        'order' => 'DSC',
        'category_name' => $category_slug
    ];

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php if ($title) : ?><h3 class="title"><?=the_title()?></h3><?php endif; ?>
            <?php if ($date) : ?><div class="date"><?=the_date()?></div><?php endif; ?>
            <?=getFeaturedImage() ?>
            <?php if ($excerpt) : ?><div class="excerpt"><?=the_excerpt()?></div><?php endif; ?>
            <?php if ($readmore) : ?><div class="readmore"><a class="large_button" href="<?=the_permalink()?>" title="<?=the_title(); ?>">read more</a></div><?php endif; ?>
    <?php
        endwhile;
        endif;
        wp_reset_postdata();
}

/**
 * Get Latest Blog Post
 *
 * return latest PR Blog CPT Post
 *
 * @param $return_number
 * @param bool $title
 * @param bool $excerpt
 * @param bool $readmore
 * @param bool $date
 */
function get_latest_blog_post($return_number, $title = false, $excerpt = false, $readmore = false, $date = false) {
    $args = [
        'post_type' => 'prblog',
        'post_status' => 'publish',
        'posts_per_page' => $return_number,
        'order' => 'DESC',
        'orderby' => 'date'
    ];

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php if ($title) : ?><h3 class="title"><?=the_title()?></h3><?php endif; ?>
            <?php if ($date) : ?><div class="date"><?=the_date()?></div><?php endif; ?>
            <?=getFeaturedImage() ?>
            <?php if ($excerpt) : ?><div class="excerpt"><?=the_excerpt()?></div><?php endif; ?>
            <?php if ($readmore) : ?><div class="readmore"><a class="large_button" href="<?=the_permalink()?>" title="<?=the_title(); ?>">read more</a></div><?php endif; ?>
            <?php
        endwhile;
    endif;
    wp_reset_postdata();
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 45;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );