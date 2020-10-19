<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OSMS</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="assets/css/all.min.css">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
	<!-- Start Navigation -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
		<a class="navbar-brand" href="index.php">OSMS</a>
		<span class="navbar-text">Customer's Happiness is Our Aim</span>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="myMenu">
			<ul class="navbar-nav pl-5">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
				<li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
				<li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
				<li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
			</ul>
		</div>
	</nav> <!-- End Navigation -->

	<!-- Start Header Jumbotron -->
	<header class="jumbotron back-image" style="background-image: url(assets/images/woman-robot-happy-900x400.jpg);">
		<div class="myClass mainHeading">
			<h1 class="text-uppercase text-danger font-weight-bold">Welcome to OSMS</h1>
			<p class="font-italic">Customer's Happiness is Our Aim!</p>
			<a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
			<a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
		</div>
			
	</header><!-- End Header Jumbotron -->

	<!-- Start Introduction Section -->
	<div class="container">
		<div class="jumbotron">
			<h3 class="text-center">OSMS Services</h3>
			<p>
				OSMS Services is India’s leading chain of multi-brand Electronics and Electrical service
				workshops offering
				wide array of services. We focus on enhancing your uses experience by offering world-class
				Electronic
				Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
				services to
				keep the devices fit and healthy and customers happy and smiling”.

				With well-equipped Electronic Appliances service centres and fully trained mechanics, we
				provide quality
				services with excellent packages that are designed to offer you great savings.

				Our state-of-art workshops are conveniently located in many cities across the country. Now you
				can book
				your service online by doing Registration

			</p>
		</div>
	</div><!-- End Introduction Section Container -->

	<!-- Start Our Services Container -->
	<div class="container text-center border-bottom" id="Services">
		<h2>Our Services</h2>
		<div class="row mt-4">
			<div class="col-sm-4 mb-4">
				<a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
				<h4 class="mt-4">Electronic Appliances</h4>
			</div>
			<div class="col-sm-4 mb-4">
				<a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
				<h4 class="mt-4">Preventive Mainteance</h4>
			</div>
			<div class="col-sm-4 mb-4">
				<a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
				<h4 class="mt-4">Fault Repair</h4>
			</div>
		</div>
	</div><!-- End Our Services Container -->

	<!-- Start Registration Form Container -->

	<?php include_once 'UserRegistration.php' ?>

	<!-- End Registration Form Container -->

	<!-- Start Happy Customer -->
	<div class="jumbotron bg-danger">
		<div class="container">
			<h2 class="text-white text-center">Happy Customers</h2>
			<div class="row mt-5">
				<div class="col-lg-3 col-sm-6"> <!-- Start 1st Column -->
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="assets/images/avtar1.jpeg" style="border-radius: 100px;" class="img-fluid" alt="avt1">
							<h4 class="card-title">Deniyal Smith</h4>
							<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                				ducimus voluptas
                				nesciunt debitis numquam.
                			</p>	
						</div>
					</div>
				</div><!-- End 1st Column -->
				<div class="col-lg-3 col-sm-6"> <!-- Start 2nd Column -->
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="assets/images/avtar2.jpeg" style="border-radius: 100px;" class="img-fluid" alt="avt2">
							<h4 class="card-title">Shusmita Shan</h4>
							<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                				ducimus voluptas
                				nesciunt debitis numquam.
                			</p>	
						</div>
					</div>
				</div><!-- End 2nd Column -->
				<div class="col-lg-3 col-sm-6"> <!-- Start 3rd Column -->
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="assets/images/avtar3.jpeg" style="border-radius: 100px;" class="img-fluid" alt="avt3">
							<h4 class="card-title">Shabbir Hossain</h4>
							<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                				ducimus voluptas
                				nesciunt debitis numquam.
                			</p>	
						</div>
					</div>
				</div><!-- End 3rd Column -->
				<div class="col-lg-3 col-sm-6"> <!-- Start 4th Column -->
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="assets/images/avtar4.jpeg" style="border-radius: 100px;" class="img-fluid" alt="avt4">
							<h4 class="card-title">Jorjina Rodhrigas</h4>
							<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                				ducimus voluptas
                				nesciunt debitis numquam.
                			</p>	
						</div>
					</div>
				</div><!-- End 4th Column -->
			</div>
		</div>
	</div><!-- End Happy Customer -->

	<!-- Start Contact Us -->
	<div class="container" id="Contact">
		<h2 class="text-center mb-4">Contact Us</h2>
		<div class="row">
			<!-- Start 1st Column -->

			<?php require_once 'ContactForm.php' ?>
			
			<!-- End 1st Column -->
			<div class="col-md-4 text-center"><!-- Start 2nd Column -->
				<strong>Headquarter:</strong><br>
				OSMS pvt Ltd,<br>
				Mirpur-2, Dhaka<br>
				Dhaka - 1612<br>
				Phone: +0000000000<br>
				<a href="#" target="_blank">www.osms.com</a><br><br>
				<br>
				<strong>Branch:</strong><br>
				OSMS pvt Ltd,<br>
				Paglapir, Rangpur<br>
				Rangpur - 5400<br>
				Phone: +0000000000<br>
				<a href="#" target="_blank">www.osms.com</a>
			</div><!-- End 2nd Column -->
		</div>
	</div><!-- End Contact Us -->

	<!-- Start Footer -->
	<footer class="container-fluid btn-dark mt-5 text-white">
		<div class="container">
			<div  class="row py-3">
				<div class="col-md-6 cl">
				  <!-- Start Footer 1st Column -->
				  <span class="pr-2">Follow Us: </span>
				  <a href="#" target="_blank" class="pr-2 fi-color text-danger"><i class="fab fa-facebook-f"></i></a>
				  <a href="#" target="_blank" class="pr-2 fi-color text-danger"><i class="fab fa-twitter"></i></a>
				  <a href="#" target="_blank" class="pr-2 fi-color text-danger"><i class="fab fa-youtube"></i></a>
				  <a href="#" target="_blank" class="pr-2 fi-color text-danger"><i class="fab fa-google-plus-g"></i></a>
				  <a href="#" target="_blank" class="pr-2 fi-color text-danger"><i class="fas fa-rss"></i></a>
				</div> <!-- End Footer 1st Column -->
				<div class="col-md-6 text-right"><!-- Start 2nd Column -->
					<small>Designed by ThreeSixtyDegree &copy; 2020</small>
					<small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
				</div><!-- End 2nd Column -->
			</div>
		</div>
	</footer><!-- End Footer -->


	<!-- JS LINK -->
	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/all.min.js"></script>
</body>
</html>