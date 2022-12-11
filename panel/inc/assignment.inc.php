<?php

if (isset($_POST['submit_btn']) && isset($_GET['id'])) {
    include '../classes/db.php';
    include '../classes/notify.php';
    include 'dbconnect.inc.php';
    include 'login_function.php';
    include 'mains.php';
    $AssigmentId = $_GET['id'];
    $AssigmentFile =  $_FILES['file'];
    
    
    
    //Getting assignemt info
    $query_data = mysqli_query($conn, "SELECT * FROM assignments WHERE id='$AssigmentId' ");
$countData = mysqli_num_rows($query_data);


        $rowAssignments = mysqli_fetch_assoc($query_data);
        $s_from = mysqli_real_escape_string($conn, $rowAssignments['s_from']);
        
       
       
    
       

    


    //for files
$fileTmpPath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "deposit_slip";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $AssigmentFile; 

$allowedfileExtensions = array('pdf', 'docx');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/assignments/submitted/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
    
    $date = date('Y-m-d H:i:s');

    //Detecting if a student has already submitted

    $CheckStatus = mysqli_query($conn, "SELECT * FROM submitted_assigments WHERE student_id='$user_id' AND assignment_id='$AssigmentId'");

    if (mysqli_num_rows($CheckStatus) > 0) {
        echo '<h3>Error you cannot submit an assignment two or more times in this catyegory because you have aready submisttied already.</h3>';
    }else{
    
    //inserting assignment
    $INSERT = mysqli_query($conn, "INSERT INTO submitted_assigments (assignment_id, student_id, submitted_date, file, mark_status, given_marks)VALUES('$AssigmentId', '$user_id', '$date', '$UploadFullName', 'pending', '-1')");
    if ($INSERT) {
        //Inserting data
    $notify = new notify();
    $rdr = $site_url.'/'.'panel/teacher/assignment_view.php?id='.$AssigmentId;
    $insertNotify = $notify->insertNotify($s_from, 'Someone has submitted an assignment, please make sure that you review and then mark!',  $rdr, 'teacher', 'none');
     echo '<h3>Your Assignment has been submitted successfully. All you need to do is to wait until your assignment is marked.</h3>';
    }
    else {
        echo mysqli_error($conn);
    }
}

}
            
}
else {
    echo "Invalid file extension";
}




}

?>