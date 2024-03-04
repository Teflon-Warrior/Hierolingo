<?php
session_start();
//establish connection to database
$con = mysqli_connect("db.luddy.indiana.edu", "i494f23_johaharr","my+sql=i494f23_johaharr", "i494f23_johaharr");
//I removed the error message we were tought to add in I308 nothing 
if (!$con)
{ echo "connection failed";
        die("Connection Failed: " . mysqli_connect_error()) . "<br>";
} else {
    echo "connection established";
        
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
        if (empty($a1) || empty($a2) || empty($a3) || empty($a4) || empty($a5)) {
            $errorMessages[] = "All Questions must be answered.";
            header("Location:lesson.php");
            exit();
        }

        $A1 = filter_input(INPUT_POST, 'answer1', FILTER_SANITIZE_STRING);
        $A2 = filter_input(INPUT_POST, 'answer2', FILTER_SANITIZE_STRING);
        $A3 = filter_input(INPUT_POST, 'answer3', FILTER_SANITIZE_STRING);
        $A4 = filter_input(INPUT_POST, 'answer4', FILTER_SANITIZE_STRING);
        $A5 = filter_input(INPUT_POST, 'answer5', FILTER_SANITIZE_STRING);
    
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
    //$dname = str_replace($charsToReplace,'',$dname);


    $sql="SELECT def FROM dictionary WHERE pos='Question' AND filepath LIKE '%Quiz-1%'";
    

    $result = mysqli_query($con, $sql) or die("Query Failed!");

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $def = $row['def'];

    }
}
    
    $count = mysqli_query($con,"select max(id) from menu");
    
    $kms = mysqli_fetch_row($count);
    $kms = $kms[0];
    echo $kms;
    
    foreach($dtype as $item){
        $sql = "INSERT INTO diet(Menuid,diet) VALUES($kms,'$item')";
        if (mysqli_query($con,$sql)){
            $add_message[] =  "diet succesfully submited to diet";
          
          }else{
              echo "diet not added correctly. try again.";
          }
        }
    mysqli_close($con);
    //redirect back to the form page
    //header("Location:public.php");
    //exit();
 ?>