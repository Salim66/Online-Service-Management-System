<?php 
	define('PAGE', 'technician');
	define('TITLE', 'Update Technician');
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
			$empid = $_POST['empid'];

			$sql = "SELECT * FROM technician_tb WHERE empId = '$empid'";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
		}
		if (isset($_POST['empupdate'])) {
			$e_id = $_POST['e_id'];
			$e_name = $_POST['e_name'];
			$e_city = $_POST['e_city'];
			$e_mobile = $_POST['e_mobile'];
			$e_email = $_POST['e_email'];

			if (empty($e_id) || empty($e_name) || empty($e_city) || empty($e_mobile) || empty($e_email)) {
				$mess = "<p class='alert alert-warning'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}else {
				$sql = "UPDATE technician_tb SET empId = '$e_id', empName = '$e_name', empCity='$e_city', empMobile='$e_mobile', empEmail='$e_email' WHERE empId = '$e_id'";

				if ($conn -> query($sql) == true) {
					$mess = "<p class='alert alert-success'>Update Technician Successfully !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}else {
					$mess = "<p class='alert alert-danger'>Unable to Update !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}
			}

		}

	 ?>
	<h3 class="text-center">Update Technician Details</h3>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="form-group">
			<label for="r_login_id">Employe ID</label>
			<input class="form-control" type="text" id="e_id" name="e_id" value="<?php if(isset($row['empId'])){ echo $row['empId'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="r_login_id">Employe Name</label>
			<input class="form-control" type="text" id="e_name" name="e_name" value="<?php if(isset($row['empName'])){ echo $row['empName'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_login_id">Employe City</label>
			<input class="form-control" type="text" id="e_city" name="e_city" value="<?php if(isset($row['empCity'])){ echo $row['empCity'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_login_id">Employe Mobile</label>
			<input class="form-control" type="text" id="e_mobile" name="e_mobile" value="<?php if(isset($row['empMobile'])){ echo $row['empMobile'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_login_id">Employe Email</label>
			<input class="form-control" type="text" id="e_email" name="e_email" value="<?php if(isset($row['empEmail'])){ echo $row['empEmail'];} ?>">
		</div>
		<div class="form-group text-right">
			<button class="btn btn-info" type="submit" name="empupdate" id="empupdate">Update</button>
			<a href="technician.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
</div><!-- Column 2nd Column -->
<div class="col-sm-3 mt-5 ">
	<?php if (isset($mess)) {
	echo $mess;
} ?>
</div>
<!-- End 3rd column -->

<?php include_once 'includes/footer.php' ?>