<?php
/**
 * The template for displaying all pages
 *
 * @package practical-recovery
 */
get_header();
$showSide = get_post_meta( get_the_ID(), '_show_sidebar', true );
?>
    <main>
        <?php pageBannerImage() ?>
        <div class="wrapper">
            <?php if ($showSide) { get_sidebar(); } ?>
            <div id="<?=($showSide) ? 'content_right' : 'full_width' ?>" class="content_text">
                <?php while ( have_posts() ) : the_post();
                    echo the_content();
                endwhile; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>