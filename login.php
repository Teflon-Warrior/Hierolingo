<html>

<head>


<!-- bootstrap css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- individual default adjustments-->
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" href="js/session.js">

  <!--Google API login connection-->
  <script src="https://accounts.google.com/gsi/client" async defer></script>

</head>

<body>
<?php
session_start();
 $_SESSION['log'] = "False";
?>
<nav class="navbar navbar-expand-sm bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="home.php">Home</a>
        </li>
        <?php
        
        if ($_SESSION['log'] == "True") {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" style="color:white;" href="lesson.php">Lesson</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" style="color:white;" href="resource.php">Resource</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" style="color:white;" href="about.php">About</a>';
        echo '</li>';
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" style="color:white;" href="login.php">Log IN</a>
        </li>
    </ul>
    </ul>
</nav>
<body>

<div id="g_id_onload"
     data-client_id="13731763374-b6li94ja9m8m6drhlksbjkgi4bpf4f4o.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="redirect"
     data-login_uri="https://cgi.luddy.indiana.edu/~team11/team-11/profile.php"
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="filled_blue"
     data-text="continue_with"
     data-size="large"
     data-locale="en-US"
     data-logo_alignment="left">
</div>
<?php
echo $_SESSION["log"];
?>
</body>
</html>

