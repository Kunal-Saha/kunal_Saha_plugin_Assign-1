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

 if ( !defined( 'WPINC' ) ) {
    die;
}

if ( !defined( 'CALENDAR_PLUGIN_VERSION' ) ) {
    define( 'CALENDAR_PLUGIN_VERSION', '1.0.0' );
}

if( !defined( 'CALENDAR_PLUGIN_DIR' ) ) {
    define( 'CALENDAR_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );
}

if( !defined( 'CALENDAR_PLUGIN_DIR_PATH' ) ) {
    define( 'CALENDAR_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Enqueue Scripts

require CALENDAR_PLUGIN_DIR_PATH  . 'scripts.php';

// Adding Settings page of our plugin

require CALENDAR_PLUGIN_DIR_PATH . 'inc/menu.php';

// Adding Form to the page

require CALENDAR_PLUGIN_DIR_PATH . 'inc/settings.php';

// Create table

require CALENDAR_PLUGIN_DIR_PATH . 'inc/db.php';

?>