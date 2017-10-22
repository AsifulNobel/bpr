<?php

	session_start();

	include '../db/db_connect.php';

	$old_password = $_POST['old_password'];
	$confirm_password = $_POST['confirm_password'];
	$confirm_hash = password_hash($confirm_password, PASSWORD_BCRYPT);
	$user_id = $_SESSION['login_id'];

	$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

	if (password_verify($old_password, $row['password'])) {
		$sql = "UPDATE user SET password='$confirm_hash' WHERE user_id='$user_id'";
		$result = mysqli_query($connection, $sql);

		$mysqli_affected_rows = mysqli_affected_rows($connection);
	} else {
		$mysqli_affected_rows = 0;
	}


	if ($mysqli_affected_rows > 0) {
		echo "Okay";
	}
	else {
		echo "Sorry";
	}

?>
