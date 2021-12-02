<?php
function script_load()
{
    $my_ver  = "20211115094500";
    wp_enqueue_script('jquery-validate', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.validate.min.js', array('jquery'));
    wp_enqueue_script('index', get_stylesheet_directory_uri() . '/assets/js/index.js', array('jquery'), $my_ver);

    wp_localize_script('index', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_localize_script('index', 'dataCommon', array('templateDirectoryUri' => get_template_directory_uri()));
}

add_action('wp_enqueue_scripts', 'script_load');

add_action('wp_head', 'my_custom_styles', 100);

function my_custom_styles()
{
    $color =  esc_attr(get_option( 'color_theme_pick', true));
    echo "<style>
            .site_right {
                background-color: " . $color . " !important;
            }  
            
            .menu {
                background-color: " . $color . " !important;
            }
        </style>";
}

function display_contact_social() {
    $socials =  get_option( 'contact_socials', true);

    $socials_generate = '';

    if(isset($socials['fb_active']) && $socials['fb_active'] = 'on') {
        $socials_generate .= '<li data-social="facebook"><i class="fab fa-fw fa-facebook-f social_item"></i></li>';
    }

    if(isset($socials['ins_active']) && $socials['ins_active'] = 'on') {
        $socials_generate .= '<li data-social="instagram"><i class="fab fa-instagram social_item"></i></li>';
    }

    if(isset($socials['mail_active']) && $socials['mail_active'] = 'on') {
        $socials_generate .= '<li data-social="mail"><i class="material-icons social_item">mail_outline</i></li>';
    }

    if(isset($socials['linkedin_active']) && $socials['linkedin_active'] = 'on') {
        $socials_generate .= '<li data-social="mail"><i class="fab fa-linkedin social_item"></i></li>';
    }

    return $socials_generate;
}
