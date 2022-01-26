<?php

function db_connect(){

//db info
$db_host_name = 'localhost';
$db_user_name = "root";
$db_password = "";
$db_name = "practical_two";
//db connection
return $db_connect = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
}

?>