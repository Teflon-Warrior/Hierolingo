<?php
require 'config.php';
session_start();

//prepared statement to insert user's Study set name and the corresponding filepath.
$preparedQuery = $db_connection->prepare("INSERT INTO vocablist (ID, filepath) VALUES (? , ?)");

if ($preparedQuery){
        $preparedQuery->bind_param('is', $userID, $filePath );
}

//get UserID for insert statement
$userIDQuery = "SELECT id FROM User where google_id = ".$_SESSION['login_id'].";";
$userIDResult = mysqli_fetch_array(mysqli_query($db_connection, $userIDQuery), MYSQLI_NUM);
$userID = $userIDResult[0];

//Build filepath for insert
$filePath = "json/".$userID.$_POST['studySetName'];

//Execute
$preparedQuery->execute();
echo $preparedQuery->error;

header('Location: studysets.php');
exit;
?>

