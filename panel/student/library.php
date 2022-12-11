<?php
include '../inc/auto-loader.php';
include '../inc/dbconnect.inc.php';
include('../inc/login_function.php');
include('../inc/teacher_login_function.php');

//include($_SERVER['DOCUMENT_ROOT'].'/inc/staff_login.php');
include('../inc/lib_login_function.php');
include('../inc/parent_login_function.php');
$LoginObj = new Login();
$TeacherLoginObj = new teacher_login();
$LibLoginObj = new lib_login();
if ($LoginObj->isLoggedIn()) {
    $user_id =  $LoginObj->isLoggedIn();

  $toType = 'student';
 $fromType = 'student';
 $ReplyFromType = 'student';
 $header = "student_read_msg.php";
 $rdr = '../messages.php';
   
       
include '../functions/header.php';


include '../inc/mains.php';


$logged_header = '';
$logged_header = header1($logged_header);
include '../inc/sidebar.php';


}

elseif($TeacherLoginObj->isLoggedIn()){
    include '../functions/teacher_header.php';

include '../inc/dbconnect.inc.php';
include '../inc/teacher_mains.php';
 $user_id =  $TeacherLoginObj->isLoggedIn();
 $toType = 'teacher';
 $fromType = 'teacher';
 $ReplyFromType = 'teacher';
 $header = "teacher_read_msg.php";
 $rdr = 'techer_messages.php';
 
 $userid = $TeacherLoginObj->isLoggedIn();
$logged_header = '';
$logged_header = header1($logged_header);
include '../inc/teacher_sidebar.php';



}
elseif($LibLoginObj->isLoggedIn()){

 include '../functions/lib_header.php';

include '../inc/dbconnect.inc.php';
include '../inc/lib_mains.php';
 $user_id = $TeacherLoginObj->isLoggedIn();
 $logged_header = '';
$logged_header = header1($logged_header);
 $toType = 'teacher';
 $fromType = 'teacher';


include '../inc/lib_sidebar.php';

}


echo '<title>Online Libray | '.$site_name.'</title>';

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Online Library</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Library</a></li>
              <li class="breadcrumb-item active">E-Library</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">


    <div class="login-clean">
        <h3 class="text-center" style="background-color: #efeeee;">Our E-Library</h3>
        <form enctype='multipart/form-data' method="post" method="POST" action=""  style="max-width: 100%;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input class="form-control" type="search" style="background-color: rgb(237,239,241);" placeholder="Search any book"></th>
                            <th><button class="btn btn-primary btn-block" type="button">Search books</button></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
           
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr></tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <form method="post" style="width: 100%;max-width: 90%;">
            <h2 class="sr-only">Login Form</h2><div class="photo-gallery">
<div class="container-fluid">
  <div class="px-lg-12">

    <div class="row" >
     
      <!-- Gallery item -->

      <?php

$QueryBooks = mysqli_query($conn, "SELECT * FROM library_books");
$CountBooks = mysqli_num_rows($QueryBooks);

if ($CountBooks > 0) {
    while ($RowBooks = mysqli_fetch_assoc($QueryBooks)) {
        $BookTitle = mysqli_real_escape_string($conn, $RowBooks['book_name']);
        $BookFile = mysqli_real_escape_string($conn, $RowBooks['book_file']);
        $BookCover = mysqli_real_escape_string($conn, $RowBooks['book_cover']);
        $BookTitle = mysqli_real_escape_string($conn, $RowBooks['book_name']);
        $uploaded_by = mysqli_real_escape_string($conn, $RowBooks['added_by']);
        //Getting user

        $Libusername = "SELECT * FROM librarians WHERE id='$uploaded_by' ORDER BY 1 DESC LIMIT 30";
        $Libresult = mysqli_query($conn, $Libusername);
        $Librow = mysqli_fetch_assoc($Libresult);

        


        $Libuser_id = $Librow['id'];
        
        $Libuser_name = mysqli_real_escape_string($conn,  $Librow['name']);
        $Libuser_image = mysqli_real_escape_string($conn, $Librow['profile_pic']);
        
        echo '<a href="../uploads/books/'.$BookFile.'"><div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><img src="images/books/'.$BookCover.'" alt="" class="img-fluid card-img-top">
          <div class="p-4">
            <h5> <a href="../uploads/books/'.$BookFile.'" class="text-dark">'.$BookTitle.'</a></h5>
            <p class="small text-muted mb-0"><i class="fa fa-user" aria-hidden="true"></i> '.$Libuser_name.'</p>
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
              <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Document</span></p>
              
            </div>
          </div>
        </div>
      </div></a>';
    }
}
else{
    echo "<h3> No books found in the E-Library, please contact the librarians!</h3>";
}
      ?>
      
      <!-- End -->

    </div>
    <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
  </div>
</div>
</div></form>
    </div>
  </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include '../inc/footer.php';
  ?>