<?php
include 'auto-loader.php';
include('../inc/dbconnect.inc.php');
include('../inc/login_function.php');
include('../inc/teacher_login_function.php');
include('../inc/staff_login.php');
include('../inc/lib_login_function.php');
include('../inc/parent_login_function.php');




include('acc_login_function.php');
//Getting main info

$admin_login = new admin_login();
$student_login = new Login();
$teacher_Login = new teacher_Login();
$acc_Login = new acc_Login();
$lib_Login = new lib_Login();

if ($admin_login->isadminlogged()) {
  $user_id =  $admin_login->isadminlogged();
$toType = 'admin';
 $fromType = 'admin';
 $ReplyFromType = 'admin';
$header = "read_msg.php";
$rdr = 'admin_messages.php';

}

elseif ($student_login->isLoggedIn()) {
    $user_id =  $student_login->isLoggedIn();

  $toType = 'student';
 $fromType = 'student';
 $ReplyFromType = 'student';
 $header = "student/student_read_msg.php";
 $rdr = 'messages.php';
   
       



}
elseif($teacher_Login->isLoggedIn()){
 $user_id =  $teacher_Login;
 $toType = 'teacher';
 $fromType = 'teacher';
 $ReplyFromType = 'teacher';
 $header = "teacher_read_msg.php";
 $rdr = 'teacher_messages.php';
 
 



}
elseif($acc_Login->isLoggedIn()){

  $fromtype = 'acc';
  $user_id =  $acc_Login->isLoggedIn();
 $ReplyFromType = 'acc';

 $header = "acc_read_msg.php";
 $rdr = 'acc_messages.php';

}
elseif($lib_Login->isLoggedIn()){

$user_id =  $lib_Login->isLoggedIn();
 
   $ReplyFromType = 'lib';
 $fromType = 'lib';
 $header = "lib_read_msg.php";
 $rdr = 'lib_messages.php';

}
elseif(parent_Login::isLoggedIn()){

  $user_id =  parent_Login::isLoggedIn();
   
     $ReplyFromType = 'lib';
   $fromType = 'lib';
   $header = "lib_read_msg.php";
   $rdr = 'parent_messages.php';
  
  }



$insert = new datageter();


if (isset($_POST['msgbtn'])&&isset($_GET['totype']) && isset($_GET['fromtype']) && isset($_GET['msg_to'])) {
	$MessageBody = $_POST['msg_body'];
	$totype = $_GET['totype'];
	$MessageTo = $_GET['msg_to'];
	$fromtype = $_GET['fromtype'];
$date = date('Y-m-d H:i:s');

	$insertNow = mysqli_query($conn, "INSERT INTO messages(msg_from, sent_to, read_or_unread, viewed, body, datestatus, to_type, from_type) VALUES('$user_id', '$MessageTo', 'unread', 'no', '$MessageBody', '$date', '$totype', '$fromtype')");
     $last_id = $conn->insert_id;
     header('LOCATION: ../'.$header.'?id='.$last_id.'');
	
}
elseif (isset($_POST['reply_btn'] ) &&isset($_GET['totype']) && isset($_GET['fromtype']) && isset($_GET['msg_to'])&& isset($_GET['msg_id'])) {
  $MessageBody = $_POST['reply_body'];
	$totype = $_GET['totype'];
	$MessageTo = $_GET['msg_to'];
  $fromtype = $_GET['fromtype'];
  $msg_id = $_GET['msg_id'];
  $date = date('Y-m-d H:i:s');
  

  $InsertReply = mysqli_query($conn, "INSERT INTO messages_replys (date_sent,from_u, sent_to, body, to_type, from_type, msg_id, msg_from) VALUES('$date', '$user_id', '$MessageTo', '$MessageBody', '$totype', '$ReplyFromType', '$msg_id', '$user_id')");
  if ($InsertReply) {
    header('LOCATION: ../'.$header.'?id='.$msg_id.'');
  }
  else {
    echo mysqli_error($conn);
  }
}








?>