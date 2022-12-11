<?php
include '../inc/auto-loader.php';
include '../functions/teacher_header2.php';
include '../inc/dbconnect.inc.php';
include '../inc/teacher_login_function.php';

include('../inc/teacher_mains.php');
echo '<title>Assignments | '.$site_name.'</title>';




    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/AXY-Contact-Us-1.css">
    <link rel="stylesheet" href="assets/css/AXY-Contact-Us.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Table-Fixed-Header.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Contact-form-simple.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>

    <br>
<hr>
    <div class="container">
    <h5 class="text-center" style="color: rgb(130,169,208);background-color: #dbdee4;">&nbsp; Active
<button type="button" class="btn-sm btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Upload assignment</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="container">
       
<form method="post" action="../inc/submit_assigment.php" enctype="multipart/form-data">
    <h2 class="text-center"><strong>Upload assigment</strong></h2>
    <div class="form-group"><input type="text" class="form-control" name="name" placeholder="assignment name" required /></div>
    <div class="form-group">
        <h4>subject</h6><select class="form-control" name="subject" required><optgroup label="Choose a subject">
<?php $GetCourses = mysqli_query($conn, "SELECT * FROM prgramme_outline ");
if (mysqli_num_rows($GetCourses) > 0) {
   while ($RowCourses = mysqli_fetch_assoc($GetCourses)) {

    $ProgrammeTitle = htmlspecialchars($RowCourses['name']);
    $ProgrammeId = mysqli_real_escape_string($conn, $RowCourses['programme_id']);
   
    $ProgrammeDescription = $RowCourses['description'];
    echo '
          <option value="'.$ProgrammeId.'" selected>'.$ProgrammeTitle.'</option>

          ';


        }}



          ?>
        </optgroup></select></div>
    <div
        class="form-group">
        <h4>Class</h4><select class="form-control" name="class" required><optgroup label="Choose class to upload the assignment">
<?php
//Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes");
                                    while($RowClass = mysqli_fetch_assoc($QueryClass)){
                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);
                                    echo '
                                    <option value="'.$ClassId.'" selected>'.$ClassName.'</option>

                                    ';

                                  }

                                    ?>
          

        </optgroup></select></div>
        <div
            class="form-group">
            <h4>Year</h4><select class="form-control" name="year" required><optgroup label="This is a group"><option  selected>one</option><option >two</option><option value="14">three</option></optgroup></select></div>
            <div
                class="form-group">
                <h4>Due date</h4><input class="form-control" type="date" name="due_date" required /></div>
                <div class="form-group" style="background-color: #cccccc;">
                    <h4>Assignment file</h4><input type="file" name="file" required /></div>
                <div class="form-group" style="background-color: #fffefe;">
                    <h4>Small description</h4><textarea class="form-control" style="height: 100px;" name="description" required></textarea></div>
                
                <div class="form-group"><button class="btn btn-primary btn-block" name="submit" type="submit">Upload</button></div></form>
     </div>
    </div>
  </div>
</div>



                                </h5><table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
            <?php



$query_data = mysqli_query($conn, "SELECT * FROM assignments where s_from='$user_id' ORDER BY 1 DESC LIMIT 50 ");
$countData = mysqli_num_rows($query_data);

