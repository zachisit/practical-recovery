/**
 * File slick_slider_homepage.js
 *
 * all jquery related to the homepage sliders
 *
 * dependencies: slick slider
 *
 */

/**
 * Homepage Testimonial Slider
 */
jQuery(document).ready(function(){
    jQuery('#testimonials_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        dots: true,
        arrows: true,
        autoplaySpeed: 5800
    });

});
