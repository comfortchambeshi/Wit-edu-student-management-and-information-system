<?php
include '../inc/auto-loader.php';
include '../inc/dbconnect.inc.php';
include '../classes/profile.php';
include('../inc/login_function.php');
include('../inc/teacher_login_function.php');
include('../inc/dbconnect.inc.php');
//include($_SERVER['DOCUMENT_ROOT'].'/inc/staff_login.php');
include('../inc/lib_login_function.php');
include('../inc/parent_login_function.php');

$profile = new profile();
$LoginObj = new Login();
if ($LoginObj->isLoggedIn()) {
    $user_id =  $LoginObj->isLoggedIn();

  $toType = 'student';
 $fromType = 'student';
 $ReplyFromType = 'student';
 $header = "student_read_msg.php";
 $rdr = 'messages.php';
   
       
include '../functions/header.php';


include '../inc/mains.php';


$userid =  $LoginObj->isLoggedIn();
$logged_header = '';
$logged_header = header1($logged_header);
include '../inc/sidebar.php';

echo $profile->student_profile($user_fname,$user_lname,$user_image,$student_class,$student_citytown,$BalanceToPay,$user_email,$phoneNumber,$student_year,$student_mode,$user_semester);


}

elseif(teacher_Login::isLoggedIn()){
    include 'functions/teacher_header.php';

include 'inc/dbconnect.inc.php';
include 'inc/teacher_mains.php';
 $user_id =  teacher_Login::isLoggedIn();
 $toType = 'teacher';
 $fromType = 'teacher';
 $ReplyFromType = 'teacher';
 $header = "teacher_read_msg.php";
 $rdr = 'techer_messages.php';
 
 $userid =  Login::isLoggedIn();
$logged_header = '';
$logged_header = header1($logged_header);
include 'inc/teacher_sidebar.php';



}
elseif(lib_Login::isLoggedIn()){

 include 'functions/lib_header.php';

include 'inc/dbconnect.inc.php';
include 'inc/lib_mains.php';
 $user_id = lib_Login::isLoggedIn();
 $logged_header = '';
$logged_header = header1($logged_header);
 $toType = 'teacher';
 $fromType = 'teacher';


include 'inc/lib_sidebar.php';

}


echo '<title>My profile | '.$site_name.'</title>';

?>



  
  <?php
  //Updating student details
  if(isset($_POST['update_sbtn'])){
      
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $class = $_POST['class'];
      $email = $_POST['email'];
      $phone_number = $_POST['phone_number'];
      $profile->update_StudentProfile($first_name,$last_name,$class,$email,$phone_number,$user_id);
       echo '<script>alert("Profile updated successfull!");
				window.location.href = "profile.php";
				
					</script>';
  }
  
  //Changing student password
  if(isset($_POST['student_passwordbtn'])){
      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
      
      $hashed_password = password_hash($new_password , PASSWORD_DEFAULT);
      
      $profile->student_password($old_password, $hashed_password,$user_id );
  }
  
  include '../inc/footer.php';
  ?>
  
  
  <!-- Modal -->
<div class="modal fade" id="student_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Old Password</label>
    <input name="old_password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Old Password">
    <small id="emailHelp" class="form-text text-muted">the current password.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="new_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input required="" type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">I have masterd the new password</label>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="student_passwordbtn" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>