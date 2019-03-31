<?php
/*
Plugin Name: WP Users (Country & Currency)
Plugin URI: http://gomin.in.th/
Description: Easily add WP Users's Country & Currency fields.
Version: 2017.07.27
Author: Watthajak Jinasam (Gomin)
Author URI: http://gomin.in.th/
*/

function wp_ctcr($user) {	
	include ('assets/inc/content.php');
}
add_action('show_user_profile', 'wp_ctcr');
add_action('edit_user_profile', 'wp_ctcr');

function wp_ctcr_save($user_id) {
    if (!current_user_can('edit_user', $user_id)) { 
        return false; 
    }
    update_user_meta($user_id, 'country', $_POST['country']);
    update_user_meta($user_id, 'currency', $_POST['currency']);
}
add_action('personal_options_update', 'wp_ctcr_save' );
add_action('edit_user_profile_update', 'wp_ctcr_save' );

function country($user) {
	$user_country = get_the_author_meta('country', $user->ID);
	$country = '01 --Please select your country--';
	$attr = ' disabled selected';
	if ($user_country) {
		$country = $user_country;
		$attr = ' value="'.$country.'"'.$attr;
	}
	_e('<option'.$attr.'>'.$country.'</option>');	
	$content = file_get_contents('http://country.io/names.json');
	//$content = file_get_contents(plugin_dir_url( __FILE__ ).'/assets/data/country.json');
	$json = json_decode($content, true);
	foreach($json as $val){
		_e('<option value="'.$val.'">'.$val.'</option>');
	}
}
function currency($user) {
	_e(get_the_author_meta('currency', $user->ID));	
}
?>