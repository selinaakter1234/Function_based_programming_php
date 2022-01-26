<?php
session_start();
require_once '../db.php';

//print_r($_POST);
 $sub_head =$_POST['sub_head'];
 $white_head =$_POST['white_head'];
 $green_head =$_POST['green_head'];
 $para_one =$_POST['para_one'];
 $para_two =$_POST['para_two'];



$flag = true;

if(!$sub_head){
   $_SESSION['sub_head_err'] = "sub head required";
   $flag= false;
}
else{
    $_SESSION['sub_head_done'] = $sub_head;
}
if(!$white_head){
   $_SESSION['white_head_err'] = "white head required";
   $flag= false;
}
else{
    $_SESSION['white_head_done'] = $white_head;
}
if(!$green_head){
   $_SESSION['green_head_err'] = "green head required";
   $flag= false;
}
else{
    $_SESSION['green_head_done'] = $green_head;
}
if(!$para_one){
   $_SESSION['para_one_err'] = "para one required";
   $flag= false;
}
else{
    $_SESSION['para_one_done'] = $para_one;
}
if(!$para_two){
   $_SESSION['para_two_err'] = "para two required";
   $flag= false;
}
else{
    $_SESSION['para_two_done'] = $para_two;
}

if($flag){
   

   //  inser query 
$insert_query = "INSERT INTO funfacts (sub_head,white_head,green_head,para_one,para_two) VALUES('$sub_head','$white_head','$green_head','$para_one','$para_two')";
mysqli_query($db_connect,$insert_query);

unset( $_SESSION['sub_head_done']);
unset( $_SESSION['white_head_done']);
unset( $_SESSION['green_head_done']);
unset( $_SESSION['para_one_done']);
unset( $_SESSION['para_two_done']);

header('location: funfact.php');
   
}
else{
    header('location: funfact.php');
}




?>