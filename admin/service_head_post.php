<?php
require_once '../db.php';
//print_r($_POST);
 $black_head =$_POST['black_head'];
 $green_head =$_POST['green_head'];
 $service_sub_head =$_POST['service_sub_head'];

//  inser query 
$insert_query = "INSERT INTO service_heads (black_head,green_head,service_sub_head) VALUES('$black_head','$green_head','$service_sub_head')";
mysqli_query($db_connect,$insert_query);
header('location: service_head.php');
?>