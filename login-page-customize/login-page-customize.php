<?php 
/* ==================================================
Plugin Name:      Login Page Customize
Plugin URI:       https://plugin.habibcoder.com/login-page-customize/
Author:           HabibCoder
Author URI:       http://habibcoder.com
Version:          1.0.0
Require At Least: 6.0
Require PHP:      7.0
Tested Up To:     6.4
License:          GNU General Public License v2 or later
License URI:      http://www.gnu.org/licenses/gpl-2.0.html
Tags: Login Page Customize, Customize Login Page, Login Page Customizer, WP Login Page, Custom Login, Custom Login Page, habibcoder, login page customize, custom login, customizer login page, login page customizer
Description: Login Page Customize is a Popular WordPress login page customize plugin. It is a simple and easy WordPress Plugin to customize a Login Page. You can customize all things of WP Login Page
Text Domain:      login-page-customize
================================================== */

// ABSPATH Defined
if( ! defined('ABSPATH')){
    exit;
}

/* =================================
     Text Domain 
================================== */
add_action('plugins_loaded', 'lpcustomize_load_textdomain');
function lpcustomize_load_textdomain(){
    load_plugin_textdomain('login-page-customize', false, dirname(plugin_basename( __FILE__ ) ) . '/lang');
}


/* =================================
  Get Plugin Directory & URL
================================== */
$lpc_dir = plugin_dir_path( __FILE__ );

$lpc_dir_url = plugin_dir_url( __FILE__ );


/* =================================
     Require Files
================================== */
// Plugin Dashboard
$lpc_admin_dir = $lpc_dir . 'admin/lpcustomize_admin_option.php';
if(file_exists($lpc_admin_dir)){
    require_once( $lpc_admin_dir );
}

// Login Page
$lpc_login_dir = $lpc_dir . 'login/lpcustomize-login.php';
if(file_exists( $lpc_login_dir )){
    require_once( $lpc_login_dir );
}


/* =================================
    Admin File Enqueue
================================== */
add_action('admin_enqueue_scripts', 'lpcustomize_admin_styles');
function lpcustomize_admin_styles(){
    //JQuery ui tabs
    wp_enqueue_script('jquery-ui-tabs');
    //for wp media
	wp_enqueue_media();
    //Style
    wp_enqueue_style( 'lpcustomize-style', PLUGINS_URL('css/lpcustomize-admin.css' ,  __FILE__), array(), '1.0.0', 'all' );
    //Scripts
    wp_enqueue_script('lpcustomize-scripts', PLUGINS_URL('js/lpcustomize.js', __FILE__), array('jquery'), '1.0.0', true);
}

/* =================================
    Login Page Enqueue 
================================== */
add_action('login_enqueue_scripts', 'lpcustomize_login_stylesheet');
function lpcustomize_login_stylesheet(){
    wp_enqueue_style('lpcustomize-login', PLUGINS_URL('css/lpcustomize-login.css', __FILE__), array(), '1.0.0', 'all');
};

//Script for logo link
if(get_option('lpc-logolinkopen') == 'true'){
    add_action('login_enqueue_scripts', 'lpcustomize_logolink_js');
    function lpcustomize_logolink_js(){
        wp_enqueue_script('lpc-logolink', PLUGINS_URL('js/lpc-logolink.js', __FILE__), array('jquery'), '1.0.0', true);
    }
};

//Script for Go To Website Link
if(get_option('lpc-gowebsitelink') == 'true'){
    add_action('login_enqueue_scripts', 'lpcustomize_gotowebsite_js');
    function lpcustomize_gotowebsite_js(){
        wp_enqueue_script('lpc-gotowebsite', PLUGINS_URL('js/lpc-gotowebsite.js', __FILE__), array('jquery'), '1.0.0', true);
    }
};

//Script for Privacy Policy Link
if(get_option('lpc-privacylink') == 'true'){
    add_action('login_enqueue_scripts', 'lpcustomize_privacy_js');
    function lpcustomize_privacy_js(){
        wp_enqueue_script('lpc-privacypolicy', PLUGINS_URL('js/lpc-privacy.js', __FILE__), array('jquery'), '1.0.0', true);
    }
};


/* =================================
    Redirect Login Page Plugin
================================== */
register_activation_hook( __FILE__, 'lpcustomize_plugin_activation' );
function lpcustomize_plugin_activation(){
    add_option('lpcustomize_plugin_do_activate', true);
}

add_action('admin_init', 'lpcustomize_plugin_redirect');
function lpcustomize_plugin_redirect(){
    if (is_admin() && get_option('lpcustomize_plugin_do_activate', false)) {
        delete_option('lpcustomize_plugin_do_activate');

        if (!isset($_GET['active_multi'])) {
            wp_safe_redirect( admin_url('admin.php?page=loginp-customize-option') );
            exit;
        }

    }
};

