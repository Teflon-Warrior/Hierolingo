<html>

<head>
  <!-- bootstrap css-->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->

  <link rel="stylesheet" type="text/css" href="css/general.css"/>
  <link rel="stylesheet" href="css/lesson.css">
  <script type="text/javascript" src="./js/lessonjs.js"></script>


</head>

<body>
  <?php
  session_start();
  $les = 1;
  if(isset($_GET["les"])) {
        $les = ($_GET["les"]);
  }
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

  $curr = 1;
  if(isset($_GET["curr"])) {
        $curr = ($_GET["curr"]);
  }

$rowQuery = "select id from dictionary where access = $les";
$rowResult = mysqli_query($con, $rowQuery);
$rowCount = mysqli_num_rows($rowResult);

  if ($curr==1) {
        echo "<button class='nextButton' onclick='nextbuttonClicked($les, $curr);'> next term</button>";
  }else if ($curr == $rowCount) {
        echo "<button class='prevButton' onclick='prevbuttonClicked($les, $curr);'> prev term</button>";
  } else {
 echo "
<button class='prevButton' onclick='prevbuttonClicked($les, $curr);'> prev term</button>
<button class='nextButton' onclick='nextbuttonClicked($les, $curr);'> next term</button>
";
  }
$temp = $curr-1;

$query = "select filepath,def,id from dictionary where access = $les limit $temp,1;";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$filepath = $row['filepath'];
$def = $row['def'];
$id = $row['id'];



// Set <img> tag with the filepath
echo "<h1 align='center'> Lesson " . $les . " </h1>";

//progress bar

$width = 455/$rowCount;

echo "<div style='display:inline-block;margin-left:auto;margin-right:auto;>'";
echo "<div style:'margin-right: 20px;padding-top: 15px;'>1    </div>";
$j = 1;
for ($j = 1; $j <= $rowCount; $j++) {
if ($j==1) {
        echo "<div class='progress' style='width:$width;height:25px;border-right:none;background-color:#659df7;'>";
        if ($j == $curr) {
                echo "$j";
        }
        echo "</div>";
}elseif ($j == $rowCount) {
        if ($curr != $rowCount) {
                echo "<div class='progress' style='width:$width;height:25px;border-left:none;'>";
        } else {
                echo "<div class='progress' style='width:$width;height:25px;border-left:none;background-color:#659df7;'>";
        }
        if ($j == $curr) {
                echo "$j";
        }
        echo "</div>";
}else {
        if ($j <= $curr ) {
        echo "<div class='progress' style='width:$width;height:25px;border-left:none;border-right:none;background-color:#659df7;'>";
        if ($j == $curr) {
                echo "$j";
        }
        echo "</div>";

        } else {
        echo "<div class='progress' style='width:$width;height:25px;border-left:none;border-right:none;'>";
        echo "</div>";
        }
        }
}

echo $rowCount;

echo "</div>";


echo "<div class='flash' onclick='termClick($id);' id='term_$id'>";
//echo $filepath;
echo "<img src='$filepath'>";
echo "</div>";


echo "<div class='flash' hidden onclick='definitionClick($id);' id='definition_$id'>";
echo "<p class='flashText'>'$def'</p>";
echo "</div>";

$i = 0;

for ($i=1; $i<=$rowCount; $i++) {
        echo "<button class='prevButton' onclick='lessonnavClicked($les, $i);'> $i </button>";

}
echo "<br><br>";

if ($les == 1) {
        echo "<button class='btn' onclick='nextlessonClicked($les);'> Next Lesson </button>";
} else {
        echo "<button class='btn' onclick='prevlessonClicked($les);'> Previous Lesson </button>";
        echo "<button class='btn' onclick='nextlessonClicked($les);'> Next Lesson </button>";
}
?>

</body>
</html>
