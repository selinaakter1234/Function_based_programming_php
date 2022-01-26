<?php
session_start();
require_once '../db.php';
//print_r($_POST);

// if (isset($_SESSION['user_status'])) {
//     header('location: ../index.php.php');
// }

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_message = $_POST['guest_message'];

$insert_query ="INSERT INTO guest_messages (guest_name, guest_email,guest_message) VALUES ( '$guest_name' , '$guest_email' , '$guest_message' )" ;


// if($_POST['guest_name'] == NULL || $_POST['guest_email'] == NULL || $_POST['guest_message'] == NULL ){
//     $_SESSION['guest_message_err']="all filled required !";
//     header('location: ../index.php');
// }
// else{
//     //echo "msg jabe";

// }

mysqli_query($db_connect, $insert_query);
header('location: ../index.php');




?>