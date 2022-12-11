<?php
	

if (isset($_POST['reg'])) {
	include '../inc/auto-loader.php';
	include '../../classes/db.php';
	include '../../classes/insert_user.php';
	include('../../classes/mail.php');

	
	


// Generates a strong password of N length containing at least one lower case letter,
// one uppercase letter, one digit, and one special character. The remaining characters
// in the password are chosen at random from those four sets.
//
// The available characters in each set are user friendly - there are no ambiguous
// characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
// makes it much easier for users to manually type or speak their passwords.
//
// Note: the $add_dashes option will increase the length of the password by
// floor(sqrt(N)) characters.

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


$first_name =   $_POST['first_name'] ;
$last_name =   $_POST['last_name'] ;
$full_name = $first_name.' '.$last_name;
$semester =   $_POST['semester'] ;
$country =   $_POST['country'] ;
$email =  $_POST['email'];  ;
$gender =  $_POST['gender'];
$year =  $_POST['year'];
$dob =  $_POST['dob'];
$student_number =  $_POST['exam_number'];
$nrc =  $_POST['nrc_number'];
$profile_pic =  $_FILES['profile_pic'];
$city_town =  $_POST['city_town'];


$class =  $_POST['class'];
$is_bussery =  $_POST['is_bussery'];
$course =  $_POST['course'];
$student_mode =  $_POST['student_mode'];
$hostel_name =  $_POST['hostel_number'];
$hostel_number =  $_POST['hostel_number'];
$bussery_percentage =  $_POST['bussery_percentage'];
$mobile_number =  $_POST['mobile_number'];
$study_mode =  $_POST['study_mode'];

$Health_Condition =  $_POST['health_condition'];
$health_problem = $_POST['health_problem'];
$exam_number =  $_POST['exam_number'];




#Sponsor details
$sponsor_first_name =   $_POST['sponsor_first_name'];
$sponsor_last_name =   $_POST['sponsor_last_name'];
$sponser_mobile_number =   $_POST['sponser_mobile_number'];
$relationship_with_sponsor =   $_POST['relationship_with_sponsor'];

//$dob_day =  $_POST['dob_day']);
//$dob_month =  $_POST['dob_month']);
//$dob_year =  $_POST['dob_year']);
//$country =  $_POST['country']);
$ver_code = mt_rand();



$u_password =  generateStrongPassword();





}


if (empty($email) ) {
	header("location: ../student_error.php?registration=empty");
	exit();

}
else{

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		
		echo '<script>alert("Error, the email address or nrc number is already assigned in the database!");
				window.location.href = "../students_list.php?status=invalid_email";
				
					</script>';
		exit();
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


           

   if(!is_uploaded_file($_FILES ['profile_pic'] ['tmp_name'])){
    
    $UploadFullName = 'student.png';
    
}else{
    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;
    
}

//for files
$uploadFileDir = '../uploads/students_profiles/';
$dest_path = $uploadFileDir . $UploadFullName;

move_uploaded_file($fileTmpPath, $dest_path);


//hashing the password

				$hashedpwd = password_hash($u_password, PASSWORD_DEFAULT);
               
                $nowDate = date("Y/m/d");

			     $insert = new insertUser();
			                                       
			     $student = $insert->insertStudent($first_name, $last_name, $hashedpwd, $u_password, $nowDate, $course, $email, $gender, $UploadFullName, $class, $nrc, $dob, $hostel_name, $hostel_number,  $study_mode, $mobile_number, $city_town, $is_bussery, $bussery_percentage, $year, $exam_number, $country, $exam_number, $Health_Condition, $semester, $sponsor_first_name, $sponsor_last_name, $sponser_mobile_number, $health_problem, $relationship_with_sponsor);

			
				



			
				





	}
	

}

				

				
				

			  
				

				

                           


                

                   


			


		
		
	
























