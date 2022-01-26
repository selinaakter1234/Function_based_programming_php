<?php
session_start();
 require_once('../header.php');
 require_once('../db.php');
 require_once('navbar.php');

if(!isset($_SESSION['user_status'])){
  header('location: ../login.php');
}

?>
<section>
     <div class="container">
         <div class="row">
             <div class="col-lg-6 m-auto">
                 <div class="card-header bg-secondary mt-4">
                     <h5 class="title text-capitalize text-white d-flex justify-content-between"> Password change form </h5>
                 </div>
                <div class="card-body">
                
                                              <!-- error msg pop up -->
                  <?php
                     if(isset($_SESSION['pass_change_err'])){
                 ?>

                     <div class="alert alert-danger" role="alert">
                      <?php
                             echo $_SESSION['pass_change_err'];
                            unset( $_SESSION['pass_change_err']);
                      ?>
                     </div>
                 <?php
                     }
                 ?>
                 <!-- end -->
                  <!-- success msg pop up -->
                  <?php
                     if(isset($_SESSION['pass_change_ok'])){
                 ?>

                     <div class="alert alert-danger" role="alert">
                      <?php
                             echo $_SESSION['pass_change_ok'];
                            unset( $_SESSION['pass_change_ok']);
                      ?>
                     </div>
                 <?php
                     }
                 ?>
                 <!-- end -->
                 <form action="change_password_post.php" method="POST">

                        <div class="row">
                             <div class="col">
                               <label for="inputName">Old password</label>
                               <input type="password" class="form-control" id="inputName" name="old_pass" >
        
                               <label for="phone14">New password</label>
                               <input type="password" class="form-control" id="phone14" name="new_pass" >

                               <label for="inputPassword4">Confirm Password</label>
                               <input type="password" class="form-control" id="inputPassword4"  name="confirm_pass">
                            </div>
                        </div>
                         <div>
                             <button type="submit" class="btn btn-primary mt-3">change</button>
                         </div>

                 </form> 

                </div>
             </div>
         </div>
     </div>
 </section>

<?php
require_once('../footer.php');
?>