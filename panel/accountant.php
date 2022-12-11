<?php
include '../inc/auto-loader.php';
include 'functions/acc_header.php';
include 'inc/acc_login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/acc_mains.php';

$logged_header = '';
$logged_header = header1($logged_header);




include 'inc/acc_sidebar.php';

		echo '
  <title>'.$site_name.' | Accountant Panel</title>

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
              <li class="breadcrumb-item active">Accountant</li>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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

    //Getting acc details
    $Getacc = mysqli_query($conn, "SELECT * FROM administrators where id='$NewsBy'");
    $rowaccs = mysqli_fetch_assoc($Getacc);
    $acc_uname = mysqli_real_escape_string($conn, $rowaccs['username']);
    $acc_pic = mysqli_real_escape_string($conn, $rowaccs['profile_pic']);
    echo '
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="../single.php?id='.$NewsId.'" class="product-title">'.$NewsTitle .'
                        <span class="badge badge-warning float-right">'.$acc_uname.'</span></a>
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
                      
                       $GetPayments = mysqli_query($conn, "SELECT * FROM payments WHERE  status='pending' OR status='rejected' OR status='approved' LIMIT 25");

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
                <a href="/panel/acc_p_history.php" class="btn btn-sm btn-secondary float-right">View All Payments</a>
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
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
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