<!DOCTYPE html>
<html lang="en">
<!-- Test -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
	<div class="racing-stripes"></div>
	
	<!-- PHP connection & Queries -->
	<?php 
	$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_team11","my+sql=i494f23_team11","i494f23_team11");
		if (mysqli_connect_errno())
			{ die("Failed to connect to MySQL: " . mysqli_connect_error()); }
		else
			{}
	
	//This query will pull the relevant JSON objects for getting the title and wordIDs for each study set.
	$setTabsQuery = "";
	
	//Used to take wordIDs from JSON objects
	$setWordsQuery = "";
	
	?>
	
	<div class ="set-tabs"></div>
	<!-- Here set up the tabs for study sets. Tab names should be the set names, and the right most set should be a tab with a + or new on it.  -->
	
	<div class ="set-words"></div>
	<!-- Display each set's words(HPOSD). Have options to add a note about a word, or remove it from the list.-->
	
	<div class = "set-savecancel"></div>
	<!-- Have save and cancel buttons at the bottom -->
	
	
	<div class="buttons">
		<a class="button" href="project.php">Project</a>
		<a class="button" href="team.php">Team</a>
		<a class="button" href="video.php">Video</a>
		<a class="button" href="dictionary.php">Dictionary</a>
		<a class="button" href="studysets.php">Study Sets</a>
	</div>
	<script src="js/nav.js"></script>
</body>
</html>