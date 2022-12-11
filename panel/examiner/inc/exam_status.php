<?php
include '../../inc/dbconnect.inc.php';
if (isset($_POST['results_approve']) && isset($_GET['id'])) {
    $URLid = mysqli_real_escape_string($conn, $_GET['id']);
  //Updating exam type/Category status
  $Update = mysqli_query($conn, "UPDATE exams_category SET e_status='sent' WHERE id='$URLid' ");\
  header("LOCATION: ../exams.php");
}

?>