<html>

<head>
        <?php
        session_start();
        if (isset($_SESSION['login_id']) == null) {
                header('Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
        }
        $google_id = $_SESSION['login_id'];
        $con = mysqli_connect("db.luddy.indiana.edu", "i494f23_team11", "my+sql=i494f23_team11", "i494f23_team11");
        $query = "Select userlevel,color from User where google_id = $google_id";
        $result = mysqli_query($con, $query);
        $result = mysqli_fetch_array($result);

        $les = $_GET["les"];
        $level = $result['userlevel'];
        $color = $result['color'];
        ?>


        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lessons</title>
        <!-- bootstrap css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/general.css" />
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/tabbingStyling.css" />
        <link rel="stylesheet" href="css/lesson.css">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <script type="text/javascript" src="./js/lessonjs.js"></script>
</head>

<body>
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
                <div class="all-over-bkg"></div>

        </header>

        <?php

        //display success message
        if (isset($_SESSION['errorMessages'])) {
                $errorMessages = $_SESSION['errorMessages'];
                echo '<div class="alert alert-success">';
                echo '<ul>';
                foreach ($errorMessages as $errorMessage) {
                        echo '<li>' . $errorMessage . '</li>';
                }
                echo '</ul>';
                echo '</div>';
                $_SESSION['errorMessages'] = NULL;
        }
        //login credentials
        $host = "db.luddy.indiana.edu";
        $username = "i494f23_team11";
        $password = "my+sql=i494f23_team11";
        $database = "i494f23_team11";

        $con = mysqli_connect($host, $username, $password, $database);

        if (!$con) {
                die("Failed to connect to MySQL: " . mysqli_connect_error());
        }

        $curr = 1;
        if (isset($_GET["curr"])) {
                $curr = ($_GET["curr"]);
        }

        $rowQuery = "select id from dictionary where access = $les";
        $rowResult = mysqli_query($con, $rowQuery);
        $rowCount = mysqli_num_rows($rowResult);


        $temp = $curr - 1;

        $query = "select filepath,def,id from dictionary where access = $les limit $temp,1;";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        $filepath = $row['filepath'];
        $def = $row['def'];
        $id = $row['id'];



        // Set <img> tag with the filepath
        
        echo "<div class='lesson-number-text'>
        <h1 align='center'> Lesson " . $les . " </h1>
        </div>";

        //progress bar
        
        $width = 455 / $rowCount;
        if (preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
                $width = 400 / $rowCount;
        }

        echo "<div class='progress-bar'>";
        echo "<div style='display:inline-block;>'";
        echo "<div style:'margin-right: 20px;padding-top: 15px;'>1    </div>";
        $j = 1;
        for ($j = 1; $j <= $rowCount; $j++) {
                if ($j == 1) {
                        echo "<div class='progress' style='width:$width;height:25px;border-right:none;background-color:$color;'>";
                        if ($j == $curr) {
                                echo "$j";
                        }
                        echo "</div>";
                } elseif ($j == $rowCount) {
                        if ($curr != $rowCount) {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;'>";
                        } else {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;background-color:$color;'>";
                        }
                        if ($j == $curr) {
                                echo "$j";
                        }
                        echo "</div>";
                } else {
                        if ($j <= $curr) {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;border-right:none;background-color:$color;'>";
                                if ($j == $curr) {
                                        echo "$j";
                                }
                                echo "</div>";

                        } else {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;border-right:none;'>";
                                echo "</div>";
                        }
                }
        }

        echo $rowCount;

        echo "</div>";
        echo "</div>";

        echo "<div class='term-buttons'>";
        if ($curr > 1) {
                echo "<button class='btn' onclick='prevbuttonClicked($les, $curr);'> prev term</button>";
        }
        if ($curr != $rowCount) {
                echo "<button class='btn' onclick='nextbuttonClicked($les, $curr);'> next term</button>";
        }
        echo "</div>";

        echo "<div class='flash1' onclick='termClick($id);' id='term_$id'>";
        //echo $filepath;
        echo "<img src='$filepath'>";
        echo "</div>";


        echo "<div class='flash1' hidden onclick='definitionClick($id);' id='definition_$id'>";
        echo "<p class='flashText1'>'$def'</p>";
        echo "</div>";

        $i = 0;

        echo "<div class='number-buttons'>";


        echo "<div class='scroll'>";
        for ($i = 1; $i <= $rowCount; $i++) {
                if ($i % 5 == 1 && $i != 1) {
                        echo "<br>";
                }
                if ($curr == $i) {
                        echo "<button class='btn' style='background-color:#726948;' onclick='lessonnavClicked($les, $i);'> $i </button>";
                } else {
                        echo "<button class='btn' onclick='lessonnavClicked($les, $i);'> $i </button>";
                }

        }
        echo "</div>";

        echo "<br><br>";

        echo "</div>";
        echo "<div class='lesson-buttons'>";

        if ($level == $les) {
                echo "<button class='btn' onclick='quizClicked($les);'> Take Quiz </button>";
        }
        echo "<br>";
        if ($les == 1) {
                if ($level > 1) {
                        echo "<button class='btn' onclick='nextlessonClicked($les);'> Next Lesson </button>";
                }
        } else {
                echo "<button class='btn' onclick='prevlessonClicked($les);'> Previous Lesson </button>";
                if ($level > $les) {
                        echo "<button class='btn' onclick='nextlessonClicked($les);'> Next Lesson </button>";
                }
        }
        echo "</div>";
        ?>

        <script src="js/nav.js"></script>
</body>

</html>