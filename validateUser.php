<?php
require_once 'connection.php';
require_once 'header.php'; 




   
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username= $_POST['userid'];
      //echo $username;
      $password= $_POST['password'];
      $userName = mysqli_real_escape_string($connection,$username);
      $password = mysqli_real_escape_string($connection, $password); 
    
      //$pass= md5($password);
      
      $sql = "SELECT id FROM user WHERE email = '$userName' and password = '$password'" ;
      $result = mysqli_query($connection,$sql);
      
      $row = mysqli_fetch_array($result);
     
      
      $count = mysqli_num_rows($result);
      //echo $count;die;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("userName");
         session_start();
         $_SESSION['id'] = $row['id'];
       
         header("Location:dashboard.php");
         
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
         header("Location:index.php");
      }
   }

 ?>