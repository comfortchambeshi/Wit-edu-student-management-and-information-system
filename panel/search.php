
<?php
include './inc/auto-loader.php';
include('./inc/login_function.php');
include('./inc/teacher_login_function.php');
include('./inc/dbconnect.inc.php');
include('./inc/staff_login.php');
include('./inc/lib_login_function.php');
include('./inc/parent_login_function.php');



include('./inc/acc_login_function.php');

$Login = new Login();
$AdminLoginObj = new admin_login();
$TeacherLoginObj = new teacher_login();
$ParentLoginObj = new parent_login();
$AccLoginObj = new acc_login();

//Getting main info

if ($AdminLoginObj->isadminlogged()) {
   $user_id =  $AdminLoginObj->isadminlogged();

  $fromType = 'admin';


}

elseif ($Login->isLoggedIn()) {

    
  $fromType = 'student';
    
        



}
elseif ($ParentLoginObj->isLoggedIn()) {

    
    $fromType = 'parent';
      
          
  
  
  
  }
elseif($TeacherLoginObj->isLoggedIn()){
  $user_id =  $TeacherLoginObj->isLoggedIn();

  $fromType = 'teacher';



}
elseif($AccLoginObj->isLoggedIn()){


    $user_id =  $AccLoginObj->isLoggedIn();
   
    
    $fromType = 'acc';
 

}
elseif(lib_Login::isLoggedIn()){

$user_id =  lib_Login::isLoggedIn();
  echo 'Cool'.$user_id;
  
  $fromType = 'lib';

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Send a message</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
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
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
	


    
<hr>


<?php

include 'functions/admin_header.php';

include 'inc/dbconnect.inc.php';


$Popups = new msgpopups();
        if (isset($_POST['msgsearch_button'])) {
            if (isset($_POST['search_text'])) {
                $searchText = mysqli_real_escape_string($conn, $_POST['search_text']);
            $getSearch = mysqli_query($conn, "SELECT * FROM students WHERE CONCAT(first_name, ' ', last_name) LIKE '%$searchText%' LIMIT 10  " );
            }
            else{
                $getSearch = mysqli_query($conn, "SELECT * FROM students LIMIT 10  " );
                $searchText = "";

            }
            
            //Displaying main header
            echo '<div class="container">
        <form action="search.php" method="POST">
            <div class="alert alert-success" role="alert"><span>Search a person where to send your message to</span>
                <div class="input-group">
                    <div class="input-group-prepend"></div><input name="search_text" class="form-control" type="text" placeholder="Student, Teacher, Accountant or Admin name">
                    <div class="input-group-append"><button class="btn btn-primary" type="submit" name="msgsearch_button">Search!</button></div>
                </div>
            </div>
        </form>
        <h5 class="text-center border rounded-0 bg-primary text-white" style="background-color: #e6e6e6;">Search results: '.$searchText.'</h5>
        <div class="container">
            <div class="row">
    ';
            if (mysqli_num_rows($getSearch) > 0) {
            	while ($rowGetSearch = mysqli_fetch_assoc($getSearch)) {
            		$ToId = mysqli_real_escape_string($conn, $rowGetSearch['system_id']);
            		$StudentName = mysqli_real_escape_string($conn, $rowGetSearch['first_name']) .' '. mysqli_real_escape_string($conn, $rowGetSearch['last_name']);
            		$StudentImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
            	//StudentPopup
           $StudentPopup = $Popups->popNow($StudentName, 'student', 'student', $fromType, $ToId);



    echo ' 
                <div class="col-md-3 text-primary" style="margin-bottom: 6px;background-color: #f4f4f4;" data-toggle="modal" data-target="#student" data-whatever="@getbootstrap"  >
                    <h1 class="text-center"><img class="rounded-circle img-fluid" src="uploads/students_profiles/'.$StudentImg.'" style="width: 128px;max-width: 100%;"></h1>
                    <p class="text-center text-dark">'.$StudentName.'</p>
                    <p class="text-center text-dark" style="margin-top: -14px;"><button class="btn btn-primary btn-block btn-sm border rounded-0" type="button" >Student</button></p>
                </div>
           ';
            }
        }
            else{
            	echo '<h2>No Students found for: '.$searchText.' </h2>    </div><div>';
            }
            echo ' </div>
        </div></div>';

//Teachers
            if (isset($_POST['search_text'])) {
            $searchText = mysqli_real_escape_string($conn, $_POST['search_text']);
            $getSearch = mysqli_query($conn, "SELECT * FROM lecturers WHERE name LIKE '%$searchText%' LIMIT 10  " );

        }else{
            $searchText = '';
            $getSearch = mysqli_query($conn, "SELECT * FROM lecturers  LIMIT 20  " );

        }
            //Displaying main header
            echo '<div class="container">
        
        <h5 class="text-center border rounded-0 bg-secondary text-white" style="background-color: #e6e6e6;">Teachers Found: '.$searchText.'</h5>

        <div class="container">
            <div class="row">
    ';
            if (mysqli_num_rows($getSearch) > 0) {
            	while ($rowGetSearch = mysqli_fetch_assoc($getSearch)) {
            		$ToId = mysqli_real_escape_string($conn, $rowGetSearch['id']);
            		$TeacherName = mysqli_real_escape_string($conn, $rowGetSearch['name']);
            		$TeacherImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
            	


    echo ' 
               <div class="col-md-3 text-primary" style="margin-bottom: 6px;background-color: #f4f4f4;" data-toggle="modal" data-target="#teacher" data-whatever="@getbootstrap"  >
                    <h1 class="text-center"><img class="rounded-circle img-fluid" src="uploads/teachers_profiles/'.$TeacherImg.'" style="width: 128px;max-width: 100%;"></h1>
                    <p class="text-center text-dark">'.$TeacherName.'</p>
                    <p class="text-center text-dark" style="margin-top: -14px;"><button class="btn btn-secondary btn-block btn-sm border rounded-0" type="button" >Teacher</button></p>
                </div>
            ';
            //TeacherPopup
           $StudentPopup = $Popups->popNow($TeacherName, 'teacher', 'teacher', $fromType, $ToId);
            }
        }
            else{
            	echo '<h2>No lecturers found for: '.$searchText.' </h2>    </div><div>';
            }

echo '</div>
        </div></div>';
//Accountants

             if (isset($_POST['search_text'])) {

            $searchText = mysqli_real_escape_string($conn, $_POST['search_text']);
            $getSearch = mysqli_query($conn, "SELECT * FROM librarians WHERE name LIKE '%$searchText%' LIMIT 10  " );

            }else{
                $searchText = "";
                $getSearch = mysqli_query($conn, "SELECT * FROM librarians  LIMIT 20  " );

            }
            //Displaying main header
            echo '<div class="container">
        
        <h5 class="text-center border bg-success text-white rounded-0" style="background-color: #e6e6e6;">Librarians Found: '.$searchText.'</h5>

        <div class="container">
            <div class="row">
    ';
            if (mysqli_num_rows($getSearch) > 0) {
            	while ($rowGetSearch = mysqli_fetch_assoc($getSearch)) {
            		$ToId = mysqli_real_escape_string($conn, $rowGetSearch['id']);
            		$LibName = mysqli_real_escape_string($conn, $rowGetSearch['name']);
            		$LibImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
            	
//LibrariansPopup
           $LibPopup = $Popups->popNow($LibName, 'lib', 'lib', $fromType, $ToId);

    echo ' 
                <div class="col-md-3 text-primary" style="margin-bottom: 6px;background-color: #f4f4f4;" data-toggle="modal" data-target="#lib" data-whatever="@getbootstrap"  >
                    <h1 class="text-center"><img class="rounded-circle img-fluid" src="uploads/acc_profiles/'.$LibImg.'" style="width: 128px;max-width: 100%;"></h1>
                    <p class="text-center text-dark">'.$LibName.'</p>
                    <p class="text-center text-dark" style="margin-top: -14px;"><button class="btn btn-success btn-block btn-sm border rounded-0" type="button" >Librarian</button></p>
                </div>
            ';
            }
        }
            else{
            	echo '<h2>No accountants found for: '.$searchText.' </h2>    </div><div>';
            }

echo '</div>
        </div></div>';
//Librarians


            if (isset($_POST['search_text'])) {
            $searchText = mysqli_real_escape_string($conn, $_POST['search_text']);
            $getSearch = mysqli_query($conn, "SELECT * FROM accountants WHERE name LIKE '%$searchText%' LIMIT 10  " );

        }else{
            $searchText = '';
            $getSearch = mysqli_query($conn, "SELECT * FROM accountants  LIMIT 20  " );

        }
            //Displaying main header
            echo '<div class="container">
        
        <h5 class="text-center border bg-primary text-white rounded-0" style="background-color: #e6e6e6;">Accountants Found: '.$searchText.'</h5>

        <div class="container">
            <div class="row">
    ';
            if (mysqli_num_rows($getSearch) > 0) {
            	while ($rowGetSearch = mysqli_fetch_assoc($getSearch)) {
            		$AccName = mysqli_real_escape_string($conn, $rowGetSearch['name']);
            		$AccImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
            	

//AccPopup
           $AccPopup = $Popups->popNow($AccName, 'acc', 'acc', $fromType, $ToId);

    echo ' 
                <div class="col-md-3 text-primary" style="margin-bottom: 6px;background-color: #f4f4f4;" data-toggle="modal" data-target="#acc" data-whatever="@getbootstrap"  >
                    <h1 class="text-center"><img class="rounded-circle img-fluid" src="uploads/libs_profiles/'.$AccImg.'" style="width: 128px;max-width: 100%;"></h1>
                    <p class="text-center text-dark">'.$AccName.'</p>
                    <p class="text-center text-dark" style="margin-top: -14px;"><button class="btn btn-primary btn-block btn-sm border rounded-0" type="button" >Accountant</button></p>
                </div>
            ';
            }
        }
            else{
            	echo '<h2>No librarians found for: '.$searchText.' </h2>    </div><div>';
            }

echo '</div>
        </div>';





}


?>

<?php





?>

