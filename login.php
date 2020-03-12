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
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-image: url('photos/trees-during-day-3573351.jpg');
        }
        #login {
                display:flex;
                flex-direction: column;
                height: 35vh;
        }
    </style>
</head>
<body>
<h1 class="h1">Log In</h1>
<section id="login">
    <form action="" method="post">
        <br>
        <label for="email">E-mail</label><br>
        <input type="email" name="email2" title="Input your e-mail address" placeholder="E-mail">
        <br> <br>
        <label for="password">Password</label><br>
        <input type="password" name="password" title="Input your password" placeholder="Password">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (!isset($_SESSION['username'])) {
        echo "Please log in to see the resulst";
    }else{
        echo "Welcome" . $_SESSION['username'];
    }
    try{
    if (isset($_POST['submit'])){
        //the code below don't work
    /*    if(file_exists("fetch_mysql_data.php")){
            include_once "fetch_mysql_data.php";
        } 
        else {
            throw new Exception("Fetch data file missing or corrupt.");
        }
        $fetch_data_email = new FetchDataArrayFromDatabase('email');
        $data_email = $fetch_data_email->getData();
        print_r($data_email);
        $fetch_data_password = new FetchDataArrayFromDatabase('uidpassword');
        $data_password = $fetch_data_password->getData();
        echo $data_email;
    */
    include "mysql_con.php";
    include "table_create.php";

    $newconnection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    $sql="SELECT email FROM register;";  //start to fetching data from email row in database
    $result = mysqli_query($newconnection, $sql);

    if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){ 
    //$data[] = $row;
    $a = $row['email'] . ",";
    $email_arr = explode (",", $a); //making array of emails from string
         }
    }  // end of fetching data from email row


    $sqlpwd="SELECT uidpassword FROM register;";  //start to fetching data from uidpassword row in database
    $result = mysqli_query($newconnection, $sqlpwd);

    if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){ 
        $b = $row['uidpassword'] . ",";
        $password_arr =  explode (",", $b); //making array of passwords from string
         }
    }     // end of fetching data from uidpassword row
    foreach ($password_arr as $pass_value){
        if(password_verify($_POST['password'], $pass_value)){  //verifying hashed password
            $password_message = TRUE;
        } else {$password_message = FALSE;}
    }

    if (in_array($_POST['email2'], $email_arr) &&  $password_message = TRUE){
        $_SESSION['username'] = $_POST['email2'];
        echo "<br>Log In secessful!";
    } else {
        echo "<br>Try again";
    }


    if (isset($_SESSION['username']) && isset($_SESSION['search'])){
        header("Location: http://localhost/Test-2/search.php");
    }
    

       
    } //if

    } //try
    catch(Exception $e) {
        $e->getMessage();
    }
    ?>
</section>
</body>