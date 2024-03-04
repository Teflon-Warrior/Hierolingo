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
    
        
    
        if (!empty($dname)) {
            
            $dname = trim($dname);
            
            $dname = $dname;
        }
    
        if (!empty($dprice)) {
            $dprice = trim($dprice);
            $dprice = $dprice;
        }
    
        if (!empty($ddescription)) {
            $ddescription = trim($ddescription);
            $ddescription = $ddescription;
        }

        if (empty($dname) || strlen($dname) > 20 || preg_match('/\)/', $dname)) {
            if (empty($dname)) {
                $errorMessages[] = "Dish Name is required.";
            } elseif (strlen($dname) > 20) {
                $errorMessages[] = "Dish Name must be less than 20 characters.";
            } elseif (!is_string($dname)) {
                $errorMessages[] = "Dish Name must be a string.";
            }else {
                $errorMessages[] = "Dish Name cannot contain ')'.";
            }
        }
    
        if (empty($dprice) || !preg_match('/^\d{2}\.\d{2}$/', $dprice)) {
            if (!is_numeric($dprice)) {
                $errorMessages[] = "Price must be a number.";
            } elseif (empty($dprice)) {
                $errorMessages[] = "Price is required.";
            } else{
                $errorMessages[] = "Price must be a float with two decimal places.";
            }
        }
    
        if (empty($ddescription) || strlen($ddescription) > 500 || preg_match('/\)/', $ddescription)) {
            if (empty($ddescription)) {
                $errorMessages[] = "Description is required.";
            } elseif (strlen($ddescription) > 500) {
                $errorMessages[] = "Description must be less than 500 characters.";
            } elseif (!is_string($ddescription)) {
                $errorMessages[] = "Description must be a string.";
            }else {
                $errorMessages[] = "Description cannot contain ')'.";
            }
        }
        if (isset($_POST['diet']) && is_array($_POST['diet'])) {
            $dtype = $_POST['diet'];
        }
    
        if (!empty($errorMessages)) {
            // set values to null to prevent them from being added to mysql database.
            $dname = null;
            $dprice = null;
            $ddescription = null;
            $dtype = null;

            $_SESSION['errorMessages'] = $errorMessages;
        }
    }

    function sanitizeInput($input) {
        // Escape quotes or code
        $input = htmlspecialchars($input, ENT_QUOTES);
        return $input;
    }
    
    


    //sanitze description and name

    $charsToReplace = ['<', '>', '{', '}', '(', ')', ';'];
    $ddescription = str_replace($charsToReplace, '', $ddescription);
    $dname = str_replace($charsToReplace,'',$dname);
    echo $dname;


   $sql="INSERT INTO menu(name,price,description) 
       VALUES ('$dname',$dprice,'$ddescription')";
    //inerst new record into 
    mysqli_query($con,$sql);
    
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
    header("Location:public.php");
    exit();
 ?>

 //bm