<html>

<head>
    <!-- bootstrap css
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
-->
  <link href="./css/lessoncss.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/general.css"/>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/lesson.css">
  <script type="text/javascript" src="./js/lessonjs.js"></script>


</head>

<body>
<?php
  session_start();
  ?>
  <nav class="navbar navbar-expand-sm bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="profile.php">Profile</a>
        </li>
        <?php
        
        if (isset($_SESSION['loggedin'])) {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" style="color:white;" href="lesson1.php">Lesson</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" style="color:white;" href="resource.php">Resource</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" style="color:white;" href="about.php">About</a>';
        echo '</li>';
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="login.php">Log In</a>
        </li>
    </ul>
    </ul>
</nav>
<?php
  //login credentials
  $host = "db.luddy.indiana.edu";
  $username = "i494f23_team11";
  $password = "my+sql=i494f23_team11";
  $database = "i494f23_team11";

  $con = mysqli_connect($host, $username, $password, $database);

  if (!$con)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }

  $query = "select filepath,def,id from dictionary WHERE access = 3";

  $result = mysqli_query($con, $query) or die("Query Failed!");

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract values into variables
        $filepath = $row['filepath'];
        $def = $row['def'];
        $id = $row['id'];

        // Set <img> tag with the filepath
        echo "<h1 align='center'> Lesson 3 <h1>";
        echo "<div class='flash' onclick='termClick($id);' id='term_$id'>";
        //echo $filepath;
        echo "<img src='$filepath'>";
        echo "</div>";

        echo "<div class='flash' hidden onclick='definitionClick($id);' id='definition_$id'>";
        echo "<p class='flashText'>$def</p>";
        echo "</div>";
    }
} else {
    echo "No records found";
}


?>
<a class="btn" href="Lesson2.php">Next</a>
<a class="btn" href="Lesson4.php">Next</a>
</body>