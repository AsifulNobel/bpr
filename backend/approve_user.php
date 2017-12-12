<?php

	include '../db/db_connect.php';

	$user_id = $_POST['user_id'];

	$sql = "SELECT * FROM user WHERE user_id='$user_id'";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['role_id'] == '3') {
		$name = $row['name'];

		$sql = "INSERT INTO faculty (name, user_id) values ('$name', '$user_id')";
		$result = mysqli_query($connection, $sql);

		if (!$result) {
			echo "Faculty Info Creation Error";
			die();
		}
	}

	$sql = "UPDATE user SET user_status = '1' WHERE user_id='$user_id'";

	$result = mysqli_query($connection, $sql);

	if ($result) {
	    echo "Okay";
	}
	else {
	    echo "Sorry";
	}

?>
