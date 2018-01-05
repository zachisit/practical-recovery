<?php
/**
 * The template for displaying all single posts
 *
 * @package practical-recovery
 */
get_header(); ?>
<main>
    <div id="full_width">
        <?php while ( have_posts() ) : the_post();
            echo '<h1>'.the_title().'</h1>';
            echo the_content();
        endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
<?php get_footer(); ?>