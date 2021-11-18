<?php
function script_load()
{
    $my_ver  = "20211115094500";
    wp_enqueue_script('jquery-validate', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.validate.min.js', array('jquery'));
    wp_enqueue_script('index', get_stylesheet_directory_uri() . '/assets/js/index.js', array('jquery'), $my_ver, true);

    wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/js/fontawesome.js', array('jquery'), $my_ver);

    wp_localize_script('index', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_localize_script('index', 'dataCommon', array('templateDirectoryUri' => get_template_directory_uri()));
}

add_action('wp_enqueue_scripts', 'script_load');
