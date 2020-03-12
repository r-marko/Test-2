<?php 

$dbServerName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName;

$connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword);
if (mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}

if (!isset($dbName)){
    $create_db = "CREATE DATABASE IF NOT EXISTS database1";
    if(mysqli_query($connection, $create_db)){
       //echo "Database created seccessfully";   //Test is the database created seccessfully
       $dbName="database1";
       return $dbName;
       mysqli_close($connection);
    }
    else{
        echo "Error in creating databse: " . mysqli_error($connection);
        mysqli_close($connection);
    }
}  

// Establish the connection to database
$newconnection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
if (!$newconnection) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>