<?php

include "connection.php";

if (isset($_REQUEST['user_id'])) {
        $id = $_REQUEST['user_id'];    
       
}
//echo 'hello';exit;
 
$sql = "DELETE FROM user WHERE id=$id";

if (mysqli_query($connection, $sql)) {
    echo "deleted";
    //header('Location: modalView.php');

    exit;
} else {
    echo "Error deleting data ";
}
?>
<h1>
    Deleted Successfully.....
</h1>