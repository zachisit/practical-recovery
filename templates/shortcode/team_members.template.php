<?php
/**
 * Template for Team Member by Category shortcode
 **  @var [WP_Post] $posts
 *
 * @package practical-recovery
 */

if(isset($posts) && !empty($posts)):?>
    <ul class="team_members">
        <?php foreach($posts as $post):
            $team_member_title = get_post_meta( $post->ID, '_team_member_job_title', true );?>
            <li>
                <div class="team_member_entry">
                    <a href="<?=get_post_permalink($post) ?>" title="<?=$post->post_title?>"><?=get_the_post_thumbnail($post, 'full');?>
                        <h2 class="member_title"><?=$post->post_title?>, <?=$team_member_title?></h2></a>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>