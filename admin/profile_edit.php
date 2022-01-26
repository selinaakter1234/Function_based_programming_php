<?php
session_start();
require_once('../header.php');
require_once('../db.php');
require_once('navbar.php');
$login_email = $_SESSION['email'];
$get_query = "SELECT user_name,phone,email FROM users WHERE email= '$login_email'";
$db_result = mysqli_query(db_connect(), $get_query);
$after_assoc = mysqli_fetch_assoc($db_result);


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card-header bg-primary mt-4">
                    <h5 class="title text-capitalize text-white text-center "> edit your profile</h5>
                </div>
                <div class="card-body">
                    <!-- error msg pop up -->
                    <?php
                    if (isset($_SESSION['profile-err'])) {
                    ?>

                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['profile-err'];
                            unset($_SESSION['profile-err']);
                            ?>
                        </div>
                    <?php
                    }
                    ?>



                    <!-- error msg pop up end -->


                    <form action="profile_edit_post.php" method="POST">

                        <div class="row">
                            <div class="col">



                                <label>Name</label>
                                <input type="text" class="form-control" name="user_name" value="<?= $after_assoc['user_name'] ?>">
                                <!-- type hidden *2nd way* -->

                                <label>phone</label>
                                <input type="text" class="form-control" name="phone" value="<?= $after_assoc['phone'] ?>">


                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary mt-3">update</button>
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