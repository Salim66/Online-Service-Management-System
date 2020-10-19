<?php 
	define('PAGE', 'requesters');
	define('TITLE', 'Update Requester');
	include_once '../dbConnection.php';
	include_once 'includes/header.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo "<script> location.href='login.php'</script>";
	}

 ?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<?php 
		if (isset($_POST['edit'])) {
			$login_id = $_POST['id'];

			$sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id = '$login_id'";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
		}
		if (isset($_POST['requpdate'])) {
			$r_login_id = $_POST['r_login_id'];
			$r_name = $_POST['r_name'];
			$r_email = $_POST['r_email'];

			if (empty($r_login_id) || empty($r_name) || empty($r_email)) {
				$mess = "<p class='alert alert-warning'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}else {
				$sql = "UPDATE requesterlogin_tb SET r_login_id = '$r_login_id', r_name = '$r_name', r_email='$r_email' WHERE r_login_id = '$r_login_id'";

				if ($conn -> query($sql) == true) {
					$mess = "<p class='alert alert-success'>Update Requester Data Successfully !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}else {
					$mess = "<p class='alert alert-danger'>Unable to Update !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}
			}

		}

	 ?>
	<h3 class="text-center">Update Requester Details</h3>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="form-group">
			<label for="r_login_id">Requester ID</label>
			<input class="form-control" type="text" id="r_login_id" name="r_login_id" value="<?php if(isset($row['r_login_id'])){ echo $row['r_login_id'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="r_login_id">Name</label>
			<input class="form-control" type="text" id="r_name" name="r_name" value="<?php if(isset($row['r_name'])){ echo $row['r_name'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_login_id">Email</label>
			<input class="form-control" type="text" id="r_email" name="r_email" value="<?php if(isset($row['r_email'])){ echo $row['r_email'];} ?>">
		</div>
		<div class="form-group text-right">
			<button class="btn btn-info" type="submit" name="requpdate" id="requpdate">Update</button>
			<a href="requester.php" class="btn btn-secondary">Close</a>
		</div>
		<?php if (isset($mess)) {
			echo $mess;
		} ?>
	</form>
</div><!-- Column 2nd Column -->


<?php include_once 'includes/footer.php' ?>