<?php
/**
 * The template for displaying all single posts
 *
 * @package practical-recovery
 */
get_header(); ?>
<main>
    <div class="wrapper page_content">
        <div id="content_right" class="blog_post">
            <?php while ( have_posts() ) : the_post();?>
                <h1><?=the_title()?></h1>
                <?=the_content()?>
            <?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>