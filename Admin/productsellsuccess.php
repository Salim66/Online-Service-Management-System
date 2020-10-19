<?php 
	define('PAGE', 'asset');
	define('TITLE', 'Success');
	include_once '../dbConnection.php';
	include_once 'includes/header.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo "<script> location.href='login.php'</script>";
	}

	/**
	 * Customer Bill query
	 */
	$id = $_SESSION['myid'];
	$sql = "SELECT * FROM customer_tb WHERE custid='$id'";
	$result = $conn->query($sql);
	if($result->num_rows == 1):
		$row = $result->fetch_assoc();
 ?>

<div class="col-sm-4 mt-5 mx-3">
	<h3 class="text-center">Customer Bill</h3>
	<table class="table">
		<tbody>
			<tr>
				<td>Customer ID</td>
				<td><?php echo $row['custid'] ?></td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td><?php echo $row['custname'] ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $row['custadd'] ?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php echo $row['cpname'] ?></td>
			</tr>
			<tr>
				<td>Quentity</td>
				<td><?php echo $row['cpquentity'] ?></td>
			</tr>
			<tr>
				<td>Price Each</td>
				<td><?php echo $row['cpeach'] ?></td>
			</tr>
			<tr>
				<td>Total Cost</td>
				<td><?php echo $row['cptotal'] ?></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><?php echo $row['cpdate'] ?></td>
			</tr>
			<tr>
				<td class="float-left"><form action="" class="d-print-none"><input type="submit" class="btn btn-danger" value="Print" onclick="window.print()"></form></td>
				<td class="float-right"><a href="asset.php" class="btn btn-secondary d-print-none">Close</a></td>
			</tr>
		</tbody>
	</table>
</div>
<?php else: echo 'Failed'; ?>
<?php endif; ?>

<?php include_once 'includes/footer.php' ?>