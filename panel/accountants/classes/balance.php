<?php
//include '../classes/db.php';
//include '../classes/main.php';


class balance extends db{
    
    //checking student balance
    
    public function StudentBalance($students){
        
        //getting students
        echo   '
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>EXAM</th>
                    <th>PHONE</th>
                    <th>CITY</th>
                    <th>BALANCE</th>
                  </tr>';
        foreach($students as $student){
            $total_price = 0;
            $user_uid = $student['system_id'];
            $exam = $student['exam_number'];
            $first_name = $student['first_name'];
            $last_name = $student['last_name'];
            $phone_number = $student['phone_number'];
            $city_town = $student['city_town'];
            $FullName = $first_name .' '. $last_name;
            
            //getting paids
            $paid_sql = "SELECT SUM(amount_paid) AS 'sumitem_cost' FROM payments WHERE payment_by='$user_uid'";
            $stmt_paid = $this->connect()->query($paid_sql);
            $balance_data = $stmt_paid->fetch();
            $balance_price = $balance_data['sumitem_cost'];
            
            //getting payments
            $py = "SELECT * FROM payments WHERE payment_by='$user_uid' AND status!='rejected' GROUP BY invoice_id";
            $stmt_py = $this->connect()->query($py);
            $rowsPy = $stmt_py->fetchAll();
            foreach($rowsPy as $rowpy){
                $invoiceId = $rowpy['invoice_id'];
                $PaymentStatus = $rowpy['status'];
                
                //Getting invoice
          $Invoice = "SELECT * FROM invoices WHERE id='$invoiceId'";
          $stmt_invoice = $this->connect()->query($Invoice);
          $rows_inv = $stmt_invoice->fetchAll();
          foreach($rows_inv as $rowInv){
              
              $NewFeeId = $rowInv['id'];
              $total_price += $rowInv['fee'];
              
              
              
          }
                
               
            }
            //Getting balances
            $BalanceToPay =  $total_price - $balance_price;
            //end geting balance
    
     echo'
			<tr>
				<td>'.$FullName.'</td>
				<td>'.$exam.'</td>
				<td>'.$phone_number.'</td>
				<td>'.$city_town.'</td>
				<td>'.$BalanceToPay.'</td>
			</tr>
		'; 
            
            
        }
        
    }
    
}






