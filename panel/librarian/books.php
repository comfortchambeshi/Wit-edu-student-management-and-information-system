<?php
include_once '../inc/auto-loader.php';
$books = new bookinsertdisplay();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">

</head>
<body>

       
      
      
      
      
        <?php
   if (isset($_GET['books'])){
   $BooksUrl = $_GET['books'];

   if ($BooksUrl == 'pending') {

    echo '
    <title>Pending Physical Library Books</title>
    
    <!-- partial:index.partial.html -->
    <h2>Pending Library Books</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Book Name</th>
                <th>Class</th>
                
                <th>Intake </th>
                <th>Due Date</th>
                <th>Status </th>
            </tr>
            </thead>
            <tbody>';
       
    $PendingBooks =  $books->DisplayPendingBooks();
   }elseif ($BooksUrl == 'overdue') {
    echo '
    <title>Overdue Physical Library Books</title>
    <!-- partial:index.partial.html -->
    <h2 style="color:#DD042C;">Over due books</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Book Name</th>
                <th>Class</th>
                
                <th>Intake </th>
                <th>Due Date</th>
                <th>Status </th>
            </tr>
            </thead>
            <tbody>';
            $OverDueBooks =  $books-> DisplayOverdueBooks();
   }
   }

?>
        <tbody>
    </table>
</div>
<!-- partial -->
<hr>
  <h4 class="text-center" ><a href="../librarian.php" type="button" class="btn btn-primary">Go to homepage</a>
</h4>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
