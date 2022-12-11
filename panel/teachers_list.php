<?php
include '../inc/auto-loader.php';
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$logged_header = '';

$logged_header = header1($logged_header);




include 'inc/admin_sidebar.php';
//loading classes

include 'classes/users.php';
//end load
?>
<title>Teachers list</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teachers <span data-toggle="modal" data-target="#exampleModalCenter" class="badge badge-info right">Add Teacher</span>
            <form method="POST" action="inc/download.php">
    					    <button style="width:180px;margin-left:260px;margin-top:-70px;" name="teachers_export" type="submit" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Export CSV</span></button></form>
            </h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teachers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<div style="margin-bottom:20px;" class="row">
        <div class="col-md-6">
    		<form method="post" action="">
            <div id="custom-search-input">
                <div class="input-group col-md-12 align-center">
                    <input name="search_text" type="text" class="form-control input-lg" placeholder="Enter Name, Email, Mobile or id number" />
                    <span class="input-group-btn">
                        <button name="search_acc" class="btn btn-info btn-lg" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        </form>
	</div>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            
      <?php


                               $users = new users();
           
                        if(isset($_POST['search_acc'])){
                               
                                $search_text = "%{$_POST['search_text']}%";
                                
                                $teachers = $users->teachers('yes',$search_text);
                                
                            
                                
                            }else{
                                $teachers = $users->teachers('no','no');
                                
                                
                            }
                             
                          
                                 foreach($teachers as $RowteachersList){
                                
                                    $teacherFullName = $RowteachersList['name'];
                                    $teacherPhoneNumber = $RowteachersList['mobile_number'];
                                    $teacherId = $RowteachersList['ts_number'];
                                    $teacherCityTown = $RowteachersList['city_town'];
                                    $DB_id = $RowteachersList['id'];
                                    $nrc = $RowteachersList['nrc'];
                                    $profile_pic = $RowteachersList['profile_pic'];
                                    $RegisteredDate = $RowteachersList['registered_date'];
                                    $teacher_Subjects = $RowteachersList['subjects_id'];

                                    //Getting class name
                                    $QuerySubject = mysqli_query($conn, "SELECT * FROM prgramme_outline WHERE id='$teacher_Subjects'");
                                    $RowClass = mysqli_fetch_assoc($QuerySubject);
                                    $SubjectName = $RowClass['name'];
                                    echo'
              
              <div data-toggle="modal" data-target="#b'.$DB_id.'"   class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                    <b data-toggle="modal" data-target="#'.$DB_id.'">'.$teacherFullName.'</b>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <p class="text-muted text-sm"><b>Subejcts: </b>'.$SubjectName.' </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> City/Town: '.$teacherCityTown.'</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: '.$teacherPhoneNumber.'</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="uploads/teachers_profiles/'.$profile_pic.'" alt="" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-danger">
                          
                          <i class="fas fa-trash"></i>
                        </a>
                      <a href="#" class="btn btn-sm bg-teal">
                          
                          <i class="fas fa-info"></i>
                        </a>
                      <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              <!-- Modal -->
<div class="modal fade" id="b'.$DB_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Teacher Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="teachers_list.php?uid='.$DB_id.'" style="  max-width: 100%;
  width: 100%;
">
      
        <div class="media border rounded-0" style="  background-color: #bcb4b4;
"><img class="rounded-circle img-fluid border mr-3" width="100px" src="uploads/teachers_profiles/'.$profile_pic.'" height="100px" />
            <div class="media-body">
                <h5 class="text-primary">'.$teacherFullName.'</h5>
                <p>NRC: '.$nrc.'</p>
            </div>
        </div>
        <div class="form-group"><strong>Can send exams</strong><select name="ex_status" class="border rounded-0 border-dark form-control"><optgroup label="Do you want this user to be handling the examinations"><option value="no" selected>No</option><option value="yes">Yes</option></optgroup></select></div>
        <div
            class="form-group"><span class="text-danger"></span>
            <p class="text-info">When you are done editing you can click save changes below!<br /></p><button class="btn btn-primary btn-block btn-sm border rounded-0" type="submit" name="save_btn">Save Cahnges</button></div>
</form>
      </div>
      
    </div>
  </div>
</div>
              
              
              ';
                            }
                             
              
              ?>
       
          </div>
        </div>
        
        <!-- Modal for adding a student -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adding A Teacher..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="contact-clean">
        <form method="post" style="width: 100%;max-width: 100%;" enctype="multipart/form-data" action="inc/teacher_reg.inc.php">
            <h2 class="text-center">Add teacher</h2>
            <h4 style="background-color: #358cce;color: #ffffff;">Main info</h4>
            <div class="form-group"><input class="form-control" type="text" required="" name="full_name" placeholder="Full name"></div>
            <div class="form-group"><input class="form-control" type="text" required="" name="username" placeholder="Username"></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Date of Birth</h6><input name="dob" class="form-control" type="date"></div>
            <div class="form-group"><input required="" class="form-control" type="text" name="ts_number" placeholder="Service number"></div>
            <div class="form-group"><input required="" class="form-control" type="text" name="nrc_number" placeholder="National ID number"></div>
            
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Gender</h6><select class="form-control" name="gender"><optgroup label="Choose teacher gender"><option selected="">Male</option><option >Female</option></optgroup></select></div>
           
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>teacher profile picture</h6><input type="file" name="profile_pic"></div>
            <div class="form-group">
                <h4 style="background-color: #358cce;color: #ffffff;">Contact info</h4><input class="form-control" type="email" name="email" placeholder="Email address"></div>
            <div class="form-group"><input class="form-control" type="text" required="" name="mobile_number" placeholder="Mobile number"></div>
            <h4 style="background-color: #358cce;color: #ffffff;">Adress</h4>
            <div class="form-group"><input required="" class="form-control is-invalid" type="text" name="city_town" placeholder="City/Town"></div>
            <div class="form-group"><input required="" class="form-control is-invalid" type="text" name="postal_code" placeholder="Postal code"></div>
          

        <h4
            style="background-color: #358cce;color: #ffffff;">Other info</h4>
            <div class="form-group">
                <h6>Course</h6>
                <select  class="form-control" name="subjects">


                    <optgroup label="Choose a subject for a teacher">

<?php
//Getting class name
                                    $QuerySubject = mysqli_query($conn, "SELECT * FROM prgramme_outline");
                                    while($RowSubject = mysqli_fetch_assoc($QuerySubject)){

                                    $SubjectName = $RowSubject['name'];
                                    $SubjectId = $RowSubject['id'];


                                    echo '<option value="'.$SubjectId.'" >'.$SubjectName.'</option>';

                                }

?>
                        </optgroup></select></div>
            
              
                        <div
                            class="form-group">
                            <h4 style="background-color: #358cce;color: #ffffff;">Security</h4><span class="text-danger"><i> The password is auto-generated for security reasons!</i></span></div>

                            
                            
                           
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="reg" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
  include 'inc/footer.php';
  
  ?>
