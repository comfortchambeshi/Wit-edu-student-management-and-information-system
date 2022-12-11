<?php
include '../inc/auto-loader.php';
include 'functions/teacher_header.php';
include 'inc/teacher_login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/teacher_mains.php';



$logged_header = '';

$logged_header = header1($logged_header);

//Getting assignments


$today = date("Y-m-d", time());

include 'inc/teacher_sidebar.php';

$Assignments = mysqli_query($conn, "SELECT * FROM assignments WHERE s_from='$user_id' AND deadline<=NOW()");
$CountAssigments = mysqli_num_rows($Assignments);

echo '<title>Teachers Panel | '.$site_name.' </title>';
?>
<?php



			//Getting assignments


$today = date("Y-m-d", time());



$Assignments = mysqli_query($conn, "SELECT * FROM assignments WHERE s_from='$user_id' AND deadline<=NOW()");
$CountAssigments = mysqli_num_rows($Assignments);


echo'

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teacher</li>
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
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>'.$CountAssigments.'</h3>

                <p>Active Assignments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px"></sup></h3>

                <p>Upcomming Events</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
         ';
         ?>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            
          
           </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
                
           
            <!-- Map card -->
            <div class="card bg-gradient-primary">
             
             
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
            


             <!-- PRODUCT LIST -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Latest News</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <ul class="products-list product-list-in-card pl-2 pr-2">
        <?php 
                 $GetNews = mysqli_query($conn, "SELECT * FROM news LIMIT 6");
if (mysqli_num_rows($GetNews)) {
function summary($str, $limit=100, $strip = false) {
    $str = ($strip == true)?strip_tags($str):$str;
    if (strlen ($str) > $limit) {
        $str = substr ($str, 0, $limit - 3);
        return (substr ($str, 0, strrpos ($str, ' ')).'...');
    }
    return trim($str);
}
  while ($RowNews = mysqli_fetch_assoc($GetNews)) {
    $NewsTitle = mysqli_real_escape_string($conn, $RowNews['title']);
       $NewsDate = mysqli_real_escape_string($conn, FriendlyTimeAgo($RowNews['date'], date("Y-m-d H:i:s")));
    $NewsBody = summary(mysqli_real_escape_string($conn, $RowNews['body']));
    $NewsId = mysqli_real_escape_string($conn, $RowNews['id']);
    $NewsCover = mysqli_real_escape_string($conn, $RowNews['cover_file']);
    $NewsBy = mysqli_real_escape_string($conn, $RowNews['added_by']);
    $newssum = substr($NewsBody, 0, 100);

    //Getting admin details
    $GetAdmin = mysqli_query($conn, "SELECT * FROM administrators where id='$NewsBy'");
    $rowAdmins = mysqli_fetch_assoc($GetAdmin);
    $Admin_uname = mysqli_real_escape_string($conn, $rowAdmins['username']);
    $Admin_pic = mysqli_real_escape_string($conn, $rowAdmins['profile_pic']);
    
    echo'
        <li class="item">
          <div class="product-img">
            <img src="'.$site_url.'/panel/images/news/'.$NewsCover.'" alt="Product Image" class="img-size-50">
          </div>
          <div class="product-info">
            <a href="javascript:void(0)" class="product-title">'.$NewsTitle.'
              <span class="badge badge-warning float-right">'.$Admin_uname.'</span></a>
            <span class="product-description">
              '.$NewsDate.'
            </span>
          </div>
        </li>
        ';
  }
}
else{
    echo 'No Latest News Found!';
}
        
        ?>
       
        
      </ul>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
      <a href="../news.php" class="uppercase">View All news</a>
    </div>
    <!-- /.card-footer -->
  </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <section>
   <!-- Content Wrapper. Contains page content -->
   
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Assignments Submission</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  
                 <?php



$query_data = mysqli_query($conn, "SELECT * FROM assignments where s_from='$user_id' ORDER BY 1 DESC LIMIT 25 ");
$countData = mysqli_num_rows($query_data);

if ($countData > 0) {
    echo '<thead>
    <tr>
        <th>Course</th>
        <th>From</th>
        <th>Deadline</th>
        <th>Accademic Year</th>
         
        <th>Class</th>
        <th>Submitted</th>
        <th>Study Mode</th>
       
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
       
       
       //Getting submitted assigments
               $SubmittedAssigments = mysqli_query($conn, "SELECT * FROM submitted_assigments WHERE assignment_id='$AssigmentId'");
              
             if (mysqli_num_rows($SubmittedAssigments) > 0) {
                 while ($RowSubmited = mysqli_fetch_assoc($SubmittedAssigments)) {
                 $StudentId = mysqli_real_escape_string($conn, $RowSubmited['student_id']);
                 $MarkStatus = mysqli_real_escape_string($conn, $RowSubmited['mark_status']);
                 $SubmittedDate = mysqli_real_escape_string($conn, $RowSubmited['submitted_date']);
                 $SubmittedFile = mysqli_real_escape_string($conn, $RowSubmited['file']);
                 $SubmittedMarkedStatus = mysqli_real_escape_string($conn, $RowSubmited['mark_status']);


                       //Getting full name of the results owner
    $Owner = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$StudentId'");
    $rowOwner = mysqli_fetch_assoc($Owner);
    $OwnerYear = mysqli_real_escape_string($conn, $rowOwner['year']);
    $OwnerFName = mysqli_real_escape_string($conn, $rowOwner['first_name']);
    $OwnerStudyMode = mysqli_real_escape_string($conn, $rowOwner['study_mode']);
    $OwnerLName = mysqli_real_escape_string($conn, $rowOwner['last_name']);
    $OwnerName = $OwnerFName .' '. $OwnerLName;
    $OwnerExamNumber = mysqli_real_escape_string($conn, $rowOwner['exam_number']);
    $OwnerClassId = mysqli_real_escape_string($conn, $rowOwner['class_id']);

    //Getting class name
    $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$OwnerClassId'");
 $RowClass = mysqli_fetch_assoc($QueryClass);

    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);
       echo'
                  <tr>
                    <td>'.$Title.'</td>
                    <td>'.$OwnerName.'</td>
                    <td>'.$AssimentDeadline.'</td>
                    <td>'. $OwnerYear.'</td>
                    <td>'.$ClassName.'</td>
                    <td>'.$SubmittedDate.'</td>
                    <td>'.$OwnerStudyMode.'</td>
                    
                  </tr>
                  ';
                  }
                  }
                  
    }
}else{
  echo '<p>No Submissions Found!</p>';
  }
                  ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        
    </section>
    </div></div>

<?php
include 'inc/footer.php';
?>

