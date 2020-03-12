<?php
//Creating table in database
$creating_table = "CREATE TABLE IF NOT EXISTS Register(
    soption1 VARCHAR(40) NOT NULL, 
    soption2 VARCHAR(40),
    soption3 VARCHAR(40),
    soption4 VARCHAR(40),
    email VARCHAR(40) NOT NULL,
    uidname VARCHAR(40) NOT NULL PRIMARY KEY,
    uidpassword VARCHAR(255) NOT NULL)";

?>