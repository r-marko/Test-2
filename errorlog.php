<?php
date_default_timezone_set("Europe/Belgrade");
$date = date("Y-m-d H:i:s");
$error_log_message =$date."|". $e->getMessage()."|". $e->getLine()."|". $e->getCode();
$error_log = 'Errors.log';
error_log($error_log_mssage, 3, $error_log); // Creating and writing in error_log file
error_log("Date | Time: $date - Huge problem with application, check Errors.log file for details", 1, "something@quantox.com", "Subject: Application Error\ nFrom: Error log <system@errorlog.com>". "\n"); //Sending error log notification to e-mail
?>