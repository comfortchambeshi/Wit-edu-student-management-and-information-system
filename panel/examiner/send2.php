<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head>

<body>
    <?php
if (isset($_POST['results_btn'])&& isset($_GET['id'])) {
    
    include '../functions/teacher_header2.php';
    
   


include '../inc/dbconnect.inc.php';
include '../inc/teacher_login_function.php';
include($_SERVER['DOCUMENT_ROOT'].'/panel/inc/teacher_mains.php');
echo '<title>Send Results | '.$site_name.'</title>';
//header
$userid =  teacher_Login::isLoggedIn();

$ExamId = mysqli_real_escape_string($conn, $_GET['id']);
    $results_grade = mysqli_real_escape_string($conn, $_POST['results_grade']);
    $script_file = $_FILES['script_file'];
     $results_comment = mysqli_real_escape_string($conn, $_POST['results_comment']);
       $year = mysqli_real_escape_string($conn,$_POST['year']);
        $class = mysqli_real_escape_string($conn, $_POST['class']);
         $exam_number = mysqli_real_escape_string($conn, $_POST['exam_number']);


//for files
$fileTmpPath = $_FILES['script_file']['tmp_name'];
$fileName = $_FILES['script_file']['name'];
$fileSize = $_FILES['script_file']['size'];
$fileType = $_FILES['script_file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "results";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('pdf', 'docx');


$file_name = $script_file; 

$allowedfileExtensions = array('pdf', 'docx');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/results/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
         //getting a student by a given class, year and exam number
         $GetStudent = mysqli_query($conn, "SELECT * FROM students WHERE exam_number='$exam_number' AND class_id='$class' AND year='$year'");
         if (mysqli_nuM_rows($GetStudent) > 0) {
            //Getting student system id
            $GetStudent = mysqli_query($conn, "SELECT * FROM students WHERE exam_number='$exam_number'");
            $rowStudent = mysqli_fetch_assoc($GetStudent);
            $StudentSystem_id = mysqli_real_escape_string($conn, $rowStudent['system_id']);
            //Checking valid
            $ValidStudent = mysqli_query($conn, "SELECT * FROM exam_results where marks_to='$StudentSystem_id' AND exam_id='$ExamId'");
            if (mysqli_num_rows($ValidStudent) > 0) {
               echo '
               <br><br><br>
               <div class="container">
               <div class="page-container">
               <h3 class="text-warning">Error: It seemes like you are trying to send a duplicate results to one student!</h3>
               <hr>
               <h4><a href="exam_catview.php?id='.$ExamId.'" button class="btn btn-primary" type="link"> GO BACK </a></h4>
               </div></div>
               
               ';
            }else {
                if($InsertResults = mysqli_query($conn, "INSERT INTO exam_results(e_year, script_file, marks_to, comment, grade, marks_from, exam_id) VALUES(NOW(), '$UploadFullName', '$StudentSystem_id', '$results_comment', '$results_grade', '$user_id', '$ExamId')")){
               echo 'yess';
                    header("LOCATION: exam_catview.php?id=".$ExamId."");
    
                 }
                 else{
                    echo mysqli_error($conn);
                 }
            }
           

         }
         else{
            echo '<hr><div class="container"><h3>The requested student was not found in the database, please check your entered values and try again!</h3></div>';
         }

   
    
}
else{
    echo 'Invalid data to process!';
}
}
else{
    
      echo '<hr><div class="container"><h3>The supported file extensions are only pdf and docx!</h3></div>';
}
    
}

    ?>