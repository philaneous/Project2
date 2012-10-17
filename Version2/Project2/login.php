<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Unknown Void | Project 2</title> 
	
<meta name="viewport" content="width=device-width, initial-scale=1"> 
        
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0-alpha.1/jquery.mobile-1.2.0-alpha.1.min.css" />
 
     
	 
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.2.0-alpha.1/jquery.mobile-1.2.0-alpha.1.min.js"></script>
    
</head>
<body>
	<?php	
		if(isset($_SESSION['userID']) || isset($_POST['userID'])){
			if(isset($_POST['userID'])){
				$userID = $_POST['userID'];
			
				if($userID > 1000 && $userID < 1050){					
					$_SESSION['userID'] = $userID;
				}
			
				else{
					print "
						Invalid ID input. <br />
						<a href = 'index.php' >Retry</a>
					";
				}
			}
			
			if(isset($_SESSION['userID'])){
				$userID = $_SESSION['userID'];
		
				include_once "connection.php";
				mysql_select_db("jowilson", $connection);

				$query = "SELECT * FROM Project2 WHERE user = '$userID'";
				$result = mysql_query($query);
				$count = mysql_fetch_array($result);
				mysql_close($connection);
				
				if($count == ""){
					
					?>
						
						<div data-role="page" id="candidates">

							<div data-role="header">
								<h5>Toon Town Election 2012</h5>
							</div>

						
							<div data-role="content">	
								<div class="toonSquad">
									<div class="toonSquad">
										<p>View your candidates to see the upcoming toon election.</p>
									</div>
									<a href = 'candidates.php' rel='external' data-role="button" data-inline='true'>Vote now!</a>
								</div>
							</div><!-- /content -->
						</div><!-- /page -->
						<div data-role="footer">
							<h1>Unknown Void 2012</h1>
						</div>
					<?php
				}
			
				else{
					header('Location: results.php');
				
				}
			}
		}
	?>
</body>
</html>