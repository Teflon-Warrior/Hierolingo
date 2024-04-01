<!DOCTYPE html>
<html lang="en">
<!-- Test -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Review</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/dictionary.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />

<?php
        require 'config.php';
        session_start();
        $con = $db_connection;

	if (isset($_SESSION['login_id']) == null) {
        header( 'Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
}

$google_id = $_SESSION['login_id'];
$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_team11","my+sql=i494f23_team11","i494f23_team11");

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
			<li><a href="lesson.php<?php echo"?les=$les";?>">Lessons</a></li>			
			<li><a href="dictionary.php">Review</a></li>
			<li><a href="studysets.php">Study Sets</a></li>
			<li><a href="settings.php">Settings</a></li>
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
		<div style="padding-top: 40px; position: absolute; left: 50%; transform: translate(-50%,0); font-size: 2em;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white;font-weight: bold;">Review </div>
	</header>

	<?php
	if (isset($_SESSION['errorMessages'])) {
    $errorMessages = $_SESSION['errorMessages'];
    echo '<div class="alert alert-danger">';
    echo '<ul>';
	  foreach ($errorMessages as $errorMessage) {
            echo '<li>' . $errorMessage . '</li>';
    }
        echo '</ul>';
        echo '</div>';
		$_SESSION['errorMessages'] = NULL;
		}
	?>
	<!--PHP Connection & Queries -->
	<?php 	
	//This query will pull the given users access level for use in a later query.
	//Currently hardcoded to test user "andy". Once login API is developed, change this to login token and such.
	$userAccessLevelQuery = "SELECT userlevel FROM User WHERE google_id = ".$_SESSION['login_id'].";";
	//These queries will pull the vocabulary relevant to the specified level
	$lesson1WordsQuery = "SELECT * FROM dictionary where dictionary.access = 1 AND filepath LIKE '%L1%'";
	$lesson2WordsQuery = "SELECT * FROM dictionary where dictionary.access = 2 AND filepath LIKE '%L2%'";
	$lesson3WordsQuery = "SELECT * FROM dictionary where dictionary.access = 3 AND filepath LIKE '%L3%'";
	$lesson4WordsQuery = "SELECT * FROM dictionary where dictionary.access = 4 AND filepath LIKE '%L4%'";
	
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
        // Uniq is to separate the ids by which tab they are in
        function displayQueryResults($queryResultIn, $tabNames, $uniq){
                if ($queryResultIn->num_rows > 0) {
                                mysqli_data_seek($queryResultIn, 0);
                                echo "<table class='table table-hover' border = '1'>
                                <thead>
                                <tr>
                                        <th scope='col'>Heiroglyph</th>
                                        <th scope='col'>Definition </th>
                                        <th scope='col'>Part of Speech</th>
                                        <th scope='col'>Add to Study Set </th>
                                </tr>
                                </thead>";
                                while ($row = mysqli_fetch_array($queryResultIn)) {
                                        echo "<tbody>
                                        <tr>
												<script src = 'js/audio.js'></script>
                                                <td onclick = 'playAudio(".$row[0].");'><img src = ".$row[3]." width='200' height='200' /> </td>
                                                <td>".$row[2]."</td>
                                                <td>".$row[1]."</td>
                                                <script src = 'js/displaySubmissionFields.js'></script>
                                                <td>
                                                        <button type='button' class='btn btn-primary' onclick = 'displaySubmit(event, \"".$row[0]."l".strval($uniq)."\");' id = 'submit".$row[0]."l".strval($uniq)."' class = 'addButton'>Add</button>
                                                        <form action = 'writeToFile.php' method = 'post' class = 'submissionForm' id = 'submissionForm".$row[0]."l".strval($uniq)."'>
                                                        <div class='form-group'>
                                                                <label for = 'studyset'> Choose a study set or make a new one! </label>
                                                                        <select class='form-control form-control-sm' name = 'studyset' id = 'studyset'>";
                                                                                while ($tab = mysqli_fetch_array($tabNames)){
                                                                                        echo "<option value = ".$tab[0].">".$tab[0]."</option>";
                                                                                }
                                                                                mysqli_data_seek($tabNames, 0);
                                                                echo "</select>
                                                                <input type = 'text' name = 'newStudyset' id = 'newStudyset'>
                                                                <input type = 'hidden' name = 'word' value = ".$row[0].">
                                                                <button type = 'submit' value='submit' class='btn btn-primary'>Submit</button>
                                                                </div>";
                                                        echo "</form>
                                                </td>
                                        </tr>
                                        </tbody>";
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
	
	<div id="Landing" style = "display: block;" class = "lessonContent">
	<!-- landing text -->
	<p> Welcome to the Review section! Here you will find words that you have seen from the lessons page. Here you can see a word's heiroglyph, it's definition, part of speech, and it's pronounciation if you click on its row.
	Clicking on "Add" opens a menu where you can add words to your own study sets. Either click a name from a drop down, or type in a new name, and click "Submit" to add it to a list! </p>
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
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult, 0);
					echo "<h3> Lesson 2 </h3>";
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult, 0);
					echo "<h3> Lesson 3 </h3>";
					displayQueryResults($lesson3WordsQueryResult, $setTabsResult, 0);
					echo "<h3> Lesson 4 </h3>";
					displayQueryResults($lesson4WordsQueryResult, $setTabsResult, 0);
					break;
				case 3:
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult, 0);
					echo "<h3> Lesson 2 </h3>";
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult, 0);
					echo "<h3> Lesson 3 </h3>";
					displayQueryResults($lesson3WordsQueryResult, $setTabsResult, 0);
					break;
				case 2:
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult, 0);
					echo "<h3> Lesson 2 </h3>";
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult, 0);
					break;
				case 1:		
					echo "<h3> Lesson 1 </h3>";
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult, 0);
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
					displayQueryResults($lesson1WordsQueryResult, $setTabsResult, 1);
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
					displayQueryResults($lesson2WordsQueryResult, $setTabsResult, 2);
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
					displayQueryResults($lesson3WordsQueryResult, $setTabsResult, 3);
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
					displayQueryResults($lesson4WordsQueryResult, $setTabsResult, 4);
				} else {
					echo "<h3> No words unlocked. </h3>
						<p> Head over to lessons and unlock new words! </p>";
				}	
			?>
	</div>
</body>
</html>
