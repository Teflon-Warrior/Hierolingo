<?php
require 'src/Twilio/autoload.php';
use Twilio\Rest\Client;

$TWILIO_ACCOUNT_SID = 'AC63373f765284e1b71845a9d0ec1991df';
$TWILIO_AUTH_TOKEN = '55335639af3f96cc2d2a925ad3477efc';


// In production, these should be environment variables.
$account_sid = 'AC63373f765284e1b71845a9d0ec1991df1';
$auth_token = '55335639af3f96cc2d2a925ad3477efc';
$twilio_number = "+18667478301"; // Twilio number you own
$client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
// Below, substitute your cell phone
$client->messages->create(
    '+12196708841',
    [
        'from' => $twilio_number,
        'body' => 'This message is Un-Composed'
    ]
);

?>
