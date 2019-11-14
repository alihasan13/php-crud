<?php 
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "swapnoloke";
 $connection =  mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;
 if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
 }