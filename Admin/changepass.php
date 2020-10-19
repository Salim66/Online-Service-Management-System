<?php 
	define('PAGE', 'ChangePassword');
	define('TITLE', 'Change Password');
	include_once '../dbConnection.php';
	include_once 'includes/header.php';
	session_start();

	// // Validate user login or not
	if(isset($_SESSION['is_adminlogin'])){
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo '<script> location.href="login.php"</script>';
	}

 	// Requester login table 
	$sql = "SELECT * FROM adminlogin_tb WHERE a_email = '$aEmail'";
	$admin_data = $conn -> query($sql);
	$aFetch_data = $admin_data -> fetch_assoc();

	$old_user_pass = $aFetch_data['a_password'];	

	// Validation Requester Change Password
	if ( isset($_REQUEST['passupdate']) ) {
		// Assiging user values to vriables
		$oldPassword = $_REQUEST['aOldPasswrod'];
		$newPassword = $_REQUEST['aNewPasswrod'];

		if ( empty($oldPassword) || empty($newPassword) ) {
			$mess = "<p class='alert alert-danger mx-5 mt-2'>All fields are required!<button class='close' data-dismiss='alert'>&times;</button></p>";
		} else {
			if ($old_user_pass == $oldPassword) {
				$sql = "UPDATE adminlogin_tb SET a_password = '$newPassword' WHERE a_email = '$aEmail'";
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
			<label for="rEmail">Email</label><input type="email" name="aEmail" id="aEmail" class="form-control" readonly value="<?php echo $aEmail; ?>">
		</div>
		<div class="form-group">
			<label for="aOldPass">Old Password</label><input type="password" id="aOldPass" name="aOldPasswrod" class="form-control">
		</div>
		<div class="form-group">
			<label for="aNewPass">New Password</label><input type="password" id="aNewPass" name="aNewPasswrod" class="form-control">
		</div>
		<button type="submit" name="passupdate" class="btn btn-danger">Update</button>
		<button type="submit" name="passreset" class="btn btn-secondary">Reset</button>
	</form>
	<?php if ( isset($mess) ) {
		echo $mess;
	} ?>
</div><!-- Start user change password 2nd column -->

 <?php include_once 'includes/footer.php'; ?>