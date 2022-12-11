<?php

class payments extends db{
    
    public function getInvoices(){
        $sql = "SELECT * FROM invoices ORDER BY 1 DESC";
        $stmt = $this->connect()->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    //insert payments
    
    public function InsertPayments($Invoice_id,$payment_by,$amount,$slip_file,$user_id){
        $sql = "INSERT INTO payments (payment_by,status,deposit_slip_file, proceeded_by,amount_paid,invoice_id,reference,reject_description,last_paid,total_paid)VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$payment_by,'approved',$slip_file,$user_id,$amount,$Invoice_id,'manual','-',0,0]);
        
    }
}
