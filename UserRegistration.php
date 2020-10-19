<?php 
	require_once 'dbConnection.php';


	if ( isset($_REQUEST['rSignUp']) ) {
		// Assiging User Values to Variables
		$rName = $_REQUEST['rName'];
		$rEmail = $_REQUEST['rEmail'];
		$rPassword = $_REQUEST['rPassword'];

		/**
		 * Checking User Variables
		 */
		if ( empty($rName) || empty($rEmail) || empty($rPassword) ) {
			$regmess = '<div class="alert alert-warning" role="alert">All fields are required !<button class="close" data-dismiss="alert">&times;</button></div>';
		} else {

			// Validation User Email and Database Email
			$sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email='$rEmail'";
			$result = $conn -> query($sql);

			if ( $result -> num_rows == 1) {
				$regmess = '<div class="alert alert-warning" role="alert">Email ID Already Registered !<button class="close" data-dismiss="alert">&times;</button></div>';
			}else {
				
				// Data send by User variable to Database
				$sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES('$rName', '$rEmail', '$rPassword')";
				$data = $conn -> query($sql);

				if( $data == true ){
					$regmess = '<div class="alert alert-success" role="alert">Account Successful Created !<button class="close" data-dismiss="alert">&times;</button></div>';
				}else {
					$regmess = '<div class="alert alert-warning" role="alert">Unabble to Create Account !<button class="close" data-dismiss="alert">&times;</button></div>';
				}
			}

		}
		
	}




 ?>
<!-- Start Registration Form Container -->
	<div class="container mt-4" id="registration">
		<h1 class="text-center">Create an Account</h1>
		<div class="row mt-4 mb-4">
			<div class="col-md-6 offset-md-3">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" class="shadow-lg p-4" method="POST">
					<div class="form-group">
						<i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2" >Name</label>
						<input type="text" class="form-control" name="rName" placeholder="Name">
					</div>
					<div class="form-group">
						<i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Email</label>
						<input type="email" class="form-control" name="rEmail" placeholder="Email">
						<span style="font-size:12px;" class="form-text">We'll never share your eamil with anyone else.</span>
					</div>
					<div class="form-group">
						<i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">New Password</label>
						<input type="password" class="form-control" name="rPassword" placeholder="Password">
					</div>
					<button type="submit" name="rSignUp" class="btn btn-danger mt-5 btn-block font-weight-bold shadow-sm">Sign Up</button>
					<em style="font-size: 10px;">Note - By clicking Sign Up, your agree to our terms, Data Policy and Cookie Policy</em>
					<div class="mt-2">
						<?php 

							// User validation message
							if ( isset($regmess) ) {
								echo $regmess;
							}

						 ?>
					</div>
				</form>
			</div>
		</div>
	</div><!-- End Registration Form Container -->
