# Practical Recovery Wordpress Theme

## Table of Contents
- [Author](#author)
- [Dependencies](#dependencies)
- [Theme Custom Post Types](#theme-custom-post-types)
- [Theme Shortcodes](#theme-shortcodes)
- [Theme Fonts](#theme-fonts)
- [Image Preloading](#image-preloading)
- [Theme Plugins](#theme-plugins)
- [WordPress Version](#wordpress-version)
- [Coding Styles](#coding-styles)
- [Base Theme History](#base-theme-history)

## Author
* Zachary Smith

## Dependencies
* SASS - theme uses SASS compiler for all stylesheets used in theme. Normal .css files will be found in the theme so user can put normal css declarations without editing the sass file if needed.
* In-house templating engine, found in functions.php
 * Utilizing native WordPress Thickbox for lightbox modals on frontend
 * While respecting that a theme does not need a list of poorly written plugins that complete functionality that a compentant developer can write from scratch, this theme has chosen certain plugins that extend or compliment the overall architecture of the theme itself. A list of those plugins are in the section [Theme Plugins](#theme-plugins) - if any of these plugins are not installed then an error will print in the admin screen alerting user to complete installation

## Theme Custom Post Types
* Testimonials
* Team Members
* PR Blog

## Theme Shortcodes
* Blog shows all blog articles via the Blog landing page via `[show_blog_posts]` taken from the PR Blog Custom Post Type
* Basic SiteMap, listing all Pages, shows via `[sitemap]`

## Theme Notes
* Per each Page, if user does not upload a Featured Image then it loads the fallback image, per `getPageFeaturedImageBanner` method.

## Theme Fonts
* To save server space and user load time, we use Google Fonts. The following are the client approved fonts this theme relies on. Fallback font will be sans-serif.
* Google Fonts '[FONT-NAME]' for [FONT-USES-ON-SITE] - https://fonts.google.com/specimen/[FULL-FONT-URL]

## Image Preloading
* Theme utilizing preloading of any files placed inside the theme/images/preload directory. Refer to file documentation on safe-use.

## Theme Plugins
Removing any of these plugins will break the theme and essentially ruin your day:
* [WP-SCSS](https://wordpress.org/plugins/wp-scss/) - allows server compiling of SASS file
* [Facebook Reviews](https://wordpress.org/plugins/fb-reviews-widget/) - for powering the homepage review block
* [PHP Code Widget](https://wordpress.org/plugins/php-code-widget/) - show blog categories menu on Internal Sidebar for Pages 'PR Blog', 'Blog', and 'All taxonomy pages'
* [Gravity Forms](http://www.gravityforms.com/) - general contact form and any form submission logic that is not MailChimp related

## WordPress Version
* At time of last update, this theme was built and tested with WordPress version 4.9

## Coding Styles
* You will find most of the theme's functionality broken up into directories (i.e., custom post types, shortcodes, templates, etc), loosely mimicking a MVC structure.
* CSS and method declarations will use a title_under_score naming convention
* Function method brackets will start on next line

## Base Theme History
This WordPress theme is forked from a bare-bones base theme created by Zach Smith called [tater](https://github.com/zachisit/tater-wordpress-theme), with base theme version number 1.1.3. This theme does not utlilize a parent-child theme structure. The perferred editor is PHPStorm, hence the existing .gitigore rule(s).