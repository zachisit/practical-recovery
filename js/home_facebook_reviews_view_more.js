/**
 * File home_facebook_reviews_view_more.js
 *
 * returns list of FB Reviews data
 * allows user to view one at a time
 *
 * dependecies:
 * jquery
 *
 * version:
 * 1.0.0
 *
 */
jQuery(document).ready(function($) {
    var $facebookSingleReviewDiv = $('.wp-facebook-review:gt(2)'),
        $viewMoreButton = $("#view_more_facebook_reviews");

    //on page load hide items after third one
    $facebookSingleReviewDiv.hide();

    //show next item one by one
    $viewMoreButton.click(function(){
        $('.wp-facebook-reviews > .wp-facebook-review:hidden:first').show();

        //hide button if we are at end of list
        if ($('.wp-facebook-reviews > .wp-facebook-review:hidden').length < 1) {
            $viewMoreButton.hide();
        }
    });

});