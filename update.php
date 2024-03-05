<?php
session_start();
//establish connection to database
$con = mysqli_connect("db.luddy.indiana.edu", "i494f23_team11","my+sql=i494f23_team11", "i494f23_team11");
//I removed the error message we were tought to add in I308 nothing 
if (!$con)
{ echo "connection failed";
        die("Connection Failed: " . mysqli_connect_error()) . "<br>";
} else {
    echo "connection established";
        
    }
//establish variables to store form data
    $name = null;
    $handle = null;
    $image = null;
    $id = null;

    //make sure the data is being imported from post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        echo $name. '<br>';
        $handle = filter_input(INPUT_POST, 'handle', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $id = $_SESSION['login_id'];
        $errorMessages = array();
    
        //get rid of trailing white space
        if (!empty($name)) { 
            $name = trim($name);
            $name = $name;
        }
        echo $name. '<br>';
    
        if (!empty($handle)) {
            $handle = trim($handle);
            $handle = $handle;
        }
    
        if (!empty($image)) {
            $ddescription = trim($image);
            $ddescription = $image;
        }

        //add error messages
    
        if (!empty($errorMessages)) {
            // set values to null to prevent them from being added to mysql database.
            $dname = null;
            $dprice = null;
            $ddescription = null;
            $dtype = null;

            $_SESSION['errorMessages'] = $errorMessages;
            header("Location:edit.php");
            exit();
        }
    }

    function sanitizeInput($input) {
        // Escape quotes or code
        $input = htmlspecialchars($input, ENT_QUOTES);
        return $input;
    }
    
    //sanitze name, handle, image incase it isn't picked up by the error messages

    $charsToReplace = ['<', '>', ';'];
    $name = str_replace($charsToReplace, '', $name);
    $handle = str_replace($charsToReplace, '', $handle);
    $image = str_replace($charsToReplace, '', $image);

    //update statement
    $sql = "UPDATE User SET username='$name',userhandle='$handle',profile_image = '$image' where google_id = '$id'";
    echo $sql;
    //update diet statement
    //$msql = "UPDATE diet SET where id=$id";
    //update record
    $result = mysqli_query($con, $sql);


    //check to see if the record is uplodaing.
    if ($result) {
        echo "Record updated successfully.";
	location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/profile.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    //close the connection
    mysqli_close($con);

    //exit and redirect back to public.php
    //header("Location:profile.php");
    //exit();
