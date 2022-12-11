<?php
if(isset($_POST['export_payment'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'payments'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'payments');
    header("LOCATION: ../acc_p_history.php");
}elseif(isset($_POST['invoice_export'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'invoices'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'invoices');
    header("LOCATION: ../invoices.php");
}
//for exporting students
elseif(isset($_POST['students_export'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'students'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'students');
    header("LOCATION: ../students_list.php");
}
//for exporting teachers
elseif(isset($_POST['teachers_export'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'teachers'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'lecturers');
    header("LOCATION: ../teachers_list.php");
}
//for exporting accountants
elseif(isset($_POST['accountants_export'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'accountants'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'accountants');
    header("LOCATION: ../accountants_list.php");
}
//for exporting librarians
elseif(isset($_POST['librarians_export'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'librarians'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'librarians');
    header("LOCATION: ../librarians_list.php");
}
//courses download
elseif(isset($_POST['courses_export'])){
    include '../classes/db.php';
    include '../classes/export.php';
    $file  = 'programmes'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'programmes');
    header("LOCATION: ../course_list.php");
}
//redirect to homepage
header("LOCATION: ../index.php");
?>