<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

$query1 = $conn->query("SELECT * FROM users WHERE userId=".$_SESSION['userSession']);
$userRow=$query1->fetch_array();
if(isset($_POST["submit"])){
	$uID = $_SESSION['userSession'];
	$message = $_POST["message"];
	$urgency = "background-color:".$_POST["urgency"].";";
	echo $urgency;
	echo $message;
	echo $uID;

$query = $conn->prepare("INSERT INTO comBoard3500(userID, message, urgency) VALUES(?,?,?)");
  $query->bind_param('sss', $uID, $message, $urgency);  
  if ($query->execute()) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
	
    echo("Error description: " . mysqli_error($conn));
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
  <title>My First HTML</title>
  <meta charset="UTF-8">
</head>

<body>
<h1>Post on Community Board</h1>

<form method ="post">
  message: <input type="text" name="message"><br>
  <select name = "urgency">
  <option value="#ffc299">1</option>
  <option value="#ffff80">2</option>
  <option value="#99ff99">3</option>
  <option value="#F8DDD2">4</option>
  </select>
  <button type="submit" class="btn btn-default" name="submit">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; send msg
  </button>     
</form>

<div class="form-group">
 <a href="board.php" class="btn btn-default" style="float:right;">go to com board</a>
 </div> 
</body>
</head>
</html>