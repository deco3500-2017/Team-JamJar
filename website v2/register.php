<?php
ini_set('display_errors', 1);
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: board.php");
}
require_once 'dbconnect.php';

if(isset($_POST['submit1'])) {
 
 $uname = $_POST['username'];
 $email = $_POST['email'];
 $upass = $_POST['password'];
 $country =  $_POST['country'];
 $addressline1 =  $_POST['addressline1'];
 $addressline2 =   $_POST['addressline2']; 
 $zipcode =  $_POST['postcode'];
 $city =   $_POST['city']; 
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT);// this function works only in PHP 5.5 or latest version 
 $check_email = $conn->prepare("SELECT COUNT(userEmail) AS count FROM users3500 WHERE userEmail=?");
 $check_email->bind_param('s', $email);
 $check_email->execute();
 $row=$check_email->get_result()->fetch_assoc();
 
 if ($row['count']==0) { 
  $query = $conn->prepare("INSERT INTO users3500(userName,userEmail,userPass,addressline1,addressline2,country,zipcode,city) VALUES(?,?,?,?,?,?,?,?)");
  $query->bind_param('ssssssss', $uname, $email, $hashed_password, $addressline1, $addressline2, $country, $zipcode, $city);  
  if ($query->execute()) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
	
	$session = $conn->prepare("SELECT * FROM users3500 WHERE userEmail=?");
	$session->bind_param('s', $email);
 	$session->execute();
 	$rowsesh=$session->get_result()->fetch_assoc();
	$_SESSION['userSession'] = $rowsesh['userId'];
	header("Location: index.php");
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
	 
  }  
 } else {  
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
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
		
		<!-- https://github.com/Foliotek/Croppie 
		<script src="js/croppie.min.js"></script> -->

		<script type="text/javascript" src="js/main.js"></script>

	</head>
	<body>
		<!-- header here -->
		<header class="header">
			<div class="container-fluid">
				<div class="row justify-content-md-center">

					<div class="col col-8">
						<p class="title">Create an account</p>
					</div>

				</div>
			</div>
		</header>


		<!-- content here -->
		<div class="container-fluid content">

			<div class="row">
				<div class="col-12">
					<form  method = 'post'>
						<!-- progressbar -->
						<h1> Steps: </h1>
						<ul id="progressbar">
							<li class="active">Account Setup</li>
							<li>Address</li>
							<li>Authentication</li>
						</ul>
						<!-- fieldsets -->
						<!-- the fiset fieldset -->
						<fieldset class="col-12">
							<div class="row mb-5">
								<div class="col-12">
									<input type="button" class="btn btn-lg btn-primary btn-block btn-xl" value="Sign In with Facebook" name="fackbook" />
								</div>
							</div>

							<div class="row" style="margin-top: 10%; margin-bottom: 10%;">
								<div class="col-12">
									<div class="divider"><span class="break">or</span></div>
								</div>
							</div>

							<div class="row mt-5">
								<div class="col-12">
									<div class="form-group">
										<label for="inputName" style="font-size: 32px;">What is your name?</label>
										<input type="text" id="inputName" class="form-control input-lg" placeholder="Name" name = 'username' required="" autofocus="">
									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-12">
									<div class="form-group">
										<label for="inputEmail" style="font-size: 32px;">What is your email address?</label>
										<input type="email" id="inputEmail" class="form-control input-lg" placeholder="Email" name = 'email' required="">
									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-12">
									<div class="form-group">
										<label for="inputPassword" style="font-size: 32px;">What is your email address?</label>
										<input type="password" id="inputPassword" class="form-control input-lg" placeholder="Password" name = 'password' required="">
									</div>
								</div>
							</div>
							<div class="row mt-5 justify-content-center">
								<div class="col-6">
									<input type="button" name="next" class="next btn btn-lg btn-primary btn-block btn-xl" value="Next" />
								</div>
							</div>
							<div class="row mt-5 justify-content-center">
								<div>
									<a href="login.html" style="font-size: 36px;color:black;text-align: center;">I have an account</a>
								</div>
							</div>
						</fieldset>
						<!-- the second fieldset -->
						<fieldset class="col-12">
							<div class="row mt-5">
								<div class="col-12">
									<div class="form-group">
										<label for="inputCountry" style="font-size: 32px;">Country</label>
										<input type="text" id="inputCountry" class="form-control input-lg" placeholder="" name = 'country' required=""/>
									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-12">
									<div class="form-group">
										<label for="inputAdd1" style="font-size: 32px;">Address line 1</label>
										<input type="text" id="inputAdd1" class="form-control input-lg" placeholder="" name = 'addressline1' required=""/>
									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-12">
									<div class="form-group">
										<label for="inputAdd2" style="font-size: 32px;">Address line 2 (optional)</label>
										<input type="text" id="inputAdd2" class="form-control input-lg" name = 'addressline2' placeholder="" />
									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-6">
									<div class="form-group">
										<label for="inputPostcode" style="font-size: 32px;">Post Code</label>
										<input type="text" id="inputPostcode" class="form-control input-lg" name = 'postcode' placeholder="" required=""/>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="inputCity" style="font-size: 32px;">City</label>
										<input type="text" id="inputCity" class="form-control input-lg" name = 'city' placeholder="" required=""/>
									</div>
								</div>
							</div>

							<div class="row mt-5">
								<div class="col-6">
									<input type="button" name="previous" class="previous btn btn-lg btn-secondary btn-block btn-xl" value="Previous" />
								</div>
								<div class="col-6">
									<input type="button" name="next" class="next btn btn-lg btn-primary btn-block btn-xl" value="Next" />
								</div>
							</div>

						</fieldset>
						<!-- the third fieldset -->
						<fieldset class="col-12">
							<div class="row mt-5">
								<div class="col-12">
									<p style="font-size: 32px; font-weight: bold;">Please identify yourself to get the full access to the resources shared in your community.</p>


								</div>
							</div>
							<div class="row my-5">
								<div class="col-12">
									<div class="form-group">
										<label for="identify" style="font-size: 32px;">Type in the identify code</label>
										<input type="text" id="identify" class="form-control input-lg" placeholder="" />
									</div>
								</div>

							</div>

							<div class="row" style="margin-top: 10%; margin-bottom: 10%;">
								<div class="col-12">
									<div class="divider"><span class="break">or</span></div>
								</div>
							</div>

							<div class="row my-5">
								<div class="col-12">
									<div class="form-group">
										<label for="takephoto" style="font-size: 32px;">Scan the QR code</label>
										<input type="button" id="takephoto" value="Take a photo" name="take a phtot" class="form-control btn btn-lg btn-warning btn-block btn-xl" style="padding: 2% 0 2% 0; color: white" />
									</div>
								</div>

							</div>



							<div class="row" style="margin-top: 10%">
								<div class="col-6">
									<input type="button" name="previous" class="previous btn btn-lg btn-secondary btn-block btn-xl" value="Previous" />
								</div>
								<div class="col-6">
									<input  type="submit" name = 'submit' class="btn btn-lg btn-primary btn-block btn-xl" value="Submit" />
									<input  type="submit" name = 'submit1'  />
								</div>
							</div>
							<div class="row mt-5 justify-content-center">
								<div>
									<input type="submit" value="Skip the Authentication" name="submit" style="font-size: 36px;color:black;text-align: center;color: grey">
								</div>
							</div>
					  	</fieldset>
				  	</form>
				</div>
			</div>
		</div>




	</body>
</html>