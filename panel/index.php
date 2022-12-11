<?php
include '../inc/auto-loader.php';
include('../panel/inc/dbconnect.inc.php');
include('../panel/inc/login_function.php');
include('../panel/inc/teacher_login_function.php');
include('../panel/inc/staff_login.php');
include('../panel/inc/lib_login_function.php');
include('../panel/inc/parent_login_function.php');
include('../panel/inc/acc_login_function.php');

$Login = new Login();
$AdminLoginObj = new admin_login();
$TeacherLoginObj = new teacher_login();
$AccLoginObj = new acc_login();
$LibLoginObj = new lib_login();
$ParentLoginObj = new parent_login();

//ending info

if ($AdminLoginObj->isadminlogged()) {
   
//redirection to admin panel
   header("Location: admin.php");


}

elseif ($Login->isLoggedIn()) {

	//redirection to student panel
   header("Location: student.php");
    
        



}
elseif($TeacherLoginObj->isLoggedIn()){
 
  


    //redirection to admin panel
   header("Location: teacher.php");

}
elseif($AccLoginObj->isLoggedIn()){


    //redirection to accountant panel
   header("Location: accountant.php");

}
elseif($LibLoginObj->isLoggedIn()){

$user_id =  $LibLoginObj->isLoggedIn();
    //redirection to librarian panel
   header("Location: librarian.php");

}
elseif($ParentLoginObj->isLoggedIn()){
   $user_id =  $ParentLoginObj->isLoggedIn();
       //redirection to librarian panel
      header("Location: parent.php");
   
   }
else{
	//$user_id =  teacher_Login::isLoggedIn();
   header("Location: ../login.php?sout=success");
}
?>