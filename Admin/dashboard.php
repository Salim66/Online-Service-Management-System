<?php 
	define('PAGE', 'dashboard');
	define('TITLE', 'Dashboard');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();

	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	} else {
		echo "<script> location.href='login.php'</script>";
	}
	
	// Request Received
	$sql = "SELECT max(request_id) FROM submitrequest_tb";
	$result = $conn->query($sql);
	// $row = mysqli_fetch_row($result); // return newmeric data
	$row = $result->fetch_row();
	$requestreceived = $row[0];	

	// Assign Work
	$sql = "SELECT max(ino) FROM assignwork_tb";
	$result = $conn->query($sql);
	// $row = mysqli_fetch_row($result); // return newmeric data
	$row = $result->fetch_row();
	$assignwork = $row[0];	

	// Technician
	$sql = "SELECT * FROM technician_tb";
	$result = $conn->query($sql);
	// $row = mysqli_fetch_row($result); // return newmeric data
	$technician = $result->num_rows;

 ?>

 			<div class="col-sm-9 col-md-10"><!-- Start Dashboard 2nd column -->
 				<div class="row text-center mx-5">
 					<div class="col-sm-4 mt-5">
 						<div class="card text-white bg-danger">
 							<div class="card-header">Requests Received</div>
 							<div class="card-body">
 								<h4 class="card-title"><?php echo $requestreceived; ?></h4>
 								<a class="text-white" href="request.php">View</a>
 							</div>
 						</div>
 					</div>
 					<div class="col-sm-4 mt-5">
 						<div class="card text-white bg-success">
 							<div class="card-header">Assigned Work</div>
 							<div class="card-body">
 								<h4 class="card-title"><?php echo $assignwork; ?></h4>
 								<a class="text-white" href="work.php">View</a>
 							</div>
 						</div>
 					</div>
 					<div class="col-sm-4 mt-5">
 						<div class="card text-white bg-info">
 							<div class="card-header">No. of Technician</div>
 							<div class="card-body">
 								<h4 class="card-title"><?php echo $technician; ?></h4>
 								<a class="text-white" href="technician.php">View</a>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="mx-5 mt-5 text-center">
 					<p class="bg-dark text-white p-2">List of Requesters</p>
 					<?php 
 						$sql = "SELECT * FROM requesterlogin_tb";
 						$result = $conn -> query($sql);

 						if($result -> num_rows > 0){
 							echo '
 							<table class="table">
 								<thead>
 									<th scope="col">Requester ID</th>
 									<th scope="col">Name</th>
 									<th scope="col">Email</th>
 								</thead>
 								<tbody>';
 									while($row = $result -> fetch_assoc()){
 									echo '<tr>';
 										echo '<td>'.$row['r_login_id'].'</td>';
 										echo '<td>'.$row['r_name'].'</td>';
 										echo '<td>'.$row['r_email'].'</td>';
 									echo '</tr>';
 								}
 								echo '</tbody>
 							</table>
 						';	
 						}else {
 							echo '0 Result';
 						}
 					 ?>
 				</div>
 			</div><!-- End Dashboard 2nd column -->
<?php require_once 'includes/footer.php' ?>

