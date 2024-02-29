<html>
<header>
<?php
session_start();


if (isset($_SESSION['login_id']) == null) {
        header( 'Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
}

$google_id = $_SESSION['login_id'];
$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_team11","my+sql=i494f23_team11","i494f23_team11");

$query = "Select id,username,userhandle,email,color from User where google_id = $google_id";
$result = mysqli_query($con, $query);

$result = mysqli_fetch_array($result);
$id = $result['id'];
$username = $result['username'];
$userhandle = $result['userhandle'];
$email = $result['email'];
$color = $result['color'];

?>

<div style="display: flex; justify-content: center;"> <h1> Settings </h1> </div>
</header>




<body>

<?php

?>

<form action="settings.php?s=1" method="POST">
<!--
<h3> Full Name </h3>
<input type="text" name="fullname" value="<?php echo $username; ?>" required>
<br><br>

<h3> User Handle </h3>
<input type="text" name="handle" value="<?php if (!$userhandle== null) {echo $userhandle;}?>">
<br><br>
--!>

<h3> Notifications </h3>
Would you like to receive sms notifications?
<br>

<?php

$query="select stat from notifications where user = $id";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_array($result);
$status = $result['stat'];
?>

<input type="radio" id="yes" name="notif" value="yes" <?php if($status==1) {echo "checked";} ?>>
<label for="yes">yes</label>
<input type="radio" id="no" name="notif" value="no" <?php if($status==0) {echo "checked";} ?>>
<label for="no">no</label>
<br>


<?php
$query="select phone from profile where email = '$email'";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_array($result);
$phone = $result['phone'];
$phone = substr($phone, 0, 3) . "-" . substr($phone, 3);
$phone = substr($phone, 0, 7) . "-" . substr($phone, 7);

?>
<br>
If yes, enter or edit your phone number (format: 123-123-1234)
<br>
<input type="tel" name="phone" value="<?php if($phone != null) {echo $phone;} ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="<?php if($phone==null) {echo "ex. 012-345-6789";} ?>">
<br>

<?php
$query="select dayofweek from notifications where user = $id";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_array($result);
$day = $result['dayofweek'];
?>
<br>
Select the day of the week you would like to receive notifications <br>
<select name="day">
<option <?php if($day==0){echo "selected";} ?> value="sunday">Sunday</option>
<option <?php if($day==1){echo "selected";} ?> value="monday">Monday</option>
<option <?php if($day==2){echo "selected";} ?> value="tuesday">Tuesday</option>
<option <?php if($day==3){echo "selected";} ?> value="wednesday">Wednesday</option>
<option <?php if($day==4){echo "selected";} ?> value="thursday">Thursday</option>
<option <?php if($day==5){echo "selected";} ?> value="friday">Friday</option>
<option <?php if($day==6){echo "selected";} ?> value="saturday">Saturday</option>
</select>
<br><br>
<h3> Styling </h3>

<label for="progcolor"> Progress Bar Color: </label>
<input type="color" name="progcolor" id="progcolor" value="<?php echo $color; ?>" />

<br><br>
<input type="submit" id="edit" value="Save Changes">

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

$query = "select user from notifications where user = $id";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_array($result);
$test = $result['user'];
if($_GET['s'] > 0) {
if ($test != null) {
        //For altering existing;

        $query="Update notifications set stat='$formnotif', dayofweek='$formday' where user=$id";
        mysqli_query($con, $query);

        $query = "Update User set color='$formcolor' where id=$id";
        mysqli_query($con, $query);

        $query = "Update profile set phone='$formphone' where email='$email'";
        mysqli_query($con, $query);

        header( 'Location: https://cgi.luddy.indiana.edu/~team11/team-11/settings.php');
} else {
        //For inputing new user

        $query = "INSERT INTO notifications (stat, method, timeofday, dayofweek, user) VALUES ($formnotif, 'phone', '00:00:00', $formday, $id)";
        mysqli_query($con, $query);


        $query = "Update User set color='$formcolor' where id=$id";
        mysqli_query($con, $query);

        $query = "Update profile set phone='$formphone' where email='$email'";
        mysqli_query($con, $query);

        header( 'Location: https://cgi.luddy.indiana.edu/~team11/team-11/settings.php');


}
}
?>


</body>
</html>
