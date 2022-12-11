<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
  
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Table-Fixed-Header.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
 
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head>

<body> 
<?php
   include 'functions/parent_header2.php';

include '../inc/dbconnect.inc.php';
include '../inc/parent_login_function.php';
include($_SERVER['DOCUMENT_ROOT'].'/panel/inc/parent_mains.php');
$userid =  parent_Login::isLoggedIn();
$logged_header = '';

$logged_header = header1($logged_header);


    ?>
    <br><br>

   

            
           
            
        </tbody>
    </table>
</div>




<div class="container" style="background-color: #f1f7fc;">



    
            <?php
             echo' <title>Exam results | '.$site_name.'</title>';
            //Querying student by logged in parent
            $QueryStudent = mysqli_query($conn, "SELECT * FROM students WHERE parent_id='$user_id'");
            while ($rowStd = mysqli_fetch_assoc($QueryStudent)) {
                $StdId = mysqli_real_escape_string($conn, $rowStd['system_id']);
            
            $QuerryMarks = mysqli_query($conn, "SELECT * FROM exam_results WHERE marks_to='$StdId' ");
            echo '<h3 class="text-center"></h3>

<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <br><br><br><br><br><br>
       <div class="login-clean">
        <form method="post" style="max-width: 100%;" action="send2.php" enctype="multipart/form-data">
            <h2 class="sr-only">Login Form</h2>
            <h4 class="text-center">Upload the examination script</h4>
            <div class="form-group">
                <h5>Grade</h5><input class="form-control" type="text" required="" name="results_grade" placeholder="enter marks grade"></div>

                <div class="form-group">
                <h5>Student Exam Number</h5><input class="form-control" type="text" required="" name="exam_number" placeholder="student Exam Number grade"></div>
            <div class="form-group">
                <h5>Script file</h5><input required="" type="file" name="script_file"></div>
            <div class="form-group">
                <h5>Comment</h5><textarea class="form-control form-control-lg" required="" name="results_comment" rows="120" cols="12"></textarea></div>
            <div class="form-group">
                <h5>Term</h5><select name="term" class="form-control"><optgroup label="Select a term"><option value="one" selected="">One</option><option value="two">Two</option><option value="14">Three</option></optgroup></select></div>
            <div
                class="form-group">
                <h5>Student Year</h5><select name="year" class="form-control"><optgroup label="Student Year"><option value="one" selected="">One</option><option value="two">Two</option><option value="three">Three</option>
               <option value="four">Four</option
                </optgroup></select></div>
    <div
        class="form-group">
        <h5>Student Class</h5><select name="class" class="form-control"><optgroup label="Select classroom">

';
//Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes ");
                                    while($RowClass = mysqli_fetch_assoc($QueryClass)){

                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);

                                    echo '<option value="'.$ClassId.'" >'.$ClassName.'</option>';

                                }

echo '

        </optgroup></select></div>
        <div
            class="form-group"><button class="btn btn-primary btn-block" type="submit" name="results_btn">SEND</button></div>
            </form>
            </div>
    </div>
  </div>
</div>

            ';
            if (mysqli_num_rows($QuerryMarks) > 0) {

               
                    
                   
                 echo '


                       
                 <h3 class="text-center" style="color: #cccccc;background-color: #25476a;"> My students exam results
                       

                 </h3>
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                
            <th>Name of exam</th>
                <th>Grade</th>
               
                <th>Comment</th>
                <th>Year</th>
                <th>Examination Script</th>
                
            </tr>

        </thead>
        
        <tbody>
        ';
         while ($rowExamResults = mysqli_fetch_assoc($QuerryMarks)) {
            $Subject = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['subject']));
            $name = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['name']));
            $ObtainedMarks = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['obtained_marks']));
            $ObtainedGrade = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['grade']));
            $ResultComment = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['comment']));
            $Year = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['year']));
            $script_file = mysqli_real_escape_string($conn, htmlspecialchars($rowExamResults['script_file']));

        echo'
                 
                <tr>
                
                <td><h4>'.$name.'</h4></td>
                <td>'.$ObtainedGrade.'</td>
                <td>'.$ResultComment.'</td>
                <td>'.$Year.'</td>
                <td><h4><a href="uploads/results/'.$script_file.'">Download</a></h4></td>
                
            </tr>';
               
            }
        }
            else{
                
            }
        }


            ?>

            
           
            
        </tbody>
    </table>
</div>
<hr>


<div class="container" style="background-color: #f1f7fc;">



    
           

            
           
            
        </tbody>
    </table>
</div>
<hr>


<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>