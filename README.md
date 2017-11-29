# Practical Recovery Wordpress Theme

## Table of Contents
- [Author](#author)
- [Dependencies](#dependencies)
- [Theme Custom Post Types](#theme-custom-post-types)
- [Theme Shortcodes](#theme-shortcodes)
- [Theme Fonts](#theme-fonts)
- [Image Preloading](#image-preloading)
- [WordPress Version](#wordpress-version)
- [Coding Styles](#coding-styles)
- [Base Theme History](#base-theme-history)

## Author
* Zachary Smith

## Dependencies
* SASS - theme uses SASS compiler for all stylesheets used in theme. Normal .css files will be found in the theme so user can put normal css declarations without editing the sass file if needed.
* In-house templating engine, found in functions.php
 * [Lightbox2](http://lokeshdhakar.com/projects/lightbox2/) for lightbox modals on frontend

## Theme Custom Post Types
* @TODO

## Theme Shortcodes
* @TODO

## Theme Fonts
* To save server space and user load time, we use Google Fonts. The following are the client approved fonts this theme relies on. Fallback font will be sans-serif.
* Google Fonts '[FONT-NAME]' for [FONT-USES-ON-SITE] - https://fonts.google.com/specimen/[FULL-FONT-URL]

## Image Preloading
* Theme utilizing preloading of any files placed inside the theme/images/preload directory. Refer to file documentation on safe-use.

## WordPress Version
* At time of last update, this theme was built and tested with WordPress version 4.9

## Coding Styles
* You will find most of the theme's functionality broken up into directories (i.e., custom post types, shortcodes, templates, etc), loosely mimicking a MVC structure.
* CSS and method declarations will use a title_under_score naming convention
* Function method brackets will start on next line

## Base Theme History
This WordPress theme is forked from a bare-bones base theme created by Zach Smith called [tater](https://github.com/zachisit/tater-wordpress-theme), with base theme version number 1.1.3. This theme does not utlilize a parent-child theme structure. The perferred editor is PHPStorm, hence the existing .gitigore rule(s).