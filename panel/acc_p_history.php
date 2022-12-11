<?php
include '../inc/auto-loader.php';
include 'classes/payments.php';

include 'inc/dbconnect.inc.php';
include 'inc/acc_login_function.php';

include 'inc/staff_login.php';
include 'inc/acc_mains.php';


$payments = new payments();
$AdminLoginObj = new admin_login();
if ($AccLoginObj->isLoggedIn()) {
    include 'functions/acc_header.php';
    $logged_header = '';
    $logged_header = header1($logged_header);
    
    include 'inc/acc_sidebar.php';
   
}elseif($AdminLoginObj->isadminlogged()){
    
    include 'functions/admin_header.php';

include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$logged_header = '';

$logged_header = header1($logged_header);
include 'inc/admin_sidebar.php';

}
else{
    header("LOCATION: ../login.php");
}


?>
<title>Payments History</title>
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
              <li class="breadcrumb-item active">History</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
         <div>
        <ul class="nav nav-tabs" style="margin-top: 43px;">
            <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link active" href="#tab-1">Recent</a></li>
            <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link" href="#tab-2">Manual</a></li>
            <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link " href="#tab-3">Export</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-1">
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
                                                <h3>All payments history</h3>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="widget-body p-15">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Fee Name</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    
                                                    
                                                                                                       
                                                    ';
                                                    $GetPayments = mysqli_query($conn, "SELECT * FROM payments LIMIT 25");

                                                    if (mysqli_num_rows($GetPayments)> 0) {
                                                        while ($RowPayments = mysqli_fetch_assoc($GetPayments)) {
                                        $InvId = mysqli_real_escape_string($conn, $RowPayments['invoice_id']);
                                                            $PaymentId = mysqli_real_escape_string($conn, $RowPayments['id']);
                                                            $paymentBy = mysqli_real_escape_string($conn, $RowPayments['payment_by']);
                                        
                                        
                                        $paymentTime = mysqli_real_escape_string($conn, $RowPayments['payment_date']);                     
                                                            $Payment_status = mysqli_real_escape_string($conn, $RowPayments['status']);
                                                            
                                                            //Getting student data
                                                            
                                                            $WhoPaid = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$paymentBy'");
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
                                                        <td><a href="acc_payment_view.php?id='.$PaymentId.'"> '.$PaymentId.'</td>
                                                        <td>'.$FullNmes.'</td>
                                                        <td>'.$Payment_status.'</td>
                                                        <td>'.$FeeName.'</td>
                                                        <td>'.$paymentTime.'</td>
                                                        
                                                    </tr>

                                                    ';
                                                        }
                                                    }


                                                    

                                                    ?>
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab-2">
                <div class="container">
                    <form action="inc/submit_payments.php" method="post" enctype="multipart/form-data">
                    <h2 class="text-center">Manual Payment</h2>
                    <div class="form-group"><input required="" type="text" class="form-control" name="uid" placeholder="student id or email" /></div>
                    <div class="form-group"><input required="Enter amount number" type="number" name="amount" class="form-control" placeholder="amount paid" /></div>
                    <div class="form-group"><small class="form-text">Invoice name</small><select name="invoice_id" required="" class="form-control"><optgroup label="Select Invoice">
                        <?php
                        $invoices = $payments->getInvoices();
                        foreach($invoices as $invoice){
                            $id = $invoice['id'];
                            $name = $invoice['name'];
                            
                        
                        echo'
                        <option value="'.$id.'" selected>'.$name.'</option>
                        ';
                        }
                        ?>
                        
                        </optgroup></select></div>
                    <div
                        class="form-group"><small class="form-text">Payment proof</small><input required="" name="slip_file"  type="file" /></div>
            <div class="form-group"><button class="btn btn-primary" name="manual_btn" type="submit">send </button></div>
            </form>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-3">
            <p style="margin-bottom: 9px;">Choose export option</p>
            <div class="btn-toolbar" style="margin-top: -1px;">
                <form method="POST" action="inc/download.php"><div role="group" class="btn-group"><button class="btn btn-primary" name="export_payment" type="submit">CSV</button></div>
                <div role="group" class="btn-group"></div></form>
            </div>
        </div>
    </div>
</div>

                        </div>
                        

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
if(isset($_POST['export_btn'])){
    include 'classes/export.php';
    $file  = 'payments'.time().'.csv';
  
    $export = new export();
    $export->exportMysqlToCsv($file,'payments');
}
  include 'inc/footer.php';
  
  ?>