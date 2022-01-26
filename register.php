<?php
session_start();
 require_once('header.php');
 if(isset($_SESSION['user_status'])){
  header('location: admin/dashboard.php');
}
?>

<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card mt-3">
        <div class="card-header bg-success text-white text-center">
         <h4 class="card-title mb-0 text-white text-capitalize d-flex justify-content-between">registration form <a href="login.php" class="text-white">login</a></h4>
        </div>
        
        <div class="card-body">
          <?php
          if(isset($_SESSION['err_msg'])){
          ?>

        <div class="alert alert-danger" role="alert">
              <?php
              echo $_SESSION['err_msg'];
              unset( $_SESSION['err_msg']);
              ?>
        </div>
          <?php
          }
          ?>

          <?php
          if(isset($_SESSION['success_msg'])){
          ?>

        <div class="alert alert-success" role="alert">
              <?php
              echo $_SESSION['success_msg'];
              unset( $_SESSION['success_msg']);
              ?>
        </div>


          <?php
          }
          ?>


          <form action="register_post.php" method="POST">

            <div class="row">
              <div>
                
                <label for="inputname">Your name</label>
                <input type="text" class="form-control" id="inputname" placeholder="Enter your First name" name="user_name">
              </div>

              <div >
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your Email" name="email">
              </div>

              <div>
                <label for="inputphone">Phone number</label>
                <input type="text" class="form-control" id="inputphone" placeholder="Enter your phone number" name="phone">
              </div>
              

              <div>
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Enter your Password" name="password">
              </div>
            </div>

            
            <div>
            <button type="submit" class="btn btn-primary mt-3">Sign in</button>
            <button type="reset" class="btn btn-primary mt-3">Reset</button>
            </div>
            
          </form>
    </div>
  </div>

</div>
</div>

<div>
</div>

<?php
require_once('footer.php');
?>