<?php
include '../../classes/db.php';
include '../../classes/eschool.php';
include($_SERVER['DOCUMENT_ROOT'].'/inc/login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/teacher_login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/staff_login.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/lib_login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/parent_login_function.php');
if (Login::isLoggedIn()) {
    $user_id =  Login::isLoggedIn();

  $toType = 'student';
 $fromType = 'student';
 $ReplyFromType = 'student';
 $header = "student_read_msg.php";
 $rdr = 'messages.php';
   
       






}

elseif(teacher_Login::isLoggedIn()){
 
 $user_id =  teacher_Login::isLoggedIn();
 $toType = 'teacher';
 $fromType = 'teacher';




}
elseif(lib_Login::isLoggedIn()){

 
 $user_id = lib_Login::isLoggedIn();

 $fromType = 'teacher';




}


 
  $body = $_POST["summernote"];
  $ClassId = $_POST["class_id"];

  $Eschool = new eschool();
  $insertComment = $Eschool->insertComment($body, $ClassId, $fromType, $user_id);

 ?>
 
 