<?php
session_start();
 require_once('../header.php');
 require_once('../db.php');
 require_once('navbar.php');
$login_email= $_SESSION['email'];
$get_query = "SELECT user_name,email,phone FROM users WHERE email= '$login_email'";
$db_result = mysqli_query($db_connect,$get_query);
$after_assoc = mysqli_fetch_assoc($db_result);


 if(!isset($_SESSION['user_status'])){
  header('location: ../login.php');
}
?>
<section>
     <div class="container">
         <div class="row">
             <div class="col-lg-8 m-auto">
                 <div class="card-header bg-primary mt-4">
                     <h5 class="title text-capitalize text-white d-flex justify-content-between">
                         profile information <a href="profile_edit.php" class="btn btn-mm btn-secondary text-white">edit</a>
                        </h5>
                 </div>
                <div class="card-body">
                    <p> <span class="text-primary text-capitalize me-2">name:</span>  <?=$after_assoc['user_name'] ?> </p>
                    <p> <span class="text-primary text-capitalize me-2">email:</span> <?=$after_assoc['email'] ?>     </p>
                    <p> <span class="text-primary text-capitalize me-2">phone:</span> <?=$after_assoc['phone'] ?>     </p>

                </div>
             </div>
         </div>
     </div>
 </section>

<?php
require_once('../footer.php');
?>