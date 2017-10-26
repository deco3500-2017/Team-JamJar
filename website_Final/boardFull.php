<?php
ini_set('display_errors', 1);
session_start();
include_once 'dbconnect.php';



 $user = $conn->query("SELECT * FROM `comBoard3500` LEFT JOIN `users3500` ON comBoard3500.userID = users3500.userId WHERE admin = 0 ORDER BY comBoard3500.time DESC"); 
 $row=$user;

 $userA = $conn->query("SELECT * FROM `comBoard3500` LEFT JOIN `users3500` ON comBoard3500.userID = users3500.userId WHERE admin = 1 ORDER BY comBoard3500.time DESC"); 
 $rowA=$userA;

 $userE = $conn->query("SELECT * FROM `exch3500` LEFT JOIN `users3500` ON exch3500.userID = users3500.userId ORDER BY exch3500.time DESC"); 
 $rowE=$userE;

 if(isset($_POST['post'])){
 	header("Location: postm.php");
 }

$conn->close();

?>


<!DOCTYPE html>
<html>
	<head>
	<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
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

		<link rel="stylesheet" type="text/css" href="css/styleFull.css">

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
		<script>
    setTimeout(function () {
       window.location.reload();
    }, 9000);
</script>
		
	</head>
	<body background="images/2.png">
		<!-- header here -->
		<header class="header">
			<div class="container-fluid" style='box-shadow: 0 10px 10px -3px #888888;'>
				<div class="row justify-content-center">
					<div class="col col-10">
						<p class="title" style='width:100%;'><b>Notice Board</b></p>
					</div>
					<div class="col col-3">
						
					</div>
		
					
				</div>
			</div>
		</header>
		
		<!-- content here -->
		<div class="container-fluid content">
		<div >
			

		<?php
			while($userRowA = mysqli_fetch_assoc($rowA)){
				$filename = glob("uploads/".$userRowA['userId'].".*");
					if($userRowA['urgency'] == 'background-color: #f9c7c2;'){ $colorA = 'background-color: #fce8e8;';}
					if($userRowA['urgency'] == 'background-color: #f9e7c2;'){ $colorA = 'background-color: #fcf6e8;';}
					if($userRowA['urgency'] == 'background-color: #d6f1ff;'){ $colorA = 'background-color: #eef9ff;';}
					echo "
					<div class='card m-5 outbox rounded' style ='".$userRowA['urgency']."'>
						<div class='row'>
							<div class='col-2 ml-5 mt-5'>
								<figure class='figure'>
		  						<img src=".$filename[0]." class='figure-img img-fluid rounded-circle' alt='pic' width='100px'>
		  						<figcaption class='figure-caption cardfont'>".$userRowA['userName']."</figcaption>
								</figure>
							</div>
							<div class='col-8 mt-5 innerbox rounded cardfont' style ='".$colorA."'>
								<h4>".$userRowA['sort'].": </h4>
								<p>".$userRowA['message']."</p>
							</div>
						</div>
						<div class='row justify-content-end'>
							<div class='col-12 time mr-2' style='text-align: right;'>
								".$userRowA['time']."
							</div>
						</div>
					</div>
					";
				}
		?>
			</div>
			<!-- The Top Sticky Notification will Be Shown Above -->
			<div class="dropdown-divider"></div>
			<div style = 'float:left; width:50%; overflow:hidden;'>
			<p style = 'float:right; width:50%; overflow:hidden;font-size: 50px;'><strong>Board</strong></p><br><br>
			<?php 

				while($userRow = mysqli_fetch_assoc($row)){
					$filename = glob("uploads/".$userRow['userId'].".*");
					if($userRow['urgency'] == 'background-color: #f9c7c2;'){ $color = 'background-color: #fce8e8;';}
					if($userRow['urgency'] == 'background-color: #f9e7c2;'){ $color = 'background-color: #fcf6e8;';}
					if($userRow['urgency'] == 'background-color: #d6f1ff;'){ $color = 'background-color: #eef9ff;';}					
					echo 
					"<div class='card m-5 outbox rounded' style ='".$userRow['urgency']."; box-shadow: 0 10px 10px -3px #888888;'>
						<div class='row'>
							<div class='col-2 ml-5 mt-5'>
								<figure class='figure'>
								<img src=".$filename[0]." class='figure-img img-fluid rounded-circle' alt='pic' width='100px'>
								<figcaption class='figure-caption cardfont'>".$userRow['userName']."</figcaption>
								</figure>
							</div>
							<div class='col-8 mt-5 innerbox rounded cardfont' style ='".$color."'>
								<h4>".$userRow['sort'].": </h4>
								<p>".$userRow['message']."</p>
							</div>
						</div>
						<div class='row justify-content-end'>
							<div class='col-12 time mr-2' style='text-align: right;'>
								".$userRow['time']."
							</div>
						</div>
					</div>
					";
				}
			?>

		</div>
		<div style = 'float:right; width:50%; overflow:hidden;'>
		<p style = 'float:right; width:50%; overflow:hidden; font-size: 50px;'><strong>Exchange</strong></p><br><br>
			<?php
			while($userRowE = mysqli_fetch_assoc($rowE)){
				$filename = glob("uploads/".$userRowE['userId'].".*");
				echo "
				<div class='card m-5' style = 'box-shadow: 0 10px 10px -3px #888888;'>
					<div class='row ml-3'>
						<span><h2>".$userRowE['sort']."</h2></span>
					</div>
					<div class='innercard outboxblue rounded'>
						<div id='card'>
							<div class='row'>
								<div class='col-4 ml-5 mt-5'>
									<figure class='figure'>
			  						<img src=".$filename[0]." class='figure-img img-fluid rounded-circle ml-5' alt='pic' width='100px'>
			  						<figcaption class='figure-caption cardfont'>".$userRowE['userName']."<br>".$userRowE['time']."</figcaption>
									</figure>
								</div>
								<div class='col-6 mt-5 innerboxblue rounded cardfont'>
									<h4 class='ml-3 my-3'>request to ".$userRowE['sort']."</h4>
								</div>
							</div>
							<div class='row justify-content-end'>
								<div class='col-12 time mr-2' style='text-align: right;'>
									visible to ".$userRowE['groups']."
								</div>
							</div>
						</div>
						
						<div id='detail' style='display: none'>
							<div class='row mt-5 justify-content-center' >
								<div class='col-10 innerboxblue rounded cardfont'>
									<p>".$userRowE['message']."</p>
								</div>
							</div>
							<div class='row justify-content-center mt-5 mb-3'>
								<div class='col-6'>
									<button class='btn btn-lg btn-info' style='width:100%;font-size: 36px;'>send message</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				";
			}
		?> 
		</div>
		</div>

		<!-- footer here -->
		<footer class="footer">
			<div class="container-fluid">
				

			</div>
		</footer>
	</body>
</html>