<?php
if (isset($_POST['reg'])) {
	include '../inc/auto-loader.php';
	include 'dbconnect.inc.php';
	include '../functions/autopwd.php';
	include 'staff_login.php';
	include 'admin_mains.php';
	
include('../../classes/mail.php');


	


$full_name =  mysqli_real_escape_string($conn, $_POST['full_name']) ;
$email = mysqli_real_escape_string($conn, $_POST['email']);  
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$subject_id = mysqli_real_escape_string($conn, $_POST['subjects']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);

$nrc = mysqli_real_escape_string($conn, $_POST['nrc_number']);
$profile_pic =  $_FILES['profile_pic'];
$city_town = mysqli_real_escape_string($conn, $_POST['city_town']);
$postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
$ts_number = mysqli_real_escape_string($conn, $_POST['ts_number']);
$t_username = mysqli_real_escape_string($conn, $_POST['username']);
$course = mysqli_real_escape_string($conn, $_POST['subjects']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);



$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);






//$dob_day = mysqli_real_escape_string($conn, $_POST['dob_day']);
//$dob_month = mysqli_real_escape_string($conn, $_POST['dob_month']);
//$dob_year = mysqli_real_escape_string($conn, $_POST['dob_year']);
//$country = mysqli_real_escape_string($conn, $_POST['country']);
$ver_code = mt_rand();



$autopwd = new autopwd();
$auto = $autopwd->generateStrongPassword();
$u_password = mysqli_real_escape_string($conn, $auto);





}


if (empty($full_name) || empty($email)  ) {
	header("location: ../student_error.php?registration=empty");
	exit();

}
else{

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		echo '<script>alert("The email address you are tring to add is invalid!");
			   window.location.href = "../teachers_list.php?status=invalid_email";
			   
				   </script>';
		exit();
	}

		else{

			$sql = "SELECT * FROM lecturers WHERE ts_number='$ts_number' OR nrc='$nrc';";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck > 0) {
				//header("location: ../student_error.php?registration=usertaken");
				echo '<script>alert("The TS number or, nrc or email address you are trying to submit is already existed in the database!");
			   window.location.href = "../teachers_list.php?status=usertaken";
			   
				   </script>';

				
			}
			
			else{

		//for files
$fileTmpPath = $_FILES['profile_pic']['tmp_name'];
$fileName = $_FILES['profile_pic']['name'];
$fileSize = $_FILES['profile_pic']['size'];
$fileType = $_FILES['profile_pic']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "profile_pic";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $profile_pic; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


           in_array($fileExtension, $allowedfileExtensions);


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/teachers_profiles/';
$dest_path = $uploadFileDir . $UploadFullName;

move_uploaded_file($fileTmpPath, $dest_path);
{
//hashing the password

				$hashedpwd = password_hash($u_password, PASSWORD_DEFAULT);
               


				//INSERTING INTO DATABSE
				$InsertStudents = mysqli_query($conn, "INSERT INTO lecturers (username, ts_number, email, password, name, profile_pic, gender, mobile_number, registered_date, subjects_id, nrc, city_town, postal_code, dob ) VALUES
					('$t_username', '$ts_number', '$email', '$hashedpwd', '$full_name', 'teacher.png', '$gender', '$mobile_number', NOW(), '$subject_id', '$nrc', '$city_town', '$postal_code', '$dob')");

				if ($InsertStudents) {
					include'../../functions/emailtemplates.php';
					$regTemplate = new mailTemplate();
					$template = $regTemplate->register('Lecturer', 'Email adress', $email, $u_password, $full_name);
					Mail::sendMail('Lecturer login details', $template, $email);
					echo '<script>alert("Teacher added in the databse successfully!");
			   window.location.href = "../teachers_list.php?status=success";
			   
				   </script>';
				}
				else{
					echo mysqli_error($conn);
				}
				







}

				

				
				

				

				//$run_updateyess = mysqli_query($conn, "update users set posts='yes' where username='$uid'");


				


/*
				$cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hASHEDtOKEN = sha1($token);
                        $user_idSearch = mysqli_query($conn, "SELECT id from users where username='$stage_name'");
                        $ROWidSearch = mysqli_fetch_assoc($user_idSearch);
                        $idFinally = $ROWidSearch['id'];
                        //inserting token
                        $insertToken = mysqli_query($conn, "INSERT INTO login_tokens (token, user_id) VALUES('$hASHEDtOKEN', '$idFinally')");

                        

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                           include($_SERVER['DOCUMENT_ROOT'].'/batmix365/functions/emailtemplates.php');


                

                   include($_SERVER['DOCUMENT_ROOT'].'/batmix365/functions/registerMailTemp.php');
				 Mail::sendMail('Welcome to Bassflick', $htmlBodyRegister, $email);



*/

				
			  // header("location: ../teachers_list.php?status=success");

			   



			


		
		
	}
}










}












