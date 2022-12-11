<?php
class login extends db{

public function Authenticate($username, $password)
{
    
    $sql = "SELECT * FROM students WHERE username=? OR student_email=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $username]);
    
    if($stmt->rowCount() > 0)
    {
        
       
        
        if ($row = $stmt->fetch()) {
               	# De-hashing password

               	$hashedpwd = password_verify($password, $row['student_password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        
                        $user_id = "SELECT system_id FROM students WHERE username=? OR student_email=?";
                        $stmt = $this->connect()->prepare($user_id);
                        $stmt->execute([$username, $username]);
                        //getting user id
                        $row_users = $stmt->fetch();
                        $real_uid = $row_users['system_id'];
                        
                        
                        $sqlInsert = "INSERT INTO login_tokens (token, user_id) VALUES (?, ?)";
                        $stmt = $this->connect()->prepare($sqlInsert);
                        $stmt->execute([$hashed_token, $real_uid]);

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                     
               		   header("Location: ../panel");
               		   exit();

                     
               	
               		}
        }

        
        
    
        
        
        
    }
    else{
        
        $sql = "SELECT * FROM lecturers WHERE username=? OR email=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $username]);
    
    if($stmt->rowCount() > 0)
    {
      if ($row = $stmt->fetch()) {
               	# De-hashing password

               	$hashedpwd = password_verify($password, $row['password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        
                        $user_id = "SELECT id FROM lecturers WHERE username=? OR email=?";
                        $stmt = $this->connect()->prepare($user_id);
                        $stmt->execute([$username, $username]);
                        //getting user id
                        $row_users = $stmt->fetch();
                        $real_uid = $row_users['id'];
                        
                        
                        $sqlInsert = "INSERT INTO teacher_login_tokens (token, teacher_id) VALUES (?, ?)";
                        $stmt = $this->connect()->prepare($sqlInsert);
                        $stmt->execute([$hashed_token, $real_uid]);

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                     
               		   header("Location: ../panel");
               		   exit();

                     
               	
               		}
        }
    }
    else{
        
        $sql = "SELECT * FROM librarians WHERE username=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);
    
    if($stmt->rowCount() > 0){
        
        if ($row = $stmt->fetch()) {
               	# De-hashing password

               	$hashedpwd = password_verify($password, $row['password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        
                        $user_id = "SELECT id FROM librarians WHERE username=?";
                        $stmt = $this->connect()->prepare($user_id);
                        $stmt->execute([$username]);
                        //getting user id
                        $row_users = $stmt->fetch();
                        $real_uid = $row_users['id'];
                        
                        
                        $sqlInsert = "INSERT INTO lib_login_tokens (token, lib_id) VALUES (?, ?)";
                        $stmt = $this->connect()->prepare($sqlInsert);
                        $stmt->execute([$hashed_token, $real_uid]);

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                     
               		   header("Location: ../panel");
               		   exit();

                     
               	
               		}
        }
    }
    else{
        
        
        $sql = "SELECT * FROM accountants WHERE email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        
        if($stmt->rowCount() > 0){
        
        if ($row = $stmt->fetch()) {
               	# De-hashing password

               	$hashedpwd = password_verify($password, $row['password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        
                        $user_id = "SELECT id FROM accountants WHERE email=?";
                        $stmt = $this->connect()->prepare($user_id);
                        $stmt->execute([$username]);
                        //getting user id
                        $row_users = $stmt->fetch();
                        $real_uid = $row_users['id'];
                        
                        
                        $sqlInsert = "INSERT INTO acc_login_tokens (token, acc_id) VALUES (?, ?)";
                        $stmt = $this->connect()->prepare($sqlInsert);
                        $stmt->execute([$hashed_token, $real_uid]);

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                     
               		   header("Location: ../panel");
               		   exit();

                     
               	
               		}
        }
    }
    else{
        
        $sql = "SELECT * FROM administrators WHERE username=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        
        if($stmt->rowCount() > 0){
        
        if($stmt->rowCount() > 0){
        
        if ($row = $stmt->fetch()) {
               	# De-hashing password

               	$hashedpwd = password_verify($password, $row['password']);


               	if ($hashedpwd == false) {
               		header("Location: ../login.php?signin=passworderror");
               		exit();

                       

               	}
               	else if ($hashedpwd == true) {
               			//login sessions

                         $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        
                        $user_id = "SELECT id FROM administrators WHERE username=?";
                        $stmt = $this->connect()->prepare($user_id);
                        $stmt->execute([$username]);
                        //getting user id
                        $row_users = $stmt->fetch();
                        $real_uid = $row_users['id'];
                        
                        
                        $sqlInsert = "INSERT INTO admin_login_tokens (token, admin_id) VALUES (?, ?)";
                        $stmt = $this->connect()->prepare($sqlInsert);
                        $stmt->execute([$hashed_token, $real_uid]);
                        setcookie("SNIDStaff", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNIDStaff_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                     
               		  header("Location: ../panel");
               		   exit();

                     
               	
               		}
        }
    }
    }
    else{
        echo 'no user found with that username and password!';
    }
    }
        
        
    }
    
    }
    
    }
    
    
}    
    
    
}


