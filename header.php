<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php if ( !is_front_page() ) { wp_title( '|', true, 'right' ); } bloginfo( 'name' ); ?></title>

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="images/preload/apple-touch-icon.png"><!--//TODO:provide-->

    <!-- Microsoft Tiles -->
    <meta name="msapplication-config" content="browserconfig.xml" /><!--//TODO:provide-->

    <!--Facebook Open Graph--><!--//TODO:provide-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://example.com/page.html">
    <meta property="og:title" content="Content Title">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:description" content="Description Here">
    <meta property="og:site_name" content="Site Name">
    <meta property="og:locale" content="en_US">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!--Twitter Card--><!--//TODO:provide-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@site_account">
    <meta name="twitter:creator" content="@individual_account">
    <meta name="twitter:url" content="https://example.com/page.html">
    <meta name="twitter:title" content="Content Title">
    <meta name="twitter:description" content="Content description less than 200 characters">
    <meta name="twitter:image" content="https://example.com/image.jpg">
    <?php wp_head(); ?>
    <?=get_post_meta( get_the_ID(), 'header_scripts', true ); //refer to /page_edit/page_scripts.php?>
</head>
<body>

<header class="fixed-header">
    <div class="wrapper">
        <div id="logo">
            <a href="<?=get_home_url(); ?>" title="<?=get_home_url(); ?> Home"><img src="<?=get_template_directory_uri(); ?>/images/preload/logo1.png" alt="<?=get_bloginfo( 'name' ); ?> - <?=get_home_url(); ?> Logo" /></a>
        </div>
        <button id="menu_btn"></button>
        <div id="top">
            <div id="call_us">
                <p>Call Us: <a href="tel:800-977-6110"><span class="strong">(800) 977-6110</span></a></p>
            </div>
            <div id="social">
                <ul>
                    <li><a href="https://www.facebook.com/practicalrecovery" title="<?=get_bloginfo( 'name' ); ?> - Facebook" target="_blank"><!--<img src="<?=get_template_directory_uri(); ?>/images/preload/fb-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Facebook" /></a>--><i class="fa fa-facebook-official" aria-hidden="true"></i></li>
                    <li><a href="https://twitter.com/PracticalRecov" title="<?=get_bloginfo( 'name' ); ?> - Twitter" target="_blank"><!--<img src="<?=get_template_directory_uri(); ?>/images/preload/twitter-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Twitter" />--><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="http://pinterest.com/practicalrecov/" title="<?=get_bloginfo( 'name' ); ?> - Pinterest" target="_blank"><!--<img src="<?=get_template_directory_uri(); ?>/images/preload/pinit-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Pinterest" />--><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                    <li><a href="http://instagram.com/practicalrecoverysd" title="<?=get_bloginfo( 'name' ); ?> - Instagram" target="_blank"><!--<img src="<?=get_template_directory_uri(); ?>/images/preload/instagram-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Instagram" />--><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="http://www.youtube.com/user/PracticalRecoveryInc/feed" title="<?=get_bloginfo( 'name' ); ?> - YouTube" target="_blank"><!--<img src="<?=get_template_directory_uri(); ?>/images/preload/youtube-head.png" alt="<?=get_bloginfo( 'name' ); ?> - YouTube" />--><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div id="search">
                <?php get_search_form()?>
            </div>
        </div>
        <div id="menu">
            <button id="menu_close"></button>
            <div id="search_mobile">
                <?php get_search_form(); ?>
            </div>
            <?php wp_nav_menu( [ 'theme_location' => 'header_menu', 'menu_id' => 'primary-menu' ] ); ?>
        </div>
    </div>
</header>
<div id="site_top"></div>