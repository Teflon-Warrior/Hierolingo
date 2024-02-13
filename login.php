<?php
require 'verification.php';if(isset($_SESSION['login_id'])){
    header('Location: index.php');
    exit;
}require 'google-api/vendor/autoload.php';// Creating new google client instance

$client = new Google_Client();// Enter your Client ID

$client->setClientId('13731763374-b6li94ja9m8m6drhlksbjkgi4bpf4f4o.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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t');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost:3000/home.php');// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");
if(isset($_GET['code'])):    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);    if(!isset($token["error"])){        $client->setAccessToken($token['access_token']);        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){            $_SESSION['login_id'] = $id; 
            header('Location: home.php');
            exit;        }
        else{            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");            if($insert){
                $_SESSION['login_id'] = $id; 
                header('Location: home.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }        }    }
    else{
        header('Location: login.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>




<html>

<head>

<style>


.login-with-google-btn {
            transition: background-color 0.3s, box-shadow 0.3s;
            padding: 12px 16px 12px 42px;
            border: none;
            border-radius: 3px;
            box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
            background-color: #4a4a4a;
            background-repeat: no-repeat;
            background-position: 12px 11px;
            text-decoration: none;
        }
        .login-with-google-btn:hover {
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
        }
        .login-with-google-btn:active {
            background-color: #000000;
        }
        .login-with-google-btn:focus {
            outline: none;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25), 0 0 0 3px #c8dafc;
        }
        .login-with-google-btn:disabled {
            filter: grayscale(100%);
            background-color: #ebebeb;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 1px 1px rgba(0, 0, 0, 0.25);
            cursor: not-allowed;
        }
</style>


<!-- bootstrap css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- individual default adjustments-->
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" href="js/session.js">

  <!--Google API login connection-->
  <script src="https://accounts.google.com/gsi/client" async defer></script>

</head>

<body>

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
\<div class="_container">
        <h2 class="heading">Login</h2>
    </div>
    <div class="_container btn">
        
        <a type="button" class="login-with-google-btn" href="<?php echo $client->createAuthUrl(); ?>">
            Sign in with Google
        </a>    </div>
<?php
echo $_SESSION["log"];
?>
</body>
</html>

<?php endif; ?>