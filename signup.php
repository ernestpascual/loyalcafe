<?php
// get values from post
$username = $_POST["email"];
$password = $_POST["password"];
$fname = $_POST["fName"];
$lname = $_POST["lName"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$usertype = 1;

 // initialize db
 $db = new PDO("mysql:host=localhost;dbname=loyalcafe","root","");

 // insert to transaction table
 $sql = 
 "insert into users (Username, Password, Birthday, Gender, User_Type, firstName, lastName) values ('"
 .$username."', '".$password ."', ".$birthday.", '".$gender."', ".$usertype.", '".$fname."', '".$lname."');";

 // check if succesful
$result = $db->query($sql);

echo $sql;
echo "<br> Success click here to redirect. <a href=\"index.php\">Back</a>";

?>