<?php
session_start();
require_once('../header.php');
require_once('navbar.php');
require_once('../db.php');


if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT * FROM guest_messages";
$from_db = mysqli_query($db_connect, $get_query);
// $after_assoc = mysqli_fetch_assoc($from_db);
// print_r($after_assoc);
?>

<section>

 <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card mt-3">
                    <div class="card-header bg-success text-white text-center">
                        <h4>All guest messages </h4>
                    </div>
                    <div class="card-body">
                        <form action="delete_marked_all_message.php" method="POST">
                <table class="table table-success table-bordered table-striped">
                    <thead>
                     <tr>
                         
                         <th>SL</th>
                         <th>guest name</th>
                         <th>guest email</th>
                         <th>guest  message</th>
                         <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($from_db AS $key => $messages){
                        ?>
                         <tr class=" <?php
                         if($messages['read_status']==1){
                             echo "text-primary";
                         }
                         else{
                             echo "text-dark";
                         }

                         ?>">
                             <td><?=$key+1?><input type="checkbox" name="check[<?=$messages['id']?>]" class="ms-2"></td>
                            <td> <?=$messages['guest_name']?> </td>
                            <td> <?=$messages['guest_email']?> </td>
                            <td> <?=$messages['guest_message']?> </td>
                            <td> 
                                <?php
                                 if($messages['read_status']==1):
                                ?> 

                                   <a href="message_status.php?message_id= <?=$messages['id']?>"class="btn btn-sm btn-warning"> mark as read</a>
                               <?php
                               else:
                               ?> 

                                   <!-- <a href="guest_message_delete.php?message_id= <?=$messages['id']?>"class="btn btn-sm btn-danger"> delete</a> -->
                                   
                                   <button value="guest_message_delete.php?message_id= <?=$messages['id']?>" class="del-btn btn btn-sm btn-danger"> delete   </button>
                               
                               <?php
                                 endif
                               ?> 

                            </td>
                        
                         </tr>

                        <?php
                        }
                        ?>  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                            <button class="del-btn btn-danger btn-sm rounded">delete mark all</button>
                            </td>
                        </tr>
                    </tfoot>                    

                </table>
                </form>

                    </div>
                </div>
           </div>
        </div>
   </div>

</section>

<?php
require_once('../footer.php');
?>

<script>
    $('.del-btn').click(function(){
        var link = $(this).val();  
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link
    //     Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
        }
        })

});
       
        
</script>












