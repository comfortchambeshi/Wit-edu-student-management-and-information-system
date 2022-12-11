<?php
include '../inc/dbconnect.inc.php';
include($_SERVER['DOCUMENT_ROOT'].'/inc/login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/teacher_login_function.php');

if(teacher_Login::isLoggedIn()){
    
    $include = 'teacher_mains.php';
}
else{
    $include = 'mains.php';
    
}

include '../inc/'.$include.'';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>e-school</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="lessons.html">Lessons</a></li>
                <li class="nav-item"><a class="nav-link" href="class_view.html">Modules</a></li>
                <li class="nav-item"><a class="nav-link" href="#">TimeTable</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            </ul>
        </div>
    </div>
    <form method="POST" action="inc/start_class.inc.php?tid=<?php echo$user_id; ?>">
    <div class="bg-light border rounded-0 highlight-clean">
        
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Start online class</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <p>The content of your modal.</p>
                        
                            <div class="form-group"><small class="form-text text-muted">Session Topic</small><input class="form-control" type="text" name="e_class_name" placeholder="Enter class name"></div>
                            <div class="form-group"><small class="form-text text-muted">Class type</small>
                            <select name="class_type" class="form-control">
                                    <optgroup label="Select study mode to teach">
                                     <option value="web_camera">Web Camera</option>
                                     <option value="screen_sharing">Screen Sharing</option>
                                     <option value="none">None</option>
                                </select>
                            </div>
                            <div class="form-group"><small class="form-text text-muted">Class to teach</small><select name='physical_class' class="form-control"><optgroup label="Select a class to teach">
                                

                                <?php
//Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes ");
                                    while($RowClass = mysqli_fetch_assoc($QueryClass)){

                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);

                                    echo '<option value="'.$ClassId.'" >'.$ClassName.'</option>';
                                }

                                    ?>
                            </optgroup></select></div>


                            <div class="form-group"><small class="form-text text-muted">Subject</small><select name='subject' class="form-control"><optgroup label="Select your teaching subject">
                                

                                <?php
//Getting class name
                                    $QuerySubject = mysqli_query($conn, "SELECT * FROM subjects ");
                                    while($RowSubject = mysqli_fetch_assoc($QuerySubject)){

                                    $SubjectName = mysqli_real_escape_string($conn, $RowSubject['name']);
                                    $SubjectId = mysqli_real_escape_string($conn, $RowSubject['id']);

                                    echo '<option value="'.$SubjectId.'" >'.$SubjectName.'</option>';
                                }

                                    ?>
                            </optgroup></select></div>

                            <div class="form-group"><small class="form-text text-muted">Study Year</small><select name='study_year' class="form-control"><optgroup label="Select a class to teach">
                                

                                <?php
//Getting class name

                                    echo '<option value="one" >One</option>

                                          <option value="two" >Two</option>
                                          <option value="three" >Three</option>
                                    ';
                                

                                    ?>
                            </optgroup></select></div>
                            <div class="form-group">
                                <small class="form-text-muted">Study Mode</small>
                                <select name="study_mode" class="form-control">
                                    <optgroup label="Select study mode to teach">
                                     <option value="Full time">Full Time</option>
                                     <option value="Distance">Distance</option>
                                </select>
                            </div>
                            <div
                                class="form-group"><small class="form-text text-muted">Ending time</small><input name='ending_time' class="form-control" type="time"></div>
                    
                </div>
                <div class="modal-footer"><button  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" name="class_btn" type="submit">Start</button></div>
                </form>
            </div>
        </div>
    </div>
    
        <div class="container">
            <div class="intro">
                <h2 class="text-center">E-Learning</h2>
                <p class="text-center">This section allows you to study online</p>
            </div>

            <?php
            if(teacher_Login::isLoggedIn()){
                
                echo '<div class="buttons"><a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" role="button" href="#">Start a class</a><button class="btn btn-light" type="button">UPLOAD MODULES</button></div>';
            }
            else{
                include '../inc/mains.php';
                echo'
            <div class="buttons"><a class="btn btn-primary" role="button" href="#">Join class</a><button class="btn btn-light" type="button">LibrarY</button></div>';
        }

            ?>
        </div>
    </div>
    <h4 class="text-center text-light bg-primary">Recent classrom sessions</h4>
    <div class="card-group">
        <?php
//Querying
        $QueryClass = mysqli_query($conn, "SELECT * FROM e_classes ORDER BY 1 DESC LIMIT 5");

        if (mysqli_num_rows($QueryClass) > 0) {
            # code...
        
                                    while($RowClass = mysqli_fetch_assoc($QueryClass)){

                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['name']);
                                    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);
                                    $start_datetime  = mysqli_real_escape_string($conn, $RowClass['start_datetime']);  
        echo '
        <div class="card"><img class="card-img-top w-100 d-block">
            <div class="card-body">
                <h4 class="card-title">'.$ClassName.'</h4>
                <h6>Mr. Gondwe</h6>
                <p class="card-text">-&nbsp; '.$start_datetime.'</p><button class="btn btn-primary" type="button">View session</button></div>
        </div>';
    }
    }
    else{
        echo 'No classes availbale!';
    }

        
       
    

?>
    </div>
    <h4 class="text-center text-light bg-primary border rounded-0">Study modules you may like</h4>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin-bottom: 8px;">
                    <div class="media border rounded-0"><img class="img-thumbnail mr-3" src="assets/img/logobass.png">
                        <div class="media-body">
                            <h6>History &amp; Philosophy</h6>
                            <p>- MR. Chambeshi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>