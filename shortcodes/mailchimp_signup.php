<?php
/**
 * MailChimp Signup Trigger
 *
 * @package practical-recovery
 */


function pr_mailchimp_signup() {
    $string = populate_template_file('/shortcode/mailchimp_signup',
        [
            //nothing
        ]
    );

    return $string;
}

add_shortcode( 'mailchimp_signup', 'pr_mailchimp_signup' );