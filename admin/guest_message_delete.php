<?php
require_once '../db.php';
$id = $_GET['message_id'];

$delete_query = "DELETE FROM guest_messages WHERE id=$id";
mysqli_query(db_connect(), $delete_query);
header('location: guest_message.php');


?>