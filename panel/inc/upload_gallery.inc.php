<?php
if (isset($_POST['upload_btn'])) {
	include 'dbconnect.inc.php';
	include 'staff_login.php';
	include 'admin_mains.php';

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$image_file = $_FILES['image_file'];
	$image_description = $_POST['image_description'];
	


//for files
$fileTmpPath = $_FILES['image_file']['tmp_name'];
$fileName = $_FILES['image_file']['name'];
$fileSize = $_FILES['image_file']['size'];
$fileType = $_FILES['image_file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "gallery_img";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $image_file; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../images/gallery/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
//hashing the password

				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
               


				//INSERTING INTO DATABSE
				$insertImage = mysqli_query($conn, "INSERT INTO gallery (name, file_name, description, added_by) VALUES('$title', '$UploadFullName', '$image_description', '$user_id')");
				if ($insertImage) {
					header("Location: ../gallery.php?status=success");

				}
				else{
					echo (mysqli_error($conn));
				}

}
}}


?>