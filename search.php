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
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    body {
        background-image: url('photos/white-and-gray-bird-on-the-bag-of-brown-and-black-pig-66258.jpg');
        background-size: cover;
        background-position: top right; 
    }
    .h1 {
            text-align: right;
            padding-right: 3em;
        }
    #search{
            display:flex;
            flex-direction:row;
            align:right;
            margin-right:6em;
            margin-top:8em;
        }
    #aside1{
        width:50%;
        border-right:1px dashed black;
    }
    #aside2{
        width:50%;
    }
    </style>
</head>
<body>

<h1 class="h1">Search</h1>
<section id="search">
<?php
if(!isset($_SESSION['username'])) {
    echo "No data available, please log in.";
} 
else{

?>

    <aside id="aside1">
    </aside>
    <aside id="aside2">
    
    </aside>
</section>
<?php  } ?>
</body>