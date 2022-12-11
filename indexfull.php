<?php
$db1 = 'classes/db.php';
$db2 = 'inc/dbconnect.inc.php';
if (!file_exists($db1) || !file_exists($db2)) {
    header("LOCATION: install/start.php");
}


?>



    <?php
include 'panel/inc/dbconnect.inc.php';

    include 'classes/db.php';
include 'inc/auto-loader.php';
include 'inc/siteinfo.php';

echo '<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="'.$site_url.'/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/footer-copyright_bar.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="'.$site_url.'/https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/styles.css">
 <link rel="stylesheet" href="'.$site_url.'/assets/css/Important-Highlighted-Event.css">
<body>';
//Site title
echo '<title>'.$site_Fullname.'</title>';
$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;
    ?>
    <div class="container" style="margin-top: 11; max-width:100%; ">
        <section style="height:500px;" id="carousel">
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <?php

$GetNews = new homepage();

                   $GetNews->HomeSlider();

                    ?>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
                <ol
                    class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                    </ol>
            </div>
        </section>
    </div>
    <div>
        <div class="container" style="margin-top: 29px;">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-light" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);">Latest News</h5>
                 
                 <?php
                  $GetNews = new homepage();

                   $GetNews->GetNews();

                 
                        
                        

                        	
                        

                 ?>
                    
                </div>
                <div class="col-md-6">
                    <h5 class="text-light" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);">Latest Events</h5><div class="container"  >
   <?php
$GetNews = new homepage();

                   $GetNews->GetEvents();


   ?>
</div></div>
            </div>
        </div>
       
    </div>
    <div>
        <div class="container">
            <hr>
            <div class="row">
               
                
               
              
                
             
               
            </div>
            <div>
    <div class="container" style="width: 100%;max-width: 100%;">
        <div class="row" style="width: 100%;max-width: 100%;">
            <div class="col-md-6">
                <div class="media">
                    <div class="media-body">
                        <h5>About us</h5>
                        <?php
                         
                         $getAboutUs = mysqli_query($conn, "SELECT * FROM site_info");
                         $row = mysqli_fetch_assoc($getAboutUs);
                         
                        echo '   <p class="text-dark">'.$row["about_us"].'</p>
                                     ';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="max-width: 50%;">
                <div class="container"  >
                <h5 class="text-center text-light" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);">Our Programmes</h5>
            <?php
            $GetNews->GetCourses();
            
            ?>
            </div>
            </div>
        </div>
    </div>
</div>
        </div>
        
    </div>
    <hr>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-8d6b45c9-cb0e-45ec-8c53-93ff9475cf92"></div>
    
    	<?php
    
$Header = new footer();
$LoggedHeader = $Header->logged_footer();
echo $LoggedHeader;
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>