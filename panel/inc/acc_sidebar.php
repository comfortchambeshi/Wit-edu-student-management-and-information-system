<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    

<?php

//gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='acc' AND read_or_unread='unread'  limit 10");
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
          <img src="'.$site_url.'/panel/uploads/acc_profiles/'.$user_image.'" class="img-circle elevation-2" alt="User Image">
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
            <a href="'.$site_url.'/panel/acc_messages.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Messages
                <span class="badge badge-info right">'.$MsgCounter.'</span>
              </p>
            </a>
          </li>
          
         
          
         
         
          
          
          
          
          
          
          
          
          
          
          
          
          
              
              
              
              
              
       
          
          
         
          <li class="nav-header">Payments</li>
          
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
          <li class="nav-item">
            <a href="'.$site_url.'/panel/acc_newpayments.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Pending
                <span class="badge badge-info right">'.$PaymentsCounter.'</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/acc_approvedpayments.php?status=rejected" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Rejected
                <span class="badge badge-danger right">'.$PaymentsCounterrejected.'</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            
            <a href="'.$site_url.'/panel/acc_approvedpayments.php?status=approved" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Approved
                <span class="badge badge-primary right">'.$PaymentsCounterapproved.'</span>
                
              </p>
            </a>
          </li>
          
          

          <li class="nav-header"> MY PROFILE</li>
          
         
          <li class="nav-item">
            
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                EDIT
                
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