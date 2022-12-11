<?php

//gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND read_or_unread='unread' AND to_type='lib' ");
		  $MsgCounter = mysqli_num_rows($RunMsg);
		  
		  //Getting overdue books
		  $Get = mysqli_query($conn, "SELECT * FROM physical_library WHERE book_status='overdue'");
		  $CountOverdues = mysqli_num_rows($Get);
		  
		  $site_SmallLogo = mysqli_real_escape_string($conn, $row_info['small_logo']);


echo '
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="'.$site_url.'/panel" class="brand-link">
      <img src="'.$site_url.'/panel/uploads/logos/'.$site_SmallLogo.'" alt="small_logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">'.$site_name.'</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="'.$site_url.'/panel/uploads/libs_profiles/'.$user_image.'" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">'.$user_name.'</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
         
         
          
         
         
          
            <li style="margin-left: 8px;" class="nav-header">MANAGEMENT</li>
          
            <li class="nav-item">
              <a href="'.$site_url.'/panel/students.php" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Students
                </p>
              </a>
            </li>
            
          
          <li class="nav-header">LIBRARY</li>
          
          <li class="nav-item">
            <a href="'.$site_url.'/panel/lib_library.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Online Library
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="modal" data-target=".bd-example-modal-lg"  href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Lend A book
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/librarian/books.php?books=pending" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Books Rent
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/librarian/books.php?books=overdue" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Overdue Books 
                <span class="badge badge-info right">'.$CountOverdues.'</span>
                
              </p>
            </a>
          </li>
          
          


         

          <li class="nav-header">INFO.</li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/lib_messages.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Messages
                <span class="badge badge-info right">'.$MsgCounter.'</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/news.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                News
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Edit Info.
                
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

';



?>


<!-- Large modal -->
<link rel="stylesheet" href="assets/css/Login-Form-Clean.css">


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div class="login-clean">
    <form method="post" action="inc/lendbook.inc.php" style="width: 100%;max-width: 100%;">
    <h2 class="sr-only">Login Form</h2>
    <div class="form-group"><input type="text" class="form-control" name="book_name" placeholder="Enter book name" /></div>
    <div class="form-group"><input type="number" class="form-control" name="book_number" placeholder="Book number" inputmode="numeric" autocomplete="on" /></div>
	<div class="form-group"><input type="default" class="form-control" name="student_id" placeholder="Student id" autocomplete="on" autofocus /></div>
	<div class="form-group"><b>Due Date</b> <input type="date" class="form-control" name="due_date" placeholder="Due date" autocomplete="on" autofocus /></div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="lend_btn">Submit</button></div>
</form>
</div>
    </div>
  </div>
</div>