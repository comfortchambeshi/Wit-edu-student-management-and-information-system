<?php

if (isset($_POST['event_btn'])) {

	include 'staff_login.php';
include 'dbconnect.inc.php';
include 'admin_mains.php';
	$EventTitle = mysqli_real_escape_string($conn, $_POST['event_title']);
	$EventVenue = mysqli_real_escape_string($conn, $_POST['event_venue']);
	$EventDate = mysqli_real_escape_string($conn, $_POST['event_date']);
	$EventStarting = mysqli_real_escape_string($conn, $_POST['starting_time']);
	$EventEnding = mysqli_real_escape_string($conn, $_POST['ending_time']);

	
	
    $event_description = mysqli_real_escape_string($conn, $_POST['event_description']); 

	if($InsertEvent = mysqli_query($conn, "INSERT INTO events (added_by, name, started, description, venue, starting_time, ending_time) VALUES('$user_id', '$EventTitle', '$EventDate', '$event_description', '$EventVenue', '$EventStarting', '$EventEnding')")){


		header("Location: ../event_list.php?status=success");
	}
	else{
		echo mysqli_error($conn);
	}


}

?>