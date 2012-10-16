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
		if(isset($_SESSION['userID'])){
			$userID = $_SESSION['userID'];
		
			include_once "connection.php";
			mysql_select_db("jowilson", $connection);

			$query = "SELECT * FROM Project2 WHERE user = '$userID'";
			$result = mysql_query($query);
			$count = mysql_fetch_array($result);
									
			if($count == ""){
				?>
					<!-- Candidates -->
					<div data-role="page" id="candidates">

						<div data-role="content">	
							<div class="candidate">
								<h1>Meet the Candidates</h1>
								<div class="toonImage">
									<p>Here is who you can vote for:</p>
									<a href="#candidate1" data-role="button" data-inline='true'> Homer Simpson</a>
									<a href="#candidate2" data-role="button" data-inline='true'> George Jetsen</a>
									<a href="#candidate3" data-role="button" data-inline='true'> Fred Flinstone</a>
								</div>	
							</div>
						</div>
					</div>
					
					<!-- Toon 1 -->
					<div data-role="page" id="candidate1">

						
							<div data-role="content">	
							<div class="candidate">
								<h1>Homer Simpson</h1>
								<div class="toonImage">
									<img src="img/toon1.jpg" alt="candidate1" />
									<p>Homer has the resume that enables him to be a a great leader in society.(Joke)</p>
								</div>
								<form action = 'vote.php' method = 'post'>
									<input type = 'submit' name = 'toonID' value = 'Homer Wants You To Vote for Him'/></input>
								</form>
								<a href="candidates.php" data-role="button" data-inline='true'>Back to Candidates</a>
								
							</div>
						</div>
					</div>



					<!-- Toon 2 -->
					<div data-role="page" id="candidate2">

						
							<div data-role="content">	
							<div class="candidate">
								<h1>George Jetsen</h1>
								<div class="toonImage">
									<img src="img/toon2.jpg" alt="candidate1" />
									<p>Tomorrow's Future</p>
								</div>
								<form action = 'vote.php' method = 'post'>
									<input type = 'submit' name = 'toonID' value = 'George Wants You To Vote for Him'/></input>
								</form>
								<a href="candidates.php" data-role="button" data-inline='true'>Back to Candidates</a>
								
							</div>
						</div>
					</div>


					<!-- Toon 3 -->
					<div data-role="page" id="candidate3">

						
							<div data-role="content">	
							<div class="candidate">
								<h1>Fred Flinstone</h1>
								<div class="toonImage">
									<img src="img/toon3.jpg" alt="candidate1" />
									<p>Everyone knows that song, Flintstones. Meet the Flintstones!</p>
								</div>
								<form action = 'vote.php' method = 'post'>
									<input type = 'submit' name = 'toonID' value = 'Fred Wants You To Vote for Him'/></input>
								</form>
								<a href="candidates.php" data-role="button" data-inline='true'>Back to Candidates</a>
								
							</div>
						</div>
					</div>

				<?php
			}
			
			else{
				header('Location: results.php');	
			}
			mysql_close($connection);
		}
		
		else{
			header('Location: index.php');
		}
	?>
</body>
</html>