<?php
session_start();
session_regenerate_id(true);
//login credentials

$host = "db.luddy.indiana.edu";
$username = "i494f23_team11";
$password = "my+sql=i494f23_team11";
$database = "i494f23_team11";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con)
  {die("Failed to connect to MySQL: " . mysqli_connect_error()); 
  exit;
}


?>