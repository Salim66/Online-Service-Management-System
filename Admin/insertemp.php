<?php 
	define('PAGE', 'technician');
	define('TITLE', 'Add New Technician');
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
 	if (isset($_POST['empsubmit'])) {
 		$e_name = $_POST['e_name'];
 		$e_city = $_POST['e_city'];
 		$e_mobile = $_POST['e_mobile'];
 		$e_email = $_POST['e_email'];

 		if (empty($e_name) || empty($e_city) || empty($e_mobile) || empty($e_email)) {
 			$mess = "<p class='alert alert-warning'>All fields are required!<button class='close' data-dismiss='alert'>&times;</button></p>";
 		}else {

 			// Validation User already create account or not
 			$sql = "SELECT * FROM technician_tb WHERE empEmail = '$e_email'";
 			$result = $conn -> query($sql);
 			if ($result -> num_rows == 1) {
 				$mess = "<p class='alert alert-danger'>User ID Already Registered!<button class='close' data-dismiss='alert'>&times;</button></p>";
 			}else{
 				$sql = "INSERT INTO technician_tb(empName, empCity, empMobile, empEmail) VALUES('$e_name','$e_city','$e_mobile', '$e_email')";
 				$data = $conn -> query($sql);

 				if ($data == true) {
 					$mess = "<p class='alert alert-success'>Added Technician Successfully!<button class='close' data-dismiss='alert'>&times;</button></p>";
 				} else {
 					$mess = "<p class='alert alert-warning'>Something want wrong!, please try agina):<button class='close' data-dismiss='alert'>&times;</button></p>";
 				}
 				
 			}
 		}
 	}

  ?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Technician</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="e_name">Employe Name</label>
			<input type="text" id="e_name" name="e_name" class="form-control"> 
		</div>
		<div class="form-group">
			<label for="e_city">Employe City</label>
			<input type="text" id="e_city" name="e_city" class="form-control"> 
		</div>
		<div class="form-group">
			<label for="e_mobile">Employe Mobile</label>
			<input type="text" id="e_mobile" name="e_mobile" class="form-control" onkeypress="isInputNumber(event)"> 
		</div>
		<div class="form-group">
			<label for="e_email">Employe Email</label>
			<input type="text" id="e_email" name="e_email" class="form-control"> 
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit" >Submit</button>
			<a href="technician.php" class="btn btn-secondary">Close</a>
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