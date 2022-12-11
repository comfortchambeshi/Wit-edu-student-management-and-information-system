<?php
if (isset($_POST['reg'])) {
	include 'mains_unlogged.php';
	include '../../classes/mail.php';

	


$stage_name =  mysqli_real_escape_string($conn, $_POST['stage_name']) ;
$email = mysqli_real_escape_string($conn, $_POST['email']);  ;
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$music_type = mysqli_real_escape_string($conn, $_POST['music_type']);
$country = mysqli_real_escape_string($conn, $_POST['country']);


//$dob_day = mysqli_real_escape_string($conn, $_POST['dob_day']);
//$dob_month = mysqli_real_escape_string($conn, $_POST['dob_month']);
//$dob_year = mysqli_real_escape_string($conn, $_POST['dob_year']);
//$country = mysqli_real_escape_string($conn, $_POST['country']);
$ver_code = mt_rand();



$password = mysqli_real_escape_string($conn, $_POST['pass']);





}


if (empty($stage_name) || empty($email) || empty($password) ) {
	header("location: ../register.php?registration=empty");
	exit();

}
else{

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("location: ../register.php?registration=invalid_email");
		exit();
	}

		else{

			$sql = "SELECT * FROM users WHERE username='$stage_name' OR exam_number;";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck > 0) {
				header("location: ../register.php?registration=usertaken");

				
			}
			else{


				//hashing the password

				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
               //checking user gender 
                if ($gender == 'male') {
                	$profileimg = 'male.png';
                }
                else{
                	$profileimg = 'female.jpg';
                }


				//INSERTING INTO DATABSE
				$sql = "INSERT INTO users (username, email, music_type, u_img, gender, describe_user, password, u_package, country  ) VALUES ('$stage_name', '$email', '$music_type', '$profileimg', '$gender', 'Hello their i have joined Batmix, keep visiting', '$hashedpwd', 'free', '$country' );";
				mysqli_query($conn, $sql);

				$last_inserted = $conn->insert_id;
				//inserting package
                $insert_storage = mysqli_query($conn, "INSERT INTO artist_storages(user_id, storage_size, package, used, total, unit) VALUES ('$last_inserted', '20', 'free', '0', '20', 'MB')");

				

				//$run_updateyess = mysqli_query($conn, "update users set posts='yes' where username='$uid'");


				



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





				
			     header("location: ../base.php?registration=success");


			}


		
		
	}
}























