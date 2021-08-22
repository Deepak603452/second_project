<?php
	$email = $_POST['email'];
	$password = $_POST['password'];

	//database
	$con = new mysqli('localhost','root','','test');
	if($con->connect_error){
		die("failed to connect : ".$con->connect_error);
	}else{
		$stmt = $con->prepare("SELECT * FROM registration WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if ($stmt_result->num_rows >0) {
			$data = $stmt_result->fetch_assoc();
			if ($data['password'] == $password) {
				header('Location: final_example_file_test_and_changes.php');
			}
			else{
			echo "<script>alert('invalid id or password');</script>";
			}
		}
		else{
			echo "<script>alert('invalid id or password');</script>";
		}
	}
?>