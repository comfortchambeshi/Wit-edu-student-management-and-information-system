<?php
include '../inc/auto-loader.php';
include 'functions/header.php';
include 'inc/login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/mains.php';


$logged_header = '';
$logged_header = header1($logged_header);
include 'inc/sidebar.php';

?>
    <?php




echo'<title>invoice view | '.$site_name.'</title>';
?>
<?php

	if (isset($_GET['id'])) {
		$PaymentNumber = $_GET['id'];
	$QueryPayment = mysqli_query($conn, "SELECT * FROM payments WHERE id='$PaymentNumber' AND payment_by='$userid'");
	if (mysqli_num_rows($QueryPayment) > 0) {
		$RowPayments = mysqli_fetch_assoc($QueryPayment);

		$status = mysqli_real_escape_string($conn, $RowPayments['status']);
		$file = mysqli_real_escape_string($conn, $RowPayments['deposit_slip_file']);
		$AmmountPaid_main = mysqli_real_escape_string($conn, $RowPayments['amount_paid']); 
		$PaymentDate = mysqli_real_escape_string($conn, $RowPayments['payment_date']);   
		
		
		$InvId = mysqli_real_escape_string($conn, $RowPayments['invoice_id']);
                                                           
					                 
						        $Inv = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$InvId'");
						       
						        

                    
                    while($rowInv = mysqli_fetch_assoc($Inv)){
                     
						        $InvName = mysqli_real_escape_string($conn, $rowInv['name']);
						        $CostInv = mysqli_real_escape_string($conn, $rowInv['fee']);
						        $gen_date = mysqli_real_escape_string($conn, FriendlyTimeAgo($rowInv['gen_date'], date("Y-m-d H:i:s")));
						        $InvId = mysqli_real_escape_string($conn, $rowInv['id']);
						        $due_date = mysqli_real_escape_string($conn, $rowInv['due_date']);
						        
						        
						        
						        	echo '				        
 <!-- Content Wrapper. Contains page content -->
  <div   class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div id="myFrame" class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> '.$site_name.'.
                    <small class="float-right">Date: '.$gen_date.'</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>'.$site_name.'.</strong><br>
                    '.$site_address.'<br>
                    Phone: '.$site_phone1.'<br>
                    Email: '.$site_email.'
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>'.$User_FullName.'</strong><br>
                    '.$student_citytown.'<br>
                    Phone: '.$phoneNumber.'<br>
                    Email: '.$user_email.'
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #'.$InvId.'</b><br>
                  
                  <b>Payment Due:</b> '.$due_date.'<br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      
                      <th>Product</th>
                      <th>ID#</th>
                      <th>Date</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>';
						        
						        
						        $total_price += $rowInv['fee'];
                               $total_price2 = $rowInv['fee'];
						        
						        //Getting payment
						        
						        $QueryPayment = mysqli_query($conn, "SELECT * FROM payments WHERE invoice_id='$InvId' AND payment_by='$userid' ");
       
		$RowPayments = mysqli_fetch_assoc($QueryPayment);

	     
		$status = mysqli_real_escape_string($conn, $RowPayments['status']);
		$file = mysqli_real_escape_string($conn, $RowPayments['deposit_slip_file']);
		$AmmountPaid = mysqli_real_escape_string($conn, $RowPayments['amount_paid']);
		$Ido = mysqli_real_escape_string($conn, $RowPayments['id']);
		
		$PaymentDate = mysqli_real_escape_string($conn, $RowPayments['payment_date']);   
						        
						        //Getting cost
						        
						        $Cost = mysqli_query($conn, "SELECT * FROM payments WHERE invoice_id='$InvId'");
						        $total_paid = mysqli_num_rows($Cost);
						        
						        
						        
						        //getting payments balances
//getting payments balances
          //gettingshopping cart details
      $Balance_query = mysqli_query($conn,  "SELECT SUM(amount_paid) AS 'sumitem_cost' FROM payments WHERE payment_by='$userid' AND status!='rejected' AND invoice_id='$InvId'");
    
      $balance_data = mysqli_fetch_array($Balance_query);
      $balance_price = $balance_data['sumitem_cost'];
             
          $AllBalanceToPay =  $total_price2 - $balance_price;  
          $BalanceToPay =  $total_price2 - $balance_price;
      



      
						        
                    echo'<tr>
                      
                      <td>'.$InvName.'</td>
                      <td>'.$Ido.'</td>
                      <td>'.$PaymentDate.'</td>
                      <td>'.$AmmountPaid_main.'</td>
                    </tr>
                    ';
                    }
                    
                    echo '
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                 

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    For any queries please note down the payment number.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due '.$due_date.'</p>

                  <div class="table-responsive">
                    <table class="table">
                    <tr>
                        <th>Total:</th>
                        <td>'.$CostInv.'</td>
                      </tr>
                      <tr>
                        <th>Paid </th>
                        <td>'.$balance_price.'</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Balance:</th>
                        <td>'.$AllBalanceToPay.'
                      </tr>
                      
                      
                      
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="#" target="_blank" id="bt" onclick="print()" value="Print PDF" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
                  <button id="bt" onclick="print()" value="Print PDF" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div></iframe>
  <!-- /.content-wrapper -->';
  
	}
	}
  ?>

<script>
	let print = () => {
    	let objFra = document.getElementById('myFrame');
        objFra.contentWindow.focus();
        objFra.contentWindow.print();
    }
    
    // Using regular js features.
    
     function print() {
        var objFra = document.getElementById('myFrame');
        objFra.contentWindow.focus();
        objFra.contentWindow.print();
    }
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
	
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include 'inc/footer.php';
  ?>