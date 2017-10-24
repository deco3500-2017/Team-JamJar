<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}

 $user = $conn->query("SELECT * FROM `users3500`"); 
 $row=$user;

 $user1 = $conn->query("SELECT * FROM `users3500`"); 
 $row1=$user1;

 $user2 = $conn->query("SELECT * FROM `users3500`"); 
 $row2=$user2;
 

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
<!-- seach bar -->
			<div class="row">
				<div class="input-group input-group-lg searchbar">
					<span class="input-group-addon" id="sizing-addon1" ><i class="material-icons md-48">search</i></span>
					<input type="text" class="form-control" id="textinput" placeholder="name" aria-label="Username" aria-describedby="sizing-addon1" style="font-size: 3rem;">
				</div>
			</div>

<!-- fisrt part -->
			<div class="row">
				<div class="col-12 namebar">
					<strong>Most Frequent</strong>
				</div>
			</div>

			<div class="row m-3">

			<?php
				while($userRow1 = mysqli_fetch_assoc($row1)){
					if($userRow1['userId']%2 != 0){
						echo "<figure class='figure mx-3'>
							<img src='images/test.jpg' class='figure-img img-fluid rounded-circle' alt='pic' width='100px'>
							<figcaption class='figure-caption cardfont' style='text-align: center;'>".$userRow1['userName']."</figcaption>
							</figure>";
					}

				}

			?>

			</div>

<!-- second part -->
			<div class="row">
				<div class="col-12 namebar">
					<strong>Recent Research</strong>
				</div>
			</div>

			<div class="row m-3">
			<?php
				while($userRow = mysqli_fetch_assoc($row)){
				if($userRow['userId']%2 == 0){
					echo "<figure class='figure mx-3'>
						<img src='images/test.jpg' class='figure-img img-fluid rounded-circle' alt='pic' width='100px'>
						<figcaption class='figure-caption cardfont' style='text-align: center;'>".$userRow['userName']."</figcaption>
						</figure>";
				}
			}

			?>

			</div>

<!-- third part ####### search function will just search the users below #######-->
			<div class="listofuser">
				<div class="row">
					<div class="col-12 namebar">
						<strong>Suggest Neighbours</strong>
					</div>
				</div>
				<?php
					while($userRow2 = mysqli_fetch_assoc($row2)){
						if($userRow2['userId']%3 == 0){
							echo "<div class='row m-3 mt-5 user'>
								<div class='col-2'>					
									<img src='images/test.jpg' class='figure-img img-fluid rounded-circle' alt='pic' width='100px'>				
								</div>
								<div class='col-10 border-top-0 border-right-0 border-left-0' style='border: 2px solid grey'>
									<p class='userlist' style='font-size: 3.5rem;'>".$userRow2['userName']."</p>
								</div>
							</div>";
						}
					}

				?>
				
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