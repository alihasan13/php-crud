<?php require_once ('connection.php'); ?>

<div class="container ">
    <div >
        <?php require_once ('menu.php'); ?> 
    </div>

    <div  class=" createUserForm justify-content-center">
        <form  action="create.php" method="POST" enctype="multipart/form-data">
            <table id="table_style">
                <tr>
                    <td>First Name</td>
                    <td><input  type="text" class="form-control"  placeholder="Enter your first name " name="firstname" required></td>
                </tr> 

                <tr>
                    <td>Last Name</td> 
                    <td><input  type="text" class="form-control"  placeholder="Enter your last name " name="lastname" required></td>
                </tr> 
                <tr>
                    <td>Email</td>
                    <td><input  type="email"  class="form-control"  placeholder="Enter your email " name="email" required></td>
                </tr>
                <tr>
                    <td>User Group</td>
                    <td>
                        <select class="form-control"    name="userGroup" id="userGroup">
                            <option >Select User Group</option>
                            <?php
                            $data = "SELECT * FROM user_group";
                            $result = mysqli_query($connection, $data);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value= "<?php echo $row['id']; ?>"><?php echo $row['type']; ?> </option>
                                    <?php
                                }
                            }
                            ?>


                        </select> 
                    </td>
                </tr>

                <tr>
                    <td>Sub User Group</td>
                    <td id="subUser">
                        <select class="form-control"   id="getData" name="subUserGroup"  >
                            <option >Select Sub User Group</option>


                        </select> 
                    </td>
                </tr>


                <tr>
                    <td>Password</td>
                    <td><input  type="password" class="form-control"  placeholder="Enter your password " name="password" required></td>
                </tr> 

                <tr>
                    <td>image</td> 
                    <td><input   type="file" class="form-control"  placeholder="Upload image " name="image" required></td>
                </tr> 

                <tr>
                    <td style="float: right"><button   type="submit" class="btn btn-primary">Submit</button></td>
                </tr>


            </table>


        </form>
    </div>
    <div>
        <?php include 'footer.php'; ?>
    </div>
</div>



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



