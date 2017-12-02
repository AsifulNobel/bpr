<?php

	session_start();
	include '../db/db_connect.php';

	$project_id = $_POST['project_id'];
	$project_title = $_POST['project_title'];
	$project_description = $_POST['project_description'];
	$project_privacy = $_POST['project_privacy'];
	$project_url = $_FILES['project_file']['name'];
	$user_id = $_SESSION['login_id'];

	$targetdir = '../repositories/'.$user_id.'/';

	if (!file_exists($targetdir)) {
		mkdir($targetdir, 0777, true);
	}

	$targetfile = $targetdir.$_FILES['project_file']['name'];
	$project_file_upload_confirmation = is_uploaded_file($_FILES['project_file']['tmp_name']);

	if($project_file_upload_confirmation && $_FILES['project_file']['size'] > 0){
		$moveStatus = move_uploaded_file($_FILES['project_file']['tmp_name'], $targetfile);

		if ($moveStatus) {
			$sql = "SELECT project_url FROM project WHERE project_id=$project_id";

			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_assoc($result);

			unlink($targetdir.$row['project_url']);

			$sql = "UPDATE project SET project_title = '$project_title', project_description = '$project_description', project_privacy = '$project_privacy', project_url = '$project_url' WHERE project_id='$project_id'";
		}
		else {
			echo "Cannot move file...";
		}
	}
	else {
		$sql = "UPDATE project SET project_title = '$project_title', project_description = '$project_description', project_privacy = '$project_privacy' WHERE project_id='$project_id'";
	}

	$result = mysqli_query($connection, $sql);

	if ($result) {
		echo "Okay";
	}
	else {
		echo "Sorry";
	}
?>
