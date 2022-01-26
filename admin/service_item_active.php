<?php
require_once '../db.php';
// print_r($_GET);
  //echo $_GET['service_id'] ;
 $id = $_GET['service_id'];


$update_query = "UPDATE service_items SET  active_status=1 WHERE id= $id ";

mysqli_query(db_connect(),$update_query);
 
 header('location: service_item.php');

?>