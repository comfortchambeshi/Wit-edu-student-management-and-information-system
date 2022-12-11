<?php

//gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='student' AND read_or_unread='unread' limit 8");
          $MsgCounter = mysqli_num_rows($RunMsg);


echo '

<!--/sidebar-menu-->
				<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="'.$site_url.'/panel/" class="brand-link">
      <img src="'.$site_url.'/panel/uploads/logos/'.$site_SmallLogo.'" alt="small_logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">'.$site_name.'</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="'.$site_url.'/panel/uploads/students_profiles/'.$user_image.'" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">'.$User_FullName.'</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
         
         
          
         
         
          <li class="nav-header">ACCADEMIC</li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/student/assignments.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Assignments
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Exam Grades
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="'.$site_url.'/panel/student/exams_results.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="'.$site_url.'/panel/student/general_examsresults.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>End Of Term</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="'.$site_url.'/panel/student/final_examsresults.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Final</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <li class="nav-header">LIBRARY</li>
          
          <li class="nav-item">
            <a href="'.$site_url.'/panel/student/library.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Online Library
              </p>
            </a>
          </li>
          
          


          <li class="nav-header">MY PAYMENTS</li>
          
          <li class="nav-item">
            <a href="'.$site_url.'/panel/student/pricing.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Submit Payment
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/student/p_history.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                History
                
                
              </p>
            </a>
          </li>

          <li class="nav-header">INFO.</li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/student/messages.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Messages
                <span class="badge badge-info right">'.$MsgCounter.'</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a target="blank" href="'.$site_url.'/news.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                News
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a target="blank" href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/student/profile.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
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