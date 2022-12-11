<?php


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="../assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="../assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="../assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="../assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="../assets/css/footer-copyright_bar.css">
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="../assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="../assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="../assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
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
	<?php
include '../panel/classes/db.php';
include '../inc/dbconnect.inc.php';
include '../panel/classes/interactor.php';
include '../panel/classes/datageter.php';






//mobile detect
//include($_SERVER['DOCUMENT_ROOT'].'/batmix365/plugins/mobile_detect/Mobile_Detect.php');
//geting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_fULLname = mysqli_real_escape_string($conn, $row_info['full_name']);
$site_email = mysqli_real_escape_string($conn, $row_info['email']);
$site_phone1 = mysqli_real_escape_string($conn, $row_info['phone']);
$site_phone2 = mysqli_real_escape_string($conn, $row_info['phone2']);
$site_motto = mysqli_real_escape_string($conn, $row_info['motto']);
$site_AboutUs = mysqli_real_escape_string($conn, $row_info['about_us']);
$site_address = mysqli_real_escape_string($conn, $row_info['address']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}
$FullUrl = $protocol.$_SERVER['HTTP_HOST'];

 $Insert = new datageter();
echo ' <title>Main site site | '.$site_name.'</title>';

    echo '
    <div></div>
    <div style="margin-top: 60px;"></div>
    <div class="login-clean" style="margin-top: -73px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6>Site Settings</h6>
                    <ul class="list-group">
                        <li class="list-group-item"><span>Main info</span></li>
                        
                    </ul>
                </div>

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
                        <div class="form-group"><em>To change the web address please make sure that you contact the developers for support: devs@fourskilllevels.com</em><input class="form-control" type="text" name="school_abb" value="'.$FullUrl.'" disabled=""></div>
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



   $insertData =  $Insert->createInfo($siteName, $siteEmail, $sitePhoneNumber1, $siteAdress, $siteAboutUs,  $sitePhoneNumber2, $siteMotto, $siteFullName,$FullUrl);

	echo '<script>alert("Your changes has been applied successfully and you can now login to the admin panel!");
window.location.href = "../login.php";

	</script>';
}

?>