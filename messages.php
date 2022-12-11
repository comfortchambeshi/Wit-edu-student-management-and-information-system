<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        
        <form method="post" style="width: 100%;max-width: 100%;">
            <?php 
            if(isset($_GET['type']) && isset($_GET['email'])){
                
                if($_GET['type'] == 'reg_taken'){
                    echo '
                    <title>Student Information already taken</title>
                    <p class="text-danger">Error, email, exam_number or the NRC number you have used is already taken!</p>
                    ';
                }
                elseif($_GET['type'] == 'reg_success'){
                echo'
                <title>Registration successfull</title>
            <p class="text-success">Account created successfully. An Email has been sent to: '.$_GET['email'].'. Follow the instruction to sent to your email in order to verify the account.</p>
            ';
                }
            }
            
            ?>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>