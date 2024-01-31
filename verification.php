<?php
session_start();

    //establish variables to store form data
    $email = null;
    $password = null;

    //define an array to story error messages!
    $errorMessages = array();
    $i = 0;
    //make sure the data is being imported from post and verify and filter the strings so it doesn't cause an HTML or SQL attack.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);   
    }

    //get rid of trailing whitespace aand check if variable is still empty
    if (!empty($email)) {

        $email = trim($email);

    }

    if (!empty($password)) {
        $password = trim($password);
    }

    //check for errors in input for email
    if (empty($email)) {
        $errorMessages[$i] = "An email is required";
        $i++;
  } if (!preg_match('/@/', $email)){
     $errorMessages[$i] = "Email must include @";
     $i++;
  }

  //check password
  if (empty($password)){
    $errorMessages[$i] = "A password is required";
    $i++;
}


$con = mysqli_connect("db.luddy.indiana.edu", "i494f23_johaharr","my+sql=i494f23_johaharr", "i494f23_johaharr");
//establis$con = mysqli_connect("db.luddy.indiana.edu", "i494f23_johaharr","my+sql=i494f23_johaharr", "i494f23_johaharr");
//I removed the error message we were tought to add in I308 nothing 
if (!$con)
{ echo "connection failed";
        die("Connection Failed: " . mysqli_connect_error()) . "<br>";
} else {
    echo "connection established";
        
    }
//check that users isn't already in the users table
$sql = "select email, pass,fname from users";

$result = mysqli_query($con,$sql);

$password = hash('sha256', $password);

$a = $i++;

$key = 0;

//check that results were retured
if (mysqli_num_rows($result) > 0 && $errorMessages[$key] == NULL) {

    //for item in results
    while ($row = mysqli_fetch_assoc($result)) {
      $demail = $row['email'];
      $dpass = $row['pass'];
      $dname = $row['fname'];
      $_SESSION["fname"] = $dname;

      if($email == $demail && $password == $dpass){
        $errorMessages[$i] = NULL;
        $errorMessages[$a] = NULL;
        //redirect to home page
        header("Location:home.php");
        exit();
      }

      if($email != $demail){
        $errorMessages[$i] = "no email is registered";
      }

      if($password != $dpass){

        //verify no password matches
        $errorMessages[$a] = "Passowrd is not correct please checkk again.";
      }
    }
}




if (!empty($errorMessages)) {
    
    // set values to null to prevent them from being added to mysql database.
    $email = null;
    $password = null;
    $_SESSION['errorMessages'] = $errorMessages;
    header("Location:login.php");
    exit();
}