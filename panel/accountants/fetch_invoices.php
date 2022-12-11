<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
include '../classes/db.php';
include '../inc/dbconnect.inc.php';
include '../classes/main.php';
include 'classes/balance.php';


//invoice class
include '../accountants/classes/invoices.php';
$invoice = new invoice();
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
                    
						if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	
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
				<form method="post" action="?edit='.$InvId.'">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Fee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="fee_name"  value="'.$InvName.'" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cost</label>
							<input type="number" name="fee_cost" value="'.$InvFee.'" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Due Date</label>
							<input type="datetime-local" name="due_date" value="'.$DueDate.'" class="form-control" required>
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
            
            