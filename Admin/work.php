<?php 
	define('PAGE', 'work');
	define('TITLE', 'Work');
	include_once 'includes/header.php';
	include_once '../dbConnection.php';
	session_start();
	if (isset($_SESSION['is_adminlogin'])) {
		$aEmail = $_SESSION['aEmail'];
	}else {
		echo "<script> location.href='login.php'</script>";
	}
 ?>
	<!-- Start 2nd Column -->
	<div class="col-sm-9 col-md-10 mt-5">
		<?php 

		$sql = "SELECT * FROM assignwork_tb";
		$result = $conn -> query($sql);

		if($result->num_rows > 0){
			echo '<table class="table table-striped table-hover">';
			 echo '<thead>';
			  echo '<tr>';
			   echo '<th>Req ID</th>';
			   echo '<th>Req Info</th>';
			   echo '<th>Name</th>';
			   echo '<th>Address</th>';
			   echo '<th>City</th>';
			   echo '<th>Mobile</th>';
			   echo '<th>Technician</th>';
			   echo '<th>Assigned Date</th>';
			   echo '<th>Action</th>';
			  echo '</tr>';
			 echo '</thead>';
			 echo '<tbody>';
			 while ($row=$result->fetch_assoc()) {
			  echo '<tr>';
			   echo '<td>'.$row['request_id'].'</td>';
			   echo '<td>'.$row['request_info'].'</td>';
			   echo '<td>'.$row['request_name'].'</td>';
			   echo '<td>'.$row['request_add1'].'</td>';
			   echo '<td>'.$row['request_city'].'</td>';
			   echo '<td>'.$row['request_mobile'].'</td>';
			   echo '<td>'.$row['assign_tech'].'</td>';
			   echo '<td>'.$row['assign_date'].'</td>';
			   echo '<td>';
			    echo '<form action="viewassignwork.php" method="POST" class="d-inline">';
			     echo '<input type="hidden" value='.$row['request_id'].' name="id"><button class="btn btn-warning mr-2" name="view" value="view" type="submit"><i class="far fa-eye"></i></button>';echo '</form>';
			    echo '<form action="" method="POST" class="d-inline">';
			     echo '<input type="hidden" value='.$row['request_id'].' name="id"><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
			    echo '</form>';
			   echo '</td>';
			  echo '</tr>';
			 }
			 echo '</tbody>';
			echo '</table>';
		}else {
			echo '0 Result'; 
		}
		if (isset($_POST['delete'])) {
			$sql = "DELETE FROM assignwork_tb WHERE request_id = {$_POST['id']}";
			if ($conn->query($sql) == TRUE) {
				echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
			}else{
				echo 'Unable to Delete';
			}
		}

	 ?><!-- End 2nd Column -->
	</div>

 <?php require_once 'includes/footer.php' ?>