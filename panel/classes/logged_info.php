<?php

class logged_info extends db{
    
    public function ReturningStudent($user_id){
        
        $sql = "SELECT * FROM returning_students WHERE user_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        
        $count = $stmt->rowCount();
        
        
     if($count < 1){
         
         echo ' <form method="POST" action="" role="form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount Paid</label>
                    <input name="amount_paid" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter the ammount paid">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="slip_file" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="return_btn" type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>';
     }else{
         echo '<p class="text-warning">You have no form available!</p>';
     }
    }
    //  Inserting data
    
    public function insertData($user_id, $Amount, $slipFile){
        // NowDate:
        
        
        
       $date = date('Y-m-d H:i:s');
       $sql = "INSERT INTO returning_students(user_id,date_reported,fees_paid,slip_file) VALUES(?,?,?,?)";
       $stmt = $this->connect()->prepare($sql);
       if(!$stmt->execute([$user_id, $date, $Amount, $slipFile])){
           print_r( $stmt->errorInfo());
           
       }else{
           echo ("<script LANGUAGE='JavaScript'>
           var url = window.location.href;
    window.alert('Returning student information updates successfully!');
    window.location.href=url;
    </script>");
       }
        
    }
    
    
    
    
}

