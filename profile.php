<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile.css">
    <!--<link rel="stylesheet" href="css/profile.css">-->
    <link rel="stylesheet" href="css/tabbingStyling.css" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

    <?php
    //config.php includes information where we open the database
    session_start();
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

    <div class="profile-header">

        <header>
            <nav id="mySidenav" class="sidenav">
                <ul>
                    <li><a class="closebtn">&times;</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="lesson.php">Lessons</a></li>
                    <li><a href="dictionary.php">Dictionary</a></li>
                    <li><a href="studysets.php">Study Sets</a></li>
                    <li><a href="leaderboard.php">Leaderboard</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
            <header>
                <div class="openbtn">
                    <span class="material-symbols-outlined menu-button">menu</span>
                    <span class="menu-text">menu</span>
                </div>
                <div class="all-over-bkg"></div>
            <h1>Profile</h1>

        </header>

    </div>


    <div class="profile-page">

        <!-- PFP, name, and username -->
        <div class="profile-info">
            <img class="pfp" src="<?php echo $image ?>" width="150" height="150">
            <h1>
                <?php echo $username ?>
            </h1>
            <h3>@
                <?php echo $userhandle ?>
            </h3>
        </div>

        <!-- Level -->
        <div class="profile-level">
            <div class="level-display">
                <h2>Level
                    <?php echo $level ?>
                </h2>
            </div>
        </div>
    </div>

    <script src="js/nav.js"></script>

</body>

</html>