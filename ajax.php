 
<?php
require 'connection.php';

if (isset($_POST['id'])) {
    $id=$_POST['id'];
    $userQuery = mysqli_query($connection, "SELECT * FROM sub_user_group WHERE usergroupid= '$id'");
    ?>
     <select name="subUserGroup" id="subUserGroup" class="form-control">
        <option >Select your user group</option>
        <?php while ($showUser = mysqli_fetch_array($userQuery)) { 
           
            ?>
            <option value="<?php echo $showUser['id'];?>"> <?php echo $showUser['type']; ?></option>
            <?php }
        ?>
    </select>
<?php } ?>
