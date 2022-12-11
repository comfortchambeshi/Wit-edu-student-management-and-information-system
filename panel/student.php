<?php
include 'inc/auto-loader.php';
include 'functions/header.php';
include 'inc/login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/mains.php';
include 'classes/logged_info.php';



$userid =  $LoginObj->isLoggedIn();
$logged_header = '';
$logged_header = header1($logged_header);
include 'inc/sidebar.php';
echo '<title>Student Information System Dashboard | '.$site_name.' </title>';
?>


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
              <li class="breadcrumb-item active">Student dashboard</li>
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
                <h3><?php echo $site_currency_code.$BalanceToPay;  ?></h3>

                <p>Balance</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo $site_url; ?>/panel/student/pricing.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo$Count_Books;?><sup style="font-size: 20px"></sup></h3>

                <p>Borrowed Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          
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
          
            
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">My Payments</h3>

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
                      
                       $GetPayments = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status<>'not_paid'");

                                                    if (mysqli_num_rows($GetPayments)> 0) {
                                                        echo '
                                                        <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>signed_by</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                   ';
                                                        while ($RowPayments = mysqli_fetch_assoc($GetPayments)) {

                                                            $PaymentId = mysqli_real_escape_string($conn, $RowPayments['id']);
                                                            $proceedBy = mysqli_real_escape_string($conn, $RowPayments['proceeded_by']);
                                                            $Payment_status = mysqli_real_escape_string($conn, $RowPayments['status']);
                                                            $InvId = mysqli_real_escape_string($conn, $RowPayments['invoice_id']);
						        
						        
						        //Getting fee
						        
						       $Fee = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$InvId'"); 
						       $rowFee = mysqli_fetch_assoc($Fee);
						       
						       $FeeName = mysqli_real_escape_string($conn, $rowFee['name']);
                                                            
                                                            echo '
                    <tr>
                      <td><a href="payment_view.php?id='.$PaymentId.'"P-'.$PaymentId.'</a>'.$PaymentId.'</td>
                      <td>'.$FeeName.'</td>
                      <td><span class="badge badge-success">'.$Payment_status.'</span></td>
                      <td><span class="badge badge-success">'.$proceedBy.'</span></td>
                      
                    </tr>';
                    
                    }
                    }else{
                        echo '<p>No Recent Payment Made By You!</p>';
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="student/pricing.php" class="btn btn-sm btn-info float-left">Unpaid Invoices</a>
                <a href="student/p_history.php" class="btn btn-sm btn-secondary float-right">View All Payments</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
           </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
                
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Returning Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <?php
            
            $info = new logged_info();
            echo $info->ReturningStudent($user_id);
            ?>
            </div>
            <!-- /.card -->
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
            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
          </div>
          <div class="product-info">
            <a href="../single.php?id='.$NewsId.'" class="product-title">'.$NewsTitle.'
              <span class="badge badge-warning float-right">'. $Admin_uname.'</span></a>
            <span class="product-description">
              '.$NewsDate.'
            </span>
          </div>
        </li>
        ';
  }
}
       ?>
        
      </ul>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
      <a href="javascript:void(0)" class="uppercase">View All Products</a>
    </div>
    <!-- /.card-footer -->
  </div>
  
  
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
  
  <?php
  if(isset($_POST['return_btn'])){
      $slip_file = $_FILES['slip_file'];
      $amount_paid = $_POST['amount_paid'];
      
      	//for files
$fileTmpPath = $_FILES['slip_file']['tmp_name'];
$fileName = $_FILES['slip_file']['name'];
$fileSize = $_FILES['slip_file']['size'];
$fileType = $_FILES['slip_file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "deposit_slip";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name =  $slip_file; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = 'uploads/slips/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
      $info->insertData($user_id, $amount_paid, $UploadFullName);
      
     
  }else{
       echo ("<script LANGUAGE='JavaScript'>
           var url = window.location.href;
    window.alert('Cannot move to the directory!');
    window.location.href=url;
    </script>");
  }
            }else{
                 echo ("<script LANGUAGE='JavaScript'>
           var url = window.location.href;
        window.alert('Invalid file extension!');
    window.location.href=url;
    </script>");
            }
  }
  
  
  ?>