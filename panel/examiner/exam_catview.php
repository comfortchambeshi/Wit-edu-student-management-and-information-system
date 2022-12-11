<?php
include '../inc/auto-loader.php';
include '../inc/dbconnect.inc.php';
include '../inc/teacher_login_function.php';
include('../inc/teacher_mains.php');






    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style type="text/css">
    
        
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/Login-Form-Clean.css">

<div class="container">

    <h3 class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Send Results</button></h3>
    
    <?php
   if (isset($_GET['id'])) {
       $URLid = $_GET['id'];

       //Getting full name
       $ExamByUrl = mysqli_query($conn, "SELECT * FROM exams_category WHERE id='$URLid'");
       $rowExamurl = mysqli_fetch_assoc($ExamByUrl);
       $ExamurlName = mysqli_real_escape_string($conn, $rowExamurl['e_name']);
       $ExamurlStatus = mysqli_real_escape_string($conn, $rowExamurl['e_status']);
       if ($ExamurlStatus == 'pending') {
        $color = 'warning';
       }
       else {
        $color = 'success';
       }
       echo '<title> Managing '.$ExamurlName.' | '.$site_name.'</title>';

       echo 
       '
       <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  
       <div class="login-clean">
        <form method="post" style="max-width: 100%;" action="send2.php?id='.$URLid.'" enctype="multipart/form-data">
            <h2 class="sr-only">Login Form</h2>
            <h4 class="text-center">Upload the examination script</h4>
            <div class="form-group">
                <h5>Grade</h5><input class="form-control" type="text" required="" name="results_grade" placeholder="enter marks grade"></div>

                <div class="form-group">
                <h5>Student Exam Number</h5><input class="form-control" type="text" required="" name="exam_number" placeholder="student Exam Number grade"></div>
            <div class="form-group">
                <h5>Script file</h5><input required="" type="file" name="script_file"></div>
            <div class="form-group">
                <h5>Comment</h5><textarea class="form-control form-control-lg" required="" name="results_comment" ></textarea></div>
            
            <div
                class="form-group">
                <h5>Student Year</h5><select name="year" class="form-control"><optgroup label="Student Year"><option value="one" selected="">One</option><option value="two">Two</option><option value="three">Three</option>
               <option value="four">Four</option
                </optgroup></select></div>
    <div
        class="form-group">
        <h5>Student Class</h5><select name="class" class="form-control"><optgroup label="Select classroom">

';
//Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes ");
                                    while($RowClass = mysqli_fetch_assoc($QueryClass)){

                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);

                                    echo '<option value="'.$ClassId.'" >'.$ClassName.'</option>';

                                }

echo '

        </optgroup></select></div>
        <div
            class="form-group"><button class="btn btn-primary btn-block" type="submit" name="results_btn">SEND</button></div>
            </form>
            </div>
    </div>
  </div>
</div>
       
       ';
       //Getting results from url id
       $Results = mysqli_query($conn, "SELECT * FROM exam_results WHERE exam_id='$URLid'");

       if (mysqli_num_rows($Results) > 0) {
           echo ' <div class="col-md-12">
           <h4>'.$ExamurlName.', Status: <b class="text-'.$color.'">'.$ExamurlStatus.'</b></h4>
           <div class="table-responsive">
   
                   
                 <table id="mytable" class="table table-bordred table-striped">
                      
                      <thead>
                      
                      <th><input type="checkbox" id="checkall" /></th>
                      <th>Name</th>
                      
                        <th>Exam NO.</th>
                        
                         <th>Edit</th>
                         
                          <th>Delete</th>
                      </thead>
       <tbody>';

       while ($RowResults = mysqli_fetch_assoc($Results)) {
           $ExamToName = mysqli_real_escape_string($conn, $RowResults['marks_to']);
           //Getting full name of the results owner
           $Owner = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$ExamToName'");
           $rowOwner = mysqli_fetch_assoc($Owner);
           $OwnerName = mysqli_real_escape_string($conn, $rowOwner['student_name']);
           $OwnerExamNumber = mysqli_real_escape_string($conn, $rowOwner['exam_number']);
          echo 
          '
          <tr>
          <td><input type="checkbox" class="checkthis" /></td>
          <td>'.$OwnerName.'</td>
          <td>'.$OwnerExamNumber.'</td>
          
          <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
          <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
          </tr>
          ';
       }
       
    
       }
       else {
           echo '<h5>There are no results sent from this category!</h5>';
       }
   }


?>
		
        
       
    
 
    
   
    
   
    
    </tbody>
        
</table>


                
            </div>
            
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    <hr>
               <div class="container">
               
               <h4 class="text-center"><button  button class="btn btn-success "  type="button" data-toggle="modal" data-target="#exampleModal"> Publish Results </button> </h4>
               <h4><a href="exams.php" button class="btn btn-primary" type="button"> GO BACK </a> </h4>


<!-- Modal -->
<?php
echo '
<form action="inc/exam_status.php?id='.$URLid.'" method="POST" ">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sending confirmation!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you wan\'t to send these results?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancell</button>
        <button type="submit" name="results_approve" class="btn btn-primary">Approve</button>
      </div>
    </div>
  </div>
</div>';
?>


              </div>
<script type="text/javascript">
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>
</body>
</htm


