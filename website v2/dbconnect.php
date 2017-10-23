<?php
 ini_set('display_errors', 1);
$servername = '127.0.0.1';
$username =  'root';
$password = '';
$DBNAME = 'iListen';
 
 $conn = mysqli_connect($servername, $username, $password, $DBNAME);

 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error($conn));
 }

 ?>