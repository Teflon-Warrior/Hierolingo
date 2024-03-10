<?php 
	$wordID = $_POST['wordID'];
	$userID = $_POST['userID'];
	$setName = $_POST['setName'];
	
	$filepath = "json/".$userID.$setName.".json";
	
	$file = fopen($filePath, "a") or die("Unable to open file");
        
	//grab array from file
	$contents = json_decode(file_get_contents($filePath));
	fclose($file);

	if (count($contents) == 0){
		$contents = [];
	}
    
	
	
	//remove word id from array
    
	$index = array_search($wordID ,$contents);
	unset($contents[$index]);


	file_put_contents($filePath, json_encode($contents));

	header('Location: dictionary.php');
	exit;
?>