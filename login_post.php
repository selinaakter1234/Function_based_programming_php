<?php
session_start();
//db info
require_once('db.php');

//information from form

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
 $password = md5($_POST['password']);
//  $password = ($_POST['password']);


$checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$email' AND password='$password' ";
$from_result = mysqli_query(db_connect(), $checking_query);
$after_assoc = mysqli_fetch_assoc($from_result);
print_r($after_assoc);
if ($after_assoc['total_users'] == 1) {

    $_SESSION['email']= $email;
    $_SESSION['user_status']= "yes";
    header('location: admin/dashboard.php');
}
 else {
    
    $_SESSION['login_err']="your credential are wrong or create a new account";
    header('location: login.php');

}



?>