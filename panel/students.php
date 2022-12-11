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
	


    <
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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

<?php





//Getting main info
if($LibLoginObj->isLoggedIn()){

$user_id =  $LibLoginObj->isLoggedIn();
  
  
  $fromType = 'lib';

}






$Popups = new msgpopups();




        if (isset($_POST['msgsearch_button'])) {
            $searchText = mysqli_real_escape_string($conn, $_POST['search_text']);
            $getSearch = mysqli_query($conn, "SELECT * FROM students WHERE first_name LIKE '%$searchText%' OR LAST_name LIKE '%$searchText%' LIMIT 54  " );
            //Displaying main header
            echo '<hr><div class="container">
        <form action="students.php" method="POST">
            <div class="alert alert-success" role="alert"><span>Search a student</span>
                <div class="input-group">
                    <div class="input-group-prepend"></div><input name="search_text" class="form-control" type="text" placeholder="Enter student name">
                    <div class="input-group-append"><button class="btn btn-primary" type="submit" name="msgsearch_button">Search!</button></div>
                </div>
            </div>
        </form>
        <h3 class="text-center border rounded-0 bg-primary text-white" style="background-color: #e6e6e6;">Search results: '.$searchText.'</h3>
        <div class="container">
            <div class="row">
    ';
            if (mysqli_num_rows($getSearch) > 0) {
            	while ($rowGetSearch = mysqli_fetch_assoc($getSearch)) {
            		$ToId = mysqli_real_escape_string($conn, $rowGetSearch['system_id']);
            		$StudentFName = mysqli_real_escape_string($conn, $rowGetSearch['first_name']);
                $StudentExam= mysqli_real_escape_string($conn, $rowGetSearch['exam_number']);
            		$StudentLName = mysqli_real_escape_string($conn, $rowGetSearch['last_name']);
                    $StudentName = $StudentFName .' '. $StudentLName;
                    $StudentClass = mysqli_real_escape_string($conn, $rowGetSearch['class_id']);
                    $StudyYear= mysqli_real_escape_string($conn, $rowGetSearch['year']);
                    //Getting borrowed books
                       //Getting borrowed physical books
$GetBorrowBooks = mysqli_query($conn, "SELECT * FROM physical_library WHERE borrower_id='$ToId'");
$CountBorrowed = mysqli_num_rows($GetBorrowBooks);

                    //Getting a class
                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$StudentClass'");
                    $RowClass = mysqli_fetch_assoc($QueryClass);
                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
            		$StudentImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
            	//StudentPopup
           $StudentPopup = $Popups->popNow($StudentName, 'student-'.$ToId.'', 'student', $fromType, $ToId);



    echo ' 
                <div class="col-md-3 text-primary" style="margin-bottom: 6px;background-color: #f4f4f4;" data-toggle="modal" data-target="#student-'.$ToId.'" data-whatever="@getbootstrap"  >
                    <h1 class="text-center"><img class="rounded-circle img-fluid" src="uploads/students_profiles/'.$StudentImg.'" style="width: 128px;max-width: 100%;"></h1>
                    <p margin-bottom:-2px; class="text-center text-dark">'.$StudentName.'</p>
                    <p style="margin-bottom:1px; margin-top:0px;" class="text-center text-dark">Class:'.$ClassName.'</p>
                    <p margin-bottom:0px; class="text-center text-dark">Year:'.$StudyYear.'</p>
                    <p margin-bottom:0px; class="text-center text-dark">Exam:'.$StudentExam.'</p>
                    <p class="text-center text-dark" style="margin-top: -14px;"><button class="btn btn-primary btn-block btn-sm border rounded-0" type="button" >'.$CountBorrowed.' Books</button></p>
                </div>
           ';
            }
        }
            else{
            	echo '<h2>No Students found for: '.$searchText.' </h2>    </div><div>';
            }
            echo ' </div>
        </div></div>';

        }
        else {
            
            $getSearch = mysqli_query($conn, "SELECT * FROM students  ORDER BY rand() LIMIT  54" );
            //Displaying main header
            echo '<hr><div class="container">
        <form action="students.php" method="POST">
            <div class="alert alert-success" role="alert">
                <div class="input-group">
                    <div class="input-group-prepend"></div><input name="search_text" class="form-control" type="text" placeholder="Search a student">
                    <div class="input-group-append"><button class="btn btn-primary" type="submit" name="msgsearch_button">Search!</button></div>
                </div>
            </div>
        </form>
        <h3 class="text-center border rounded-0 bg-primary text-white" style="background-color: #e6e6e6;"></h3>
        <div class="container">
            <div class="row">
    ';
            if (mysqli_num_rows($getSearch) > 0) {
            	while ($rowGetSearch = mysqli_fetch_assoc($getSearch)) {
            		$ToId = mysqli_real_escape_string($conn, $rowGetSearch['system_id']);
            		$StudentFName = mysqli_real_escape_string($conn, $rowGetSearch['first_name']);
            		$StudentLName = mysqli_real_escape_string($conn, $rowGetSearch['last_name']);
                    $StudentName = $StudentFName .' '. $StudentLName;
                    $StudentImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
                    $StudentClass = mysqli_real_escape_string($conn, $rowGetSearch['class_id']);
                    $StudentExam = mysqli_real_escape_string($conn, $rowGetSearch['exam_number']);
                    $StudyYear= mysqli_real_escape_string($conn, $rowGetSearch['year']);
                     //Getting borrowed books
                       //Getting borrowed physical books
$GetBorrowBooks = mysqli_query($conn, "SELECT * FROM physical_library WHERE borrower_id='$ToId'");
$CountBorrowed = mysqli_num_rows($GetBorrowBooks);
            	//StudentPopup
           $StudentPopup = $Popups->popNow($StudentName, 'student-'.$ToId.'', 'student', $fromType, $ToId);


  //Getting a class
  $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$StudentClass'");
  $RowClass = mysqli_fetch_assoc($QueryClass);
  $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);

  $StudentImg = mysqli_real_escape_string($conn, $rowGetSearch['profile_pic']);
  
            echo ' 
                <div class="col-md-3 text-primary" style="margin-bottom: 6px;background-color: #f4f4f4;" data-toggle="modal" data-target="#student-'.$ToId.'" data-whatever="@getbootstrap"  >
                    <h1 class="text-center"><img class="rounded-circle img-fluid" src="uploads/students_profiles/'.$StudentImg.'" style="width: 128px;max-width: 100%;"></h1>
                    <p margin-bottom:-2px; class="text-center text-dark">'.$StudentName.'</p>
                    <p style="margin-bottom:1px; margin-top:0px;" class="text-center text-dark">Class:'.$ClassName.'</p>
                    <p margin-bottom:0px; class="text-center text-dark">Year:'.$StudyYear.'</p>
                    <p margin-bottom:0px; class="text-center text-dark">Exam:'.$StudentExam.'</p>
                    <p class="text-center text-dark" style="margin-top: -14px;"><button class="btn btn-primary btn-block btn-sm border rounded-0" type="button" >'.$CountBorrowed.' Books</button></p>
                </div>
           ';
            }
        }
            else{
            	echo '<h2>No Students found for: '.$searchText.' </h2>    </div><div>';
            }
            echo ' </div>
        </div></div>';
        }


?>
</div></div>

<?php
include 'inc/footer.php';
?>

