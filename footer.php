<footer>
    <div id="footer_flower">
        <img src="<?=get_template_directory_uri(); ?>/images/preload/footer-flower.jpg" alt="flower icon" />
    </div>
    <div id="top">
        <div class="wrapper">
            <div id="left">
                <h2>Download Our Brochure of Addiction Treatment Services</h2>
                <div class="row"><a class="large_button pdf" href="" title="Download PDF">Download PDF</a></div>
            </div>
            <div id="right">
                <h2>NEWSLETTER SIGNUP</h2>
                <div id="newsletter_signup">
                    <?=do_shortcode('[yikes-mailchimp form="2"]')?>
                </div>
            </div>
        </div>
    </div>
    <div id="menus">
        <div class="wrapper">
            <div id="one">
                <h3>Outpatient</h3>
                <?php wp_nav_menu( [ 'theme_location' => 'footer_menu_one' ] ); ?>
            </div>
            <div id="two">
                <h3>Resources</h3>
                <?php wp_nav_menu( [ 'theme_location' => 'footer_menu_two' ] ); ?>
            </div>
            <div id="three">
                <h3>About Us</h3>
                <?php wp_nav_menu( [ 'theme_location' => 'footer_menu_three' ] ); ?>
            </div>
        </div>
    </div>
    <div id="bottom">
        <div class="wrapper">
            <p>&copy; <?php echo date("Y"); ?> <?=get_bloginfo( 'name' ); ?></p>
            <ul id="footer_bottom_menu">
                <li><a href="<?=home_url('privacy-policy')?>" title="Privacy Policy">Privacy Policy</a></li>
                <li><a href="<?=home_url('disclaimers')?>" title="Disclaimers">Disclaimers</a></li>
                <li><a href="<?=home_url('sitemap')?>" title="sitemap">Sitemap</a></li>
            </ul>
        </div>
        <div id="scroll_top">
            <div id="scroll">
                <a href="#site_top" title="scroll to top of page"></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<?=get_post_meta( get_the_ID(), 'body_scripts', true );//refer to /page_edit/page_scripts.php?>
<!--Google Analytics-->
    <!--remove me and replace with client GA code-->
</body>
</html>