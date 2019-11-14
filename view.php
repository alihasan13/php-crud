<?php require_once ('connection.php'); ?>
<div class="container">
    <div>
        <?php require_once ('menu.php'); ?> 
    </div>

        <div >
            <table id ="viewTable" class="table table-striped">

                <thead>
                <h1 >User Managment System</h1>
                    <a style="float: right;text-decoration:none; color: #111" href="form.php"><button class="btn btn-primary"><h4>Add New User</h4> </button></a>
<!--                <h1></h1>
                <button type="button" onclick="loadDoc()">Add User</button>-->
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
                            <td> <button type="button" class="btn btn-primary" ><a href="edit.php?id=<?php echo $row['id']; ?>" >Edit</a> </button>  ||  <button type="button" class="btn btn-danger"> <a href="delete.php?id=<?php echo $row['id']; ?>"  >Delete</a></button></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <script>
            function loadDoc() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("demo").innerHTML =
                  this.responseText;
                }
              };
              xhttp.open("GET", "form.php", true);
              xhttp.send();
            }
        </script>
        <div >
        <?php include 'footer.php'; ?>
    </div>
</div>

