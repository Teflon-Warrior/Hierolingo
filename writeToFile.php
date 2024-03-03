
<!DOCTYPE html>
<html>
<head>
</head> 
<body>
<?php
        session_start();
        require 'config.php';
        //get post variables
		//Check to see if the user wanted to make a new studyset, if so use that instead of the selected one
        if ($_POST['newStudyset']){
			$setName = $_POST['newStudyset'];
		} else {
		$setName = $_POST['studyset'];
		}
        //word to be added
		$word = $_POST['word'];

        //get userID for filepath
        $userIDQuery = "SELECT id FROM User WHERE google_id = ".$_SESSION['login_id'].";";
        $userIDResult = mysqli_fetch_array(mysqli_query($db_connection, $userIDQuery), MYSQLI_NUM);
        $userID = $userIDResult[0];

        //construct file path
        $filepath = "json/".$userID.$setName.".json";
        //open file in read&write
        $file = fopen($filepath, "a") or die("Unable to open file");
        //grab array from file
	$contents = json_decode(file_get_contents($filepath));
	fclose($file);

	if (count($contents) == 0){
		$contents = [];
	}
        //add word id into array
        array_push($contents, intval($word));

	file_put_contents($filepath, json_encode($contents));

	header('Location: dictionary.php');
	exit;
?>

</body>
</html>
