<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <meta property="og:type" content="website">
    <meta name="description" content="Join and explore the best music related contents">
    <meta property="og:image" content="assets/img/LOGO%20SOCIALMEDIA.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway+Dots">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Competences-Grid---3-Columns---Hover-Effect-Float-Down.css">
    <link rel="stylesheet" href="assets/css/Competences-Grid---3-Columns---Hover-Effect-Pop---Icons.css">
    <link rel="stylesheet" href="assets/css/Custom-File-Upload.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Box-En.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Music-Widget-1.css">
    <link rel="stylesheet" href="assets/css/Music-Widget.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/News-article-for-homepage-by-Ikbendiederiknl.css">
    <link rel="stylesheet" href="assets/css/Pricing-Table-with-Icon-Buy-Button-1.css">
    <link rel="stylesheet" href="assets/css/Pricing-Table-with-Icon-Buy-Button.css">
    <link rel="stylesheet" href="assets/css/select2.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<h6 class="text-center" style="background-color: #0c2340;color:gold;"><a class="btn btn-primary active btn-sm" role="button" href="login.php">Back to Login</a></h6>
<body>
    <?php
    if (isset($_GET['email'])) {

        include 'inc/dbconnect.inc.php';
        include 'inc/login_function.php';
        include 'inc/mains.php';
        
        echo '<title>Reset info | '.$site_name.'</title>';
        $urlEmail = $_GET['email'];
        

        //getting user details according to the uid in url
        $SearchResults = mysqli_query($conn, "SELECT * FROM students WHERE student_email='$urlEmail'");
        $searchTeachers = mysqli_query($conn, "SELECT * FROM lecturers WHERE email='$urlEmail'");
  
        $Counting_Users = mysqli_num_rows($SearchResults);
        
        function reset_info($FullName, $Toshow, $urlEmail, $img){
            
             return
            '
              <div class="login-clean" style="padding-top: 20px;">
        <form method="post" action="inc/resetpwd_details.php?email='.$urlEmail.'" style="max-width: 500px;padding-bottom: 0px;padding-top: 0;">
            <h2 class="sr-only">Login Form</h2></br>
            <div role="alert" class="alert alert-success"><span><strong><h5 class="text-left">'.$FullName.'</h5>
            <img style="max-width:100%; width:100%;" src="'.$img.'">
            <p style="font-size:12px;">'.$Toshow.'</p>
            </span></div>
            <div class="form-group">
                
            </div>
            <div class="form-group"><input required="" class="form-control" type="text" name="code" placeholder="6 digits reset code"></div>
            <div class="form-group"><input required="" class="form-control" type="password" name="pass1" placeholder="new password"></div>
            <div class="form-group"><input required="" class="form-control" type="password" name="pass2" placeholder="confirm password"></div>
            <div class="form-group"><button class="btn btn-danger btn-block" type="submit" name="confirm" style="background-color: #911919;">reset password</button></div>
        </form>
    </div>

            ';
        }
        
        
     
        if ($Counting_Users > 0) {
            $gettingRows = mysqli_fetch_assoc($SearchResults);
            $UserName = mysqli_real_escape_string($conn, $gettingRows['username']);
            $fname = mysqli_real_escape_string($conn, $gettingRows['first_name']);
            $lname = mysqli_real_escape_string($conn, $gettingRows['last_name']);
            $FullName = $fname. ' ' .$lname;
            $UserImage = mysqli_real_escape_string($conn, $gettingRows['profile_pic']);
            $pic = 'panel/uploads/students_profiles/'.$UserImage.'';
            
            
           echo  reset_info($FullName, $UserName, $urlEmail, $pic);
            
        }
        else{
            if(mysqli_num_rows($searchTeachers))
            {
                $gettingRows = mysqli_fetch_assoc($SearchResults);
            $UserName = mysqli_real_escape_string($conn, $gettingRows['username']);
            $UserImage = mysqli_real_escape_string($conn, $gettingRows['profile_pic']);
            $lname = mysqli_real_escape_string($conn, $gettingRows['last_name']);
            $FullName = $fname. ' ' .$lname;
            $pic = 'panel/uploads/students_profiles/'.$UserImage.'';
            
            echo  reset_info($FullName, $UserName, $urlEmail, $pic);
                
            }
            else{

            echo '<div role="alert" class="alert alert-success" style="background-color: #d6afac;"><span style="color: #ff0000;"><strong>Invalid email address!</strong></span></div>';
        }
            
        }
             
                 
              

              

             


            

            
  


        }
        

    







      ?>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Custom-File-Upload.js"></script>
    <script src="assets/js/Music-Widget.js"></script>
    <script src="assets/js/select2-1.js"></script>
    <script src="assets/js/select2-2.js"></script>
    <script src="assets/js/select2-3.js"></script>
    <script src="assets/js/select2-4.js"></script>
    <script src="assets/js/select2-5.js"></script>
    <script src="assets/js/select2-6.js"></script>
    <script src="assets/js/select2.js"></script>
</body>

</html>


