<?php require_once('connection.php');
?>

<div class="container">
    <?php require_once('menu.php'); ?> 
</div>



<div class="container">

    <table id ="viewTable" class="table table-striped">

        <thead>
        <h1 >User Managment System</h1>
        <a style="float: right;text-decoration:none; color: #111" href="form.php"><button class="btn btn-primary"><h4>Add New User</h4> </button></a>
        <tr>
            <th> User Id</th>
            <th  colspan="2"> Name</th>
            <th> Email</th>
            <th> User Group</th>
            <th>Sub User Group</th>
            <th> Images</th>
            <th> Action </th>
        </tr>

        </thead>

        <tbody> 
            <?php
            $data = "SELECT * FROM user ORDER BY first_name ASC;";
            $result = mysqli_query($connection, $data);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?> </td>
                    <td colspan="2"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><?php
                        $userData = "SELECT * FROM user_group where id='$row[user_group_id]'";
                        $resultGroup = mysqli_query($connection, $userData);
                        if (mysqli_num_rows($resultGroup) > 0) {
                            while ($rowGroup = mysqli_fetch_assoc($resultGroup)) {
                                echo $rowGroup['type'];
                            }
                        }
                        ?> </td>
                    <td><?php
                        $subUserData = "SELECT * FROM sub_user_group where id='$row[subusergroupid]'";
                        $resultGroup = mysqli_query($connection, $subUserData);
                        if (mysqli_num_rows($resultGroup) > 0) {
                            while ($rowGroup = mysqli_fetch_assoc($resultGroup)) {
                                echo $rowGroup['type'];
                            }
                        }
                        ?> </td>
                    <td><img src="user/<?php echo $row['image']; ?> " alt="profile picture" width="50px" height="50px"></td> 
                    <td>
                        <button type="button" class="btn btn-primary modal-show" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['id']; ?>">Edit</button> ||
                        <button type="button" class="btn btn-primary delete"   data-id="<?php echo $row['id']; ?>" >Delete</button>
<!--                        ||  <button type="button" class="btn btn-danger"> <a href="delete.php?id=<?php //echo $row['id']; ?>"  >Delete</a></button>-->
                    </td>
                </tr>


            <?php } ?>

        </tbody>
    </table>
    
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="formContainer">          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>




    
    
    
</div>
<div class="container" >
    <?php include 'footer.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    
    
    $(document).ready(function(){
    $('.modal-show').on('click', function(){
    var userId = $(this).attr('data-id');
            $.ajax({
                    url: "editModal.php",
                    type:"POST",
                    dataType:"html",
                    data:{
                    user_id:userId
                    },
            beforeSend: function() { 
                $("#formContainer").html('<div id="wait" class="text-center"><img src="image/loader.gif" width="200" height="auto" alt="Loading..." /></div>');
                $('#wait').show(); 
            },        
            success:function(rep){
              $('#wait').hide();   
              $("#formContainer").html(rep);
            }
            });
        }); //EOF-eidt event
    
    $('.delete').on('click', function(){
        var userId = $(this).attr('data-id');

            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'delete.php',
		type: 'POST',
		data:  {
                    user_id: userId
                },
		dataType: 'html',
     
                success:function(res){
                    
                Swal.fire(
                    'Deleted!',
                    'Information has been deleted.',
                    'success'
                );
                //location.reload(true);
                    
                 
                }


            }); //end of ajax
   
        } //EOF-end of if
        })
    }); //EOF- end of delete event
    
    }); //EOF-end of DOM

</script>



</div>

