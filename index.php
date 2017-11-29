<?php
/**
 * The main template file
 *
 * Serves as landing page for theme
 *
 * @package practical-recovery
 */
get_header(); ?>

<main id="home">
    <div id="banner_image">
        <h1>San Diego's Source For Drug Rehab and Alcohol Treatment Since 1985</h1>
    </div>
    <div id="home_content">
        <div id="content">

        </div>
        <div id="sidebar">
            <a href="" title=""><img src="<?=get_template_directory_uri(); ?>/images/preload/My-addiction-recovery-story.jpg" alt="<?=get_bloginfo( 'name' ); ?> - Home" /></a>
        </div>
    </div>
    <div id="latest_post_read_what">
        <div id="latest_post">
            <?php $args = [
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'order' => 'DSC',
                'category_name' => 'homepage'
            ];

            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?=featured_image() ?>
                    <div class="excerpt"><?=the_excerpt()?></div>
                    <div class="readmore"><a href="<?=the_permalink()?>" title="<?=the_title(); ?>">read more</a></div>
            <?php endwhile; endif; wp_reset_postdata()?>
        </div>
        <div id="read_what">
            <h2>Read what people are saying about us</h2>
            <div id="testimonials_container">
                <ul id="testimonials_slider">
                    <?php $query = new WP_Query( ['post_type' => 'testimonials', 'posts_per_page' => -1 ] );
                    foreach($query->get_posts() as $testimonial):
                        $meta = get_post_meta($testimonial->ID);
                        foreach($meta as &$m){
                            if(is_array($m)){
                                $m = $m[0];
                            }
                        } ?>
                        <li>
                            <div class="content"><p><?=do_shortcode($testimonial->post_content) ?></p></div>
                            <div class="author">- <?=$meta['_testimonial_person_name'] ?> <?php if ($meta['_testimonial_company_name']){?><span class="company_name">/ <?=$meta['_testimonial_company_name'] ?></span><?}?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="link"><a href="<?=home_url('/testimonials'); ?>" title="View All Testimonials">View More</a></div>
            </div>
            <ul>
                <li>
                    <div class="testimonial">testimonial content</div>
                    <div class="testimonial_name">-Dave</div>
                </li>
            </ul>
        </div>
    </div>
    <div id="parallax">
        <div id="container">
            <div class="phone_icon"><img src="<?=get_template_directory_uri(); ?>/images/preload/cta-phone.png" alt="<?=get_bloginfo( 'name' ); ?> - Call Us 1-800-977-6110" /></div>
            <div class="phone_number"><a href="tel:1-800-977-6110">(800) 977-6110</a></div>
            <div id="empower">Empower yourself. Call now.</div>
            <div id="cta">Phone answered 7 days a week | No obligation | Completely confidential</div>
            <div id="email"><a href="" title="email us">Email Us</a></div>
        </div>
    </div>
    <div id="contact">
        <div id="green">
            <div class="textblock">
                <p class="strong">Practical Recovery Inc.</p>
                <p>Drug Rehab & Alcohol Treatment</p>
                <p>San Diego, California</p>
            </div>
            <div class="textblock">
                <p class="strong">Have questions?</p>
                <p>Fill out the confidential form to the right and we will contact you shortly.</p>
            </div>
            <div class="textblock">
                <p class="strong">Or call us for a complimentary phone consultation:</p>
                <p><span class="italic">Intake:</span> (800) 977-6110</p>
            </div>
            <div class="textblock">
                <p><a href="mailto:INFO@PRACTICALRECOVERY.COM">INFO@PRACTICALRECOVERY.COM</a></p>
            </div>
        </div>
        <div id="blue">
            contact form here
        </div>
    </div>
    <div id="press">
        <h2>Visit Our Press Page</h2>
        <ul>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/discovery_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: Discovery News" /></li>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/the_fix_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: The Fix" /></li>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/cnn_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: CNN" /></li>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/the_wasington_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: The Washington Post" /></li>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/the_times_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: Time" /></li>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/the_abc_news_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: ABC News" /></li>
            <li><img src="<?=get_template_directory_uri(); ?>/images/preload/the_salon_img.png" alt="<?=get_bloginfo( 'name' ); ?> - Press: Salon" /></li>
        </ul>
    </div>
    <div id="additions_we_treat">
        <h2>Additions We Treat</h2>
        <div id="one">
            <ul>
                <li><a href="" title="Alcohol Addiction">Alcohol Addiction</a></li>
                <li><a href="" title="Opioid Addiction">Opioid Addiction</a></li>
                <li><a href="" title="Sex Addiction">Sex Addiction</a></li>
                <li><a href="" title="Marijuana Addiction">Marijuana Addiction</a></li>
            </ul>
        </div>
        <div id="two">
            <ul>
                <li><a href="" title="Heroin Addiction">Heroin Addiction</a></li>
                <li><a href="" title="Meth Addiction">Meth Addiction</a></li>
                <li><a href="" title="Gambling Addiction">Gambling Addiction</a></li>
                <li><a href="" title="Crack Addiction">Crack Addiction</a></li>
            </ul>
        </div>
        <div id="three">
            <ul>
                <li><a href="" title="Cocaine Addiction">Cocaine Addiction</a></li>
                <li><a href="" title="MDMA Abuse">MDMA Abuse</a></li>
                <li><a href="" title="Synthetic Marijuana">Synthetic Marijuana</a></li>
            </ul>
        </div>
    </div>
</main>

<?php get_footer(); ?>