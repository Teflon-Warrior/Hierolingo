<html>

<head>
        <!-- bootstrap css-->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->

        <script type="text/javascript" src="./js/lessonjs.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lessons</title>

        <link rel="stylesheet" type="text/css" href="css/general.css" />
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/lesson.css">
        <link rel="stylesheet" href="css/tabbingStyling.css" />

        <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


</head>

<body>
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
                <h1>Lesson</h1>
        </header>

        <?php
        session_start();
        $les = 1;
        if (isset($_GET["les"])) {
                $les = ($_GET["les"]);
        }
        ?>

        <?php
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

        if ($curr == 1) {
                echo "<button class='nextButton' onclick='nextbuttonClicked($les, $curr);'> next term</button>";
        } else if ($curr == $rowCount) {
                echo "<button class='prevButton' onclick='prevbuttonClicked($les, $curr);'> prev term</button>";
        } else {

        }
        $temp = $curr - 1;

        $query = "select filepath,def,id from dictionary where access = $les limit $temp,1;";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        $filepath = $row['filepath'];
        $def = $row['def'];
        $id = $row['id'];



        // Set <img> tag with the filepath
        echo "<h1 align='center'> Lesson " . $les . " </h1>";

        //progress bar
        
        $width = 455 / $rowCount;

        echo "<div style='display:inline-block;margin-left:auto;margin-right:auto;>'";
        echo "<div style:'margin-right: 20px;padding-top: 15px;'>1    </div>";
        $j = 1;
        for ($j = 1; $j <= $rowCount; $j++) {
                if ($j == 1) {
                        echo "<div class='progress' style='width:$width;height:25px;border-right:none;background-color:#659df7;'>";
                        if ($j == $curr) {
                                echo "$j";
                        }
                        echo "</div>";
                } elseif ($j == $rowCount) {
                        if ($curr != $rowCount) {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;'>";
                        } else {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;background-color:#659df7;'>";
                        }
                        if ($j == $curr) {
                                echo "$j";
                        }
                        echo "</div>";
                } else {
                        if ($j <= $curr) {
                                echo "<div class='progress' style='width:$width;height:25px;border-left:none;border-right:none;background-color:#659df7;'>";
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

        echo "
        <div class='term-buttons'>
        <button class='btn' onclick='prevbuttonClicked($les, $curr);'> prev term</button>
        <button class='btn' onclick='nextbuttonClicked($les, $curr);'> next term</button>
        </div>
        ";

        echo $rowCount;

        echo "</div>";


        echo "<div class='flash' onclick='termClick($id);' id='term_$id'>";
        //echo $filepath;
        echo "<img src='$filepath'>";
        echo "</div>";


        echo "<div class='flash' hidden onclick='definitionClick($id);' id='definition_$id'>";
        echo "<p class='flashText'>'$def'</p>";
        echo "</div>";

        $i = 0;

        for ($i = 1; $i <= $rowCount; $i++) {
                echo "<button class='btn' onclick='lessonnavClicked($les, $i);'> $i </button>";

        }
        echo "<br><br>";

        if ($les == 1) {
                echo "<button class='btn' onclick='nextlessonClicked($les);'> Next Lesson </button>";
        } else {
                echo "<button class='btn' onclick='prevlessonClicked($les);'> Previous Lesson </button>";
                echo "<button class='btn' onclick='nextlessonClicked($les);'> Next Lesson </button>";
        }
        ?>

</body>

</html>