<?php
require_once('connection.php');

//$id = $_GET['id'];
if (isset($_REQUEST['user_id'])) {
    $id = $_REQUEST['user_id'];
} else {
    $id = '';
}

sleep(5000);


$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

//    echo '<pre>';
//    print_r($row );
//    exit;
//echo $sub_serGroup['subusergroupid'];exit;
?>

<!--Modal starts here -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="update.php" method="POST" enctype="multipart/form-data">

                    <table >

                        <tr>
                        <input type="hidden"    name="id"  value="<?php echo $row['id']; ?>" />
                        </tr> 
                        <tr>
                            <td>First Name</td>
                            <td><input type="text" class="form-control"   name="firstname"  value="<?php echo $row['first_name']; ?>" /></td>
                        </tr> 
                        <tr>
                            <td>Last Name</td> 
                            <td><input type="text" class="form-control"   name="lastname" value="<?php echo $row['last_name']; ?>"></td>
                        </tr> 
                        <tr>
                            <td>Email</td>
                            <td><input type="email" class="form-control"   name="email"  value="<?php echo $row['email']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>User Group</td> 
                            <td>
                                <select class="form-control"    name="userGroup" id="userGroup" >
                                    <option>Select Your Option</option>
                                    <?php
                                    $userGroupData = "SELECT * FROM user_group";
                                    $userGroupResult = mysqli_query($connection, $userGroupData);
                                    if (mysqli_num_rows($userGroupResult) > 0) {
                                        while ($userGroupRow = mysqli_fetch_array($userGroupResult)) {
                                            ?>
                                            <option value= "<?php echo $userGroupRow['id']; ?>" <?php
                                            if ($userGroupRow['id'] == $row['user_group_id']) {
                                                echo 'selected';
                                            }
                                            ?>  >
                                            <?php echo $userGroupRow['type']; ?> </option>
                                            <?php
                                        }//EOF - while
                                    }//EOF - If
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Sub User Group</td>
                            <td id="subUser">
                                <select class="form-control"   id="getData" name="subUserGroup"  >
                                    <option>Select Your Option</option>
                                    <?php
                                    //$usergroup= ""
                                    $subUserGroupData = "SELECT * FROM sub_user_group where usergroupid=$row[user_group_id]";
                                    $subUserGroupResult = mysqli_query($connection, $subUserGroupData);
                                    if (mysqli_num_rows($userGroupResult) > 0) {
                                        while ($subUserGroupRow = mysqli_fetch_array($subUserGroupResult)) {
                                    ?>
                                            <option value= "<?php echo $subUserGroupRow['usergroupid']; ?>" 
                                                <?php
                                                    if ($subUserGroupRow['id'] == $row['subusergroupid']) {
                                                        echo 'selected';
                                                    }
                                            ?>>
                                            <?php echo $subUserGroupRow['type']; ?> </option>
                                    <?php 
                                        }//EOF - while
                                    }//EOF - IF
                                    ?>

                                </select> 
                            </td>
                        </tr>

                        <tr>
                            <td>Image </td>
                            <td>
                                <input type="file" name="image" class="form-control"  /> 
                                <img src="user/<?php echo $row['image'] ?>" width="100" height="100" />

                            </td>
                        </tr>
                        <tr>
                            <td><button  class="btn btn-primary form-button" type="submit">Update</button></td>
                        </tr>
                    </table>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--                <button type="submit" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<!--Modal ends here -->



<script type="text/javascript" src="js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('change', '#userGroup', function () {
            var userGroup_id = $('#userGroup').val();
            //alert(userGroup_id);
//            ajax start
            $.ajax({
                url: "ajax.php",
                type: "POST",
                dataType: 'html',
                data: {
                    id: userGroup_id,
                },
                success: function (result) {
                    $("#subUser").html(result);
//                    alert(result);
                },
                error: function (result) {
                    alert('error');
                }
            });

//             ajax end
        });
    });

</script>
