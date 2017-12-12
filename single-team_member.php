<?php
/**
 * The template for displaying a Custom Post Type single entry
 * for Team Member Post Type
 *
 * @link https://codex.wordpress.org/Post_Types#Template_Files
 *
 * @package practical-recovery
 */
get_header(); ?>
    <main>
        <?php pageBannerImage() ?>
        <div class="wrapper">
            <?php get_sidebar(); ?>
            <div id="content_right">
                <?php while ( have_posts() ) : the_post();
                    $team_member_title = get_post_meta( $post->ID, '_team_member_job_title', true );
                    echo get_the_post_thumbnail($post, 'full');
                    echo the_content();
                endwhile; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>