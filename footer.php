<footer>
    <div id="footer_flower">
        <img src="<?=get_template_directory_uri(); ?>/images/preload/footer-flower.jpg" alt="flower icon" />
    </div>
    <div id="top">
        <div class="wrapper">
            <div id="left">
                <h2>Download Our Brochure of Addiction Treatment Services</h2>
                <div class="row"><a class="large_button pdf" href="https://www.practicalrecovery.com/wp-content/uploads/2016/12/PR_Bro_Web.pdf" title="Download PDF" target="_blank">Download PDF</a></div>
            </div>
            <div id="right">
                <h2>NEWSLETTER SIGNUP</h2>
                <div id="newsletter_signup">
                    <?//=do_shortcode('[yikes-mailchimp form="2"]')?>
                    <!-- Begin MailChimp Signup Form -->
                    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                    <style type="text/css">
                        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                    </style>
                    <div id="mc_embed_signup">
                        <form action="https://practicalrecovery.us6.list-manage.com/subscribe/post?u=791f7f004fd1a730ccf7b7ef2&amp;id=1879204b7f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <h2>Subscribe to our mailing list</h2>
                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                    </label>
                                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-FNAME">First Name </label>
                                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-LNAME">Last Name </label>
                                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                                </div>
                                <div class="mc-field-group input-group">
                                    <strong>Choose a Newsletter </strong>
                                    <ul><li><input type="radio" value="Recovery Support" name="MMERGE3" id="mce-MMERGE3-0"><label for="mce-MMERGE3-0">Recovery Support</label></li>
                                        <li><input type="radio" value="Professional" name="MMERGE3" id="mce-MMERGE3-1"><label for="mce-MMERGE3-1">Professional</label></li>
                                    </ul>
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_791f7f004fd1a730ccf7b7ef2_1879204b7f" tabindex="-1" value=""></div>
                                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                    </div>
                    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='radio';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                    <!--End mc_embed_signup-->
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