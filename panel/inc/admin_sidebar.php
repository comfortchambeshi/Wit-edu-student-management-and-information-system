<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    

<?php

//gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='admin' AND read_or_unread='unread'  limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);

          //getting pending pending payments

          $QueryPaymentspending = mysqli_query($conn, "SELECT * FROM payments WHERE status='pending'");
          $PaymentsCounter = mysqli_num_rows($QueryPaymentspending);



           //getting approved payments

          $QueryPaymentsApproved = mysqli_query($conn, "SELECT * FROM payments WHERE status='approved'");
          $PaymentsCounterapproved = mysqli_num_rows($QueryPaymentsApproved);

            //getting rejected payments

          $QueryPaymentsRejected = mysqli_query($conn, "SELECT * FROM payments WHERE status='rejected'");
          $PaymentsCounterrejected = mysqli_num_rows($QueryPaymentsRejected);
          
           //getting  pendig forms
          $Querry_pendingForms = mysqli_query($conn, "SELECT * FROM admission WHERE status='pending'");
          $Total_pendingForms = mysqli_num_rows($Querry_pendingForms);
          //Rejected admission forms
          $Querry_rejectedAdmissions = mysqli_query($conn, "SELECT * FROM admission WHERE status='rejected'");
          $Total_rejectedAdmissions = mysqli_num_rows($Querry_rejectedAdmissions);
          //Approved admission forms
          $Querry_ApprovedAdmissions = mysqli_query($conn, "SELECT * FROM admission WHERE status='approved'");
          $Total_ApprovedAdmissions = mysqli_num_rows($Querry_ApprovedAdmissions);


echo '
        
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="'.$site_url.'/panel/index.php" class="brand-link">
      <img src="'.$site_url.'/panel/uploads/logos/'.$site_SmallLogo.'" alt="small_logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">'.$site_name.'</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">'.$user_name.'</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li style="margin-left: 8px;" class="nav-header">INFO.</li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/admin_messages.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Messages
                <span class="badge badge-info right">'.$MsgCounter.'</span>
              </p>
            </a>
          </li>
          <li  class="nav-header">USERS</li>
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/students_list.php" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/teachers_list.php" class="nav-link">
              <i class="nav-icon 	fas fa-chalkboard-teacher"></i>
              <p>
                Teachers
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/accountants_list.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accountants
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/librarians_list.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Librarians
                
              </p>
            </a>
          </li>
         
          
         
         
          <li class="nav-header">MANAGEMENT</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Images
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="'.$site_url.'/panel/gallery.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="'.$site_url.'/panel/homepage_slider.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home-Page Slider</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Payments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="'.$site_url.'/panel/acc_p_history.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payments History</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="'.$site_url.'/panel/accountants/balances.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balances</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="'.$site_url.'/panel/invoices.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoices</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
          
          
          
          
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                School
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="'.$site_url.'/panel/admin/hostels.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hostels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="'.$site_url.'/panel/admin/classes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classes</p>
                </a>
              </li>
              
              
              
              
              
              
            
            <ul class="nav nav-treeview">
            
             
              
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logos</p>
                </a>
              </li>
            </ul>
          </li>
              
              
              
              
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/course_list.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Programmes
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/events_list.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Events
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="'.$site_url.'/panel/news.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Site News
                
              </p>
            </a>
          </li>
          
         
          <li class="nav-header">ADMISSIONS</li>
          
          <li class="nav-item">
            <a href="'.$site_url.'/panel/pending_admissions.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Pending
                <span class="badge badge-info right">'.$Total_pendingForms.'</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/rejected_admissions.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Rejected
                <span class="badge badge-danger right">'.$Total_rejectedAdmissions.'</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/approved_admissions.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Approved
                <span class="badge badge-primary right">'.$Total_ApprovedAdmissions.'</span>
                
              </p>
            </a>
          </li>

          <li class="nav-header">SITE SETINGS</li>
          
         
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/settings/main.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                SETTINGS
                
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