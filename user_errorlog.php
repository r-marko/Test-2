<?php
date_default_timezone_set("Europe/Belgrade");
$date = date("Y-m-d H:i:s");
$error_log_msg =$date."|". $e->getMessage()."|". $e->getLine()."|". $e->getCode();
$user_error_log = 'User-Errors.log';
error_log($error_log_msg, 3, $user_error_log); // Creating an user error_log file
?>