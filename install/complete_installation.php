<?php
################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 #
## --------------------------------------------------------------------------- #
##  ApPHP EasyInstaller Free version                                           #
##  Developed by:  ApPHP <info@apphp.com>                                      #
##  License:       GNU LGPL v.3                                                #
##  Site:          https://www.apphp.com/php-easyinstaller/                    #
##  Copyright:     ApPHP EasyInstaller (c) 2009-2013. All rights reserved.     #
##                                                                             #
################################################################################

	session_start();
	
	require_once('include/shared.inc.php');    
    require_once('include/settings.inc.php');
	require_once('include/database.class.php'); 
    require_once('include/functions.inc.php');	
	require_once('include/languages.inc.php');	
    
	$passed_step = isset($_SESSION['passed_step']) ? (int)$_SESSION['passed_step'] : 0;

	// handle previous steps
	// -------------------------------------------------
	if($passed_step >= 3){
		// OK
	}else{
		header('location: start.php');
		exit;				
	}
	
	if(EI_MODE == 'debug') error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    
	$completed = false;
	$error_mg  = array();
		
	if($passed_step == 5){
		
		$database_host		 = isset($_SESSION['database_host']) ? prepare_input($_SESSION['database_host']) : '';
		$database_name		 = isset($_SESSION['database_name']) ? prepare_input($_SESSION['database_name']) : '';
		$database_username	 = isset($_SESSION['database_username']) ? prepare_input($_SESSION['database_username']) : '';
		$database_password	 = isset($_SESSION['database_password']) ? prepare_input($_SESSION['database_password']) : '';
		$database_prefix     = isset($_SESSION['database_prefix']) ? stripslashes($_SESSION['database_prefix']) : '';
		$install_type		 = isset($_SESSION['install_type']) ? $_SESSION['install_type'] : 'create';
		
		//For two
		$database_host2		 = isset($_SESSION['database_host']) ? prepare_input($_SESSION['database_host']) : '';
		$database_name2		 = isset($_SESSION['database_name']) ? prepare_input($_SESSION['database_name']) : '';
		$database_username2	 = isset($_SESSION['database_username']) ? prepare_input($_SESSION['database_username']) : '';
		$database_password2	 = isset($_SESSION['database_password']) ? prepare_input($_SESSION['database_password']) : '';
		$database_prefix2     = isset($_SESSION['database_prefix']) ? stripslashes($_SESSION['database_prefix']) : '';
		$install_type2		 = isset($_SESSION['install_type']) ? $_SESSION['install_type'] : 'create';
		// admin
		
		$admin_username 	 = isset($_SESSION['admin_username']) ? stripslashes($_SESSION['admin_username']) : '';
		$admin_password 	 = isset($_SESSION['admin_password']) ? stripslashes($_SESSION['admin_password']) : '';
		$admin_email 		 = isset($_SESSION['admin_email']) ? stripslashes($_SESSION['admin_email']) : '';
		$password_encryption = isset($_SESSION['password_encryption']) ? $_SESSION['password_encryption'] : EI_PASSWORD_ENCRYPTION_TYPE;
		//admin2
		$admin_username2 	 = isset($_SESSION['admin_username']) ? stripslashes($_SESSION['admin_username']) : '';
		$admin_password2	 = isset($_SESSION['admin_password']) ? stripslashes($_SESSION['admin_password']) : '';
		$admin_email2 		 = isset($_SESSION['admin_email']) ? stripslashes($_SESSION['admin_email']) : '';
		$password_encryption2 = isset($_SESSION['password_encryption']) ? $_SESSION['password_encryption'] : EI_PASSWORD_ENCRYPTION_TYPE;
		
		if($install_type == 'update'){
			$sql_dump_file = EI_SQL_DUMP_FILE_UPDATE;
		}else if($install_type == 'un-install'){
			$sql_dump_file = EI_SQL_DUMP_FILE_UN_INSTALL;
		}else{
			$sql_dump_file = EI_SQL_DUMP_FILE_CREATE;
		}		
						
		if(empty($database_host)) $error_mg[] = lang_key('alert_db_host_empty');	
		if(empty($database_name)) $error_mg[] = lang_key('alert_db_name_empty'); 
		if(empty($database_username)) $error_mg[] = lang_key('alert_db_username_empty'); 	
		//if (empty($database_password)) $error_mg[] = lang_key('alert_db_password_empty');

		if(empty($error_mg)){		
			if(EI_MODE == 'demo'){
				if($database_host == 'localhost' && $database_name == 'db_name' && $database_username == 'test' && $database_password == 'test'){
					$completed = true; 
				}else{
					$error_mg[] = lang_key('alert_wrong_testing_parameters');
				}
			}else{				
				$db = Database::GetInstance($database_host, $database_name, $database_username, $database_password, EI_DATABASE_TYPE, false, true);
				if(EI_DATABASE_CREATE && ($install_type == 'create') && !$db->Create()){
					$error_mg[] = $db->Error();					
				}else if($db->Open()){
					if(EI_CHECK_DB_MINIMUM_VERSION && (version_compare($db->GetVersion(), EI_DB_MINIMUM_VERSION, '<'))){
						$alert_min_version_db = lang_key('alert_min_version_db');
						$alert_min_version_db = str_replace('_DB_VERSION_', '<b>'.EI_DB_MINIMUM_VERSION.'</b>', $alert_min_version_db);
						$alert_min_version_db = str_replace('_DB_CURR_VERSION_', '<b>'.$db->GetVersion().'</b>', $alert_min_version_db);
						$alert_min_version_db = str_replace('_DB_', '<b>'.$db->GetDbDriver().'</b>', $alert_min_version_db);
						$error_mg[] = $alert_min_version_db;
					}else{
						// read sql dump file
						$sql_dump = file_get_contents($sql_dump_file);
						if($sql_dump != ''){
							if(false == ($db_error = apphp_db_install($sql_dump_file))){
								if(EI_MODE != 'debug') $error_mg[] = lang_key('error_sql_executing');								
							}else{
								// write additional operations here, like setting up system preferences etc.
								// ...
								$completed = true;
								
								session_destroy();
								
								// now try to create file and write information
								$config_file = file_get_contents(EI_CONFIG_FILE_TEMPLATE);
								$config_file = str_replace('<DB_HOST>', $database_host, $config_file);
								$config_file = str_replace('<DB_NAME>', $database_name, $config_file);
								$config_file = str_replace('<DB_USER>', $database_username, $config_file);
								$config_file = str_replace('<DB_PASSWORD>', $database_password, $config_file);
								$config_file = str_replace('<DB_PREFIX>', $database_prefix, $config_file);
								
								//for 2
									// now try to create file and write information
								$config_file2 = file_get_contents(EI_CONFIG_FILE_TEMPLATE2);
								$config_file2 = str_replace('<DB_HOST>', $database_host2, $config_file2);
								$config_file2 = str_replace('<DB_NAME>', $database_name2, $config_file2);
								$config_file2 = str_replace('<DB_USER>', $database_username2, $config_file2);
								$config_file2 = str_replace('<DB_PASSWORD>', $database_password2, $config_file2);
								$config_file2 = str_replace('<DB_PREFIX>', $database_prefix2, $config_file2);
								
								if(EI_USE_ADMIN_ACCOUNT){
									$config_file = str_replace('<ENCRYPTION>', (EI_USE_PASSWORD_ENCRYPTION) ? 'true' : 'false', $config_file);			
									$config_file = str_replace('<ENCRYPTION_TYPE>', $password_encryption, $config_file);			
									$config_file = str_replace('<ENCRYPT_KEY>', EI_PASSWORD_ENCRYPTION_KEY, $config_file);
									//for two
									$config_file2 = str_replace('<ENCRYPTION>', (EI_USE_PASSWORD_ENCRYPTION2) ? 'true' : 'false', $config_file);			
									$config_file2 = str_replace('<ENCRYPTION_TYPE>', $password_encryption2, $config_file);			
									$config_file2 = str_replace('<ENCRYPT_KEY>', EI_PASSWORD_ENCRYPTION_KEY2, $config_file);
								}else{
									$config_file = str_replace('<ENCRYPTION>', '', $config_file);			
									$config_file = str_replace('<ENCRYPTION_TYPE>', '', $config_file);			
									$config_file = str_replace('<ENCRYPT_KEY>', '', $config_file);	
									//For two
									$config_file2 = str_replace('<ENCRYPTION>', '', $config_file2);			
									$config_file2 = str_replace('<ENCRYPTION_TYPE>', '', $config_file2);			
									$config_file2 = str_replace('<ENCRYPT_KEY>', '', $config_file2);	
								}
								
								
								$f = fopen(EI_CONFIG_FILE_PATH, 'w+');
								$e = fopen(EI_CONFIG_FILE_PATH2, 'w+');
							
								if(!fwrite($f, $config_file) > 0 || !fwrite($e, $config_file2) > 0){
								    
									$error_mg[] = str_replace('_CONFIG_FILE_PATH_', EI_CONFIG_FILE_PATH, lang_key('error_can_not_open_config_file')); 
								}
								fclose($f);
								if($install_type == 'un-install') unlink(EI_CONFIG_FILE_PATH);
								///@chmod('../'.EI_CONFIG_FILE_DIRECTORY, 0644);									
							}							
						}else{
							$error_mg[] = str_replace('_SQL_DUMP_FILE_', $sql_dump_file, lang_key('error_can_not_read_file')); 
						}						
					}
				}else{
					if(EI_MODE == 'debug'){
						$error_mg[] = str_replace('_ERROR_', '<br />Error: '.$db->Error(), lang_key('error_check_db_connection')); 
					}else{
						$error_mg[] = str_replace('_ERROR_', '', lang_key('error_check_db_connection')); 
					}						
				}
			}			
		}
	}else{
		$error_mg[] = lang_key('alert_wrong_parameter_passed');
	}
        
