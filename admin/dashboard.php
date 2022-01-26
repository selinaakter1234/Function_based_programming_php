<?php
session_start();
require_once('../header.php');
require_once('navbar.php');
require_once('../db.php');


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

// $get_query = "SELECT id,user_name,email,phone FROM users";
// $from_db = mysqli_query(db_connect(), $get_query);
// $after_assoc = mysqli_fetch_assoc($from_db);
// print_r($after_assoc);
?>

<section>

 <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card mt-3">
                    <div class="card-header bg-success text-white text-center">
                        <h4>all user informations </h4>
                    </div>
                    <div class="card-body">
                <table class="table table-success table-bordered table-striped">
                    <thead>
                     <tr>
                         <th scope="col">ID</th>
                         <th scope="col">user_name</th>
                         <th scope="col">email</th>
                         <th scope="col">phone</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach(get_all('users') AS $user){
                        ?>
                         <tr>
                            <td> <?=$user['id']?> </td>
                            <td> <?=$user['user_name']?> </td>
                            <td> <?=$user['email']?> </td>
                            <td> <?=$user['phone']?> </td>
                        
                         </tr>

                        <?php
                        }
                        ?>  
                    </tbody>

                </table>

                    </div>
                </div>
           </div>
        </div>
   </div>

</section>



<?php
require_once('../footer.php');
?>