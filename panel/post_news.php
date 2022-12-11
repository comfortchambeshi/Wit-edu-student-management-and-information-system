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
<title>Post news | Fourskilllevels Accademy</title>
	
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

</head>
<body>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          
        </div>
      </div><!-- /.container-fluid -->
    </section>


<hr>
<div class="container"> 
<form action="inc/upload_news.inc.php" method="POST" enctype="multipart/form-data" >

<div class="d-flex flex-column justify-content-center" id="login-box">
        <div class="login-box-header">
           
        </div>
        <div class="email-login" style="background-color:#ffffff;">
            <div class="form-group border rounded">
                <p style="background-color: #f76969;color: rgb(0,0,0);"><strong> title</strong></p><input size="large" type="text"  style="margin-top: 10px;background-color: rgb(248,248,248);" class="text-imput form-control" required="You need to fill this field before you continue!" placeholder=" news title"  name="news_title"></div>
            <div class="form-group border rounded">
                <p style="background-color: #f76969;color: rgb(0,0,0);"><strong> cover image</strong></p><input class="border rounded-0 border-danger" type="file" name="news_image" accept="image/*" required=""></div>
            
            <div class="form-group border rounded">
                <p style="background-color: #f76969;color: rgb(0,0,0);"><strong> description</strong></p><textarea required="" id="summernote" name="music_description" class="textarea" placeholder="news description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                          <h4 class="text-center"><button name="news_btn" type="submit" class="btn btn-primary btn-block">Publish</button></h4>




                           <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
  </div></div></div></div></div></div></div></div></div></div>
<?php
include 'inc/footer.php';
?>