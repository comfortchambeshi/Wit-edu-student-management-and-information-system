

<?php

function header1($logged_header)
{    
    include($_SERVER['DOCUMENT_ROOT'].'/batmix365/inc/dbconnect.inc.php');
      include($_SERVER['DOCUMENT_ROOT'].'/batmix365/functions/date_function.php');
    
    //include './inc/login_function.php';

  






if (Login::isLoggedIn()) {


 $userid =  Login::isLoggedIn();

        $username = "SELECT * FROM users WHERE id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['id'];
        
        $user_name = mysqli_real_escape_string($conn,  $row['username']);
        $user_image = mysqli_real_escape_string($conn, $row['u_img']);
        $user_rank = mysqli_real_escape_string($conn, $row['u_rank']);
         $user_package = mysqli_real_escape_string($conn, $row['u_package']);
        
        //gettingshopping cart details
      $Cart_query = mysqli_query($conn,  "SELECT SUM(item_cost) AS 'sumitem_cost' FROM shopping_cart WHERE cart_status='pending' ");
    
      $Cart_data = mysqli_fetch_array($Cart_query);
      $Cart_price = $Cart_data['sumitem_cost'];

         
        //getting all uploads count
        $getUploadsoflogged = mysqli_query($conn, "SELECT * FROM uploads where uploaded_by='$user_name'");
        $number_of_iploads = mysqli_num_rows($getUploadsoflogged);
        

        //admin & moderator counters

        $searchCounter = mysqli_query($conn, "SELECT * FROM support_tickets where support_ticket_status='pending'");
        $countUnread = mysqli_num_rows($searchCounter);
        //getting unread alerts
         $GettingLoggedInAlerts = mysqli_query($conn, "SELECT * FROM user_alerts where alert_to=$user_id AND read_or_unread='unread'");
  $countingUnreadAlerts =  mysqli_num_rows($GettingLoggedInAlerts);
        //searching pending help 
        $searchHelpsPending = mysqli_query($conn, "select * from help_service where status='pending'");
        $countUnreadHelps = mysqli_num_rows($searchHelpsPending);
        //site info
        $getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
       
echo '
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/acp8783/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Roboto.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/--mp---Multiple-items-slider-responsive.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/A-Blog-Page.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components.min-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.core.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.core.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.extra-components.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.extra-components.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.pages.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.pages.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.plugins.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.plugins.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Bootstrap-4---Photo-Gallery.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Elegant-Registration-Form.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Grid-and-List-view-V10-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Grid-and-List-view-V10.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Login-Box-En.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/MUSA_carousel-product-cart-slider-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/MUSA_carousel-product-cart-slider.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Shopping-Grid.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Sidebar-1-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'assets/css/Sidebar-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/styles.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Team-Grid.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Team-with-rotating-cards.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Testimonial-Slider-9-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Testimonial-Slider-9.css">

    
</head>
    ';


    echo '
          <div class="row">
                    <div class="col-md-12" style="padding-left: 1px;padding-right: 1px;">
                        <div></div>
                        <!-- Start: Navigation with Search -->
                        <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-search" style="background-color: #c22a2a;color: rgb(247,249,252);padding-left: 55px;margin-bottom: 30px;padding-bottom: 10px;">
                            <div class="container"><button data-toggle="collapse" class="navbar-toggler text-danger" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"><i class="fa fa-th-list"></i></span></button>
                                <div class="collapse navbar-collapse"
                                    id="navcol-1" style="background-color: #c22a2a;">
                                    <ul class="nav navbar-nav">
                                        <li class="nav-item" role="presentation"></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="base.php" style="color: rgb(247,249,252);"><strong>Base</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="'.$site_url.'/'.$site_directory.'/audios.php" style="color: rgb(247,249,252);"><strong>Audios</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="'.$site_url.'/'.$site_directory.'/videos.php" style="color: rgb(247,249,252);"><strong>Videos</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="'.$site_url.'/'.$site_directory.'/biographies.php" style="color: rgb(247,249,252);"><strong>Biographies</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="'.$site_url.'/'.$site_directory.'/music_lyrics.php" style="color: rgb(247,249,252);"><strong>Lyrics</strong></a></li>
                                    </ul>
                                    <form class="form-inline mr-auto" target="_self">
                                        <div class="form-group" style="color: rgb(255,255,255);"><label for="search-field"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                                    </form>
                                    <a class="btn btn-light action-button" role="button" href="'.$site_url.'/'.$site_directory.'/choose_cat.php" style="background-color: #ea6a6a;"><i class="fas fa-cloud-upload-alt"></i></a>

<a class="btn btn-light action-button nav-link" role="button" data-toggle="dropdown" href="#" style="background-color: #ea6a6a;">
                                    <i class="far fa-bell"></i>  <span class="badge badge-warning navbar-badge">('.$countingUnreadAlerts.')</span></a>

                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">('.$countingUnreadAlerts.') Notifications</span>
          

                                  ';

                                  $GettingAlertsByLoggedUser = mysqli_query($conn, "SELECT * FROM user_alerts where alert_to='$user_id' ORDER BY 1 DESC LIMIT 5");
  $CountingAlerts = mysqli_num_rows($GettingAlertsByLoggedUser);

  if ($CountingAlerts > 0) {
     while ($rowAlertsByUser = mysqli_fetch_assoc($GettingAlertsByLoggedUser)) {
        $AlertId = mysqli_real_escape_string($conn, $rowAlertsByUser['id']);
        $AlertInfo = mysqli_real_escape_string($conn, $rowAlertsByUser['alert_info']);
        $AlertDate = mysqli_real_escape_string($conn, $rowAlertsByUser['alert_date']);
        $ReadOrUnread = mysqli_real_escape_string($conn, $rowAlertsByUser['read_or_unread']);
        $AlertUrl = mysqli_real_escape_string($conn, $rowAlertsByUser['alert_url']);
        $AlertInfoId = mysqli_real_escape_string($conn, $rowAlertsByUser['info_id']);
  if ($ReadOrUnread == 'unread') {
    echo '

                            <div class="dropdown-divider"></div>                   
         <form method="post" action="redirectors/alert_rdr.php?id='.$AlertInfoId.'&alert_id='.$AlertId.'">
         <a href="#"> <button name="alert_button" class="btn btn-success btn-block" type="submit" style="background-color: rgb(212,237,218);
  color: rgb(21,87,36);"  class="dropdown-item">
            <i class="fas fa-file mr-2"></i> '.$AlertInfo.'
            <br class="float-right text-muted text-sm">2 days</span>
          </button></a></form><div class="dropdown-divider"></div>      
          

        ';


  }
  else{

    echo '

                                 
                            <div class="dropdown-divider"></div>               
         
         <a href="#"> <a href="'.$AlertUrl.'" name="alert_button" class="btn btn-light btn-block" type="link" style="
  color: #911919;"  class="dropdown-item">
            <i class="fas fa-file mr-2"></i>'.$AlertInfo.'
            <br class="float-right text-muted text-sm">2 days</span>
          </a></a></form><div class="dropdown-divider"></div>      
          

        ';
        

    }
  }
}

        echo '
        <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>


                                    <a class="btn btn-light action-button" role="button" href="register.php" style="background-color: #ea6a6a;">Register</a></div>
                            </div>
                        </nav>
                        <!-- End: Navigation with Search -->
                    </div>
                </div>
            </div>




          ';
}else{

     $userid =  Login::isLoggedIn();

        $username = "SELECT * FROM users WHERE id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


       
        

      
        //searching pending help 
        $searchHelpsPending = mysqli_query($conn, "select * from help_service where status='pending'");
        $countUnreadHelps = mysqli_num_rows($searchHelpsPending);
        //site info
        $getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
       
echo '
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Roboto.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/--mp---Multiple-items-slider-responsive.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/A-Blog-Page.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components.min-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.components.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.core.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.core.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.extra-components.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.extra-components.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.pages.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.pages.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.plugins.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/adminlte.plugins.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Bootstrap-4---Photo-Gallery.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Elegant-Registration-Form.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Grid-and-List-view-V10-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Grid-and-List-view-V10.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Login-Box-En.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/MUSA_carousel-product-cart-slider-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/MUSA_carousel-product-cart-slider.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Shopping-Grid.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Sidebar-1-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'assets/css/Sidebar-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/styles.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Team-Grid.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Team-with-rotating-cards.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Testimonial-Slider-9-1.css">
    <link rel="stylesheet" href="'.$site_url.'/'.$site_directory.'/assets/css/Testimonial-Slider-9.css">

    
</head>
    ';


    echo '
          <div class="row">
                    <div class="col-md-12" style="padding-left: 1px;padding-right: 1px;">
                        <div></div>
                        <!-- Start: Navigation with Search -->
                        <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-search" style="background-color: #c22a2a;color: rgb(247,249,252);padding-left: 55px;margin-bottom: 30px;padding-bottom: 10px;">
                            <div class="container"><button data-toggle="collapse" class="navbar-toggler text-danger" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"><i class="fa fa-th-list"></i></span></button>
                                <div class="collapse navbar-collapse"
                                    id="navcol-1" style="background-color: #c22a2a;">
                                    <ul class="nav navbar-nav">
                                        <li class="nav-item" role="presentation"></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="base.php" style="color: rgb(247,249,252);"><strong>Base</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="audios.php" style="color: rgb(247,249,252);"><strong>Audios</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="videos.php" style="color: rgb(247,249,252);"><strong>Videos</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="biographies.php" style="color: rgb(247,249,252);"><strong>Biographies</strong></a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="music_lyrics.php" style="color: rgb(247,249,252);"><strong>Lyrics</strong></a></li>
                                    </ul>
                                    <form class="form-inline mr-auto" target="_self">
                                        <div class="form-group" style="color: rgb(255,255,255);"><label for="search-field"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                                    </form><a class="btn btn-light action-button" role="button" href="login.php" style="background-color: #ea6a6a;">Login</a><a class="btn btn-light action-button" role="button" href="register.php" style="background-color: #ea6a6a;">Register</a></div>
                            </div>
                        </nav>
                        <!-- End: Navigation with Search -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Sidebar Menu -->
    <!-- Start: 1 Row 3 Columns -->




          ';

      }
}

    



?>