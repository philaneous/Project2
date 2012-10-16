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
									
				if($count == ""){
					//
					header('Location: candidates.php');
				}
			
				else{
					$result = mysql_query($query);
					while($data = mysql_fetch_array($result)){
						$user_id = $data['user'];
						$toon = $data['toonID'];
						
						print "
							You, user #$user_id, voted for candidate #$toon. <br />
						";
					}
					
					$query = "SELECT toonID FROM Project2";
					$result = mysql_query($query);
					
					//Vote Counter
					$toon_1 = 0;
					$toon_2 = 0;
					$toon_3 = 0;
							
					while($data = mysql_fetch_array($result)){
						$toons = $data['toonID'];
						
						if($toons == "1"){
							$toon_1++;
						}
						else if($toons == "2"){
							$toon_2++;
						}
						else if($toons == "3"){
							$toon_3++;
						}
					}
					
					//Percent Calculator
					$total = $toon_1 + $toon_2 + $toon_3;
					$percent_1 = substr(($toon_1/$total)*100, 0, 5);
					$percent_2 = substr(($toon_2/$total)*100, 0, 5);
					$percent_3 = substr(($toon_3/$total)*100, 0, 5);
					
					$round_1 = round($percent_1)*5;
					$round_2 = round($percent_2)*5;
					
					$round_3 = 500 - ($round_1 + $round_2);
					
					if($toon == 1){
						$nominee = "Homer Simpson";
						$info = "Homer is the craziest dad and coolest person to go on adventures.";
					}
					
					else if($toon == 2){
						$nominee = "George Jetsen";
						$info = "He said to be tomorrows future.";
					}
					
					else if($toon == 3){
						$nominee = "Fred Flinstone";
						$info = "One of the strongest and dynamic workers of his town.";
					}
					
					?>
						<!-- Results -->
						<div data-role="page" id="results">

							
							<div data-role="content">	
								<div class="candidate">
									<h2>You Voted For...</h2>
									<h1><?php echo $nominee; ?></h1>
									<div class="ToonImage">
										<img src="img/toon<?php echo $toon; ?>.jpg" alt="toon<?php echo $toon; ?>" />
										<p><?php echo $info; ?></p>
									</div>
									
									<p>
										<b>Vote Results</b><br /><br />
										Homer Simpson <?php print "$percent_1% ($toon_1)"; ?><br />
										George Jetsen <?php print "$percent_2% ($toon_2)"; ?><br />
										Fred Flinstone <?php print "$percent_3% ($toon_3)"; ?>
									</p>
									
								</div>
							</div><!-- /content -->
						</div><!-- /page -->						
					<?php
				}
				mysql_close($connection);
			}
		}
		
		else{
			header('Location: index.php');
		}
	?>
</body>
</html>