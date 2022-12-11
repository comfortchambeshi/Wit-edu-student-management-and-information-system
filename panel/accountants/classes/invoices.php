<?php

  class invoice extends db{
      //for deleting invoices
		        public function delete_invoice($invoice_id){
		        $sql = "DELETE FROM invoices WHERE id=?";
		        $stmt = $this->connect()->prepare($sql);
		        $stmt->execute([$invoice_id]);
		        
		        //deleting payments with selected invoice
		        
		        $payment_sql = "DELETE FROM payments WHERE invoice_id=?";
		        $stmtPayments = $this->connect()->prepare($payment_sql);
		        $stmtPayments->execute([$invoice_id]);
		        
		        }
		    
	  //for editing invoices
	            public function edit_invoice($invoice_id, $name, $amount, $due_date){
	            $sql = "UPDATE invoices SET name=?,due_date=?,fee=? WHERE id=?";    
	            $stmt = $this->connect()->prepare($sql);
	            $stmt->execute([$name,$due_date,$amount,$invoice_id]);
	            }  
	  
	      
      
  }