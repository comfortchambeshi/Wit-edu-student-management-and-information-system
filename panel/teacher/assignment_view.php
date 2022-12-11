<?php
include '../inc/auto-loader.php';
include '../classes/notify.php';
include '../inc/dbconnect.inc.php';
include '../inc/teacher_login_function.php';
include '../functions/teacher_header2.php';
include('../inc/teacher_mains.php');

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
<?php
                if (isset($_GET['id'])) {
                   $UrlId = mysqli_real_escape_string($conn, $_GET['id']);

                   //Querying details
                   $Assigment = mysqli_query($conn, "SELECT * FROM assignments WHERE id='$UrlId'");
                   if (mysqli_num_rows($Assigment) > 0) {
                    $RowAssigment = mysqli_fetch_assoc($Assigment);
                    $Name = mysqli_real_escape_string($conn, $RowAssigment['name']);

               //Getting submitted assigments
               $SubmittedAssigments = mysqli_query($conn, "SELECT * FROM submitted_assigments WHERE assignment_id='$UrlId'");
               echo '
               <title>'.$Name.' Assigment submittions | '.$site_name.'</title> 
               <div class="login-clean">
               <div class="container"  style="max-width: 100%;width: 100%;margin-top: -53px;">
                   <h2 class="sr-only">Login Form</h2>
                   <div class="illustration">
                       <h4>'.$Name.'</h4>
                       <hr>
                   </div>
                   <div class="form-group">
                       <div class="table-responsive">';
             if (mysqli_num_rows($SubmittedAssigments) > 0) {
                  echo '
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student name</th>
                                <th>class</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th >Marks</th>
                                <th>file</th>
                            </tr>
                        </thead>
                        <tbody>';
                 while ($RowSubmited = mysqli_fetch_assoc($SubmittedAssigments)) {
                 $AId = mysqli_real_escape_string($conn, $RowSubmited['id']);
                 $StudentId = mysqli_real_escape_string($conn, $RowSubmited['student_id']);
                 $MarkStatus = mysqli_real_escape_string($conn, $RowSubmited['mark_status']);
                 $GivenMarks = mysqli_real_escape_string($conn, $RowSubmited['given_marks']);
                 $SubmittedDate = mysqli_real_escape_string($conn, FriendlyTimeAgo($RowSubmited['submitted_date'], date("Y-m-d H:i:s")));
                 $SubmittedFile = mysqli_real_escape_string($conn, $RowSubmited['file']);
                 $SubmittedMarkedStatus = mysqli_real_escape_string($conn, $RowSubmited['mark_status']);
                 if($MarkStatus == 'pending'){
                     
                     $inputType = 'text';
                 }else{
                     $inputType = 'number';
                 }

                       //Getting full name of the results owner
    $Owner = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$StudentId'");
    $rowOwner = mysqli_fetch_assoc($Owner);
    $OwnerFName = mysqli_real_escape_string($conn, $rowOwner['first_name']);
    $OwnerLName = mysqli_real_escape_string($conn, $rowOwner['last_name']);
    $OwnerName =  $OwnerFName .' '. $OwnerLName;
    $OwnerExamNumber = mysqli_real_escape_string($conn, $rowOwner['exam_number']);
    $OwnerClassId = mysqli_real_escape_string($conn, $rowOwner['class_id']);

    //Getting class name
    $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$OwnerClassId'");
 $RowClass = mysqli_fetch_assoc($QueryClass);

    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);

                   
    
                       
                          
                          echo 
                          
                          '<form action="" method="POST">
                         
                          <tr class="shadow-sm">
                                <td>'.$OwnerName.'</td>
                                <td>'.$ClassName.'</td>
                                <td>'.$SubmittedDate.'</td>
                                <td>'.$SubmittedMarkedStatus.'</td>
                                <td><input data-toggle="modal" data-target="#b'.$AId.'"  name="'.$AId.'input_mark" class="form-control" value="'.$GivenMarks.'"  type="number"> </td>
                                <td><a class="btn btn-primary btn-sm" role="button" style="margin-top: -6px;" href="../uploads/assignments/submitted/'.$SubmittedFile .'">Download</a></td>
                            </tr>
                          ';
                          



                   if(isset($_POST['mark_btn']))
                   {
                    $AssId = mysqli_real_escape_string($conn, $_GET['ass_id']);
                    $Mid = mysqli_real_escape_string($conn, $_GET['mid']);
                    $NewMarks = $_POST[''.$AId.'input_mark'];
                    
                    if($NewMarks != -1){
                      $NewStatus =  'marked';  
                      $NewMarks = $NewMarks;
                      
                      
                      $notify = new notify();
                      $rdr = $site_url.'/'.'panel/assignments.php';
                      $insertNotify = $notify->insertNotify($StudentId, 'You have a new marked assignment!',  $rdr, 'student', 'none');
                    }else{
                        
                    $NewStatus =  'pending';  
                    $NewMarks = -1;
                        
                    }
                    if($UpdateMarks = mysqli_query($conn, "UPDATE submitted_assigments SET given_marks='$NewMarks', mark_status='$NewStatus' WHERE id='$AId'")){
                   
          


                    echo '
    
                           <script type="text/javascript">
                           alert("Your Changes have been made successfully!");
                            window.location.href = window.location.href
                            </script>
                            ';
                   }
                   }else{
                       
                       echo mysqli_error($conn);
                   }
                          
                          
                      
                 }

 

              
             }
             else {
                echo '<div class="container"><h5>There are currently no submitted assigments!</h5></div>';
             }
                    
                   }
                   else{
                       echo "The requested assignment cannot be found!";

                   }
                   
                  
                   
                   
                }
                    ?>
                        
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        
    <p class="text-center"><button name="mark_btn" type="submit" class="btn btn-primary">Save changes</button>  <a style="background-color:gold;" class="btn btn-gold btn-sm" role="button" style="margin-top: -6px;" href="assignments.php"><i class="fa fa-long-arrow-left"></i> GO BACK</a></p>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

