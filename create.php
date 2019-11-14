<?php

require_once 'connection.php';
?>
<div class="container ">
    <div  >
        <?php require_once 'menu.php'; ?> 
    </div>
    <div class="createUserForm">
        <?php
//$userid = filter_input(INPUT_POST, 'userid');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $userGroup = filter_input(INPUT_POST, 'userGroup');
        $subUserGroup = filter_input(INPUT_POST, 'subUserGroup');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');


        $pass = md5($password);

        if (!empty($_POST)) {
//Properties for an Image
            $imgFile = $_FILES['image']['name'];
            $tmp_dir = $_FILES['image']['tmp_name'];
            $imgSize = $_FILES['image']['size'];

//Prepare Image to Upload
            if (empty($imgFile)) {
                $errMSG = "Please Select Image File.";
            } else {
                $upload_dir = 'user/'; // upload directory

                $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
                // valid image extensions
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                // rename uploading image
                $userpic = $_POST['firstname'] . "." . $imgExt;

                // allow valid image file formats
                if (in_array($imgExt, $valid_extensions)) {
                    // Check file size '5MB'
                    if ($imgSize < 1300000) {
                        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
                    } else {
                        echo "Sorry, your image file is too large.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            }

//Insert into database at 'data' Table
            if (mysqli_connect_error()) {
                die('connect error' . mysqli_connect_error());
            } else {
                $sql = "INSERT INTO user ( first_name,last_name,email, user_group_id,subusergroupid, password, image) values ( '$firstname','$lastname','$email','$userGroup','$subUserGroup','$password','$userpic')";
            }
            if ($connection->query($sql)) {
                echo 'User Data has been Submitted Successfully';
                ?>
                <script> alert("User Data has been Submitted Successfully" );
                <?php// header("Location:form.php");  ?>
                </script>
                
                <?php
                
            } else {
                echo "Error: " . $sql . " " . $connection->error;
            }

            $connection->close();
        } else {
            echo 'You have not submit any Data';
        }
        ?>
    </div>
    <div>
        <?php require_once 'footer.php'; ?>
    </div>
</div>