<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

$query = $conn->query("SELECT * FROM users WHERE userId=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
  <title>My First HTML</title>
  <meta charset="UTF-8">
</head>

<body>
<h1>Welcome to share town!</h1>
</body>
</head>
</html>