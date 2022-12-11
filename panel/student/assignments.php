<?php
include '../classes/db.php';
include '../inc/site_details.php';
include '../functions/header.php';
include '../inc/login_function.php';
include '../inc/dbconnect.inc.php';
include '../inc/mains.php';




$logged_header = '';
$logged_header = header1($logged_header);
include '../inc/sidebar.php';

?>
    <?php




echo'<title>My assignments | '.$site_name.'</title>';
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assignments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Accademic</a></li>
              <li class="breadcrumb-item active">Assignments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
    <div class="container">
    <h1 class="text-center" style="color: rgb(130,169,208);background-color: #dbdee4;">&nbsp;My Assigments List</h1><table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
            <?php



$query_data = mysqli_query($conn, "SELECT * FROM assignments where class='$student_class'
AND accademic_year='$student_year' ORDER BY 1 DESC LIMIT 20
    ");
$countData = mysqli_num_rows($query_data);

if ($countData > 0) {
  echo '<thead>
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Deadline</th>
                <th>From</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';
    while ($rowAssignments = mysqli_fetch_assoc($query_data)) {
        $Title = mysqli_real_escape_string($conn, $rowAssignments['name']);
       $AssimentSubject = mysqli_real_escape_string($conn, $rowAssignments['subject']);
       
       //Getting subject
      $SubjectT = mysqli_query($conn, "SELECT * FROM prgramme_outline WHERE id='$AssimentSubject' ");
      $rowSubject = mysqli_fetch_assoc($SubjectT);
      $SubjectName = mysqli_real_escape_string($conn, $rowSubject['name']);
      
      //CONTINUES
       $AssimentId = mysqli_real_escape_string($conn, $rowAssignments['id']);
       $AssimentDeadline = mysqli_real_escape_string($conn, $rowAssignments['deadline']);
       $AccademicYear = mysqli_real_escape_string($conn, $rowAssignments['accademic_year']);
       $from = mysqli_real_escape_string($conn, $rowAssignments['s_from']);
       $class = mysqli_real_escape_string($conn, $rowAssignments['class']);
       $file = mysqli_real_escape_string($conn, $rowAssignments['file']);
 //Getting lecturers
       $GettingLecturers = mysqli_query($conn, "SELECT * FROM lecturers WHERE id='$from'");
       
       $RowLectuers = mysqli_fetch_assoc($GettingLecturers);
       $Lecturer_name = mysqli_real_escape_string($conn, $RowLectuers['name']);

       //getting clases

       $GetClsses = mysqli_query($conn, "SELECT * FROM classes WHERE id='$class'");
       $RowClass = mysqli_fetch_assoc($GetClsses);
       $user_className = mysqli_real_escape_string($conn, $RowClass['class_name']); 


       //Send assignment modal
       


echo '



<form action="../inc/assignment.inc.php?id='.$AssimentId.'" method="POST" enctype="multipart/form-data"> 
<div class="modal fade" id="b'.$AssimentId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your are about to send: <b>'.$Title.'</b> assignment!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group"><label>Your type document </label>
      <hr style="margin-top: -5px;" /><input name="file" type="file" class="border rounded-0" style="margin-top: -12px;" /></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancell</button>
        <button type="submit" name="submit_btn" class="btn btn-primary">Approve</button>
      </div>
    </div>
  </div>
</div>
</form>

';

    



// modify this setting your expiry time
$expiry = $AssimentDeadline;

$today = date("Y-m-d", time());

if( $today > $expiry)    {
  

                $statuses = '<strong class="text-danger">The deadline has reched!</strong>';
   }
else
   {   
    $statuses = '<button  type="button" class="btn-xs btn btn-secondary"  data-toggle="modal" data-target="#b'.$AssimentId.'">Submit</button>
                <a href="uploads/assignments/'.$file.'" type="button" class="btn-xs btn btn-primary">Download</a>';

   }

    
    echo 


      
    '
    <tr>
                <td>'.$Title.'</td>
                <td>'.$SubjectName.'</td>
                <td>'.$AssimentDeadline.'</td>
                <td>'.$Lecturer_name.'</td>
                <td>'.$statuses.'

                </td> 
            </tr>
    ';
}
}
else{
   // echo '<h5>You have no assigments assigned!</h5>';
}

//Getting submitted assigments
               $SubmittedAssigments = mysqli_query($conn, "SELECT * FROM submitted_assigments WHERE student_id='$userid'");
               echo '
               <title> Assigment submittions | '.$site_name.'</title> 
               <div class="login-clean">
               <div class="container"  style="max-width: 100%;width: 100%;margin-top: -53px;">
                   <h2 class="sr-only">Login Form</h2>
                   <div class="illustration">
                       <h4>.</h4>
                       <hr>
                   </div>
                   <div class="form-group">
                       <div class="table-responsive">
                        <table class="table">
                     <h5 class="text-center" style="color: rgb(130,169,208);background-color: #dbdee4;">&nbsp;Recent submitted Assignments</5>
                       ';
             if (mysqli_num_rows($SubmittedAssigments) > 0) {
                  echo '
                
                   
                        <thead>
                            <tr>
                                
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
                 if($GivenMarks == -1){
                     $GivenMarks = 'pending';
                     
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
                               
                                <td>'.$ClassName.'</td>
                                <td>'.$SubmittedDate.'</td>
                                <td>'.$SubmittedMarkedStatus.'</td>
                                <td>'.$GivenMarks.' </td>
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
                   
          


                    /*echo '
    
                           <script type="text/javascript">
                           alert("Your Changes have been made successfully!");
                            window.location.href = window.location.href
                            </script>
                            ';*/
                   }
                   }else{
                       
                       echo mysqli_error($conn);
                   }
                          
                          
                      
                 }

 

              
             }
             else {
                echo '<div class="container"><h5 class="text-danger">There are currently no submitted assigments!</h5></div>';
             }
            ?>
            
            
        </tbody>
    </table>
</div>


 </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include '../inc/footer.php';
  ?>


