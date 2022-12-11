<?php
include '../inc/auto-loader.php';
include 'functions/header.php';
include 'inc/login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/mains.php';



$logged_header = '';
$logged_header = header1($logged_header);
include 'inc/sidebar.php';

echo '<title>Payment successfull | '.$site_name.'</title>';

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Payment submitted</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Payments</a></li>
              <li class="breadcrumb-item active">Submitted</li>
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

<body>
   
<?php

include 'inc/sidebar.php';

            ?>

    <br>
    <hr>

<?php
echo '
<div role="alert" class="alert text-success alert-success" style="background-color: rgb(240,255,243);"><h6 style="color: #1a538a;"><strong>Your payment has been submitted successfully. All you have to do is to wait for the confirmation email and notification!</strong>.</h6></div>';


?>

</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include 'inc/footer.php';
  ?>