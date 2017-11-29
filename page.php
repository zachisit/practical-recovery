<?php
/**
 * The template for displaying all pages
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
                    echo the_content();
                endwhile; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>