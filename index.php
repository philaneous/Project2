<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Unknown Void | Project 2</title> 
	
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
        
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0-alpha.1/jquery.mobile-1.2.0-alpha.1.min.css" />
 
   	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.2.0-alpha.1/jquery.mobile-1.2.0-alpha.1.min.js"></script>
	
    
</head>
<body>
	<?php	
		if(isset($_SESSION['userID']) || isset($_POST['userID'])){
			header('Location: login.php');
		}
		
		else{
			?>
				<!-- Login -->
				<div data-role="page" id="login">

				

				<div data-role="content">
					<div data-role="fieldcontain">
						<center>
							<form action = 'login.php' method = 'post' >
								<input type = 'text' name = 'userID' placeholder = "User ID"/>
								<input type = 'submit' value = 'Register'>
							</form>
						</center>
					</div>
				</div><!-- /content -->
			<?php
		}
	?>
</body>
</html>