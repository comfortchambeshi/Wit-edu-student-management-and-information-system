<?php

if (isset($_POST['confirm']) && isset($_GET['email'])) {
    include 'dbconnect.inc.php';
        include 'login_function.php';
                $Entered_Code = $_POST['code'];
                $Entered_pwd1 = $_POST['pass1'];
                $Entered_pwd2 = $_POST['pass2'];
                $UrlEmail = $_GET['email'];
                  
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
                    
                    $rowTok = mysqli_fetch_assoc($VerifyingCode);
                    $email = mysqli_real_escape_string($conn, $rowTok['email']);
                    
                    //Checking from students
                    $Students = mysqli_query($conn,"SELECT * FROM students WHERE student_email='$email'");
                    $Teachers = mysqli_query($conn,"SELECT * FROM lecturers WHERE email='$email'");
                    if(mysqli_num_rows($Students) > 0){
                        $hashedpwd = password_hash($Entered_pwd1, PASSWORD_DEFAULT);
                     $runpwd_Update = mysqli_query($conn,"UPDATE students SET student_password='$hashedpwd' WHERE student_email='$UrlEmail'");
                     $delete_Token = mysqli_query($conn, "DELETE FROM password_tokens WHERE email='$UrlEmail'");
                     if($runpwd_Update && $delete_Token){
                         
                     

                    header("location: ../login.php?signin=pwd_changed");
                     }
                     else{
                         echo mysqli_error($conn);
                     }
                        
                    }else{
                        if(mysqli_num_rows($Teachers) > 0)
                        {
                            $hashedpwd = password_hash($Entered_pwd1, PASSWORD_DEFAULT);
                     $runpwd_Update = mysqli_query($conn,"UPDATE lecturers SET password='$hashedpwd' WHERE email='$UrlEmail'");
                     $delete_Token = mysqli_query($conn, "DELETE FROM password_tokens WHERE email='$UrlEmail'");

                    if($runpwd_Update && $delete_Token){
                         
                     

                    header("location: ../login.php?signin=pwd_changed");
                     }
                     else{
                         echo mysqli_error($conn);
                     }
                        }    
                        
                    }
                    //hashing the password

                
                     
                }
                


            }


?>