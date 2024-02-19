
<!DOCTYPE html>
<html>
<?php 
	//get post variables
	$setName = $_POST['studyset'];
	$userName = $_POST['username'];
	$word = $_POST['word'];

	//construct file path
	$filepath = "json/".$userName.$setName.".json";
	
	//open file in read&write
	$file = fopen($filepath, "w") or die("Unable to open file");
	
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