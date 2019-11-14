 <!DOCTYPE html>


<?php include 'connection.php'; ?>


 <!DOCTYPE html>
<html lang="en">
    <head>
        <title>Swapnoloke</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">

    
</head>
<body>
 
 
<article style="background-color: tomato">


    <div id="createUserForm" class="row justify-content-center">
        <form  action="create.php" method="POST" enctype="multipart/form-data">
            <table id="table_style">




                <div class="form-group"> 
                    <tr><td>First Name</td>
                        <td><input  id="input_design" type="text" class="form-control"  placeholder="Enter your first name " name="firstname" required></td></tr> 
                </div>

                <div class="form-group">
                    <tr><td>Last Name</td> 
                        <td><input id="input_design" type="text" class="form-control"  placeholder="Enter your last name " name="lastname" required></td></tr> 
                </div>

                <div class="form-group">
                    <tr><td>Email</td>
                        <td><input id="input_design" type="text"  class="form-control"  placeholder="Enter your email " name="email" required></td></tr>
                </div>

                <div class="form-group">
                    <tr><td>User Group</td>
                        <td>
                            <select     class="form-control"    name="userGroup"  required>
                                <option value="">Select User Group</option>


                                <?php $data = "SELECT * FROM user_group";
                                $result = mysqli_query($connection, $data);
                                if(mysqli_num_rows($result)>0){
                                    while($row= mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value= "<?php echo $row['id']; ?>"><?php echo $row['type']; ?> </option>
                                        <?php
                                    }
                                }
                                ?>
                                

                            </select> 
                        </td>
                    </tr>
                </div>


                <div class="form-group">
                    <tr><td>Password</td>
                        <td><input id="input_design" type="password" class="form-control"  placeholder="Enter your password " name="password" required></tr></td> 
                </div>

                <div class="form-group">
                    <tr><td>image</td> 
                        <td><input  id="input_design" type="file" class="form-control"  placeholder="Upload image " name="image" required></td></tr> 
                </div>

                <div class="form-group">
                    <tr><td><button   type="submit" class="btn btn-primary">Submit</button></td></tr>

                </div>

            </table>


        </form>
    </div>

</article>

<script src="js/bootstrap.min.js"> </script>
</body>
</html>





