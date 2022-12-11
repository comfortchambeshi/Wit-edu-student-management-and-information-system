<?php


session_start();   

if (isset($_POST['proceed'])) {
	include 'dbconnect.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['login_name']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);



	if (empty($uid) || empty($pass)) {
		header("Location: ../login.php?signin=empty");
	}
	else{

         
         $result = mysqli_query($conn, "SELECT * FROM librarians WHERE nrc='$uid' OR email='$uid'  ");
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
                        $user_id = mysqli_query($conn, "SELECT id from librarians where nrc='$uid' OR email='$uid' OR email='$uid'");
                        //getting user id
                        $row_users = mysqli_fetch_assoc($user_id);
                        $real_uid = $row_users['id'];
                        $INSERT = mysqli_query($conn, "INSERT INTO lib_login_tokens (token, lib_id) VALUES ('$hashed_token', '$real_uid')");

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);


               		

                


               		header("Location: ../panel");
               		exit();

                     
               	
               		}
               }

         }

	}


}




