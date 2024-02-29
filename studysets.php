<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Study Sets</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/studysets.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />

	<?php
	require 'config.php';
	session_start();
	$con = $db_connection;
	if (isset($_SESSION['login_id']) == null) {
		header('Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
	}

	$google_id = $_SESSION['login_id'];
	$con = mysqli_connect("db.luddy.indiana.edu", "i494f23_team11", "my+sql=i494f23_team11", "i494f23_team11");

	$query = "Select userlevel from User where google_id = $google_id";
	$result = mysqli_query($con, $query);
	$result = mysqli_fetch_array($result);

	$les = $result['userlevel'];

	?>

</head>

<body>

	<!-- NAVIGATION -->
	<nav id="mySidenav" class="sidenav">
		<ul>
			<li><a class="closebtn">&times;</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="lesson.php<?php echo "?les=$les"; ?>">Lessons</a></li>
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
		<h1>Study Sets</h1>
	</header>

	<!-- PHP connection & Queries -->
	<?php

	//get userID
	$userIDQuery = "SELECT id FROM User where google_id = " . $_SESSION['login_id'] . ";";
	$userIDResult = mysqli_fetch_array(mysqli_query($db_connection, $userIDQuery), MYSQLI_NUM);
	$userID = $userIDResult[0];

	//This query will pull the relevant JSON objects for getting the title and wordIDs for each study set.
	$setTabsQuery = "SELECT listname FROM vocablist WHERE ID = " . $userID . ";";

	//Result section
	$setTabsResult = mysqli_query($con, $setTabsQuery);
	//Defined here, used elsewhere
	$setWordsResult = "";
	//Number of tabs for forloop
	$numTabs = count($setTabsResult);

	function displayQueryResults($wordsIn, $con)
	{
		if (mysqli_connect_errno()) {
			die("Failed to connect to MySQL: " . mysqli_connect_error());
		} else {
		}
		if (count($wordsIn) > 0) {
			echo "<table border = '1'>
				<tr>
					<th>Heiroglyph</th>
					<th>Definition </th>
					<th>Part of Speech</th>
				</tr>";
			for ($i = 0; $i < count($wordsIn); $i++) {
				$printQuery = "SELECT * FROM dictionary WHERE id = " . $wordsIn[$i] . ";";
				$results = mysqli_fetch_array(mysqli_query($con, $printQuery), MYSQLI_NUM);
				echo "
					<tr>
						<td><img src = " . $results[3] . " width='200' height='200' /> </td> 
						<td>" . $results[2] . "</td> 					
						<td>" . $results[1] . "</td>
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
		while ($setTabs = mysqli_fetch_array($setTabsResult, MYSQLI_NUM)) {
			echo "<button class='lessontab' onclick='displayLesson(event, \"" . $setTabs[0] . "\");'>" . $setTabs[0] . "</button>\n";
		}
		//Add header
		echo "<button class='lessontab' onclick='displayLesson(event, \"Add\");'>Add New Set</button>";
		?>
	</div>

	<!-- This will set the tabs to display each word within a user list. -->
	<?php
	mysqli_data_seek($setTabsResult, 0);
	while ($setTabs = mysqli_fetch_array($setTabsResult, MYSQLI_NUM)) {
		echo "<div id = '" . $setTabs[0] . "' class = 'lessonContent'>";

		$setWordsQuery = "SELECT filepath FROM vocablist WHERE listname = '" . $setTabs[0] . "' and ID = " . $userID . ";";
		$setWordsResult = mysqli_fetch_array(mysqli_query($db_connection, $setWordsQuery), MYSQLI_NUM);
		$words = file_get_contents($setWordsResult[0]);
		$words = json_decode($words);
		displayQueryResults($words, $db_connection);
		echo "</div>";
	}

	echo "<form action='addStudySet.php' method='post'>
			<div class='form-group'>
  				<label for='exampleInputEmail1'>What would you like to name your study set?</label>
  				<input type='text' name='studySetName' class='form-control' placeholder='Type a name...'><br>
			</div>
			<button type='submit' class='btn btn-primary'>Submit</button>
		</form>";

	?>


</body>

</html>

<!---
<?php

echo "<div id = 'Add' class = 'lessonContent'>";
echo "<h3>Add a new Study Set</h3>";
echo "<form action = 'addStudySet.php' method = 'post'>
	What would you like to name your study set? <input type = 'text' name = 'studySetName'><br>
	<input type = 'submit'>	
	 </form>";
echo "</div>";


?> -->