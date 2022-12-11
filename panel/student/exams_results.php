<?php
include '../inc/auto-loader.php';
include '../functions/header.php';
include '../inc/login_function.php';
include '../inc/dbconnect.inc.php';
include '../inc/mains.php';


$userid =  $LoginObj->isLoggedIn();
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
            <h1 class="m-0 text-dark">CA Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Grades</a></li>
              <li class="breadcrumb-item active">CA</li>
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
<?php



    ?>
    <br><br>

    <div class="container" style="background-color: #f1f7fc;">



    
            <?php
            echo' <title>Exam results | '.$site_name.'</title>';
            $QuerryMarks = mysqli_query($conn, "SELECT * FROM exam_results WHERE marks_to='$user_id' and name='one'");
            echo '<h3 class="text-center"></h3>

<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <br><br><br><br><br><br>
       <div class="login-clean">
        <form method="post" style="max-width: 100%;" action="send2.php" enctype="multipart/form-data">
            <h2 class="sr-only">Login Form</h2>
            <h4 class="text-center">Upload the examination script</h4>
            <div class="form-group">
                <h5>Grade</h5><input class="form-control" type="text" required="" name="results_grade" placeholder="enter marks grade"></div>

                <div class="form-group">
                <h5>Student Exam Number</h5><input class="form-control" type="text" required="" name="exam_number" placeholder="student Exam Number grade"></div>
            <div class="form-group">
                <h5>Script file</h5><input required="" type="file" name="script_file"></div>
            <div class="form-group">
                <h5>Comment</h5><textarea class="form-control form-control-lg" required="" name="results_comment" rows="120" cols="12"></textarea></div>
            <div class="form-group">
                <h5>Term</h5><select name="term" class="form-control"><optgroup label="Select a term"><option value="one" selected="">One</option><option value="two">Two</option><option value="14">Three</option></optgroup></select></div>
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
            if (mysqli_num_rows($QuerryMarks) > 0) {

               
                    
                   
                 echo '


                       
                 <h1 class="text-center" style="color: #cccccc;background-color: #25476a;"> Term One 
                       

                 </h1>
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>Examination Script</th>
                <th>Grade</th>
               
                <th>Comment</th>
                <th>Year</th>
                
            </tr>
        </thead>
        <tbody>
        ';
         while ($rowExamResults = mysqli_fetch_assoc($QuerryMarks)) {
            $Subject = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['subject']));
            $ObtainedMarks = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['obtained_marks']));
            $ObtainedGrade = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['grade']));
            $ResultComment = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['comment']));
            $Year = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['year']));
            $script_file = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['script_file']));

        echo'

                <tr>
                
                <td><h4><a href="uploads/results/'.$script_file.'">Download</a></h4></td>
                <td>'.$ObtainedGrade.'</td>
                <td>'.$ResultComment.'</td>
                <td>'.$Year.'</td>
                
            </tr>';
               
            }
        }
            else{
                echo '<h4>You have no results in your database!</h4>';
            }


            ?>

            
           
            
        </tbody>
    </table>
</div>
<hr>



<div class="container" style="background-color: #f1f7fc;">



    
            <?php
            $QuerryMarks = mysqli_query($conn, "SELECT * FROM exam_results WHERE marks_to='$user_id' and name='two'");
            echo '<h3 class="text-center"></h3>

