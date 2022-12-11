<?php
include '../inc/auto-loader.php';
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';


$logged_header = '';

$logged_header = header1($logged_header);



$class = new delete();
include 'inc/admin_sidebar.php';

?>

<!DOCTYPE html>
<html>
<head>

	
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

<h6 class="text-center"><!-- Button trigger modal -->
<a href="post_news.php" type="link" class="btn btn-primary">
  Post news
</a>


    <hr>

 
 
  <div class="row">
      <div style="margin-left:10px;"  class="card">
  	<?php
echo '<div class="page-container">	<title>Manage site news | '.$site_name.'</title>';
$GetNews = mysqli_query($conn, "SELECT * FROM news ORDER BY 1 DESC LIMIT 20");
if (mysqli_num_rows($GetNews)) {

	while ($RowNews = mysqli_fetch_assoc($GetNews)) {
		$NewsTitle = mysqli_real_escape_string($conn, $RowNews['title']);
       $NewsDate = mysqli_real_escape_string($conn, $RowNews['date']);
		$NewsBody = $RowNews['body'];
		$NewsId = mysqli_real_escape_string($conn, $RowNews['id']);
		$NewsCover = mysqli_real_escape_string($conn, $RowNews['cover_file']);
		$NewsBy = mysqli_real_escape_string($conn, $RowNews['added_by']);

		//Getting admin details
		$GetAdmin = mysqli_query($conn, "SELECT * FROM administrators where id='$NewsBy'");
		$rowAdmins = mysqli_fetch_assoc($GetAdmin);
		$Admin_uname = mysqli_real_escape_string($conn, $rowAdmins['username']);
		$Admin_pic = mysqli_real_escape_string($conn, $rowAdmins['profile_pic']);

		echo 
		'<form action="?id='.$NewsId.'" method="POST">
		<div class="col-lg-12 col-sm-12 col-12">
      <div class="row">
        <div class="col-lg-2 col-sm-2 col-5">
          <img src="images/news/'.$NewsCover.'" class="img-thumbnail" width="150px">
        </div>
        <div class="bg-white col-lg-10 col-sm-10 col-7">
          <h4 class="text-primary">'.$NewsTitle.'</h4>
           
          <button type="submit" name="delete_btn" class="btn btn-sm btn-danger">Delete</button>
        </div>
      </div>
      <div class="row post-detail">
        <div class="col-lg-12 col-sm-12 col-12">
            <ul class="list-inline">
              <li class="list-inline-item">
                <img src="uploads/admins_profiles/'.$Admin_pic.'" class="rounded-circle" width="20px"> <span>by</span> <span class="text-info">'.$Admin_uname.'</span>
              </li>
              <li class="list-inline-item">
                <i class="fa fa-calendar" aria-hidden="true"></i> <span>'.$NewsDate.'</span>
              </li>
              
             
              
            </ul>
        </div>
      </div>
    </div></form>
		';
	}
	
}

  	?>
  	
  	<?php

if(isset($_POST['delete_btn']) && isset($_GET['id'])){
    $del_id = $_GET['id'];
   
    $DeleteSlider = $class->deletenews($del_id);
}


?>
    
  </div>
</div>
</div></div></div></div></div></div></div></div></div></div>
<?php
include 'inc/footer.php';
?>

