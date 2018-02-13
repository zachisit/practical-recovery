<?php
/**
 * Template for Blog Output
 * showing all blog posts
 */
if(isset($posts) && !empty($posts)):?>
<ul class="blog_list">
    <?php foreach($posts as $post):
        //var_dump($post)?>
        <li>
            <div class="featured_image">
                <?=getFeaturedImage($post->ID, 'small')?>
            </div>
            <div class="content">
                <h3><a href="<?=get_post_permalink($post) ?>" title="<?=$post->post_title?>"><?=$post->post_title?></a></h3>
                <div class="date_posted">Posted on <?=date('F j, Y', strtotime($post->post_date))?></div>
                <div class="article">
                    <?=mb_strimwidth(wp_strip_all_tags($post->post_content), 0, 800, '...');?>
                </div>
                <a class="read_more" href="<?=get_post_permalink($post) ?>" title="<?=$post->post_title?>">full story</a>
            </div>
        </li>
    <?php endforeach;?>
</ul>
<?php endif;?>
