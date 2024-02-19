
<!DOCTYPE html>
<html>
<?php 
	session_start();

	//get post variables
	$setName = $_POST['studyset'];
	$userName = $_POST['username'];
	$word = $_POST['word'];
	
	//get userID for filepath
	$userIDQuery = "SELECT id FROM User where google_id = ".$_SESSION['login_id'].";";
	$userIDResult = mysqli_fetch_array(mysqli_query($db_connection, $userIDQuery), MYSQLI_NUM);
	$userID = $userIDResult[0];


	//construct file path
	$filepath = "json/".$userID.$setName.".json";
	
	//open file in read&write
	$file = fopen($filepath, "r+") or die("Unable to open file");
	
	//grab array from file
	$contents = json_decode($file_get_contents($file));
	echo $contents;
	//add word id into array
	array_push($contents, $word);
	
	//encode array in json and write
	fwrite($file, json_encode($contents));
	
	//close file
	fclose($file);
?>
<head>
<meta http-equiv = "refresh" content = "0; url = https://cgi.luddy.indiana.edu/~jefhochg/i495testing/dictionary.php" />
</head> 
<body>

</body>
</html>
