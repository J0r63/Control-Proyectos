<?php
	include 'includes/session.php';
	

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		//$fecha = $_POST['created_on'];
		
		$sql = "UPDATE customers SET firstname = '$firstname', lastname = '$lastname', address = '$address', contact_info = 
		'$contact' WHERE id = '$id'";

		//$sql = "UPDATE customers SET firstname = '$firstname' WHERE id = '$id'";



		if($conn->query($sql)){
			$_SESSION['success'] = 'Customer updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select Customer to edit first';
	}

	header('location:customer.php');
?>


