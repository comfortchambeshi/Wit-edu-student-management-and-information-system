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
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_SmallLogo = mysqli_real_escape_string($conn, $row_info['small_logo']);
$site_BigLogo = mysqli_real_escape_string($conn, $row_info['big_logo']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);

$site_currency = mysqli_real_escape_string($conn, $row_info['currency']);
$site_currency_code = mysqli_real_escape_string($conn, $row_info['currency_code']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);

//Bank details

$site_bank_name = mysqli_real_escape_string($conn, $row_info['bank_name']);
$site_bank_acc_number = mysqli_real_escape_string($conn, $row_info['bank_acc_number']);
$site_bank_acc_name = mysqli_real_escape_string($conn, $row_info['bank_acc_name']);


$AdminLoginObj = new admin_login();
if ($AdminLoginObj->isadminlogged()) {

 $userid =  $AdminLoginObj->isadminlogged();

        $username = "SELECT * FROM administrators WHERE id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['id'];
        
        $user_name = mysqli_real_escape_string($conn,  $row['username']);
        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
         //$student_studentid = mysqli_real_escape_string($conn, $row['student_id']);
        //$user_rank = mysqli_real_escape_string($conn, $row['u_rank']);

        

      //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='accountant'  limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);
      //getting total students
          $Querry_students = mysqli_query($conn, "SELECT * FROM students");
          $Total_Students = mysqli_num_rows($Querry_students);

          //getting total teachers or lecturers
          $Querry_teachers = mysqli_query($conn, "SELECT * FROM lecturers");
          $Total_teachers = mysqli_num_rows($Querry_teachers);

           //getting total accountants
          $Querry_accountants = mysqli_query($conn, "SELECT * FROM accountants");
          $Total_accountants = mysqli_num_rows($Querry_accountants);
          
           //getting total Librarians
          $Querry_lib = mysqli_query($conn, "SELECT * FROM librarians");
          $Total_librarians = mysqli_num_rows($Querry_lib);
          
          
          
          
          
          //time ago function

//Creating Function
function FriendlyTimeAgo ($oldTime, $newTime) {
$timeCalc = strtotime($newTime) - strtotime($oldTime);
if ($timeCalc >= (60*60*24*30*12*2)){
 $timeCalc = intval($timeCalc/60/60/24/30/12) . " years ago";
 }else if ($timeCalc >= (60*60*24*30*12)){
 $timeCalc = intval($timeCalc/60/60/24/30/12) . " year ago";
 }else if ($timeCalc >= (60*60*24*30*2)){
 $timeCalc = intval($timeCalc/60/60/24/30) . " months ago";
 }else if ($timeCalc >= (60*60*24*30)){
 $timeCalc = intval($timeCalc/60/60/24/30) . " month ago";
 }else if ($timeCalc >= (60*60*24*2)){
 $timeCalc = intval($timeCalc/60/60/24) . " days ago";
 }else if ($timeCalc >= (60*60*24)){
 $timeCalc = " Yesterday";
 }else if ($timeCalc >= (60*60*2)){
 $timeCalc = intval($timeCalc/60/60) . " hours ago";
 }else if ($timeCalc >= (60*60)){
 $timeCalc = intval($timeCalc/60/60) . " hour ago";
 }else if ($timeCalc >= 60*2){
 $timeCalc = intval($timeCalc/60) . " minutes ago";
 }else if ($timeCalc >= 60){
 $timeCalc = intval($timeCalc/60) . " minute ago";
 }else if ($timeCalc > 0){
 $timeCalc .= " seconds ago";
 }
return $timeCalc;
}
 

//ending


       
        
       

}
?>