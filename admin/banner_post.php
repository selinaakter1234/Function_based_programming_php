<?php
session_start();
require_once '../db.php';
$banner_sub_title = $_POST['banner_sub_title'];
$banner_title = $_POST['banner_title'];
$banner_detail = $_POST['banner_detail'];

// print_r($_FILES['banner_image']);
$upload_image_original_name = $_FILES['banner_image']['name'];
$upload_image_original_size = $_FILES['banner_image']['size'];
 if($upload_image_original_size <= 20000000){
 $after_explode = explode('.', $upload_image_original_name);
 $image_extention = end($after_explode);
 $allow_extention = array('jpg','JPG','jpeg','JPEG','png','PNG');
if(in_array($image_extention,$allow_extention)){
  $insert_query ="INSERT INTO banners (banner_sub_title,banner_title,banner_detail,image_location)
  VALUES ('$banner_sub_title','$banner_title','$banner_detail','primary location' )";
  mysqli_query($db_connect,$insert_query);
  $id_from_db =mysqli_insert_id($db_connect);

  $image_new_name =  $id_from_db . "." . $image_extention;
$save_location ="../uploads/banner/".$image_new_name ;
//$saved_location="uploads/banner/".$image_new_name ;
move_uploaded_file($_FILES['banner_image']['tmp_name'],$save_location);
//echo "done";
$image_location = "uploads/banner/".$image_new_name;
$update_query = "UPDATE banners SET image_location='$image_location' WHERE id=$id_from_db";

mysqli_query($db_connect,$update_query);
//success msg add
$_SESSION['success_msg']='Banner insert succesful';
header('location: banner.php');


}
else{
    echo "pai nai";
}


 }
 else{
     echo "your file is too big!! more than 2mb";
 }

?>