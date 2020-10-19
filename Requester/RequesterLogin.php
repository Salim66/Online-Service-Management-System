<?php 
	include_once '../dbConnection.php';
	session_start();


	/**
	 * Validate form
	 */
	if ( !isset($_SESSION['is_login']) ) {
		if ( isset($_REQUEST['rEmail']) ) {
			// Assigned user value to variable
			$rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
			$rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));

			if ( empty($rEmail) || empty($rPassword) ) {
				$mess = '<div class="alert alert-warning">All fields are required!<button class="close" data-dismiss="alert">&times;</button></div>';
			}else {
				//Data query from database table
				$sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email = '$rEmail' AND r_password = '$rPassword' limit 1";
				$result = $conn -> query($sql);

				if ( $result -> num_rows == 1 ) {
					$_SESSION['is_login'] = true;
					$_SESSION['rEmail'] = $rEmail;
					header('location:RequesterProfile.php');
					exit();
				} else {
					$mess = '<div class="alert alert-warning">Enter valid Email and Password!<button class="close" data-dismiss="alert">&times;</button></div>';
				}
				
			}
		}

	} else {
		header('location:RequesterProfile.php');
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- CSS LINK -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
	
	<div class="mt-5 text-center mb-3" style="font-size: 30px;">
		<i class="fas fa-stethoscope"></i><span>Online Service Management System</span>
	</div>
	<p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"></i>Requester Area (Demo)</p>
	<!-- Start Requester Login Form -->
	<div class="container-fluid">
		<div class="row justify-content-center custom-margin">
			<div class="col-sm-6 col-md-4">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="shadow-lg p-4">
					<div class="form-group">
						<i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
						<input type="email" name="rEmail" class="form-control" placeholder="Email">
						<small>We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
						<input type="password" name="rPassword" class="form-control" placeholder="Password">
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