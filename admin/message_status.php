<?php
require_once '../db.php';
// print_r($_GET);
//  echo $_GET['message_id'] ;
 $id = $_GET['message_id'];
$update_query = "UPDATE guest_messages SET  read_status=2 WHERE id= $id ";


mysqli_query(db_connect(),$update_query);
 
 header('location: guest_message.php');

?>