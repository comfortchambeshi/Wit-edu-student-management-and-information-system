<?php
include_once '../inc/auto-loader.php';
include_once '../functions/admin_header.php';
include_once '../inc/staff_login.php';
include_once '../inc/dbconnect.inc.php';
include_once '../inc/admin_mains.php';

include_once '../../classes/mail.php';

include_once '../../classes/replace.php';
?>




<?php

$logged_header = '';

$logged_header = header1($logged_header);


//Mailer

$mailer = new mail();



include_once '../inc/admin_sidebar.php';

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
            <h1 class="m-0 text-dark">Email settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Settings</a></li>
              <li class="breadcrumb-item active">Email settings</li>
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
                        <h5 class="text-info">Mailer settings</h5>
                        <div class="form-group"><em>Security</em>
                        <select name="mail_security" class="form-control">
                        <option value="'.$mailer::$security.'">SSL</option>
                        </select>
                        </div>
                        <div class="form-group"><em>Host</em>
                        <input required name="mail_host" placeholder="Email host" type="text" value="'.$mailer::$host.'"  class="form-control">
                        </div>

                        <div class="form-group"><em>Port</em>
                        <input required name="mail_port" placeholder="Email port" type="number" value="'.$mailer::$port.'"  class="form-control">
                        </div>
                        <div class="form-group"><em>Username</em>
                        <input name="mail_username" placeholder="Email username" type="email" value="'.$mailer::$username.'"  class="form-control">
                        </div>
                        <div class="form-group"><em>Password</em>
                        <input name="mail_password" placeholder="Email password" type="password" value="'.$mailer::$password.'"  class="form-control">
                        </div>
                        <div class="form-group"><em>Sender email</em>
                        <input name="sender_mail" placeholder="Sender email" type="email" value="'.$mailer::$setFrom.'"  class="form-control">
                        </div>
                       

                        <div class="form-group"><button class="btn btn-info btn-block" name="email_save_btn" type="submit">Save Changes!</button></div>
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



</div></div></div>

<?php
include '../inc/footer.php';
?>

<?php

if (isset($_POST['email_save_btn'])) {
  //Replace

$replace = new replace();
   
$mail_security = $_POST['mail_security'];
$mail_host = $_POST['mail_host'];
$mail_port = $_POST['mail_port'];
$mail_username = $_POST['mail_username'];
$mail_password = $_POST['mail_password'];
$mail_senderMail = $_POST['sender_mail'];

//Update mail file
$replace->updateEmail('../../classes/mail.php', $site_directory, 'ssl', $mail_host, $mail_port, $mail_username, $mail_password, $mail_senderMail);

echo '<script>alert("Email changes have been applied successfully!");
window.location.href = "email_settings.php";

	</script>';
}

?>