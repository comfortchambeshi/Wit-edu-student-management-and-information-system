<?php

if (isset($_POST['submit_btn']) && isset($_GET['id'])) {
    include 'dbconnect.inc.php';
    include 'mains.php';
    $AssigmentId = mysqli_query($conn, $_GET['id']);
    $AssigmentFile = mysqli_query($conn, $_GET['file']);

    


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


$file_name = $depositfile; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/assignments/submitted';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
    //Inserting data
    if (mysqli_query($conn, "INSERT INTO submitted_assigments(assignment_id, student_id, submitted_date, file, mark_status, given_marks)VALUES('$AssigmentId', '$user_id', NOW(), '$UploadFullName', 'pending', 'pending'")) {
       header("LOCATION: ../assignments.php");
    }
    else {
        echo mysqli_error($conn);
    }

}
            
}




}

?>