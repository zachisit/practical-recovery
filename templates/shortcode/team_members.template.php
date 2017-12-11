<?php
/**
 * Template for Team Member by Category shortcode
 **  @var [WP_Post] $posts
 *
 *
 */

if(isset($posts) && !empty($posts)): ?>
    <ul class="product_category_landing_list_style">
        <?php foreach($posts as $post):?>
            <li>
                <div class="team_member_entry">
                    <a href="<?=get_post_permalink($post) ?>" title="<?=$post->post_title?>"><?=get_the_post_thumbnail($post, 'full');?>
                        <h2 class="product_title"><?=$post->post_title?></h2></a>
                    <span class="product_cost"><?//=$post->get_price_html()?>$COST<?//=$post->get_slug()?></span>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>