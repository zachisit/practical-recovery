<?php
/**
 * The template for Blog CPT
 *
 * @package practical-recovery
 */
get_header(); ?>
    <main>
    <div class="wrapper page_content">
        <div id="content_right" class="blog_post">
            <?php while ( have_posts() ) : the_post();?>
                <h1><?=the_title()?></h1>
                <div class="post_date">Posted on <?=the_date()?></div>
                <?=the_content()?>
            <?php endwhile; ?>
        </div>
        <?php get_sidebar() ?>
    </div>
<?php get_footer(); ?>