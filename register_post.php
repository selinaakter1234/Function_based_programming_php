<?php
session_start();
//db info
$db_host_name = 'localhost';
$db_user_name = "root";
$db_password = "";
$db_name = "practical_two";

//db connection
$db_connect = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

//information from form
$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone = $_POST['phone'];
$password = $_POST['password'];
$validated_email = filter_var($email, FILTER_VALIDATE_EMAIL);

if ($user_name == null) {
            
            $_SESSION['err_msg']= "insert your name";
                    header('location: register.php');
        } 
        else {
            if ($email == null) {
                $_SESSION['err_msg']= "insert email, email can not be emty";
                header('location: register.php');
            }
            else {

                if ($phone == null) {
                    $_SESSION['err_msg']= "insert phone numner";
                    header('location: register.php');
                } 
                else {
                    //echo "info insert succesfull";
 //password rules;
$pass_cap = preg_match('@[A-Z]@', $password);
$pass_small = preg_match('@[a-z]@', $password);
$pass_num = preg_match('@[0-9]@', $password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$pass_char = preg_match($pattern, $password);

if (strlen($password) > 5 && $pass_cap == 1 && $pass_small == 1 && $pass_num == 1  && $pass_char == 1) {
    //echo "strong password";
    $encrypted_password = md5($password);

    $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$validated_email' ";
    $db_result = mysqli_query($db_connect, $checking_query);
    $after_assoc = mysqli_fetch_assoc($db_result);
    print_r($after_assoc);
    if ($after_assoc['total_users'] == 0) {
        
        //insert query
         $insert_query = "INSERT INTO users (user_name, email,phone, password) VALUES ('$user_name','$email','$phone','$encrypted_password')";
         mysqli_query($db_connect, $insert_query);
        $_SESSION['success_msg']="registration successful";
        header('location: register.php');
    }
     else {
        
        $_SESSION['err_msg']="already registered";
        header('location: register.php');
    }
}
 else {

    $_SESSION['err_msg']="password must be 6 char,1 cap,1 small, 1numner,1 special charecter";
    header('location: register.php');
}

}
                

 }
            
 }
