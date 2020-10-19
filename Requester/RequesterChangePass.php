<?php 
	define('TITLE', 'Change Password');
	define('PAGE', 'ChangePassword');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();

	// // Validate user login or not
	if ( isset($_SESSION['is_login']) ) {
		$rEmail = $_SESSION['rEmail'];
	} else {
		header('location:RequesterLogin.php');
	}
	
	// Requester login table 
	$sql = "SELECT * FROM requesterlogin_tb WHERE r_email = '$rEmail'";
	$requster_data = $conn -> query($sql);
	$rFetch_data = $requster_data -> fetch_assoc();

	$old_user_pass = $rFetch_data['r_password'];	

	// Validation Requester Change Password
	if ( isset($_REQUEST['passupdate']) ) {
		// Assiging user values to vriables
		$oldPassword = $_REQUEST['rOldPasswrod'];
		$newPassword = $_REQUEST['rNewPasswrod'];

		if ( empty($oldPassword) || empty($newPassword) ) {
			$mess = "<p class='alert alert-danger mx-5 mt-2'>All fields are required!<button class='close' data-dismiss='alert'>&times;</button></p>";
		} else {
			if ($old_user_pass == $oldPassword) {
				$sql = "UPDATE requesterlogin_tb SET r_password = '$newPassword' WHERE r_email = '$rEmail'";
				$result = $conn -> query($sql);
				if (isset($result)) {
					$mess = "<p class='alert alert-success mx-5 mt-2'>Password Updated Successful!<button class='close' data-dismiss='alert'>&times;</button></p>";
				} else {
					$mess = "<p class='alert alert-danger mx-5 mt-2'>Unable to Update!<button class='close' data-dismiss='alert'>&times;</button></p>";
				}
				
			} else {
				$mess = "<p class='alert alert-danger mx-5 mt-2'>Password Not Match!<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			
		}
		

	}
	


 ?>
<div class="col-sm-4 col-md-5"><!-- Start user change password 2nd column -->
	<form action="" method="POST" class="mr-4 mt-5 mx-5 shadow p-4">
		<div class="form-group">
			<label for="rEmail">Email</label><input type="email" name="rEmail" id="rEmail" class="form-control" readonly value="<?php echo $rEmail; ?>">
		</div>
		<div class="form-group">
			<label for="rOldPass">Old Password</label><input type="password" id="rOldPass" name="rOldPasswrod" class="form-control">
		</div>
		<div class="form-group">
			<label for="rNewPass">New Password</label><input type="password" id="rNewPass" name="rNewPasswrod" class="form-control">
		</div>
		<button type="submit" name="passupdate" class="btn btn-danger">Update</button>
		<button type="submit" name="passreset" class="btn btn-secondary">Reset</button>
	</form>
	<?php if ( isset($mess) ) {
		echo $mess;
	} ?>
</div><!-- Start user change password 2nd column -->


 <?php include_once 'includes/footer.php'; ?>