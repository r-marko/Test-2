<?php
class FetchDataArrayFromDatabase{
include "mysql_con.php";
include "table_create.php";

$newconnection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
function __construct($value){
$sql="SELECT $value FROM register;";
}
$result = mysqli_query($newconnection, $sql);
$data = array();

if (mysqli_num_rows($result)>0){
 while ($row = mysqli_fetch_assoc($result)){
    // echo $row['uidname']; 
    $data[] = $row;
    }
}
public function getData(){
    return $this->data;
}
}
?>