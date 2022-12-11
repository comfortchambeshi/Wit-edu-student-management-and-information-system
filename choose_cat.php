

<!DOCTYPE html>
<html>

<head>
    <title>Choose the login Section | Fourskilllevels Accdemy</title>


    

    <?php

echo '
   <head>
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
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    

    
</head>
    ';
    ?>
    <?php
    include 'classes/db.php';
include 'inc/auto-loader.php';
$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;
    ?>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    

<body>

   



<body>






<?php


        


//Upload info

echo '<div style="margin-top:100px;" class="container"><div class="container"><div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="alert alert-success" role="alert"><span>choose the section to login!</span></div><hr>
        </div></div>


            </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <a><img style="margin-right:4px;" class="rounded-circle" src="assets/img/student.png" width="100" height="100"></a>
                </div>
                <div class="media-body">
                    <h4><a  class="btn  btn-primary btn-block btn-sm" role="button" href="login.php?type=student"><strong>Student</strong> </a> </h4>
                    
                </div>
            </div></div></div></div>
            <div class="container">
            <hr>


            <div class="container">
             <div class="media">
                <div class="media-left">
                    <a><img style="margin-right:4px;" class="rounded-circle" src="assets/img/teacher.png" width="100" height="100"></a>
                </div>
                <div class="media-body">
                    <h4><a  class="btn  btn-primary btn-block btn-sm" role="button" href="login.php?type=teacher"><strong>Lecturer</strong> </a> </h4>
                    
                </div>
            </div></div></div></div>
            <div class="container">
            <hr>
            

            <div class="container">
            <div class="media">
                <div class="media-left">
                    <a><img style="margin-right:4px;" class="rounded-circle" src="assets/img/accountant.jpg" width="100" height="100"></a>
                </div>
                <div class="media-body">
                    <h4><a  button class="btn btn-primary btn-block btn-sm" type="link" href="login.php?type=accountant"><strong>Accountant</strong> </a></button> </h4>
                    
                </div></div></br></hr>
            </div>
        </div><div class="container">
            <hr>
            <div class="container">
            <div class="media">
                <div class="media-left">
                    <a><img style="margin-right:4px;"class="rounded-circle" src="assets/img/librarian.png" width="100" height="100"></a>
                </div>
                <div class="media-body">
                    <h4><a  class="btn btn-primary btn-block btn-sm" role="button" href="login.php?type=librarian"><strong>Librarian</strong> </a></h4>
                    
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
        <div class="media">
            <div class="media-left">
                <a><img style="margin-right:4px;" class="rounded-circle" src="images/parents.jpg" width="100" height="100"></a>
            </div>
            <div class="media-body">
                <h4><a  button class="btn btn-primary btn-block btn-sm" type="link" href="login.php?type=parent"><strong>Parent</strong> </a></button></h4>
                
            </div>
        </div>
    </div>
</div>
            <hr>
            <div class="container">
            <div class="media">
                <div class="media-left">
                    <a><img style="margin-right:4px;" class="rounded-circle" src="assets/img/admin.png" width="100" height="100"></a>
                </div>
                <div class="media-body">
                    <h4><a  button class="btn btn-primary btn-block btn-sm" type="link" href="login.php?type=admin"><strong>Admin</strong> </a></button></h4>
                    
                </div>
            </div>
        </div>
    </div>';
   




    ?>
   
</body>

</html>




  
    <?php
    
$Header = new footer();
$LoggedHeader = $Header->logged_footer();
echo $LoggedHeader;
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>