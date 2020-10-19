<?php 
	include_once '../dbConnection.php';
	session_start();


	/**
	 * Validate form
	 */
	if ( !isset($_SESSION['is_adminlogin']) ) {
		if ( isset($_REQUEST['aEmail']) ) {
			// Assigned user value to variable
			$aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
			$aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));

			if ( empty($aEmail) || empty($aPassword) ) {
				$mess = '<div class="alert alert-warning">All fields are required!<button class="close" data-dismiss="alert">&times;</button></div>';
			}else {
				//Data query from database table
				$sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email = '$aEmail' AND a_password = '$aPassword' limit 1";
				$result = $conn -> query($sql);

				if ( $result -> num_rows == 1 ) {
					$_SESSION['is_adminlogin'] = true;
					$_SESSION['aEmail'] = $aEmail;
					header('location:dashboard.php');
					exit();
				} else {
					$mess = '<div class="alert alert-warning">Enter valid Email and Password!<button class="close" data-dismiss="alert">&times;</button></div>';
				}
				
			}
		}

	} else {
		header('location:dashboard.php');
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<!-- CSS LINK -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
	
	<div class="mt-5 text-center mb-3" style="font-size: 30px;">
		<i class="fas fa-stethoscope"></i><span>Online Service Management System</span>
	</div>
	<p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"></i>Admin Area (Demo)</p>
	<!-- Start Requester Login Form -->
	<div class="container-fluid">
		<div class="row justify-content-center custom-margin">
			<div class="col-sm-6 col-md-4">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="shadow-lg p-4">
					<div class="form-group">
						<i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
						<input type="email" name="aEmail" class="form-control" placeholder="Email">
						<small>We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
						<input type="password" name="aPassword" class="form-control" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Login</button>
					<?php 
						if ( isset($mess) ) {
							echo $mess;
						}
					 ?>
				</form>
				<div class="text-center"><a href="../index.php" class="btn btn-info font-weight-bold mt-3 shadow-sm">Back to Home</a></div>
			</div>
		</div>
	</div><br>
	<!-- End Requester Login Form -->

	<!-- JS LINK -->
	<script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/all.min.js"></script>
</body>
</html>