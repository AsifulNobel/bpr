<?php
	
	session_start();
	
	include '../db/db_connect.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE email='$email' AND user_status = 1";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['password']==$password){

		$_SESSION['login_id']=$row['user_id'];
		$_SESSION['login_email']=$row['email'];
		$_SESSION['login_role_id']=$row['role_id'];

		if ($row['role_id']==1) {
			
			echo "1";
		}
		else{

			echo "0";
		}
	}

	else{

		echo "Sorry";
	}

?>