if ($countData > 0) {
    echo '<thead>
    <tr>
        <th>Name</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Deadline</th>
        <th>Accademic Year</th>
        <th>From</th>
        <th>Submitted</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>';

    while ($rowAssignments = mysqli_fetch_assoc($query_data)) {
        $Title = mysqli_real_escape_string($conn, $rowAssignments['name']);
        $AssigmentId = mysqli_real_escape_string($conn, $rowAssignments['id']);
          //Counting submitted assignments
        $SubmittedAssigments = mysqli_query($conn, "SELECT * FROM submitted_assigments WHERE assignment_id='$AssigmentId'");
        $NumberOfSubmitted = mysqli_num_rows($SubmittedAssigments);
        //Loop continues
       $AssimentSubject = mysqli_real_escape_string($conn, $rowAssignments['subject']);
       $AssimentDeadline = mysqli_real_escape_string($conn, $rowAssignments['deadline']);
       $AccademicYear = mysqli_real_escape_string($conn, $rowAssignments['accademic_year']);
       $from = mysqli_real_escape_string($conn, $rowAssignments['s_from']);
       $file = mysqli_real_escape_string($conn, $rowAssignments['file']);
 //Getting lecturers
       $GettingLecturers = mysqli_query($conn, "SELECT * FROM lecturers WHERE id='$from'");
       
       $RowLectuers = mysqli_fetch_assoc($GettingLecturers);
       $Lecturer_name = mysqli_real_escape_string($conn, $RowLectuers['name']);
       $classTo = mysqli_real_escape_string($conn, $rowAssignments['class']); 

       //Get Class
       $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$classTo'");
       $rowClass = mysqli_fetch_assoc($QueryClass);
       $ClassName = mysqli_real_escape_string($conn, $rowClass['class_name']); 

       // modify this setting your expiry time
$expiry = $AssimentDeadline;

$today = date("Y-m-d", time());

if( $today > $expiry)    {
  

                
   }
else
   {   
    
    echo 
    '
    <tr>
                <td>'.$Title.'</td>
                <td>'.$ClassName.'</td>
                <td>'.$AssimentSubject.'</td>
                <td>'.$AssimentDeadline.'</td>
                <td>'.$AccademicYear.'</td>
                <td>'.$Lecturer_name.'</td>
                <td><a href="assignment_view.php?id='.$AssigmentId.'">'.$NumberOfSubmitted.'</a></td>
                <td><a href="'.$site_url.'/panel/uploads/assignments/'.$file.'" type="button" class="btn-sm btn btn-secondary">View</a>
                <button type="button" class="btn-sm btn btn-primary">Edit</button>

                </td> 
            </tr>
    ';
}

   }
   
}
else{
    echo '<h5>You have no assigments assigned!</h5>';
}
            ?>
            
            
        </tbody>

    </table>





    <h4 class="text-center" style="color: #d71919;background-color: #fbcccc;">&nbsp; Outdated</h4><table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
            <?php



$query_data = mysqli_query($conn, "SELECT * FROM assignments where s_from='$user_id' ORDER BY 1 DESC limit 25 ");
$countData = mysqli_num_rows($query_data);

if ($countData > 0) {
    echo '<thead>
    <tr>
        <th>Name</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Deadline</th>
        <th>Accademic Year</th>
        <th>From</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>';
    while ($rowAssignments = mysqli_fetch_assoc($query_data)) {
        $Title = mysqli_real_escape_string($conn, $rowAssignments['name']);
        $AssigmentId = mysqli_real_escape_string($conn, $rowAssignments['id']);
        //Counting submitted assignments
        $SubmittedAssigments = mysqli_query($conn, "SELECT * FROM submitted_assigments WHERE assignment_id='$AssigmentId'");
        $NumberOfSubmitted = mysqli_num_rows($SubmittedAssigments);
        //Loop continues
       $AssimentSubject = mysqli_real_escape_string($conn, $rowAssignments['subject']);
       $AssimentDeadline = mysqli_real_escape_string($conn, $rowAssignments['deadline']);
       $AccademicYear = mysqli_real_escape_string($conn, $rowAssignments['accademic_year']);
       $from = mysqli_real_escape_string($conn, $rowAssignments['s_from']);
        $file = mysqli_real_escape_string($conn, $rowAssignments['file']);
 //Getting lecturers
       $GettingLecturers = mysqli_query($conn, "SELECT * FROM lecturers WHERE id='$from'");
       
       $RowLectuers = mysqli_fetch_assoc($GettingLecturers);
       $Lecturer_name = mysqli_real_escape_string($conn, $RowLectuers['name']);
       $classTo = mysqli_real_escape_string($conn, $rowAssignments['class']); 

       //Get Class
       $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$classTo'");
       $rowClass = mysqli_fetch_assoc($QueryClass);
       $ClassName = mysqli_real_escape_string($conn, $rowClass['class_name']); 
       // modify this setting your expiry time


$expiry = $AssimentDeadline;

$today = date("Y-m-d", time());

if( $today > $expiry)    {
  

              
    echo 
    '
    <tr>
                <td>'.$Title.'</td>
                <td>'.$ClassName.'</td>
                <td>'.$AssimentSubject.'</td>
                <td>'.$AssimentDeadline.'</td>
                <td>'.$AccademicYear.'</td>
                <td>'.$Lecturer_name.'</td>
                <td><a href="../uploads/assignments/'.$file.'" type="button" class="btn btn-secondary">View</a>
                <button type="button" class="btn btn-primary">Edit</button>

                </td> 
            </tr>
    ';
   }
else
   {   
    //echo '<h3>No Outdated Assignments</h3></h3>';

   }
    
}
}
else{
    echo '<h5>You have no assigments assigned!</h5>';
}
            ?>
            
            
        </tbody>
    </table>
    <br>
    <hr>
    <p class="text-center"><a class="btn btn-primary btn-sm" role="button" style="margin-top: -6px;" href="../teacher.php"><i class="fa fa-home"></i> GO BACK</a></p>

    
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>