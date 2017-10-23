<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}

 $user = $conn->query("SELECT * FROM `exch3500` LEFT JOIN `users3500` ON exch3500.userID = users3500.userId ORDER BY exch3500.time DESC"); 
 $row=$user;
 

 if(isset($_POST['post'])){
 	header("Location: postm.php");
 }

$conn->close();

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
	<body>
		<!-- header here -->
		<header class="header">
			<div class="container-fluid">
				<div class="row justify-content-md-center">
					<div class="col-2">

					</div>

					<div class="col col-8">
						<p class="title">Community</p>
					</div>

					<div class="col-2">
					</div>
				</div>
			</div>
		</header>
		
		<!-- content here -->
		<div class="container-fluid content">



		</div>

		<!-- footer here -->
		<footer class="footer">
			<div class="container-fluid">
				<div class="row">


					<div class="col-3 border menubar">
						<a href="board.php">
							<i class="material-icons md-96">dvr</i>
							<br><span>Board</span>
						</a>
					</div>
					<div class="col-3 border menubar">
						<a href="transaction.php">
							<i class="material-icons md-96">loop</i>
							<br><span>Exchange</span>
						</a>	
					</div>
					<div class="col-3 border menubar">
						<a href="community.php">
							<i class="material-icons md-96 menuactive">business</i>
							<br><span class="menuactive"">Community</span>
						</a>
					</div>
					<div class="col-3 border menubar">
						<a href="profile.php">
							<i class="material-icons md-96">person</i>
							<br><span>Me</span>
						</a>	
					</div>
					
				</div>

			</div>
		</footer>
	</body>
</html>