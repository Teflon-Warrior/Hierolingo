<?php
require "config.php";
session_start();

$setName = $_POST['setName'];
$newSetName = $_POST['newStudysetName'];
$newSetName = str_replace(" ", "_", $newSetName);
$userID = $_POST['userID'];

$oldFilePath = "json/".$userID.$setName.".json";
$newFilePath = "json/".$userID.$newSetName.".json";

//For whatever reason I had to break this into two queries
$updateQuery = $db_connection->prepare("UPDATE vocablist SET listname = ? WHERE listname = ? AND ID = ".$userID.";");
if ($updateQuery) {
        $updateQuery -> bind_param('ss', $newSetName, $setName);
}

$updateQuery2 = $db_connection->prepare("UPDATE vocablist SET filepath = ? WHERE listname = ? AND ID = ".$userID.";");
if ($updateQuery2) {
        $updateQuery2 -> bind_param('ss', $newFilePath, $newSetName);
}

$updateQuery->execute();
$updateQuery2->execute();

echo $updateQuery->error;
echo $updateQuery2->error;

rename($oldFilePath, $newFilePath);

header('Location: studysets.php');
exit;


?>
