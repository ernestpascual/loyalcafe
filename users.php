<?php
class Users {

// declare private variables email, password, fname, lname, gender, birthday
private $email;
private $password;
private $fname;
private $lname;
private $gender;
private $birthday;


// getters and setters
// email
function set_email($new_email){
    $this -> email = $new_email;
}

function get_email(){
    return $this -> email;
}

//password
function set_password($new_password){
    $this -> password = $new_password;
}

function get_password(){
    return $this -> password;
}

//fname
function set_fname($new_fname){
    $this -> fname = $new_fname;
}

function get_fname(){
    return $this -> fname;
}

//lname
function set_lname($new_lname){
    $this -> fname = $new_fname;
}

function get_lname(){
    return $this -> lname;
}


//gender
function set_gender($new_gender){
    $this -> gender = $new_gender;
}

function get_gender(){
    return $this -> gender;
}


//birthday
function set_birthday($new_birthday){
    $this -> fname = $new_birthday;
}

function get_birthday(){
    return $this -> birthday;
}


}



?>