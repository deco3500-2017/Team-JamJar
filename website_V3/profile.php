<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}

 $user = $conn->prepare("SELECT * FROM users3500 WHERE userId=?");
 $user->bind_param('s', $_SESSION['userSession']);
 $user->execute();
 $row=$user->get_result()->fetch_assoc();

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
						<p class="title">Profile</p>
					</div>
					<div class="col-2">
						<a href="#"><i class="material-icons md-96">settings</i></a>
					</div>
				</div>
			</div>
		</header>
		<div class="container-fluid content">
			
<!-- background image fixed-->
			<div class="col-12" style="position: absolute;overflow: hidden;height:350px">
				<div class="col-12">
					<img class="img w-100" src="images/customized.jpg" alt="back" >
				</div>
			</div>
<!-- other stuff -->
			<div class="row justify-content-center" style="margin-top: 200px">
				<img class="figure-img img-fluid rounded-circle" src="images/test.jpg" alt="user image"  style="z-index: 0;border: 10px solid white;">
			</div>

			<div class="row">
				<div class="col-12" style="text-align: center;">
					<h1><?php echo $row['userName'] ?></h1>
					<p style="font-size: 24px">Interaction Designer of the Share Town</p>
				</div>
			</div>

			<div class="row justify-content-center mt-5">
				<div class="col-4 border border-left-0 p-5">
					<a href="editP.php"> <h1>edit profile</h1> </a>
					
				</div>
				<div class="col-4 border border-right-0 p-5" style="text-align: right">
					<a href="timeline.php"> <h1>activity log</h1> </a>
				</div>

			</div>

			<div class="row justify-content-center" style="margin-top: 20%">

				<div class="col-8">
					<button type="button" onclick="location.href='logout.php';" class="btn btn-info btn-lg btn-xl logoutbtn">Log out</button>
				</div>

			</div>

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
							<i class="material-icons md-96">business</i>
							<br><span>Community</span>
						</a>
					</div>
					<div class="col-3 border menubar">
						<a href="profile.php">
							<i class="material-icons md-96 menuactive">person</i>
							<br><span  class="menuactive">Me</span>
						</a>	
					</div>	
				</div>
			</div>
		</footer>
	</body>
</html>