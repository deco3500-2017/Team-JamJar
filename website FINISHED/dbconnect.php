<?php
 ini_set('display_errors', 1);
$servername = 'localhost';
$username =  'root';
$password = '3b033ae4015c5b8e';
$DBNAME = 'iListen';
 
 $conn = mysqli_connect($servername, $username, $password, $DBNAME);

 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error($conn));
 }

 ?>