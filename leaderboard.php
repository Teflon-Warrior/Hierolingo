<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />
</head>

<body>
	<script src="js/nav.js"></script>
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
<?php
  $host = "db.luddy.indiana.edu";
  $username = "i494f23_team11";
  $password = "my+sql=i494f23_team11";
  $database = "i494f23_team11";

  $con = mysqli_connect($host, $username, $password, $database);

    if (!$con) {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
//Query to grab to top 5 users (along with their point values) with the most points
  $userPointsQuery = "SELECT User.username,points.points from points JOIN User on User.id = points.user ORDER BY points DESC LIMIT 5;";
//Results for userPointQuery
  $result = mysqli_query($con, $userPointsQuery);
 
  if ($result->num_rows > 0){
	  echo "<table border = '1'>
		  <tr>
			<th>User</th>
		        <th>Points</th>
		</tr>";
 	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		echo "<tr>
			<td>".$row[0]."</td>
		        <td>".$row[1]."</td>
		      <tr>";
	
	}
    	echo "</table>";
   }
?>

</body>
</html>
