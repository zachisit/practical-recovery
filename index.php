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
        <div class="cta_block">
            <h1>
                <span class="full_width">San Diego's Source For</span>
                <span class="full_width strong">Drug Rehab and Alcohol Treatment</span>
                <span class="full_width">Since 1985</span>
            </h1>
        </div>
    </div>
    <div id="home_content">
        <div class="wrapper">
            <div id="content_left">
                <?=get_page_content('4')?>
            </div>
            <div id="sidebar" class="sidebar_right">
                <a href="https://fast.wistia.net/embed/iframe/w78666dkc1?popover=true?TB_iframe=true" class="thickbox"><img src="<?=get_template_directory_uri(); ?>/images/preload/My-addiction-recovery-story.jpg" alt="<?=get_bloginfo( 'name' )?> - Home" /></a>

                <?=do_shortcode('[mailchimp_signup]')?>
            </div>
        </div>
        <div id="latest_post_read_what">
            <div class="wrapper">
                <div id="latest_post">
                    <?php get_latest_blog_post(1, true, true, true, true)?>
                </div>
                <div id="read_what">
                    <h2>Read what people are saying about us</h2>
                    <img src="<?=get_template_directory_uri(); ?>/images/preload/testimonial-quotes-before.png" alt="<?=get_bloginfo( 'name' ); ?> - <?=get_home_url(); ?> Logo" aria-hidden="true" />
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
                                    <div class="content"><p><?=do_shortcode(mb_strimwidth($testimonial->post_content, 0, 280, '...')) ?></p></div>
                                    <div class="after_quote">
                                        <div class="author"> <?=$meta['_testimonial_person_tagline'] ?></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="parallax" style="background:url(/wp-content/themes/practical-recovery-twentyeightteen/images/preload/empower.jpg) no-repeat;background-attachment:fixed">
            <div id="container">
                <div class="phone_icon"><!--<img src="<?=get_template_directory_uri(); ?>/images/preload/cta-phone.png" alt="<?=get_bloginfo( 'name' ); ?> - Call Us 1-800-977-6110" />--><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                <div class="phone_number"><a href="tel:1-800-977-6110">(800) 977-6110</a></div>
                <div id="empower">Empower yourself. Call now.</div>
                <div id="cta">Phone answered 7 days a week | No obligation | Completely confidential</div>
                <div id="email"><a href="<?=home_url('contact-us-2')?>" title="email us" class="large_button">Email Us</a></div>
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
                    <p><a href="<?=home_url('/contact')?>" title="Contact Us" class="large_button">Contact Us</a></p>
                </div>
            </div>
            <div id="blue">
                <h2>Send us a confidential message</h2>
                <?=do_shortcode('[gravityform id=6 title=false description=false ajax=true]')?>
            </div>
        </div>
        <div id="facebook">
            <?php dynamic_sidebar('facebook-reviews')?>
            <div id="view_more_facebook_reviews">view more</div>
        </div>
        <div id="press">
            <div class="wrapper">
                <h2 class="section_headline">Visit Our Press Page</h2>
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
        </div>
        <div id="additions_we_treat">
            <div class="wrapper small">
                <h2 class="section_headline">Additions We Treat</h2>
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
        </div>
    </div>
</main>

<?php get_footer(); ?>