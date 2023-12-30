<?php  
/**
 * @package Login Page Customize
 * 
 * Login Page Customize Login All Dynammic
 */

/* =================================
    Login Page Customize Dynamic
================================== */
add_action('login_enqueue_scripts', 'lpcustomize_login_all_dynamically');
function lpcustomize_login_all_dynamically(){ ?>
<!-- Login Page Customize Plugin Dynamic Style -->
    <style>
		:root{
		    --LpcPrimaryColor: <?php print get_option('lpc-primarycolor'); ?> !important;
		}
		:root{
			--LpcSecondaryColor: <?php print get_option('lpc-secondarycolor'); ?> !important;
		}
        body.login{
            background: url('<?php print esc_url(get_option('lpc-bgimg')); ?>');
        }
		body.login #login h1 a{
			background-image: url('<?php print esc_url(get_option('lpc-logoimg')); ?>');
		}
		body.login #login{
			background: rgba(255, 255, 255, <?php print get_option('lpc-dashbopacity'); ?>) !important;
		}
	</style>

<?php 
}

/* =================================
 login header image url change
================================= */
if(get_option('lpc-logourl') == 'true'){

	add_filter('login_headerurl', 'lpclogin_headerurl_change');
	function lpclogin_headerurl_change(){
		return home_url();
	};

};


/* =================================
 Username or Email Text Change
================================= */
$lpcuseremail = get_option('lpc-useremailtext');
if(!empty($lpcuseremail)){

	add_action('login_head', 'lpcustomize_user_emailtext_change');
	function lpcustomize_user_emailtext_change(){
		add_filter('gettext', 'lpcustomize_useremail_text', 10, 2);
	}

	function lpcustomize_useremail_text($lpcuseremailreturn, $lpcusertextchange){
		if('Username or Email Address' == $lpcusertextchange){
			global $lpcuseremail;

			return $lpcuseremail;
		}
		return $lpcuseremailreturn;
	};

};


/* =================================
 Password Text Change
================================= */
$lpcpassword = get_option('lpc-passwordtext');
if(!empty($lpcpassword)){

	add_action('login_head', 'lpcustomize_password_text_change');
	function lpcustomize_password_text_change(){
		add_filter('gettext', 'lpcustomize_password_text', 10, 2);
	}

	function lpcustomize_password_text($lpcpasswordreturn, $lpcpasstextchange){
		if('Password' == $lpcpasstextchange){
			global $lpcpassword;

			return $lpcpassword;
		}
		return $lpcpasswordreturn;
	};

};



/* =================================
 Remember Me Text Change
================================= */
$lpcremember = get_option('lpc-remembertext');
if(!empty($lpcremember)){

	add_action('login_form', 'lpcustomize_remember_text_change');
	function lpcustomize_remember_text_change(){
		add_filter('gettext', 'lpcustomize_remember_text', 10, 2);
	}

	function lpcustomize_remember_text($lpcrememberreturn, $lpcremembertextchange){
		if('Remember Me' == $lpcremembertextchange){
			global $lpcremember;

			return $lpcremember;
		}
		return $lpcrememberreturn;
	};

}


/* =================================
 Login Text Change
================================= */
$lpclogtextchange = get_option('lpc-logintext');
if(!empty($lpclogtextchange)){

	add_action('login_form', 'lpcustomize_login_text_change');
	function lpcustomize_login_text_change(){
		add_filter('gettext', 'lpcustomize_logintext', 10, 2);
	}

	function lpcustomize_logintext($lpclogreturn, $lpclogintext){
		if('Log In' == $lpclogintext){
			global $lpclogtextchange;

			return $lpclogtextchange;
		}
		return $lpclogreturn;
	}

};


/* =================================
 Lost Your Password Text Change
================================= */
$lpclostpassword = get_option('lpc-lostpasstext');
if(!empty($lpclostpassword)){

	add_action('login_form', 'lpcustomize_lostpassword_text_change');
	function lpcustomize_lostpassword_text_change(){
		add_filter('gettext', 'lpcustomize_lostpasstext', 10, 2);
	}

	function lpcustomize_lostpasstext($lpclostpasreturn, $lpclostpasswordtext){
		if('Lost your password?' == $lpclostpasswordtext){
			global $lpclostpassword;

			return $lpclostpassword;
		}
		return $lpclostpasreturn;
	}

};

/* =================================
 Register Text Change
================================= */
$lpcregister = get_option('lpc-registertext');
if(!empty($lpcregister)){

	add_action('login_form', 'lpcustomize_register_text_change');
	function lpcustomize_register_text_change(){
		add_filter('gettext', 'lpcustomize_registertext', 10, 2);
	}

	function lpcustomize_registertext($lpcregisterreturn, $lpcregistertext){
		if('Register' == $lpcregistertext){
			global $lpcregister;

			return $lpcregister;
		}
		return $lpcregisterreturn;
	}

};


