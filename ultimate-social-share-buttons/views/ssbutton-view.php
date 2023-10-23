<?php  
// Social Sharing Button Frontend PHP //

// ABSPATH Defined
if(! defined('ABSPATH')){
    exit('not valid');
};


/* ======================================
    social share menu after content 
====================================== */
if(get_option('icon-inexcerpt') == 'yes'){
    add_filter('the_excerpt', 'ussbuttons_social_share_icons'); //the_excerpt content
}
add_filter('the_content', 'ussbuttons_social_share_icons'); //the_content post content
function ussbuttons_social_share_icons($ssb_content){

    $is_homepage = (get_option('icon-bpagey') == 'yes') && is_home();
    // Check if it's a single post or page
    if (is_single() || $is_homepage) {

        $url     = urlencode(get_the_permalink());               //Get current page URL 
        $title   = str_replace( ' ', '%20', get_the_title());    //page title  
        $subject = urlencode('Check out this blog post');       //email subject
        $body    = urlencode('Hi, I wanted to share this blog post with you: '. $url); // Set the email body
        $fbuser  = get_option('ssb-fbuser');  //facebook user for messenger

        $ssb_icons = array(
            // social links
            'Facebook' => array(
                'url'  => 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&title='.$title.' ',
                'icon' => 'ssb-facebook.png', // Replace with your Facebook icon filename
            ),
            'Twitter' => array(
                'url'  => 'https://twitter.com/intent/tweet?url='.$url.'&text='.$title.' ',
                'icon' => 'ssb-twitter.png',
            ),
            'LinkedIn' => array(
                'url'  => 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&title='.$title.'',
                'icon' => 'ssb-linkedin.png',
            ),
            'Instagram' => array(
                'url'  => 'https://www.instagram.com/intent/share?url='.$url.'',
                'icon' => 'ssb-instagram.png',
            ),
            'WhatsApp' => array(
                'url'  => 'https://api.whatsapp.com/send?text='.$url.'',
                'icon' => 'ssb-whatsapp.png',
            ),
            'Messenger' => array(
                'url'  => 'http://m.me/'.$fbuser.'',
                'icon' => 'ssb-messenger.png',
            ),
            'Medium' => array(
                'url'  => 'https://medium.com/share?url='.$url.'',
                'icon' => 'ssb-medium.png',
            ),
            'Reddit' => array(
                'url'  => 'https://www.reddit.com/submit?url='.$url.'',
                'icon' => 'ssb-reddit.png',
            ),
            'Email' => array(
                'url'  => 'mailto:?subject='.$subject.'&body='.$body.'',
                'icon' => 'ssb-email.png',
            ),
            'Viber' => array(
                'url'  => 'viber://forward?text='.$url.'',
                'icon' => 'ssb-viber.png',
            ),
            'Skype' => array(
                'url'  => 'skype:?chat&topic=Blog%20Post&message='.urlencode($subject).'',
                'icon' => 'ssb-skype.png',
            ),
            'Telegram' => array(
                'url'  => 'https://t.me/share/url?url='.$url.'&text='.$title.'',
                'icon' => 'ssb-telegram.png',
            ),
            // Add more social media platforms here
            
        ); //end array variable

        // social icons show
        $ssb_output = '<div class="ssb_social-icons"> <ul class="social-menu">';
                foreach ($ssb_icons as $ssb_platform => $ssb_data) {
                    $option_key = 'ssb-' . strtolower($ssb_platform);
                    if (get_option($option_key)) {
                        $ssb_output .= '<li> <a href="' . esc_url($ssb_data['url']) . '" target="_blank"><img src="' . esc_url(USSBUTTONS_PLUGIN_URL . 'images/' . $ssb_data['icon']) . '" alt="' . $ssb_platform . '" title="Share in '. $ssb_platform .'"></a> </li>';
                    }
                }
        $ssb_output .= '</ul> </div>';

        // icons position
        $icon_position = get_option('icon-before');

        if($icon_position == 'after'){
            $ssb_content .= $ssb_output;
        }elseif($icon_position == 'before'){
            $ssb_content = $ssb_output . $ssb_content;
        };
        
        
    };  // end if

    return $ssb_content;  //return $content
};

/* ======================================
    social share menu items style
====================================== */
if(get_option('icon-style') == 'yes'){

add_action('wp_head', 'ussbuttons_styleadd_dynamically');
function ussbuttons_styleadd_dynamically(){ ?> 
<!-- Social Sharing Button Style -->
<style>
<?php if(get_option('ssbbg-color')) : ?>
    .ssb_social-icons ul li a img{
        background-color: <?php echo esc_attr(get_option('ssbbg-color')); ?>;
    }
<?php endif; ?>
<?php if(get_option('ssbbg-color')) : ?>
    .ssb_social-icons ul li a img:hover{
        background-color: <?php echo esc_attr(get_option('ssbhover-color')); ?>;
    }
<?php endif; ?>
<?php if(get_option('ssbicon-roundcorner') == 'round') : ?>
    .ssb_social-icons ul li a img{
        border-radius: 50%;
    }
<?php else: ?>
    .ssb_social-icons ul li a img{
        border-radius: 5px;
    }
<?php endif; ?>
</style>
<?php
} //end function

} //end if condition