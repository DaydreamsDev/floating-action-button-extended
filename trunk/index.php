<?php 
/*
Plugin Name: Floating Action Button
Plugin URI: http://okapitech.in/wordpress-plugin-floating-action-button
Description: Display the beautiful FAB (Floating Action Button) on your WordPress front-end.
Version: 1.2.2
Author: Faraz Quazi
Author URI: https://profiles.wordpress.org/farazify
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: floating-action-button
*/

define('FZ_FAB_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FZ_FAB_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('FZ_FAB_DEFAULT_IMG', FZ_FAB_PLUGIN_URL.'assets/img/default.png');
define('FZ_FAB_COLOR', '#FFFFFF');
define('FZ_FAB_BG_COLOR', '#1E73BE');

register_activation_hook(__FILE__, function(){
	/* Silence is Golden */
});

register_deactivation_hook(__FILE__, function(){
	/* Silence is Golden */
});

add_action('init', function(){
   	ob_start();
});

add_action('wp_enqueue_scripts', function(){
	$activate = get_option('fz_fab_activate', '0');
	if($activate == '1'){
		$type = get_option('fz_fab_type', '1');
		if($type == '1'){
			$url = FZ_FAB_PLUGIN_URL.'assets/home-conditional-script.js';
			wp_register_script('fz-fab-home-conditional-script', $url, array('jquery'));
			wp_enqueue_script('fz-fab-home-conditional-script');
		}elseif($type == '2'){
			$url = FZ_FAB_PLUGIN_URL.'assets/home-conditional-style.css';
			wp_register_style('fz-fab-home-conditional-style', $url);
			wp_enqueue_style('fz-fab-home-conditional-style');
		}

		$url = FZ_FAB_PLUGIN_URL.'assets/home-script.js';
		wp_register_script('fz-fab-home-script', $url, array('jquery'));
		wp_enqueue_script('fz-fab-home-script');

		load_template(FZ_FAB_PLUGIN_PATH.'views/fab-button.php');
	}
}); 

add_action('admin_enqueue_scripts', function(){
	wp_enqueue_media();

    wp_enqueue_style('wp-color-picker');

	$url = FZ_FAB_PLUGIN_URL.'assets/admin-style.css';
	wp_register_style('fz-admin-style', $url);
	wp_enqueue_style('fz-admin-style');

	$url = FZ_FAB_PLUGIN_URL.'assets/admin-script.js';
	wp_register_script('fz-admin-script', $url, array('jquery', 'wp-color-picker'));
	wp_enqueue_script('fz-admin-script');
}); 

add_action('admin_menu', function(){
	add_menu_page(
		'FAB Settings',
		'FAB Settings',
		'manage_options',
		'fab-button-frontend-settings',
		'fz_fab_button_frontend_settings',
		'dashicons-screenoptions',
		75
	);
});

function fz_fab_button_frontend_settings(){
	load_template(FZ_FAB_PLUGIN_PATH.'views/settings.php');
}

add_action('wp_ajax_fz_fab_settings_save', function(){
	if(!current_user_can('manage_options')){
		echo FALSE;
		exit();
	}
	if(!isset($_REQUEST['_wpnonce']) || !wp_verify_nonce($_REQUEST['_wpnonce'], 'fz_fab_settings_save')){
	    echo FALSE;
	    exit();
	}
    update_option('fz_fab_activate', sanitize_text_field($_POST['activate']), TRUE);
    update_option('fz_fab_position', sanitize_text_field($_POST['position']), TRUE);
    update_option('fz_fab_type', sanitize_text_field($_POST['type']), TRUE);
    update_option('fz_fab_main_img_id', sanitize_text_field($_POST['m_img_id']), TRUE);
    update_option('fz_fab_main_color', sanitize_hex_color($_POST['m_color']), TRUE);
    update_option('fz_fab_main_bg_color', sanitize_hex_color($_POST['m_bg_color']), TRUE);

    $sub_settings = array();
    if(isset($_POST['sub_settings']) && is_array($_POST['sub_settings']) && count($_POST['sub_settings']) > 0){
    	$sub_settings = fz_fab_sanitize_array($_POST['sub_settings']);
    }
    update_option('fz_fab_sub_btns', json_encode($sub_settings), TRUE);

	echo TRUE;
	exit();
}, 10);

function fz_fab_sanitize_array($input){
	$new_input = array();
	foreach($input as $key => $value){
		$new_input[$key] = sanitize_text_field($value);
	}
	return $new_input;
}

function fz_fab_parse_content($str=''){
	$str = str_replace('\"', '"', $str);
	$str = str_replace("\`", "`", $str);
	return $str;
}

/* End of Plugin File */
?>