/* =================================
 Register For This Site Text Change
================================= */
$lpcregisterforthissite = get_option('lpc-registerforthissite');
if(!empty($lpcregisterforthissite)){

	add_filter( 'gettext', 'lpc_register_forsite', 20, 3 );
	function lpc_register_forsite( $lpc_translated_regisite, $lpcregisite) {
		if ( $lpcregisite == 'Register For This Site' ) {
			global $lpcregisterforthissite;

			$lpc_translated_regisite = esc_html( $lpcregisterforthissite, 'login-page-customize' );
		}
		return $lpc_translated_regisite;
	}

};

/* =================================
 Register Username Text Change
================================= */
$lpcregisteruser = get_option('lpc-registeruser');
if(!empty($lpcregisteruser)){

	add_filter( 'gettext', 'lpc_register_user', 20, 3 );
	function lpc_register_user( $lpc_translated_user, $lpcuser) {
		if ( $lpcuser == 'Username' ) {
			global $lpcregisteruser;

			$lpc_translated_user = esc_html( $lpcregisteruser, 'login-page-customize' );
		}
		return $lpc_translated_user;
	}

};

/* =================================
 Register Email Text Change
================================= */
$lpcregisteremail = get_option('lpc-registeremail');
if(!empty($lpcregisteremail)){

	add_filter( 'gettext', 'lpc_register_email', 20, 3 );
	function lpc_register_email( $lpc_translated_email, $lpcemail){
		if ( $lpcemail == 'Email' ) {
			global $lpcregisteremail;

			$lpc_translated_email = esc_html( $lpcregisteremail, 'login-page-customize' );
		}
		return $lpc_translated_email;
	}

};

/* ==========================================
 Register Confirmation Email Text Change
========================================== */
$lpcregiconmemail = get_option('lpc-regiconfirm');
if(!empty($lpcregiconmemail)){

	add_action('register_form', 'lpcustomize_regiconemail_text_change');
	function lpcustomize_regiconemail_text_change(){
		add_filter('gettext', 'lpcustomize_regiconemail_text', 10, 2);
	}

	function lpcustomize_regiconemail_text($lpcregconemailreturn, $lpcregiconemailtext){
		if('Registration confirmation will be emailed to you.' == $lpcregiconemailtext){
			global $lpcregiconmemail;

			return $lpcregiconmemail;
		}
		return $lpcregconemailreturn;
	}

};


/* =================================
 Register Button Text Change
================================= */
$lpcregisterbtn = get_option('lpc-registerbtntext');
if(!empty($lpcregisterbtn)){

	add_action('register_form', 'lpcustomize_registerbtn_text_change');
	function lpcustomize_registerbtn_text_change(){
		add_filter('gettext', 'lpcustomize_registerbtn_text', 10, 2);
	}

	function lpcustomize_registerbtn_text($lpcregisterbtnreturn, $lpcregisterbtntext){
		if('Register' == $lpcregisterbtntext){
			global $lpcregisterbtn;

			return $lpcregisterbtn;
		}
		return $lpcregisterbtnreturn;
	}

};


/* =================================
 Login Text Change
================================= */
$lpcregilogin = get_option('lpc-reglogintext');
if(!empty($lpcregilogin)){

	add_action('register_form', 'lpcustomize_regilogin_text_change');
	function lpcustomize_regilogin_text_change(){
		add_filter('gettext', 'lpcustomize_regilogin_text', 10, 2);
	}

	function lpcustomize_regilogin_text($lpcregiloginreturn, $lpcregilogintext){
		if('Log in' == $lpcregilogintext){
			global $lpcregilogin;

			return $lpcregilogin;
		}
		return $lpcregiloginreturn;
	}

};

/* ==========================================
 Register Lost your password Text Change
========================================== */
$lpcregilostpass = get_option('lpc-regilostpass');
if(!empty($lpcregilostpass)){

	add_action('register_form', 'lpcustomize_regilostpass_text_change');
	function lpcustomize_regilostpass_text_change(){
		add_filter('gettext', 'lpcustomize_regilostpass_text', 10, 2);
	}

	function lpcustomize_regilostpass_text($lpcregilostpassreturn, $lpcregilostpasstext){
		if('Lost your password?' == $lpcregilostpasstext){
			global $lpcregilostpass;

			return $lpcregilostpass;
		}
		return $lpcregilostpassreturn;
	}

};

