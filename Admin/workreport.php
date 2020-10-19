<?php 
	define('PAGE', 'workreport');
	define('TITLE', 'Work Report');
	include_once '../dbConnection.php';
	include_once 'includes/header.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	} else {
		echo "<script> location.href='login.php'</script>";
	}
 ?>
 <!-- Start 2nd Column -->
 <div class="col-sm-9 col-md-10 mt-5 text-center">
 	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class='d-print-none'>
 		<div class="form-row">
 			<div class="form-group col-md-2">
 				<input type="date" class="form-control" id="startdate" name="startdate">
 			</div><span>to</span>
 			<div class="form-group col-md-2">
 				<input type="date" class="form-control" id="enddate" name="enddate">
 			</div>
 			<div class="form-group">
 				<input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
 			</div>
 		</div>
 	</form>

 	<?php 
 		if (isset($_POST['searchsubmit'])) {
 			$startdate = $_POST['startdate'];
 			$enddate = $_POST['enddate'];

 			$result = '';
 			if ( empty($startdate) || empty($enddate) ) {
 				$mess = "<p class='alert alert-warning'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
 			} else {
 				$sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate' ";
 				$result = $conn -> query($sql);
 			}	
 		if($result->num_rows > 0):

 	 ?>
 	<p class="bg-dark text-light p-2">Details</p>
 	<table class="table table-striped table-hover">
 		<thead>
 			<tr>
 				<th scope="col">Req ID</th>
 				<th scope="col">Request Info</th>
 				<th scope="col">Name</th>
 				<th scope="col">Address</th>
 				<th scope="col">City</th>
 				<th scope="col">Mobile</th>
 				<th scope="col">Technician</th>
 				<th scope="col">Assign Date</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			while($row = $result->fetch_assoc()):			
  			 ?>
 			<tr>
 				<td><?php echo $row['request_id'] ?></td>
 				<td><?php echo $row['request_info'] ?></td>
 				<td><?php echo $row['request_name'] ?></td>
 				<td><?php echo $row['request_add2'] ?></td>
 				<td><?php echo $row['request_city'] ?></td>
 				<td><?php echo $row['request_mobile'] ?></td>
 				<td><?php echo $row['assign_tech'] ?></td>
 				<td><?php echo $row['assign_date'] ?></td>
 			</tr>
 			<?php 
 		endwhile;
 			 ?>
 		</tbody>
 	</table>
 	<div class="float-right mt-5">
 	 	<input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
 	 </div>
 	<?php else: 
 		echo "<p class='alert alert-warning col-sm-6 ml-5 mt-2'>No Record Found</p>";
 	endif; }
 	 ?>
 </div><!-- End 2nd Column -->

 <?php include_once 'includes/footer.php'; ?>