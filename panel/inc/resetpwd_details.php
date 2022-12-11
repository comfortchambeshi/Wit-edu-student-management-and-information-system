<?php

if (isset($_POST['confirm']) && isset($_GET['uid'])) {
    include 'dbconnect.inc.php';
        include 'login_function.php';
                $Entered_Code = $_POST['code'];
                $Entered_pwd1 = $_POST['pass1'];
                $Entered_pwd2 = $_POST['pass2'];
                $UserId = $_GET['uid'];
                  
                $VerifyingCode = mysqli_query($conn, "SELECT * FROM password_tokens WHERE token='$Entered_Code'");
                if (empty($Entered_Code) || empty($Entered_pwd1) || empty($Entered_pwd2)) {
                    header("location: ../reset_details.php?uid=".$UserId."&status=empty");
                }
                elseif (mysqli_num_rows($VerifyingCode ) < 1) {

                   header("location: ../reset_details.php?uid=".$UserId."&status=invalidcode");

                }
              
                elseif ($Entered_pwd1 != $Entered_pwd2) {
                  header("location: ../reset_details.php?uid=".$UserId."&status=pwd_mismatch");
                }
                else{
                    //hashing the password

                $hashedpwd = password_hash($Entered_pwd1, PASSWORD_DEFAULT);
                     $runpwd_Update = mysqli_query($conn,"UPDATE users SET password='$hashedpwd' WHERE id='$UserId'");
                     $delete_Token = mysqli_query($conn, "DELETE FROM password_tokens WHERE user_id='$UserId'");

                    header("location: ../login.php?signin=pwd_changed");
                }
                


            }


?>