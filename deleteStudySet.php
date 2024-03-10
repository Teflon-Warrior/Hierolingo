<?php 
require 'config.php';

$userID = $_POST['userID'];
$setName = $_POST['setName'];

$deleteQuery = $db_connection->prepare("DELETE FROM vocablist WHERE listname = ? AND ID = ".$userID.";");
if ($deleteQuery) {
        $deleteQuery -> bind_param('s', $setName);
}

$deleteQuery->execute();
echo $deleteQuery->error;

$fileName = "json/".$userID.$setName.".json";

unlink($fileName);

header('Location: studysets.php');
?>