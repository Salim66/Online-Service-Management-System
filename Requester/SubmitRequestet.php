<?php 
	define('TITLE', 'Submit Request');
	define('PAGE', 'SubmitRequestet');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();


	/**
	 * Validation for user login or not
	 */
	if ( isset($_SESSION['is_login']) ) {
		$rEmail = $_SESSION['rEmail'];
	} else {
		header('location:RequesterLogin.php');
	}

	// Dynamically select requester name
	$sql = "SELECT * FROM requesterlogin_tb WHERE r_email='$rEmail'";
	$data = $conn -> query($sql);
	$fdata = $data -> fetch_assoc();

	/**
	 * Validation for Form Submit
	 */
	if ( isset($_POST['submitrequest']) ) {
		// Assigning user valus to variables
		$requestinfo = $_POST['requestinfo'];
		$requestdesc = $_POST['requestdesc'];
		$requestname = $_POST['requestname'];
		$requesteradd1 = $_POST['requesteradd1'];
		$requesteradd2 = $_POST['requesteradd2'];
		$requestercity = $_POST['requestercity'];
		$requesterstate = $_POST['requesterstate'];
		$requesterzip = $_POST['requesterzip'];
		$requesteremail = $_POST['requesteremail'];
		$requestermobile = $_POST['requestermobile'];
		$requesterdate = $_POST['requesterdate'];

		// validation Empty or Not
		if ( empty($requestinfo) || empty($requestdesc) || empty($requestname) || empty($requesteradd1) || empty($requesteradd2) || empty($requestercity) || empty($requesterstate) || empty($requesterzip) || empty($requesteremail) || empty($requestermobile) || empty($requesterdate)) {
			$msg = "<p class='alert alert-danger ml-5 col-sm-6 mt-2'>All fields are required!<button class='close' data-dismiss='alert'>&times;</button></p>";
		} else {
			$sql = "INSERT INTO submitrequest_tb(request_info, request_desc, request_name, request_add1, request_add2, request_city, request_state, request_zip, request_emal, request_mobile, request_date) VALUES('$requestinfo','$requestdesc','$requestname','$requesteradd1','$requesteradd2','$requestercity','$requesterstate','$requesterzip','$requesteremail','$requestermobile', '$requesterdate')";

			if ( $conn -> query($sql) == true ) {
				$genid = mysqli_insert_id($conn);
				$msg = "<p class='alert alert-success ml-5 col-sm-6 mt-2'>Request Submitted Successful!<button class='close' data-dismiss='alert'>&times;</button></p>";
				$_SESSION['myid'] = $genid;
				echo "<script>location.href='submitrequestsuccess.php'</script>";
			} else {
				$msg = "<p class='alert alert-danger ml-5 col-sm-6 mt-2'>Unable to Submit Your Request!<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			
		}
		
	}
	
	
 ?>


<div class="col-sm-9 col-md-10 mt-5"><!-- Start Submit Request Form 2nd Column -->
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="mx-5 shadow p-4">
		<div class="form-group">
			<label for="inputRequestInfo">Request Info</label><input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo">
		</div>
		<div class="form-group">
			<label for="inputRequestDescription">Request Description</label><input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
		</div>
		<div class="form-group">
			<label for="inputName">Name</label><input type="text" class="form-control" id="inputName" value="<?php echo $fdata['r_name']; ?>" name="requestname">
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">
				<label for="inputAddress">Address Line 1</label><input type="text" class="form-control" placeholder="House No: 123" id="inputAddress" name="requesteradd1">
			</div>
			<div class="col-md-6 form-group">
				<label for="inputAddress2">Address Line 2</label><input type="text" class="form-control" placeholder="Railway colony" id="inputAddress2" name="requesteradd2">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">
				<label for="inputCity">City</label><input type="text" class="form-control" id="inputCity" name="requestercity">
			</div>
			<div class="col-md-4 form-group">
				<label for="inputState">State</label><input type="text" class="form-control" id="inputState" name="requesterstate">
			</div>
			<div class="col-md-2 form-group">
				<label for="inputZip">Zip</label><input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">
				<label for="inputEmail">Email</label><input type="email" class="form-control" id="inputEmail" name="requesteremail" value="<?php echo $rEmail; ?>">
			</div>
			<div class="col-md-2 form-group">
				<label for="inputMobile">Mobile</label><input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
			</div>
			<div class="col-md-2 form-group">
				<label for="inputDate">Date</label><input type="date" class="form-control" id="inputDate" name="requesterdate">
			</div>
		</div>
		<button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
		<button type="reset" class="btn btn-secondary" name="resetrequest">Reset</button>
	</form>		
	<?php if (isset($msg)) { echo $msg;} ?>
</div><!-- End Submit Request Form 2nd Column -->





 <?php 
	include_once 'includes/footer.php';
 ?>