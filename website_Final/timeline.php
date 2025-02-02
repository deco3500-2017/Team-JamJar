<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}

 $user = $conn->prepare("SELECT * FROM comBoard3500 WHERE userId=?");
 $user->bind_param('s', $_SESSION['userSession']);
 $user->execute();
 $row=$user->get_result();
 
 $user = $conn->prepare("SELECT * FROM exch3500 WHERE userId=?");
 $user->bind_param('s', $_SESSION['userSession']);
 $user->execute();
 $row1=$user->get_result();


$conn->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Smart building</title>
		<meta charset="utf-8">
		<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">

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
						<a href="profile.php"><i class="material-icons md-96">keyboard_arrow_left</i></a>
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

		<!-- content here -->
		<div class="container-fluid content">

<!-- https://bootsnipp.com/snippets/featured/timeline-responsive -->
<div class="page-header">
	<h1 id="timeline">Timeline</h1>
</div>
<ul class="timeline">
	<?php 
		while($userRow1 = mysqli_fetch_assoc($row1)){
			echo  "<li>
				<div class='timeline-badge'><i class='material-icons'>loop</i></div>
				<div class='timeline-panel'>
					<div class='timeline-heading'>
						<h4 class='timeline-title'>".$userRow1['sort']."</h4>
						<p><small class='text-muted'><i class='material-icons'>alarm</i>".$userRow1['time']."</small></p>
					</div>
					<div class='timeline-body'>
						<p>".$userRow1['sort']."</p>
					</div>
				</div>
			</li>";
		}
	?>
	<?php 
		while($userRow = mysqli_fetch_assoc($row)){
			echo  "<li class='timeline-inverted'>
				<div class='timeline-badge warning'><i class='material-icons'>dvr</i></div>
				<div class='timeline-panel'>
					<div class='timeline-heading'>
						<h4 class='timeline-title'>".$userRow['sort']."</h4>
						<p><small class='text-muted'><i class='material-icons'>alarm</i>".$userRow['time']."</small></p>
					</div>
					<div class='timeline-body'>
						<p>".$userRow['message']."</p>
					</div>
				</div>
				
			</li>";
		}
		?>


</ul>
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