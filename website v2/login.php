<?php
ini_set('display_errors', 1);
session_start();
require_once 'dbconnect.php';

if (isset($_POST['submit'])) { 
 $email = $_POST['email'];
 $password = $_POST['password']; 
 $query = $conn->prepare("SELECT userId, userEmail, userPass, addressline1 FROM users3500 WHERE userEmail=?");
 $query->bind_param('s', $email);
 $query->execute();
 $row=$query->get_result()->fetch_assoc();
 if (password_verify($password, $row['userPass'])) {
  if($row['addressline1'] != NULL){
    $_SESSION['userSession'] = $row['userId'];
    header("Location: board.php");
  }else{
    $_SESSION['userSession'] = $row['userId'];
    header("Location: login.php");
  }
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $conn->close();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Smart building</title>
		<meta charset="utf-8">

		<!-- CSS -->
		<!-- bootstrap css https://getbootstrap.com/ -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

		<!-- OPEN ICONIC https://useiconic.com/open/ -->
		<link rel="stylesheet" href="open-iconic/css/open-iconic-bootstrap.css">
		<!-- <i class="oi oi-name" title="name" aria-hidden="true"></i> -->	
		
		<!-- Material icons https://material.io/icons/ -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="css/material_icons.css">
		<!-- example: <i class="material-icons md-48">name</i> -->
		
		<!-- https://github.com/Foliotek/Croppie -->
		<link rel="stylesheet" type="text/css" href="css/croppie.css" />

		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- Javascript -->
		<!-- Jquery 3.2.1 -->
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

		<!-- Popper -->
		<script type="text/javascript" src="js/Popper.js"></script>

		<!-- bootstrap https://getbootstrap.com/ -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<!-- http://gsgd.co.uk/sandbox/jquery/easing/ -->
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		
		<!-- https://github.com/Foliotek/Croppie -->
		<script src="js/croppie.min.js"></script>

		<script type="text/javascript" src="js/main.js"></script>

	</head>
	<body class="pureYellow">
		<!-- header here -->
		<header class="header">

		</header>

		<div class="container content login">
			<div class="row justify-content-center">
				<div class="col-12">
					<img class="img-fluid" src="images/logo.png" alt="logo">
				</div>
			</div>
			<div class="row justify-content-center login">
				<div class="col-12">
					<form method = 'post'>
						<h1>Please sign in</h1>
						<div class="form-group">
							<label for="inputEmail" class="sr-only">Email address</label>
							<input type="email" id="inputEmail" class="form-control input-lg" placeholder="Email address" name = 'email' required="" autofocus="">
						</div>
						<div class="form-group">
							<label for="inputPassword" class="sr-only">Password</label>
							<input type="password" id="inputPassword" class="form-control input-lg" placeholder="Password" name = 'password' required="">
						</div>
						<div class="form-group">
							<label style="font-size: 46px;">
								<input type="checkbox" value="remember-me" style="width:30px;height:30px;"> Remember me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block btn-xl" type="submit" name = 'submit'>Sign in</button>
					</form>
				</div>
				<div class="col-12 mt-5" style="text-align: center;">
						<a href="register.php" style="font-size: 36px;color:black;">I am a new user</a>
				</div>
			</div>
		</div>

	</body>
</html>