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

echo '<title>Pay Fees Online | '.$site_name.'</title>';

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">FEES BALANCES AND PAYMENTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Payments</a></li>
              <li class="breadcrumb-item active">E-Payment</li>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Fees</title>

</head>
<body>

<div class="container mb-5 mt-5">
    <h3> Select the fees to pay! </h3>
    <br>
    
    <div class="pricing card-deck flex-column flex-md-row mb-2">
    
    <?php
   
      
 
      
      $py = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status!='rejected'  ");
      $tot = 0;
      while($rowpy = mysqli_fetch_assoc($py)){
          
            
      //Getting pending status
      $pystatus = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status='pending' ");
      
          $paymentId = mysqli_real_escape_string($conn, $rowpy['id']);
          $paidAmout = $rowpy['amount_paid'];
          $invoiceId = mysqli_real_escape_string($conn, $rowpy['invoice_id']);
          $PaymentStatus = mysqli_real_escape_string($conn, $rowpy['status']);
          //Getting invoice
          $Invoice = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$invoiceId'");
          while($rowInv = mysqli_fetch_assoc($Invoice)){
          $NewFeeId = $rowInv['id'];
          $InvoiceName = mysqli_real_escape_string($conn, $rowInv['name']);
          $DueDtate = mysqli_real_escape_string($conn, $rowInv['due_date']);
          
          $total_price += $rowInv['fee'];
          $total_price2 = $rowInv['fee'];
          
          //getting payments balances
          //gettingshopping cart details
      $Balance_query = mysqli_query($conn,  "SELECT SUM(amount_paid) AS 'sumitem_cost' FROM payments WHERE payment_by='$user_id' AND invoice_id='$NewFeeId'");
    
      $balance_data = mysqli_fetch_array($Balance_query);
      $balance_price = $balance_data['sumitem_cost'];
             
          $AllBalanceToPay =  $total_price2 - $balance_price;  
          $BalanceToPay =  $total_price2 - $balance_price;
           
          
          
          if($PaymentStatus == 'pending'){
        
         $btn = '<span class="text-warning">This Payment Is currently On Pending!</span>';
      }elseif($PaymentStatus != 'approved'){
          
          $btn = '<a href="submit_payments.php?id='.$paymentId.'"  class="btn btn-primary mb-3">Pay Now</a>';
     
      }
          if($BalanceToPay != 0  || $BalanceToPay >! 0){
          
          if($PaymentStatus != 'approved'){
              
              //Getting paid details
             // $MyPay = mysqli_query($conn, );
                            echo 
            '
            <div class="card card-pricing popular shadow text-center px-3 mb-4">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">'.$InvoiceName.'</span>
            <div class="bg-transparent card-header pt-4 border-0">
                <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="30"><span class="price">'.$site_currency_code.$BalanceToPay.'</span></h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                     <li>Category: '.$InvoiceName.'</li>
                    <li>Due: '.$DueDtate.'</li>
                    
                    <li>status:'.$PaymentStatus.'</li>
                    <li>Balance: '.$BalanceToPay.'</li>
                   
                </ul>
                '.$btn.'
            </div>
        </div>
            
            ';
          
          }
          
          }
         
          
          
      }}
      
      
                        
      
                     
                       
                   
        
            
        
    
    
    
    
    ?>
    
    
        

    




    </div>
</div>


  </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include '../inc/footer.php';
  ?>
<?php
include '../inc/sidebar.php';

      ?>
