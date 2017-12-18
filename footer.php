<footer>
    <div id="footer_flower">
        <img src="<?=get_template_directory_uri(); ?>/images/preload/footer-flower.jpg" alt="flower icon" />
    </div>
    <div id="top">
        <div class="wrapper">
            <div id="left">
                <h2>Download Our Brochure of Addiction Treatment Services</h2>
                <a class="large_button pdf" href="" title="Download PDF">Download PDF</a>
            </div>
            <div id="right">
                <h2>NEWSLETTER SIGNUP</h2>
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
            <ul>
                <li><a href="" title="Privacy Policy">Privacy Policy</a></li> |
                <li><a href="" title="Disclaimers">Disclaimers</a></li>
            </ul>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<!--Google Analytics-->
    <!--remove me and replace with client GA code-->
</body>
</html>