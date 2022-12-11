<?php


session_start();   

if (isset($_POST['proceed'])) {
	include '../../inc/dbconnect.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);



	if (empty($uid) || empty($pass)) {
		header("Location: ../login.php?signin=empty");
	}
	else{

         $sql = "SELECT * FROM administrators WHERE username='$uid' OR email='$uid';";
         $result = mysqli_query($conn, $sql);
         $resultcheck = mysqli_num_rows($result);

         if ($resultcheck < 1) {
         	header("Location: ../login.php?signin=error");
         	exit();
         }
         else{

               if ($row = mysqli_fetch_assoc($result)) {
               	# De-hashing password

               	$hashedpwd = password_verify($pass, $row['password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        $username = mysqli_query($conn, "SELECT id from administrators where username='$uid' OR email='$uid';");
                        //getting the serached username
                        $rowSearchUid = mysqli_fetch_assoc($username);
                        $Userid2 = $rowSearchUid['admin_id'];
                        $INSERT = mysqli_query($conn, "INSERT INTO admin_login_tokens (token, admin_id) VALUES ('$hashed_token', '$Userid2')");

                        setcookie("SNIDStaff", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNIDStaff_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);


               		 


               		header("Location: ../index.php");
               		exit();

                     
               	
               		}
               }

         }

	}


}


