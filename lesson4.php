<html>

<head>
  <link href="./css/lessoncss.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="./js/lessonjs.js"></script>


</head>

<body>
<?php
  //login credentials
  $host = "db.luddy.indiana.edu";
  $username = "i494f23_team11";
  $password = "my+sql=i494f23_team11";
  $database = "i494f23_team11";

  $con = mysqli_connect($host, $username, $password, $database);

  if (!$con)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }

  $query = "select filepath,def,id from dictionary WHERE access = 4";

  $result = mysqli_query($con, $query) or die("Query Failed!");

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract values into variables
        $filepath = $row['filepath'];
        $def = $row['def'];
        $id = $row['id'];

        // Set <img> tag with the filepath
        echo "<h1 align='center'> Lesson 1 <h1>";
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
</body>