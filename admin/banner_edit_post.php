<?php
session_start();
require_once '../db.php';
$id = $_POST['id'];
$banner_sub_title = $_POST['banner_sub_title'];
$banner_title = $_POST['banner_title'];
$banner_detail = $_POST['banner_detail'];

$update_query = "UPDATE banners SET banner_sub_title ='$banner_sub_title',banner_title='$banner_title',banner_detail='$banner_detail' WHERE= id=$id ";

// image update
if($_FILES['banner_image']){
    $uploaded_image_original_name = $_FILES['banner_image']['name'];
    $uploaded_image_original_size = $_FILES['banner_image']['size'];

    if($uploaded_image_original_size <= 20000000){
        $after_explode = explode('.', $uploaded_image_original_name);
        $image_extention = end($after_explode);
        $allow_extention = array('jpg','JPG','jpeg','JPEG','png','PNG');
       if(in_array($image_extention,$allow_extention)){
           //delete query
         $get_image_location_query = " SELECT image_location FROM banners where id = $id";

         $image_location_from_db = mysqli_query(db_connect(), $get_image_location_query);
         $after_assoc_image_location =mysqli_fetch_assoc( $image_location_from_db);
         

         unlink("../".$after_assoc_image_location['image_location']);



        // $id_from_db =mysqli_insert_id(db_connect());
       
         $image_new_name =  $id . "." .$image_extention;
       $save_location ="../uploads/banner/".$image_new_name ;
       move_uploaded_file($_FILES['banner_image']['tmp_name'],$save_location);


       //echo "done";
       $image_location = "uploads/banner/".$image_new_name;
       $update_image_query = "UPDATE banners SET image_location='$image_location' WHERE id=$id";
       
       mysqli_query(db_connect(),$update_image_query);
       header('location: banner.php');
       
       
       }
       else{
           echo "pai nai";
       }
       
       
        }
        else{
            echo "your file is too big!! more than 2mb";
        }

}














?>