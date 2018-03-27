<?php
// check session
session_start();

// get user info for authentication
$user = $_POST['email'];
$password = $_POST['password'];

// initialize db
$db = new PDO("mysql:host=localhost;dbname=loyalcafe","root","");

// initialize query function
$loginQuery = "select * from users where Username = '".$user."';";

// perform query
$result = $db -> query($loginQuery);
$userCred = $result->fetch(PDO::FETCH_ASSOC);

// validate user credentials
if (!$userCred){
    echo "Wrong username and/or password.<br>Redirecting in 3 seconds..";
    echo "<br> Click <a href=\"signin.php\">here</a> if you are not redirected.";
    header("refresh:3; url=signin.php"); // wait for 3 seconds before redirect
    exit();
} else {
    // fetch query results and authenticate
    while ($userCred) {
        if($userCred['Password'] === $password){
            header("Location: home.php"); 

            // set session variables if authenticated
            $_SESSION["firstName"]= $userCred['firstName']; 
            $_SESSION["username"] = $userCred['Username'];
            $_SESSION["userid"] = $userCred['User_ID'];
            exit();
        } 
    else {
            echo "Wrong username and/or password.<br>Redirecting in 3 seconds..";
            echo "<br> Click <a href=\"signin.php\">here</a> if you are not redirected.";
            header("refresh:3; url=signin.php"); // wait for 3 seconds before redirect
            exit();
        }
    }
}
?>


