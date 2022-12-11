<?php
include '../inc/auto-loader.php';
include '../functions/admin_header.php';
include '../inc/staff_login.php';
include '../inc/dbconnect.inc.php';
include '../inc/admin_mains.php';
//Main class
include '../classes/main.php';
$main = new main();

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
echo ' <title>Customize images| '.$site_name.'</title>';
include 'includes/side_bar.php';
    echo '
    

                <div class="col-md-8">
                    
                        <h2 class="sr-only">Login Form</h2>
                        <form enctype="multipart/form-data" action="#" method="post" style="width: 100%;max-width: 100%;">
                        <h5 class="text-info">Small logo icon</h5>
                        <div class="form-group">
                        <img style="width:100px;" src="'.$site_url.'/panel/uploads/logos/'.$site_SmallLogo.'" alt="Small image logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        
                        <em><input required=""  type="file" name="small_logo" value="logo.png"></em>
                        <div class="btn-group">
                        <button name="small_imgbtn" class="btn btn-info" type="submit"> UPADTE</a>
                        </form>
                        </div>


                        </div>
                        <form enctype="multipart/form-data" action="#" method="post" style="width: 100%;max-width: 100%;">
                         <h5 class="text-info">Main logo image</h5>
                        <div class="form-group">
                         <img  src="'.$site_url.'/panel/uploads/logos/'.$site_BigLogo.'" alt="Big banner" class="brand-image img-thumb elevation-3"
           style="opacity: .8">
                        <em>
                        
                        <input required=""   type="file" name="big_logo" ></em>
                        <div class="btn-group">
                        <button name="big_imgbtn" class="btn btn-info" type="submit"> UPADTE</a>
                        

                            
                        </div>

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

   $insertData =  $Insert->createInfo($siteName, $siteEmail, $sitePhoneNumber1, $siteAdress, $siteAboutUs, $sitePhoneNumber2, $siteMotto, $siteFullName);

	echo '<script>alert("Your changes has been applied successfully!");
window.location.href = "main.php";

	</script>';
}


//class for image updates in database
class updateImages extends db{
    
    public function update_small($image){
        $sql = "UPDATE site_info SET small_logo=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$image]);
    }
    //Update big logo
    
     public function update_big($image){
        $sql = "UPDATE site_info SET big_logo=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$image]);
    }
}

//Small image upadte
if(isset($_POST['small_imgbtn'])){
    $logo_file = $_FILES['small_logo'];
    
    
    //allowed extensions
    $extensions = array('jpg', 'gif', 'png', 'jpeg');
    $fileUploader = $main->file_uploaders($logo_file,'../uploads/logos/', $extensions);
    
    
    

//Calling small image updatator
$updater = new updateImages();
$small_img = $updater->update_small($fileUploader);


   
    
    
    echo '<script>alert("Small image logo applied successfully!");
window.location.href = "images.php";

	</script>';
    
    
}

//Small image update
if(isset($_POST['big_imgbtn'])){
    $logo_file = $_FILES['big_logo'];
    
    
    //allowed extensions
    $extensions = array('jpg', 'gif', 'png', 'jpeg');
    $fileUploader = $main->file_uploaders($logo_file,'../uploads/logos/', $extensions);
    
    
    

//Calling small image updatator
$updater = new updateImages();
$small_img = $updater->update_big($fileUploader);


   
    
    
    echo '<script>alert("Big image logo applied successfully!");
window.location.href = "images.php";

	</script>';
    
    
}

?>


<br>

</div></div></div></div></div></div></div></div></div></div>
<?php
include '../inc/footer.php';
?>