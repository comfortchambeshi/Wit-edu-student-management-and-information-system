<?php
include '../inc/auto-loader.php';
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include '../inc/dbconnect.inc.php';
include 'inc/admin_mains.php';


$logged_header = '';

$logged_header = header1($logged_header);

//Query
$mainClass = new main();

$today = date("m-d");
$nextMonth = date("m")+1;



include 'inc/admin_sidebar.php';

		echo '
  <title>'.$site_name.' | Admin Panel</title>

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
              <li class="breadcrumb-item active">Administrator</li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>'.$Total_Students.' </h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="students_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>'.$Total_teachers.'<sup style="font-size: 20px"></sup></h3>

                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="teachers_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>'.$Total_accountants.'</h3>

                <p>Accountants</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="accountants_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>'.$Total_librarians.'</h3>

                <p>Librarians</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="librarians_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->';?>
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
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
                 $GetNews = mysqli_query($conn, "SELECT * FROM news ORDER BY 1 DESC LIMIT 6");
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
    echo '
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="../single.php?id='.$NewsId.'" class="product-title">'.$NewsTitle .'
                        <span class="badge badge-warning float-right">'.$Admin_uname.'</span></a>
                      <span class="product-description">
                        '.$NewsDate.'
                      </span>
                    </div>
                  </li>';
  }
        }         ?>
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All News</a>
              </div>
              <!-- /.card-footer -->
            </div>
          
            <!-- /.card -->
            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Students</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger">12 New Members</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                   <?php

                             $QueryStudents = mysqli_query($conn, "SELECT * FROM students ORDER BY 1 DESC LIMIT 12");
                             if (mysqli_num_rows($QueryStudents) > 0) {
                                while ($RowStudentsList = mysqli_fetch_assoc($QueryStudents)) {
                                    $StudentFirstName = mysqli_real_escape_string($conn, $RowStudentsList['first_name']);
                                    $StudentLastName = mysqli_real_escape_string($conn, $RowStudentsList['last_name']);
                                    $StudentFullName = $StudentFirstName ." ". $StudentLastName;
                                    $StudentPhoneNumber = mysqli_real_escape_string($conn, $RowStudentsList['phone_number']);
                                    $StudentId = mysqli_real_escape_string($conn, $RowStudentsList['exam_number']);
                                    $profile_pic = mysqli_real_escape_string($conn, $RowStudentsList['profile_pic']);
                                    $RegisteredDate = mysqli_real_escape_string($conn, FriendlyTimeAgo($RowStudentsList['registered_date'], date("Y-m-d H:i:s")));
                                    $Student_Class = mysqli_real_escape_string($conn, $RowStudentsList['class_id']);
                                    

                                    //Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$Student_Class'");
                                    $RowClass = mysqli_fetch_assoc($QueryClass);
                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                   echo '
                    <li>
                      <img style="width:70px;height:70px;" src="uploads/students_profiles/'.$profile_pic.'" alt="User Image">
                      <a class="users-list-name" href="#">'.$StudentFullName.'</a>
                      <span class="users-list-date">'.$RegisteredDate.'</span>
                    </li>';
                    
                                }
                             }
                    
                    ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="javascript::">View All Students</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!--/.card -->
            </div>
             <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Recent Payments</h3>

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
                <div class="table-responsive">
                  
                   
                      
                     <?php
                      
                       $GetPayments = mysqli_query($conn, "SELECT * FROM payments WHERE  status='pending' OR status='rejected' OR status='approved' ORDER BY 1 DESC LIMIT 25");

                                                    if (mysqli_num_rows($GetPayments)> 0) {
                                                        echo '
                                                        <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>STATUS</th>
                      <th>FROM</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                   ';
                                                        while ($RowPayments = mysqli_fetch_assoc($GetPayments)) {

                                                            $PaymentId = mysqli_real_escape_string($conn, $RowPayments['id']);
                                                            $proceedBy = mysqli_real_escape_string($conn, $RowPayments['proceeded_by']);
                                                            $Payment_status = mysqli_real_escape_string($conn, $RowPayments['status']);
                                                            $InvId = mysqli_real_escape_string($conn, $RowPayments['invoice_id']);
                                                            $By = mysqli_real_escape_string($conn, $RowPayments['payment_by']);
                                                            
                                                            //Getting student data
                                                            
                                                            $WhoPaid = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$By'");
                                                            $RowBy = mysqli_fetch_assoc($WhoPaid);
                                                            $StudentFname = mysqli_real_escape_string($conn, $RowBy['first_name']);
                                                            $StudentLname = mysqli_real_escape_string($conn, $RowBy['last_name']);
                                                            $FullNmes = $StudentFname. ' '. $StudentLname;
						        
						        
						        //Getting fee
						        
						       $Fee = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$InvId'"); 
						       $rowFee = mysqli_fetch_assoc($Fee);
						       
						       $FeeName = mysqli_real_escape_string($conn, $rowFee['name']);
                                                            
                                                            echo '
                    <tr>
                      <td><a href="acc_payment_view.php?id='.$PaymentId .'"P-'.$PaymentId.'</a>'.$PaymentId.'</td>
                      <td>'.$FeeName.'</td>
                      <td><span class="badge badge-success">'.$Payment_status.'</span></td>
                      <td>'.$FullNmes.'</td>
                      
                    </tr>';
                    
                    }
                    }else{
                        echo '<p>No Recent Payments !</p>';
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="#" class="btn btn-sm btn-info float-left">Unpaid Invoices</a>
                <a href="acc_p_history.php" class="btn btn-sm btn-secondary float-right">View All Payments</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
           </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
                
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Online Students</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Class</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr>
                        <td>982</td>
                        <td><img style="width: 20px;" class="img-circle img-responsive" src="dist/img/user8-128x128.jpg" alt="User Image">Rocky Doe</td>
                        <td>PDDAB1</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- Map card -->
            <div class="card bg-gradient-secondary shadow-lg">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-birthday-cake mr-1"></i>
                  Birthdays
                </h3>
                <!-- card tools -->
                
                <!-- /.card-tools -->
              </div>
              <div class="card-body table-responsive">
                <?php

                        //Todays's birthday

                      $BdayQuery = $mainClass->all_queryBday("students", "", "Birth_Date", $today);

                      //This month bday
                      $BdayQueryThisMonth = $mainClass->all_queryMonthBday("students", "", "Birth_Date", $today);
                      //Next month bday
                      $BdayQueryNextMonth = $mainClass->all_queryMonthBday("students", "", "Birth_Date", $nextMonth);
                      

                      //Loop through
                      if ($BdayQuery[1] > 0) {


                        ?>
                  <table class="table table-head text-nowrap">
                    <thead>
                      <tr>
                        <th>Student</th>
                        <th>ID/Exam #</th>
                        <th>Study year</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($BdayQuery[0] as $row) {

                        
                        echo' 
                        <tr>
                        <td><img style="width: 20px;" class="img-circle img-responsive" src="uploads/students_profiles/'.$row["profile_pic"].'" alt="User Image"> '.$row["first_name"].' '.$row["last_name"].'</td>
                        <td> '.$row["username"].' </td>
                        
                        <td>'.$row["year"].'</td>
                        
                      </tr>';
                      }
                      
                      ?>
                     
                    </tbody>
                  </table>

                  <?php
                      }else{
                        echo '<p>No birthdays for today!</p>';
                      }
                     
                  ?>
                </div>
              <!-- /.card-body-->
              <div class="card-footer bg-info">
                <div class="row">
                  <div class="col-4 text-center">
                    
                    <div class="text-light"><strong>Today (<?php echo $BdayQuery[1]; ?>)</strong></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div class="text-white">This month(<?php echo $BdayQueryThisMonth[1]; ?>)</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div class="text-white">Next month(<?php echo $BdayQueryNextMonth[1];?>)</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
            


            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <div style="display:none;"  id="sparkline-1"></div>
                  <div style="display:none;"  id="sparkline-2"></div>
                  <div style="display:none;"  id="sparkline-3"></div>
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
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
  include 'inc/footer.php';
  
  ?>