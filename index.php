<?php
session_start();
// $_SESSION['username'];
// $_SESSION['password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Marko Rakic">
    <meta name="description" content="Internship test.">
    <meta name="keywords" content="php, test, login, register">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h1 class="h1 home">Home</h1>
<?php if(!isset($_POST['submit'])):  ?> 
<section id="homeScreen">
<a href="login.php" class="a">Log In</a>
<a href="register.php" class="a">Register</a>
<form action="search.php" method="post" id="search">
<input type="text" name="search" title="Input your keywords, maximum 15 characters"  maxlength="15" placeholder="Search">
<br>
<?php if(file_exists("select.php")){require 'select.php';} ?>
<input type="submit" value="Search" name="submit">
</form>
</section>
<?php 
 else :
    if (isset($_SESSION['username'])){
        $_SESSION['search'] = $_POST['search'];
        $_SESSION['section1'] = $_POST['frontback'];
        $_SESSION['section2'] = $_POST['subclass1'];
        $_SESSION['section3'] = $_POST['subclass2'];
        $_SESSION['section4'] = $_POST['subclass3'];
        header("Location: http://localhost/Test-2/search.php");
    } else {
        $_SESSION['search'] = $_POST['search'];
        $_SESSION['section1'] = $_POST['frontback'];
        $_SESSION['section2'] = $_POST['subclass1'];
        $_SESSION['section3'] = $_POST['subclass2'];
        $_SESSION['section4'] = $_POST['subclass3'];
        header("Location: http://localhost/Test-2/login.php");
        echo "You got to be logged in to see the result";
    }endif;

?>
<?php
//Inputting the database and connection between
// try {
//     if (file_exists('mysql_con.php')){
//         require 'mysql_con.php';
// } else {
//     throw new Exception("Connection file missing or corrupt!");
//     if (file_exists("errorlog.php")){
//         include "errorlog.php";
//         }
//     }
// }
// catch(Exception $e) {
//     $e->getMessage();
// }
// try {
//     if (file_exists('table_create.php')){
//         require 'table_create.php';
//     }
//     else{
//         throw new Exception("File for creating sql table missing!"); 
//         if (file_exists("errorlog.php")){
//             include "errorlog.php";
//             }
//     }
// }
// catch(Exception $e) {
//     $e->getMessage();
// }
// $newconnection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
// if(mysqli_query($newconnection, $creating_table)){
// } else{
//     echo "ERROR: Could not able to execute $creating_table. " . mysqli_error($newconnection);
// }

// mysqli_close($newconnection);
// ?>
</body>
