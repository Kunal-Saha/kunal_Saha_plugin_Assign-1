<?php
/*
 * Plugin Name:       content_calender
 * Plugin URI:        C:\Users\kunal\Local Sites\marvel-con\app\public\wp-content\plugins\content_calender
 * Description:       Simple Editable Content Calender.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Kunal Saha
 * Author URI:        https://kunal-saha.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       Content to be stored on the Database.
 * Domain Path:       /languages
 */

if (!defined( 'WPINC' )) {
    die;
}

//Define Constants
if ( !defined('WPAC_PLUGIN_VERSION')) {
    define('WPAC_PLUGIN_VERSION', '1.0.0');
}
if ( !defined('WPAC_PLUGIN_DIR')) {
    define('WPAC_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

//Include Scripts & Styles
if( !function_exists('wpac_plugin_scripts')) {
    function wpac_plugin_scripts() {
        wp_enqueue_style('wpac-css', plugin_dir_url( __FILE__ ). 'assets/css/style.css');
        wp_enqueue_script('wpac-js', plugin_dir_url( __FILE__ ). 'assets/js/main.js', 'jQuery', '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'wpac_plugin_scripts');
}


require plugin_dir_path( __FILE__ ). 'inc/settings.php';




?>