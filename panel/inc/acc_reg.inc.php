<?php
include '../inc/auto-loader.php';
include 'dbconnect.inc.php';
include 'staff_login.php';
include 'admin_mains.php';

if($AdminLoginObj->isadminlogged()){
	
}else {
	echo "<h1>Invalid access!</h1>";
	exit();	exit();
}
if (isset($_POST['reg'])) {
	
	include '../functions/autopwd.php';
	include '../../classes/mail.php';




$full_name =  mysqli_real_escape_string($conn, $_POST['full_name']) ;
$email = mysqli_real_escape_string($conn, $_POST['email']);  
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);

$nrc = mysqli_real_escape_string($conn, $_POST['nrc_number']);
$profile_pic =  $_FILES['profile_pic'];
$city_town = mysqli_real_escape_string($conn, $_POST['city_town']);
$postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);







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


if (empty($full_name) || empty($email) || empty($u_password) ) {
	header("location: ../student_error.php?registration=empty");
	exit();

}
else{

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("location: ../student_error.php?registration=invalid_email");
		exit();
	}

		else{

			$sql = "SELECT * FROM accountants WHERE email='$email' OR nrc='$nrc';";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck > 0) {
				

				echo '<script>alert("Error, the email address or nrc number is already assigned in the database!");
					window.location.href = "../accountants_list.php?status=usertaken";
					
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


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/acc_profiles/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
//hashing the password

				$hashedpwd = password_hash($u_password, PASSWORD_DEFAULT);
               


				//INSERTING INTO DATABSE
				$InsertStudents = mysqli_query($conn, "INSERT INTO accountants (username, email, password, name, profile_pic, gender, phone, registered_date, nrc, city_town, postal_code, dob ) VALUES
					('$username', '$email', '$hashedpwd', '$full_name', '$UploadFullName', '$gender', '$mobile_number', NOW(), '$nrc', '$city_town', '$postal_code', '$dob')");

				if ($InsertStudents) {
					include'../../functions/emailtemplates.php';
					$regTemplate = new mailTemplate();
					$template = $regTemplate->register('Accountant', 'Email adress', $email, $u_password, $full_name);
					if(Mail::sendMail('Accountant login details', $template, $email)){

						
					}
					else{
   
						echo "Enabke";
					}
					echo '<script>alert("Accountant submitted successfully!");
						window.location.href = "../accountants_list.php?status=success";
						
							</script>';
					
				}
				else{
					echo (mysqli_error($conn));
				}
				





	}
	else{
		echo "Cannot move image to a category, please check if the category is valid!";
	}

}
else{

	echo "Invalid image extension";
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

				
			   


			


		
		
	}
}























