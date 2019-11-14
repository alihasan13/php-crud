<?php
//include 'create.php';
require_once ('connection.php');
require_once ('menu.php');

//if(isset($_SERVER['REQUEST_METHOD'])==$_POST){
//$userid = filter_input(INPUT_POST, 'userid');
//$firstname = filter_input(INPUT_POST, 'firstname');
//$lastname = filter_input(INPUT_POST, 'lastname');
//$email = filter_input(INPUT_POST, 'email');
//$userGroup= filter_input(INPUT_POST, 'userGroup');
//$subUserGroup= filter_input(INPUT_POST, 'subUserGroup');
//$image = filter_input(INPUT_POST, 'image');


$userid = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$userGroup = $_POST['userGroup'];
$subUserGroup = $_POST['subUserGroup'];

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



//Updating information 
if (mysqli_connect_error()) {
    die('connect error' . mysqli_connect_error());
} else {

    $sql = "UPDATE user  SET first_name='$firstname',last_name='$lastname', email='$email',user_group_id='$userGroup',subusergroupid='$subUserGroup', image='$userpic'  WHERE id='$userid'";

    if ($connection->query($sql)) {
        header("Location:modalView.php");
    } else {
        echo "Error updating record: " . $connection->error;
    }

    $connection->close();
}
}// EOF --if


require_once 'footer.php'; 
?>