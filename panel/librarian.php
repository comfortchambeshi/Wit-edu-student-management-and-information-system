<?php
include '../inc/auto-loader.php';
include 'functions/lib_header.php';
include 'inc/lib_login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/lib_mains.php';
//Getting borrowed physical books
$GetBorrowBooks = mysqli_query($conn, "SELECT * FROM physical_library WHERE book_status='pending'");
$CountBorrowed = mysqli_num_rows($GetBorrowBooks);
//Specifying the header

$logged_header = '';

$logged_header = header1($logged_header);

include 'inc/lib_sidebar.php';


if (isset($_GET['status'])) {
	$status = $_GET['status'];
	if ($status == 'added') {
		echo '<script>alert("Book rent added successfully!");
		window.location.href = "librarian/books.php?books=pending";
		
			</script>';
	}
}

?>

<?php
echo '
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
              <li class="breadcrumb-item active">Librarian</li>
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
                <h3>'.$CountBorrowed.'</h3>

                <p>Pending Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="librarian/books.php?books=pending" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box badge-danger">
              <div class="inner">
                <h3>'.$CountOverdues.'<sup style="font-size: 20px"></sup></h3>

                <p>Overdue Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         ';?>
          
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
                <h3 class="card-title">Recent Books Status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Book NO. Name</th>
                    <th>Class</th>
                    <th>Study Year</th>
                    <th>Study Mode</th>
                    <th>Book Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  
                  $Books = mysqli_query($conn, "SELECT * FROM physical_library");
                  if(mysqli_num_rows($Books)){
                      while($rowBooks = mysqli_fetch_assoc($Books)){
                          
                          $BookName = mysqli_real_escape_string($conn, $rowBooks['book_name']);
                          $BookStatus = mysqli_real_escape_string($conn, $rowBooks['book_status']);
                          $BookNumber = mysqli_real_escape_string($conn, $rowBooks['book_number']);
                          $BorrowerId = mysqli_real_escape_string($conn, $rowBooks['borrower_id']);
                          
                          

        $user = "SELECT * FROM students WHERE system_id='$BorrowerId'";
        $result = mysqli_query($conn, $user);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['id'];
        $user_Fname = mysqli_real_escape_string($conn,  $row['first_name']);
        $user_Lname = mysqli_real_escape_string($conn,  $row['last_name']);
        $user_fullname = $user_Fname .' '. $user_Lname;
        $user_name = mysqli_real_escape_string($conn,  $row['name']);
         $user_nrc = mysqli_real_escape_string($conn,  $row['nrc']);
         $user_mode = mysqli_real_escape_string($conn,  $row['study_mode']);
        $user_year = mysqli_real_escape_string($conn,  $row['year']); 
        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
        $user_class = mysqli_real_escape_string($conn, $row['class_id']);
        
        //Getting a class
        
        $class = mysqli_query($conn, "SELECT * FROM classes WHERE id='$user_class'");
        $rowClass = mysqli_fetch_assoc($class);
        $className = mysqli_real_escape_string($conn, $rowClass['class_name']);
                  echo'
                  <tr>
                    <td>'.$user_fullname.'</td>
                    <td>'. $BookNumber.'</td>
                    <td>'.$className.'</td>
                    <td>'.$user_year.'</td>
                    <td>'.$user_mode.'</td>
                    <td>'.$BookStatus.'</td>
                  </tr>';
                      }
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
</div>
<?php
include 'inc/footer.php';
?>
