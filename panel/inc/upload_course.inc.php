<?php

if (isset($_POST['course_btn'])) {
	include 'staff_login.php';
include 'dbconnect.inc.php';
include 'admin_mains.php';
$CourseTitle = mysqli_real_escape_string($conn, $_POST['course_title']);
$CourseImage = $_FILES['course_img'];
$CourseDescription = mysqli_real_escape_string($conn, $_POST['course_desc']);



//for files
$fileTmpPath = $_FILES['course_img']['tmp_name'];
$fileName = $_FILES['course_img']['name'];
$fileSize = $_FILES['course_img']['size'];
$fileType = $_FILES['course_img']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "gallery_img";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $newsTitle; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../images/courses/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
//hashing the password

				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
               


				//INSERTING INTO DATABSE
				$insertImage = mysqli_query($conn, "INSERT INTO programmes (name, cover_file, description, added_by) VALUES('$CourseTitle', '$UploadFullName', '$CourseDescription', '$user_id')");
				if ($insertImage) {
					header("Location: ../course_list.php?status=success");

				}
				else{
					echo (mysqli_error($conn));
				}

}
}}










?>