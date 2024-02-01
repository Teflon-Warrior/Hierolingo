<html>
<head>
</head>

<body>
<?php
  $host = "db.luddy.indiana.edu";
  $username = "i494f23_team11";
  $password = "my+sql=i494f23_team11";
  $database = "i494f23_team11";

  $con = mysqli_connect($host, $username, $password, $database);

    if (!$con)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
//Query to grab to top 5 users (along with their point values) with the most points
  $query = "SELECT user,points from points ORDER BY points DESC LIMIT 5;"

  $result = mysqli_query($con, $sql);
 

?>

</body>
</html>
