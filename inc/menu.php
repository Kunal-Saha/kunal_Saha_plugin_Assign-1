<?php

function register_event_page() {

    add_menu_page( 
        __('Customize Content Calender', 'content-calendar'),
        'CONTENT CALENDER',
        'manage_options',
        'content-calendar',
        'content_calendar_callback',
        'dashicons-calendar-alt',
        40
     );


    add_submenu_page(
        'content-calendar',
        __('SCHEDULE EVENT', 'content-calendar'),
        __('SCHEDULE EVENT', 'content-calendar'),
        'manage_options',
        'schedule-event',
        'wpac_settings_page_html'
    );

    add_submenu_page(
	    'content-calendar',
		__('VIEW SCHEDULE', 'content-calendar'),
		__('VIEW SCHEDULE', 'content-calendar'),
		'manage_options',
		'view-schedule',
		'print_schedule'
	);
}

add_action( 'admin_menu', 'register_event_page' );

?>