<?php
//mobile detect
//include($_SERVER['DOCUMENT_ROOT'].'/batmix365/plugins/mobile_detect/Mobile_Detect.php');
//geting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_fULLname = mysqli_real_escape_string($conn, $row_info['full_name']);
$site_email = mysqli_real_escape_string($conn, $row_info['email']);
$site_phone1 = mysqli_real_escape_string($conn, $row_info['phone']);
$site_phone2 = mysqli_real_escape_string($conn, $row_info['phone2']);
$site_motto = mysqli_real_escape_string($conn, $row_info['motto']);
$site_AboutUs = mysqli_real_escape_string($conn, $row_info['about_us']);
$site_address = mysqli_real_escape_string($conn, $row_info['address']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_SmallLogo = mysqli_real_escape_string($conn, $row_info['small_logo']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);

$AccLoginObj = new acc_login();
if ($AccLoginObj->isLoggedIn()) {

 $userid =  $AccLoginObj->isLoggedIn();

        $username = "SELECT * FROM accountants WHERE id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['id'];
        
        $user_name = mysqli_real_escape_string($conn,  $row['username']);
        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
        

        

      //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='accountant'  limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);
      //getting total students
          $Querry_students = mysqli_query($conn, "SELECT * FROM students");
          $Total_Students = mysqli_num_rows($Querry_students);

          //getting total teachers or lecturers
          $Querry_students = mysqli_query($conn, "SELECT * FROM lecturers");
          $Total_teachers = mysqli_num_rows($Querry_students);
          
          //getting total accountants
          $Querry_accountants = mysqli_query($conn, "SELECT * FROM accountants");
          $Total_accountants = mysqli_num_rows($Querry_accountants);
          
           //getting total Librarians
          $Querry_lib = mysqli_query($conn, "SELECT * FROM librarians");
          $Total_librarians = mysqli_num_rows($Querry_lib);

        
        
       
include($_SERVER['DOCUMENT_ROOT'].'/edearth/panel/functions/time.php');
}

        ?>