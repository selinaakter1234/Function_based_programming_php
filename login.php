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
                    <h4 class="card-title mb-0 text-white text-capitalize d-flex justify-content-between">login form <a href="register.php" class="text-white">create a new account</a></h4>
                </div>
                <div class="card-body">
                <?php
                    if (isset($_SESSION['login_err'])) {
                ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['login_err'];
                            unset($_SESSION['login_err']);
                            ?>
                        </div>
                <?php
                    }
                ?>
                    <form action="login_post.php" method="POST">

                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                            </div>
                       </div>
                            <div>
                                <button type="submit" class="btn btn-primary mt-3">login</button>
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