/**
 * File fixed_header.js
 *
 * fixes header to screen when user scrolls
 *
 * dependecies:
 * jquery
 *
 * version:
 * 1.0.0
 *
 */
jQuery(document).ready(function($) {
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 600) {
            $('header').addClass('fixed-header');
        }
        else {
            $('header').removeClass('fixed-header');
        }
    });
});