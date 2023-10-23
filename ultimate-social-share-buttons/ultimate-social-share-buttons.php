<?php 
/* ===================================
Plugin Name:       Ultimate Social Share Buttons
Plugin URI:	       http://habibcoder.com/socialshare
Author:            HabibCoder
Author URI:        http://habibcoder.com
Version:           1.0.0
Tested up to:      6.3
Requires at least: 6.0
Require PHP: 7.0
License: General Public License v-2.0 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: ultimate social share buttons, social sharing button, social share button, social share, social media share button, social media, social link share, social media share, share button, habibcoder, habib coder 
Description: The Ultimate Social Share Buttons is a most useful Social Media Share Plugin in your blog page and single page. It is unique social share button plugin. Social Sharing Button has more functionality.
Text Domain: ultimate-social-share-buttons
=================================== */

// ABSPATH Defined
if(! defined('ABSPATH')){
    exit('not valid');
}

/* ==========================
	Register Text Domain
========================== */
add_action('plugins_loaded', 'ussbuttons_load_textdomain');
function ussbuttons_load_textdomain(){
    load_plugin_textdomain('ultimate-social-share-buttons', false, dirname(plugin_basename( __FILE__ ) ) . '/languages');
}

/* ==================================================
	Get Plugin Directory & URL and Define Constant
================================================== */
//Get plugin Dir & Url
$ssbutton_dir = plugin_dir_path( __FILE__ ); 
$ssbutton_url = plugin_dir_url( __FILE__ );

//Define Dir & Url as a Constants
define( 'USSBUTTONS_PLUGIN_DIR', $ssbutton_dir );
define( 'USSBUTTONS_PLUGIN_URL', $ssbutton_url );
define( 'USSBUTTONS_TEXT_DOMAIN', 'ultimate-social-share-buttons');

/* ==========================
	Requires File
========================== */
// Dashboard Require
$ssbutton_admin_dir = USSBUTTONS_PLUGIN_DIR .'includes/ssbutton-admin.php';
if(file_exists( $ssbutton_admin_dir )){
	require_once( $ssbutton_admin_dir );
}
// Frontend
$ssbutton_frontend_dir = USSBUTTONS_PLUGIN_DIR .'views/ssbutton-view.php';
if(file_exists( $ssbutton_frontend_dir )){
	require_once( $ssbutton_frontend_dir );
}

/* ============================
	Enqueue in Admin Panel
============================ */
add_action('admin_enqueue_scripts', 'ussbuttons_admin_enqueues');
function ussbuttons_admin_enqueues(){
    // Scripts
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('ultimate-social-share-buttons-scripts', PLUGINS_URL('js/ssb-admin.js', __FILE__), ['jquery'], '1.0.0', true);
    // Style
	wp_enqueue_style('ultimate-social-share-buttons-style', PLUGINS_URL('css/ssb-admin.css', __FILE__), [], '1.0.0', 'all');
}


/* ============================
	Enqueue in Frontend
============================ */
add_action('wp_enqueue_scripts', 'ussbuttons_frontend_enqueues');
function ussbuttons_frontend_enqueues(){
    wp_enqueue_style('ultimate-social-share-buttons-style', PLUGINS_URL('css/ssb-view.css', __FILE__), [], '1.0.0', 'all');
}


/* ==========================
	Redirect to plugin
========================== */
register_activation_hook( __FILE__, 'ussbuttons_plugin_activation' );
function ussbuttons_plugin_activation(){
    add_option('ussbuttons_plugin_do_activate', true);
}

add_action('admin_init', 'ussbuttons_plugin_redirect');
function ussbuttons_plugin_redirect(){
    if (is_admin() && get_option('ussbuttons_plugin_do_activate', false)) {
        delete_option('ussbuttons_plugin_do_activate');

        if (!isset($_GET['active_multi'])) {
            wp_safe_redirect( admin_url('admin.php?page=ultimate-social-share-buttons') );
            exit;
        }

    }
};