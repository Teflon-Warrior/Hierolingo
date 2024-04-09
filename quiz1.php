<!DOCTYPE html>
<html lang="en">

<head>
  <!-- bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="./css/lessoncss.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/lesson.css">
  <link rel="stylesheet" type="text/css" href="css/general.css" />
  <script type="text/javascript" src="./js/lessonjs.js"></script>
  <link rel="stylesheet" href="css/quiz.css">

</head>

<body>
  

<div class="profile-header">
            <nav id="mySidenav" class="sidenav">
                <ul>
                    <li><a class="closebtn">&times;</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="lesson.php<?php echo"?les=1";?>">Lessons</a></li>
                    <li><a href="dictionary.php">Review</a></li>
                    <li><a href="studysets.php">Study Sets</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
<header> 
<div class="openbtn">
                    <span class="material-symbols-outlined menu-button">menu</span>
                    <span class="menu-text">menu</span>
                </div>
                <div class="all-over-bkg"></div>
                <div style="padding-top: 40px; position: absolute; left: 50%; transform: translate(-50%,0); font-size: 2em;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: black;font-weight: bold;">Quiz 1 </div>
</div>
  </header>
  <?php
  session_start();
  ?>


  <?php
  //
  $host = "db.luddy.indiana.edu";
  $username = "i494f23_team11";
  $password = "my+sql=i494f23_team11";
  $database = "i494f23_team11";

  $con = mysqli_connect($host, $username, $password, $database);

  if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
  }

  $query = "SELECT filepath FROM dictionary WHERE pos='Question' AND filepath LIKE '%Quiz-1%'";

  $result = mysqli_query($con, $query) or die("Query Failed!");

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


  if (mysqli_num_rows($result) > 0) {
    echo "<div class='container'>";
    echo "<div class='row justify-content-center'>";
    echo "<div class='col-md-6'>";
    echo "<form action='Lesson_result1.php' method='POST'>";
    $d = 1;
    while ($row = mysqli_fetch_array($result)) {
      $filepath = $row['filepath'];
      echo "<img src='https://cgi.luddy.indiana.edu/~team11/team-11$filepath'>";
      //echo "<object data='$filepath' type="image/svg+xml">";
      echo "<input type=input name='answer$d'>";
      echo "<hr>";
      $d++;
    }
    echo "<input type='submit' class='btn btn-Dark'>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }


  ?>
  <script src="js/nav.js"></script>
</body>

</html>
<!--adding back-->