<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <br><br><br><br><br><br>
       <div class="login-clean">
        <form method="post" style="max-width: 100%;" action="send2.php" enctype="multipart/form-data">
            <h2 class="sr-only">Login Form</h2>
            <h4 class="text-center">Upload the examination script</h4>
            <div class="form-group">
                <h5>Grade</h5><input class="form-control" type="text" required="" name="results_grade" placeholder="enter marks grade"></div>

                <div class="form-group">
                <h5>Student Exam Number</h5><input class="form-control" type="text" required="" name="exam_number" placeholder="student Exam Number grade"></div>
            <div class="form-group">
                <h5>Script file</h5><input required="" type="file" name="script_file"></div>
            <div class="form-group">
                <h5>Comment</h5><textarea class="form-control form-control-lg" required="" name="results_comment" rows="120" cols="12"></textarea></div>
            <div class="form-group">
                <h5>Term</h5><select name="term" class="form-control"><optgroup label="Select a term"><option value="one" selected="">One</option><option value="two">Two</option><option value="14">Three</option></optgroup></select></div>
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
            if (mysqli_num_rows($QuerryMarks) > 0) {

               
                    
                   
                 echo '


                       
                 <h1 class="text-center" style="color: #cccccc;background-color: #25476a;"> Term One 
                       

                 </h1>
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>Examination Script</th>
                <th>Grade</th>
               
                <th>Comment</th>
                <th>Year</th>
                
            </tr>
        </thead>
        <tbody>
        ';
         while ($rowExamResults = mysqli_fetch_assoc($QuerryMarks)) {
            $Subject = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['subject']));
            $ObtainedMarks = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['obtained_marks']));
            $ObtainedGrade = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['grade']));
            $ResultComment = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['comment']));
            $Year = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['year']));
            $script_file = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['script_file']));

        echo'

                <tr>
                
                <td><h4><a href="uploads/results/'.$script_file.'">Download</a></h4></td>
                <td>'.$ObtainedGrade.'</td>
                <td>'.$ResultComment.'</td>
                <td>'.$Year.'</td>
                
            </tr>';
               
            }
        }
            else{
                echo '<h4>You have no results in your database for term two!</h4>';
            }


            ?>

            
           
            
        </tbody>
    </table>
</div>
<hr>


<div class="container" style="background-color: #f1f7fc;">



    
            <?php
            $QuerryMarks = mysqli_query($conn, "SELECT * FROM exam_results WHERE marks_to='$user_id' and name='three'");
            echo '<h3 class="text-center"></h3>

<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <br><br><br><br><br><br>
       <div class="login-clean">
        <form method="post" style="max-width: 100%;" action="send2.php" enctype="multipart/form-data">
            <h2 class="sr-only">Login Form</h2>
            <h4 class="text-center">Upload the examination script</h4>
            <div class="form-group">
                <h5>Grade</h5><input class="form-control" type="text" required="" name="results_grade" placeholder="enter marks grade"></div>

                <div class="form-group">
                <h5>Student Exam Number</h5><input class="form-control" type="text" required="" name="exam_number" placeholder="student Exam Number grade"></div>
            <div class="form-group">
                <h5>Script file</h5><input required="" type="file" name="script_file"></div>
            <div class="form-group">
                <h5>Comment</h5><textarea class="form-control form-control-lg" required="" name="results_comment" rows="120" cols="12"></textarea></div>
            <div class="form-group">
                <h5>Term</h5><select name="term" class="form-control"><optgroup label="Select a term"><option value="one" selected="">One</option><option value="two">Two</option><option value="14">Three</option></optgroup></select></div>
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
            if (mysqli_num_rows($QuerryMarks) > 0) {

               
                    
                   
                 echo '


                       
                 <h1 class="text-center" style="color: #cccccc;background-color: #25476a;"> Term One 
                       

                 </h1>
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>Examination Script</th>
                <th>Grade</th>
               
                <th>Comment</th>
                <th>Year</th>
                
            </tr>
        </thead>
        <tbody>
        ';
         while ($rowExamResults = mysqli_fetch_assoc($QuerryMarks)) {
            $Subject = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['subject']));
            $ObtainedMarks = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['obtained_marks']));
            $ObtainedGrade = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['grade']));
            $ResultComment = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['comment']));
            $Year = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['year']));
            $script_file = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['script_file']));

        echo'

                <tr>
                
                <td><h4><a href="uploads/results/'.$script_file.'">Download</a></h4></td>
                <td>'.$ObtainedGrade.'</td>
                <td>'.$ResultComment.'</td>
                <td>'.$Year.'</td>
                
            </tr>';
               
            }
        }
            else{
                echo '<h4>You have no results in your database!</h4>';
            }


            ?>

            
           
            
        </tbody>
    </table>
</div>
<hr>




</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include '../inc/footer.php';
  ?>