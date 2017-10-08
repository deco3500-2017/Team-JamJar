<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}

$query = $conn->query("SELECT * FROM comBoard3500 ORDER BY time DESC");

$results = array();
while($userRow = mysqli_fetch_assoc($query)){
$query1 = $conn->query("SELECT * FROM users3500 WHERE userid = ".$userRow["userID"]);
$userRow1 = mysqli_fetch_assoc($query1);

$results[] =  $userRow1["userName"];

$results[] = $userRow["message"];

$results[] = $userRow["time"];


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

		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- Javascript -->
		<!-- Jquery 3.2.1 -->
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

		<!-- Popper -->
		<script type="text/javascript" src="js/Popper.js"></script>

		<!-- bootstrap https://getbootstrap.com/ -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/main.js"></script>

	</head>
	<body>
		<!-- header here -->
		<header class="header">
			<div class="container-fluid">
				<div class="row justify-content-md-center">
					<div class="col-2">
					<i class="material-icons md-96">keyboard_arrow_left</i>
					</div>
					<div class="col col-8">
						<p class="title">Board</p>
					</div>
					<div class="col-2">
					</div>
				</div>
			</div>
		</header>
		
		<!-- content here -->
		<div class="container-fluid content">

			<div class="card m-5 outbox rounded" style=<?php echo "background-color:#D6F2FE;"?>>
				<div class="row">
					<div class="col-2 ml-5 mt-3">
						<figure class="figure">
  						<img src="images/test.jpg" class="figure-img img-fluid rounded-circle" alt="pic" width="100px">
  						<figcaption class="figure-caption"><?php echo $results[0]?></figcaption>
						</figure>
					</div>
					<div class="col-8 mt-5 innerbox rounded">
						<h4>Notification: </h4>
						<p><?php echo $results[1]?></p>

					</div>
				</div>
				<div class="row justify-content-end">
					<div class="col-4 time mr-2">
						<?php echo $results[2]?>
					</div>
				</div>
			</div>


			<!-- The Sticky Top Notification will Be Shown Above -->
			<div class="dropdown-divider"></div>

			<div class="card m-5 outbox rounded" style=<?php echo "background-color:#D6F2FE;"?>>
				<div class="row">
					<div class="col-2 ml-5 mt-3">
						<figure class="figure">
  						<img src="images/test.jpg" class="figure-img img-fluid rounded-circle" alt="pic" width="100px">
  						<figcaption class="figure-caption"><?php echo $results[3]?></figcaption>
						</figure>
					</div>
					<div class="col-8 mt-5 innerbox rounded">
						<h4>Notification: </h4>
						<p><?php echo $results[4]?></p>

					</div>
				</div>
				<div class="row justify-content-end">
					<div class="col-4 time mr-2">
						<?php echo $results[5]?>
					</div>
				</div>
			</div>

			<div class="card m-5 outbox rounded" style=<?php echo "background-color:#F8DDD2;"?>>
				<div class="row">
					<div class="col-2 ml-5 mt-3">
						<figure class="figure">
  						<img src="images/test.jpg" class="figure-img img-fluid rounded-circle" alt="pic" width="100px">
  						<figcaption class="figure-caption"><?php echo $results[6]?></figcaption>
						</figure>
					</div>
					<div class="col-8 mt-5 innerbox rounded">
						<h4>Notification: </h4>
						<p><?php echo $results[7]?></p>

					</div>
				</div>
				<div class="row justify-content-end">
					<div class="col-4 time mr-2">
						<?php echo $results[8]?>
					</div>
				</div>
			</div>



		</div>

		<!-- footer here -->
		<footer class="footer">
			<div class="container-fluid">
				<div class="row">


					<div class="col-3 border menubar">
						<a href="board.php">
							<i class="material-icons md-48 menuactive">dvr</i>
							<br><span class="menuactive">Board</span>
						</a>
					</div>
					<div class="col-3 border menubar">
						<a href="transaction.html">
							<i class="material-icons md-48">loop</i>
							<br><span>Transaction</span>
						</a>	
					</div>
					<div class="col-3 border menubar">
						<a href="community.html">
							<i class="material-icons md-48">business</i>
							<br><span">Community</span>
						</a>
					</div>
					<div class="col-3 border menubar">
						<a href="#">
							<i class="material-icons md-48">person</i>
							<br><span>Me</span>
						</a>	
					</div>
					
				</div>

			</div>
		</footer>
	</body>
</html>