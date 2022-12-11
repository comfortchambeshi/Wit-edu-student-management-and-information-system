<?php
//appearance
include($_SERVER['DOCUMENT_ROOT'].'/classes/mainInfo.php');

function header1($logged_header)
{    
include($_SERVER['DOCUMENT_ROOT'].'/inc/dbconnect.inc.php');



//geting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
$FullDir = $site_url."/".$site_directory;

$AdminLoginObj = new admin_login();
$userid =  $AdminLoginObj->isadminlogged();


 //fetch appearances
    $mainInfo = new mainInfo();
    $rowin = $mainInfo->getInfo();


$logged_header_bg = $rowin['logged_header_bg'];
$non_logged_header_bg = $rowin['non_logged_header_bg'];


//ending info

if ($AdminLoginObj->isadminlogged()) {
  //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$userid' AND to_type='admin' AND read_or_unread='unread' ORDER BY 1 DESC LIMIT 5");
          $MsgCounter = mysqli_num_rows($RunMsg);
          
          
         //getting unread alerts
         $GettingLoggedInAlerts = mysqli_query($conn, "SELECT * FROM user_alerts WHERE alert_to='$userid' AND alert_totype='admin' AND read_or_unread='unread' ORDER BY 1 DESC LIMIT 5");

  $countingUnreadAlerts =  mysqli_num_rows($GettingLoggedInAlerts);
  

    
echo '
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="'.$site_url.'/panel/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="'.$site_url.'/panel/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav style="background-color:'.$logged_header_bg.';" class="main-header navbar navbar-expand navbar-dark navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="'.$site_url.'/panel/index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">'.$MsgCounter.'</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         ';
         
         //gettig messages 
           $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$userid' AND to_type='student' AND read_or_unread='unread'");
          if($MsgCounter = mysqli_num_rows($RunMsg)){
              while($rowMsg = mysqli_fetch_assoc($RunMsg)){
              $msgId = mysqli_real_escape_string($conn, $rowMsg['id']);
              $msgTitle = mysqli_real_escape_string($conn, $rowMsg['msg_title']);
              $msgDate = mysqli_real_escape_string($conn, $rowMsg['datestatus']);
              $msgReadOrUnread = mysqli_real_escape_string($conn, $rowMsg['read_or_unread']);
              	
          
          echo '
          <div class="dropdown-divider"></div>
          <a href="student_read_msg.php?id='.$msgId.'" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  '.$msgReadOrUnread.'
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">'.$msgTitle.'</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '.$msgDate.'</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          
          
          ';
              }
          }
          else{
              
              echo '<p>No Messages Found!</p>';
          }
          
          echo'
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">'.$countingUnreadAlerts.'</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">'.$countingUnreadAlerts.' Notifications</span>
         ';
         if($countingUnreadAlerts > 0){
         while($rowAlerts = mysqli_fetch_assoc($GettingLoggedInAlerts)){
             $alertBody = mysqli_real_escape_string($conn, $rowAlerts['alert_info']);
             $alertUrl = mysqli_real_escape_string($conn, $rowAlerts['alert_url']);
             
             $alertDate = mysqli_real_escape_string($conn, FriendlyTimeAgo($rowAlerts['alert_date'], date("Y-m-d H:i:s")));
         echo '
          <div class="dropdown-divider"></div>
          <a href="'.$alertUrl.'" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> '.$alertBody.'
            <span class="float-right text-muted text-sm">'.$alertDate.'</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>';
        
         }
         }
         else{
             echo '<p>No Notfications Found!</p>';
         }
        echo '
      </li>
        <!-- User -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">'.$user_name.' </span>
          <div class="dropdown-divider"></div>
         
          <div class="dropdown-divider"></div>
          <form method="post" action="'.$site_url.'/panel/inc/admin_sout.inc.php"> <li> <button class="btn btn-block btn-danger" name="confirm" type="submit" ><i class="fa fa-sign-out"></i> Logout</button> </li></form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


          ';

                            echo '
                            
                     <div class="clearfix"> </div>  
                </div>
<!--heder end here-->';

}else{
    header("Location: ../login.php?sout=success");

      }}