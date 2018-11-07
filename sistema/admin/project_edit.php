<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$proid = $_POST['id'];
		$name = $_POST['name'];
		$budget = $_POST['budget'];
		$f_start = $_POST['f_start'];
		$f_finish = $_POST['f_finish'];
	

		$sql = "UPDATE projects SET name = '$name', budget = '$budget', f_start = '$f_start', f_finish = '$f_finish' 
		WHERE id = '$proid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: project.php');

?>

