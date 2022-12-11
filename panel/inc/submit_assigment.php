<?php
if (isset($_POST['submit'])) {
include '../inc/auto-loader.php';
include 'teacher_login_function.php';
include 'dbconnect.inc.php';
include 'teacher_mains.php';


	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$class = mysqli_real_escape_string($conn, $_POST['class']);
	$year = mysqli_real_escape_string($conn, $_POST['year']);
	$due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$file = $_FILES['file'];


	//for files
$fileTmpPath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "gallery_img";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $name; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'pdf', 'docx');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/assignments/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{

               


				//INSERTING INTO DATABSE
				$insertImage = mysqli_query($conn, "INSERT INTO assignments (name, subject, class, deadline, start, s_from, accademic_year, file) VALUES('$name', '$subject', '$class', '$due_date', NOW(), '$user_id', '$year', '$UploadFullName')");
				if ($insertImage) {
					header("Location: ../teacher/assignments.php?status=success");

				}
				else{
					echo (mysqli_error($conn));
				}
}}else{
    echo 'Invalid document extension!';
}
}

?>