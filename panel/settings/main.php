<?php
include '../inc/auto-loader.php';
include '../functions/admin_header.php';
include '../inc/staff_login.php';
include '../inc/dbconnect.inc.php';
include '../inc/admin_mains.php';


$logged_header = '';

$logged_header = header1($logged_header);




include '../inc/admin_sidebar.php';

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
            <h1 class="m-0 text-dark">Main Site Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Settings</a></li>
              <li class="breadcrumb-item active">Main Site Info</li>
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
	<?php

//include '../inc/dbconnect.inc.php';
//include '../inc/staff_login.php';
//include '../inc/admin_mains.php';
 $Insert = new datageter();
echo ' <title>Main site site | '.$site_name.'</title>';
include 'includes/side_bar.php';
    echo '
    

                <div class="col-md-8">
                    <form action="#" method="post" style="width: 100%;max-width: 100%;">
                        <h2 class="sr-only">Login Form</h2>
                        <h5 class="text-info">Contact Details</h5>
                        <div class="form-group"><em>Contact Email</em><input class="form-control" type="email" name="email" value="'.$site_email.'"></div>
                        <div class="form-group"><em>Contact Phone numbers</em><input class="form-control" type="text" name="line2" value="'.$site_phone1.'"><input class="form-control" type="text" name="line1" value="'.$site_phone2.'">

                            
                        </div>

                        <div class="form-group"><em>Address</em><input class="form-control" type="text" name="address" value="'.$site_address.'">
                        </div>

                      

                        <h5 class="text-info">School Details.</h5>
                        <div class="form-group"><em>Schoo Full Name</em><input class="form-control" type="text" name="fullname" value="'.$site_fULLname.'"></div>
                        <div class="form-group"><em>Schoo Short name(E.g: FSLA)</em><input class="form-control" type="text" name="school_abb" value="'.$site_name.'"></div>
                        <div class="form-group"><em>Motto</em><textarea " name="motto" class="form-control">'.$site_motto.'</textarea></div>
                        <div class="form-group"><em>About us</em><textarea name="about_us" class="form-control">'.$site_AboutUs.'</textarea></div>
                        <h5 class="text-info">Web address</h5>
                        <div class="form-group"><em>To change the web address please make sure that you contact the developers for support: devs@witlevels.com</em><input name="url" class="form-control" type="text" name="school_abb" value="'.$site_url.'" ></div>
                        <div class="form-group"><button class="btn btn-info btn-block" name="save_btn" type="submit">Save Changes!</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>';


?>

<?php

if (isset($_POST['save_btn'])) {
   
$siteName = $_POST['school_abb'];
$siteEmail = $_POST['email'];
$siteFullName = $_POST['fullname'];
$siteAdress = $_POST['address'];
$siteMotto = $_POST['motto'];
$siteAboutUs = $_POST['about_us'];
$sitePhoneNumber1 = $_POST['line1'];
$sitePhoneNumber2 = $_POST['line2'];
$siteUrl = $_POST['url'];

   $insertData =  $Insert->createInfo($siteName, $siteEmail, $sitePhoneNumber1, $siteAdress, $siteAboutUs, $sitePhoneNumber2, $siteMotto, $siteFullName, $siteUrl);

	echo '<script>alert("Your changes has been applied successfully!");
window.location.href = "main.php";

	</script>';
}

?>

<?php
include '../inc/footer.php';
?>