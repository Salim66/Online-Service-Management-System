<?php
	define('TITLE', 'Requester Profile');
	define('PAGE', 'RequesterProfile');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();

	/**
	 * Email and Name set Profile Page
	 */
	if ( isset($_SESSION['is_login']) ) {
		$rEmail = $_SESSION['rEmail'];
	} else {
		echo "<script>location.href='RequesterLogin.php'</script>";
	}
	
	$sql = "SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email = '$rEmail'";
	$result = $conn -> query($sql);

	if ($result -> num_rows == 1) {
		$row = $result -> fetch_assoc();
		$rName = $row['r_name'];
	}

	// /**
	//  * Update Nmae
	//  */
	if ( isset($_REQUEST['nameupdate']) ) {
		//Get Value from user
		$rName = $_POST['rName'];

		if ($rName == '') {
			$passmsg = "<p class='alert alert-danger ml-5 col-sm-6 mt-2'>All fields are required!<button class='close' data-dismiss='alert'>&times;</button></p>";
		} else {
			$sql = "UPDATE requesterlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";

			if ( $conn -> query($sql) == true ) {
				$passmsg = "<p class='alert alert-success ml-5 col-sm-6 mt-2'>Updated Successful!<button class='close' data-dismiss='alert'>&times;</button></p>";
			} else {
				$passmsg = "<p class='alert alert-danger ml-5 col-sm-6 mt-2'>Unable Updated!<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			
		}
		
		
	}
	

 ?>

<div class="col-sm-6 mt-5"><!-- Start Profile Area 2nd Column -->
	<form action="" method="POST" class="mx-5 shadow p-4">
		<div class="form-group">
			<label for="rEmail">Email</label><input type="eamil" name="rEmail" id="rEmail" class="form-control" readonly value="<?php echo $rEmail; ?>">
		</div>
		<div class="form-group">
			<label for="rName">Name</label><input type="text" name="rName" id="rName" class="form-control" value="<?php echo $rName; ?>">
		</div>
		<button type="submit" class="btn btn-danger shadow-sm" name="nameupdate">Update</button>
	</form>	
	<!-- Show error and success message -->
	<?php if (isset($passmsg)) {
		echo $passmsg;
	} 
	 ?>
</div><!-- End Profile Area 2nd Column -->

<?php include_once 'includes/footer.php' ?>