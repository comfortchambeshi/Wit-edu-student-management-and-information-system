<?php
include '../inc/auto-loader.php';
include '../functions/header.php';
include '../inc/login_function.php';
include '../inc/dbconnect.inc.php';
include '../inc/mains.php';


$userid =  $LoginObj->isLoggedIn();
$logged_header = '';
$logged_header = header1($logged_header);
include '../inc/sidebar.php';

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Payments History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Payments</a></li>
              <li class="breadcrumb-item active">Payments History</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


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
                                                <h3>Latest Payments</h3>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="widget-body p-15">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    
                                                    
                                                                                                       
                                                    ';
                                                    $GetPayments = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status<>'not_paid'");

                                                    if (mysqli_num_rows($GetPayments)> 0) {
                                                        while ($RowPayments = mysqli_fetch_assoc($GetPayments)) {

                                                            $PaymentId = mysqli_real_escape_string($conn, $RowPayments['id']);
                                                            
                                        $payment_date = mysqli_real_escape_string($conn, $RowPayments['payment_date']);                        
                                                            
                                                            $Payment_status = mysqli_real_escape_string($conn, $RowPayments['status']);
                                                            $totalPaid = mysqli_real_escape_string($conn, $RowPayments['amount_paid']);
                                                            
                                                            $InvId = mysqli_real_escape_string($conn, $RowPayments['invoice_id']);
                                                           
					                 
						        $Inv = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$InvId'");
						        $rowInv = mysqli_fetch_assoc($Inv);
						        $InvName = mysqli_real_escape_string($conn, $rowInv['name']);
						        $CostInv = mysqli_real_escape_string($conn, $rowInv['fee']);
						        $InvId = mysqli_real_escape_string($conn, $rowInv['id']);

						        
						        //Getting cost
						        
						      

                                                            
                                                            echo '
                                                    <tr>
                                                        <td><a href="../payment_view.php?id='.$PaymentId.'">'.$PaymentId.'</a></td>
                                                        <td>'.$InvName.'</td>
                                                        <td>'.$site_currency_code.$totalPaid.'</td>
                                                        <td>'.$payment_date.'</td>
                                                        <td>'.$Payment_status.'</td>
                                                        
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
                        

      </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include '../inc/footer.php';
  ?>