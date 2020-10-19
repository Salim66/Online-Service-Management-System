<?php 
	define('PAGE', 'asset');
	define('TITLE', 'Update Product');
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
			$pid = $_POST['pid'];

			$sql = "SELECT * FROM assets_tb WHERE pid = '$pid'";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
		}
		if (isset($_POST['pupdate'])) {
			$pid = $_POST['pid'];
			$pname = $_POST['pname'];
			$pdop = $_POST['pdop'];
			$pava = $_POST['pava'];
			$ptotal = $_POST['ptotal'];
			$poriginalcost = $_POST['poriginalcost'];
			$psellingcost = $_POST['psellingcost'];

			if (empty($pname) || empty($pdop) || empty($pava) || empty($ptotal) || empty($poriginalcost) || empty($psellingcost)) {
				$mess = "<p class='alert alert-warning'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}else {
				$sql = "UPDATE assets_tb SET pname = '$pname', pdop='$pdop', pava='$pava', ptotal='$ptotal', poriginalcost='$poriginalcost', psellingcost='$psellingcost' WHERE pid = '$pid'";

				if ($conn -> query($sql) == true) {
					$mess = "<p class='alert alert-success'>Update Product Successfully !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}else {
					$mess = "<p class='alert alert-danger'>Unable to Update !<button class='close' data-dismiss='alert'>&times;</button></p>";
				}
			}

		}

	 ?>
	<h3 class="text-center">Update Product Details</h3>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="form-group">
			<label for="pid">Product ID</label>
			<input class="form-control" type="text" id="pid" name="pid" value="<?php if(isset($row['pid'])){ echo $row['pid'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input class="form-control" type="text" id="pname" name="pname" value="<?php if(isset($row['pname'])){ echo $row['pname'];} ?>">
		</div>
		<div class="form-group">
			<label for="pdop">Date of Purchases</label>
			<input class="form-control" type="date" id="pdop" name="pdop" value="<?php if(isset($row['pdop'])){ echo $row['pdop'];} ?>">
		</div>
		<div class="form-group">
			<label for="pava">Available</label>
			<input class="form-control" type="text" id="pava" name="pava" value="<?php if(isset($row['pava'])){ echo $row['pava'];} ?>">
		</div>
		<div class="form-group">
			<label for="ptotal">Total</label>
			<input class="form-control" type="text" id="ptotal" name="ptotal" value="<?php if(isset($row['ptotal'])){ echo $row['ptotal'];} ?>">
		</div>
		<div class="form-group">
			<label for="poriginalcost">Product Original Cost</label>
			<input class="form-control" type="text" id="poriginalcost" name="poriginalcost" value="<?php if(isset($row['poriginalcost'])){ echo $row['poriginalcost'];} ?>">
		</div>
		<div class="form-group">
			<label for="psellingcost">Product Selling Cost</label>
			<input class="form-control" type="text" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost'])){ echo $row['psellingcost'];} ?>">
		</div>
		<div class="form-group text-right">
			<button class="btn btn-info" type="submit" name="pupdate" id="pupdate">Update</button>
			<a href="asset.php" class="btn btn-secondary">Close</a>
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