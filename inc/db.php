<?php
// Form Submmition

function form_submit() {
    global $wpdb;

    if( isset( $_POST['myDate'] ) && isset( $_POST['myOccasion'] ) && isset( $_POST['myTitle'] ) && isset( $_POST['A_name'] ) && isset( $_POST['reviewer'] ) ) {
        $table_name = $wpdb->prefix . "events";
        $date = sanitize_text_field( $_POST['myDate'] );
        $occassion = sanitize_text_field( $_POST['myOccasion'] );
        $post_title = sanitize_text_field( $_POST['myTitle'] );
        $author = sanitize_text_field( $_POST['A_name'] );
        $reviewer = sanitize_text_field( $_POST['reviewer'] );


        echo "form Submit";
        $wpdb->insert(
            $table_name,
            array(
                'date'       => $date,
                'occassion'  => $occassion,
                'post_title' => $post_title,
                'author'     => $author,
                'reviewer'   => $reviewer
            )
        );
    }
}


add_action( 'init', 'submitBtn' );

function submitBtn() {
    
    if( isset( $_POST['submit'] ) ) {
        form_submit();
    }
}





function print_schedule() {
    ?>

    <h1 class = "tab-title">Upcoming Events</h1>

    <?php

    global $wpdb;
    $table_name = $wpdb->prefix . 'events';

    $results = $wpdb->get_results("SELECT * FROM $table_name WHERE date >= DATE( NOW() ) ORDER BY date");

    echo '<table id="upcoming-table" >';
    echo '<thead><tr><th>ID</th><th>Date</th><th>Occasion</th><th>Post Title</th><th>Author</th><th>Reviewer</th></tr></thead>';
    foreach ( $results as $row ) {
        echo '<tr>';
        echo '<td>' . $row->id . '</td>';
		echo '<td>' . $row->date . '</td>';
		echo '<td>' . $row->occassion . '</td>';
		echo '<td>' . $row->post_title . '</td>';
		echo '<td>' . get_userdata($row->author)->user_login . '</td>';
		echo '<td>' . get_userdata($row->reviewer)->user_login . '</td>';
		echo '</tr>';
    }
    echo '</table>';


    ?>
    <h1 class="tab-title">Closed Events</h1>
    <?php

    global $wpdb;
    $table_name = $wpdb->prefix . 'events';

	$data = $wpdb->get_results("SELECT * FROM $table_name WHERE date < DATE(NOW()) ORDER BY date DESC");

	echo '<table id="upcoming-table">';
	echo '<thead><tr><th>ID</th><th>Date</th><th>Occasion</th><th>Post Title</th><th>Author</th><th>Reviewer</th></tr></thead>';
	foreach ($data as $row) {
		echo '<tr>';
		echo '<td>' . $row->id . '</td>';
		echo '<td>' . $row->date . '</td>';
		echo '<td>' . $row->occassion . '</td>';
		echo '<td>' . $row->post_title . '</td>';
		echo '<td>' . (get_userdata($row->author) ? get_userdata($row->author)->user_login : 'N/A') . '</td>';
        echo '<td>' . (get_userdata($row->reviewer) ? get_userdata($row->reviewer)->user_login : 'N/A') . '</td>';
		echo '</tr>';
	}
	echo '</table>';

}
?>