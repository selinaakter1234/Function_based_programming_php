<?php
session_start();
require_once('../header.php');
require_once('navbar.php');
require_once('../db.php');


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
$get_query = "SELECT * FROM funfacts";
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
                            funfact heading add form
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="funfact_post.php" method="POST">
                            <div class="mb-3">
                                <label lass="">sub heading</label>
                                <input type="text" class="form-control" name="sub_head" value="<?=(isset($_SESSION['sub_head_done'])) ? $_SESSION['sub_head_done'] : '' ?>">
                                 <?php  if(isset($_SESSION['sub_head_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['sub_head_err']?></small>
                                     <?php unset($_SESSION['sub_head_err']) ?>
                                 <?php endif ?> 
                            </div>

                        
                            <div class="mb-3">
                                <label lass="">white heading</label>
                                <input type="text" class="form-control" name="white_head" value="<?=(isset($_SESSION['white_head_done'])) ? $_SESSION['white_head_done'] : '' ?>">
                                <?php  if(isset($_SESSION['white_head_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['white_head_err']?></small>
                                     <?php unset($_SESSION['white_head_err']) ?>
                                 <?php endif ?>
                            </div>


                            <div class="mb-3">
                                <label lass="">green heading</label>
                                <input type="text" class="form-control" name="green_head" value="<?=(isset($_SESSION['green_head_done'])) ? $_SESSION['green_head_done'] : '' ?>">
                                <?php  if(isset($_SESSION['green_head_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['green_head_err']?></small>
                                     <?php unset($_SESSION['green_head_err']) ?>
                                 <?php endif ?>
                            </div>


                            <div class="mb-3">
                                <label lass="">paragraph one</label>
                                <input type="text" class="form-control" name="para_one" value="<?=(isset($_SESSION['para_one_done'])) ? $_SESSION['para_one_done'] : '' ?>">
                                <?php  if(isset($_SESSION['para_one_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['para_one_err']?></small>
                                     <?php unset($_SESSION['para_one_err']) ?>
                                 <?php endif ?>
                            </div>


                            <div class="mb-3">
                                <label lass="">paragraph two</label>
                                <input type="text" class="form-control" name="para_two" value="<?=(isset($_SESSION['para_two_done'])) ? $_SESSION['para_two_done'] : '' ?>">
                                <?php  if(isset($_SESSION['para_two_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['para_two_err']?></small>
                                     <?php unset($_SESSION['para_two_err']) ?>
                                 <?php endif ?>
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
                            funfact head details
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>sub head</th>
                                <th>white head</th>
                                <th>green head</th>
                                <th>paragraph one</th>
                                <th>paragraph two</th>
                                <th>active status</th>
                                <th>action</th>
                            </thead>
                             <tbody>
                                <?php foreach ($from_db as $funfact) : ?>
                                    <tr>
                                        <td><?=$funfact['sub_head'] ?></td>
                                        <td><?=$funfact['white_head']?></td>
                                        <td><?=$funfact['green_head']?></td>
                                        <td><?=$funfact['para_one'] ?></td>
                                        <td><?=$funfact['para_two'] ?></td>
                                        <td>

                                            <?php
                                            if ($funfact['active_status'] == 1) :
                                            ?>
                                                <a href="funfact_deactive.php?funfact_head_id=<?= $funfact['id'] ?>" class="btn btn-sm btn-success m-2 border border-3 rounded-pill">make de-active</a>
                                            <?php
                                            else :
                                            ?>
                                                <a href="funfact_active.php?funfact_head_id=<?= $funfact['id'] ?>" class="btn btn-sm btn-warning m-2 border border-3 rounded-pill">make active</a>
                                            <?php
                                            endif
                                            ?>

                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="basic example">

                                                <a href="funfact_delete.php?funfact_head_id=<?= $funfact['id'] ?>" class="btn btn-sm btn-danger m-2 d-flex align-items-center border border-3 rounded-pill">delete</a>
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