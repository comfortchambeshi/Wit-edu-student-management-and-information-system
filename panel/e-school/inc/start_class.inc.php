<?php

if(isset($_POST['class_btn'])&&isset($_GET['tid'])){
    //Database connection
    include '../../inc/dbconnect.inc.php';
    $teacher_id = $_GET['tid'];
    $class_name =$_POST['e_class_name'];
    $physical_class =$_POST['physical_class'];
    $subject =$_POST['subject'];
    $study_year =$_POST['study_year'];
    $study_mode =$_POST['study_mode'];
    $class_type =$_POST['class_type'];
    $ending_time =$_POST['ending_time'];
    
    $currentDateTime = date('Y-m-d H:i:s');
    
    //Inserting into database
    
    
    if(mysqli_query($conn, "INSERT INTO e_classes(name, class_type, physical_class_id, subject_id, study_year, study_mode, ending_time, start_datetime)VALUES('$class_name', '$class_type', '$physical_class', '$subject', '$study_year', '$study_mode', '$ending_time', '$currentDateTime')"))
    {
        $last_id = $conn->insert_id;


header('Location: ../class_view.php?class_id='.$last_id.'');

        
    }
    else
    {
        
        echo mysqli_error($conn);
    }
    
}

?>