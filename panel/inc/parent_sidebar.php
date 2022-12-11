<?php

//gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='parent' ");
          $MsgCounter = mysqli_num_rows($RunMsg);

        


echo '

<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
										
										
										 <li id="menu-academico" ><a href="parent_messages.php"><i class="fa fa-envelope nav_icon"></i><span>Messages ('.$MsgCounter.')</span><div class="clearfix"></div></a></li>


                                           <li id="menu-academico" ><a href="parent_exams_results.php"><i class="fa fa-exclamation"></i><span>Results </span><div class="clearfix"></div></a></li>


								
									
									 

									
									  
										<div class="clearfix"></div></a></li>
									  <li id="menu-academico" ><a href="payments.php"><i class="fa fa-cogs" aria-hidden="true"></i><span> Payments</span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   
											
										  </ul>
										</li>
									 
									
							        
									
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
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

';



?>