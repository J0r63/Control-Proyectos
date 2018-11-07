<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){

		$name = $_POST['name'];
		$budget = $_POST['budget'];
		$employee = $_POST['employee'];
		$start = $_POST['start'];
		$finish = $_POST['finish'];

		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$project_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		
			$sql = "INSERT INTO projects (project_id, name, budget, employee_id, f_start, f_finish) 
			VALUES ('$project_id', '$name', '$budget','$employee', '$start', '$finish')";

		 if($conn->query($sql)){
			$_SESSION['success'] = 'Project added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	 }
	  else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	


		//$sql = "SELECT * FROM employees WHERE employee_id = '$employee'";
		
		/*$sql="SELECT employees.firstname,employees.lastname, position.description
                FROM employees 
                 inner join position on employees.position_id = position.id
                 where position.description = $employee";*/
/*
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Employee not found';
		}
		else{
			$row = $query->fetch_assoc();
			$employee_id = $row['id'];
			$sql = "INSERT INTO projects (project_id, name, budget, employee_id, f_start, f_finish) 
			VALUES ('$project_id', '$name', '$budget','$employee_id', '$start', '$finish')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Project added successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}*/

	header('location: project.php');

?>