<?php 
require 'config.php';
session_start();

//prepared statement to insert user's Study set name and the corresponding filepath.
$preparedQuery = $dbh->prepare("INSERT INTO StudySets (id, filepath) VALUES (:id, :filepath)");
$userNameQuery = "SELECT username FROM User WHERE User.id = ".$_SESSION['userID'].";";

//Getting user's name for use in filepath
$userNameQueryResult = mysqli_fetch_array(mysqli_query($db_connection, $userNameQuery), MYSQLI_NUM);

//Building filepath to insert
$filePath = "json/".$userNameQueryResult[0].$_POST['studySetName'];

//Binding parameters
$preparedQuery -> bindParam(':id', $_SESSION['userID']);
$preparedQuery -> bindParam(':name', $filePath);

//Execute
$stmt->execute();

?>
