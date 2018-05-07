/**
 * File footer_newsletter_signup.js
 *
 * global footer newsletter signup
 *
 * @dependencies jquery,javascript
 * @version 1.0.1
 * @author Zach Smith
 *
 */
jQuery(document).ready(function($) {
    document.addEventListener('click',function(e){
        if (e.target.classList.contains('newsletter_signup_button')) {
            tb_show("Newsletter Signup", '#TB_inline?height=500&amp;width=400&amp;inlineId=footer_newsletter_signup_popup');
        }
    });
});