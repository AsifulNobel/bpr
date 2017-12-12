<?php

	include '../db/db_connect.php';
	session_start();

	$user_id = $_SESSION['login_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$date_of_birth = $_POST['date_of_birth'];
	$photo = $_FILES['photo']['name'];

	if ($_SESSION['login_role_id'] == 3) {
		if (isset($_POST['initial'])) {
			$initial = $_POST['initial'];
		}
	}

	if(!empty($photo)){
		$targetdir = '../uploads/';
		$targetfile = $targetdir.$_FILES['photo']['name'];
		$photo_upload_confirmation = move_uploaded_file($_FILES['photo']['tmp_name'], $targetfile);

		$sql = "UPDATE user SET name = '$name', email = '$email', date_of_birth='$date_of_birth', photo = '$photo' WHERE user_id='$user_id'";
	}
	else {
		$sql = "UPDATE user SET name = '$name', email = '$email', date_of_birth='$date_of_birth' WHERE user_id='$user_id'";
	}

	$result = mysqli_query($connection, $sql);

	if ($_SESSION['login_role_id'] == 3) {
		$sql = "UPDATE faculty SET name = '$name', initial = '$initial' WHERE user_id='$user_id'";

		$result = mysqli_query($connection, $sql);
	}

	if ($result) {
	    echo "Okay";
	}
	else {
	    echo "Sorry";
	}

?>
