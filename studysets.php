<!DOCTYPE html>
<html lang="en">
<!-- Test -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/studysets.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />
</head>
<body>
	
	<!-- NAVIGATION -->
	<nav id="mySidenav" class="sidenav">
		<ul>
			<li><a class="closebtn">&times;</a></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="project.php">Project</a></li>
			<li><a href="team.php">Team</a></li>
			<li><a href="video.php">Video</a></li>
			<li><a href="dictionary.php">Dictionary</a></li>
			<li><a href="studysets.php">Study Sets</a></li>
		</ul>
	</nav>
	
	<!-- MAIN CONTENT -->
	<header>
		<div class="openbtn">
			<span class="material-symbols-outlined menu-button">menu</span>
			<span class="menu-text">menu</span>
		</div>
		<div class="all-over-bkg"></div>
		<h1>Study Sets</h1>
	</header>
	
	<!-- PHP connection & Queries -->
	<?php 
	$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_jefhochg","my+sql=i494f23_jefhochg","i494f23_jefhochg");
		if (mysqli_connect_errno())
			{ die("Failed to connect to MySQL: " . mysqli_connect_error()); }
		else
			{}
	
	//This query will pull the relevant JSON objects for getting the title and wordIDs for each study set.
	//Needs to be updated once sessions are set up.
	$setTabsQuery = "SELECT setName FROM vocablist WHERE userID = 2;";
	
	//Used to take wordIDs from JSON objects
	//CopyPaste Query, Inbetween the empty single quotes is where tab names will go within loops and whatnot
	//Needs to be updated once sessions are set up.
	$setWordsQuery = "SELECT jsonLocation FROM vocablist WHERE setName = '' and userID = '2';";
	

	//Result section
	$setTabsResult = mysqli_fetch_array(mysqli_query($con, $setTabsQuery), MYSQLI_NUM);
	//Defined here, used elsewhere
	$setWordsResult = "";
	//Number of tabs for forloop
	$numTabs = count($setTabsResult);
	
	function displayQueryResults($wordsIn){	
		$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_jefhochg","my+sql=i494f23_jefhochg","i494f23_jefhochg");
		if (mysqli_connect_errno())
			{ die("Failed to connect to MySQL: " . mysqli_connect_error()); }
		else
			{}
		if (count($wordsIn) > 0) {
				echo "<table border = '1'>
				<tr>
					<th>Heiroglyph</th>
					<th>Definition </th>
					<th>Part of Speech</th>
				</tr>";
				for ($i = 0; $i < count($wordsIn); $i++ ){
					$printQuery = "SELECT * FROM dictionary WHERE id = ".$wordsIn[$i].";";
					$results = mysqli_fetch_array(mysqli_query($con, $printQuery), MYSQLI_NUM);
					echo "
					<tr>
						<td><img src = ".$results[3]." width='200' height='200' /> </td> 
						<td>".$results[2]."</td> 					
						<td>".$results[1]."</td>
					</tr>";
				}		
			
				echo "</table>";
			}
	}
	?>
	
	<script src="js/nav.js"></script>
	
	
	<!-- This goes through and displays tabs based on how many are asssociated with the user -->
	<script type="text/javascript" src="js/dictionaryDisplayLesson.js"></script>
	<div class="tabs">
	<?php
		//Set up tab headers
		for ($i = 0; $i < count($setTabsResult); $i++){
			echo "<button class='lessontab' onclick='displayLesson(event, \"".$setTabsResult[$i]."\");'>".$setTabsResult[$i]."</button>\n";
		}
		//Add header
		echo "<button class='lessontab' onclick='displayLesson(event, \"Add\");'>Add New Set</button>";
	?>
	</div>
	
	<!-- This will set the tabs to display each word within a user list. -->
	<?php 
	for ($i = 0; $i < count($setTabsResult); $i++){
		echo "<div id = '".$setTabsResult[$i]."' class = 'lessonContent'>";
		
		//Fix once sessions are set up
		$setWordsQuery = "SELECT jsonLocation FROM vocablist WHERE setName = '".$setTabsResult[$i]."' and userID = 2;";
		$setWordsResult = mysqli_fetch_array(mysqli_query($con, $setWordsQuery), MYSQLI_NUM);
		$words = file_get_contents($setWordsResult[0]);
		$words = json_decode($words);
		displayQueryResults($words);
		echo "</div>";
	}
	
	echo "<div id = 'Add' class = 'lessonContent'>";
	echo "<p>In progress</p>";
	echo "</div>";
	?>
	
	
</body>
</html>