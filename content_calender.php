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

// <!-- function wpacademy_publish_send_mail(){
// global $post;
// $author = $post->post_author; /* Post author ID. */
// $name = get_the_author_meta( 'display_name', $author );
// $email = get_the_author_meta( 'user_email', $author );
// $title = $post—>post_title;
// $permalink = get_permalink( $ID );
// sedit = get_edit_post_link( $ID, '' );
// $tol] = sprintf( '%s <%s>', $name, Semail );
// $subject = sprintf( 'Published: %s', $title );
// $message = sprintf ('Congratulations, %s! Your article “%s” has been published.' . “\n\n", $name, Stitle );
// $message .= sprintf( 'View: %s', $permalink );
// $headers[] = '';
// wp_mail( $to, $subject, $message, $headers );
// }
// add_action( 'publish_post', 'wpacademy_publish_send_mail' ); -->


// --> If this file is called directly, ABORT.
// if(!defined('WPINC')){
//     die;
// }

// //To check whether the given constant name is present earlier or not.
// if(!defined('WPAC_PLUGIN_VERSION')){
//     define('WPAC_PLUGIN_VERSION','1.0.0');
// }


// //To check whether the given constant name is present earlier or not.
// if(!defined('WPAC_PLUGIN_DIR')){
//     define('WPAC_PLUGIN_DIR',plugin_dir_url(__FILE__));
// }

// //it will check whether by this name any function has been created earlier, if then it will not create
// if( !function_exists('wpac_plugin_scripts')) {
//     function wpac_plugin_scripts() {

//         //Plugin Frontend CSS
//         wp_enqueue_style('wpac-css', plugin_dir_path( __FILE__ ). 'assets/css/style.css');

        
//         //Plugin Frontend JS
//         wp_enqueue_script('wpac-js', plugin_dir_path( __FILE__ ). 'assets/js/main.js', 'jQuery', '1.0.0', true );


//     }
//     add_action('wp_enqueue_scripts', 'wpac_plugin_scripts');
// }





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