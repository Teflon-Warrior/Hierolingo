<!DOCTYPE html>
<html lang="en">
<!-- Test -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dictionary</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/dictionary.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />
</head>
<body>
	
	<!-- NAVIGATION -->
	<nav id="mySidenav" class="sidenav">
		<ul>
			<li><a class="closebtn">&times;</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="lesson.php">Lessons</a></li>			
			<li><a href="dictionary.php">Dictionary</a></li>
			<li><a href="studysets.php">Study Sets</a></li>
			<li><a href="leaderboard.php">Leaderboard</a></li>
			<li><a href="logout.php">Log Out</a></li>			
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

	<div class="navbar">
		<ul>
			<li><a href="https://cgi.luddy.indiana.edu/~team11/team-11/profile.php">Profile</a></li>
			<li><a href="https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php">Lessons</a></li>
			<li><a href="https://cgi.luddy.indiana.edu/~team11/team-11/dictionary.php">Dictionary</a></li>
			<li><a href="https://cgi.luddy.indiana.edu/~team11/team-11/studysets.php">Study Sets</a></li>
			<li><a href="https://cgi.luddy.indiana.edu/~team11/team-11/logout.php">Log Out</a></li>
		</ul>

	</div>
	
	<!--PHP Connection & Queries -->
	<?php 
	require 'config.php';
	session_start();
	$con = $db_connection;
	
	//This query will pull the given users access level for use in a later query.
	//Currently hardcoded to test user "andy". Once login API is developed, change this to login token and such.
	$userAccessLevelQuery = "SELECT userlevel FROM User WHERE google_id = ".$_SESSION['login_id'].";";
	//These queries will pull the vocabulary relevant to the specified level
	$lesson1WordsQuery = "SELECT * FROM dictionary where dictionary.access = 1;";
	$lesson2WordsQuery = "SELECT * FROM dictionary where dictionary.access = 2;";
	$lesson3WordsQuery = "SELECT * FROM dictionary where dictionary.access = 3;";
	$lesson4WordsQuery = "SELECT * FROM dictionary where dictionary.access = 4;";
	
	//Query Results
	//This process makes $userAccessLevelQueryResult an integer for use in forloops and if statements
	$userAccessLevelQueryResult = mysqli_query($con, $userAccessLevelQuery);
	$userAccessLevelQueryResult = mysqli_fetch_array($userAccessLevelQueryResult, MYSQLI_NUM);
	$userAccessLevelQueryResult = $userAccessLevelQueryResult[0];
	$userAccessLevelQueryResult = intval($userAccessLevelQueryResult);
	
	$lesson1WordsQueryResult = mysqli_query($con, $lesson1WordsQuery);
	$lesson2WordsQueryResult = mysqli_query($con, $lesson2WordsQuery);
	$lesson3WordsQueryResult = mysqli_query($con, $lesson3WordsQuery);
	$lesson4WordsQueryResult = mysqli_query($con, $lesson4WordsQuery);
	
	
	
	// Function for displaying query results easy
	// Parameter $queryResultIn takes a query result 
	function displayQueryResults($queryResultIn, $tabNames){	
		if ($queryResultIn->num_rows > 0) {
				mysqli_data_seek($queryResultIn, 0);
				echo "<table border = '1'>
				<tr>
					<th>Heiroglyph</th>
					<th>Definition </th>
					<th>Part of Speech</th>
					<th>Add to Study Set </th>
				</tr>";
				while ($row = mysqli_fetch_array($queryResultIn)) {  
					echo "					
					<tr>
						<td><img src = ".$row[3]." width='200' height='200' /> </td> 
						<td>".$row[2]."</td> 					
						<td>".$row[1]."</td>
						<script type = 'text/javascript' src = 'js/displaySubmissionFields.js'></script>
						<td>
							<button onclick = 'displaySubmit(event, ".$row[0].");' id = 'submit".$row[0]."' class = 'addButton'>Add to Vocab List?</button>
							<form action = 'writeToFile.php' method = 'post' class = 'submissionForm' id = 'submissionForm".$row[0]."'>
								<label for = 'studyset'> Choose a study set </label>
									<select name = 'studyset' id = 'studyset'>";
										while ($tab = mysqli_fetch_array($tabNames)){
											echo "<option value = ".$tab[0].">".$tab[0]."</option>";
										}
										mysqli_data_seek($tabNames, 0);										
								echo "</select>";
							echo "<input type = 'hidden' name = 'word' value = ".$row[0].">";
							//Change once sessions are integrated
							echo "<input type = 'hidden' name = 'username' value = 'Andy' >";
							echo "<input type = 'submit' value = 'submit'>";
							echo "</form>
						</td>
					</tr>
					";
				}					
				echo "</table>";
			}
	} ?>
	
	<script src="js/nav.js"></script>
	
	<!-- Here set up the tabs for lessons. All, 1, 2, 3, 4. If a lesson is blank, display a message along the lines of "No words unlocked yet... Unlock more in Lessons!" with a link to lessons. -->
	<script type="text/javascript" src="js/dictionaryDisplayLesson.js"></script>
	<div class="tabs" style = 'padding-top :20px; padding-bottom: 20px;'>
		<button class="lessontab" onclick="displayLesson(event, 'All');">All</button>
		<button class="lessontab" onclick="displayLesson(event, '1');">Lesson 1</button>
		<button class="lessontab" onclick="displayLesson(event, '2');">Lesson 2</button>
		<button class="lessontab" onclick="displayLesson(event, '3');">Lesson 3</button>
		<button class="lessontab" onclick="displayLesson(event, '4');">Lesson 4</button>
	</div>

	<!-- Tab content -->
	<div id="All" class="lessonContent">
		<h3>All Words</h3>
		<?php
			//For set options when adding to a studyset
			$userIDQuery = "SELECT id FROM User where google_id = ".$_SESSION['login_id'].";";
        		$userIDResult = mysqli_fetch_array(mysqli_query($db_connection, $userIDQuery), MYSQLI_NUM);
        		$userID = $userIDResult[0];


			$setTabsQuery = "SELECT listname FROM vocablist WHERE ID = ".$userID.";";
			$setTabsResult = mysqli_query($db_connection, $setTabsQuery);
			
			switch ($userAccessLevelQueryResult){
				case 4:
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult);
					echo "<h3> Lesson 2 </h3>";
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult);
					echo "<h3> Lesson 3 </h3>";
					displayQueryResults($lesson3WordsQueryResult, $setTabsResult);
					echo "<h3> Lesson 4 </h3>";
					displayQueryResults($lesson4WordsQueryResult, $setTabsResult);
					break;
				case 3:
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult);
					echo "<h3> Lesson 2 </h3>";
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult);
					echo "<h3> Lesson 3 </h3>";
					displayQueryResults($lesson3WordsQueryResult, $setTabsResult);
					break;
				case 2:
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult);
					echo "<h3> Lesson 2 </h3>";
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult);
					break;
				case 1:		
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult);
					break;					
				default: 
					echo "<h3> No words unlocked. </h3>
						<p> Head over to lessons and unlock new words! </p>";
			}
		?>
	</div>

	<div id="1" class="lessonContent">
		<h3>Lesson 1</h3>
			<?php 
				if ($userAccessLevelQueryResult >= 1) {	
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult);
				} else {
					echo "<h3> No words unlocked. </h3>
						<p> Head over to lessons and unlock new words! </p>";
				}			
			?>
		
	</div>
	
	<div id="2" class="lessonContent">
		<h3>Lesson 2</h3>
			<?php 
				if ($userAccessLevelQueryResult >= 2) {	
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult);
				} else {
					echo "<h3> No words unlocked. </h3>
						<p> Head over to lessons and unlock new words! </p>";
				}				
			?>
	</div>
	
	<div id="3" class="lessonContent">
		<h3>Lesson 3</h3>
			<?php 
				if ($userAccessLevelQueryResult >= 3) {	
					displayQueryResults($lesson3WordsQueryResult, $setTabsResult);
				} else {
					echo "<h3> No words unlocked. </h3>
						<p> Head over to lessons and unlock new words! </p>";
				}			
			?>
	</div>
	
	<div id="4" class="lessonContent">
		<h3>Lesson 4</h3>
			<?php 
				if ($userAccessLevelQueryResult >= 4) {	
					displayQueryResults($lesson4WordsQueryResult, $setTabsResult);
				} else {
					echo "<h3> No words unlocked. </h3>
						<p> Head over to lessons and unlock new words! </p>";
				}	
			?>
	</div>
</body>
</html>
