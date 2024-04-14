
<!DOCTYPE html>
<html>
<head>
</head> 
<body>
<?php
	session_start();
    require 'config.php';
 
	//Get userID for filePath
    $userIDQuery = "SELECT id FROM User WHERE google_id = ".$_SESSION['login_id'].";";
    $userIDResult = mysqli_fetch_array(mysqli_query($db_connection, $userIDQuery), MYSQLI_NUM);
    $userID = $userIDResult[0];
		
		//Word to be added
	$word = $_POST['word'];
		
		//Construct file path
    $filePath = null;
		
		//Check to see if the user wanted to make a new studyset, if so use that instead of the selected one
    if ($_POST['newStudyset']){
		$setName = $_POST['newStudyset'];
	   	//If there's a space in the name, replace it with an underscore.
	    	if (strpos($setName," ") != false){
			$setName = str_replace(" ","_", $setName);
		}
		     
		$filePath = "json/".$userID.$setName.".json";
		//creating new studyset in database
		$preparedQuery = $db_connection->prepare("INSERT INTO vocablist (ID, filePath, listname) VALUES (? , ?, ?)");
			
		if ($preparedQuery){
			$preparedQuery->bind_param('iss', $userID, $filePath, $setName );
		}
			
		$preparedQuery->execute();
		echo $preparedQuery->error;
			
	} else {
		$setName = $_POST['studyset'];
		$filePath = "json/".$userID.$setName.".json";
	}
		
    //open file in read&write
    $file = fopen($filePath, "a") or die("Unable to open file");
        
	//grab array from file
	$contents = json_decode(file_get_contents($filePath));
	fclose($file);

	if (count($contents) == 0){
		$contents = [];
	}
        //add word id into array
        array_push($contents, intval($word));

	file_put_contents($filePath, json_encode($contents));

	header('Location: dictionary.php');
	exit;
?>

</body>
</html>
