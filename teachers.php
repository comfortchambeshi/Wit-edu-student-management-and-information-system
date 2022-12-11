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
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="margin-right: 5px;">
    <?php
    include 'classes/db.php';
include 'inc/auto-loader.php';
include 'inc/dbconnect.inc.php';
include 'inc/siteinfo.php';


//Site title
echo '<title>Our Teachers | '.$site_name.'</title>';
$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;
    ?>
    <div class="container" style="margin-top: 102px;">
        <h3 class="text-center" style="background-color: #daf0f5;">Our Lecturers</h3>
    </div>
    <div>
        <div class="container">
            <div class="row">
                
              
                <?php

                include 'panel/inc/dbconnect.inc.php';

                             $Queryteachers = mysqli_query($conn, "SELECT * FROM lecturers ORDER BY 1 DESC LIMIT 20");
                             if (mysqli_num_rows($Queryteachers) > 0) {
                                while ($RowteachersList = mysqli_fetch_assoc($Queryteachers)) {
                                    $teacherFullName = mysqli_real_escape_string($conn, $RowteachersList['name']);
                                    $teacherPhoneNumber = mysqli_real_escape_string($conn, $RowteachersList['mobile_number']);
                                    $teacherId = mysqli_real_escape_string($conn, $RowteachersList['ts_number']);
                                    $profile_pic = mysqli_real_escape_string($conn, $RowteachersList['profile_pic']);
                                    $RegisteredDate = mysqli_real_escape_string($conn, $RowteachersList['registered_date']);
                                    $teacher_Subjects = mysqli_real_escape_string($conn, $RowteachersList['subjects_id']);

                                    //Getting class name
                                    $QuerySubject = mysqli_query($conn, "SELECT * FROM prgramme_outline WHERE id='$teacher_Subjects'");
                                    $RowClass = mysqli_fetch_assoc($QuerySubject);
                                    $SubjectName = mysqli_real_escape_string($conn, $RowClass['name']);

                                    echo '
                <div class="col-md-3" style="background-color: #dadada;margin-right: 16px;margin-bottom: 8px;margin-left: 16px;">
                    <h5 class="text-center"><img class="rounded-circle" style="width:100%;" src="panel/uploads/teachers_profiles/'.$profile_pic.'" "></h5>
                    <h5 class="text-center">'.$teacherFullName.'</h5>
                    <h6 class="text-center"><em>'.$SubjectName.'</em></h6>
                    <h6 class="text-center">'.$teacherPhoneNumber.'</h6>
                </div>
            </div>
        </div>';
}}

        ?>
    </div>
<hr>
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