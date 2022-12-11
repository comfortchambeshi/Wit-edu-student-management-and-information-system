<?php

if (isset($_POST['admission_btn'])) {
include 'dbconnect.inc.php';

include'../classes/mail.php';

//classes
include '../panel/classes/db.php';
include '../panel/classes/main.php';

$main = new main();

	$FullName = mysqli_real_escape_string($conn, $_POST['full_name']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$Gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$p_or_s_or_e = mysqli_real_escape_string($conn, $_POST['p_or_s_or_e']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$results_file = $_FILES['results_file'];
	$courses = mysqli_real_escape_string($conn, $_POST['courses']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$nrc_number = mysqli_real_escape_string($conn, $_POST['nrc_number']);
	$study_mode = mysqli_real_escape_string($conn, $_POST['study_mode']);
	$PhoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);


//for files
$fileTmpPath = $_FILES['results_file']['tmp_name'];
$fileName = $_FILES['results_file']['name'];
$fileSize = $_FILES['results_file']['size'];
$fileType = $_FILES['results_file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "gallery_img";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $FullName; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../panel/uploads/admissions/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
//Getting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_fULLname = mysqli_real_escape_string($conn, $row_info['full_name']);
$site_email = mysqli_real_escape_string($conn, $row_info['email']);
$site_phone1 = mysqli_real_escape_string($conn, $row_info['phone']);
$site_phone2 = mysqli_real_escape_string($conn, $row_info['phone2']);
$site_motto = mysqli_real_escape_string($conn, $row_info['motto']);
$site_AboutUs = mysqli_real_escape_string($conn, $row_info['about_us']);
$site_address = mysqli_real_escape_string($conn, $row_info['address']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
$payment_file = $_FILES['payment_file'];
               

 //allowed extensions
    $extensions = array('jpg', 'png', 'jpeg', 'docx', 'pdf');
    $fileUploader = $main->file_uploaders($payment_file,'../panel/uploads/admissions/payments/', $extensions);


				$InsertAdmission = mysqli_query($conn, "INSERT INTO admission(full_name, dob, gender, email, phone_number, course_id, address, city, country, results_file, study_mode, nrc_number, status, payment_file ) 
		VALUES('$FullName', '$dob', '$Gender', '$email', '$PhoneNumber', '$courses', '$address', '$city', '$country', '$UploadFullName', '$study_mode', '$nrc_number', 'pending', '$fileUploader')");

	if ($InsertAdmission) {
		include'../functions/emailtemplates.php';
					$Template = new mailTemplate();
					$fullDescription = 'Your admission form has been submitted successfully, please wait until we review your admission form. This usually takes 1-7 days. Once we review your form you will be notified through this email address';
					$Admissiontemplate = $Template->admissionTemplate($site_fULLname, $FullName, $fullDescription);
					
					Mail::sendMail('Admission form submitted successfully', $Admissiontemplate, $email);
		header("Location:  ../admissionrdr.php");
	}
	else{
		echo mysqli_error($conn);
	}
	
}
}
}
?>