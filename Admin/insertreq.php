<?php 
	define('PAGE', 'requesters');
	define('TITLE', 'Requester');
	include_once '../dbConnection.php';
	include_once 'includes/header.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo "<script> location.href='login.php'</script>";
	}
 ?>
 <?php 
 	if (isset($_POST['reqsubmit'])) {
 		$r_name = $_POST['r_name'];
 		$r_email = $_POST['r_email'];
 		$r_password = $_POST['r_password'];

 		if (empty($r_name) || empty($r_email) || empty($r_password)) {
 			$mess = "<p class='alert alert-warning'>All fields are required!<button class='close' data-dismiss='alert'>&times;</button></p>";
 		}else {

 			// Validation User already create account or not
 			$sql = "SELECT * FROM requesterlogin_tb WHERE r_email = '$r_email'";
 			$result = $conn -> query($sql);
 			if ($result -> num_rows == 1) {
 				$mess = "<p class='alert alert-danger'>User ID Already Registered!<button class='close' data-dismiss='alert'>&times;</button></p>";
 			}else{
 				$sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES('$r_name','$r_email','$r_password')";
 				$data = $conn -> query($sql);

 				if ($data == true) {
 					$mess = "<p class='alert alert-success'>Added Successfully!<button class='close' data-dismiss='alert'>&times;</button></p>";
 				} else {
 					$mess = "<p class='alert alert-warning'>Something want wrong!, please try agina):<button class='close' data-dismiss='alert'>&times;</button></p>";
 				}
 				
 			}
 		}
 	}

  ?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Requester</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="r_name">Name</label>
			<input type="text" id="r_name" name="r_name" class="form-control"> 
		</div>
		<div class="form-group">
			<label for="r_email">Email</label>
			<input type="text" id="r_email" name="r_email" class="form-control"> 
		</div>
		<div class="form-group">
			<label for="r_password">Password</label>
			<input type="password" id="r_password" name="r_password" class="form-control"> 
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit" >Submit</button>
			<a href="requester.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
</div><!-- End 2nd Column -->
<!-- Start 3rd column -->
<div class="col-sm-3 mt-5 ">
	<?php if (isset($mess)) {
	echo $mess;
} ?>
</div>
<!-- End 3rd column -->

  <?php require_once 'includes/footer.php' ?>