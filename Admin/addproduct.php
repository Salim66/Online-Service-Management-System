<?php 
	define('PAGE', 'asset');
	define('TITLE', 'Add Product');
	include_once '../dbConnection.php';
	include_once 'includes/header.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo "<script> location.href='login.php'</script>";
	}
	/**
	 * Product add query
	 */
	if (isset($_POST['addproduct'])) {
		$pname = $_POST['pname'];
		$pdop = $_POST['pdop'];
		$pava = $_POST['pava'];
		$ptotal = $_POST['ptotal'];
		$poriginalcost = $_POST['poriginalcost'];
		$psellingcost = $_POST['psellingcost'];

		if (empty($pname) || empty($pdop) || empty($pava) || empty($ptotal) || empty($poriginalcost) || empty($psellingcost)) {
			$mess = "<p class='alert alert-warning'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
		} else {
			$sql = "INSERT INTO assets_tb(pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES('$pname','$pdop','$pava','$ptotal','$poriginalcost','$psellingcost')";
			if ($conn->query($sql) == TRUE) {
				$mess = "<p class='alert alert-success'>Product Added Successful !<button class='close' data-dismiss='alert'>&times;</button></p>";
			} else {
				$mess = "<p class='alert alert-danger'>Unable to Added !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			
		}
		
	}
 ?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add Product</h3>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" id="pname" name="pname" class="form-control">
		</div>
		<div class="form-group">
			<label for="pdop">Product Date of Purchases</label>
			<input type="date" id="pdop" name="pdop" class="form-control">
		</div>
		<div class="form-group">
			<label for="pava">Available Produect</label>
			<input type="text" id="pava" name="pava" class="form-control">
		</div>
		<div class="form-group">
			<label for="ptotal">Total Product</label>
			<input type="text" id="ptotal" name="ptotal" class="form-control">
		</div>
		<div class="form-group">
			<label for="poriginalcost">Original Price</label>
			<input type="text" id="poriginalcost" name="poriginalcost" class="form-control">
		</div>
		<div class="form-group">
			<label for="psellingcost">Selling Price</label>
			<input type="text" id="psellingcost" name="psellingcost" class="form-control">
		</div>
		<div class="float-right">
			<button type="submit" class="btn btn-primary" name="addproduct">Submit</button>
			<a href="asset.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
</div><!-- End 2nd Column -->
<div class="col-sm-3 mt-5 mx-3">
	<?php if(isset($mess)){
		echo $mess;
	} ?>
</div>

 <?php include_once 'includes/footer.php' ?>