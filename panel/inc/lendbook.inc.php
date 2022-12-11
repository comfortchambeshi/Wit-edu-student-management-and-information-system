<?php
include '../inc/auto-loader.php';
include 'dbconnect.inc.php';
include 'lib_login_function.php';
include 'lib_mains.php';


if(isset($_POST['lend_btn'])){
    $BookName = $_POST['book_name'];
    $BookNumber = $_POST['book_number'];
    $StudentId = $_POST['student_id'];
    $DueDate = $_POST['due_date'];

    //Getting Student student id or exam number
    
    $GetBorrowerDetails = mysqli_query($conn, "SELECT * FROM students WHERE exam_number='$StudentId' OR exam_number='$StudentId'");
    if (mysqli_num_rows($GetBorrowerDetails) > 0) {
       $RowStudent = mysqli_fetch_assoc($GetBorrowerDetails);
       
       $SystemId = mysqli_real_escape_string($conn, $RowStudent['system_id']);
       $Insert = mysqli_query($conn, "INSERT INTO physical_library(book_number, category,book_name, book_status, rent_by, due_date, borrower_id)
       VALUES('$BookNumber', 'student', '$BookName', 'pending', '$user_id', '$DueDate', '$SystemId')");
       header("Location: ../librarian.php?status=added");


    }
    else{
        
       // header("Location: ../librarian.php?status=usernotfound");
    }
      

    


}


?>