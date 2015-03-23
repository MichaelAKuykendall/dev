<?php

function ajaxData()
{
	wp_enqueue_script( 'function', get_template_directory_uri().'/form-data.js', 'jquery', true);
    wp_localize_script( 'function', 'my_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );    

}
add_action('template_redirect', 'ajaxData');

require_once('form-data.php');

add_action("wp_ajax_nopriv_form_data", "form_data");
add_action("wp_ajax_form_data", "form_data");

?>