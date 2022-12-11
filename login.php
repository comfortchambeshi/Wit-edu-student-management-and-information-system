<?php
include 'panel/inc/dbconnect.inc.php';

    include 'classes/db.php';
include 'inc/auto-loader.php';
include 'inc/siteinfo.php';


//Site title

$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;
    ?>
    
	
        
  
			
	<!-- //login -->
	
	
	<div class="login-clean" >
         <?php

//include 'inc/dbconnect.inc.php';
 if (isset($_GET['signin'])) {

    echo '<div class=""  style="padding-top: 20px;margin-bottom:50px;padding-left:10px;padding-right:10px;" >';
     $urlInfo = $_GET['signin'];

     if ($urlInfo == 'empty') {
        echo '
          
          <div role="alert" class="alert alert-danger" "><span style="color: #ab9b11;"><b>Error, You have have not filled in one of the fields below!</b></span></div>



        ';
     }     else{
        if($urlInfo == 'passworderror'){

        echo '

        <div role="alert" class="alert alert-danger" ><span ><b>Youve used an incorect password, if you lost it click <a href="reset_pass.php">Forgot Password</a>!</b></span></div>


        ';
     }
else{ if($urlInfo == 'error') {
         echo '
<div role="alert" class="alert alert-success" style="background-color: rgb(171, 155, 17247,211,208);"><span style="color: #ab9b11;"><b>The requested student id could not be found please try again and make sure that you have all the details typed in correct or<br> <a href="contact_us.php">Contact your System administrator</a>!</b></span></div>
         ';
     }
     else{

        if($urlInfo == 'not_logged') {
         echo '
               
               <div role="alert" class="alert alert-success" style="background-color: rgb(171, 155, 17);"><span style="color: #ab9b11;"><b>Error, you must login or register to perform the requested!</b></span></div>


         ';
     }
     elseif ($urlInfo == 'pwd_changed') {
         echo '<div style="font-size:18px;" role="alert" class="alert alert-success"><span><strong>Your password has been chnaged successfuly</strong> </span></div>';
     }


     }}


 }
     
 }
 

 if (isset($_GET['sout'])) {
     $urlInfo = $_GET['sout'];
     if($urlInfo == 'success') {
         echo '<div style="font-size:16px; margin-top: 0px;margin-bottom:20px;padding:5px;"  role="alert" class="container alert-success"><span><h5 style="padding:5px;">Account logged out successfuly!</h5> </span></div>';
     }

 }

 ?>
 <div style="padding: 0px;" class="container">
    <div class="row" >
        
        
        <div style="margin-bottom:10px;" class="col-md-6">
            <form method="post" action="inc/login.inc.php" style="max-width: 100%;width: 80%;">
                <h2 class="sr-only">Login Form</h2>
                <h5>STUDENT AND STAFF LOGIN</h5>
                <div class="form-group"><input required="" type="text" class="form-control" name="login_name" placeholder="Username or Email" /></div>
                <div class="form-group"><input required="" type="password" class="form-control" name="pass" placeholder="Password" /></div>
                <div class="form-group"><button name="proceed" class="btn btn-block" type="submit" style="background-color: rgb(12,35,64);color: #ffd700;">Login</button></div><a class="forgot" href="reset_pass.php">Forgot your email or password?</a></form>
        </div>
        
        <div style="margin-bottom:10px;" class="col-md-6">
            <form action="inc/login.inc.php" method="post">
              
                <h2 class="sr-only">Login Form</h2>
                <div class="intro">
                    <h6 class="text-center">FOR NEW STUDENTS ONLY</h6>
                    <p class="text-center text-dark">The registration is NOW OPEN. FILL IN THIS FORM</p>
                </div>
                <div class="buttons"><a class="btn btn-secondary" role="button" href="register.php" style="background-color: rgb(12,35,64);">NEW STUDENT REGISTRATION FORM</a></div>
            </form>
        </div>
    </div>
</div>

	<!-- footer-->
	

	<?php
    
$Header = new footer();
$LoggedHeader = $Header->logged_footer();
echo $LoggedHeader;
    ?>



