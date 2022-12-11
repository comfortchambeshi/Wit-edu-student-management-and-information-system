<?php
include '../inc/auto-loader.php';
include 'classes/db.php';
include 'inc/dbconnect.inc.php';
include 'inc/acc_login_function.php';

include 'inc/staff_login.php';
include 'inc/acc_mains.php';

$AccLoginObj = new acc_login();
$AdminLoginObj = new admin_login();


if ($AccLoginObj->isLoggedIn()) {
    include 'functions/acc_header.php';
    $logged_header = '';
    $logged_header = header1($logged_header);
    
    include 'inc/acc_sidebar.php';
    
$userType = 'acc';
}elseif($AdminLoginObj->isadminlogged()){
    
    include 'functions/admin_header.php';

include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$userid =  $AdminLoginObj->isadminlogged();
$logged_header = '';

$logged_header = header1($logged_header);
include 'inc/admin_sidebar.php';
$userType = 'admin';

}
else{
    header("Location: ../login.php?sout=success");

      }


?>
<title>Pending</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/icon-font.min.css" type="text/csc" />
<link href="//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400" rel="stylesheet" type="text/css"/>
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payments </h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Payments</a></a></li>
              <li class="breadcrumb-item active">Pending</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php echo '
<hr>
 <div  class="wthree-crd">
                            <div class="card">
                                <div class="card-body">
                                    <div class="widget widget-report-table">
                                        <header class="widget-header m-b-15">
                                        </header>
                                        
                                        <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                                            <div class="col-md-12 col-sm-6 col-xs-6 w3layouts-aug">
                                                <h3>Pending payments</h3>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="widget-body p-15">
                                            
                                                   
                                                    
                                                    
                                                                                                       
                                                    ';
                                                    $GetPayments = mysqli_query($conn, "SELECT * FROM payments WHERE status='pending' LIMIT 50");

                                                    if (mysqli_num_rows($GetPayments)> 0) {
                                                        echo '<table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>From</th>
                                                        <th>Fee</th>
                                                        <th>Status</th>
                                                        <th>Approved By</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                                        while ($RowPayments = mysqli_fetch_assoc($GetPayments)) {

                                                            $PaymentId = mysqli_real_escape_string($conn, $RowPayments['id']);
                                                            $Payment_status = mysqli_real_escape_string($conn, $RowPayments['status']);
                                                            $Proceeded_by = mysqli_real_escape_string($conn, $RowPayments['proceeded_by']);
                                                            
                                                            
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

                                                            //getting approver's details
                                                            $accUname = 'None';
                                                            if ($Proceeded_by != 0) {
                                                             $username = "SELECT * FROM accountants WHERE id='$Proceeded_by'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


       
        
        $accUname = mysqli_real_escape_string($conn,  $row['username']);

                                                            }

                                                            
                                                            echo '
                                                    <tr>
                                                        <td><a href="acc_payment_view.php?id='.$PaymentId.'">'.$PaymentId.'</a></td>
                                                        <td>'.$FullNmes.'</td>
                                                        <td>'.$FeeName.'</td>
                                                        <td>'.$Payment_status.'</td>
                                                        <td>'.$accUname.'</td>
                                                        
                                                    </tr>

                                                    ';
                                                        }
                                                    }
                                                    else{
                                                        echo "<h4 class='text-danger'>There are currently no pending payments</h4>";
                                                    }


                                                    

                                                    ?>
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

   </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
  include 'inc/footer.php';
  
  ?>