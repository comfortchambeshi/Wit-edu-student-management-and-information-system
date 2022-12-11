<?php
include '../inc/auto-loader.php';
include('inc/dbconnect.inc.php');
include 'classes/msgpopups.php';

include 'functions/lib_header.php';
include 'inc/lib_login_function.php';

include 'inc/lib_mains.php';
//Getting borrowed physical books
$GetBorrowBooks = mysqli_query($conn, "SELECT * FROM physical_library WHERE book_status='pending'");
$CountBorrowed = mysqli_num_rows($GetBorrowBooks);
//Specifying the header

$logged_header = '';

$logged_header = header1($logged_header);

include 'inc/lib_sidebar.php';


if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'added') {
        echo '<script>alert("Book rent added successfully!");
        window.location.href = "librarian/books.php?books=pending";
        
            </script>';
    }
}

echo '<title>Students | '.$site_name.'</title>';

?>
    

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Online Library</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Library</a></li>
              <li class="breadcrumb-item active">E-Library</li>
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
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">


    <div class="login-clean">
        <h3 class="text-center" style="background-color: #efeeee;">Our E-Library</h3>
        <form enctype='multipart/form-data' method="post" method="POST" action="inc/submit_book.php"  style="max-width: 100%;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input class="form-control" type="search" style="background-color: rgb(237,239,241);" placeholder="Search any book"></th>
                            <th><button class="btn btn-primary btn-block" type="button">Search books</button></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <p class="text-center"><!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-upload_book">upload book</button>

<div class="modal fade bd-example-modal-lg-upload_book" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="container" >
      <div class="login-clean">
      
            <div class="form-group"><input class="form-control" type="text" placeholder="Book title" name="book_title"></div>
            <div class="form-group" style="background-color: rgb(247,249,252);">
                <h5>book subject</h5><select class="form-control" style="background-color: #f5f5f5;" required="" name="book_subject"><optgroup label="Choose a book subject or outline">
                    
<?php
$GetSubjects = mysqli_query($conn, "SELECT * FROM prgramme_outline");
while ($RowProgrammeOutline = mysqli_fetch_assoc($GetSubjects)) {
    $SubjectTitle = mysqli_real_escape_string($conn, $RowProgrammeOutline['name']);
    $SubjectId = mysqli_real_escape_string($conn, $RowProgrammeOutline['id']);
    echo '<option value="'. $SubjectId.'">'. $SubjectTitle.'</option>';
}
                    
?>

                </optgroup></select></div>
            <div
                class="form-group" style="background-color: rgb(247,249,252);">
                <h5>book cover image</h5><input type="file" accept="image/*" required="" name="book_cover"></div>
    <div class="form-group" style="background-color: rgb(247,249,252);">

        <h5>.pdf or .docx file</h5><input type="file" required="" name="book_file"></div><button class="btn btn-primary btn-block" type="submit" name="book_btn">Upload</button>
    </div>
    </div>
</div>
  </div>
</div></p>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr></tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <form method="post" style="width: 100%;max-width: 90%;">
            <h2 class="sr-only">Login Form</h2><div class="photo-gallery">
<div class="container-fluid">
  <div class="px-lg-12">

    <div class="row" >
     
      <!-- Gallery item -->

      <?php

$QueryBooks = mysqli_query($conn, "SELECT * FROM library_books");
$CountBooks = mysqli_num_rows($QueryBooks);

if ($CountBooks > 0) {
	 while ($RowBooks = mysqli_fetch_assoc($QueryBooks)) {
        $BookTitle = mysqli_real_escape_string($conn, $RowBooks['book_name']);
        $BookFile = mysqli_real_escape_string($conn, $RowBooks['book_file']);
        $BookCover = mysqli_real_escape_string($conn, $RowBooks['book_cover']);
        $BookTitle = mysqli_real_escape_string($conn, $RowBooks['book_name']);
        $uploaded_by = mysqli_real_escape_string($conn, $RowBooks['added_by']);
        //Getting user

        $Libusername = "SELECT * FROM librarians WHERE id='$uploaded_by' ORDER BY 1 DESC LIMIT 30";
        $Libresult = mysqli_query($conn, $Libusername);
        $Librow = mysqli_fetch_assoc($Libresult);

        


        $Libuser_id = $Librow['id'];
        
        $Libuser_name = mysqli_real_escape_string($conn,  $Librow['name']);
        $Libuser_image = mysqli_real_escape_string($conn, $Librow['profile_pic']);
        
		echo '<a href="uploads/books/'.$BookFile.'"><div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><img src="images/books/'.$BookCover.'" alt="" class="img-fluid card-img-top">
          <div class="p-4">
            <h5> <a href="#" class="text-dark">'.$BookTitle.'</a></h5>
            <p class="small text-muted mb-0"><i class="fa fa-user" aria-hidden="true"></i> '.$Libuser_name.'</p>
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
              <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">JPEG</span></p>
              
            </div>
          </div>
        </div>
      </div></a>';
	}
}
else{
	echo "<h3> No books found in the E-Library, please contact the librarians!</h3>";
}
      ?>
      
      <!-- End -->

    </div>
    <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
  </div>
</div>
</div></form>
    </div>
    <p class="text-center text-primary" style="background-color: #ebebeb;">E-Library script designed and developed by <a href="https://fourskilllevels.com">fourskilllevels </a></p>
<?php
include 'inc/footer.php';
?>
