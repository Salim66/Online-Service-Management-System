<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo TITLE; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="../assets/css/all.min.css">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
	
	<!-- Top Navbar -->
	<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
	</nav>
 
 	<!-- Start Container -->
 	<div class="container-fluid" style="margin-top:40px;">
 		<div class="row"><!-- Start Row -->
 			<nav class="col-sm-2 bg-light sidebar py-5"><!-- Start Side Bar 1st column -->
 				<div class="sidebar-sticky">
 					<ul class="nav flex-column">
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'dashboard') { echo 'active'; } ?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'work') { echo 'active'; } ?>" href="work.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'request'){ echo 'active'; } ?>" href="request.php"><i class="fas fa-align-center"></i>Requests</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'asset'){ echo 'active'; } ?>" href="asset.php"><i class="fas fa-database"></i>Assets</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'technician'){ echo 'active'; } ?>" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'requesters'){ echo 'active'; } ?>" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'sellreport'){ echo 'active'; } ?>" href="soldproductreport.php"><i class="fas fa-table"></i>Sell Report</a></li>
 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'workreport'){ echo 'active'; } ?>" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>

 						<li class="nav-item"><a class="nav-link <?php if(PAGE == 'ChangePassword'){ echo 'active'; } ?>" href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
 						<li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
 					</ul>
 				</div>
 			</nav><!-- End Side Bar 1st column -->

