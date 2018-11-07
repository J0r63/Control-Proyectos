<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM projects WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select Project to delete';
	}


	header('location: project.php');
	
?>

