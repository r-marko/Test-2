<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Marko Rakic">
    <meta name="description" content="Internship test.">
    <meta name="keywords" content="php, test, login, register">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
        background-image: url('photos/apple-code-coding-computer-574069.jpg');
        background-size: cover;
        background-position: top right; 
            }
        .h1 {
            text-align: left;
            padding-left: 2em
        }
        #register{
            align:left;
            margin-left:5em;
            height: 65vh;
            margin-top:-4vh;
        }
        .select{
            width:50%;
            margin: 0 auto;
        }
        label {
            margin-top:15px;
        }

    </style>
</head>
<body>

<h1 class="h1">Register</h1>
<section id="register">

<form action="" method="post">
    <?php
        if(file_exists("select.php")){require 'select.php';}
    ?>
    <br>
    <label for="email">E-mail:</label><br>
    <input type="email" name="email" title="Input your e-mail" placeholder="E-mail"> <br> <br>
    <label for="text">Name:</label><br>
    <input type="text" name="name" title="Please input only the alphabet letters" pattern="[a-zA-Z]*" placeholder="Name"> <br> <br>
    <label for="password">Password:</label> <br>
    <input type="password" name="password" title="Your password must contain at least one number, one uppercase and lower-case letter, and at least 6 characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Password"> <br> <br>
    <label for="password">Repeat password:</label><br>
    <input type="password" name="repeatpassword" title="Repeat your password" placeholder="Repeat password"> <br> <br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
try {
    if(file_exists("mysql_con.php")){
        require 'mysql_con.php';
    }
    else { 
        throw new Exception("Connection file don't exist or corrupt!");    
    }

}
catch(Exception $e){
    $e->getMessage();
}
try {
    if (file_exists('table_create.php')){
        require 'table_create.php';
    }
    else{
        throw new Exception("File for creating sql table missing!"); 
        if (file_exists("errorlog.php")){
            include "errorlog.php";
            }
    }
}
catch(Exception $e) {
    $e->getMessage();
}

//Validating the form


// clean all unwanthed characters
function clean_input($post_value){
    $post_value = strip_tags($post_value);
    $post_value = htmlentities($post_value);
    $post_value = str_ireplace(array("{", "}", "(", ")", ":", ";", "/", "$", "<", ">"), "", $post_value);
    return $post_value;
    }

class FormValidate {
    private $email= "";
    private $name = "";
    private $password = "";
//email validation
public function set_email($post_value){      
    /*It does't work  //ovo ne radi
   $this->email = test_input($post_value);
    try {
        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            throw new Exception("Invalid email format.");
            $email_message = FALSE;   // This line is to control if the required format of data is inserted so it can be passed into database
            return $email_message;
            if (file_exists("user_errorlog.php")){
                include "user_errorlog.php";
                }
        }
        else {
            $email_message = TRUE;
            return $email_message;
            $this->email = $post_value;
        }    
    }
    catch(Exception $e) {
        $e->getMessage();
    }*/
    $this->email = $post_value;
    $email_message = TRUE;
}
//
public function set_name($post_value){
    $name_message = TRUE;
    (ctype_alpha($post_value) && preg_match("/^[a-zA-Z]+$/", $post_value)) ? $this->name = $post_value : $name_message = FALSE;
        return $name_message;
}
public function set_password($post_value){
    $password_message = TRUE;
    ((preg_match("/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.{6,}).*$/", $post_value)) && (strlen($post_value)>=6)) ? $this->password = $post_value : $password_message = FALSE;
        return $password_message;

}

public function get_email(){
   return $this->email;
}
public function get_name(){
    return $this->name;
}
public function get_password(){
    return $this->password;
}

}// end of class

try{
if ((isset($_POST['email'])) && (isset($_POST['name'])) && (isset($_POST['password'])) && ($_POST['password'] === $_POST['repeatpassword']) && (isset($_POST['submit']))) {
    $validtae_object= new FormValidate();
    //returning true message if validating done seccessfuly, or false if validating failed
    $email_message = $validtae_object->set_email($_POST['email']);
    $name_message = $validtae_object->set_name($_POST['name']);
    $password_message = $validtae_object->set_password($_POST['password']);

    //returning an email, name and value from object
    $email = clean_input($validtae_object->get_email());
    $nameid = clean_input($validtae_object->get_name());
    $pass = clean_input($validtae_object->get_password());
    $passwordid = password_hash($pass, PASSWORD_DEFAULT);

    //fetching data from select field and placing them into variables.
    $select_first = $_POST['frontback'];
    $select_second = $_POST['subclass1'];
    $select_third = $_POST['subclass2'];
    $select_fourth = $_POST['subclass3'];

   
  //try { 
       //if everythin is a true, than we can inserting data in database  //, ali iz nekog razloga ne radi
    // if(($email_message == FALSE) || ($name_message == FALSE) || ($password_message == FALSE)){ 
    //     echo "validation messages false";
    // } 
    // else{
        if (file_exists("mysql_con.php") && file_exists("table_create.php")){
            require_once "mysql_con.php";
            require_once "table_create.php";
        }
        // inserting data into database

                $dbinsertquery = "INSERT INTO register VALUES (
                    '$select_first', '$select_second', '$select_third', '$select_fourth', '$email', '$nameid', '$passwordid');";

        // mathing if the same name allready exsist in database  
                $select_name_from_db= "SELECT uidname FROM register;";
                $newconnection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
                $fetch_name = mysqli_query($newconnection, $select_name_from_db);

                if (mysqli_num_rows($fetch_name)>0){
                while ($row = mysqli_fetch_assoc($fetch_name)){
                $ime = $row['uidname'] . ",";
                $ime_arr = explode (",", $ime);
                //print_r($ime_arr);
                }
                
                } 
                if (in_array($_POST['name'], $ime_arr)){    // mathing the name
                    echo "This name already existing in database";
                }
                else{
                if (mysqli_query($newconnection, $dbinsertquery)) {
                    echo $_POST['name'] . ", you have been registered successfully";
                    } 
                else {
                    echo "Error: something went wrong. ";
                    }  
                }
                mysqli_close($newconnection);
    }
    else{
             throw new Exception("Empty field or password isn't repeated correctly");
         }
    }
// catch(Exception $e) {
//          echo $e->getMessage();
//                 }
        //}
   // }
    // }
    catch(Exception $e) {
        echo $e->getMessage();
    }
//} 

//  else {
//     throw new Exception("Please note that all fields should be fullfiled correctly.");
//     if (file_exists("user_errorlog.php")){
//         include "user_errorlog.php";
//         }
//    }
//}
// catch(Exception $e) {
//     echo $e->getMessage();
// }


?>
</section>
</body>