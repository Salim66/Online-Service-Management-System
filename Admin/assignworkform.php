<?php 
	
	if(isset($_SESSION['is_adminlogin'])){
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo '<script> location.href="login.php"</script>';
	}


 ?>

<div class="col-sm-5 mt-5 jumbotron"><!-- Start Assigned Work Form 3rd Column -->

  	<?php 
  		// view data
  		if (isset($_REQUEST['view'])) {
  			$sql = "SELECT * FROM submitrequest_tb WHERE request_id={$_REQUEST['id']}";
  			$result = $conn -> query($sql);

  			$row = $result -> fetch_assoc();
  		}

  		// close data
  		if(isset($_REQUEST['close'])){
  			$sql = "DELETE FROM submitrequest_tb WHERE request_id={$_REQUEST['id']}";
  			$result = $conn -> query($sql);

  			if ($result == true) {
  				header('location:request.php');

  				$mess[] = '<p class="alert alert-success">Delete data successful!<button class="close float-right" data-dismiss="alert">&times;</button></p>';
  			} else {
  				$mess[] = '<p class="alert alert-danger">Unable to Delete!<button class="close float-right" data-dismiss="alert">&times;</button></p>';
  			}
  		}

  		// Assign Work
  		if (isset($_POST['assign'])) {
  			//Assign variable to value
  			$request_id = $_POST['requestid'];
  			$request_info = $_POST['requestinfo'];
  			$request_desc = $_POST['requestdesc'];
  			$request_name = $_POST['requestname'];
  			$request_add1 = $_POST['requestadd1'];
  			$request_add2 = $_POST['requestadd2'];
  			$request_city = $_POST['requestcity'];
  			$request_state = $_POST['requeststate'];
  			$request_zip = $_POST['requestzip'];
  			$request_email = $_POST['requestemail'];
  			$request_mobile = $_POST['requestmobile'];
  			$assigntech = $_POST['assigntech'];
  			$requestdate = $_POST['requestdate'];

  			//Check Validation
  			if (empty($request_id) || empty($request_info) || empty($request_desc) || empty($request_name) || empty($request_add1) || empty($request_add2) || empty($request_city) || empty($request_state) || empty($request_zip) || empty($request_email) || empty($request_mobile) || empty($assigntech) || empty($requestdate)) {

  				$mess = '<p class="alert alert-warning">All fields are required!<button class="close float-right" data-dismiss="alert">&times;</button></p>';

  			} else {
  				$sql = "INSERT INTO assignwork_tb(request_id, request_info, request_desc, request_name, request_add1, request_add2, request_city, request_state, request_zip, request_email, request_mobile, assign_tech, assign_date) VALUES('$request_id','$request_info','$request_desc','$request_name','$request_add1','$request_add2','$request_city','$request_state','$request_zip','$request_email','$request_mobile','$assigntech','$requestdate')";
  				$result = $conn -> query($sql);

  				if ($result == true) {
  					$mess = '<p class="alert alert-success">Assign Work Successfully!<button class="close float-right" data-dismiss="alert">&times;</button></p>';
  				} else {
  					$mess = '<p class="alert alert-warning">Unable to Assign!<button class="close float-right" data-dismiss="alert">&times;</button></p>';
  				}
  				
  			}
  			
  		}

  	 ?>


	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<h5 class="text-center">Assign Work Order Request</h5>
		<div class="form-group">
			<label for="inputRequestId">Request ID</label><input type="text" class="form-control"
			id="inputRequestId" name="requestid" value="<?php if(isset($row['request_id'] )) echo $row['request_id']  ?>" readonly>
		</div>
		<div class="form-group">
			<label for="inputRequestInfo">Request Info</label><input type="text" class="form-control" id="inputRequestInfo" value="<?php if(isset($row['request_info'] )) echo $row['request_info']  ?>" name="requestinfo">
		</div>
		<div class="form-group">
			<label for="inputRequestDescription">Request Description</label><input type="text" class="form-control" id="inputRequestDescription" value="<?php if(isset($row['request_desc'] )) echo $row['request_desc']  ?>" name="requestdesc">
		</div>
		<div class="form-group">
			<label for="inputName">Name</label><input type="text" class="form-control" id="inputName"  value="<?php if(isset($row['request_name'] )) echo $row['request_name']  ?>" name="requestname">
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">
				<label for="inputAddress">Address Line 1</label><input type="text" class="form-control" id="inputAddress" value="<?php if(isset($row['request_add1'] )) echo $row['request_add1']  ?>" name="requestadd1">
			</div>
			<div class="col-md-6 form-group">
				<label for="inputAddress2">Address Line 2</label><input type="text" class="form-control"  id="inputAddress2" value="<?php if(isset($row['request_add2'] )) echo $row['request_add2']  ?>" name="requestadd2">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-4 form-group">
				<label for="inputCity">City</label><input type="text" class="form-control" id="inputCity" value="<?php if(isset($row['request_city'] )) echo $row['request_city']  ?>" name="requestcity">
			</div>
			<div class="col-md-4 form-group">
				<label for="inputState">State</label><input type="text" class="form-control" id="inputState" value="<?php if(isset($row['request_state'] )) echo $row['request_state']  ?>" name="requeststate">
			</div>
			<div class="col-md-4 form-group">
				<label for="inputZip">Zip</label><input type="text" class="form-control" id="inputZip" value="<?php if(isset($row['request_zip'] )) echo $row['request_zip']  ?>" name="requestzip" onkeypress="isInputNumber(event)">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-8 form-group">
				<label for="inputEmail">Email</label><input type="email" class="form-control" id="inputEmail" value="<?php if(isset($row['request_emal'] )) echo $row['request_emal']  ?>" name="requestemail">
			</div>
			<div class="col-md-4 form-group">
				<label for="inputMobile">Mobile</label><input type="text" class="form-control" id="inputMobile" name="requestmobile" value="<?php if(isset($row['request_mobile'] )) echo $row['request_mobile']  ?>" onkeypress="isInputNumber(event)">
			</div>
		</div>
		<div class="form-row">
			<div class="col-sm-6 form-group">
				<label for="àssigntech">Assign to Technician</label><input type="text" class="form-control" id="assigntech" name="assigntech">
			</div>
			<div class="col-md-6 form-group">
				<label for="inputDate">Date</label><input type="date" class="form-control" id="inputDate" name="requestdate">
			</div>
		</div>
		<div class="float-right">
			<button type="submit" class="btn btn-success" name="assign">Assign</button>
			<button type="reset" class="btn btn-secondary" name="reset">Reset</button>
		</div>
	</form>		
	<?php if (isset($mess)) { echo $mess;} ?>
</div><!-- End Assigned Work Form 3rd Column -->