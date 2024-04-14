<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <script type="text/javascript" src="./js/profile.js"></script>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile.css">
    <!--<link rel="stylesheet" href="css/profile.css">-->
    <link rel="stylesheet" href="css/tabbingStyling.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<?php
//config.php includes information where we open the database
session_start();

//Sending to login if not already logged in
if (isset($_SESSION['login_id']) == null) {
    header('Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
}

require 'config.php';
if (isset($_SESSION['login_id'])) {
    // Assuming you have already established a database connection
    $query = "SELECT username, userhandle, userlevel, profile_image FROM User WHERE google_id = '{$_SESSION['login_id']}'";

    // Execute your query here...
} else {
    // Handle the case where $_SESSION['login_id'] is not set
    echo "Error: login_id not set in session.";
}
//$query = "SELECT username, userhandle, userlevel, profile_image From User where google_id = 103617818573862353894";
$result = mysqli_query($db_connection, $query) or die("Query Failed!");

if (mysqli_num_rows($result) > 0) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $username = $row['username'];
            $userhandle = $row['userhandle'];
            $level = $row['userlevel'];
            $image = $row['profile_image'];
            //echo $image;

        }
    } else {
        echo "no results";
    }
}

//$row = mysqli_fetch_assoc($result);

//$image = $row['profile_image'];
?>
</head>

<body>


    <!-- MAIN CONTENT -->
    <header>
        <nav id="mySidenav" class="sidenav">
            <ul>
                <li><a class="closebtn">&times;</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="lesson.php<?php echo "?les=$level"; ?>">Lessons</a></li>
                <li><a href="dictionary.php">Review</a></li>
                <li><a href="studysets.php">Study Sets</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <div class="openbtn">
            <span class="material-symbols-outlined menu-button">menu</span>
            <span class="menu-text">menu</span>
        </div>
      </header>

    <div class='header-title'>
        <h1> Profile </h1>
    </div>


    <div class="profile-page">

        <!-- PFP, name, and username -->
        <div class="profile-info">

                    <img class="pfp" src="<?php echo $image ?>">
           <div class="profile-text">
            <h1 style="text-align: left;">
                <?php echo $username ?>
            </h1>
            <h1>Level
                <?php echo $level ?> Out of 4
            </h1>
        </div>

        </div>


        <script src="js/nav.js"></script>
    </div>
<div class="firstButtons">
        <a href="https://cgi.luddy.indiana.edu/~team11/team-11/settings.php"><button class="profileButtons" role="button">Settings</button></a>
        <a href="https://cgi.luddy.indiana.edu/~team11/team-11/edit.php"><button class="profileButtons" role="button">Appearance</button></a>
</div>

<div class="secondButton">
        <a href="https://cgi.luddy.indiana.edu/~team11/team-11/logout.php"><button class="profileButtons" role="button">Logout</button></a>
</div>
</body>

</html>
          
