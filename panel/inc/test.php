<?php
include_once 'inc/dbconnect.inc.php';

$expire = strtotime($startdate. ' + 1 days');
$today = strtotime("today midnight");

if($today >= $expire){
    $UpdatetoDue = mysqli_query($conn, "UPDATE physical_library SET book_status='overdue' WHERE due_date='$expire'");
} else {
    
}
?>