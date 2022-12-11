<?php
include '../inc/auto-loader.php';
include 'inc/dbconnect.inc.php';
include 'inc/acc_login_function.php';
include 'inc/staff_login.php';
include 'inc/acc_mains.php';

include 'classes/main.php';
include 'accountants/classes/balance.php';

 //invoice class
include 'accountants/classes/invoices.php';
$invoice = new invoice();

$AdminLoginObj = new admin_login();
if ($AccLoginObj->isLoggedIn()) {
    include 'functions/acc_header.php';
	$logged_header = '';
    $logged_header = header1($logged_header);
    
    include 'inc/acc_sidebar.php';
    
$userType = 'acc';
}elseif($AdminLoginObj->isadminlogged()){
    
    include 'functions/admin_header.php';

include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$logged_header = '';

$logged_header = header1($logged_header);
include 'inc/admin_sidebar.php';
$userType = 'admin';

}
else{
    header("Location: ../login.php?sout=success");

      }


?>
<title>Invoices</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/icon-font.min.css" type="text/csc" />
<link href="//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400" rel="stylesheet" type="text/css"/>
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoices </h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Payments</a></a></li>
              <li class="breadcrumb-item active">Invoices</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<style type="text/css">
    
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    
   
    <div style="margin-left:-10px; width:100%;" class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Invoices</b></h2>
					</div>
					
					<div class="col-sm-6">
					    <form method="POST" action="inc/download.php">
    					    <button name="invoice_export" type="submit" class="btn btn-info" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Export CSV</span></button></form>
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Invoice</span></a>
						<a href="#generateinv" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Generate Invoice</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <div class="form-group">
				<div class="input-group">
				    
					<form action="" method="POST">
					<input type="text" name="search_text" id="search_text" placeholder="Enter Invoice Name or id" class="form-control" />
					<button type="submit" name="search_inv" hidden>Search Invoice</button>
					</form>
				</div>
			</div>
		
  <?php       
echo'
 <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Name</th>
                        <th>Due Date</th>
                        
                        <th>Cost</th>
						
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
                    
						if(isset($_POST["search_inv"]))
{
	$search = $_POST["search_text"];
	
$Inv = mysqli_query($conn, "SELECT * FROM invoices WHERE name LIKE '%".$search."%' LIMIT 25");
	
}
else
{
 $Inv = mysqli_query($conn, "SELECT * FROM invoices ORDER BY 1 DESC LIMIT 25");   
}
						
						
						
						    while($rowInv= mysqli_fetch_assoc($Inv)){
						        $InvName = mysqli_real_escape_string($conn, $rowInv['name']);
						        $DueDate = mysqli_real_escape_string($conn, $rowInv['due_date']);
						        $InvId = mysqli_real_escape_string($conn, $rowInv['id']);
						        
						        $InvFee = mysqli_real_escape_string($conn, $rowInv['fee']);
						        
						        
						        
						        
						        
						         echo '
						        <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
                        <td>'.$InvName.'</td>
                        <td>'.$DueDate.'</td>
                       
                        <td>'.$InvFee.'</td>
						
                        
                        <td>
                            <a href="#'.$InvId.'edit" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edita">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal'.$InvId.'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
						        
						    
						    
					
						    
						   
						             
						             
						             
						             
						           

	<!-- Edit Modal HTML -->
	<div id="'.$InvId.'edit" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="?edit='.$InvId.'">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Fee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text"  name="fee_name" value="'.$InvName.'" class="form-control" required>
						</div>
						
					
						<div class="form-group">
							<label>Amount</label>
							<input value="'.$InvFee.'" name="fee_cost" type="text" class="form-control" required>
						</div>	
						
						<div class="form-group">
							<label>Due Date</label>
							<input type="date" name="due_date" value="'.$DueDate.'" class="form-control">
						</div>
					</div>
					
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input name="invoice_edit" type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	
	<div id="deleteEmployeeModal'.$InvId.'" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="?delete='.$InvId.'">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Fee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input name="delete_invoice" type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	
						             
						             ';
						    }
						    
						  
	
	
						    
						
						?>
					 
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<?php
		if(isset($_POST['fee_btn'])){
		    $feeName = mysqli_real_escape_string($conn, $_POST['fee_name']);
		    $feeCost = mysqli_real_escape_string($conn, $_POST['fee_cost']);
		    $DueDate = mysqli_real_escape_string($conn, $_POST['due_date']);
		    $Semester = implode(',', $_POST['semester']);
		    
		    
		    
		    $studyYears = implode(',',$_POST['year']);
		    
		    $modes = implode(',',$_POST['mode']);
		    $date = date('Y-m-d H:i:s');
		    
           $insert = mysqli_query($conn, "INSERT INTO invoices (name, added_by, gen_date, fee, study_years, study_modes, user_type, semesters, inv_type, due_date)VALUES('$feeName', '$user_id', '$date', '$feeCost', '$studyYears', '$modes', '$userType', '$Semester', 'bulk', '$DueDate')");
           if($insert){
               
               $last_id = $conn->insert_id;
               echo '<script>alert("Invoice Sent successfull!");
				window.location.href = "inc/get_insert.php?inv_id='.$last_id.'";
				
					</script>';
		exit();
               
           }
           else{
               echo mysqli_error($conn);
           }
		}
		elseif(isset($_POST['gen_btn'])){
		    
		    $feeName = mysqli_real_escape_string($conn, $_POST['fee_name']);
		    $feeCost = mysqli_real_escape_string($conn, $_POST['fee_cost']);
		    $StudentId = mysqli_real_escape_string($conn, $_POST['student_id']);
		    $DueDate = mysqli_real_escape_string($conn, $_POST['due_date']);
		    
		    
		    $checkStudent = mysqli_query($conn, "SELECT * FROM students WHERE exam_number='$StudentId' OR username='$StudentId'");
		    if(mysqli_num_rows($checkStudent) > 0){
		        
		        $insert = mysqli_query($conn, "INSERT INTO invoices (name, added_by, gen_date, fee, study_years, study_modes, user_type, semesters, inv_type,due_date)VALUES('$feeName', '$user_id', '$date', '$feeCost', '-', '-', '$userType', '-', 'single','$DueDate')");
		     if($insert){
		          $last_id = $conn->insert_id;
		     echo '<script>alert("Invoice Sent successfull!");
				window.location.href = "inc/get_insert.php?personal_inv='.$last_id.'&sid='.$StudentId.'";
				
					</script>';
					
					
		     }
		        
		        
		    }else{
		        
		        echo '<script>alert("Error you invoice was not sent. Please check the exam number or username before you proceed!");
				window.location.href = "#";
				
					</script>';
		        
		        
		    }
		    
		    
		     
		    
		    
		    
		}elseif(isset($_POST['delete_invoice'])){
		    $delete_id = $_GET['delete'];
		    //delete invoice
		    
		    $delete = $invoice->delete_invoice($delete_id);
		  
		    echo '<script>alert("Invoice Deleted Successfully!");
				window.location.href = "";
				
					</script>';
		    
		}elseif(isset($_POST['invoice_edit'])){
		    $invoice_id = $_GET['edit'];
		    $feeName = mysqli_real_escape_string($conn, $_POST['fee_name']);
		    $feeCost = mysqli_real_escape_string($conn, $_POST['fee_cost']);
		    $DueDate = mysqli_real_escape_string($conn, $_POST['due_date']);
		    
		    $edit = $invoice->edit_invoice($invoice_id, $feeName,$feeCost,$DueDate);
		    
		     echo '<script>alert("Invoice Edited Successfully!");
				window.location.href = "";
				
					</script>';
		}


