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

$dob = mysqli_real_escape_string($conn, $_POST['dob']);

$nrc = mysqli_real_escape_string($conn, $_POST['nrc_number']);
$profile_pic =  $_FILES['profile_pic'];









$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);






//$dob_day = mysqli_real_escape_string($conn, $_POST['dob_day']);
//$dob_month = mysqli_real_escape_string($conn, $_POST['dob_month']);
//$dob_year = mysqli_real_escape_string($conn, $_POST['dob_year']);
//$country = mysqli_real_escape_string($conn, $_POST['country']);
$ver_code = mt_rand();



function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}







}


if (empty($full_name) || empty($email)) {
	//header("location: ../student_error.php?registration=empty");
	echo '<script>alert("Error, You have not filled in some of the fields!");
				window.location.href = "../librarians_list.php?status=empty";
				
					</script>';
	
	exit();

}
else{

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		//header("location: ../student_error.php?registration=invalid_email");
		echo '<script>alert("Error, the email address you have entered is invalid!");
				window.location.href = "../librarians_list.php?status=invalid_email";
				
					</script>';
		exit();
	}

		else{

			$sql = "SELECT * FROM parents WHERE nrc='$nrc' OR phone_number='$mobile_number';";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck > 0) {
				//header("location: ../student_error.php?registration=usertaken");
				echo '<script>alert("Error, the email address or nrc number is already assigned in the database!");
				window.location.href = "../parents_list.php?status=usertaken";
				
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
$uploadFileDir = '../uploads/parents_profiles/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
    
    function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	if(!$add_dashes)
		return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}
//hashing the password

//$password = password_generate(8).$password."\n";
$u_password = generateStrongPassword();
echo $u_password;

//Sending email Address
include'../../functions/emailtemplates.php';
					$regTemplate = new mailTemplate();
					$template = $regTemplate->register('Parent Login Details', 'Email adress', $email, $u_password, $full_name);
					Mail::sendMail('Parent login details', $template, $email);


				$hashedpwd = password_hash($u_password, PASSWORD_DEFAULT);
               


				//INSERTING INTO DATABSE
				$InsertStudents = mysqli_query($conn, "INSERT INTO parents (dob, profile_pic, gender, full_name, nrc, email, phone_number, password, added_by) VALUES('$dob', '$UploadFullName', '$gender', '$full_name', '$nrc', '$email', '$mobile_number', '$hashedpwd', '$user_id')");

				if ($InsertStudents) {
					

						
					
					
					
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

				
			  //header("location: ../librarians_list.php?status=success");
		  echo '<script>alert("The librarian has been submitted in the databse successfully!");
				window.location.href = "../librarians_list.php?status=success";
				
					</script>';
					


			


		
		
	}
}























