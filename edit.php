<!DOCTYPE html>
<html lang="en">
<head>
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
