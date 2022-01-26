<?php
require_once '../db.php';
$id = $_GET['funfact_head_id'];

$delete_query = "DELETE FROM funfacts WHERE id=$id";
mysqli_query(db_connect(), $delete_query);
header('location: funfact.php');


?>