//modals

  //Modal for sending bulk invoices
						    echo '  
						             <!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="">
					<div class="modal-header">						
						<h4 class="modal-title">Add Fee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="fee_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cost</label>
							<input type="number" name="fee_cost" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Due Date</label>
							<input type="date" name="due_date" class="form-control">
						</div>
					
						 <div class="form-group">
							<label>Available to study years</label>
							<br>
							 <input type="checkbox" id="scales" name="year[]" value="one"
                             >
                              <label for="scales">First Years</label>
                              
                              <input type="checkbox" id="scales" name="year[]" value="two"
                             >
                              <label for="scales">Second Years</label>
                              
                              <input type="checkbox" id="scales" name="year[]" value="three"
                             >
                              <label for="scales">Third Years</label>
                              
                              <input type="checkbox" id="scales" name="year[]" value="four"
                             >
                              <label for="scales">Fourth Year</label>
						</div>
						
						<div class="form-group">
							<label>Available Semesters</label>
							<br>
							 <label for="scales">One</label>
                              
                              <input type="checkbox" id="scales" name="semester[]" value="first"
                             >
                              <label for="scales">Two</label>
                              <input type="checkbox" id="scales" name="semester[]" value="second"
                             >
  
  
						</div>
						
						<div class="form-group">
							<label>Available to study modes</label>
							<br>
							 <label for="scales">Full Time</label>
                              
                              <input type="checkbox" id="scales" name="mode[]" value="Full Time"
                             >
                              <label for="scales">Distance</label>
                              <input type="checkbox" id="scales" name="mode[]" value="Distance"
                             >
  
  
						</div>
						
						
						
						
						
						
						
						
						
							
						
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="fee_btn" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>';

//Modal for personal invoices
	  echo '  
						             <!-- Edit Modal HTML -->
	<div id="generateinv" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="">
					<div class="modal-header">						
						<h4 class="modal-title">Personal Invoice</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="fee_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cost</label>
							<input type="number" name="fee_cost" class="form-control" required>
						</div>
					
					<div class="form-group">
							<label>Due Date</label>
							<input type="date" name="due_date" class="form-control">
						</div>
						<div class="form-group">
							<label>Student</label>
							<input type="text" placeholder="Enter exam id or username" name="student_id" class="form-control" required>
						</div>
						
						
						
						
						
						
						
						
						
							
						
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="gen_btn" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>';

			?>
			
			<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"accountants/fetch_invoices.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
			
			
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
  include 'inc/footer.php';
  
  ?>