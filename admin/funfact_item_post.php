<?php
require_once '../db.php';
//print_r($_POST);
 $fun_num =$_POST['fun_num'];
 $fun_item_head =$_POST['fun_item_head'];
 

//  inser query 
$insert_query = "INSERT INTO funfact_items (fun_num,fun_item_head) VALUES('$fun_num','$fun_item_head')";
mysqli_query($db_connect,$insert_query);
header('location: funfact_item.php');
?>