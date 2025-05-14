<?php
add_action('admin_post_portfolio_contact_form_submit', 'portfolio_handle_contact_form_submit');
add_action('admin_post_nopriv_portfolio_contact_form_submit', 'portfolio_handle_contact_form_submit');

require_once(__DIR__ . '/../forms/ContactForm.php');

function portfolio_handle_contact_form_submit()
{
(new \portfolio\forms\ContactForm())
->rule('lastname', 'required')
->rule('email', 'required')
->rule('email', 'valid_email')
->rule('phone', 'required')
->rule('subject', 'required')
->rule('message', 'required')
->sanitize('lastname', 'sanitize_text_field')
->sanitize('email', 'sanitize_text_field')
->sanitize('phone', 'sanitize_text_field')
->sanitize('subject', 'sanitize_text_field')
->sanitize('message', 'sanitize_textarea_field')
->handle($_POST);

}