<?php
require "config.php";
session_start();

$setName = $_POST['setName'];
$newSetName = $_POST['newStudysetName'];
$userID = $_POST['userID'];

$updateQuery = $db_connection->prepare("UPDATE vocablist SET listname = ?, filepath = json/".$userID."? WHERE listname = ?");
$updateQuery -> bind_param('ss', $newSetName, $setName);

rename("json/".$userID.$setName, "json/".$userID.$newSetName);

header('Location studysets.php');
exit; 


?>