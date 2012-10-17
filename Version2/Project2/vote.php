<?php
	session_start();
	if(isset($_SESSION['userID'])){
		$userID = $_SESSION['userID'];
		
		include_once "connection.php";
		mysql_select_db("jowilson", $connection);

		$query = "SELECT * FROM Project2 WHERE user = '$userID'";
		$result = mysql_query($query);
		$sum = mysql_fetch_array($result);
				
		if(isset($_POST['toonID'])){
			$toon = $_POST['toonID'];
			
			if($toon == "Homer Wants You To Vote for Him"){
				$toon = 1;
			}
			else if($toon == "George Wants You To Vote for Him"){
				$toon = 2;
			}
			else if($toon == "Fred Wants You To Vote for Him"){
				$toon = 3;
			}
				
			$insert = "INSERT INTO Project2 (user, toonID) VALUES ('$userID', '$toon');";	
			
			print "$userID";
			print "$toon";
			print "$insert";
			
			mysql_query($insert);
		}
		mysql_close($connection);
	}

	header('Location: results.php');
?>