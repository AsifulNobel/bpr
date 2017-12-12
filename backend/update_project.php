<?php
	session_start();
	include '../db/db_connect.php';

	$project_id = $_POST['project_id'];
	$project_title = $_POST['project_title'];
	$project_description = $_POST['project_description'];
	$project_privacy = $_POST['project_privacy'];
	$project_url = $_FILES['project_file']['name'];
	$user_id = $_SESSION['login_id'];
	$delete_list = array();

	if (isset($_POST['file_delete'])) {
		$delete_list = $_POST['file_delete'];
	}

	if (isset($_POST['course'])) {
		$course = $_POST['course'];
	}

	$targetdir = '../repositories/'.$user_id.'/';

	if (!file_exists($targetdir)) {
		mkdir($targetdir, 0777, true);
	}

	$targetfile = $targetdir.$project_url;
	$project_file_upload_confirmation = is_uploaded_file($_FILES['project_file']['tmp_name']);
	$result = false;

	if($project_file_upload_confirmation && $_FILES['project_file']['size'] > 0){
		if (file_exists($targetfile)) {
			unlink($targetfile);
		}

		$moveStatus = move_uploaded_file($_FILES['project_file']['tmp_name'], $targetfile);

		if($moveStatus) {
			$sql = "UPDATE project SET project_title = '$project_title', project_description = '$project_description', project_privacy = '$project_privacy' WHERE project_id='$project_id'";

			$result = mysqli_query($connection, $sql);
			$temp = $user_id.'/'.$project_url;

			$sql = "INSERT INTO project_files (location, project_id) values ('$temp', '$project_id')";

			$result = mysqli_query($connection, $sql);
		}
		else {
			echo "Cannot move file...";
		}
	}
	else {
		$sql = "UPDATE project SET project_title = '$project_title', project_description = '$project_description', project_privacy = '$project_privacy' WHERE project_id='$project_id'";

		$result = mysqli_query($connection, $sql);
	}

	if (count($delete_list) > 0) {
		foreach ($delete_list as $file_id) {
			$sql = "SELECT * FROM project_files WHERE id='$file_id'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_assoc($result);

			$temp = '../repositories/'.$row['location'];
			unlink($temp);

			$sql = "DELETE FROM project_files WHERE id='$file_id'";
			$result = mysqli_query($connection, $sql);
		}
	}

	if (isset($course)) {
		$sql = "UPDATE project SET course_id = '$course' WHERE project_id='$project_id'";

		$result = mysqli_query($connection, $sql);
	}

	if ($result) {
		echo "Okay";
	}
	else {
		echo "Sorry";
	}
?>
