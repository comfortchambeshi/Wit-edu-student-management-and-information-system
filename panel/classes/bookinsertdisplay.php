<?php

class bookinsertdisplay extends books 
{
//Display Books
    public function DisplayAllBooks(){
       $this->GetAllBooks();

    }

    //Display Pending Books

    public function DisplayPendingBooks(){
        $this->GetPendingBooks();


    }
     //Display Overdue Books

     public function DisplayOverdueBooks(){
      $this->GetOverdueBooks();


  }

    //Insert Books
    public function InsertBooks($BookName, $BookStatus, $BorrowedBy, $Category, $DueDate){
      $this->insertBooks($BookName, $BookStatus, $BorrowedBy, $Category, $DueDate);


    }
    
    
}




?>