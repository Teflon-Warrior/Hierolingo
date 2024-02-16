<html>

<head>

<!-- google client ID-->
<meta name="google-signin-client_id" content="13731763374-b6li94ja9m8m6drhlksbjkgi4bpf4f4o.apps.googleusercontent.com">

<!-- bootstrap css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- individual default adjustments-->
<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
  <!--Google API login connection-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>

<?php
session_start(); 
// Check if the 'fname' session variable is set
if (!isset($_SESSION['fname'])) {
    // If set, change the href to 'home.php'
    $hrefValue = 'home.php';
    $logphp = 'login.php';
    $log = 'Sign in';
} else {
    // If not set, keep the href as 'private.php'
    $hrefValue = 'private.php';
    $log = 'Log Out';
    $logphp = 'logout.php';
}
?>

<nav class="navbar navbar-expand-sm bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="lesson.php">Lesson</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="resource.php">Resource</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>
<body>
<div class="container">
  <!-- center content horizontelly-->
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="verification.php" method="POST">
        <div class="form-group" style="background-color: #96705B; padding: 20px;">
          <form action="verification.php" method="POST">
          Email: <input type="text" name="email" class="form-control"><br>
          Password: <input type="text" name="password" class='form-control'><br>
          <input type="submit" class="btn btn-Dark">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="g-signin2" data-onsuccess="onSignIn"></div>

<?php


if (isset($_SESSION['errorMessages'])) {
    $errorMessages = $_SESSION['errorMessages'];
    unset($_SESSION['errorMessages']);
}

if (!empty($errorMessages)) {
    echo '<div class="alert alert-danger">';
    echo '<ul>';
    foreach ($errorMessages as $errorMessages) {
        echo '<li>' . $errorMessages . '</li>';
    }
    echo '</ul>';
    echo '</div>';
}else{

if (isset($_SESSION['add_message'])) {
    $add_message = $_SESSION['add_message'];
    unset($_SESSION['add_message']);
}

if(!empty($add_message)){
    echo '<div class="alert alert-primary">';
    echo '<ul>';
    foreach ($errorMessages as $errorMessage) {
        echo '<li>' . $errorMessage . '</li>';
    }
    echo '</ul>';
    echo '</div>';
}
}

?>

</body>
</html>