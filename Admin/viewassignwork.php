<?php 
	define('PAGE', 'work');
	define('TITLE', 'Work');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo "<script> location.href='login.php'</script>";
	}
 ?>
 <!-- Start 2nd Column -->
 <div class="col-sm-6 mt-5 mx-3">
 	<h3 class="text-center mt-5">Assigned Work Details</h3>
 	<?php 
 		if (isset($_POST['view'])) {
 			$sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_POST['id']}";
 			$result = $conn -> query($sql);
				$row = $result -> fetch_assoc();

				if (!empty($row['request_id'])) { 
			?>
			 <table class="table table-bordered">
			 	<tbody>
			 		<tr>
			 			<td>Request ID</td>
			 			<td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Request Info</td>
			 			<td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Request Description</td>
			 			<td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Name</td>
			 			<td><?php if(isset($row['request_name'])){echo $row['request_name'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Address Line1</td>
			 			<td><?php if(isset($row['request_add1'])){echo $row['request_add1'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Address Line2</td>
			 			<td><?php if(isset($row['request_add2'])){echo $row['request_add2'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>City</td>
			 			<td><?php if(isset($row['request_city'])){echo $row['request_city'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>State</td>
			 			<td><?php if(isset($row['request_state'])){echo $row['request_state'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Zip Code</td>
			 			<td><?php if(isset($row['request_zip'])){echo $row['request_zip'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Mobile</td>
			 			<td><?php if(isset($row['request_mobile'])){echo $row['request_mobile'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Date</td>
			 			<td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Technician Name</td>
			 			<td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
			 		</tr>
			 		<tr>
			 			<td>Customer Sign</td>
			 			<td></td>
			 		</tr>
			 		<tr>
			 			<td>Technician Sign</td>
			 			<td></td>
			 		</tr>
			 	</tbody>
			 </table>
			 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="d-print-none d-inline">
				 <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()"></form>
			 <form action="work.php" method="POST" class="d-inline">
				 <input type="submit" class="btn btn-secondary" value="Close">
			 </form>
			 <br>
			 <br>
 		<?php } 
		}
		?>
 	
 </div><!-- End 2nd Column -->


 <?php require_once 'includes/footer.php' ?>