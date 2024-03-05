<html>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/settings.css">
        <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="css/tabbingStyling.css" />

        <?php
	ob_start();
        session_start();


        if (isset($_SESSION['login_id']) == null) {
                header('Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
        }

        $google_id = $_SESSION['login_id'];
        $con = mysqli_connect("db.luddy.indiana.edu", "i494f23_team11", "my+sql=i494f23_team11", "i494f23_team11");

        $query = "Select id,username,userhandle,email,color,userlevel from User where google_id = $google_id";
        $result = mysqli_query($con, $query);

        $result = mysqli_fetch_array($result);
        $id = $result['id'];
        $username = $result['username'];
        $userhandle = $result['userhandle'];
        $email = $result['email'];
        $color = $result['color'];
        $les = $result['userlevel'];

        ?>
</head>




<body>

        <!-- NAVIGATION -->
        <nav id="mySidenav" class="sidenav">
                <ul>
                        <li><a class="closebtn">&times;</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="lesson.php<?php echo "?les=$les"; ?>">Lessons</a></li>
                        <li><a href="dictionary.php">Dictionary</a></li>
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
                <h1>Settings</h1>
        </header>

        <?php

        ?>

        <form action="settings.php?s=1" method="POST">
                <!--
<h3> Full Name </h3>
<input type="text" name="fullname" value="<?php echo $username; ?>" required>
<br><br>

<h3> User Handle </h3>
<input type="text" name="handle" value="<?php if (!$userhandle == null) {
        echo $userhandle;
} ?>">
<br><br>
-->

                <div class="settings-form">
                        <h3> Notifications </h3>
                        <p>Would you like to receive SMS notifications?</p>

                        <?php

                        $query = "select stat from notifications where user = $id";
                        $result = mysqli_query($con, $query);
                        $result = mysqli_fetch_array($result);
                        $status = $result['stat'];
                        ?>
                        <div class='form-check'>
                                <input class="form-check-input" type="radio" id="yes" name="notif" value="yes" <?php if ($status == 1) {
                                        echo "checked";
                                } ?>>
     <label for="yes">Yes</label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="no" name="notif" value="no" <?php if ($status == 0) {
                                        echo "checked";
                                } ?>>
           <label for="no">No</label>
                        </div>


                        <?php
                        $query = "select phone from profile where email = '$email'";
                        $result = mysqli_query($con, $query);
                        $result = mysqli_fetch_array($result);
                        $phone = $result['phone'];
			if ($phone != NULL) {
                        $phone = substr($phone, 0, 3) . "-" . substr($phone, 3);
                        $phone = substr($phone, 0, 7) . "-" . substr($phone, 7);
			}
                        ?>
                        <p>If yes, enter or edit your phone number (format: 123-123-1234)</p>
                        <div class="form-group w-25">
                                <label for="exampleFormControlInput1">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" id="exampleFormControlInput1"
                                        placeholder="123-456-7890" value="<?php if ($phone != null) {
                                echo $phone;
                        } ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="<?php if ($phone == null) {
                                 echo "ex. 012-345-6789";
                         } ?>">
                        </div>

                        <?php
                        $query = "select dayofweek from notifications where user = $id";
                        $result = mysqli_query($con, $query);
                        $result = mysqli_fetch_array($result);
                        $day = $result['dayofweek'];
                        ?>
                        <br>
                        Select the day of the week you would like to receive notifications <br>
                        <select class="form-control w-25" name="day">
                                <option <?php if ($day == 0) {
                                        echo "selected";
                                } ?> value="sunday">Sunday</option>
                                <option <?php if ($day == 1) {
                                        echo "selected";
                                } ?> value="monday">Monday</option>
                                <option <?php if ($day == 2) {
                                        echo "selected";
                                } ?> value="tuesday">Tuesday</option>
                                <option <?php if ($day == 3) {
                                        echo "selected";
                                } ?> value="wednesday">Wednesday</option>
                                <option <?php if ($day == 4) {
                                        echo "selected";
                                } ?> value="thursday">Thursday</option>
                                <option <?php if ($day == 5) {
                                        echo "selected";
                                } ?> value="friday">Friday</option>
                                <option <?php if ($day == 6) {
                                        echo "selected";
                                } ?> value="saturday">Saturday</option>
                        </select>
                        <br><br>
                        <h3> Styling </h3>

                        <label for="progcolor"> Progress Bar Color: </label>
                        <input type="color" name="progcolor" id="progcolor" value="<?php echo $color; ?>" />

                        <br><br>
                        <button class="btn btn-primary" type="submit" id="edit" value="Save Changes">Save Changes</button>
                </div>
                <?php

                //form handling
//$formname = $_POST['fullname'];
//$formhandle = $_POST['handle'];
                $formnotif = $_POST['notif'];
                $formphone = $_POST['phone'];
                $formday = $_POST['day'];
                $formcolor = $_POST['progcolor'];


                switch ($formnotif) {
                        case 'yes':
                                $formnotif = 1;
                                break;
                        case 'no':
                                $formnotif = 0;
                                break;
                }

                switch ($formday) {
                        case 'sunday':
                                $formday = 0;
                                break;
                        case 'monday':
                                $formday = 1;
                                break;
                        case 'tuesday':
                                $formday = 2;
                                break;
                        case 'wednesday':
                                $formday = 3;
                                break;
                        case 'thursday':
                                $formday = 4;
                                break;
                        case 'friday':
                                $formday = 5;
                                break;
                        case 'saturday':
                                $formday = 6;
                                break;
                }

                //time to insert into table
//check if user are exists, that just alter variables
                $query="select count(1) from profile where email='$email'";
                $result = mysqli_query($con, $query);
                $result = mysqli_fetch_assoc($result);
                $found = $result['count(1)'];
                $formphone = str_replace("-", "", $formphone);
                
                $query = "select user from notifications where user = $id";
                $result = mysqli_query($con, $query);
                $result = mysqli_fetch_array($result);
                $test = $result['user'];
                if ($_GET['s'] > 0) {
                        if ($test != null) {
                                //For altering existing;
                
                                $query = "Update notifications set stat='$formnotif', dayofweek='$formday' where user=$id";
                                mysqli_query($con, $query);

                                $query = "Update User set color='$formcolor' where id=$id";
                                mysqli_query($con, $query);

                                if ($found > 0) {
                                        $query = "Update profile set phone='$formphone' where email='$email'";
                                        mysqli_query($con, $query);
                                } else {  
                                        $query="Insert into profile (email, birthday, phone) Values ('$email', '0000-00-00', $formphone)";
                                        mysqli_query($con, $query);
                                }

                                header("Location:profile.php");
                        } else {
                                //For inputing new user
                
                                $query = "INSERT INTO notifications (stat, method, timeofday, dayofweek, user) VALUES ($formnotif, 'phone', '00:00:00', $formday, $id)";
                                mysqli_query($con, $query);


                                $query = "Update User set color='$formcolor' where id=$id";
                                mysqli_query($con, $query);

                                if ($found > 0) {
                                        $query = "Update profile set phone='$formphone' where email='$email'";
                                        mysqli_query($con, $query);
                                } else {  
                                        $query="Insert into profile (email, birthday, phone) Values ('$email', '0000-00-00', $formphone)";
                                        mysqli_query($con, $query);
                                }

                                header("Location:profile.php");


                        }
                }
                ?>

                <script src="js/nav.js"></script>
</body>

</html>
