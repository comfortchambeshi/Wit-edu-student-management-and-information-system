<?php
include '../classes/db.php';
include 'dbconnect.inc.php';
if(isset($_GET['inv_id'])){
    
    $invUrlId = $_GET['inv_id'];
    

    
    class info extends db{
        
        public function fetch($Url){
            
            $sql = "SELECT * FROM invoices WHERE id=$Url";
            $stmt = $this->connect()->query($sql);
            $rows = $stmt->fetch();
            
            
            $StudyYears = $rows['study_years']; 
            $StudySemesters = $rows['semesters']; 
            $StudyModes = $rows['study_modes'];
            
            
  
// Use preg_split() function 
$string = $StudyYears;  
$str_arr = preg_split ("/\,/", $string);  

      
// use of explode 
$string = $StudyYears; 
$str_arr = explode (",", $string);  
 
 
 $comma_separated = implode(',', $str_arr);


            
            
               



               
             
            
         
             
                   
                   
                   
                  
                 
                   
                  // $im = var_dump($StudyYears).'<br>';
                   
                   $sql = "SELECT * FROM students WHERE FIND_IN_SET (study_mode , '".$StudyModes."') AND FIND_IN_SET (year , '".$StudyYears."') AND FIND_IN_SET (semester , '".$StudySemesters."')";
                   $stmt = $this->connect()->query($sql);
                  
                   $rows2 = $stmt->fetchAll();
                   $count = $stmt->rowCount();
                   
                   if($count >0){
                   foreach($rows2 as $row){
                       $firstName = $row['first_name'];
                       $lastName = $row['last_name'];
                       $Id = $row['system_id'];
                       $date = date('Y-m-d H:i:s');
                       
                       
                       
                       
                      $insert = "INSERT INTO payments (payment_by, status, deposit_slip_file, 	proceeded_by, payment_date, amount_paid, reference, reject_description,invoice_id, last_paid, total_paid)VALUES(?, ?, ?, ?,?,?, ?,?,?,?,?)";
                       $stmt = $this->connect()->prepare($insert);
                      if (!$stmt->execute([$Id, 'not_paid', 'none', 0, $date, 0, 'none', 'none', $Url, 0, 0])){
                          print_r($stmt->errorInfo());
                          
                      }
                      
                      
                       
                   
                   
                   
               
               
               
           }
                   }
        
            
        }
    }
        
        $info = new info();
        $data = $info->fetch($invUrlId);
        
       header("LOCATION: ../invoices.php?status=success");
        
        
    }
    elseif(isset($_GET['personal_inv'])&&isset($_GET['sid'])){
     $sid = $_GET['sid'];
     $personal_inv = $_GET['personal_inv'];
      class single_inv extends db{
          
          public function insertPayment($exam_id, $invoice){
              
              $checkstd = "SELECT * FROM students WHERE exam_number=?";
            
              $stmt = $this->connect()->prepare($checkstd);
              $stmt->execute([$exam_id]); 
             $rows = $stmt->fetchAll();
              foreach($rows as $row){
                     
              
              $student_id = $row['system_id'];
              $date = date('Y-m-d H:i:s');
           $insert = "INSERT INTO payments (payment_by, status, deposit_slip_file, 	proceeded_by, payment_date, amount_paid, reference, reject_description,invoice_id, last_paid, total_paid)VALUES(?, ?, ?, ?,?,?, ?,?,?,?,?)";
                       $stmt = $this->connect()->prepare($insert);
                       
                      if (!$stmt->execute([$student_id, 'not_paid', 'none', 0, $date, 0, 'none', 'none', $invoice , 0, 0])){
                          print_r($stmt->errorInfo());
                          
                      }else{
                          header("LOCATION: ../invoices.php?status=success");
                      }   
                      
                      
              }
              
          }
          
      }
      
      
      //Calling the classes and funcs
      $info = new single_inv();
      $data = $info->insertPayment($sid,$personal_inv);
        
        
    }

    
    
    

               //GETTING USER FROM THE SELECTED
               
               /*$InsertToPayments = mysqli_query($conn, "INSERT INTO payments()VALUES()");
               echo '<script>alert("Invoice generated successfull!");
				window.location.href = "invoices.php";
				
					</script>';
		exit(); */
		
	
		?>