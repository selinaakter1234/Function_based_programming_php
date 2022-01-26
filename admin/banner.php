<?php
session_start();
require_once('../header.php');
require_once('navbar.php');
require_once('../db.php');


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

// $get_query = "SELECT * FROM banners";
// $from_db = mysqli_query(db_connect(), $get_query);

?>

<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-3">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Add banner </h4>
                    </div>
                    <div class="card-body">
                        <form action="banner_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">banner sub title</label>
                                <input type="text" name="banner_sub_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">banner title</label>
                                <input type="text" name="banner_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">banner detail</label>
                                <input type="text" name="banner_detail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">banner image</label>
                                <input type="file" name="banner_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="form-control btn btn-primary">add banner</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
            <!-- banner column -->
            <div class="col-lg-9 ">
                <div class="card mt-3">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Banner details </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <th>SL</th>
                                <th>banner sub title </th>
                                <th>banner title</th>
                                <th>banner detail</th>
                                <th>image location</th>
                                <th>active status</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach (get_all('banners') as $key => $banner) :
                                ?>

                                    <tr>
                                        <td><?=$key+1?> </td>
                                        <td><?= $banner['banner_sub_title'] ?> </td>
                                        <td><?= $banner['banner_title'] ?> </td>
                                        <td><?= $banner['banner_detail']?> </td>

                                        <td>
                                            <img src="../<?=$banner['image_location'] ?>" alt="" style="width:100px;">

                                        </td>

                                        <td>
                                            <?php
                                            if ($banner['active_status'] == 1) :
                                            ?>
                                                <span class="badge badge-sm bg-success">active</span>
                                            <?php
                                            else :
                                            ?>
                                                <span class="badge badge-sm bg-warning">de-active</span>
                                            <?php
                                            endif
                                            ?>

                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="basic example">
                                            <?php
                                            if ($banner['active_status'] == 1) :
                                            ?>
                                                 <a href="banner_deactive.php?banner_id=<?= $banner['id'] ?>"  class="btn btn-sm btn-warning m-2 border border-3 rounded-pill">make de-active</a>
                                            <?php
                                            else :
                                            ?>
                                                 <a href="banner_active.php?banner_id=<?= $banner['id'] ?>"  class="btn btn-sm btn-primary m-2 border border-3 rounded-pill">make active</a>
                                            <?php
                                            endif
                                            ?>                                              
                                               
                                                <a href="banner_edit.php?banner_id=<?= $banner['id'] ?>"  class="btn btn-sm btn-info m-2 d-flex align-items-center border border-3 rounded-pill">edit</a>
                                                <a href="banner_delete.php?banner_id=<?= $banner['id'] ?>"  class="btn btn-sm btn-danger m-2 d-flex align-items-center border border-3 rounded-pill">delete</a>
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
require_once('../footer.php');
?>

<!-- adding success msg  -->
<?php if(isset($_SESSION['success_msg'])): ?>
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '<?=$_SESSION['success_msg']?>'
})
</script>
<?php endif ?>
<?php unset($_SESSION['success_msg']) ?>