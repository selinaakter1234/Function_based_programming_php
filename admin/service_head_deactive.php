<?php
require_once '../db.php';
// print_r($_GET);
  //echo $_GET['service_head_id'] ;
 $id = $_GET['service_head_id'];


$update_query = "UPDATE service_heads SET  active_status=2 WHERE id= $id ";

mysqli_query(db_connect(),$update_query);
 
 header('location: service_head.php');

?>