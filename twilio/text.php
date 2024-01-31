<?php
require 'src/Twilio/autoload.php';
use Twilio\Rest\Client;

$TWILIO_ACCOUNT_SID = 'AC63373f765284e1b71845a9d0ec1991df';
$TWILIO_AUTH_TOKEN = '55335639af3f96cc2d2a925ad3477efc';


// In production, these should be environment variables.
//$account_sid = 'AC63373f765284e1b71845a9d0ec1991df1';
//$auth_token = '55335639af3f96cc2d2a925ad3477efc';


$twilio_number = "+18667478301"; // Twilio number you own
$client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);

$con=mysqli_connect("db.luddy.indiana.edu","i494f23_team11","my+sql=i494f23_team11","i494f23_team11");


$day = date("l");

switch ($day) {
  case "Sunday":
    $day = 0;
    break;
  case "Monday":
    $day = 1;
    break;
  case "Tuesday":
    $day = 2;
    break;
  case "Wednesday":
    $day = 3;
    break;
  case "Thursday":
    $day = 4;
    break;
  case "Friday":
    $day = 5;
    break;
  case "Saturday":
    $day = 6;
    break;
}

//getting list of users that want to receive notifications
$sql = "Select user from notifications where stat = 1 AND dayofweek = $day";

$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $sql2 = "Select phone from profile where username = $row";
  $result2 = mysqli_query($con, $sql2);
  while ($row2 = mysqli_fetch_assoc($result2)) {
    $num = '+1' . (string)$row2;
    $client->messages->create(
      $num,
      [
        'from' => $twilio_number,
        'body' => 'Don't forget to complete your weekly lesson! -Dataglyph.'
      ]
    );
  }
}
//messages will be sent to each individual on the day requested. Just need to edit the crontab file so that this script is ran once a day.

?>
