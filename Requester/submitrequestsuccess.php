<?php 
	define('TITLE', 'Submit Success');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();

	// validation from session
	if ( isset($_SESSION['is_login']) ) {
		$rEmail = $_SESSION['rEmail'];
	} else {
		echo "<script>location.href='RequesterLogin.php'</script>";
	}

	// query from database
	$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']} ";
	$result = $conn -> query($sql);

	// validation user data or not
	if ( $result -> num_rows == 1 ) {
		$requst_all_info = $result -> fetch_assoc();
	} else {
		echo 'Failed';
	}
	
	
 ?>
 <!-- Requester Success Message Table -->
 <div class="mt-5 mt-5"><!-- Start 2nd Column Area of the Request Success -->
 	<table class="table">
 		<tbody>
 			<tr>
 				<th>Request ID</th>
 				<td><?php echo $requst_all_info['request_id'] ?></td>
 			</tr>
 			<tr>
 				<th>Name</th>
 				<td><?php echo $requst_all_info['request_name'] ?></td>
 			</tr>
 			<tr>
 				<th>Email ID</th>
 				<td><?php echo $requst_all_info['request_emal'] ?></td>
 			</tr>
 			<tr>
 				<th>Request Info</th>
 				<td><?php echo $requst_all_info['request_info'] ?></td>
 			</tr>
 			<tr>
 				<th>Request Description</th>
 				<td><?php echo $requst_all_info['request_desc'] ?></td>
 			</tr>

 			<tr>
 				<td><form class="d-print-none"><input type="submit" class="btn btn-danger" value="Print" onClick="window.print()"></form></td>
 			</tr>
 		</tbody>
 	</table>
 </div><!-- End 2nd Column Area of the Request Success -->


 <?php require_once 'includes/footer.php'; ?>