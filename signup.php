<?php

//included clasess
include 'users.php';

set_email($_POST["email"]);
set_password($_POST["password"]);
set_fname($_POST["fname"]);
set_lname($_POST["lname"]);
set_gender($_POST["gender"]);
set_birthday($_POST["birthday"]);
$usertype = 1;

 // initialize db
 $db = new PDO("mysql:host=localhost;dbname=loyalcafe","root","");

 // insert to transaction table
 $sql = 
 "insert into users (Username, Password, Birthday, Gender, User_Type, firstName, lastName) values (:email, :password, :birthday, :gender, :usertype, :fName, :lName);";

 $result = $db ->prepare($sql);
 $result -> bindParam(':email', get_email());
 $result -> bindParam(':password', get_password());
 $result -> bindParam(':birthday', get_birthday());
 $result -> bindParam(':gender', get_gender());
 $result -> bindParam(':usertype', $usertype);
 $result -> bindParam(':fName', get_fName());
 $result -> bindParam(':lname', get_lName());
 $result -> execute();

 // TODO: try catch
echo "<br> Success click here to redirect. <a href=\"index.php\">Back</a>";

?>