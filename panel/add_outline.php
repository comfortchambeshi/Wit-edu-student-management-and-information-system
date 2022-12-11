<?php
include '../inc/auto-loader.php';
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';


$logged_header = '';

$logged_header = header1($logged_header);




include 'inc/admin_sidebar.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="assets/css/footer-copyright_bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap Core CSS -->

<!-- Custom CSS -->


<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
</head>

<body>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          

  <?php
        if (isset($_GET['id'])) {
          $ProgrammeIDGet = mysqli_real_escape_string($conn, $_GET['id']);
           $RealProg = mysqli_query($conn, "SELECT * FROM programmes WHERE id='$ProgrammeIDGet'");
          $RowRealProg = mysqli_fetch_assoc($RealProg);
          $Name = mysqli_real_escape_string($conn,  $RowRealProg['name']);
          
          
          echo '<title>Add Outline to '.$Name.'  | '.$site_name.'</title>
          
            <h1 class="m-0 text-dark">'.$Name.'</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="'.$site_url.'/panel/course_list.php">Programmes</a></li>
              <li class="breadcrumb-item active">Add Outline</li>
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
<hr>
<div class="container"> 
          ';
          
          echo '
<form action="inc/upload_outline.inc.php?id='.$ProgrammeIDGet.'" method="POST" enctype="multipart/form-data" >
';
}
?>
<div class="d-flex flex-column justify-content-center" id="login-box">
        <div class="login-box-header">
           
        </div>
        <div class="email-login" style="background-color:#ffffff;">
            <div class="form-group border rounded">
                <p style="background-color: #f76969;color: rgb(0,0,0);"><strong> Subject Name</strong></p><input size="large" type="text"  style="margin-top: 10px;background-color: rgb(248,248,248);" class="text-imput form-control" required="You need to fill this field before you continue!" placeholder=" Subject Name"  name="outline_title"></div>
          
            
            <div class="form-group border rounded">
                <p style="background-color: #f76969;color: rgb(0,0,0);"><strong> description</strong></p><textarea required="" id="summernote" name="music_description" class="textarea" placeholder="Course outline description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                          <h4 class="text-center"><button name="outline_btn" type="submit" class="btn btn-primary btn-block">Add</button></h4>




                           <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
  
  
  </div></div></div></div></div></div></div></div></div></div>
<?php
include 'inc/footer.php';
?>