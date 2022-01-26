<?php
session_start();
require_once('../header.php');
require_once('navbar.php');
require_once('../db.php');


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
$get_query = "SELECT * FROM service_heads";
$from_db = mysqli_query(db_connect(), $get_query);
//$after_Assoc = mysqli_fetch_assoc($from_db);

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize text-center">
                            service heading add form
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="service_head_post.php" method="POST">
                            <div class="mb-3">
                                <label lass="">black heading</label>
                                <input type="text" class="form-control" name="black_head">
                            </div>
                            <div class="mb-3">
                                <label lass="">green heading</label>
                                <input type="text" class="form-control" name="green_head">
                            </div>
                            <div class="mb-3">
                                <label lass="">sub heading</label>
                                <input type="text" class="form-control" name="service_sub_head">
                            </div>
                            <div class="mb-3">
                                <button class="btn-success text-white border-0 rounded">add</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize text-center">
                            service heading details
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>black head</th>
                                <th>green head</th>
                                <th>sub head</th>
                                <th>active status</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                <?php foreach($from_db as $service_head): ?>
                                <tr>
                                <td><?= $service_head['black_head'] ?></td>
                                <td><?= $service_head['green_head'] ?></td>
                                <td><?= $service_head['service_sub_head']?></td>
                                <td>
                                
                                <?php
                                            if ($service_head['active_status'] == 1) :
                                            ?>
                                                <a href="service_head_deactive.php?service_head_id=<?= $service_head['id'] ?>"  class="btn btn-sm btn-success m-2 border border-3 rounded-pill">make de-active</a>
                                            <?php
                                            else :
                                            ?>
                                                <a href="service_head_active.php?service_head_id=<?= $service_head['id'] ?>"  class="btn btn-sm btn-warning m-2 border border-3 rounded-pill">make active</a>
                                            <?php
                                            endif
                                            ?>

                                </td>
                                <td>
                                            <div class="btn-group" role="group" aria-label="basic example">
                                                
                                                <a href="service_head_delete.php?service_head_id=<?= $service_head['id'] ?>" class="btn btn-sm btn-danger m-2 d-flex align-items-center border border-3 rounded-pill">delete</a>
                                            </div>
                                 </td>
                                </tr>
                               
                            </tbody>
                            <?php 
                            endforeach
                            ?>
                        </table>


                    </div>
                </div>


            </div>
        </div>
    </div>
</section>












<?php
require_once '../footer.php';
?>