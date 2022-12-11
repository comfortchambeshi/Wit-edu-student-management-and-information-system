<?php

class profile extends db{

//function for a student

public function student_profile($user_fname, $user_lname, $user_img,$user_class,$user_location,$BalanceToPay,$user_email,$user_phone,$study_year,$study_mode,$semester){
$sql = "SELECT * FROM classes WHERE id=?";
$stmt = $this->connect()->prepare($sql);
$stmt->execute([$user_class]);
$row = $stmt->fetch();
$user_class = $row['class_name'];
  $fullNames = $user_fname. ' '.$user_lname;
echo ' <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">edit info</a></li>
              <li class="breadcrumb-item active">Update</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../uploads/students_profiles/'.$user_img.'"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">'.$fullNames.'</h3>

                <p class="text-muted text-center">'.$fullNames.'</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Balance</b> <a class="float-right">'.$BalanceToPay.'</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">'.$user_email.'</a>
                  </li>
                  <li class="list-group-item ">
                    <p class="text-center"><a data-toggle="modal" data-target="#student_password" class="btn btn-danger text-light btn-block float-center ">Change Password</a></p>
                  </li>
                  
                  
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Class</strong>

                <p class="text-muted">
                 '.$user_class.'
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">'.$user_location.'</p>

                

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Study Year</strong>

                <p class="text-muted">'.$study_year.'</p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Semester</strong>

                <p class="text-muted">'.$semester.'</p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Mode Of Study</strong>

                <p class="text-muted">'.$study_mode.'</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form  action="" method="POST" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input name="first_name" type="text" class="form-control" id="inputName" value="'.$user_fname.'" placeholder="Name">
                        </div>
                        
                        
                        
                        
                      </div>
                       <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input name="last_name" type="text" class="form-control" id="inputName" value="'.$user_lname.'" placeholder="Name">
                        </div>
                        
                        
                        
                        
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input name="email" type="email" class="form-control" id="inputEmail" value='.$user_email.' placeholder="Email">
                        </div>
                      </div>
                      
                       <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone#</label>
                        <div class="col-sm-10">
                          <input name="phone_number" type="number" class="form-control" id="inputEmail" value='.$user_phone.' placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                          <select required="" class="form-control" name="class"><optgroup label="Choose a class for a student">';
                          


                    


//Getting class name
                                    $sql = "SELECT * FROM classes";
                                    $stmt = $this->connect()->query($sql);
                                    $rows = $stmt->FetchAll();
                                    
                                    foreach($rows as $RowClass)
                                    {

                                    $ClassName = $RowClass['class_name'];
                                    $ClassId = $RowClass['id'];

                                    echo '<option  value="'.$ClassId.'" >'.$ClassName.'</option>';

                                }


                        
                          echo '
                          </optgroup></select>
                        </div>
                      </div>
                      
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button name="update_sbtn" type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->';
    
   }
//updating information

public function update_StudentProfile($first_name,$last_name,$class,$email,$phone_number,$user_id){
    $sql = "UPDATE students SET first_name=?,last_name=?,class_id=?,student_email=?,phone_number=? WHERE system_id=?";
    $stmt = $this->connect()->prepare($sql);
    if(!$stmt->execute([$first_name,$last_name,$class,$email,$phone_number,$user_id])){
        print_r($stmt->errorInfo());
    }
    
}

//Update Srudent profile

public function student_password($old_password,$new_password,$user_id){
    
    $sql = "SELECT * FROM students WHERE system_id=?";
    $stmt = $this->connect()->prepare($sql);
    
    $stmt->execute([$user_id]);
    
    $rows = $stmt->fetchAll();
    foreach($rows as $row){
    $old_pwd = $row['student_password'];
        
    $passwrdVerify = password_verify($old_password, $row['student_password']);
    	if ($passwrdVerify == false) {
               		echo '<script>alert("Invalid old password!");
				window.location.href = "profile.php";
				
					</script>';
               		exit();

                       

       }else{
           
           $update = "UPDATE students SET student_password=? WHERE system_id=?";
           $stmtpwd = $this->connect()->prepare($update);
           
           if($stmtpwd->execute([$new_password,$user_id])){
           
           echo '<script>alert("Password changed successfully!");
				window.location.href = "profile.php";
				
					</script>';
               		exit();
           }
           else{
               print_r($stmtpwd->errorInfo());
           }
       }
        
    }
    
    
}
    
    
    
}