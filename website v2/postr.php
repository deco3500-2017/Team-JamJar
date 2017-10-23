<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}


if(isset($_POST["comfirm"])){

	$uID = $_SESSION['userSession'];
	$message = $_POST["message"];
	$group = $_POST["group"];
	$sort = $_POST['sort'];	

	$query = $conn->prepare("INSERT INTO exch3500(userID, message, groups, sort) VALUES(?,?,?,?)");
	$query->bind_param('ssss', $uID, $message, $group, $sort);
	header("Location: transaction.php");

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
				<div class="row justify-content-center">
					<div class="col-2">
						<a href="transaction.php"><i class="material-icons md-96">keyboard_arrow_left</i></a>
					</div>
					<div class="col col-8">
						<p class="title">New Request</p>
					</div>
					<div class="col-2">
					</div>
				</div>
			</div>
		</header>
		
		<!-- content here -->
		<div class="container-fluid content">

			<form class="message" method = 'post'>
				<div class="row mx-3 my-5 justify-content-center">


					<div class="col-8 my-5">
						<h1 class="my-3">I would like to ...</h1>
						<div class="input-group">
							<select name = 'sort'>
								<option selected>choose...</option>
								<option value="Borrow something">Borrow something</option>
								<option value="Share something">Share something</option>
								<option value="Hold a party">Hold a party</option>
								<option value="Invite to event">Invite to event</option>
								<option value="Others">Others</option>
							</select>
						</div>
					</div>

					<div class="col-8 my-5">
						<h1 class="my-3">Description</h1>
						<textarea rows="7" maxlength="140" placeholder="140 characters limited" name ='message'></textarea>
					</div>

					<div class="col-8 my-5">
						<h1 class="my-3">Send it to ...</h1>
						<div class="input-group">
							<select name = 'group'>
								<option selected>choose...</option>
								<option value="Authenticated neighbours">Authenticated neighbours</option>
								<option value="All neighbours">All neighbours</option>
								<option value="Who are at home">Who are at home</option>
								<option value="Who are outside">Who are outside</option>
								<option value="Friends">Friends</option>
							</select>
						</div>
					</div>
					<div class="col-8">
						<input type="submit" name="comfirm" value="Submit" class="btn btn-info btn-lg" style="width:100%;padding: 3% 0 3% 0; font-size: 36px"/>
					</div>

				</div>	
			</form>

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
							<i class="material-icons md-96">business</i>
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