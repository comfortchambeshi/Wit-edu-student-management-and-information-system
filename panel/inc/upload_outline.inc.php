<?php
if (isset($_POST['outline_btn']) || isset($_GET['id'])) {


	include 'staff_login.php';
include 'dbconnect.inc.php';
include 'admin_mains.php';
$OutlineTitle = mysqli_real_escape_string($conn, $_POST['outline_title']);
$programme_id = mysqli_real_escape_string($conn, $_GET['id']);


$OutlineDescription = mysqli_real_escape_string($conn, $_POST['music_description']);


//INSERTING INTO DATABSE
				$insertImage = mysqli_query($conn, "INSERT INTO prgramme_outline (name,  description, added_by, programme_id) VALUES('$OutlineTitle',  '$OutlineDescription', '$user_id', '$programme_id')");
				if ($insertImage) {
					header("Location: ../courseoutline.php?id=$programme_id");

				}
				else{
					echo (mysqli_error($conn));
				}
}










?>