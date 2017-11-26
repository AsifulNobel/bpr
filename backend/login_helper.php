<?php

	session_start();

	require '../db/db_connect.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);

	if(password_verify($password, $row['password'])){
		if($row['user_status'] == 0) {
			echo "0";
		}

		$_SESSION['login_id']=$row['user_id'];
		$_SESSION['login_email']=$row['email'];
		$_SESSION['login_role_id']=$row['role_id'];

		if($row['role_id']==1 && $row['user_status']==1) {
			echo "1";
		}
		else if($row['role_id']==2 && $row['user_status']==1) {
			echo "2";
		}
	}
	else{
		echo "Sorry";
	}

?>
