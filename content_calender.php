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

// require CALENDAR_PLUGIN_DIR_PATH . 'inc/db.php';


function create_event_tables() {
    global $wpdb;

    $table_name = $wpdb->prefix . "events";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name(
        id mediumint(9) AUTO_INCREMENT,
        date date NOT NULL,
        occassion text,
        post_title text NOT NULL,
        author varchar(40) NOT NULL,
        reviewer varchar(40) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

register_activation_hook( __FILE__, 'create_event_tables' );

require CALENDAR_PLUGIN_DIR_PATH . 'inc/db.php';

?>