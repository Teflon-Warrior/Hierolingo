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

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <?php 
    $con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_team11","my+sql=i494f23_team11","i494f23_team11");
        if (mysqli_connect_errno())
            { die("Failed to connect to MySQL: " . mysqli_connect_error()); }
        else
            {} ?>

</head>

<body>


    <!-- MAIN CONTENT -->

    <div class="profile-header">

        <header>

            <h1>Profile</h1>

        </header>

    </div>


    <div class="profile-page">

        <!-- PFP, name, and username -->
        <div class="profile-info">
            <img class="pfp" src="img/defaultpfp.png" width="150" height="150">
            <h1>Aidan Smith</h1>
            <h3>@aidanaidanaidan</h3>
        </div>

        <!-- Level -->
        <div class="profile-level">
            <div class="level-display">
                <h2>Level 2</h2>
            </div>
        </div>

        <!-- Nav Buttons -->
        <div class="buttons">
            <a href="https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php" class="bar-div">
                <div class="profile-button">
                    <h2>Lessons</h2>
                </div>
            </a>
            <a href="https://cgi.luddy.indiana.edu/~team11/team-11/studysets.php" class="bar-div">
                <div class="profile-button">
                    <h2>Study Sets</h2>
                </div>
            </a>
            <a href="https://cgi.luddy.indiana.edu/~team11/team-11/dictionary.php" class="bar-div">
                <div class="profile-button">
                    <h2>Dictionary</h2>
                </div>
            </a>
            <a href="https://cgi.luddy.indiana.edu/~team11/team-11/logout.php" class="bar-div">
                <div class="profile-button">
                    <h2>Log Out</h2>
                </div>
            </a>
        </div>
    </div>

    <script src="js/nav.js"></script>

</body>

</html>
