<?php 
	define('PAGE', 'sellreport');
	define('TITLE', 'Sell Report');
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
 				$sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate' ";
 				$result = $conn -> query($sql);
 			}	
 		if($result->num_rows > 0):

 	 ?>
 	<p class="bg-dark text-light p-2">Details</p>
 	<table class="table table-striped table-hover">
 		<thead>
 			<tr>
 				<th scope="col">Customer ID</th>
 				<th scope="col">Customer Name</th>
 				<th scope="col">Address</th>
 				<th scope="col">Product Name</th>
 				<th scope="col">Quentity</th>
 				<th scope="col">Price Each</th>
 				<th scope="col">Total</th>
 				<th scope="col">Date</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			while($row = $result->fetch_assoc()):			
  			 ?>
 			<tr>
 				<td><?php echo $row['custid'] ?></td>
 				<td><?php echo $row['custname'] ?></td>
 				<td><?php echo $row['custadd'] ?></td>
 				<td><?php echo $row['cpname'] ?></td>
 				<td><?php echo $row['cpquentity'] ?></td>
 				<td><?php echo $row['cpeach'] ?></td>
 				<td><?php echo $row['cptotal'] ?></td>
 				<td><?php echo $row['cpdate'] ?></td>
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
 </div>
 <!-- End 2nd Column -->

 <?php include_once 'includes/footer.php'; ?>