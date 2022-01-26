<?php
//db info
$db_host_name = 'localhost';
$db_user_name = "root";
$db_password = "";
$db_name = "practical_two";

//db connection
$db_connect = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
if(!$db_connect){
    die("failed");
}
?>