<?php
/**
 * Plugin Name: T3-social
 * Plugin URI: http://t3-blog
 * Description: Add contact with social
 * Version: 1.0
 * Author: Taitt
 * Author URI: http://t3-blog
 * License: GPLv2
 */
?>

<?php

class MySettingsPage {

    private $options;

    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function add_plugin_page()
    {
        add_menu_page(
            'Contact with Social ',
            'T3 - Social',
            'manage_options',
            't3-social',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        $this->options = get_option( 'contact_socials' );
        ?>
        <div class="wrap">
            <h1>My Socials</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'contact_socials_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'contact_socials_group',
            'contact_socials',
            array( $this, 'sanitize' )
        );

        add_settings_section(
            'setting_section_id',
            'My Custom Settings',
            array( $this, 'print_section_info' ),
            'my-setting-admin'
        );

        add_settings_field(
            'url_facebook',
            'Contact to Facebook',
            array( $this, 'url_facebook_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'fb_active',
            'Active',
            array( $this, 'fb_active_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'url_instagram',
            'Contact to Instagram',
            array( $this, 'url_instagram_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'ins_active',
            'Active',
            array( $this, 'ins_active_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'url_email',
            'Contact to Email',
            array( $this, 'url_email_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'mail_active',
            'Active',
            array( $this, 'mail_active_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'url_linkedin',
            'Contact to LinkedIn',
            array( $this, 'url_linkedin_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'linkedin_active',
            'Active',
            array( $this, 'linkedin_active_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

    }


    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['url_facebook'] ) )
            $new_input['url_facebook'] = sanitize_text_field( $input['url_facebook'] );

        if( isset( $input['url_instagram'] ) )
            $new_input['url_instagram'] = sanitize_text_field( $input['url_instagram'] );

        if( isset( $input['url_email'] ) )
            $new_input['url_email'] = sanitize_text_field( $input['url_email'] );

        if( isset( $input['url_linkedin'] ) )
            $new_input['url_linkedin'] = sanitize_text_field( $input['url_linkedin'] );

        if( isset( $input['fb_active'] ) )
            $new_input['fb_active'] = $input['fb_active'];

        if( isset( $input['ins_active'] ) )
            $new_input['ins_active'] = $input['ins_active'];

        if( isset( $input['mail_active'] ) )
            $new_input['mail_active'] = $input['mail_active'];

        if( isset( $input['linkedin_active'] ) )
            $new_input['linkedin_active'] = $input['linkedin_active'];

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function url_facebook_callback()
    {
        printf(
            '<input type="text" id="url_facebook" name="contact_socials[url_facebook]" value="%s" />',
            isset( $this->options['url_facebook'] ) ? esc_attr( $this->options['url_facebook']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function url_instagram_callback()
    {
        printf(
            '<input type="text" id="url_instagram" name="contact_socials[url_instagram]" value="%s" />',
            isset( $this->options['url_instagram'] ) ? esc_attr( $this->options['url_instagram']) : ''
        );
    }

    public function url_email_callback()
    {
        printf(
            '<input type="text" id="url_email" name="contact_socials[url_email]" value="%s" />',
            isset( $this->options['url_email'] ) ? esc_attr( $this->options['url_email']) : ''
        );
    }

    public function url_linkedin_callback()
    {
        printf(
            '<input type="text" id="url_linkedin" name="contact_socials[url_linkedin]" value="%s" />',
            isset( $this->options['url_linkedin'] ) ? esc_attr( $this->options['url_linkedin']) : ''
        );
    }

    public function fb_active_callback()
    {
        printf(
            '<input type="checkbox" id="fb_active" name="contact_socials[fb_active]" %s />',
            isset( $this->options['fb_active'] ) ? "checked='checked'" : ''
        );
    }

    public function ins_active_callback()
    {
        printf(
            '<input type="checkbox" id="ins_active" name="contact_socials[ins_active]" %s />',
            isset( $this->options['ins_active'] ) ? "checked='checked'" : ''
        );
    }

    public function mail_active_callback()
    {
        printf(
            '<input type="checkbox" id="mail_active" name="contact_socials[mail_active]" %s />',
            isset( $this->options['mail_active'] ) ? "checked='checked'" : ''
        );
    }

    public function linkedin_active_callback()
    {
        printf(
            '<input type="checkbox" id="linkedin_active" name="contact_socials[linkedin_active]" %s />',
            isset( $this->options['linkedin_active'] ) ? "checked='checked'" : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new MySettingsPage();
?>

