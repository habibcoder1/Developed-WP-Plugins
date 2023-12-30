<?php
/**
*  @package Login Page Customize
*
* Login Page Customize Option
**/

add_action('admin_menu', 'lpcustomize_admin_options');
function lpcustomize_admin_options(){
    global $lpc_dir_url;  //plugin dir url
    add_menu_page( 'Login Page Customize Option', 'Login Page', 'manage_options', 'loginp-customize-option', 'lpcustomize_admin_option_callback', $lpc_dir_url . 'img/lpcustomize-icon.png', 66 );
}

function lpcustomize_admin_option_callback(){ ?>

    <div class="lpcustomize-option">
        <div class="container">
            <div class="lpcustomize-form">
                <h2 class="lpcustomize-title"> <?php esc_html_e('Login Page Customize Option', 'login-page-customize'); ?> </h2>
                <!-- Tab -->
                <div id="lpcustomize-tab">
                    <!-- Tab Items -->
                    <div class="lpctab-items">
                        <ul>
                            <li><a href="#setting-form"><?php esc_html_e('Settings', 'login-page-customize'); ?></a></li>
                            <li><a href="#login-form"><?php esc_html_e('Login Form', 'login-page-customize'); ?> </a></li>
                            <li><a href="#register-form"><?php esc_html_e('Register Form', 'login-page-customize'); ?> </a></li>
                        </ul>
                    </div>
                    <!--/// Settings Form -->
                    <div id="setting-form">
                        <form action="options.php" method="POST">
                            <?php wp_nonce_field('update-options'); //wp security ?>
                            <!-- Primary Color -->
                            <label for="lpc-primarycolor"><?php esc_html_e('Login page primary color', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: #000000', 'login-page-customize'); ?></small>
                            <input type="color" name="lpc-primarycolor" id="lpc-primarycolor" value="<?php print esc_attr(get_option('lpc-primarycolor')); ?>">
                            <!-- Secondary Color -->
                            <label for="lpc-secondarycolor"><?php esc_html_e('Login page secondary color', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: #000000', 'login-page-customize'); ?></small>
                            <input type="color" name="lpc-secondarycolor" id="lpc-secondarycolor" value="<?php print esc_attr(get_option('lpc-secondarycolor')); ?>">
                            <!-- Background Image -->
                            <label for="lpc-bgimg"><?php esc_html_e('Login page Background Image', 'login-page-customize'); ?> </label>
                            <small><?php esc_html_e('Default: not set (recommended: full width image)', 'login-page-customize'); ?></small>
                            <div class="bgimg-section">
                                <div class="buttons">
                                    <input type="button" id="lpc-bgimg" value="<?php esc_html_e('Insert BG Image', 'login-page-customize'); ?>">
                                    <input type="button" id="remove-lpcbgimg" value="<?php esc_html_e('Remove BG Image', 'login-page-customize'); ?>">
                                </div>
                                <div class="image">
                                    <?php $lpcbgimg = get_option('lpc-bgimg'); ?>
                                    <div class="lpc-bgimage" style="background-image: url('<?php print esc_url($lpcbgimg); ?>')"></div>
                                </div>
                            </div>
                            <input type="hidden" id="lpcbgimg-input" name="lpc-bgimg" value="<?php print esc_attr($lpcbgimg); ?>">
                            <!-- Logo Image -->
                            <label for="lpc-logoimg" class="logo-img"><?php esc_html_e('Login page Logo', 'login-page-customize'); ?> </label>
                            <small><?php esc_html_e('Default: not set (recommended: 95x95)', 'login-page-customize'); ?></small>
                            <div class="logo-section">
                                <div class="buttons">
                                    <input type="button" id="lpc-logoimg" value="<?php esc_html_e('Insert Logo', 'login-page-customize'); ?>">
                                    <input type="button" id="remove-lpclogoimg" value="<?php esc_html_e('Remove Logo', 'login-page-customize'); ?>">
                                </div>
                                <div class="image">
                                    <?php $lpclogoimg = get_option('lpc-logoimg'); ?>
                                    <div class="lpc-logoimage" style="background-image: url('<?php print esc_url($lpclogoimg); ?>')"></div>
                                </div>
                            </div>
                            <input type="hidden" id="lpclogoimg-input" name="lpc-logoimg" value="<?php print esc_attr($lpclogoimg); ?>">
                            <!-- Dashboard Opacity -->
                            <label for="lpc-dashbopacity"><?php esc_html_e('Login Dashboard Opacity', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: 0.7', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="give here 0.1 to 0.9" name="lpc-dashbopacity" id="lpc-dashbopacity" value="<?php print esc_attr(get_option('lpc-dashbopacity')); ?>">
                            <!-- Logo URL Change -->
                            <label for="lpc-logourl"><?php esc_html_e('Login Dashboard Logo Link Redirect', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Website Link', 'login-page-customize'); ?></small>
                            <select name="lpc-logourl" id="lpc-logourl">
                                <option value="true" <?php if(get_option('lpc-logourl') == 'true'){echo esc_attr("selected='selected'");} ?>><?php esc_html_e('Website Link', 'login-page-customize'); ?></option>
                                <option value="false" <?php if(get_option('lpc-logourl') == 'false'){echo esc_attr("selected='selected'");} ?> ><?php esc_html_e('WordPress Link', 'login-page-customize'); ?></option>
                            </select>
                            <!-- Logo Link Open in New Tab -->
                            <label for="lpc-logolinkopen"><?php esc_html_e('Dashboard Logo Link open in new tab/same tab', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Same Tab', 'login-page-customize'); ?></small>
                            <select name="lpc-logolinkopen" id="lpc-logolinkopen">
                                <option value="false" <?php if(get_option('lpc-logolinkopen') == 'false'){echo esc_attr("selected='selected'");} ?>><?php esc_html_e('Same Tab', 'login-page-customize'); ?></option>
                                <option value="true" <?php if(get_option('lpc-logolinkopen') == 'true'){echo esc_attr("selected='selected'");} ?> ><?php esc_html_e('New Tab', 'login-page-customize'); ?></option>
                            </select>
                            <!-- Logo Dashobard Website Link Open in New Tab -->
                            <label for="lpc-gowebsitelink"><?php esc_html_e('Dashboard Go To Website Link open in new tab/same tab', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Same Tab', 'login-page-customize'); ?></small>
                            <select name="lpc-gowebsitelink" id="lpc-gowebsitelink">
                                <option value="false" <?php if(get_option('lpc-gowebsitelink') == 'false'){echo esc_attr( "selected='selected'");} ?>><?php esc_html_e('Same Tab', 'login-page-customize'); ?></option>
                                <option value="true" <?php if(get_option('lpc-gowebsitelink') == 'true'){echo esc_attr("selected='selected'");} ?> ><?php esc_html_e('New Tab', 'login-page-customize'); ?></option>
                            </select>
                            <!-- Privacy Policy Link Open in New Tab -->
                            <label for="lpc-privacylink"><?php esc_html_e('Dashboard Privacy Policy Link open in new tab/same tab', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Same Tab', 'login-page-customize'); ?></small>
                            <select name="lpc-privacylink" id="lpc-privacylink">
                                <option value="false" <?php if(get_option('lpc-privacylink') == 'false'){echo esc_attr("selected='selected'");} ?>><?php esc_html_e('Same Tab', 'login-page-customize'); ?></option>
                                <option value="true" <?php if(get_option('lpc-privacylink') == 'true'){echo esc_attr("selected='selected'");} ?> ><?php esc_html_e('New Tab', 'login-page-customize'); ?></option>
                            </select>

                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="page_options" value="lpc-primarycolor, lpc-secondarycolor, lpc-bgimg, lpc-logoimg, lpc-dashbopacity, lpc-logourl, lpc-logintext, lpc-logolinkopen, lpc-gowebsitelink, lpc-privacylink">
                            <input type="submit" value="<?php esc_html_e('Save Changes', 'login-page-customize'); ?>">
                        </form>
                    </div>
                    <!--/// Login Form -->
                    <div id="login-form">
                        <form action="options.php" method="POST">
                            <?php wp_nonce_field('update-options'); //wp security ?>
                            
                            <!-- Username or Email Address Text Change -->
                            <label for="lpc-useremailtext"><?php esc_html_e('Username or Email Address Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Username or Email Address', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Username or email address here" name="lpc-useremailtext" id="lpc-useremailtext" value="<?php print esc_attr(get_option('lpc-useremailtext')); ?>">
                            <!-- Password Text Change -->
                            <label for="lpc-passwordtext"><?php esc_html_e('Password Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Password', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Password here" name="lpc-passwordtext" id="lpc-passwordtext" value="<?php print esc_attr(get_option('lpc-passwordtext')); ?>">
                            <!-- Remember Text Change -->
                            <label for="lpc-remembertext"><?php esc_html_e('Remember Me Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Remember Me', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Remember me here" name="lpc-remembertext" id="lpc-remembertext" value="<?php print esc_attr(get_option('lpc-remembertext')); ?>">
                            <!-- Login Text Change -->
                            <label for="lpc-logintext"><?php esc_html_e('Login Button Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Log In', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Login button text here" name="lpc-logintext" id="lpc-logintext" value="<?php print esc_attr(get_option('lpc-logintext')); ?>">
                            <!-- Lost Password Text Change -->
                            <label for="lpc-lostpasstext"><?php esc_html_e('Lost Password Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Lost your password?', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Lost password text here" name="lpc-lostpasstext" id="lpc-lostpasstext" value="<?php print esc_attr(get_option('lpc-lostpasstext')); ?>">
                            <!-- Register Text Change -->
                            <label for="lpc-registertext"><?php esc_html_e('Register Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Register', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Register text here" name="lpc-registertext" id="lpc-registertext" value="<?php print esc_attr(get_option('lpc-registertext')); ?>">

                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="page_options" value="lpc-useremailtext, lpc-passwordtext, lpc-remembertext, lpc-logintext, lpc-lostpasstext, lpc-registertext">
                            <input type="submit" value="<?php esc_html_e('Save Changes', 'login-page-customize'); ?>">
                        </form>
                    </div>
                    <!--/// Register Form -->
                    <div id="register-form">
                        <form action="options.php" method="POST">
                            <?php wp_nonce_field('update-options'); //wp security ?>
                            
                            <!-- Register For This Site Text Change -->
                            <label for="lpc-registerforthissite"><?php esc_html_e('Register For This Site Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Register for this site', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Register For This Site text here" name="lpc-registerforthissite" id="lpc-registerforthissite" value="<?php print esc_attr(get_option('lpc-registerforthissite')); ?>">
                            <!-- Register Username Text Change -->
                            <label for="lpc-registeruser"><?php esc_html_e('Username Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Username', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Username text here" name="lpc-registeruser" id="lpc-registeruser" value="<?php print esc_attr(get_option('lpc-registeruser')); ?>">
                            <!-- Register Email Text Change -->
                            <label for="lpc-registeremail"><?php esc_html_e('Email Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Email', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Email text here" name="lpc-registeremail" id="lpc-registeremail" value="<?php print esc_attr(get_option('lpc-registeremail')); ?>">
                            <!-- Register confirmation will be emailed to you. Text Change -->
                            <label for="lpc-regiconfirm"><?php esc_html_e('Register Confirmation Email Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Registration confirmation will be emailed to you', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Register Confirmation Email text here" name="lpc-regiconfirm" id="lpc-regiconfirm" value="<?php print esc_attr(get_option('lpc-regiconfirm')); ?>">
                            <!-- Register Button Text Change -->
                            <label for="lpc-registerbtntext"><?php esc_html_e('Register Button Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Register', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Register Button text here" name="lpc-registerbtntext" id="lpc-registerbtntext" value="<?php print esc_attr(get_option('lpc-registerbtntext')); ?>">
                            <!-- Log In Text Change -->
                            <label for="lpc-reglogintext"><?php esc_html_e('Log in Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Log In', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Log In text here" name="lpc-reglogintext" id="lpc-reglogintext" value="<?php print esc_attr(get_option('lpc-reglogintext')); ?>">
                            <!-- Lost your password Text Change -->
                            <label for="lpc-regilostpass"><?php esc_html_e('Lost your password? Text change', 'login-page-customize'); ?></label>
                            <small><?php esc_html_e('Default: Lost your password?', 'login-page-customize'); ?></small>
                            <input type="text" placeholder="Lost your password text here" name="lpc-regilostpass" id="lpc-regilostpass" value="<?php print esc_attr(get_option('lpc-regilostpass')); ?>">

                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="page_options" value=" lpc-registerbtntext, lpc-registerforthissite, lpc-registeruser, lpc-registeremail, lpc-regiconfirm, lpc-reglogintext, lpc-regilostpass">
                            <input type="submit" value="<?php esc_html_e('Save Changes', 'login-page-customize'); ?>">
                        </form>
                    </div>
                </div> 
            </div>
            <!-- Author Details -->
            <?php global $lpc_dir_url;  //plugin dir url ?>
            <div class="lpcustomize-author">
                <h2 class="lpcustomize-title"> <?php esc_html_e('Author', 'login-page-customize'); ?> </h2>
                <div class="author-img">
                    <img src="<?php echo esc_url($lpc_dir_url . 'img/habibcoder.jpg'); ?>" alt="HabibCoder">
                </div>
                <h4 class="author-name"> <?php esc_html_e('HabibCoder', 'login-page-customize'); ?> </h4>
                <div class="author-description">
                    <p><?php esc_html_e('I\'m ', 'login-page-customize'); ?><a href="<?php echo esc_url('http://habibcoder.com'); ?>" target="_blank"><?php esc_html_e('Habibur Rahman', 'login-page-customize') ?></a> <?php esc_html_e('and a Professional Web Developer and Web Designer. For the last some years, I\'m working in this field with national and international clients. I have done many more projects with client satisfaction.', 'login-page-customize'); ?><br>
                    <?php esc_html_e('This is an open-source WordPress Plugin. If you want to support me, You can', 'login-page-customize'); ?> <b><?php esc_html_e('click on the Buy Me a Coffe Button', 'login-page-customize'); ?></b>. <br> <?php esc_html_e('Thank You !.', 'login-page-customize'); ?> </p>
                </div>
                <div class="donate-btn">
                    <a href="<?php echo esc_url('https://www.buymeacoffee.com/habibcoder'); ?>" target="_blank">
                    <h4><span>🍦</span><?php esc_html_e('Buy Me A Coffee', 'login-page-customize'); ?></h4>
                    </a>
                </div>
                <h3 class="rcdfors-social-title"> 
                    <?php esc_html_e('Follow Me', 'login-page-customize'); ?>
                </h3>
                <div class="social-icons">
                    <a class="facebook" title="Facebook" href="<?php echo esc_url('http://facebook.com/habibcoder1'); ?>" target="_blank"><img src="<?php echo esc_url( $lpc_dir_url . 'img/facebook.png'); ?>" alt="facebook"></a>
                    <a class="linkedin" title="LinkedIn" href="<?php echo esc_url('http://linkedin.com/in/habibcoder'); ?>" target="_blank"><img src="<?php echo esc_url($lpc_dir_url . 'img/linkedin.png'); ?>" alt="LinkedIn"></a>
                    <a class="instagram" title="Instagram" href="<?php echo esc_url('http://instagram.com/habibcoder'); ?>" target="_blank"><img src="<?php echo esc_url($lpc_dir_url . 'img/instagram.png'); ?>" alt="instagram"></a>
                    <a class="website" title="Website" href="<?php echo esc_url('http://habibcoder.com'); ?>" target="_blank"><img src="<?php echo esc_url($lpc_dir_url . 'img/website.png'); ?>" alt="HabibCoder"></a>
                </div>
                <div class="thank-you">
                    <span>♥</span>
                    <h5><?php esc_html_e('Thank You', 'login-page-customize'); ?></h5>
                    <span>♥</span>
                </div>
            </div>
        </div>
    </div>

<?php
}