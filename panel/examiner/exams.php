<?php
include '../inc/auto-loader.php';
    include '../functions/teacher_header2.php';

include '../inc/dbconnect.inc.php';
include '../inc/teacher_login_function.php';
include('../inc/teacher_mains.php');


echo '<title>Examination portal | '.$site_name.'</title>';







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
<div class="login-clean">
<h6 class="text-center">Welcome to examiners portal

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Create exam to send
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add exam type before sending..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form style="width:100%;max-width:100%;" action="exams.php" method="post"> 
      <label for="recipient-name" class="col-form-label">Exam name:</label>
            <input type="text" name="exam_name" class="form-control" id="recipient-name">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <select name="exam_category" class="form-control"><optgroup label="Choose main category">
                <?php

            
                   //Getting examiners
          $sqlExaminers = mysqli_query($conn,  "SELECT * FROM examiners WHERE teacher_id='$user_id'");
          if (mysqli_num_rows($sqlExaminers) > 0) {
            

            $Options = "exams";
            
          }
          else{
          	$Options = "exams WHERE name='General Exams'";
          }


                $Exams = mysqli_query($conn, "SELECT * FROM $Options");
                while ($RowExamsCat = mysqli_fetch_assoc($Exams)) {
                    $name = mysqli_real_escape_string($conn, $RowExamsCat['name']);
                    $id = mysqli_real_escape_string($conn, $RowExamsCat['id']);

              


                   echo 
                   '
                   <option  value="'.$id.'" selected><b>'.$name.'</b></option>
                   ';
                }
                
                ?>
        </optgroup></select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="exam_btn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
            </form>


</h6>
<form style="width: 100%;max-width: 100%;">
<?php
$Exams = mysqli_query($conn, "SELECT * FROM exams_category WHERE exam_from='$user_id' ORDER BY 1 DESC LIMIT 20 ");

if (mysqli_num_rows($Exams) > 0) {
   echo 
   '
   
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th>Name</th>
                        <th>date published</th>
                        <th>Status</th>
                        <th>by</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>';

                while ($RowExams = mysqli_fetch_assoc($Exams)) {
                    $ExamName = mysqli_real_escape_string($conn, $RowExams['e_name']);
                    $DatePublished = mysqli_real_escape_string($conn, $RowExams['published_date']);
                     $ExamStatus = mysqli_real_escape_string($conn, $RowExams['e_status']);
                     $ExamBy = mysqli_real_escape_string($conn, $RowExams['exam_from']);
                     $CategoryId = mysqli_real_escape_string($conn, $RowExams['exam_category']);
                     $Id  = mysqli_real_escape_string($conn, $RowExams['id']);
                     //Getting a Lecturer
                     $lECTURER = mysqli_query($conn, "SELECT * FROM lecturers WHERE id='$ExamBy'");
                     $RowLecturer = mysqli_fetch_assoc($lECTURER); 
                     $LecturerName = mysqli_real_escape_string($conn, $RowLecturer['name']);
                      
                     if ($ExamStatus == 'draft') {
                        $bg = 'warning';
                        $color = 'danger';
                     }
                     else {
                         $bg = 'success';
                         $color = ' success';
                     }
                     //Getting exam category name instead of id
                     $Category = mysqli_query($conn, "SELECT * FROM exams WHERE id='$CategoryId'");
                     $rowCategory = mysqli_fetch_assoc($Category);
                     $CatName = mysqli_real_escape_string($conn, $rowCategory['name']);

                   echo ' <tr class="border-primary">
                   <td><a href="exam_catview.php?id='.$Id.'"><strong>'.$ExamName.'</strong></a></td>
                   <td>'.$DatePublished.'</td>
                   <td class="table-'.$bg.' text-'.$color.'" style="color:'.$color.';">'.$ExamStatus.'</td>
                   <td>'.$LecturerName.'</td>
                   <td>'.$CatName.'</td>
               </tr>';
                }
                   
                    echo '
                </tbody>
            </table>
        </div>
    </form>
   
    
   ';
}
else {
    echo '<h5>You have not prepared any results. <a href="#">Click here to send</a></h5>';
}
    
?>
<div class="container"></div>
</div>
    <p class="text-center"><em><strong>NOTE: &nbsp;</strong>Before you approve please make sure tha you have checked everything</em></p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <div class="container">
               <h4 class="text-center"><a href="../teacher.php" button class="btn btn-primary" type="link"> GO TO MAIN PAGE </a></h4></div>
</body>

</html>

<?php

if (isset($_POST['exam_btn'])) {
   $examName = mysqli_real_escape_string($conn, $_POST['exam_name']);
   $examCategory = mysqli_real_escape_string($conn, $_POST['exam_category']);
   $date = date('y-m-d');
   

//Inserting the exam type into database
$InsertExams = mysqli_query($conn, "INSERT INTO exams_category(e_name, exam_from, published_date, exam_category, e_status)VALUES('$examName', '$user_id', '$date', '$examCategory', 'draft')");

echo '<script>alert("Exam type submitted successfully, now all you need to do is to send the buld examination results!");
window.location.href = "exams.php";

	</script>';

}

?>