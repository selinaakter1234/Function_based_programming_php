<?php
//print_r($_POST);
session_start();
require_once '../db.php';

$login_email= $_SESSION['email'];

if($_POST['old_pass'] == NULL || $_POST['new_pass'] == NULL || $_POST['confirm_pass'] == NULL ){
    $_SESSION['pass_change_err']="all filled required !";
    header('location: change_password.php');
}

else {
  
    if(strlen($_POST['old_pass']) > 5 && strlen($_POST['new_pass']) > 5 && strlen($_POST['confirm_pass']) > 5 ){
      $password= $_POST['new_pass'];
       //password rules;
$pass_cap = preg_match('@[A-Z]@', $password);
$pass_small = preg_match('@[a-z]@', $password);
$pass_num = preg_match('@[0-9]@', $password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$pass_char = preg_match($pattern, $password);

if ( $pass_cap == 1 && $pass_small == 1 && $pass_num == 1  && $pass_char == 1) {
    //echo "strong password";
 if($_POST['new_pass'] == $_POST['confirm_pass']){

   if($_POST['new_pass'] != $_POST['old_pass']){
    $encrypted_old_password = md5($_POST['old_pass']);

    $checking_query = "SELECT COUNT(*) AS total_user FROM users WHERE email='$login_email' AND password='$encrypted_old_password' ";
    $db_result = mysqli_query($db_connect, $checking_query);
    $after_assoc = mysqli_fetch_assoc($db_result);

    $new_pass= $_POST['new_pass'];
    $encrypted_new_password = md5($new_pass);
  

    if($after_assoc['total_user'] == 1){
          $update_query = " UPDATE users SET password = '$encrypted_new_password' WHERE email='$login_email' ";
             mysqli_query($db_connect,$update_query);
             $_SESSION['pass_change_ok']="password change successfull";
            header('location: change_password.php');

    }
    else{
        $_SESSION['pass_change_err']="old password did not match";
    header('location: change_password.php');
    }



   }
   else{
    $_SESSION['pass_change_err']="you entered same password";
    header('location: change_password.php');


   }

 }
 else{
    $_SESSION['pass_change_err']="confirm ur pass,new password did not match";
    header('location: change_password.php');


 }




}

else{

        $_SESSION['pass_change_err']="password must be 1 cap,1 small, 1numner,1 special charecter";
        header('location: change_password.php');
}


    }
    else{
        $_SESSION['pass_change_err']="password must be 6 charecter";
        header('location: change_password.php');
    }

 
   
}



?>
