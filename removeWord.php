<?php
        $wordID = $_POST['wordID'];
        $userID = $_POST['userID'];
        $setName = $_POST['setName'];

        $filepath = "json/".$userID.$setName.".json";

        $file = fopen($filepath, "a") or die("Unable to open file");

        //grab array from file
        $contents = json_decode(file_get_contents($filepath));
        echo count($contents);

        fclose($file);

        //remove word id from array

        $index = array_search($wordID ,$contents);
        unset($contents[$index]);
        $contents = array_values($contents);

        echo count($contents);
        file_put_contents($filepath, json_encode($contents));

        header('Location: studysets.php');
        exit;
?>
