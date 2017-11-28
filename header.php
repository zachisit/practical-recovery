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
</head>
<body>

<header>
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
                <li><a href="https://www.practicalrecovery.com/wp-content/uploads/2015/04/fb-head.png" title="<?=get_bloginfo( 'name' ); ?> - Facebook"><img src="<?=get_template_directory_uri(); ?>/images/preload/fb-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Facebook" /></a></li>
                <li><a href="https://twitter.com/PracticalRecov" title="<?=get_bloginfo( 'name' ); ?> - Twitter"><img src="<?=get_template_directory_uri(); ?>/images/preload/twitter-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Twitter" /></a></li>
                <li><a href="http://pinterest.com/practicalrecov/" title="<?=get_bloginfo( 'name' ); ?> - Pinterest"><img src="<?=get_template_directory_uri(); ?>/images/preload/pinit-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Pinterest" /></a></li>
                <li><a href="http://instagram.com/practicalrecoverysd" title="<?=get_bloginfo( 'name' ); ?> - Instagram"><img src="<?=get_template_directory_uri(); ?>/images/preload/instagram-head.png" alt="<?=get_bloginfo( 'name' ); ?> - Instagram" /></a></li>
                <li><a href="http://www.youtube.com/user/PracticalRecoveryInc/feed" title="<?=get_bloginfo( 'name' ); ?> - YouTube"><img src="<?=get_template_directory_uri(); ?>/images/preload/youtube-head.png" alt="<?=get_bloginfo( 'name' ); ?> - YouTube" /></a></li>
            </ul>
        </div>
        <div id="search">
            search here
        </div>
    </div>
    <div id="menu">
        <button id="menu_close"></button>
        <div id="search_mobile">
            <?php get_search_form(); ?>
        </div>
        <?php wp_nav_menu( [ 'theme_location' => 'header_menu', 'menu_id' => 'primary-menu' ] ); ?>
    </div>
</header>