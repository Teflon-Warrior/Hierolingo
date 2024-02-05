<?php
session_destroy();

// Redirect to the login page or any other page after logout
header('Location: login.php');
exit();
?>