<?php
include '../inc/auto-loader.php';
include '../inc/dbconnect.inc.php';
include '../inc/staff_login.php';
include '../inc/admin_mains.php';
include '../functions/admin_header.php';


$logged_header = '';

$logged_header = header1($logged_header);





//appearance


 //fetch appearances
    $mainInfo = new mainInfo();
    $rowin = $mainInfo->getInfo();


$logged_header_bg = $rowin['logged_header_bg'];
$non_logged_header_bg = $rowin['non_logged_header_bg'];

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
              <li class="breadcrumb-item active">Appearance</li>
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
echo ' <title>Appearance| '.$site_name.'</title>';
include 'includes/side_bar.php';
    echo '
    

                <div class="col-md-8">
                    
                        <h2 class="sr-only">Login Form</h2>
                        <form enctype="multipart/form-data" action="#" method="post" style="width: 100%;max-width: 100%;">
                        <h5 class="text-info">panel header background color(before logging in)</h5>
                        <div class="form-group">
                       
        
                        <em><input required="" value="'.$non_logged_header_bg.'"  type="color" name="non_logged" value="logo.png">
                         Header color for non-logged in users
                        </em>
                        <div class="btn-group">
                        
                        
                        </div>


                        </div>
                        
                         <h5 class="text-info">panel header background color(Header for logged in users)</h5>
                        <div class="form-group">
                        
                        <em>
                       
                        <input required="" value="'.$logged_header_bg.'"   type="color" name="logged" > Header color for logged in users</em>
                         <hr>
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

//class for image updates in database
class UpdateAppearnces extends db{
    
    public function update_appearance($logged_header,$non_loggedheader){
        $sql = "UPDATE appearance SET logged_header_bg=?, non_logged_header_bg=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$logged_header, $non_loggedheader]);
    }
  
}
if (isset($_POST['save_btn'])) {
    $update = new UpdateAppearnces();
   
$logged = $_POST['logged'];
$non_logged = $_POST['non_logged'];


   $insertData =  $update->update_appearance($logged,$non_logged);

	echo '<script>alert("Your changes have been applied successfully!");
window.location.href = "apperance.php";

	</script>';
}




?>


<br>

</div></div></div></div></div></div></div></div></div></div>
<?php
include '../inc/footer.php';
?>