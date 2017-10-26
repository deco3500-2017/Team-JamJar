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
						<p class="title">Transaction</p>
					</div>
					<div class="col-2">
						<a href="postr.php" class="btn btn-info btn-lg postrbtn">post</a>
					</div>
				</div>
			</div>
		</header>
		
		<!-- content here -->
		<div class="container-fluid content">
		<?php
			while($userRow = mysqli_fetch_assoc($row)){

				echo "<div class='card m-5'>
					<div class='row ml-3'>
						<span><h2>".$userRow['sort']."</h2></span>
					</div>
					<div class='innercard outboxblue rounded'>
						<div id='card'>
							<div class='row'>
								<div class='col-4 ml-5 mt-5'>
									<figure class='figure'>
			  						<img src='images/test.jpg' class='figure-img img-fluid rounded-circle ml-5' alt='pic' width='100px'>
			  						<figcaption class='figure-caption cardfont'>".$userRow['userName']."<br>".$userRow['time']."</figcaption>
									</figure>
								</div>
								<div class='col-6 mt-5 innerboxblue rounded cardfont'>
									<h4 class='ml-3 my-3'>request to ".$userRow['sort']."</h4>
								</div>
							</div>
							<div class='row justify-content-end'>
								<div class='col-12 time mr-2' style='text-align: right;'>
									visible to ".$userRow['groups']."
								</div>
							</div>
						</div>
						
						<div id='detail' style='display: none'>
							<div class='row mt-5 justify-content-center' >
								<div class='col-10 innerboxblue rounded cardfont'>
									<p>".$userRow['message']."</p>
								</div>
							</div>
							<div class='row justify-content-center mt-5 mb-3'>
								<div class='col-6'>
									<button class='btn btn-lg btn-info' style='width:100%;font-size: 36px;'>send message</button>
								</div>
							</div>
						</div>
					</div>
				</div>";
			}
		?> 
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
							<i class="material-icons md-96 menuactive">loop</i>
							<br><span class="menuactive">Exchange</span>
						</a>	
					</div>
					<div class="col-3 border menubar">
						<a href="community.php">
							<i class="material-icons md-96 ">business</i>
							<br><span>Community</span>
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