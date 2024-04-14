<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/tabbingStyling.css" />
    <link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap"
		rel="stylesheet">

    <?php
    require "config.php";
    session_start();
    if (isset($_SESSION['login_id'])) {
        // Assuming you have already established a database connection
        $query = "SELECT username, userhandle, profile_image, userlevel FROM User WHERE google_id = '{$_SESSION['login_id']}'";

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
                $les = $row['userlevel'];
		//echo $image;
    
            }
        } else {
            echo "no results";
        }
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
        <!-- NAVIGATION -->
        <nav id="mySidenav" class="sidenav">
                <ul>
                        <li><a class="closebtn">&times;</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="lesson.php<?php echo "?les=$les"; ?>">Lessons</a></li>
                        <li><a href="dictionary.php">Review</a></li>
                        <li><a href="studysets.php">Study Sets</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                </ul>
        </nav>
    <header>
        <div class="openbtn">
            <span class="material-symbols-outlined menu-button">menu</span>
            <span class="menu-text">menu</span>
        </div>
    </header>

    <div class='header-title'>
		<h1> Edit </h1>
	</div>

    <div class="edit-form">
        <form action="update.php" method="POST">
            <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $username ?>" class=""><br>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputImage" class="col-sm-2 col-form-label">Profile Image:</label>
                <div class="col-sm-10">
                    <input type="text" name="image" value="<?php echo $image ?>"><br>
                </div>
            </div>
            <br>
            <button class="greenButton" type="submit" id="edit" value="Save Changes">Save Changes</button>
    </div>
    </form>
    </div>


	<script src="js/nav.js"></script>
</body>

</html>
