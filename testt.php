<html>
<header>
<?php
session_start();

if (isset($_SESSION['login_id']) == null) {
        header( 'Location: https://cgi.luddy.indiana.edu/~team11/team-11/login.php');
}

$google_id = $_SESSION['login_id'];
$con = mysqli_connect("db.luddy.indiana.edu" ,"i494f23_team11","my+sql=i494f23_team11","i494f23_team11");

$query = "Select id,username,userhandle,email from User where google_id = $google_id";
$result = mysqli_query($con, $query);

$result = mysqli_fetch_array($result);
$id = $result['id'];
$username = $result['username'];
$userhandle = $result['userhandle'];
$email = $result['email'];
echo $id;

?>

<div style="display: flex; justify-content: center;"> <h1> Settings </h1> </div>
</header>




<body>
<form action="profile.php" method="POST">
<h3> Full Name: </h3> <br>
<input type="text" name="fullname" value="<?php echo $username; ?>" required>
<br><br>

<h3> User Handle </h3>
<input type="text" name="handle" value="<?php if (!$userhandle== null) {echo $userhandle;}?>">
<br><br>

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
$query="select phone from profile where email = $email";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_array($result);
$phone = $result['phone'];
echo $phone;
?>

If yes, enter or edit your phone number
<!--
<input type="tel" name="phone" value="<?php if($phone != null) {echo $phone; ?>" pattern="[0-9]{10}" placeholder="<?php if($phone==null) {echo "0123456789";} ?>">
<br>
-->
<br><br>
<input type="submit" id="edit" value="Save Changes">

</body>
</html>
