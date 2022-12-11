<?php

if (isset($_POST['news_btn'])) {
	include '../inc/auto-loader.php';
	include 'staff_login.php';
include 'dbconnect.inc.php';
include 'admin_mains.php';
$newsTitle = mysqli_real_escape_string($conn, $_POST['news_title']);
$newsImage = $_FILES['news_image'];
$newsDescription = mysqli_real_escape_string($conn, $_POST['music_description']);



//for files
$fileTmpPath = $_FILES['news_image']['tmp_name'];
$fileName = $_FILES['news_image']['name'];
$fileSize = $_FILES['news_image']['size'];
$fileType = $_FILES['news_image']['type'];
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
$uploadFileDir = '../images/news/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
//hashing the password

				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
               


				//INSERTING INTO DATABSE
				$datetime = date("Y-m-d H:i:s");
				$insertImage = mysqli_query($conn, "INSERT INTO news (title, cover_file, body, added_by, date) VALUES('$newsTitle', '$UploadFullName', '$newsDescription', '$user_id', '$datetime')");
				if ($insertImage) {
					header("Location: ../news.php?status=success");

				}
				else{
					echo (mysqli_error($conn));
				}

}
}}










?>