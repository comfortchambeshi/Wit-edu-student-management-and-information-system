<?php
if (isset($_POST['proceed'])) {
	include 'dbconnect.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['login_name']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);



	if (empty($uid) || empty($pass)) {
		header("Location: ../login.php?signin=empty");
	}
	else{

         $sql = "SELECT * FROM students WHERE username='$uid';";
         $result = mysqli_query($conn, $sql);
         $resultcheck = mysqli_num_rows($result);

         if ($resultcheck < 1) {
         	header("Location: ../login.php?signin=error");
         	exit();
         }
         else{

               if ($row = mysqli_fetch_assoc($result)) {
               	# De-hashing password

               	$hashedpwd = password_verify($pass, $row['student_password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        $user_id = mysqli_query($conn, "SELECT system_id from students where student_id='$uid'");
                        //getting user id
                        $row_users = mysqli_fetch_assoc($user_id);
                        $real_uid = $row_users['system_id'];
                        $INSERT = mysqli_query($conn, "INSERT INTO login_tokens (token, user_id) VALUES ('$hashed_token', '$real_uid')");

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

               		header("Location: ../panel");
               		exit();

                     
               	
               		}
               }

         }

	}


}




