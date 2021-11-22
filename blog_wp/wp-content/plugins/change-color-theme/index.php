<?php
/**
 * Plugin Name: My color theme
 * Plugin URI: http://t3-blog
 * Description: Change color of theme
 * Version: 1.0
 * Author: Taitt
 * Author URI: http://t3-blog
 * License: GPLv2
 */
?>

<?php

add_action('admin_menu', 'my_plugin_theme_color');
function my_plugin_theme_color(){
    add_menu_page( 'Color Of Theme', 'My Theme Color', 'manage_options', 'color-of-theme', 'init_setting' );

    add_action( 'admin_init', 'register_theme_color_plugin_settings' );
}

function register_theme_color_plugin_settings() {

    register_setting( 'theme-plugin-settings-group', 'color_theme' );
    register_setting( 'theme-plugin-settings-group', 'color_theme_pick' );

}



function init_setting(){


?>
<form method="post" action="options.php">
    <?php settings_fields( 'theme-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'theme-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Current color of theme:</th>
            <td>
                <input type="color" name="color_theme" value="<?php echo get_option( 'color_theme_pick' ); ?>" style="pointer-events: none;"/> <span><?php echo get_option( 'color_theme_pick' ); ?></span>
            </td>
        </tr>
        <tr>
            <th scope="row">Pick a Color</th>
            <td>
                <input type="color" name="color_theme_pick" value="#ffffff"/>
            </td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>

<?php }

if( !function_exists("update_color_theme") ) {
    function update_color_theme(){
        register_setting( 'color-theme-settings', 'color_theme' );
    }
}
?>
