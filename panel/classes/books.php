<?php


class books extends db 
{

//Getting books
protected function GetAllBooks(){
$sql = "SELECT * FROM physical_library";
$stmt = $this->connect()->query($sql);
while ($rowBooks = $stmt->fetch()) {
   
}




}

  
//Getting pending books
protected function GetPendingBooks(){
    $sql = "SELECT * FROM physical_library WHERE book_status='pending' ORDER BY 1 DESC limit 25";
    $stmt = $this->connect()->query($sql);
    $rowBooks = $stmt->fetchAll();
foreach ($rowBooks as $rowBook) {
    $book_id = $rowBook['id'];
             $BookName = $rowBook['book_name'];
        $BookStatus = $rowBook['book_status'];
        $BookNumber = $rowBook['book_number'];
        
        $BorrowedBy = $rowBook['borrower_id'];
        $RentBy = $rowBook['rent_by'];
        //Getting renter's details
        $Renter = "SELECT * FROM librarians WHERE id='$RentBy'";
        $stmtRenter = $this->connect()->query($Renter);
        $rowRenter= $stmtRenter->fetch();
        $LibrarianName = $rowRenter['name'];
        //ending here

        //Continues:
        $DueDate = $rowBook['due_date'];
        $BorrowerCategory = $rowBook['category'];
        
        if ($BorrowerCategory == 'student') {
            $queryFrom = 'students';
            $BorrowerId = 'system_id';
            $option2 = 'exam_number';
            $name = 'first_name';
        }
        elseif ($BorrowerCategory == 'lecturers') {
            $querryFrom == 'lecturers';
            $BorrowerId == 'id';
            $name = 'name';
        }
        
        //Getting borrower
        $SqlBorrower = "SELECT * FROM $queryFrom WHERE $BorrowerId='$BorrowedBy'";
        $stmt = $this->connect()->query($SqlBorrower);
        $rowBorrower = $stmt->fetch();
            $FullName = $rowBorrower[$name];
            $idForId = $rowBorrower[$option2];
            $IntakeYear = $rowBorrower['year'];
            $ClassId = $rowBorrower['class_id'];
            //Ending getting info
        
            //Getting Class By id
            $ClassSQL = "SELECT * FROM classes WHERE id='$ClassId'";
            $stmtClass = $this->connect()->query($ClassSQL);
            $RowClass = $stmtClass->fetch();
            $ClassName = $RowClass['class_name'];
            //Endnd Class Data
        
        
       
        
        
                echo '<tr>
                <td>'. $FullName.' (<b>'.$idForId.'</b>)</td>
                <td>'.$BorrowerCategory.'</td>
                <td><a href="#"><b data-toggle="modal" data-target="#'.$BookNumber.'">'.$BookName.'</a></b></td>
          
            
                
                
                <!-- Modal -->
                <div class="modal fade" id="'.$BookNumber.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Library user clearance details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="border-dark login-clean">
                      <form method="post" style="max-width: 100%;width: 100%;" action="books.php?books=pending&id='.$book_id.'">
                          
                          <h6>Book NO.: <strong>'.$BookNumber.'</strong></h6>
                          <h6>Rent by.: <strong>'.$LibrarianName.'</strong></h6>
                          <p>Update book status<select name="status" class="border rounded-0 border-dark form-control"><optgroup label="Update status"><option value="'.$BookStatus.'" selected>'.$BookStatus.'</option><option value="cleared">Cleared</option><option value="overdue">Overdue</option></optgroup></select></p>
                      
                  </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="clearance_btn" class="btn btn-primary">Save changes</button></form>
                      </div>
                    </div>
                  </div>
                </div>

                <td>'.$ClassName.'</td>
                <td>Year '.$IntakeYear.'</td>
                <td>'.$DueDate.'</td>
                <td>'.$BookStatus.'</td>
            </tr>';


           



        




               
            
}

if (isset($_POST['clearance_btn'])&& isset($_GET['id'])) {
    $C_status = $_POST['status'];
    $BookIdUrl = $_GET['id'];
    //Run update
    
    $sqlUpdate = "UPDATE physical_library SET book_status='$C_status' WHERE id=?";
    $stmtup = $this->connect()->prepare($sqlUpdate);
    $stmtup->execute([$book_id]);

    echo '<script>alert("Librarian user book status updated successfully!");
		window.location.href = "books.php?books=pending";
		
			</script>';

   
}
   


}


//Getting Overdue books
protected function GetOverdueBooks(){
    $sql = "SELECT * FROM physical_library WHERE book_status='overdue' ORDER BY 1 DESC limit 25";
    $stmt = $this->connect()->query($sql);
    $rowBooks = $stmt->fetchAll();
foreach ($rowBooks as $rowBook) {
    $book_id = $rowBook['id'];
             $BookName = $rowBook['book_name'];
        $BookStatus = $rowBook['book_status'];
        $BookNumber = $rowBook['book_number'];
        
        $BorrowedBy = $rowBook['borrower_id'];
        $RentBy = $rowBook['rent_by'];
        //Getting renter's details
        $Renter = "SELECT * FROM librarians WHERE id='$RentBy'";
        $stmtRenter = $this->connect()->query($Renter);
        $rowRenter= $stmtRenter->fetch();
        $LibrarianName = $rowRenter['name'];
        //ending here

        //Continues:
        $DueDate = $rowBook['due_date'];
        $BorrowerCategory = $rowBook['category'];
        
        if ($BorrowerCategory == 'student') {
            $queryFrom = 'students';
            $BorrowerId = 'system_id';
            $name = 'first_name';
            $option2 = 'exam_number';
        }
        elseif ($BorrowerCategory == 'lecturers') {
            $querryFrom == 'lecturers';
            $BorrowerId == 'id';
            $name = 'name';
            $option2 = 'nrc';
        }
        
        //Getting borrower
        $SqlBorrower = "SELECT * FROM $queryFrom WHERE $BorrowerId='$BorrowedBy'";
        $stmt = $this->connect()->query($SqlBorrower);
        $rowBorrower = $stmt->fetch();
            $FullName = $rowBorrower[$name];
            $idForId = $rowBorrower[$option2];
            $IntakeYear = $rowBorrower['year'];
            $ClassId = $rowBorrower['class_id'];
            //Ending getting info
        
            //Getting Class By id
            $ClassSQL = "SELECT * FROM classes WHERE id='$ClassId'";
            $stmtClass = $this->connect()->query($ClassSQL);
            $RowClass = $stmtClass->fetch();
            $ClassName = $RowClass['class_name'];
            //Endnd Class Data
        
        
       
        
        
                echo '<tr>
                <td>'. $FullName.' (<b>'.$idForId.'</b>)</td>
                <td>'.$BorrowerCategory.'</td>
                <td><a href="#"><b data-toggle="modal" data-target="#'.$BookNumber.'">'.$BookName.'</a></b></td>
          
            
                
                
                <!-- Modal -->
                <div class="modal fade" id="'.$BookNumber.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Library user clearance details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="border-dark login-clean">
                      <form method="post" style="max-width: 100%;width: 100%;" action="books.php?books=overdue&id='.$book_id.'">
                          
                          <h6>Book NO.: <strong>'.$BookNumber.'</strong></h6>
                          <h6>Rent by.: <strong>'.$LibrarianName.'</strong></h6>
                          <p>Update book status<select name="status" class="border rounded-0 border-dark form-control"><optgroup label="Update status"><option value="'.$BookStatus.'" selected>'.$BookStatus.'</option><option value="cleared">Cleared</option><option value="pending">Pending</option></optgroup></select></p>
                      
                  </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="clearance_btn_over" class="btn btn-primary">Save changes</button></form>
                      </div>
                    </div>
                  </div>
                </div>

                <td>'.$ClassName.'</td>
                <td>Year '.$IntakeYear.'</td>
                <td>'.$DueDate.'</td>
                <td>'.$BookStatus.'</td>
            </tr>';


           



        




               
            
}

if (isset($_POST['clearance_btn_over'])&& isset($_GET['id'])) {
    $C_status = $_POST['status'];
    $BookIdUrl = $_GET['id'];
    //Run update
    
    $sqlUpdate = "UPDATE physical_library SET book_status='$C_status' WHERE id=?";
    $stmtup = $this->connect()->prepare($sqlUpdate);
    $stmtup->execute([$book_id]);

    echo '<script>alert("Librarian user book status updated successfully!");
		window.location.href = "books.php?books=overdue";
		
			</script>';

   
}
   


}



}
