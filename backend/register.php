<?php

	include '../db/db_connect.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$id = $_POST['id'];
	$hash = password_hash($password, PASSWORD_BCRYPT);

	$sql = "SELECT email FROM user WHERE email='$email'";
	$result = mysqli_query($connection, $sql);

	if (mysqli_fetch_assoc($result)) {
		echo 'Exists';
	}
	else{
		$sql = "INSERT INTO user (email, password, name, gender, student_id) VALUES ('$email', '$hash', '$name', '$gender', '$id')";

		$result = mysqli_query($connection, $sql);

		if ($result) {
	    	echo "Okay";
	  	}
		else {
	   		echo "Sorry";
		}
	}
?>
