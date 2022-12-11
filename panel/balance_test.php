<?php
include 'classes/db.php';
include 'inc/dbconnect.inc.php';
include 'inc/login_function.php';
include 'inc/mains.php';



///getting payments balances
//gettingshopping cart details
      $Balance_query = mysqli_query($conn,  "SELECT SUM(amount_paid) AS 'sumitem_cost' FROM payments WHERE payment_by='$user_id' ");
    
      $balance_data = mysqli_fetch_array($Balance_query);
      $balance_price = $balance_data['sumitem_cost'];
      
      $py = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status!='rejected' GROUP BY invoice_id");
      $tot = 0;
      while($rowpy = mysqli_fetch_assoc($py)){
          
          $paidAmout = $rowpy['amount'];
          $invoiceId = mysqli_real_escape_string($conn, $rowpy['invoice_id']);
          $PaymentStatus = mysqli_real_escape_string($conn, $rowpy['status']);
          //Getting invoice
          $Invoice = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$invoiceId'");
          while($rowInv = mysqli_fetch_assoc($Invoice)){
          $NewFeeId = $rowInv['id'];
          $total_price += $rowInv['fee'];
          
          print($rowInv[0]);
          
          
          
         
          
         
          
          
      }}
      //Getting pending status
      $pystatus = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status='pending' ");
      if(mysqli_num_rows($pystatus) > 0){
         $BalanceToPay = 'pending'; 
      }else{
     echo$BalanceToPay =  $total_price - $balance_price;
      }
      