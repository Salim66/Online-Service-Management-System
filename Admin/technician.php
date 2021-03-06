<?php 
	define('PAGE', 'technician');
	define('TITLE', 'Technician');
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
 	<p class="text-white bg-dark p-2">List of Technicians</p>
 	<?php 
 		if (isset($mess)) {
 			echo $mess;
 		}

 		$sql = "SELECT * FROM technician_tb";
 		$result = $conn -> query($sql);

 		if ($result -> num_rows > 0) :
 	 ?>

 	<table class="table table-striped table-hover">
 		<thead>
 			<tr>
 				<th>Emp Id</th>
 				<th>Emp Name</th>
 				<th>Emp City</th>
 				<th>Emp Mobile</th>
 				<th>Emp Email</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 


 				 while($row = $result -> fetch_assoc()):
 			 ?>
 			<tr>
 				<td><?php echo $row['empId']; ?></td>
 				<td><?php echo $row['empName']; ?></td>
 				<td><?php echo $row['empCity']; ?></td>
 				<td><?php echo $row['empMobile']; ?></td>
 				<td><?php echo $row['empEmail']; ?></td>
 				<td>
 					<form action="editemp.php" method="POST" class="d-inline">
 						<input type="hidden" name="empid" value="<?php echo $row['empId']; ?>">
 						<button class="btn btn-info btn-sm" type="submit" name="edit" value="Edit"><i class="fas fa-edit"></i></button>
 					</form>
 					<form action="" method="POST" class="d-inline">
 						<input type="hidden" name="empid" value="<?php echo $row['empId']; ?>"><button class="btn btn-secondary btn-sm" type="submit" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
 					</form>
 				</td>
 			</tr>
 		<?php endwhile; ?>
 		</tbody>
 	</table>
 	<?php else:  ?>
 <?php echo '0 Result'; endif; ?>

 </div> <!-- End 2nd Column -->
<?php 
	if (isset($_POST['delete'])) {
		$delete_id = $_POST['empid'];

		$sql = "DELETE FROM technician_tb WHERE empId = '$delete_id'";
		if ($conn -> query($sql) == true) {
			echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
		}else {
			echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
			$mess = "<p class='alert alert-danger'>Unable to Delete !<button class='close' data-dismiss='alert'>&times;</button></p>";
		}

	}

 ?>


 		</div><!-- End Row -->
 		<div class="float-right">
 			<a class="btn btn-danger" href="insertemp.php"><i class="fas fa-plus fa-2x"></i></a>
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
