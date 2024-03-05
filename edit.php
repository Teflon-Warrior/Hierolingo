<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dictionary</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/edit.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="css/tabbingStyling.css" />

    <?php
    require "config.php";
    session_start();
    if(isset($_SESSION['login_id'])) {
        // Assuming you have already established a database connection
        $query = "SELECT username, userhandle, profile_image FROM User WHERE google_id = '{$_SESSION['login_id']}'";
    
        // Execute your query here...
    } else {
        // Handle the case where $_SESSION['login_id'] is not set
        echo "Error: login_id not set in session.";
    }

    $result = mysqli_query($db_connection, $query) or die("Query Failed!");

    if (mysqli_num_rows($result) > 0) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

            $username = $row['username'];
            $userhandle = $row['userhandle'];
            $image = $row['profile_image'];
            //echo $image;

        }
    } else {echo "no results";}
}
    ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="update.php" method="POST">
      Username: <input type="text" name="name" value="<?php echo $username?>" class=""><br>
      Userhandle: <input type="text" name="handle" value="<?php if ($userhandle != NULL) {echo $userhandle; } ?>" class=''><br>
     profile image: <input type="text" name="image" value="<?php echo $image?>" ><br>
     <br>
    <input type="submit" class="">
    </form>

    
</body>
</html>
