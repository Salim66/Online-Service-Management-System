<?php 
	define('PAGE', 'asset');
	define('TITLE', 'Sell Product');
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
		if (isset($_POST['issue'])) {
			$pid = $_POST['pid'];

			$sql = "SELECT * FROM assets_tb WHERE pid = '$pid'";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
		}
		if (isset($_POST['psubmit'])) {
			$pid = $_POST['pid'];
			$pava = $_POST['pava'] - $_POST['pquentity'];


			$cname = $_POST['cname'];
			$cadd = $_POST['cadd'];
			$pname = $_POST['pname'];
			$pquentity = $_POST['pquentity'];
			$psellingcost = $_POST['psellingcost'];
			$totalcost = $_POST['totalcost'];
			$inputdate = $_POST['inputdate'];

			if (empty($pid) || empty($cname) || empty($cadd) || empty($pname) || empty($pava) || empty($pquentity) || empty($psellingcost) || empty($totalcost) || empty($inputdate)) {
				$mess = "<p class='alert alert-warning'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}else {

				$sql = "INSERT INTO customer_tb(custname, custadd, cpname, cpquentity, cpeach, cptotal, cpdate) VALUES('$cname','$cadd','$pname','$pquentity','$psellingcost','$totalcost','$inputdate')";

				if ($conn -> query($sql) == true) {
					$genid = mysqli_insert_id($conn);
					session_start();
					$_SESSION['myid'] = $genid;
					echo "<script> location.href='productsellsuccess.php'</script>"; 
				}

				// Update assets table data product available column data
				$sqlup = "UPDATE assets_tb SET pava='$pava' WHERE pid='$pid'";
				$conn->query($sqlup);
			}

		}

	 ?>
	<h3 class="text-center">Customer Bill</h3>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="form-group">
			<label for="pid">Product ID</label>
			<input class="form-control" type="text" id="pid" name="pid" value="<?php if(isset($row['pid'])){ echo $row['pid'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="cname">Customer Name</label>
			<input class="form-control" type="text" id="cname" name="cname">
		</div>
		<div class="form-group">
			<label for="cadd">Customer Address</label>
			<input class="form-control" type="text" id="cadd" name="cadd" value="<?php if(isset($row['cadd'])){ echo $row['cadd'];} ?>">
		</div>
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input class="form-control" type="text" id="pname" name="pname" value="<?php if(isset($row['pname'])){ echo $row['pname'];} ?>">
		</div>
		<div class="form-group">
			<label for="pava">Available Product</label>
			<input class="form-control" type="text" id="pava" name="pava" value="<?php if(isset($row['pava'])){ echo $row['pava'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="pquentity">Quentity</label>
			<input class="form-control" type="text" id="pquentity" name="pquentity" onkeypress='isInputNumber(event)'>
		</div>
		<div class="form-group">
			<label for="psellingcost">Price Each</label>
			<input class="form-control" type="text" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost'])){ echo $row['psellingcost'];} ?>" onkeypress='isInputNumber(event)'>
		</div>
		<div class="form-group">
			<label for="totalcost">Total Price</label>
			<input class="form-control" type="text" id="totalcost" name="totalcost" onkeypress='isInputNumber(event)'>
		</div>
		<div class="form-group">
			<label for="inputdate">Date</label>
			<input class="form-control" type="date" id="inputdate" name="inputdate" >
		</div>
		<div class="form-group text-right">
			<button class="btn btn-info" type="submit" name="psubmit" id="psubmit">Submit</button>
			<a href="asset.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
</div><!-- Column 2nd Column -->
<div class="col-sm-3 mt-5 ">
	<?php if (isset($mess)) {
	echo $mess;
} ?>
</div><!-- End 3rd column -->

<?php include_once 'includes/footer.php' ?>