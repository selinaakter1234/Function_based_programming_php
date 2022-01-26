<?php
require_once '../db.php';
// print_r($_GET);
  //echo $_GET['funfact_head_id'] ;
 $id = $_GET['funfact_head_id'];


$update_query = "UPDATE funfacts SET  active_status=1 WHERE id= $id ";

mysqli_query($db_connect,$update_query);
 
 header('location: funfact.php');

?>