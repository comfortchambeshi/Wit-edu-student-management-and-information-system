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

echo '<title>Pay online | '.$site_name.'</title>';

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Submit Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Payments</a></li>
              <li class="breadcrumb-item active">Submit</li>
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
  


    <br>
    <hr>
    <div  style="background-color: #ebdbdb;">
    




<?php
if(isset($_GET['id'])){
    $Pid = $_GET['id'];
    $Invoice = mysqli_query($conn, "SELECT * FROM payments WHERE  payment_by='$user_id' AND id='$Pid'");
    if(mysqli_num_rows($Invoice)> 0){
       
        
        while($row = mysqli_fetch_assoc($Invoice)){
            $Paid = mysqli_real_escape_string($conn, $row['amount_paid']);
            $PaymentId = mysqli_real_escape_string($conn, $row['id']);
            $InId = mysqli_real_escape_string($conn, $row['invoice_id']);
            
            
            //Getting invoice
            $Invoice = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$InId' ");
						
						    while($InvFees = mysqli_fetch_assoc($Invoice)){
						        $InvId = mysqli_real_escape_string($conn, $InvFees['id']);
						        $InvName = mysqli_real_escape_string($conn, $InvFees['name']);
						        $DueDate = mysqli_real_escape_string($conn, $InvFees['due_date']);
						        $FeeCost = mysqli_real_escape_string($conn, $InvFees['fee']);
						        
						        
						       
						       
						       //Getting payment Balance
						       $balance = $FeeCost - $Paid;
						       
						       if(!$balance == 0 ){
						           
						            echo '<form enctype="multipart/form-data" method="POST" action="../inc/submit_payments.php?inv_id='.$InvId.'&pay_id='.$PaymentId.'" id="contactForm" style="padding:15px;" action="javascript:void();" method="post" >
        <div class="form-row" style="margin-left:0px;margin-right:0px;padding:10px;">
            <div class="col-md-6" style="padding-left:20px;padding-right:20px;">
                <fieldset></fieldset>
                <legend><i class="fa fa-info"></i> Important info</legend>
                <p></p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        

                        <tr>
                        <td><i class="fa fa-building"></i></td>
                        <td>Bank name: <b>'.$site_bank_name.'</b></td>
                    </tr>
                            <tr>
                                <td><i class="fa fa-building"></i></td>
                                <td>Account number: <b>'.$site_bank_acc_number.'</b></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-map-marker"></i></td>
                                <td>Account name: <b>'.$site_bank_acc_name.'<b></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-phone"></i></td>
                                <td>For support: <b>'.$site_phone1.'</b></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-envelope"></i></td>
                                <td>Our email: <b>'.$site_email.'</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6" id="message" style="padding-right:20px;padding-left:20px;">
                <fieldset>
                    <legend><i class="fa fa-envelope"></i> Submit payments</legend>
                </fieldset>
                <div class="form-group has-feedback"><label for="from_email">Payments for</label><select class="form-control" id="calltime" name="invoice_id"  required>';
						           //Another html

    $cartName = mysqli_real_escape_string($conn, $RowQuerryCarts['item_name']);
  echo '
                    <option value="'.$InvId.'" >'.$InvName.'</option>
                    
                     </select></div>
                <div
                    class="form-group has-feedback"><label for="from_email">Deposit Slip</label><input required name="slip_file" type="file" style="width: 100%;" /></div>
                    <div
                    class="form-group has-feedback"><label for="amount_paid">Amount</label><input required="" name="amount_paid" type="number" style="width: 100%;" /></div>
            <div class="form-group"><label for="comments">Reference</label><textarea name="reference" class="form-control" id="comments" name="Comments" placeholder="Type in anything" rows="5"></textarea></div>
            <div class="form-group"><button class="btn btn-primary active btn-block" style="background-color:#303641;" type="submit" name="payment_btn">Send <i class="fa fa-chevron-circle-right"></i></button>
                <div role="alert" class="alert alert-success"><span><strong>After clicking send your payments will be under review by our Accountants</strong></span></div>
            </div>
            <hr />
        </div>
</div>
</form>
</div>
                    
                    
                    ';
}
}
}}
else{
    echo '<h3 class="danger">No results found!</h3>';
}

}
else{
    echo '<p class="danger">Invalid requested Page!</p>';
}
 
                 ?>

                   
   </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include '../inc/footer.php';
  ?>