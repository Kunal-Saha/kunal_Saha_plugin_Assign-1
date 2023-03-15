<?php
include("config.php");
function wpac_settings_page_html() {
    //Check if current user have admin access.
    if(!is_admin()) {
        return;
    }
    ?>
        <div class="wrap">
            <h1 style="padding:10px; background:#333;color:#fff"><?= esc_html(get_admin_page_title()); ?></h1>
            <table>
                <tr>
                    <th>DATE</th>
                    <td><input type="Date" name="myDate"></td>
                </tr>
                <tr>
                    <th>Occasion</th>
                    <td><input type="text" name="myOccasion"></td>
                </tr>
                <tr>
                    <th>Post Title</th>
                    <td><input type="text" name="myTitle"></td>
                </tr>
                <tr>
                    <th>Author Name</th>
                    <!-- <td><input type="text" name="A_name"></td> -->
                    <td><select name="A_name" id="admin" required>
                    <?php
                    $users = get_users( array(
                        'fields' =>array( 'ID', 'display_name' )
                    ) );
                    foreach ($users as $user) {
                        echo '<option value="' . $user->ID . '">'. $user->display_name . '</option>';
                    }
                    ?>
                </select></td>
                </tr>
                <tr>
                    <th>Reviewer</th>
                    <!-- <td><input type="name" name="reviewer"></td> -->
                    <td><select name="reviewer" id="reviewer" required>
                    <?php
                        $admins = get_users( array(
                            'role'  => 'administrator',
                            'fields'=> array( 'ID', 'display_name' )
                        ) );

                        foreach( $admins as $admin ) {
                            echo '<option value = "' . $admin->ID . '">' . $admin->display_name . '</option>';
                        }
                    ?>
                    </select></td>
                </tr>
            </table>
            <br>
                <button type="submit">Submit</button> <br>
            <br>
            <!-- <?php
                // if(isset($_POST['submit']))
                // {
                //     $date=$_POST['myDate'];
                //     $Occa=$_POST['myOccasion'];
                //     $title=$_POST['myTitle'];
                //     $a_name=$_POST['A_name'];
                //     $r_name=$_POST['reviewer'];

                //     $res=mysqli_query($mysqli,"INSERT into record values('','$date','$Occa','$title','$a_name','$r_name')");

                //     if($res){
                //         echo "Successfully Inserted";
                //     }
                //     else{
                //         echo "Failed";
                //     }
                // }
            ?> -->
        </div>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 14px;
                color: #333;
            }
            th, td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    <?

}

//Top Level Administration Menu
function wpac_register_menu_page() {
    add_menu_page( 'Customize Content Calender', 'CONTENT CALENDER', 'manage_options', 'wpac-settings', 'wpac_settings_page_html', 'dashicons-thumbs-up', 30 );
    add_submenu_page(
        'content-calendar',
        __('Schedule Event', 'content-calendar'),
        __('Schedule Event', 'content-calendar'),
        'manage_options',
        'schedule-event',
        'event_page_html'
    );

    add_submenu_page(
	    'content-calendar',
		__('View Schedule', 'content-calendar'),
		__('View Schedule', 'content-calendar'),
		'manage_options',
		'view-schedule',
		'print_schedule'
	);
}
add_action('admin_menu', 'wpac_register_menu_page');

<?php

if( !function_exists( 'calendar_plugin_scripts' ) ) {
    function calendar_plugin_scripts() {
        
        wp_register_style( 'content-calendar-css', CALENDAR_PLUGIN_DIR. 'Assets/CSS/style.css' );
        wp_enqueue_style( 'content-calendar-css' );

        wp_enqueue_script('calendar-script', CALENDAR_PLUGIN_DIR. 'Assets/JS/calendar.js');
        wp_localize_script('calendar-script', 'pluginConstants', array(
            'dirPath' => CALENDAR_PLUGIN_DIR_PATH,
            'pluginVersion' => CALENDAR_PLUGIN_VERSION
        ));
    }

    add_action( 'admin_enqueue_scripts', 'calendar_plugin_scripts' );
}

?>

