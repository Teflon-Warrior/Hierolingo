<html>

<head>
	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leaderboard</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/leaderboard.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

	<header>
		<div class="openbtn">
			<span class="material-symbols-outlined menu-button">menu</span>
			<span class="menu-text">menu</span>
		</div>
		<div class="all-over-bkg"></div>
		<h1>Leaderboards</h1>
	</header>

	<?php
	$host = "db.luddy.indiana.edu";
	$username = "i494f23_team11";
	$password = "my+sql=i494f23_team11";
	$database = "i494f23_team11";

	$con = mysqli_connect($host, $username, $password, $database);

	if (!$con) {
		die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	//Query to grab to top 5 users (along with their point values) with the most points
	$userPointsQuery = "SELECT User.username,points.points from points JOIN User on User.id = points.user ORDER BY points DESC LIMIT 5;";
	//Results for userPointQuery
	$result = mysqli_query($con, $userPointsQuery);
	if ($result->num_rows > 0) {
		echo "<div class='leaderboard-content'>";
		echo "<h3>Top 5 Users<h3>";
		echo "<table class='table table-hover' border = '1'>
		  <thead>
		  <tr>
			<th scope='col'>User</th>
		    <th scope='col'>Points</th>
		</tr>
		</thead>";
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
			echo "<tbody>
			<tr>
			<td>" . $row[0] . "</td>
		        <td>" . $row[1] . "</td>
		      <tr>";

		}
		echo "</tbody>
			  </table>";
		echo "<p>These 5 users have accumlated the most points!</p>";
		echo "</div>";
	}
	?>
	<script src="js/nav.js"></script>

</body>

</html>