?>	

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="ApPHP Company - Advanced Power of PHP">
    <meta name="generator" content="ApPHP EasyInstaller">
	<title><?php echo lang_key('installation_guide'); ?> | <?php echo lang_key('complete_installation'); ?></title>

	<link href="images/apphp.ico" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="templates/<?php echo EI_TEMPLATE; ?>/css/styles.css" />
	<?php
		if($curr_lang_direction == 'rtl'){
			echo '<link rel="stylesheet" type="text/css" href="templates/'.EI_TEMPLATE.'/css/rtl.css" />'."\n";
		}
	?>

	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
</head>
<body>
<div id="main">    
	<h1><?php echo lang_key('new_installation_of'); ?> <?php echo EI_APPLICATION_NAME.' '.EI_APPLICATION_VERSION;?>!</h1>
	<h2 class="sub-title"><?php echo lang_key('sub_title_message'); ?></h2>
	
	<div id="content">
		<?php
			draw_side_navigation(6);		
		?>

		<div class="central-part">
			<h2><?php echo lang_key('step_6_of'); ?>
			<?php if(!$completed){ ?>
				- <?php echo lang_key('database_import_error'); ?>
			<?php }else{ ?>
				- <?php echo lang_key('completed'); ?>
				<!--<h3><?php //echo lang_key('updating_completed'); ?></h3>			-->
			<?php } ?>
			</h2>

			<?php
				if(!$completed){
					echo '<div class="alert alert-error">';
					foreach($error_mg as $msg){
						echo $msg.'<br>';
					}
					echo '</div>';
				}
			?>
		
			<table width="99%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<?php if(!$completed){ ?>
				<tr><td nowrap height="25px">&nbsp;</td></tr>
				<tr>
					<td>	
						<a href="ready_to_install.php" class="form_button"><?php echo lang_key('back'); ?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" class="form_button" onclick="javascript:location.reload();" value="<?php echo lang_key('complete'); ?>" />
					</td>
				</tr>							
			<?php }else{ ?>
				<tr><td>&nbsp;</td></tr>						
				<?php if($install_type == 'update'){ ?>
					<tr><td><h4><?php echo lang_key('updating_completed'); ?></h4></td></tr>
					<tr>
						<td>
							<div class="alert alert-success"><?php echo str_replace('_CONFIG_FILE_', EI_CONFIG_FILE_PATH, lang_key('file_successfully_rewritten')); ?></div>
							<div class="alert alert-warning"><?php echo lang_key('alert_remove_files'); ?></div>
							<?php echo (EI_POST_INSTALLATION_TEXT != '') ? '<div class="alert alert-info">'.EI_POST_INSTALLATION_TEXT.'</div>' : ''; ?>
							<br /><br />
							
						</td>
					</tr>									
				<?php }else if($install_type == 'un-install'){ ?>
					
					<tr>
						<td>
							<div class="alert alert-success"><?php echo str_replace('_CONFIG_FILE_', EI_CONFIG_FILE_PATH, lang_key('file_successfully_deleted')); ?></div>
							<div class="alert alert-warning"><?php echo lang_key('alert_remove_files'); ?></div>
							<br /><br />
							<?php if(EI_APPLICATION_START_FILE != ''){ ?><a href="<?php echo '../'.EI_APPLICATION_START_FILE;?>"><?php echo lang_key('proceed_to_login_page'); ?></a><?php } ?>
						</td>
					</tr>															
				<?php }else{ ?>									
					<tr><td><h4><?php echo lang_key('installation_completed'); ?></h4></td></tr>
					<tr>
						<td>
							<div class="alert alert-success"><?php echo str_replace('_CONFIG_FILE_', EI_CONFIG_FILE_PATH, lang_key('file_successfully_created')); ?></div>
							
							<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>My User Login Page - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        	<link rel="stylesheet" href="https://mamoce.edu.zm/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/footer-copyright_bar.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="httpps://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/styles.css">
    <link rel="stylesheet" href="https://mamoce.edu.zm/assets/css/Contact-Form-Clean.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
/* BASIC */

html {
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="login-clean" style="background-image: url('architect-at-the-construction.jpg');">
    <div class="row">
        
        <div class="col-md-6">
             
            <form method="post" action="include/insert.php" style="max-width: 100%;width: 80%;">
                <h2 class="sr-only">Login Form</h2>
               
                <div class="form-group"><input required="" type="text" class="form-control" name="username" placeholder="Admin Username" /></div>
                <div class="form-group"><input required="" type="text" class="form-control" name="full_name" placeholder="Admin Full Name" /></div>
                <p style="margin-top:-5px;margin-bottom:3px;">Gender</p>
                <div class="form-group"><select class='form-control' name="gender"><option value='male'> Male</option> <option value='female'> Female</option></select</div>
                
                <div class="form-group"><input required="" type="text" class="form-control" name="email" placeholder="Admin Email" /></div>
                
                <div class="form-group"><input required="" type="password" class="form-control" name="password" placeholder="Admin Password" /></div>
                <div class="form-group"><button name="proceed" class="btn btn-block" type="submit" style="background-color: rgb(12,35,64);color: #ffd700;">Create Account</button></div>
                
                <tr><td colspan="2" nowrap height="50px">&nbsp;</td></tr>
			<tr>
				<td colspan="2">
					<a href="database_settings.php" class="form_button" /><?php echo lang_key('back'); ?></a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					
				</td>
			</tr>       
                </form>
        </div>
    </div>
</div>

<script type="text/javascript">

</script>
</body>
</html>

							
							


						</td>
					</tr>															
				<?php } ?>
			<?php } ?>
			</tbody>
			</table>
			<br>

			
			
		</div>
		<div class="clear"></div>
	</div>
	
	<?php include_once('include/footer.inc.php'); ?>        

</div>
</body>
</html>

<?php
	copy('../classes/db.php', '../panel/classes/db.php');
    copy('../inc/dbconnect.inc.php', '../panel/inc/dbconnect.inc.php');
?>