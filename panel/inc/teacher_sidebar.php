
<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<?php
$site_SmallLogo = mysqli_real_escape_string($conn, $row_info['small_logo']);
//gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='teacher' AND read_or_unread='unread' ");
          $MsgCounter = mysqli_num_rows($RunMsg);

          //Getting examiners
          $sqlExaminers = mysqli_query($conn,  "SELECT * FROM examiners WHERE teacher_id='$user_id'");
          if (mysqli_num_rows($sqlExaminers) > 0) {
          	$exam_panel = '  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Exam Grades
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="slider.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>End Of Term</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Final</p>
                </a>
              </li>
            </ul>
          </li>';
          }
          else{
          	$exam_panel = '
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
                <a href="slider.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CA</p>
                </a>
              </li>
            
            </ul>
          </li>

          	';
          }


echo '

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
          <img src="'.$site_url.'/panel/uploads/teachers_profiles/'.$user_image.'" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">'.$user_name.'</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
         
         
          
         
         
          <li class="nav-header">ACCADEMIC</li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/teacher/assignments.php" class="nav-link">
              
              <i class="fas fa-school"></i>
              <p>
                Assignments
                
              </p>
            </a>
          </li>
         
         
         
         
          
          <li class="nav-item">
            <a href="'.$site_url.'/panel/examiner/exams.php" class="nav-link">
              <i class="fa fa-book" aria-hidden="true"></i>
              <p>
                Grades
              </p>
            </a>
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
          
          


         

          <li class="nav-header">INFO.</li>
          <li class="nav-item">
            <a href='.$site_url.'/panel/teacher_messages.php class="nav-link">
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