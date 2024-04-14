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
    if (isset($_SESSION['login_id'])) {
        // Assuming you have already established a database connection
        $query = "SELECT userlevel FROM User WHERE google_id = {$_SESSION['login_id']}";
	//echo $query;
        $result = mysqli_query($con, $query) or die("Query level Failed!");

        if (mysqli_num_rows($result) > 0) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        
                    $level = $row['userlevel'];
                    //echo $level.'<br>';
        
                }
            } else {
                echo "no results";
            }
        }
    
        // Execute your query here...
    }
//establish variables to store form data
    $A1 = null;
    $A2 = null;
    $A3 = null;
    $A4 = null;
    $A5 = null;

    //variable used to hold error messages
    $errorMessages = array();

    //make sure the data is being imported from post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //filter sanitize string 
        $A1 = filter_input(INPUT_POST, 'answer1', FILTER_SANITIZE_STRING);
        $A2 = filter_input(INPUT_POST, 'answer2', FILTER_SANITIZE_STRING);
        $A3 = filter_input(INPUT_POST, 'answer3', FILTER_SANITIZE_STRING);
        $A4 = filter_input(INPUT_POST, 'answer4', FILTER_SANITIZE_STRING);
        $A5 = filter_input(INPUT_POST, 'answer5', FILTER_SANITIZE_STRING);

	if (empty($A1) || empty($A2) || empty($A3) || empty($A4) || empty($A5)) {
          $errorMessages[] = "All Questions must be answered.";
          $_SESSION['errorMessages'] = $errorMessages;
          foreach ($errorMessages as $errorMessage) {
            echo $errorMessage . "<br>";
           }
           header("Location:quiz2.php");
           exit();
        }
    
        //get rid of leading and trailing white space.
        if (!empty($a1) || !empty($a2) || !empty($a3) || !empty($a4) || !empty($a5)) {
            $A1 = trim($A1);
            $A2 = trim($A2);
            $A3 = trim($A3);
            $A4 = trim($A4);
            $A5 = trim($A5);
        }

        //test echo
        echo $A1;
        echo $A2;
        echo $A3;
        echo $A4;
        echo $A5;


        if (!preg_match('/\b\w+\s+\w+\b/', $A1) || !preg_match('/\b\w+\s+\w+\b/', $A2) || !preg_match('/\b\w+\s+\w+\b/', $A3) || !preg_match('/\b\w+\s+\w+\b/', $A4) || !preg_match('/\b\w+\s+\w+\b/', $A5)) {
            $errorMessages[] = "All Answers must contain at least 2 words.";
	    $_SESSION['errorMessages'] = $errorMessages;
	    header("Location:quiz2.php");
            exit();
        }
    }

    function sanitizeInput($input) {
        // Escape quotes or code
        $input = htmlspecialchars($input, ENT_QUOTES);
        return $input;
    }
    
    


    //sanitze description and name

    //$charsToReplace = ['<', '>', '{', '}', '(', ')', ';'];
    //$ddescription = str_replace($charsToReplace, '', $ddescription);
    //$dname = str_replace($charsToReplace,'',$dname)
    if(!preg_match('/(?:Behold|Voila)\s+mentu/', $A1)){
        $errorMessages[] = "Question 1 is incorrect";
        //Question 2.1_1
    }
    if(!preg_match('/(?:escape|leave)\s+this\s+(?:town|city)\s+child/', $A2)){
        $errorMessages[] = "Question 2 is incorrect";
        //Question 2.2_3
    }
    if(!preg_match('/(?:Behold|Voila) a woman along with their daughter are at the house/',$A3)){
        $errorMessages[] = "Question 3 is incorrect";
        //Question 2.2_4
    }
    if(!preg_match('/(?:Behold|Voila) a boat upon the water, the sun rises over the horizon/', $A4)){
        $errorMessages[] = "Question 4 is incorrect";
        //2.4_3
        
    }
    if(!preg_match('/the house is in town/', $A5)){
        $errorMessages[] = "Question 5 is incorrect";
        //Question 2.3_4
    }

    if(!empty($errorMessages)){
         $errorMessages[] = "Review Words and Try Again Later!";
         $_SESSION['errorMessages'] = $errorMessages;
         header("Location:https://cgi.luddy.indiana.edu/~team11/team-11/dictionary.php");
         exit();

    }

    //if nothing is found
    if ($level < 2){
     $level += 1;
     $query = "UPDATE User SET userlevel = $level WHERE google_id = {$_SESSION['login_id']}";
    }

	echo $query;
     mysqli_query($con,$query);
     mysqli_close($con);
    //redirect back to the form page
    $errorMessages[] = "Congrats welcome to Lesson 3";
    $_SESSION['errorMessages'] = $errorMessages;
    header("Location:https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=3");
    exit();

 ?>
