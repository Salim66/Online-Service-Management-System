<?php 
	define('PAGE', 'asset');
	define('TITLE', 'Assets');
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
 <div class="col-sm-9 col-md-10 mt-5 text-center ">
 	<p class="text-white bg-dark p-2">Product Details</p>
 	<?php 
 		if (isset($mess)) {
 			echo $mess;
 		}

 		$sql = "SELECT * FROM assets_tb";
 		$result = $conn -> query($sql);

 		if($result->num_rows > 0):
 	 ?>

 	<table class="table table-striped table-hover">
 		<thead>
 			<tr>
 				<th>Porduct ID</th>
 				<th>Name</th>
 				<th>Date of Purchases</th>
 				<th>Available</th>
 				<th>Total</th>
 				<th>Original Cost Each</th>
 				<th>Selling Cost Each</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 

 				

 				 while($row = $result -> fetch_assoc()):
 			 ?>
 			<tr>
 				<td><?php echo $row['pid']; ?></td>
 				<td><?php echo $row['pname']; ?></td>
 				<td><?php echo $row['pdop']; ?></td>
 				<td><?php echo $row['pava']; ?></td>
 				<td><?php echo $row['ptotal']; ?></td>
 				<td><?php echo $row['poriginalcost']; ?></td>
 				<td><?php echo $row['psellingcost']; ?></td>
 				<td>
 					<form action="editproduct.php" method="POST" class="d-inline">
 						<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
 						<button class="btn btn-info btn-sm" type="submit" name="edit" value="Edit"><i class="fas fa-edit"></i></button>
 					</form>
 					<form action="" method="POST" class="d-inline">
 						<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>"><button class="btn btn-secondary btn-sm" type="submit" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
 					</form>
 					<form action="sellproduct.php" method="POST" class="d-inline">
 						<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
 						<button class="btn btn-primary text-light btn-sm" type="submit" name="issue" value="issue"><i class="fas fa-handshake"></i></button>
 					</form>
 				</td>
 			</tr>
 		<?php endwhile; ?>
 		</tbody>
 	</table>
 	<?php else: echo '0 Result'; ?>
 	<?php endif; ?>
 </div> <!-- End 2nd Column -->
<?php 
	if (isset($_POST['delete'])) {
		$delete_id = $_POST['pid'];

		$sql = "DELETE FROM assets_tb WHERE pid = '$delete_id'";
		if ($conn -> query($sql) == true) {
			echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
		}else {
			$mess = "<p class='alert alert-danger'>Unable to Delete !<button class='close' data-dismiss='alert'>&times;</button></p>";
		}

	}

 ?>


 		</div><!-- End Row -->
 		<div class="float-right">
 			<a class="btn btn-danger" href="addproduct.php"><i class="fas fa-plus fa-2x"></i></a>
 		</div>
 	</div><!-- End Container -->


	<!-- JS LINK -->
	<script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/all.min.js"></script>
	<script src="../assets/js/custom.js"></script>
</body>
</html>