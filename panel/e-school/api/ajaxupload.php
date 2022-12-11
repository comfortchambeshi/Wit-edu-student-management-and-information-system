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
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../../uploads/attachments/'; // upload directory
if($_FILES['image'] == true)
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' />";


}
} 
else 
{
echo 'invalid';
}
}else{
   $final_image = '-'; 
    
}
$name = $_POST['summernote'];
$email = $_POST['email'];
$ClassId = $_POST["class_id"];
$body = $_POST["summernote"];
//include database configuration file

//insert form data in the database
 $Eschool = new eschool();
 $insertComment = $Eschool->insertComment($body, $ClassId, $fromType, $user_id, $final_image);
?>