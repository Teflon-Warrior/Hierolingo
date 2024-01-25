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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
		<h1>Dictionary</h1>
	</header>
	<div class="racing-stripes"></div>
	
	<!--PHP Connectio & Queries -->
	<?php 
	$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_team11","my+sql=i494f23_team11","i494f23_team11");
		if (mysqli_connect_errno())
			{ die("Failed to connect to MySQL: " . mysqli_connect_error()); }
		else
			{}
	
	//This query will pull wordIDs for lesson access levels for the user
	//As of development this will be hard coded for one user; once login integration is implemented this will be changed
	$setWordsQuery = "SELECT * FROM Dictionary WHERE User.userlevel <= Dictionary.access AND User.username = 'andy' FULL JOIN User";
	
	?>
	
	<div class="buttons">
		<a class="button" href="project.php">Project</a>
		<a class="button" href="team.php">Team</a>
		<a class="button" href="video.php">Video</a>
		<a class="button" href="dictionary.php">Dictionary</a>
		<a class="button" href="studysets.php">Study Sets</a>
	</div>
	<script src="js/nav.js"></script>
	
	<!-- Here set up the tabs for lessons. All, 1, 2, 3, 4. If a lesson is blank, display a message along the lines of "No words unlocked yet... Unlock more in Lessons!" with a link to lessons. -->
	<script type="text/javascript" src="js/dictionaryDisplayLesson.js"></script>
	<div class="tabs">
		<button class="lessontab" onclick="displayLesson(event, 'All');">All</button>
		<button class="lessontab" onclick="displayLesson(event, '1');">Lesson 1</button>
		<button class="lessontab" onclick="displayLesson(event, '2');">Lesson 2</button>
		<button class="lessontab" onclick="displayLesson(event, '3');">Lesson 3</button>
		<button class="lessontab" onclick="displayLesson(event, '4');">Lesson 4</button>
	</div>

	<!-- Tab content -->
	<div id="All" class="lessonContent">
		<h3>All Words</h3>
	</div>

	<div id="1" class="lessonContent">
		<h3>Lesson 1</h3>
	</div>
	
	<div id="2" class="lessonContent">
		<h3>Lesson 2</h3>
	</div>
	
	<div id="3" class="lessonContent">
		<h3>Lesson 3</h3>
	</div>
	
	<div id="4" class="lessonContent">
		<h3>Lesson 4</h3>
	</div>
	
	<div class ="dictionary-words"></div>
	<!-- For all, display each lesson's words(HPOSD), but broken up by lesson through headers. On a specific tab, display a header, followed by the words
		 The button to add a specific word to a list would go after HPOSD-->
</body>
</html>