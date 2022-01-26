<?php
session_start();
require_once('../header.php');
require_once('navbar.php');
require_once('../db.php');


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
$get_query = "SELECT * FROM funfact_items";
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
                            funfact item add form
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="funfact_item_post.php" method="POST">
                            <div class="mb-3">
                                <label lass="">fun number</label>
                                <input type="text" class="form-control" name="fun_num">
                            </div>
                            <div class="mb-3">
                                <label lass="">fun item heading</label>
                                <input type="text" class="form-control" name="fun_item_head">
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
                            funfact item details
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>fun number</th>
                                <th>fun item head</th>
                                
                                <th>active status</th>
                                <th>action</th>
                            </thead>
                             <tbody>
                                <?php foreach ($from_db as $funfact) : ?>
                                    <tr>
                                        <td><?=$funfact['fun_num'] ?></td>
                                        <td><?=$funfact['fun_item_head']?></td>
                                        
                                        <td>

                                            <?php
                                            if ($funfact['active_status'] == 1) :
                                            ?>
                                                <a href="funfact_item_deactive.php?funfact_head_id=<?= $funfact['id'] ?>" class="btn btn-sm btn-success m-2 border border-3 rounded-pill">make de-active</a>
                                            <?php
                                            else :
                                            ?>
                                                <a href="funfact_item_active.php?funfact_head_id=<?= $funfact['id'] ?>" class="btn btn-sm btn-warning m-2 border border-3 rounded-pill">make active</a>
                                            <?php
                                            endif
                                            ?>

                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="basic example">

                                                <a href="funfact_item_delete.php?funfact_head_id=<?= $funfact['id'] ?>" class="btn btn-sm btn-danger m-2 d-flex align-items-center border border-3 rounded-pill">delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                     endforeach
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
require_once '../footer.php';
?>